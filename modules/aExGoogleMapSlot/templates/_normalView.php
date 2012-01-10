<?php use_helper('GMap') ?>

<?php include_partial('a/simpleEditButton', array('name' => $name, 'pageid' => $pageid, 'permid' => $permid,'slot'=>$slot)) ?>

<?php include_map($gMap,array('width'=>$options['width'],'height'=>$options['height'], 'margin-left' => 'auto', 'margin-right' => 'auto')); ?>

 <!-- Javascript included at the bottom of the page -->
<?php include_map_javascript($gMap); ?>

<script type="text/javascript">
	//avoid loading the maps api multiple times
	if(window.google != undefined){
		//map already loaded
		initialize();
	}else{
		loadScript();
	}

	function loadScript() {
	  var script = document.createElement("script");
	  script.type = "text/javascript";
	  script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
	  document.body.appendChild(script);
	}



</script>
