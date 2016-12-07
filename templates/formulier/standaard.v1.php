<?php
global $DATA;
smart_include_js('formulier/pickaday.js');//small datepicker
smart_include_css('formulier/pickaday.css');//small datepicker

smart_include_css('formulier/formstyle.css');
smart_include_js('formulier/formscript.js');
/**
 * Template voor formulieren
 */
$form = lcms::Formulier($this->config);
/** post data en andere betaal notify's afhandelen. * */
$form->setAction(LINK::create($DATA['page'])
				->artikel_groep($DATA['group'])
				->artikel_id($DATA['artikel_id'])
				->bestelpagina($DATA['bestel'])
				->nieuwsitem($DATA['nieuwsitem'])
				->webshop_abbo($DATA['wabo'])
				->webshop_hoofdgroep($DATA['whg'])
				->webshop_groep($DATA['wg'])
				->webshop_hoofdartikel($DATA['whart'])
				->webshop_artikel($DATA['wart'])
				->bestelpagina($DATA['bestel'])
				->extra($DATA['bestel'])
				->return_absolute()
				->returnlink());

//$form->setErrorClass('formulier_verzonden');
//$form->setVerzondenClass('formulier_fout');
//$form->setVerifyClass('formulier_fout');

$form->handleRequests();
//--- maatwerk toevoegen
if ($form->config('form_maatwerk_html') != '' and is_file($form->config('form_maatwerk_html'))) {
	include $form->config('form_maatwerk_html');
}
?>
<div class="<?= $form->config('klasse'); ?>" id="anchor_<?= $form->config('block_id') ?>">
		<div class="<?= $form->getHeaderClass() ?>">
				<?= $form->getHeader(); ?>
		</div>

		<?php if (!$form->getVerzonden()) { ?>

			<form action="<?php echo $form->getAction(); ?>#anchor_<?= $form->config('block_id'); ?>" enctype="multipart/form-data" method="post" class="<?= $form->config('form_klasse') ?>">
					<?php
					$hidden = '';
					foreach ($form->getVelden() as $veld) {
						/* @var $veld lcmsFormulierVeld */
						if ($veld->isHidden()) {
							//verborgen velden als hidden input tonen.
							$hidden .= '<input type="hidden" name="' . $veld->getName() . '" id="veld_' . $veld->config('veld_id') . '" value="' . $veld->getValue() . '"/>';
						} else {
							?>
							<div class="formulier_div <?= $veld->config('form_veld_class') . ($veld->getError() ? ' inpfout' : ''); ?>" id="form_regel_<?= $veld->config('block_id') ?>_<?= $veld->config('veld_id') ?>" <?=$veld->getConditionAttributes()?>>
									<?php
									if ($veld->getVollebreedte()) {
										//geen label tonen bij een hr of een patte teks regels bijvoorbeeld.
									} else {
										echo '<label class="form-label">';
										if ($veld->getHideName()) {
											echo '&nbsp;';
										} else {
											echo $veld->getName() . $veld->getRequiredMark();
										}
										echo '</label>';
									}
									echo '<span class="form-input '.$veld->getType().'">';
									$veld->getInput();
									$veld->getTooltip();
									$veld->getBetaalInfo();
									echo '</span>';
									?>
							</div>
							<?php
						}
					}
					if($form->config('form_betaalmethode')!=''){
						?>
						<div class="formulier_div formulier_seperator"><hr/></div>
						<div class="formulier_div totaalbedrag">
								<label class="formulier_kolom1">Totaal bedrag </label>
								<span class="formulier_kolom2 form_prijs form_totaalprijs" data-valuta="&euro;">&euro;&nbsp;<?= number_format($form->getTotaalBedrag(), 2, ",", "."); ?></span>
						</div>
						<?php
					}
					if ($form->getBetaalstatus() == 'verify') {
						?>
						<div class="formulier_div form_betaalwijzes">
								<label class="formulier_kolom1">Betalen met </label>
								<span class="formulier_kolom2">
										<?php
										$services = $form->Betaalwijze()->getServices();
										$selected = 'checked'; //even de eerste selecteren
										foreach ($services as $service) {
											/* @var $wijze FormPaymentService */
											echo '<div class="form_betaalwijze_service">';
											echo '<input type="radio" name="formulier_payment[' . $form->config('block_id') . ']" value="' . $service->getKey() . '" id="bw_' . $service->getKey() . '" '.$selected.' required />';
											echo '<label for="bw_' . $service->getKey() . '">' . $service->getName() . '</label>';
											echo '</div>';
											$selected='';
										}
										?>
								</span>
						</div>
						<div class="formulier_div_submit" id="form_div_submit_<?= $form->config('block_id') ?>">
								<span><input class="form_submit btn form_back" type="button" value="Terug" onclick="window.location = '<?= $form->getAction(); ?>'"/></span>
								<span><input class="form_submit btn" type="submit" name="submit_form[<?= $form->config('block_id') ?>]" value="Bevestig en betaal"/></span>
						</div>
						<?php
					} else {
						?>
						<div class="formulier_div_submit" id="form_div_submit_<?= $form->config('block_id') ?>">
								<input class="form_submit btn" type="submit" name="submit_form[<?= $form->config('block_id') ?>]" value="<?= $form->config('knop_value') ?>"/>
						</div>
<?php			} ?>
			</form>
<?php } ?>
</div>