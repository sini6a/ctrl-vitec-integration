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

<?php if ($object["bids"] > 0): ?>
    <?php foreach ($object["bids"] as $k => $bid): ?>
        <?php if ($bid["cancelled"] === false && $bid["status"] === "Deltar"): ?>
            <div class="column" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">

                <div class="space-between">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="35" style="padding-bottom: 10px;"
                        id="auction">
                        <path
                            d="M11.623 7.603l6.062 3.5c0.479 0.276 1.090 0.112 1.365-0.366 0.277-0.478 0.113-1.090-0.365-1.365l-6.062-3.5c-0.479-0.276-1.090-0.112-1.366 0.365s-0.112 1.089 0.366 1.366zM17.186 11.969l-6.062-3.5-3.5 6.062 6.062 3.5 3.5-6.062zM6.123 17.129l6.062 3.5c0.478 0.276 1.090 0.112 1.365-0.366s0.112-1.090-0.365-1.365l-6.062-3.5c-0.479-0.276-1.090-0.112-1.366 0.365-0.277 0.478-0.112 1.090 0.366 1.366zM27.012 19.951l-11.076-5.817-1 1.732 10.576 6.683c0.717 0.414 1.635 0.169 2.049-0.549s0.168-1.635-0.549-2.049zM16.033 25c0-0.553-0.448-1-1-1h-9c-0.553 0-1 0.447-1 1 0 0.552 0 1 0 1l-1.033-0.021 0.033 1.021h13l0.047-0.958-0.984-0.042c0 0-0.063-0.448-0.063-1z">
                        </path>
                    </svg>
                    <h5 style="margin-top: 0; margin-bottom: 10px;">
                        <?php if ($k == '0')
                            echo "Senaste Budgivare /"; ?> Budgivare
                        <?php echo $bid["alias"]; ?>
                    </h5>
                    <?php if (strtotime($bid["dateAndTime"])): ?>
                        <h4>
                            <?php echo $date_formatter->format(strtotime($bid["dateAndTime"])); ?>
                        </h4>
                        <h5 style="margin-top: 0 ;">
                            <?php echo number_format($bid["amount"], 0, ',', ' ') . " kr"; ?>
                        </h5>
                        <p>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>