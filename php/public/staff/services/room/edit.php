<?php

require_once('../../../../private/initialize.php');

//if(!isset($_GET['id'])) {
//    redirect_to(url_for('/insurance_plan/index.php'));
//}
$reserveation_id = $_GET['id'];

if(is_post_request()) {

    // Handle form values sent by new.php

    $cus_room = [];
    $cus_room['reserveation_id'] = $reserveation_id;
    $cus_room['room_id'] = $_POST['room_id'] ?? '';
    $cus_room['timeslot'] = $_POST['timeslot'] ?? '';
    $cus_room['date'] = $_POST['date'] ?? '';

    $result = update_cus_room($cus_room);
    $record = find_record_by_id($reserveation_id);
    if($result === true) {
        redirect_to(url_for('/staff/customer/show.php?id=' . h($record['customer_id'])));
    } else {
        $errors = $result;
        //var_dump($errors);
    }

} else {

    $record = find_record_by_id($reserveation_id);

}

//$record_set = find_all_shoprecord();
//$record_count = mysqli_num_rows($record_set);
//mysqli_free_result($record_set);

?>

<?php $page_title = 'Edit Room Service'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <!--<a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>
-->
        <div class="Edit Shop Record">
            <h1>Edit Room Service</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/services/room/edit.php?id=' . h(u($reserveation_id))); ?>" method="post">

                <dl>
                    <dt>Room_id</dt>
                    <dd><input type="text" name="room_id" value="<?php echo h($record['room_id']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Date</dt>
                    <dd><input type="text" name="date" value="<?php echo h($record['date']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Timeslot</dt>
                    <dd><input type="text" name="timeslot" value="<?php echo h($record['timeslot']); ?>" /></dd>
                </dl>

                <div id="operations">
                    <input type="submit" value="Edit Room Service" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>