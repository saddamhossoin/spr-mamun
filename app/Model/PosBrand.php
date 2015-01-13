<?php
class PosBrand extends AppModel {
	var $name = 'PosBrand';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'PosProduct' => array(
			'className' => 'PosProduct',
			'foreignKey' => 'pos_brand_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
