jQuery(document).ready(function($){
		
		jQuery("#menu-toggle").click(function(e) {
        e.preventDefault();
        jQuery("#sidebar-wrapper").toggleClass("active");
    });
    
    jQuery("#menu-close").click(function(e) {
        e.preventDefault();
        jQuery("#sidebar-wrapper").toggleClass("active");
    });
    
    jQuery('#sidebar-wrapper .sidebar-nav li a').click(function(){
    	jQuery("#sidebar-wrapper").toggleClass("active");
    });
    
    //toggles for responsive tables
    jQuery('.footable').footable({
    	breakpoints: {
        phone: 680,
        tablet: 768
    	}
		});
		
		jQuery('input#submit').addClass('btn btn-primary');


    jQuery(function() {
			$('a[href*=#]:not([href=#])').click(function() {
      	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
					var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
             $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
          }
        }
      });
    });
    
    jQuery('.popup-gmaps').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		}); 


//thats all folks
});