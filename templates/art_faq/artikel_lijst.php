<?php
smart_include_css('css/style.less');
smart_include_css('css/style.css');
smart_include_js('faq.js');

$config = array(
    'tabelnaam' => $tabelnaam,
    'group_id' => $DATA['group'],
    'order' => 'a.gewicht ASC', // bv: RAND()
    'artikel_id' => 0,
    'limit_links' => 0,
    'where' => ''
);

/* Artikelen ophalen */





$art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
//print_pre($art_arr);
if (!empty($art_arr)) {
    ?>
    <div class="faq-wrapper">
        <?php
        foreach ($art_arr as $key => $artikel) {
            ?>
            <div class="faq-item">
                <div class="vraag"><h2><span class="icon-help_outline"></span>  <?= $artikel['Vraag']; ?></h2></div>
                <div class="antwoord"><?= $artikel['Antwoord']; ?></div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}

//Module reset
$DATA['group'] = 0;
?>