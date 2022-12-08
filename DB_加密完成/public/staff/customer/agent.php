<?php
require_once('../../../private/initialize.php');
$get_id = $_GET['id'] ?? '1'; // PHP > 7.0
$id = intval($get_id);

$agent = [];
if(is_post_request()) {
    $agent['agent_name'] = $_POST['agent_name'] ?? '';
    $agent['web'] = $_POST['web'] ?? '';
    $agent['phone'] = $_POST['phone'] ?? '';
    $agent['customer_id'] = $id;

    $result = insert_agent($agent);
    if($result === true) {
        redirect_to(url_for('/staff/customer/show.php?id=' . $agent['customer_id'] = $id));
    } else {
        $errors = $result;
    }

} else {
    // display the blank form
    $agent['agent_name'] = '';
    $agent['web'] = '';
    $agent['phone'] = '';
    $agent['customer_id'] = '';
}

?>

<?php $page_title = 'Agent'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="agent_content">
    <div class="agent_new">
        <h1>Agent Information</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/staff/customer/agent.php?id=' . $id); ?>" method="post">
            <dl>
                <dt>Agent Name:</dt>
                <dd><input type="text" name="agent_name" value="<?php echo h($agent['agent_name']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Website:</dt>
                <dd><input type="text" name="web" value="<?php echo h($agent['web']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Phone:</dt>
                <dd><input type="text" name="phone" value="<?php echo h($agent['phone']); ?>" /></dd>
            </dl>

            <div id="operations">
                <input type="submit" value="submit" />
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

