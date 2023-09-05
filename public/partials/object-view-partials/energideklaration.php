<h5>Energideklaration</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php $object['energyDeclaration']['completed'] != "" ? include_once('energy/completed.php') : null ?>
    <?php $object['energyDeclaration']['primaryEnergyNumber'] != "" ? include_once('energy/primary-energy.php') : null ?>
    <?php $object['energyDeclaration']['energyConsumption'] != "" ? include_once('energy/energy-consumption.php') : null ?>
    <?php $object['energyDeclaration']['energyClass'] != "" ? include_once('energy/energy-class.php') : null ?>
</div>