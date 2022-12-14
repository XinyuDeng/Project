<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/index.php'));
}
$spon_id = $_GET['id'];

if(is_post_request()) {

    $result = delete_individual($spon_id);
    redirect_to(url_for('/staff/index.php'));

} else {
    $indi = find_individual_by_id($spon_id);
}

?>

<?php $page_title = 'Delete indi'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>

    <div class="individual delete">
        <h1>Delete individual</h1>
        <p>Are you sure you want to delete this individual?</p>
        <p class="item"><?php echo h($indi['first_name']); ?></p>

        <form action="<?php echo url_for('/staff/indi/delete.php?id=' . h(u($indi['$spon_id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete indi" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
