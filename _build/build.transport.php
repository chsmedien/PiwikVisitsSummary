<?php
ob_start();

$mtime = microtime();
$mtime = explode(' ', $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

/* define package */
define('PKG_NAME', 'PiwikVisitsSummary');
define('PKG_NAME_LOWER', strtolower(PKG_NAME));
define('PKG_VERSION', '1.0.1');
define('PKG_RELEASE', 'pl');

/* define sources */
$root = dirname(dirname(__FILE__)) . '/';
$sources = array(
	'root' => $root,
	'build' => $root . '_build/',
	'data' => $root . '_build/data/',
	'events' => $root . '_build/data/events/',
	'resolvers' => $root . '_build/resolvers/',
	'properties' => $root . '_build/data/properties/',
	'permissions' => $root . '_build/data/permissions/',
	'chunks' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/chunks/',
	'snippets' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/snippets/',
	'plugins' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/plugins/',
	'lexicon' => $root . 'core/components/' . PKG_NAME_LOWER . '/lexicon/',
	'docs' => $root . 'core/components/' . PKG_NAME_LOWER . '/docs/',
	'pages' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/pages/',
	'templates' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/templates/',
	'validators' => $root . '_build/validators/',
	'subpackages' => $root . '_build/subpackages/',
	'model' => $root . 'core/components/' . PKG_NAME_LOWER . '/model/',
	'source_assets' => $root . 'assets/components/' . PKG_NAME_LOWER,
	'source_core' => $root . 'core/components/' . PKG_NAME_LOWER,
);
unset($root);

/* override with your own defines here (see build.config.sample.php) */
require_once $sources['build'] . 'build.config.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
require_once $sources['build'] . 'includes/functions.php';

$modx = new modX();
$modx->initialize('mgr');

echo '<pre>'; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');

$modx->loadClass('transport.modPackageBuilder', '', false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME_LOWER, PKG_VERSION, PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER, false, true, '{core_path}components/' . PKG_NAME_LOWER . '/');
$modx->log(modX::LOG_LEVEL_INFO, 'Created Transport Package and Namespace.');

/* create category */
$category = $modx->newObject('modCategory');
$category->set('id', 1);
$category->set('category', PKG_NAME);
$modx->log(modX::LOG_LEVEL_INFO, 'Packaged in category.');

/* add chunks */
$chunks = include $sources['data'] . 'transport.chunks.php';
if (is_array($chunks)) {
	$category->addMany($chunks, 'Chunks');
} else {
	$chunks = array();
	$modx->log(modX::LOG_LEVEL_ERROR, 'No chunks defined.');
}
$modx->log(modX::LOG_LEVEL_INFO, 'Packaged in ' . count($chunks) . ' chunks.');
unset($chunks);

/* add system settings */
$settings = include $sources['data'] . 'transport.settings.php';
if (is_array($settings)) {
	$attr = array(
		xPDOTransport::UNIQUE_KEY => 'key',
		xPDOTransport::PRESERVE_KEYS => true,
		xPDOTransport::UPDATE_OBJECT => false,
	);
	foreach ($settings as $setting) {
		$vehicle = $builder->createVehicle($setting, $attr);
		$builder->putVehicle($vehicle);
	}
	unset($setting, $attr);
} else {
	$modx->log(modX::LOG_LEVEL_ERROR, 'No settings defined.');
}
$modx->log(modX::LOG_LEVEL_INFO, 'Packaged in ' . count($settings) . ' System Settings.');
unset($settings);

/* create category vehicle */
$attr = array(
	xPDOTransport::UNIQUE_KEY => 'category',
	xPDOTransport::PRESERVE_KEYS => false,
	xPDOTransport::UPDATE_OBJECT => true,
	xPDOTransport::RELATED_OBJECTS => true,
	xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array(
		'Snippets' => array(
			xPDOTransport::UNIQUE_KEY => 'name',
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => true,
		),
		'Plugins' => array(
			xPDOTransport::UNIQUE_KEY => 'name',
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => true,
			xPDOTransport::RELATED_OBJECTS => true,
			xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array(
				'PluginEvents' => array(
					xPDOTransport::PRESERVE_KEYS => true,
					xPDOTransport::UPDATE_OBJECT => false,
					xPDOTransport::UNIQUE_KEY => array('pluginid', 'event'),
				)
			)
		),
		'Chunks' => array(
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => true,
			xPDOTransport::UNIQUE_KEY => 'name',
		)
	)
);
$vehicle = $builder->createVehicle($category, $attr);
unset($category, $attr);

$modx->log(modX::LOG_LEVEL_INFO, 'Adding file resolvers ...');
//$vehicle->resolve('file', array(
//    'source' => $sources['source_assets'],
//    'target' => "return MODX_ASSETS_PATH . 'components/';",
//));
$vehicle->resolve('file', array(
	'source' => $sources['source_core'],
	'target' => "return MODX_CORE_PATH . 'components/';"
));
$modx->log(modX::LOG_LEVEL_INFO, 'Packaged in folders.');
$builder->putVehicle($vehicle);

/* modDashboardWidget */
$widgets = include $sources['data'] . 'transport.widgets.php';
if (is_array($widgets)) {
	$attributes = array(
		xPDOTransport::PRESERVE_KEYS => false,
		xPDOTransport::UPDATE_OBJECT => true,
		xPDOTransport::UNIQUE_KEY => array('name'),
	);
	$ct = count($widgets);
	$idx = 0;
	foreach ($widgets as $widget) {
		$idx++;
		$vehicle = $builder->createVehicle($widget, $attributes);
		if ($ct == $idx) {
			$vehicle->resolve('file', array(
				'source' => $sources['source_core'],
				'target' => "return MODX_CORE_PATH . 'components/';",
			));
		}
		$builder->putVehicle($vehicle);
	}
	$modx->log(xPDO::LOG_LEVEL_INFO, 'Packaged in ' . count($widgets) . ' default dashboard widgets.');
} else {
	$modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not load dashboard widgets!');
}
unset($widgets, $widget, $attributes, $ct, $idx);


/* now pack in the license file, readme and setup options */
$builder->setPackageAttributes(array(
	'license' => file_get_contents($sources['docs'] . 'license.txt'),
	'readme' => file_get_contents($sources['docs'] . 'readme.txt'),
	'changelog' => file_get_contents($sources['docs'] . 'changelog.txt'),
));

/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO, 'Packing up transport package zip ...');
$built = $builder->pack();

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;
$totalTime = ($tend - $tstart);
$totalTime = sprintf("%2.4f s", $totalTime);

if ($built) {
	$modx->log(modX::LOG_LEVEL_INFO, "\n<br />Package Built.<br />\nExecution time: {$totalTime}\n");

	ob_end_clean();

	$filename = $builder->filename;
	$directory = $builder->directory;

	header('Pragma: no-cache');
	header('Expires: 0');
	header('Content-type: application/zip');
	header('Content-Disposition: attachment; filename=' . $filename);
	header('Content-Length: ' . filesize($directory . $filename));
	readfile($directory . $filename);
} else {
	$modx->log(modX::LOG_LEVEL_INFO, "\n<br />Error: No Package Built.<br />\nExecution time: {$totalTime}\n");
	ob_end_flush();
}

exit();
