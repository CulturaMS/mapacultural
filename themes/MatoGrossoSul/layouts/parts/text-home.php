<?php

use MapasCulturais\App;

$app = App::i();
?>

<?=$text?>

<div style="text-align: center;">
    <p><?=$text_info_link_documentation?> <strong><a style="color:#fff" target="_blank" href="<?=$link_documentation?>"><?=$text_link_documentation?></a></strong>.</p>
    <?php if($enabled_button){ ?>
    <a class="btn btn-accent btn-large" href="<?=$link_buton?>"><?=$text_button?></a>
    <?php }else{ ?>
        <h3><?=$text_button_disabled?></h3>
    <?php } ?>
    <br><br>
</div>