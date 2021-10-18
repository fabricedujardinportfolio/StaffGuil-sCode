<?php
require '../helpers/Database.php';
require '../functions.php';
require '../classes/Staff.php';
require '../classes/Week.php';
if (!empty($_POST["keyword"])) {
    $key = $_POST["keyword"];
    $plannings = Week::readBySemaine($key);
    $countNumberPlaningReturn = count($plannings);
    if ($countNumberPlaningReturn == 0) {
?>
        <section>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#Semaine n°X</th>
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
                    <tr>
                        <th colspan="17">Aucun résultat correspondant à vos critères de recherche</th>
                    </tr>
                </tbody>
            </table>
        </section>


        <?php
    } else {
        # code...

        if (!empty($plannings)) {
        ?>
            <ul id="planning-list">
                <?php
                foreach ($plannings as $planning) {
                ?>
                    <section>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#Semaine n°<?php echo $planning["week_semaine"]; ?> </th>
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
                                            <?php echo $planning['week_semaine']; ?>
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
                                        ?>
                                            <td class="bg-success">
                                                <?php echo $planning['week_monday_afternoon']; ?><?php echo $countClock; ?>
                                                <?php echo $countClock; ?>
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
                                    $countClock = 7;
                                }
                                ?>
                            </tbody>
                        </table>
                    </section>
                <?php break;
                } ?>
            </ul>
<?php }
    }
} ?>