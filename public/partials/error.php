<?php if ($this->errors != null) {
    foreach ($this->errors as $error): ?>
        <?php echo $error; ?>
    <?php endforeach;
} ?>