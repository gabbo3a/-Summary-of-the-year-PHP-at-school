<?php namespace Home; ?>

<?php include_once 'components/PopUps/CorrectPopup.php'; use CorrectPopup; ?>
<?php include_once 'services/SessionServices.php';       use SessionServices; ?>

<?php function Home($mode) { ?>
    <div class="container-sm p-2">
        <h2>Home</h2>
        <?php
            // print_r($_REQUEST);

            // Check session
            if (!SessionServices\sessionCheck())  goto end;
            SessionServices\sessionUserSetUp(null); // Pull $_SESSION
            
            // Home content
            CorrectPopup\CorrectPopup("Welcome in your Home"); 
            // Altri contenuti ...
            // Presi da session
        ?>
            
        <table class="table table-<?php echo $mode ?> table-striped">
            <thead>
                <tr>
                    <th>SESSION KEY</th>
                    <th>SESSION VALUE</th>
                </tr>
            </thead>
            <?php foreach ($_SESSION as $key => $value) {  ?>
                <tr>
                    <th> <?php echo "$key"; ?></th>
                    <th> <?php echo "$value"; ?></th>
                </tr>
            <?php } ?>
        </table>
        // altri contenuti
        <?php ?>
        <?php end: ?>
    </div>
<?php } ?>



