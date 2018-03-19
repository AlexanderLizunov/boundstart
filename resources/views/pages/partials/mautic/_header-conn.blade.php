<script type="text/javascript">
	/** This section is only needed once per page if manually copying **/
	var message = @lang('general.mautic.message');
	if (typeof MauticSDKLoaded == 'undefined') {
		var MauticSDKLoaded = true;
		var head            = document.getElementsByTagName('head')[0];
		var script          = document.createElement('script');
		script.type         = 'text/javascript';
		script.src          = 'https://software.boundstart.com/media/js/mautic-form.js';
		script.onload       = function() {
			MauticSDK.onLoad();
		};
		head.appendChild(script);
		var MauticDomain = 'https://software.boundstart.com';
		var MauticLang   = {
			'submittingMessage': message
		}
	}
</script>