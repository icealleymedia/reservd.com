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
function submitRegistration(form){
    console.log("Registration Attempt");
    var firstname = $('input[name=firstname').val();
    var lastname = $('input[name=lastname').val();
    var email = $('input[name=email').val();
    var password = $('input[name=password').val();
    var passwordrepeat = $('input[name=passwordrepeat').val();
    var loginLevel = $('input[name=userType').val();
    var requestType = $('input[name=requestType').val();
    var path = $(form).attr("action");
    console.log(path);

    var args = 'userType=' + loginLevel + '&requestType=' + requestType + '&firstname=' + firstname + '&lastname=' + lastname+ '&email=' + email + '&password=' + password + '&passwordrepeat=' + passwordrepeat;
    window.confirm(args);
    $.ajax({
        url: path,
        type: "POST",
        dataType: "json",
        data: 'userType=' + loginLevel + '&requestType=' + requestType + '&firstname=' + firstname + '&lastname=' + lastname+ '&email=' + email + '&password=' + password + '&passwordrepeat=' + passwordrepeat,
        success: function(data){
            console.log("registration successful");
            //window.location = "/dashboard.php";
        },
        error: function(x,s,e,data){
            console.log(data);
            $(form).appendChild('<div class="errorMsg">' + data.errors + '</div>');
            // there is an error try logging in using localStorage if not display error message
            console.log("no database connection found");
            console.log(x);
            console.log(s);
            console.log(e);

        }

    });

}
// function to bring in all files needed for web app to run and firing the first function to build application dynamically
function init(){

    var coreScripts = new Loader();
    // load all javascript files that the app is dependant on
    coreScripts.require(["https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js",
        "https://use.fontawesome.com/1bf1738307.js"],
        function(){
            if(jQuery){
                validateScript = new Loader();
                validateScript.require(["https://cdn.jsdelivr.net/npm/jquery-validation/1.17.0/dist/jquery.validate.min.js"], function(){
                    // form submit without validation
                /*$("#register").on("submit", function(e){
                    submitRegistration(e);
                });*/
                /* Form Submission with validation */
                 $("#register").validate({
                    debug: true,
                    rules: {
                        firstname: {
                            required: true,
                            minlength: 2
                        },
                        lastname: {
                            required: true,
                            minlength: 3
                        },
                        email:{
                            required: true,
                            email: true
                        },
                        password: "required",
                        passwordrepeat: {
                            required: true,
                            equalTo: "password"
                        }
                    },
                    messages:{
                        firstname:{
                            required: "Please Enter Your Firstname",
                            minlength: "Firstname must be more than 1 characters long"
                        },
                        lastname:{
                            required: "Please Enter Your Lastname",
                            minlength: "Lastname must be more than 2 characters long"
                        },
                        email:{
                            required: "Please Enter your email",
                            email: "Please enter a valid email address"
                        },
                        password: "Please create a password",
                        passwordrepeat:{
                            required: "You must re-enter your password",
                            equalTo: "Passwords do not match"
                        }
                    },
                    highlight: function(element) {
                        $(element).addClass('errorMsg');
                    },
                     errorPlacement: function(error, element) {
                        error.appendTo(element.parent("div"));
                    }, 
                    submitHandler : function(form){
                        submitRegistration(form);
                    }
                }); 
                // Callback function
                // check to see if current page is login page
                var currentPage = window.location.href;
                if(currentPage.includes("login.php")){
                    // is login page proceed with login 
                    $('#login').submit(function(event){
                        event.preventDefault();
                        alert("login attempt");
                        var user = $('input[name=loginName').val();
                        var pass = $('input[name=loginPass').val();
                        var loginLevel = $('input[name=userType]').val();
                        var requestType = $('input[name=requestType]').val();
                        var path = $(this).attr("action");

                        var args = 'userType=' + loginLevel + '&requestType=' + requestType + '&loginName=' + user + '&loginPass=' + pass;

                        console.log("your Username is " + user + " and your password is " + pass + " thankyou for logging in");

                        if($("input[name=remember]").is(":checked")){
                            var remember = true;
                            args += '&remember' + remember;
                        }
                        $.ajax({
                            url: path,
                            type: "POST",
                            dataType: "json",
                            data: args,
                            success: function(data){
                                window.location = "/dashboard.php";
                            },
                            error: function(x,s,e){
                                // there is an error try logging in using localStorage if not display error message

                                console.log("no database connection found");
                                console.log(x);
                                console.log(s);
                                console.log(e);

                            }

                        }); 
                    });
                }else{

                }
            });
            }
        });

}

// on window load init function starts

window.onload = init;

// save data in local storage

// --- localStorage.setItem('data', data); --- /

// get data from local storage

// --- var retrievedObject 