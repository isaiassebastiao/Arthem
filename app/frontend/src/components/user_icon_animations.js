const user_icon = document.querySelector('.profile-link');
export const user_nav_menu = document.querySelector('.user-nav-menu');

user_icon.style.userSelect = 'none';

user_icon.addEventListener('click', ()=>{
    const menu_style = window.getComputedStyle(user_nav_menu).display;

    if(menu_style == 'flex'){
        user_nav_menu.style.display = 'none';
        return 
    }
    user_nav_menu.style.display = 'flex';
});
