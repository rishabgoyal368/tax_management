$(document).ready(function() {
    $.validator.addMethod("passwordCheck", function(value, element) {
        return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(value);
    });
    // ====================> Admin Login================>
    $("#loginform").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter your email address in format​",
            },
            password: {
                required: "Please enter passsword",
            },
        },
    });

    $("#resetform").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                passwordCheck: true
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },

        },
        messages: {
            email: {
                required: "Please enter your email address in format​",
            },
            password: {
                required: "Please enter passsword",
                passwordCheck: "Password must be a minumum of 8 characters and contain a digit, upper-case, lower-case and non-alphanumeric character e.g. !@# with no leading or trailing spaces."

            },
            password_confirmation: {
                required: "Please provide confirm password",
                minlength: "Your password must be at least 8 characters long",
                equalTo: "Please enter the same password as above"
            },
        },
    });

    // ====================> Job Listing Website ================>

    $("#joblist").validate({
        rules: {
            name: {
                required: true,
                maxlength: 100,
                alphanumeric: true

            },
            websiteLink: {
                required: true,
                url: true

            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter name of plateform",
            },
            websiteLink: {
                required: "Please enter websitelink",
            },
            email: {
                required: "Please enter your email address in format​",
            },
            password: {
                required: "Please enter passsword",
            },
            status: {
                required: "Please enter status",
            },
        },
    });

});
//show password
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

