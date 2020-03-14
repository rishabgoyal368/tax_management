$( document ).ready(function() {

	$("#loginform").validate
	({      
	rules: {
	   email: {
	        required: true,
	        email:true
	    },
	    password: {
	            required: true
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

	$("#joblist").validate({
		rules: {
		name: {
			 required: true,
		},
		websiteLink: {
			required: true,
		      url: true

		},
	   email: {
	        required: true,
	        email:true
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
