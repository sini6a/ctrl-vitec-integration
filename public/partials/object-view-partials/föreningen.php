<h5>Föreningen</h5>
<div class="row">
    <?php isset($object["association"]["name"]) && $object["association"]["name"] != "" ? include_once('föreningen-partials/name.php') : null ?>
</div>

<?php isset($object["association"]["generalAboutAssociation"]) && $object["association"]["generalAboutAssociation"] != "" ? include_once('föreningen-partials/generalAboutAssociation.php') : null ?>

<?php isset($object["association"]["renovations"]) && $object["association"]["renovations"] != "" ? include_once('föreningen-partials/renovations.php') : null ?>

<?php isset($object["association"]["parking"]) && $object["association"]["parking"] != "" ? include_once('föreningen-partials/parking.php') : null ?>

<?php isset($object["association"]["tvAndBroadband"]) && $object["association"]["tvAndBroadband"] != "" ? include_once('föreningen-partials/tvAndBroadband.php') : null ?>

<div class="row">
    <?php isset($object["association"]["numberOfApartments"]) && $object["association"]["numberOfApartments"] != "" ? include_once('föreningen-partials/numberOfApartments.php') : null ?>
    <?php isset($object["association"]["transferFee"]) && $object["association"]["transferFee"] != "" ? include_once('föreningen-partials/transferFee.php') : null ?>
</div>
<div class="row">
    <?php isset($object["association"]["pledgeFee"]) && $object["association"]["pledgeFee"] != "" ? include_once('föreningen-partials/pledgeFee.php') : null ?>
    <?php isset($object["association"]["organizationalForm"]) && $object["association"]["organizationalForm"] != "" ? include_once('föreningen-partials/organizationalForm.php') : null ?>
</div>
<div class="row">
    <?php isset($object["association"]["genuineAssociation"]) && $object["association"]["genuineAssociation"] != "" ? include_once('föreningen-partials/genuineAssociation.php') : null ?>
    <?php isset($object["association"]["allowLegalPersonAsBuyer"]) && $object["association"]["allowLegalPersonAsBuyer"] != "" ? include_once('föreningen-partials/allowLegalPersonAsBuyer.php') : null ?>
</div>
<div class="row">
    <?php isset($object["association"]["theAssociationOwnTheGround"]) && $object["association"]["theAssociationOwnTheGround"] != "" ? include_once('föreningen-partials/theAssociationOwnTheGround.php') : null ?>
</div>