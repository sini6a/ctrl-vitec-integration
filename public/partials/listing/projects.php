<?php if ($this->properties->getProject() != null) {
    foreach ($this->properties->getProject() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>