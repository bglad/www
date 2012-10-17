jQuery(document).ready(function(){
	if(jQuery(".toggle_title") !== undefined){
		jQuery(".toggle_title").toggle(
			function(){
				if(jQuery(this).hasClass('toggle_active')){
					jQuery(this).removeClass('toggle_active');
					jQuery(this).siblings('.toggle_content').stop(true,true).slideUp("fast"); 
				}else{
					jQuery(this).addClass('toggle_active');
					jQuery(this).siblings('.toggle_content').stop(true,true).slideDown("fast");
				}
			},
			function(){
				if(!jQuery(this).hasClass('toggle_active')){
					jQuery(this).addClass('toggle_active');
					jQuery(this).siblings('.toggle_content').stop(true,true).slideDown("fast"); 
				}else{
					jQuery(this).removeClass('toggle_active');
					jQuery(this).siblings('.toggle_content').stop(true,true).slideUp("fast");
				}
			}
		);
	}
});
jQuery(document).ready(function() {
	jQuery("#accordion").accordion({
		icons: { "header": "accordion-no-icon", "headerSelected": "accordion-no-icon" }
	});
});
jQuery(document).ready(function(){
	jQuery(".tabs-prev").each(function(){
		jQuery(this).tabs();
	});
});