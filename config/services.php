<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

	'facebook' => [
		'client_id' => '364497073744229',
		'client_secret' => '373504591408690035861a5bc15980c3',
		'redirect' => 'http://localhost:8000/facebook/login',
	],

	'google' => [
		'client_id' => '514041287979-icq396nmn5qvb8c95q4jufgok7h5lqqs.apps.googleusercontent.com',
		'client_secret' => 'jEX8cQFlrRFrGt6bel1jgjUd',
		'redirect' => 'http://localhost:8000/google/login',
	],

];
