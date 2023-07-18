document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); 
  
    
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
  
   
    if (username === "admin" && password === "password") {
      document.getElementById("message").textContent = "Connexion réussie!";
    } else {
      document.getElementById("message").textContent = "Nom d'utilisateur ou mot de passe incorrect!";
    }
  });
  