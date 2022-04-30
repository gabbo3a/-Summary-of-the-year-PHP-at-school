<?php namespace ExerciseCard; ?>

<?php function ExerciseCard($title, $desc, $imgPath, $link) { ?>
    <div class="card" style="width: 18rem;">
        <a href="<?php echo $link ?>" class="text-decoration-none">

            <img src="<?php echo $imgPath ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title //text-decoration-underline">
                    <span class=""><?php $title = isset($title) ? $title : 'Default Title'; echo $title; ?></span>
                    <i class="bi bi-arrow-right-short float-end"></i>
                </h5>
                <p class="card-text text-dark">
                    <?php $desc = isset($desc) ? $desc : 'Default Desc'; echo $desc; ?>
                </p>
            </div>
        </a>
    </div>
<?php } ?>
