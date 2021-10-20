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
require './classes/Week.php';
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
$travaux = 0;
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
                    <label for="semaine">#Semaine n° Exemple : 10-05-21/15-05-21</label>
                    <input type="text" class="form-control" id="semaine" aria-describedby="semaineHelp" placeholder="10-01-21/17-01-21" name="week_semaine" required>
                    <small id="semaineHelp" class="form-text text-muted">
                        Il est important de rentré le méme format demander 
                        pour que la semaina rajouter s'affiche dans les 
                        résultats de recherche.
                    </small>
                </div>
                <div class="form-group">
                    <label for="week_monday_morning">Lundi matin</label>
                    <select  id="week_monday_morning" aria-describedby="week_monday_morningHelp" name="week_monday_morning" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_monday_afternoon">Lundi aprés-midi</label>
                    <select  id="week_monday_afternoon" aria-describedby="week_monday_afternoonHelp" name="week_monday_afternoon" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_tuesday_morning">Mardi matin</label>
                    <select  id="week_tuesday_morning" aria-describedby="week_tuesday_morningHelp" name="week_tuesday_morning" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_tuesday_afternoon">Mardi aprés-midi</label>
                    <select  id="week_tuesday_afternoon" aria-describedby="week_tuesday_afternoonHelp" name="week_tuesday_afternoon" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_wednesday_morning">Mercredi matin</label>
                    <select  id="week_wednesday_morning" aria-describedby="week_wednesday_morningHelp" name="week_wednesday_morning" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_wednesday_afternoon">Mercredi aprés-midi</label>
                    <select  id="week_wednesday_afternoon" aria-describedby="week_wednesday_afternoonHelp" name="week_wednesday_afternoon" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_thursday_morning">Jeudi matin</label>
                    <select  id="week_thursday_morning" aria-describedby="week_thursday_morningHelp" name="week_thursday_morning" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_thursday_afternoon">Jeudi aprés-midi</label>
                    <select  id="week_thursday_afternoon" aria-describedby="week_thursday_afternoonHelp" name="week_thursday_afternoon" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_friday_morning">Vendredi matin</label>
                    <select  id="week_friday_morning" aria-describedby="week_friday_morningHelp" name="week_friday_morning" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_friday_afternoon">Vendredi aprés-midi</label>
                    <select  id="week_friday_afternoon" aria-describedby="week_friday_afternoonHelp" name="week_friday_afternoon" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_saturday_morning">Samedi matin</label>
                    <select  id="week_saturday_morning" aria-describedby="week_saturday_morningHelp" name="week_saturday_morning" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_saturday_afternoon">Samedi aprés-midi</label>
                    <select  id="week_saturday_afternoon" aria-describedby="week_saturday_afternoonHelp" name="week_saturday_afternoon" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_sunday_morning">Dimanche matin</label>
                    <select  id="week_sunday_morning" aria-describedby="week_sunday_morningHelp" name="week_sunday_morning" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week_sunday_afternoon">Dimanche aprés-midi</label>
                    <select  id="week_sunday_afternoon" aria-describedby="week_sunday_afternoonHelp" name="week_sunday_afternoon" required>
                        <option value="abs">ABSENT</option>
                        <option value="pre">PRESENT</option>
                    </select>
                </div>
                <div class="form-group">       
                    <div class="frmSearch">
                        <input type="text" class="d-none" id="staff_id" name="staff_id">
                        <label for="search-box">Séléctionner votre employer</label>
                        <input type="text" id="search-box" class="form-control" placeholder="DUJARDIN" required autocomplete="off" />
                    </div>             
                    <section id="suggesstion-box"></section>
                </div>
                
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php
//Rajout d'une semaine
if ($_POST) {
    if ($_POST == true) {        
        // Récupération des données envoyer.
        $week_semaine = $_POST['week_semaine'];
        $week_monday_morning = $_POST['week_monday_morning'];
        $week_monday_afternoon = $_POST['week_monday_afternoon'];

        $week_tuesday_morning = $_POST['week_tuesday_morning'];
        $week_tuesday_afternoon = $_POST['week_tuesday_afternoon'];
        
        $week_wednesday_morning = $_POST['week_wednesday_morning'];
        $week_wednesday_afternoon = $_POST['week_wednesday_afternoon'];

        $week_thursday_morning = $_POST['week_thursday_morning'];
        $week_thursday_afternoon = $_POST['week_thursday_afternoon'];

        $week_friday_morning = $_POST['week_friday_morning'];
        $week_friday_afternoon = $_POST['week_friday_afternoon'];

        $week_saturday_morning = $_POST['week_saturday_morning'];
        $week_saturday_afternoon = $_POST['week_saturday_afternoon'];

        $week_sunday_morning = $_POST['week_sunday_morning'];
        $week_sunday_afternoon = $_POST['week_sunday_afternoon'];

        $staff_id = $_POST['staff_id'];
        // rajouter d'une semaine.
        $weekAdd = Week::add(
        $week_semaine, 
        $week_monday_morning, 
        $week_tuesday_morning, 
        $week_wednesday_morning,
        $week_thursday_morning,
        $week_friday_morning,
        $week_saturday_morning,
        $week_sunday_morning,

        $week_monday_afternoon, 
        $week_tuesday_afternoon,
        $week_wednesday_afternoon,
        $week_thursday_afternoon,
        $week_friday_afternoon,
        $week_saturday_afternoon,
        $week_sunday_afternoon,

        $staff_id);
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
<script>
        // AJAX call for autocomplete 
        $(document).ready(function() {
            $("#search-box").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/API/allStaff.php",
                    data: 'keyword=' + $(this).val(),
                    beforeSend: function() {
                        $("#search-box").css("background", "#FFF no-repeat 165px");
                    },
                    success: function(data) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    }
                });
            });
        });
        //To select staff name
        function selectstaff(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
            $('#hide1').addClass("d-none");
            $('#container-2').removeClass("d-none");
            $('#hide2').removeClass("d-none");
        };
        //return de id du staff 
        function selectstaffid(val) {
            $("#staff_id").val(val);
        };
    </script>
<?php endif;