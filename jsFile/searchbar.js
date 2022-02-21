const serachFeild = document.querySelector(".users .search input");
const serachButton = document.querySelector(".users .search button");
const usersList = document.querySelector(".users .users-list");
serachButton.addEventListener('click' , () => {
    serachFeild.classList.toggle("active");
    serachFeild.focus();
    serachButton.classList.toggle("active");

});

serachFeild.onkeyup = () => {
    let searchTerm = serachFeild.value;
    if(searchTerm !=""){
        serachFeild.classList.add("active");
    }
    else{
        serachFeild.classList.remove("active");

    }
    let xhr = new XMLHttpRequest();
    xhr.open('POST','php/search.php',true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data =xhr.response;
                // console.log(data)
                usersList.innerHTML = data;

            }
        }

    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);

}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open('GET','php/users.php',true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data =xhr.response;
                // console.log(data)
                if(!serachFeild.classList.contains("active")){
                    usersList.innerHTML = data;
                }
                

            }
        }

    }
    xhr.send();

},500);