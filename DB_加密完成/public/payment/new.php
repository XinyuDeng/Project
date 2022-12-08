<?php
require_once('../../private/initialize.php');


if(is_post_request()) {
    $pay = [];
    $pay['pay_date'] = $_POST['pay_date'] ?? '';
    $pay['amount'] = $_POST['amount'] ?? '';
    $pay['method'] = $_POST['method'] ?? '';
    $pay['card_num'] = $_POST['card_num'] ?? '';
    $pay['name_on_card_first'] = $_POST['name_on_card_first'] ?? '';
    $pay['name_on_card_last'] = $_POST['name_on_card_last'] ?? '';
    $pay['expiry_date'] = $_POST['expiry_date'] ?? '';

    $result = insert_payment($pay);
    if($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/payment/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }

} else {
    $pay = [];
    // display the blank form
    $pay['pay_date'] = '';
    $pay['amount'] = '';
    $pay['method'] = '';
    $pay['card_num'] = '';
    $pay['name_on_card_first'] = '';
    $pay['name_on_card_last'] = '';
    $pay['expiry_date'] = '';
}

$payment_set = find_all_payment();
$payment_count = mysqli_num_rows($payment_set) + 1;
mysqli_free_result($payment_set);

?>

<?php $page_title = 'Make Payment'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="payment_content">
    <div class="payment_make">
        <h1>Make a payment</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/payment/new.php'); ?>" method="post">
            <dl>
                <dt>Set Pay Date:</dt>
                <dd><input type="date" name="pay_date" value="<?php echo h($pay['pay_date']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Amount:</dt>
                <dd><input type="number" step="0.01" name="amount" value="<?php echo h($pay['amount']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Method:</dt>
                <dd><input type="text" name="method" value="<?php echo h($pay['method']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Card Number:</dt>
                <dd><input type="text" name="card_num" value="<?php echo h($pay['card_num']); ?>" /></dd>
            </dl>
            <dl>
                <dt>First Name of Cardholder:</dt>
                <dd><input type="text" name="name_on_card_first" value="<?php echo h($pay['name_on_card_first']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Last Name of Cardholder:</dt>
                <dd><input type="text" name="name_on_card_last" value="<?php echo h($pay['name_on_card_last']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Expiry Date:</dt>
                <dd><input type="date" name="expiry_date" value="<?php echo h($pay['expiry_date']); ?>" /></dd>
            </dl>

            <div id="pay_operations">
                <input type="submit" value="Make payment" />
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>