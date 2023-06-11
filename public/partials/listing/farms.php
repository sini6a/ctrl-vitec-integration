<?php if ($this->properties->getFarm() != null) {
    foreach ($this->properties->getFarm() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>

    <?php endforeach;
} ?>