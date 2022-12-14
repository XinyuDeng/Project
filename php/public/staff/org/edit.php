<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/org/index.php'));
}
$spon_id = $_GET['id'];

if(is_post_request()) {

    // Handle form values sent by new.php

    $org = [];
    $org['spon_id'] = $spon_id;
    $org['name'] = $_POST['name'] ?? '';
    $org['password'] = $_POST['password'] ?? '';


    $result = update_org($org);
    if($result === true) {
        redirect_to(url_for('/staff/org/show.php?id=' . $spon_id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }

} else {

    $org = find_organization_by_id($spon_id);

}

$org_set = find_all_organization();
$org_count = mysqli_num_rows($org_set);
mysqli_free_result($org_set);

?>

<?php $page_title = 'Edit organization'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <!--<a class="back-link" href="<?php echo url_for('/staff/org/index.php'); ?>">&laquo; Back to List</a>
-->
        <div class="indi edit">
            <h1>Edit organization</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/org/edit.php?id=' . h(u($spon_id))); ?>" method="post">
                <dl>
                    <dt>Name:</dt>
                    <dd><input type="text" name="name" value="<?php echo h($org['name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Set Password:</dt>
                    <dd><input type="text" name="password" value="<?php echo h($org['password']); ?>" /></dd>
                </dl>

                <div id="operations">
                    <input type="submit" value="Edit org" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>