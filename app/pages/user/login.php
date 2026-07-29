<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Accedi — LockGuard</title>
</head>
<body>

<h1>Accedi a LockGuard</h1>

<form id="login-form" method="POST" action="/api/login">

  <div>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required autocomplete="email" placeholder="nome@esempio.com">
  </div>
  <br>

  <div>
    <label for="master_password">Password principale</label><br>
    <input type="password" id="master_password" name="master_password" required autocomplete="current-password" minlength="8">
  </div>
  <br>

  <div>
    <input type="checkbox" id="remember_me" name="remember_me" value="1">
    <label for="remember_me">Ricordami su questo dispositivo</label>
  </div>
  <br>

  <div>
    <label for="totp_code">Codice di verifica a due fattori (se attivo)</label><br>
    <input type="text" id="totp_code" name="totp_code" inputmode="numeric" pattern="[0-9]{6}" maxlength="6" placeholder="123456">
  </div>
  <br>

  <button type="submit">Accedi</button>

</form>

<p>
  <a href="/forgot-password.html">Password dimenticata?</a>
</p>

<p>
  Non hai un account? <a href="/register.html">Registrati</a>
</p>

</body>
</html>