let form = document.querySelector(".signup form")
let inputMail = form.querySelector(".bouton input[type='email']");
let inputPass1 = form.querySelector(".bouton input[type='password']");
let inputSubmit = form.querySelector(".bouton input[type='submit']");
let errorMsg = form.querySelector(".error-msg");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputSubmit.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "jeanphp/signin.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "succes"){
                    location.href = "users.php";
                    }else{
                        errorMsg.style.display = "block";
                        errorMsg.textContent =  data;
                }
            }
        }
    }

    let formData = new FormData(form)
    xhr.send(formData);
}