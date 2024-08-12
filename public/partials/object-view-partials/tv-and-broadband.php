<h5>TV och bredband</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php isset($object["tvAndBroadband"]["tv"]) && $object["tvAndBroadband"]["tv"] ? include ('tv-and-broadband/tv.php') : null ?>
    <?php isset($object["tvAndBroadband"]["broadband"]) && $object["tvAndBroadband"]["broadband"] ? include ('tv-and-broadband/broadband.php') : null ?>
</div>