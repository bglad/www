<?php 
	function daisho_gmap($atts, $content = null) {
		$class = shortcode_atts( array('latitude' => '0', 'longitude' => '0', 'zoom' => '12', 'height' => '355px', 'width' => '100%'), $atts );
		return "<script type=\"text/javascript\" src=\"http://maps.googleapis.com/maps/api/js?sensor=false\"></script>
				<script type=\"text/javascript\">
				  function gmap_initialize() {
					var greyMapStyles = [
					  {
						featureType: '',
						elementType: '',
						stylers: [
						  {hue: ''},
						  {saturation: -100},
						  {lightness: '15'},
						]
					  },
					  {
						featureType: '',
					  }
					];
					var myLatlng = new google.maps.LatLng(".$class['latitude'].", ".$class['longitude'].");
					var myOptions = {
					  center: myLatlng,
					  zoom: ".$class['zoom'].",
					  mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById(\"map_canvas\"),
						myOptions);
					var marker = new google.maps.Marker({
						position: myLatlng,
						map: map,
						animation: google.maps.Animation.DROP
					});
					map.setOptions({styles: greyMapStyles});
				  }
				  jQuery(document).ready(function() {
					gmap_initialize();
				  });
				</script>
				<div id=\"map_canvas\" class=\"map_canvas\" style=\"height:".$class['height'].";width:".$class['width'].";float:left;\"></div>";
	}
	add_shortcode("gmap", "daisho_gmap");
?>