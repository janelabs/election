<?php echo $header; ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin.js'); ?>"></script>

<style type="text/css">
    .center-align {
        text-align: center;
    }
    .padding-btn {
        padding-left: 24px;
        padding-right: 24px;
    }
    .resDiv {
        display: none;
    }
</style>

<div class="hcenter-content">
    <div class="row-fluid">

        <!-- SEARCH -->
        <div class="row-fluid">
            <fieldset class="span12">
                <legend><h3>Search</h3></legend>
                <form name="frmSearch" id="frmSearch" method="post" action="">
                    <div class="span3 center-align">
                        <input class="input-xlarge" type="text" id="memName" name="memName" placeholder="Member Name" />
                    </div>

                    <div class="span3 center-align">
                        <select id="vote_stat" class="input-xlarge">
                            <option id="0" value="none">Voting Status</option>
                            <option id="1" value="Pending">Pending</option>
                            <option id="2" value="Done">Done</option>
                        </select>
                    </div>

                    <div class="span1 center-align">
                        <input type="submit" value="Search" id="searchBtn" class="btn btn-primary padding-btn" />
                    </div>
                    <div class="span1 center-align">
                        <input type="button" id="resetFrm" value="Reset" class="btn btn-danger padding-btn" />
                    </div>
                </form>
            </fieldset>
        </div><hr />
        <!-- END SEARCH -->

        <div id="memList"><h3>List of Member<?php echo (!empty($memcount) && $memcount > 1) ? 's':''; ?></h3>
        <table class="table table-striped table-hover">
            <tr class="center-align">
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Voting Status</th>
                <th>&nbsp;</th>
                <th>Action</th>
            </tr>

            <?php
                if($members):
                    foreach($members AS $m):
                        ?>
                        <tr id="<?php echo $m->id; ?>">
                            <td><?php echo strtoupper($m->last_name).', '.$m->first_name.' '.$m->middle_name; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><?php echo "Pending"; ?></td>
                            <td>&nbsp;</td>
                            <td class="center-align">
                                <div class="btn-group">
                                    <a name="view" id="<?php echo $m->id; ?>" href="javascript:void(0);" class="btn alink"><i class="icon-search"></i> View</a>
                                </div>

                                <div class="btn-group">
                                    <a name="edit" href="<?php echo site_url('admin/member/edit/'.$m->id); ?>" class="btn alink"><i class="icon-pencil"></i> Edit</a>
                                </div>
                                <?php
                                    if ($this->session->userdata('auid') != md5($m->id . $key)) {
                                        ?>
                                        <div class="btn-group">
                                            <a name="delete" id="<?php echo $m->id; ?>" href="javascript:void(0);" class="btn alink"><i class="icon-trash"></i> Delete</a>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                else:
                    ?>
                    <tr>
                        <td colspan="5">No record(s) found.</td>
                    </tr>
                    <?php
                endif;
            ?>
        </table>
        <?php
            if ($members):
                ?>
                <div class="pagination pagination-centered">
                    <?php echo $page_link; ?>
                </div>
                <?php
            endif;
        ?></div>

        <div id="searchRes" class="resDiv">
            ^______________________________________^
        </div>
    </div>
</div>

<!--MODAL-->
<div id="view_div" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script type="text/javascript">
    $(function(){
        AdminMember.initView();
    });
</script>
<?php echo $footer; ?>