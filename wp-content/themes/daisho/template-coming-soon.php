<?php 
/* Template Name: Coming Soon Template (Dribbble) */ 
?> 
<?php get_header(); ?>
<script type="text/javascript">
var myScroll;

function flow_dribbble_loaded() {
	if(jQuery("#wrapper").length){
		myScroll = new iScroll('wrapper', {
			snap: 'li',
			momentum: false,
			hScrollbar: false,
			vScrollbar: false,
			hScroll: true,
			vScroll: false,
		});
	}
}

document.addEventListener('DOMContentLoaded', flow_dribbble_loaded, false);
</script>
<style type="text/css">
	body { opacity: 0; }
	#wrapper-container { width:100%; max-width:1120px; min-height: 330px; margin: 0 auto; overflow:hidden; }
	#wrapper { width:50%; width: 710px; max-width:800px; min-height: 330px; margin: 0 0 0 auto; overflow:visible!important; }
	#scroller { min-height:330px; float:left; padding: 0 0 0 0; }
	#scroller ul { list-style:none; display:block; float:left; width:9000px; min-height: 400px; }
	#scroller li { float:left; width:400px; text-align:center; margin: 0 50px 0 0; }
	.pageWrapper { margin-top: 0; }
	/* Layout
   -------------------------------- */

.layout-grid {
	width: 960px;
}

.layout-grid td {
	vertical-align: top;
}

.layout-grid td.left-nav {
	width: 140px;
}

.layout-grid td.normal {
	border-left: 1px solid #eee;
	padding: 20px 24px;
	font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
}

.layout-grid td.demos {
	background: url('img/demos_bg.jpg') no-repeat;
	height: 337px;
	overflow: hidden;
}

/* Normal
   -------------------------------- */

.normal h3,
.normal h4 {
	margin: 0;
	font-weight: normal;
}

.normal h3 {
	padding: 0 0 9px;
	font-size: 1.8em;
}

.normal h4 {
	padding-bottom: 21px;
	border-bottom: 1px dashed #999;
	font-size: 1.2em;
	font-weight: bold;
}

.normal p {
	font-size: 1.2em;
}

/* Demos */

.demos-nav, .demos-nav dt, .demos-nav dd, .demos-nav ul, .demos-nav li {
	margin: 0;
	padding: 0
}

.demos-nav {
	float: left;
	width: 170px;
	font-size: 1.3em;
}

.demos-nav dt,
.demos-nav h4 {
	margin: 0;
	padding: 0;
	font: normal 1.1em "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	color: #2710E8;
}

.demos-nav dt,
.demos-nav h4 {
	margin-top: 1.5em;
	margin-bottom: 0;
	padding-left: 8px;
	padding-bottom:5px;
	line-height: 1.2em;
	border-bottom: 1px solid #F4F4F4;
}

.demos-nav dd a,
.demos-nav li a {
	border-bottom: 1px solid #F4F4F4;
	display:block;
	padding: 4px 3px 4px 8px;
	font-size: 90%;
	text-decoration: none;
	color: #555 ;
	margin:2px 0;
	height:13px;
}

.demos-nav dd a:hover,
.demos-nav dd a:focus,
.demos-nav dd a:hover,
.demos-nav dd a:focus {
	background: #f3f3f3;
	color:#000;
	-moz-border-radius: 5px; -webkit-border-radius: 5px;
}
 .demos-nav dd a.selected {
	background: #555;
	color:#ffffff;
	-moz-border-radius: 5px; -webkit-border-radius: 5px;
}


/* new styles for demo pages, added by Filament 12.29.08
eventually we should convert the font sizes to ems -- using px for now to minimize style conflicts
*/

