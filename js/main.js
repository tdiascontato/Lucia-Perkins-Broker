const navItems = document.querySelector('.nav__items');
const openNavBtn = document.querySelector('#open__nav-btn');
const closeNavBtn = document.querySelector('#close__nav-btn');
const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show__sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide__sidebar-btn');

const openNav =()=>{
    navItems.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
}
const closeNav =()=>{
    navItems.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display = 'none';
}

const showSidebar = () =>{
    sidebar.style.left = '0';
    showSidebarBtn.style.display = 'none';
    hideSidebarBtn.style.display = 'inline-block';
}

const hideSidebar = () =>{
    sidebar.style.left = '-100%';
    showSidebarBtn.style.display = 'inline-block';
    hideSidebarBtn.style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function () {
    const slidesContainer = document.querySelector(".slides");
    const slides = slidesContainer.querySelectorAll(".slide");
    let slideIndex = 0;
    const slideWidth = slides[0].clientWidth;
    function nextSlide() {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide();
    }
    function showSlide() {
        slidesContainer.style.transform = `translateX(-${slideWidth * slideIndex}px)`;
    }
    setInterval(nextSlide, 4000); // Troque o valor para ajustar a velocidade do slider
});
openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);
showSidebarBtn.addEventListener('click', showSidebar);
hideSidebarBtn.addEventListener('click', hideSidebar);

//debug
console.log("You welcome!");

/* Slider ping pong
*/
