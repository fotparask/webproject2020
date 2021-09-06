let the_navbar = document.querySelector('.the_navbar');

document.querySelector('#menu-btn').onclick= () =>{
    the_navbar.classList.toggle('active');
}

window.onscroll = () =>{
    the_navbar.classList.remove('active');
}