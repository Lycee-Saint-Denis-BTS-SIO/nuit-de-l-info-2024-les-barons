<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="username">Username or email</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function() { 
        document.querySelector('form').addEventListener('submit', function(e){
            e.preventDefault();
            let username = document.querySelector('#username').value;
            let password = document.querySelector('#password').value;
            console.log(username);
            console.log(password);
            fetch('process/login.php', {
                method: 'POST',
                body: new URLSearchParams({
                    'username': username,
                    'password': password
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data[0]['password']);
                $form=document.querySelector('form');
                $p = document.createElement('p');
                if (data['password'] == password){
                    
                    $p.textContent = 'Bienvennu ' + data[0]['username'];
                    
                } else {
                    $p.textContent = 'Vous vous êtes trompé de mot de passe, votre mot de passe est "' + data[0]['password']+'"'; 
                }
                $form.appendChild($p);
                
            })
        });
    });


</script>