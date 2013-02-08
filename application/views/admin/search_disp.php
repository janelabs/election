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
</div>