function supports_history_api(){
	return !!(window.history && history.pushState);
}

function bringPortfolio(current_id){
  if(portfolioArrayValid[current_id] === undefined){ if(portfolioArrayValid.length != 0){ bringPortfolio( 0 ); } return; }
  var title = portfolioArrayValid[current_id][0];
  if(title == ''){ var title = 'Title not specified'; }
  var desc = portfolioArrayValid[current_id][1];
  var date = portfolioArrayValid[current_id][2];
  var client = portfolioArrayValid[current_id][3];
  var agency = portfolioArrayValid[current_id][4];
  var ourrole = portfolioArrayValid[current_id][5];
  var slides = portfolioArrayValid[current_id][6];
  var permalink = portfolioArrayValid[current_id][7];
  var number_of_ids = portfolioArrayValid.length;

   jQuery('.current-slide #content').animate({"opacity" : 0 }, 300, function(){
	if(date == ''){ jQuery('.project-date').hide(); }else{ jQuery('.project-date').show(); }
	if(client == ''){ jQuery('.project-client').hide(); }else{ jQuery('.project-client').show(); }
	if(agency == ''){ jQuery('.project-agency').hide(); }else{ jQuery('.project-agency').show(); }
	if(ourrole == ''){ jQuery('.project-ourrole').hide(); }else{ jQuery('.project-ourrole').show(); }

	jQuery(this).animate({ "opacity" : 1}, 300);
	jQuery('.portfolio_box').css({ 'display' : 'block' }).animate({ 'opacity' : 1 }, 700);
	jQuery('#main-nav-compact').css({ 'display' : 'block' }).animate({ 'opacity' : 1 }, 700);
	jQuery('.project-coverslide').css({ 'display' : 'block' }).animate({ 'opacity' : 0.97 }, 700);
	jQuery('.project-navigation').css({ 'display' : 'block' }).animate({ 'opacity' : 1 }, 700);
	jQuery('.project-title').html(title);
	jQuery('.project-description').html(desc);
	jQuery('.project-exdate').html(date);
	jQuery('.project-exclient').html(client);
	jQuery('.project-exagency').html(agency);
	jQuery('.project-exourrole').html(ourrole);
	jQuery('.project-slides').html(slides);
	jQuery('.project-slides').find('.myimage').each(function(){
		var current_image = jQuery(this);
		if(current_image.is("img")){
			jQuery('<img />').attr("src",this.src).load(function(){
				if((this.width < 1120) && (this.width != 0)){ var img_max_width = this.width+"px"; var img_width = '100%'; }else{ var img_max_width = '100%'; var img_width = '100%'; }
				current_image.wrap("<div class=\"project-slides-container\" style=\"margin: 0 auto; max-width: "+img_max_width+"; width: "+img_width+"\"></div>");
				if(((current_image.attr('data-title') != '') && (current_image.attr('data-title') != '<h4></h4>')) && (current_image.attr('data-title') != undefined)){ var currentslidetitle = current_image.attr('data-title'); while(currentslidetitle.indexOf('*') != -1){ currentslidetitle = currentslidetitle.replace('*','"'); } current_image.after('<span style="opacity:0;">'+currentslidetitle.replace("</h4>", "</h4><p>")+'</p></span>'); current_image.next('span').delay(800).css({"opacity" : 1}); }
			});
		}else if(current_image.is("div") && current_image.hasClass('description_capable')){
			if(((current_image.attr('data-title') != '') && (current_image.attr('data-title') != '<h4></h4>')) && (current_image.attr('data-title') != undefined)){ 
				var currentslidetitle = current_image.attr('data-title'); 
				while(currentslidetitle.indexOf('*') != -1){ currentslidetitle = currentslidetitle.replace('*','"'); }
				current_image.find('img').after('<span style="opacity:0;" class="project-slide-description">'+currentslidetitle.replace("</h4>", "</h4><p>")+'</p></span>'); 
				current_image.find('img').next('span').delay(800).css({"opacity" : 1}); 
			}
		}else if(current_image.is("div") && current_image.hasClass('description_below_capable')){
			if(((current_image.attr('data-title') != '') && (current_image.attr('data-title') != '<h4></h4>')) && (current_image.attr('data-title') != undefined)){ 
				var currentslidetitle = current_image.attr('data-title'); 
				while(currentslidetitle.indexOf('*') != -1){ currentslidetitle = currentslidetitle.replace('*','"'); }
				current_image.after('<span style="opacity:0;" class="project-slide-description-below">'+currentslidetitle.replace("</h4>", "</h4><p>")+'</p></span>'); 
				current_image.next('span').delay(800).css({"opacity" : 1}); 
			}
		}
	});
	
	if(!jQuery.browser.msie){
		if(!window.history.state || (window.history.state.projid != current_id)){
			window.history.pushState({'cancelback':true, 'projid':current_id}, title, permalink);
		}
	}
	jQuery('title').text(title);
	
	if(jQuery(".socialikonsg").length){
		try{
			jQuery(".socialikonsg a[title]").tooltip({"position": "bottom center", "tipClass": "jqttooltip", "effect":"r_fadeslide"});
		}catch(e){}
		jQuery(".socialikonsg .twitter").attr("href", "https://twitter.com/share?url="+escape(window.location.href)+"&amp;text="+escape(title));
		jQuery(".socialikonsg .facebook").attr("href", "http://www.facebook.com/sharer.php?u="+escape(window.location.href)+"&amp;t="+escape(title));
		jQuery(".socialikonsg .googleplus").attr("href", "https://plus.google.com/share?url="+escape(window.location.href));
	}
	
	setTimeout(function(){
		try{
			VideoJS.setupAllWhenReady();
			videojsvolumemuteclick();
		}catch(e){}
	}, 500);
	jQuery('body,html').animate({scrollTop:0},800);
	jQuery('.portfolio-arrowright').unbind();
	jQuery('.portfolio-arrowleft').unbind();
	jQuery('.portfolio-arrowright').click(function(){
		if(!portfolio_closedir){
			portfolio_closedir = 1;
			portfolio_closenum = 1;
		}else{
			portfolio_closenum+=portfolio_closedir;
		}
		if(portfolio_closenum == -1){
			closePortfolioItem();
		}else{
			current_id++; if(current_id == number_of_ids){ current_id = 0; }
			bringPortfolio( current_id );
		}
	});
	jQuery('.portfolio-arrowleft').click(function(){
		if(!portfolio_closedir){
			portfolio_closedir = -1;
			portfolio_closenum = 1;
		}else{
			portfolio_closenum-=portfolio_closedir;
		}
		if(portfolio_closenum == -1){
			closePortfolioItem();
		}else{
			current_id--; if(current_id == -1){ current_id = number_of_ids-1; }
			bringPortfolio( current_id );
		}
	});
	
	//if (!supports_history_api()) { return; }
	//jQuery(window).unbind("popstate");
	//jQuery(window).bind("popstate", function(e){
		//closePortfolioItem();
	//});
   }); //animate opaciy 0 (.current-slide #content)
}

function closePortfolioItem(){
	jQuery('.portfolio_box').css({ 'display' : 'none', 'opacity' : 0 });
	jQuery('#main-nav-compact').css({ 'display' : 'none', 'opacity' : 0 });
	jQuery('.project-coverslide').css({ 'display' : 'none', 'opacity' : 0 });
	jQuery('.project-navigation').css({ 'display' : 'none', 'opacity' : 0 });
	jQuery('.project-slides').empty();
	jQuery('title').text(homepage_title);
}