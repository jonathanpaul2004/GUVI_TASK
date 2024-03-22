$(document).ready(function() {
    // Retrieve email from localStorage
    var loggedInEmail = localStorage.getItem('loggedInEmail');
    
    // Check if email exists in localStorage
    if (loggedInEmail) {
        // Load user details when the page is loaded
        loadProfile(loggedInEmail);
        
        // Function to fetch and display user details
        function loadProfile(email) {
            $.ajax({
                type: 'POST',
                url: 'profile.php',
                data: { email: email }, // Send email to profile.php
                dataType: 'json',
                success: function(data) {
                    // Populate form fields with user details
                    $('#name').val(data.name);
                    $('#dob').val(data.dob);
                    $('#gender').val(data.gender);
                    $('#contact').val(data.contact);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to the console
                }
            });
        }
        
        // Form submission event handler
        $('#editForm').submit(function(event) {
            event.preventDefault(); // Prevent form submission
            
            // Serialize form data
            var formData = $(this).serialize();

            // Send form data to update profile
            $.ajax({
                type: 'POST',
                url: 'edit.php', // PHP script to handle profile updates
                data: formData + '&email=' + loggedInEmail, // Include email in the data
                success: function(response) {
                    $('#message').html(response); // Display response message
                    // Redirect to profile page after successful update
                    window.location.href = 'profile.html';
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to the console
                }
            });
        });
    } else {
        console.log("Email not found in localStorage");
    }
});
