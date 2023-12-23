document.getElementById("registrationForm").addEventListener("submit", function(event) { 
    event.preventDefault(); 
 
    var username = document.getElementById("username").value; 
    var email = document.getElementById("email").value; 
    var password = document.getElementById("password").value; 
 
    var xhr = new XMLHttpRequest(); 
    xhr.open("POST", "register.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    xhr.onreadystatechange = function() { 
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { 
            alert(xhr.responseText); 
        } 
    }; 
    xhr.send("username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password)); 
});