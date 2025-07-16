let x, y;
let heightFactor = document.body.scrollHeight / window.innerHeight;
let widthFactor = document.body.scrollWidth / window.innerWidth;
function handleMouse(e) {
    // Verify that x and y already have some value
    if (x && y) {
        // Scroll window by difference between current and previous positions
        window.scrollBy((e.clientX * widthFactor) - x, (e.clientY * heightFactor) - y);
    }

    // Store current position
    x = e.clientX * widthFactor;
    y = e.clientY * heightFactor;
}

// Assign handleMouse to mouse movement events
document.onmousemove = handleMouse;