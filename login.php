<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>L'anathomie de Poséidon</title>
  <link rel="stylesheet" href="background.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

</head>
<body>
<script src="http://code.jquery.com/jquery-2.0.3.min.js" ></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <div class="wrapper">
    <div class="title"><span>L'anathomie de Poséidon</span></div>
    <form action="#" id="login-form">
      <div class="row">
        <i class="fas fa-user"></i>
        <input name="username" type="text" placeholder="Nom d'utilisateur" required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input name="password" type="password" placeholder="Mot de passe" required />
      </div>
      <div class="row button">
        <input type="submit" class="btn-login" value="Login"/>
        <button type="button" class="btncreate">Créé un compte</button>
      </div>
    </form>
  </div>
  <div class="captcha-container" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center;">
    <div class="captcha-content">
      <h2>Question :</h2>
      <p>Pour prouver que vous êtes un humain, répondez à cette question s'il vous plaît !</p>
      <div class="captcha-challenge">
        <p>Calculer :</p>
        <div class="math-expression">d/dx [3 · cos (- π/2)]</div>
        <input type="text" class="captcha-input" placeholder="Entrée votre réponse" />
        <button type="button" class="captcha-submit">Soumettre</button>
        <div class="captcha-result" style="display: none;">
          <i class="fas fa-times" style="color: red;"></i> Désolé, ce n'est pas la bonne réponse. Essayez à nouveau.
        </div>
      </div>
      <p class="note">Note: Si vous ne connaissez pas la réponse, dites-le directement :)</p>
    </div>
  </div>

  <script>
    const loginBtn = document.querySelector('.btn-login');
    const captchaContainer = document.querySelector('.captcha-container');
    const captchaSubmit = document.querySelector('.captcha-submit');
    const captchaInput = document.querySelector('.captcha-input');
    const captchaResult = document.querySelector('.captcha-result');
    const formLogin = document.querySelector('#login-form');
    const createBtn = document.querySelector('.btncreate');


    loginBtn.addEventListener('click', () => {
      captchaContainer.style.display = 'flex';
    });

    captchaSubmit.addEventListener('click', () => {
      const userInput = captchaInput.value.trim();
      if (userInput.toLowerCase() === 'je ne sais pas') {
        captchaContainer.style.display = 'none';
        // Proceed with login
        console.log('Proceed with login');
        login();
      } else {
        captchaResult.style.display = 'block';
      }
    });

    formLogin.addEventListener('submit', (e) => {
      e.preventDefault();
    });

    formLogin.addEventListener('click', (e) => {
      if (e.target.classList.contains('btncreate')) {
        signUp();
      }
    });


    function login(){
      const username = document.querySelector('#login-form input[type="text"]').value;
      const password = document.querySelector('#login-form input[type="password"]').value;

      fetch('process/login.php', {
        method: 'POST',
        body: new URLSearchParams({
          'username': username,
          'password': password
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data[0]['password'] === password) {
          toastr.success('Bienvenue ' + data[0]['username'], 'Succès !', {
            timeOut: 5000,
            closeButton: true,
            progressBar: true,
          });
          window.location.replace('main.html')
        } else {
          toastr.warning('Vous vous êtes trompé de mot de passe, votre mot de passe est "' + data[0]['password'] + '"', 'Dommage !', {
            timeOut: 5000,
            closeButton: true,
            progressBar: true,
          });
          //alert('Vous vous êtes trompé de mot de passe, votre mot de passe est "' + data[0]['password'] + '"');
        }
      });
    };


    function signUp(){
      const username = document.querySelector('#login-form input[type="text"]').value;
      const password = document.querySelector('#login-form input[type="password"]').value;

      fetch('process/insertUser.php', {
        method: 'POST',
        body: new URLSearchParams({
          'username': username,
          'password': password
        })
      })
      toastr.success('Compte créé avec succès', 'Succès !', {
        timeOut: 5000,
        closeButton: true,
        progressBar: true,
      });
    }
  </script>
</body>
</html>
