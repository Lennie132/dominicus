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
    <div class="teacher-wrapper">
        <div class="row">
            <div class="col-xs-12">
                <a href="<?= link::c($DATA['page']); ?>" class="back-link">
                    <span class="icon-chevron_left"></span>Terug naar overzicht
                </a>
                <div class="teacher-detail">
                    <div class="row">
                        <?php
                        if (trim($img != '')) {
                            ?>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <img src="<?= lcms::resize($img, 300, 300, '300x300', 80); ?>" class="img-responsive" alt="<?= $artikel['naam']['DATA']; ?>" />
                            </div>
                        <?php } else {
                            ?>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <img src="<?= lcms::resize('img/no_user_image.png', 300, 300, '300x300', 80); ?>" class="img-responsive" alt="<?= $artikel['naam']['DATA']; ?>" />
                            </div>
                        <?php } ?>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <h2><?= $artikel['naam']['DATA']; ?></h2>
                            <?php if ($artikel['mentor']['DATA'] == 'ja') { ?>
                                <p><span class="icon-directions_walk"></span> Mentor</i> </p>
                            <?php } ?>
                            <p><a href="mailto:<?= $artikel['emailadres']['DATA']; ?>"><?= $artikel['emailadres']['DATA']; ?></a></p>
                            <?php if ($artikel['afdelingen']['DATA'] != '') { ?>
                                <h3>Afdelingen</h3>
                                <p><?= $artikel['afdelingen']['DATA']; ?></p>
                            <?php } ?>
                            <?php if ($artikel['vakken']['DATA'] != '') { ?>
                            <h3>Vakken</h3>
                                <p><?= $artikel['vakken']['DATA']; ?></p>
                            <?php } ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} 
