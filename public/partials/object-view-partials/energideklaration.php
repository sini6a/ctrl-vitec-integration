<h5>Energideklaration</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <div class="column">
        <div class="space-between">
            <p>Deklaration: </p>
            <p>
                <strong>
                    <?php echo isset($object["energyDeclaration"]["completed"]) ? $object["energyDeclaration"]["completed"] : "Okänd" ?>
                </strong>
            </p>
        </div>
    </div>
</div>