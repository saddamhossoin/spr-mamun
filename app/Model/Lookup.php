<?php
App::uses('AppModel', 'Model');
/**
 * Lookup Model
 *
 */
class Lookup extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $actsAs = array('Tree');
}
