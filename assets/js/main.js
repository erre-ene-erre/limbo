UnLazy.lazyLoad()

if(Marquee3k){
Marquee3k.init({selector: 'marquee-container',});
}

//load page
setTimeout(() => {
    showInfo();
}, 400);
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
if (document.querySelectorAll('.gallery-item').length > 1){
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
    if (referenceNode && referenceNode.parentNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }
}
function changeToMobileLayout() {
    let extras = document.querySelector('.extras');
    let credits = document.querySelector('.credits');
    let colRight = document.querySelector('.column.right');

    // Check if elements exist before attempting to move them
    if (extras && credits && colRight) {
        insertAfter(extras, credits); // Move .credits after .extras
        insertAfter(extras, colRight); // Move .column.right after .extras
    }
}

function changeToDesktopLayout() {
    let columnLeft = document.querySelector('.column.left');
    let credits = document.querySelector('.credits');
    let colRight = document.querySelector('.column.right');

    // Revert layout back to desktop by placing elements in original order
    if (columnLeft && credits && colRight) {
        insertAfter(document.querySelector('.gral-info'), credits); // Move .credits back after .gral-info
        insertAfter(columnLeft, colRight); // Move .column.right back after .column.left
    }
}
function handleResize() {
    if (mobileSize.matches) { changeToMobileLayout(); } else { changeToDesktopLayout();}
}

window.addEventListener('resize', handleResize);
handleResize();

if(mobileSize.matches && document.querySelector('.mobile-menu')){
    let openSubButtons = document.querySelectorAll('.button.openSub');

    openSubButtons.forEach(button => {
        button.addEventListener('click', () =>{
            button.classList.toggle('active');
            button.nextElementSibling.classList.toggle('shown');
            button.innerText = button.classList.contains('active') ? 'Close' : button.dataset.text;
        });
    });
}