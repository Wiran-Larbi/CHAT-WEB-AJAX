const UID_EMAIL = document.getElementById("uid");
const PIN = document.getElementById("pin");
const LOGIN_SUBMIT = document.getElementById("submit");
const LOGIN_FORM = document.getElementById("form");
const error = document.getElementById("error");



//! To Display Error
function DisplayMessage(message) {
    error.innerHTML = message;
    error.style.opacity = 1;
    setTimeout(()=>{
       error.innerHTML = '';
       error.style.opacity = 0;
    },2000);
}

LOGIN_SUBMIT.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
      xhr.open("POST", "../modules/login.php", true);
      xhr.onload = ()=> {
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                     if(data === "success"){
                        window.location.href = "http://localhost:8080/Messagy/structures/ssager.php";
                     }else{
                          DisplayMessage(data);
                     }
                 }
                
            }
      }
      let form = new FormData(LOGIN_FORM);
      xhr.send(form);
});

// LOGIN_SUBMIT.onclick = ()=>{

//         // Let's Start Ajax
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST","../modules/login.php",true);
//         xhr.onload = () => {
//             if(xhr.readyState === XMLHttpRequest.DONE){
//                 let data = xhr.response;

//                 if(xhr.status === 200){
//                         console.log(data);
//                  }else{
//                         console.log("error");
//                  }
//             }
            
//         }
// } 




// //? Handeling Submiting The Form

// LOGIN_FORM.onsubmit = (e) => {
//     e.preventDefault();
//     // console.log("Submit Login");
// };