const CONTACT_CONT = document.querySelector("div.contact-container");
const SSAGER_EMPTY = document.querySelector(".ssager-chat .ssager-empty");

const RECEIVER_SECTION = document.querySelector(".receiver-section");
const CHAT_SECTION = document.querySelector(".chat-section");
const CHAT_GRID = CHAT_SECTION.querySelector(".chat-grid");
const OUTGOING_INPUT = document.getElementById("outgoing_input");
//! Updating the Contact Section 

function UpdateContact() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../modules/contact.php",true);
    xhr.onload = ()=>{
         if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                let Contacts = JSON.parse(data);
                // console.log(Contacts);
                if(Contacts.length > 1){
                for(let i = 0;i < Contacts.length;i++){
                     CONTACT_CONT.innerHTML += CreateContact(Contacts[i].image,Contacts[i].unique_id,Contacts[i].fname,Contacts[i].status);
                   }
                  const CONTACTs = document.querySelectorAll(".contact-container article");
                  const CONTACTsArr = Array.from(CONTACTs);
                  //console.log(CONTACTsArr);
                  CONTACTsArr.forEach((contact)=>{
                      contact.onclick = ()=>{
                             contact.classList.add("active-contact");
                               for (let ctct of CONTACTsArr){
                                  if(ctct !== contact)
                                 ctct.classList.remove("active-contact");
                            }
                               
                             let ClickedID = contact.querySelector("input").value;
                             //! removing the dummy page
                                if(!SSAGER_EMPTY.classList.contains("hide-section"))
                                    SSAGER_EMPTY.classList.add("hide-section");
                             //! Displaying the chat Section
                                 RECEIVER_SECTION.classList.remove("hide-section");
                                 CHAT_SECTION.classList.remove("hide-section");

                           //! Displaying the receiver Section Chat
                              DisplayReceiverSection(ClickedID);
                        
                            //! Modifying the chat input form to the id
                                OUTGOING_INPUT.value = ClickedID;

                         }
                    });


               }
            }
        }
    }
          xhr.send();
   
}
function DisplayReceiverSection(outgoing_id) {
    
        let xhllr = new XMLHttpRequest();
        xhllr.open("POST","../modules/chat-info.php",true);
        xhllr.onload = () => {
            if(xhllr.readyState == XMLHttpRequest.DONE && xhllr.status === 200){
                let data = xhllr.response;
                var OutgoingAccount = JSON.parse(data);
                //! Lets Update The Chat section
                 RECEIVER_SECTION.innerHTML = `
                 <div class="receiver-info">
                       <img src="../images/profile_images/${OutgoingAccount['image']}" alt="receiver image">
                    <span>
                       <span class="receiver-name">${OutgoingAccount['fname']}</span>
                       <span class="receiver-status">${OutgoingAccount['status']}</span>
                    </span>
                 </div>
    
                <div class="receiver-setting">
                       <button type="button" id="searchReceiver">
                       <img src="../images/icons/ssager/loop-w.svg" alt="loop search">
                       </button>
                       <button type="button" id="more">
                       <img src="../images/icons/ssager/dots.svg" alt="more">
                       </button>
                </div>`;
                 DisplayChat(OutgoingAccount['unique_id']);
                 setInterval(()=>{ DisplayChat(OutgoingAccount['unique_id']);},100000);
               
           }
          
       }
       xhllr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
       xhllr.send("ID="+encodeURIComponent(outgoing_id));

   
   
}

function DisplayChat(outgoing_id){
      CHAT_GRID.innerHTML = '';
      let xhr = new XMLHttpRequest();
      xhr.open("POST","../modules/chat.php",true);
      xhr.onload = ()=> {
         if(xhr.readyState == XMLHttpRequest.DONE && xhr.status === 200){
                  let data = xhr.response;
                  let chat = JSON.parse(data);
                  for(let i=0; i < chat.length; i++){
                        if(chat[i].incoming_id !== outgoing_id)
                        CHAT_GRID.appendChild(createMsg("outgoing",chat[i].message))
                        else
                        CHAT_GRID.appendChild(createMsg("incoming",chat[i].message))
                  }

                 const scrollToBottom = (node) => {
	                 node.scrollTop = node.scrollHeight;
                   }
                 scrollToBottom(CHAT_GRID);
                //  emptyInput();
                 
         }
      }
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send("ID="+encodeURIComponent(outgoing_id));
}
// function DisplayChatInput(outgoing_id){
//              let chatForm = `
//              <div class="chat-input">
//              <form action="#" method="post">
//                 <input type="hidden" value="${outgoing_id}">
//                 <input type="text" name="message" id="message" placeholder="Your Message ...">
//                 <button type="button">
//                     <img src="../images/icons/ssager/send.svg" alt="send icon">
//                 </button>
//              </form>
//          </div>
//              `;
//              CHAT_SECTION.innerHTML += chatForm;
              
// }

if(searchBox.value === "")
UpdateContact()


function CreateContact(image,id,name,status) {
           
         let active_bull = "";
           if(status == 'Active now')
                active_bull = "contact-active";
            else
                active_bull = "contact-not-active";
            
         let contact = `<article class="contact">
                        <span class=${active_bull}></span>
                      <img class="contact-img" src="../images/profile_images/${image}" alt="contact image">
                      <input type="hidden" value="${id}" name="current id">
                      <span>
                           <span class="contact-name">${name}</span>
                           <span class="contact-msg">hello bro how are you...</span> 
                      </span>
                      <span class="contact-last">2 min</span>     
                      </article>`;
            return contact;
       
}

function createMsg(type,content) {           
          let DIV = document.createElement("div");
          let SPAN = document.createElement("span");
          DIV.classList.add(type);
          SPAN.classList.add("message");
          SPAN.textContent = content;
          DIV.appendChild(SPAN);

          return DIV;
}