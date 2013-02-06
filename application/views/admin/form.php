<?php echo $header; ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin.js'); ?>"></script>

<style type="text/css">
    .center-align {
        text-align: center;
    }
    .padding-btn {
        padding-left: 55px;
        padding-right: 55px;
    }
    .reg_error {
        color: red;
        font-size: 13px;
    }
</style>

<div class="hcenter-content">
    <div class="row-fluid">

        <?php
        if ($this->session->userdata('error')):
            ?>
            <div class="alert alert-error">
                <strong>Error: </strong><?php echo $this->session->userdata('error'); ?>
            </div>
            <?php
        endif;
        ?>

        <h3><?php echo (!empty($func)) ? $func:''; ?></h3>

        <?php
            $link = "";
            $action = "";
            if (!empty($func) && $func == "Registration") {
                $link = site_url('admin/member/add');
                $action = "REGISTER";
            }

            if (!empty($func) && $func == "Edit Information") {
                $link = site_url('admin/member/edit_save');
                $action = "SAVE";
            }
        ?>

        <div class="span10">
            <!-- START FORM -->
            <form class="form-horizontal modal-header" name="frm" id="frm" method="post" action="<?php echo $link; ?>">
                <input type="hidden" id="hid" name="hid" value="<?php echo (!empty($member->id)) ? $member->id:0; ?>" />
                <div class="controls-row">
                    <span class="span2"><h5>&nbsp;</h5></span>
                    <span class="span5">
                        <label class="reg_error">All fields are required except your mobile number.</label>
                    </span>
                </div>
<!-- last name -->
                <div class="controls-row">
                    <span class="span2"><h5>Last Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="lname" name="lname" placeholder="Last Name"
                               value="<?php echo ($this->session->userdata('lname')) ? $this->session->userdata('lname'):''; ?>" />
                    </span>
                </div><br>

<!-- first name -->
                <div class="controls-row">
                    <span class="span2"><h5>First Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="fname" name="fname" placeholder="First Name"
                               value="<?php echo ($this->session->userdata('fname')) ? $this->session->userdata('fname'):''; ?>" />
                    </span>
                </div><br>

<!-- middle name -->
                <div class="controls-row">
                    <span class="span2"><h5>Middle Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="mname" name="mname" placeholder="Middle Name"
                               value="<?php echo ($this->session->userdata('mname')) ? $this->session->userdata('mname'):''; ?>" />
                    </span>
                </div><br>

<!-- address -->
                <div class="controls-row">
                    <span class="span2"><h5>Address:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="address" name="address" placeholder="Address"
                               value="<?php echo ($this->session->userdata('address')) ? $this->session->userdata('address'):''; ?>" />
                    </span>
                </div><br>

<!-- mobile number -->
                <div class="controls-row">
                    <span class="span2"><h5>Mobile No:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="mobile_no" name="mobile_no" placeholder="Mobile Number"
                               value="<?php echo ($this->session->userdata('mobile')) ? $this->session->userdata('mobile'):''; ?>" />
                    </span>
                </div><br>

<!-- email address -->
                <div class="controls-row">
                    <span class="span2"><h5>Email Address:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="eadd" name="eadd" placeholder="Email Address"
                               value="<?php echo ($this->session->userdata('eadd')) ? $this->session->userdata('eadd'):''; ?>" />
                    </span>
                </div><br><br>

<!-- buttons -->
                <div class="controls-row">
                    <span class="span7">
                        <input type="reset" value="RESET" class="btn btn-large btn-danger padding-btn" />
                        <input type="submit" value="<?php echo $action; ?>" class="btn btn-large btn-primary padding-btn" />
                    </span>
                </div><br>

            </form>
            <!-- END FORM -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        AdminMember.initView();
    });
</script>
<?php echo $footer; ?>