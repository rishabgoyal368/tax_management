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
                lettersonly: true
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

// //show data
function deleteHandler(data)
    {
        var _this = this;
          var id = data.getAttribute("data-id");
          var token = $("meta[name='csrf-token']").attr("content");
          swal({
              title: "Are you sure to delete the record?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: false,
              closeOnCancel: false
            },
              function(isConfirm) {
                if (isConfirm) {
                  $.ajax({
                      url: 'Delete-job-listing-websites/'+id,
                      type: "GET",
                      error: function() {
                              alert('Something is wrong');
                           },
                      success:function(data)
                      {
                        swal("Deleted!", "Your record has been deleted.", "success");
     
                      },
                  });
                } else {
                  swal("Cancelled", "Your record not deleted :)", "error");
                }
              });
    }
