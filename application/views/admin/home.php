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
    <?php echo $menu; ?>
    <div class="row-fluid">

    </div>
</div>

<script type="text/javascript">
    $(function(){
        Admin.initView();
    });
</script>
<?php echo $footer; ?>