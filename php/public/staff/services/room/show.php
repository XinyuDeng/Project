<?php require_once('../../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0
$record = find_record_by_id($id);

?>

<?php $page_title = 'Room'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <!-- <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>
-->
        <div class="Customer show">

<!--            <h1>Customer_id: --><?php //echo h($record['customer_id']); ?><!--</h1>-->
            <h2>Room Booked Successfully!</h2>
            <div class="attributes">
                <dl>
                    <dt>Room_id:</dt>
                    <dd><?php echo h($record['room_id']); ?></dd>
                </dl>
                <dl>
                    <dt>Date:</dt>
                    <dd><?php echo h($record['date']); ?></dd>
                </dl>
                <dl>
                    <dt>Timeslot:</dt>
                    <dd><?php echo h($record['timeslot']); ?></dd>
                </dl>
            </div>

        </div>
        <ul>
            <li><a href="<?php echo url_for('/staff/services/room/new.php?id=' . h($record['customer_id'])); ?>">Keep Booking</a></li>
            <li><a href="<?php echo url_for('/staff/services/room/edit.php?id=' . h($record['customer_id'])); ?>">Edit</a></li>
            <li><a href="<?php echo url_for('/staff/services/room/delete.php?id=' . h($record['customer_id'])); ?>">Delete</a></li>
        </ul>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>