//! Important DOM Element 

const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const email = document.getElementById("email");
const password = document.getElementById("password");
const EYE = document.getElementById("eye");
const error = document.querySelector(".signup-password span.error");
const SIGNUP = document.querySelector(".sign-up-form form");
const SUBMIT = document.getElementById("signup-submit");




//? Handeling Password Eye Click
EYE.onclick = () => {
      if(password.value == "") return;
     
       let src =  ' http://localhost:8080/Messagy/images/icons/create-account/';
    
       if(EYE.src.slice(src.length-1) === "eye.svg"){
            EYE.src = '../images/icons/create-account/closed.svg';
            password.type = "text";
        }else{
            EYE.src = '../images/icons/create-account/eye.svg';
            password.type = "password";
      }
}

password.onkeyup = () => {
      if(password.value != '') EYE.style.opacity = "0.9";
      else   EYE.style.opacity = "0.5";
}



//! Setting Values
fname.addEventListener("input",setFname);
lname.addEventListener("input",setLname);



function setFname() {
      
      if(!validateNames(fname.value))
        fname.value = fname.value.substr(0, fname.value.length-1);
}
function setLname() {
      
      if(!validateNames(lname.value))
        lname.value = lname.value.substr(0, lname.value.length-1);
}

//! Validation Functions
function validateNames(name) {
      //  let Name = new RegExp("^(?=.*[a-z])(?=.{4,})");
         var Name = /^[A-Za-z-.]*$/;
         return name.match(Name);
}
function isEmailAddress(email) {
      var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      return pattern.test(email);  // returns a boolean 
}

function validateEmail(email) {
      //   var UID = /^[A-Za-z0-9_]*$/;
          var Email = /^[\w._-]+[+]?[\w._-]+@[\w.-]+\.[a-zA-Z]{2,6}$/;
          var Message = '';
          if(!Email.test(email)){
               Message = 'Invalid Email ...';
               DisplayMessage(Message);
               return false;
          }else{
            return true;
          }
           
}

function validatePassword(pass) {
      let Strong =  new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
      let LongEnough = new RegExp("^(?=.{8,})");
      let UpperCase = new RegExp("^(?=.*[A-Z])");
      let LowerCase = new RegExp("^(?=.*[a-z])");
      let Numbers = new RegExp("^(?=.*[0-9])");
      let Specials = new RegExp("^(?=.*[!@#\$%\^&\*])");
      let Message = '';
      
      if(!Strong.test(pass)) {
                 if(!LongEnough.test(pass)){
                     Message = 'Must Contain 8 characters or more...';
                 }else if(!UpperCase.test(pass)){
                     Message = 'Must Contain an Uppercase ...';
                 }else if(!LowerCase.test(pass)){
                     Message = 'Must Contain a Lowercase ...';
                 }else if(!Numbers.test(pass)) {
                     Message = 'Must Contain a Number ...';
                 }else if(!Specials.test(pass)){
                     Message = 'Must Contain a Special characters : @-!-#-$-%-&-*';
                 }
                
                 DisplayMessage(Message);
                 return false;
      }else{
                 return true;
      }
}

//! To Display Errors as they are
function DisplayMessage(message) {
         error.innerHTML = message;
         error.style.opacity = 1;
         setTimeout(()=>{
            error.innerHTML = '';
            error.style.opacity = 0;
         },2000);
}





//? Handeling Submiting the form
// SIGNUP.addEventListener("submit", (e)=> {
//       e.preventDefault();
//       Email_value = email.value;
//       Password_value = password.value;

//     //   if(validateEmail(Email_value) && validatePassword(Password_value))
// });



SUBMIT.onclick = ()=>{
    if(validateEmail(email.value) && validatePassword(password.value)){
        // Let's Start AJAX
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../modules/signup.php",true);
        xhr.onload = () => {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(data === "success") {
                        window.location.href = "http://localhost:8080/Messagy/structures/finish-account.php";
                     }else{
                            DisplayMessage(data);
                     }
                 }
            }
                  
          }
          // Let's Send Data form through ajax to php
          let form = new FormData(SIGNUP);
    
          xhr.send(form);
    }


   
}