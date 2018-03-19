<div class="modal fade" id="salesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog sales-modal" role="document">
		<div class="modal-content">
			<button type="button" class=" custom-button" data-dismiss="modal">X</button>
			<div class="modal-body ">
				
				<div class="down-arrow">
				</div>
				
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"> @lang('modals.order-demo.title')</h4>
				
				</div>
				
				<div id="mauticform_wrapper_boundstartsalespopup" class="mauticform_wrapper">
					<form autocomplete="false" class="modal-form" role="form" method="post" action="https://software.boundstart.com/form/submit?formId=31" id="mauticform_boundstartsalespopup"  data-mautic-form="boundstartsalespopup" enctype="multipart/form-data">
						<div class="mauticform-error" id="mauticform_boundstartsalespopup_error"></div>
						<div class="mauticform-message" id="mauticform_boundstartsalespopup_message"></div>
						<div class="mauticform-innerform">
							
							
							<div class="mauticform-page-wrapper mauticform-page-1" data-mautic-form-page="1">
								
								<div id="mauticform_boundstartsalespopup_telefon"  data-validate="telefon" data-validation-type="tel" class="mauticform-row mauticform-tel mauticform-field-1 mauticform-required item-cover">
									<input id="mauticform_input_boundstartsalespopup_telefon" name="mauticform[telefon]" value="" placeholder="Ваш Телефон" class="mauticform-input form-item form-name" type="tel" />
									<span class="mauticform-errormsg" style="display: none;">Обязательное поле</span>
								</div>
								
								<div id="mauticform_boundstartsalespopup_f_select"  data-validate="f_select" data-validation-type="select" class="mauticform-row mauticform-select mauticform-field-2 mauticform-required item-cover">
									<label style="display: none" id="mauticform_label_boundstartsalespopup_f_select" for="mauticform_input_boundstartsalespopup_f_select" class="mauticform-label">Select</label>
									<select id="mauticform_input_boundstartsalespopup_f_select" name="mauticform[f_select]" value="" class="mauticform-selectbox form-item form-name">
										<option value="">Выберите направление</option>
										<option value="Спорт">Спорт</option>
										<option value="Красота">Красота</option>
										<option value="Медицина">Медицина</option>
										<option value="Фотография">Фотография</option>
										<option value="Тур фирмы">Тур фирмы</option>
										<option value="Образование">Образование</option>
									</select>
									<span class="mauticform-errormsg" style="display: none;">Обязательное поле</span>
								</div>
								
								<input id="mauticform_input_boundstartsalespopup_clinet" name="mauticform[clinet]" value="Boundstart" class="mauticform-hidden" type="hidden" />
								<div id="mauticform_boundstartsalespopup_zakazat_demo"  class="mauticform-row mauticform-button-wrapper mauticform-field-4">
									<button type="submit" name="mauticform[zakazat_demo]" id="mauticform_input_boundstartsalespopup_zakazat_demo" name="mauticform[zakazat_demo]" value="" class="mauticform-button form-item form-button" value="1">Заказать Демо</button>
								</div>
							</div>
						</div>
						
						<input type="hidden" name="mauticform[formId]" id="mauticform_boundstartsalespopup_id" value="31"/>
						<input type="hidden" name="mauticform[return]" id="mauticform_boundstartsalespopup_return" value=""/>
						<input type="hidden" name="mauticform[formName]" id="mauticform_boundstartsalespopup_name" value="boundstartsalespopup"/>
					
					</form>
				</div>
				
				<div class="success-message"><span><b>&#10003</b>@lang('modals.order-demo.ok') </span> <br> @lang('modals.order-demo.contact') </div>
				{{--</div>--}}
			</div>
		</div>
	</div>
</div>