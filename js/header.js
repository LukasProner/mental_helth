const menuIcon = document.querySelector(".menu-icon");
const icon = menuIcon.querySelector("i")
const options = document.querySelector("nav");
const hamburger = document.querySelector(".menu-icon fa-solid");


menuIcon.addEventListener("click", () => {
    if(icon.classList.contains("fa-bars")){
        icon.classList.remove("fa-bars");
        icon.classList.add("fa-xmark");
        options.style.display = "block";
    }else{
        icon.classList.add("fa-bars");
        icon.classList.remove("fa-xmark");
        options.style.display = "none";
    }
});