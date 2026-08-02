<?php
    include_once("../../models/user.php");
    include_once("../db/confDB.php");

    // Initialize variables
    $errName = $errMail = $errPSWD = $errPSWD2 = $errTerms = "";
    $name = $mail = "";
    $err = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // 1. Safely retrieve and sanitize inputs
        $name         = trim($_POST["name"] ?? '');
        $mail         = trim($_POST["mail"] ?? '');
        $pswd         = $_POST["password"] ?? '';
        $confirm_pswd = $_POST["password_confirmation"] ?? '';
        $terms        = isset($_POST["terms"]);

        // 2. Validate inputs
        if (empty($name)) {
            $errName = "Name required";
            $err = true;
        }

        if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errMail = "Provide a valid Email";
            $err = true;
        }

        if (empty($pswd)) {
            $errPSWD = "Password required";
            $err = true;
        } elseif ($pswd !== $confirm_pswd) {
            $errPSWD2 = "The passwords have to be equal";
            $err = true;
        }

        if (!$terms) {
            $errTerms = "You must accept the terms and conditions to proceed";
            $err = true;
        }

        
        // Process form
        if (!$err) {
            $user=new User($name,$mail,$pswd);
            try{
                $user->create($user);
                header("Location: ../index.php");
            }catch(Exception $e){
                echo "Account già esistente, <a href='login.php'>Accedi</a>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrati — LockGuard</title>
    
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
<!-- Aggiunto "relative" al body per il posizionamento assoluto del logo, h-screen e overflow-hidden per bloccare lo scorrimento -->
<body class="relative bg-dark-bg text-white font-sans antialiased h-screen w-full overflow-hidden flex items-center justify-center bg-[image:linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:60px_60px]">

    <!-- Logo in alto a sinistra con redirect a index.php -->
    <a href="../../index.php" class="absolute top-6 left-6 md:top-8 md:left-8 flex items-center gap-2.5 group z-50 no-underline">
        <div class="bg-brand/10 p-2 rounded-xl border border-brand/30 group-hover:bg-brand/20 transition-all duration-300 shadow-[0_0_10px_rgba(56,229,182,0.1)] group-hover:shadow-[0_0_15px_rgba(56,229,182,0.2)]">
            <!-- Icona Lucchetto -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-brand" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <span class="text-white font-bold text-xl tracking-tight group-hover:text-brand transition-colors duration-300">LockGuard</span>
    </a>

    <!-- Ottimizzato il gap e l'altezza massima per far stare tutto in una schermata -->
    <div class="w-full max-w-6xl p-4 md:p-8 flex flex-col lg:flex-row gap-8 lg:gap-12 items-center h-full lg:h-auto justify-center">
        
        <!-- Sezione Sinistra (UX/Marketing) -->
        <div class="flex-1 flex flex-col gap-4 w-full justify-center">
            <div class="inline-flex items-center gap-2 bg-brand/10 border border-brand/30 text-brand px-3.5 py-1.5 rounded-full text-xs font-semibold tracking-wide uppercase w-fit shadow-[0_0_10px_rgba(56,229,182,0.1)]">
                <!-- SVG Lock Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                    <path d="M18 10v-4c0-3.313-2.687-6-6-6s-6 2.687-6 6v4h-3v14h18v-14h-3zm-10-4c0-2.206 1.794-4 4-4s4 1.794 4 4v4h-8v-4zm6 11.236q.482.352.887.764h-3.775q.405-.412.887-.764a2.5 2.5 0 1 0 2-0z"/>
                </svg>
                End-to-End Encryption
            </div>
            
            <!-- Testo leggermente ridotto per prevenire l'overflow verticale -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight tracking-tight">
                Your secure<br><span class="text-brand">digital vault</span>
            </h1>
            
            <p class="text-muted text-base lg:text-lg leading-relaxed max-w-md">
                End-to-end encrypted storage for all your passwords and notes. One login, protection everywhere.
            </p>
            
            <div class="flex flex-wrap gap-4 mt-1 text-muted text-sm">
                <span class="flex items-center gap-1.5"><span class="text-brand font-bold">✓</span> AES-256 Bit</span>
                <span class="flex items-center gap-1.5"><span class="text-brand font-bold">✓</span> Zero-Knowledge</span>
                <span class="flex items-center gap-1.5"><span class="text-brand font-bold">✓</span> Multi-device</span>
            </div>
        </div>

        <!-- Sezione Destra (Form Migliorato) -->
        <div class="flex-1 flex justify-center w-full max-h-full">
            <!-- Scroll interno solo se necessario su schermi piccolissimi, invisibile (scrollbar-hide) -->
            <div class="w-full max-w-md bg-dark-card/80 backdrop-blur-xl border border-white/10 rounded-2xl p-6 md:p-8 shadow-2xl overflow-y-auto max-h-[90vh] [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
                <h2 class="text-xl md:text-2xl font-semibold mb-5 text-center lg:text-left">Crea il tuo account</h2>

                <form id="register-form" method="POST">

                    <!-- Nome -->
                    <div class="mb-4">
                        <label for="full_name" class="block text-sm text-muted mb-1.5 font-medium">Nome completo</label>
                        <input type="text" id="full_name" name="name" autocomplete="name" placeholder="Mario Rossi" value="<?php echo htmlspecialchars($name); ?>" 
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20 placeholder-white/20 hover:bg-white/10">
                        <?php if (!empty($errName)): ?><span class="text-red-400 text-xs mt-1 block"><?php echo $errName; ?></span><?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm text-muted mb-1.5 font-medium">Email</label>
                        <input type="email" id="email" name="mail" autocomplete="email" placeholder="nome@esempio.com" value="<?php echo htmlspecialchars($mail); ?>" 
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20 placeholder-white/20 hover:bg-white/10">
                        <?php if (!empty($errMail)): ?><span class="text-red-400 text-xs mt-1 block"><?php echo $errMail; ?></span><?php endif; ?>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="master_password" class="block text-sm text-muted mb-1.5 font-medium">Password principale</label>
                        <input type="password" id="master_password" name="password" autocomplete="new-password" minlength="8" placeholder="Minimo 8 caratteri" 
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20 placeholder-white/20 hover:bg-white/10">
                        <?php if (!empty($errPSWD)): ?><span class="text-red-400 text-xs mt-1 block"><?php echo $errPSWD; ?></span><?php endif; ?>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="mb-5">
                        <label for="master_password_confirmation" class="block text-sm text-muted mb-1.5 font-medium">Conferma password</label>
                        <input type="password" id="master_password_confirmation" name="password_confirmation" autocomplete="new-password" minlength="8" placeholder="Reinserisci la password" 
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20 placeholder-white/20 hover:bg-white/10">
                        <?php if (!empty($errPSWD2)): ?><span class="text-red-400 text-xs mt-1 block"><?php echo $errPSWD2; ?></span><?php endif; ?>
                    </div>

                    <!-- Terms -->
                    <div class="flex items-start gap-3 mb-6 bg-white/5 p-3 rounded-lg border border-white/5">
                        <input type="checkbox" id="terms" name="terms" value="1" <?php echo isset($_POST['terms']) ? 'checked' : ''; ?> 
                               class="mt-0.5 w-4 h-4 accent-brand cursor-pointer shrink-0 rounded">
                        <div>
                            <label for="terms" class="text-xs text-muted leading-snug cursor-pointer m-0 block">Accetto i Termini di servizio e l'Informativa sulla privacy</label>
                            <?php if (!empty($errTerms)): ?><span class="text-red-400 text-xs mt-1 block"><?php echo $errTerms; ?></span><?php endif; ?>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-brand hover:bg-brand-hover text-black border-none py-3 rounded-xl text-sm font-bold cursor-pointer transition-all duration-300 shadow-[0_4px_15px_rgba(56,229,182,0.2)] hover:shadow-[0_6px_20px_rgba(56,229,182,0.4)] active:scale-[0.98]">
                        Crea account
                    </button>

                </form>

                <div class="text-center mt-5 text-xs text-muted">
                    Hai già un account? <a href="login.php" class="text-white hover:text-brand font-semibold transition-colors duration-300 no-underline">Accedi qui</a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>