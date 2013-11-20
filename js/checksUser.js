/**
 * JavaScript document
 * This works as a controller
 */
var Index = {

	FORM_ID: 'newUser',
	
	init: function() {
		Index.setForm();
		Index.setInputFocus();
		
		
	},
	
        
  
	
	setForm: function() {
		var form = document.getElementById(Index.FORM_ID);
		if(form) {
			form.onclick = function() {
				//TODO need implements some validations here
				//var contact = Index.getContactFromForm(form);
				//if(Index.isValidContact(contact)) {
					//Index.resetForm();
				//}
                                if(form.name.value==''){
					alert( "Preencha campo codigo corretamente!" );
	
										}	
				return false;
			};
			form.birthDate.onfocus = function() {
				this.click();
			};
		}
	},
	
	resetForm: function(form) {
		form.reset();
		form.id.value = "";
		Avatar.setDefault();
	},
	
	getContactFromForm: function(form) {
		var contact = {}; //this create a new object
		   
		
		contact.name   = form.name.value;
		contact.email  = form.email.value;
		contact.phone  = form.user.value;
		contact.birthDate = form.password.value;
		
		return contact;
	},
	
	isValidContact: function(contact) {
		var pattern = /^\s+/,
		    labelName = document.getElementById('name').parentNode,
				labelEmail = document.getElementById('email').parentNode,
				msgError = document.getElementById('msgError'),
				classError = "error",
				isValid = true;
		
		msgError.innerHTML = "";
		
		if(pattern.test(contact.name) || contact.name == "") {
			labelName.className = classError;
			msgError.innerHTML = "<label for='name'>Name is mandatory</label>";
			isValid = false;
		}
		else {
			labelName.className = "";
		}
		
		if(pattern.test(contact.email) || contact.email == "") {
			labelEmail.className = classError;
			msgError.innerHTML += "<label for='email'>Email is mandatory</label>";
			isValid = false;
		}
		else {
			labelEmail.className = "";
		}
		
		return isValid;
	},
	
	setInputFocus: function() {
		var input = document.getElementById('name');
		if(input) {
			input.focus();
		}
	}
	
	
	
	
	
	
	
};

//initialization method main
Index.init();




