<?php
require_once('../../../../private/initialize.php');

if(is_post_request()) {
    $semi_aur = [];
    $semi_aur['invitation_id'] = $_POST['invitation_id'] ?? '';
    $semi_aur['event_id'] = $_POST['event_id'] ?? '';
    $semi_aur['aur_id'] = $_POST['aur_id'] ?? '';

    $result = insert_semi_aur($semi_aur);

    if ($result === true) {
        redirect_to(url_for('/staff/services/seminar/show.php?id=' . h(u($semi_aur['invitation_id']))));
    } else {
        $errors = $result;
    }
} else {
    // display the blank form
    $semi_aur = [];
    $semi_aur['invitation_id'] = $_POST['invitation_id'] ?? '';
    $semi_aur['event_id'] = $_POST['event_id'] ?? '';
    $semi_aur['aur_id'] = $_POST['aur_id'] ?? '';
}


//$cus_room_set = find_record_by_id($cus_room['customer_id']);
//$cus_room_count = mysqli_num_rows($cus_room_set) + 1;
//mysqli_free_result($cus_room_set);

?>

<?php $page_title = 'Attend a seminar'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <div class="book room new">
            <h1>Attend a seminar</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/services/room/new.php'); ?>" method="post">
                <dl>
                    <dt>Aur_id:</dt>
                    <dd><input type="text" name="aur_id" value="<?php echo h($semi_aur['aur_id']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Event_id:</dt>
                    <dd><input type="text" name="room_id" value="<?php echo h($semi_aur['event_id']); ?>" /></dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Create semi_aur" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>