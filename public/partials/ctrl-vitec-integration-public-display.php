<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://ctrl.mk
 * @since      1.0.0
 *
 * @package    Ctrl_Vitec_Integration
 * @subpackage Ctrl_Vitec_Integration/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrapper">
    <!-- foreach -->
    <div class="row">
        <div class="column">
            <div><img class="object-listing-main-image" src="<?php echo $object_listing_main_image ?>" /></div>
        </div>
        <div class="column">
            <div><h3 class="object-listing-title"><?php echo $object_listing_title ?></h3></div>
        </div>
    </div>
</div>
