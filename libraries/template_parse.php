<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */
 
// No direct access to anyone.
defined('_XEXEC') or die;

/**
 * Template Class - Functions for compling templates.
 */
class template_parse {
	/**
	 * Stores the location of the template file
	 * @var string
	 */
	public $template,
	/**
	 * Stores the entries to be parsed in the template
	 * @var array
	 */
	$entries = array();
	/**
	 * Stores the contents of the template file
	 * @var string
	 */
	private $_template;
	/**
	 * Generates markup by inserting entry data into the template file
	 * @param array $extra
	 * @return string
	 */
	 public function generate_markup($extra = array()) {
	 	$this->_load_template();
	 	return $this->_parse_template($extra);
	 }
	/**
	 * Loads a template file with which markup should be formatted
	 * @return string The contents of the template file
	 */
	private function _load_template() {
		/**
		 * Get the path of the template
		 */
		global $template_path;
		// Check for a custom template. Temporary path.
		$template_file = $template_path . $this->template_file;
		if (file_exists($template_file) && is_readable($template_file)) {
			$path = file_get_contents("$template_path/header.php");
			$path .= file_get_contents($template_file);
			$path .= file_get_contents("$template_path/sidebar.php");
			$path .= file_get_contents("$template_path/footer.php");
		// Look for a system template
		} else if (file_exists($default_file=$template_path . 'default.inc') && is_readable($default_file)) {
			$path = $default_file;
		// If the default template is missing, throw an error.
		} else {
			throw new Exception('No default template found');
		}
		// Load the contents of the file and return them
		$this->_template = $path;
	}
	/**
	 * Separates the template into header, loop, and footer for parsing
	 * @param array $extra
	 * @return string
	 */
	 private function _parse_template($extra = '') {
	 	// Create an alias of the template file property to save space
	 	$template = $this->_template;
	 	// Remove any PHP-style comments from the template
	 	$match = array('#<([\?%])=?.*?\1>#s',
			'#<script\s+language\s*=\s*(["\']?)php\1\s*>.*?</script\s*>#s',
			'#<\?php(?:\r\n?|[ \n\t]).*?\?>#s');
		$template = preg_replace($match, '', $template);
		//Extract the main entry loop from the file
		$pattern = '#.*{loop}(.*?){/loop}.*#is';
		$entry_template = preg_replace($pattern, "$1", $template);
		// Extract the header from the template if one exists
		$header = trim(preg_replace('/^(.*)?{loop.*$/is', "$1", $template));
		if ($header == $template) {
			$header = '';
		}
		// Extract the footer from the template if one exists
		$footer = trim(preg_replace('#^.*?{/loop}(.*)$#is', "$1", $template));
		if ($footer == $template) {
			$footer = '';
		}
		// Define a regex to match any template tag
		$tag_pattern = '/{(\w+)}/';
	 	// increm the function that will replace the tags with entry data
	 	$callback = $this->_increm('template_parse::replace_tags', 2);
	 	// Process each entry and insert its values into the loop
	 	$markup = '';
	 	for ($i = 0, $c = count($this->entries); $i<$c; ++$i) {
	 		$markup .= preg_replace_callback($tag_pattern,$callback(serialize($this->entries[$i])),$entry_template);
	 	}
	 	// If extra data was passed to fill in the header/footer, parse it here
	 	if (is_object($extra)) {
	 		foreach($extra as $key=>$props) {
	 			$$key = preg_replace_callback($tag_pattern,$callback(serialize($extra->$key)),$$key);
	 		}
	 	}
	 	// Return the formatted entries with the header and footer reattached
	 	return $header . $markup . $footer;
	 }
	 /**
	  * Replaces template tags with the corresponding entry data
	  * @param string $entry
	  * @param array $params
	  * @param array $matches
	  * @return string
	  */
	  public static function replace_tags($entry, $matches) {
	  	// Unserialize the object
	  	$entry = unserialize($entry);
	  	// Make sure the template tag has a matching array element
	  	if (property_exists($entry,$matches[1])) {
	  		// Grab the value from the Entry object
	  		return $entry->{$matches[1]};
	  	} else {
	  		// Otherwise, simply return the tag as is
	  		return "{".$matches[1]."}";
	  	}
	  }
	 /**
	  * increm function
	  * Increm allows a function to be called incrementally. This means that if
	  * a function accepts two arguments, it can be use with only one argument
	  * supplied, which returns a new function that will accept the remaining argument
	  * and return the output of the original function using the two supplied parameters.
	  * @param string $function   The name of the function
	  * @param int $num_args      The number of arguments the function accepts
	  * @return mixed                       Function or return of the function
	  */
	  private function _increm($function,$num_args) {
	  	return create_function(' ',"
            // Store the passed arguments in an array
            \$args = func_get_args();

            // Execute the function if the right number of arguments were passed
            if( count(\$args)>=$num_args )
            {
                return call_user_func_array('$function', \$args);
            }

            // Export the function arguments as executable PHP code
            \$args = var_export(\$args, 1);

            // Return a new function with the arguments stored otherwise
            return create_function('','
                \$a = func_get_args();
                \$z = ' . \$args . ';
                \$a = array_merge(\$z,\$a);
                return call_user_func_array(\'$function\', \$a);
            ');
        ");
	  }
}
?>
