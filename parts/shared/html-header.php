<?php
/**
 * HTML header
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */
?>
<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1" <?php language_attributes(); ?>><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" <?php language_attributes(); ?>><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" <?php language_attributes(); ?>><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" <?php language_attributes(); ?>><![endif]--> 
<!--[if  IE 9]><html class="no-js ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<title><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_16x16_favicon.png"/>
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_152x152_ipad_retina.png"/>
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_144x144_ipad_retina_ios6.png"/>
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_120x120_iphone_retina.png"/>
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_114x114_iphone_retina_ios6.png"/>
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_76x76_ipad_non-retina.png"/>
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_72x72_ipad_non-retina_ios6.png"/>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();?>/images/icons/Icon_57x57_iphone_non-retina_ios6.png"/>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		
