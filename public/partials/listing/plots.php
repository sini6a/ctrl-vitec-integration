<?php if ($this->properties->getPlot() != null) {
    foreach ($this->properties->getPlot() as $property): ?>
        <?php include_once('listing-partials/listing.php'); ?>
    <?php endforeach;
} ?>