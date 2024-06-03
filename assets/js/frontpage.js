// Function to store the scroll position and reload the page
function reloadOnResize() {
    let scrollPosition = {
        x: window.scrollX,
        y: window.scrollY
    };
    
    localStorage.setItem('scrollPosition', JSON.stringify(scrollPosition));
    location.reload();
}

// Event listener for window resize
window.addEventListener('resize', reloadOnResize);

// Function to restore the scroll position
function restoreScrollPosition() {
    let scrollPosition = JSON.parse(localStorage.getItem('scrollPosition'));
    if (scrollPosition) {
        window.scrollTo(scrollPosition.x, scrollPosition.y);
        localStorage.removeItem('scrollPosition');
    }
}

// Restore the scroll position after the page has loaded
window.addEventListener('load', restoreScrollPosition);
