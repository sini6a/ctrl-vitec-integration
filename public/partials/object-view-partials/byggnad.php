<h5>Byggnad</h5>
<div class="row">
    <?php isset($object["building"]["buildingType"]) && $object["building"]["buildingType"] != "" ? include_once('building-partials/byggnadstyp.php') : null ?>
    <?php isset($object["building"]["buildingYear"]) && $object["building"]["buildingYear"] != "" ? include_once('building-partials/byggår.php') : null ?>
    <?php isset($object["building"]["facade"]) && $object["building"]["facade"] != "" ? include_once('building-partials/fasad.php') : null ?>
    <?php isset($object["building"]["frame"]) && $object["building"]["frame"] != "" ? include_once('building-partials/stomme.php') : null ?>
    <?php isset($object["building"]["windows"]) && $object["building"]["windows"] != "" ? include_once('building-partials/fönster.php') : null ?>
    <?php isset($object["building"]["beam"]) && $object["building"]["beam"] != "" ? include_once('building-partials/bjälklag.php') : null ?>
    <?php isset($object["building"]["roof"]) && $object["building"]["roof"] != "" ? include_once('building-partials/tak.php') : null ?>
    <?php isset($object["building"]["heating"]) && $object["building"]["heating"] != "" ? include_once('building-partials/uppvärmning.php') : null ?>
    <?php isset($object["waterAndDrain"]["info"]) && $object["waterAndDrain"]["info"] != "" ? include_once('building-partials/vatten-avlopp.php') : null ?>
</div>

<h5>Allmänt information</h5>
<?php isset($object["description"]["generally"]) && $object["description"]["generally"] != "" ? include_once('building-partials/beskrivning.php') : null ?>
<?php isset($object["building"]["otherAboutTheBuildning"]) && $object["building"]["otherAboutTheBuildning"] != "" ? include_once('building-partials/övrigt.php') : null ?>
<?php isset($object["participationAndRepairFund"]) ? include_once('building-partials/andelstal-och-reparationsfond.php') : null ?>
<?php isset($object["floorAndElevator"]) ? include_once('building-partials/våning-hiss.php') : null ?>