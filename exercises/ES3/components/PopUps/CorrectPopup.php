<?php namespace CorrectPopup; ?>

<?php function CorrectPopup($text) { ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <span class="material-symbols-outlined">check_circle</span>
        <div><?php echo $text?></div>
    </div>
<?php } ?>