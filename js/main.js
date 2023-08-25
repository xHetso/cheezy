
// Search Form
let searchBtn =document.querySelector('#search-btn');
let searchForm = document.querySelector('.search-form');

searchBtn.onclick = () => {
    searchBtn.classList.toggle('fa-xmark');
    searchForm.classList.toggle('active');
    navbarMenu.classList.remove('active');
    menuBtn.classList.remove('fa-xmark');
}

// Navbar Menu 
let menuBtn =document.querySelector('#menu-btn');
let navbarMenu = document.querySelector('.navbar');

menuBtn.onclick = () => {
    menuBtn.classList.toggle('fa-xmark');
    navbarMenu.classList.toggle('active');
    searchForm.classList.remove('active');
    searchBtn.classList.remove('fa-xmark');
}

window.onscroll = () => {
    searchBtn.classList.remove('fa-xmark');
    searchForm.classList.remove('active');
    menuBtn.classList.remove('fa-xmark');
    navbarMenu.classList.remove('active');
}

// Scroll top Top
let scrollTopBtn = document.querySelector('#scroll-top i');

scrollTopBtn.onclick = () => {
    scrollTo({
        behavior: 'smooth',
        top: 0
    })
}
window.onscroll = () => {
    if(scrollY > 300) {
        scrollTopBtn.classList.add('active');
    }
    else {
        scrollTopBtn.classList.remove('active');
    }
}

// Loading Page 
let loadingPage = document.querySelector('#loading-page');

function loading() {
    loadingPage.classList.add('active');
}

function fadeOut() {
    setInterval(loading, 3000);
}

window.onload = fadeOut();