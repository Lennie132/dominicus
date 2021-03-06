<?php
smart_include_css('css/style.less');
smart_include_js('jquery.dotdotdot.min.js');
smart_include_js('main.js');
$config = array(
    'tabelnaam' => 'art_oudleerlingen',
    'group_id' => 0,
    'order' => 'a.gewicht ASC', // bv: RAND()
    'artikel_id' => 0,
    'limit_links' => 1,
    'where' => ''
);

/* Artikelen ophalen */





$art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
//print_pre($art_arr);
//print_pre($DATA);
if (!empty($art_arr)) {
    ?>
    <?php
    foreach ($art_arr as $key => $artikel) {
        $img = get_art_file_path($artikel['afbeelding'], $artikel['artikel_id']);
        ?>
        <div class="col-lg-4 hidden-md col-sm-12">
            <div class="student-item-latest">
                <img class="icon-oudleerling" src="img/icon-oudleerling.png">
                <?php
                if (trim($img != '')) {
                    ?>
                    <div class="student-afbeelding col-md-2 hidden-sm hidden-xs">
                        <img src="<?= lcms::resize($img, 190, 270, '190x270', 80); ?>" class="" alt="<?= $artikel['Titel']; ?>" />
                    </div>
                    <?php
                }
                ?>
                <div class="student-content col-md-10 col-sm-12">
                    <h2 class="student-titel"><?= $artikel['titel']; ?></h2>
                    <div class="student-img-space col-md-3 hidden-sm hidden-xs">

                    </div>
                    <div class="student-info col-md-9">
                        <p class="student-naam"><?= $artikel['naam']; ?></p>
                        <p class="student-jaar-leerling">Leerling in: <?= $artikel['jaar_dominicusleerling']; ?></p>
                        <p class="student-jaar-interview-beroep"><?= $artikel['jaar_interview']; ?>: <?= $artikel['beroep']; ?></p>
                        <div class="student-tekst-intro">
                            <?= $artikel['tekst_intro']; ?>
                        </div>
                        <a class="read_more" href="<?= link::v('page_oudleerlingen')->artikel_groep($artikel['page'])->artikel_id($artikel['artikel_id']); ?>" title="<?= $artikel['Titel']; ?>">
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
?>