.normal h3.demo-header { font-size:32px; padding:0 0 5px; border-bottom:1px solid #eee; text-transform: capitalize; }
.normal h4.demo-subheader { font-size:10px; text-transform: uppercase; color:#999; padding:8px 0 3px; border:0; margin:0; }
.normal a:link,
.normal a:visited { color:#1b75bb; text-decoration:none; }
.normal a:hover,
.normal a:active { color:#0b559b; }

#demo-config { padding:20px 0 0; }

#demo-frame { float:left; width:540px; height:380px; border:1px solid #ddd; overflow: auto; position: relative; }
#demo-frame h3, #demo-frame h4 { padding: 0; font-weight: bold; font-size: 1em; }

#demo-config-menu { float:right; width:180px;  }
#demo-config-menu h4 { font-size:13px; color:#666; font-weight:normal; border:0; padding-left:18px; }

#demo-config-menu ul { list-style: none; padding: 0; margin: 0; }

#demo-config-menu li { font-size:12px; padding:0 0 0 10px; margin:3px 0; zoom: 1; }

#demo-config-menu li a:link,
#demo-config-menu li a:visited { display:block; padding:1px 8px 4px; border-bottom:1px dotted #b3b3b3; }
* html #demo-config-menu li a:link,
* html #demo-config-menu li a:visited { padding:1px 8px 2px; }
#demo-config-menu li a:hover,
#demo-config-menu li a:active { background-color:#f6f6f6; }

#demo-config-menu li.demo-config-on { background: url(img/demo-config-on-tile.gif) repeat-x left center; }

#demo-config-menu li.demo-config-on a:link,
#demo-config-menu li.demo-config-on a:visited,
#demo-config-menu li.demo-config-on a:hover,
#demo-config-menu li.demo-config-on a:active { background: url(img/demo-config-on.gif) no-repeat left; padding-left:18px; color:#fff; border:0; margin-left:-10px; margin-top: 0px; margin-bottom: 0px; }

#demo-source, #demo-notes {
	clear: both;
	padding: 20px 0 0;
	font-size: 1.3em;
}

#demo-notes { width:520px; color:#333; font-size: 1em; }
#demo-notes p code, .demo-description p code { padding: 0; font-weight: bold; }
#demo-source pre, #demo-source code { padding: 0; }
code, pre { padding:8px 0 8px 20px ; font-size: 1.2em; line-height:130%;  }

#demo-source a:link,
#demo-source a:visited,
#demo-source a:hover,
#demo-source a:active { font-size:12px; padding-left:13px; background-position: left center; background-repeat: no-repeat; }

#demo-source a.source-open:link,
#demo-source a.source-open:visited,
#demo-source a.source-open:hover,
#demo-source a.source-open:active { background-image: url(img/demo-spindown-open.gif); }

#demo-source a.source-closed:link,
#demo-source a.source-closed:visited,
#demo-source a.source-closed:hover,
#demo-source a.source-closed:active { background-image: url(img/demo-spindown-closed.gif); }

div.demo {
	font-family: Arial, sans-serif;
	background-color:transparent;
}

div.demo h3.docs { clear:left; font-size:12px; font-weight:normal; padding:0 0 1em; margin:0; }

div.demo-description {
	clear:both;
	padding:12px;
	font-family: Arial, sans-serif;
	font-size: 1.3em;
	line-height: 1.4em;
}

.ui-draggable, .ui-droppable {
	background-position: top left;
}

.left-nav .demos-nav {
	padding-right: 10px;
}

#demo-link { font-size:11px;  padding-top: 6px; clear: both; overflow: hidden; }
#demo-link a span.ui-icon { float:left; margin-right:3px; }

/* Component containers
----------------------------------*/
#widget-docs .ui-widget { font-family: Trebuchet MS,Verdana,Arial,sans-serif; font-size: 1em; }
#widget-docs .ui-widget input, #widget-docs .ui-widget select, #widget-docs .ui-widget textarea, #widget-docs .ui-widget button { font-family: Trebuchet MS,Verdana,Arial,sans-serif; font-size: 1em; }
#widget-docs .ui-widget-header { border: 1px solid #ffffff; background: #464646 url(img/464646_40x100_textures_01_flat_100.png) 50% 50% repeat-x; color: #ffffff; font-weight: bold; }
#widget-docs .ui-widget-header a { color: #ffffff; }
#widget-docs .ui-widget-content { border: 1px solid #ffffff; background: #ffffff url(img/ffffff_40x100_textures_01_flat_75.png) 50% 50% repeat-x; color: #222222; }
#widget-docs .ui-widget-content a { color: #222222; }

/* Interaction states
----------------------------------*/
#widget-docs .ui-state-default, #widget-docs .ui-widget-content #widget-docs .ui-state-default { border: 1px solid #666666; background: #555555 url(img/555555_40x100_textures_03_highlight_soft_75.png) 50% 50% repeat-x; font-weight: normal; color: #ffffff; outline: none; }
#widget-docs .ui-state-default a { color: #ffffff; text-decoration: none; outline: none; }
#widget-docs .ui-state-hover, #widget-docs .ui-widget-content #widget-docs .ui-state-hover, #widget-docs .ui-state-focus, #widget-docs .ui-widget-content #widget-docs .ui-state-focus { border: 1px solid #666666; background: #444444 url(img/444444_40x100_textures_03_highlight_soft_60.png) 50% 50% repeat-x; font-weight: normal; color: #ffffff; outline: none; }
#widget-docs .ui-state-hover a { color: #ffffff; text-decoration: none; outline: none; }
#widget-docs .ui-state-active, #widget-docs .ui-widget-content #widget-docs .ui-state-active { border: 1px solid #666666; background: #ffffff url(img/ffffff_40x100_textures_01_flat_65.png) 50% 50% repeat-x; font-weight: normal; color: #F6921E; outline: none; }
#widget-docs .ui-state-active a { color: #F6921E; outline: none; text-decoration: none; }

/* Interaction Cues
----------------------------------*/
#widget-docs .ui-state-highlight, #widget-docs .ui-widget-content #widget-docs .ui-state-highlight {border: 1px solid #fcefa1; background: #fbf9ee url(img/fbf9ee_40x100_textures_02_glass_55.png) 50% 50% repeat-x; color: #363636; }
#widget-docs .ui-state-error, #widget-docs .ui-widget-content #widget-docs .ui-state-error {border: 1px solid #cd0a0a; background: #fef1ec url(img/fef1ec_40x100_textures_05_inset_soft_95.png) 50% bottom repeat-x; color: #cd0a0a; }
#widget-docs .ui-state-error-text, #widget-docs .ui-widget-content #widget-docs .ui-state-error-text { color: #cd0a0a; }
#widget-docs .ui-state-disabled, #widget-docs .ui-widget-content #widget-docs .ui-state-disabled { opacity: .35; filter:Alpha(Opacity=35); background-image: none; }
#widget-docs .ui-priority-primary, #widget-docs .ui-widget-content #widget-docs .ui-priority-primary { font-weight: bold; }
#widget-docs .ui-priority-secondary, #widget-docs .ui-widget-content #widget-docs .ui-priority-secondary { opacity: .7; filter:Alpha(Opacity=70); font-weight: normal; }

/* Icons
----------------------------------*/

/* states and img */
#demo-frame-wrapper .ui-icon, #widget-docs .ui-icon { width: 16px; height: 16px; background-image: url(img/222222_256x240_icons_icons.png); }
#widget-docs .ui-widget-content .ui-icon {background-image: url(img/222222_256x240_icons_icons.png); }
#widget-docs .ui-widget-header .ui-icon {background-image: url(img/222222_256x240_icons_icons.png); }
#widget-docs .ui-state-default .ui-icon { background-image: url(img/888888_256x240_icons_icons.png); }
#widget-docs .ui-state-hover .ui-icon, #widget-docs .ui-state-focus .ui-icon {background-image: url(img/454545_256x240_icons_icons.png); }
#widget-docs .ui-state-active .ui-icon {background-image: url(img/454545_256x240_icons_icons.png); }
#widget-docs .ui-state-highlight .ui-icon {background-image: url(img/2e83ff_256x240_icons_icons.png); }
#widget-docs .ui-state-error .ui-icon, #widget-docs .ui-state-error-text .ui-icon {background-image: url(img/cd0a0a_256x240_icons_icons.png); }


/* Misc visuals
----------------------------------*/

/* Corner radius */
#widget-docs .ui-corner-tl { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; }
#widget-docs .ui-corner-tr { -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; }
#widget-docs .ui-corner-bl { -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; }
#widget-docs .ui-corner-br { -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; }
#widget-docs .ui-corner-top { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; }
#widget-docs .ui-corner-bottom { -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; }
#widget-docs .ui-corner-right {  -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; }
#widget-docs .ui-corner-left { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; }
#widget-docs .ui-corner-all { -moz-border-radius: 4px; -webkit-border-radius: 4px; }

/* Overlays */
#widget-docs .ui-widget-overlay { background: #aaaaaa url(img/aaaaaa_40x100_textures_01_flat_0.png) 50% 50% repeat-x; opacity: .30;filter:Alpha(Opacity=30); }
#widget-docs .ui-widget-shadow { margin: -8px 0 0 -8px; padding: 8px; background: #aaaaaa url(img/aaaaaa_40x100_textures_01_flat_0.png) 50% 50% repeat-x; opacity: .30;filter:Alpha(Opacity=30); -moz-border-radius: 8px; -webkit-border-radius: 8px; }

/*
----------------------------------*/

#widget-docs { margin:20px 0 0; border: none; }

#widget-docs h2, #widget-docs h3, #widget-docs h4, #widget-docs p, #widget-docs ul, #widget-docs code { margin:0; padding:0; }
#widget-docs code { display:block; color:#444; font-size:.9em; margin:0 0 1em; }
#widget-docs code strong { color:#000; }
#widget-docs p { margin:0 3em 1.2em 0; }
#widget-docs p.intro { font-size:13px; color:#666; line-height:1.3; }
#widget-docs ul { list-style-type: none; }

#widget-docs h2 { font-size:16px; margin:1.2em 0 .5em; }
#widget-docs h3 { font-size:14px; color:#e6820E; margin:1.5em 0 .5em; }
.normal #widget-docs h4 { font-size:12px; color:#000; border:0; margin:0 0 .5em; }

#docs-overview-main { width:400px; }
#docs-overview-sidebar { float:right; width:200px; }
#docs-overview-sidebar a span { color:#666; }
#widget-docs #docs-overview-main p { margin-right:0; }
#widget-docs #docs-overview-sidebar h4 { padding-left:0; }

.docs-list-header { float:left; width:100%; margin:10px 0 0; border-bottom:1px solid #eee; }
#widget-docs .docs-list-header h2 { float:left; margin:0; }
#widget-docs .docs-list-header p { float:right; margin:5px 0; font-size:11px; }

.docs-list { float:left; width:100%; padding:0 0 10px; }
.docs-list .param-header { float:left; clear:left; width:100%; padding:8px 0; border-top:1px solid #eee; }
#widget-docs .param-header h3, #widget-docs .param-header p { margin:0; float:left; }
#widget-docs .param-header h3 { width:50%; }
#widget-docs .param-header h3 span { background: url(img/demo-spindown-closed.gif) no-repeat left; padding-left:13px; }
#widget-docs .param-open .param-header h3 span { background: url(img/demo-spindown-open.gif) no-repeat left; }
#widget-docs .param-header p { width:24%; }
#widget-docs .param-header p.param-type span { background: url(img/icon-docs-info.gif) no-repeat left; cursor:pointer; border-bottom:1px dashed #ccc; padding-left:15px; }

.param-details { padding-left:13px; }
.param-args { margin:0 0 1.5em; border-top:1px dotted #ccc;}
.param-args td { padding:3px 30px 3px 5px; border-bottom:1px dotted #ccc;  }


/* overrides for ui-tab styles */
#widget-docs ul.ui-tabs-nav { padding:0 0 0 8px; }
#widget-docs .ui-tabs-nav li { margin:5px 5px 0 0; }

#widget-docs .ui-tabs-nav li a:link,
#widget-docs .ui-tabs-nav li a:visited,
#widget-docs .ui-tabs-nav li a:hover,
#widget-docs .ui-tabs-nav li a:active { font-size:14px; padding:4px 1.2em 3px; color:#fff; }

#widget-docs .ui-tabs-nav li.ui-tabs-selected a:link,
#widget-docs .ui-tabs-nav li.ui-tabs-selected a:visited,
#widget-docs .ui-tabs-nav li.ui-tabs-selected a:hover,
#widget-docs .ui-tabs-nav li.ui-tabs-selected a:active { color:#e6820E; }

#widget-docs .ui-tabs-panel { padding:20px 9px; font-size:12px; line-height:1.4; color:#000; }

#widget-docs .ui-widget-content a:link,
#widget-docs .ui-widget-content a:visited { color:#1b75bb; text-decoration:none; }
#widget-docs .ui-widget-content a:hover,
#widget-docs .ui-widget-content a:active { color:#0b559b; }



/* UI Overrides*/


div.wrapper {
	height: 430px;
	width: 100%; /*600*/
	max-width: 1200px; /*600*/
	overflow: hidden;
	position: relative;
	margin: 0 auto;
	
}

#coverflow {
	display: inline-block;
	/* height: 600px; */
	width: 6600px;

	padding: 42px;
	position: absolute;
	top: 0px;
	left: 0px;
}

#coverflow img {
	width: 260px;
	/* width: 400px; */
	height: 260px;
	/*height: 300px;*/
	width: 340px;
	float: left;
	position: relative;
	margin: -35px;
	 -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.25)));
 
}

@media (max-width: 800px) {
	#coverflow img {
	width: 160px;
	}
}

#demo-frame {
	overflow: hidden;
}

