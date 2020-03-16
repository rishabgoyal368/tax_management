$(document).ready(function() {
    $.validator.addMethod("passwordCheck", function(value, element) {
        return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(value);
    });


    // ====================> Designation ================>

    $("#designation").validate({
        rules: {
            title: {
                required: true,
            },
            department: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Please enter title",
            },
            department: {
                required: "Please enter department",
            },

        },
    });

});