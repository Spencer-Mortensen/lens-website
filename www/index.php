<?php

namespace Synerga;

$projectDirectory = dirname(__DIR__);

require "{$projectDirectory}/vendor/autoload.php";

$settings = [];
$values = [];

$synerga = new SynergaFactory($settings, $values);

$settings = array_merge(
	$synerga->getSettings(),
	[
		'settings:data:path' => "{$projectDirectory}/data",
		'settings:url' => [
			'base' => $_SERVER['SYNERGA_BASE'],
			'path' => $_SERVER['SYNERGA_PATH']
		]
	]
);

$interpreter = $synerga->get('interpreter');
$interpreter->interpret('<:include ".config/boot/":>');
