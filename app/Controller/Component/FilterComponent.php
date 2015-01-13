<?php 
App::uses('Component', 'Controller');

class FilterComponent extends Component {
 
/**
 * Gineral Filter function
 *
 */
 function gfilter($data,$modelsname)
 {
    $conditions = '';
		if(!empty($data))
		{
		 	 App::import( 'Helper', 'Time' );
            $time = new TimeHelper;
			 
 			if(isset($data[$modelsname]['modified']) && !empty($data[$modelsname]['modified'] )&& empty($data[$modelsname]['modified1']) )
			{
				$conditions .=  '('.$time->daysAsSql(($data[$modelsname]['modified'])?$data[$modelsname]['modified']:$data[$modelsname]['modified'], ($data[$modelsname]['modified'])?$data[$modelsname]['modified']:$data[$modelsname]['modified'], "$modelsname.modified").')';
			}
			
			if(isset($data[$modelsname]['modified1']) && !empty($data[$modelsname]['modified1'] )&& empty($data[$modelsname]['modified']) )
			{
				$conditions .=  '('.$time->daysAsSql(($data[$modelsname]['modified1'])?$data[$modelsname]['modified1']:$data[$modelsname]['modified1'], ($data[$modelsname]['modified1'])?$data[$modelsname]['modified1']:$data[$modelsname]['modified'], "$modelsname.modified").')';
			}
			
 			if(isset($data[$modelsname]['modified1']) && !empty($data[$modelsname]['modified1']) && !empty($data[$modelsname]['modified']) )
			{
 				$conditions .=  '('.$time->daysAsSql(($data[$modelsname]['modified'])?$data[$modelsname]['modified']:$data[$modelsname]['modified'], ($data[$modelsname]['modified1'])?$data[$modelsname]['modified1']:$data[$modelsname]['modified1'], "$modelsname.modified").')';
  			}
			
			
			if(!empty($data[$modelsname]['modifyedby']) && (!empty($data[$modelsname]['modified1']) || !empty( $data[$modelsname]['modified'])))
				{
					$conditions .= " AND ";
				}
				if(!empty($data[$modelsname]['modifyedby']))
				{
					$conditions .= "$modelsname.modified_by ='".$data[$modelsname]['modifyedby']."'";
				}
			
   		}
			return $conditions;	
	}
	
	public function searchlimit( $data = null ,$modelsname = null )
	{
 		if(!empty($data))
			{
				return $data[$modelsname]['ShowPerPage']=$data[$modelsname]['ShowPerPage']	;
			}
			else
			{
				return 20;
			}
 	}	
	
	public function sortoption( $data = null ,$modelsname = null)
	{
	
		if(!empty($data[$modelsname]['sortby']))
		{
			 return array($data[$modelsname]['sortby']=>$data[$modelsname]['sortoption'])	;
		}
		else
		{
			return	array($modelsname.'.modified'=>'desc');
		}
	}	
}