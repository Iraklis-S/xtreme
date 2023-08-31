// Get the login button and the login modal

const loginButton = document.getElementById("login-button");
const loginField = document.getElementById("login-field");

// When the user clicks the login button, display the login modal
loginButton.addEventListener("click", () => {
  // Lower the visibility of the main page
  document.body.style.opacity = "0.7";
  // Display the login modal
  loginField.style.display = "block";
});

// When the user clicks the "X" button, hide the login modal
const closeButton = document.querySelector(".close");
closeButton.addEventListener("click", () => {
  // Restore the visibility of the main page
  document.body.style.opacity = "";
  // Hide the login modal
  loginField.style.display = "none";
});


//for media query 
const loginButton2 = document.getElementById("hidden-btn");

loginButton2.addEventListener("click", () => {
  window.location.href = "/login";
});