<?php require_once('../../private/initialize.php'); ?>

<?php
$passenger_id = $_GET['id'] ?? '1'; // PHP > 7.0
$passenger = find_passenger_by_id($passenger_id);

?>

<?php $page_title = 'Passenger Detail'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <div class="passenger show">

            <h1>Passenger: <?php echo h($passenger['first_name']);echo " "; echo h($passenger['last_name']); ?></h1>

            <div class="attributes">
                <dl>
                    <dt>Date of Birth:</dt>
                    <dd><?php echo h($passenger['DOB']); ?></dd>
                </dl>
                <dl>
                    <dt>Nationality:</dt>
                    <dd><?php echo h($passenger['nationality']); ?></dd>
                </dl>
                <dl>
                    <dt>Gender:</dt>
                    <dd><?php echo h($passenger['gender']); ?></dd>
                </dl>
                <dl>
                    <dt>Passport:</dt>
                    <dd><?php echo h($passenger['passport_num']); ?></dd>
                </dl>

            </div>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>