<?php 
function language_selector_flags(){
	if(function_exists('icl_get_languages')){
		$flow_wpml_switcher = get_option("flow_wpml_switcher");
		$flow_wpml_left = get_option("flow_wpml_left");
		$flow_wpml_top = get_option("flow_wpml_top");
		
		$wpml_style = 'style="';
		if($flow_wpml_switcher){ }else{ $wpml_style .= 'display: none;'; }
		if($flow_wpml_left){ $wpml_style .= 'left: '.$flow_wpml_left.';'; }
		if($flow_wpml_top){ $wpml_style .= 'top: '.$flow_wpml_top.';'; }
		$wpml_style .= '"';
		
		$languages = icl_get_languages('skip_missing=0&orderby=desc');
		if(!empty($languages)){
			$out = '<div class="conatainer_language_selector" '.$wpml_style.'><div id="flags_language_selector">';
			$out .= '<div class="current_language">'.ICL_LANGUAGE_CODE.'</div>';
			$out .= '<ul id="lang_ul">';
			foreach($languages as $l){
				if($l['active']){ $this_active = 'active_lng'; }else{ unset($this_active); }
				$out .= '<li class="language-li '.$this_active.'">';
				if(!$l['active']){ $out .= '<a href="'.$l['url'].'">'; }
				$out .= '<span class="language-name">'.$l['native_name'].'</span>';
				$out .= '<span class="language-name-bold">'.$l['native_name'].'</span>';
				if(!$l['active']){ $out .= '</a>'; }
				$out .= '</li>';
			}
			$out .= '</ul>';
			$out .= '</div></div>';
		}
		return $out;
	}else{
		return;
	}
}
?>