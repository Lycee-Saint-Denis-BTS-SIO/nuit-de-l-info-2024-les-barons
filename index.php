<?php 

include 'class/user.php';

echo print_r(user::getUser('Clémonstre'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Envoyer">

    </form>
    <?php phpinfo(); ?>
</body>
</html>


<script>
    document.addEventListener("DOMContentLoaded", function() { 
        document.querySelector('form').addEventListener('submit', function(e){
            e.preventDefault();
            let username = document.querySelector('#username').value;
            let email = document.querySelector('#email').value;
            let password = document.querySelector('#password').value;
            console.log(username);
            console.log(email);
            console.log(password);
            fetch('process/insertUser.php', {
                method: 'POST',
                body: new URLSearchParams({
                    'username': username,
                    'email': email,
                    'password': password
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
        });
    });
</script>