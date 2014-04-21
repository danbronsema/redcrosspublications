jQuery(document).ready(function() {
		jQuery(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			type: 'ajax',
			height		: '70%',
			autoSize	: false,
			ajax : { headers : { 'X-fancyBox': true }},
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
	});
		console.log('loaded this');
	});