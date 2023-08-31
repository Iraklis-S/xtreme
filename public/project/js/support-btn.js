document.addEventListener("DOMContentLoaded", function() {
    var supportButton = document.getElementById("supportButton");
    var popupContainer = document.getElementById("popupContainer");
    var supportForm = document.getElementById("supportForm");

    // Toggle the display of the popup when the support button is clicked
    supportButton.addEventListener("click", function(e) {
        e.preventDefault();
        if (popupContainer.style.display === "" || popupContainer.style.display === "none") {
            popupContainer.style.display = "block";
            supportButton.style.backgroundColor = 'red';
        } else {
            popupContainer.style.display = "none";
            supportButton.style.backgroundColor = 'gray  ';
        }
    });

    // Submit the form using AJAX
    supportForm.addEventListener("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(supportForm);

        fetch("/support", {
            method: "POST",
            body: formData
        })
            .then(function(response) {
                // Handle the response from the backend
                if (response.ok) {
                    return response.text();
                } else {
                    throw new Error("Error: " + response.status);
                }
            })
            .then(function(data) {
                // Display success message to the user
                supportForm.reset();
                alert("Message sent successfully!");
            })
            .catch(function(error) {
                // Display error message to the user
                alert("An error occurred: " + error.message);
            });
    });

    // Set the initial display of the popup to "none"
    popupContainer.style.display = "none";
});