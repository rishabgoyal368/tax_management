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

    // ====================> Job Opening ================>

    $('#jobOpening').validate({
        rules: {
            JobTitle: {
                required: true,
            },
            designation: {
                required: true
            },
            department: {
                required: true
            },
            maxExperience: {
                required: true,
                number: true,
                min: '#minExperience' 
            },
            minExperience: {
                number: true,
                min: 0
            },
            maxSalary: {
                required: true,
                number: true,
                min: '#minSalary',
            },
            minSalary: {
                number: true,
                min: 0
            },
            postion: {
                required: true,
                digits: true,
                maxlength: 3,
                min: 1
            },
            description: {
                required: true
            },
            timePeriod: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            JobTitle: {
                required: "Please enter Title",
            },
            designation: {
                required: "Please enter Designation",
            },
            department: {
                required: "Please enter Department",
            },
            maxExperience: {
                required: "Please enter Max Experience",
            },
            maxSalary: {
                required: "Please enter Max Salary",
            },
            postion: {
                required: "Please enter Postion",
            },
            description: {
                required: "Please enter Description",
            },
            timePeriod: {
                required: "Please enter Time Period",
            },
            status: {
                required: "Please Select one option",
            }
        },
    });

});