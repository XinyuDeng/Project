<?php require_once('../../private/initialize.php'); ?>

<?php
$payment_id = $_GET['id'] ?? '1'; // PHP > 7.0
$passenger = find_payment_by_id($payment_id);

?>

<?php $page_title = 'Payment Detail'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <div class="payment show">

        <h1>Payment: <?php echo h($passenger['payment_id']); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Name:</dt>
                <dd><?php echo h($passenger['name_on_card_first']);echo " "; echo h($passenger['name_on_card_last']); ?></dd>
            </dl>
            <dl>
                <dt>Method:</dt>
                <dd><?php echo h($passenger['method']); ?></dd>
            </dl>
            <dl>
                <dt>Amount:</dt>
                <dd><?php echo h($passenger['amount']); ?></dd>
            </dl>
            <dl>
                <dt>Pay Date:</dt>
                <dd><?php echo h($passenger['pay_date']); ?></dd>
            </dl>

        </div>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>