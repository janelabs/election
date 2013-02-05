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
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile Number</th>
                <th>Voting Status</th>
                <th>Action</th>
            </tr>

            <?php
                if($members):
                    foreach($members AS $m):
                        ?>
                        <tr>
                            <td><?php echo strtoupper($m->last_name).', '.$m->first_name.' '.$m->middle_name; ?></td>
                            <td><?php echo $m->address; ?></td>
                            <td><?php echo $m->mobile_no; ?></td>
                            <td><?php echo "Pending"; ?></td>
                            <td class="center-align">
                                <div class="btn-group">
                                    <a href="#" class="btn"><i class="icon-search"></i> View</a>
                                </div>

                                <div class="btn-group">
                                    <a href="#" class="btn"><i class="icon-pencil"></i> Edit</a>
                                </div>

                                <div class="btn-group">
                                    <a href="#" class="btn"><i class="icon-trash"></i> Delete</a>
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
    </div>
</div>

<script type="text/javascript">
    $(function(){
        Admin.initView();
    });
</script>
<?php echo $footer; ?>