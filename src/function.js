function toggleNavbar(){
    var navbar = document.getElementById("navbar");
    console.log(navbar);
    if(navbar.className === "navbar"){
        navbar.classList.add("active");
    }
    else{
        navbar.classList.remove("active");
    }
}

function toggleLoginModal() {
    $("#login-modal").toggle();
}