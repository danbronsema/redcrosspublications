(function($) {
	
	var $container = $('#issue-list').imagesLoaded(function(){
		var defaultSorting = 'date';
		var defaultSortingOrder = false;
		if ($(".the-issue").length) {
			defaultSorting = 'original-order';
			defaultSortingOrder = true;
		}
		$container.isotope({
			getSortData: {
				date: '[data-date]',
				publication: '[data-publication]'
			},
			itemSelector: '.issue',
			layoutMode: 'masonry',
      sortBy: defaultSorting,
      sortAscending: defaultSortingOrder
		});
	});

	$('#sort-buttons').on( 'click', 'a', function() {
    $(this).toggleClass('active').siblings().removeClass('active');
		var sortByValue = $(this).attr('data-sort-by');
		var $sortOrder = false;
		if ($(this).hasClass('oldest')) {
			$sortOrder = true;
		} else {
			$sortOrder = false;
		}
		$container.isotope({
			getSortData: {
				date: '[data-date]',
				publication: '[data-publication]'
			},
      itemSelector: '.issue',
			layoutMode: 'masonry',
			sortBy: sortByValue,
			sortAscending: $sortOrder
		});
	});

	$('#issue-menu').on('click', function(){
		$('.the-issue-menu').slideToggle('hide-small');
	});

	$('#navigation-toggle').on('click', function(){
		console.log("adsdas");
		$('#site-navigation').slideToggle();
	});


  if ($('body').width() < 749) {
		$(".fancybox").fancybox({
			fixed: false,
			height: '100%',
			margin: [0,0,0,0],
			padding: [0,0,0,0],
			autoSize: false,
			topRatio: 0,
			scrolling: 'yes',
			closeClick: true,
			type			: 'ajax',
			ajax : { headers : { 'X-fancyBox': true }},
			openEffect	: 'fade',
			closeEffect	: 'fade',
				tpl : {
					closeBtn : '<a title="Close" class="fancybox-item fancybox-close" style="top:10px;" href="javascript:;">Close</a>'
				}
			});
  } else {
		$(".fancybox").fancybox({
			maxWidth	: 700,
			padding		: '0',
			type			: 'ajax',
			ajax : { headers : { 'X-fancyBox': true }},
			openEffect	: 'fade',
			closeEffect	: 'fade',
			tpl : {
				closeBtn : '<a title="Close" class="fancybox-item fancybox-close" style="top:10px;" href="javascript:;">Close</a>'
			}
		});
  }

  $('#around-australia').on('click', function(){
		var $menu = $(this);
		$('#around-australia-menu').slideToggle(150, function(){
			if ($menu.text() == '- Around Australia') {
				$menu.text('+ Around Australia'); } else {
				$menu.text('- Around Australia');
			}
		});
  });
  
} )( jQuery );
