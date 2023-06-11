<h5>Interiör</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php isset($object["interior"]["numberOfRooms"]) && $object["interior"]["numberOfRooms"] != 0 ? include_once('interior-partials/antal-rum.php') : null ?>
    <?php isset($object["interior"]["numberOfBedroom"]) && $object["interior"]["numberOfBedroom"] != 0 ? include_once('interior-partials/antal-sovrum.php') : null ?>
</div>