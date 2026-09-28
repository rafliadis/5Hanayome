{{-- ==========================================
     HEADER BERGAYA RESMI TBS (TRANSPARAN & HAMBURGER-ONLY)
     <!-- DIUBAH: Menu horizontal dihilangkan, diganti mode hamburger-only -->
     ========================================== --}}
<header class="bg-black/45 backdrop-blur-md text-white h-14 sm:h-16 flex items-center border-b border-white/10 shadow-lg relative z-40 transition-colors duration-300">
    <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-2 sm:gap-4">

            {{-- Sisi Kiri: Logo Anime & TBS Tag (Redirect ke Home) --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 group select-none flex-shrink-0 focus:outline-none">
                <span class="bg-[#ff007a] text-white font-extrabold text-[10px] sm:text-xs px-2.5 py-0.5 sm:py-1 rounded-full shadow-md transition-transform group-hover:scale-105 border border-white/30 tracking-wider">
                    TBS
                </span>
                <div class="leading-tight drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)]">
                    <span class="block font-black text-base sm:text-xl tracking-wide text-white group-hover:text-pink-200 transition">五等分の花嫁</span>
                    <span class="block text-[8px] sm:text-[9px] text-pink-200/90 font-semibold tracking-wider font-serif">THE QUINTESSENTIAL QUINTUPLETS</span>
                </div>
            </a>

            <!-- HAPUS: Menu horizontal desktop sejajar dihapus sesuai gaya situs resmi TBS yang bersih -->

            {{-- Sisi Kanan: Switcher Bahasa Ringkas (JP/EN/ID) + Tombol Hamburger Bulat --}}
            <!-- DIUBAH: Sisi kanan disederhanakan hanya berisi switcher bahasa & tombol hamburger bulat -->
            <div class="flex items-center gap-2 sm:gap-3">
                {{-- Switcher 3 Bahasa Ringkas (JP - EN - ID) --}}
                <div class="flex items-center bg-black/50 p-0.5 sm:p-1 rounded-xl backdrop-blur-md border border-white/20 shadow-inner" role="group" aria-label="Language Selector">
                    <button type="button"
                            id="lang-btn-jp"
                            onclick="setLanguage('jp')"
                            title="日本語 (Japanese)"
                            aria-label="Japanese Language"
                            class="lang-btn px-2 sm:px-2.5 py-1 rounded-lg text-[11px] sm:text-xs transition duration-200 text-white/80 hover:text-white hover:bg-white/20 font-bold">
                        JP
                    </button>

                    <button type="button"
                            id="lang-btn-en"
                            onclick="setLanguage('en')"
                            title="English"
                            aria-label="English Language"
                            class="lang-btn px-2 sm:px-2.5 py-1 rounded-lg text-[11px] sm:text-xs transition duration-200 text-white/80 hover:text-white hover:bg-white/20 font-bold">
                        EN
                    </button>

                    <button type="button"
                            id="lang-btn-id"
                            onclick="setLanguage('id')"
                            title="Bahasa Indonesia"
                            aria-label="Indonesian Language"
                            class="lang-btn px-2 sm:px-2.5 py-1 rounded-lg text-[11px] sm:text-xs transition duration-200 bg-[#ff007a] text-white shadow font-black scale-105">
                        ID
                    </button>
                </div>

                {{-- SATU Tombol Hamburger Bulat --}}
                <button type="button"
                        id="btn-hamburger"
                        onclick="toggleNavOverlay()"
                        aria-label="Buka Menu Navigasi"
                        aria-expanded="false"
                        class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-white/20 hover:bg-[#ff007a] active:bg-pink-700 backdrop-blur-md border border-white/30 shadow-lg flex items-center justify-center text-white transition transform hover:scale-105 active:scale-95 focus:outline-none flex-shrink-0">
                    <svg id="icon-menu-open" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
</header>

{{-- ==========================================
     OVERLAY MENU NAVIGASI LAYAR PENUH (HAMBURGER PANEL)
     <!-- DIUBAH: Menampung seluruh navigasi MPA dengan backdrop blur & dismiss escape/click luar -->
     ========================================== --}}
<div id="nav-overlay"
     onclick="if(event.target === this) closeNavOverlay();"
     class="fixed inset-0 z-[9999] bg-slate-950/90 backdrop-blur-xl hidden flex flex-col justify-between p-6 sm:p-10 select-none transition-all duration-300"
     role="dialog"
     aria-modal="true"
     aria-label="Navigation Menu Modal">

    {{-- Header Overlay dengan Tombol Close --}}
    <div class="flex items-center justify-between border-b border-white/15 pb-4 max-w-5xl mx-auto w-full">
        <div class="flex items-center gap-3">
            <span class="bg-[#ff007a] text-white font-black text-xs px-2.5 py-1 rounded-full shadow border border-white/30">
                五等分
            </span>
            <span class="font-black text-lg sm:text-xl text-white tracking-wider font-serif">TBS ANIME PORTAL</span>
        </div>

        {{-- Tombol Tutup (X) --}}
        <button type="button"
                onclick="closeNavOverlay()"
                aria-label="Tutup Menu (Escape)"
                class="w-11 h-11 rounded-full bg-white/15 hover:bg-[#ff007a] text-white transition flex items-center justify-center border border-white/30 focus:outline-none hover:scale-105 active:scale-95">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Daftar Menu Tautan URL Langsung (Grid Navigasi Lengkap) --}}
    <div class="my-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 max-w-5xl mx-auto w-full py-6">
        {{-- 1. Home --}}
        <a href="{{ route('home') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('home') || request()->is('/')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </span>
                <span data-i18n="nav.home">Home</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">ホーム &rarr;</span>
        </a>

        {{-- 2. News --}}
        <a href="{{ route('news') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('news') || request()->is('news*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </span>
                <span data-i18n="nav.news">News</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">ニュース &rarr;</span>
        </a>

        {{-- 3. Character --}}
        <a href="{{ route('karakter.index') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('karakter.*') || request()->routeIs('character.*') || request()->is('karakter*') || request()->is('character*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </span>
                <span data-i18n="nav.character">Character</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">キャラクター &rarr;</span>
        </a>

        {{-- 4. Staff & Cast --}}
        <a href="{{ route('staff_cast') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('staff_cast') || request()->is('staff-cast*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/></svg>
                </span>
                <span data-i18n="nav.staff_cast">Staff & Cast</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">スタッフ・キャスト &rarr;</span>
        </a>

        {{-- 5. On Air --}}
        <a href="{{ route('onair') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('onair') || request()->is('on-air*') || request()->is('onair*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
                <span data-i18n="nav.onair">On Air</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">放送情報 &rarr;</span>
        </a>

        {{-- 6. Music --}}
        <a href="{{ route('music') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('music') || request()->is('music*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </span>
                <span data-i18n="nav.music">Music</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">音楽情報 &rarr;</span>
        </a>

        {{-- 7. Goods --}}
        <a href="{{ route('goods') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('goods') || request()->is('goods*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group sm:col-span-2 lg:col-span-3">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </span>
                <span data-i18n="nav.goods">Goods</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">公式グッズ &rarr;</span>
        </a>
    </div>

    {{-- Footer Overlay --}}
    <div class="border-t border-white/15 pt-4 text-center text-xs text-white/60 max-w-5xl mx-auto w-full">
        <span>© 春場ねぎ・講談社／「五等分の花嫁」製作委員会・TBSテレビ</span>
    </div>
</div>

<script>
    function toggleNavOverlay() {
        const overlay = document.getElementById('nav-overlay');
        const btn = document.getElementById('btn-hamburger');
        if (overlay) {
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            if (btn) btn.setAttribute('aria-expanded', 'true');
        }
    }

    function closeNavOverlay() {
        const overlay = document.getElementById('nav-overlay');
        const btn = document.getElementById('btn-hamburger');
        if (overlay) {
            overlay.classList.add('hidden');
            overlay.classList.remove('flex');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        }
    }

    // Escape key listener untuk menutup overlay
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeNavOverlay();
        }
    });
