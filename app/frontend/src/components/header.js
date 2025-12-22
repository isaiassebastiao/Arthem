const params = new URLSearchParams(window.location.search);
const home = document.querySelector('.home');
const gallery = document.querySelector('.gallery');
const artists = document.querySelector('.artists');
const about = document.querySelector('.about');

var page = params.get('page');

if(page == 'home'){
    home.classList.add('active');
}else if(page == 'gallery'){
    gallery.classList.add('active');
}else if(page == 'artists'){
    artists.classList.add('active');  
}else if(page == 'about'){
    about.classList.add('active');
}