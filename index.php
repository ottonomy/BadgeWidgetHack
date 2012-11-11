<?php include('inc/header.php'); ?>

<body>
<div class="container-narrow">
	<div class="masthead">
	<img src="./bwh.png" align="right" />
		<h1>Badge Widget Hack</h3>
  </div>
	
	<p class="lead">Have you got some <a href="http://openbadges.org">Open Badges</a> that you want to display on your blog or somewhere else online?</p>
	<p class="lead">BadgeWidgetHack to the rescue!</p>

  <hr>

	<div class="jumbotron">
		<h3 class="muted">Start by entering your email address:</h3>
		<form action="findgroup.php" method="post"><input type="text" name="email"><input type="submit" value ="Continue >>>"></form>
	</div>
</div>

<?php include('inc/footer.php'); ?>