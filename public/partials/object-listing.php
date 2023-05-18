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

<h2 class="">Objekt till salu</h2>

<?php foreach($this->objects as $object): ?>
    <div class="listing">
        <div class="listing-thumbnail">
            <img src="<?php echo isset($object['thumbnail']) ? $object['thumbnail'] : plugin_dir_url( __FILE__ ) . '../images/ctrl-vitec-integration-placeholder.png' ?>" alt="Objekt">
        </div>
        <div class="listing-content">
            <a href="<?php echo add_query_arg('object_id', $object['id'], get_permalink()) ?>"><h3 class="object-title"><?php echo isset($object['title']) ? $object['title'] : "Okänd" ?></h3></a>
            <p>Stad: <?php echo isset($object['location']) ? $object['location'] : "Okänd" ?></p>
            <p>Pris: <?php echo isset($object['price']) ? $object['price'] : "Okänd" ?></p>
            <p>Beskrivning: <?php echo isset($object['description']) ? $object['description'] : null ?></p>
        </div>
    </div>
    
<?php endforeach; ?>