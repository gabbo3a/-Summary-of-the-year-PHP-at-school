<?php namespace Database; ?>

<?php include_once 'services/DBservices.php';      use DBservices; ?>
<?php include_once 'services/SessionServices.php'; use SessionServices; ?>

<?php // DBservices\getTableRelations('users');?>

<?php function Database($mode) { ?>
    <div class="container-sm p-2 ">  
        <h2 class="m">Database</h2>
        <?php
            // Check session
            if (!SessionServices\sessionCheck())  goto endpage;
            SessionServices\sessionUserSetUp(null); // Pull $_SESSION
        ?>
        <?php 
            // Fetch data
            $obj = DBservices\getTableData();
            $tables = $obj['results'];
            $tableNames = $obj['tableNames'];
        ?>
        <?php $c = 0; foreach ($tables as $table) { ?>

            <?php if (count($table) < 1) goto end ?>

            <div class="alert alert-primary">
                <h5><?php echo $tableNames[$c]; ?></h5>
            </div>
            <!-- modificare stampa data e password nei campi  gender -->
            <table class="table table-<?php echo $mode ?> table-striped">
            
                <thead>
                    <?php foreach ($table as $row) { ?>
                        <tr>
                            <?php foreach ($row as $key => $value) { ?>
                                <th><?php echo $key; ?></th> 
                            <?php } break; ?>
                        </tr>
                    <?php } ?>
                </thead>
                    
                <tbody>
                    <?php foreach ($table as $row) { ?>
                        <tr>
                            <?php foreach ($row as $key => $value) { ?>
                                <th scope="col"><?php echo $value; ?></th>  
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php end: $c++; } ?>
        <?php endpage:?>
    </div>
<?php } ?>





