const form = document.querySelector(".login form");
contiuneButton = document.querySelector(".btn input");
errrText = document.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();

}
contiuneButton.addEventListener('click' , () => {
    let xhr = new XMLHttpRequest();
    xhr.open('POST','php/login.php',true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data =xhr.response;
                if(data === "success")
                {
                    location.href= 'users.php';
                }
                else{

                    errrText.textContent = data;
                    errrText.style.display='block';


                }
            }
        }

    }
    let formData = new FormData(form)
    xhr.send(formData);
});
