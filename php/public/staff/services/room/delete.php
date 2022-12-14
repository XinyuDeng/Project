<?php

require_once('../../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/services/room/index.php'));
}
$customer_id = $_GET['id'];

if(is_post_request()) {

    $result = delete_cus_room($customer_id);
    redirect_to(url_for('/staff/services/room/index.php'));

} else {
    $record = find_record_by_id($customer_id);
}

?>

<?php $page_title = 'Delete Cus_Room'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="cus_room delete">
        <h1>Delete Shopping Record</h1>
        <p>Are you sure you want to delete this book record?</p>
        <p class="item"><?php echo h($record['room_id']); ?></p>

        <form action="<?php echo url_for('/staff/services/room//delete.php?id=' . h(u($record['$customer_id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete record" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
