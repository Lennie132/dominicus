<?php
smart_include_css('css/style.less');
smart_include_js('main.js');

$config = array(
    'tabelnaam' => 'art_nieuws',
    'group_id' => 0,
    'order' => 't.datum DESC', // bv: RAND()
    'artikel_id' => 0,
    'limit_links' => 3,
    'where' => ''
);

/* Artikelen ophalen */

$art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
//print_pre($art_arr);
//print_pre($DATA);
if (!empty($art_arr)) {
    ?>
    <div class="row">
        <?php
        foreach ($art_arr as $key => $artikel) {
            $oldDate = $artikel['Datum'];
            $newDate = date("d-m", strtotime($oldDate));
            ?>
            <div class="">
                <div class="newsitem-home">
                    <div class="">
                        <h3 class="newsitem-title"><?= $newDate; ?> | <?= $artikel['Titel']; ?></h3>
                    </div>
                    <div class=" newsitem-intro">
                        <p class="newsitem-intro-p"><?= $artikel['Inleiding']; ?></p>
                    </div>
                    <div class="">
                        <a class="read_more" href="<?= link::v('page_nieuws')->artikel_groep($artikel['page'])->artikel_id($artikel['artikel_id']); ?>" title="<?= $artikel['Titel']; ?>">
                        Lees meer<span class="icon-chevron_right"></span>
                    </a>
                    </div>             
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>