<?php namespace Footer; /* scope */?>

<?php function Footer($title, $mode, $pos) { ?>
    <?php $tcolor = $mode === 'light'? 'dark': 'light' // text color ?>
    <?php $footer = $mode === 'light'? '#b3d1fe': '#000' ?>

    <nav 
        class="navbar <?php echo $pos?> navbar-<?php echo $mode?> d-flex justify-content-center"
        style="background-color: <?php echo $footer?>;"
    >
        <a class="navbar-brand text-<?php echo $tcolor?> " href="#">
            <?php $title = isset($title) ? $title : 'title'; echo $title; ?>  
        </a>
    </nav>
<?php } ?>