<?php if ($this->properties->getHouse() != null) {
    foreach ($this->properties->getHouse() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>