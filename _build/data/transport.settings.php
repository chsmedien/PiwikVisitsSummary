<?php
$settings = array();

$settings[1] = $modx->newObject('modSystemSetting');
$settings[1]->fromArray(array(
    'key' => 'piwikvisitssummary.protocol',
    'value' => 'http',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => 'site',
), '', true, true);

$settings[2] = $modx->newObject('modSystemSetting');
$settings[2]->fromArray(array(
    'key' => 'piwikvisitssummary.url',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => 'site',
), '', true, true);

$settings[3] = $modx->newObject('modSystemSetting');
$settings[3]->fromArray(array(
    'key' => 'piwikvisitssummary.siteid',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => 'site',
), '', true, true);

$settings[4] = $modx->newObject('modSystemSetting');
$settings[4]->fromArray(array(
    'key' => 'piwikvisitssummary.token_auth',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => 'site',
), '', true, true);

$settings[5] = $modx->newObject('modSystemSetting');
$settings[5]->fromArray(array(
    'key' => 'piwikvisitssummary.user',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => 'site',
), '', true, true);

$settings[6] = $modx->newObject('modSystemSetting');
$settings[6]->fromArray(array(
    'key' => 'piwikvisitssummary.password',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => 'site',
), '', true, true);

return $settings;