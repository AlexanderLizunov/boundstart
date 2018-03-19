<script>
	(function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
		w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
			m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://software.boundstart.com/mtc.js','mt');
	
	mt('send', 'pageview');
</script>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	if (typeof MauticFormCallback == 'undefined') {
		var MauticFormCallback = {};
	}
	MauticFormCallback['boundstartform'] = {
		onResponse: function (response) {
			if (response.success == 1) {
//				fbq('track', 'Lead', {
//					value: 1.00,
//					currency: 'USD'
//				});
				
				gtag('event', 'Demo request', {
					event_category: 'Submit',
					event_action: 'Form',
					event_label: 'Demo-English',
					value: 1
				});
				
				$.ajax({
					type: "POST",
					url: "/send-notifications",
					data: {
						email:response.results.email,
						phone:response.results.telefon,
						name:response.results.ima,
						company:response.results.company1,
						web:response.results.site1
					},
					success: function (some) {
						console.log(some);
					}
				});
				
				$(".modal-body").addClass('modal-success');
			}
		}
	};
	
	MauticFormCallback['boundstartphotograpshers'] = {
		onResponse: function (response) {
			if (response.success == 1) {
//				fbq('track', 'Lead', {
//					value: 1.00,
//					currency: 'USD'
//				});
				
				gtag('event', 'Demo request', {
					event_category: 'Submit',
					event_action: 'Form',
					event_label: 'Demo-Photographers',
					value: 1
				});
				
				$.ajax({
					type: "POST",
					url: "/send-notifications",
					data: {
						email:response.results.email,
						phone:response.results.telefon,
						name:response.results.ima,
						company:response.results.company,
					},
					success: function (some) {
						console.log(some);
					}
				});
				
			}
		}
	};
	
	MauticFormCallback['boundstartsalesmain'] = {
		onResponse: function (response) {
			if (response.success == 1) {
//				fbq('track', 'Lead', {
//					value: 1.00,
//					currency: 'USD'
//				});
				
				gtag('event', 'Demo request', {
					event_category: 'Submit',
					event_action: 'Form',
					event_label: 'Main-Screen',
					value: 1
				});
				
				$.ajax({
					type: "POST",
					url: "/send-notifications",
					data: {
						email:response.results.email,
						phone:response.results.telefon,
						name:response.results.ima,
						web:response.results.site1
					},
					success: function (some) {
						console.log(some);
					}
				});
				
				$(".modal-body").addClass('modal-success');
			}
		}
	};
	
	MauticFormCallback['boundstartsalescta1'] = {
		onResponse: function (response) {
			if (response.success == 1) {
//				fbq('track', 'Lead', {
//					value: 1.00,
//					currency: 'USD'
//				});
				
				gtag('event', 'Callback', {
					event_category: 'Submit',
					event_action: 'Form',
					event_label: 'Callback',
					value: 1
				});
				
				$.ajax({
					type: "POST",
					url: "/start-call",
					data: {
						phone:response.results.telefon,
					},
					success: function (some) {
						console.log(some);
					}
				});
			}
		}
	};
	
	MauticFormCallback['boundstartsalescta2'] = {
		onResponse: function (response) {
			if (response.success == 1) {
//				fbq('track', 'Lead', {
//					value: 1.00,
//					currency: 'USD'
//				});
				
				gtag('event', 'Callback', {
					event_category: 'Submit',
					event_action: 'Form',
					event_label: 'Callback',
					value: 1
				});

				$.ajax({
					type: "POST",
					url: "/start-call",
					data: {
						phone:response.results.telefon,
					},
					success: function (some) {
						console.log(some);
					}
				});
			}
		}
	};
	
	MauticFormCallback['boundstartsalespopup'] = {
		onResponse: function (response) {
			if (response.success == 1) {
//				fbq('track', 'Lead', {
//					value: 1.00,
//					currency: 'USD'
//				});
//
				gtag('event', 'Presentation request', {
					event_category: 'Submit',
					event_action: 'Form',
					event_label: 'Presentation',
					value: 1
				});
				
				$.ajax({
					type: "POST",
					url: "/start-call",
					data: {
						phone:response.results.telefon,
					},
					success: function (some) {
						console.log(some);
					}
				});
			}
		}
	};
</script>