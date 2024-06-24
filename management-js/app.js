let inputPass = document.querySelector(".form input[type='password']");
let eyeBtn = document.querySelector(".form .field i");

eyeBtn.onclick = ()=>{
    if(inputPass.type == "password"){
        inputPass.type = "text";
        eyeBtn.classList.remove('bx-show');
        eyeBtn.classList.add('bx-hide');
    }else{
        inputPass.type = "password";
        eyeBtn.classList.remove('bx-hide');
        eyeBtn.classList.add('bx-show');
    } 
}
