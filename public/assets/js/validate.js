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

});
	
