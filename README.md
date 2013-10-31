PiwikVisitsSummary
==================

A MODX Dashboard Widget with the Visits Summary Graph from Piwik.
Package also includes a chunk with the piwik tracking code.


Instructions
------------------

- Install the extra via the MODX package management in your MODX manager
- go to your system settings, select the piwikvisitssummary namespace and enter your piwik url, siteid and token_auth. To display a full statistic link, you have to enter the piwik user and the MD5 coded password of that user too.
- edit your dashboard configuration and add the PiwikVisitsSummary widget to your dashboard

To include the piwik tracking code to your site, you can use the ```[[$piwik.trackingcode]]``` chunk. It uses the url and siteid from your PiwikVisitsSummary settings.