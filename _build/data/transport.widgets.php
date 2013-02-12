<?php
$widgets = array();
$widgets[1]= $modx->newObject('modDashboardWidget');
$widgets[1]->fromArray(array (
  'name' => 'piwikvisitssummary.title',
  'description' => 'piwikvisitssummary.desc',
  'type' => 'file',
  'size' => 'full',
  'content' => '[[++core_path]]components/piwikvisitssummary/elements/widgets/piwikvisitssummary.widget.php',
  'namespace' => 'piwikvisitssummary',
  'lexicon' => 'piwikvisitssummary:default',
), '', true, true);

return $widgets;
