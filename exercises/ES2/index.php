<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css"> <!-- Link exterbal css-->
    <title>Translate</title>
</head>
<html>
<body>
    <?php // Hard coding data
        $words = array(
            "cane"=>"dog", 
            "gatto"=>"cat", 
            "pane"=>"bread", 
            "tastiera"=>"keyboard", 
            "zaino"=>"bag"
        );
    ?>
    <div class="container"> 
        <form action="index.php" method="get">
            <select name="word">
                <?php foreach($words as $word => $value) ?>
                <option value=<?php echo $value;?>> <?php echo $word; ?></option>      
            </select>
            <button type="submit">Invia</button>
        </form>
        
        <?php  if (isset($_GET['word'])): // Se $_GET['word'] è settata stampa ?>    
            <div class="information-box">
                La tua parola = <?php echo $_GET['word'];// Array super global get ?> 
            </div>
        <?php endif;?>
    </div>     
    <script src="./js/script.js"></script>
</body>
</html>