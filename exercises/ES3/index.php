<?php namespace PHPProject; /* scope */?>

<?php include 'components/Router.php';           use Router ?>
<?php include 'components/Dashboard/Header.php'; use Header ?>
<?php include 'components/Dashboard/Footer.php'; use Footer ?>
<?php include 'components/Dashboard/Wrap.php';   use Wrap ?>

<?php 
    // IL NESI MI METTERA  10 🤡 
    // Gestione darkmode and footer pos

    if (!isset($_COOKIE['darkMode'])) $mode = 'dark'; 
    else $mode = $_COOKIE['darkMode'] === 'true' ? 'dark' : 'light'; // light, secondary
    $bgcolor =  $mode  !== 'dark' ? '#ffff' : 'rgba(182, 178, 178, 0.363);';
    // echo $bgcolor;

    // Gestione pos
    $fixPage = array('login', 'home');
    $nxp = isset($_REQUEST['nextpage'])? $_REQUEST['nextpage']: '';
    $pos = in_array($nxp, $fixPage) ? 'fixed-bottom' :'';

    // Router
    $obj = Router\Router();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon-32x32.png">
    <script src="./assets/darkmode.js"></script>
    <script src="./assets/register.checker.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        * { font-family: 'Roboto', sans-serif; }
    </style>
    <title>PHP & MySQL</title>
</head>
<body style="background-color: <?php echo $bgcolor ?>">

    <?php /* Header */$title = 'PHP & MySQL'; Header\Header($title, $obj['isLogged'], $mode)  ?>
    <?php /* Wrap */ Wrap\Wrap($obj['nextPageReq'], $obj['lastPageReq'], $mode); ?> 
    <?php /* Footer */
        $text = 'La mia bellissima app® <a href="./assets/img/pietro.png">io</a>'; 
        Footer\Footer($text, $mode, $pos); 
        // fare sanitaizs
    ?>
    <!-- document.cookie= "darkMode=cookievalue; expires= Thu, 21 Aug 2000 20:00:00 UTC"; -->
</body>
</html>