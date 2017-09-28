<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body class="bodybackgroundcolor">
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '709051605958553',
              cookie     : true, 
              xfbml      : true,
              version    : 'v2.10'
            });

             FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
                  });
          };

            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));

          function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if(response.status === 'connected'){
              console.log('Logged in as Authenticated');
              testAPI();
            }
            else{
              console.log('Not Authenticated');
              document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
            }
          }

          function checkLoginState() {
            FB.getLoginStatus(function(response) {
              statusChangeCallback(response);
            });
          }

          function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
              console.log('Successful login for: ' + response.name);
              document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
            });
          }
</script>
        @include('includes.nav')
        
        <div class="container body-content">

            @include('includes.message')
            @yield('body')
              </div>
            <footer>
                @include('includes.footer')
            </footer>
      
        
        @include('includes.scripts')
    </body>
</html>