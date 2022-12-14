<?php

require_once('../../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/services/seminar/index.php'));
}
$invitation_id = $_GET['id'];

if(is_post_request()) {

    $result = delete_semi_aur($invitation_id);
    redirect_to(url_for('/staff/services/seminar/index.php'));

} else {
    $record = find_semi_aur_by_invitation_id($invitation_id);
}

?>

<?php $page_title = 'Delete Semi_Aur'; ?>
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
