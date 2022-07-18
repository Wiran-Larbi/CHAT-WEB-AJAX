const searchBox = document.getElementById("searchBox");


//! Handeling the Search Bar 
function validSearch(search) {
     var rgx = /^[a-zA-Z0-9_-]*$/;
     return rgx.test(search);
}


searchBox.addEventListener("input",()=>{
    if(!validSearch(searchBox.value))
    searchBox.value = searchBox.value.substr(0, searchBox.value.length - 1);

    let xhr = new XMLHttpRequest();
    xhr.open("POST","../modules/search.php",true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                let Contacts = JSON.parse(data);
                 if(Contacts.length > 1){
                    CONTACT_CONT.innerHTML = '';
                      
                    for(let i = 0;i < Contacts.length;i++){
                        CONTACT_CONT.innerHTML += CreateContact(Contacts[i].image,Contacts[i].unique_id,Contacts[i].fname,Contacts[i].status);
                    }
                    const CONTACTs = document.querySelectorAll(".contact-container article");
                    const CONTACTsArr = Array.from(CONTACTs);
               
                  CONTACTsArr.forEach((contact)=>{
                      contact.onclick = ()=>{
                          contact.classList.add("active-contact");    
                         for (let ctct of CONTACTsArr) {
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
                         }
                     
                    });
                 }
              }
          }

    }
    
    xhr.send("search="+encodeURIComponent(searchBox.value.toLowerCase()));
});


// function setSearch() {
//      if(!validSearch(searchBox))
//         searchBox.value = searchBox.value.substr(0, searchBox.value.length - 1);
// }