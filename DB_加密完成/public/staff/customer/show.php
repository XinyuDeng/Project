<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$customer_id = $_GET['id'] ?? '1'; // PHP > 7.0
$customer = find_customer_by_id($customer_id);

$shoplist = find_record_by_customer($customer);

$invoice = find_invoice_by_customer_id($customer);

$balance = get_balance($customer);

?>

<?php $page_title = 'Show Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <div class="Customer show">

    <h1>Customer: <?php echo h($customer['first_name']);echo " "; echo h($customer['last_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Nationality:</dt>
        <dd><?php echo h($customer['nationality']); ?></dd>
      </dl>
      <dl>
        <dt>Gender:</dt>
        <dd><?php echo h($customer['gender']); ?></dd>
      </dl>
      <dl>
        <dt>Address:</dt>
        <dd><?php echo h($customer['addr_stree']); ?></dd>
      </dl>
      <dl>
        <dt>City:</dt>
        <dd><?php echo h($customer['addr_city']); ?></dd>
      </dl>
      <dl>
        <dt>State:</dt>
        <dd><?php echo h($customer['addr_state']); ?></dd>
      </dl>
      <dl>
        <dt>Zipcode:</dt>
        <dd><?php echo h($customer['zipcode']); ?></dd>
      </dl>
      <dl>
        <dt>Email:</dt>
        <dd><?php echo h($customer['email']); ?></dd>
      </dl>
      <dl>
        <dt>Contact Number:</dt>
        <dd><?php echo h($customer['contact_num']); ?></dd>
      </dl>

        <dl>
            <dt>Emergency Contact Name:</dt>
            <dd><?php echo h($customer['eme_first_name']);echo " "; echo h($customer['eme_last_name']); ?></dd>
        </dl>

        <dl>
            <dt>Emergency Contact Number:</dt>
            <dd><?php echo h($customer['eme_contact_num']); ?></dd>
        </dl>
    </div>

  </div>
  <ul>
    	<li><a href="<?php echo url_for('/staff/customer/edit.php?id=' . h($customer['customer_id'])); ?>">Edit</a></li>
    	<li><a href="<?php echo url_for('/staff/customer/delete.php?id=' . h($customer['customer_id'])); ?>">Delete</a></li>
        <li><a href="<?php echo url_for('/passenger/new.php?id=' . h($customer['customer_id'])); ?>">Add Passenger</a></li>
   </ul>
   
   <table class="list">
  	  <tr>
        <th>insurance name</th>
        <th>passenger first name</th>
  	    <th>passenger last name</th>
  	    <th>flight</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($record = mysqli_fetch_assoc($shoplist)) { ?>
        <tr>
          <td><?php echo h($record['insur_name']); ?></td>
    	  <td><?php echo h($record['pfname']); ?></td>
    	  <td><?php echo h($record['plname']); ?></td>
    	  <td><?php echo h($record['flight']); ?></td>
    	  <td><a class="action" href="<?php echo url_for('/insurance_plan/edit.php?id=' . h(u($record['id']))); ?>">Edit</a></td>
        <td><a class="action" href="<?php echo url_for('/insurance_plan/delete.php?id=' . h(u($record['id']))); ?>">Delete</a></td>
          </tr>
      <?php } ?>

  	</table>

    <ul>
        <li><a href="<?php echo url_for('/insurance_plan/create.php'); ?>">Shop Insurance</a></li>
    </ul>

    <table class="list">
        <tr>
            <th>invoice number</th>
            <th>invoice date</th>
            <th>amount</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($record_inv = mysqli_fetch_assoc($invoice)) { ?>
            <tr>
                <td><?php echo h($record_inv['invoice_num']); ?></td>
                <td><?php echo h($record_inv['invoice_date']); ?></td>
                <td><?php echo h($record_inv['invoice_amount']); ?></td>
                <td><a class="action" href="<?php echo url_for('/invoice/show.php?id='
                        . h(u($record_inv['invoice_num']))); ?>">View</a></td>
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

<?php include(SHARED_PATH . '/staff_footer.php'); ?>