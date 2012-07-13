<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HTML Enabling Technologies</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="revealjs/css/reset.css">
    <link rel="stylesheet" href="revealjs/css/main.css">

    <link rel="stylesheet" href="revealjs/lib/zenburn.css">

    <script src="revealjs/underscore.js"></script>
    <script src="http://js.pusher.com/1.11/pusher.min.js"></script>
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

    <div id="reveal">

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

<!--
        <section>
          <section data-state="alert">
            <h2>Global State</h2>
            <p>
              Set <code>data-state="something"</code> on a slide and <code>"something"</code>
              will be added as a class to the document element when the slide is open. This let's you
              apply broader style changes, like switching the background.
            </p>
            <a href="#/7/1" class="image">
              <img width="178" height="238" src="https://s3.amazonaws.com/hakim-static/reveal-js/arrow.png">
            </a>
          </section>
          <section data-state="blackout">
            <h2>"blackout"</h2>
            <a href="#/7/2" class="image">
              <img width="178" height="238" src="https://s3.amazonaws.com/hakim-static/reveal-js/arrow.png">
            </a>
          </section>
          <section data-state="soothe">
            <h2>"soothe"</h2>
            <a href="#/7/0" class="image">
              <img width="178" height="238" src="https://s3.amazonaws.com/hakim-static/reveal-js/arrow.png" style="-webkit-transform: rotate(180deg);">
            </a>
          </section>
        </section>
-->

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

    <script src="revealjs/reveal.min.js"></script>

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
        history: true,
        mouseWheel: true,
        rollingLinks: true,
        theme: query.theme || 'default', // default/neon
        transition: query.transition || 'default' // default/cube/page/concave/linear(2d)
      });

      hljs.initHighlightingOnLoad();
    </script>

  </body>
</html>