#slider {
	margin-top:20px;
	visibility: hidden;
}

#sortable {
	list-style-type: none;
	margin: 0 auto;
	padding: 0;
	width: 100%;
}

#sortable li {
	margin: 0 3px 3px 3px;
	padding: 0.4em;
	padding-left: 1.5em;
	font-size: 1.4em;
	height: 18px;
	border:none;
}

#sortable li span {
	position: absolute;
	margin-left: -1.3em;
}

.ui-selected {

	color: white;
	background: #EDA32D; /* old browsers */
	background: -moz-linear-gradient(top, #EDA32D 0%, #F9731E 99%); /* firefox */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#EDA32D), color-stop(99%,#F9731E)); /* webkit */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#EDA32D', endColorstr='#F9731E',GradientType=0 ); /* ie */
	border:none;


}

.pageWrapper {
	margin: 0 auto;
	width: 92%;
	max-width: 1120px;
}
.pageWrapper-mobile { display: none; margin: 0 auto 5% auto; text-align: center; width: 92%; }
.pageWrapper-mobile img { max-width: 100%; display: none; }
.dribbble-title-mobile { color: #000000; display: none; font-family: 'Open Sans',Arial,sans-serif; font-size: 22px; line-height: 22px; margin: 35px auto 15px; max-width: 400px; text-align: left; text-transform: uppercase; width: 100%; font-weight: 700; }
.dribbble-title-mobile a:hover { color: #00A4A7; text-decoration: none; }
.dribbble-image-mobile { display: none; max-width: 100%; }
.dribbble-image-mobile img{ margin: 0 auto; }
.dribbble-ipad-link { color: #000000; font-family: 'Open Sans',Arial,sans-serif; font-size: 22px; line-height: 20px; text-decoration: none; margin: 5px 0 0 0; display: block; font-weight: 700; }
.dribbble-ipad-link:hover { color: #00A4A7; text-decoration: none; }

@media (max-width: 800px) {
	.pageWrapper { display: none; }
	.pageWrapper-mobile { display: block; }
	.dribbble-title-mobile { display: block; }
	.dribbble-image-mobile, .dribbble-image-mobile img { display: block; }
}

#imageCaption {
	margin: -135px auto 0;
	max-width: 900px;
	color: #202020;
	font-family: 'Open Sans', Arial, sans-serif;
	display: block;
	font-size: 22px;
	text-align: center;
	text-transform: uppercase;
	position: relative;
	font-weight: 700;
}
#imageCaption a:hover { color: #00A4A7; text-decoration: none; }

/* css for scrollbar*/

#scroll-pane {
	float: left;
	overflow: auto;
	width: 620px;
	height: 176px;
	position: relative;
	margin-left: 50px;
	margin-bottom: 25px;
	display: inline
}

#sortable {
	position: absolute;
	top: 0;
	left: 0
}

.scroll-content-item {
	background-color: #fcfcfc;
	color: #003366;
	width: 100px;
	height: 100px;
	float: left;
	margin: 10px;
	font-size: 3em;
	line-height: 96px;
	text-align: center;
	border: 1px solid gray;
	display: inline;
}

#slider-wrap {
	float: left;
	height: 172px;
	width: 20px;
	border-left: none;
}

#slider-vertical {
	margin-left: 5px;
	position: relative;
	height: 100%
}

.ui-slider-handle {
	width: 20px;
	height: 10px;
	margin-left: 5px;
	background-color: darkgray;
	display: block;
	position: absolute
}

.listholder {
	width: 750px;
	margin: 0 auto;
	display: none;
}

.pageInfo{
  margin:0 auto;
  width:700px;
  clear:both;
  color:white;
  font-size:12px;
  text-align:center;
}

/*
* Aristo for jQuery UI
* Licensed under Creative Commons Attribution-Share Alike 3.0 with permission from 280 North and Pinvoke.
*/

/*
 * jQuery UI CSS Framework @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Theming/API
 */

/* Layout helpers
----------------------------------*/
.ui-helper-hidden { display: none; }
.ui-helper-hidden-accessible { position: absolute; left: -99999999px; }
.ui-helper-reset { margin: 0; padding: 0; border: 0; outline: 0; line-height: 1.3; text-decoration: none; font-size: 100%; list-style: none; }
.ui-helper-clearfix:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }
.ui-helper-clearfix { display: inline-block; }
/* required comment for clearfix to work in Opera \*/
* html .ui-helper-clearfix { height:1%; }
.ui-helper-clearfix { display:block; }
/* end clearfix */
.ui-helper-zfix { width: 100%; height: 100%; top: 0; left: 0; position: absolute; opacity: 0; filter:Alpha(Opacity=0); }


/* Interaction Cues
----------------------------------*/
.ui-state-disabled { cursor: default !important; }


/* Icons
----------------------------------*/

/* states and images */
.ui-icon { display: block; text-indent: -99999px; overflow: hidden; background-repeat: no-repeat; }


/* Misc visuals
----------------------------------*/

/* Overlays */
.ui-widget-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }


/*
 * jQuery UI CSS Framework @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Theming/API
 *
 * To view and modify this theme, visit http://jqueryui.com/themeroller/?ctl=themeroller
 */


