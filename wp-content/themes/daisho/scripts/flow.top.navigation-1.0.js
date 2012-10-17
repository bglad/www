jQuery(document).ready(function(){
 jQuery("#menu > li").each(function(){
  var fa_menuli = jQuery(this);
  var fa_childul = fa_menuli.children("ul");
  if(fa_childul.length){
   //fa_childul.hide();
   fa_menuli.addClass("sub-menu-spacer");
   if(fa_menuli.next() !== undefined){ fa_menuli.next().addClass("sub-menu-spacer-next"); }
   fa_menuli.find("a span:last-child").addClass("hassubmenu");
   //console.log(fa_menuli.find("a span:last-child").length);
   if(!fa_menuli.find("a span:last-child").length){ jQuery(fa_menuli.find("a").get(0)).addClass("hassubmenu-compact"); }
   fa_menuli.hover(function(){
    if(!fa_childul.hasClass("fahover")){
	 fa_menuli.find("a").addClass("falinkhovera");
	 fa_menuli.find("a span").addClass("falinkhover");
     jQuery("#menu > li ul.fahover").removeClass("fahover").stop(1,1).slideUp("fast");
     fa_childul.addClass("fahover").stop(1,1).slideDown(200);
    }
   }, function(){
	fa_menuli.find("a").removeClass("falinkhovera");
	fa_menuli.find("a span").removeClass("falinkhover");
    jQuery("#menu > li ul.fahover").removeClass("fahover").stop(1,1).slideUp("fast");
   });
  }
 });
 
  jQuery("#menu-compact > li").each(function(){
  var fa_menuli = jQuery(this);
  var fa_childul = fa_menuli.children("ul");
  if(fa_childul.length){
   //fa_childul.hide();
   fa_menuli.addClass("sub-menu-spacer");
   if(fa_menuli.next() !== undefined){ fa_menuli.next().addClass("sub-menu-spacer-next"); }
   fa_menuli.find("a span:last-child").addClass("hassubmenu");
   //console.log(fa_menuli.find("a span:last-child").length);
   if(!fa_menuli.find("a span:last-child").length){ jQuery(fa_menuli.find("a").get(0)).addClass("hassubmenu-compact"); }
   fa_menuli.hover(function(){
    if(!fa_childul.hasClass("fahover")){
	 fa_menuli.find("a").addClass("falinkhovera");
	 fa_menuli.find("a span").addClass("falinkhover");
     jQuery("#menu > li ul.fahover").removeClass("fahover").stop(1,1).slideUp("fast");
     fa_childul.addClass("fahover").stop(1,1).slideDown(200);
    }
   }, function(){
	fa_menuli.find("a").removeClass("falinkhovera");
	fa_menuli.find("a span").removeClass("falinkhover");
    jQuery("#menu-compact > li ul.fahover").removeClass("fahover").stop(1,1).slideUp("fast");
   });
  }
 });
});