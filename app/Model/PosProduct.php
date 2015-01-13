<?php
class PosProduct extends AppModel {
	var $name = 'PosProduct';
	var $displayField = 'name';  
	 
 	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array( 
		'PosCompatibility' => array(
			'className' => 'PosCompatibility',
			'foreignKey' => 'pos_product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PosProductColor' => array(
			'className' => 'PosProductColor',
			'foreignKey' => 'pos_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosBarcode' => array(
			'className' => 'PosBarcode',
			'foreignKey' => 'pos_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Productmod' => array(
			'className' => 'Productmod',
			'foreignKey' => 'pos_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	var $belongsTo = array(
		'PosBrand' => array(
			'className' => 'PosBrand',
			'foreignKey' => 'pos_brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
 		'PosType' => array(
			'className' => 'PosType',
			'foreignKey' => 'pos_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosPcategory' => array(
			'className' => 'PosPcategory',
			'foreignKey' => 'pos_pcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
 	);
	var $hasOne = array(
		'PosStock' => array(
			'className' => 'PosStock',
			'foreignKey' => 'pos_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
		
	);
}
