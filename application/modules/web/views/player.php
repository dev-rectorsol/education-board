<!DOCTYPE html>
<html>
  <head>
    <title>afterglow player</title>
  </head>
  <body>
    <button id="enable" onclick="displayNotification()">Enable notifications</button>
    <script type="text/javascript">

    if ('serviceWorker' in navigator) {
  // Register a service worker hosted at the root of the
  // site using the default scope.
  navigator.serviceWorker.register('/sw.js').then(function(registration) {
    console.log('Service worker registration succeeded:', registration);
  }, /*catch*/ function(error) {
    console.log('Service worker registration failed:', error);
  });
} else {
  console.log('Service workers are not supported.');
}

    Notification.requestPermission(function(status) {
      console.log('Notification permission status:', status);
    });
    function displayNotification() {
      if (Notification.permission == 'granted') {
        navigator.serviceWorker.getRegistration().then(function(reg) {
          reg.showNotification('Hello world!');
        });
      }
    }
    </script>
  </body>
</html>
