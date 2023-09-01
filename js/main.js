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

document.addEventListener("DOMContentLoaded", function() {
    let count = 1;
    let goingBack = false;
    setInterval(function () {
        nextImage();
    }, 7000);
    function nextImage() {
        if (!goingBack) {
            count++;
            if (count > 4) {
                count = 1;
            }
        } else {
            count--;
            if (count < 1) {
                count = 4;
            }
        }
        let radioElement = document.getElementById("radio" + count);
        if (radioElement) {
            radioElement.checked = true;
        }
        if (count === 4) {
            goingBack = true;
        } else if (count === 1) {
            goingBack = false;
        }
    }
});

openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);
showSidebarBtn.addEventListener('click', showSidebar);
hideSidebarBtn.addEventListener('click', hideSidebar);

//debug
console.log("You welcome!");

/* Slider ping pong
*/