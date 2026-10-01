@extends('layouts.app')

@section('title', 'キャラクター紹介 (Character Lineup) | TVアニメ「五等分の花嫁」')

@section('content')
<div class="w-full min-h-full py-8 px-4 sm:px-6 lg:px-8 bg-slate-950 text-slate-100 flex-grow">
    <div class="max-w-7xl mx-auto w-full space-y-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-slate-400 select-none" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" data-i18n="nav.home" class="hover:text-[#ff007a] transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Home</span>
            </a>
            <span>/</span>
            <span class="font-black text-[#ff007a]">Character</span>
        </nav>

        {{-- Seksi Koleksi Karakter --}}
        <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl space-y-6">
            {{-- Header Seksi & Filter --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-white/10 pb-5">
                <div class="flex items-center gap-3">
                    <div class="w-2.5 h-8 bg-[#ff007a] rounded-full"></div>
                    <div>
                        <h1 data-i18n="character.title" class="text-2xl sm:text-3xl font-black text-white">キャラクター紹介 (Character Lineup)</h1>
                        <span data-i18n="character.subtitle" class="text-xs text-slate-400 font-medium">Klik pada karakter untuk membuka profil lengkap, galeri foto & quote suara</span>
                    </div>
                </div>

                {{-- Filter Pills: All / Quintuplets / Tutor --}}
                <div class="flex items-center gap-1.5 overflow-x-auto max-w-full py-1 custom-scrollbar">
                    <button type="button" onclick="filterCharacters('all')" class="char-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-[#ff007a] text-white shadow shrink-0" data-filter="all" data-i18n="character.filter_all">All (6)</button>
                    <button type="button" onclick="filterCharacters('quintuplets')" class="char-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20 shrink-0" data-filter="quintuplets" data-i18n="character.filter_quintuplets">中野家五つ子 (5)</button>
                    <button type="button" onclick="filterCharacters('tutor')" class="char-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20 shrink-0" data-filter="tutor" data-i18n="character.filter_tutor">家庭教師 (1)</button>
                </div>
            </div>

            {{-- Grid Karakter 6 Kartu --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-5" id="character-card-grid">
                @foreach ($characters as $slug => $char)
                    @php
                        $theme = $char['theme_color'] ?? '#ff007a';
                        $isTutor = ($char['slug'] ?? $slug) === 'fuutarou-uesugi';
                        $subjectLabel = is_array($char['subject']) ? ($char['subject']['id'] ?? '') : $char['subject'];
                        $charSlug = $char['slug'] ?? $slug;
                    @endphp
                    <a href="{{ route('karakter.show', ['slug' => $charSlug]) }}"
                       data-character-type="{{ $isTutor ? 'tutor' : 'quintuplets' }}"
                       class="char-lineup-card group bg-slate-800/80 rounded-2xl overflow-hidden border border-white/10 shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col transform hover:-translate-y-2 relative select-none">

                        {{-- Strip Warna Tema Atas --}}
                        <div class="h-2.5 w-full transition-all duration-300 group-hover:h-3" style="background-color: {{ $theme }};"></div>

                        {{-- Foto Portrait Aspect 3/4 --}}
                        <div class="aspect-[3/4] w-full overflow-hidden bg-slate-900 relative">
                            <img src="{{ asset($char['photo']) }}" alt="{{ $char['name'] }}"
                                 class="w-full h-full object-cover object-top transition duration-500 group-hover:scale-105"
                                 onerror="this.onerror=null; this.src='https://cdn.myanimelist.net/images/characters/16/374828.jpg';">

                            {{-- Overlay Warna Tema saat Hover --}}
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-25 transition duration-300 pointer-events-none" style="background-color: {{ $theme }};"></div>

                            {{-- Badge Mata Pelajaran Unggul Pojok Atas --}}
                            <div class="char-subject-badge absolute top-2 left-2 z-10 bg-black/75 backdrop-blur-sm text-white px-2 py-0.5 rounded-md text-[9px] font-extrabold border border-white/20"
                                 data-slug="{{ $charSlug }}">
                                {{ $subjectLabel }}
                            </div>
                        </div>

                        {{-- Informasi Bawah Kartu --}}
                        <div class="p-3.5 flex-grow flex flex-col justify-between text-center bg-slate-800/90">
                            <div>
                                <span class="text-[10px] sm:text-[11px] font-black tracking-wider block" style="color: {{ $theme }};">
                                    {{ $char['japanese_name'] }}
                                </span>
                                <h3 class="font-extrabold text-white text-xs sm:text-sm mt-0.5 group-hover:text-[#ff007a] transition line-clamp-1">
                                    {{ $char['name'] }}
                                </h3>
                                <span class="text-[10px] text-slate-400 font-medium block mt-0.5 line-clamp-1">
                                    {{ $char['cv'] }}
                                </span>
                            </div>

                            <div class="mt-3 pt-2 border-t border-white/10 flex items-center justify-center gap-1 font-bold text-[11px] group-hover:gap-2 transition-all" style="color: {{ $theme }};">
                                <span data-i18n="character.card_btn">Profil Lengkap</span>
                                <span>&rarr;</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    window.pageTranslations = {
        id: {
            character: {
                title: "Daftar Karakter (Character Lineup)",
                subtitle: "Klik pada karakter untuk membuka profil lengkap, galeri foto & quote suara",
                filter_all: "Semua (6)",
                filter_quintuplets: "Kembar Lima Nakano (5)",
                filter_tutor: "Guru Privat (1)",
                card_btn: "Profil Lengkap"
            }
        },
        en: {
            character: {
                title: "Character Lineup",
                subtitle: "Click on a character to view their full profile, photo gallery & voice line sample",
                filter_all: "All (6)",
                filter_quintuplets: "Nakano Quintuplets (5)",
                filter_tutor: "Private Tutor (1)",
                card_btn: "Full Profile"
            }
        },
        jp: {
            character: {
                title: "キャラクター紹介 (Character Lineup)",
                subtitle: "キャラクターをクリックすると詳細プロフィール、フォトギャラリー、ボイス名言をご覧いただけます",
                filter_all: "全員 (6)",
                filter_quintuplets: "中野家五つ子 (5)",
                filter_tutor: "家庭教師 (1)",
                card_btn: "プロフィール詳細"
            }
        }
    };

    const characterSubjects = {
        'ichika-nakano': { id: 'Matematika', en: 'Mathematics', jp: '数学' },
        'nino-nakano': { id: 'Bahasa Inggris', en: 'English', jp: '英語' },
        'miku-nakano': { id: 'Sejarah Jepang / IPS', en: 'Japanese History', jp: '日本史・社会' },
        'yotsuba-nakano': { id: 'Bahasa Jepang (Kokugo)', en: 'Japanese (Kokugo)', jp: '国語' },
        'itsuki-nakano': { id: 'Ilmu Pengetahuan Alam (IPA)', en: 'Science', jp: '理科' },
        'fuutarou-uesugi': { id: 'Semua Pelajaran (Nilai 100)', en: 'All Subjects (100)', jp: '全教科（常に100点）' }
    };

    function updateCharacterSubjects(lang) {
        document.querySelectorAll('.char-subject-badge').forEach(badge => {
            const slug = badge.getAttribute('data-slug');
            if (characterSubjects[slug] && characterSubjects[slug][lang]) {
                badge.textContent = characterSubjects[slug][lang];
            }
        });
    }

    window.onLanguageChanged = function(lang) {
        updateCharacterSubjects(lang);
    };

    function filterCharacters(filter) {
        const cards = document.querySelectorAll('.char-lineup-card');
        cards.forEach(card => {
            const type = card.getAttribute('data-character-type');
            if (filter === 'all') {
                card.classList.remove('hidden');
            } else if (filter === 'quintuplets' && type === 'quintuplets') {
                card.classList.remove('hidden');
            } else if (filter === 'tutor' && type === 'tutor') {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });

        document.querySelectorAll('.char-filter-btn').forEach(btn => {
            if (btn.getAttribute('data-filter') === filter) {
                btn.className = "char-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-[#ff007a] text-white shadow-sm";
            } else {
                btn.className = "char-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20";
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const lang = window.currentLanguage || localStorage.getItem('5hanayome_lang') || 'id';
        updateCharacterSubjects(lang);
    });
</script>
@endpush
@endsection
