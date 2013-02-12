<?php
$chunks = array();

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'piwikvisitssummary.iframe',
    'description' => 'piwikvisitssummary.chunk_desc',
    'snippet' => file_get_contents($sources['chunks'].'iframe.chunk.tpl'),
));

return $chunks;