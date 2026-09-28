@extends('layouts.app')

@section('title', '放送・配信情報 (On Air) | TVアニメ「五等分の花嫁」')
@section('meta_description', 'TVアニメ「五等分の花嫁」のテレビ放送スケジュール（TBS・サンテレビ・BS11）および配信プラットフォーム情報。')

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
            <span class="font-black text-[#ff007a]">On Air</span>
        </nav>

        {{-- Seksi Utama On Air & Streaming --}}
        <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-white/10 pb-5">
                <div class="flex items-center gap-3">
                    <div class="w-2.5 h-8 bg-[#ff007a] rounded-full"></div>
                    <div>
                        <h1 data-i18n="onair.title" class="text-2xl sm:text-3xl font-black text-white">放送・配信情報 (On Air)</h1>
                        <span data-i18n="onair.subtitle" class="text-xs text-slate-400 font-medium">Jadwal Penayangan Televisi Jepang & Layanan Streaming Resmi</span>
                    </div>
                </div>

                {{-- Timezone Switcher Pill --}}
                <div class="flex items-center gap-1.5 bg-slate-800 p-1.5 rounded-xl border border-white/10 text-xs font-bold">
                    <span data-i18n="onair.tz_label" class="text-slate-400 px-2">Zona Waktu:</span>
                    <button type="button" onclick="setTimezone('jst')" id="tz-btn-jst" class="tz-btn px-3 py-1 rounded-lg bg-[#ff007a] text-white shadow font-black" data-i18n="onair.tz_jst">JST (Jepang)</button>
                    <button type="button" onclick="setTimezone('wib')" id="tz-btn-wib" class="tz-btn px-3 py-1 rounded-lg text-slate-300 hover:text-white" data-i18n="onair.tz_wib">WIB (UTC+7)</button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Jadwal Siaran Televisi --}}
                <div class="space-y-3.5">
                    <h2 class="font-black text-white text-base border-b border-white/10 pb-2.5 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#ff007a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span data-i18n="onair.tv_heading">テレビ放送スケジュール (TV Broadcast)</span>
                    </h2>

                    <div class="space-y-2.5 text-xs">
                        <div class="p-4 bg-slate-800/80 border border-white/10 rounded-2xl flex justify-between items-center hover:border-pink-500/40 transition">
                            <div>
                                <span class="font-black text-white text-sm block">TBSテレビ (TBS Tokyo)</span>
                                <span data-i18n="onair.tbs_desc" class="text-slate-400 text-[11px]">Saluran Utama Penayangan Perdana</span>
                            </div>
                            <span id="tz-time-tbs" class="font-black text-pink-300 text-sm bg-pink-500/20 px-3 py-1.5 rounded-xl border border-pink-500/30">毎週木曜 25:28〜 JST</span>
                        </div>

                        <div class="p-4 bg-slate-800/80 border border-white/10 rounded-2xl flex justify-between items-center hover:border-pink-500/40 transition">
                            <div>
                                <span class="font-black text-white text-sm block">サンテレビ (Sun TV)</span>
                                <span data-i18n="onair.sun_desc" class="text-slate-400 text-[11px]">Kawasan Kansai & Hyogo</span>
                            </div>
                            <span id="tz-time-sun" class="font-black text-pink-300 text-sm bg-pink-500/20 px-3 py-1.5 rounded-xl border border-pink-500/30">毎週金曜 24:00〜 JST</span>
                        </div>

                        <div class="p-4 bg-slate-800/80 border border-white/10 rounded-2xl flex justify-between items-center hover:border-pink-500/40 transition">
                            <div>
                                <span class="font-black text-white text-sm block">BS11 (Nippon BS)</span>
                                <span data-i18n="onair.bs11_desc" class="text-slate-400 text-[11px]">Siaran Satelit Nasional Seluruh Jepang</span>
                            </div>
                            <span id="tz-time-bs11" class="font-black text-pink-300 text-sm bg-pink-500/20 px-3 py-1.5 rounded-xl border border-pink-500/30">毎週日曜 23:30〜 JST</span>
                        </div>
                    </div>
                </div>

                {{-- Platform Video On Demand / Streaming --}}
                <div class="space-y-3.5">
                    <h2 class="font-black text-white text-base border-b border-white/10 pb-2.5 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#ff007a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span data-i18n="onair.stream_heading">配信プラットフォーム (Streaming VOD)</span>
                    </h2>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-1 text-xs">
                        @foreach ($streamingPlatforms as $platform)
                            <div class="p-3.5 bg-slate-800/80 border border-white/10 rounded-2xl text-center font-extrabold text-white hover:border-pink-500/40 transition shadow-sm">
                                <span class="block text-white font-black">{{ $platform['name'] }}</span>
                                <span class="text-[10px] {{ $platform['color'] }} font-bold">{{ $platform['badge'] }}</span>
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
            onair: {
                title: "Informasi Penayangan & Streaming (On Air)",
                subtitle: "Jadwal Penayangan Televisi Jepang & Layanan Streaming Resmi",
                tz_label: "Zona Waktu:",
                tz_jst: "JST (Jepang)",
                tz_wib: "WIB (UTC+7)",
                tv_heading: "Jadwal Siaran Televisi (TV Broadcast)",
                stream_heading: "Platform Streaming Resmi (VOD)",
                tbs_desc: "Saluran Utama Penayangan Perdana",
                sun_desc: "Kawasan Kansai & Hyogo",
                bs11_desc: "Siaran Satelit Nasional Seluruh Jepang"
            }
        },
        en: {
            onair: {
                title: "Broadcast & Streaming (On Air)",
                subtitle: "Japanese TV Broadcast Schedules & Official Global Streaming Services",
                tz_label: "Timezone:",
                tz_jst: "JST (Japan)",
                tz_wib: "WIB (UTC+7)",
                tv_heading: "TV Broadcast Schedule",
                stream_heading: "Streaming Platforms (VOD)",
                tbs_desc: "Flagship Premiere Channel (Kanto Region)",
                sun_desc: "Kansai & Hyogo Region",
                bs11_desc: "Nationwide Satellite Broadcasting"
            }
        },
        jp: {
            onair: {
                title: "放送・配信情報 (On Air)",
                subtitle: "TVアニメ「五等分の花嫁」テレビ放送スケジュール＆配信情報",
                tz_label: "タイムゾーン:",
                tz_jst: "JST (日本時間)",
                tz_wib: "WIB (インドネシア時間)",
                tv_heading: "テレビ放送スケジュール (TV Broadcast)",
                stream_heading: "配信プラットフォーム (Streaming VOD)",
                tbs_desc: "関東広域・地上波キー局",
                sun_desc: "関西・兵庫エリア",
                bs11_desc: "全国無料BS放送"
            }
        }
    };

    let currentTimezone = 'jst';

    function setTimezone(tz) {
        currentTimezone = tz;
        const tbsEl = document.getElementById('tz-time-tbs');
        const sunEl = document.getElementById('tz-time-sun');
        const bs11El = document.getElementById('tz-time-bs11');
        const btnJst = document.getElementById('tz-btn-jst');
        const btnWib = document.getElementById('tz-btn-wib');
        const lang = window.currentLanguage || localStorage.getItem('5hanayome_lang') || 'id';

        if (tz === 'wib') {
            if (lang === 'jp') {
                if (tbsEl) tbsEl.textContent = "木曜 23:28〜 WIB";
                if (sunEl) sunEl.textContent = "金曜 22:00〜 WIB";
                if (bs11El) bs11El.textContent = "日曜 21:30〜 WIB";
            } else if (lang === 'en') {
                if (tbsEl) tbsEl.textContent = "Thu 23:28 WIB";
                if (sunEl) sunEl.textContent = "Fri 22:00 WIB";
                if (bs11El) bs11El.textContent = "Sun 21:30 WIB";
            } else {
                if (tbsEl) tbsEl.textContent = "Kamis 23:28 WIB";
                if (sunEl) sunEl.textContent = "Jumat 22:00 WIB";
                if (bs11El) bs11El.textContent = "Minggu 21:30 WIB";
            }
            if (btnWib) btnWib.className = "tz-btn px-3 py-1 rounded-lg bg-[#ff007a] text-white shadow font-black";
            if (btnJst) btnJst.className = "tz-btn px-3 py-1 rounded-lg text-slate-300 hover:text-white";
        } else {
            if (lang === 'en') {
                if (tbsEl) tbsEl.textContent = "Every Thu 25:28 JST";
                if (sunEl) sunEl.textContent = "Every Fri 24:00 JST";
                if (bs11El) bs11El.textContent = "Every Sun 23:30 JST";
            } else if (lang === 'id') {
                if (tbsEl) tbsEl.textContent = "Setiap Kamis 25:28 JST";
                if (sunEl) sunEl.textContent = "Setiap Jumat 24:00 JST";
                if (bs11El) bs11El.textContent = "Setiap Minggu 23:30 JST";
            } else {
                if (tbsEl) tbsEl.textContent = "毎週木曜 25:28〜 JST";
                if (sunEl) sunEl.textContent = "毎週金曜 24:00〜 JST";
                if (bs11El) bs11El.textContent = "毎週日曜 23:30〜 JST";
            }
            if (btnJst) btnJst.className = "tz-btn px-3 py-1 rounded-lg bg-[#ff007a] text-white shadow font-black";
            if (btnWib) btnWib.className = "tz-btn px-3 py-1 rounded-lg text-slate-300 hover:text-white";
        }
    }

    window.onLanguageChanged = function(lang) {
        setTimezone(currentTimezone);
    };
</script>
@endpush
@endsection
