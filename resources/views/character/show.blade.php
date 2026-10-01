@extends('layouts.app')

@section('title', $character['name'] . ' (' . $character['japanese_name'] . ') - TVアニメ「五等分の花嫁」')

@section('content')
{{-- Kontainer Detail Karakter --}}
<div class="w-full min-h-full py-4 sm:py-6 px-4 sm:px-6 lg:px-8 bg-slate-950" style="--theme: {{ $character['theme_color'] }};">
    <div class="max-w-6xl mx-auto w-full space-y-6">

        {{-- 1. QUICK SISTER SWITCHER TOP BAR --}}
        <div class="bg-slate-900/80 backdrop-blur-md p-2 sm:p-2.5 rounded-2xl border border-white/10 shadow-lg flex items-center justify-between gap-1 sm:gap-2 overflow-x-auto select-none custom-scrollbar">
            <span class="text-[11px] font-bold text-slate-400 pl-2 hidden md:inline" data-i18n="char_page.switch_sister">Pilih Karakter:</span>

            <div class="flex items-center gap-1.5 sm:gap-2 flex-nowrap">
                @foreach ($characters as $slugKey => $otherChar)
                    @php
                        $isActive = $slugKey === $character['slug'] || $otherChar['name'] === $character['name'];
                        $btnTheme = $otherChar['theme_color'] ?? '#ff007a';
                    @endphp
                    <a href="{{ route('character.show', $slugKey) }}"
                       class="px-3 py-1.5 rounded-xl text-xs font-black transition flex items-center gap-1.5 flex-shrink-0 {{ $isActive ? 'text-white shadow-md scale-105' : 'text-slate-400 hover:text-white hover:bg-white/10' }}"
                       style="{{ $isActive ? 'background-color: ' . $btnTheme . ';' : '' }}">
                        <span class="w-2 h-2 rounded-full" style="background-color: {{ $btnTheme }};"></span>
                        <span>{{ $otherChar['name'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Breadcrumb Navigasi --}}
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-slate-400 select-none" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" data-i18n="nav.home" class="hover:text-[var(--theme)] transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Home</span>
            </a>
            <span>/</span>
            <a href="{{ route('karakter.index') }}" data-i18n="nav.character" class="hover:text-[var(--theme)] transition">Character</a>
            <span>/</span>
            <span class="font-black text-white" style="color: var(--theme);">{{ $character['name'] }}</span>
        </nav>

        {{-- ==========================================
             BAGIAN 1: DETAIL UTAMA KARAKTER
             ========================================== --}}
        <div class="bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 p-6 sm:p-8 lg:p-10 items-start">

                {{-- Kolom Kiri: Foto Utama Portrait (aspect-[3/4]) --}}
                <div class="lg:col-span-5 flex flex-col items-center">
                    <div class="relative group w-full max-w-sm rounded-2xl overflow-hidden shadow-xl border-4 border-slate-50 bg-slate-100 aspect-[3/4]">
                        <img
                            src="{{ asset($character['photo']) }}"
                            alt="{{ $character['name'] }}"
                            class="w-full h-full object-cover object-top transition duration-500 group-hover:scale-105"
                            onerror="this.onerror=null; this.src='https://cdn.myanimelist.net/images/characters/16/374828.jpg';"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-5">
                            <span class="text-white text-sm font-black tracking-widest uppercase">
                                {{ $character['japanese_name'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Voice Sample Simulator Button --}}
                    <div class="mt-4 w-full max-w-sm">
                        <button type="button"
                                onclick="playVoiceSample()"
                                id="btn-voice-sample"
                                class="w-full py-2.5 px-4 rounded-xl border flex items-center justify-center gap-2.5 text-xs font-extrabold transition shadow-sm hover:scale-[1.02] active:scale-95"
                                style="background-color: color-mix(in srgb, var(--theme) 12%, #ffffff); border-color: var(--theme); color: var(--theme);">
                            <svg id="voice-icon" class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
                            <span id="voice-text" data-i18n="char_page.voice_button">Dengarkan Suara Karakter (Voice Line)</span>
                        </button>
                    </div>
                </div>

                {{-- Kolom Kanan: Informasi & Tab Switcher Interaktif --}}
                <div class="lg:col-span-7 space-y-6">

                    {{-- Header Nama Karakter & CV --}}
                    <div class="border-b-2 pb-4" style="border-color: color-mix(in srgb, var(--theme) 25%, #f1f5f9);">
                        <div class="flex flex-wrap items-baseline gap-3 mb-2">
                            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                                {{ $character['name'] }}
                            </h1>
                            <span class="text-2xl sm:text-3xl font-bold" style="color: var(--theme);">
                                {{ $character['japanese_name'] }}
                            </span>
                        </div>

                        {{-- CV / Seiyuu Badge --}}
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold border"
                             style="background-color: color-mix(in srgb, var(--theme) 12%, #ffffff); border-color: color-mix(in srgb, var(--theme) 40%, transparent); color: var(--theme);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z" />
                            </svg>
                            <span>CV: {{ $character['cv'] }}</span>
                        </div>
                    </div>

                    {{-- TAB SWITCH INTERAKTIF (Profil, Kisah, Statistik, Quote) --}}
                    <div>
                        {{-- Navigasi Tab --}}
                        <div class="flex border-b border-slate-200 gap-1 sm:gap-2 select-none flex-wrap" role="tablist">
                            <button type="button"
                                    onclick="switchCharacterTab('profile')"
                                    id="tab-btn-profile"
                                    data-i18n="char_page.tab_profile"
                                    class="tab-button px-3.5 sm:px-4 py-2 font-bold text-xs sm:text-sm transition-all border-b-2 -mb-[1px] rounded-t-xl"
                                    style="border-color: var(--theme); color: var(--theme); background-color: color-mix(in srgb, var(--theme) 8%, transparent);">
                                Profil
                            </button>

                            <button type="button"
                                    onclick="switchCharacterTab('story')"
                                    id="tab-btn-story"
                                    data-i18n="char_page.tab_story"
                                    class="tab-button px-3.5 sm:px-4 py-2 font-bold text-xs sm:text-sm transition-all border-b-2 -mb-[1px] rounded-t-xl text-slate-500 border-transparent hover:text-slate-800">
                                Kisah
                            </button>

                            <button type="button"
                                    onclick="switchCharacterTab('stats')"
                                    id="tab-btn-stats"
                                    data-i18n="char_page.tab_stats"
                                    class="tab-button px-3.5 sm:px-4 py-2 font-bold text-xs sm:text-sm transition-all border-b-2 -mb-[1px] rounded-t-xl text-slate-500 border-transparent hover:text-slate-800">
                                Statistik
                            </button>

                            <button type="button"
                                    onclick="switchCharacterTab('quote')"
                                    id="tab-btn-quote"
                                    data-i18n="char_page.tab_quote"
                                    class="tab-button px-3.5 sm:px-4 py-2 font-bold text-xs sm:text-sm transition-all border-b-2 -mb-[1px] rounded-t-xl text-slate-500 border-transparent hover:text-slate-800">
                                Quote
                            </button>
                        </div>

                        {{-- Konten Tab: 1. Profil (Data Pribadi Dinamis 3 Bahasa) --}}
                        <div id="tab-content-profile" class="tab-panel py-5 block transition-opacity duration-300">
                            <h3 data-i18n="char_page.personal_data_heading" class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">
                                Data Pribadi
                            </h3>
                            <div id="character-profile-grid" class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                {{-- Dirender secara dinamis oleh JavaScript renderCharacterData() --}}
                            </div>
                        </div>

                        {{-- Konten Tab: 2. Kisah (Deskripsi Karakter Dinamis 3 Bahasa) --}}
                        <div id="tab-content-story" class="tab-panel py-5 hidden transition-opacity duration-300">
                            <h3 data-i18n="char_page.story_heading" class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">
                                Deskripsi Karakter
                            </h3>
                            <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100">
                                <p id="character-description-text" class="text-slate-700 leading-relaxed text-sm sm:text-base font-normal">
                                    {{ $character['description_text'] }}
                                </p>
                            </div>
                        </div>

                        {{-- Konten Tab: 3. Statistik / Radar Kemampuan Karakter --}}
                        <div id="tab-content-stats" class="tab-panel py-5 hidden transition-opacity duration-300">
                            <h3 data-i18n="char_page.stats_heading" class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">
                                Parameter Kemampuan & Karakteristik
                            </h3>
                            <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100 space-y-3.5">
                                @php
                                    $stats = $character['stats'] ?? ['study' => 70, 'cooking' => 70, 'athletics' => 70, 'fashion' => 70, 'sincerity' => 80];
                                @endphp
                                <div>
                                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                                        <span data-i18n="char_page.stat_study">Kemampuan Akademik (Study)</span>
                                        <span style="color: var(--theme);">{{ $stats['study'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-700" style="width: {{ $stats['study'] }}%; background-color: var(--theme);"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                                        <span data-i18n="char_page.stat_cooking">Keahlian Memasak (Cooking)</span>
                                        <span style="color: var(--theme);">{{ $stats['cooking'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-700" style="width: {{ $stats['cooking'] }}%; background-color: var(--theme);"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                                        <span data-i18n="char_page.stat_athletics">Kemampuan Atletik (Athletics)</span>
                                        <span style="color: var(--theme);">{{ $stats['athletics'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-700" style="width: {{ $stats['athletics'] }}%; background-color: var(--theme);"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                                        <span data-i18n="char_page.stat_fashion">Pesona & Gaya Busana (Fashion / Charm)</span>
                                        <span style="color: var(--theme);">{{ $stats['fashion'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-700" style="width: {{ $stats['fashion'] }}%; background-color: var(--theme);"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                                        <span data-i18n="char_page.stat_sincerity">Ketulusan Hati (Sincerity)</span>
                                        <span style="color: var(--theme);">{{ $stats['sincerity'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-700" style="width: {{ $stats['sincerity'] }}%; background-color: var(--theme);"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Konten Tab: 4. Quote (Kutipan Khas Dinamis 3 Bahasa) --}}
                        <div id="tab-content-quote" class="tab-panel py-5 hidden transition-opacity duration-300">
                            <h3 data-i18n="char_page.quote_heading" class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">
                                Kutipan Khas
                            </h3>
                            <div class="relative p-6 sm:p-8 rounded-2xl bg-gradient-to-r from-slate-50 to-white border-l-8 shadow-sm overflow-hidden"
                                 style="border-color: var(--theme);">
                                <span class="absolute -bottom-4 right-4 text-7xl sm:text-8xl font-serif font-black opacity-10 select-none pointer-events-none"
                                      style="color: var(--theme);">
                                    ”
                                </span>
                                <p id="character-quote-text" class="relative z-10 text-slate-800 font-bold text-base sm:text-lg italic leading-relaxed">
                                    {{ $character['quote_text'] }}
                                </p>
                                <span class="block mt-4 text-xs font-bold tracking-wider uppercase" style="color: var(--theme);">
                                    — {{ $character['name'] }} ({{ $character['japanese_name'] }})
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        {{-- ==========================================
             BAGIAN 2: GALERI FOTO KARAKTER
             ========================================== --}}
        <section class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-2.5 h-7 rounded-full" style="background-color: var(--theme);"></div>
                    <h2 data-i18n="char_page.gallery_heading" class="text-xl sm:text-2xl font-black text-white tracking-tight">
                        Galeri Foto Karakter
                    </h2>
                </div>
                <span data-i18n="char_page.gallery_hint" class="text-xs text-slate-400 font-medium">Klik foto untuk membuka resolusi penuh</span>
            </div>

            {{-- Grid Galeri --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                @foreach ($character['gallery'] as $index => $photoUrl)
                    @php
                        $imgSrc = str_starts_with($photoUrl, 'http') ? $photoUrl : asset($photoUrl);
                    @endphp
                    <div class="group relative rounded-2xl overflow-hidden aspect-[3/4] bg-slate-900 shadow-md hover:shadow-2xl border border-white/10 cursor-pointer transition-all duration-300 transform hover:-translate-y-1.5"
                         onclick="openLightbox({{ $index }})">

                        <img
                            src="{{ $imgSrc }}"
                            alt="Galeri {{ $character['name'] }} {{ $index + 1 }}"
                            class="w-full h-full object-cover object-top transition duration-500 group-hover:scale-110"
                            onerror="this.onerror=null; this.src='https://cdn.myanimelist.net/images/characters/16/374828.jpg';"
                        >

                        <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition duration-300 pointer-events-none"
                             style="background-color: var(--theme);"></div>

                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <div class="bg-black/60 backdrop-blur-sm text-white p-3 rounded-full shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</div>

{{-- LIGHTBOX MODAL FULLSCREEN --}}
<div id="lightbox-modal"
     class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden flex items-center justify-center p-3 sm:p-4 select-none max-w-full overflow-hidden"
     role="dialog"
     aria-modal="true"
     onclick="closeLightbox()">

    <button type="button"
            onclick="closeLightbox()"
            class="absolute top-3 sm:top-4 right-3 sm:right-4 text-white/80 hover:text-white bg-black/50 hover:bg-[#ff007a] rounded-full w-11 h-11 flex items-center justify-center transition z-20 focus:outline-none shadow-lg"
            aria-label="Tutup Galeri (Escape)">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <button type="button"
            onclick="prevLightbox(event)"
            class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white bg-black/50 hover:bg-[#ff007a] rounded-full w-11 h-11 flex items-center justify-center transition z-20 focus:outline-none shadow-lg"
            aria-label="Foto Sebelumnya">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <button type="button"
            onclick="nextLightbox(event)"
            class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white bg-black/50 hover:bg-[#ff007a] rounded-full w-11 h-11 flex items-center justify-center transition z-20 focus:outline-none shadow-lg"
            aria-label="Foto Selanjutnya">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <div class="max-w-4xl max-h-[85vh] w-full flex flex-col items-center justify-center relative z-10 px-2" onclick="event.stopPropagation()">
        <img id="lightbox-img"
             src=""
             alt="Pratinjau Galeri Karakter"
             class="max-w-full max-h-[75vh] object-contain rounded-2xl shadow-2xl transition duration-300 border border-white/20">

        <div class="mt-4 px-4 py-1.5 bg-black/60 backdrop-blur-sm rounded-full text-white text-xs font-semibold tracking-wider border border-white/20">
            <span id="lightbox-counter">1 / 1</span>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Kamus Terjemahan Halaman Detail Karakter
    window.pageTranslations = {
        id: {
            char_page: {
                switch_sister: "Pilih Karakter:",
                tab_profile: "Profil",
                tab_story: "Kisah",
                tab_stats: "Statistik",
                tab_quote: "Quote",
                personal_data_heading: "Data Pribadi",
                story_heading: "Deskripsi Karakter",
                stats_heading: "Parameter Kemampuan & Karakteristik",
                stat_study: "Kemampuan Akademik (Study)",
                stat_cooking: "Keahlian Memasak (Cooking)",
                stat_athletics: "Kemampuan Atletik (Athletics)",
                stat_fashion: "Pesona & Gaya Busana (Fashion / Charm)",
                stat_sincerity: "Ketulusan Hati (Sincerity)",
                quote_heading: "Kutipan Khas",
                gallery_heading: "Galeri Foto Karakter",
                gallery_hint: "Klik foto untuk membuka resolusi penuh",
                voice_button: "Dengarkan Suara Karakter (Voice Line)"
            }
        },
        en: {
            char_page: {
                switch_sister: "Select Character:",
                tab_profile: "Profile",
                tab_story: "Story",
                tab_stats: "Stats & Radar",
                tab_quote: "Quote",
                personal_data_heading: "Personal Data",
                story_heading: "Character Description",
                stats_heading: "Ability & Personality Parameters",
                stat_study: "Academic Ability (Study)",
                stat_cooking: "Cooking Mastery (Cooking)",
                stat_athletics: "Athletic Ability (Athletics)",
                stat_fashion: "Fashion & Charm",
                stat_sincerity: "Sincerity & Pure Heart",
                quote_heading: "Signature Quote",
                gallery_heading: "Character Photo Gallery",
                gallery_hint: "Click photo to open full resolution",
                voice_button: "Listen to Character Voice Sample"
            }
        },
        jp: {
            char_page: {
                switch_sister: "キャラクター切替:",
                tab_profile: "プロフィール",
                tab_story: "ストーリー",
                tab_stats: "パラメータ",
                tab_quote: "名言",
                personal_data_heading: "プロフィール詳細",
                story_heading: "キャラクター紹介",
                stats_heading: "能力・パラメータ",
                stat_study: "学力・勉強",
                stat_cooking: "料理の腕前",
                stat_athletics: "運動能力",
                stat_fashion: "女子力・ファッション",
                stat_sincerity: "素直さ・誠実度",
                quote_heading: "名セリフ",
                gallery_heading: "キャラクターフォトギャラリー",
                gallery_hint: "画像をクリックして拡大",
                voice_button: "キャラクターボイスを聴く"
            }
        }
    };

    const charData = {
        quote: @json($character['quote']),
        description: @json($character['description']),
        profile_i18n: @json($character['profile_i18n'])
    };

    const galleryPhotos = @json(array_map(fn($p) => str_starts_with($p, 'http') ? $p : asset($p), $character['gallery']));
    let currentPhotoIndex = 0;

    function renderCharacterData(lang) {
        const descEl = document.getElementById('character-description-text');
        const quoteEl = document.getElementById('character-quote-text');
        const profileGrid = document.getElementById('character-profile-grid');

        if (descEl && charData.description) {
            descEl.textContent = charData.description[lang] || charData.description['id'] || '';
        }

        if (quoteEl && charData.quote) {
            quoteEl.textContent = charData.quote[lang] || charData.quote['id'] || '';
        }

        if (profileGrid && charData.profile_i18n) {
            const profileData = charData.profile_i18n[lang] || charData.profile_i18n['id'] || {};
            profileGrid.innerHTML = '';

            Object.entries(profileData).forEach(([label, value]) => {
                const item = document.createElement('div');
                item.className = 'bg-slate-50 p-3.5 rounded-xl border border-slate-100 hover:border-[var(--theme)] transition';
                item.innerHTML = `
                    <span class="block text-[11px] text-slate-400 font-medium">${label}</span>
                    <span class="block text-xs sm:text-sm font-extrabold text-slate-800 mt-0.5">${value}</span>
                `;
                profileGrid.appendChild(item);
            });
        }
    }

    window.onLanguageChanged = function(lang) {
        renderCharacterData(lang);
    };

    // Tab Switcher
    function switchCharacterTab(tabKey) {
        const tabs = ['profile', 'story', 'stats', 'quote'];

        tabs.forEach(key => {
            const btn = document.getElementById(`tab-btn-${key}`);
            const content = document.getElementById(`tab-content-${key}`);

            if (key === tabKey) {
                if (btn) {
                    btn.style.borderColor = 'var(--theme)';
                    btn.style.color = 'var(--theme)';
                    btn.style.backgroundColor = 'color-mix(in srgb, var(--theme) 8%, transparent)';
                    btn.classList.remove('text-slate-500', 'border-transparent');
                }
                if (content) {
                    content.classList.remove('hidden');
                    content.classList.add('block');
                }
            } else {
                if (btn) {
                    btn.style.borderColor = 'transparent';
                    btn.style.color = '';
                    btn.style.backgroundColor = '';
                    btn.classList.add('text-slate-500', 'border-transparent');
                }
                if (content) {
                    content.classList.add('hidden');
                    content.classList.remove('block');
                }
            }
        });
    }

    // Voice Quote Simulation
    function playVoiceSample() {
        const voiceText = document.getElementById('voice-text');
        const lang = window.currentLanguage || localStorage.getItem('5hanayome_lang') || 'id';
        const quote = charData.quote ? (charData.quote[lang] || charData.quote['jp'] || charData.quote['id']) : '';

        if (voiceText) {
            voiceText.textContent = `🔊 ${quote}`;
            setTimeout(() => {
                const activeDict = window.pageTranslations && window.pageTranslations[lang] ? window.pageTranslations[lang] : window.pageTranslations['id'];
                voiceText.textContent = (activeDict.char_page && activeDict.char_page.voice_button) ? activeDict.char_page.voice_button : "Dengarkan Suara Karakter (Voice Line)";
            }, 4000);
        }
    }

    // Lightbox Modal
    function openLightbox(index) {
        currentPhotoIndex = index;
        updateLightbox();
        const modal = document.getElementById('lightbox-modal');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function closeLightbox() {
        const modal = document.getElementById('lightbox-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    function updateLightbox() {
        const img = document.getElementById('lightbox-img');
        const counter = document.getElementById('lightbox-counter');
        if (img && galleryPhotos[currentPhotoIndex]) {
            img.src = galleryPhotos[currentPhotoIndex];
        }
        if (counter) {
            counter.textContent = `${currentPhotoIndex + 1} / ${galleryPhotos.length}`;
        }
    }

    function prevLightbox(e) {
        if (e) e.stopPropagation();
        currentPhotoIndex = (currentPhotoIndex - 1 + galleryPhotos.length) % galleryPhotos.length;
        updateLightbox();
    }

    function nextLightbox(e) {
        if (e) e.stopPropagation();
        currentPhotoIndex = (currentPhotoIndex + 1) % galleryPhotos.length;
        updateLightbox();
    }

    document.addEventListener('keydown', (e) => {
        const modal = document.getElementById('lightbox-modal');
        if (modal && !modal.classList.contains('hidden')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') prevLightbox();
            if (e.key === 'ArrowRight') nextLightbox();
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        let savedLang = 'id';
        try {
            savedLang = localStorage.getItem('5hanayome_lang') || 'id';
        } catch (e) {
            savedLang = 'id';
        }
        renderCharacterData(savedLang);
    });
</script>
@endpush
@endsection
