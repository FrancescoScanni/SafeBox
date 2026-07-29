<?php
    $logo='<div class="relative flex items-center justify-center min-h-[460px] lg:min-h-[540px]">
            <!-- Cybernetic background wave circle -->
            <div class="absolute w-[340px] h-[340px] sm:w-[420px] sm:h-[420px] rounded-full border border-teal-500/20 animate-spin" style="animation-duration: 40s;"></div>
            <div class="absolute w-[260px] h-[260px] sm:w-[320px] sm:h-[320px] rounded-full border border-dashed border-cyan-400/25 animate-spin" style="animation-duration: 25s; animation-direction: reverse;"></div>
            <!-- ================= FLOATING CARDS & CHIPS ================= -->
            <!-- Chip 1: Google (Top Left) -->
            <div class="animate-float-slow absolute -top-2 left-2 sm:left-6 z-20 bg-slate-900/80 backdrop-blur-xl border border-white/15 px-4 py-2.5 rounded-2xl shadow-2xl shadow-cyan-950/80 flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-white flex items-center justify-center shrink-0 shadow-sm">
                <!-- Google Logo -->
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.11-6.72-4.96H1.29v3.15C3.26 21.3 7.37 24 12 24z"/>
                <path fill="#FBBC05" d="M5.28 14.24c-.25-.72-.38-1.49-.38-2.24s.13-1.52.38-2.24V6.61H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.39l3.99-3.15z"/>
                <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.37 0 3.26 2.7 1.29 6.61l3.99 3.15c.95-2.85 3.6-4.96 6.72-4.96z"/>
                </svg>
            </div>
            <div>
                <div class="text-[11px] font-semibold text-slate-200">Google Account</div>
                <div class="text-[10px] text-teal-400 font-mono tracking-wider">••••••••••••</div>
            </div>
            </div>
            <!-- Chip 2: Netflix (Top Right) -->
            <div class="animate-float-reverse absolute top-6 -right-2 sm:right-4 z-20 bg-slate-900/80 backdrop-blur-xl border border-white/15 px-3.5 py-2.5 rounded-2xl shadow-2xl shadow-cyan-950/80 flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-black flex items-center justify-center shrink-0 border border-white/10">
                <span class="text-red-600 font-black text-base tracking-tighter">N</span>
            </div>
            <div>
                <div class="text-[11px] font-semibold text-slate-200">Netflix</div>
                <div class="text-[10px] text-emerald-400 font-medium flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Protected
                </div>
            </div>
            </div>
            <!-- Chip 3: Security Badge (Bottom Left) -->
            <div class="animate-float-reverse absolute bottom-8 -left-2 sm:left-2 z-20 bg-slate-900/85 backdrop-blur-xl border border-teal-500/30 px-4 py-3 rounded-2xl shadow-2xl shadow-teal-950/90 flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-teal-500/20 border border-teal-400/30 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <div>
                <div class="text-xs font-bold text-white">Encrypted Vault</div>
                <div class="text-[10px] text-slate-400">AES-256 Active</div>
            </div>
            </div>
            <!-- Chip 4: Master Key Badge (Bottom Right) -->
            <div class="animate-float-slow absolute bottom-2 right-2 sm:right-6 z-20 bg-slate-900/80 backdrop-blur-xl border border-white/15 px-3.5 py-2.5 rounded-2xl shadow-2xl flex items-center gap-2.5">
            <div class="w-7 h-7 rounded-lg bg-cyan-500/20 flex items-center justify-center text-cyan-300">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </div>
            <span class="text-[11px] font-semibold text-slate-200">Private Key</span>
            </div>
            <!-- ================= CENTRAL 3D SHIELD & LOCK VISUAL ================= -->
            <div class="relative z-10 glow-cyan transform hover:scale-[1.02] transition-transform duration-500">
            <svg class="w-72 h-72 sm:w-88 sm:h-88 lg:w-96 lg:h-96" viewBox="0 0 360 360" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                <!-- Shield gloss gradients -->
                <linearGradient id="shieldBg" x1="180" y1="20" x2="180" y2="340" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0f2942" stop-opacity="0.85"/>
                    <stop offset="1" stop-color="#061322" stop-opacity="0.95"/>
                </linearGradient>
                <linearGradient id="shieldBorder" x1="40" y1="20" x2="320" y2="340" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#2dd4bf"/>
                    <stop offset="0.5" stop-color="#38bdf8"/>
                    <stop offset="1" stop-color="#1e40af"/>
                </linearGradient>
                <linearGradient id="lockBodyGrad" x1="120" y1="160" x2="240" y2="290" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#1e293b"/>
                    <stop offset="0.5" stop-color="#0f172a"/>
                    <stop offset="1" stop-color="#090d16"/>
                </linearGradient>
                <linearGradient id="shackleGrad" x1="140" y1="90" x2="220" y2="180" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#e2e8f0"/>
                    <stop offset="0.5" stop-color="#94a3b8"/>
                    <stop offset="1" stop-color="#475569"/>
                </linearGradient>
                <linearGradient id="keyGrad" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#2dd4bf"/>
                    <stop offset="1" stop-color="#38bdf8"/>
                </linearGradient>
                <filter id="glowEffect" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="8" result="blur" />
                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                </filter>
                </defs>
                <!-- Main shield -->
                <path d="M180 24L310 65V170C310 250 250 305 180 336C110 305 50 250 50 170V65L180 24Z"
                    fill="url(#shieldBg)" stroke="url(#shieldBorder)" stroke-width="4.5" stroke-linejoin="round"/>
                <!-- Shield inner neon accent line -->
                <path d="M180 40L292 76V165C292 233 241 282 180 310C119 282 68 233 68 165V76L180 40Z"
                    stroke="#2dd4bf" stroke-width="1.2" stroke-opacity="0.35" fill="none"/>
                <!-- LOCK SHACKLE -->
                <path d="M135 170V125C135 100.1 155.1 80 180 80C204.9 80 225 100.1 225 125V170"
                    stroke="url(#shackleGrad)" stroke-width="18" stroke-linecap="round" fill="none"/>
                <!-- 3D LOCK BODY -->
                <rect x="110" y="160" width="140" height="115" rx="22" fill="url(#lockBodyGrad)" stroke="#38bdf8" stroke-width="2" stroke-opacity="0.6"/>
                <!-- Lock inner glowing border -->
                <rect x="118" y="168" width="124" height="99" rx="16" stroke="white" stroke-opacity="0.08" fill="none"/>
                <!-- CENTRAL PORTHOLE AND KEYHOLE WITH GLOW -->
                <circle cx="180" cy="205" r="22" fill="#060d19" stroke="#2dd4bf" stroke-width="2.5" filter="url(#glowEffect)"/>
                <circle cx="180" cy="205" r="8" fill="#2dd4bf"/>
                <path d="M176 210L184 210L186 228L174 228Z" fill="#2dd4bf"/>
                <!-- ENTERING FLOATING CYBER KEY -->
                <g transform="translate(210, 180) rotate(-25)">
                <!-- Key shaft -->
                <path d="M0 0H55" stroke="url(#keyGrad)" stroke-width="5" stroke-linecap="round" filter="url(#glowEffect)"/>
                <path d="M35 0V8" stroke="url(#keyGrad)" stroke-width="4" stroke-linecap="round"/>
                <path d="M47 0V6" stroke="url(#keyGrad)" stroke-width="4" stroke-linecap="round"/>
                <!-- Key bow with crest -->
                <circle cx="-10" cy="0" r="14" fill="#0b1f3a" stroke="#2dd4bf" stroke-width="3"/>
                <circle cx="-10" cy="0" r="5" fill="#38bdf8"/>
                </g>
                <!-- Decorative glowing particles around shield -->
                <circle cx="90" cy="90" r="3" fill="#2dd4bf" class="animate-ping" style="animation-duration: 3s;"/>
                <circle cx="280" cy="260" r="2.5" fill="#38bdf8" class="animate-ping" style="animation-duration: 4s;"/>
                <circle cx="290" cy="110" r="2" fill="#5eead4"/>
                <circle cx="70" cy="230" r="2" fill="#38bdf8"/>
            </svg>
            </div>
        </div>
        </div>';
?>