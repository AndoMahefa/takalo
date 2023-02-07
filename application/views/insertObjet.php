<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">
    <title>Document</title>
</head>
<body>
<form action="<?php echo site_url('insertObjetController/insertObject') ?>" method="POST" enctype="multipart/form-data">
    <div id="background">
    </div>
<div id="container">
    <div id="container1">

        <div id="sous-container12">
            <p>Insert Object</p>
        </div>

        <div id="sous-container11">
            <div id="sous-container111">
                <input type="text" class="input" name="nom" placeholder="Name">
            </div>
            <div id="sous-container112">
                <input type="text" class="input" name="description" placeholder="Déscription">
            </div>

        </div>

        <div id="sous-container11">
            <div id="sous-container111">
                <input type="number" class="input" name="prix" placeholder="Prix Unitaire">
            </div>
            <div id="sous-container112">
                <select name="category" id="" class="input">
                    <?php for($i = 0;$i<count($category); $i++) { ?>
                        <option value="<?php echo $category[$i]['id'] ?>"><?php echo $category[$i]['nom'] ?></option>
                    <?php } ?>
                    <option value="" disable selected hidden>Catégorie</option>
                </select>
            </div>
            
        </div>
        <div id="files">
        <input type="file" name="files[]" class="file" multiple>
    </div>
          
        <div id="button">
            <input type="submit" id="lab" class="input" value="Send Request">
        </div>
    </div>

    <div id="container2">
        <div id="sous-container11">
            <p>Information+</p>
        </div>

        <div id="sous-container12">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, debitis</p>
        </div>
        <div id="sous-container13">
            <p>+06245976234</p>
            <p>+06215894751</p>
            <p>+06032194921</p>
        </div>
    </div>
</div>
</form>
</body>
</html>