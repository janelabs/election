<script type="text/javascript">
    $(function(){
        $('#'+$('#activeNav').val()).addClass('active');
    });
</script>

<input type="hidden" id="activeNav" value="<?php echo $active; ?>" /><br>
<div class="span12">
    <ul class="nav nav-tabs">
        <li id="homenav"><a href="<?php echo site_url('admin/home'); ?>">Home</a></li>

        <li  id="membernav" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo site_url('admin/member'); ?>">
                Members
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('admin/member'); ?>">List of Member(s)</a></li>
                <li><a href="<?php echo site_url('admin/member/register'); ?>">Register Member</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Candidates
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Register Candidates</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Party Lists
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Register Party List</a></li>
            </ul>
        </li>

        <li class="pull-right">
            <a href="<?php echo site_url('admin/login/logout')?>" class="btn-link" title="Sign Out"><i class="icon-off"></i></a>
        </li>
    </ul>
</div>