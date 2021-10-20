<?php
require '../helpers/Database.php';
require '../functions.php';
require '../classes/Staff.php';
if (!empty($_POST["keyword"])) {
    $key = $_POST["keyword"];
    $querys = Staff::readByLike($key);
    if (!empty($querys)) {
?>
        <ul id="country-list">
            <?php
            foreach ($querys as $staff) {
            ?>
                <li onClick="selectstaff('<?php echo $staff["staff_name"]; ?> <?php echo $staff["staff_firstName"]; ?>');selectstaffid('<?php echo $staff["staff_id"]; ?>');"><?php echo $staff["staff_name"]; ?> <?php echo $staff["staff_firstName"]; ?></li>
            <?php } ?>
        </ul>
<?php }
} ?>