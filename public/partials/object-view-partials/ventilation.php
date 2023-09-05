<h5>Ventilation</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php $object['ventilation']['type'] != "" ? include_once('ventilation/type.php') : null ?>
</div>