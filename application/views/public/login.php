<?php echo $header; ?>
<div>&nbsp;</div>
<div class="hcenter-content hero-unit">
    <form name="loginfrm" id="loginfrm" method="post" class="form-inline modal-header">
        <div class="row-fluid">

            <div class="span6"><br>
                <p>
                    Enter Your Key:
                    <input type="text" id="userkey" name="userkey" class="input-xlarge" />
                    <a class="btn"><i class="icon-lock"></i>&nbsp;&nbsp;Vote</a>
                </p>
                <p>Forgot your key? Click <a class="btn-link">here</a>.</p>
            </div>

            <div class="span6 center-content pull-right">
                <h1><em><?php echo !empty($org_name) ? strtoupper($org_name):''; ?></em></h1>
            </div>
        </div>
    </form>
</div>
<?php echo $footer; ?>