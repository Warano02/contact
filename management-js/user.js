let searchBar = document.querySelector(".users .search input");
let searchBtn = document.querySelector(".users .search button");
let icon = searchBtn.querySelector('i');

searchBtn.onclick = ()=>{
    
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active")

    if(icon.className == "bx bx-search-alt"){
         icon.classList = "bx bx-x";
        }else{
        icon.classList = "bx bx-search-alt";
    }
    searchBar.value = "";   
}



