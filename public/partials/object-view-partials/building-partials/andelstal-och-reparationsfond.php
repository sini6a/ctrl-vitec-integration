<h5>Andelstal och reparationsfond</h5>
<div class="row">
    <?php isset($object["participationAndRepairFund"]["participationInAssociation"]) && $object["participationAndRepairFund"]["participationInAssociation"] != "" ? include_once('andelstal-och-reparationsfond-partials/andel-i-förening.php') : null ?>
    <?php isset($object["participationAndRepairFund"]["participationOffAnnualFee"]) && $object["participationAndRepairFund"]["participationOffAnnualFee"] != "" ? include_once('andelstal-och-reparationsfond-partials/andel-av-årsavgift.php') : null ?>
</div>