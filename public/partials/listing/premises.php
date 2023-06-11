<?php if ($this->properties->getPremise() != null) {
    foreach ($this->properties->getPremise() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>