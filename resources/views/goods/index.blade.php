@extends('layouts.app')

@section('title', '公式グッズ情報 (Official Goods) | TVアニメ「五等分の花嫁」')
@section('meta_description', 'TVアニメ「五等分の花嫁」の公式グッズ、フィギュア、Blu-ray & DVD、アクリルスタンド、オフィシャル設定資料集情報。')

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
            <span class="font-black text-[#ff007a]">Goods</span>
        </nav>

        {{-- Seksi Utama Goods --}}
        <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-white/10 pb-5">
                <div class="flex items-center gap-3">
                    <div class="w-2.5 h-8 bg-[#ff007a] rounded-full"></div>
                    <div>
                        <h1 data-i18n="goods.title" class="text-2xl sm:text-3xl font-black text-white">公式グッズ情報 (Official Goods)</h1>
                        <span data-i18n="goods.subtitle" class="text-xs text-slate-400 font-medium">Koleksi Merchandise, Figur, dan Buku Resmi TVアニメ「五等分の花嫁」</span>
                    </div>
                </div>

                {{-- Filter Kategori Barang --}}
                <div class="flex items-center gap-1.5 overflow-x-auto max-w-full py-1 custom-scrollbar">
                    @foreach ($goodsCategories as $catKey => $catName)
                        <button type="button"
                                onclick="filterGoods('{{ $catKey }}')"
                                class="goods-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition shrink-0 {{ $catKey === 'all' ? 'bg-[#ff007a] text-white shadow-sm' : 'bg-white/10 text-slate-300 hover:bg-white/20' }}"
                                data-category="{{ $catKey }}"
                                data-i18n="goods.cat_{{ $catKey }}">
                            {{ $catName }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Grid Koleksi Barang 6 Kartu --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6" id="goods-grid">
                @foreach ($goodsList as $item)
                    <div class="goods-item-card bg-slate-800/80 rounded-2xl p-5 flex flex-col justify-between border border-white/10 hover:border-pink-500/50 transition shadow-sm hover:shadow-xl space-y-4 group"
                         data-category="{{ $item['category'] }}">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="inline-block text-[11px] font-bold px-3 py-0.5 rounded-full border {{ $item['tag_color'] }}">
                                    {{ $item['shop'] }}
                                </span>
                                <span class="font-extrabold text-pink-300 text-sm">{{ $item['price'] }}</span>
                            </div>

                            {{-- Area Gambar Merchandise --}}
                            <div class="aspect-video bg-gradient-to-tr from-slate-900 to-slate-800 rounded-xl flex items-center justify-center text-pink-400 shadow-inner border border-white/5 relative overflow-hidden group-hover:scale-[1.02] transition-transform">
                                @if (isset($item['image']) && file_exists(public_path($item['image'])))
                                    <img src="{{ asset($item['image']) }}"
                                         alt="{{ $item['name'] }}"
                                         class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                                         loading="lazy">
                                @else
                                    {{-- Fallback SVG Icon jika gambar belum diletakkan di public/images/goods/ --}}
                                    @if ($item['icon'] === 'disc')
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                                    @elseif ($item['icon'] === 'figure')
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                    @elseif ($item['icon'] === 'book')
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    @else
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    @endif
                                @endif
                            </div>

                            <div>
                                <h3 class="font-extrabold text-white text-sm sm:text-base group-hover:text-pink-300 transition line-clamp-1">
                                    {{ $item['name'] }}
                                </h3>
                                <p class="text-xs text-slate-400 mt-1.5 leading-relaxed line-clamp-2">
                                    {{ $item['desc'] }}
                                </p>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-white/10 flex items-center justify-between text-xs">
                            <span data-i18n="goods.official_licensed" class="text-slate-400 font-medium">Official Licensed</span>
                            <span class="text-pink-400 font-bold group-hover:translate-x-1 transition-transform flex items-center gap-1">
                                <span data-i18n="goods.detail_btn">Detail</span>
                                <span>&rarr;</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    window.pageTranslations = {
        id: {
            goods: {
                title: "Informasi Merchandise & Barang Resmi (Goods)",
                subtitle: "Koleksi Merchandise, Figur, dan Buku Resmi TV Anime 「The Quintessential Quintuplets」",
                cat_all: "Semua Barang",
                cat_figure: "Figur Skala",
                cat_bddvd: "Blu-ray & DVD",
                cat_diorama: "Stand Akrilik",
                cat_book: "Buku & Artbook",
                official_licensed: "Lisensi Resmi TBS",
                detail_btn: "Detail"
            }
        },
        en: {
            goods: {
                title: "Official Merchandise & Goods",
                subtitle: "Official merchandise, figures, Blu-ray/DVDs, and artbooks of The Quintessential Quintuplets",
                cat_all: "All Items",
                cat_figure: "Scale Figures",
                cat_bddvd: "Blu-ray & DVD",
                cat_diorama: "Acrylic Stands",
                cat_book: "Books & Artbooks",
                official_licensed: "TBS Official Licensed",
                detail_btn: "Details"
            }
        },
        jp: {
            goods: {
                title: "公式グッズ情報 (Official Goods)",
                subtitle: "TVアニメ「五等分の花嫁」公式グッズ、フィギュア、Blu-ray & DVD、設定資料集一覧",
                cat_all: "すべてのグッズ",
                cat_figure: "フィギュア",
                cat_bddvd: "Blu-ray・DVD",
                cat_diorama: "アクリルスタンド",
                cat_book: "書籍・原画集",
                official_licensed: "公式ライセンス商品",
                detail_btn: "詳細を見る"
            }
        }
    };

    function filterGoods(category) {
        const cards = document.querySelectorAll('.goods-item-card');
        cards.forEach(card => {
            if (category === 'all' || card.getAttribute('data-category') === category) {
                card.classList.remove('hidden');
                card.classList.add('flex');
            } else {
                card.classList.add('hidden');
                card.classList.remove('flex');
            }
        });

        document.querySelectorAll('.goods-filter-btn').forEach(btn => {
            if (btn.getAttribute('data-category') === category) {
                btn.className = "goods-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-[#ff007a] text-white shadow-sm";
            } else {
                btn.className = "goods-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold transition bg-white/10 text-slate-300 hover:bg-white/20";
            }
        });
    }
</script>
@endpush
@endsection
