<?php
global $block;
$block_sfeer = get_sfeerafbeelding($DATA['page'], 1, false, false, false, $block[0]['block_id']);

if (!empty($block[0]['klasse'])) {
    ?>
    <div class="<?php echo $block[0]['klasse'] ?>"><?= $block[0]['html'] ?></div>
    <?php
} else {
    if (trim($block_sfeer) != '') {
        ?>
        <div class='background-image' style="background-image: url('<?= $block_sfeer ?>');">
            <?php
        }
        echo $block[0]['html'];
        
        if (trim($block_sfeer) != '') {
            ?>
        </div>
        <?php
    }
}