<?php namespace ExercisesList; ?>

<?php include 'ExerciseCard.php';  use ExerciseCard ?>

<?php function ExercisesList() { ?>

    <?php  // Data model
        $exercises = array(
            array(
                "title"=>"Orologio", 
                "desc"=>"File php che visualizza la data e l'orario attuale in forma grafica utilizzando HTML e CSS", 
                "img"=>"./exercises/ES1/img.png",
                "link"=>"./exercises/ES1"
            ),
            array(
                "title"=>"Traduzioni", 
                "desc"=>"Scrivere un FORM che tramite GET chieda ad una pagina php sul server la traduzione di una parola da una lingua all'altra", 
                "img"=>"./exercises/ES2/img.png",
                "link"=>"./exercises/ES2"
            ),
            array(
                "title"=>"Compiti 3-15", 
                "desc"=>"Una piccola web app dove è possibile: fare login/register, vedere database, darkmode...", 
                "img"=>"./exercises/ES3/img.png",
                "link"=>"./exercises/ES3/index.php?nextpage=login"
            )
        );
    ?>

    <div class="d-flex flex-row bd-highlight gap-2 p-5">
        <?php // Print all exercises of the current year
            foreach ($exercises as $exercise) {
                ExerciseCard\ExerciseCard($exercise['title'], $exercise['desc'], $exercise['img'], $exercise['link']);
            } 
        ?>
    </div>


<?php } ?>



