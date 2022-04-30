<?php namespace Project; /* scope */?>

<?php include 'components/Header.php';        use Header ?>
<?php include 'components/ExercisesList.php'; use ExercisesList ?>
<?php include 'components/Footer.php';        use Footer ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Resume</title>
</head>
<body>
    <!-- Indice di tutti i lavori aftti quest'anno (slecchinata per il nesi) -->

    <!-- Header -->
    <?php $title = 'Resoconto PHP'; Header\Header($title); ?>

    <!-- Exercises list  -->
    <?php ExercisesList\ExercisesList(); ?>

    <!-- Footer -->
    <?php $text = 'Tutti i diritti assulutamete non riservati®'; Footer\footer($text); ?>


</body>
</html>