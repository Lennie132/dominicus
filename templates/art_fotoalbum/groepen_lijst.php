<?php
//--- Groepen ophalen
$order = 'g.gewicht ASC';
$groepen_arr = get_artikel_groepen_arr($DATA['group'], $order);

$teller = 1;
$groepenAantal = count($groepenArr);
$maxAantal = count($groepen_arr); //--- pas deze aan om een max of limitlink te definieeren, dit kan een hard getal zijn
$divideTeller = 0;
$divideGetal = 0;
?>
<ul class="groepen_lijst">
    <?php
    foreach ($groepen_arr as $groep) {
        $class = '';
        if ($teller == 1 or $teller == $groepenAantal or ( $teller == $groepenAantal or $teller == $maxAantal)) {
            //$class.=' class="';
            if ($teller == 1)
                $class.='eerste';
            if ($teller == 1 and ( $teller == $groepenAantal or $groep['group_id'] == $DATA['group']))
                $class.=' ';
            if ($teller == $groepenAantal or $teller == $maxAantal)
                $class.='laatste';
            if ($teller == $groepenAantal and $groep['group_id'] == $DATA['group'])
                $class.=' ';
            if ($groep['group_id'] == $DATA['group'])
                $class.='actief';
            //$class.='"';
        }
        if ($divideGetal > 0 and $divideTeller == $divideGetal) {
            ?>
            <li class="divider"><br/></li>
            <?php
            $divideTeller = 0;
            }

            //--- Voeg albumtitel toe als groep gezet is
            if ($DATA['group_id'] != '') {
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="album"> TERUG Albums
                            <?= $groepen_arr[$DATA['group']]['group_name']; ?>
                        </h2>
                    </div>
                </div>
                <?php
            }

            //Afbeelding ophalen voor groep-afbeelding
            $config = array(
            'tabelnaam' => $tabelnaam,
            'group_id' => $groep['group_id'],
            'order' => 'a.gewicht ASC', // bv: RAND()
            'artikel_id' => 0,
            'limit_links' => 0,
            'where' => '',
            'module' => 0,
            );
            // Groepen ophalen
            $groepen_arr = get_artikel_groepen_arr('', 'g.gewicht ASC');

            $art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
            if (!empty($art_arr)) {
            ?>
            <li class="<?php echo $class ?> col-md-4">
                <h2><a href="<?php echo maak_link($DATA['page'], '', '', $groep['group_id']) ?>" title="Back"><?php echo $groep['group_name'] ?></a></h2>

                <?php
                $img = get_art_file_path($art_arr[0]['afbeelding'], $art_arr[0]['artikel_id']);
                //--- Afbeelding niet leeg
                if (trim($img) != '') {
                    ?>
                    <div class="gallery-item">
                        <a class="fancybox" rel="<?= $art_arr[0]['group_id']; ?>" href="<?php echo maak_link($DATA['page'], '', '', $groep['group_id']) ?>" title="<?php echo $groep['group_name'] ?>">
                            <img src="<?= lcms::resize($img, 480, 320, '480x320', 80); ?>" class="img-responsive" alt="<?php echo $groep['group_name'] ?>">
                        </a>
                    </div>
                    <?php
                }
                ?>
            </li>

            <?php
        }
        ?>

        <?php
        $teller++;
    }
    ?>
</ul>