<?php
// This file is generated. Do not modify it manually.
return array(
	'animate-wrapper' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'valora-blocks/animate-wrapper',
		'version' => '0.1.0',
		'title' => 'Animate Wrapper',
		'category' => 'design',
		'icon' => 'editor-code',
		'description' => 'Wraps content in AOS animation',
		'attributes' => array(
			'animationType' => array(
				'type' => 'string',
				'default' => 'fade-up'
			)
		),
		'supports' => array(
			'html' => false,
			'align' => true
		),
		'textdomain' => 'valora-blocks',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'company-address' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'valora-blocks/company-address',
		'version' => '0.1.0',
		'title' => 'Company Address',
		'category' => 'text',
		'icon' => 'location',
		'description' => 'Output the company address with an optional icon.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'svgIcon' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'textdomain' => 'valora-blocks',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'company-email' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'valora-blocks/company-email',
		'version' => '0.1.0',
		'title' => 'Company Email',
		'category' => 'text',
		'icon' => 'email',
		'description' => 'Output the company email with an optional icon.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'svgIcon' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'textdomain' => 'valora-blocks',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'testimonial-slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'valora-blocks/testimonial-slider',
		'version' => '0.1.0',
		'title' => 'Testimonial Slider',
		'category' => 'widgets',
		'icon' => 'editor-quote',
		'description' => 'A slider displaying testimonials.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'multiple' => false,
			'align' => true,
			'color' => array(
				'background' => true,
				'text' => true
			)
		),
		'attributes' => array(
			'navigation' => array(
				'type' => 'boolean',
				'default' => true
			),
			'arrowColor' => array(
				'type' => 'string',
				'default' => 'var(--wp--preset--color--primary)'
			)
		),
		'textdomain' => 'valora-blocks',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	)
);
