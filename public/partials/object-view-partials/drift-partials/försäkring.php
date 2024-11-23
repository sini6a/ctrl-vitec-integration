<div class="column">
    <div class="space-between">
        <p>Försäkring: </p>
        <p>
            <strong>
                <?php
                if (isset($object["operation"]["insurance"])) {
                    $insuranceCost = $object["operation"]["insurance"];
                    $formattedInsuranceCost = number_format($insuranceCost, 0, ',', ' ');
                    echo isset($_GET['object_type']) && $_GET['object_type'] === 'housingCooperative'
                        ? $formattedInsuranceCost . " kr/mån"
                        : $formattedInsuranceCost . " kr/år";
                } else {
                    echo "Okänd";
                }
                ?>
            </strong>
        </p>
    </div>
</div>