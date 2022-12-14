<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$aur_id = $_GET['id'] ?? '1'; // PHP > 7.0
$author = find_author_by_id($aur_id);

$semi_aur = find_semi_aur_by_id($aur_id);

$aur_book = find_aur_book_by_id($aur_id);


?>

<?php $page_title = 'Show Author'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <div class="Customer show">

        <h1>Individual: <?php echo h($author['first_name']);echo " "; echo h($author['last_name']); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Street:</dt>
                <dd><?php echo h($author['street']); ?></dd>
            </dl>
            <dl>
                <dt>City:</dt>
                <dd><?php echo h($author['city']); ?></dd>
            </dl>
            <dl>
                <dt>State:</dt>
                <dd><?php echo h($author['state']); ?></dd>
            </dl>
            <dl>
                <dt>Country:</dt>
                <dd><?php echo h($author['country']); ?></dd>
            </dl>
            <dl>
                <dt>Email:</dt>
                <dd><?php echo h($author['email']); ?></dd>
            </dl>
        </div>

    </div>
    <ul>
        <li><a href="<?php echo url_for('/staff/author/edit_aur.php?id=' . h($author['aur_id'])); ?>">Edit</a></li>
        <li><a href="<?php echo url_for('/staff/author/delete_aur.php?id=' . h($author['aur_id'])); ?>">Delete</a></li>
    </ul>

    <table class="list">
        <tr>
            <th>event_id</th>
            <th>invitation_id</th>
            <th>aur_id</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($record = mysqli_fetch_assoc($semi_aur)) { ?>
            <tr>
                <td><?php echo h($record['event_id']); ?></td>
                <td><?php echo h($record['invitation_id']); ?></td>
                <td><?php echo h($record['aur_id']); ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/services/seminar/edit_aur.php?id=' . h(u($record['invitation_id']))); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/services/seminar/delete_aur.php?id=' . h(u($record['invitation_id']))); ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </table>

    <ul>
        <li><a href="<?php echo url_for('/staff/services/seminar/create_aur.php'); ?>">Attend a seminar</a></li>
    </ul>

    <table class="list">
        <tr>
            <th>aur_id</th>
            <th>book_id</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($record_aur_book = mysqli_fetch_assoc($aur_book)) { ?>
            <tr>
                <td><?php echo h($record_aur_book['aur_id']); ?></td>
                <td><?php echo h($record_aur_book['book_id']); ?></td>
                <td><a class="action" href="<?php echo url_for('/book/show.php?id=' . h(u($record_aur_book['aur_id']))); ?>">View</a></td>
                <td><a class="action" href="<?php echo url_for('/book/delete.php?id=' . h(u($record_aur_book['aur_id']))); ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>c