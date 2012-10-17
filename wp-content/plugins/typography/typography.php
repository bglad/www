<?php
	/*
	Plugin Name: Typography
	Plugin URI: http://codecanyon.net/item/font-replacement-wordpress-plugin/120647
	Description: Typography plugin by <a href="http://codecanyon.net/user/Flower">Flow</a>. It enables you to manage typography of any elements on your website in advanced and flexible way.
	Version: 2.0
	Author: Flow
	Author URI: http://codecanyon.net/user/Flower
	License: Browse available licenses on <a href="http://codecanyon.net/item/font-replacement-wordpress-plugin/120647">typography plugin page</a>.
	*/
	add_action( 'admin_init', 'flow_typography_admin_init' );
	//add_action( 'admin_init', 'flow_typography_admin_styles' );
   
	function flow_typography_admin_init() {
		wp_register_style( 'FlowTypographyMainStylesheet', WP_PLUGIN_URL . '/typography/js/colorpicker/css/colorpicker.css' );
		wp_register_style( 'FlowTypographyLayoutStylesheet', WP_PLUGIN_URL . '/typography/js/colorpicker/css/layout.css' );
		wp_register_style( 'FlowTypographyStylesheet', WP_PLUGIN_URL . '/typography/style.css' );
		wp_register_script('jquery_colorpicker_script', WP_PLUGIN_URL . '/typography/js/colorpicker/js/colorpicker.js', array('jquery'), '1.0' );
		wp_register_script('jquery_colorpicker_script2', WP_PLUGIN_URL . '/typography/js/colorpicker/js/eye.js', array('jquery'), '1.0' );
		wp_register_script('jquery_colorpicker_script3', WP_PLUGIN_URL . '/typography/js/colorpicker/js/layout.js', array('jquery'), '1.0' );
		wp_register_script('jquery_colorpicker_script4', WP_PLUGIN_URL . '/typography/js/colorpicker/js/utils.js', array('jquery'), '1.0' );
		wp_register_script('jquery', WP_PLUGIN_URL . '/typography/js/colorpicker/js/jquery.js', array(), '1.0' );
	}

	// Create custom top-menu
	add_action('admin_menu', 'fonts_create_menu');
	function fonts_create_menu() {
		$page = add_submenu_page('themes.php', __( 'Typography', 'flowtypography' ), __( 'Typography', 'flowtypography' ), 'manage_options', 'fontreplacement-submenu', 'fonts_settings_page_main');
		
		/* Using registered $page handle to hook script load */
        add_action('admin_print_styles-' . $page, 'flow_typography_admin_styles');
	}
	
	function flow_typography_admin_styles() {
		wp_enqueue_style( 'FlowTypographyMainStylesheet' );
		wp_enqueue_style( 'FlowTypographyStylesheet' );
		wp_enqueue_style( 'FlowTypographyLayoutStylesheet' );
		wp_enqueue_script('jquery_colorpicker_script');
		wp_enqueue_script('jquery_colorpicker_script2');
		wp_enqueue_script('jquery_colorpicker_script3');
		wp_enqueue_script('jquery_colorpicker_script4');
	}

