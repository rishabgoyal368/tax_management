$(document).ready(function() {
    $.validator.addMethod("passwordCheck", function(value, element) {
        return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(value);
    });
    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");


    // ====================> Designation ================>

    $("#designation").validate({
        rules: {
            title: {
                required: true,
            },
            department: {
                required: true
            },
            status: {
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
            status: {
                required: "Please Select one option",
            }
        },
    });

});