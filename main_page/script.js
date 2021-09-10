let the_navbar = document.querySelector('.the_navbar');

document.querySelector('.first_all .navbar_icons .menu').onclick= () =>{
    the_navbar.classList.toggle('active');
}

window.onscroll = () =>{
    the_navbar.classList.remove('active');
}