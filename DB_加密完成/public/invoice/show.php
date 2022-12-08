<?php require_once('../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$invoice_num = $_GET['id'] ?? '1'; // PHP > 7.0
$invoice = find_invoice_by_id($invoice_num);

$customer = find_customer_by_invoice($invoice);
$insurance = find_insurance_by_invoice($invoice);
?>

<?php $page_title = 'Show Invoice'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <div class="show invoice">

        <h1>Invoice Number: <?php echo h($invoice['invoice_num']); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Customer Name:</dt>
                <dd><?php echo h($customer['first_name']);echo " "; echo h($customer['last_name']); ?></dd>
            </dl>
            <dl>
                <dt>Insurance:</dt>
                <dd><?php echo h($insurance['insur_name']); ?></dd>
            </dl>

            <dl>
                <dt>Invoice Date:</dt>
                <dd><?php echo h($invoice['invoice_date']); ?></dd>
            </dl>
            <dl>
                <dt>Amount</dt>
                <dd><?php echo h($invoice['invoice_amount']); ?></dd>
            </dl>
        </div>

    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>