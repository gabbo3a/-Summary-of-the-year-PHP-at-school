<?php namespace Footer; /* scope */?>

<?php function footer($title) { ?>
    <nav class="navbar fixed-bottom navbar-light bg-light d-flex justify-content-center bg-dark">
        <a class="navbar-brand text-white" href="#">
            <?php $title = isset($title) ? $title : 'title'; echo $title; ?>  
        </a>
    </nav>
<?php } ?>