<div class="column">
    <div class="space-between">
        <p>El: </p>
        <p>
            <strong>
                <?php
                if (isset($object["operation"]["electricity"])) {
                    $electricityCost = $object["operation"]["electricity"];
                    $formattedElectricityCost = number_format($electricityCost, 0, ',', ' ');
                    echo isset($_GET['object_type']) && $_GET['object_type'] === 'housingCooperative'
                        ? $formattedElectricityCost . " kr/mån"
                        : $formattedElectricityCost . " kr/år";
                } else {
                    echo "Okänd";
                }
                ?>
            </strong>
        </p>
    </div>
</div>