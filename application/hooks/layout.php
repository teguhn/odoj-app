<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Layout {
	function render() {
		global $OUT;
		
		$CI = &get_instance();
		$output = $CI->output->get_output();

		if(!isset($CI->layout)) {
			$CI->layout = "default";
		}

		if($CI->layout != FALSE) {
			$CI->title  = isset($CI->title)  ? $CI->title  : '';
			$CI->header = isset($CI->header) ? $CI->header : '';
			$CI->footer = isset($CI->footer) ? $CI->footer : '';

			$CI->meta_title       = isset($CI->meta_title)       ? $CI->meta_title       : "";
			$CI->meta_description = isset($CI->meta_description) ? htmlspecialchars($CI->meta_description) : "";
			$CI->meta_keywords    = isset($CI->meta_keywords)    ? $CI->meta_keywords    : "";
			$CI->meta_image       = isset($CI->meta_image)       ? $CI->meta_image       : "";

			$CI->metas   = isset($CI->metas)   ? $CI->metas   : array();
			$CI->scripts = isset($CI->scripts) ? $CI->scripts : array();
			$CI->styles  = isset($CI->styles)  ? $CI->styles  : array();
			$CI->parts   = isset($CI->parts)   ? $CI->parts   : array();
			$CI->other_script = isset($CI->other_script)   ? $CI->other_script   : "";
			$CI->content_style = isset($CI->content_style) ? $CI->content_style : array();

			if(!preg_match('/(.+).php$/', $CI->layout)) {
				$CI->layout .= '.php';
			}

			$default   = BASEPATH . '../application/layouts/default.php';
			$requested = BASEPATH . '../application/layouts/' . $CI->layout;

			if(file_exists($requested)) {
				$layout = $CI->load->file($requested, true);
			} else {
				$layout = $CI->load->file($default, true);
			}
			
			if(!isset($CI->additional_content)) {
				$CI->additional_content = "";
			}

			$view = str_replace("{{content}}", $output, $layout);
						
			$view = str_replace("{{content_style}}", implode(' ', $CI->content_style), $view);
			$view = str_replace("{{title}}",  $CI->title, $view);
			$view = str_replace("{{header}}", $CI->header, $view);
			$view = str_replace("{{additional_content}}", $CI->additional_content, $view);
			$view = str_replace("{{footer}}", $CI->footer, $view);

			$view = str_replace("{{other_script}}", $CI->other_script, $view);
			
			if(isset($CI->container_prop) && is_array($CI->container_prop) && count($CI->container_prop)>0) {
				$view = str_replace("{{container_prop}}",		implode(' ', $CI->container_prop), $view);	// mobile: 12062013
			}
			
			//$view = str_replace("{{container_prop}}",		implode(' ', $CI->container_prop), $view);	// mobile: 12062013

			$view = str_replace("{{meta_title}}",       $CI->meta_title,       $view);
			$view = str_replace("{{meta_description}}", $CI->meta_description, $view);
			$view = str_replace("{{meta_keywords}}",    $CI->meta_keywords,    $view);
			$view = str_replace("{{meta_image}}",       $CI->meta_image,       $view);

			$metas   = "";
			$scripts = "";
			$styles  = "";
			
			if(count($CI->metas) > 0) {
				$metas = implode("\n", $CI->meta);
			}
		
			$scripts .= "<script type='text/javascript'>";
			$scripts .= "var base_url = '". base_url() . "';";
			$scripts .= "</script>";
			
			if(count($CI->scripts) > 0) {
				foreach($CI->scripts as $script) {
					$base_path = 'assets/js/';
					$ext = '.js';

					$scripts .= "<script type='text/javascript' src='" . base_url() . $base_path . $script . $ext . "?v=" . FILE_VERSION . "'></script>";
				}
			}
			

			if(count($CI->styles) > 0) {
				foreach($CI->styles as $style) {
					$styles .= "<link rel='stylesheet' type='text/css' href='" . base_url() . "assets/css/" . $style . ".css' />";
				}
			}

			if(count($CI->parts) > 0) {
				foreach($CI->parts as $name => $part) {
					$view = str_replace("{{".$name."}}", $part, $view);
				}
			}

			$view = str_replace("{{metas}}", $metas, $view);
			$view = str_replace("{{scripts}}", $scripts, $view);
			$view = str_replace("{{styles}}", $styles, $view);
			$view = preg_replace("/{{.*?}}/ims", "", $view);
		} else {
			$view = $output;
		}

		$OUT->_display($view);
	}
}