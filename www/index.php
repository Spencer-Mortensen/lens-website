<?php

namespace Synerga;

$projectDirectory = dirname(__DIR__);

require "{$projectDirectory}/vendor/autoload.php";

$settings = array_merge(
	SynergaSettings::getSettings(),
	[
		'data:path' => "{$projectDirectory}/data",
		'url:base' => $_SERVER['SYNERGA_BASE'],
		'url:path' => $_SERVER['SYNERGA_PATH']
	]
);

$synerga = new Synerga($settings);
$synerga->run('<:include ".config/boot/":>');
