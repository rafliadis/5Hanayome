@extends('layouts.app')

@section('title', 'キャラクター一覧 | TVアニメ「五等分の花嫁」公式ホームページ')
@section('meta_description', '主要登場人物＆中野家の５つ子（上杉風太郎、一花、二乃、三玖、四葉、五月）のプロフィールと詳細情報。')

@section('content')
<!-- INTERACTIVE CHARACTER SHOWCASE SECTION -->
<section class="py-12 px-4 md:px-8 bg-slate-50 flex-grow">
    <div class="max-w-5xl mx-auto space-y-6">

        <!-- Section Header -->
        <div class="text-center space-y-2">
            <span class="text-pink-600 font-bold text-xs uppercase tracking-widest bg-pink-100 px-3.5 py-1 rounded-full">CHARACTER SELECTOR</span>
            <h2 id="char-sec-title" class="text-2xl md:text-3xl font-black text-slate-800">主要登場人物 ＆ 中野家の５つ子</h2>
            <p id="char-sec-subtitle" class="text-xs md:text-sm text-slate-500">アイコンをクリックしてプレビューを切り替え、「詳細プロフィールを見る」で個別ページへ移動できます</p>
        </div>

        <!-- Character Selector Tabs (6 Characters) -->
        <div class="grid grid-cols-3 sm:grid-cols-6 gap-2 md:gap-3 max-w-4xl mx-auto">
            @foreach($characters as $slug => $char)
            <button onclick="selectSister('{{ $slug }}')"
                    id="tab-{{ $slug }}"
                    class="sister-tab border-2 {{ $slug === 'ichika' ? 'border-amber-400 bg-amber-50 shadow-md transform -translate-y-1 opacity-100' : 'border-transparent bg-white hover:bg-slate-100 shadow opacity-70 hover:opacity-100 hover:-translate-y-1' }} p-2 md:p-2.5 rounded-2xl flex flex-col items-center gap-1 transition-all">
                <div class="w-12 h-12 md:w-16 md:h-16 rounded-full overflow-hidden border-2 {{ $char['theme']['border'] }} shadow-md bg-white relative flex items-center justify-center">
                    <img id="tab-img-{{ $slug }}"
                         src="{{ file_exists(public_path($char['image'])) ? asset($char['image']) : $char['fallback_image'] }}"
                         onerror="applyAvatarSvg(this, '{{ $slug }}')"
                         referrerpolicy="no-referrer"
                         loading="lazy"
                         alt="{{ $char['kanji'] }}"
                         class="w-full h-full object-cover">
                </div>
                <span class="text-[11px] md:text-xs font-black {{ $char['theme']['text_dark'] }}" id="tab-name-{{ $slug }}">{{ $char['kanji'] }}</span>
                <span class="text-[9px] {{ $char['theme']['text'] }} hidden md:block" id="tab-sub-{{ $slug }}">{{ $char['tab_sub']['ja'] }}</span>
            </button>
            @endforeach
        </div>

        <!-- Dynamic Character Display Card -->
        <div id="character-display-card" class="bg-white rounded-3xl border-4 border-amber-300 p-6 md:p-8 shadow-xl transition-all duration-300">
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-center">

                <!-- Character Image Portrait Box with Instant Vector Fallback -->
                <div id="char-image-box" class="relative w-48 h-64 md:w-56 md:h-72 rounded-2xl overflow-hidden shadow-xl flex-shrink-0 bg-gradient-to-tr from-amber-400 to-yellow-200 p-1 flex items-center justify-center">
                    <img
                        id="char-main-img"
                        src="{{ file_exists(public_path('images/ichika.jpg')) ? asset('images/ichika.jpg') : 'https://cdn.myanimelist.net/images/characters/9/374823.jpg' }}"
                        referrerpolicy="no-referrer"
                        alt="Character Portrait"
                        loading="lazy"
                        class="w-full h-full object-cover rounded-xl shadow-inner transition-transform duration-500 hover:scale-105"
                        onerror="applyPortraitSvg(this, currentSisterKey);"
                    >
                    <div class="absolute bottom-2 left-2 right-2 bg-black/60 backdrop-blur-sm px-3 py-1 rounded-xl text-center text-white">
                        <span id="char-badge-sub" class="text-[10px] font-black tracking-widest text-amber-300">ICHIKA NAKANO</span>
                    </div>
                </div>

                <!-- Character Info Bio -->
                <div class="space-y-4 flex-grow text-center md:text-left w-full">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-2 border-b border-slate-200 pb-3">
                        <div>
                            <div class="flex items-center justify-center md:justify-start gap-2">
                                <h3 id="char-name" class="text-2xl md:text-3xl font-black text-slate-800">中野 一花</h3>
                                <span id="char-romaji" class="text-xs font-bold text-slate-500">(なかの いちか)</span>
                            </div>
                            <p id="char-cv" class="text-xs md:text-sm font-extrabold text-amber-600 mt-1 flex items-center justify-center md:justify-start gap-1">
                                <i data-lucide="mic" class="w-3.5 h-3.5"></i> CV：花澤香菜
                            </p>
                        </div>
                        <span id="char-badge" class="bg-amber-100 text-amber-800 px-3.5 py-1.5 rounded-full text-xs font-black self-center md:self-start shadow-sm">長女 (First Sister)</span>
                    </div>

                    <!-- Character Iconic Quote -->
                    <div id="char-quote-box" class="bg-amber-50 border-l-4 border-amber-400 p-3 rounded-r-xl text-xs md:text-sm italic font-medium text-slate-700">
                        「お姉さんだからね。みんなの面倒はちゃんと見るよ」
                    </div>

                    <p id="char-bio" class="text-xs md:text-sm text-slate-600 leading-relaxed font-medium">
                        ５つ子の長女。面倒見の良いお姉さん気質だが、部屋の中ではかなりズボラ。駆け出しの女優としても活動しており、姉妹たちの恋の行方を温かく見守りつつ、自身も風太郎に惹かれていく。
                    </p>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5 pt-2 text-xs font-semibold">
                        <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-200">
                            <span id="label-subject" class="text-slate-400 block text-[10px] font-bold">得意科目</span>
                            <span id="char-subject" class="text-slate-800 font-extrabold">数学</span>
                        </div>
                        <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-200">
                            <span id="label-food" class="text-slate-400 block text-[10px] font-bold">好きな食べ物</span>
                            <span id="char-food" class="text-slate-800 font-extrabold">フラペチーノ</span>
                        </div>
                        <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-200 col-span-2 sm:col-span-1">
                            <span id="label-trait" class="text-slate-400 block text-[10px] font-bold">トレードマーク</span>
                            <span id="char-trait" class="text-slate-800 font-extrabold">ショートヘア ＆ ピアス</span>
                        </div>
                    </div>

                    <!-- Button: View Full Character Detail Page -->
                    <div class="pt-3 flex justify-center md:justify-start">
                        <a id="btn-view-detail"
                           href="{{ route('character.detail', ['slug' => 'ichika']) }}"
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white font-black text-xs md:text-sm px-6 py-3 rounded-2xl shadow-lg shadow-amber-500/30 hover:shadow-xl transition transform hover:-translate-y-0.5">
                            <span id="btn-view-detail-text">一花の詳細プロフィールを見る</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    const sistersData = @json($characters);
    let currentSisterKey = 'ichika';

    const charListTranslations = {
        ja: {
            title: "主要登場人物 ＆ 中野家の５つ子",
            subtitle: "アイコンをクリックしてプレビューを切り替え、「詳細プロフィールを見る」で個別ページへ移動できます",
            labelSubject: "得意科目",
            labelFood: "好きな食べ物",
            labelTrait: "トレードマーク",
            viewDetail: "の詳細プロフィールを見る"
        },
        id: {
            title: "Karakter Utama & 5 Saudari Kembar Nakano",
            subtitle: "Klik ikon untuk melihat preview, dan klik tombol 'Lihat Profil Lengkap' untuk membuka halaman detail",
            labelSubject: "Mata Pelajaran Favorit",
            labelFood: "Makanan Favorit",
            labelTrait: "Ciri Khas",
            viewDetail: "Lihat Profil Lengkap "
        },
        en: {
            title: "Main Characters & The Nakano Quintuplets",
            subtitle: "Click icons to switch preview, and click 'View Full Profile' to open the dedicated detail page",
            labelSubject: "Best Subject",
            labelFood: "Favorite Food",
            labelTrait: "Trademark",
            viewDetail: "View Full Profile of "
        }
    };

    function selectSister(key) {
        currentSisterKey = key;
        const fullData = sistersData[key];
        if (!fullData) return;
        const lang = currentLang;

        const keys = ['fuutarou', 'ichika', 'nino', 'miku', 'yotsuba', 'itsuki'];
        keys.forEach(k => {
            const tab = document.getElementById(`tab-${k}`);
            if (!tab) return;
            const itemTheme = sistersData[k].theme.color;
            if (k === key) {
                tab.className = `sister-tab border-2 border-${itemTheme}-400 bg-${itemTheme}-50 p-2 md:p-2.5 rounded-2xl flex flex-col items-center gap-1 transition-all shadow-md transform -translate-y-1 opacity-100`;
            } else {
                tab.className = `sister-tab border-2 border-transparent bg-white hover:bg-slate-100 p-2 md:p-2.5 rounded-2xl flex flex-col items-center gap-1 transition-all shadow opacity-60 hover:opacity-100 hover:-translate-y-1`;
            }
        });

        const displayCard = document.getElementById('character-display-card');
        const imageBox = document.getElementById('char-image-box');
        const quoteBox = document.getElementById('char-quote-box');
        const mainImg = document.getElementById('char-main-img');
        const detailBtn = document.getElementById('btn-view-detail');
        const detailBtnText = document.getElementById('btn-view-detail-text');

        displayCard.className = `bg-white rounded-3xl border-4 ${fullData.theme.border} p-6 md:p-8 shadow-xl transition-all duration-300`;
        imageBox.className = `relative w-48 h-64 md:w-56 md:h-72 rounded-2xl overflow-hidden shadow-xl flex-shrink-0 bg-gradient-to-tr ${fullData.theme.gradient} p-1 flex items-center justify-center`;

        const charName = lang === 'ja' ? fullData.kanji : fullData.romaji;
        mainImg.src = fullData.image ? `/${fullData.image}` : fullData.fallback_image;
        mainImg.alt = charName;

        document.getElementById('char-badge-sub').innerText = fullData.romaji.toUpperCase();
        document.getElementById('char-name').innerText = lang === 'ja' ? fullData.kanji : fullData.romaji;
        document.getElementById('char-romaji').innerText = lang === 'ja' ? `(${fullData.hiragana})` : `(${fullData.kanji})`;

        const charCv = document.getElementById('char-cv');
        const cvText = (fullData.cv && fullData.cv[lang]) || fullData.cv['ja'];
        charCv.innerHTML = `<i data-lucide="mic" class="w-3.5 h-3.5 inline"></i> ${cvText}`;
        charCv.className = `text-xs md:text-sm font-extrabold ${fullData.theme.text} mt-1 flex items-center justify-center md:justify-start gap-1`;

        const badge = document.getElementById('char-badge');
        badge.innerText = (fullData.role_label && fullData.role_label[lang]) || fullData.role_label['ja'];
        badge.className = `${fullData.theme.badge_bg} ${fullData.theme.badge_text} px-3.5 py-1.5 rounded-full text-xs font-black self-center md:self-start shadow-sm`;

        quoteBox.className = `${fullData.theme.quote_bg} border-l-4 ${fullData.theme.quote_border} p-3 rounded-r-xl text-xs md:text-sm italic font-medium text-slate-700`;
        quoteBox.innerText = (fullData.quote && fullData.quote[lang]) || fullData.quote['ja'];

        document.getElementById('char-bio').innerText = (fullData.description && fullData.description[lang]) || fullData.description['ja'];
        document.getElementById('char-subject').innerText = (fullData.subject && fullData.subject[lang]) || fullData.subject['ja'];
        document.getElementById('char-food').innerText = (fullData.food && fullData.food[lang]) || fullData.food['ja'];
        document.getElementById('char-trait').innerText = (fullData.trait && fullData.trait[lang]) || fullData.trait['ja'];

        // Detail button
        if (detailBtn) {
            detailBtn.href = `/karakter/${fullData.slug}`;
            const color = fullData.theme.color;
            detailBtn.className = `inline-flex items-center gap-2 bg-${color}-600 hover:bg-${color}-700 text-white font-black text-xs md:text-sm px-6 py-3 rounded-2xl shadow-lg shadow-${color}-500/30 hover:shadow-xl transition transform hover:-translate-y-0.5`;

            const shortName = lang === 'ja' ? fullData.kanji.replace('中野 ', '').replace('上杉 ', '') : fullData.romaji.split(' ')[0];
            const t = charListTranslations[lang] || charListTranslations['ja'];
            if (lang === 'ja') {
                detailBtnText.innerText = `${shortName}${t.viewDetail}`;
            } else {
                detailBtnText.innerText = `${t.viewDetail} ${shortName}`;
            }
        }

        lucide.createIcons();
    }

    function updateCharacterListLanguage(lang) {
        const t = charListTranslations[lang] || charListTranslations['ja'];
        const title = document.getElementById('char-sec-title');
        if (title) title.innerText = t.title;

        const sub = document.getElementById('char-sec-subtitle');
        if (sub) sub.innerText = t.subtitle;

        const lblSub = document.getElementById('label-subject');
        if (lblSub) lblSub.innerText = t.labelSubject;

        const lblFood = document.getElementById('label-food');
        if (lblFood) lblFood.innerText = t.labelFood;

        const lblTrait = document.getElementById('label-trait');
        if (lblTrait) lblTrait.innerText = t.labelTrait;

        // Update tabs names
        Object.keys(sistersData).forEach(k => {
            const s = sistersData[k];
            const nameEl = document.getElementById(`tab-name-${k}`);
            const subEl = document.getElementById(`tab-sub-${k}`);
            if (nameEl) {
                nameEl.innerText = lang === 'ja' ? s.kanji.replace('中野 ', '').replace('上杉 ', '') : s.romaji.split(' ')[0];
            }
            if (subEl) {
                subEl.innerText = (s.tab_sub && s.tab_sub[lang]) || s.tab_sub['ja'];
            }
        });

        selectSister(currentSisterKey);
    }

    window.addEventListener('languageChanged', (e) => {
        updateCharacterListLanguage(e.detail.lang);
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateCharacterListLanguage(currentLang);
    });
</script>
@endpush
