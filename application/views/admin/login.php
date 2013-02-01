<?php echo $header; ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin.js'); ?>"></script>

<div>&nbsp;</div>
<div class="hcenter-content">

    <form name="loginfrm" id="loginfrm" action="<?php echo base_url('admin/login/verify'); ?>" method="post" class="form-inline modal-header">

        <div class="row-fluid">
            <div class="span8"><br>
                <input type="text" id="email" name="email" placeholder="Email Address" />
                <input type="password" id="password" name="password" placeholder="Password" />
                <input type="submit" value="Login" class="btn btn-info" /><br><br>
                <p>Forgot your password? Click <a class="btn-link">here</a>.</p><br><br>
            </div>

            <div class="span4 center-content pull-right">
                <h1><em>Admin</em></h1>
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