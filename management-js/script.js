let usersList = document.querySelector(".users .users-list");

searchBar.onkeyup = () => {
  let searchUser = searchBar.value;
  if (searchUser != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "jeanphp/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchUser=" + searchUser);
};
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "jeanphp/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains("active")) {
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 400);
