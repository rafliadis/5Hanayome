{{-- =========================================================================
     MODAL BANNER PROMOSI OTOMATIS (POPUP ENTRY BANNER BERGAYA RESMI TBS)
     Muncul otomatis saat pengunjung pertama kali membuka situs web.
     Sesuai referensi resmi: "新作アニメプロジェクト始動！ TVアニメ 五等分の花嫁 【春夏秋冬】 & 新作OVA 制作決定！"
     ========================================================================= --}}

<div id="entry-promo-modal"
     onclick="if(event.target === this) closePromoModal();"
     class="fixed inset-0 z-[99999] bg-black/80 backdrop-blur-md hidden opacity-0 transition-all duration-500 ease-out flex items-center justify-center p-3 sm:p-6 select-none"
     role="dialog"
     aria-modal="true"
     aria-label="Promotional Announcement Modal">

    {{-- Kontainer Card Banner --}}
    <div id="promo-modal-card"
         class="relative w-full max-w-2xl sm:max-w-3xl md:max-w-4xl bg-gradient-to-br from-pink-100 via-white to-pink-50 rounded-2xl sm:rounded-3xl overflow-hidden shadow-[0_25px_60px_-15px_rgba(255,0,122,0.35),0_0_50px_rgba(0,0,0,0.8)] border-2 border-white/80 transform scale-90 transition-all duration-500 ease-out">

        {{-- Tombol Tutup (X) Melayang di Pojok Kanan Atas --}}
        <button type="button"
                onclick="closePromoModal()"
                aria-label="Tutup Pengumuman Promo"
                class="absolute top-3 right-3 sm:top-4 sm:right-4 z-30 w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-black/60 hover:bg-[#ff007a] active:bg-pink-700 text-white backdrop-blur-md border border-white/40 shadow-xl flex items-center justify-center transition-all duration-200 transform hover:scale-110 active:scale-95 focus:outline-none">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Banner Link Menuju Berita / Halaman Detail --}}
        <a href="{{ route('news') }}"
           class="block group relative overflow-hidden focus:outline-none cursor-pointer">

            {{-- Background Gambar Visual Kembar 5 --}}
            <div class="relative w-full aspect-[16/10] sm:aspect-[16/9] min-h-[300px] sm:min-h-[420px] max-h-[560px] bg-pink-50 overflow-hidden">
                <img
                    src="{{ file_exists(public_path('images/banner.jpg')) ? asset('images/banner.jpg') : (file_exists(public_path('images/wallpaper.jpg')) ? asset('images/wallpaper.jpg') : 'https://cdn.myanimelist.net/images/anime/1813/118713l.jpg') }}"
                    alt="TVアニメ「五等分の花嫁」新作アニメプロジェクト始動！"
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
                    onerror="this.onerror=null; this.src='https://cdn.myanimelist.net/images/anime/1813/118713l.jpg';"
                >

                {{-- Overlay Lembut Sakura & Gradasi Cahaya --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent sm:bg-gradient-to-r sm:from-transparent sm:via-white/30 sm:to-white/95 pointer-events-none"></div>

                {{-- Watermark Latar Belakang Tulisan Jepang & Latin --}}
                <div class="absolute top-2 left-4 sm:left-6 font-serif font-black text-xs sm:text-sm tracking-widest text-slate-700/40 select-none uppercase">
                    5toubun no hanayome
                </div>

                {{-- Dekorasi Kelopak Sakura Melayang --}}
                <div class="absolute inset-0 pointer-events-none overflow-hidden">
                    <span class="absolute top-6 left-1/4 text-pink-300/80 text-xl animate-bounce" style="animation-duration: 3s;">🌸</span>
                    <span class="absolute top-1/3 right-1/4 text-pink-400/70 text-lg animate-pulse" style="animation-duration: 2s;">🌸</span>
                    <span class="absolute bottom-10 left-1/3 text-pink-300/60 text-base animate-bounce" style="animation-duration: 4s;">🌸</span>
                </div>

                {{-- Konten Teks & Tipografi Banner Resmi TBS --}}
                <div class="absolute inset-x-0 bottom-0 sm:inset-y-0 sm:right-0 sm:left-auto sm:w-[54%] p-4 sm:p-8 md:p-10 flex flex-col justify-center items-center sm:items-start text-center sm:text-left z-20 space-y-2 sm:space-y-4">

                    {{-- Badge Gradasi Emas / Oranye "新作アニメプロジェクト始動！" --}}
                    <div class="inline-block bg-gradient-to-r from-amber-600 via-amber-500 to-amber-600 text-white font-black text-xs sm:text-base md:text-xl px-4 sm:px-6 py-1 sm:py-2 rounded-lg sm:rounded-xl shadow-lg border border-amber-300/60 tracking-wider transform -rotate-1 group-hover:rotate-0 transition-transform">
                        <span data-i18n="modal.promo_badge">新作アニメプロジェクト始動！</span>
                    </div>

                    {{-- Judul Utama Anime --}}
                    <div class="space-y-0.5 sm:space-y-1">
                        <p class="text-[10px] sm:text-xs font-bold text-pink-600 sm:text-slate-600 tracking-widest uppercase font-serif">
                            TVアニメ
                        </p>
                        <h2 data-i18n="modal.promo_title" class="text-2xl sm:text-3xl md:text-4xl font-black text-white sm:text-slate-900 tracking-tight font-serif drop-shadow sm:drop-shadow-none leading-none">
                            五等分の花嫁
                        </h2>
                        <p data-i18n="modal.promo_sub" class="text-sm sm:text-lg md:text-xl font-black text-pink-300 sm:text-pink-600 font-serif tracking-wide">
                            【春夏秋冬】 <span class="text-white sm:text-slate-800 text-xs sm:text-base">&</span> 新作OVA
                        </p>
                    </div>

                    {{-- Pengumuman Produksi (制作決定！) --}}
                    <div class="pt-0.5 sm:pt-1">
                        <span data-i18n="modal.promo_status" class="text-base sm:text-2xl md:text-3xl font-black text-pink-400 sm:text-[#ff007a] tracking-wider drop-shadow-sm font-serif">
                            制作決定！
                        </span>
                    </div>

                    {{-- Tombol CTA & Panah --}}
                    <div class="pt-2 sm:pt-3">
                        <span class="inline-flex items-center gap-2 bg-[#ff007a] text-white group-hover:bg-[#ff5c93] px-4 sm:px-6 py-1.5 sm:py-2.5 rounded-full text-xs sm:text-sm font-extrabold shadow-md transition transform group-hover:scale-105">
                            <span data-i18n="modal.promo_btn">最新情報をチェック</span>
                            <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </span>
                    </div>

                    {{-- Copyright Resmi --}}
                    <div class="pt-1 text-[8px] sm:text-[9px] text-white/80 sm:text-slate-400 font-medium">
                        ©春場ねぎ・講談社／「五等分の花嫁＊」製作委員会
                    </div>

                </div>

            </div>
        </a>

    </div>
</div>

<script>
    /**
     * Membuka Banner Modal Promosi Otomatis
     */
    function openPromoModal() {
        const modal = document.getElementById('entry-promo-modal');
        const card = document.getElementById('promo-modal-card');
        if (!modal || !card) return;

        modal.classList.remove('hidden');
        // Force reflow agar transisi CSS berjalan mulus
        void modal.offsetWidth;

        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');

        card.classList.remove('scale-90');
        card.classList.add('scale-100');
    }

    /**
     * Menutup Banner Modal Promosi
     */
    function closePromoModal() {
        const modal = document.getElementById('entry-promo-modal');
        const card = document.getElementById('promo-modal-card');
        if (!modal || !card) return;

        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');

        card.classList.remove('scale-100');
        card.classList.add('scale-90');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 400);

        try {
            // Simpan status bahwa user sudah melihat promo di sesi ini
            sessionStorage.setItem('5hanayome_promo_seen', 'true');
        } catch (e) {}
    }

    // Listener Escape untuk menutup modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closePromoModal();
        }
    });

    // Otomatis muncul saat website pertama kali dibuka
    window.addEventListener('load', () => {
        let hasSeenPromo = false;
        try {
            hasSeenPromo = sessionStorage.getItem('5hanayome_promo_seen') === 'true';
        } catch (e) {
            hasSeenPromo = false;
        }

        // Tampilkan otomatis setelah delay 600ms untuk pengalaman visual yang memukau
        setTimeout(() => {
            openPromoModal();
        }, 600);
    });
</script>
