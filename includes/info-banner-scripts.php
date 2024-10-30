<?php

	function ib_add_scripts(){
		wp_enqueue_style('ib-main-style', plugins_url( 'css/style.css', dirname(__FILE__) ));

		wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('fontawesome');
	}
	
	add_action('wp_enqueue_scripts', 'ib_add_scripts');