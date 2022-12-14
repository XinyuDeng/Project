<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/index.php'));
}
$aur_id = $_GET['id'];

if(is_post_request()) {

    $result = delete_author($aur_id);
    redirect_to(url_for('/staff/index.php'));

} else {
    $author = find_author_by_id($aur_id);
}

?>

<?php $page_title = 'Delete author'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>

    <div class="author delete">
        <h1>Delete author</h1>
        <p>Are you sure you want to delete this author?</p>
        <p class="item"><?php echo h($author['first_name']); ?></p>

        <form action="<?php echo url_for('/staff/author/delete.php?id=' . h(u($author['aur_id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete author" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
