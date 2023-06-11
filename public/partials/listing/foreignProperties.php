<?php if ($this->properties->getForeignProperty() != null) {
    foreach ($this->properties->getForeignProperty() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>