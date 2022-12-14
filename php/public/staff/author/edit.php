<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/author/index.php'));
}
$aur_id = $_GET['id'];

if(is_post_request()) {

    // Handle form values sent by new.php

    $author = [];
    $author['aur_id'] = $aur_id;
    $author['first_name'] = $_POST['first_name'] ?? '';
    $author['last_name'] = $_POST['last_name'] ?? '';
    $author['password'] = $_POST['password'] ?? '';
    $author['street'] = $_POST['street'] ?? '';
    $author['city'] = $_POST['city'] ?? '';
    $author['state'] = $_POST['state'] ?? '';
    $author['country'] = $_POST['country'] ?? '';
    $author['email'] = $_POST['email'] ?? '';


    $result = update_author($author);
    if($result === true) {
        redirect_to(url_for('/staff/author/show.php?id=' . $aur_id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }

} else {

    $author = find_author_by_id($aur_id);

}

$author_set = find_all_author();
$author_count = mysqli_num_rows($author_set);
mysqli_free_result($author_set);

?>

<?php $page_title = 'Edit author'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <!--<a class="back-link" href="<?php echo url_for('/staff/author/index.php'); ?>">&laquo; Back to List</a>
-->
        <div class="author edit">
            <h1>Edit author</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/author/edit.php?id=' . h(u($aur_id))); ?>" method="post">
                <dl>
                    <dt>First Name:</dt>
                    <dd><input type="text" name="first_name" value="<?php echo h($author['first_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Last Name:</dt>
                    <dd><input type="text" name="last_name" value="<?php echo h($author['last_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Set Password:</dt>
                    <dd><input type="text" name="password" value="<?php echo h($author['password']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Street:</dt>
                    <dd><input type="text" name="nationality" value="<?php echo h($author['street']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>City:</dt>
                    <dd><input type="text" name="gender" value="<?php echo h($author['city']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>State:</dt>
                    <dd><input type="text" name="addr_city" value="<?php echo h($author['state']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Country:</dt>
                    <dd><input type="text" name="addr_state" value="<?php echo h($author['country']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Email:</dt>
                    <dd><input type="text" name="addr_state" value="<?php echo h($author['email']); ?>" /></dd>
                </dl>

                <div id="operations">
                    <input type="submit" value="Edit author" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>