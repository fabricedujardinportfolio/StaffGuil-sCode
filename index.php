<?php
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
include './helpers/Database.php';
require './functions.php';
require './classes/Staff.php';
echo template_header('Accueil', 'rubrique1');
?>
<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) :
?>
<?php
    header("refresh:0; login.php");
else :
    $Staffs = Staff::all();    
?>
<section class="pt-5 mt-3">
    <div class="container">
        <h1>Tous les Personnels</h1>
    </div>
</section>
<section>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#Index</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Télèphone</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($Staffs as $Staff) {
                    # Renvoie tous les Personnels.  
                    $StaffsCount = count($Staffs);
                    $i = $StaffsCount;
                    while ($i<= $StaffsCount) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $Staff['staff_name'];?></td>
                        <td><?php echo $Staff['staff_firstName'];?></td>
                        <td><?php echo $Staff['staff_email'];?></td>
                        <td><?php echo $Staff['staff_phone'];?></td>
                    </tr>
                    <?php   
                        $i++;       
                    }
                }
            ?>
        </tbody>
    </table>
</section>
<?php endif;