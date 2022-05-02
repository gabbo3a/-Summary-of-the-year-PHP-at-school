<?php namespace LoginForm; /* scope */?>

<?php include_once 'services/connection.php';            use connection; ?>
<?php include_once 'components/PopUps/CorrectPopup.php'; use CorrectPopup; ?>
<?php include_once 'services/DBservices.php';            use DBservices; ?>
<?php include_once 'services/SessionServices.php';       use SessionServices; ?>

<?php function LoginForm() { ?>
    <?php extract(connection\getConn()); ?>
    <div class="container-fluid w-50 p-4">

        <?php if(!isset($_REQUEST['services'])) { ?>
            <form action="#" method="post">

                <!-- Login with email & password -->
                <h2>Login</h2>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="example@example.com"/>
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>
                
                <!-- Submit -->
                <div class="d-grid gap-2">
                    <input type="submit" name="services" value="login" class="btn btn-outline-primary" >
                </div>
            </form>
        <?php } else { 
            // Login
            $isLogged = DBservices\login($_REQUEST);
            
            // print_r($_REQUEST);

            // Check good login
            if ($isLogged === 0) header("Refresh:0, url=index.php?nextpage=login");
            else SessionServices\sessionUserSetUp($_REQUEST);

        } ?>

    </div>
<?php } ?>