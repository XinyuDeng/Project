<?php

require_once('../../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/services/room/index.php'));
}
$reserveation_id = $_GET['id'];

if(is_post_request()) {

    $record = find_record_by_id($reserveation_id);
    $result = delete_cus_room($reserveation_id);
    redirect_to(url_for('/staff/customer/show.php?id=' . h($record['customer_id'])));

} else {
    $record = find_record_by_id($reserveation_id);
}

?>

<?php $page_title = 'Delete Cus_Room'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="cus_room delete">
        <h1>Cancel Room Reservation</h1>
        <p>Are you sure you want to cancel this room reservation?</p>
        <p class="item">Room ID: <?php echo h($record['room_id']); ?></p>
        <p class="item">Date: <?php echo h($record['date']); ?></p>
        <p class="item">Timeslot: <?php echo h($record['timeslot']); ?></p>

        <form action="<?php echo url_for('/staff/services/room/delete.php?id=' . h(u($reserveation_id))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete record" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
