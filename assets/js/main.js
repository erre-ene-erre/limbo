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
    let active = document.querySelector('.shown');
    imgButtonDisplay(active);

    prevBut.addEventListener('click', () =>{changeImage('left');});
    nextBut.addEventListener('click', () =>{changeImage('right');});
    
    function changeImage(direction) {
        let nextImg = direction == 'right' ? active.nextElementSibling : active.previousElementSibling;
        gallery.forEach(item => item.classList.remove('shown'));
        nextImg.classList.add('shown');
        active = document.querySelector('.shown');
        imgButtonDisplay(active);
    }
    function imgButtonDisplay(object) {
        buttons.forEach(item => {
            // item.classList.add('active');
            item.classList.remove('hide');
        });
        console.log(object, object.dataset.hasprev, object.dataset.hasnext);
        if (!object.dataset.hasprev) {
            // prevBut.classList.remove('active');
            prevBut.classList.add('hide');
        } else if (!object.dataset.hasnext) {
            // nextBut.classList.remove('active');
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
    changeLayout(extras, colRight);
    window.addEventListener('resize', changeLayout)
}