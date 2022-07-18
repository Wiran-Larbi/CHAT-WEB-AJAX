const chat_input = document.getElementById("message");
const chat_form = document.getElementById("chatForm");
const chat_input_submit = document.getElementById("submit_input");


function validateChatInput(message){
       if(message === "")
          return false;
        else
          return true;
}
function emptyInput() {
    chat_input.value = "";
     console.log("hello");
}
chat_input_submit.onsubmit = (e) =>{
      e.preventDefault();
}

chat_input_submit.onclick = () => {
       if(!validateChatInput(chat_input.value)) return;
       
       let xhr = new XMLHttpRequest();
       xhr.open("POST", "../modules/chat-injection.php",true);
       xhr.onload = ()=>{
             let data = xhr.response;
             const outgoing_id = document.getElementById("outgoing_input").value;
             //?Tester console
             console.log(data);
             DisplayChat(outgoing_id);
             
       }
       let form = new FormData(chat_form);
       xhr.send(form);
       chat_input.value = "";
       chat_input.innerHTML = "";

}

