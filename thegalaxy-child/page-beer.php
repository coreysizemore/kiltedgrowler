<?php
	
	/*
		@package WordPress
		@subpackage thegalaxy
		Template Name: Page - Beer
	*/
	
	get_header();
	 
	get_template_part( 'headers/header', 'page' );
	
	get_template_part( 'mains/main', 'beer' );
	
	get_footer(); 

?>