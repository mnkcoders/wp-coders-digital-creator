<?php
/*******************************************************************************
 * Plugin Name: Coders Digital Creator
 * Plugin URI: https://coderstheme.org
 * Description: Test App for Coders Framework
 * Version: 1.0.0
 * Author: Coder1
 * Author URI: 
 * License: GPLv2 or later
 * Text Domain: coders_tester
 * 
 * @author Coder1 <coder1@mnkcoder.com>
 ******************************************************************************/

//carga de la instancia
add_action('plugins_loaded',function(){
    if( class_exists('CodersApp') ){
        CodersApp::register( __DIR__ , true );
    }
});
register_activation_hook(__FILE__, function( ){
    if( class_exists('CodersApp') ){
        CodersApp::__install(__DIR__);
    }
});
register_deactivation_hook(__FILE__, function(){
    if( class_exists('CodersApp') ){
        CodersApp::__uninstall(__DIR__);
    }
});


