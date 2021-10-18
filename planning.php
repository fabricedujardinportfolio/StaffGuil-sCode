<?php
if (isset($_GET['page-rental']) && !empty($_GET['page-rental'])) {
    $currentPage = (int) strip_tags($_GET['page-rental']);
} else {
    $currentPage = 1;
}
require './helpers/Database.php';
require './functions.php';
require './classes/Planning.php';
require './classes/Staff.php';
echo template_header('See the plan of the week', 'rubrique3');
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
    } else {
        # Je montre le site en production
        $plannings = Planning::all();
    ?>
        <div class="container-fluid">
            <div class="row">
                <section class="pt-5 mt-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" onclick="location.href='addPlanning.php';">Rajouter un planning</button>                                    
                                </div>
                                <div class="frmSearch">
                                    <label for="search-box">La recherche doit se faire par le début de la semaine jusqu'a le dernier jours exemple :<br><strong>10-01-21/05-01-21</strong> </label>
                                    <input type="text" id="search-box" class="form-control" placeholder="Recherche format 10-01-21/15-01-21" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="container">
                        <h1>Le planning de la semaine</h1>
                    </div>
                </section>
                <section id="suggesstion-box"></section>
            </div>
        </div>
    <?php
    }
    ?>
    <script>
        // AJAX call for autocomplete 
        $(document).ready(function() {
            $("#search-box").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/API/ajaxStaffByWeek.php",
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
    </script>
<?php endif;
