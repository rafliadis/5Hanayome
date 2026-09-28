@extends('layouts.app')

@section('title', 'TVアニメ「五等分の花嫁」公式ホームページ | TBSテレビ')

@section('content')
{{-- =========================================================================
     HALAMAN BERANDA RESMI TBS (LONG SCROLLABLE PAGE)
     <!-- DIUBAH: Mengganti mode 100vh no-scroll menjadi halaman panjang berurutan -->
     Urutan: Hero -> Badge Promo -> Update/Berita -> Introduction -> SNS & Link -> Footer
     ========================================================================= --}}

{{-- =========================================================================
     BAGIAN 3 & 4: HERO SECTION (PROPORSI GAMBAR ALAMI + SHARE BUTTONS + LOGO TBS)
     <!-- HAPUS: Container h-screen/h-[calc(...)] & overflow-hidden dihapus -->
     <!-- HAPUS: Kartu frosted glass gelap besar yang menumpuk di atas wajah dihapus -->
     ========================================================================= --}}
<section class="relative w-full overflow-hidden bg-slate-950">

    {{-- Wrapper Gambar dengan Aspect Ratio Alami --}}
    <div class="relative w-full aspect-[4/3] sm:aspect-[16/10] lg:aspect-[16/9] min-h-[480px] max-h-[920px] overflow-hidden">

        {{-- 1. Wallpaper Visual Utama --}}
        <img
            id="hero-wallpaper"
            src="{{ file_exists(public_path('images/wallpaper.jpg')) ? asset('images/wallpaper.jpg') : (file_exists(public_path('images/visual_02@2x.jpg')) ? asset('images/visual_02@2x.jpg') : 'https://cdn.myanimelist.net/images/anime/1813/118713l.jpg') }}"
            alt="TVアニメ「五等分の花嫁」キービジュアル"
            class="w-full h-full object-cover object-top sm:object-center select-none brightness-95 transition-transform duration-1000"
            onerror="this.onerror=null; this.src='https://cdn.myanimelist.net/images/anime/1813/118713l.jpg';"
        >

        {{-- 2. Vignette Lembut Atas & Bawah --}}
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/60 via-transparent to-slate-950/90 pointer-events-none"></div>

        {{-- =========================================================================
             BAGIAN 3: TOMBOL SHARE SOSIAL MEDIA MELAYANG (SISI KIRI HERO)
             ========================================================================= --}}
        <aside class="hidden md:flex absolute left-4 lg:left-6 top-1/2 -translate-y-1/2 z-30 flex-col items-center gap-3 bg-black/40 backdrop-blur-md p-2 rounded-2xl border border-white/20 shadow-2xl" aria-label="Social Media Share">
            <span class="text-[9px] font-black text-pink-300 uppercase tracking-wider py-1 font-serif [writing-mode:vertical-rl]">
                SHARE
            </span>

            {{-- X (Twitter) Share Button --}}
            <a href="https://twitter.com/intent/tweet?text=TV%E3%82%A2%E3%83%8B%E3%83%A1%E3%80%8C%E4%BA%94%E7%AD%89%E5%88%86%E3%81%AE%E8%8A%B1%E5%AB%81%E3%80%8DTBS%E5%85%AC%E5%BC%8F%E3%83%9B%E3%83%BC%E3%83%A0%E3%83%9A%E3%83%BC%E3%82%B8"
               target="_blank"
               rel="noopener noreferrer"
               title="Share to X (Twitter)"
               class="w-9 h-9 rounded-full bg-black text-white hover:bg-slate-800 flex items-center justify-center transition-all duration-200 transform hover:scale-110 active:scale-95 shadow-md border border-white/20">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>

            {{-- Facebook Share Button --}}
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
               target="_blank"
               rel="noopener noreferrer"
               title="Share to Facebook"
               class="w-9 h-9 rounded-full bg-[#1877f2] text-white hover:bg-blue-600 flex items-center justify-center transition-all duration-200 transform hover:scale-110 active:scale-95 shadow-md border border-white/20">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>

            {{-- Line Share Button --}}
            <a href="https://social-plugins.line.me/lineit/share?url={{ urlencode(url()->current()) }}"
               target="_blank"
               rel="noopener noreferrer"
               title="Share to LINE"
               class="w-9 h-9 rounded-full bg-[#06c755] text-white hover:bg-emerald-600 flex items-center justify-center transition-all duration-200 transform hover:scale-110 active:scale-95 shadow-md border border-white/20">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 10.304c0-5.369-5.383-9.738-12-9.738-6.616 0-12 4.369-12 9.738 0 4.814 4.269 8.846 10.036 9.608.391.084.922.258 1.057.592.122.303.079.778.039 1.085l-.171 1.028c-.053.303-.242 1.186 1.039.646 1.281-.54 6.911-4.069 9.428-6.967 1.739-1.907 2.572-3.844 2.572-5.994z"/></svg>
            </a>
        </aside>

        {{-- =========================================================================
             JUDUL ANIME BESAR BERGAYA TBS (KIRI ATAS / TENGAH HERO)
             <!-- DIUBAH: Tipografi tebal tanpa kotak hitam gelap menutupi wajah -->
             ========================================================================= --}}
        <div class="absolute top-16 sm:top-20 lg:top-28 left-4 sm:left-12 lg:left-24 z-20 max-w-xl space-y-2 select-none">
            <div class="inline-flex items-center gap-2 bg-black/40 backdrop-blur-md border border-pink-400/50 px-3.5 py-1 rounded-full text-pink-300 text-[11px] sm:text-xs font-black shadow-lg">
                <span class="w-2 h-2 rounded-full bg-[#ff007a] animate-ping"></span>
                <span data-i18n="hero.tagline">かわいさ500%の五人五色ラブコメディ！</span>
            </div>

            <h1 data-i18n="hero.title" class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight text-white drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)] font-sans leading-none">
                五等分の花嫁
            </h1>

            <p data-i18n="hero.subtitle" class="text-xs sm:text-sm lg:text-base font-bold text-pink-200 tracking-widest font-serif drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)] uppercase">
                The Quintessential Quintuplets
            </p>

            <p data-i18n="hero.catchphrase" class="text-xs sm:text-sm text-white/90 font-medium max-w-md drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)] pt-1 leading-relaxed hidden sm:block">
                落第寸前、勉強嫌いの５つ子を卒業まで導く！風太郎と中野家の青春感動ストーリー。
            </p>
        </div>

        {{-- =========================================================================
             TOMBOL PLAY VIDEO PV DEKORATIF (POJOK KANAN BAWAH HERO)
             ========================================================================= --}}
        <div class="absolute right-4 sm:right-8 lg:right-12 bottom-6 sm:bottom-8 z-20 flex items-center gap-3">
            <button type="button"
                    onclick="openPvModal()"
                    aria-label="Tonton PV Anime Terbaru"
                    class="group flex items-center gap-3 bg-black/60 hover:bg-black/80 backdrop-blur-md pl-3 pr-4 sm:pl-4 sm:pr-5 py-2.5 rounded-full border border-pink-500/60 shadow-2xl transition transform hover:scale-105 active:scale-95 text-white">
                <div class="relative w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-gradient-to-tr from-[#ff007a] to-rose-500 flex items-center justify-center text-white shadow-lg shadow-pink-500/40">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-[9px] sm:text-[10px] uppercase font-bold text-pink-300 font-serif tracking-widest">OFFICIAL PV</span>
                    <span data-i18n="hero.btn_pv" class="block text-xs sm:text-sm font-black text-white group-hover:text-pink-200 transition">プロモーション映像</span>
                </div>
            </button>
        </div>

    </div>