function fonts_settings_page_main(){

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    echo '<div class="wrap">';
    echo "<h2>" . __( 'Typography', 'flowtypography' ) . "</h2>";
	
	if(isset($_GET['removecf'])){
		$flow_typography = get_option('flow_typography');
		$cr_newr = array();
		if(is_array($flow_typography)){
			for($f=0;$f<count($flow_typography);$f++){
				if($flow_typography[$f]['fs'] != urldecode($_GET['n'])){
					$cr_newr[] = $flow_typography[$f];
				}
			}
		}
		update_option('flow_typography', $cr_newr);
	}
	
    if(isset($_POST['h']) && $_POST['h'] == 'Y'){
		$fieldsd = array(array("fs", 1), array("fd", 1), array("tc", 1), array("ts", 1), array("tsu", 1), array("tlh", 1), array("tlhu", 1), array("tfs", 1), array("tls", 1), array("tlsu", 1), array("tfv", 1), array("fb", 1), array("fi", 1), array("fu", 2), array("fdo", 2), array("fdb", 2), array("ftt", 1), array("flt", 2), array("fip", 2), array("tff", 3, "tffv"));
		$formd = array();
		for($fd=0;$fd<count($fieldsd);$fd++){
			if(array_key_exists($fieldsd[$fd][0], $_POST)){
				if($fieldsd[$fd][1] == 1){
					$formd[$fieldsd[$fd][0]] = $_POST[$fieldsd[$fd][0]];
				}else if($fieldsd[$fd][1] == 2){
					if($_POST[$fieldsd[$fd][0]]){
						$formd[$fieldsd[$fd][0]] = true;
					}else{
						$formd[$fieldsd[$fd][0]] = false;
					}
				}else if($fieldsd[$fd][1] == 3){
					if($_POST[$fieldsd[$fd][0]] && strlen($_POST[$fieldsd[$fd][0]]) >= 2){
						$cr_t = substr($_POST[$fieldsd[$fd][0]], 0, 1);
						$cr_n = substr($_POST[$fieldsd[$fd][0]], 1, strlen($_POST[$fieldsd[$fd][0]])-1);
						$cr_c = false;
						if($cr_t == "g"){
							if(array_key_exists($fieldsd[$fd][2], $_POST)){
								$cr_c = $_POST[$fieldsd[$fd][2]];
							}
						}
						if($cr_c){
							$formd[$fieldsd[$fd][0]] = array($cr_t, $cr_n, $cr_c);
						}else{
							$formd[$fieldsd[$fd][0]] = array($cr_t, $cr_n);
						}
					}else{
						$formd[$fieldsd[$fd][0]] = false;
					}
				}
			}else{
				$formd[$fieldsd[$fd][0]] = false;
			}
		}
		if($formd['fs']){
			$flow_typography = get_option('flow_typography');
			$cr_rpl = false;
			for($cr=0;$cr<count($flow_typography);$cr++){
				if($formd['fs'] == $flow_typography[$cr]['fs']){
					$flow_typography[$cr] = $formd;
					$cr_rpl = true;
					break;
				}
			}
			if(!$cr_rpl){
				$flow_typography[] = $formd;
			}
			update_option('flow_typography', $flow_typography);
		}
?>
<div class="updated"><p><strong><?php _e('Settings saved.', 'flowtypography' ); ?></strong></p></div>
<?php
    }
	
	$flow_typography = get_option('flow_typography');
?>
	<div style="font-size: 11px; padding: 10px; border: 1px solid #e6db55; background-color: #fffbcc; margin-top: 10px; margin-bottom: 20px;">
	Hello! Welcome to ultimate Typography plugin by <a href="http://codecanyon.net/user/Flower/" target="_blank">Flow</a>. I hope that you'll find it powerful and useful! :)<br /><br />
	
	Please spend some time on this page and make the typography on your website outstanding! If you have any problems you'll find extensive explanation next to each item. There is also documentation in the package you downloaded from CodeCanyon. If you need my help you may visit <a href="http://support.forcg.com" target="_blank">support forums</a> (recommended) or <a href="mailto:paw.mcp@gmail.com" target="_blank">email me</a> or <a href="gtalk:paw.mcp@gmail.com" target="_blank">chat with me on gtalk</a>.</div>
<h3>Current Styles</h3>
<p>Here are your current styles (if there are any). You can create new ones using the form below. Click 'Load' to edit any of your current styles and use the form below to edit it.</p>
<table class="tdlst"><tr><th colspan="2" class="nb"></th><th colspan="8"><?php _e('Font','flowtypography'); ?></th><th colspan="5" class="nb"></th></tr>
<tr><th><?php _e('Selector','flowtypography'); ?></th><th><?php _e('Desc','flowtypography'); ?></th><th><?php _e('Family (Type)','flowtypography'); ?></th><th><?php _e('Color','flowtypography'); ?></th><th><?php _e('Size','flowtypography'); ?></th><th><?php _e('Weight','flowtypography'); ?></th><th><?php _e('Stretch','flowtypography'); ?></th><th><?php _e('Variant','flowtypography'); ?></th><th><?php _e('Style','flowtypography'); ?></th><th><?php _e('Attributes','flowtypography'); ?></th><th><?php _e('Line height','flowtypography'); ?></th><th><?php _e('Letter spacing','flowtypography'); ?></th><th><?php _e('Transform','flowtypography'); ?></th><th><?php _e('Important','flowtypography'); ?></th><th><?php _e('Remove','flowtypography'); ?></th><th><?php _e('Edit','flowtypography'); ?></th><th><?php _e('Preview','flowtypography'); ?></th></tr>
<?php
$tpl_path = get_bloginfo('wpurl');
$typenames = array("g" => "Google", "d" => "Cufon (Server HDD)", "s" => "Standard");
$fieldsd_att = array(array("fu", "Underline"), array("flt", "Line through"), array("fdo", "Overline"), array("fdb", "Blink"));
$fieldsd_css = array(array("tff", "font-family", 5), array("tc", "color", 1), array("ts", "font-size", 6, "tsu"), array("tlh", "line-height", 6, "tlhu"), array("tfs", "font-stretch", 4, "inherit"), array("tls", "letter-spacing", 6, "tlsu"), array("fb", "font-weight", 4, "inherit"), array("fi", "font-style", 4, "inherit"), array("fu", "text-decoration", 2, "underline"), array("ftt", "text-transform", 4, "inherit"), array("flt", "text-decoration", 2, "line-through"), array("fdo", "text-decoration", 2, "overline"), array("fdb", "text-decoration", 2, "blink"), array("tfv", "font-variant", 4, "inherit"), array("fip", "!important", 3));
$fields_unit = array("px", "em", "pt", "%", "ex", "gd", "rem", "vw", "vh", "vm", "ch", "in", "cm", "mm", "pc");
$flds_fontstretch = array("inherit", "normal", "wider", "narrower", "ultra-condensed", "extra-condensed", "condensed", "semi-condensed", "semi-expanded", "expanded", "extra-expanded", "ultra-expanded");
$flds_fontweight = array("inherit", "normal", "bold", "bolder", "lighter", "100", "200", "300", "400", "500", "600", "700", "800", "900");
$fields_variant = array("inherit", "normal", "small-caps");
$flds_texttransform = array("inherit", "capitalize", "uppercase", "lowercase", "none");
$flds_fontstyle = array("inherit", "normal", "italic", "oblique");
echo '<script type="text/javascript" src="'. $tpl_path .'/wp-content/plugins/typography/cufon-yui.js"></script>';
if(is_array($flow_typography)){
	for($f=0;$f<count($flow_typography);$f++){
		print("<tr><td>{$flow_typography[$f]['fs']}</td><td>{$flow_typography[$f]['fd']}</td><td>");
		if($flow_typography[$f]['tff'] && is_array($flow_typography[$f]['tff'])){
			print("{$flow_typography[$f]['tff'][1]} ({$typenames[$flow_typography[$f]['tff'][0]]})");
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['tc']){
			print($flow_typography[$f]['tc']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['ts']){
			print($flow_typography[$f]['ts'].$flow_typography[$f]['tsu']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['fb']){
			print($flow_typography[$f]['fb']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['tfs']){
			print($flow_typography[$f]['tfs']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['tfv']){
			print($flow_typography[$f]['tfv']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['fi']){
			print($flow_typography[$f]['fi']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		$tatl = "";
		for($fda=0;$fda<count($fieldsd_att);$fda++){
			if($flow_typography[$f][$fieldsd_att[$fda][0]]){
				if($tatl){
					$tatl .= ", ";
				}
				$tatl .= $fieldsd_att[$fda][1];
			}
		}
		if(!$tatl){
			$tatl = "(not set)";
		}
		print($tatl);
		print("</td><td>");
		if($flow_typography[$f]['tlh']){
			print($flow_typography[$f]['tlh'].$flow_typography[$f]['tlhu']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['tls']){
			print($flow_typography[$f]['tls'].$flow_typography[$f]['tlsu']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['ftt']){
			print($flow_typography[$f]['ftt']);
		}else{
			print("(not set)");
		}
		print("</td><td>");
		if($flow_typography[$f]['fip']){
			print("Important");
		}else{
			print("(not set)");
		}
		print("</td><td><a href=\"themes.php?page=fontreplacement-submenu&removecf=y&n=".urlencode($flow_typography[$f]['fs'])."\">remove</a></td><td><a href=\"themes.php?page=fontreplacement-submenu&updatecf=y&n=".urlencode($flow_typography[$f]['fs'])."\">".__('Load','flowtypography')."</a></td><td>");
		$css_prevarr = array();
		for($fdc=0;$fdc<count($fieldsd_css);$fdc++){
			if($fieldsd_css[$fdc][2] == 1){
				if($flow_typography[$f][$fieldsd_css[$fdc][0]]){
					$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]];
				}
			}else if($fieldsd_css[$fdc][2] == 2){
				if($flow_typography[$f][$fieldsd_css[$fdc][0]]){
					if(array_key_exists($fieldsd_css[$fdc][1], $css_prevarr)){
						$css_prevarr[$fieldsd_css[$fdc][1]] .= " ".$fieldsd_css[$fdc][3];
					}else{
						$css_prevarr[$fieldsd_css[$fdc][1]] = $fieldsd_css[$fdc][3];
					}
				}
			}else if($fieldsd_css[$fdc][2] == 3){
				if($flow_typography[$f][$fieldsd_css[$fdc][0]]){
					$css_prevarr['__'] = $fieldsd_css[$fdc][1];
				}
			}else if($fieldsd_css[$fdc][2] == 4){
				if($flow_typography[$f][$fieldsd_css[$fdc][0]] && $flow_typography[$f][$fieldsd_css[$fdc][0]] != $fieldsd_css[$fdc][3]){
					$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]];
				}
			}else if($fieldsd_css[$fdc][2] == 5){
				if($flow_typography[$f][$fieldsd_css[$fdc][0]][1]){
					$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]][1];
				}
			}else if($fieldsd_css[$fdc][2] == 6){
				if($flow_typography[$f][$fieldsd_css[$fdc][0]] && $flow_typography[$f][$fieldsd_css[$fdc][3]]){
					$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]].$flow_typography[$f][$fieldsd_css[$fdc][3]];
				}
			}
		}
		$css_prevout = "";
		foreach($css_prevarr as $cpk => $cpv){
			if($cpk && $cpv){
				if($cpk != "__"){
					$css_prevout .= $cpk.": ".$cpv;
					if($css_prevarr['__']){
						$css_prevout .= $css_prevarr['__'];
					}
					$css_prevout .= ";";
				}
			}
		}
		if($css_prevout){
			print("<style type=\"text/css\"> .cufonpreviewfont-".($f+1)." {".$css_prevout."} </style>");
		}
		print("<span class=\"cufonpreviewfont-".($f+1)."\">preview</span>");
		if($flow_typography[$f]['tff'] && is_array($flow_typography[$f]['tff'])){
			if($flow_typography[$f]['tff'][0] == "d"){
				echo '<script src="'. $tpl_path .'/wp-content/plugins/typography/fonts/'. $flow_typography[$f]['tff'][1] .'" type="text/javascript"></script>';
				echo '<script type="text/javascript">Cufon.replace(\'.cufonpreviewfont-'.($f+1).'\');</script>';
			}else if($flow_typography[$f]['tff'][0] == "g"){
				print("<link rel=\"stylesheet\" type=\"text/css\" href=\"http://fonts.googleapis.com/css?family=".urlencode($flow_typography[$f]['tff'][1])."\">");
			}else if($flow_typography[$f]['tff'][0] == "s"){
			}
		}
		print("</td></tr>");
	}
}
?>
</table>
<?php
$discfonts = scandir(dirname(__FILE__)."/fonts");
$stdfonts = array("Bookman*", "Impact", "Arial*", "Arial Black", "Comic Sans MS", "Courier New*", "Georgia", "Impact", "Lucida Console", "Lucida Sans Unicode", "Lucida Grande", "Palatino Linotype", "Gadget", "Book Antiqua", "Palatino*", "Tahoma*", "Geneva", "Times New Roman*", "Times*", "Trebuchet MS", "Verdana", "Symbol", "Webdings", "Wingdings", "Zapf Dinbats", "MS Sans Serif", "MS Serif", "New York", "Monaco", "Garamond", "Comic Sans MS", "Bookman Old Style", "Charcoal", "Courier*", "Gadget", "Cambria", "Calibri", "Avant Garde*", "Myriad Pro", "Gill Sans");
$googleapifonts = array("Candal", "League Script", "Pacifico", "Architects Daughter", "Indie Flower", "Expletus Sans", "Bevan", "Anton", "Meddon", "UnifrakturCook", "Lato", "Dancing Script", "Kreon", "Astloch", "PT Serif", "Corben", "Schoolbell", "IM Fell", "IM Fell DW Pica", "IM Fell DW Pica SC", "IM Fell Double Pica", "IM Fell Double Pica SC", "IM Fell English", "IM Fell English SC", "IM Fell French Canon", "IM Fell French Canon SC", "IM Fell Great Primer", "IM Fell Great Primer SC", "Radley", "Allan", "Anonymous Pro", "Cabin", "Coming Soon", "Walter Turncoat", "Allerta Stencil", "Raleway", "Slackey", "Cherry Cream Soda", "Bentham", "Geo", "Arvo", "PT Sans", "Luckiest Guy", "Covered By Your Grace", "Unkempt", "Rock Salt", "Gruppo", "Tinos", "Permanent Marker", "Kristi", "Homemade Apple", "Copse", "Kranky", "Allerta", "Cousine", "Crafty Girls", "Cuprum", "Irish Growler", "Merriweather", "Tangerine", "Chewy", "UnifrakturMaguntia", "Josefin Sans", "Fontdiner Swanky", "Syncopate", "Philosopher", "Cardo", "Arimo", "Mountains of Christmas", "Just Me Again Down Here", "OFL Sorts Mill Goudy TT", "Lekton", "Neuton", "Just Another Hand", "Neucha", "Old Standard TT", "Droid Sans Mono", "Lobster", "Yanone Kaffeesatz", "Puritan", "Orbitron", "Droid Serif", "Molengo", "Sunshiney", "Ubuntu", "Coda", "Droid Sans", "Vollkorn", "Calligraffitti", "Cantarell", "Reenie Beanie", "Buda", "Nobile", "Inconsolata", "Josefin Slab", "Crimson Text", "Crushed", "Sniglet", "Vibur", "Kenia");
$tgfontsvaf = array("regular", "bold", "italic", "bolditalic");
$googleapifonts_up = array("Abel" => array("regular"), "Abril Fatface" => array("regular"), "Aclonica" => array("regular"), "Acme" => array("regular"), "Actor" => array("regular"), "Adamina" => array("regular"), "Aguafina Script" => array("regular"), "Aladin" => array("regular"), "Aldrich" => array("regular"), "Alegreya" => array("regular", "bold", "italic", "bolditalic"), "Alegreya SC" => array("regular", "bold", "italic", "bolditalic"), "Alex Brush" => array("regular"), "Alfa Slab One" => array("regular"), "Alice" => array("regular"), "Alike" => array("regular"), "Alike Angular" => array("regular"), "Allan" => array("bold"), "Allerta" => array("regular"), "Allerta Stencil" => array("regular"), "Almendra" => array("regular", "bold"), "Almendra SC" => array("regular"), "Amaranth" => array("regular", "bold", "italic", "bolditalic"), "Amatic SC" => array("regular", "bold"), "Amethysta" => array("regular"), "Andada" => array("regular"), "Andika" => array("regular"), "Annie Use Your Telescope" => array("regular"), "Anonymous Pro" => array("regular", "bold", "italic", "bolditalic"), "Antic" => array("regular"), "Anton" => array("regular"), "Arapey" => array("regular", "italic"), "Arbutus" => array("regular"), "Architects Daughter" => array("regular"), "Arimo" => array("regular", "bold", "italic", "bolditalic"), "Arizonia" => array("regular"), "Armata" => array("regular"), "Artifika" => array("regular"), "Arvo" => array("regular", "bold", "italic", "bolditalic"), "Asap" => array("regular", "bold", "italic", "bolditalic"), "Asset" => array("regular"), "Astloch" => array("regular", "bold"), "Asul" => array("regular", "bold"), "Atomic Age" => array("regular"), "Aubrey" => array("regular"), "Bad Script" => array("regular"), "Balthazar" => array("regular"), "Bangers" => array("regular"), "Basic" => array("regular"), "Baumans" => array("regular"), "Belgrano" => array("regular"), "Bentham" => array("regular"), "Bevan" => array("regular"), "Bigshot One" => array("regular"), "Bilbo" => array("regular"), "Bilbo Swash Caps" => array("regular"), "Bitter" => array("regular", "bold", "italic"), "Black Ops One" => array("regular"), "Bonbon" => array("regular"), "Boogaloo" => array("regular"), "Bowlby One" => array("regular"), "Bowlby One SC" => array("regular"), "Brawler" => array("regular"), "Bree Serif" => array("regular"), "Bubblegum Sans" => array("regular"), "Buda" => array("regular"), "Buenard" => array("regular", "bold"), "Butcherman" => array("regular"), "Cabin" => array("regular", "bold", "italic", "bolditalic"), "Cabin Condensed" => array("regular", "bold"), "Cabin Sketch" => array("regular", "bold"), "Caesar Dressing" => array("regular"), "Cagliostro" => array("regular"), "Calligraffitti" => array("regular"), "Cambo" => array("regular"), "Candal" => array("regular"), "Cantarell" => array("regular", "bold", "italic", "bolditalic"), "Cardo" => array("regular", "bold", "italic"), "Carme" => array("regular"), "Carter One" => array("regular"), "Caudex" => array("regular", "bold", "italic", "bolditalic"), "Cedarville Cursive" => array("regular"), "Ceviche One" => array("regular"), "Changa One" => array("regular", "italic"), "Chango" => array("regular"), "Chelsea Market" => array("regular"), "Cherry Cream Soda" => array("regular"), "Chewy" => array("regular"), "Chicle" => array("regular"), "Chivo" => array("regular", "bold", "italic", "bolditalic"), "Coda" => array("regular"), "Coda Caption" => array("regular"), "Comfortaa" => array("regular", "bold"), "Coming Soon" => array("regular"), "Concert One" => array("regular"), "Condiment" => array("regular"), "Contrail One" => array("regular"), "Convergence" => array("regular"), "Cookie" => array("regular"), "Copse" => array("regular"), "Corben" => array("regular", "bold"), "Cousine" => array("regular", "bold", "italic", "bolditalic"), "Coustard" => array("regular", "bold"), "Covered By Your Grace" => array("regular"), "Crafty Girls" => array("regular"), "Creepster" => array("regular"), "Crete Round" => array("regular", "italic"), "Crimson Text" => array("regular", "bold", "italic", "bolditalic"), "Crushed" => array("regular"), "Cuprum" => array("regular"), "Damion" => array("regular"), "Dancing Script" => array("regular", "bold"), "Dawning of a New Day" => array("regular"), "Days One" => array("regular"), "Delius" => array("regular"), "Delius Swash Caps" => array("regular"), "Delius Unicase" => array("regular", "bold"), "Devonshire" => array("regular"), "Didact Gothic" => array("regular"), "Diplomata" => array("regular"), "Diplomata SC" => array("regular"), "Dorsa" => array("regular"), "Dr Sugiyama" => array("regular"), "Droid Sans" => array("regular", "bold"), "Droid Sans Mono" => array("regular"), "Droid Serif" => array("regular", "bold", "italic", "bolditalic"), "Duru Sans" => array("regular"), "Dynalight" => array("regular"), "EB Garamond" => array("regular"), "Eater" => array("regular"), "Electrolize" => array("regular"), "Emblema One" => array("regular"), "Engagement" => array("regular"), "Enriqueta" => array("regular", "bold"), "Esteban" => array("regular"), "Expletus Sans" => array("regular", "bold", "italic", "bolditalic"), "Fanwood Text" => array("regular", "italic"), "Fascinate" => array("regular"), "Fascinate Inline" => array("regular"), "Federant" => array("regular"), "Federo" => array("regular"), "Fjord One" => array("regular"), "Flamenco" => array("regular"), "Flavors" => array("regular"), "Fondamento" => array("regular", "italic"), "Fontdiner Swanky" => array("regular"), "Forum" => array("regular"), "Francois One" => array("regular"), "Fredericka the Great" => array("regular"), "Fresca" => array("regular"), "Frijole" => array("regular"), "Fugaz One" => array("regular"), "Galdeano" => array("regular"), "Gentium Basic" => array("regular", "bold", "italic", "bolditalic"), "Gentium Book Basic" => array("regular", "bold", "italic", "bolditalic"), "Geo" => array("regular"), "Geostar" => array("regular"), "Geostar Fill" => array("regular"), "Germania One" => array("regular"), "Give You Glory" => array("regular"), "Glegoo" => array("regular"), "Gloria Hallelujah" => array("regular"), "Goblin One" => array("regular"), "Gochi Hand" => array("regular"), "Goudy Bookletter 1911" => array("regular"), "Gravitas One" => array("regular"), "Gruppo" => array("regular"), "Gudea" => array("regular", "bold", "italic"), "Habibi" => array("regular"), "Hammersmith One" => array("regular"), "Handlee" => array("regular"), "Herr Von Muellerhoff" => array("regular"), "Holtwood One SC" => array("regular"), "Homemade Apple" => array("regular"), "Homenaje" => array("regular"), "IM Fell DW Pica" => array("regular", "italic"), "IM Fell DW Pica SC" => array("regular"), "IM Fell Double Pica" => array("regular", "italic"), "IM Fell Double Pica SC" => array("regular"), "IM Fell English" => array("regular", "italic"), "IM Fell English SC" => array("regular"), "IM Fell French Canon" => array("regular", "italic"), "IM Fell French Canon SC" => array("regular"), "IM Fell Great Primer" => array("regular", "italic"), "IM Fell Great Primer SC" => array("regular"), "Iceberg" => array("regular"), "Iceland" => array("regular"), "Inconsolata" => array("regular"), "Inder" => array("regular"), "Indie Flower" => array("regular"), "Inika" => array("regular", "bold"), "Irish Grover" => array("regular"), "Istok Web" => array("regular", "bold", "italic", "bolditalic"), "Italianno" => array("regular"), "Jim Nightshade" => array("regular"), "Jockey One" => array("regular"), "Josefin Sans" => array("regular", "bold", "italic", "bolditalic"), "Josefin Slab" => array("regular", "bold", "italic", "bolditalic"), "Judson" => array("regular", "bold", "italic"), "Julee" => array("regular"), "Junge" => array("regular"), "Jura" => array("regular"), "Just Another Hand" => array("regular"), "Just Me Again Down Here" => array("regular"), "Kameron" => array("regular", "bold"), "Kaushan Script" => array("regular"), "Kelly Slab" => array("regular"), "Kenia" => array("regular"), "Knewave" => array("regular"), "Kotta One" => array("regular"), "Kranky" => array("regular"), "Kreon" => array("regular", "bold"), "Kristi" => array("regular"), "La Belle Aurore" => array("regular"), "Lancelot" => array("regular"), "Lato" => array("regular", "bold", "italic", "bolditalic"), "League Script" => array("regular"), "Leckerli One" => array("regular"), "Lekton" => array("regular", "bold", "italic"), "Lemon" => array("regular"), "Lilita One" => array("regular"), "Limelight" => array("regular"), "Linden Hill" => array("regular", "italic"), "Lobster" => array("regular"), "Lobster Two" => array("regular", "bold", "italic", "bolditalic"), "Lora" => array("regular", "bold", "italic", "bolditalic"), "Love Ya Like A Sister" => array("regular"), "Loved by the King" => array("regular"), "Luckiest Guy" => array("regular"), "Lusitana" => array("regular", "bold"), "Lustria" => array("regular"), "Macondo" => array("regular"), "Macondo Swash Caps" => array("regular"), "Magra" => array("regular", "bold"), "Maiden Orange" => array("regular"), "Mako" => array("regular"), "Marck Script" => array("regular"), "Marko One" => array("regular"), "Marmelad" => array("regular"), "Marvel" => array("regular", "bold", "italic", "bolditalic"), "Mate" => array("regular", "italic"), "Mate SC" => array("regular"), "Maven Pro" => array("regular", "bold"), "Meddon" => array("regular"), "MedievalSharp" => array("regular"), "Medula One" => array("regular"), "Megrim" => array("regular"), "Merienda One" => array("regular"), "Merriweather" => array("regular", "bold"), "Metamorphous" => array("regular"), "Metrophobic" => array("regular"), "Michroma" => array("regular"), "Miltonian" => array("regular"), "Miltonian Tattoo" => array("regular"), "Miniver" => array("regular"), "Miss Fajardose" => array("regular"), "Modern Antiqua" => array("regular"), "Molengo" => array("regular"), "Monofett" => array("regular"), "Monoton" => array("regular"), "Monsieur La Doulaise" => array("regular"), "Montaga" => array("regular"), "Montez" => array("regular"), "Montserrat" => array("regular"), "Mountains of Christmas" => array("regular", "bold"), "Mr Bedfort" => array("regular"), "Mr Dafoe" => array("regular"), "Mr De Haviland" => array("regular"), "Mrs Saint Delafield" => array("regular"), "Mrs Sheppards" => array("regular"), "Muli" => array("regular", "italic"), "Neucha" => array("regular"), "Neuton" => array("regular", "bold", "italic"), "News Cycle" => array("regular"), "Niconne" => array("regular"), "Nixie One" => array("regular"), "Nobile" => array("regular", "bold", "italic", "bolditalic"), "Nosifer" => array("regular"), "Nothing You Could Do" => array("regular"), "Noticia Text" => array("regular", "bold", "italic", "bolditalic"), "Nova Cut" => array("regular"), "Nova Flat" => array("regular"), "Nova Mono" => array("regular"), "Nova Oval" => array("regular"), "Nova Round" => array("regular"), "Nova Script" => array("regular"), "Nova Slim" => array("regular"), "Nova Square" => array("regular"), "Numans" => array("regular"), "Nunito" => array("regular", "bold"), "Old Standard TT" => array("regular", "bold", "italic"), "Oldenburg" => array("regular"), "Open Sans" => array("regular", "bold", "italic", "bolditalic"), "Open Sans Condensed" => array("regular"), "Orbitron" => array("regular", "bold"), "Original Surfer" => array("regular"), "Oswald" => array("regular"), "Over the Rainbow" => array("regular"), "Overlock" => array("regular", "bold", "italic", "bolditalic"), "Overlock SC" => array("regular"), "Ovo" => array("regular"), "PT Sans" => array("regular", "bold", "italic", "bolditalic"), "PT Sans Caption" => array("regular", "bold"), "PT Sans Narrow" => array("regular", "bold"), "PT Serif" => array("regular", "bold", "italic", "bolditalic"), "PT Serif Caption" => array("regular", "italic"), "Pacifico" => array("regular"), "Parisienne" => array("regular"), "Passero One" => array("regular"), "Passion One" => array("regular", "bold"), "Patrick Hand" => array("regular"), "Patua One" => array("regular"), "Paytone One" => array("regular"), "Permanent Marker" => array("regular"), "Petrona" => array("regular"), "Philosopher" => array("regular", "bold", "italic", "bolditalic"), "Piedra" => array("regular"), "Pinyon Script" => array("regular"), "Plaster" => array("regular"), "Play" => array("regular", "bold"), "Playball" => array("regular"), "Playfair Display" => array("regular", "italic"), "Podkova" => array("regular", "bold"), "Poller One" => array("regular"), "Poly" => array("regular", "italic"), "Pompiere" => array("regular"), "Port Lligat Sans" => array("regular"), "Port Lligat Slab" => array("regular"), "Prata" => array("regular"), "Prociono" => array("regular"), "Puritan" => array("regular", "bold", "italic", "bolditalic"), "Quantico" => array("regular", "bold", "italic", "bolditalic"), "Quattrocento" => array("regular"), "Quattrocento Sans" => array("regular"), "Questrial" => array("regular"), "Quicksand" => array("regular", "bold"), "Qwigley" => array("regular"), "Radley" => array("regular", "italic"), "Raleway" => array("regular"), "Rammetto One" => array("regular"), "Rancho" => array("regular"), "Rationale" => array("regular"), "Redressed" => array("regular"), "Reenie Beanie" => array("regular"), "Ribeye" => array("regular"), "Ribeye Marrow" => array("regular"), "Righteous" => array("regular"), "Rochester" => array("regular"), "Rock Salt" => array("regular"), "Rokkitt" => array("regular", "bold"), "Ropa Sans" => array("regular", "italic"), "Rosario" => array("regular", "bold", "italic", "bolditalic"), "Rouge Script" => array("regular"), "Ruda" => array("regular", "bold"), "Ruge Boogie" => array("regular"), "Ruluko" => array("regular"), "Ruslan Display" => array("regular"), "Ruthie" => array("regular"), "Sail" => array("regular"), "Salsa" => array("regular"), "Sancreek" => array("regular"), "Sansita One" => array("regular"), "Sarina" => array("regular"), "Satisfy" => array("regular"), "Schoolbell" => array("regular"), "Shadows Into Light" => array("regular"), "Shanti" => array("regular"), "Shojumaru" => array("regular"), "Short Stack" => array("regular"), "Sigmar One" => array("regular"), "Signika" => array("regular", "bold"), "Signika Negative" => array("regular", "bold"), "Sirin Stencil" => array("regular"), "Six Caps" => array("regular"), "Slackey" => array("regular"), "Smokum" => array("regular"), "Smythe" => array("regular"), "Sniglet" => array("regular"), "Snippet" => array("regular"), "Sofia" => array("regular"), "Sonsie One" => array("regular"), "Sorts Mill Goudy" => array("regular", "italic"), "Special Elite" => array("regular"), "Spicy Rice" => array("regular"), "Spinnaker" => array("regular"), "Spirax" => array("regular"), "Squada One" => array("regular"), "Stardos Stencil" => array("regular", "bold"), "Stint Ultra Condensed" => array("regular"), "Stoke" => array("regular"), "Sue Ellen Francisco" => array("regular"), "Sunshiney" => array("regular"), "Supermercado One" => array("regular"), "Swanky and Moo Moo" => array("regular"), "Syncopate" => array("regular", "bold"), "Tangerine" => array("regular", "bold"), "Telex" => array("regular"), "Tenor Sans" => array("regular"), "Terminal Dosis" => array("regular", "bold"), "The Girl Next Door" => array("regular"), "Tienne" => array("regular", "bold"), "Tinos" => array("regular", "bold", "italic", "bolditalic"), "Titan One" => array("regular"), "Trade Winds" => array("regular"), "Trochut" => array("regular", "bold", "italic"), "Trykker" => array("regular"), "Tulpen One" => array("regular"), "Ubuntu" => array("regular", "bold", "italic", "bolditalic"), "Ubuntu Condensed" => array("regular"), "Ubuntu Mono" => array("regular", "bold", "italic", "bolditalic"), "Ultra" => array("regular"), "Uncial Antiqua" => array("regular"), "UnifrakturCook" => array("bold"), "UnifrakturMaguntia" => array("regular"), "Unkempt" => array("regular", "bold"), "Unlock" => array("regular"), "Unna" => array("regular"), "VT323" => array("regular"), "Varela" => array("regular"), "Varela Round" => array("regular"), "Vast Shadow" => array("regular"), "Vibur" => array("regular"), "Vidaloka" => array("regular"), "Viga" => array("regular"), "Volkhov" => array("regular", "bold", "italic", "bolditalic"), "Vollkorn" => array("regular", "bold", "italic", "bolditalic"), "Voltaire" => array("regular"), "Waiting for the Sunrise" => array("regular"), "Wallpoet" => array("regular"), "Walter Turncoat" => array("regular"), "Wellfleet" => array("regular"), "Wire One" => array("regular"), "Yanone Kaffeesatz" => array("regular", "bold"), "Yellowtail" => array("regular"), "Yeseva One" => array("regular"), "Yesteryear" => array("regular"), "Zeyada" => array("regular"));

$update_cfv = false;
if(isset($_GET['updatecf'])){
	$flow_typography = get_option('flow_typography');
	$cr_fnid = -1;
	if(is_array($flow_typography)){
		for($f=0;$f<count($flow_typography);$f++){
			if($flow_typography[$f]['fs'] == urldecode($_GET['n'])){
				$cr_fnid = $f;
				$update_cfv = true;
				break;
			}
		}
	}
}
?>
<h3>Create New Style/Edit Current Style</h3>
<p>You can create new style or edit existing one using the form below. Please note that once you're editing any style it's going to load again and again every time you hit "Save" button. Please leave this page and enter it again to create new style if this happens.</p>
<script type="text/javascript">
jQuery(document).ready(function(){jQuery(".attcolorpicker").each(function(){jQuery(this).ColorPicker({onShow:function(cp){jQuery(cp).fadeIn(500);return false;},onHide:function(cp){jQuery(cp).fadeOut(500);return false;},onChange:function(hsb, hex, rgb){jQuery(this).parent().find('.attcolorpicker').val('#'+hex);jQuery(this).parent().find('.colorSelector div').css('backgroundColor', '#'+hex);jQuery(this).parent().find('.colorSelector').ColorPickerSetColor(hex);}});jQuery(this).parent().find('.colorSelector').ColorPicker({onShow:function(cp){jQuery(cp).fadeIn(500);return false;},onHide:function(cp){jQuery(cp).fadeOut(500);return false;},onChange:function(hsb, hex, rgb){jQuery(this).parent().find('.attcolorpicker').val('#'+hex);jQuery(this).parent().find('.colorSelector div').css('backgroundColor', '#'+hex);jQuery(this).parent().find('.attcolorpicker').ColorPickerSetColor(hex);}});});});</script>
<form name="form-main-page" method="post" action="">
	<input type="hidden" name="h" value="Y">
    <table class="form-table">
    <tr valign="top">
	<th style="width:100px;">Selector:</th><td>
	<input type="text" name="fs"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['fs']){ print(" value=\"".$flow_typography[$cr_fnid]['fs']."\""); } } ?>><p>(required) Selectors are strings that the script will use to select particular elements of your website and then replace their fonts.<br/><br/>
	<strong>Examples of selectors:</strong><br/>
	- h1 - this will replace h1 fonts<br/>
	- #some_container h1 - this will replace h1 fonts in container with an ID of "some_container"<br/>
	- #some_container - this will replace all fonts in container with an ID of "some_container"<br/><br/>
	<strong>Note:</strong> to find out what is your selector please use tools like Firebug for Firefox or developer extensions for other browsers.<br/>
	<strong>Note:</strong> if the selector doesn't work then you either used wrong selector or something is overwriting it. Solutions: (1) Make sure that you're using correct selector, (2) Select "important" option below to check if something is overwriting your selector, (3) Pick more precise selector (like "#container > #container2 h1 a").<br/><br/>
	<strong>CSS selectors documentation: <a href="http://www.w3.org/TR/CSS2/selector.html" target="_blank">http://www.w3.org/TR/CSS2/selector.html</a></strong>
	</p></td></tr>
	<tr valign="top"><th><?php _e('Description:','flowtypography'); ?></th><td><input type="text" name="fd"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['fd']){ print(" value=\"".$flow_typography[$cr_fnid]['fd']."\""); } } ?>><p>(optional) Add some description like "Logo font style", "Blog H3 headings font style" or "Footer copyright notice font style" to make it easier to find out which item is responsible for particular font changes on your website.</p></td></tr>
	<tr><th><?php _e('Font replacement:','flowtypography'); ?></th><td>
		<script type="text/javascript">
		var gfontsuplistvs = [
		<?php
		$gupstflag = false;
		foreach($googleapifonts_up as $googleapifonts_upk => $googleapifonts_upv){
			if($gupstflag){
				print(", ");
			}else{
				$gupstflag = true;
			}
			print("{n:\"g{$googleapifonts_upk}\", m:[");
			for($jip=0;$jip<count($googleapifonts_upv);$jip++){
				if($jip){
					print(", ");
				}
				print("\"{$googleapifonts_upv[$jip]}\"");
			}
			print("]}");
		}
		?>
		];
		jQuery(document).ready(function(){
			jQuery("#gfonts_tff").change(function(){
				var gfonts_tffval = jQuery(this).val();
				if(gfonts_tffval.charAt(0) == "g"){
					var gfontsmapo = false;
					for(var gfontsi=0;gfontsi<gfontsuplistvs.length;gfontsi++){
						if(gfontsuplistvs[gfontsi].n == gfonts_tffval){
							gfontsmapo = gfontsuplistvs[gfontsi].m;
							break;
						}
					}
					if(!gfontsmapo){
						gfontsmapo = ["regular"];
					}
					jQuery("#gfonts_tffv select").empty();
					for(var gmnodesi=0;gmnodesi<gfontsmapo.length;gmnodesi++){
						var gmnodesappel = jQuery("<option>").attr("value",gfontsmapo[gmnodesi]).text(gfontsmapo[gmnodesi]);
						if(gfontsmapo[gmnodesi] == "regular"){
							gmnodesappel.attr("selected","selected");
						}
						jQuery("#gfonts_tffv select").append(gmnodesappel);
					}
					jQuery("#gfonts_tffv").css("visibility","visible");
				}else{
					jQuery("#gfonts_tffv").css("visibility","hidden");
				}
			});
		});
		</script>
		<select name="tff" id="gfonts_tff">
			<option disabled="disabled">Standard fonts:</option>
			<?php
			for($f=0;$f<count($stdfonts);$f++){
				print("<option value=\"s".str_replace("*", "", $stdfonts[$f])."\"");
				if($update_cfv){
					if($flow_typography[$cr_fnid]['tff'] && is_array($flow_typography[$cr_fnid]['tff'])){
						if($flow_typography[$cr_fnid]['tff'][0] == "s"){
							if($flow_typography[$cr_fnid]['tff'][1] == str_replace("*", "", $stdfonts[$f])){
								print(" selected=\"selected\"");
							}
						}
					}
				}
				print(">".$stdfonts[$f]."</option>");
			}
			?>
			<option disabled="disabled">Cufon (Server HDD) fonts:</option>
			<?php
			for($f=0;$f<count($discfonts);$f++){
				if($discfonts[$f] != "." && $discfonts[$f] != ".."){
					$extexpl = explode(".", $discfonts[$f]);
					if($extexpl[count($extexpl)-1] == "js"){
						print("<option value=\"d".$discfonts[$f]."\"");
						if($update_cfv){
							if($flow_typography[$cr_fnid]['tff'] && is_array($flow_typography[$cr_fnid]['tff'])){
								if($flow_typography[$cr_fnid]['tff'][0] == "d"){
									if($flow_typography[$cr_fnid]['tff'][1] == $discfonts[$f]){
										print(" selected=\"selected\"");
									}
								}
							}
						}
						print(">".$discfonts[$f]."</option>");
					}
				}
			}
			?>
			<option disabled="disabled">Google fonts:</option>
			<?php
			//for($f=0;$f<count($googleapifonts);$f++){
			foreach($googleapifonts_up as $googleapifonts_upk => $googleapifonts_upv){
				//print("<option value=\"g".$googleapifonts[$f]."\"");
				print("<option value=\"g".$googleapifonts_upk."\"");
				if($update_cfv){
					if($flow_typography[$cr_fnid]['tff'] && is_array($flow_typography[$cr_fnid]['tff'])){
						if($flow_typography[$cr_fnid]['tff'][0] == "g"){
							//if($flow_typography[$cr_fnid]['tff'][1] == $googleapifonts[$f]){
							if($flow_typography[$cr_fnid]['tff'][1] == $googleapifonts_upk){
								print(" selected=\"selected\"");
							}
						}
					}
				}
				//print(">".$googleapifonts[$f]."</option>");
				print(">".$googleapifonts_upk."</option>");
			}
			?>
		</select>
		<div id="gfonts_tffv" style="display:inline-block;margin-left:20px;visibility:<?php
		if($update_cfv){
			if($flow_typography[$cr_fnid]['tff'][0] == "g"){
				print("visible");
			}else{
				print("hidden");
			}
		}else{
			print("hidden");
		}
		?>;"><select name="tffv"><?php
		if($update_cfv){
			if($flow_typography[$cr_fnid]['tff'][0] == "g"){
				if(array_key_exists($flow_typography[$cr_fnid]['tff'][1], $googleapifonts_up)){
					for($tkle=0;$tkle<count($googleapifonts_up[$flow_typography[$cr_fnid]['tff'][1]]);$tkle++){
						print("<option value=\"{$googleapifonts_up[$flow_typography[$cr_fnid]['tff'][1]][$tkle]}\"");
						if(array_key_exists(2, $flow_typography[$cr_fnid]['tff'])){
							if($flow_typography[$cr_fnid]['tff'][2] == $googleapifonts_up[$flow_typography[$cr_fnid]['tff'][1]][$tkle]){
								print(" selected=\"selected\"");
							}
						}
						print(">{$googleapifonts_up[$flow_typography[$cr_fnid]['tff'][1]][$tkle]}</option>");
					}
				}
			}
		}
		?></select></div>
		
		<p>(optional) Pick some font to replace your current font. List include:<br />
		* Standard fonts<br />
		* Cufon fonts<br />
		* Google library fonts<br /><br />
		<b>Note:</b> You can upload new Cufon fonts to 'fonts' directory and they will appear here.<br />
		<b>Note:</b> Fonts marked with asterisk (*) are <strong>WEB SAFE FONTS</strong>. That doesn't mean that other fonts are unsafe. Most of them (like 99%) will display fine both on PC and MAC and on every major browser including Firefox, Google Chrome, Safari, Internet Explorer and Opera. Some of them may not display correctly on rare browsers and systems like Linux, Unix and other systems that are less common.<br /><br />
		In case that the font you've chosen cannot be used it will be automatically replaced with web safe font so there's nothing to worry about. :)</p>
	</td></tr>
	<tr><th>Color:</th><td><input type="text" name="tc" style="float:left;margin-top:8px;" class="attcolorpicker"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['tc']){ print(" value=\"".$flow_typography[$cr_fnid]['tc']."\""); } } ?>> <div class="colorSelector"><div style="background-color:<?php if($update_cfv){ if($flow_typography[$cr_fnid]['tc']){ print(" value=\"".$flow_typography[$cr_fnid]['tc']."\""); } } ?>;"></div></div><p>(optional) Pick some font color in hex format (like #001122). If you leave it blank the color will be inherited from parents of the selector you've selected.</p></td></tr>
	<tr><th>Font size:</th><td><input type="text" name="ts"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['ts']){ print(" value=\"".$flow_typography[$cr_fnid]['ts']."\""); } } ?>><select name="tsu"><?php 
	for($f=0;$f<count($fields_unit);$f++){
		print("<option value=\"".$fields_unit[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['tsu']){
				if($flow_typography[$cr_fnid]['tsu'] == $fields_unit[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$fields_unit[$f]."</option>");
	}
	?></select><p>(optional) Pick some font size in px, em or % (like 12px, 120%). If you leave it blank the size will be inherited from parents of the selector you've selected.<br/><br/>
	<strong>Relative Length Units: <a href="http://www.w3.org/TR/css3-values/#relative0" target=_blank">http://www.w3.org/TR/css3-values/#relative0</a></strong><br/>
	<strong>Absolute Length Units: <a href="http://www.w3.org/TR/css3-values/#absolute0" target=_blank">http://www.w3.org/TR/css3-values/#absolute0</a></strong></p></td></tr>
	<tr><th>Line height:</th><td><input type="text" name="tlh"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['tlh']){ print(" value=\"".$flow_typography[$cr_fnid]['tlh']."\""); } } ?>><select name="tlhu"><?php 
	for($f=0;$f<count($fields_unit);$f++){
		print("<option value=\"".$fields_unit[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['tlhu']){
				if($flow_typography[$cr_fnid]['tlhu'] == $fields_unit[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$fields_unit[$f]."</option>");
	}
	?></select><p>(optional) Pick some line height in px, em or % (like 20px, 110%). If you leave it blank it will be inherited from parents of the selector you've selected.<br /><br /><strong>Line height: <a href="http://www.w3.org/TR/CSS2/visudet.html#line-height" target="_blank">http://www.w3.org/TR/CSS2/visudet.html#line-height</a></strong></p></td></tr>
	<tr><th>Font stretch:</th><td><select name="tfs"><?php 
	for($f=0;$f<count($flds_fontstretch);$f++){
		print("<option value=\"".$flds_fontstretch[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['tfs']){
				if($flow_typography[$cr_fnid]['tfs'] == $flds_fontstretch[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$flds_fontstretch[$f]."</option>");
	}
	?></select><p>(optional) The 'font-stretch' property selects a normal, condensed, or expanded face from a font family. It allows you make text wider or narrower.<br/><strong>WARNING! This is CSS3 property that may not be supported by some browsers (as of 1 April 2011).</strong><br /><br /><strong>Font Stretch: <a href="http://www.w3.org/TR/2011/WD-css3-fonts-20110324/#font-stretch-prop" target="_blank">http://www.w3.org/TR/2011/WD-css3-fonts-20110324/#font-stretch-prop</a></strong></p></td></tr>
	<tr><th>Letter spacing:</th><td><input type="text" name="tls"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['tls']){ print(" value=\"".$flow_typography[$cr_fnid]['tls']."\""); } } ?>><select name="tlsu"><?php 
	for($f=0;$f<count($fields_unit);$f++){
		print("<option value=\"".$fields_unit[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['tlsu']){
				if($flow_typography[$cr_fnid]['tlsu'] == $fields_unit[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$fields_unit[$f]."</option>");
	}
	?></select><p>This property specifies spacing behavior between text characters. Once specified, length indicates inter-character space in addition to the default space between characters. Values may be negative, but there may be implementation-specific limits. User agents may not further increase or decrease the inter-character space in order to justify text.<br /><br /><strong>Line height: <a href="http://www.w3.org/TR/CSS2/text.html#propdef-letter-spacing" target="_blank">http://www.w3.org/TR/CSS2/text.html#propdef-letter-spacing</a></strong></p></td></tr>
	<tr><th>Font variant:</th><td><select name="tfv"><?php 
	for($f=0;$f<count($fields_variant);$f++){
		print("<option value=\"".$fields_variant[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['tfv']){
				if($flow_typography[$cr_fnid]['tfv'] == $fields_variant[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$fields_variant[$f]."</option>");
	}
	?></select><p>In a small-caps font the lower case letters look similar to the uppercase ones, but in a smaller size and with slightly different proportions. The 'font-variant' property selects that font. A value of 'normal' selects a font that is not a small-caps font, 'small-caps' selects a small-caps font.<br /><br /><strong>Font variant: <a href="http://www.w3.org/TR/CSS2/fonts.html#small-caps" target="_blank">http://www.w3.org/TR/CSS2/fonts.html#small-caps</a></strong></p></td></tr>
	<tr><th>Font weight:</th><td><select name="fb"><?php
	for($f=0;$f<count($flds_fontweight);$f++){
		print("<option value=\"".$flds_fontweight[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['fb']){
				if($flow_typography[$cr_fnid]['fb'] == $flds_fontweight[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$flds_fontweight[$f]."</option>");
	}
	?></select><p>The 'font-weight' property selects the weight of the font. The values '100' to '900' form an ordered sequence, where each number indicates a weight that is at least as dark as its predecessor. The keyword 'normal' is synonymous with '400', and 'bold' is synonymous with '700'. Keywords other than 'normal' and 'bold' have been shown to be often confused with font names and a numerical scale was therefore chosen for the 9-value list. The 'bolder' and 'lighter' values select font weights that are relative to the weight inherited from the parent.<br/><br/><strong>Font weight: <a href="http://www.w3.org/TR/CSS2/fonts.html#propdef-font-weight" target="_blank">http://www.w3.org/TR/CSS2/fonts.html#propdef-font-weight</a></strong></p></td></tr>
	<tr><th>Font style:</th><td><select name="fi"><?php
	for($f=0;$f<count($flds_fontstyle);$f++){
		print("<option value=\"".$flds_fontstyle[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['fi']){
				if($flow_typography[$cr_fnid]['fi'] == $flds_fontstyle[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$flds_fontstyle[$f]."</option>");
	}
	?></select><p>The 'font-style' property selects between normal (sometimes referred to as "roman" or "upright"), italic and oblique faces within a font family. A value of 'normal' selects a font that is classified as 'normal' in the UA's font database, while 'oblique' selects a font that is labeled 'oblique'. A value of 'italic' selects a font that is labeled 'italic', or, if that is not available, one labeled 'oblique'.<br/><br/><strong>Font style: <a href="http://www.w3.org/TR/CSS2/fonts.html#propdef-font-style" target="_blank">http://www.w3.org/TR/CSS2/fonts.html#propdef-font-style</a></strong></p></td></tr>
	<tr><th>Font decoration</th><td><input type="checkbox" name="fu"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['fu']){ print(" checked=\"checked\""); } } ?>> Underline <p>(optional) This property describes decorations that are added to the text of an element using the element's color.<br /><br /><strong>Text decoration: <a href="http://www.w3.org/TR/CSS2/text.html#propdef-text-decoration" target="_blank">http://www.w3.org/TR/CSS2/text.html#propdef-text-decoration</a></strong></p></td></tr>
	<tr><th></th><td><input type="checkbox" name="flt"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['flt']){ print(" checked=\"checked\""); } } ?>> Line through <p>(optional) This property describes decorations that are added to the text of an element using the element's color.</p></td></tr>
	<tr><th></th><td><input type="checkbox" name="fdo"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['fdo']){ print(" checked=\"checked\""); } } ?>> Overline <p>(optional) This property describes decorations that are added to the text of an element using the element's color.</p></td></tr>
	<tr><th></th><td><input type="checkbox" name="fdb"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['fdb']){ print(" checked=\"checked\""); } } ?>> Blink <p>(optional) This property describes decorations that are added to the text of an element using the element's color.</p></td></tr>
	<tr><th>Text transform:</th><td><select name="ftt"><?php
	for($f=0;$f<count($flds_texttransform);$f++){
		print("<option value=\"".$flds_texttransform[$f]."\"");
		if($update_cfv){
			if($flow_typography[$cr_fnid]['ftt']){
				if($flow_typography[$cr_fnid]['ftt'] == $flds_texttransform[$f]){
					print(" selected=\"selected\"");
				}
			}
		}
		print(">".$flds_texttransform[$f]."</option>");
	}
	?></select><p>This property controls capitalization effects of an element's text. Values have the following meanings:<br /><strong>capitalize</strong> - Puts the first character of each word in uppercase; other characters are unaffected.<br /><strong>uppercase</strong> - Puts all characters of each word in uppercase.<br /><strong>lowercase</strong> - Puts all characters of each word in lowercase.<br /><strong>none</strong> - No capitalization effects.<br />The actual transformation in each case is written language dependen.<br/><br/><strong>Text transform: <a href="http://www.w3.org/TR/CSS2/text.html#propdef-text-transform" target="_blank">http://www.w3.org/TR/CSS2/text.html#propdef-text-transform</a></strong></p></td></tr>
	<tr><th>Important:</th><td><input type="checkbox" name="fip"<?php if($update_cfv){ if($flow_typography[$cr_fnid]['fip']){ print(" checked=\"checked\""); } } ?>> Important<p>(optional) Important is used when you want to force your settings to overwrite any other settings. Sometimes it may happen that no matter what you do something is overwriting one of your settings (like it always adds underline). Select this to force your settings to be used.</p></td></tr></table>
    <p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>
</form>
</div>
<?php 
} 

function in_array_ft($search, $array, $index){
	for($fti=0;$fti<count($array);$fti++){
		if($array[$fti][$index] == $search){
			return $fti;
		}
	}
	return -1;
}
function font_replace(){
	$fieldsd_css = array(array("tff", "font-family", 5), array("tc", "color", 1), array("ts", "font-size", 6, "tsu"), array("tlh", "line-height", 6, "tlhu"), array("tfs", "font-stretch", 4, "inherit"), array("tls", "letter-spacing", 6, "tlsu"), array("fb", "font-weight", 4, "inherit"), array("fi", "font-style", 4, "inherit"), array("fu", "text-decoration", 2, "underline"), array("ftt", "text-transform", 4, "inherit"), array("flt", "text-decoration", 2, "line-through"), array("fdo", "text-decoration", 2, "overline"), array("fdb", "text-decoration", 2, "blink"), array("tfv", "font-variant", 4, "inherit"), array("fip", "!important", 3));
	
	$tpl_path = get_bloginfo('wpurl');
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/typography/cufon-yui.js"></script>';
	$flow_typography = get_option('flow_typography');
	
	if(is_array($flow_typography)){
		$css_prevoutbuffer = "";
		$fontsaloadedf = array("d" => array(), "g" => array());
		for($f=0;$f<count($flow_typography);$f++){
			$css_prevarr = array();
			for($fdc=0;$fdc<count($fieldsd_css);$fdc++){
				if($fieldsd_css[$fdc][2] == 1){
					if($flow_typography[$f][$fieldsd_css[$fdc][0]]){
						$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]];
					}
				}else if($fieldsd_css[$fdc][2] == 2){
					if($flow_typography[$f][$fieldsd_css[$fdc][0]]){
						if(array_key_exists($fieldsd_css[$fdc][1], $css_prevarr)){
							$css_prevarr[$fieldsd_css[$fdc][1]] .= " ".$fieldsd_css[$fdc][3];
						}else{
							$css_prevarr[$fieldsd_css[$fdc][1]] = $fieldsd_css[$fdc][3];
						}
					}
				}else if($fieldsd_css[$fdc][2] == 3){
					if($flow_typography[$f][$fieldsd_css[$fdc][0]]){
						$css_prevarr['__'] = $fieldsd_css[$fdc][1];
					}
				}else if($fieldsd_css[$fdc][2] == 4){
					if($flow_typography[$f][$fieldsd_css[$fdc][0]] && $flow_typography[$f][$fieldsd_css[$fdc][0]] != $fieldsd_css[$fdc][3]){
						$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]];
					}
				}else if($fieldsd_css[$fdc][2] == 5){
					if($flow_typography[$f][$fieldsd_css[$fdc][0]][1]){
						if($flow_typography[$f][$fieldsd_css[$fdc][0]][0] != "d"){
							$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]][1];
						}
					}
				}else if($fieldsd_css[$fdc][2] == 6){
					if($flow_typography[$f][$fieldsd_css[$fdc][0]] && $flow_typography[$f][$fieldsd_css[$fdc][3]]){
						$css_prevarr[$fieldsd_css[$fdc][1]] = $flow_typography[$f][$fieldsd_css[$fdc][0]].$flow_typography[$f][$fieldsd_css[$fdc][3]];
					}
				}
			}
			$css_prevout = "";
			foreach($css_prevarr as $cpk => $cpv){
				if($cpk && $cpv){
					if($cpk != "__"){
						$css_prevout .= $cpk.": ".$cpv;
						if($css_prevarr['__']){
							$css_prevout .= $css_prevarr['__'];
						}
						$css_prevout .= ";\n";
					}
				}
			}
			if($css_prevout){
				$css_prevoutbuffer .= $flow_typography[$f]['fs']."{".$css_prevout."} \n";
			}
			$tgfontsva = array("bold", "italic", "bolditalic");
			$insarrftfontn = $flow_typography[$f]['tff'][1];
			if($flow_typography[$f]['tff'][0] == "g" && array_key_exists(2, $flow_typography[$f]['tff'])){
				if(in_array($flow_typography[$f]['tff'][2], $tgfontsva)){
					$insarrftfontn .= ":".$flow_typography[$f]['tff'][2];
				}
			}
			$insarrfti = in_array_ft($insarrftfontn, $fontsaloadedf[$flow_typography[$f]['tff'][0]], 0);
			if($insarrfti == -1){
				$fontsaloadedf[$flow_typography[$f]['tff'][0]][] = array($insarrftfontn, array($flow_typography[$f]['fs']));
			}else{
				$fontsaloadedf[$flow_typography[$f]['tff'][0]][$insarrfti][1][] = $flow_typography[$f]['fs'];
			}
				/*if($flow_typography[$f]['tff'][0] == "d"){
					echo '<script src="'. $tpl_path .'/wp-content/plugins/typography/fonts/'. $flow_typography[$f]['tff'][1] .'" type="text/javascript"></script>';
					echo '<script type="text/javascript">Cufon.replace(\''.$flow_typography[$f]['fs'].'\');</script>';
				}else if($flow_typography[$f]['tff'][0] == "g"){
					print("<link rel=\"stylesheet\" type=\"text/css\" href=\"http://fonts.googleapis.com/css?family=".urlencode($flow_typography[$f]['tff'][1])."\">");
				}else if($flow_typography[$f]['tff'][0] == "s"){
				}*/
		}
		for($fal=0;$fal<count($fontsaloadedf["g"]);$fal++){
			print("<link rel=\"stylesheet\" type=\"text/css\" href=\"http://fonts.googleapis.com/css?family=".str_replace(array("%3A", "%3a"), ":", urlencode(trim($fontsaloadedf["g"][$fal][0])))."\">\n");
		}
		for($fal=0;$fal<count($fontsaloadedf["d"]);$fal++){
			print("<script src=\"". $tpl_path ."/wp-content/plugins/typography/fonts/". $fontsaloadedf["d"][$fal][0] ."\" type=\"text/javascript\"></script>\n");
			for($fals=0;$fals<count($fontsaloadedf["d"][$fal][1]);$fals++){
				print("<script type=\"text/javascript\">Cufon.replace('".$fontsaloadedf["d"][$fal][1][$fals]."', {hover: true});</script>\n");
			}
		}
		if($css_prevoutbuffer){
			print("<style type=\"text/css\">".$css_prevoutbuffer."</style>");
		}
		//print("<script type=\"text/javascript\"> Cufon.now(); </script>");
	}
}
add_action('wp_head', 'font_replace');
?>