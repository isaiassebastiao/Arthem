const params = new URLSearchParams(window.location.search);
var page = params.get('page');

/* desktop version */
const home = document.querySelector('.home');
const gallery = document.querySelector('.gallery');
const artists = document.querySelector('.artists');
const about = document.querySelector('.about');


/* mobile version */

const home_menu = document.querySelector('.home_menu');
const gallery_menu = document.querySelector('.gallery_menu');
const artists_menu = document.querySelector('.artists_menu');
const about_menu = document.querySelector('.about_menu');




if(page == 'home'){
    home.classList.add('active');
    home_menu.classList.add('menu-link-hover');
}else if(page == 'gallery'){
    gallery.classList.add('active');
    gallery_menu.classList.add('menu-link-hover');
}else if(page == 'artists'){
    artists.classList.add('active'); 
    artists_menu.classList.add('menu-link-hover');
    
}else if(page == 'about'){
    about.classList.add('active');
    about_menu.classList.add('menu-link-hover');
}