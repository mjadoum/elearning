// Index.blade.php

function toggleFavorite(button) {
    if (button.classList.contains('favorited')) {
        button.classList.remove('favorited');
        button.innerHTML = '<i class="fas fa-heart"></i> Add To List';
    } else {
        button.classList.add('favorited');
        button.innerHTML = '<i class="fas fa-heart"></i> Added';
        button.querySelector('i').classList.add('ring-animation');
        setTimeout(() => {
            button.querySelector('i').classList.remove('ring-animation');
        }, 1000); // Adjust this time to match the animation duration
    }
}
// Get all elements with the class 'download-button'
const downloadButtons = document.querySelectorAll('.btn-download');

// Add click event listener to each button
downloadButtons.forEach(button => {
    button.addEventListener('click', function() {
        this.classList.add('clicked');
        setTimeout(() => {
            this.classList.remove('clicked');
        }, 500); // Adjust this time to match the animation duration
    });
});

// Automatically hide the success message after 3 seconds
setTimeout(function() {
    var successAlert = document.getElementById('Alert');
    if (successAlert) {
        successAlert.style.display = 'none';
    }
}, 4000); // 3000 milliseconds = 3 seconds





document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('feedbackForm');

        form.addEventListener('submit', function(event) {
            const rating = document.querySelector('input[name="rating"]:checked');
            const message = document.getElementById('feedbackMessage');

            if (!rating && !message.value.trim()) {
                alert('Please enter a rating or a feedback message.');
                event.preventDefault(); // Prevent form submission
            } else if (!rating) {
                alert('Please select a rating.');
                event.preventDefault();
            } else if (!message.value.trim()) {
                alert('Please enter a feedback message.');
                event.preventDefault();
            }
        });
    });

function handleFileChange(input) {
    // Clear error message
    document.getElementById('error-message').innerText = '';

    // Display selected file name
    const fileNameDisplay = document.getElementById('file-name');
    if (input.files && input.files[0]) {
        fileNameDisplay.innerText = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.innerText = 'To upload image file here';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}


// To select image file and show error message
function displayFileName() {
    const input = document.getElementById('image');
    const fileNameDisplay = document.getElementById('file-name');
    if (input.files.length > 0) {
        fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.textContent = 'To upload image file here';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}


function clearError() {
    document.getElementById('error-message').innerText = ''; // Clears the error message
}





// Timer for alert
setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 4000); // Delay in milliseconds (2 seconds)

window.addEventListener('scroll', function() {
    var navbar = document.getElementById('navbar');
    if (window.scrollY > 50 ) {
        navbar.classList.add('scrolled'); // Add a class when scrolled and on mobile
    } else {
        navbar.classList.remove('scrolled'); // Remove the class when not scrolled or on larger screens
    }
});








