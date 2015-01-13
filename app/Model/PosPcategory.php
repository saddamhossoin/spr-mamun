<?php
class PosPcategory extends AppModel {
	var $name = 'PosPcategory';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'PosProduct' => array(
			'className' => 'PosProduct',
			'foreignKey' => 'pos_pcategory_id',
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
