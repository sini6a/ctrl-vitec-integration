<?php if ($this->properties->getHousingCooperative() != null) {
    foreach ($this->properties->getHousingCooperative() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>