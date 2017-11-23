<?php
	/* Dump Helper */
	if (!function_exists('dump')) {
	    function dump ($var, $label = 'Dump', $echo = TRUE)
	    {
	        // Store dump in variable 
	        ob_start();
	        var_dump($var);
	        $output = ob_get_clean();
	        
	        // Add formatting
	        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
	        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
	        
	        // Output
	        if ($echo == TRUE) {
	            echo $output;
	        }
	        else {
	            return $output;
	        }
	    }
	}

	if (!function_exists('dump_exit')) {
	    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
	        dump ($var, $label, $echo);
	        exit;
	    }
	}

	/* Dump Helper End */
	
	function current_url_full(){
		$CI =& get_instance();

	    $url = $CI->config->site_url($CI->uri->uri_string());
	    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
	}
?>