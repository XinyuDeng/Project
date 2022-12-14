<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/index.php'));
}
$spon_id = $_GET['id'];

if(is_post_request()) {

    $result = delete_organization($spon_id);
    redirect_to(url_for('/staff/index.php'));

} else {
    $org = find_organization_by_id($spon_id);
}

?>

<?php $page_title = 'Delete org'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>

    <div class="organization delete">
        <h1>Delete organization</h1>
        <p>Are you sure you want to delete this organization?</p>
        <p class="item"><?php echo h($org['name']); ?></p>

        <form action="<?php echo url_for('/staff/org/delete.php?id=' . h(u($org['$spon_id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete org" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
