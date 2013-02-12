<?php
/**
 * @package piwikvisitssummary
 * @subpackage dashboard
 */
class modDashboardWidgetPiwikVisitsSummary extends modDashboardWidgetInterface {

    /**
     * @return string
     */
    public function render() {
    	
    	$settings = array();
    	$settings['url'] = $modx->getOption('piwikvisitssummary.url',null,'-1');
    	$settings['siteid'] = $modx->getOption('piwikvisitssummary.siteid',null,'-1');
    	$settings['token_auth'] = $modx->getOption('piwikvisitssummary.token_auth',null,'-1');
    	
    	if ($settings['url'] == '-1' || $settings['siteid'] == '-1' || $settings['token_auth'] == '-1') {
	    	return $this->modx->lexicon('piwikvisitssummary.settings_not_found');
    	}
    	
    	if ($settings['url'] == 'yourdomain.com/path-to-piwik/' || $settings['siteid'] == '0' || $settings['token_auth'] == '1234dce9c6a03b81234f8216f9fc1234') {
	    	return $this->modx->lexicon('piwikvisitssummary.settings_default_value');
    	}
    	
    	return $modx->getChunk('piwikvisitssummary.iframe',$settings);
    	
    }
}
return 'modDashboardWidgetPiwikVisitsSummary';
