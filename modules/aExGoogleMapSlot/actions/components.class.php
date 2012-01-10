<?php
class aExGoogleMapSlotComponents extends BaseaSlotComponents
{
  public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new aExGoogleMapSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->options['width'] = $this->getOption('width', 300)."px";
    $this->options['height'] = $this->getOption('height', 300)."px";
    $this->values = $this->slot->getArrayValue();
	$this->mapId = "map-$this->name-$this->pageid-$this->permid";
    
	$this->gMap = new GMap(array('control' => array('new google.maps.SmallMapControl()')), array('id' => $this->mapId));
         /**
	     * Existanze's Coordinates
	     */
	$this->gMap->setCenter(38.01814207469139,23.80458354949951);
	$this->gMap->setZoom(14);

    if($this->values && sizeof($this->values) >0){

			/**
			 * @var $this->gMap GMap
			 */

			$marker  = new GMapMarker($this->values['latitude'],$this->values['longitude']);
			$marker->addHtmlInfoWindow(new GMapInfoWindow($this->values['description']));
			$this->gMap->addMarker($marker);
			$this->gMap->addEvent(new GMapEvent("infowindowclose","this.panTo(new google.maps.LatLng(".$this->values['latitude'].",".$this->values['longitude']."))"));
			$this->gMap->setCenter($this->values['latitude'],$this->values['longitude']);

    }
  }
}
