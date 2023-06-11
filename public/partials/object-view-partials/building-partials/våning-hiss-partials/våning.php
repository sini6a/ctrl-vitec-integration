<div class="column">
    <div class="space-between">
        <p>Våning: </p>
        <p>
            <strong>
                <?php echo isset($object["floorAndElevator"]["floor"]) ? $object["floorAndElevator"]["floor"] : null ?>
                <?php echo isset($object["floorAndElevator"]["totalNumberFloors"]) ? " av " . $object["floorAndElevator"]["totalNumberFloors"] : null ?>
            </strong>
        </p>
    </div>
</div>