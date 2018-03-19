<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class=" custom-button" data-dismiss="modal">X</button>
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"> @lang('modals.order-demo.title')</h4>
			
			</div>
			<div class="modal-body">
				
				<div class="down-arrow">
				</div>
				
				
				<div id="mauticform_wrapper_boundstartform" class="mauticform_wrapper">
					<form autocomplete="false" class="modal-form" role="form" method="post" action="https://software.boundstart.com/form/submit?formId=12" id="mauticform_boundstartform" data-mautic-form="boundstartform" enctype="multipart/form-data">
						<div class="mauticform-error" id="mauticform_boundstartform_error"></div>
						<div class="mauticform-message" id="mauticform_boundstartform_message"></div>
						<div class="mauticform-innerform">
							
							
							<div class="mauticform-page-wrapper mauticform-page-1" data-mautic-form-page="1">
								
								<div id="mauticform_boundstartform_ima"  data-validate="ima" data-validation-type="text" class="mauticform-row mauticform-text mauticform-field-1 mauticform-required item-cover">
									<input id="mauticform_input_boundstartform_ima" name="mauticform[ima]" value="" placeholder="@lang('modals.order-demo.name') " class="mauticform-input form-item form-name" type="text" />
									<span class="mauticform-errormsg" style="display: none;">@lang('modals.order-demo.error') </span>
								</div>
								
								<div id="mauticform_boundstartform_email"  data-validate="email" data-validation-type="email" class="mauticform-row mauticform-email mauticform-field-2 mauticform-required item-cover ">
									<input id="mauticform_input_boundstartform_email" name="mauticform[email]" value="" placeholder='@lang('modals.order-demo.email') ' class="mauticform-input form-item form-email" type="email" />
									<span class="mauticform-errormsg" style="display: none;">@lang('modals.order-demo.error') </span>
								</div>
								
								<div id="mauticform_boundstartform_telefon"  data-validate="telefon" data-validation-type="tel" class="mauticform-row mauticform-tel mauticform-field-3 mauticform-required item-cover">
									<input id="mauticform_input_boundstartform_telefon" name="mauticform[telefon]" value="" placeholder="@lang('modals.order-demo.phone') " class="mauticform-input form-item form-email" type="tel" />
									<span class="mauticform-errormsg" style="display: none;">@lang('modals.order-demo.error') </span>
								</div>
								
								
								<div id="mauticform_boundstartform_company1"  data-validate="company1" data-validation-type="text" class="mauticform-row mauticform-text mauticform-field-4 mauticform-required item-cover">
									<input id="mauticform_input_boundstartform_company1" name="mauticform[company1]" placeholder="@lang('modals.order-demo.company-name') " value="" class="mauticform-input form-item form-email" type="text" />
									<span class="mauticform-errormsg" style="display: none;">@lang('modals.order-demo.error')</span>
								</div>
								
								<div id="mauticform_boundstartform_site1"  data-validate="site1" data-validation-type="text" class="mauticform-row mauticform-text mauticform-field-5 mauticform-required item-cover">
									<input id="mauticform_input_boundstartform_site1" name="mauticform[site1]" value="" placeholder="@lang('modals.order-demo.company-url') " class="mauticform-input form-item form-email" type="text" />
									<span class="mauticform-errormsg" style="display: none;">@lang('modals.order-demo.error')
                                    </span>
								</div>
								
								<input id="mauticform_input_boundstartform_clinet" name="mauticform[clinet]" value="Boundstart" class="mauticform-hidden" type="hidden" />
								<div id="mauticform_boundstartform_zakazat_demo"  class="mauticform-row mauticform-button-wrapper mauticform-field-7">
									<button type="submit" name="mauticform[zakazat_demo]" id="mauticform_input_boundstartform_zakazat_demo" name="mauticform[zakazat_demo]" value="1" class="mauticform-button form-item form-button" value="1">@lang('modals.order-demo.button') </button>
								</div>
							</div>
						</div>
						
						<input type="hidden" name="mauticform[formId]" id="mauticform_boundstartform_id" value="12"/>
						<input type="hidden" name="mauticform[return]" id="mauticform_boundstartform_return" value=""/>
						<input type="hidden" name="mauticform[formName]" id="mauticform_boundstartform_name" value="boundstartform"/>
					</form>
					
					
					<div class="success-message"><span><b>&#10003</b>@lang('modals.order-demo.ok') </span> <br> @lang('modals.order-demo.contact') </div>
				</div>
			
			</div>
		</div>
	</div>
</div>