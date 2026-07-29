<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Registrati — LockGuard</title>
</head>
<body>

<h1>Crea il tuo account LockGuard</h1>

<form id="register-form" method="POST" action="/api/register">

  <div>
    <label for="full_name">Nome completo</label><br>
    <input type="text" id="full_name" name="full_name" required autocomplete="name" placeholder="Mario Rossi">
  </div>
  <br>

  <div>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required autocomplete="email" placeholder="nome@esempio.com">
  </div>
  <br>

  <div>
    <label for="master_password">Password principale</label><br>
    <input type="password" id="master_password" name="master_password" required autocomplete="new-password" minlength="12">
  </div>
  <br>

  <div>
    <label for="master_password_confirmation">Conferma password principale</label><br>
    <input type="password" id="master_password_confirmation" name="master_password_confirmation" required autocomplete="new-password" minlength="12">
  </div>
  <br>

  <div>
    <label for="password_hint">Suggerimento password (opzionale)</label><br>
    <input type="text" id="password_hint" name="password_hint" placeholder="Un suggerimento che ti aiuti a ricordare, senza rivelarla">
  </div>
  <br>

  <div>
    <input type="checkbox" id="terms" name="terms" value="1" required>
    <label for="terms">Accetto i Termini di servizio e l'Informativa sulla privacy</label>
  </div>
  <br>

  <div>
    <input type="checkbox" id="newsletter" name="newsletter" value="1">
    <label for="newsletter">Voglio ricevere aggiornamenti via email</label>
  </div>
  <br>

  <button type="submit">Crea account</button>

</form>

<p>
  Hai già un account? <a href="/login.html">Accedi</a>
</p>

</body>
</html>