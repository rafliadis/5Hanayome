@extends('layouts.app')

@section('title', '404 ページが見つかりません | TVアニメ「五等分の花嫁」公式ホームページ')
@section('meta_description', 'お探しのページまたはキャラクターは見つかりませんでした。五等分の花嫁 公式ポータル。')

@section('content')
<section class="py-16 md:py-24 px-4 md:px-8 bg-slate-950 flex-grow flex items-center justify-center text-slate-100">
    <div class="max-w-md mx-auto text-center space-y-6 bg-slate-900 p-8 md:p-10 rounded-3xl border border-pink-500/30 shadow-2xl relative overflow-hidden">
        <div class="absolute -top-12 -right-12 w-36 h-36 bg-pink-500/15 rounded-full blur-xl pointer-events-none"></div>

        <!-- 404 Badge & Icon -->
        <div class="w-20 h-20 mx-auto rounded-3xl bg-pink-500/20 text-[#ff007a] flex items-center justify-center text-3xl font-black shadow-inner border border-pink-500/30">
            🌸 404
        </div>

        <div class="space-y-2">
            <h1 class="text-2xl md:text-3xl font-black text-white" id="err-404-title" data-i18n="error_404.title">Halaman Tidak Ditemukan (404)</h1>
            <p class="text-xs md:text-sm text-slate-400 leading-relaxed" id="err-404-desc" data-i18n="error_404.desc">
                Halaman atau slug karakter yang Anda cari tidak ditemukan atau telah berpindah alamat.
            </p>
        </div>

        <!-- Action Links -->
        <div class="pt-2 flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 bg-[#ff007a] hover:bg-[#ff5c93] text-white font-bold text-xs md:text-sm px-5 py-2.5 rounded-full shadow-md transition transform hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span id="err-404-home-btn" data-i18n="error_404.home_btn">Kembali ke Beranda</span>
            </a>
            <a href="{{ route('karakter.index') }}" class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs md:text-sm px-5 py-2.5 rounded-full border border-white/10 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span id="err-404-char-btn" data-i18n="error_404.char_btn">Daftar Karakter</span>
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    window.pageTranslations = {
        id: {
            error_404: {
                title: "Halaman Tidak Ditemukan (404)",
                desc: "Halaman atau slug karakter yang Anda cari tidak ditemukan atau telah berpindah alamat.",
                home_btn: "Kembali ke Beranda",
                char_btn: "Daftar Karakter"
            }
        },
        en: {
            error_404: {
                title: "Page Not Found (404)",
                desc: "The page or character slug you are looking for does not exist or has been moved.",
                home_btn: "Back to Home",
                char_btn: "Character Lineup"
            }
        },
        jp: {
            error_404: {
                title: "ページが見つかりません (404)",
                desc: "お探しのページまたはキャラクター（URL）は存在しないか、移動した可能性があります。",
                home_btn: "ホームに戻る",
                char_btn: "キャラクター一覧"
            }
        }
    };
</script>
@endpush
