<?php

    include_once("../../models/user.php");
    include_once("../db/confDB.php");

    $errLogin="";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $email = trim($_POST["email"] ?? '');
      $pswd = $_POST["pswd"] ?? '';

      if (!empty($email) && !empty($pswd)) {
        
        $user = User::login($email);

        // 1. Verifica se l'utente esiste E se la password in chiaro corrisponde all'hash
        if ($user && password_verify($pswd, $user['password_hash'])) {
            
            // 2. RIGENERAZIONE ID SESSIONE (Sicurezza anti Session Fixation)
            session_regenerate_id(true);

            //Session vars
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['logged_in'] = true;

            $words = preg_split('/\s+/', $_SESSION['user_name']);
            $initials = '';

            $maxInitials=1;

            //initials
            foreach ($words as $word) {
                $initials .= mb_substr($word, 0, 1, 'UTF-8');
                if (mb_strlen($initials, 'UTF-8') >= $maxInitials) {
                    break;
                }
            }
            $_SESSION['user_initials'] = strtoupper($initials);

            // 4. Redirect alla pagina protetta / dashboard
            header("Location: ../../index.php");
            exit();

        } else {
            // Messaggio generico per motivi di sicurezza (non dire se è errata l'email o la password)
            $errLogin = "Credenziali non valide.";
        }
    } else {
        $errLogin = "Not empty fields allowed.";
    }

    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accedi — LockGuard</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: '#38E5B6',
                            hover: '#2db892',
                        },
                        dark: {
                            bg: '#070c16',
                            card: '#101726',
                        },
                        muted: '#8a99af',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<!-- Aggiunto "relative" al body per il posizionamento assoluto del logo -->
<body class="relative bg-dark-bg text-white font-sans antialiased h-screen w-full overflow-hidden flex items-center justify-center bg-[image:linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:60px_60px]">

    <!-- Logo in alto a sinistra -->
    <a href="../../index.php" class="absolute top-6 left-6 md:top-8 md:left-8 flex items-center gap-2.5 group z-50 no-underline">
        <div class="bg-brand/10 p-2 rounded-xl border border-brand/30 group-hover:bg-brand/20 transition-all duration-300 shadow-[0_0_10px_rgba(56,229,182,0.1)] group-hover:shadow-[0_0_15px_rgba(56,229,182,0.2)]">
            <!-- Icona Lucchetto -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-brand" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <span class="text-white font-bold text-xl tracking-tight group-hover:text-brand transition-colors duration-300">LockGuard</span>
    </a>

    <div class="w-full max-w-6xl p-4 md:p-8 flex flex-col lg:flex-row gap-8 lg:gap-12 items-center h-full lg:h-auto justify-center">
        
        <!-- Sezione Sinistra -->
        <div class="flex-1 flex flex-col gap-4 w-full justify-center">
            <div class="inline-flex items-center gap-2 bg-brand/10 border border-brand/30 text-brand px-3.5 py-1.5 rounded-full text-xs font-semibold tracking-wide uppercase w-fit shadow-[0_0_10px_rgba(56,229,182,0.1)]">
                <!-- SVG User Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                    <path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"/>
                </svg>
                Bentornato
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight tracking-tight">
                Accedi al tuo<br><span class="text-brand">digital vault</span>
            </h1>
            
            <p class="text-muted text-base lg:text-lg leading-relaxed max-w-md">
                Gestisci le tue password e i tuoi dati sensibili in totale sicurezza. La tua privacy è garantita.
            </p>
        </div>

        <!-- Sezione Destra (Form di Login) -->
        <div class="flex-1 flex justify-center w-full max-h-full">
            <div class="w-full max-w-md bg-dark-card/80 backdrop-blur-xl border border-white/10 rounded-2xl p-6 md:p-8 shadow-2xl overflow-y-auto max-h-[90vh] [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
                <h2 class="text-xl md:text-2xl font-semibold mb-5 text-center lg:text-left">Accedi a LockGuard</h2>

                <form id="login-form" method="POST">

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm text-muted mb-1.5 font-medium">Email</label>
                        <input type="email" id="email" name="email" autocomplete="email" placeholder="nome@esempio.com"
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20 placeholder-white/20 hover:bg-white/10">
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <div class="flex justify-between items-center mb-1.5">
                            <label for="master_password" class="block text-sm text-muted font-medium">Password principale</label>
                            <a href="/forgot-password.html" class="text-xs text-brand hover:text-brand-hover transition-colors font-medium">Password dimenticata?</a>
                        </div>
                        <input type="password" id="master_password" name="pswd" autocomplete="current-password" minlength="8" placeholder="Inserisci la tua password"
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20 placeholder-white/20 hover:bg-white/10">
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-start gap-3 mb-5 bg-white/5 p-3 rounded-lg border border-white/5">
                        <input type="checkbox" id="remember_me" name="remember_me" value="1" 
                               class="mt-0.5 w-4 h-4 accent-brand cursor-pointer shrink-0 rounded">
                        <div>
                            <label for="remember_me" class="text-sm text-muted leading-snug cursor-pointer m-0 block">Ricordami su questo dispositivo</label>
                        </div>
                    </div>

                    <!-- Gestione Errori PHP -->
                    <?php if (!empty($errLogin)): ?>
                        <div class="mb-5 bg-red-500/10 border border-red-500/20 rounded-lg p-3 text-center">
                            <p class="text-red-400 text-sm font-medium m-0"><?php echo $errLogin; ?></p>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="w-full bg-brand hover:bg-brand-hover text-black border-none py-3 rounded-xl text-sm font-bold cursor-pointer transition-all duration-300 shadow-[0_4px_15px_rgba(56,229,182,0.2)] hover:shadow-[0_6px_20px_rgba(56,229,182,0.4)] active:scale-[0.98]">
                        Accedi
                    </button>

                </form>

                <div class="text-center mt-5 text-xs text-muted">
                    Non hai un account? <a href="signUp.php" class="text-white hover:text-brand font-semibold transition-colors duration-300 no-underline">Registrati</a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>