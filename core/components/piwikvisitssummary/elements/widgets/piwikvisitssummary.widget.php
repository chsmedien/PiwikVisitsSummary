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
		$settings['protocol'] = $this->modx->getOption('piwikvisitssummary.protocol', null, FALSE, TRUE);
		$settings['url'] = rtrim($this->modx->getOption('piwikvisitssummary.url', null, FALSE, TRUE),'/').'/';
		$settings['siteid'] = $this->modx->getOption('piwikvisitssummary.siteid', null, FALSE, TRUE);
		$settings['token_auth'] = $this->modx->getOption('piwikvisitssummary.token_auth', null, FALSE, TRUE);
		$settings['visitssummary.date'] = $this->modx->getOption('piwikvisitssummary.visitssummary.date', null, 'today', TRUE);
		$settings['user'] = $this->modx->getOption('piwikvisitssummary.user', null, FALSE, TRUE);
		$settings['password'] = $this->modx->getOption('piwikvisitssummary.password', null, FALSE, TRUE);

		if ($settings['protocol'] == FALSE || $settings['url'] == FALSE || $settings['siteid'] == FALSE || $settings['token_auth'] == FALSE) {
			return $this->modx->lexicon('piwikvisitssummary.settings_not_found');
		}

		return $this->modx->getChunk('piwikvisitssummary.iframe', $settings);
	}

}
return 'modDashboardWidgetPiwikVisitsSummary';
