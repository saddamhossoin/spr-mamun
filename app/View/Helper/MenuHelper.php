<?php

class MenuHelper extends AppHelper {
 
	/**
	 * Current page in application
	 *
	 * @var string
	 */
	protected $selected = '';
 
	/** Internal variable for the data
	 *
	 * @var array
	 */
	protected $array = array();
 
	/**
	 * Default css class applied to the menu
	 *
	 * @var string
	 */
	protected $menuClass = 'menu';
 
	/**
	 * Default DOM id applied to menu
	 *
	 * @var string
	 */
	protected $menuId = 'top-menu';
 
	/**
	 * CSS class applied to the selected node and its parent nodes 
	 *
	 * @var string
	 */
	protected $selectedClass = 'selected';
 
	/**
	 * CSS class applied to the exact selected node in the tree - in addition to $selectedClass
	 *
	 * @var unknown_type
	 */
	protected $selectedClassItem = 'item-selected';
 
	/**
	 * Default Slug
	 *
	 * @var string
	 */
	protected $defaultSlug = 'home';
 
	/**
	 * Type of menu to be generated:
	 * 'tree' - to generate a complete tree
	 * 'context' - to only render the specific barnch under the current page
	 *
	 * @var string
	 */
	protected $type = 'tree';
 
	/**
	 * Model name used in $array e.g. $data[0]['Article']['name']
	 *
	 * @var string
	 */
	protected $modelName = 'Menu';
 
	/**
	 * Database column name - (i.e. a shorter version of the name / title for use only in naviagtion)
	 * e.g. A page called 'Welcome to the giant flea circus' 
	 * might be set to show up on navigation as 'home'
	 *
	 * @var string
	 */
	protected $titleForNavigation = 'title_for_navigation';
 
	/**
	 * Database column name for title / name
	 * @var string
	 */
	protected $title = 'name';
 
	/**
	 * Database column name for complete page slug e.g. /about/history/early-years
	 *
	 * @var string
	 */
	protected $slugUrl = 'url';
 
	/**
	 * Database column name for redirect_url for instance if /about/blog redirects to http://blog.somewebsite.com
	 *
	 * @var string
	 */
	protected $redirectUrl = 'url';
 
	/**
	 * Target for redirect (see redirectUrl)
	 *
	 * @var string
	 */
	protected $redirectTarget = 'redirect_target';
 
	/**
	 * Minumum number of items required to render a context menu
	 *
	 * @var int
	 */
	protected $contextMinLength = 2;
 
	/**
	 * Internal Counter used in type: 'context'
	 *
	 * @var int
	 */
	protected $li_count = 0;
 
	/**
	 * Internal flag to see if the page has been matched to an item
	 *
	 * @var bool
	 */
	protected $matched = false;
 
	/**
	 * Internal counter
	 *
	 * @var int
	 */
	protected $i = 0;
 
	/**
	 * Enter description here...
	 *
	 * @var unknown_type
	 */
	protected $rootNode = '';
 
	public function __construct(View $View, $settings = array()){
		// Configure::write('debug', 2);

 
	}
 
	public function setOption($key, $value){
		$this->{$key} = $value;
	}
 
	public function getOption($key){
		return $this->{$key};
	}
 
	/**
	 * Setup the helper and return a string to echo
	 *
	 * @param array $array Data array containing the lists
	 * @param array $config Configuration variables to override the defaults
	 * @return string
	 */
	public function setup($array, $config = array()){
 
		// update and override the default variables 
		if(!empty($config)){
			foreach ($config as $key => $value) {
				$this->setOption($key, $value);
			}
		}
 
		// set the default slug selected if the current page does not match
		if($this->selected == '/'){
			$this->selected = $this->defaultSlug;
		}
 
		$this->array = $array;
 
 
 
		// get the root node of the selected tree if this a context menu
		if($this->type == 'context'){
			$this->rootNode = $this->getRootNode($this->selected);
		}
 
		$str = $this->buildMenu();
 
		// if the current page has matched one of the links in the tree
		// then get rid of the 'default_slected' placeholder
		if($this->matched == true){
			$str = str_replace('default_selected', '', $str);
		} else {
			$s = ' class="' . $this->selectedClass . '" ';
			$str = str_replace('default_selected', $s, $str);
		}
 
		// if this is a context menu, it looks daft if it only has 1 item 
		// if this is the case hide it
		if($this->type == 'context'){
			if($this->li_count < $this->contextMinLength){
				$str = '';
			}
		}
 
 
		return $this->output($str);	
 
	}
	/**
	 * Call the menu iterator method and if it returns a string warp it up in a UL
	 *
	 * @return string
	 */
	protected function buildMenu(){
 
		$str = $this->menuIterator($this->array);
 
		if($str != ''){
			$str = '<ul  id="' . $this->menuId . '" class="' . $this->menuClass . '">' . $str . '</ul>';
		}
 
		return $str;
	}
 
