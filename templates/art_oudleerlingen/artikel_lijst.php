<?php
smart_include_css('css/style.less');
smart_include_css('css/style.css');
smart_include_js('main.js');
$config = array(
    'tabelnaam' => $tabelnaam,
    'group_id' => $DATA['group'],
    'order' => '', // bv: RAND()
    'artikel_id' => 0,
    'limit_links' => 10,
    'where' => ''
);

/* Artikelen ophalen */



if ($DATA['page'] == get_variabele('page_home')) {
    include dirname(__FILE__) . '/artikel_latest.php';
} else {

    $art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
    //print_pre($art_arr);
    //print_pre($DATA);
    if (!empty($art_arr)) {
        ?>
        <?php
        foreach ($art_arr as $key => $artikel) {
            $img = get_art_file_path($artikel['afbeelding'], $artikel['artikel_id']);
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="student-item">
                    <?php
                    if (trim($img != '')) {
                        ?>
                        <div class="student-afbeelding col-sm-2 hidden-xs">
                            <img src="<?= lcms::resize($img, 140, 200, '140x200', 80); ?>" class="" alt="<?= $artikel['Titel']; ?>" />
                        </div>
                        <?php
                    }
                    ?>
                    <div class="student-content col-sm-10 col-xs-12">
                        <h2 class="student-titel"><?= $artikel['titel']; ?></h2>
                        <div class="student-img-space col-sm-3 hidden-xs">

                        </div>
                        <div class="student-info col-sm-9">
                            <p class="student-naam"><?= $artikel['naam']; ?></p>
                            <p class="student-jaar-leerling">Dominicus leerling in: <?= $artikel['jaar_dominicusleerling']; ?></p>
                            <p class="student-jaar-interview-beroep">Anno <?= $artikel['jaar_interview']; ?>: <?= $artikel['beroep']; ?></p>
                            <div class="student-tekst-intro">
                                Anno <?= $artikel['tekst_intro']; ?>
                            </div>
                            <a class="read_more" href="<?= link::c($DATA['page'])->artikel_groep($artikel['page'])->artikel_id($artikel['artikel_id']); ?>" title="<?= $artikel['Titel']; ?>">
                                Lees meer<span class="icon-chevron_right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php if (count($art_arr) > 10) { ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="pagination">
                        <?php
                        limit_links('', true);
                        clear_limit();
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
    }
}
?>