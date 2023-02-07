<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="<?php echo site_url("inscriptionController/insert"); ?>" method="post">
        <div>
            <label for="">Nom: </label>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="">Email: </label>
            <input type="email" name="mail">
        </div>
        <div>
            <label for="">Password: </label>
            <input type="text" name="password">
        </div>
        <p><input type="submit" value="Inscription"></p>
    </form>
</body>
</html>