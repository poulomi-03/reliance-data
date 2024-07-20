const loginForm = document.getElementById('loginForm');
const loginLink = document.getElementById('loginLink');
const closeLoginForm = document.getElementById('closeLoginForm');
const homeLoginWrapper = document.getElementsByClassName('home-wrapper');

// Add click event listener to loginRegister
loginLink.addEventListener('click', function () {
    // Toggle the display style of loginForm
    if (loginForm.style.display === 'none' || loginForm.style.display === '') {
        loginForm.style.display = 'block';
        loginLink.style.color = '#189AB4';
        for (let i = 0; i < homeLoginWrapper.length; i++) {
            homeLoginWrapper[i].style.opacity = '0.3';
        }
    } else {
        loginForm.style.display = 'none';
        for (let i = 0; i < homeLoginWrapper.length; i++) {
            homeLoginWrapper[i].style.opacity = '1';
        }
    }
});

// Add click event listener to closeLoginForm
closeLoginForm.addEventListener('click', function () {
    // Toggle the display style of loginForm
    if (loginForm.style.display === 'block') {
        loginForm.style.display = 'none';
        loginLink.style.color = '#fff';
        for (let i = 0; i < homeLoginWrapper.length; i++) {
            homeLoginWrapper[i].style.opacity = '1';
        }
    } else {
        loginForm.style.display = 'block';
    }
});
