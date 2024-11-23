<div class="column">
    <div class="space-between">
        <p>Uppvärmning: </p>
        <p>
            <strong>
                <?php
                if (isset($object["operation"]["heating"])) {
                    $heatingCost = $object["operation"]["heating"];
                    $formattedHeatingCost = number_format($heatingCost, 0, ',', ' ');
                    echo isset($_GET['object_type']) && $_GET['object_type'] === 'housingCooperative'
                        ? $formattedHeatingCost . " kr/mån"
                        : $formattedHeatingCost . " kr/år";
                } else {
                    echo "Okänd";
                }
                ?>
            </strong>
        </p>
    </div>
</div>