<?php    
class aExGoogleMapSlotEditForm extends BaseForm
{
  // Ensures unique IDs throughout the page
  protected $id;

		protected static $mapTypes = array(
																'google.maps.MapTypeId.ROADMAP'=>'Map',
																'google.maps.MapTypeId.SATELLITE'=>'Satellite',
																'google.maps.MapTypeId.HYBRID'=>'Hybrid',
																'google.maps.MapTypeId.TERRAIN'=>'Terrain');


  public function __construct($id, $defaults = array(), $options = array(), $CSRFSecret = null)
  {
    $this->id = $id;
    parent::__construct($defaults, $options, $CSRFSecret);
  }
  public function configure()
  {
    // ADD YOUR FIELDS HERE
    
    // A simple example: a slot with a single 'text' field with a maximum length of 100 characters
    $this->setWidgets(
	    array(
		    'description' => new sfWidgetFormTextarea(),
		    'latitude' => new sfWidgetFormInput(),
	      'longitude' => new sfWidgetFormInput(),
		    'mapType' => new sfWidgetFormChoice(array('choices'=>self::$mapTypes))
		    )
    );
    $this->setValidators(
	    array(
		    'description' => new sfValidatorString(array('required' => false, 'max_length' => 200)),
		    'latitude' => new sfValidatorNumber(array('required'=>true)),
				'longitude' => new sfValidatorNumber(array('required'=>true)),
		    'mapType' => new sfValidatorChoice(array('choices' => array_keys(self::$mapTypes))),

      ));
    
    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}
