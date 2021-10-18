<?php
if (isset($_GET['page-rental']) && !empty($_GET['page-rental'])) {
    $currentPage = (int) strip_tags($_GET['page-rental']);
} else {
    $currentPage = 1;
}
require './helpers/Database.php';
require './functions.php';
require './classes/Category.php';
require './classes/Film.php';
require './classes/Actor.php';
require './classes/Rental.php';
require './classes/Staff.php';
require './classes/Store.php';
require './classes/Customer.php';
require './classes/Inventory.php';
require './classes/Address.php';
echo template_header('Add Planning', 'rubrique222');
?>
<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) :
?>
<?php
    header("refresh:0; /login.php");
else :

?>
<style>
    body {
        text-align: center;
        padding: 150px;
    }

    h1 {
        font-size: 50px;
    }

    body {
        font: 20px Helvetica, sans-serif;
        color: #333;
    }

    article {
        display: block;
        text-align: left;
        width: 650px;
        margin: 0 auto;
    }

    a {
        color: #dc8100;
        text-decoration: none;
    }

    a:hover {
        color: #333;
        text-decoration: none;
    }
</style>
<?php
$travaux = 1;
if ($travaux == 1) {
    # Je montre le site en travaux 
    ?>
<article>
    <h1>Nous reviendrons bientôt!</h1>
    <div>
        <p>Désolé pour le dérangement, mais nous effectuons des travaux de maintenance en ce moment. Si vous en avez
            besoin, vous pouvez toujours <a href="mailto:f.dujardin@cci-formation.nc">me contacter</a>, sinon À bientôt
        </p>
        <p>&mdash; Admin Fabrice</p>
    </div>
</article>
<?php 
}
else {
    # Je montre le site en production 
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post" name="fo">
                <div class="form-group">
                    <label for="emailStaff">Address email du personel</label>
                    <input type="email" class="form-control" id="emailStaff" aria-describedby="emailHelp"
                        placeholder="Entrer l'email" name="staff_email" required>
                    <small id="emailHelp" class="form-text text-muted">Nous ne devons jamais partager l'e-mail avec quelqu'un d'autre.</small>
                </div>
                <div class="form-group">
                    <label for="nameStaff">Nom du personel</label>
                    <input type="text" class="form-control" id="nameStaff" aria-describedby="nameHelp"
                        placeholder="Entrer le nom" name="staff_name" required>
                    <small id="nameHelp" class="form-text text-muted">Exemple : DUJARDIN</small>
                </div>
                <div class="form-group">
                    <label for="firstnameStaff">Prénom du personel</label>
                    <input type="text" class="form-control" id="firstnameStaff" aria-describedby="firstnameHelp"
                        placeholder="Entrer le Prénom" name="staff_firstName" required>
                    <small id="firstnameHelp" class="form-text text-muted">Exemple : Fabrice</small>
                </div>
                <div class="form-group">
                    <label for="phoneStaff">Télèphone du personel</label>
                    <input type="text" class="form-control" id="phoneStaff" aria-describedby="phoneHelp"
                        placeholder="Entrer le télèphone" name="staff_phone" required>
                    <small id="phoneHelp" class="form-text text-muted">Exemple : 72.01.65</small>
                </div>
                <div class="form-group">
                    <label for="passwordStaff">Mot de passe</label>
                    <input type="password" class="form-control" id="passwordStaff" placeholder="Mot de passe"  aria-describedby="passwordHelp" name="staff_password" required>
                    <small id="passwordHelp" class="form-text text-muted">Minimum 6 caractére</small>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php
//Rajout d'une réservation
if ($_POST) {
    if ($_POST == true) {        
        // Récupération des données envoyer.
        $staff_name = $_POST['staff_name'];
        $staff_firstName = $_POST['staff_firstName'];
        $staff_email = $_POST['staff_email'];
        $staff_password = $_POST['staff_password'];
        $staff_phone = $_POST['staff_phone'];
        // rajouter d'un personel résa.
        $staffAdd = Staff::add($staff_name, $staff_firstName, $staff_email, $staff_password, $staff_phone);
        echo "<div class='alert alert-success'>
            <strong>Réservation réussit</strong>
        </div>";
    } else {
        echo "<div class='alert alert-danger'>
            <strong>Erreur sur la Réservation</strong>
        </div>";
    }
}
}    
?>
<?php endif;