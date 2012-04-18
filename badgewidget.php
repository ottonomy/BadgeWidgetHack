<html>
<body onload="loadBadges();">
<img src="./bwh.png" align="right" />
<p>Here's what your badge widget will look like!</p>

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
                if (i === data.badges.length || i === 3) {
                widgetcode = widgetcode + "</table>";
                document.getElementById("preview").innerHTML=widgetcode;
                return;
                }
            }
        }
    );

}
</script>

<p>
Embed this code anywhere you want your badges to appear:<br /><br />

<textarea cols=50 rows=20>
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
                    if (i === data.badges.length || i === 3) {
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

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30946847-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>