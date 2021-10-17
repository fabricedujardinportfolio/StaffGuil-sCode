<?php
require './helpers/Database.php';
require './functions.php';
require './classes/rental.php';
require './classes/Staff.php';

echo template_header('Login', 'login');
if (isset($_REQUEST['valider']))    //button name is "btn_login"
{
    $email        = strip_tags($_REQUEST["email"]);    //textbox name "txt_username_email"
    $password    = strip_tags($_REQUEST["password"]);        //textbox name "txt_password"
    if (empty($email)) {
        $errorMsg[] = "Merci de saisir votre adresse email";    //check "email" textbox not empty
    } else if (empty($password)) {
        $errorMsg[] = "Veuillez entrer un mot de passe";    //check "passowrd" textbox not empty
    } else {
        try {
            var_dump($email);
            $users = Staff::readByEmail($email);
            if ($users > 0)    //check condition database record greater zero after continue
            {
                if ($email == $users["staff_email"]) //check condition user taypable "email" is match from database "email" after continue
                {
                    $_SESSION["active"] = $users["active"];
                    $active = $_SESSION["active"];
                    if ($active == "1") {
                        if ($password == $users["staff_password"]) //check condition user taypable "password" is match from database "password" using password_verify() after continue
                        {
                            $_SESSION["staff_id"] = $users["staff_id"];
                            $staff_id = $_SESSION["staff_id"];

                            $_SESSION["staff_name"] = $users["staff_name"];
                            $staff_name = $_SESSION["staff_name"];

                            $_SESSION["staff_firstName"] = $users["staff_firstName"];
                            $staff_firstName = $_SESSION["staff_firstName"];

                            $_SESSION["staff_email"] = $users["staff_email"];
                            $staff_email = $_SESSION["staff_email"];

                            $_SESSION["loggedIn"] = true;
                            $loginMsg = "Connexion réussie...";        //user login success message
                            header("refresh:2; ../index.php");            //refresh 2 second after redirect to "welcome.php" page
                        } else {
                            $errorMsg[] = "Le mot de passe n'existe pas";
                        }
                    } else {
                        $errorMsg[] = "Vous n'avez pas les droits";
                    }
                } else {
                    $errorMsg[] = "Adresse email invalide";
                }
            } else {
                $errorMsg[] = "Veuillez entrer une adresse email valide ";
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
<!-- SCRIPT ICI -->
</head>

<body>
    <div class="container mt-3 pt-3">
        <div class="container d-flex mt-4 h-mini-90">
            <div class="col-lg-6 m-auto">
                <?php
                if (isset($errorMsg)) {
                    foreach ($errorMsg as $error) {
                ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $error; ?></strong>
                        </div>
                    <?php
                    }
                }
                if (isset($loginMsg)) {
                    ?>
                    <div class="alert alert-success">
                        <strong><?php echo $loginMsg; ?></strong>
                    </div>
                <?php
                }
                ?>
                <form action="" method="post" name="fo">
                    <div class="text-center">
                        <h1><strong class="text-uppercase">Gestion du planning des Personnels</strong></a></h1>
                    </div>
                    <h2 class="h3 mb-3 font-weight-normal text-center">Veuillez vous connecter
                        <hr>
                    </h2>
                    <div class="form-group">
                        <label for="loginEmail" class="pb-1"><strong>Email :</strong></label>
                        <input type="email" class="form-control" id="loginEmail" placeholder="Entrer votre email" name="email">
                    </div>
                    <div class="form-group pt-2">
                        <label for="Passwordid" class="pb-1"><strong>Mot de passe :</strong></label>
                        <input type="password" class="form-control" id="Passwordid" placeholder="Entrer votre mot de passe" name="password">
                    </div>
                    <div class="text-center  mb-3">
                        <button class="btn btn-lg btn btn-primary btn-block mt-4 text-center" type="submit" name="valider" value="S'authentifier" style="background-color:#2e4f9b;color:white;">S'identifier</button>
                    </div>
                </form>