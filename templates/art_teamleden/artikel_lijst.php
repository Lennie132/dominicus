<?php
smart_include_css('css/style.less');
smart_include_css('css/style.css');
smart_include_js('main.js');

/* Afdelingen ophalen */
$afdelingen_arr = get_artikelen_arr('art_afdelingen', 0, '', 0, 0, '');
//print_pre($afdelingen_arr);

/* Vakken ophalen */
$vakken_arr = get_artikelen_arr('art_vakken', 0, '', 0, 0, '');

/* Artikelen ophalen */
$config = array(
    'tabelnaam' => $tabelnaam,
    'group_id' => $DATA['group'],
    'order' => '', // bv: RAND()
    'artikel_id' => 0,
    'limit_links' => 16,
    'where' => ''
);

if (trim($DATA['afdeling']) != '') {
    $config['where'] = $config['where'] . ' AND t.afdelingen REGEXP "(^|,)(' . sql::escape($DATA['afdeling']) . ')($|,)"';
}

if (trim($DATA['vak']) != '') {
    $config['where'] = $config['where'] . ' AND t.vakken REGEXP "(^|,)(' . sql::escape($DATA['vak']) . ')($|,)"';
}

$art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
//print_pre($art_arr);
//print_pre($DATA);

if (!empty($art_arr)) {
    ?>
    <div class="teacher-wrapper">
        <div class="col-xs-12">
            <div class="filter-wrapper">
                <form action="" method="get">
                    <div class="filter-item button <?= ($DATA['afdeling'] == '' && $DATA['vak'] == '') ? 'active' : '' ?>"><input type="submit" name="alles" value="Alle" onclick="this.form.submit()"></div>
                    <div class="filter-item select <?= ($DATA['afdeling'] != '') ? 'active' : '' ?>">
                        Afdeling: 
                        <?php
                        if (!empty($afdelingen_arr)) {
                            foreach ($afdelingen_arr as $key => $val) {
                                if ($val['artikel_id'] == $DATA['afdeling']) {
                                    echo $val['afdeling_naam'];
                                }
                            }
                        }
                        ?>
                        <select name="afdeling"  onchange="this.form.submit()">
                            <option value="">Alle</option>
                            <?php
                            if (!empty($afdelingen_arr)) {
                                foreach ($afdelingen_arr as $key => $afdeling) {
                                    ?>
                                    <option value="<?= $afdeling['artikel_id']; ?>"><?= $afdeling['afdeling_naam']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>  
                    </div>
                    <div class="filter-item select <?= ($DATA['vak'] != '') ? 'active' : '' ?>">
                        Vak: 
                        <?php
                        if (!empty($vakken_arr)) {
                            foreach ($vakken_arr as $key => $val) {
                                if ($val['artikel_id'] == $DATA['vak']) {
                                    echo $val['vak_naam'];
                                }
                            }
                        }
                        ?>
                        <select name="vak" onchange="this.form.submit()">
                            <option value="">Alle</option>
                            <?php
                            if (!empty($vakken_arr)) {

                                foreach ($vakken_arr as $key => $vak) {
                                    ?>
                                    <option value="<?= $vak['artikel_id']; ?>" ><?= $vak['vak_naam']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>  
                    </div>
                </form>
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
        <?php //if (count($art_arr) > 16) {    ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="pagination">
                    <?php
                    limit_links(false, true);
                    clear_limit();
                    ?>
                </div>
            </div>
        </div>
        <?php //}   ?>
    </div>
<?php } ?>