<?php
smart_include_css('css/style.less');
smart_include_css('css/style.css');
smart_include_js('main.js');

$config = array(
    'tabelnaam' => $tabelnaam,
    'group_id' => $DATA['group'],
    'order' => 'a.gewicht ASC', // bv: RAND()
    'artikel_id' => $DATA['artikel_id'],
    'limit_links' => 0,
    'where' => '',
    'module' => 0,
    'class' => '',
    'afbeelding_veld' => 'Afbeelding',
    'album_veld' => 'Album',
    'bestand_veld' => 'Bestand'
);

$artikel = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $DATA['artikel_id']);


if (!empty($artikel)) {
    $img = get_art_file_path($artikel['afbeelding']['DATA'], $DATA['artikel_id']);
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="student-item-detail">
                <div class="student-content col-xs-12">
                    <h2 class="student-titel"><?= $artikel['titel']['DATA']; ?></h2>
                    <div class="student-img-space col-sm-3">
                        <?php
                        if (trim($img != '')) {
                            ?>
                            <div class="">
                                <img src="<?= lcms::resize($img, 400, 400, '', 80); ?>" class="img-responsive" alt="<?= $artikel['Titel']['DATA']; ?>" />
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="student-info col-sm-9 col-xs-12">
                        <p class="student-naam"><?= $artikel['naam']['DATA']; ?></p>
                        <p class="student-jaar-leerling">Leerling in: <?= $artikel['jaar_dominicusleerling']['DATA']; ?></p>
                        <p class="student-jaar-interview-beroep">Anno <?= $artikel['jaar_interview']['DATA']; ?>: <?= $artikel['beroep']['DATA']; ?></p>
                        <div class="student-tekst-vervolg">
                            Anno <?= $artikel['tekst_vervolg']['DATA']; ?>
                        </div>
                    </div>
                    <a href="<?= link::c($DATA['page']); ?>" class="back-link">
                    <span class="icon-chevron_left"></span>Terug naar overzicht
                </a>
                </div>
            </div>
        </div>
    </div>
    <?php
} 
