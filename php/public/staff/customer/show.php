<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$customer_id = $_GET['id'] ?? '1'; // PHP > 7.0
$customer = find_customer_by_id($customer_id);

$booklist = find_record_by_customer($customer);

$invoice = find_invoice_by_customer_id($customer_id);

$balance = get_balance($customer);
?>

<?php $page_title = 'Show Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <div class="Customer show">

        <h1>Customer: <?php echo h($customer['first_name']);echo " "; echo h($customer['last_name']); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Phone:</dt>
                <dd><?php echo h($customer['phone']); ?></dd>
            </dl>
            <dl>
                <dt>Email:</dt>
                <dd><?php echo h($customer['email']); ?></dd>
            </dl>
            <dl>
                <dt>ID_type:</dt>
                <dd><?php echo h($customer['id_type']); ?></dd>
            </dl>
            <dl>
                <dt>ID_num:</dt>
                <dd><?php echo h($customer['id_num']); ?></dd>
            </dl>
        </div>

    </div>
    <ul>
        <li><a href="<?php echo url_for('/staff/customer/edit.php?id=' . h($customer['customer_id'])); ?>">Edit</a></li>
        <li><a href="<?php echo url_for('/staff/customer/delete.php?id=' . h($customer['customer_id'])); ?>">Delete</a></li>
    </ul>

    <table class="list">
        <tr>
            <th>customer_id</th>
            <th>room_id</th>
            <th>date</th>
            <th>timeslot</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($record = mysqli_fetch_assoc($booklist)) { ?>
            <tr>
                <td><?php echo h($record['customer_id']); ?></td>
                <td><?php echo h($record['room_id']); ?></td>
                <td><?php echo h($record['date']); ?></td>
                <td><?php echo h($record['timeslot']); ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/services/room/edit.php?id=' . h(u($record['customer_id']))); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/services/room/delete.php?id=' . h(u($record['customer_id']))); ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </table>

    <ul>
        <li><a href="<?php echo url_for('/staff/services/room/create.php'); ?>">Book Room</a></li>
    </ul>

    <table class="list">
        <tr>
            <th>invoice_id</th>
            <th>ren_id</th>
            <th>invoice_date</th>
            <th>invoice_amount</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($record_inv = mysqli_fetch_assoc($invoice)) { ?>
            <tr>
                <td><?php echo h($record_inv['invoice_id']); ?></td>
                <td><?php echo h($record_inv['ren_id']); ?></td>
                <td><?php echo h($record_inv['invoice_date']); ?></td>
                <td><?php echo h($record_inv['invoice_amount']); ?></td>
                <td><a class="action" href="<?php echo url_for('/invoice/show.php?id='
                        . h(u($record_inv['invoice_id']))); ?>">View</a></td>
            </tr>
        <?php } ?>
    </table>

    <dl>
        <dt>Payment Due:</dt>
        <dd><?php echo "$"; echo h($balance); ?></dd>
    </dl>
    <ul>
        <li><a href="<?php echo url_for('/payment/new.php'); ?>">Make a Payment</a></li>
    </ul>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>c