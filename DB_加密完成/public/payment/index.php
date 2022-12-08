<?php require_once('../../private/initialize.php'); ?>

<?php

$payment_set = find_all_payment();

?>

<?php $page_title = 'Payments'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="Plans listing">
        <h1>Payment Record</h1>

        <table class="list">
            <tr>
                <th>payment id</th>
                <th>first name</th>
                <th>last name</th>
                <th>method</th>
                <th>card number</th>
                <th>amount</th>
                <th>pay_date</th>
            </tr>

            <?php while($payment = mysqli_fetch_assoc($payment_set)) { ?>
                <tr>
                    <td><?php echo h($payment['payment_id']); ?></td>
                    <td><?php echo h($payment['name_on_card_first']); ?></td>
                    <td><?php echo h($payment['name_on_card_last']); ?></td>
                    <td><?php echo h($payment['method']); ?></td>
                    <td><?php echo h($payment['card_num']); ?></td>
                    <td><?php echo h($payment['amount']); ?></td>
                    <td><?php echo h($payment['pay_date']); ?></td>
                </tr>
            <?php } ?>

        </table>

        <?php
        mysqli_free_result($payment_set);
        ?>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>