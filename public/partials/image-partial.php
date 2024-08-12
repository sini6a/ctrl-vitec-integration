<div class="single-image">
    <div class="image-container">
        <a id="gallery-href-image-<?php echo $image ?>">
            <img id="gallery-image-<?php echo $image ?>"
                src="<?php echo plugin_dir_url(dirname(__FILE__, 1)) . 'images/roller.svg'; ?>">
        </a>
    </div>
    <p class="single-image-text">
        <?php echo ($object['images'][$image]["text"]) ?>
    </p>
</div>