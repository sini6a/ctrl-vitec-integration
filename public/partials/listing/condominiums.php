<?php if ($this->properties->getCondominium() != null) {
    foreach ($this->properties->getCondominium() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>