<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <div class="column">
        <div class="space-between">
            <strong>
                <a target="_blank" href="<?php echo $value['links'][0] ?>">
                    <div style="display: flex; gap: 5px; align-items: center; padding: 10px 0 10px 0;">
                        <img class="document-icon"
                            src="<?php echo plugin_dir_url(dirname(__FILE__, 2)) . 'images/link.svg' ?>" alt="">
                        <?php echo $value['text']; ?>
                    </div>
                </a>
            </strong>
            </p>
        </div>
    </div>
</div>