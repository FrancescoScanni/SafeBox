<header class="md:hidden h-16 flex items-center justify-between px-5 border-b border-white/10">
  <label for="sidebar-toggle" class="cursor-pointer p-1 -ml-1 text-slate-300 hover:text-white">
    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
  </label>
  <span class="font-display font-extrabold text-sm">LOCK<span class="text-teal-400">GUARD</span></span>
  <div class="w-8 h-8 rounded-full bg-teal-400/15 border border-teal-400/25 flex items-center justify-center text-[10px] font-bold text-teal-300">
    <?php echo htmlspecialchars($userInitials ?? 'AM'); ?>
  </div>
</header>