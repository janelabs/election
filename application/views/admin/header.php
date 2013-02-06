<!DOCTYPE html>
<html lang="en">
<head>
    <title>Election - Admin<?php echo !empty($title) ? ' - '.$title:''; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-responsive.css'); ?>" />

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.custom.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.form.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/additional-methods.min.js')?>"></script>
    <script type="text/javascript">
        var site_url = "<?php echo site_url(); ?>";
    </script>
</head>

<noscript>
    <div class="row-fluid">
        <h3><span class="span12">Please enable your javascript.</span></h3>
    </div>
    <style type="text/css">
        .container {
            display: none !important;
        }
    </style>
</noscript>

<body>
    <div class="container">
        <div class="row">
            <?php
                if (!empty($menu)) {
                    ?>
                    <div class="row-fluid">
                        <?php echo $menu; ?>
                    </div>
                    <?php
                }
            ?>