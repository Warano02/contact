let form = document.querySelector(".typing-area");
let input = document.querySelector(".input");
let senfBtn = document.querySelector("button");
let inBox = document.querySelector(".msg-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}
senfBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "jeanphp/chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                input.value = "";
            }
        }
    }

    let formData = new FormData(form)
    xhr.send(formData);
}
setInterval(()=>{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "jeanphp/get_msg.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                inBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form)
    xhr.send(formData);

}, 400);