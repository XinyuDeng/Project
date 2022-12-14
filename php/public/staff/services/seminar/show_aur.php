<?php require_once('../../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$invitation_id = $_GET['id'] ?? '1'; // PHP > 7.0
$semi_aur = find_semi_aur_by_invitation_id($invitation_id);

?>

<?php $page_title = 'Show Semi_Aur'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <!-- <a class="back-link" href="<?php echo url_for('/staff/author/index.php'); ?>">&laquo; Back to List</a>
-->
        <div class="Customer show">

            <h1>Aur_id: <?php echo h($semi_aur['aur_id']); ?></h1>

            <div class="attributes">
                <dl>
                    <dt>Invitation_id:</dt>
                    <dd><?php echo h($semi_aur['invitation_id']); ?></dd>
                </dl>
                <dl>
                    <dt>Event_id:</dt>
                    <dd><?php echo h($semi_aur['event_id']); ?></dd>
                </dl>
            </div>

        </div>
        <ul>
            <li><a href="<?php echo url_for('/staff/services/seminar/new.php?id=' . h($semi_aur['$invitation_id'])); ?>">Keep Booking</a></li>
            <li><a href="<?php echo url_for('/staff/services/seminar/edit.php?id=' . h($semi_aur['$invitation_id'])); ?>">Edit</a></li>
            <li><a href="<?php echo url_for('/staff/services/seminar/delete.php?id=' . h($semi_aur['$invitation_id'])); ?>">Delete</a></li>
        </ul>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>