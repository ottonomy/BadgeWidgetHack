<?php include('inc/header.php'); ?>
<body onload="loadBadges();">
<div class="container-narrow">
<div class="masthead">
	<img src="./bwh.png" align="right" />
	<h1 class="muted">Here's what your badge widget looks like!</h3>
</div>

<div id="preview">. . .</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
function loadBadges() {

<?php
$user = $_POST["user"];
list($group,$name) = explode(".",$_POST["group"]);
echo 'var url = "http://beta.openbadges.org/displayer/' . $user . '/group/' . $group . '.json";';
echo 'var widgetcode = "<table>"';
?>
    
    $.getJSON(url,
        function(data) {
            var i=0;
            while (i < data.badges.length < 4)
            {
                widgetcode = widgetcode + "<tr><td align='center'>";
                badgeName = data.badges[i].assertion.badge.name;
                imgUrl = data.badges[i].assertion.badge.image;
                critUrl = data.badges[i].assertion.badge.criteria;
                assertUrl = data.badges[i].hostedUrl;
                widgetcode = widgetcode + "<a href='" + assertUrl + "'><img src='"+imgUrl+"' width='50' height='50' border='0'/></a><br /><a href='" + critUrl + "'>" + badgeName + "</a>";                
                widgetcode = widgetcode + "</td></tr>";
                i = i+1;
                if (i === data.badges.length || i === 4) {
                widgetcode = widgetcode + "</table>";
                document.getElementById("preview").innerHTML=widgetcode;
                return;
                }
            }
        }
    );

}
</script>

<p>Embed this code anywhere you want your badges to appear:</p>

<textarea rows=20 cols=40>
<div id="bhwidget">. . .</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>    
<script type="text/javascript">

<?php echo 'var url = "http://beta.openbadges.org/displayer/' . $user . '/group/' . $group . '.json";'; ?>

    $.getJSON(url,
        function(data) {
            var i=0;
            var widgetcode = "<table>";
            while (i < data.badges.length < 4) {
                widgetcode = widgetcode + "<tr><td align='center'>";
                badgeName = data.badges[i].assertion.badge.name;
                imgUrl = data.badges[i].assertion.badge.image;
                critUrl = data.badges[i].assertion.badge.criteria;
                assertUrl = data.badges[i].hostedUrl;
                widgetcode = widgetcode + "<a href='" + assertUrl + "'><img src='"+imgUrl+"' width='50' height='50' border='0'/></a><br /><a href='" + critUrl + "'>" + badgeName + "</a>";                
                widgetcode = widgetcode + "</td></tr>";
                i = i+1;
                    if (i === data.badges.length || i === 4) {
                    widgetcode = widgetcode + "</table>";
                    document.getElementById("bhwidget").innerHTML=widgetcode;
                    return;
                    }
            }
        }
    );
</script>
</textarea>
</p>
</form>
</div>
<?php include('inc/footer.php'); ?>
