<?php echo $header; ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin.js'); ?>"></script>

<style type="text/css">
    .center-align {
        text-align: center;
    }
</style>

<div class="hcenter-content">
    <div class="row-fluid">
        <h3>List of Member<?php echo (!empty($memcount) && $memcount > 1) ? 's':''; ?></h3>
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
                        <tr>
                            <td><?php echo strtoupper($m->last_name).', '.$m->first_name.' '.$m->middle_name; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><?php echo "Pending"; ?></td>
                            <td>&nbsp;</td>
                            <td class="center-align">
                                <div class="btn-group">
                                    <a id="<?php echo $m->id; ?>" href="javascript:void(0);" class="btn alink"><i class="icon-search"></i> View</a>
                                </div>

                                <div class="btn-group">
                                    <a id="<?php echo $m->id; ?>" href="javascript:void(0);" class="btn alink"><i class="icon-pencil"></i> Edit</a>
                                </div>

                                <div class="btn-group">
                                    <a id="<?php echo $m->id; ?>" href="javascript:void(0);" class="btn alink"><i class="icon-trash"></i> Delete</a>
                                </div>
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
        ?>
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