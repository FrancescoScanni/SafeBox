<?php
  function nav_link_classes(string $key, string $activeNav): string {
      if ($key === $activeNav) {
          return 'flex items-center gap-3 px-3 py-2.5 rounded-lg bg-teal-400/10 border border-teal-400/20 text-teal-300 text-sm font-semibold';
      }
      return 'flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors';
  }
?>


<aside class="fixed md:static inset-y-0 left-0 z-40 w-72 shrink-0 -translate-x-full peer-checked:translate-x-0 md:translate-x-0 transition-transform duration-300 bg-navy-900/60 border-r border-white/10 flex flex-col">

    <!-- LOGO -->
    <a href="../../index.php"><div class="h-20 flex items-center gap-2.5 px-6 border-b border-white/10">
      <svg width="26" height="30" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 1L28 6.5V16C28 24.5 22.5 30.8 15 33C7.5 30.8 2 24.5 2 16V6.5L15 1Z" stroke="#2dd4bf" stroke-width="1.8" stroke-linejoin="round"/>
        <rect x="10.5" y="15" width="9" height="8" rx="1.5" stroke="#2dd4bf" stroke-width="1.6"/>
        <path d="M12.2 15V12.6C12.2 10.9 13.5 9.6 15 9.6C16.5 9.6 17.8 10.9 17.8 12.6V15" stroke="#2dd4bf" stroke-width="1.6"/>
        <circle cx="15" cy="19" r="1.3" fill="#2dd4bf"/>
      </svg>
      <span class="font-display font-extrabold text-base tracking-tight">LOCK<span class="text-teal-400">GUARD</span></span>
    </div></a>


    <!-- NAVBAR -->
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
      <p class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Vault</p>

      <!--passwords-->
      <a href="../../pages/dashboard.php?section=passwords" class="<?php echo nav_link_classes('passwords', $activeNav); ?>">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 11-12 0 6 6 0 0112 0zM7 9l-4 4m0 0l2 2m-2-2l2-2" /></svg>
        Passwords
      </a>

      <!--secure notes-->
      <a href="../../pages/dashboard.php?section=notes" class="<?php echo nav_link_classes('notes', $activeNav); ?>">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
        Secure notes
      </a>

      <!--shared with me-->
      <a href="../../pages/dashboard.php?section=shared" class="<?php echo nav_link_classes('shared', $activeNav); ?>">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342a4 4 0 100-2.684m0 2.684a4 4 0 110-2.684m0 2.684L15.316 17.66m-6.632-9.32L15.316 6M6 12a4 4 0 108 0 4 4 0 00-8 0z" /></svg>
        Shared with me
      </a>

      <p class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-500 mt-6 mb-2">Tools</p>

      <a href="../../pages/dashboard.php?section=generator" class="<?php echo nav_link_classes('generator', $activeNav); ?>">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
        Generator
      </a>
      <a href="../../pages/dashboard.php?section=breach" class="<?php echo nav_link_classes('breach', $activeNav); ?>">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
        Breach watch
      </a>

      <p class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-500 mt-6 mb-2">Account</p>

      <a href="settings.php" class="<?php echo nav_link_classes('settings', $activeNav); ?>">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Settings
      </a>
    </nav>


    <!-- Account MOD -->
    <div class="px-4 py-4 border-t border-white/10 flex items-center gap-3">
      <div class="w-9 h-9 rounded-full bg-teal-400/15 border border-teal-400/25 flex items-center justify-center text-xs font-bold text-teal-300 shrink-0">
        <?php echo htmlspecialchars($_SESSION['user_initials'] ?? 'P'); ?>
      </div>
      <div class="min-w-0 flex-1">
        <p class="text-sm font-semibold truncate"><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Unknown User'); ?></p>
        <p class="text-xs text-slate-500 truncate"><?php echo htmlspecialchars($_SESSION['user_email'] ?? 'unknown@example.com'); ?></p>
      </div>
      <a href="../../pages/user/logout.php" onclick="return confirm('Sure you want to log out?')" title="Log out" class="text-slate-400 hover:text-white transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded-md p-1">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
      </a>
    </div>
</aside>