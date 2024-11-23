<div class="column">
    <div class="space-between">
        <p>Driftskostnad: </p>
        <p>
            <strong>
                <?php
                if (isset($object["operation"]["sum"])) {
                    $cost = $object["operation"]["sum"];
                    $formattedCost = number_format($cost, 0, ',', ' ');
                    echo isset($_GET['object_type']) && $_GET['object_type'] === 'housingCooperative'
                        ? $formattedCost . " kr/mån"
                        : $formattedCost . " kr/år";
                } else {
                    echo "Okänd";
                }
                ?>
            </strong>
        </p>
    </div>
</div>