</section>

{{-- =========================================================================
     BAGIAN 5: BADGE PROMO (PILL DENGAN BORDER PINK)
     <!-- DIUBAH: Badge promo ala "新作アニメプロジェクト" resmi TBS -->
     ========================================================================= --}}
<section class="relative z-30 -mt-5 sm:-mt-7 px-4 max-w-4xl mx-auto">
    <a href="{{ route('news') }}"
       class="block bg-white hover:bg-pink-50/70 border-2 border-[#ff007a] rounded-full p-3 sm:p-4 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-0.5 group">
        <div class="flex items-center justify-between gap-3 sm:gap-4 px-2 sm:px-4">
            <div class="flex items-center gap-3 sm:gap-4">
                <span class="bg-[#ff007a] text-white text-[10px] sm:text-xs font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-sm flex-shrink-0">
                    PROJECT
                </span>
                <div class="text-left">
                    <h2 data-i18n="promo.badge_title" class="text-xs sm:text-sm md:text-base font-black text-slate-900 group-hover:text-[#ff007a] transition leading-tight">
                        新作アニメプロジェクト始動！TVアニメ「五等分の花嫁＊」制作決定
                    </h2>
                    <p data-i18n="promo.badge_sub" class="text-[10px] sm:text-xs text-slate-500 font-medium hidden sm:block mt-0.5">
                        原案・完全監修：春場ねぎ ／ 新婚旅行編を描く完全新作アニメーション企画
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-1 text-[#ff007a] font-extrabold text-xs sm:text-sm flex-shrink-0 group-hover:translate-x-1 transition-transform">
                <span data-i18n="promo.badge_action" class="hidden sm:inline">詳細を見る</span>
                <span>&rarr;</span>
            </div>
        </div>
    </a>
</section>

{{-- =========================================================================
     BAGIAN 6: SECTION UPDATE / BERITA
     ========================================================================= --}}
<section class="py-16 sm:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white via-pink-50/25 to-white border-b border-slate-100">
    <div class="max-w-5xl mx-auto space-y-8">

        {{-- Judul Section Dekoratif --}}
        <div class="text-center space-y-2">
            <div class="inline-flex items-center gap-2">
                <span class="h-0.5 w-6 sm:w-10 bg-[#ff007a]"></span>
                <span class="text-xs sm:text-sm font-black text-[#ff007a] tracking-widest font-serif uppercase">NEWS & TOPICS</span>
                <span class="h-0.5 w-6 sm:w-10 bg-[#ff007a]"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight font-serif">
                Update
            </h2>
            <p data-i18n="update.section_sub" class="text-xs sm:text-sm text-slate-500 font-bold">
                最新情報・更新情報
            </p>
        </div>

        {{-- List Item Berita --}}
        <div class="space-y-3 sm:space-y-4 max-w-4xl mx-auto">
            @php
                $defaultUpdates = [
                    [
                        'id' => 1,
                        'date' => '2026.09.20',
                        'category' => 'EVENT',
                        'badge_color' => 'bg-purple-600',
                        'title' => 'TVアニメ「五等分の花嫁＊」スペシャルイベント開催決定！メインキャスト6名登壇予定',
                        'url' => route('news')
                    ],
                    [
                        'id' => 2,
                        'date' => '2026.09.15',
                        'category' => 'GOODS',
                        'badge_color' => 'bg-pink-600',
                        'title' => '公式描き下ろしアクリルスタンド＆メモリアルタペストリーの受注受付を開始しました',
                        'url' => route('goods')
                    ],
                    [
                        'id' => 3,
                        'date' => '2026.09.05',
                        'category' => 'BD & DVD',
                        'badge_color' => 'bg-amber-600',
                        'title' => '映画「五等分の花嫁」SPECIAL Blu-ray & DVD 特装版の収録特典＆ジャケット写真を公開',
                        'url' => route('news')
                    ],
                    [
                        'id' => 4,
                        'date' => '2026.08.28',
                        'category' => 'ON AIR',
                        'badge_color' => 'bg-emerald-600',
                        'title' => 'TBS・BS11および各種配信プラットフォームにて第1期＆第2期の一挙配信がスタート！',
                        'url' => route('onair')
                    ]
                ];
                $items = $updates ?? $defaultUpdates;
            @endphp

            @foreach($items as $idx => $newsItem)
                <article class="bg-white hover:bg-slate-50 border border-slate-200 hover:border-pink-300 rounded-2xl p-4 sm:p-5 shadow-sm hover:shadow-md transition-all duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 group">
                    <div class="flex items-start sm:items-center gap-3 sm:gap-4">
                        <time class="text-xs sm:text-sm font-bold text-slate-400 font-mono flex-shrink-0">
                            {{ $newsItem['date'] }}
                        </time>
                        <span class="{{ $newsItem['badge_color'] ?? 'bg-[#ff007a]' }} text-white text-[10px] sm:text-[11px] font-black px-2.5 py-0.5 rounded-full flex-shrink-0">
                            {{ $newsItem['category'] }}
                        </span>
                        <a href="{{ $newsItem['url'] ?? route('news') }}"
                           data-i18n="update.item_{{ $idx + 1 }}"
                           class="text-xs sm:text-sm font-bold text-slate-800 group-hover:text-[#ff007a] transition leading-snug">
                            {{ $newsItem['title'] }}
                        </a>
                    </div>
                    <a href="{{ $newsItem['url'] ?? route('news') }}" class="text-xs font-black text-pink-500 group-hover:translate-x-1 transition-transform self-end sm:self-center flex-shrink-0">
                        &rarr;
                    </a>
                </article>
            @endforeach
        </div>

        {{-- Tombol MORE INFO --}}
        <div class="text-center pt-2">
            <a href="{{ route('news') }}"
               class="inline-flex items-center gap-2 bg-[#ff007a] hover:bg-[#ff5c93] active:bg-[#d80067] text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-full shadow-lg shadow-pink-500/30 transition transform hover:-translate-y-0.5">
                <span data-i18n="update.btn_more">MORE INFO</span>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </a>
        </div>

    </div>
</section>

{{-- =========================================================================
     BAGIAN 7: SECTION INTRODUCTION
     ========================================================================= --}}
<section class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 bg-pink-50/40 border-b border-pink-100">
    <div class="max-w-4xl mx-auto space-y-8 text-center">

        <div class="space-y-2">
            <div class="inline-flex items-center gap-2">
                <span class="h-0.5 w-6 sm:w-10 bg-[#ff007a]"></span>
                <span class="text-xs sm:text-sm font-black text-[#ff007a] tracking-widest font-serif uppercase">STORY PREMISE</span>
                <span class="h-0.5 w-6 sm:w-10 bg-[#ff007a]"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight font-serif">
                Introduction
            </h2>
            <p data-i18n="intro.section_sub" class="text-xs sm:text-sm text-slate-500 font-bold">
                作品紹介・イントロダクション
            </p>
        </div>

        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 sm:p-10 border border-pink-200/70 shadow-xl space-y-4 sm:space-y-6 text-slate-700 leading-relaxed text-xs sm:text-sm md:text-base text-left font-normal">
            <p data-i18n="intro.p1">
                貧乏な高校２年生・上杉風太郎のもとに、好条件の家庭教師アルバイトの話が舞い込む。<br class="hidden sm:inline">
                ところが教え子はなんと同級生！！ しかも五つ子だった！！
            </p>
            <p data-i18n="intro.p2">
                全員美少女、だけど「落第寸前」「勉強嫌い」の問題児！<br class="hidden sm:inline">
                最初の課題は姉妹からの信頼を勝ち取ること…！？ 毎日がお祭り騒ぎ！ 中野家の五つ子が贈る、かわいさ500%の五人五色ラブコメ開演！！
            </p>
        </div>

        <div class="pt-2 flex justify-center gap-4 flex-wrap">
            <a href="{{ route('karakter.index') }}"
               class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-extrabold text-xs sm:text-sm px-7 py-3 rounded-full shadow-md transition transform hover:-translate-y-0.5">
                <span data-i18n="intro.btn_char">キャラクター一覧を見る</span>
                <span>&rarr;</span>
            </a>
            <a href="{{ route('staff_cast') }}"
               class="inline-flex items-center gap-2 bg-white hover:bg-slate-100 text-slate-800 border border-slate-300 font-extrabold text-xs sm:text-sm px-6 py-3 rounded-full shadow-sm transition transform hover:-translate-y-0.5">
                <span data-i18n="intro.btn_staff">スタッフ＆キャスト</span>
                <span>&rarr;</span>
            </a>
        </div>

    </div>
</section>

{{-- =========================================================================
     BAGIAN 8: SECTION SNS & LINK BANNER
     ========================================================================= --}}
<section class="py-14 sm:py-18 px-4 sm:px-6 lg:px-8 bg-white border-b border-slate-200">
    <div class="max-w-5xl mx-auto space-y-10">

        <div class="text-center space-y-3">
            <h3 data-i18n="sns.heading" class="text-lg sm:text-xl font-black text-slate-900 tracking-wider font-serif">
                OFFICIAL SNS & CHANNELS
            </h3>
            <p data-i18n="sns.subheading" class="text-xs text-slate-500 font-medium">
                公式ソーシャルメディアアカウントをフォローして最新情報をチェック！
            </p>

            <div class="flex items-center justify-center gap-4 pt-2 flex-wrap">
                <a href="https://twitter.com/tbs_hanayome"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 bg-black hover:bg-slate-800 text-white px-5 py-2.5 rounded-full text-xs font-bold transition transform hover:scale-105 shadow">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    <span>@tbs_hanayome</span>
                </a>

                <a href="https://www.youtube.com"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 bg-[#ff0000] hover:bg-red-700 text-white px-5 py-2.5 rounded-full text-xs font-bold transition transform hover:scale-105 shadow">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    <span>TBS Animation YouTube</span>
                </a>

                <a href="https://www.tiktok.com"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-full text-xs font-bold transition transform hover:scale-105 shadow">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.27 1.76-.23 1.05.15 2.23.95 2.93.84.76 2.09.91 3.11.45.69-.31 1.22-.89 1.44-1.61.16-.54.21-1.11.2-1.68.03-4.91.02-9.82.02-14.73z"/></svg>
                    <span>TikTok @5hanayome</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('goods') }}" class="p-4 rounded-2xl bg-pink-50 hover:bg-pink-100 border border-pink-200 transition transform hover:-translate-y-1 shadow-sm flex items-center gap-3.5 group">
                <div class="w-10 h-10 rounded-xl bg-[#ff007a] text-white flex items-center justify-center flex-shrink-0 shadow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-[10px] font-bold text-pink-600 uppercase font-serif">OFFICIAL GOODS</span>
                    <span data-i18n="links.goods" class="block text-xs font-black text-slate-800 group-hover:text-[#ff007a] transition">公式グッズ情報</span>
                </div>
            </a>

            <a href="{{ route('music') }}" class="p-4 rounded-2xl bg-purple-50 hover:bg-purple-100 border border-purple-200 transition transform hover:-translate-y-1 shadow-sm flex items-center gap-3.5 group">
                <div class="w-10 h-10 rounded-xl bg-purple-600 text-white flex items-center justify-center flex-shrink-0 shadow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-[10px] font-bold text-purple-600 uppercase font-serif">THEME MUSIC</span>
                    <span data-i18n="links.music" class="block text-xs font-black text-slate-800 group-hover:text-purple-600 transition">主題歌・音楽情報</span>
                </div>
            </a>

            <a href="{{ route('onair') }}" class="p-4 rounded-2xl bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 transition transform hover:-translate-y-1 shadow-sm flex items-center gap-3.5 group">
                <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center flex-shrink-0 shadow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-[10px] font-bold text-emerald-600 uppercase font-serif">BROADCAST</span>
                    <span data-i18n="links.onair" class="block text-xs font-black text-slate-800 group-hover:text-emerald-600 transition">放送＆配信情報</span>
                </div>
            </a>

            <a href="{{ route('staff_cast') }}" class="p-4 rounded-2xl bg-sky-50 hover:bg-sky-100 border border-sky-200 transition transform hover:-translate-y-1 shadow-sm flex items-center gap-3.5 group">
                <div class="w-10 h-10 rounded-xl bg-sky-600 text-white flex items-center justify-center flex-shrink-0 shadow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-[10px] font-bold text-sky-600 uppercase font-serif">STAFF & CAST</span>
                    <span data-i18n="links.staff" class="block text-xs font-black text-slate-800 group-hover:text-sky-600 transition">制作陣・キャスト</span>
                </div>
            </a>
        </div>

    </div>
