<?php
    if(isset($_GET['mailError'])){
        $error = "Adresse email invalide";
    }
    if(isset($_GET['Mdperror'])){
        $error = "Mot de passe incorrect";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5/css/all.min.css') ?>">
    <title>login</title>
</head>
<body>
    <?php 
        if(isset($error)){ ?>
            <div class="erreur"><?php echo $error; ?></div>
        <?php }
    ?>
    <div class="container" id="container">
        <!-- SIGN-UP -->
        <div class="form-container sign-up-container">
            <form action="<?php echo site_url("inscriptionController/insert"); ?>" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="nom" />
                <input type="email" placeholder="Email" name="mail"/>
                <input type="password" placeholder="Password" name="password" />
                <button>Sign Up</button>
            </form>
        </div>
        <!-- SIGN-UP -->

        <!-- SIGN-IN -->
        <div class="form-container sign-in-container">
            <form action="<?php echo site_url("loginController/connexion"); ?>"  method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="mail" value="<?php if(isset($_GET['mail'])) echo $_GET['mail']; ?>"/>
                <input type="password" placeholder="Password" name="password" value="<?php if(isset($_GET['mdp'])) echo $_GET['mdp']; ?>"/>
                <a href="<?php echo site_url('loginController/forgotPassword'); ?>">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
        <!-- SIGN-IN -->
    </div>

    <script src="<?php echo site_url('assets/js/login.js'); ?>"></script>
</body>
</html>