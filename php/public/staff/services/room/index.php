<?php require_once('../../../../private/initialize.php'); ?>

<?php

$room_set = find_all_room();

?>

<?php $page_title = 'Rooms'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
        <div class="Plans listing">
            <h1>Rooms</h1>

            <!--<div class="actions">
      <a class="action" href="<?php echo url_for('/staff/customer/new.php'); ?>">Create New Subject</a>
    </div>-->

            <table class="list">
                <tr>
                    <th>Room_id</th>
                    <th>Capacity</th>
                </tr>

                <?php while($room = mysqli_fetch_assoc($room_set)) { ?>
                    <tr>
                        <td><?php echo h($room['room_id']); ?></td>
                        <td><?php echo h($room['capacity']); ?></td>
                    </tr>
                <?php } ?>
            </table>

            <ul>
                <li><a href="<?php echo url_for('/staff/customer/login_ui.php'); ?>">Book a room</a></li>
                <li><a href="<?php echo url_for('/staff/customer/new.php'); ?>">Not A Customer? Register</a></li>
            </ul>

            <?php
            mysqli_free_result($room_set);
            ?>
        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>