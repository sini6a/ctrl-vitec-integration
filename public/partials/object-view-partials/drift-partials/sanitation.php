<div class="column">
    <div class="space-between">
        <p>Renhållning: </p>
        <p>
            <strong>
                <?php
                if (isset($object["operation"]["sanitation"])) {
                    $sanitationCost = $object["operation"]["sanitation"];
                    $formattedSanitationCost = number_format($sanitationCost, 0, ',', ' ');
                    echo isset($_GET['object_type']) && $_GET['object_type'] === 'housingCooperative'
                        ? $formattedSanitationCost . " kr/mån"
                        : $formattedSanitationCost . " kr/år";
                } else {
                    echo "Okänd";
                }
                ?>
            </strong>
        </p>
    </div>
</div>