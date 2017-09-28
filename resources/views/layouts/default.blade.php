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
              document.getElementById('logoutstate').style.display = 'block';
            }
            else{
              console.log('Not Authenticated');
              document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
              document.getElementById('logoutstate').style.display = 'none';
            }
          }

          function checkLoginState() {
            FB.getLoginStatus(function(response) {
              statusChangeCallback(response);
            });
          }

          function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=id,name,email,birthday,location', function(response) {
              console.log('Successful login for: ' + response.name);
              document.getElementById('status').innerHTML =
                'Welcome, ' + response.name + '!' +'<br>Email: ' + response.email + '<br>Birthday: ' + response.birthday + '<br>Location: ' + response.location;
            });
          }

          function logOut()
          {
            FB.logout(function(response) 
            {

              document.getElementById('status').innerHTML =
                'You have logged out ';
              document.location.reload();
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