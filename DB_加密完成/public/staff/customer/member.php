<?php
require_once('../../../private/initialize.php');
$get_id = $_GET['id'] ?? '1'; // PHP > 7.0
$id = intval($get_id);

//echo ($id);
//echo (gettype($id));
$member = [];
if(is_post_request()) {
    $member['mem_name'] = $_POST['mem_name'] ?? '';
    $member['associated_airline'] = $_POST['associated_airline'] ?? '';
    $member['mem_start_date'] = $_POST['mem_start_date'] ?? '';
    $member['mem_end_date'] = $_POST['mem_end_date'] ?? '';
    $member['customer_id'] = $id;

    $result = insert_member($member);
    if($result === true) {
        redirect_to(url_for('/staff/customer/show.php?id=' . h($member['customer_id'] = $id)));
    } else {
        $errors = $result;
    }

} else {
    // display the blank form
    $member['mem_name'] = '';
    $member['associated_airline'] = '';
    $member['mem_start_date'] = '';
    $member['mem_end_date'] = '';
    $member['customer_id'] = '';
}
//echo ($member['customer_id']);
//echo (gettype($member['customer_id'] ));
//print_r($member);

?>

<?php $page_title = 'Member'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="member_content">
    <div class="member_new">
        <h1>Membership Information</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/staff/customer/member.php?id=' . $id); ?>" method="post">
            <dl>
                <dt>Member Name:</dt>
                <dd><input type="text" name="mem_name" value="<?php echo h($member['mem_name']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Associated Airline:</dt>
                <dd><input type="text" name="associated_airline" value="<?php echo h($member['associated_airline']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Membership Start Date:</dt>
                <dd><input type="date" name="mem_start_date" value="<?php echo h($member['mem_start_date']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Membership End Date:</dt>
                <dd><input type="date" name="mem_end_date" value="<?php echo h($member['mem_end_date']); ?>" /></dd>
            </dl>

            <div id="operations">
                <input type="submit" value="submit" />
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
