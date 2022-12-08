<?php require_once('../../private/initialize.php'); ?>

<?php

$invoice_set = find_all_invoice();

?>

<?php $page_title = 'Invoice'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="invoice listing">
        <h1>Invoice</h1>

        <table class="list">
            <tr>
                <th>invoice number</th>
                <th>invoice date</th>
                <th>&nbsp;</th>
            </tr>

            <?php while($invoice = mysqli_fetch_assoc($invoice_set)) { ?>
                <tr>
                    <td><?php echo h($invoice['invoice_num']); ?></td>
                    <td><?php echo h($invoice['invoice_date']); ?></td>
                    <td><a class="action" href="<?php echo url_for('/invoice/show.php?id=' . h(u($invoice['invoice_num']))); ?>">View</a></td>
                </tr>
            <?php } ?>
        </table>

        <?php
        mysqli_free_result($invoice_set);
        ?>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
