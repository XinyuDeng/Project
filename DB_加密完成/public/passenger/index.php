<?php require_once('../../private/initialize.php'); ?>

<?php

$passenger_set = find_all_passenger();

?>

<?php $page_title = 'Passengers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
        <div class="list_passenger">
            <h1>Passenger</h1>

            <table class="list">
                <tr>
                    <th>passenger id</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>Date of Birth</th>
                    <th>Passport Number</th>
                    <th>Passport Expiry Date</th>
                    <th>&nbsp;</th>
                </tr>

                <?php while($passenger = mysqli_fetch_assoc($passenger_set)) { ?>
                    <tr>
                        <td><?php echo h($passenger['passenger_id']); ?></td>
                        <td><?php echo h($passenger['first_name']); ?></td>
                        <td><?php echo h($passenger['last_name']); ?></td>
                        <td><?php echo h($passenger['DOB']); ?></td>
                        <td><?php echo h($passenger['passport_num']); ?></td>
                        <td><?php echo h($passenger['passport_expiry_date']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/passenger/show.php?id=' . h(u($passenger['passenger_id']))); ?>">View</a></td>
                    </tr>
                <?php } ?>

            </table>

            <?php
            mysqli_free_result($passenger_set);
            ?>
        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


