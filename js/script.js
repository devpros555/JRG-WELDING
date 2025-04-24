// Example of JavaScript code, if needed for handling form submission or validations
document.addEventListener("DOMContentLoaded", function() {
    // Handle form submission or any specific logic you need
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent page reload
        
        // Handle form data (for example, logging it)
        const formData = new FormData(event.target);
        console.log("Form data:", Array.from(formData.entries()));

        // Optionally, you can send data to a server using fetch or AJAX
        alert("Form submitted!");
    });
});
