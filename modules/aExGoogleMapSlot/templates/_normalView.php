<?php use_helper('GMap') ?>

<?php include_partial('a/simpleEditButton', array('name' => $name, 'pageid' => $pageid, 'permid' => $permid)) ?>

<?php $gMap->setContainerAttributes(array('id' => "map-$name-$pageid-$permid")); ?>

<?php include_map($gMap,array('width'=>'100%','height'=>'300px')); ?>

 <!-- Javascript included at the bottom of the page -->
<?php include_map_javascript($gMap); ?>

<script type="text/javascript">
	//avoid loading the maps api multiple times
	if(window.google != undefined){

		console.log('Already loaded');
		//map already loaded
		initialize();
	}else{
		console.log('Loading');
		loadScript();
	}

	function loadScript() {
	  var script = document.createElement("script");
	  script.type = "text/javascript";
	  script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
	  document.body.appendChild(script);
	}



</script>
