<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    $org = [];
    $org['name'] = $_POST['name'] ?? '';
    $org['password'] = $_POST['password'] ?? '';

    $result = insert_organization($org);
    if($result === true) {
        $hash = password_hash($org['password'], PASSWORD_BCRYPT);
        $new_id = mysqli_insert_id($db);
        insert_organization_hash($new_id, $org['password'], $hash);
        redirect_to(url_for('/staff/org/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }


} else {
    // display the blank form
    $org = [];
    $org['name'] = $_POST['name'] ?? '';
    $org['password'] = $_POST['password'] ?? '';
}

$org_set = find_all_organization();
$org_count = mysqli_num_rows($org_set) + 1;
mysqli_free_result($org_set);

?>

<?php $page_title = 'Create Organization'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <div class="organization new">
            <h1>Create organization</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/org/new.php'); ?>" method="post">
                <dl>
                    <dt>Name:</dt>
                    <dd><input type="text" name="name" value="<?php echo h($org['name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Set Password:</dt>
                    <dd><input type="text" name="password" value="<?php echo h($org['password']); ?>" /></dd>
                </dl>

                <div id="operations">
                    <input type="submit" value="Create organization" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>