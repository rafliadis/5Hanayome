@extends('layouts.app')

@section('title', $character['kanji'] . ' (' . $character['romaji'] . ') | TBS Official Web Portal')
@section('meta_description', $character['kanji'] . ' - ' . $character['role_label']['ja'] . '。' . $character['description']['ja'])

@section('content')
<section class="py-8 md:py-12 px-4 md:px-8 bg-slate-50 flex-grow">
    <div class="max-w-5xl mx-auto space-y-8">

        <!-- Top Navigation Bar: Breadcrumb & Back to List -->
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-200 pb-4">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs md:text-sm font-bold text-slate-500" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-tbsPink transition flex items-center gap-1">
                    <i data-lucide="home" class="w-4 h-4"></i>
                    <span data-i18n="breadcrumbHome">ホーム</span>
                </a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('characters') }}" class="hover:text-tbsPink transition" data-i18n="breadcrumbChar">
                    キャラクター
                </a>
                <span class="text-slate-300">/</span>
                <span class="text-slate-800 font-extrabold" id="breadcrumb-current-name">
                    {{ $character['kanji'] }}
                </span>
            </nav>

            <!-- Back to Character Selector Link -->
            <a href="{{ route('characters') }}" class="inline-flex items-center gap-1.5 text-xs md:text-sm font-bold text-slate-600 hover:text-pink-600 bg-white px-3.5 py-1.5 rounded-full border border-slate-200 hover:border-pink-300 shadow-sm transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span data-i18n="btnBackToList">キャラクター一覧へ戻る</span>
            </a>
        </div>

        <!-- Main Character Showcase Card -->
        <div class="bg-white rounded-3xl border-4 {{ $character['theme']['border'] }} p-6 md:p-10 shadow-2xl relative overflow-hidden">
            <!-- Background Theme Glow -->
            <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-{{ $character['theme']['color'] }}-100 opacity-50 blur-3xl pointer-events-none"></div>

            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 items-center lg:items-start relative z-10">

                <!-- Left Column: Big Portrait Card & Quick Facts -->
                <div class="w-full sm:w-72 md:w-80 flex-shrink-0 flex flex-col items-center">
                    <div class="relative w-full aspect-[3/4] rounded-3xl overflow-hidden shadow-2xl bg-gradient-to-tr {{ $character['theme']['gradient'] }} p-1.5 flex items-center justify-center group">
                        <img
                            id="detail-main-img"
                            src="{{ file_exists(public_path($character['image'])) ? asset($character['image']) : $character['fallback_image'] }}"
                            alt="{{ $character['kanji'] }}"
                            referrerpolicy="no-referrer"
                            loading="lazy"
                            class="w-full h-full object-cover rounded-2xl shadow-inner group-hover:scale-105 transition duration-500"
                            onerror="applyPortraitSvg(this, '{{ $character['slug'] }}');"
                        >
                        <div class="absolute bottom-3 left-3 right-3 bg-black/70 backdrop-blur-md px-4 py-2 rounded-2xl text-center text-white">
                            <span class="text-xs font-black tracking-widest text-{{ $character['theme']['color'] }}-300">
                                {{ strtoupper($character['romaji']) }}
                            </span>
                        </div>
                    </div>

                    <!-- Voice Actor (CV) Card -->
                    <div class="mt-4 w-full bg-{{ $character['theme']['color'] }}-50 border-2 border-{{ $character['theme']['color'] }}-200 rounded-2xl p-3 text-center shadow-sm">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block" data-i18n="labelVoiceActor">VOICE ACTOR (CAST)</span>
                        <p class="text-sm font-extrabold {{ $character['theme']['text_dark'] }} flex items-center justify-center gap-1.5 mt-0.5" id="detail-cv">
                            <i data-lucide="mic" class="w-4 h-4 {{ $character['theme']['text'] }}"></i>
                            <span>{{ $character['cv']['ja'] }}</span>
                        </p>
                    </div>
                </div>

                <!-- Right Column: Bio, Detailed Information & Stats Grid -->
                <div class="flex-grow space-y-6 w-full">

                    <!-- Header: Name, Hiragana, Role Badge -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-200 pb-4">
                        <div>
                            <div class="flex items-baseline gap-2 flex-wrap">
                                <h1 class="text-3xl md:text-4xl font-black text-slate-800" id="detail-name">
                                    {{ $character['kanji'] }}
                                </h1>
                                <span class="text-xs md:text-sm font-bold text-slate-400" id="detail-romaji">
                                    ({{ $character['hiragana'] }})
                                </span>
                            </div>
                            <span class="text-xs font-extrabold {{ $character['theme']['text'] }} tracking-wide block mt-1">
                                THE QUINTESSENTIAL QUINTUPLETS
                            </span>
                        </div>

                        <span id="detail-role-badge" class="{{ $character['theme']['badge_bg'] }} {{ $character['theme']['badge_text'] }} px-4 py-2 rounded-full text-xs md:text-sm font-black shadow-sm self-start sm:self-center">
                            {{ $character['role_label']['ja'] }}
                        </span>
                    </div>

                    <!-- Quote Block -->
                    <div class="{{ $character['theme']['quote_bg'] }} border-l-4 {{ $character['theme']['quote_border'] }} p-4 rounded-r-2xl shadow-inner">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1" data-i18n="labelIconicQuote">ICONIC QUOTE</span>
                        <blockquote class="text-sm md:text-base font-bold italic text-slate-800 leading-relaxed" id="detail-quote">
                            {{ $character['quote']['ja'] }}
                        </blockquote>
                    </div>

                    <!-- Detailed Bio / Story Description -->
                    <div class="space-y-2">
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-400 flex items-center gap-1.5" data-i18n="labelProfileStory">
                            <i data-lucide="book-open" class="w-4 h-4 text-pink-500"></i> プロフィール ＆ キャラクター紹介
                        </h2>
                        <p class="text-xs md:text-sm text-slate-600 font-medium leading-relaxed bg-slate-50 p-4 rounded-2xl border border-slate-200" id="detail-desc">
                            {{ $character['description']['ja'] }}
                        </p>
                    </div>

                    <!-- Character Statistics Box -->
                    <div class="space-y-2">
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-400 flex items-center gap-1.5" data-i18n="labelPersonalStats">
                            <i data-lucide="info" class="w-4 h-4 text-pink-500"></i> キャラクター個別データ
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <!-- Favorite Subject / Specialty -->
                            <div class="bg-white p-3.5 rounded-2xl border border-slate-200 shadow-sm">
                                <span class="text-[10px] font-bold text-slate-400 block mb-1" id="detail-label-subject">得意科目</span>
                                <span class="text-xs md:text-sm font-black text-slate-800" id="detail-subject">{{ $character['subject']['ja'] }}</span>
                            </div>

                            <!-- Favorite Food -->
                            <div class="bg-white p-3.5 rounded-2xl border border-slate-200 shadow-sm">
                                <span class="text-[10px] font-bold text-slate-400 block mb-1" id="detail-label-food">好きな食べ物</span>
                                <span class="text-xs md:text-sm font-black text-slate-800" id="detail-food">{{ $character['food']['ja'] }}</span>
                            </div>

                            <!-- Trademark Trait -->
                            <div class="bg-white p-3.5 rounded-2xl border border-slate-200 shadow-sm">
                                <span class="text-[10px] font-bold text-slate-400 block mb-1" id="detail-label-trait">トレードマーク</span>
                                <span class="text-xs md:text-sm font-black text-slate-800" id="detail-trait">{{ $character['trait']['ja'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Circular Previous / Next Navigation Buttons -->
                    <div class="pt-4 border-t border-slate-200 flex items-center justify-between gap-4">
                        <a href="{{ route('character.detail', ['slug' => $prevChar['slug']]) }}"
                           class="flex items-center gap-2 px-4 py-2.5 rounded-2xl border border-slate-300 hover:border-pink-400 bg-white hover:bg-pink-50 text-slate-700 hover:text-pink-600 text-xs md:text-sm font-bold shadow-sm transition group">
                            <i data-lucide="chevron-left" class="w-4 h-4 group-hover:-translate-x-1 transition"></i>
                            <div>
                                <span class="text-[9px] text-slate-400 block font-normal" data-i18n="btnPrevChar">前のキャラクター</span>
                                <span id="prev-char-name">{{ $prevChar['kanji'] }}</span>
                            </div>
                        </a>

                        <a href="{{ route('character.detail', ['slug' => $nextChar['slug']]) }}"
                           class="flex items-center gap-2 px-4 py-2.5 rounded-2xl border border-slate-300 hover:border-pink-400 bg-white hover:bg-pink-50 text-slate-700 hover:text-pink-600 text-xs md:text-sm font-bold shadow-sm transition text-right group">
                            <div>
                                <span class="text-[9px] text-slate-400 block font-normal" data-i18n="btnNextChar">次のキャラクター</span>
                                <span id="next-char-name">{{ $nextChar['kanji'] }}</span>
                            </div>
                            <i data-lucide="chevron-right" class="w-4 h-4 group-hover:translate-x-1 transition"></i>
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <!-- OTHER CHARACTERS THUMBNAIL LIST -->
        <div class="space-y-4 pt-4">
            <div class="flex items-center justify-between border-b-2 border-pink-500 pb-2">
                <h2 class="text-base md:text-lg font-black text-slate-800 flex items-center gap-2">
                    <i data-lucide="users" class="w-5 h-5 text-pink-500"></i>
                    <span data-i18n="otherCharactersTitle">他のキャラクターを見る</span>
                </h2>
                <a href="{{ route('characters') }}" class="text-xs font-bold text-pink-600 hover:underline" data-i18n="otherCharactersViewAll">
                    全員のリスト →
                </a>
            </div>

            <!-- 5 Other Characters Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                @foreach($otherCharacters as $otherSlug => $other)
                <a href="{{ route('character.detail', ['slug' => $otherSlug]) }}"
                   class="bg-white hover:bg-{{ $other['theme']['color'] }}-50 border-2 border-slate-200 hover:border-{{ $other['theme']['color'] }}-400 p-3 rounded-2xl shadow-sm hover:shadow-md transition transform hover:-translate-y-1 flex flex-col items-center text-center group">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full overflow-hidden border-2 {{ $other['theme']['border'] }} shadow-md bg-{{ $other['theme']['color'] }}-100 mb-2">
                        <img src="{{ file_exists(public_path($other['image'])) ? asset($other['image']) : $other['fallback_image'] }}"
                             onerror="applyAvatarSvg(this, '{{ $otherSlug }}')"
                             referrerpolicy="no-referrer"
                             loading="lazy"
                             alt="{{ $other['kanji'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <h3 class="font-black text-xs {{ $other['theme']['text_dark'] }} group-hover:{{ $other['theme']['text'] }} transition truncate w-full" id="other-name-{{ $otherSlug }}">
                        {{ $other['kanji'] }}
                    </h3>
                    <span class="text-[9px] font-bold text-slate-400 truncate w-full" id="other-sub-{{ $otherSlug }}">
                        {{ $other['tab_sub']['ja'] }}
                    </span>
                </a>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    const characterData = @json($character);
    const prevCharData = @json($prevChar);
    const nextCharData = @json($nextChar);
    const otherCharsData = @json($otherCharacters);

    const detailPageTranslations = {
        ja: {
            breadcrumbHome: "ホーム",
            breadcrumbChar: "キャラクター",
            btnBackToList: "キャラクター一覧へ戻る",
            labelVoiceActor: "VOICE ACTOR (CAST)",
            labelIconicQuote: "ICONIC QUOTE (名言)",
            labelProfileStory: "プロフィール ＆ キャラクター紹介",
            labelPersonalStats: "キャラクター個別データ",
            labelSubject: "得意科目",
            labelFood: "好きな食べ物",
            labelTrait: "トレードマーク",
            btnPrevChar: "前のキャラクター",
            btnNextChar: "次のキャラクター",
            otherCharactersTitle: "他のキャラクターを見る",
            otherCharactersViewAll: "全員のリスト →"
        },
        id: {
            breadcrumbHome: "Beranda",
            breadcrumbChar: "Karakter",
            btnBackToList: "Kembali ke Daftar Karakter",
            labelVoiceActor: "PENGISI SUARA (SEIYUU)",
            labelIconicQuote: "KUTIPAN KHAS",
            labelProfileStory: "Profil & Kisah Karakter",
            labelPersonalStats: "Data Pribadi Karakter",
            labelSubject: "Mata Pelajaran Favorit",
            labelFood: "Makanan Favorit",
            labelTrait: "Ciri Khas",
            btnPrevChar: "Karakter Sebelumnya",
            btnNextChar: "Karakter Berikutnya",
            otherCharactersTitle: "Karakter Lainnya",
            otherCharactersViewAll: "Lihat Semua →"
        },
        en: {
            breadcrumbHome: "Home",
            breadcrumbChar: "Characters",
            btnBackToList: "Back to Character List",
            labelVoiceActor: "VOICE ACTOR (CAST)",
            labelIconicQuote: "ICONIC QUOTE",
            labelProfileStory: "Profile & Story Description",
            labelPersonalStats: "Personal Character Stats",
            labelSubject: "Best Subject",
            labelFood: "Favorite Food",
            labelTrait: "Trademark",
            btnPrevChar: "Previous Character",
            btnNextChar: "Next Character",
            otherCharactersTitle: "Other Characters",
            otherCharactersViewAll: "View All →"
        }
    };

    function updateDetailPageLanguage(lang) {
        const t = detailPageTranslations[lang] || detailPageTranslations['ja'];

        // Breadcrumb and static UI text
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (t[key]) {
                el.innerHTML = t[key];
            }
        });

        // Dynamic Character Details
        const name = lang === 'ja' ? characterData.kanji : characterData.romaji;
        const breadcrumbCurrent = document.getElementById('breadcrumb-current-name');
        if (breadcrumbCurrent) breadcrumbCurrent.innerText = name;

        const detailName = document.getElementById('detail-name');
        if (detailName) detailName.innerText = name;

        const detailRomaji = document.getElementById('detail-romaji');
        if (detailRomaji) detailRomaji.innerText = lang === 'ja' ? `(${characterData.hiragana})` : `(${characterData.kanji})`;

        const cvEl = document.getElementById('detail-cv');
        if (cvEl) {
            const cvText = (characterData.cv && characterData.cv[lang]) || characterData.cv['ja'];
            cvEl.innerHTML = `<i data-lucide="mic" class="w-4 h-4 ${characterData.theme.text}"></i> <span>${cvText}</span>`;
        }

        const roleBadge = document.getElementById('detail-role-badge');
        if (roleBadge) roleBadge.innerText = (characterData.role_label && characterData.role_label[lang]) || characterData.role_label['ja'];

        const quoteEl = document.getElementById('detail-quote');
        if (quoteEl) quoteEl.innerText = (characterData.quote && characterData.quote[lang]) || characterData.quote['ja'];

        const descEl = document.getElementById('detail-desc');
        if (descEl) descEl.innerText = (characterData.description && characterData.description[lang]) || characterData.description['ja'];

        const subEl = document.getElementById('detail-subject');
        if (subEl) subEl.innerText = (characterData.subject && characterData.subject[lang]) || characterData.subject['ja'];

        const foodEl = document.getElementById('detail-food');
        if (foodEl) foodEl.innerText = (characterData.food && characterData.food[lang]) || characterData.food['ja'];

        const traitEl = document.getElementById('detail-trait');
        if (traitEl) traitEl.innerText = (characterData.trait && characterData.trait[lang]) || characterData.trait['ja'];

        const lblSub = document.getElementById('detail-label-subject');
        if (lblSub) lblSub.innerText = t.labelSubject;

        const lblFood = document.getElementById('detail-label-food');
        if (lblFood) lblFood.innerText = t.labelFood;

        const lblTrait = document.getElementById('detail-label-trait');
        if (lblTrait) lblTrait.innerText = t.labelTrait;

        // Prev & Next Names
        const prevNameEl = document.getElementById('prev-char-name');
        if (prevNameEl) prevNameEl.innerText = lang === 'ja' ? prevCharData.kanji : prevCharData.romaji;

        const nextNameEl = document.getElementById('next-char-name');
        if (nextNameEl) nextNameEl.innerText = lang === 'ja' ? nextCharData.kanji : nextCharData.romaji;

        // Other character thumbnails
        Object.keys(otherCharsData).forEach(slug => {
            const item = otherCharsData[slug];
            const nameThumb = document.getElementById(`other-name-${slug}`);
            const subThumb = document.getElementById(`other-sub-${slug}`);
            if (nameThumb) nameThumb.innerText = lang === 'ja' ? item.kanji : item.romaji;
            if (subThumb) subThumb.innerText = (item.tab_sub && item.tab_sub[lang]) || item.tab_sub['ja'];
        });

        lucide.createIcons();
    }

    window.addEventListener('languageChanged', (e) => {
        updateDetailPageLanguage(e.detail.lang);
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateDetailPageLanguage(currentLang);
    });
</script>
@endpush
