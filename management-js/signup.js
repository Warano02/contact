let form = document.querySelector(".signup form")
let inputType = form.querySelector(".bouton input");
let errorMsg = form.querySelector(".error-msg");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputType.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "jeanphp/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                console.log(data);
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