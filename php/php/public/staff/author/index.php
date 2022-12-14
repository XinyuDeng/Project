<?php require_once('../../../private/initialize.php'); ?>

<?php

$aurthor_set = find_all_author();

?>

<?php $page_title = 'Authors'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="authors listing">
        <h1>Authors</h1>

        <!--<div class="actions">
      <a class="action" href="<?php echo url_for('/staff/author/new.php'); ?>">Create New Subject</a>
    </div>-->

        <table class="list">
            <tr>
                <th>aur_id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php while($author = mysqli_fetch_assoc($aurthor_set)) { ?>
                <tr>
                    <td><?php echo h($author['aur_id']); ?></td>
                    <td><?php echo h($author['first_name']); ?></td>
                    <td><?php echo h($author['last_name']); ?></td>
                    <td><a class="action" href="<?php echo url_for('/staff/author/show.php?id=' . h(u($author['aur_id']))); ?>">View</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/author/edit.php?id=' . h(u($author['aur_id']))); ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/author/delete.php?id=' . h(u($author['aur_id']))); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>

        <?php
        mysqli_free_result($aurthor_set);
        ?>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
