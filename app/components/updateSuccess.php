<?php if (isset($_SESSION['update_status'])): ?>

    <!--Toast notif.-->
    <div id="toast-notification" 
         class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-xl shadow-2xl border backdrop-blur-md transition-all duration-500 opacity-100 transform translate-y-0 <?php echo $_SESSION['update_status'] === 'success' ? 'bg-emerald-950/90 border-emerald-500/30 text-emerald-200' : 'bg-rose-950/90 border-rose-500/30 text-rose-200'; ?>">
        
        <!-- main icon -->
        <?php if ($_SESSION['update_status'] === 'success'): ?>
            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        <?php else: ?>
            <svg class="w-5 h-5 text-rose-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        <?php endif; ?>

        <!-- mess. -->
        <span class="text-sm font-medium">
            <?php echo htmlspecialchars($_SESSION['update_msg']); ?>
        </span>

        <button type="button" onclick="dismissToast()" class="ml-2 text-slate-400 hover:text-white transition-colors cursor-pointer p-0.5">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- js trigger -->
    <script>
        function dismissToast() {
            const toast = document.getElementById('toast-notification');
            if (toast) {
                // Scomparsa fluida (Fade-out e traslazione verso l'alto)
                toast.classList.add('opacity-0', '-translate-y-2');
                setTimeout(() => toast.remove(), 500);
            }
        }

        setTimeout(dismissToast, 4000);
    </script>

    <?php 
    unset($_SESSION['update_status']);
    unset($_SESSION['update_msg']);
    ?>
<?php endif; ?>