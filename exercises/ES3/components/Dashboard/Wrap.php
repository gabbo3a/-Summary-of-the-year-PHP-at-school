<?php namespace Wrap; ?>

<?php include_once 'components/UnLogged/LoginForm.php';     use LoginForm ?>
<?php include_once 'components/UnLogged/RegisterForm.php';  use RegisterForm ?>
<?php include_once 'components/Logged/Home.php';            use Home; ?>
<?php include_once 'components/Logged/Database.php';        use Database; ?>
<?php include_once 'services/DBservices.php';               use DBservices; ?>

<?php function Wrap($nextPageReq, $lastPageReq, $mode) { ?>
    <?php
        // Where were you ? (Simple routing with $_REQUEST)
        switch ($nextPageReq) {
            case 'register':          RegisterForm\RegisterForm($mode);  break;
            case 'login':             LoginForm\LoginForm($mode);        break;
            case 'logout':            DBservices\Logout($mode);          break;
            case 'home':              Home\Home($mode);                  break;
            case 'database':          Database\Database($mode);          break;
            default:                  LoginForm\LoginForm($mode);        break;
        }
    ?>
<?php } ?>