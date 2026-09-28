@extends('layouts.app')

@section('title', 'TVアニメ「五等分の花嫁」公式ホームページ | TBSテレビ')
@section('meta_description', '落第寸前、勉強嫌いの５つ子を卒業まで導く！かわいさ500%の五人五色ラブコメディ！風太郎と中野家の５つ子の青春物語。')

@section('content')
<!-- HERO BANNER SECTION -->
<section class="relative hero-pattern overflow-hidden border-b-4 border-pink-500 pt-8 pb-12 px-4 md:px-8">
    <div class="absolute top-4 left-6 text-pink-400 opacity-60 animate-float"><i data-lucide="sparkles" class="w-8 h-8"></i></div>
    <div class="absolute bottom-6 right-8 text-rose-400 opacity-60 animate-float-delayed"><i data-lucide="heart" class="w-10 h-10 fill-current"></i></div>

    <div class="max-w-5xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">

        <!-- Left: Title & Anime Tagline Block -->
        <div class="text-center lg:text-left z-10 space-y-4 max-w-lg">
            <div class="inline-flex items-center gap-2 bg-pink-100 text-pink-700 border border-pink-300 px-3.5 py-1.5 rounded-full text-xs font-bold shadow-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-pink-500 animate-ping"></span>
                <span id="hero-badge">映画＆TVアニメ「五等分の花嫁」大好評配信中！</span>
            </div>

            <h2 id="hero-headline" class="text-3xl md:text-5xl font-black tracking-tight text-slate-800 leading-tight">
                落第寸前、<br>
                勉強嫌いの５つ子を<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-600 via-purple-600 to-rose-600 underline decoration-wavy decoration-pink-300">卒業まで</span>導く！
            </h2>

            <p id="hero-description" class="text-xs md:text-sm text-slate-600 font-medium leading-relaxed">
                かわいさ500%の五人五色ラブコメディ！風太郎と中野家の５つ子（一花、二乃、三玖、四葉、五月）が織りなす青春と感動の物語。
            </p>

            <!-- Quick Character Mini Badges (Links to /karakter/{slug}) -->
            <div class="space-y-1.5 pt-1">
                <div class="flex items-center justify-center lg:justify-start gap-2">
                    <a href="{{ route('character.detail', ['slug' => 'fuutarou']) }}"
                       class="w-9 h-9 rounded-full bg-indigo-600 text-white font-black text-xs shadow-md hover:scale-115 hover:shadow-lg transition transform border-2 border-white flex items-center justify-center"
                       title="上杉風太郎 (Fuutarou) - Lihat Profil Detail">
                        風
                    </a>
                    <a href="{{ route('character.detail', ['slug' => 'ichika']) }}"
                       class="w-9 h-9 rounded-full bg-amber-400 text-white font-black text-xs shadow-md hover:scale-115 hover:shadow-lg transition transform border-2 border-white flex items-center justify-center"
                       title="中野一花 (Ichika) - Lihat Profil Detail">
                        一
                    </a>
                    <a href="{{ route('character.detail', ['slug' => 'nino']) }}"
                       class="w-9 h-9 rounded-full bg-purple-500 text-white font-black text-xs shadow-md hover:scale-115 hover:shadow-lg transition transform border-2 border-white flex items-center justify-center"
                       title="中野二乃 (Nino) - Lihat Profil Detail">
                        二
                    </a>
                    <a href="{{ route('character.detail', ['slug' => 'miku']) }}"
                       class="w-9 h-9 rounded-full bg-sky-500 text-white font-black text-xs shadow-md hover:scale-115 hover:shadow-lg transition transform border-2 border-white flex items-center justify-center"
                       title="中野三玖 (Miku) - Lihat Profil Detail">
                        三
                    </a>
                    <a href="{{ route('character.detail', ['slug' => 'yotsuba']) }}"
                       class="w-9 h-9 rounded-full bg-green-500 text-white font-black text-xs shadow-md hover:scale-115 hover:shadow-lg transition transform border-2 border-white flex items-center justify-center"
                       title="中野四葉 (Yotsuba) - Lihat Profil Detail">
                        四
                    </a>
                    <a href="{{ route('character.detail', ['slug' => 'itsuki']) }}"
                       class="w-9 h-9 rounded-full bg-red-500 text-white font-black text-xs shadow-md hover:scale-115 hover:shadow-lg transition transform border-2 border-white flex items-center justify-center"
                       title="中野五月 (Itsuki) - Lihat Profil Detail">
                        五
                    </a>
                    <span id="hero-quick-tip" class="text-xs font-bold text-slate-400 ml-1">← 各キャラ詳細へ</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-3 flex flex-wrap gap-3 justify-center lg:justify-start">
                <a href="{{ route('characters') }}" class="bg-gradient-to-r from-pink-500 to-rose-600 hover:from-pink-600 hover:to-rose-700 text-white px-6 py-3 rounded-full text-xs md:text-sm font-bold shadow-lg shadow-pink-400/40 hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i data-lucide="users" class="w-4 h-4"></i> <span id="hero-btn-char">キャラクターを見る</span>
                </a>
                <a href="{{ route('gallery') }}" class="bg-white hover:bg-pink-50 text-pink-600 border-2 border-pink-400 px-5 py-3 rounded-full text-xs md:text-sm font-bold shadow-sm transition transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i data-lucide="image" class="w-4 h-4"></i> <span id="hero-btn-gallery">キャラクターギャラリー</span>
                </a>
            </div>
        </div>

        <!-- Right: Main Banner Artwork Card -->
        <div class="relative w-full max-w-md z-10">
            <div class="relative bg-white/90 backdrop-blur-md border-4 border-pink-300 rounded-3xl p-3.5 shadow-2xl overflow-hidden group">

                <!-- Banner Image with Vector Fallback -->
                <div class="relative rounded-2xl overflow-hidden shadow-md aspect-[16/10] bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 flex items-center justify-center">
                    <img
                        id="hero-banner-img"
                        src="{{ file_exists(public_path('images/banner.jpg')) ? asset('images/banner.jpg') : 'https://cdn.myanimelist.net/images/anime/1001/96016l.jpg' }}"
                        alt="五等分の花嫁 メインビジュアル バナー"
                        referrerpolicy="no-referrer"
                        loading="lazy"
                        class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500"
                        onerror="applyBannerFallback(this);"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-4 text-white">
                        <span class="bg-pink-600 text-white text-[10px] font-black px-2.5 py-0.5 rounded-full w-fit mb-1 shadow">KEY VISUAL BANNER</span>
                        <h3 id="banner-card-title" class="text-base md:text-lg font-black drop-shadow">中野家５つ子 ＆ 上杉風太郎</h3>
                        <p id="banner-card-sub" class="text-[11px] text-pink-200">風太郎・一花・二乃・三玖・四葉・五月</p>
                    </div>
                </div>

                <!-- Banner Footer Status -->
                <div class="mt-3 flex items-center justify-between text-[11px] text-slate-500 px-1 font-semibold">
                    <span class="flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span> <span id="banner-cert">TBS公式オフィシャル認定</span>
                    </span>
                    <span id="banner-tag" class="bg-pink-100 text-pink-700 px-2.5 py-0.5 rounded-full font-bold">500% かわいさ</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- HIGHLIGHT FEATURES / SHORTCUTS GRID -->
