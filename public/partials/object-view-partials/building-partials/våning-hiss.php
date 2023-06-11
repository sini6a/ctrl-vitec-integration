<h5>Våning/hiss</h5>
<div class="row">
    <?php isset($object["floorAndElevator"]["floor"]) && $object["floorAndElevator"]["floor"] != "" ? include_once('våning-hiss-partials/våning.php') : null ?>
    <?php isset($object["floorAndElevator"]["elevator"]) && $object["floorAndElevator"]["elevator"] != "" ? include_once('våning-hiss-partials/hiss.php') : null ?>
</div>