/* Component containers
----------------------------------*/
.ui-widget { font-family: Helvetica, Arial, sans-serif; outline: none;}
.ui-widget a { outline: none; }
.ui-widget .ui-widget { font-size: 1em; }
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button { font-family: Helvetica, Arial, sans-serif; font-size: 1em; }
.ui-widget-content { border: 1px solid #dddddd; color: #333333; background: #FFFFFF; }
.ui-widget-content a { color: #333333; }
.ui-widget-header { border: 1px solid #8ab0c6; background: #a7cfe6; color: #ffffff; font-weight: bold; }
.ui-widget-header a { color: #ffffff; }

/* Interaction states
----------------------------------*/
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default { border: 1px solid #cccccc; background: #f6f6f6 url(img/ui-bg_glass_100_f6f6f6_1x400.png) 50% 50% repeat-x; font-weight: bold; color: #5F83B9; }
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { color: #1c94c4; text-decoration: none; }
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus { border: 1px solid #749aaf; background: #fdf5ce url(img/ui-bg_glass_100_fdf5ce_1x400.png) 50% 50% repeat-x; font-weight: bold; color: #c77405; }
.ui-state-hover a, .ui-state-hover a:hover { color: #c77405; text-decoration: none; }
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active { border: 1px solid #fbd850; background: #ffffff url(img/ui-bg_glass_65_ffffff_1x400.png) 50% 50% repeat-x; font-weight: bold; color: #eb8f00; }
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited { color: #eb8f00; text-decoration: none; }
.ui-widget :active { outline: none; }

/* Interaction Cues
----------------------------------*/
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight  {border: 1px solid #d2dbf4; background: #f4f8fd; color: #0d2054; -moz-border-radius: 0px !important; -webkit-border-radius: 0px !important; border-radius: 0px !important; font-size: 11px; }
.ui-state-highlight a, .ui-widget-content .ui-state-highlight a,.ui-widget-header .ui-state-highlight a { color: #0d2054; }
.ui-state-error, .ui-widget-content .ui-state-error, .ui-widget-header .ui-state-error {border: 1px solid #e2d0d0; background: #fcf0f0; color: #280b0b; -moz-border-radius: 0px !important; -webkit-border-radius: 0px !important; border-radius: 0px !important; font-size: 11px; }
.ui-state-error a, .ui-widget-content .ui-state-error a, .ui-widget-header .ui-state-error a { color: #280b0b; }
.ui-state-error-text, .ui-widget-content .ui-state-error-text, .ui-widget-header .ui-state-error-text { color: #280b0b; }
.ui-priority-primary, .ui-widget-content .ui-priority-primary, .ui-widget-header .ui-priority-primary { font-weight: bold; }
.ui-priority-secondary, .ui-widget-content .ui-priority-secondary,  .ui-widget-header .ui-priority-secondary { opacity: .7; filter:Alpha(Opacity=70); font-weight: normal; }
.ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled { opacity: .35; filter:Alpha(Opacity=35); background-image: none; }
.ui-state-highlight p, .ui-state-error p { margin: 8px 0px; padding: 1px 0px; }
.ui-state-highlight .ui-icon, .ui-state-error .ui-icon  { margin: -1px 8px 0px 0px !important; }

/* Icons
----------------------------------*/

/* states and images */
.ui-icon { width: 16px; height: 16px; background-image: url(img/ui-icons_222222_256x240.png); }
.ui-widget-content .ui-icon {background-image: url(img/ui-icons_222222_256x240.png); }
.ui-widget-header .ui-icon {background-image: url(img/ui-icons_ffffff_256x240.png); }
.ui-state-default .ui-icon { background-image: url(img/ui-icons_222222_256x240.png); }
.ui-state-hover .ui-icon, .ui-state-focus .ui-icon {background-image: url(img/ui-icons_222222_256x240.png); }
.ui-state-active .ui-icon {background-image: url(img/ui-icons_222222_256x240.png); }
.ui-state-highlight .ui-icon {background-image: url(img/ui-icons_228ef1_256x240.png); }
.ui-state-error .ui-icon, .ui-state-error-text .ui-icon { background: url(img/icon_sprite.png) -16px 0px no-repeat !important; }

/* positioning */
.ui-icon-carat-1-n { background-position: 0 0; }
.ui-icon-carat-1-ne { background-position: -16px 0; }
.ui-icon-carat-1-e { background-position: -32px 0; }
.ui-icon-carat-1-se { background-position: -48px 0; }
.ui-icon-carat-1-s { background-position: -64px 0; }
.ui-icon-carat-1-sw { background-position: -80px 0; }
.ui-icon-carat-1-w { background-position: -96px 0; }
.ui-icon-carat-1-nw { background-position: -112px 0; }
.ui-icon-carat-2-n-s { background-position: -128px 0; }
.ui-icon-carat-2-e-w { background-position: -144px 0; }
.ui-icon-triangle-1-n { background-position: 0 -16px; }
.ui-icon-triangle-1-ne { background-position: -16px -16px; }
.ui-icon-triangle-1-e { background-position: -32px -16px; }
.ui-icon-triangle-1-se { background-position: -48px -16px; }
.ui-icon-triangle-1-s { background-position: -64px -16px; }
.ui-icon-triangle-1-sw { background-position: -80px -16px; }
.ui-icon-triangle-1-w { background-position: -96px -16px; }
.ui-icon-triangle-1-nw { background-position: -112px -16px; }
.ui-icon-triangle-2-n-s { background-position: -128px -16px; }
.ui-icon-triangle-2-e-w { background-position: -144px -16px; }
.ui-icon-arrow-1-n { background-position: 0 -32px; }
.ui-icon-arrow-1-ne { background-position: -16px -32px; }
.ui-icon-arrow-1-e { background-position: -32px -32px; }
.ui-icon-arrow-1-se { background-position: -48px -32px; }
.ui-icon-arrow-1-s { background-position: -64px -32px; }
.ui-icon-arrow-1-sw { background-position: -80px -32px; }
.ui-icon-arrow-1-w { background-position: -96px -32px; }
.ui-icon-arrow-1-nw { background-position: -112px -32px; }
.ui-icon-arrow-2-n-s { background-position: -128px -32px; }
.ui-icon-arrow-2-ne-sw { background-position: -144px -32px; }
.ui-icon-arrow-2-e-w { background-position: -160px -32px; }
.ui-icon-arrow-2-se-nw { background-position: -176px -32px; }
.ui-icon-arrowstop-1-n { background-position: -192px -32px; }
.ui-icon-arrowstop-1-e { background-position: -208px -32px; }
.ui-icon-arrowstop-1-s { background-position: -224px -32px; }
.ui-icon-arrowstop-1-w { background-position: -240px -32px; }
.ui-icon-arrowthick-1-n { background-position: 0 -48px; }
.ui-icon-arrowthick-1-ne { background-position: -16px -48px; }
.ui-icon-arrowthick-1-e { background-position: -32px -48px; }
.ui-icon-arrowthick-1-se { background-position: -48px -48px; }
.ui-icon-arrowthick-1-s { background-position: -64px -48px; }
.ui-icon-arrowthick-1-sw { background-position: -80px -48px; }
.ui-icon-arrowthick-1-w { background-position: -96px -48px; }
.ui-icon-arrowthick-1-nw { background-position: -112px -48px; }
.ui-icon-arrowthick-2-n-s { background-position: -128px -48px; }
.ui-icon-arrowthick-2-ne-sw { background-position: -144px -48px; }
.ui-icon-arrowthick-2-e-w { background-position: -160px -48px; }
.ui-icon-arrowthick-2-se-nw { background-position: -176px -48px; }
.ui-icon-arrowthickstop-1-n { background-position: -192px -48px; }
.ui-icon-arrowthickstop-1-e { background-position: -208px -48px; }
.ui-icon-arrowthickstop-1-s { background-position: -224px -48px; }
.ui-icon-arrowthickstop-1-w { background-position: -240px -48px; }
.ui-icon-arrowreturnthick-1-w { background-position: 0 -64px; }
.ui-icon-arrowreturnthick-1-n { background-position: -16px -64px; }
.ui-icon-arrowreturnthick-1-e { background-position: -32px -64px; }
.ui-icon-arrowreturnthick-1-s { background-position: -48px -64px; }
.ui-icon-arrowreturn-1-w { background-position: -64px -64px; }
.ui-icon-arrowreturn-1-n { background-position: -80px -64px; }
.ui-icon-arrowreturn-1-e { background-position: -96px -64px; }
.ui-icon-arrowreturn-1-s { background-position: -112px -64px; }
.ui-icon-arrowrefresh-1-w { background-position: -128px -64px; }
.ui-icon-arrowrefresh-1-n { background-position: -144px -64px; }
.ui-icon-arrowrefresh-1-e { background-position: -160px -64px; }
.ui-icon-arrowrefresh-1-s { background-position: -176px -64px; }
.ui-icon-arrow-4 { background-position: 0 -80px; }
.ui-icon-arrow-4-diag { background-position: -16px -80px; }
.ui-icon-extlink { background-position: -32px -80px; }
.ui-icon-newwin { background-position: -48px -80px; }
.ui-icon-refresh { background-position: -64px -80px; }
.ui-icon-shuffle { background-position: -80px -80px; }
.ui-icon-transfer-e-w { background-position: -96px -80px; }
.ui-icon-transferthick-e-w { background-position: -112px -80px; }
.ui-icon-folder-collapsed { background-position: 0 -96px; }
.ui-icon-folder-open { background-position: -16px -96px; }
.ui-icon-document { background-position: -32px -96px; }
.ui-icon-document-b { background-position: -48px -96px; }
.ui-icon-note { background-position: -64px -96px; }
.ui-icon-mail-closed { background-position: -80px -96px; }
.ui-icon-mail-open { background-position: -96px -96px; }
.ui-icon-suitcase { background-position: -112px -96px; }
.ui-icon-comment { background-position: -128px -96px; }
.ui-icon-person { background-position: -144px -96px; }
.ui-icon-print { background-position: -160px -96px; }
.ui-icon-trash { background-position: -176px -96px; }
.ui-icon-locked { background-position: -192px -96px; }
.ui-icon-unlocked { background-position: -208px -96px; }
.ui-icon-bookmark { background-position: -224px -96px; }
.ui-icon-tag { background-position: -240px -96px; }
.ui-icon-home { background-position: 0 -112px; }
.ui-icon-flag { background-position: -16px -112px; }
.ui-icon-calendar { background-position: -32px -112px; }
.ui-icon-cart { background-position: -48px -112px; }
.ui-icon-pencil { background-position: -64px -112px; }
.ui-icon-clock { background-position: -80px -112px; }
.ui-icon-disk { background-position: -96px -112px; }
.ui-icon-calculator { background-position: -112px -112px; }
.ui-icon-zoomin { background-position: -128px -112px; }
.ui-icon-zoomout { background-position: -144px -112px; }
.ui-icon-search { background-position: -160px -112px; }
.ui-icon-wrench { background-position: -176px -112px; }
.ui-icon-gear { background-position: -192px -112px; }
.ui-icon-heart { background-position: -208px -112px; }
.ui-icon-star { background-position: -224px -112px; }
.ui-icon-link { background-position: -240px -112px; }
.ui-icon-cancel { background-position: 0 -128px; }
.ui-icon-plus { background-position: -16px -128px; }
.ui-icon-plusthick { background-position: -32px -128px; }
.ui-icon-minus { background-position: -48px -128px; }
.ui-icon-minusthick { background-position: -64px -128px; }
.ui-icon-close { background-position: -80px -128px; }
.ui-icon-closethick { background-position: -96px -128px; }
.ui-icon-key { background-position: -112px -128px; }
.ui-icon-lightbulb { background-position: -128px -128px; }
.ui-icon-scissors { background-position: -144px -128px; }
.ui-icon-clipboard { background-position: -160px -128px; }
.ui-icon-copy { background-position: -176px -128px; }
.ui-icon-contact { background-position: -192px -128px; }
.ui-icon-image { background-position: -208px -128px; }
.ui-icon-video { background-position: -224px -128px; }
.ui-icon-script { background-position: -240px -128px; }
.ui-icon-alert { background-position: 0 -144px; }
.ui-icon-info { background: url(img/icon_sprite.png) 0px 0px no-repeat !important; }
.ui-icon-notice { background-position: -32px -144px; }
.ui-icon-help { background-position: -48px -144px; }
.ui-icon-check { background-position: -64px -144px; }
.ui-icon-bullet { background-position: -80px -144px; }
.ui-icon-radio-off { background-position: -96px -144px; }
.ui-icon-radio-on { background-position: -112px -144px; }
.ui-icon-pin-w { background-position: -128px -144px; }
.ui-icon-pin-s { background-position: -144px -144px; }
.ui-icon-play { background-position: 0 -160px; }
.ui-icon-pause { background-position: -16px -160px; }
.ui-icon-seek-next { background-position: -32px -160px; }
.ui-icon-seek-prev { background-position: -48px -160px; }
.ui-icon-seek-end { background-position: -64px -160px; }
.ui-icon-seek-start { background-position: -80px -160px; }
/* ui-icon-seek-first is deprecated, use ui-icon-seek-start instead */
.ui-icon-seek-first { background-position: -80px -160px; }
.ui-icon-stop { background-position: -96px -160px; }
.ui-icon-eject { background-position: -112px -160px; }
.ui-icon-volume-off { background-position: -128px -160px; }
.ui-icon-volume-on { background-position: -144px -160px; }
.ui-icon-power { background-position: 0 -176px; }
.ui-icon-signal-diag { background-position: -16px -176px; }
.ui-icon-signal { background-position: -32px -176px; }
.ui-icon-battery-0 { background-position: -48px -176px; }
.ui-icon-battery-1 { background-position: -64px -176px; }
.ui-icon-battery-2 { background-position: -80px -176px; }
.ui-icon-battery-3 { background-position: -96px -176px; }
.ui-icon-circle-plus { background-position: 0 -192px; }
.ui-icon-circle-minus { background-position: -16px -192px; }
.ui-icon-circle-close { background-position: -32px -192px; }
.ui-icon-circle-triangle-e { background-position: -48px -192px; }
.ui-icon-circle-triangle-s { background-position: -64px -192px; }
.ui-icon-circle-triangle-w { background-position: -80px -192px; }
.ui-icon-circle-triangle-n { background-position: -96px -192px; }
.ui-icon-circle-arrow-e { background-position: -112px -192px; }
.ui-icon-circle-arrow-s { background-position: -128px -192px; }
.ui-icon-circle-arrow-w { background-position: -144px -192px; }
.ui-icon-circle-arrow-n { background-position: -160px -192px; }
.ui-icon-circle-zoomin { background-position: -176px -192px; }
.ui-icon-circle-zoomout { background-position: -192px -192px; }
.ui-icon-circle-check { background-position: -208px -192px; }
.ui-icon-circlesmall-plus { background-position: 0 -208px; }
.ui-icon-circlesmall-minus { background-position: -16px -208px; }
.ui-icon-circlesmall-close { background-position: -32px -208px; }
.ui-icon-squaresmall-plus { background-position: -48px -208px; }
.ui-icon-squaresmall-minus { background-position: -64px -208px; }
.ui-icon-squaresmall-close { background-position: -80px -208px; }
.ui-icon-grip-dotted-vertical { background-position: 0 -224px; }
.ui-icon-grip-dotted-horizontal { background-position: -16px -224px; }
.ui-icon-grip-solid-vertical { background-position: -32px -224px; }
.ui-icon-grip-solid-horizontal { background-position: -48px -224px; }
.ui-icon-gripsmall-diagonal-se { background-position: -64px -224px; }
.ui-icon-grip-diagonal-se { background-position: -80px -224px; }


/* Misc visuals
----------------------------------*/

/* Corner radius */
.ui-corner-tl { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; border-top-left-radius: 4px; }
.ui-corner-tr { -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; border-top-right-radius: 4px; }
.ui-corner-bl { -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px; }
.ui-corner-br { -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; border-bottom-right-radius: 4px; }
.ui-corner-top { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; border-top-left-radius: 4px; -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; border-top-right-radius: 4px; }
.ui-corner-bottom { -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; border-bottom-right-radius: 4px; }
.ui-corner-right {  -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; border-top-right-radius: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; border-bottom-right-radius: 4px; }
.ui-corner-left { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; border-top-left-radius: 4px; -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px; }
.ui-corner-all { -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; }

/* Overlays */
.ui-widget-overlay { background: #222d3f; opacity: .70; filter:Alpha(Opacity=70); }
.ui-widget-shadow { margin: -5px 0 0 -5px; padding: 5px; background: #000000 url(img/ui-bg_flat_10_000000_40x100.png) 50% 50% repeat-x; opacity: .20;filter:Alpha(Opacity=20); -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; }

/*
 * jQuery UI Resizable @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Resizable#theming
 */
.ui-resizable { position: relative;}
.ui-resizable-handle { position: absolute;font-size: 0.1px;z-index: 99999; display: block;}
.ui-resizable-disabled .ui-resizable-handle, .ui-resizable-autohide .ui-resizable-handle { display: none; }
.ui-resizable-n { cursor: n-resize; height: 7px; width: 100%; top: -5px; left: 0; }
.ui-resizable-s { cursor: s-resize; height: 7px; width: 100%; bottom: -5px; left: 0; }
.ui-resizable-e { cursor: e-resize; width: 7px; right: -5px; top: 0; height: 100%; }
.ui-resizable-w { cursor: w-resize; width: 7px; left: -5px; top: 0; height: 100%; }
.ui-resizable-se { cursor: se-resize; width: 12px; height: 12px; right: 1px; bottom: 1px; }
.ui-resizable-sw { cursor: sw-resize; width: 9px; height: 9px; left: -5px; bottom: -5px; }
.ui-resizable-nw { cursor: nw-resize; width: 9px; height: 9px; left: -5px; top: -5px; }
.ui-resizable-ne { cursor: ne-resize; width: 9px; height: 9px; right: -5px; top: -5px;}

/*
 * jQuery UI Selectable @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Selectable#theming
 */
.ui-selectable-helper { position: absolute; z-index: 100; border:1px dotted black; }
/*
 * jQuery UI Accordion @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Accordion#theming
 */
/* IE/Win - Fix animation bug - #4615 */
.ui-accordion { width: 100%; }
.ui-accordion .ui-accordion-header { cursor: pointer; position: relative; margin-top: 1px; zoom: 1; background: url(img/button_bg.png) repeat-x; }
.ui-accordion .ui-accordion-header .ui-state-default { background-position: 0px 0px; }
.ui-accordion .ui-accordion-header.ui-state-active { background-position: 0px -33px; border-color: #749aaf !important; }
.ui-accordion .ui-accordion-header.ui-state-hover, .ui-accordion h3.ui-state-default { border-color: #aaaaaa; }
.ui-accordion .ui-accordion-header.ui-state-active a { color:#1c4257; }
.ui-accordion .ui-accordion-header .ui-icon { background: url(img/icon_sprite.png); }
.ui-accordion .ui-accordion-header.ui-state-active .ui-icon { background-position: 0px -64px; }
.ui-accordion .ui-accordion-header.ui-state-default .ui-icon { background-position: -16px -80px; }
.ui-accordion .ui-accordion-li-fix { display: inline; }
.ui-accordion .ui-accordion-header-active { border-bottom: 0 !important; }
.ui-accordion .ui-accordion-header a { display: block; font-size: 12px; padding: .5em .5em .5em .7em; font-weight: bold; color:#4f4f4f; text-shadow: 0px 1px 0px rgba(255,255,255,0.7); }
.ui-accordion-icons .ui-accordion-header a { padding-left: 24px; }
.ui-accordion .ui-accordion-header .ui-icon { position: absolute; left: .5em; top: 50%; margin-top: -7px; }
.ui-accordion .ui-accordion-content { background: #f8fcfe; padding: 1em 2.2em; border-top: 0; margin-top: -2px; position: relative; top: 1px; margin-bottom: 2px; overflow: auto; display: none; zoom: 1; font-size: 11px; border-color: #749aaf; }
.ui-accordion .ui-accordion-content-active { display: block; }
.ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content { -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; }
.ui-accordion .ui-state-active {  }

/*
 * jQuery UI Autocomplete @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Autocomplete#theming
 */
.ui-autocomplete { position: absolute; z-index: 2 !important; cursor: default; background: #FFFFFF; border: 0px none !important; padding: 0px !important; -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; -moz-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); -webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); }	
.ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
/* workarounds */
* html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */

/*
 * jQuery UI Menu @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Menu#theming
 */
.ui-menu {
	list-style:none;
	padding: 2px;
	margin: 0;
	display:block;
	float: left;
}
.ui-menu .ui-menu {
	margin-top: -3px;
}
.ui-menu .ui-menu-item {
	margin:0;
	padding: 0;
	zoom: 1;
	float: left;
	clear: left;
	width: 100%;
}
.ui-menu .ui-menu-item a {
	text-decoration:none;
	display:block;
	border: 0px none;
	padding:.2em .4em;
	line-height:1.5;
	-moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px;
	zoom:1;
}
.ui-menu .ui-menu-item a.ui-state-hover,
.ui-menu .ui-menu-item a.ui-state-active {
	background: #5f83b9;
	color: #FFFFFF;
	text-shadow: 0px 1px 1px #234386;
	font-weight: normal;
	margin: -1px;
}

/*
 * jQuery UI Button @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Button#theming
 */
.ui-button { display: inline-block;  position: relative; padding: 0; margin-right: .1em; text-decoration: none !important; cursor: pointer; text-align: center; zoom: 1; overflow: visible; border: 0px none !important; -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; } /* the overflow property removes extra width in IE */
.ui-button-icon-only { width: 2.2em; } /* to make room for the icon, a width needs to be set here */
button.ui-button-icon-only { width: 2.4em; } /* button elements seem to need a little more width */
.ui-button-icons-only { width: 3em; } 
button.ui-button-icons-only { width: 3.2em; } 
.ui-button span { -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; border: 1px solid; }


/* === INPUT:SUBMIT BUG FIX === */
input.ui-button { background: url(img/button_bg.png) 0px 0px repeat-x !important; color: #4f4f4f; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; border: 1px solid #b6b6b6; outline: none; }
input.ui-button:hover { background: url(img/button_bg.png) 0px 0px repeat-x !important; color: #313131; border-color: #9d9d9d; -moz-box-shadow: 0 0 6px rgba(0, 0, 0, 0.3); -webkit-box-shadow: 0px 0px 8px rgba(212,212,212,1); box-shadow: 0px 0px 8px rgba(212,212,212,1); }
input.ui-button:active { background: url(img/button_bg.png) 0px bottom repeat-x !important; color: #4f4f4f; border-color: #b6b6b6;  }

/* === IE6 AND IE7 BUTTON WIDTH FIX === */
.ui-button { *display: inline !important; }

.ui-state-default .ui-button-text { background: url(img/button_bg.png) 0px 0px repeat-x !important; color: #4f4f4f; border-color: #b6b6b6; }
.ui-state-hover .ui-button-text { background: url(img/button_bg.png) 0px 0px repeat-x !important; color: #313131; border-color: #9d9d9d; -moz-box-shadow: 0 0 6px rgba(0, 0, 0, 0.3); -webkit-box-shadow: 0px 0px 8px rgba(212,212,212,1); box-shadow: 0px 0px 8px rgba(212,212,212,1); }
.ui-state-active .ui-button-text { background: url(img/button_bg.png) 0px bottom repeat-x !important; color: #4f4f4f; border-color: #b6b6b6; }

/*button text element */
.ui-button .ui-button-text { display: block; line-height: 1.4; font-weight: bold; font-size: 14px; text-shadow: 0px 1px 0px rgba(255,255,255,0.8); }
.ui-button-text-only .ui-button-text { padding: 5px 12px; }
.ui-button-icon-only .ui-button-text, .ui-button-icons-only .ui-button-text { padding: 5px; text-indent: -9999999px; }
.ui-button-text-icon-primary .ui-button-text, .ui-button-text-icons .ui-button-text { padding: 5px 12px 5px 25px; }
.ui-button-text-icon-secondary .ui-button-text, .ui-button-text-icons .ui-button-text { padding: 5px 12px 5px 25px;; }
.ui-button-text-icons .ui-button-text { padding-right: 1.8em; }
/* no icon support for input elements, provide padding by default */
input.ui-button { padding: .4em 1em; }

/*button icon element(s) */
.ui-button .ui-icon { border: 0px none; }
.ui-button-icon-only .ui-icon, .ui-button-text-icon-primary .ui-icon, .ui-button-text-icon-secondary .ui-icon, .ui-button-text-icons .ui-icon, .ui-button-icons-only .ui-icon { position: absolute; top: 50%; margin-top: -8px; margin-left: 6px; }
.ui-button-icon-only .ui-icon { left: 50%; margin-left: -8px; }
.ui-button-text-icon-primary .ui-button-icon-primary, .ui-button-text-icons .ui-button-icon-primary, .ui-button-icons-only .ui-button-icon-primary {  }
.ui-button-text-icon-secondary .ui-button-icon-secondary, .ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary { right: .5em; }
.ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary { right: .5em; }

/*button sets*/
.ui-buttonset { margin-right: 7px; }
.ui-buttonset .ui-button { margin-left: 0; margin-right: -.3em; }
.ui-buttonset, .ui-buttonset span { -moz-border-radius: 0px !important; -webkit-border-radius: 0px !important; border-radius: 0px !important; }
.ui-corner-left .ui-button-text { -moz-border-radius-topleft: 4px !important; -webkit-border-top-left-radius: 4px !important; border-top-left-radius: 4px !important; -moz-border-radius-bottomleft: 4px !important; -webkit-border-bottom-left-radius: 4px !important; border-bottom-left-radius: 4px !important; }
.ui-corner-right .ui-button-text { -moz-border-radius-topright: 4px !important; -webkit-border-top-right-radius: 4px !important; border-top-right-radius: 4px !important; -moz-border-radius-bottomright: 4px !important; -webkit-border-bottom-right-radius: 4px !important; border-bottom-right-radius: 4px !important; }
.ui-buttonset .ui-state-active .ui-button-text { cursor: default; background: url(img/button_bg.png) 0px -33px repeat-x !important; color: #1c4257; border-color: #7096ab; -moz-box-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; }

/* workarounds */
button.ui-button::-moz-focus-inner { border: 0; padding: 0; } /* reset extra padding in Firefox */

/*
 * jQuery UI Dialog @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Dialog#theming
 */
.ui-dialog { position: absolute; padding: 0; width: 300px; overflow: hidden; background: #FFFFFF; -moz-box-shadow: 0px 5px 8px rgba(0,0,0,0.8); -webkit-box-shadow: 0px 5px 8px rgba(0,0,0,0.8); box-shadow: 0px 5px 8px rgba(0,0,0,0.8); }
.ui-dialog .ui-dialog-titlebar { padding: .5em 1em .3em; position: relative; border-width: 0px 0px 1px 0px; border-color: #979797; background: url(img/the_gradient.gif) 0px 0px repeat-x; -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; }
.ui-dialog .ui-dialog-title { float: left; margin: .1em 16px .2em 0; font-size: 13px; color: #000000; text-shadow: 0px 1px 0px rgba(255,255,255,0.8); } 
.ui-dialog .ui-dialog-titlebar-close { position: absolute; right: 6px; top: 50%; width: 16px; margin: -9px 0 0 0; height: 16px; }
.ui-dialog .ui-dialog-titlebar-close span { display: block; margin: 1px; background: url(img/icon_sprite.png) 0px -16px no-repeat; }
.ui-dialog-titlebar .ui-state-hover { -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; border: 0px none; background: transparent; }
.ui-dialog .ui-dialog-titlebar-close.ui-state-hover span { background-position: -16px -16px ; }
.ui-dialog .ui-dialog-titlebar-close:hover, .ui-dialog .ui-dialog-titlebar-close:focus { padding: 0; }
.ui-dialog .ui-dialog-content { position: relative; border: 0; padding: .5em 1em; background: none; overflow: auto; zoom: 1; font-size: 12px; }
.ui-dialog .ui-dialog-buttonpane { text-align: left; border-width: 1px 0 0 0; background-image: none; margin: .5em 0 0 0; padding: .3em 1em .5em .4em; }
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset { float: right; }
.ui-dialog .ui-dialog-buttonpane button { float: right; margin: .5em .4em .5em 0; cursor: pointer; padding: .2em .6em .3em .6em; line-height: 1.4em; width:auto; overflow:visible; background: transparent !important; border: 0px none; }
.ui-dialog .ui-resizable-se { width: 14px; height: 14px; right: 3px; bottom: 3px; }
.ui-draggable .ui-dialog-titlebar { cursor: move; }

/*
 * jQuery UI Slider @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Slider#theming
 */
.ui-slider { position: relative; text-align: left; border: 0px none; }
.ui-state-focus .ui-slider-handle { border: 0px none; }
.ui-slider .ui-slider-handle { background: url(img/slider_handles.png) 0px -23px no-repeat; position: absolute; z-index: 2; width: 23px; height: 23px; cursor: pointer; }
.ui-slider .ui-state-hover { background-position: 0px 0px !important; }
.ui-slider .ui-slider-range { position: absolute; z-index: 1; font-size: .7em; display: block; border: 0; }
.ui-slider .ui-state-default { border: 0px none; }

.ui-slider-horizontal { height: 5px; background: url(img/slider_h_bg.gif) 0px 0px repeat-x;}
.ui-slider-horizontal .ui-slider-handle { top: -9px; margin-left: -12px; }
.ui-slider-horizontal .ui-slider-range { top: 0; height: 100%; background: url(img/slider_h_bg.gif) 0px -5px repeat-x; }
.ui-slider-horizontal .ui-slider-range-min { left: 0; }
.ui-slider-horizontal .ui-slider-range-max { right: 0; }

.ui-slider-vertical { width: 5px; height: 100px; background: url(img/slider_v_bg.gif) -5px 0px repeat-y; }
.ui-slider-vertical .ui-slider-handle { left: -.3em; margin-left: -.6em; margin-bottom: -.6em; }
.ui-slider-vertical .ui-slider-range { left: 0; width: 100%; background: url(img/slider_v_bg.gif) 0px 0px repeat-y; }
.ui-slider-vertical .ui-slider-range-min { bottom: 0; }
.ui-slider-vertical .ui-slider-range-max { top: 0; }

/*
 * jQuery UI Tabs @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Tabs#theming
 */
.ui-tabs { background: #FFFFFF; position: relative; padding: .2em; zoom: 1; -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; border: 0px none; } /* position: relative prevents IE scroll bug (element with position: relative inside container with overflow: auto appear as "fixed") */
.ui-tabs .ui-tabs-nav { border-color: #a8a8a8; border-width: 0px 0px 1px 0px; margin: 0; padding: 0; background: transparent; -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; }
.ui-tabs .ui-tabs-nav li { list-style: none; float: left; position: relative; top: 1px; margin: 0 .2em 1px 0; border-bottom: 0 !important; padding: 0; white-space: nowrap; -moz-border-radius-topleft: 3px; -webkit-border-top-left-radius: 3px; border-top-left-radius: 3px; -moz-border-radius-topright: 3px; -webkit-border-top-right-radius: 3px; border-top-right-radius: 3px; }
.ui-tabs .ui-tabs-nav li a { float: left; padding: .5em 1em; text-decoration: none; font-size: 12px; }
.ui-tabs .ui-tabs-nav li.ui-tabs-selected { margin-bottom: 0; padding-bottom: 1px; }
.ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a { cursor: text; }
.ui-tabs .ui-tabs-nav li a, .ui-tabs.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-selected a { cursor: pointer; } /* first selector in group seems obsolete, but required to overcome bug in Opera applying cursor: text overall if defined elsewhere... */
.ui-tabs .ui-tabs-panel { display: block; border: 0; padding: 1em 1.4em; background: none; font-size: 12px; border-color: #a8a8a8; border-width: 0px 1px 1px 1px; border-style: solid; -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px;}
.ui-tabs .ui-tabs-hide { display: none !important; }
.ui-tabs .ui-tabs-nav li.ui-state-default { background: #cccccc url(img/button_bg.png) 0px 0px repeat-x; border-color: #a8a8a8; }
.ui-tabs .ui-tabs-nav li.ui-state-default a { color: #4f4f4f !important; text-shadow: 0px 1px 0px rgba(255,255,255,0.8); }
.ui-tabs .ui-tabs-nav li.ui-state-active { background: #FFFFFF; }
.ui-tabs-panel .ui-button { border-width: 0px; background: transparent; }

/*
 * jQuery UI Datepicker @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Datepicker#theming
 */
.ui-datepicker { width: 17em; padding: .2em .2em 0; background: #FFFFFF url(img/datepicker.gif) left top repeat-x; -moz-box-shadow: 0px 5px 10px rgba(0,0,0,0.8); -webkit-box-shadow: 0px 5px 10px rgba(0,0,0,0.8); box-shadow: 0px 5px 10px rgba(0,0,0,0.8); }
.ui-datepicker .ui-datepicker-header { position:relative; padding:2px 0px 6px 0px; background: transparent; -moz-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; border: 0px none; }
.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next { position:absolute; top: 6px; width: 16px; height: 16px; border: 0px none; cursor: pointer; }
.ui-datepicker .ui-datepicker-prev-hover, .ui-datepicker .ui-datepicker-next-hover { top: 1px; }
.ui-datepicker .ui-datepicker-prev { left:2px; }
.ui-datepicker .ui-datepicker-next { right:2px; }
.ui-datepicker .ui-datepicker-header .ui-state-hover { background: transparent; border: 0px none; }
.ui-datepicker .ui-datepicker-prev span { background-position: 0px -32px !important; }
.ui-datepicker .ui-datepicker-next span { background-position: -16px -32px !important; }
.ui-datepicker .ui-datepicker-prev-hover span { background-position: 0px -48px !important; }
.ui-datepicker .ui-datepicker-next-hover span { background-position: -16px -48px !important; }
.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span { display: block; position: absolute; left: 50%; margin-left: -8px; top: 50%; margin-top: -8px; background: url(img/icon_sprite.png) no-repeat;  }
.ui-datepicker .ui-datepicker-title { margin: 0 2.3em; line-height: 1.8em; text-align: center; font-size: 12px; color: #000000; text-shadow: 0px 1px 0px rgba(255,255,255,0.8); }
.ui-datepicker .ui-datepicker-title select { font-size:1em; margin:1px 0; }
.ui-datepicker select.ui-datepicker-month-year {width: 100%;}
.ui-datepicker select.ui-datepicker-month, 
.ui-datepicker select.ui-datepicker-year { width: 49%;}
.ui-datepicker table {width: 100%; font-size: 10px; border-collapse: collapse; margin: 0 0 .4em; }
.ui-datepicker th { padding: .7em .3em; text-align: center; font-weight: bold; border: 0;  }
.ui-datepicker td { border: 0; padding: 1px; }
.ui-datepicker td span, .ui-datepicker td a { display: block; padding: 2px 3px 3px; text-align: right; text-decoration: none; }
.ui-datepicker .ui-datepicker-buttonpane { background-image: none; margin: .7em 0 0 0; padding:0 .2em; border-left: 0; border-right: 0; border-bottom: 0; }
.ui-datepicker .ui-datepicker-buttonpane button { float: right; margin: .5em .2em .4em; cursor: pointer; padding: .2em .6em .3em .6em; width:auto; overflow:visible; }
.ui-datepicker-buttonpane  button { background: url(img/button_bg.png) 0px 0px repeat-x !important; color: #4f4f4f !important; border-color: #b6b6b6 !important; font-weight: bold !important; font-size: 12px; text-shadow: 0px 1px 0px rgba(255,255,255,0.8); }
.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current { float:left; }
.ui-datepicker .ui-datepicker-calendar a { background: transparent; border: 0px none; }
.ui-datepicker .ui-datepicker-calendar .ui-state-active {  }
.ui-datepicker .ui-datepicker-calendar a.ui-state-hover { color: #1c4257; }
.ui-datepicker .ui-datepicker-current-day .ui-state-default { background: #5f83b9; color: #FFFFFF !important; text-shadow: 0px 1px 1px #234386; font-weight: bold; }

/* with multiple calendars */
.ui-datepicker.ui-datepicker-multi { width:auto; }
.ui-datepicker-multi .ui-datepicker-group { float:left; }
.ui-datepicker-multi .ui-datepicker-group table { width:95%; margin:0 auto .4em; }
.ui-datepicker-multi-2 .ui-datepicker-group { width:50%; }
.ui-datepicker-multi-3 .ui-datepicker-group { width:33.3%; }
.ui-datepicker-multi-4 .ui-datepicker-group { width:25%; }
.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header { border-left-width:0; }
.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header { border-left-width:0; }
.ui-datepicker-multi .ui-datepicker-buttonpane { clear:left; }
.ui-datepicker-row-break { clear:both; width:100%; }

/* RTL support */
.ui-datepicker-rtl { direction: rtl; }
.ui-datepicker-rtl .ui-datepicker-prev { right: 2px; left: auto; }
.ui-datepicker-rtl .ui-datepicker-next { left: 2px; right: auto; }
.ui-datepicker-rtl .ui-datepicker-prev:hover { right: 1px; left: auto; }
.ui-datepicker-rtl .ui-datepicker-next:hover { left: 1px; right: auto; }
.ui-datepicker-rtl .ui-datepicker-buttonpane { clear:right; }
.ui-datepicker-rtl .ui-datepicker-buttonpane button { float: left; }
.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current { float:right; }
.ui-datepicker-rtl .ui-datepicker-group { float:right; }
.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header { border-right-width:0; border-left-width:1px; }
.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header { border-right-width:0; border-left-width:1px; }

/* IE6 IFRAME FIX (taken from datepicker 1.5.3 */
.ui-datepicker-cover {
    display: none; /*sorry for IE5*/
    display/**/: block; /*sorry for IE5*/
    position: absolute; /*must have*/
    z-index: -1; /*must have*/
    filter: mask(); /*must have*/
    top: -4px; /*must have*/
    left: -4px; /*must have*/
    width: 200px; /*must have*/
    height: 200px; /*must have*/
}

/*
 * jQuery UI Progressbar @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Progressbar#theming
 */
.ui-progressbar { height: 12px; text-align: left; background: url(img/progress_bar.gif) 0px -14px repeat-x; }
.ui-progressbar .ui-progressbar-value {margin: -1px; height:100%; background: url(img/progress_bar.gif) 0px 0px repeat-x; }

</style>
<div id="content">
	<?php if (get_post_meta($post->ID, 'Title', true)) { ?>
		<h1 class="page-title"><?php echo get_post_meta($post->ID, 'Title', true); ?></h1>
	<?php } ?>
	<?php if (get_post_meta($post->ID, 'Description', true)) { ?>
		<div class="page-description"><?php echo get_post_meta($post->ID, 'Description', true); ?></div>
	<?php } ?>

<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){ ?>
	<div id="wrapper-container">
		<div id="wrapper">
			<div id="scroller">
				<ul id="thelist">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php if ( !function_exists('generated_dynamic_sidebar') || !generated_dynamic_sidebar(4) ) : ?>
				<?php endif; ?>
			<?php endwhile; endif; ?>
				</ul>
			</div>
		</div>
	</div>
<?php }else{ ?>

<div class="pageWrapper">
	<div class="demo">
		<div class="wrapper">
			<div id="coverflow">	
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php if ( !function_exists('generated_dynamic_sidebar') || !generated_dynamic_sidebar(4) ) : ?>
				<?php endif; ?>
			<?php endwhile; ?>
			</div>
		</div>
		<div id="imageCaption">
		Sample Text
		</div>
		<div id="slider"></div>
	</div>
	<div class="demo-description">
	</div>
	<div class="listholder">
		<div id="scroll-pane">
			<ul id="sortable"> 
			</ul>
		</div>
	</div>
</div> <!-- /.pageWrapper -->

<div class="pageWrapper-mobile">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<?php //if ( !function_exists('generated_dynamic_sidebar') || !generated_dynamic_sidebar(4) ) : ?>
		<?php dynamic_sidebar('sidebar-coming-soon-page-flow'); ?>
		<?php //endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>
</div> <!-- /.pageWrapper-mobile -->

	<?php else: ?>
		<h2 class="center"><?php _e('Not Found', 'flowthemes'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.', 'flowthemes'); ?></p>
	<?php endif; ?>
    
<?php } ?>
</div>
<?php get_footer(); ?>