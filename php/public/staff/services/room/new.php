<?php
require_once('../../../../private/initialize.php');
$customer_id = $_GET['id'];
if(is_post_request()) {
    $cus_room = [];
    $cus_room['customer_id'] = $_POST['customer_id'] ?? '';
    $cus_room['room_id'] = $_POST['room_id'] ?? '';
    $cus_room['timeslot'] = $_POST['timeslot'] ?? '';
    $cus_room['date'] = $_POST['date'] ?? '';

    $result = insert_cus_room($cus_room);

    if ($result === true) {
//        redirect_to(url_for('/staff/services/room/show.php?id=' . h(u($cus_room['customer_id']))));
        redirect_to(url_for('/staff/customer/show.php?id=' . h(u($cus_room['customer_id']))));
    } else {
        $errors = $result;
    }
} else {
    // display the blank form
    $cus_room = [];
    $cus_room['customer_id'] = $_POST['customer_id'] ?? '';
    $cus_room['room_id'] = $_POST['room_id'] ?? '';
    $cus_room['timeslot'] = $_POST['timeslot'] ?? '';
    $cus_room['date'] = '2022-12-14';
}


//$cus_room_set = find_record_by_id($cus_room['customer_id']);
//$cus_room_count = mysqli_num_rows($cus_room_set) + 1;
//mysqli_free_result($cus_room_set);

?>

<?php $page_title = 'Book Room'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <div class="book room new">
            <h1>Book A Room</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/services/room/new.php'); ?>" method="post">
                <dl>
                    <dt>Customer_id:</dt>
                    <dd><input type="text" name="customer_id" value="<?php echo h($customer_id); ?> " readonly/></dd>
                </dl>
                <dl>
                    <dt>Room_id:</dt>
                    <dd><input type="text" name="room_id" value="<?php echo h($cus_room['room_id']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Timeslot:</dt>
                    <dd><input type="text" name="timeslot" value="<?php echo h($cus_room['timeslot']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Date:</dt>
                    <dd><input type="text" name="date" value="<?php echo h($cus_room['date']); ?>" /></dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Create cus_room" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>