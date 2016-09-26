<?php
$config = array(
    'tabelnaam' => 'art_fotoalbum',
    'group_id' => '*',
    'order' => ' a.artikel_id DESC', // bv: RAND()
    'artikel_id' => 0, 
   'limit_links' => 10,
    'where' => ' GROUP BY g.group_id ',
    'module' => 0,
);

$art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
if (!empty($art_arr)) {
    ?>
    <div class="slider-wrapper">
        <div class="bxslider">
            <?php
            foreach ($art_arr as $key => $artikel) {
                $img = get_art_file_path($artikel['afbeelding'], $artikel['artikel_id']);
                if (trim($artikel['afbeelding']) != '') {
                    ?>
                    <div class="slide" style="background-image:url('<?= lcms::resize($img, 1920, 1080, '', 80); ?>');"> 
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
<?php } ?>