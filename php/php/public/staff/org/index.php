<?php require_once('../../../private/initialize.php'); ?>

<?php

$org_set = find_all_organization();

?>

<?php $page_title = 'Organizations'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="organizations listing">
        <h1>Organizations</h1>

        <!--<div class="actions">
      <a class="action" href="<?php echo url_for('/staff/org/new.php'); ?>">Create New Subject</a>
    </div>-->

        <table class="list">
            <tr>
                <th>spon_id</th>
                <th>name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php while($org = mysqli_fetch_assoc($org_set)) { ?>
                <tr>
                    <td><?php echo h($org['spon_id']); ?></td>
                    <td><?php echo h($org['name']); ?></td>
                    <td><a class="action" href="<?php echo url_for('/staff/org/show.php?id=' . h(u($org['spon_id']))); ?>">View</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/org/edit.php?id=' . h(u($org['spon_id']))); ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/org/delete.php?id=' . h(u($org['spon_id']))); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>

        <?php
        mysqli_free_result($org_set);
        ?>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
