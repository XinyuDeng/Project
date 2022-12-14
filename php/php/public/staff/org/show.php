<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$spon_id = $_GET['id'] ?? '1'; // PHP > 7.0
$org = find_organization_by_id($spon_id);

$semi_spon = find_semi_spon_by_id($spon_id);


?>

<?php $page_title = 'Show Organization'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <div class="Organization show">

        <h1>Organization: <?php echo h($org['name']); ?></h1>

    </div>
    <ul>
        <li><a href="<?php echo url_for('/staff/org/edit.php?id=' . h($org['spon_id'])); ?>">Edit</a></li>
        <li><a href="<?php echo url_for('/staff/org/delete.php?id=' . h($org['spon_id'])); ?>">Delete</a></li>
    </ul>

    <table class="list">
        <tr>
            <th>sponsor_id</th>
            <th>event_id</th>
            <th>amount</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($record = mysqli_fetch_assoc($semi_spon)) { ?>
            <tr>
                <td><?php echo h($record['spon_id']); ?></td>
                <td><?php echo h($record['event_id']); ?></td>
                <td><?php echo h($record['amount']); ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/services/seminar/edit_spon.php?id=' . h(u($record['spon_id']))); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/services/seminar/delete_spon.php?id=' . h(u($record['spon_id']))); ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </table>

    <ul>
        <li><a href="<?php echo url_for('/staff/services/seminar/create_spon.php'); ?>">Sponsor a seminar</a></li>
    </ul>



</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>c