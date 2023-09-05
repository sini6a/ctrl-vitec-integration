<h5>Drift</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php isset($object["operation"]["heating"]) && $object["operation"]["heating"] != 0 ? include_once('drift-partials/uppvärmning.php') : null ?>
    <?php isset($object["operation"]["roadCommunity"]) && $object["operation"]["roadCommunity"] != 0 ? include_once('drift-partials/vägochsamfälligh.php') : null ?>
    <?php isset($object["operation"]["insurance"]) && $object["operation"]["insurance"] != 0 ? include_once('drift-partials/försäkring.php') : null ?>
    <?php isset($object["operation"]["electricity"]) && $object["operation"]["electricity"] != 0 ? include_once('drift-partials/el.php') : null ?>
    <?php isset($object["operation"]["personsInTheHousehold"]) && $object["operation"]["personsInTheHousehold"] != 0 ? include_once('drift-partials/hushåll.php') : null ?>
    <?php isset($object["operation"]["sum"]) && $object["operation"]["sum"] != 0 ? include_once('drift-partials/driftkostnader.php') : null ?>
</div>

<?php isset($object["operation"]["commentary"]) && $object["operation"]["commentary"] != 0 ? include_once('drift-partials/beskrivning.php') : null ?>