<?php echo $header; ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin.js'); ?>"></script>

<style type="text/css">
    .login_error {
        color: red;
        font-size: 13px;
    }
</style>

<div>&nbsp;</div>
<div class="hcenter-content">

    <form name="loginfrm" id="loginfrm" action="<?php echo base_url('admin/login/verify'); ?>" method="post" class="form-horizontal modal-header">

        <div class="row-fluid">
            <div class="span8"><br>
                <?php
                    if ($this->session->flashdata('login_error')):
                        ?>
                        <div class="alert alert-error">
                            <strong>Error: </strong><?php echo $this->session->flashdata('login_error'); ?>
                        </div>
                        <?php
                    endif;
                ?>

                <div class="controls-row">
                    <span class="span2"><h5>Email Address:</h5></span>
                    <span class="span5"><input class="input-xxlarge required" type="email" id="email" name="email" placeholder="Email Address" /></span>
                </div><br>

                <div class="controls-row">
                    <span class="span2"><h5>Password:</h5></span>
                    <span class="span5"><input class="input-xxlarge required" type="password" id="password" name="password" placeholder="Password" /></span>
                </div><br>

                <div class="row-fluid">
                    <span class="span6 pull-right"><h6>
                        Forgot your password? Click <a class="btn-link">here</a>.&nbsp;&nbsp;
                        <input type="submit" id="submit" value="Login" class="btn btn-info" />
                    </h6></span>
                </div>
            </div>

            <div class="span4 center-content pull-right">
                <br><h1><em>Admin</em></h1>
            </div>
        </div>

    </form>

</div>

<script type="text/javascript">
    $(function(){
        Admin.initView();
    });
</script>
<?php echo $footer; ?>