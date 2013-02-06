<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo (!empty($member->first_name)) ? ucwords($member->first_name)."'s ":"Member's"; ?>Information</h3>
</div>
<br>
<div class="modal-body">
    <div>
        <span>Name: </span>
        <span>
            <?php
                if (!empty($member->last_name) && !empty($member->first_name) && !empty($member->middle_name)) {
                    $name = strtoupper($member->last_name).', '.$member->first_name.' '.$member->middle_name;
                }
                echo (!empty($name)) ? $name:'';
            ?>
        </span>
    </div><br>

    <div>
        <span>Address: </span>
        <span>
            <?php
                echo (!empty($member->address)) ? $member->address:'';
            ?>
        </span>
    </div><br>

    <div>
        <span>Mobile Number: </span>
        <span>
            <?php
            echo (!empty($member->mobile_no)) ? $member->mobile_no:'';
            ?>
        </span>
    </div><br>

    <div>
        <span>Email Address: </span>
        <span>
            <?php
            echo (!empty($member->email_address)) ? $member->email_address:'';
            ?>
        </span>
    </div><br>

    <div>
        <span>Key: </span>
        <span>
            <?php
            echo (!empty($member->key)) ? $member->key:'';
            ?>
        </span>
    </div><br>

    <div>
        <span>Vote Status: </span>
        <span>
            <?php
                echo (!empty($member->vote_status)) ? $member->vote_status:'';
            ?>
        </span>
    </div><br>
</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>