<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LockGuard - Il tuo Vault Digitale Sicuro</title>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white font-sans antialiased selection:bg-emerald-500 selection:text-white">

    <!-- Navbar -->
    <nav class="w-full absolute top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="font-bold text-xl tracking-wider">LOCKGUARD</span>
                </div>

                <!-- Link Autenticazione -->
                <div class="flex items-center space-x-4">
                    <a href="login.html" class="text-sm font-semibold text-gray-300 hover:text-white transition">Accedi</a>
                    <a href="register.html" class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-lg shadow-emerald-500/30">
                        Registrati
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="relative pt-24 pb-12 sm:pt-32 lg:pb-24 overflow-hidden bg-[#0d222e]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <!-- Banner Immagine Hero -->
            <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-emerald-900/20 border border-slate-700/50 max-w-5xl mx-auto transition-transform hover:scale-[1.01] duration-500">
                <img src="image_71467c.jpg" alt="LockGuard Hero Banner" class="w-full h-auto object-cover">
            </div>

        </div>
    </main>

    <!-- Sezione Features -->
    <section class="py-20 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white sm:text-4xl">La sicurezza al primo posto</h2>
                <p class="mt-4 text-lg text-slate-400">Proteggi la tua identità digitale con un'architettura progettata per resistere alle minacce moderne.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-emerald-500/50 transition-colors">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Crittografia AES-256</h3>
                    <p class="text-slate-400">Le tue password e note vengono cifrate in modo sicuro prima di qualsiasi archiviazione.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-emerald-500/50 transition-colors">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Note Sicure</h3>
                    <p class="text-slate-400">Archivia informazioni riservate, credenziali e note personali in totale privacy.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-emerald-500/50 transition-colors">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Generatore Integrato</h3>
                    <p class="text-slate-400">Genera password ad alta entropia e controllane la robustezza in tempo reale.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-800 py-8 text-center">
        <p class="text-slate-500 text-sm">&copy; 2026 LockGuard. Tutti i diritti riservati.</p>
    </footer>

</body>
</html>