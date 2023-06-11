<h5>Taxering</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <div class="column">
        <div class="space-between">
            <p>Preliminärt taxeringsvärde: </p>
            <p>
                <strong>
                    <?php echo isset($object["assess"]["preliminaryAssessedValue"]) && $object["assess"]["preliminaryAssessedValue"] ? "Ja" : "Nej" ?>
                </strong>
            </p>
        </div>
    </div>
</div>