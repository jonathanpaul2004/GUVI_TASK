$(document).ready(function() {
    
    function loadProfile() {
        
        var loggedInEmail = localStorage.getItem('loggedInEmail');
        if (loggedInEmail) {
            $.ajax({
                type: 'POST',
                url: 'profile.php',
                data: { email: loggedInEmail }, // Send email to profile.php
                dataType: 'json',
                success: function(data) {
                    // Display user details
                    $('#profileDetails').html(`
                        <p>Name: ${data.name}</p>
                        <p>Email: ${data.email}</p>
                        <p>Gender: ${data.gender}</p>
                        <p>Age: ${data.age}</p>
                        <p>Contact: ${data.contact}</p>
                        <p>Date of Birth: ${data.dob}</p>
                    `);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to the console
                }
            });
        } else {
            console.log("Email not found in localStorage");
        }
    }
    
    // Load profile details when the page is loaded
    loadProfile();

    // Edit button click event
    $('#editProfile').click(function() {
        window.location.href = 'edit.html'; // Redirect to edit.html
    });

    // Logout button click event
    $('#logout').click(function() {
        // Perform logout action
        // Clear all items from localStorage
localStorage.clear();

        window.location.href = 'index.html';
    });
});
