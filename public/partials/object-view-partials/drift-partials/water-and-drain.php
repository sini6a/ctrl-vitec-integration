<div class="column">
    <div class="space-between">
        <p>VA: </p>
        <p>
            <strong>
                <?php
                if (isset($object["operation"]["waterAndDrain"])) {
                    $waterAndDrainCost = $object["operation"]["waterAndDrain"];
                    $formattedWaterAndDrainCost = number_format($waterAndDrainCost, 0, ',', ' ');
                    echo isset($_GET['object_type']) && $_GET['object_type'] === 'housingCooperative'
                        ? $formattedWaterAndDrainCost . " kr/mån"
                        : $formattedWaterAndDrainCost . " kr/år";
                } else {
                    echo "Okänd";
                }
                ?>
            </strong>
        </p>
    </div>
</div>