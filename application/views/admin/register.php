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
        if ($this->session->flashdata('reg_error')):
            ?>
            <div class="alert alert-error">
                <strong>Error: </strong><?php echo $this->session->flashdata('reg_error'); ?>
            </div>
            <?php
        endif;
        ?>

        <h3>Registration</h3>
        <div class="span10">
            <!-- START FORM -->
            <form class="form-horizontal modal-header" name="registerFrm" id="registerFrm" method="post" action="<?php echo site_url('admin/member/add'); ?>">
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
                               value="<?php echo ($this->session->flashdata('lname')) ? $this->session->flashdata('lname'):''; ?>" />
                    </span>
                </div><br>

<!-- first name -->
                <div class="controls-row">
                    <span class="span2"><h5>First Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="fname" name="fname" placeholder="First Name"
                               value="<?php echo ($this->session->flashdata('fname')) ? $this->session->flashdata('fname'):''; ?>" />
                    </span>
                </div><br>

<!-- middle name -->
                <div class="controls-row">
                    <span class="span2"><h5>Middle Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="mname" name="mname" placeholder="Middle Name"
                               value="<?php echo ($this->session->flashdata('mname')) ? $this->session->flashdata('mname'):''; ?>" />
                    </span>
                </div><br>

<!-- address -->
                <div class="controls-row">
                    <span class="span2"><h5>Address:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="address" name="address" placeholder="Address"
                               value="<?php echo ($this->session->flashdata('address')) ? $this->session->flashdata('address'):''; ?>" />
                    </span>
                </div><br>

<!-- mobile number -->
                <div class="controls-row">
                    <span class="span2"><h5>Mobile No:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="mobile_no" name="mobile_no" placeholder="Mobile Number"
                               value="<?php echo ($this->session->flashdata('mobile')) ? $this->session->flashdata('mobile'):''; ?>" />
                    </span>
                </div><br>

<!-- email address -->
                <div class="controls-row">
                    <span class="span2"><h5>Email Address:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="eadd" name="eadd" placeholder="Email Address"
                               value="<?php echo ($this->session->flashdata('eadd')) ? $this->session->flashdata('eadd'):''; ?>" />
                    </span>
                </div><br><br>

<!-- buttons -->
                <div class="controls-row">
                    <span class="span7">
                        <input type="reset" value="RESET" class="btn btn-large btn-danger padding-btn" />
                        <input type="submit" value="REGISTER" class="btn btn-large btn-primary padding-btn" />
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