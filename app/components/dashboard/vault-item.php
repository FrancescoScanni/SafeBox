<?php
  
?>

<div class="flex items-center gap-4 px-5 py-4 border-b border-white/5 hover:bg-white/5 transition-colors group">
  
  <!-- Iniziale -->
  <div class="w-10 h-10 rounded-xl bg-teal-400/10 border border-teal-400/20 flex items-center justify-center text-sm font-bold text-teal-300 shrink-0">
    G
  </div>
  
  <!-- Info Nome e Username -->
  <div class="min-w-0 flex-1">
    <p class="text-sm font-semibold truncate text-white">Gmail</p>
    <p class="text-xs text-slate-400 truncate">alex.morgan@gmail.com</p>
  </div>
  
  <!-- Azioni Password -->
  <div class="hidden sm:flex items-center gap-2 w-40">
    <span class="text-sm font-mono text-slate-300 tracking-wider truncate">••••••••••</span>
    <button type="button" class="text-slate-500 hover:text-teal-300 transition-colors p-1">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><circle cx="12" cy="12" r="3" /></svg>
    </button>
    <button type="button" class="text-slate-500 hover:text-teal-300 transition-colors p-1">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6a2 2 0 012 2v10a2 2 0 01-2 2H8a2 2 0 01-2-2V9a2 2 0 012-2z" /></svg>
    </button>
  </div>

  <!-- Categoria -->
  <span class="hidden md:inline-block text-xs text-slate-500 bg-white/5 border border-white/10 rounded-full px-3 py-1 shrink-0">
    Personal
  </span>
  
  <!-- Data -->
  <span class="hidden lg:inline text-xs text-slate-500 shrink-0 w-24 text-right">
    2 days ago
  </span>

  <!-- Azioni Modifica/Elimina (Visibili al passaggio del mouse) -->
  <div class="flex items-center gap-1 shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
    <button class="text-slate-500 hover:text-teal-300 transition-colors p-1.5">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
    </button>
    <button class="text-slate-500 hover:text-red-400 transition-colors p-1.5">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
    </button>
  </div>
</div>