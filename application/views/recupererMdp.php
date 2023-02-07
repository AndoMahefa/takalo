<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Mot de passe oublié</h2>
    <form action="<?php echo site_url('loginController/resetPassword'); ?>" method="post">
        <p>Nouveau mot de passe: <input type="password" name="password"></p>
        <p>Confirmer le mot de passe: <input type="password" name="confirmation"></p>
        <p><input type="submit" value="confirmer"></p>
    </form>
</body>
</html>