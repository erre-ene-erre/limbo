UnLazy.lazyLoad()

if(Marquee3k){
Marquee3k.init({selector: 'marquee-container',});
}

//load page
setTimeout(() => {
    showInfo();
}, 1000);
function showInfo() {
    let menuCourtain = document.querySelector('.menu-container');
    menuCourtain.classList.add('start');
}

// years intersection observer
document.addEventListener("DOMContentLoaded", function () {
    const yearContainers = document.querySelectorAll(".year-container");

    function handleScroll() {
        let lastVisibleIndex = -1;

        yearContainers.forEach((container, index) => {
            const rect = container.getBoundingClientRect();

            // Check if the container is at the top
            if (rect.top <= 0 && rect.bottom >= 0) {
                lastVisibleIndex = index;
            }
        });

        yearContainers.forEach((container, index) => {
            if (index === lastVisibleIndex) {
                container.style.opacity = 1;
            } else if (index < lastVisibleIndex) {
                container.style.opacity = 0;
            } else {
                container.style.opacity = 1;
            }
        });
    }

    window.addEventListener("scroll", handleScroll);

    // Initialize by triggering scroll event
    handleScroll();
}); 

// image buttons
if (document.querySelectorAll('.gallery-item').length > 0){
    let gallery = document.querySelectorAll('.gallery-item');
    let buttons = document.querySelectorAll('.button');
    let prevBut = document.querySelector('.button.prev');
    let nextBut = document.querySelector('.button.next');
    let active = document.querySelector('.gallery-item.shown');
    let captions = document.querySelectorAll('.credits h6');
    let activeCaption = document.querySelector('.credits h6.shown');
    imgButtonDisplay(active);
    prevBut.addEventListener('click', () =>{changeImage('left');});
    nextBut.addEventListener('click', () =>{changeImage('right');});
    
    function changeImage(direction) {
        let nextImg = direction == 'right' ? active.nextElementSibling : active.previousElementSibling;
        let nextCap = direction == 'right' ? activeCaption.nextElementSibling : activeCaption.previousElementSibling;
        gallery.forEach(item => item.classList.remove('shown'));
        captions.forEach(item => item.classList.remove('shown'));
        nextImg.classList.add('shown');
        nextCap.classList.add('shown');
        active = nextImg;
        activeCaption = nextCap;
        imgButtonDisplay(active);
    }
    function imgButtonDisplay(object) {
        buttons.forEach(item => {
            item.classList.remove('hide');
        });
        if (!object.dataset.hasprev) {
            prevBut.classList.add('hide');
        } else if (!object.dataset.hasnext) {
            nextBut.classList.add('hide');
        };

    }
}

// Mobile layout change

let mobileSize = window.matchMedia("(max-width: 500px)");

function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
function changeLayout(before, newEl){
    if (mobileSize.matches) { insertAfter(before, newEl); }
}

if(document.querySelector('.column.right')){
    let colRight = document.querySelector('.column.right');
    let extras = document.querySelector('.extras');
    changeLayout(extras, document.querySelector('.credits'));
    changeLayout(extras, colRight);
    window.addEventListener('resize', changeLayout)
}
if (mobileSize.matches) { 
    let submenus = document.querySelectorAll(".menu .submenu");
    // submenus.forEach(menu =>{menu.classList.add('mobile-ver')});
    let closeBut = document.querySelectorAll('.submenu .close-menu');

//     submenus.forEach(menu => { menu.addEventListener("touchstart", (e) => {
//         menu.classList.add('shown');
//         });
//     });
    closeBut.forEach(bttn => {
        bttn.addEventListener('click', () => {
            bttn.parentElement.classList.remove('mobile-ver')
        });
    })
    submenus.forEach(menu => { menu.addEventListener("pointerout", handler, false) })
 }
//Mobile menu controlers


function handler(event) {
    console.log('onPointerDown was excecuted'); // debug thing
    console.log(this);
    let thisMenu = this;
    // If the pointer is touch, from mouse, pen, touch
    if (event.pointerType === 'touch') {
        event.preventDefault();

        document.body.classList.add('pointer-active')
        // add the active class
        thisMenu.classList.add('mobile-ver');

        // Remove class after a delay
        // setTimeout(function () {
        //     thisMenu.classList.remove('mobile-ver');
        //     console.log('hoolaaaa');
        // }, 3000);
    }
}

// This handler will be executed only once when the cursor is hovered
// test.addEventListener("pointerout", handler, false);