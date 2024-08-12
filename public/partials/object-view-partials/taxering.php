<h5>Taxering</h5>
<div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php isset($object["assess"]["preliminaryAssessedValue"]) && $object["assess"]["preliminaryAssessedValue"] ? include ('taxation/preliminary-taxation.php') : null ?>
    <?php isset($object["assess"]["typeCode"]) && $object["assess"]["typeCode"] ? include ('taxation/type.php') : null ?>
    <?php isset($object["assess"]["taxFee"]) && $object["assess"]["taxFee"] ? include ('taxation/tax-fee.php') : null ?>
    <?php isset($object["assess"]["totalAssessedValue"]) && $object["assess"]["totalAssessedValue"] ? include ('taxation/total-assessed-value.php') : null ?>
</div>