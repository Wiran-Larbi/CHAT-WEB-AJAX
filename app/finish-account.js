const Profile_img = document.querySelector("#imagePreview img");
const uid = document.getElementById("uid");
const fingerprint = document.querySelector(".uid-icon");
const FINISH_FORM = document.getElementById("finish-form");
const FINISH_SUBMIT = document.querySelector(".finish-submit button");

//!Handeling Form Submiting
// FINISH_FORM.onsubmit = (e) =>{
//         e.preventDefault();
        
// } 
//!Handeling XHR
FINISH_SUBMIT.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../modules/finish.php",true);
    
    xhr.onload = ()=>{
          
        if(xhr.readyState == XMLHttpRequest.DONE){
               let data = xhr.response;
               if(xhr.status === 200){
                if(data === "success"){
                    window.location.href = "../structures/ssager.php";
                }else{
                    console.log(data);
                }

               }  
               
            
        }
       
}
let form = new FormData(FINISH_FORM);
       xhr.send(form);
}


uid.addEventListener("input", handleUID);
uid.onkeyup = () => {
       if(uid.value === ""){
        fingerprint.style.opacity = 0.5;
       }else{
           fingerprint.style.opacity = 1;
       }
}

//! Handeling Uid
function handleUID() {
     
      if(!validateUID(uid.value)) {
          uid.value = uid.value.substr(0,uid.value.length - 1);
      }
}

//! Filter For uid
function validateUID(text) {
     var rgx = /^[a-zA-Z0-9_-]*$/;
       return text.match(rgx);
}


//!Handeling Image Add

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            Profile_img.src = e.target.result;
            $('#imagePreview img').hide();
            $('#imagePreview img').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
})