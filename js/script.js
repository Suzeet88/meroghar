
// modal window

function togglePopup(id) {
    const modal = document.getElementById(id);
    if (modal.style.display === "flex") {
        modal.style.display = "none";
    } else {
        modal.style.display = "flex";
    }
}

// Close the modal when clicking outside of the modal content
window.onclick = function(event) {
    const loginPopup = document.getElementById("login-popup");
    const registerPopup = document.getElementById("register-popup");
    
    if (event.target === loginPopup) {
        loginPopup.style.display = "none";
    } else if (event.target === registerPopup) {
        registerPopup.style.display = "none";
    }
};







/*********************************/
/* sticky navbar */


const header = document.querySelector('.header');
const height = 150;


const toggleStickyNavbar = function(){
      if(window.scrollY > height){
           header.classList.add('sticky');
      }
      else{
           header.classList.remove('sticky');
      }
}

window.addEventListener('scroll' , toggleStickyNavbar);






//slider component


// Check if the slider components exist on the page
const slides = document.querySelectorAll('.slide');
const nextButton = document.querySelector('.slider__btn--right');
const prevButton = document.querySelector('.slider__btn--left');

// Proceed only if slider components are found
if (slides.length > 0 && nextButton && prevButton) {
    let currentSlide = 0;
    const maxSlide = slides.length - 1;

    // Function to go to a specific slide
    const goToSlide = (slide) => {
        slides.forEach((s, index) => {
            s.style.transform = `translateX(${100 * (index - slide)}%)`;
        });
    };

    // Initial position
    goToSlide(0);

    // Next slide function
    const nextSlide = () => {
        currentSlide = currentSlide === maxSlide ? 0 : currentSlide + 1;
        goToSlide(currentSlide);
    };

    // Previous slide function
    const prevSlide = () => {
        currentSlide = currentSlide === 0 ? maxSlide : currentSlide - 1;
        goToSlide(currentSlide);
    };

    // Event listeners
    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);
}





////////////////////////////////////////////////////
//frequently asked quesitions

const FAQS_box = document.querySelectorAll('.FAQS-box');
// console.log(FAQS_box);

FAQS_box.forEach(FAQS => {
      FAQS.addEventListener('click' , function(){
           FAQS.classList.toggle('active');
      })
})




// reveal element through scroll

const reveal = function(){
    let reveals = document.querySelectorAll('.reveal');
    
    // console.log(reveals);

    for(let i=0 ; i < reveals.length ; i++){
          let windowHeight = window.innerHeight;
          let revealTop = reveals[i].getBoundingClientRect().top;
         //  console.log(revealTop);
          let revealPoint = 150;

          if(revealTop < windowHeight - revealPoint){
               reveals[i].classList.add('active');
          }
          else{
               reveals[i].classList.remove('active');
          }

}
}
reveal();

window.addEventListener('scroll' , reveal);



document.addEventListener('DOMContentLoaded', function() {
    // Target the "Add Property" link
    const addPropertyLink = document.getElementById('addPropertyLink');

    // Check if the link exists
    if (addPropertyLink) {
        // Initially disable the link if not logged in
        if (isLoggedIn === false) {
            // Disable the link visually and functionally
            addPropertyLink.classList.add('disabled-link');
            addPropertyLink.addEventListener('click', function(event) {
                // Prevent the link from being followed
                event.preventDefault(); 
                alert("Please sign up or register to access add property feature.");
                // Trigger the login popup
                togglePopup('login-popup'); 
            });
        }
    }

    // Function to enable the "Add Property" link after login
    function enableAddPropertyLinkOnLogin() {
        if (isLoggedIn === true) {
            // Enable the link
            addPropertyLink.classList.remove('disabled-link');
        }
    }

    // Example: After AJAX login success
    function handleLoginSuccess() {
        // Update the login status dynamically
        isLoggedIn = true; 
        // Enable the "Add Property" link
        enableAddPropertyLinkOnLogin();
    }

    
});



// popup 
  // Show the modal with a message
  function showModal(message, redirect = null) {
    document.getElementById('popupMessage').innerText = message;
    document.getElementById('popupModal').style.display = 'block';
    document.getElementById('modalBackdrop').style.display = 'block';

    // Redirect after a short delay if a redirect URL is provided
    if (redirect) {
        setTimeout(() => {
            window.location.href = redirect;
        }, 2000); // 2 seconds delay
    }
}

// Close the modal
function closeModal() {
    document.getElementById('popupModal').style.display = 'none';
    document.getElementById('modalBackdrop').style.display = 'none';
}












   

