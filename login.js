$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting via the browser
        
        var formData = $(this).serialize(); // Serialize the form data
        
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: formData,
            success: function(response) {
                $('#message').html(response);
                if (response.includes("successful")) {
                    var email = $('#email').val(); // Get the email from the form
                    localStorage.setItem('loggedInEmail', email);
                    window.location.href = 'profile.html'; 
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    });
});
