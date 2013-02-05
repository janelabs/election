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
</style>

<div class="hcenter-content">
    <div class="row-fluid">
        <h3>Registration</h3><br>
        <div class="span10">
            <!-- START FORM -->
            <form name="registerFrm" id="registerFrm" method="post" action="<?php echo site_url('member/add'); ?>">

<!-- last name -->
                <div class="controls-row">
                    <span class="span2"><h5>Last Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="lname" name="lname" placeholder="Last Name" />
                    </span>
                </div><br>

<!-- first name -->
                <div class="controls-row">
                    <span class="span2"><h5>First Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="fname" name="fname" placeholder="First Name" />
                    </span>
                </div><br>

<!-- middle name -->
                <div class="controls-row">
                    <span class="span2"><h5>Middle Name:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="mname" name="mname" placeholder="Middle Name" />
                    </span>
                </div><br>

<!-- address -->
                <div class="controls-row">
                    <span class="span2"><h5>Address:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="address" name="address" placeholder="Address" />
                    </span>
                </div><br>

<!-- mobile number -->
                <div class="controls-row">
                    <span class="span2"><h5>Mobile No:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="mobile_no" name="mobile_no" placeholder="Mobile Number" />
                    </span>
                </div><br>

<!-- email address -->
                <div class="controls-row">
                    <span class="span2"><h5>Email Address:</h5></span>
                    <span class="span5">
                        <input class="input-xxlarge" type="text" id="eadd" name="eadd" placeholder="Email Address" />
                    </span>
                </div><br><br>

<!-- buttons -->
                <div class="controls-row">
                    <span class="span7">
                        <input type="reset" value="RESET FORM" class="btn btn-large btn-info padding-btn" />
                        <input type="submit" value="REGISTER" class="btn btn-large btn-info padding-btn" />
                    </span>
                </div><br>

            </form>
            <!-- END FORM -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){

    });
</script>
<?php echo $footer; ?>