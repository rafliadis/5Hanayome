@extends('layouts.app')

@section('title', '最新ニュース (News & Updates) | TVアニメ「五等分の花嫁」')
@section('meta_description', 'TVアニメ「五等分の花嫁」の最新ニュース、イベント告知、BD&DVD情報、公式X（Twitter）の最新ポスト。')

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
            <span class="font-black text-[#ff007a]">News</span>
        </nav>

        {{-- Seksi Berita & Update --}}
        <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl space-y-6">
            {{-- Header Seksi & Filter Berita --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-white/10 pb-5">
                <div class="flex items-center gap-3">
                    <div class="w-2.5 h-8 bg-[#ff007a] rounded-full"></div>
                    <div>
                        <h1 data-i18n="news.title" class="text-2xl sm:text-3xl font-black text-white">最新ニュース (News & Updates)</h1>
                        <span data-i18n="news.subtitle" class="text-xs text-slate-400 font-medium">Informasi resmi & agenda rilis TVアニメ「五等分の花嫁」</span>
                    </div>
                </div>

                {{-- Filter Kategori Berita --}}
                <div class="flex items-center gap-1.5 overflow-x-auto max-w-full py-1 custom-scrollbar">
                    <button type="button" onclick="filterNews('all')" class="news-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-[#ff007a] text-white shadow-sm shrink-0" data-category="all" data-i18n="news.filter_all">All</button>
                    <button type="button" onclick="filterNews('bddvd')" class="news-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20 shrink-0" data-category="bddvd" data-i18n="news.filter_bddvd">BD & DVD</button>
                    <button type="button" onclick="filterNews('event')" class="news-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20 shrink-0" data-category="event" data-i18n="news.filter_event">Event</button>
                    <button type="button" onclick="filterNews('music')" class="news-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20 shrink-0" data-category="music" data-i18n="news.filter_music">Music</button>
                    <button type="button" onclick="filterNews('goods')" class="news-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20 shrink-0" data-category="goods" data-i18n="news.filter_goods">Goods</button>
                </div>
            </div>

            {{-- Grid Konten Berita & Twitter/X Feed --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-4" id="news-article-list">
                    @foreach ($newsList as $item)
                        <article class="news-card p-4 sm:p-5 rounded-2xl bg-slate-800/80 border border-white/10 hover:border-pink-500/50 hover:shadow-xl transition cursor-pointer flex flex-col sm:flex-row gap-4 items-start sm:items-center group"
                                 data-category="{{ $item['category'] }}"
                                 onclick="openNewsModal('{{ $item['id'] }}')">
                            <div class="bg-pink-500/20 border border-pink-500/30 text-[#ff007a] px-3.5 py-2.5 rounded-2xl font-black text-center sm:w-20 flex-shrink-0">
                                <span class="block text-[10px] uppercase font-bold tracking-wider text-pink-300">{{ $item['year'] }}</span>
                                <span class="block text-sm font-extrabold text-white">{{ $item['day'] }}</span>
                            </div>
                            <div class="space-y-1.5 flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="{{ $item['category_color'] }} text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full">{{ $item['category_label'] }}</span>
                                    <span class="text-[11px] text-slate-400 font-medium">{{ $item['tag'] }}</span>
                                </div>
                                <h3 class="font-extrabold text-white text-sm sm:text-base group-hover:text-pink-300 transition">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-xs text-slate-400 line-clamp-2">
                                    {{ $item['desc'] }}
                                </p>
                            </div>
                            <div class="hidden sm:block text-slate-400 group-hover:text-[#ff007a] group-hover:translate-x-1 transition-transform">
                                &rarr;
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Kolom Feed Twitter / X Resmi --}}
                <div class="bg-slate-800/80 p-5 rounded-2xl border border-white/10 space-y-4 h-fit">
                    <div class="flex items-center justify-between border-b border-white/10 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="bg-black text-white px-2 py-0.5 rounded font-black text-[11px] border border-white/20">X</span>
                            <span class="font-black text-white text-xs">@tbs_hanayome</span>
                        </div>
                        <span data-i18n="news.official_feed" class="bg-pink-500/20 text-pink-300 border border-pink-500/30 text-[10px] font-bold px-2.5 py-0.5 rounded-full">Official Feed</span>
                    </div>

                    <div class="space-y-3 text-xs">
                        @foreach ($twitterPosts as $post)
                            <div class="bg-slate-900/90 p-4 rounded-xl border border-white/10 space-y-2 shadow-inner">
                                <div class="flex justify-between text-[10px] text-slate-400">
                                    <span class="font-bold text-pink-300">{{ $post['author'] }}</span>
                                    <span>{{ $post['time'] }}</span>
                                </div>
                                <p class="text-slate-300 leading-relaxed text-xs">
                                    {!! $post['text'] !!}
                                </p>
                                <span class="inline-block text-[10px] text-pink-400 font-medium">{{ $post['tag'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- MODAL PEMBACA BERITA --}}
<div id="news-modal"
     class="fixed inset-0 z-[9999] bg-black/85 backdrop-blur-md hidden flex items-center justify-center p-4 select-none"
     role="dialog"
     aria-modal="true"
     onclick="closeNewsModal()">
    <div class="bg-slate-900 text-white rounded-3xl max-w-xl w-full p-6 sm:p-8 space-y-4 shadow-2xl border border-white/20 relative text-left" onclick="event.stopPropagation()">
        <button type="button" onclick="closeNewsModal()" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition" aria-label="Tutup Modal">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <span id="news-modal-badge" class="bg-[#ff007a] text-white text-xs font-extrabold px-3 py-1 rounded-full">BD & DVD</span>
        <h3 id="news-modal-title" class="text-xl sm:text-2xl font-black text-white leading-snug">Judul Berita</h3>
        <p id="news-modal-desc" class="text-slate-300 text-sm leading-relaxed">Deskripsi lengkap berita.</p>
        <div class="pt-4 border-t border-white/10 flex justify-between items-center text-xs text-slate-400">
            <span data-i18n="news.modal_footer">Official TBS Anime News Portal</span>
            <button type="button" onclick="closeNewsModal()" data-i18n="common.close" class="px-4 py-2 bg-[#ff007a] hover:bg-[#ff5c93] text-white font-bold rounded-xl transition">Tutup</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    window.pageTranslations = {
        id: {
            news: {
                title: "Berita & Pembaruan Terbaru (News)",
                subtitle: "Informasi resmi & agenda rilis TV Anime 「The Quintessential Quintuplets」",
                filter_all: "Semua",
                filter_bddvd: "BD & DVD",
                filter_event: "Event",
                filter_music: "Musik",
                filter_goods: "Barang Resmi",
                official_feed: "Feed Resmi",
                modal_footer: "Portal Berita Anime Resmi TBS"
            }
        },
        en: {
            news: {
                title: "Latest News & Updates",
                subtitle: "Official announcements & release schedules for The Quintessential Quintuplets",
                filter_all: "All",
                filter_bddvd: "BD & DVD",
                filter_event: "Event",
                filter_music: "Music",
                filter_goods: "Goods",
                official_feed: "Official Feed",
                modal_footer: "Official TBS Anime News Portal"
            }
        },
        jp: {
            news: {
                title: "最新ニュース (News & Updates)",
                subtitle: "TVアニメ「五等分の花嫁」公式インフォメーション・発売情報",
                filter_all: "すべて",
                filter_bddvd: "BD・DVD",
                filter_event: "イベント",
                filter_music: "音楽",
                filter_goods: "グッズ",
                official_feed: "公式ポスト",
                modal_footer: "TBSテレビ アニメ公式ポータル"
            }
        }
    };

    const newsData = @json(collect($newsList)->keyBy('id'));

    function filterNews(category) {
        const cards = document.querySelectorAll('.news-card');
        cards.forEach(card => {
            if (category === 'all' || card.getAttribute('data-category') === category) {
                card.classList.remove('hidden');
                card.classList.add('flex');
            } else {
                card.classList.add('hidden');
                card.classList.remove('flex');
            }
        });

        document.querySelectorAll('.news-filter-btn').forEach(btn => {
            if (btn.getAttribute('data-category') === category) {
                btn.className = "news-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-[#ff007a] text-white shadow-sm";
            } else {
                btn.className = "news-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20";
            }
        });
    }

    function openNewsModal(itemId) {
        const item = newsData[itemId];
        if (!item) return;

        document.getElementById('news-modal-badge').textContent = item.category_label;
        document.getElementById('news-modal-title').textContent = item.title;
        document.getElementById('news-modal-desc').textContent = item.full_content || item.desc;

        const modal = document.getElementById('news-modal');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function closeNewsModal() {
        const modal = document.getElementById('news-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeNewsModal();
        }
    });
</script>
@endpush
@endsection
