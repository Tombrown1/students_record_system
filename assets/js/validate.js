          
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const form = document.getElementById('form');
        const submitBtn = document.getElementById('submit-btn'); 
        const emailIsValid = email => {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

        const validate = (e) => {
            e.preventDefault();

            if(name.value === ""){
                alert("Please enter your name.");
                name.focus();
                return false;
            }

            if(email.value === ""){
                alert("Please enter your email"); 
                email.focus();
                return false;
            }

            if(!emailIsValid(email.value)){
                alert("Please enter a valid email");
                email.focus();
                return false;
            }

            if(password.value === ""){
                alert("Please enter your password");
                password.focus();
                return false;
            }
            return true; // Can now submit the form data to the server.
            
        }        

        submitBtn.addEventListener('click', validate);