</section>

{{-- =========================================================================
     FOOTER RESMI
     ========================================================================= --}}
<footer class="bg-slate-950 text-white py-12 px-4 sm:px-6 lg:px-8 border-t border-white/10 select-none">
    <div class="max-w-5xl mx-auto space-y-6 text-center">

        <div class="flex items-center justify-center gap-2.5">
            <span class="bg-[#ff007a] text-white font-black text-xs px-2.5 py-0.5 rounded-full shadow border border-white/30">
                TBS
            </span>
            <span class="font-black text-xl tracking-wider text-white">五等分の花嫁</span>
        </div>

        <div class="flex flex-wrap justify-center gap-4 sm:gap-6 text-xs text-slate-400 font-semibold">
            <a href="{{ route('home') }}" class="hover:text-pink-300 transition" data-i18n="nav.home">Home</a>
            <span>•</span>
            <a href="{{ route('news') }}" class="hover:text-pink-300 transition" data-i18n="nav.news">News</a>
            <span>•</span>
            <a href="{{ route('karakter.index') }}" class="hover:text-pink-300 transition" data-i18n="nav.character">Character</a>
            <span>•</span>
            <a href="{{ route('staff_cast') }}" class="hover:text-pink-300 transition" data-i18n="nav.staff_cast">Staff & Cast</a>
            <span>•</span>
            <a href="{{ route('onair') }}" class="hover:text-pink-300 transition" data-i18n="nav.onair">On Air</a>
            <span>•</span>
            <a href="{{ route('music') }}" class="hover:text-pink-300 transition" data-i18n="nav.music">Music</a>
            <span>•</span>
            <a href="{{ route('goods') }}" class="hover:text-pink-300 transition" data-i18n="nav.goods">Goods</a>
        </div>

        <p class="text-[11px] text-slate-500 leading-relaxed max-w-2xl mx-auto" data-i18n="footer.copyright">
            © 春場ねぎ・講談社／「五等分の花嫁」製作委員会 © 1995-2026, TBS Television, Inc. All Rights Reserved.
        </p>

    </div>
