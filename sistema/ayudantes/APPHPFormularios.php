<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * @category   
 * @package    sistema/ayudantes
 * @copyright  Copyright (c) 2006 - 2014 webcol.net (http://www.webcol.net/calima)
 * @license	https://github.com/webcol/Calima/blob/master/LICENSE	MIT
 * @version	##BETA 1.0##, ##2014 - 2015##
 * <http://www.AgilPhp.com>.
 */

// se agradece a ArrayZone por el aporte de esta clase

 /**
 * @name Form Generator for Kernel Web
 * @version A.1.0
 * @copyright ArrayZone 2014
 * @license AZPL or later; see License.txt or http://arrayzone.com/license
 * @category plugin
 * 
 * Description: This script write a FORM HTML automatically from array (it will be generated trhoug functions).
 * It write any type of items basics of HTML4 and some of HTML5.
 * Once user clic "submit", all information  will be validated via PHP
 * Some types like "required" and "email" validated trhough PHP to avoid problems with navigator compatibilities or hacker attacks
 *
 * NEXT VERSION: If you can use JavaScript and have JQuery implemented, the form can write JavaScript code to validate all
 * Read the documentation for all information in kernel.arrayzone.com
 * or all coments of all parameters and functions.
 * 
 * IMPORTANT: If you use a specific system to get POST and GET, you have to edit "private function getData()"
 * IMPORTANT 2: If you use DISABLE, control it manually when you save it
 * IMPORTANT 3: Currently aren't supported array names (name="MyField[]"), you can use: name="MyField_1"
 */

 
 
namespace sistema\ayudantes;

class APPHPFormularios
{
	/*
	 * Form configuration. It don't need description
	 */
	public $method = 'post'; // post / get (CAUTION!!: Case sensitive)
	public $action = '';
	public $name = '';
	public $on_submit = '';
	public $id = '';
	public $class = '';
	
	/**
	 * Logging control
	 * @logErrors boolean If is true, $errors will store errors
	 * @errors string Contain al errors
	 */
	public $logErrors = true;
	public $errors = '';
	
	/*
	 * Other configurations about form
	 */
	
	/**
	 * @show_labels boolean
	 * @tutorial If is true, it show label text of some inputs before input tag
	 */
	public $show_labels = true;
	
	/** IN DEVELOPMENT
	 * @self_show boolean
	 * @tutorial if is true, it show the input when function addX is called
	 */
	//public $self_show = false;
	
	
	/** IN DEVELOPMENT
	 * @only_show boolean
	 * @tutorial If is true, it don't save the configuration to input (so showForm() and validateData() don't work)
	 */
	//public $only_show = false;

	
	/*
	 * Content
	 * It can be set manually or automatically trhough functions
	 */
	public $content = array();
	
/*
 * Start functions
 */
	
	/**
	 * @name showArray
	 * @tutorial This function show array result, it can be copied and you can replace all generator functions to this array
	 * @example $fg->showArray();
	 */
	public function showArray($array = false) {
		print_r($this->content);
	}
	
	
	/**
	 * @name showForm
	 * @tutorial This function generate the form
	 * @example $fg->showForm();
	 */
	public function showForm() {
		// Loading all arrays
		$toShow = $this->content;
		
		// Showing form
		echo $this->showStartForm();
		
		
		// Itearate all inputs
		foreach ($toShow as $input) {
			// Reading data
			if (isset($input['data'])) $data = $input['data'];
			
			// New row
			echo '<div>';
				// Showing labels
				if ($this->show_labels) {
					echo '<div>';
						if (isset($input['label']) and $input['label'] != '') echo $input['label'];
					echo '</div>';
				}
				
				// Showing content
				echo '<div>';		
					switch ($input['type']) {
						case 'input':
							echo $this->showInput($data);
							break;
						case 'radio':
							echo $this->showRadio($data, $input['values'], $input['selected']);
							break;
						case 'select';
							echo $this->showSelect($data, $input['values'], $input['selected']);
							break;
						case 'textarea':
							echo $this->showTextArea($input['text'], $data);
							break;
						case 'separator';
							echo '<br />';
							break;
					}
				echo '</div>';
			echo '</div>'.PHP_EOL;
		}
		
		// Closing form
		echo $this->showEndForm();
	}
	
	
	/* 
	 * The following "showX" functions are autoloaded and show the different parts of form
	 */ 
	
	/**
	 * @name showInput
	 * @tutorial This function show <input> tag with parameters specifics
	 * @param array $data All data to show in the input
	 * @return string
	 */
	private function showInput($data) {
		$r = '';
		// Number start if is range
		if ($data['type'] == 'range' and isset($data['min'])) $r .= $data['min'] . ' '; 
		
		$r .= '<input ';
		
		// Reading value sended by user, if are any, we load it temporaly to show in form
		$data['value'] = $this->getData($data['name'], $data['value']);
		
		// Asignamos las claves conviritiendo el array
		foreach ($data as $attr=>$value) {
			$r .= $attr.'="'.$value.'" ';
		}
		
		$r .= '/>';
		
		// Number end if is range
		if ($data['type'] == 'range' and isset($data['max'])) $r .= $data['max'] . ' ';
		
		// Return
		return $r;
	}
	
	private function showRadio($data, $values, $selected) {		
		// Primero generamos un esquema
		$base = '<label><input type="radio"';
		
		// Asignamos las claves conviritiendo el array
		foreach ($data as $attr=>$value) {
			$base .= $attr.'="'.$value.'" ';
		}
		
		
		// Leemos el valor enviado por el usuario (si lo hay) y si hay, reemplazamos $select por el valor 
		$selected = $this->getData($data['name'], $selected);

		//echo $sendValue;
		// Si no tiene m�ltiples valores (es un string), lo retornamos de golpe 
		if (!is_array($values)) {
			// Comprobamos el value, es posible que el usuario este intentando crear los Radio (option) de forma separada
			if (!is_array($values) and $selected == $values) $base .= ' checked="checked" ';
			return $base . ' value="'.$values.'" />';
		} 

		// Por el contrario, tenemos 1 o m�s value con lo que es un posible texto
		// Ahora preparamos todos los input
		$r = '';
		foreach ($values as $id=>$text) {
			$r .= $base;
			if ($selected !== null and $id == $selected) $r .= ' checked="checked" ';
			$r .= ' value="'. $id .'" />'.$text.'</label>';
		}
		
		return $r;
		
	}
	
	/**
	 * @name showSelect
	 * @tutorial This function show <select> tag with all values
	 * @param array $data All data to show in the input
	 * @param array $values Values to show in select
	 * @param string $selected Specify selected option
	 * @return string
	 */
	private function showSelect($data, $values, $selected = null) {
		$r = '<select ';
			// Convert array to input string
			foreach ($data as $attr=>$value) {
				$r .= $attr.'="'.$value.'" ';
			}
			// Return end input
		$r .= '>';
		
		// Leemos el valor enviado por el usuario (si lo hay) y si hay, reemplazamos $select por el valor
		$selected = $this->getData($data['name'], $selected);
		
		
		// Loading options
		// To speed up processes, we have two whiles depending if are any selected value
		if ($selected != '') {
			foreach ($values as $val=>$txt) {
				$r .= '<option value="' . $val . '"';
					if ($val == $selected) $r .= ' selected ';
				$r .= '>' . $txt . '</option>';
			}
		} else {
			foreach ($values as $val=>$txt) {
				$r .= '<option value="' . $val . '">' . $txt . '</option>';
			}	
		}
		
		return $r . '</select>';
	}
	
	/**
	 * @name showTextArea
	 * @tutorial This function show <textarea> tag with all values
	 * @param array $data All data to show in the input
	 * @return string
	 */
	private function showTextArea($text, $data) {
		$r = '';
		$r .= '<textarea ';
		
		// Asignamos las claves conviritiendo el array
		foreach ($data as $attr=>$value) {
			$r .= $attr.'="'.$value.'" ';
		}
		
		$r .= '>';
		// Reading value sended by user, if are any, we load it temporaly to show in form
		$r .= $this->getData($data['name'], $text) . '</textarea>';

		// Return
		return $r;
	}
	
	/**
	 * @name showStartForm This function return the start part of the form
	 * @return string
	 */
	private function showStartForm() {
		$r = '<form ';
		if ($this->action!= '') $r .= 'action="'.$this->action.'" ';
		if ($this->method != '') $r .= 'method="'.$this->method .'" ';
		if ($this->name != '') $r .= 'name="'.$this->name .'" ';
		if ($this->on_submit != '') $r .= 'onSubmit="'.$this->on_submit  .'" ';
		if ($this->id != '') $r .= 'id="'.$this->id .'" ';
		if ($this->class != '') $r .= 'class="'.$this->class .'" ';
	
		return $r . '>'.PHP_EOL;
	}
	
	/**
	 * @name showEndForm This show the end of the form
	 * @return string
	 */
	private function showEndForm() {
		return '</form>';
	}
	
	
	/*
	 * VALIDATORS
	 */
	/**
	 * @name validate
	 * @tutorial this function validate items sends trhough form. It DON'T FILTER
	 * 	Basically simulate HTML5 trhoguh PHP for full compatibility
	 * @param boolean $error_list If is true, it generate in $this->error_list a list with data required 
	 */
	public function validate() {
		$this->error_list = ''; // Clean error list
		$total = 0; // Total counted params
		$success = 0; // Total correct
		
		// load all inputs
		$params = $this->content;
		
		// reading all inputs
		foreach ($params as $param) {
			++$total;
			
			// Skip separators and bad generated arrays
			if (!isset($param['data'])) {
				++$success;
				continue;
			}
			
			// Start validation
			$data = $param['data'];
			
			// Checking type input
			switch ($param['type']) {
				
				case 'input':
					$success += $this->validateInput($param['data']);
					break;
				case 'radio':
					$success += $this->validateRadio($param);
					break;
				case 'select':
					$success += $this->validateSelect($param);
					break;
				default:
					$success++;
			}
		}
		
		if ($success >= $total) return true;
		return false;
	}
	
	/**
	 * @name validateInput
	 * @tutorial This function test if an input (text, password, checkbox, ...) is valid depending assigned values
	 * If you need other that is not invented, you can use "pattern" for example
	 * It checks:
	 * 	- required
	 *  - date
	 *  - min
	 *  - max
	 *  - number
	 * @param array $data Contains all information about input
	 * @return boolean If return true, its okay
	 */
	private function validateInput($data) {
		// Obtaining value send by user
		$readValue = $this->getData($data['name']);

		// Empty/not send and required?
		// TODO: Add require --> file (uses $_FILE)
		
		if (isset($data['required']) and ($readValue === null or $readValue == '')) {
			$this->log('is required', $data);
			return false;
		} elseif ($readValue == '') {
			return true;
		}
		
		// Checking type input
		switch ($data['type']) {
			case 'text':
				// Maxlenght fail
				if (isset($data['maxlength']) and is_numeric($data['maxlength']) and $data['maxlength'] > -1 
					and strlen($readValue) > $data['maxlength']) {
					
					$this->log('is too long. Maximum' . ' ' . $data['maxlength'] . ' ' . 'characters', $data );
					return false;
				}
				
				if (isset($data['pattern']) and is_numeric($data['pattern']) and $data['maxlength'] != '' 
					and preg_match($data['pattern'], $readValue) === FALSE) {
					
					$this->log('pattern error' . ' (' . $data['pattern'] . ')' , $data);
					return false;
				}
				break;
			case 'number':
			case 'range':
				// IS NUMERIC
				if ($readValue != '' and !is_numeric($readValue)) {
					$this->log('Not numeric', $data);
					return false;
				}
				
				// MIN
				if (isset($data['min']) and $readValue < $data['min']) {
					$this->log('The number have to be greather than' . ' ' . $data['min'].'.', $data);
					return false;
				}
				
				// MAX
				if (isset($data['max']) and $readValue > $data['max']) {
					$this->log('The number have to be less than' . ' ' . $data['max'].'.', $data);
					return false;
				}
				
				// STEP http://www.w3schools.com/tags/att_input_step.asp
				// Value 0 ever is valid (and if you try Divide to Zero, it will take error because the result is inifinite
				if (isset($data['step']) and $readValue != 0 and $readValue % $data['step'] !== 0) {
					$this->log('The number have to be multiple of' . ' ' . $data['step'].'.', $data);
					return false;
				}
				
				break;
			case 'date';
				//min | max
				echo $readValue;
				if (!is_date($readValue)) {
					$this->log('The date' . ' ' .$readValue.' '. 'must have format' . ' mm/dd/yyyy '.'.', $data);
					return false;
				}
				break;
				
			case 'email':
				if (!filter_var($readValue, FILTER_VALIDATE_EMAIL)) {
					$this->log('Email invalid', $data);
					return false;
				}
			case 'file':
				//accept="image/*" (http://www.w3schools.com/tags/att_input_accept.asp)
				break;
			
			case 'url':
				if (!filter_var($readValue, FILTER_VALIDATE_URL)) {
					$this->log('Invalid url', $data);
					return false;
				}
				break;	
		}
		// Validamos el resto como cierto (no podemos parametrizar el 100 % de cosas nuevas que salgan de HTML)
		return true;
	}
	
	/**
	 * @name validateArray
	 * This functions validate an Array, is a complement to validateRadio, select...
	 * @param array/string $values List of values to validate
	 * @param array/string $value/s selecteds by user 
	 */
	private function validateArray($values, $value, $data = array()) {
		if (is_array($values)) {
			// Is array (serach all "$value" in "$values"
			if (!array_key_exists($value, $values)) {
				if (is_array($value)) {
					$this->log('Values don\'t match.', $data);
				} else {
					$this->log('ID ' .$value.' ' . 'don\'t match', $data);
				}
				return false;
			}
		} else {
			// Is string
			if ($readValue == $values) {
				$this->log('The value' . ' ' . $value.' ' . 'is not available', $data);
				return false;
			}
		}
		
		return true;
	}
	
	
	/**
	 * @name validateRadio
	 * @tutorial This function test if an radio is valid depending assigned values
	 * @param array $data Contains all information about input
	 * @return boolean If return true, its okay
	 */
	private function validateRadio($params) {
		$data = $params['data'];
		// Obtaining value send by user
		$readValue = $this->getData($data['name']);
		
		// Is required?
		if (isset($data['required']) and ($readValue === null or $readValue == '')) {
			$this->log('is required', $data);
			return false;
		} elseif ($readValue == '') {
			return true;
		}
		
		
		// Seleccionamos que tipo de analisis (dependiendo si se ha creado como input o como radio)
		// Esto no deberia estar aqui porque no es necesario, pero esta hecho por posibles despistes de usuarios finales
		if (isset($params['values'])) {
			return $this->validateArray($params['values'], $readValue, $data);
		} elseif ($data['value']) {
			// If user try to add radio like normal input... (into 'value' in index data)
			return $this->validateArray($params['value'], $readValue, $data);
		}
		
		return false;
	}
	
	/**
	 * @name validateSelect
	 * @tutorial This function test if an select is valid depending assigned values
	 * @param array $data Contains all information about input
	 * @return boolean If return true, its okay
	 */
	private function validateSelect($param) {
		$data = $param['data'];
		// Obtaining value send by user
		$readValue = $this->getData($data['name']);
	
		// Is required?
		if (isset($data['required']) and ($readValue === null or $readValue == '')) {
			$this->log('is required', $data);
			return false;
		} elseif ($readValue == '') {
			return true;
		}
	
		// Seleccionamos que tipo de analisis (dependiendo si se ha creado como input o como radio)
		// Esto no deberia estar aqui porque no es necesario, pero esta hecho por posibles despistes de usuarios finales
		return $this->validateArray($param['values'], $readValue, $data);
	}
	
	
	/**
	 * @name getData This function get value from POST/GET trhough ID ($key)
	 * 	If you use other system to load GET and POST, you have to edit this
	 * @param string $key Object Index
	 * @param string $default Default item if not data
	 * @return string/null Return the value, if don't exist, return null
	 */
	private function getData($key, $default = null) {
		if ($this->method == "post") return isset($_POST[$key]) ? $_POST[$key] : $default;
		else return isset($_GET[$key]) ? $_GET[$key] : $default;
	}
	
	/*
	 * Array constructors
	 * This functions will be called to self construct array easy
	 */
	
	/**
	 * @name separator
	 * @tutorial This function add separation (<hr/>) between parts
	 */
	public function addSeparator() {
		$this->content[] = array('type' => 'separator');
	}
	
	/**
	 * @name addInput
	 * @tutorial This class generate a generic INPUT
	 * @param string $label If is not empty, it show a text "label" with the text
	 * @param string $type Specify input type. It will be validated once use validate();
	 * Types that are current supported to validate:
	 * 		text, password, hidden, file
	 * 		Its supported use ALL type supported (http://www.w3schools.com/tags/att_input_type.asp), 
	 * 	Some type input you can declare directly via functions (afther this function are more)
	 * @param string $name Element name
	 * @param string $value Element value
	 * @param string $required Element required?
	 * @param array $attributes Optional atributes not listened (in array).
	 * 		EX: You like use "date", then you can put array('min' => '1979-12-31', 'max' => '2000-01-02')
	 * 		All parameters currently working: min, max (date and number), pattern,   
	 * 
	 * @example $fr->addInput('text', 'Username', '', true, 'Type here your username', array('class'=>'text red', id => 'text1'), array())
	 */
	public function addInput($label = '', $type = 'text', $name = '', $value = '', $required = false, $placeholder = '',  $attributes = array()) {
		// Creating main data
		$data = array(
			'type' => $type,
			'name' => $name,
			'value' => $value,
		);
		
		
		if ($required) $data['required'] = 'required';
		if ($placeholder != '') $data['placeholder'] = $placeholder;
		if (!empty($attributes)) array_merge($data, $attributes);
		
		
		// Saving data to object
		$content = array(
			'type' => 'input',
			'data' => $data	
		);
		if ($label != '') $content['label'] = $label;
		 
		$this->content[] = $content;
	}
	
	/**
	 * @name addNumber This function add input "number" and "date" with min, max and step (if you like)
	 * @param string $label If is not empty, it show a text "label" with the text
	 * @param string $name Element name
	 * @param string $value Default value
	 * @param boolen $range If is true, then show "range" instead of text with number
	 * @param boolen $required Is required?
	 * @param number $min Minium value. Empty nothing
	 * @param number $max Max value. Empty nothing
	 * @param number $step Step (multiply). Empty nothing (ex: step 2: -2, 0, 2, 4 ...)
	 * @param string $placeholder Default text to show if box is empty
	 * @param unknown $attributes Additional attributes
	 */
	public function addNumber($label = '', $name = '', $value = '', $range = false, $required = false, $min = '', $max = '', $step = '',  $placeholder = '',  $attributes = array()) {
		// Creating main data
		$data = array(
			'type' => (! $range) ? 'number' : 'range',
			'name' => $name,
			'value' => $value,
		);
	
		
		if ($required) $data['required'] = 'required';
		if ($min) $data['min'] = $min;
		if ($max) $data['max'] = $max;
		if ($step) $data['step'] = $step;
		if ($placeholder != '') $data['placeholder'] = $placeholder;
		if (!empty($attributes)) array_merge($data, $attributes);
	
		// Saving data to object
		$content = array(
			'type' => 'input',
			'data' => $data
		);
		if ($label != '') $content['label'] = $label;
		
		$this->content[] = $content;
	}

	/**
	 * @name addDate This function add input "number" with min, max and step (if you like)
	 * @param string $label If is not empty, it show a text "label" with the text
	 * @param string $name Element name
	 * @param string $value Default value
	 * @param string $required Is required?
	 * @param string $min Minium value. Empty nothing
	 * @param string $max Max value. Empty nothing
	 * @param string $step Step (multiply). Empty nothing (ex: step 2: -2, 0, 2, 4 ...)
	 * @param string $placeholder Default text to show if box is empty
	 * @param unknown $attributes Additional attributes
	 */
	public function addDate($label = '', $name = '', $value = '', $required = false, $min = '', $max = '', $step = '',  $placeholder = '',  $attributes = array()) {
		// Creating main data
		$data = array(
			'type' => 'date',
			'name' => $name,
			'value' => $value,
		);
	
		if ($required) $data['required'] = 'required';
		if ($min) $data['min'] = $min;
		if ($max) $data['max'] = $max;
		if ($step) $data['step'] = $step;
		if ($placeholder != '') $data['placeholder'] = $placeholder;
		if (!empty($attributes)) array_merge($data, $attributes);
	
		// Saving data to object
		$content = array(
			'type' => 'input',
			'data' => $data
		);
		if ($label != '') $content['label'] = $label;
		
		$this->content[] = $content;
	}
	
	
	/**
	 * @name addCheck
	 * @tutorial Use this function to add a checkBox
	 * @param string $label If is not empty, it show a text "label" with the text
	 * @param string $name Check name
	 * @param string $value Check value
	 * @param boolean $required Specify if check is required
	 * @param array $attributes Optional atributes not listened (in array).
	 */
	public function addCheck($label = '', $name = '', $value = '', $required = false, $attributes = array()) {
		$data = array(
			'type' => 'checkbox',
			'name' => $name,
			'value' => $value
		);
		if ($required) $data['required'] = 'required';
		if (!empty($attributes)) array_merge($data, $attributes);
		
		$content = array(
			'type' => 'input',
			'data' => $data 
		);
		if ($label != '') $content['label'] = $label;
		
		$this->content[] = $content;
	}
	
	
	/**
	 * @name addRadio
	 * @tutorial Use this function to add a radio button
	 * @param string $label If is not empty, it show a text "label" with the text
	 * @param string $name Radio button name
	 * @param array $values Contain all radio with values and text to show 
	 * 	EX: array('val1'=>'text1', 'val2'=>'text2'); 
	 * @param string $selected Specify wich option (ID) will be checked by default 
	 * @param boolean $required Specify if radio is required
	 * @param array $attributes Optional atributes not listened (in array). This will be applicated to all radioButton
	 */
	public function addRadio($label = '', $name = '', $values = array(), $selected = null, $required = false, $attributes = array()) {
		if (!is_array($values)) die('FATAL ERROR: Trying to create "RadioButton" with string VALUE, is requried use ARRAY()');
		$data = array(
			'name' => $name,
		);
		
		if ($required) $data['required'] = 'required';		
		if (!empty($attributes)) array_merge($data, $attributes);
		
		
		
		$content = array(
			'type' => 'radio',
			'data' => $data,
			'values' => $values,
			'selected' => $selected
		);
		if ($label != '') $content['label'] = $label;
		
		$this->content[] = $content;
	}
	
	
	/**
	 * @name addSelect
	 * @tutorial Use this function to add a radio button
	 * @param string $label Text to show before input
	 * @param string $name Select name
	 * @param array $values Array('value'=>'text to show')
	 * @param boolean $required Specify if select is required
	 * @param string $id ID Specify ID to manipulate via javascript or CSS
	 * @param array $attributes Optional atributes not listened (in array).
	 */
	public function addSelect($label = '', $name = '', $values = '', $selected = null, $required = false, $multiple = false, $attributes = array()) {
		$data = array(
			'name' => $name,
			'required' => $required,
		);
		if ($required) $data['required'] = 'required';
		if ($multiple) $data['multiple'] = 'multiple';
		if (!empty($attributes)) array_merge($data, $attributes);
		
		
		// In this case, the values are saved in the main of array to speed up select loader
		$content = array(
			'type' => 'select',
			'data' => $data,
			'values' => $values,
			'selected' => $selected
		);
		if ($label != '') $content['label'] = $label;
		
		$this->content[] = $content;
	}
	
	/**
	 * @name addSubmit
	 * @tutorial Use this function to add a submit button
	 * @param string $name Select name (optional, if leav blank it will not send in POST / GET)
	 * @param string $value Text to show in button and ID
	 * @param array $attributes Optional atributes not listened (in array).
	 */
	public function addSubmit($name = '', $value = '', $attributes = array()) {
		$data = array(
			'type' => 'submit',
			'name' => $name,
			'value' => $value
		);
		if (!empty($attributes)) array_merge($data, $attributes);
		
		$this->content[] = array(
			'type' => 'input',
			'data' => $data
		);
		
		
	}
	
	/**
	 * @name addButton
	 * @tutorial Use this function to add a button with "onclick" action (or id/class to call via jquery) 
	 * @param string $value Name to show in button and ID
	 * @param string $onClick Action to load when button is clicked 
	 * @param array $attributes Optional atributes not listened (in array).
	 */
	public function addButton($value = '', $onClick = '', $attributes = array()) {
		$data = array(
			'type' => 'button',
			'value' => $value,
			'onClick' => $onClick
		);
		if (!empty($attributes)) array_merge($data, $attributes);
		
		$this->content[] = array(
			'type' => 'input',
			'data' => $data
		);
	}
	
	
	/**
	 * @name addButton
	 * @tutorial Use this function to add a button with "onclick" action (or id/class to call via jquery)
	 * @param string $value Name to show in button and ID
	 * @param string $onClick Action to load when button is clicked
	 * @param array $attributes Optional atributes not listened (in array).
	 */
	public function addTextArea($label = '', $name = '', $value = '', $required = false, $attributes = array()) {
		// Creating main data
		$data = array(
			'name' => $name,
		);
		
		if ($required) $data['required'] = 'required';
		if (!empty($attributes)) array_merge($data, $attributes);
		
		// Saving data to object
		$content = array(
			'type' => 'textarea',
			'text' => $value,
			'data' => $data	
		);
		if ($label != '') $content['label'] = $label;
		 
		$this->content[] = $content;
	}
	
	/*
	 * OTHER
	 */
	/**
	 * @name log
	 * @tutorial Save a log if is enabled logging
	 * @param boolean $save If is true, save the log
	 * @param string $message Message to log
	 */
	private function log($message, $data = array()) {
		if ($this->logErrors) {
			// Try to get a name (label or name)
			if (class_exists('kw')) {
				if (isset($data['label'])) $this->errors .= 'Found an error in field' . ': "' . $data['label'] . '": ';
				elseif (isset($data['name'])) $this->errors .= 'Found an error in field' . ': "' . $data['name'] . '": ';
			} else {
				if (isset($data['label'])) $this->errors .= 'Found an error in field' . $data['label'] . '": ';
				elseif (isset($data['name'])) $this->errors .= 'Found an error in field' . ': "' . $data['name'] . '": ';
			}
			
			// preparing message
			$this->errors .= ' ' . $message . '.';
			
			// Extra message (title attribute)
			if (isset($data['title']) and $data['title'] != '') $this->errors .= ' | '. 'MESSAGE' .': ' . $data['title'];
			
			$this->errors .= '<br />';
		}
	}
}


/**
 * @author: http://arafatbd.net/post-item/215/php-function-to-check-valid-date/
 * @name is_date The function is_date() validates the date and returns true or false
 * @param $str sting expected valid date format
 * @return bool returns true if the supplied parameter is a valid date
 * otherwise false
 */
// More examples:
// http://us2.php.net/manual/es/function.checkdate.php
function is_date( $str ) {
	// Try to execute date creator
	try {
		$dt = new DateTime( trim($str) );
	} catch( Exception $e ) {
		// If fails, it return false, date is incorrect
		return false;
	}
	
	// Checking date
	$month = $dt->format('m');
	$day = $dt->format('d');
	$year = $dt->format('Y');
	
	// Date is ok
	if (checkdate($month, $day, $year)) {
		return true;
	} else {
		return false;
	}
}