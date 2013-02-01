<?php echo $header; ?>
<div>&nbsp;</div>
<div class="hcenter-content">
    <form name="loginfrm" id="loginfrm" method="post" class="form-inline modal-header">
        <div class="row-fluid">

            <div class="span8"><br>
                <input type="text" id="email" name="email" placeholder="Email Address" />
                <input type="password" id="password" name="password" placeholder="Password" />
                <a class="btn"><i class="icon-lock"></i>&nbsp;&nbsp;Login</a><br><br>
                <p>Forgot your password? Click <a class="btn-link">here</a>.</p><br><br>
            </div>

            <div class="span4 center-content pull-right">
                <h1><em>Admin</em></h1>
            </div>
        </div>
    </form>
</div>
<?php echo $footer; ?>