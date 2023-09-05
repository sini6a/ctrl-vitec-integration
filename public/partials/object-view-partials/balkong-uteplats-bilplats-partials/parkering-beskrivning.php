<h5 style="font-weight: normal;">Beskrivning bilplats:</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <div class="column">
        <div class="space-between">
            <p>
                <strong>
                    <?php echo isset($object["balconyPatio"]["parking"]) ? $object["balconyPatio"]["parking"] : "" ?>
                </strong>
            </p>
        </div>
    </div>
</div>