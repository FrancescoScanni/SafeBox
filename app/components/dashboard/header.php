<?php
// $vaultItems viene definito in dashboard.php PRIMA dell'include.
include_once("../models/password.php");
$itemCount = Password::countPSWD($_SESSION["user_id"]);
?>
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
  <div>
    <h1 class="font-display font-extrabold text-3xl tracking-tight">My Vault</h1>
    <p class="text-sm text-slate-400 mt-1">
      <?php echo $itemCount; ?> password<?php echo $itemCount === 1 ? '' : 's'; ?> saved
    </p>
  </div>

  <div class="flex items-center gap-3">
    <div class="relative">
      <svg class="w-4 h-4 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8" /><path stroke-linecap="round" d="M21 21l-4.35-4.35" /></svg>
      <input type="text" id="searchInput" name="q" placeholder="Search vault..." class="w-full sm:w-64 bg-white/5 border border-white/10 rounded-full pl-10 pr-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
    </div>

    <label for="add-modal-toggle" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-400 to-teal-500 hover:from-emerald-300 hover:to-teal-400 text-navy-950 font-bold text-sm px-5 py-2.5 rounded-full shadow-lg shadow-emerald-500/25 transition-all cursor-pointer focus:outline-none focus-visible:ring-2 focus-visible:ring-white whitespace-nowrap">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
      Add password
    </label>
  </div>
</div>