</script>

{{-- Overlay Menu Navigasi Layar Penuh (Mobile Drawer) --}}
<div id="nav-overlay"
     class="fixed inset-0 z-[9999] bg-slate-950/90 backdrop-blur-xl hidden flex flex-col justify-between p-6 sm:p-10 select-none transition-all duration-300"
     role="dialog"
     aria-modal="true"
     aria-label="Navigation Menu Modal">

    {{-- Header Overlay dengan Tombol Close --}}
    <div class="flex items-center justify-between border-b border-white/15 pb-4 max-w-5xl mx-auto w-full">
        <div class="flex items-center gap-3">
            <span class="bg-[#ff007a] text-white font-black text-xs px-2.5 py-1 rounded-full shadow border border-white/30">
                五等分
            </span>
            <span class="font-black text-lg sm:text-xl text-white tracking-wider font-serif">TBS ANIME PORTAL</span>
        </div>

        <button type="button"
                onclick="closeNavOverlay()"
                aria-label="Tutup Menu (Escape)"
                class="w-11 h-11 rounded-full bg-white/15 hover:bg-[#ff007a] text-white transition flex items-center justify-center border border-white/30 focus:outline-none hover:scale-105">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Daftar Menu Tautan URL Langsung (Mobile Grid) --}}
    <div class="my-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 max-w-5xl mx-auto w-full py-6">
        {{-- 1. Home --}}
        <a href="{{ route('home') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('home') || request()->is('/')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </span>
                <span data-i18n="nav.home">Home</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">ホーム &rarr;</span>
        </a>

        {{-- 2. News --}}
        <a href="{{ route('news') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('news') || request()->is('news*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </span>
                <span data-i18n="nav.news">News</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">ニュース &rarr;</span>
        </a>

        {{-- 3. Character --}}
        <a href="{{ route('karakter.index') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('karakter.*') || request()->routeIs('character.*') || request()->is('karakter*') || request()->is('character*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </span>
                <span data-i18n="nav.character">Character</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">キャラクター &rarr;</span>
        </a>

        {{-- 4. Staff & Cast --}}
        <a href="{{ route('staff_cast') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('staff_cast') || request()->is('staff-cast*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/></svg>
                </span>
                <span data-i18n="nav.staff_cast">Staff & Cast</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">スタッフ・キャスト &rarr;</span>
        </a>

        {{-- 5. On Air --}}
        <a href="{{ route('onair') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('onair') || request()->is('on-air*') || request()->is('onair*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
                <span data-i18n="nav.onair">On Air</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">放送情報 &rarr;</span>
        </a>

        {{-- 6. Music --}}
        <a href="{{ route('music') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('music') || request()->is('music*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </span>
                <span data-i18n="nav.music">Music</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">音楽情報 &rarr;</span>
        </a>

        {{-- 7. Goods --}}
        <a href="{{ route('goods') }}" class="p-4 sm:p-5 rounded-2xl {{ (request()->routeIs('goods') || request()->is('goods*')) ? 'bg-[#ff007a] border-[#ff007a]' : 'bg-white/10 hover:bg-[#ff007a] border-white/15' }} border text-white font-extrabold text-lg sm:text-xl text-left transition transform hover:-translate-y-1 shadow-lg flex items-center justify-between group sm:col-span-2 lg:col-span-3">
            <div class="flex items-center gap-3">
                <span class="text-pink-300 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </span>
                <span data-i18n="nav.goods">Goods</span>
            </div>
            <span class="text-xs text-white/60 group-hover:text-white font-serif">公式グッズ &rarr;</span>
        </a>
    </div>

    {{-- Footer Overlay --}}
    <div class="border-t border-white/15 pt-4 text-center text-xs text-white/60 max-w-5xl mx-auto w-full">
        <span>© 春場ねぎ・講談社／「五等分の花嫁」製作委員会・TBSテレビ</span>
    </div>
</div>

<script>
    function toggleNavOverlay() {
        const overlay = document.getElementById('nav-overlay');
        const btn = document.getElementById('btn-hamburger');
        if (overlay) {
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            btn.setAttribute('aria-expanded', 'true');
        }
    }

    function closeNavOverlay() {
        const overlay = document.getElementById('nav-overlay');
        const btn = document.getElementById('btn-hamburger');
        if (overlay) {
            overlay.classList.add('hidden');
            overlay.classList.remove('flex');
            btn.setAttribute('aria-expanded', 'false');
        }
    }

    // Escape key listener untuk menutup overlay
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeNavOverlay();
        }
    });
</script>
