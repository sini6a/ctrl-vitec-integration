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

<h2><?php echo isset($object['title']) ? $object['title'] : "Okänd" ?></h2>

<div class="property">
  <div class="property-image">
    <img src="<?php echo isset($object['thumbnail']) ? $object['thumbnail'] : plugin_dir_url( __FILE__ ) . '../images/ctrl-vitec-integration-placeholder.png' ?>" />
  </div>
  <div class="property-details">
    <h2><?php echo $this->cat->getFact() ?></h2>
    <p style="text-align: center; font-size: x-large;"><?php echo isset($object['location']) ? $object['location'] : "Okänd" ?> | <?php echo isset($object['price']) ? $object['price'] . ":-" : "Okänd" ?></p>
    <p style="padding: 25px; background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; border-radius: 15px; margin: 25px 0 25px 0;"><?php echo isset($object['description']) ? $object['description'] : null ?></p>
    <a href="./" class="wp-block-button__link wp-element-button">Visa alla objekt</a>
  </div>
</div>

