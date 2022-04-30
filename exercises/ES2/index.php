<!DOCTYPE html>
<head>

    <!-- Charset and viewport  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link exterbal css-->
    <link rel="stylesheet" href="./style.css">

    <title>Translate</title>
</head>
<body>

    <?php    
        //Hard coding data
        $words = array("cane"=>"dog", "gatto"=>"cat", "pane"=>"bread", "tastiera"=>"keyboard", "zaino"=>"bag");
    ?>

    <div class="container"> 
        <form action="index.php" method="get">
            <select name="word">
            
                <?php
                    //Dynamic option
                    foreach($words as $word => $value)
                        echo ("<option value=\"$value\">$word</option>");
                ?>
            </select>

            <button type="submit">Invia</button>
        </form>


        <?php  if (isset($_GET['word'])):/*<Se $_GET['word'] è settata stampa*/ ?>    
            <div class="information-box">
                    La tua parola = <?php echo $_GET['word'];/*Array super globale get*/ ?> 
            </div>
        <?php endif;?>
    </div>     

    <!-- -->
    <script src="./js/script.js"></script>
</body>
</html>