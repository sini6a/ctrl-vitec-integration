<div class="column">
    <div class="space-between">
        <p>Antal Rum: </p>
        <p>
            <strong>
                <?php echo isset($object["interior"]["numberOfRooms"]) ? $object["interior"]["numberOfRooms"] : null ?>
                <?php echo isset($object["houseInterior"]["numberOfRooms"]) ? $object["houseInterior"]["numberOfRooms"] : null ?>
            </strong>
        </p>
    </div>
</div>