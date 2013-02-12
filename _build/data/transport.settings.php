<?php
$settings = array();

$settings[1] = $modx->newObject('modSystemSetting');
$settings[1]->fromArray(array(
    'key' => 'piwikvisitssummary.url',
    'value' => 'yourdomain.com/path-to-piwik/',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => '',
), '', true, true);


$settings[2] = $modx->newObject('modSystemSetting');
$settings[2]->fromArray(array(
    'key' => 'piwikvisitssummary.siteid',
    'value' => '0',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => '',
), '', true, true);


$settings[3] = $modx->newObject('modSystemSetting');
$settings[3]->fromArray(array(
    'key' => 'piwikvisitssummary.token_auth',
    'value' => '1234dce9c6a03b81234f8216f9fc1234',
    'xtype' => 'textfield',
    'namespace' => 'piwikvisitssummary',
    'area' => '',
), '', true, true);

return $settings;