$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        
        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    $('#message').html('<p>Connexion réussie!</p>');
                } else {
                    $('#message').html('<p>Identifiants incorrects. Veuillez réessayer.</p>');
                }
            }
        });
    });
});
