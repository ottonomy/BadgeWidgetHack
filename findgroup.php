<html>
<body>
<img src="./bwh.png" align="right" />
<form action="badgewidget.php" method="post">

Next, choose the group of badges you want to display in your widget.
<br />

<?php
$user = $_POST["user"];
$url = "http://beta.openbadges.org/displayer/" . $user . "/groups.json";
$json = file_get_contents($url);
$data = json_decode($json,true);
$limit = count($data[groups]);
echo "<p><select name='group'><option>Select A Group</option>";

$i = 0;
while ($i < $limit) {
                $group = $data[groups][$i][groupId];
                $groupname = $data[groups][$i][name];
                echo "<option value='" . $group . "." . $groupname . "'>" . $groupname . "</option>";
                $i = $i + 1;
}
echo "</select></p>";
?>

<?php
echo "<input type='hidden' name='user' value='" . $user . "'>";
?>

<p>
And then <input type="submit" value ="Continue >>>">
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