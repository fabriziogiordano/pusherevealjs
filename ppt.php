<?php
if($_GET['go']) {
	require('Pusher.php');

	switch ($argv[1]) {
		case 'prev': case 'p':
			$event = 'prev';
		break;

		case 'next': case 'n':
			$event = 'next';
		break;

		case 'down': case 'd':
			$event = 'down';
		break;

		case 'up': case 'u':
			$event = 'up';
		break;

		case 'full': case 'f':
			$event = 'full';
		break;

		case 'nofull': case 'nf':
			$event = 'nofull';
		break;

		default:
			$event = $_GET['go'];
		break;
	}
	$key = '81ce7cb18d5019fbe99c';
	$secret = '6b40a9a5d840e47b4bbe';
	$app_id = '1955';

	$pusher = new Pusher($key, $secret, $app_id);
	$result = $pusher->trigger('ppt-channel', 'event-page', $event);
	//var_dump($result);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Controllo</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="revealjs/css/reset.css">
    <link rel="stylesheet" href="revealjs/css/main.css">
    <link rel="stylesheet" href="revealjs/lib/zenburn.css">
  </head>

  <body>

    <div id="reveal">

      <!-- Used to fade in a background when a specific slide state is reached -->
      <div class="state-background"></div>

      <!-- Any section element inside of this container is displayed as a slide -->
      <div class="slides">
        <section>
          <h1>Plancia di comando</h1>
          <p><a href="ppt.php?go=0">Index</a></p>
          <p><a href="ppt.php?go=next">Next</a></p>
          <p><a href="ppt.php?go=prev">Previews</a></p>
          <p><a href="ppt.php?go=up">Up</a></p>
          <p><a href="ppt.php?go=down">Down</a></p>
          <p><a href="ppt.php?go=full">Zoom</a></p>
          <p><a href="ppt.php?go=nofull">No Zoom</a></p>

          <script>
            // Delicously hacky. Look away.
            if( navigator.userAgent.match( /(iPhone|iPad|iPod|Android)/i ) )
            document.write( '<p style="color: rgba(0,0,0,0.3); text-shadow: none;">('+'Tap to navigate'+')</p>' );
          </script>
        </section>
      </div>

      <!-- The navigational controls UI -->
      <aside class="controls">
        <a class="left" href="#">&#x25C4;</a>
        <a class="right" href="#">&#x25BA;</a>
        <a class="up" href="#">&#x25B2;</a>
        <a class="down" href="#">&#x25BC;</a>
      </aside>

      <!-- Displays presentation progress, max value changes via JS to reflect # of slides -->
      <div class="progress"><span></span></div>

    </div>

    <script src="reveal.min.js"></script>

    <!-- Optional libraries for code syntax highlighting and classList support in IE9 -->
    <script src="revealjs/lib/highlight.js"></script>
    <script src="revealjs/lib/classList.js"></script>

    <script>
      // Parse the query string into a key/value object
      var query = {};
      location.search.replace( /[A-Z0-9]+?=(\w*)/gi, function(a) {
        query[ a.split( '=' ).shift() ] = a.split( '=' ).pop();
      } );

      Reveal.initialize({
        controls: true,
        progress: true,
        history: false,
        mouseWheel: true,
        rollingLinks: true,
        theme: query.theme || 'default', // default/neon
        transition: query.transition || 'default' // default/cube/page/concave/linear(2d)
      });

      hljs.initHighlightingOnLoad();
    </script>

  </body>
</html>