<section class="contact" id="contact"
    style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <h5 class="center">Anmäl intresse</h5>
    <div>
        <?php echo do_shortcode("[contact-form-7 id=" . get_option('ctrl_options')['ctrl_field_cf7'] . "]"); ?>
    </div>
</section>