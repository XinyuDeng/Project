<?php require_once('../../../private/initialize.php'); ?>

<?php

$indi_set = find_all_individual();

?>

<?php $page_title = 'Individuals'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="individuals listing">
        <h1>Individuals</h1>

        <!--<div class="actions">
      <a class="action" href="<?php echo url_for('/staff/indi/new.php'); ?>">Create New Subject</a>
    </div>-->

        <table class="list">
            <tr>
                <th>spon_id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php while($indi = mysqli_fetch_assoc($indi_set)) { ?>
                <tr>
                    <td><?php echo h($indi['spon_id']); ?></td>
                    <td><?php echo h($indi['first_name']); ?></td>
                    <td><?php echo h($indi['last_name']); ?></td>
                    <td><a class="action" href="<?php echo url_for('/staff/indi/show.php?id=' . h(u($indi['spon_id']))); ?>">View</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/indi/edit.php?id=' . h(u($indi['spon_id']))); ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/indi/delete.php?id=' . h(u($indi['spon_id']))); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>

        <?php
        mysqli_free_result($indi_set);
        ?>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
