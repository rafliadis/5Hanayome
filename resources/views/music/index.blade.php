@extends('layouts.app')

@section('title', '主題歌・音楽 (Music Jukebox) | TVアニメ「五等分の花嫁」')
@section('meta_description', 'TVアニメ「五等分の花嫁」のOP/ED主題歌、劇場版テーマソング、OVA・特別編キャラクターソング公式ディスコグラフィ＆Jukebox。')

@section('content')
<div class="w-full min-h-full py-6 sm:py-8 px-4 sm:px-6 lg:px-8 bg-slate-950 text-slate-100 flex-grow">
    <div class="max-w-7xl mx-auto w-full space-y-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-slate-400 select-none" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" data-i18n="nav.home" class="hover:text-[#ff007a] transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Home</span>
            </a>
            <span class="text-slate-600">/</span>
            <span class="font-black text-[#ff007a]">Music</span>
        </nav>

        {{-- Header Card --}}
        <div class="relative overflow-hidden bg-slate-900/80 backdrop-blur-xl rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl space-y-6">
            {{-- Ambient Light Accent --}}
            <div id="ambient-glow" class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#ff007a]/15 blur-3xl pointer-events-none transition-colors duration-1000"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-white/10 pb-5">
                <div class="flex items-start sm:items-center gap-3.5">
                    <div id="header-accent-bar" class="w-3 h-10 rounded-full bg-[#ff007a] shadow-lg shadow-pink-500/50 transition-colors duration-500"></div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h1 data-i18n="music.title" class="text-2xl sm:text-3xl font-black text-white tracking-tight">主題歌・音楽 (Theme Songs & Music)</h1>
                            <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-pink-500/10 text-pink-400 border border-pink-500/20">8 Tracks</span>
                        </div>
                        <p data-i18n="music.subtitle" class="text-xs sm:text-sm text-slate-400 font-medium mt-0.5">
                            Koleksi Lagu Tema Opening, Ending, Movie, dan OVA Spesial TV Anime 五等分の花嫁
                        </p>
                    </div>
                </div>

                {{-- Status Badges --}}
                <div class="flex items-center gap-2 select-none self-start md:self-auto">
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-slate-800/80 border border-white/10 text-xs text-slate-300">
                        <span id="live-indicator-dot" class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span class="font-mono text-[11px]">Hi-Fi Audio</span>
                    </div>
                    <div class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-slate-800/80 border border-white/10 text-xs text-slate-300">
                        <svg class="w-3.5 h-3.5 text-pink-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
                        <span class="text-[11px] font-medium">Jukebox Engine</span>
                    </div>
                </div>
            </div>

            {{-- Main Layout Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                {{-- ==========================================
                     DECK KIRI: ANIME VINYL JUKEBOX PLAYER
                     ========================================== --}}
                <div class="lg:col-span-5 bg-gradient-to-b from-slate-950/95 to-slate-900/95 p-6 rounded-3xl text-white flex flex-col justify-between border border-white/10 shadow-2xl relative overflow-hidden space-y-5">

                    {{-- Dynamic Glow Backdrop --}}
                    <div id="deck-glow" class="absolute inset-0 bg-[#ff007a]/5 pointer-events-none transition-colors duration-700"></div>

                    {{-- Top Deck Bar --}}
                    <div class="relative z-10 flex items-center justify-between">
                        <span class="text-[10px] font-extrabold uppercase tracking-widest text-pink-400 bg-pink-500/10 px-3 py-1 rounded-full border border-pink-500/20 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-pink-400 animate-ping"></span>
                            Anime Jukebox
                        </span>
                        <span id="player-track-badge" class="bg-[#ff007a] text-white text-[10px] font-extrabold px-2.5 py-0.5 rounded-full shadow-md transition-colors duration-500">
                            Season 1 OP
                        </span>
                    </div>

                    {{-- Interactive Vinyl Record Turntable --}}
                    <div class="relative z-10 flex justify-center py-2">
                        <div class="relative flex items-center justify-center">
                            {{-- Vinyl Shadow Glow --}}
                            <div id="turntable-halo" class="absolute w-44 h-44 sm:w-48 sm:h-48 rounded-full bg-[#ff007a]/20 blur-xl transition-all duration-700"></div>

                            {{-- Vinyl Disc --}}
                            <div id="jukebox-disc" class="w-40 h-40 sm:w-48 sm:h-48 rounded-full bg-gradient-to-tr from-slate-950 via-slate-900 to-slate-950 border-4 border-slate-700/80 shadow-2xl flex items-center justify-center relative transition-transform duration-700">
                                {{-- Vinyl Concentric Grooves --}}
                                <div class="absolute inset-2 rounded-full border border-slate-700/30"></div>
                                <div class="absolute inset-4 rounded-full border border-slate-700/20"></div>
                                <div class="absolute inset-6 rounded-full border border-slate-700/30"></div>
                                <div class="absolute inset-9 rounded-full border border-slate-700/20"></div>

                                {{-- Vinyl Center Label / Photo Cover --}}
                                <div id="disc-center" class="w-18 h-18 sm:w-20 sm:h-20 rounded-full bg-[#ff007a] flex items-center justify-center text-white font-black shadow-inner border-2 border-white/40 relative z-10 transition-all duration-500 overflow-hidden group">
                                    <img id="disc-img" src="{{ asset('images/banner.jpg') }}" alt="Vinyl Album Art" class="w-full h-full object-cover object-center transition-all duration-500">
                                    {{-- Spindle Hole in Center --}}
                                    <div class="absolute w-3.5 h-3.5 rounded-full bg-slate-950 border-2 border-white/80 shadow-md"></div>
                                </div>
                            </div>

                            {{-- Animated Tonearm Stylus --}}
                            <div id="tonearm" class="absolute -top-3 -right-2 w-16 h-20 pointer-events-none transition-transform duration-500 origin-top-right transform -rotate-12 opacity-80">
                                <svg viewBox="0 0 100 120" class="w-full h-full filter drop-shadow">
                                    <circle cx="85" cy="15" r="10" fill="#475569" stroke="#94a3b8" stroke-width="3"/>
                                    <path d="M85 15 L50 85 L35 95" fill="none" stroke="#cbd5e1" stroke-width="4" stroke-linecap="round"/>
                                    <rect x="25" y="90" width="16" height="10" rx="2" fill="#ff007a" id="tonearm-head"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Track Info --}}
                    <div class="relative z-10 text-center space-y-1">
                        <h2 id="player-track-title" class="text-lg sm:text-xl font-black text-white tracking-tight leading-tight">
                            五等分の気持ち
                        </h2>
                        <p id="player-track-romaji" class="text-xs text-pink-300 font-medium">
                            Gotoubun no Kimochi
                        </p>
                        <p id="player-track-artist" class="text-[11px] text-slate-400">
                            中野家の五つ子 (花澤香菜、竹達彩奈、伊藤美来、佐倉綾音、水瀬いのり)
                        </p>
                    </div>

                    {{-- Hidden HTML5 Audio Element --}}
                    <audio id="jukebox-audio" preload="metadata"></audio>

                    {{-- Interactive Soundwave Equalizer --}}
                    <div id="equalizer-bar" class="relative z-10 flex items-end justify-center gap-1.5 h-7 opacity-30 transition-opacity duration-300">
                        <div class="eq-bar w-1.5 bg-amber-400 rounded-full h-2 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-purple-400 rounded-full h-3 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-sky-400 rounded-full h-4 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-green-400 rounded-full h-2 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-red-400 rounded-full h-3 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-pink-500 rounded-full h-5 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-cyan-400 rounded-full h-3 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-amber-500 rounded-full h-4 transition-all duration-150"></div>
                        <div class="eq-bar w-1.5 bg-teal-400 rounded-full h-2 transition-all duration-150"></div>
                    </div>

                    {{-- Timeline Scrubber Bar --}}
                    <div class="relative z-10 space-y-1 px-1">
                        <div class="relative flex items-center group">
                            <input type="range" id="jukebox-progress" min="0" max="100" value="0" step="0.1"
                                   class="w-full h-2 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-[#ff007a] hover:h-2.5 transition-all focus:outline-none"
                                   aria-label="Seek Waktu Lagu">
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-400 font-mono">
                            <span id="player-current-time">00:00</span>
                            <span id="player-total-time">03:45</span>
                        </div>
                    </div>

                    {{-- Playback Control Deck --}}
                    <div class="relative z-10 flex items-center justify-between pt-1">
                        {{-- Shuffle Button --}}
                        <button type="button" onclick="toggleShuffle()" id="btn-shuffle"
                                class="p-2.5 rounded-full text-slate-400 hover:text-white hover:bg-white/10 transition active:scale-95"
                                title="Acak Lagu (Shuffle)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H4V8h4l6-6v20l-6-6zm8-12l4 4-4 4m0 4l4 4-4 4"/></svg>
                        </button>

                        {{-- Previous Button --}}
                        <button type="button" onclick="prevTrack()"
                                class="w-10 h-10 rounded-full bg-slate-800/80 hover:bg-slate-700 text-slate-200 hover:text-white flex items-center justify-center transition active:scale-90 border border-white/10"
                                aria-label="Lagu Sebelumnya">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
                        </button>

                        {{-- Big Play / Pause Button --}}
                        <button type="button" onclick="toggleJukeboxPlay()" id="jukebox-play-btn"
                                class="w-14 h-14 rounded-full bg-[#ff007a] hover:bg-[#ff5c93] active:scale-95 text-white flex items-center justify-center shadow-xl shadow-pink-500/40 transition-all duration-300 transform hover:scale-105"
                                aria-label="Play Track">
                            <svg id="icon-play" class="w-7 h-7 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </button>

                        {{-- Next Button --}}
                        <button type="button" onclick="nextTrack()"
                                class="w-10 h-10 rounded-full bg-slate-800/80 hover:bg-slate-700 text-slate-200 hover:text-white flex items-center justify-center transition active:scale-90 border border-white/10"
                                aria-label="Lagu Selanjutnya">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
                        </button>

                        {{-- Repeat Mode Button --}}
                        <button type="button" onclick="toggleRepeat()" id="btn-repeat"
                                class="p-2.5 rounded-full text-slate-400 hover:text-white hover:bg-white/10 transition active:scale-95"
                                title="Ulangi (Repeat)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        </button>
                    </div>

                    {{-- Volume & Keyboard Shortcut Dock --}}
                    <div class="relative z-10 pt-2 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="toggleMute()" id="btn-volume-icon" class="text-slate-400 hover:text-white transition" aria-label="Mute / Unmute">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
                            </button>
                            <input type="range" id="volume-slider" min="0" max="1" step="0.05" value="0.8"
                                   class="w-20 sm:w-24 h-1.5 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-[#ff007a]"
                                   aria-label="Volume">
                        </div>
                        <span data-i18n="music.shortcut_hint" class="text-[10px] text-slate-500 hidden sm:inline-block">Shortcut: Spasi [Play]</span>
                    </div>

                </div>

                {{-- ==========================================
                     DECK KANAN: TRACKLIST & SMART DISCOGRAPHY
                     ========================================== --}}
                <div class="lg:col-span-7 space-y-4">

                    {{-- Filter Tabs & Search Bar --}}
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 bg-slate-950/60 p-2 rounded-2xl border border-white/10">
                        {{-- Category Filter Pills --}}
                        <div class="flex items-center gap-1 overflow-x-auto pb-1 sm:pb-0 scrollbar-none max-w-full" role="tablist">
                            <button type="button" onclick="filterCategory('all')" id="tab-all" data-i18n="music.tab_all"
                                    class="category-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-[#ff007a] text-white shadow-md shrink-0">
                                Semua (All)
                            </button>
                            <button type="button" onclick="filterCategory('op')" id="tab-op" data-i18n="music.tab_op"
                                    class="category-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-800/80 text-slate-300 hover:text-white shrink-0">
                                OP
                            </button>
                            <button type="button" onclick="filterCategory('ed')" id="tab-ed" data-i18n="music.tab_ed"
                                    class="category-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-800/80 text-slate-300 hover:text-white shrink-0">
                                ED
                            </button>
                            <button type="button" onclick="filterCategory('special')" id="tab-special" data-i18n="music.tab_special"
                                    class="category-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-800/80 text-slate-300 hover:text-white shrink-0">
                                Movie / OVA
                            </button>
                        </div>

                        {{-- Live Search Input --}}
                        <div class="relative">
                            <input type="text" id="track-search-input" onkeyup="searchTracks()"
                                   placeholder="Cari lagu / artis..."
                                   data-i18n-placeholder="music.search_placeholder"
                                   class="w-full sm:w-44 bg-slate-900 border border-white/10 rounded-xl px-3 py-1.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-pink-500 transition">
                            <svg class="w-3.5 h-3.5 text-slate-500 absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                    </div>

                    {{-- Track Cards List --}}
                    <div id="tracklist-container" class="space-y-2.5 max-h-[560px] overflow-y-auto pr-1">
                        @foreach ($tracks as $key => $track)
                            <div id="track-item-{{ $key }}"
                                 data-category="{{ $track['category'] ?? 'all' }}"
                                 data-search="{{ strtolower($track['title'] . ' ' . $track['romaji'] . ' ' . $track['artist']) }}"
                                 onclick="selectJukeboxTrack('{{ $key }}')"
                                 class="track-item p-3.5 rounded-2xl bg-slate-900/80 border border-white/10 hover:border-pink-500/50 hover:bg-slate-850 transition-all duration-200 cursor-pointer flex items-center justify-between group transform hover:-translate-y-0.5">

                                <div class="flex items-center gap-3.5 min-w-0">
                                    {{-- Number Index --}}
                                    <span class="w-9 h-9 rounded-xl {{ $track['badge_color'] }} font-black text-xs flex items-center justify-center flex-shrink-0 border shadow-sm">
                                        {{ $track['number'] }}
                                    </span>

                                    <div class="min-w-0">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="{{ $track['color'] }} text-white text-[9px] font-bold px-2 py-0.5 rounded-full shadow-sm">
                                                {{ $track['badge'] }}
                                            </span>
                                            <span class="text-[10px] text-slate-400 font-mono">{{ $track['romaji'] }}</span>
                                        </div>
                                        <h3 class="font-bold text-white text-sm mt-0.5 truncate group-hover:text-pink-300 transition">
                                            {{ $track['title'] }}
                                        </h3>
                                        <p class="text-slate-400 text-[11px] truncate">
                                            {{ $track['artist'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 flex-shrink-0 ml-2">
                                    {{-- Mini Live Soundwave on Active Track --}}
                                    <div class="playing-indicator hidden items-end gap-0.5 h-4">
                                        <span class="w-1 bg-[#ff007a] rounded-full animate-soundwave" style="animation-delay: 0.1s;"></span>
                                        <span class="w-1 bg-pink-400 rounded-full animate-soundwave" style="animation-delay: 0.3s;"></span>
                                        <span class="w-1 bg-purple-400 rounded-full animate-soundwave" style="animation-delay: 0.2s;"></span>
                                    </div>

                                    <span class="text-slate-400 font-mono text-xs px-2 py-1 bg-slate-950/60 rounded-lg border border-white/5">
                                        {{ $track['duration'] }}
                                    </span>

                                    {{-- Play Icon on Hover --}}
                                    <div class="w-8 h-8 rounded-full bg-[#ff007a]/20 group-hover:bg-[#ff007a] text-pink-400 group-hover:text-white flex items-center justify-center transition shadow-sm">
                                        <svg class="w-3.5 h-3.5 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
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
            music: {
                title: "主題歌・音楽 (Theme Songs & Music)",
                subtitle: "Koleksi Lagu Tema Opening, Ending, Movie, dan OVA Spesial TV Anime 五等分の花嫁",
                tab_all: "Semua (All)",
                tab_op: "OP",
                tab_ed: "ED",
                tab_special: "Movie / OVA",
                search_placeholder: "Cari lagu / artis...",
                shortcut_hint: "Shortcut: Spasi [Play]"
            }
        },
        en: {
            music: {
                title: "Theme Songs & Music Discography",
                subtitle: "Official Opening, Ending, Movie & Special OVA Tracks of The Quintessential Quintuplets",
                tab_all: "All Tracks",
                tab_op: "OP",
                tab_ed: "ED",
                tab_special: "Movie / OVA",
                search_placeholder: "Search title / artist...",
                shortcut_hint: "Shortcut: Space [Play]"
            }
        },
        jp: {
            music: {
                title: "主題歌・音楽 (Theme Songs & Music)",
                subtitle: "TVアニメ「五等分の花嫁」OP/ED主題歌・劇場版・特別編公式ディスコグラフィ",
                tab_all: "すべて",
                tab_op: "OP主題歌",
                tab_ed: "ED主題歌",
                tab_special: "劇場版・OVA",
                search_placeholder: "楽曲名・アーティスト名で検索...",
                shortcut_hint: "ショートカット: Spaceキー [再生]"
            }
        }
    };

    const tracks = @json($tracks);
    const trackKeys = Object.keys(tracks);
    let currentTrackKey = trackKeys[0] || 'op1';
    let isPlaying = false;
    let isShuffle = false;
    let repeatMode = 0; // 0: None, 1: Loop All, 2: Loop One

    const audio = document.getElementById('jukebox-audio');
    const disc = document.getElementById('jukebox-disc');
    const discCenter = document.getElementById('disc-center');
    const playBtn = document.getElementById('jukebox-play-btn');
    const progressBar = document.getElementById('jukebox-progress');
    const currentTimeEl = document.getElementById('player-current-time');
    const totalTimeEl = document.getElementById('player-total-time');
    const equalizerBar = document.getElementById('equalizer-bar');
    const tonearm = document.getElementById('tonearm');
    const deckGlow = document.getElementById('deck-glow');
    const ambientGlow = document.getElementById('ambient-glow');
    const turntableHalo = document.getElementById('turntable-halo');
    const headerAccentBar = document.getElementById('header-accent-bar');
    const tonearmHead = document.getElementById('tonearm-head');
    const liveIndicatorDot = document.getElementById('live-indicator-dot');
    const volumeSlider = document.getElementById('volume-slider');

    function formatTime(seconds) {
        if (isNaN(seconds) || seconds < 0) return '00:00';
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    function animateEqualizer(active) {
        const bars = document.querySelectorAll('.eq-bar');
        if (!active) {
            bars.forEach(b => b.style.height = '6px');
            return;
        }
        bars.forEach(b => {
            const h = Math.floor(Math.random() * 20) + 6;
            b.style.height = `${h}px`;
        });
    }

    let eqInterval = null;

    function updatePlayUI(playing) {
        isPlaying = playing;
        const tr = tracks[currentTrackKey];
        const themeColor = tr?.theme_hex || '#ff007a';

        if (playing) {
            if (disc) disc.classList.add('animate-spin-slow');
            if (tonearm) {
                tonearm.classList.remove('-rotate-12');
                tonearm.classList.add('rotate-6');
            }
            if (equalizerBar) equalizerBar.classList.remove('opacity-30');
            if (playBtn) {
                playBtn.style.backgroundColor = themeColor;
                playBtn.innerHTML = `<svg class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
            }
            if (liveIndicatorDot) liveIndicatorDot.classList.add('animate-ping');
            if (!eqInterval) eqInterval = setInterval(() => animateEqualizer(true), 180);
        } else {
            if (disc) disc.classList.remove('animate-spin-slow');
            if (tonearm) {
                tonearm.classList.add('-rotate-12');
                tonearm.classList.remove('rotate-6');
            }
            if (equalizerBar) equalizerBar.classList.add('opacity-30');
            if (playBtn) {
                playBtn.style.backgroundColor = themeColor;
                playBtn.innerHTML = `<svg class="w-7 h-7 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;
            }
            if (liveIndicatorDot) liveIndicatorDot.classList.remove('animate-ping');
            if (eqInterval) {
                clearInterval(eqInterval);
                eqInterval = null;
                animateEqualizer(false);
            }
        }

        // Highlight active track card
        document.querySelectorAll('.track-item').forEach(el => {
            el.classList.remove('ring-2', 'ring-pink-500', 'bg-slate-800/95');
            const ind = el.querySelector('.playing-indicator');
            if (ind) ind.classList.add('hidden');
            if (ind) ind.classList.remove('flex');
        });

        const activeCard = document.getElementById(`track-item-${currentTrackKey}`);
        if (activeCard) {
            activeCard.classList.add('ring-2', 'ring-pink-500', 'bg-slate-800/95');
            const ind = activeCard.querySelector('.playing-indicator');
            if (ind && playing) {
                ind.classList.remove('hidden');
                ind.classList.add('flex');
            }
        }
    }

    function applyTrackTheme(tr) {
        if (!tr) return;
        const color = tr.theme_hex || '#ff007a';

        if (discCenter) discCenter.style.backgroundColor = color;
        if (tonearmHead) tonearmHead.setAttribute('fill', color);
        if (turntableHalo) turntableHalo.style.backgroundColor = `${color}33`;
        if (ambientGlow) ambientGlow.style.backgroundColor = `${color}25`;
        if (headerAccentBar) headerAccentBar.style.backgroundColor = color;
        if (deckGlow) deckGlow.style.backgroundColor = `${color}10`;

        const discImg = document.getElementById('disc-img');
        if (discImg && tr.cover_image) {
            const coverSrc = tr.cover_image.startsWith('http') ? tr.cover_image : `/${tr.cover_image}`;
            discImg.src = coverSrc;
        }

        const badge = document.getElementById('player-track-badge');
        if (badge) {
            badge.style.backgroundColor = color;
            badge.textContent = tr.badge;
        }

        document.getElementById('player-track-title').textContent = tr.title;
        document.getElementById('player-track-romaji').textContent = tr.romaji;
        document.getElementById('player-track-artist').textContent = tr.artist;
        if (totalTimeEl) totalTimeEl.textContent = tr.duration;
    }

    function toggleJukeboxPlay() {
        if (!audio.src || audio.src === window.location.href) {
            selectJukeboxTrack(currentTrackKey);
            return;
        }

        if (audio.paused) {
            audio.play().then(() => updatePlayUI(true)).catch(err => {
                console.log('Playback error:', err);
                updatePlayUI(false);
            });
        } else {
            audio.pause();
            updatePlayUI(false);
        }
    }

    function selectJukeboxTrack(trackKey) {
        const tr = tracks[trackKey];
        if (!tr) return;

        currentTrackKey = trackKey;
        applyTrackTheme(tr);

        const resolvedSrc = tr.audio_url && tr.audio_url.startsWith('http') ? tr.audio_url : `/${tr.audio_url || 'audio/gotoubun-no-kimochi.mp3'}`;
        if (audio.getAttribute('data-src') !== resolvedSrc) {
            audio.src = resolvedSrc;
            audio.setAttribute('data-src', resolvedSrc);
            audio.load();
        }

        audio.play().then(() => updatePlayUI(true)).catch(err => {
            console.log('Audio autoplay prevented or error:', err);
            updatePlayUI(false);
        });
    }

    function nextTrack() {
        if (isShuffle) {
            const randIndex = Math.floor(Math.random() * trackKeys.length);
            selectJukeboxTrack(trackKeys[randIndex]);
            return;
        }
        const currentIndex = trackKeys.indexOf(currentTrackKey);
        const nextIndex = (currentIndex + 1) % trackKeys.length;
        selectJukeboxTrack(trackKeys[nextIndex]);
    }

    function prevTrack() {
        if (audio.currentTime > 3) {
            audio.currentTime = 0;
            return;
        }
        const currentIndex = trackKeys.indexOf(currentTrackKey);
        const prevIndex = (currentIndex - 1 + trackKeys.length) % trackKeys.length;
        selectJukeboxTrack(trackKeys[prevIndex]);
    }

    function toggleShuffle() {
        isShuffle = !isShuffle;
        const btn = document.getElementById('btn-shuffle');
        if (isShuffle) {
            btn.classList.add('text-pink-400', 'bg-pink-500/20');
            btn.classList.remove('text-slate-400');
        } else {
            btn.classList.remove('text-pink-400', 'bg-pink-500/20');
            btn.classList.add('text-slate-400');
        }
    }

    function toggleRepeat() {
        repeatMode = (repeatMode + 1) % 3;
        const btn = document.getElementById('btn-repeat');
        if (repeatMode === 1) {
            btn.classList.add('text-pink-400', 'bg-pink-500/20');
            btn.classList.remove('text-slate-400');
            btn.title = "Ulangi Semua (Repeat All)";
        } else if (repeatMode === 2) {
            btn.classList.add('text-amber-400', 'bg-amber-500/20');
            btn.classList.remove('text-pink-400', 'bg-pink-500/20');
            btn.title = "Ulangi 1 Lagu (Repeat One)";
        } else {
            btn.classList.remove('text-pink-400', 'text-amber-400', 'bg-pink-500/20', 'bg-amber-500/20');
            btn.classList.add('text-slate-400');
            btn.title = "Ulangi (Repeat Off)";
        }
    }

    function toggleMute() {
        audio.muted = !audio.muted;
        const icon = document.getElementById('btn-volume-icon');
        if (audio.muted) {
            icon.innerHTML = `<svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15zM17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/></svg>`;
        } else {
            icon.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>`;
        }
    }

    function filterCategory(cat) {
        document.querySelectorAll('.category-tab').forEach(t => {
            t.classList.remove('bg-[#ff007a]', 'text-white', 'shadow-md');
            t.classList.add('bg-slate-800/80', 'text-slate-300');
        });
        const activeTab = document.getElementById(`tab-${cat}`);
        if (activeTab) {
            activeTab.classList.add('bg-[#ff007a]', 'text-white', 'shadow-md');
            activeTab.classList.remove('bg-slate-800/80', 'text-slate-300');
        }

        document.querySelectorAll('.track-item').forEach(item => {
            const itemCat = item.getAttribute('data-category');
            if (cat === 'all' || itemCat === cat) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function searchTracks() {
        const query = document.getElementById('track-search-input').value.toLowerCase().trim();
        document.querySelectorAll('.track-item').forEach(item => {
            const dataSearch = item.getAttribute('data-search') || '';
            if (dataSearch.includes(query)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Audio Event Handlers
    if (audio) {
        audio.addEventListener('timeupdate', () => {
            if (!isNaN(audio.duration) && audio.duration > 0) {
                const percent = (audio.currentTime / audio.duration) * 100;
                if (progressBar) progressBar.value = percent;
                if (currentTimeEl) currentTimeEl.textContent = formatTime(audio.currentTime);
                if (totalTimeEl) totalTimeEl.textContent = formatTime(audio.duration);
            }
        });

        audio.addEventListener('ended', () => {
            if (repeatMode === 2) {
                audio.currentTime = 0;
                audio.play();
            } else {
                nextTrack();
            }
        });

        audio.addEventListener('play', () => updatePlayUI(true));
        audio.addEventListener('pause', () => updatePlayUI(false));

        audio.addEventListener('error', () => {
            const fallback = '/audio/gotoubun-no-kimochi.mp3';
            if (audio.src && !audio.src.endsWith('gotoubun-no-kimochi.mp3')) {
                audio.src = fallback;
                audio.setAttribute('data-src', fallback);
                audio.play().then(() => updatePlayUI(true)).catch(() => updatePlayUI(false));
            }
        });
    }

    if (progressBar) {
        progressBar.addEventListener('input', (e) => {
            if (!isNaN(audio.duration) && audio.duration > 0) {
                audio.currentTime = (e.target.value / 100) * audio.duration;
            }
        });
    }

    if (volumeSlider) {
        volumeSlider.addEventListener('input', (e) => {
            audio.volume = parseFloat(e.target.value);
            if (audio.muted && audio.volume > 0) toggleMute();
        });
    }

    // Keyboard Shortcuts (Space, ArrowLeft, ArrowRight, M, N)
    window.addEventListener('keydown', (e) => {
        if (['input', 'textarea'].includes(document.activeElement.tagName.toLowerCase())) return;
        if (e.code === 'Space') {
            e.preventDefault();
            toggleJukeboxPlay();
        } else if (e.code === 'ArrowRight') {
            e.preventDefault();
            audio.currentTime = Math.min(audio.duration || 0, audio.currentTime + 5);
        } else if (e.code === 'ArrowLeft') {
            e.preventDefault();
            audio.currentTime = Math.max(0, audio.currentTime - 5);
        } else if (e.key === 'm' || e.key === 'M') {
            toggleMute();
        } else if (e.key === 'n' || e.key === 'N') {
            nextTrack();
        }
    });

    // Inisialisasi awal
    document.addEventListener('DOMContentLoaded', () => {
        const tr = tracks[currentTrackKey];
        if (tr) {
            applyTrackTheme(tr);
            const resolvedSrc = tr.audio_url && tr.audio_url.startsWith('http') ? tr.audio_url : `/${tr.audio_url || 'audio/gotoubun-no-kimochi.mp3'}`;
            audio.src = resolvedSrc;
            audio.setAttribute('data-src', resolvedSrc);
            updatePlayUI(false);
        }
    });
</script>
@endpush
@endsection
