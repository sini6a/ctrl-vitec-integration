<?php
$date_formatter = new IntlDateFormatter(
    "sv_SE", // the locale to use, e.g. 'en_GB'
    IntlDateFormatter::MEDIUM, // how the date should be formatted, e.g. IntlDateFormatter::FULL
    IntlDateFormatter::NONE,
    // how the time should be formatted, e.g. IntlDateFormatter::FULL 
    'UTC' // the time should be returned in which timezone?
);

$time_formatter = new IntlDateFormatter(
    "sv_SE", // the locale to use, e.g. 'en_GB'
    IntlDateFormatter::NONE, // how the date should be formatted, e.g. IntlDateFormatter::FULL
    IntlDateFormatter::SHORT,
    // how the time should be formatted, e.g. IntlDateFormatter::FULL 
    'UTC' // the time should be returned in which timezone?
);

$currentdate = date('U');
$count = 0;

?>
<div class="row">
    <?php foreach (array_reverse($object["viewings"]) as $viewing): ?>
        <?php if (strtotime($viewing["startTime"]) > $currentdate) {
            include('visning-partial.php');
            $count++;
        } ?>
    <?php endforeach; ?>
    <?php if ($count == 0) {
        echo '<p style="text-align: center; width: 100%;">Inga visningar just nu!</p>';
    } ?>
</div>