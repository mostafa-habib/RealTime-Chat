const password =document.getElementById("password");
const eyeIcon =document.getElementById("eye-icon");
let check = false;
eyeIcon.addEventListener('click', () => {
    if(check){
        password.type="password";
        check = false;
        eyeIcon.classList.remove("active");
    }
    else{
        password.type="text";
        check = true;
        eyeIcon.classList.add("active");
    }
    

    

})