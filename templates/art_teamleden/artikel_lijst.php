<?php
smart_include_css('css/style.less');
smart_include_css('css/style.css');
smart_include_js('main.js');

/* Artikelen ophalen */
$config = array(
    'tabelnaam' => $tabelnaam,
    'group_id' => $DATA['group'],
    'order' => '', // bv: RAND()
    'artikel_id' => 0,
    'limit_links' => 10,
    'where' => ''
);
$art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
//print_pre($art_arr);
//print_pre($DATA);

/* Afdelingen ophalen */
$afdelingen_arr = get_artikelen_arr('art_afdelingen', 0, '', 0, 0, '');

/* Vakken ophalen */
$vakken_arr = get_artikelen_arr('art_vakken', 0, '', 0, 0, '');


if (!empty($art_arr)) {
    ?>
    <div class="teacher-wrapper">
        <div class="col-xs-12">
            <div class="filter-wrapper">
                <div class="filter-item active" data-filter="*">Allen</div>
                <div class="filter-item">
                    Afdeling:  
                    <select>
                        <?php foreach ($afdelingen_arr as $key => $afdeling) { ?>

                            <option><?= $afdeling['afdeling_naam']; ?></option>
                        <?php } ?>
                    </select>  
                </div>
                <div class="filter-item">
                    Vakken
                    <select>
                        <?php foreach ($vakken_arr as $key => $vak) { ?>

                            <option><?= $vak['vak_naam']; ?></option>
                        <?php } ?>
                    </select>  
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            foreach ($art_arr as $key => $artikel) {
                $img = get_art_file_path($artikel['afbeelding'], $artikel['artikel_id']);
                ?>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="teacher-item">
                        <div class="row">
                            <a href="<?= link::c($DATA['page'])->artikel_groep($artikel['page'])->artikel_id($artikel['artikel_id']); ?>" title="<?= $artikel['naam']; ?>">
                                <?php if (trim($img != '')) { ?>
                                    <div class="col-xs-12">
                                        <img src="<?= lcms::resize($img, 300, 300, '300x300', 80); ?>" class="img-responsive" alt="<?= $artikel['naam']; ?>" />
                                    </div>
                                <?php } else { ?>
                                    <div class="col-xs-12">
                                        <img src="<?= lcms::resize('img/no_user_image.png', 300, 300, '300x300', 80); ?>" class="img-responsive" alt="<?= $artikel['naam']; ?>" />
                                    </div>
                                <?php } ?>
                                <div class="col-xs-12 teacher-name">
                                    <h2><?= $artikel['naam']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
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
    </div>
<?php } ?>