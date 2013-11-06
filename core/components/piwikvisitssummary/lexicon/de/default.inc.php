<?php
/**
 * de default topic lexicon file for PiwikVisitsSummary extra
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
 * de default topic lexicon strings
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package piwikvisitssummary
 **/

$_lang['piwikvisitssummary.title'] = 'Piwik: Graph der letzten Besuche';
$_lang['piwikvisitssummary.desc'] = 'Zeigt den VisitsSummary-Graph Ihrer Piwik-Statistik an';
$_lang['piwikvisitssummary.linktext'] = 'Gesamtstatistik';
$_lang['piwikvisitssummary.settings_not_found'] = 'Die Piwik Systemeinstellungen sind leer. Bitte stellen Sie sicher, dass piwikvisitssummary.protocol, piwikvisitssummary.url, piwikvisitssummary.siteid und piwikvisitssummary.token_auth in den MODX Systemeinstellungen gefüllt sind.';

$_lang['setting_piwikvisitssummary.protocol'] = 'Protokoll für Verbindung zu Piwik';
$_lang['setting_piwikvisitssummary.protocol_desc'] = 'Wenn Ihre Piwik Installation das "https" Protokoll verwendet, können Sie es hier als Protokoll setzen. Ansonsten belassen Sie diese Einstellung bei "http".';
$_lang['setting_piwikvisitssummary.url'] = 'URL der Piwik Installation';
$_lang['setting_piwikvisitssummary.url_desc'] = 'Bitte geben Sie die URL der Piwik Installation ohne Protokoll ein. Die URL muss mit einem Querstrich abschließen!';
$_lang['setting_piwikvisitssummary.siteid'] = 'Piwik Site ID';
$_lang['setting_piwikvisitssummary.siteid_desc'] = 'Bitte geben Sie die Piwik Site ID ein';
$_lang['setting_piwikvisitssummary.token_auth'] = 'Piwik Token Auth';
$_lang['setting_piwikvisitssummary.token_auth_desc'] = 'Bitte geben Sie Token Auth eines Piwik Benutzers mit Ansicht Zugriff für die angegebene Site ID ein.';
$_lang['setting_piwikvisitssummary.user'] = 'Piwik Benutzername';
$_lang['setting_piwikvisitssummary.user_desc'] = 'Bitte geben Sie den Usernamen eines Piwik Benutzers mit Ansicht Zugriff für die angegebene Site ID ein. Bitte leer lassen, wenn der Link zur Gesamtstatistik nicht ausgegeben werden soll.';
$_lang['setting_piwikvisitssummary.password'] = 'Piwik Passwort';
$_lang['setting_piwikvisitssummary.password_desc'] = 'Bitte geben Sie das MD5 kodierte Passwort ihres Piwik Benutzers mit Ansicht Zugriff für die angegebene Site ID ein. Bitte leer lassen, wenn der Link zur Gesamtstatistik nicht ausgegeben werden soll.';
$_lang['setting_piwikvisitssummary.visitssummary.date'] = 'Startdatum für Statistik';
$_lang['setting_piwikvisitssummary.visitssummary.date_desc'] = 'Wählen Sie ein Startdatum für die "VisitsSummary" Statistik: "today" oder "yesterday"';
