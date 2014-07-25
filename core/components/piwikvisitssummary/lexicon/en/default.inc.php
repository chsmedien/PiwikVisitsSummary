<?php
/**
 * en default topic lexicon file for PiwikVisitsSummary extra
 *
 * Copyright 2013 by Christian Seel hello@chsmedien.de
 * Created on 02-11-2013
 *
 * PiwikVisitsSummary is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * PiwikVisitsSummary is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * PiwikVisitsSummary; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package piwikvisitssummary
 */

/**
 * Description
 * -----------
 * en default topic lexicon strings
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package piwikvisitssummary
 **/

$_lang['piwikvisitssummary.title'] = 'Piwik Visits Summary';
$_lang['piwikvisitssummary.desc'] = 'Shows the VisitsSummary Graph from your Piwik Installation';
$_lang['piwikvisitssummary.linktext'] = 'Full Statistics';
$_lang['piwikvisitssummary.settings_not_found'] = 'Piwik settings empty. Please make sure that piwikvisitssummary.protocol, piwikvisitssummary.url, piwikvisitssummary.siteid and piwikvisitssummary.token_auth are filled in your MODX system settings.';

$_lang['setting_piwikvisitssummary.protocol'] = 'Protocol for connection to Piwik';
$_lang['setting_piwikvisitssummary.protocol_desc'] = 'If your Piwik installation makes use of "https" you can set it here as default. Otherwise use the default "http" protocol.';
$_lang['setting_piwikvisitssummary.url'] = 'URL of the Piwik installation';
$_lang['setting_piwikvisitssummary.url_desc'] = 'Please enter the URL of the Piwik installation without protocol. The URL must end with a slash.';
$_lang['setting_piwikvisitssummary.siteid'] = 'Piwik Site ID';
$_lang['setting_piwikvisitssummary.siteid_desc'] = 'Please enter the Piwik Site ID.';
$_lang['setting_piwikvisitssummary.token_auth'] = 'Piwik Token Auth';
$_lang['setting_piwikvisitssummary.token_auth_desc'] = 'Please enter the token auth of a Piwik user with view permission for the Piwik Site ID.';
$_lang['setting_piwikvisitssummary.user'] = 'Piwik Username';
$_lang['setting_piwikvisitssummary.user_desc'] = 'Please enter the username of a Piwik user with view permission for the Piwik Site ID. Leave empty if no link to full statistics should be generated.';
$_lang['setting_piwikvisitssummary.password'] = 'Piwik Password';
$_lang['setting_piwikvisitssummary.password_desc'] = 'Please enter the MD5 coded password of a Piwik user with view permission for the Piwik Site ID. Leave empty if no link to full statistics should be generated.';
$_lang['setting_piwikvisitssummary.visitssummary.date'] = 'Date for statistics';
$_lang['setting_piwikvisitssummary.visitssummary.date_desc'] = 'Choose between "today" or "yesterday" as start for the "VisitsSummary" statistics.';
