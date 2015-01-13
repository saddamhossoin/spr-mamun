<?php
App::uses('AppModel', 'Model');
/**
 * Barcode Model
 *
 */
class Barcode extends AppModel {


public $belongsTo = array(
		'PosPcategory' => array(
			'className' => 'PosPcategory',
			'foreignKey' => 'pos_pcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		);

}
