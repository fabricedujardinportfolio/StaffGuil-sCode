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
                        <h1>Le planning de la semaine</h1>
                    </div>
                </section>
                <section>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Semaine n°</th>
                                <th scope="col">Personell</th>
                                <th scope="col">Lundi matin</th>
                                <th scope="col">Lundi midi</th>
                                <th scope="col">Mardi matin</th>
                                <th scope="col">Mardi midi</th>
                                <th scope="col">Mercredi matin</th>
                                <th scope="col">Mercredi midi</th>
                                <th scope="col">Jeudi matin</th>
                                <th scope="col">Jeudi midi</th>
                                <th scope="col">Vendredi matin</th>
                                <th scope="col">Vendredi midi</th>
                                <th scope="col">Samedi matin</th>
                                <th scope="col">Samedi midi</th>
                                <th scope="col">Dimanche matin</th>
                                <th scope="col">Dimanche midi</th>
                                <th scope="col">Demi journée de présence au travail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $PlanningsCount = count($plannings);
                            $i = $PlanningsCount;
                            $countClock = 7;
                            foreach ($plannings as $planning) {
                                # Renvoie tous les Personnels.                      
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $planning['week_semaine'];?>
                                    </th>
                                    <!-- //Le personell -->
                                    <td>
                                        <?php $stafName = Staff::read((int)$planning['staff_id']);
                                        echo $stafName['staff_name'], ' ', $stafName['staff_firstName']; ?>
                                    </td>
                                    <!-- //Lundi matin-->
                                    <?php
                                    if ($planning['week_monday_morning'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_monday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_monday_morning'] == "pre") {
                                        # code..
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_monday_morning']; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Lundi midi-->
                                    <?php
                                    if ($planning['week_monday_afternoon'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_monday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_monday_afternoon'] == "pre") {
                                        # code...
                                        $countClock = $countClock + 0.5;
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_monday_afternoon']; ?><?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Mardi matin-->
                                    <?php
                                    if ($planning['week_tuesday_morning'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_tuesday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_tuesday_morning'] == "pre") {
                                        # code...
                                        $countClock = $countClock + 0.5;
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_tuesday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Mardi midi-->
                                    <?php
                                    if ($planning['week_tuesday_afternoon'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_tuesday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_tuesday_afternoon'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_tuesday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Mercredi matin-->
                                    <?php
                                    if ($planning['week_wednesday_morning'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_wednesday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_wednesday_morning'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_wednesday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Mercredi midi-->
                                    <?php
                                    if ($planning['week_wednesday_afternoon'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_wednesday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_wednesday_afternoon'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_wednesday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Jeudi matin-->
                                    <?php
                                    if ($planning['week_thursday_morning'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_thursday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_thursday_morning'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_thursday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Jeudi midi-->
                                    <?php
                                    if ($planning['week_thursday_afternoon'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_thursday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_thursday_afternoon'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_thursday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Vendredi matin-->
                                    <?php
                                    if ($planning['week_friday_morning'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_friday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_friday_morning'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_friday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Vendredi midi-->
                                    <?php
                                    if ($planning['week_friday_afternoon'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_friday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_friday_afternoon'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_friday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Samedi matin-->
                                    <?php
                                    if ($planning['week_saturday_morning'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_saturday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_saturday_morning'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_saturday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Samedi midi-->
                                    <?php
                                    if ($planning['week_saturday_afternoon'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_saturday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_saturday_afternoon'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_saturday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Dimanche matin-->
                                    <?php
                                    if ($planning['week_sunday_morning'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_sunday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_sunday_morning'] == "pre") {
                                        # code...
                                        $countClock = $countClock + 0.5;
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_sunday_morning']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- //Dimanche midi-->
                                    <?php
                                    if ($planning['week_sunday_afternoon'] == "abs") {
                                        # code...
                                        $countClock = $countClock - 0.5;
                                    ?>
                                        <td class="bg-danger">
                                            <?php echo $planning['week_sunday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    } else if ($planning['week_sunday_afternoon'] == "pre") {
                                        # code...
                                    ?>
                                        <td class="bg-success">
                                            <?php echo $planning['week_sunday_afternoon']; ?>
                                            <?php echo $countClock; ?>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <td>
                                        <?php echo $countClock; ?>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    <?php
    }
    ?>
<?php endif;
