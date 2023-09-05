<h5>Balkong, uteplats och bilplats</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <div class="column">
        <div class="space-between">
            <p>Balkong: </p>
            <p>
                <strong>
                    <?php echo isset($object["balconyPatio"]["balcony"]) ? "Ja" : "Nej" ?>
                </strong>
            </p>
        </div>
    </div>
    <div class="column">
        <div class="space-between">
            <p>Uteplats: </p>
            <p>
                <strong>
                    <?php echo isset($object["balconyPatio"]["patio"]) ? "Ja" : "Nej" ?>
                </strong>
            </p>
        </div>
    </div>
</div>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <div class="column">
        <div class="space-between">
            <p>Bilplats: </p>
            <p>
                <strong>
                    <?php echo isset($object["balconyPatio"]["parkingLot"]) ? "Ja" : "Nej" ?>
                </strong>
            </p>
        </div>
    </div>
</div>
<?php isset($object["balconyPatio"]["summary"]) ? include_once('balkong-uteplats-bilplats-partials/beskrivning.php') : null ?>
<?php isset($object["balconyPatio"]["parking"]) ? include_once('balkong-uteplats-bilplats-partials/parkering-beskrivning.php') : null ?>