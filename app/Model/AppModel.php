<?php 
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. 
 * 
 * @package       app.Model
 */
App::uses('Model', 'Model');
App::uses('Sanitize', 'Utility');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
// 

//==================== Transation Ledger Entry ================
 public function saveTransaction( $option = array()){
	 	parent::create();
  	 if(parent::save($option)){
		 return true;
	 }else{
		 return false;
	 }
 
 } 
 	
 //===================== Manage Jurnal Id ================
 public function manageJurnalId( $key = null){
 
 	// PV = Purchase Voucher
	//SP = Supplier Payment
	
 	 $list = parent::find('first',array('fields'=>array('id','jurnalNumber'),'conditions'=>array('jurnalNumber like'=>"$key%"),'order'=>array('id'=>'desc')));
	 if(empty($list)){
	 	return 1;
	 }else{
		return substr( $list['AccountsLedgerTransaction']['jurnalNumber'], 2 , 7)+1;
	}

	 
 }
 
 
 //================= Before Save ==========================
    public function beforeSave($options = array()) {
		$userid = 0;
		if(isset($_SESSION['Auth']['User']['id'])){
			$userid = $_SESSION['Auth']['User']['id'];
		 }
 		$exists = $this->exists();
		if ( !$exists && $this->hasField('created_by') && empty($this->data[$this->alias]['created_by']) ) {
 				$this->data[$this->alias]['created_by'] =$userid;//$_SESSION['Auth']['User']['id'];
		}
		 if ( $this->hasField('modified_by') && empty($this->data[$this->alias]['modified_by']) ) {
		 	$this->data[$this->alias]['modified_by'] =$userid;// $_SESSION['Auth']['User']['id'];
		} 
		 if ( $this->hasField('title') && !empty($this->data[$this->alias]['title']) ) {
			 	$this->data[$this->alias]['title'] = Sanitize::clean($this->data[$this->alias]['title'], array('encode' => false));
	 	} 
	 	return true;
    }
	 
	
 
    
    /**
     * Returns the enum values of the column specified
     * 
     * @param string $column - Name of the table column that is of enum type
     * @return array 
     */
    public function getEnumValues( $column ) {
        // get column type
        $type = $this->getColumnType($column);
        
        // extract values in single quotes separated by comma
        preg_match_all("/'(.*?)'/", $type, $enums);
        
        $rtrn = array();
        if( is_array($enums[1]) ) {
	        foreach( $enums[1] as $index => $val ) {
	        	$rtrn[$val] = $val;
	        }
        }
         return $rtrn;
    }
	  
	  
	  //================== Custom Find List Function =====================
	  
       public function findList($type, $options = array()) {
        switch ($type) {
            case 'superlist':
                if(!isset($options['fields']) || count($options['fields']) < 3) {
                    return parent::find('list', $options);
                }
                 if(!isset($options['separator'])) {
                    $options['separator'] = ' ';
                }
                 $options['recursive'] = -1;              
                $list = parent::find('all', $options);
 
                for($i = 1; $i <= 2; $i++) {
                    $field[$i] = str_replace($this->alias.'.', '', $options['fields'][$i]);               
                }           
                 return Set::combine($list, '{n}.'.$this->alias.'.'.$this->primaryKey,
                                 array('%s'.$options['separator'].'%s',
                                       '{n}.'.$this->alias.'.'.$field[1],
                                       '{n}.'.$this->alias.'.'.$field[2]));
            break;                      
 
            default:              
                return parent::find($type, $options);
            break;
        }
    } 
	
	public function unbindModelAll() {
       $unbind = array();
       foreach ($this->belongsTo as $model=>$info)
       {
         $unbind['belongsTo'][] = $model;
       }
       foreach ($this->hasOne as $model=>$info)
       {
         $unbind['hasOne'][] = $model;
       }
       foreach ($this->hasMany as $model=>$info)
       {
         $unbind['hasMany'][] = $model;
       }
       foreach ($this->hasAndBelongsToMany as $model=>$info)
       {
         $unbind['hasAndBelongsToMany'][] = $model;
       }
       parent::unbindModel($unbind);
	} 
	
	function createSlug ($string, $id=null) {
			$slug = Inflector::slug (strtolower($string),'-');
			//$slug = low ($slug);
			$i = 0;
			$params = array ();
			$params ['conditions']= array();
			$params ['conditions'][$this->name.'.slug']= $slug;
			if (!is_null($id)) {
				$params ['conditions']['not'] = array($this->name.'.id'=>$id);
			}
			while (count($this->find ('all',$params))) {
				if (!preg_match ('/-{1}[0-9]+$/', $slug )) {
					$slug .= '-' . ++$i;
				} else {
					$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
				}
				$params ['conditions'][$this->name . '.slug']= $slug;
			}
			return $slug;
		}
	
	
	
	
}?>