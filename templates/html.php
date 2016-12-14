<?php
  global $block;
  $block_sfeer = get_sfeerafbeelding($DATA['page'], 1, false, true, false, $block[0]['block_id']);
  //print_pre($block_sfeer);
  $useSfeer = false;
  $useSfeerLink = false;
  if (trim($block_sfeer['afbeelding']) != '') {
    $useSfeer = true;
    if ($block_sfeer['link'] != '' && $block_sfeer['link'] != 0) {
      $useSfeerLink = true;
    }
  }

  if (strpos($block[0]['klasse'], 'block--style-1') !== false) {
 
    ?>
    <div style="<?= $useSfeer ? 'height: 100%' : ''; ?>" class="<?= $block[0]['klasse']; ?> block">
      <?php if ($useSfeerLink) { ?>
        <a class="block__link" href="<?= $block_sfeer['link']; ?>" title="<?= get_pagina_title($block_sfeer['link']); ?>">
        <?php } ?>

        <div <?= $useSfeer ? 'class="block--sfeer" style="background-image: url(\'' . lcms::resize($block_sfeer['afbeelding'], 920, 1920, '', 80) . '\')"' : ''; ?>>
          <?= $block[0]['html']; ?>
        </div>

        <?php if ($useSfeerLink) { ?>
        </a>
      <?php } ?>

    </div>
    <?php
  } else if (strpos($block[0]['klasse'], 'block--style-2') !== false) {
    ?>
    <div style="<?= $useSfeer ? 'height: 100%' : ''; ?>" class="<?= $block[0]['klasse']; ?>">
      <?php if ($useSfeerLink) { ?>
        <a href="<?= $block_sfeer['link']; ?>" title="<?= get_pagina_title($block_sfeer['link']); ?>">
        <?php } ?>
        <div class="block__content">
          <?= $block[0]['html']; ?>
        </div>

        <div <?= $useSfeer ? 'class="block--sfeer block__sfeer" style="background-image: url(\'' . lcms::resize($block_sfeer['afbeelding'], 920, 920, '', 80) . '\')"' : ''; ?>>
        </div>
        <?php if ($useSfeerLink) { ?>
        </a>
      <?php } ?>
    </div>

    <?php
  } else if (strpos($block[0]['klasse'], 'block--style-3') !== false) {
    ?>
    <div style="<?= $useSfeer ? 'height: 100%' : ''; ?>" class="<?= $block[0]['klasse']; ?>">
      <?php if ($useSfeerLink) { ?>
        <a href="<?= $block_sfeer['link']; ?>" title="<?= get_pagina_title($block_sfeer['link']); ?>">
        <?php } ?>
        <div class="block__content">
          <?= $block[0]['html']; ?>
        </div>
        <div <?= $useSfeer ? 'class="block--sfeer block__sfeer" style="background-image: url(\'' . lcms::resize($block_sfeer['afbeelding'], 920, 920, '', 80) . '\')"' : ''; ?>>
        </div>
        <?php if ($useSfeerLink) { ?>
        </a>
      <?php } ?>
    </div>
    <?php
  } else if (strpos($block[0]['klasse'], 'block--style-4') !== false) {
    ?>
    <div style="<?= $useSfeer ? 'height: 100%' : ''; ?>" class="<?= $block[0]['klasse']; ?>">
      <?php if ($useSfeerLink) { ?>
        <a href="<?= $block_sfeer['link']; ?>" title="<?= get_pagina_title($block_sfeer['link']); ?>">
        <?php } ?>
        <div <?= $useSfeer ? 'class="block--sfeer block__sfeer" style="background-image: url(\'' . lcms::resize($block_sfeer['afbeelding'], 920, 920, '', 80) . '\')"' : ''; ?>>
        </div>

        <div class="block__content">
          <?= $block[0]['html']; ?>
        </div>
        <?php if ($useSfeerLink) { ?>
        </a>
      <?php } ?>
    </div>
    <?php
  } else if (strpos($block[0]['klasse'], 'block--style-5') !== false) {
    ?>
    <div style="<?= $useSfeer ? 'height: 100%' : ''; ?>" class="<?= $block[0]['klasse']; ?>">
      <?php if ($useSfeerLink) { ?>
        <a href="<?= $block_sfeer['link']; ?>" title="<?= get_pagina_title($block_sfeer['link']); ?>">
        <?php } ?>
        <div <?= $useSfeer ? 'class="block--sfeer block__sfeer" style="background-image: url(\'' . lcms::resize($block_sfeer['afbeelding'], 920, 920, '', 80) . '\')"' : ''; ?>>
        </div>
        <?php if ($useSfeerLink) { ?>
        </a>
      <?php } ?>
      <div class="block__content">
        <?= $block[0]['html']; ?>
      </div>
    </div>
    <?php
  } else if (strpos($block[0]['klasse'], 'block--style-6') !== false) {
    ?>
    <div style="<?= $useSfeer ? 'height: 100%' : ''; ?>" class="<?= $block[0]['klasse']; ?>">
      <?php if ($useSfeerLink) { ?>
      <a class="block__link" href="<?= $block_sfeer['link']; ?>" title="<?= get_pagina_title($block_sfeer['link']); ?>">
        <?php } ?>
        <div <?= $useSfeer ? 'class="block--sfeer block__sfeer" style="background-image: url(\'' . lcms::resize($block_sfeer['afbeelding'], 920, 920, '', 80) . '\')"' : ''; ?>>
        </div>
        <div class="block__content">
          <?= $block[0]['html']; ?>
        </div>
        <?php if ($useSfeerLink) { ?>
        </a>
      <?php } ?>
    </div>
  <?php } else {
    ?>
    <div style="<?= $useSfeer ? 'height: 100%' : ''; ?>" class="<?= $block[0]['klasse']; ?>">
      <div <?= $useSfeer ? 'class="block--sfeer" style="background-image: url(\'' . lcms::resize($block_sfeer['afbeelding'], 920, 920, '', 80) . '\')"' : ''; ?>>
        <?= $block[0]['html']; ?>
      </div>
    </div>
  <?php } ?>

<?php
  unset($block_sfeer);
?>

