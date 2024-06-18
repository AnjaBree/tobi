import './bootstrap';


const sandwichButton = document.querySelector("#menu-btn");
const links = document.querySelector(".links");

sandwichButton.addEventListener("click", () => {
    links.style.display = links.style.display === "none" || !links.style.display ? "flex" : "none";
})


