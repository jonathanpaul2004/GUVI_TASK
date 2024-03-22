$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting via the browser
        
        var formData = $(this).serialize(); // Serialize the form data
        
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: formData,
            success: function(response) {
                $('#message').html(response); 
                if (response.includes("successful")) {
                    var email = $('#email').val(); 
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
