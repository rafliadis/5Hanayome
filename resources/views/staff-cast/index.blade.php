@extends('layouts.app')

@section('title', 'スタッフ ＆ キャスト (Staff & Cast) | TVアニメ「五等分の花嫁」')
@section('meta_description', 'TVアニメ「五等分の花嫁」の豪華声優陣（キャスト）および制作スタッフ・アニメーション制作会社情報。')

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
            <span class="font-black text-[#ff007a]">Staff & Cast</span>
        </nav>

        {{-- Seksi Utama Staff & Cast --}}
        <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl space-y-6">
            <div class="border-b border-white/10 pb-5 flex items-center gap-3">
                <div class="w-2.5 h-8 bg-[#ff007a] rounded-full"></div>
                <div>
                    <h1 data-i18n="staff_cast.title" class="text-2xl sm:text-3xl font-black text-white">スタッフ ＆ キャスト (Staff & Cast)</h1>
                    <span data-i18n="staff_cast.subtitle" class="text-xs text-slate-400 font-medium">Pengisi Suara & Tim Produksi TVアニメ「五等分の花嫁」</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                {{-- Sisi Kiri: Daftar Pemeran Suara (Cast) --}}
                <div class="lg:col-span-7 space-y-4">
                    <h2 class="font-black text-white text-base border-b border-white/10 pb-2.5 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#ff007a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/></svg>
                        <span data-i18n="staff_cast.cast_heading">キャスト (Voice Actors)</span>
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ($castList as $cast)
                            <div class="flex items-center gap-3 p-3.5 bg-slate-800/80 border {{ $cast['border'] }} rounded-2xl hover:border-pink-500/40 transition">
                                <div class="w-10 h-10 rounded-full {{ $cast['bg_color'] }} text-white font-black flex items-center justify-center text-xs flex-shrink-0 shadow">
                                    {{ $cast['kanji'] }}
                                </div>
                                <div>
                                    <span class="block font-bold text-slate-300 text-xs">{{ $cast['character'] }}</span>
                                    <span class="block {{ $cast['text_color'] }} font-extrabold text-xs">{{ $cast['actor'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Sisi Kanan: Tim Produksi (Staff) & Studio Animasi --}}
                <div class="lg:col-span-5 space-y-4">
                    <h2 class="font-black text-white text-base border-b border-white/10 pb-2.5 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#ff007a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span data-i18n="staff_cast.staff_heading">スタッフ (Production Team)</span>
                    </h2>

                    <div class="space-y-3 text-xs bg-slate-800/80 p-5 rounded-2xl border border-white/10">
                        @foreach ($staffList as $index => $staff)
                            <div class="flex justify-between border-b border-white/10 pb-2 last:border-b-0 last:pb-0">
                                <span class="staff-role-label text-slate-400 font-medium" data-index="{{ $index }}">{{ $staff['role'] }}</span>
                                <span class="font-extrabold text-white text-right max-w-[60%]">{{ $staff['name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    window.pageTranslations = {
        id: {
            staff_cast: {
                title: "Staf & Pengisi Suara (Staff & Cast)",
                subtitle: "Pemeran Karakter & Tim Produksi TV Anime 「The Quintessential Quintuplets」",
                cast_heading: "Pemeran Suara (Voice Actors)",
                staff_heading: "Tim Produksi (Production Team)"
            }
        },
        en: {
            staff_cast: {
                title: "Staff & Cast",
                subtitle: "Voice Actors & Production Crew of TV Anime The Quintessential Quintuplets",
                cast_heading: "Voice Cast",
                staff_heading: "Production Staff"
            }
        },
        jp: {
            staff_cast: {
                title: "スタッフ ＆ キャスト (Staff & Cast)",
                subtitle: "TVアニメ「五等分の花嫁」声優陣・制作スタッフ陣一覧",
                cast_heading: "キャスト (Voice Actors)",
                staff_heading: "スタッフ (Staff)"
            }
        }
    };

    const staffRolesData = [
        { id: "Karya Asli (Original Author)", en: "Original Work", jp: "原作" },
        { id: "Sutradara (Director)", en: "Director", jp: "監督" },
        { id: "Komposisi Seri", en: "Series Composition", jp: "シリーズ構成" },
        { id: "Desain Karakter", en: "Character Design", jp: "キャラクターデザイン" },
        { id: "Musik & Tata Suara", en: "Music & Sound", jp: "音楽" },
        { id: "Studio Animasi", en: "Animation Production", jp: "アニメーション制作" },
        { id: "Komite Produksi", en: "Production Committee", jp: "製作" }
    ];

    function updateStaffRoles(lang) {
        document.querySelectorAll('.staff-role-label').forEach(el => {
            const idx = parseInt(el.getAttribute('data-index'), 10);
            if (!isNaN(idx) && staffRolesData[idx] && staffRolesData[idx][lang]) {
                el.textContent = staffRolesData[idx][lang];
            }
        });
    }

    window.onLanguageChanged = function(lang) {
        updateStaffRoles(lang);
    };

    document.addEventListener('DOMContentLoaded', () => {
        const lang = window.currentLanguage || localStorage.getItem('5hanayome_lang') || 'id';
        updateStaffRoles(lang);
    });
</script>
@endpush
@endsection
