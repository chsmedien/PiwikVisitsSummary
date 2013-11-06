<style>
    .dashboard-block {
        position: relative;
    }
    .piwik-directlink {
        display: block;
        position: absolute;
        top: 1px;
        right: 10px;
        padding: 8px 0;
        text-decoration: none;
        color: #5E5E5E;
        text-shadow: 0 1px 1px #fff;
    }
</style>
<div id="widgetIframe" style="margin:-10px;height:240px;">
<iframe width="100%" height="450" src="[[+protocol]]://[[+url]]/index.php?module=Widgetize&action=iframe&language=[[++manager_language]]&columns[]=nb_visits&widget=1&moduleToWidgetize=VisitsSummary&actionToWidgetize=getEvolutionGraph&idSite=[[+siteid]]&period=day&date=today&disableLink=1&widget=1&token_auth=[[+token_auth]]" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
</div>
[[+user:notempty=`<a class="piwik-directlink" href="[[+protocol]]://[[+url]]/index.php?module=Login&amp;action=logme&amp;login=[[+user]]&amp;password=[[+password]]" target="_blank">[[%piwikvisitssummary.linktext]]</a>`]]