	/**
	 * Explode a url slug and get the root page
	 *
	 * @param string $string 
	 * @return string
	 */
	protected function getRootNode($string){
			$rootNode = '';
			if($string != ''){
				$node = explode('/', $string);
				// $node[0] will always be empty becuase the first char of $this->selected will always be '/'
				$rootNode = $node[1];
			}
			return $rootNode;
	}
 
 
	/**
	 * Recursive method to loop down through the data array building menus and sub menus
	 *
	 * @param array $array
	 * @param int $depth
	 * @return string
	 */
	protected function menuIterator($array){
 
		$str = '';
		$is_selected = false;
 				 
		foreach($array as $var){
 
			$continue = true;
			$selected = '';
			$sub = '';
 
			if($this->type == 'context' && ($this->getRootNode($var[$this->modelName][$this->slugUrl]) != $this->rootNode)){
				$continue = false;
			}
 
			if($continue == true){
 
				// if this is the first list item set default_selected placeholder
				$default_selected = '';
				if($this->i == 0){
					$this->i = 1;
					$default_selected = 'default_selected';
				}
 
 
 
				if(!empty($var['children'])){
					$sub .= '<ul>';
					$sub .= $this->menuIterator($var['children']);
					$sub .= '</ul>';	
				}
 
				$p = strpos($this->selected, $var[$this->modelName][$this->slugUrl]);
 
 
				if($p === false){
 
				} elseif($p == 0){
						// this is the selected item or a parent node of the selected item
						$selected = ' class="' . $this->selectedClass . '" ';
						$is_selected = true;
						$this->matched = true;
				}
 
				if($this->selected == $var[$this->modelName][$this->slugUrl]){
					// this is the exact selected item
					$selected = ' class="' . $this->selectedClass . ' ' . $this->selectedClassItem . '" ';
				}
 
				// keep track if this is a contextual menu 
				if($this->type == 'context'){
					$this->li_count++;
				}
 
 
				// Get the name / title to be used for the link text
				$name = $this->getName($var);
				// Get the URL / target for the link
				$url = $this->getUrl($var);
 
 				$sliceurl = explode("/",$url['url']);
				 if($sliceurl[0] =='#' )
					{
						$sliceurl[1]='#';
					}
				$sliceurl[0] = Inflector::underscore($sliceurl[0]);
 				$actual =$sliceurl[0].":".$sliceurl[1];
			 
  				$urlstart =$sliceurl[0].":*";
 				if( in_array($urlstart,$_SESSION['Permissions'])){
  				$str .= '<li ' . $selected . ' ' . $default_selected . '>';
					$str .= '<a  href="' .$this->request->webroot.''.$url['url'] . '" ' . $url['url'] . '>' . $name . '</a>';
					$str .= $sub;
				$str .= '</li>';
				}
				
				else if( in_array($actual,$_SESSION['Permissions'])){
					 
				$str .= '<li ' . $selected . ' ' . $default_selected . '>';
					$str .= '<a  href="' .$this->request->webroot.''.$url['url'] . '" ' . $url['url'] . '>' . $name . '</a>';
					$str .= $sub;
				$str .= '</li>';
				}
		
			 else if( $url['url'] == "#"){
				$str .= '<li ' . $selected . ' ' . $default_selected . '>';
					$str .= '<a  href="'.$url['url'] . '" ' . $url['url'] . '>' . $name . '</a>';
					$str .= $sub;
				$str .= '</li>';
				}

 
			}
		}
		 
		return $str;
	}
	/**
	 * Look in the data and check if this is a straight url
	 * or whether it is actually a redirect
	 *
	 * @param array $var
	 * @return array
	 */
	protected function getUrl($var = null){
			$url = array();
 
			if(isset($var[$this->modelName][$this->redirectUrl]) && !empty($var[$this->modelName][$this->redirectUrl])){
				$url['url'] = $var[$this->modelName][$this->redirectUrl];
				if(isset($var[$this->modelName][$this->redirectTarget]) && !empty($var[$this->modelName][$this->redirectTarget])){
					$url['target'] = ' target="' . $var[$this->modelName][$this->redirectTarget] . '" ';
				}
			} else {
				$url['url'] = $var[$this->modelName][$this->slugUrl];
				$url['target'] = '';
			}
			return $url;
	}
 
	/**
	 * See if there is a title_for_navigation 
	 *
	 * @param array $var
	 * @return string
	 */
	protected function getName($var){
		if(isset($var[$this->modelName][$this->titleForNavigation]) && !empty($var[$this->modelName][$this->titleForNavigation])){
			$name = $var[$this->modelName][$this->titleForNavigation];
		} else {
			$name = $var[$this->modelName][$this->title];
		}
		return $name;
	}
 
 
 
}
?>