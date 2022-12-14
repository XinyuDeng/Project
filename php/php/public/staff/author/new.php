<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    $author = [];
    $author['first_name'] = $_POST['first_name'] ?? '';
    $author['last_name'] = $_POST['last_name'] ?? '';
    $author['password'] = $_POST['password'] ?? '';
    $author['street'] = $_POST['street'] ?? '';
    $author['city'] = $_POST['city'] ?? '';
    $author['state'] = $_POST['state'] ?? '';
    $author['country'] = $_POST['country'] ?? '';
    $author['email'] = $_POST['email'] ?? '';

    $result = insert_author($author);
    if($result === true) {
        $hash = password_hash($author['password'], PASSWORD_BCRYPT);
        $new_id = mysqli_insert_id($db);
        insert_aur_hash($new_id, $author['password'], $hash);
        redirect_to(url_for('/staff/author/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }


} else {
    // display the blank form
    $author = [];
    $author['first_name'] = $_POST['first_name'] ?? '';
    $author['last_name'] = $_POST['last_name'] ?? '';
    $author['password'] = $_POST['password'] ?? '';
    $author['street'] = $_POST['street'] ?? '';
    $author['city'] = $_POST['city'] ?? '';
    $author['state'] = $_POST['state'] ?? '';
    $author['country'] = $_POST['country'] ?? '';
    $author['email'] = $_POST['email'] ?? '';
}

$author_set = find_all_author();
$author_count = mysqli_num_rows($author_set) + 1;
mysqli_free_result($author_set);

?>

<?php $page_title = 'Create Author'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <div class="author new">
            <h1>Create author</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/author/new.php'); ?>" method="post">
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
                    <dd><input type="text" name="street" value="<?php echo h($author['street']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>City:</dt>
                    <dd><input type="text" name="city" value="<?php echo h($author['city']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>State:</dt>
                    <dd><input type="text" name="state" value="<?php echo h($author['state']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Country:</dt>
                    <dd><input type="text" name="country" value="<?php echo h($author['country']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Email:</dt>
                    <dd><input type="text" name="email" value="<?php echo h($author['email']); ?>" /></dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Create author" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>