</footer>

{{-- =========================================================================
     BANNER PROMOSI OTOMATIS (POPUP ENTRY BANNER BERGAYA RESMI TBS)
     ========================================================================= --}}
@include('partials.promo-modal')

{{-- =========================================================================
     MODAL PROMOSI VIDEO PV DEKORATIF (PEMUTAR VIDEO MP4 LOKAL)
     ========================================================================= --}}
<div id="pv-modal"
     onclick="if(event.target === this) closePvModal();"
     class="fixed inset-0 bg-black/90 backdrop-blur-md z-[9999] flex items-center justify-center p-3 sm:p-6 transition-all duration-300 opacity-0 pointer-events-none hidden select-none"
     role="dialog"
     aria-modal="true"
     aria-label="Official Anime PV Player">

    <div class="relative w-full max-w-4xl bg-slate-950 rounded-2xl sm:rounded-3xl border border-white/25 shadow-2xl overflow-hidden text-white">
        {{-- Tombol Tutup --}}
        <button type="button"
                onclick="closePvModal()"
                aria-label="Tutup Video PV"
                class="absolute top-3 right-3 sm:top-4 sm:right-4 z-30 w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-black/70 hover:bg-[#ff007a] active:bg-pink-700 text-white flex items-center justify-center border border-white/40 shadow-xl transition transform hover:scale-110 focus:outline-none">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        {{-- Frame Pemutar Video MP4 Lokal --}}
        <div class="aspect-[16/9] w-full bg-black relative flex items-center justify-center">
            <video
                id="pv-local-video"
                class="w-full h-full object-contain bg-black"
                controls
                playsinline
                preload="metadata"
                poster="{{ file_exists(public_path('images/wallpaper.jpg')) ? asset('images/wallpaper.jpg') : (file_exists(public_path('images/visual_02@2x.jpg')) ? asset('images/visual_02@2x.jpg') : 'https://cdn.myanimelist.net/images/anime/1813/118713l.jpg') }}">
                <source src="{{ asset('videos/pv.mp4') }}" type="video/mp4">
                <p class="text-xs text-slate-400 p-4 text-center">
                    Peramban Anda tidak mendukung pemutaran video HTML5. Letakkan file video di <code class="text-pink-400">public/videos/pv.mp4</code>.
                </p>
            </video>
        </div>

        {{-- Footer Info Video --}}
        <div class="p-3 sm:p-4 bg-slate-900/90 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
            <div class="flex items-center gap-2.5">
                <span class="px-2.5 py-0.5 rounded-full bg-[#ff007a] text-white text-[10px] sm:text-xs font-black uppercase tracking-wider">OFFICIAL PV</span>
                <h3 class="text-xs sm:text-sm font-bold text-white" data-i18n="hero.pv_title">TVアニメ「五等分の花嫁＊」特報PV</h3>
            </div>
            <span class="text-[10px] sm:text-xs text-pink-300 font-medium">©春場ねぎ・講談社／「五等分の花嫁＊」製作委員会</span>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Injeksi kamus khusus halaman beranda ke appTranslations global
    window.pageTranslations = {
        jp: {
            hero: {
                tagline: "🌸 かわいさ500%の五人五色ラブコメディ！",
                title: "五等分の花嫁",
                subtitle: "THE QUINTESSENTIAL QUINTUPLETS",
                catchphrase: "落第寸前、勉強嫌いの５つ子を卒業まで導く！風太郎と中野家の青春感動ストーリー。",
                btn_pv: "プロモーション映像",
                pv_title: "TVアニメ「五等分の花嫁＊」特報PV",
                pv_desc: "新婚旅行編を描く完全新作アニメーション。詳細は公式ニュースにて随時公開予定！"
            },
            promo: {
                badge_title: "新作アニメプロジェクト始動！TVアニメ「五等分の花嫁＊」制作決定",
                badge_sub: "原案・完全監修：春場ねぎ ／ 新婚旅行編を描く完全新作アニメーション企画",
                badge_action: "詳細を見る"
            },
            update: {
                section_sub: "最新情報・更新情報",
                item_1: "TVアニメ「五等分の花嫁＊」スペシャルイベント開催決定！メインキャスト6名登壇予定",
                item_2: "公式描き下ろしアクリルスタンド＆メモリアルタペストリーの受注受付を開始しました",
                item_3: "映画「五等分の花嫁」SPECIAL Blu-ray & DVD 特装版の収録特典＆ジャケット写真を公開",
                item_4: "TBS・BS11および各種配信プラットフォームにて第1期＆第2期の一挙配信がスタート！",
                btn_more: "MORE INFO (ニュース一覧)"
            },
            intro: {
                section_sub: "作品紹介・イントロダクション",
                p1: "貧乏な高校２年生・上杉風太郎のもとに、好条件の家庭教師アルバイトの話が舞い込む。ところが教え子はなんと同級生！！ しかも五つ子だった！！",
                p2: "全員美少女、だけど「落第寸前」「勉強嫌い」の問題児！最初の課題は姉妹からの信頼を勝ち取ること…！？ 毎日がお祭り騒ぎ！ 中野家の五つ子が贈る、かわいさ500%の五人五色ラブコメ開演！！",
                btn_char: "キャラクター一覧を見る",
                btn_staff: "スタッフ＆キャスト"
            },
            sns: {
                heading: "OFFICIAL SNS & CHANNELS",
                subheading: "公式ソーシャルメディアアカウントをフォローして最新情報をチェック！"
            },
            links: {
                goods: "公式グッズ情報",
                music: "主題歌・音楽情報",
                onair: "放送＆配信情報",
                staff: "制作陣・キャスト"
            },
            footer: {
                copyright: "© 春場ねぎ・講談社／「五等分の花嫁」製作委員会 © 1995-2026, TBS Television, Inc. All Rights Reserved."
            },
            modal: {
                promo_badge: "新作アニメプロジェクト始動！",
                promo_title: "五等分の花嫁",
                promo_sub: "【春夏秋冬】 ＆ 新作OVA",
                promo_status: "制作決定！",
                promo_btn: "最新情報をチェック"
            }
        },
        en: {
            hero: {
                tagline: "🌸 500% Cuteness! A Romantic Comedy with Five Sisters!",
                title: "The Quintessential Quintuplets",
                subtitle: "THE QUINTESSENTIAL QUINTUPLETS",
                catchphrase: "On the verge of failing, guide five study-hating quintuplets to graduation!",
                btn_pv: "Promotional Video",
                pv_title: "TV Anime 'The Quintessential Quintuplets*' Teaser PV",
                pv_desc: "Brand new animation depicting the honeymoon arc. Stay tuned for details in official news!"
            },
            promo: {
                badge_title: "New Anime Project Announced! TV Anime 'The Quintessential Quintuplets*' in Production",
                badge_sub: "Original Story & Supervised by Negi Haruba / Honeymoon Arc Special Anime Project",
                badge_action: "Read Details"
            },
            update: {
                section_sub: "Latest News & Updates",
                item_1: "TV Anime 'The Quintessential Quintuplets*' Special Event Announced with 6 Main Cast Members!",
                item_2: "Official Exclusive Acrylic Stand & Memorial Tapestry Pre-Orders Are Now Open",
                item_3: "Movie 'The Quintessential Quintuplets' SPECIAL Blu-ray & DVD Deluxe Edition Details Revealed",
                item_4: "Season 1 & Season 2 Full Marathon Streaming Starts on TBS, BS11 and Major Platforms!",
                btn_more: "MORE INFO (All News)"
            },
            intro: {
                section_sub: "Story Premise & Introduction",
                p1: "Fuutarou Uesugi, a high school sophomore in poverty, receives an enticing offer to become a well-paid private tutor. But his students turn out to be his own classmates—and quintuplets!",
                p2: "They are all gorgeous girls, but notoriously hate studying and are on the verge of flunking out. His very first task is to win their trust! A delightful 500% cuteness romantic comedy begins!",
                btn_char: "View All Characters",
                btn_staff: "Staff & Cast"
            },
            sns: {
                heading: "OFFICIAL SNS & CHANNELS",
                subheading: "Follow official social media accounts to stay updated with latest announcements!"
            },
            links: {
                goods: "Official Merchandise",
                music: "Theme Music & Jukebox",
                onair: "On Air & Streaming",
                staff: "Staff & Voice Cast"
            },
            footer: {
                copyright: "© Negi Haruba, KODANSHA / The Quintessential Quintuplets Production Committee © 1995-2026, TBS Television, Inc."
            },
            modal: {
                promo_badge: "New Anime Project Launched!",
                promo_title: "The Quintessential Quintuplets",
                promo_sub: "【Four Seasons】 & Brand New OVA",
                promo_status: "Production Confirmed!",
                promo_btn: "Check Latest News"
            }
        },
        id: {
            hero: {
                tagline: "🌸 Kelucuan 500% Kisah Komedi Romantis 5 Gadis Kembar!",
                title: "五等分の花嫁",
                subtitle: "THE QUINTESSENTIAL QUINTUPLETS",
                catchphrase: "Hampir tidak naik kelas, bimbing 5 saudari kembar yang benci belajar hingga lulus!",
                btn_pv: "Video Promosi (PV)",
                pv_title: "TV Anime 「5-toubun no Hanayome＊」 Teaser PV",
                pv_desc: "Animasi terbaru yang mengisahkan bulan madu Fuutarou dan kembar lima. Simak info lengkap di portal berita resmi!"
            },
            promo: {
                badge_title: "Proyek Anime Baru Dimulai! TV Anime 「5-toubun no Hanayome＊」 Siap Diproduksi",
                badge_sub: "Konsep Cerita & Supervisi: Negi Haruba / Proyek Animasi Kisah Bulan Madu",
                badge_action: "Lihat Detail"
            },
            update: {
                section_sub: "Informasi & Berita Terkini",
                item_1: "Acara Spesial TV Anime 「5-toubun no Hanayome＊」 Resmi Diumumkan Bersama 6 Seiyuu Utama!",
                item_2: "Pre-order Stand Akrilik Eksklusif & Tapestry Memorial Resmi Telah Dibuka",
                item_3: "Detail Bonus & Jaket Visual Blu-ray & DVD Edisi Spesial Film Resmi Dirilis",
                item_4: "Penayangan Maraton Season 1 & Season 2 Resmi Dimulai di TBS, BS11 & Layanan Streaming!",
                btn_more: "MORE INFO (Semua Berita)"
            },
            intro: {
                section_sub: "Sinopsis Cerita & Pengenalan",
                p1: "Fuutarou Uesugi, siswa SMA miskin yang cerdas, menerima tawaran pekerjaan sampingan sebagai guru privat dengan bayaran tinggi. Namun murid yang harus diajarnya ternyata teman sekelasnya sendiri—dan kembar lima!",
                p2: "Semuanya cantik jelita, tetapi mereka benci belajar dan terancam tidak naik kelas! Tugas pertamanya adalah memenangkan kepercayaan kelima saudari tersebut. Kisah komedi romantis kelucuan 500% dimulai!",
                btn_char: "Lihat Semua Karakter",
                btn_staff: "Staf & Pengisi Suara"
            },
            sns: {
                heading: "OFFICIAL SNS & CHANNELS",
                subheading: "Ikuti kanal media sosial resmi untuk mendapatkan pengumuman dan kabar terbaru!"
            },
            links: {
                goods: "Merchandise Resmi",
                music: "Lagu Tema & Musik",
                onair: "Jadwal & Streaming",
                staff: "Staf & Seiyuu"
            },
            footer: {
                copyright: "© Negi Haruba・Kodansha / Komite Produksi 「5-toubun no Hanayome」 © 1995-2026, TBS Television, Inc."
            },
            modal: {
                promo_badge: "Proyek Anime Baru Dimulai!",
                promo_title: "五等分の花嫁 (5-toubun no Hanayome)",
                promo_sub: "【Empat Musim】 ＆ OVA Terbaru",
                promo_status: "Resmi Diproduksi!",
                promo_btn: "Simak Berita Terbaru"
            }
        }
    };

    // PV Modal Controls (Pemutar Video MP4 Lokal)
    function openPvModal() {
        const modal = document.getElementById('pv-modal');
        const video = document.getElementById('pv-local-video');
        if (!modal) return;
        modal.classList.remove('hidden');
        void modal.offsetWidth;
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100', 'pointer-events-auto');
        if (video) {
            video.currentTime = 0;
            video.play().catch(() => {});
        }
    }

    function closePvModal() {
        const modal = document.getElementById('pv-modal');
        const video = document.getElementById('pv-local-video');
        if (!modal) return;
        if (video) {
            video.pause();
        }
        modal.classList.remove('opacity-100', 'pointer-events-auto');
        modal.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closePvModal();
        }
    });
</script>
@endpush
@endsection
