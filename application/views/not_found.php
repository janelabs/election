<!DOCTYPE html>
<html lang="en">
<head>
    <title>Election</title>

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
        $(function(){
            $('.carousel').carousel({
                interval: 2000
            })
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <div id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item"><h1><center>4 0 4</center></h1></div>
                        <div class="item"><center><h1>
                            P A G E &nbsp;&nbsp;&nbsp;&nbsp; N O T &nbsp;&nbsp;&nbsp;&nbsp; F O U N D ! ! !
                        </h1></center></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php
                    $link = site_url();
                    if ($this->session->userdata('auid')) {
                        $link = site_url('admin/home');
                    }
                ?>
                <h4>CLICK <a href="<?php echo $link; ?>">HERE</a></h4>
            </div>
        </div>
    </div>
</body>
</html>