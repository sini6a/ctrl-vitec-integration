<?php if ($this->properties->getCottage() != null) {
    foreach ($this->properties->getCottage() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>