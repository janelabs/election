<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library(array(
            'form_validation',
            'email'
        ));
        $this->load->helper('string');
        $menuActive = array('mActive' => 'membernav');
        $this->session->set_userdata($menuActive);
    }

    public function index()
    {
        redirect('admin/member/lists');
    }


    /**
     * Display the list of members who can vote/be an admin
     *
     * @param int $page
     */
    public function lists($page = 0)
    {
        $this->checkLoggedStatus();

        $header['title'] = 'Member - List';
        $menu['active'] = $this->session->userdata('mActive');
        $header['menu'] = $this->load->view('admin/menu', $menu, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $dataOptions['memcount'] = $total = count($this->Member_model->fetchData());

        // for pagination
        $config['base_url'] = site_url('admin/member/lists/');
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = "<ul>";
        $config['full_tag_close'] = "</ul>";
        $config['cur_tag_open'] = "<li class='active'><a>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";

        $this->pagination->initialize($config);

        $offset = $page ;
        // end pagination

        $dataOptions['members'] = $this->Member_model->fetchData(null, null, $config['per_page'], $offset);
        $dataOptions['page_link'] = $this->pagination->create_links();
        $dataOptions['key'] = $this->key;

        $this->load->view('admin/member', $dataOptions);
    }

    /**
     * view registration form
     */
    public function register()
    {
        $this->checkLoggedStatus();

        $header['title'] = 'Member - Registration';
        $menu['active'] = $this->session->userdata('mActive');
        $header['menu'] = $this->load->view('admin/menu', $menu, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);
        $dataOptions['func'] = "Registration";

        $this->load->view('admin/form', $dataOptions);
    }

    /**
     * Validates the form
     */
    private function validateForm()
    {
        $config = array(
            array(
                'field'   => 'lname',
                'label'   => 'Last Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'fname',
                'label'   => 'First Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'mname',
                'label'   => 'Middle Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'Address',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'mobile_no',
                'label'   => 'Mobile Number',
                'rules'   => 'min_length[11]|numeric'
            ),
            array(
                'field'   => 'eadd',
                'label'   => 'Email Address',
                'rules'   => 'required|valid_email|callback_check_email'
            )
        );

        $this->form_validation->set_rules($config);
    }

    public function check_email($email)
    {
        $action = ($this->session->userdata('action')) ? $this->session->userdata('action'):'';
        $where = array('email_address' => $email);
        $member = $this->Member_model->fetchSingleData(null, $where);

        if ($action == 'add') {
            if ($member) {
                $this->form_validation->set_message('check_email', 'Email Address should be unique');
                return false;
            }
        }

        if ($action == 'edit') {
            if ($member && $member->id != $this->session->userdata('memId')) {
                $this->form_validation->set_message('check_email', 'Email Address should be unique');
                return false;
            }
        }
        return true;
    }

    /**
     * Add new member
     */
    public function add()
    {
        $this->checkLoggedStatus();

        $lname = trim($this->input->post('lname', true));
        $fname = trim($this->input->post('fname', true));
        $mname = trim($this->input->post('mname', true));
        $address = trim($this->input->post('address', true));
        $mobile_no = trim($this->input->post('mobile_no', true));
        $eadd = trim($this->input->post('eadd', true));

        $val = array(
            'lname' => $lname,
            'fname' => $fname,
            'mname' => $mname,
            'address' => $address,
            'mobile' => $mobile_no,
            'eadd' => $eadd
        );

        $this->session->unset_userdata('action');
        $this->session->set_userdata('action', 'add');

        $this->validateForm();
        if ($this->form_validation->run() == false) {
            //prev fields value
            $this->session->set_userdata($val);
            //error msg
            $this->session->set_userdata('error', validation_errors());
            redirect('admin/member/register');
        } else {
            $this->session->unset_userdata('action');
            //key checker
            $key = $this->generateKey();
            while ($this->getData('key', $key, 'Member_model')) {
                $key = $this->generateKey();
            }

            //data to be saved
            $data = array(
                'last_name' => $lname,
                'first_name' => $fname,
                'middle_name' => $mname,
                'address' => $address,
                'mobile_no' => $mobile_no,
                'email_address' => $eadd,
                'key' => $key,
                'vote_status' => "Pending"
            );

            if ($this->Member_model->insertData($data)) {
                $this->send_key($key, $eadd, $fname);
                $this->session->unset_userdata($val);
                $this->session->unset_userdata('error');
                redirect('admin/member');
            } else {
                //prev fields value
                $this->session->set_userdata($val);
                //error msg
                $this->session->set_userdata('error', "Something went wrong while adding this member, please try again.");
                redirect('admin/member/register');
            }
        }
    }

    /**
     * Send member's key to their email
     *
     * @param $key
     */
    private function send_key($key, $email, $name)
    {
        $config['protocol'] = 'sendmail';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from('noreply@orgelection.com', 'Org Election');
        $this->email->to($email);

        $this->email->subject('Your KEY to Vote in Upcoming Org Election');

        $message = 'Hi '.ucwords($name).'!<br><br>Congratulations! You are now registered to Org Election!<br><br>
        Your key to vote is <strong>'.$key.'</strong><br><br>
        Election date, time and place will be announced by the committee on succeeding days so we are requesting for you to stay informed.
         In line with this, we are hoping for your honesty for the upcoming election. Thank you very much.<br><br>Best Regards!<br>Org Election';
        $note = '<p style="font-size: 11px; color: #8b0000">If this has nothing to do with you, please ignore.</p>';
        $this->email->message($message."<br><br>".$note);

        $this->email->send();
    }

    /**
     * Generate member key, for voting purposes
     *
     * @return string
     */
    private function generateKey()
    {
        $first_4 = random_string('alpha', 4);
        $second_4 = random_string('alnum', 4);
        $third_4 = random_string('numeric', 4);

        return strtoupper($first_4.'-'.$second_4.'-'.$third_4);
    }

    /**
     * Fetch and Display member's information
     */
    public function view()
    {
        $this->checkLoggedStatus();

        $mid = $this->input->post('mid', true);
        $where = array('id' => $mid);
        $data['member'] = $this->Member_model->fetchSingleData(null, $where);

        $this->load->view('admin/view_info', $data);
    }

    /**
     * Delete data
     */
    public function delete()
    {
        $this->checkLoggedStatus();

        $id = $this->input->post('mid', true);
        $where = array('id'=>$id);
        if ($this->Member_model->deleteData($where)) {
            echo "Member deleted.";
        } else {
            echo "Something went wrong while deleting this data. Please try again.";
        }
    }


    /**
     * View member's data and allow admin to modify it
     *
     * @param int $id
     */
    public function edit($id = 0, $fieldVal = null)
    {
        $this->checkLoggedStatus();

        if ($id > 0) {
            $header['title'] = 'Member - Edit Information';
            $menu['active'] = $this->session->userdata('mActive');
            $header['menu'] = $this->load->view('admin/menu', $menu, true);
            $dataOptions['header'] = $this->load->view('admin/header', $header, true);
            $dataOptions['footer'] = $this->load->view('admin/footer', null, true);
            $dataOptions['func'] = "Edit Information";

            $where = array('id' => $id);
            $dataOptions['member'] = $member = $this->Member_model->fetchSingleData(null, $where);

            if ($member) {
                $val = array(
                    'lname' => $member->last_name,
                    'fname' => $member->first_name,
                    'mname' => $member->middle_name,
                    'address' => $member->address,
                    'mobile' => $member->mobile_no,
                    'eadd' => $member->email_address
                );
                if (!$fieldVal) {
                    $this->session->set_userdata($val);
                }
            }

            $this->load->view('admin/form', $dataOptions);
        }
    }

    /**
     * Save member's info modification
     */
    public function edit_save()
    {
        $this->checkLoggedStatus();

        $id = trim($this->input->post('hid', true));
        $lname = trim($this->input->post('lname', true));
        $fname = trim($this->input->post('fname', true));
        $mname = trim($this->input->post('mname', true));
        $address = trim($this->input->post('address', true));
        $mobile_no = trim($this->input->post('mobile_no', true));
        $eadd = trim($this->input->post('eadd', true));

        $val = array(
            'lname' => $lname,
            'fname' => $fname,
            'mname' => $mname,
            'address' => $address,
            'mobile' => $mobile_no,
            'eadd' => $eadd
        );

        $this->session->unset_userdata('action');
        $this->session->unset_userdata('memId');

        $this->session->set_userdata(array(
            'action' => 'edit',
            'memId' => $id
        ));

        $this->validateForm();
        if ($this->form_validation->run() == false) {
            //prev fields value
            $this->session->set_userdata($val);
            //error msg
            $this->session->set_userdata('error', validation_errors());
            redirect('admin/member/edit/'.$id.'/'.$val);
        } else {
            $this->session->unset_userdata('action');
            $this->session->unset_userdata('memId');
            //data to be saved
            $data = array(
                'last_name' => $lname,
                'first_name' => $fname,
                'middle_name' => $mname,
                'address' => $address,
                'mobile_no' => $mobile_no,
                'email_address' => $eadd,
                'date_modified' => date('Y-m-d')
            );

            $where = array('id'=>$id);

            if ($this->Member_model->updateData($data, $where)) {
                $this->session->unset_userdata($val);
                $this->session->unset_userdata('error');
                redirect('admin/member');
            } else {
                //prev fields value
                $this->session->set_userdata($val);
                //error msg
                $this->session->set_userdata('error', "Something went wrong while saving this member' data, please try again.");
                redirect('admin/member/edit/'.$id);
            }
        }
    }
}

/* End of file member.php */
/* Location: ./application/controllers/admin/member.php */