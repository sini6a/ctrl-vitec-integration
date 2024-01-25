<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <div class="column">
        <div class="space-between">
            <strong>
                <a target="_blank" id="document-<?php echo $document ?>">
                    <div style="display: flex; gap: 5px; align-items: center; padding: 10px 0 10px 0;">
                        <img class="document-icon"
                            src="<?php echo ($value['extension'] == 'pdf') ? plugin_dir_url(dirname(__FILE__, 2)) . 'images/pdf.svg' : '' ?>"
                            alt="">
                        <?php echo $value['name']; ?>
                    </div>
                </a>
            </strong>
            </p>
        </div>
    </div>
</div>