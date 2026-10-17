
// 1. Setting the year automatically in the footer
const yearElement = document.getElementById('year');
if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
}

 //1.1. javascript on home page
// 2. Add an interaction for the "Learn More" button
const learnBtn = document.getElementById('learn-btn');
if (learnBtn) {
    learnBtn.addEventListener('click', () => {
        console.log("User is interested in learning more!");
        alert("Redirecting to our cultural tour details...");
    });
}

// 3. Add an interaction for the "See" button
const seeBtn = document.getElementById('see-btn');
if (seeBtn) {
    seeBtn.addEventListener('click', () => {
        console.log("User clicked 'See' in order to explore the Regions");
       alert("Redirecting to our regions details..."); 
    });
}

//Javascript on About us page
// Add an interaction for the "Explore" button
const exploreBtn = document.getElementById('explore-btn');
if (exploreBtn) {
    exploreBtn.addEventListener('click', () => {
        console.log("User clicked 'explore' to view our services");
        alert("Redirecting to our services details..."); 
    });
}

// Javascript on Contact Us page
const contactForm = document.getElementById("PersonalDetails");
if (contactForm) {
    contactForm.onsubmit = function(e) {
        // Get the value from the email input field (not the form)
        var fieldValue = document.getElementById("email").value;
        
        // Check if email is empty
        if (fieldValue === null || fieldValue === "") {
            e.preventDefault();  // Stop form submission
            alert("Please enter your email address");
        }
    };
}
// Theme Toggle on home page
const themeToggle = document.getElementById('theme-toggle');

if (themeToggle) {
    // Load saved preference on page load
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeToggle.textContent = '🌙';  // Moon icon for dark mode
    } else {
        themeToggle.textContent = '🌞';  // Sun icon for light mode
    }

    // Toggle when button is clicked
    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        
        // Save preference
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        
        // Change button icon
        themeToggle.textContent = isDark ? '🌙' : '🌞';
    });
}
// Typing Animation on region page
const heroText = "Explore the diverse culture landscape of Uganda";
let i = 0;
const typingElement = document.getElementById('typing-text');

function typeWriter() {
    if (typingElement && i < heroText.length) {
        typingElement.innerHTML += heroText.charAt(i);
        i++;
        setTimeout(typeWriter, 100);
    }
}

if (typingElement) typeWriter();

// Modal Popup - Show after 1 seconds
const modal = document.getElementById('newsletter-modal');
const closeModal = document.getElementById('close-modal');

if (modal) {
    setTimeout(() => {
        modal.style.display = 'flex';
    }, 1000);

    if (closeModal) {
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }
}
// Close modal when Subscribe button is clicked
const subscribeBtn = document.querySelector('#newsletter-modal button');
if (subscribeBtn) {
    subscribeBtn.addEventListener('click', () => {
        const emailInput = document.querySelector('#newsletter-modal input');
        if (emailInput && emailInput.value.trim() !== "") {
            modal.style.display = 'none';
            alert("Thank you for subscribing!");
        } else {
            alert("Please enter your email address");
        }
    });
}
