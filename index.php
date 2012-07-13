<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HTML Enabling Technologies</title>
    <meta name="description" content="Manage remote presentation.">
    <meta name="author" content="Fabrizio Giordano">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="reveal.js/css/reset.css">
    <link rel="stylesheet" href="reveal.js/css/main.css">
    <link rel="stylesheet" href="reveal.js/css/print.css" type="text/css" media="print">
    <link rel="stylesheet" href="reveal.js/lib/css/zenburn.css">

    <script src="http://js.pusher.com/1.12/pusher.min.js"></script>
    <script type="text/javascript">
    var pusher = new Pusher('81ce7cb18d5019fbe99c');

    var channel = pusher.subscribe('ppt-channel');
    channel.bind('event-page', function(data) {
      console.log(data);
      switch(data){
        case 'next':
          Reveal.navigateRight();
          break;
        case 'prev':
          Reveal.navigateLeft();
          break;
        case 'up':
          Reveal.navigateUp();
          break;
        case 'down':
          Reveal.navigateDown();
          break;
        case 'full':
          Reveal.activateOverview();
          break;
        case 'nofull':
          Reveal.deactivateOverview();
          break;

        default:
          Reveal.navigateTo( ( data > 0 ) ? data : 0 );
      }
    });
  </script>
  </head>

  <body>

    <div class="reveal">

      <!-- Used to fade in a background when a specific slide state is reached -->
      <div class="state-background"></div>

      <!-- Any section element inside of this container is displayed as a slide -->
      <div class="slides">
        <section>
          <h1>HTML5</h1>
          <h3 class="inverted">Enabling Technologies committee April 5th </h3>
          <script>
            // Delicously hacky. Look away.
            if( navigator.userAgent.match( /(iPhone|iPad|iPod|Android)/i ) )
            document.write( '<p style="color: rgba(0,0,0,0.3); text-shadow: none;">('+'Tap to navigate'+')</p>' );
          </script>
        </section>

        <section>
          <h2>Heads Up</h2>
          <p>Web Sockets</p>
          <p>Social enhancements</p>
          <p>
            <i><small>- <a href="http://fabrizio.phpfogapp.com/">Fabrizio</a> / <a href="http://twitter.com/fabrygio">@fabrygio</a></small></i>
          </p>
        </section>

        <section>
          <section>
            <h1>Web Sockets</h1>
            <blockquote cite="http://en.wikipedia.org/wiki/Websocket">
              WebSocket is a web technology providing for bi-directional, full-duplex communications channels, over a single Transmission Control Protocol (TCP) socket. The WebSocket API is being standardized by the W3C, and the WebSocket protocol has been standardized by the IETF as RFC 6455.[1]
            </blockquote>
          </section>

          <section>
            <h2>Player</h2>
            <p>Many player that offer Websocket support acting as middle man</p>
            <ul>
              <li><a href="http://pusher.com">pusher.com</a></li>
              <li><a href="http://websocket.org">websocket.org</a></li>
              <li><a href="http://socket.io/">socket.io</a></li>
            </ul>
          </section>

          <section>
            <h2>Usage</h2>
            <p>This presentation use Websocket</p>
            <p>Fabrizio is moving this slides!</p>
          </section>

        </section>

        <section>
          <section>
            <h1>Social enhancements</h1>
            <p>Facebook overall</p>
          </section>

          <section>
            <h1>Distribution</h1>
            <blockquote cite="http://gigaom.com/mobile/will-1b-html5-phones-change-the-mobile-app-economy/">
              Will 1B HTML5 phones change the mobile app economy?
            </blockquote>
          </section>

          <section>
            <h1>Simple web API</h1>
<pre><code contenteditable>
<div id="fb-root"></div>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'YOUR_APP_ID', // App ID
      channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    FB.Event.subscribe('auth.statusChange', handleStatusChange);
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));

</code></pre>
         </section>

        </section>

        <section>
          <h1>THE END</h1>
          <h3 class="inverted">BY Fabrizio</h3>
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

    <!-- Optional libraries for code syntax highlighting and classList support in IE9 -->
    <script src="reveal.js/lib/js/head.min.js"></script>

    <script>
      // Load the main reveal.js script
      head.js( 'reveal.js/js/reveal.js', function() {
        // Parse the query string into a key/value object
        var query = {};

        location.search.replace( /[A-Z0-9]+?=(\w*)/gi, function(a) {
          query[ a.split( '=' ).shift() ] = a.split( '=' ).pop();
        } );

        Reveal.initialize({
          // Display controls in the bottom right corner
          controls: true,

          // Display a presentation progress bar
          progress: true,

          // If true; each slide will be pushed to the browser history
          history: true,

          // Loops the presentation, defaults to false
          loop: false,

          // Flags if mouse wheel navigation should be enabled
          mouseWheel: true,

          // Apply a 3D roll to links on hover
          rollingLinks: true,

          // UI style
          theme: query.theme || 'default', // default/neon/beige

          // Transition style
          transition: query.transition || 'default' // default/cube/page/concave/linear(2d)
        });
      } );

      // Load third party scripts
      head.js( 'reveal.js/lib/js/classList.js' );
      head.js( 'reveal.js/lib/js/highlight.js', function() {
        // Fire off syntax highlighting for potential code samples in the slides
        hljs.initHighlightingOnLoad();
      } );
    </script>

  </body>
</html>