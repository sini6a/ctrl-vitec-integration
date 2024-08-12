<h5>Interiör</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php isset ($object["interior"]["numberOfRooms"]) || isset ($object["houseInterior"]["numberOfRooms"]) ? include ('partials/antal-rum.php') : null ?>
    <?php isset ($object["interior"]["numberOfBedroom"]) || isset ($object["houseInterior"]["numberOffBedroom"]) ? include ('partials/antal-sovrum.php') : null ?>
    <?php isset ($object["interior"]["kitchenType"]) ? include ('partials/kitchen-type.php') : null ?>
</div>