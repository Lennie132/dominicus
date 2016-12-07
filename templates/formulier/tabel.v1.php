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
/** post data en andere betaal notify's afhandelen. **/
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
			
<?php	if (!$form->getVerzonden()) { ?>
			
			<form action="<?php echo $form->getAction(); ?>#anchor_<?= $form->config('block_id');?>" enctype="multipart/form-data" method="post" class="<?= $form->config('form_klasse') ?>" >
					<table summary="<?= get_meta_tag('titel_prefix') ?> - <?= get_meta_tag('pagina_titel') ?>" class="formulier" cellpadding=0 cellspacing=0 >
							<?php
							$hidden = '';
							foreach ($form->getVelden() as $veld) {								
								/* @var $veld lcmsFormulierVeld */
								
								if ($veld->isHidden()) {
									//verborgen velden als hidden input tonen.
									$hidden .= '<input type="hidden" name="' . $veld->getName() . '" id="veld_' . $veld->config('veld_id') . '" value="' . $veld->getValue() . '"/>';
								}else{
								?>
								<tr class="<?= $veld->config('form_veld_class') ?>"  <?=$veld->getConditionAttributes()?>>
									<?php
										if ($veld->getVollebreedte()) {
											echo '<td colspan="2" class="formulier_kolom2 colspan2' . ($veld->getError() ? ' inpfout_kolom2' : '') . '">';
											$veld->getInput();
											$veld->getTooltip();
											echo '</td>';
										} else {
											echo '<td class="formulier_kolom1 ' . ($veld->getError() ? ' inpfout' : '') . '">';
											if (!$veld->getHideName()) {	//De naam label niet verbergen
												echo $veld->getName() . $veld->getRequiredMark();
											} else {
												echo '&nbsp;';
											}
											echo '</td>';
											echo '<td class="formulier_kolom2 '.$veld->getType() . ($veld->getError() ? ' inpfout_kolom2' : '') . '">';
											$veld->getInput();
											$veld->getTooltip();
											$veld->getBetaalInfo();
											echo '</td>';
										}
									?>
								</tr>
								<?php
								}
							}
							if($form->config('form_betaalmethode')!=''){
								?>
								<tr cass="formulier_seperator"><td colspan="2"><hr/></td></tr>
								<tr class="totaalbedrag">
										<td class="formulier_kolom1">Totaal bedrag </td>
										<td class="formulier_kolom2"><span class="form_prijs form_totaalprijs" data-valuta="&euro;">&euro;&nbsp;<?= number_format($form->getTotaalBedrag(),2,",",".");?></span></td>
								</tr>
								<?php
							}
							if($form->getBetaalstatus()=='verify'){
								?>
								
								<tr class="totaalbedrag">
										<td class="formulier_kolom1">Betalen met </td>
										<td class="formulier_kolom2">
												<span class="form_betaalwijzes">
												<?php
												$services = $form->Betaalwijze()->getServices();
												$selected = 'checked'; //even de eerste selecteren
												foreach($services as $service){
													/* @var $wijze FormPaymentService */
													echo '<div class="form_betaalwijze_service">';
													echo '<input type="radio" name="formulier_payment['.$form->config('block_id').']" value="'.$service->getKey().'" id="bw_'.$service->getKey().'" '.$selected.' required />';
													echo '&nbsp;<label for="bw_'.$service->getKey().'">'.$service->getName().'</label>';
													echo '</div>';
													$selected = '';
												}?>
												</span>
										</td>
								</tr>
								<tr>
										<td><input class="form_submit btn form_back" type="button" value="Terug" onclick="window.location='<?=$form->getAction();?>'"/></td>
										<td><input class="form_submit btn" type="submit" name="submit_form[<?= $form->config('block_id') ?>]" value="Bevestig en betaal"/></td>
								</tr>
								<?php
							}else{
								?>
								<tr>
										<td></td>
										<td><input class="form_submit btn" type="submit" name="submit_form[<?= $form->config('block_id') ?>]" value="<?= $form->config('knop_value') ?>"/></td>
								</tr>
							<?php } ?>
					</table>
					<?= $hidden; ?>
			</form>
			
<?php } ?>
	</div>
