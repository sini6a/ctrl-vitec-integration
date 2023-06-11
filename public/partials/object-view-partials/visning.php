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

?>
<div class="row">
    <?php foreach ($object["viewings"] as $viewing): ?>
        <div class="column" style="background-color: white; text-align: center;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="35" style="padding-bottom: 10px;"
                id="calendar">
                <path
                    d="M12,14a1,1,0,1,0-1-1A1,1,0,0,0,12,14Zm5,0a1,1,0,1,0-1-1A1,1,0,0,0,17,14Zm-5,4a1,1,0,1,0-1-1A1,1,0,0,0,12,18Zm5,0a1,1,0,1,0-1-1A1,1,0,0,0,17,18ZM7,14a1,1,0,1,0-1-1A1,1,0,0,0,7,14ZM19,4H18V3a1,1,0,0,0-2,0V4H8V3A1,1,0,0,0,6,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V10H20ZM20,8H4V7A1,1,0,0,1,5,6H19a1,1,0,0,1,1,1ZM7,18a1,1,0,1,0-1-1A1,1,0,0,0,7,18Z">
                </path>
            </svg>
            <div class="space-between">
                <h4>
                    <?php echo $date_formatter->format(strtotime($viewing["startTime"])); ?>
                </h4>
                <h3 style="margin-top: 0 ;">
                    <?php echo $time_formatter->format(strtotime($viewing["startTime"])); ?> -
                    <?php echo $time_formatter->format(strtotime($viewing["endTime"])); ?>
                </h3>
                <p>
                    <?php echo isset($viewing["commentary"]) ? $viewing["commentary"] : null ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>