<section class="py-12 px-4 md:px-8 bg-slate-50">
    <div class="max-w-5xl mx-auto space-y-8">
        <div class="text-center space-y-2">
            <span class="text-pink-600 font-bold text-xs uppercase tracking-widest bg-pink-100 px-3.5 py-1 rounded-full">PORTAL SECTIONS</span>
            <h3 class="text-2xl md:text-3xl font-black text-slate-800" id="portal-features-title">五等分の花嫁 公式コンテンツ</h3>
            <p class="text-xs md:text-sm text-slate-500" id="portal-features-sub">各メニューから詳細ページへアクセスできます</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Feature 1: Characters -->
            <a href="{{ route('characters') }}" class="group bg-white p-6 rounded-3xl border-2 border-pink-200 hover:border-pink-500 shadow-md hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center font-black group-hover:bg-pink-600 group-hover:text-white transition">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-black text-slate-800 group-hover:text-pink-600 transition" id="card-char-title">キャラクター一覧</h4>
                    <p class="text-xs text-slate-500 leading-relaxed" id="card-char-desc">風太郎と中野家５姉妹のプロフィールセレクターと詳細情報。</p>
                </div>
                <div class="pt-4 text-xs font-bold text-pink-600 flex items-center gap-1 group-hover:translate-x-1 transition">
                    <span id="card-btn-explore">詳しく見る</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </div>
            </a>

            <!-- Feature 2: Gallery -->
            <a href="{{ route('gallery') }}" class="group bg-white p-6 rounded-3xl border-2 border-pink-200 hover:border-pink-500 shadow-md hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center font-black group-hover:bg-purple-600 group-hover:text-white transition">
                        <i data-lucide="image" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-black text-slate-800 group-hover:text-purple-600 transition" id="card-gallery-title">ビジュアルギャラリー</h4>
                    <p class="text-xs text-slate-500 leading-relaxed" id="card-gallery-desc">各キャラクターの魅力を凝縮したカラーパレットコレクション。</p>
                </div>
                <div class="pt-4 text-xs font-bold text-purple-600 flex items-center gap-1 group-hover:translate-x-1 transition">
                    <span id="card-btn-gallery">ギャラリーへ</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </div>
            </a>

            <!-- Feature 3: News & Streaming -->
            <a href="{{ route('onair') }}" class="group bg-white p-6 rounded-3xl border-2 border-pink-200 hover:border-pink-500 shadow-md hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center font-black group-hover:bg-sky-600 group-hover:text-white transition">
                        <i data-lucide="tv" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-black text-slate-800 group-hover:text-sky-600 transition" id="card-onair-title">キャスト＆配信情報</h4>
                    <p class="text-xs text-slate-500 leading-relaxed" id="card-onair-desc">豪華声優陣（CV）と各種ストリーミング配信プラットフォーム。</p>
                </div>
                <div class="pt-4 text-xs font-bold text-sky-600 flex items-center gap-1 group-hover:translate-x-1 transition">
                    <span id="card-btn-onair">配信情報へ</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    const homeTranslations = {
        ja: {
            heroBadge: "映画＆TVアニメ「五等分の花嫁」大好評配信中！",
            heroHeadline: "落第寸前、<br>勉強嫌いの５つ子を<br><span class=\"text-transparent bg-clip-text bg-gradient-to-r from-pink-600 via-purple-600 to-rose-600 underline decoration-wavy decoration-pink-300\">卒業まで</span>導く！",
            heroDesc: "かわいさ500%の五人五色ラブコメディ！風太郎と中野家の５つ子（一花、二乃、三玖、四葉、五月）が織りなす青春と感動の物語。",
            heroQuickTip: "← 各キャラ詳細へ",
            heroBtnChar: "キャラクターを見る",
            heroBtnGallery: "キャラクターギャラリー",
            bannerCardTitle: "中野家５つ子 ＆ 上杉風太郎",
            bannerCardSub: "風太郎・一花・二乃・三玖・四葉・五月",
            bannerCert: "TBS公式オフィシャル認定",
            bannerTag: "500% かわいさ",
            portalTitle: "五等分の花嫁 公式コンテンツ",
            portalSub: "各メニューから詳細ページへアクセスできます",
            cardCharTitle: "キャラクター一覧",
            cardCharDesc: "風太郎と中野家５姉妹のプロフィールセレクターと詳細情報。",
            cardGalleryTitle: "ビジュアルギャラリー",
            cardGalleryDesc: "各キャラクターの魅力を凝縮したカラーパレットコレクション。",
            cardOnairTitle: "キャスト＆配信情報",
            cardOnairDesc: "豪華声優陣（CV）と各種ストリーミング配信プラットフォーム。",
            cardExplore: "詳しく見る",
            cardToGallery: "ギャラリーへ",
            cardToOnair: "配信情報へ"
        },
        id: {
            heroBadge: "Film & Serial Anime TV 「5-toubun no Hanayome」 Kini Tayang!",
            heroHeadline: "Hampir Tidak Naik Kelas,<br>Bimbing 5 Gadis Kembar yang Benci Belajar<br><span class=\"text-transparent bg-clip-text bg-gradient-to-r from-pink-600 via-purple-600 to-rose-600 underline decoration-wavy decoration-pink-300\">Hingga Lulus!</span>",
            heroDesc: "Komedi romantis dengan tingkat kelucuan 500%! Kisah masa muda yang penuh emosi antara Fuutarou dan 5 saudari kembar Nakano (Ichika, Nino, Miku, Yotsuba, Itsuki).",
            heroQuickTip: "← Lihat detail karakter",
            heroBtnChar: "Lihat Karakter",
            heroBtnGallery: "Galeri Karakter",
            bannerCardTitle: "Visual Utama Kembar Nakano & Fuutarou",
            bannerCardSub: "Fuutarou • Ichika • Nino • Miku • Yotsuba • Itsuki",
            bannerCert: "Sertifikasi Resmi TBS",
            bannerTag: "500% Menggemaskan",
            portalTitle: "Konten Resmi 5-toubun no Hanayome",
            portalSub: "Akses halaman lengkap melalui pilihan menu berikut",
            cardCharTitle: "Daftar Karakter",
            cardCharDesc: "Pemilih profil interaktif dan info mendalam Fuutarou & 5 saudari Nakano.",
            cardGalleryTitle: "Galeri Visual",
            cardGalleryDesc: "Koleksi visual berwarna yang menonjolkan pesona tiap karakter.",
            cardOnairTitle: "Pengisi Suara & Tayang",
            cardOnairDesc: "Deretan Seiyuu papan atas dan platform streaming resmi.",
            cardExplore: "Buka Karakter",
            cardToGallery: "Buka Galeri",
            cardToOnair: "Buka Info Tayang"
        },
        en: {
            heroBadge: "Movie & TV Anime Series Now Streaming Worldwide!",
            heroHeadline: "On the Verge of Failing,<br>Guide 5 Study-Hating Quintuplets<br><span class=\"text-transparent bg-clip-text bg-gradient-to-r from-pink-600 via-purple-600 to-rose-600 underline decoration-wavy decoration-pink-300\">To Graduation!</span>",
            heroDesc: "A 500% adorable romantic comedy! The heartwarming youth story of Fuutarou and the five Nakano sisters (Ichika, Nino, Miku, Yotsuba, Itsuki).",
            heroQuickTip: "← View character details",
            heroBtnChar: "View Characters",
            heroBtnGallery: "Character Gallery",
            bannerCardTitle: "Nakano Quintuplets & Fuutarou Key Visual",
            bannerCardSub: "Fuutarou • Ichika • Nino • Miku • Yotsuba • Itsuki",
            bannerCert: "TBS Official Portal",
            bannerTag: "500% Cuteness",
            portalTitle: "5-toubun Official Portal Content",
            portalSub: "Explore dedicated multi-page sections below",
            cardCharTitle: "Character List",
            cardCharDesc: "Interactive profile selector and complete bios of Fuutarou and the 5 sisters.",
            cardGalleryTitle: "Visual Gallery",
            cardGalleryDesc: "Special colored visual cards showcasing each character's unique charm.",
            cardOnairTitle: "Cast & Streaming",
            cardOnairDesc: "Renowned voice actors (CV) and official worldwide streaming platforms.",
            cardExplore: "Explore Characters",
            cardToGallery: "Explore Gallery",
            cardToOnair: "Explore Streaming"
        }
    };

    function updateHomeLanguage(lang) {
        const t = homeTranslations[lang] || homeTranslations['ja'];
        const badge = document.getElementById('hero-badge');
        if (badge) badge.innerText = t.heroBadge;

        const headline = document.getElementById('hero-headline');
        if (headline) headline.innerHTML = t.heroHeadline;

        const desc = document.getElementById('hero-description');
        if (desc) desc.innerText = t.heroDesc;

        const tip = document.getElementById('hero-quick-tip');
        if (tip) tip.innerText = t.heroQuickTip;

        const btnChar = document.getElementById('hero-btn-char');
        if (btnChar) btnChar.innerText = t.heroBtnChar;

        const btnGal = document.getElementById('hero-btn-gallery');
        if (btnGal) btnGal.innerText = t.heroBtnGallery;

        const bannerTitle = document.getElementById('banner-card-title');
        if (bannerTitle) bannerTitle.innerText = t.bannerCardTitle;

        const bannerSub = document.getElementById('banner-card-sub');
        if (bannerSub) bannerSub.innerText = t.bannerCardSub;

        const bannerCert = document.getElementById('banner-cert');
        if (bannerCert) bannerCert.innerText = t.bannerCert;

        const bannerTag = document.getElementById('banner-tag');
        if (bannerTag) bannerTag.innerText = t.bannerTag;

        const pTitle = document.getElementById('portal-features-title');
        if (pTitle) pTitle.innerText = t.portalTitle;

        const pSub = document.getElementById('portal-features-sub');
        if (pSub) pSub.innerText = t.portalSub;

        const cCharT = document.getElementById('card-char-title');
        if (cCharT) cCharT.innerText = t.cardCharTitle;

        const cCharD = document.getElementById('card-char-desc');
        if (cCharD) cCharD.innerText = t.cardCharDesc;

        const cGalT = document.getElementById('card-gallery-title');
        if (cGalT) cGalT.innerText = t.cardGalleryTitle;

        const cGalD = document.getElementById('card-gallery-desc');
        if (cGalD) cGalD.innerText = t.cardGalleryDesc;

        const cOnT = document.getElementById('card-onair-title');
        if (cOnT) cOnT.innerText = t.cardOnairTitle;

        const cOnD = document.getElementById('card-onair-desc');
        if (cOnD) cOnD.innerText = t.cardOnairDesc;

        const cExp = document.getElementById('card-btn-explore');
        if (cExp) cExp.innerText = t.cardExplore;

        const cGal = document.getElementById('card-btn-gallery');
        if (cGal) cGal.innerText = t.cardToGallery;

        const cOn = document.getElementById('card-btn-onair');
        if (cOn) cOn.innerText = t.cardToOnair;
    }

    window.addEventListener('languageChanged', (e) => {
        updateHomeLanguage(e.detail.lang);
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateHomeLanguage(currentLang);
    });
</script>
@endpush
