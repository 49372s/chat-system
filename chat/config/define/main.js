let menu_flug = 0;
function toggleMenu() {
    let menu = document.getElementById('header-menu');
    if(menu_flug){
        menu.classList.remove('menu-show');
        menu_flug = 0;
    }else{
        menu.classList.add('menu-show');
        menu_flug = 1;
    }
}

function move(url){
    location.href = url;
}