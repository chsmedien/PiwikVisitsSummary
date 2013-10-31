<?php
$chunks = array();

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'piwikvisitssummary.iframe',
    'description' => 'Piwik Dasboard Widget iFrame',
    'snippet' => file_get_contents($sources['chunks'].'iframe.chunk.tpl'),
));


$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 2,
    'name' => 'piwik.trackingcode',
    'description' => 'Piwik Tracking Code',
    'snippet' => file_get_contents($sources['chunks'].'trackingcode.chunk.tpl'),
));

return $chunks;