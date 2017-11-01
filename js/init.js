var Loader = function () { }
Loader.prototype = {
    require: function (scripts, callback) {
        this.loadCount      = 0;
        this.totalRequired  = scripts.length;
        this.callback       = callback;

        for (var i = 0; i < scripts.length; i++) {
            this.writeScript(scripts[i]);
        }
    },
    loaded: function (evt) {
        this.loadCount++;

        if (this.loadCount == this.totalRequired && typeof this.callback == 'function') this.callback.call();
    },
    writeScript: function (src) {
        var self = this;
        var s = document.createElement('script');
        s.type = "text/javascript";
        s.async = true;
        s.src = src;
        s.addEventListener('load', function (e) { self.loaded(e); }, false);
        var body = document.getElementsByTagName('body')[0];
        body.appendChild(s);
    }
}

// function to bring in all files needed for web app to run and firing the first function to build application dynamically
function init(){

    var coreScripts = new Loader();
    // load all javascript files that the app is dependant on
    coreScripts.require(["https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js",
        "https://use.fontawesome.com/1bf1738307.js"],
        function(){
            // Callback function 
            $('#login').submit(function(event){
                event.preventDefault();
                alert("login attempt");
                var user = $('input[name=loginName').val();
                var pass = $('input[name=loginKey').val();
                var loginLevel = $('input[name=loginLevel]');

                var args = {
                    loginType: loginLevel,
                    username: user,
                    password: pass
                };

                alert("your Username is " + user + " and your password is " + pass + " thankyou for logging in");

                if($("input[name=remember").is(":checked")){
                    var remember = true;
                    args["remember"] = true;
                }
                $.ajax({
                    url: "api/authenticate.php",
                    dataType: "json",
                    data: args,
                    success: function(data){
                        // if request is successful redirect to dashboard or home page
                        function loginRedirect(){
                            window.location.replace("home.php");
                        }
                        setTimout("loginRedirect()", 500000);

                    },
                    error: function(data){
                        // there is an error try logging in using localStorage if not display error message

                    }

                });
                console.log(args);
            });
    });

}

// on window load init function starts

window.onload = init;