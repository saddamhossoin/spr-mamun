<?php
class Menu extends AppModel {

	public $displayField = 'name';
	public $actsAs = array('Tree');
	//The Associations below have been created with all possible keys, those that are not needed can be removed
 
	/*public $belongsTo = array(
		'CreatedBy' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ModifiedBy' => array(
			'className' => 'User',
			'foreignKey' => 'modifyed_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	); */
}
?>