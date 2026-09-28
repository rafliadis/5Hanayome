@extends('layouts.app')

@section('title', 'キャラクターギャラリー | TVアニメ「五等分の花嫁」公式ホームページ')
@section('meta_description', '上杉風太郎と中野家の5姉妹それぞれの魅力を詰め込んだスペシャルギャラリー。各カードから詳細プロフィールへ移動できます。')

@section('content')
<!-- ALL-IN-ONE GALLERY SECTION (6 Characters) -->
<section class="py-12 px-4 md:px-8 border-t border-slate-200 bg-white flex-grow">
    <div class="max-w-5xl mx-auto space-y-8">

        <div class="text-center space-y-2">
            <span class="text-pink-600 font-bold text-xs uppercase tracking-widest bg-pink-100 px-3.5 py-1 rounded-full">CHARACTER GALLERY</span>
            <h2 id="gallery-sec-title" class="text-2xl md:text-3xl font-black text-slate-800">キャラクタービジュアルコレクション</h2>
            <p id="gallery-sec-subtitle" class="text-xs md:text-sm text-slate-500">カードをクリックすると、各キャラクターの個別詳細ページへ移動します</p>
        </div>

        <!-- 6 Cards Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 md:gap-4">
            @foreach($characters as $slug => $char)
            <a href="{{ route('character.detail', ['slug' => $slug]) }}"
               class="{{ $char['theme']['bg_light'] }}/70 {{ $char['theme']['bg_light_hover'] }} rounded-2xl border-2 {{ $char['theme']['border'] }} p-2.5 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1.5 cursor-pointer group flex flex-col justify-between"
               title="{{ $char['kanji'] }} ({{ $char['romaji'] }}) - Lihat Detail">
                <div class="aspect-[3/4] rounded-xl overflow-hidden bg-{{ $char['theme']['color'] }}-100 relative shadow-inner flex items-center justify-center">
                    <img src="{{ file_exists(public_path($char['image'])) ? asset($char['image']) : $char['fallback_image'] }}"
                         onerror="applyAvatarSvg(this, '{{ $slug }}')"
                         referrerpolicy="no-referrer"
                         loading="lazy"
                         alt="{{ $char['kanji'] }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <span class="absolute top-1.5 left-1.5 {{ $char['theme']['badge_solid'] }} text-[9px] font-black px-1.5 py-0.5 rounded shadow" id="g-badge-{{ $slug }}">
                        {{ $char['tab_sub']['ja'] }}
                    </span>
                </div>
                <div class="pt-2 text-center">
                    <h3 class="font-extrabold text-xs md:text-sm text-slate-800 group-hover:{{ $char['theme']['text'] }} transition truncate" id="g-name-{{ $slug }}">
                        {{ $char['kanji'] }}
                    </h3>
                    <p class="text-[10px] {{ $char['theme']['text'] }} font-bold truncate">{{ $char['romaji'] }}</p>
                    <span class="inline-block mt-1 text-[9px] bg-{{ $char['theme']['color'] }}-200 {{ $char['theme']['text_dark'] }} font-bold px-1.5 py-0.5 rounded-full truncate max-w-full" id="g-tag-{{ $slug }}">
                        {{ $char['gallery_tag']['ja'] }}
                    </span>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    const galleryData = @json($characters);

    const galleryTranslations = {
        ja: {
            title: "キャラクタービジュアルコレクション",
            subtitle: "カードをクリックすると、各キャラクターの個別詳細ページへ移動します"
        },
        id: {
            title: "Koleksi Visual Karakter",
            subtitle: "Klik pada kartu karakter untuk membuka halaman detail profil lengkapnya"
        },
        en: {
            title: "Character Visual Collection",
            subtitle: "Click any character card to open their dedicated detailed profile page"
        }
    };

    function updateGalleryLanguage(lang) {
        const t = galleryTranslations[lang] || galleryTranslations['ja'];
        const title = document.getElementById('gallery-sec-title');
        if (title) title.innerText = t.title;

        const sub = document.getElementById('gallery-sec-subtitle');
        if (sub) sub.innerText = t.subtitle;

        Object.keys(galleryData).forEach(slug => {
            const char = galleryData[slug];
            const nameEl = document.getElementById(`g-name-${slug}`);
            const badgeEl = document.getElementById(`g-badge-${slug}`);
            const tagEl = document.getElementById(`g-tag-${slug}`);

            if (nameEl) {
                nameEl.innerText = lang === 'ja' ? char.kanji : char.romaji;
            }
            if (badgeEl) {
                badgeEl.innerText = (char.tab_sub && char.tab_sub[lang]) || char.tab_sub['ja'];
            }
            if (tagEl) {
                tagEl.innerText = (char.gallery_tag && char.gallery_tag[lang]) || char.gallery_tag['ja'];
            }
        });
    }

    window.addEventListener('languageChanged', (e) => {
        updateGalleryLanguage(e.detail.lang);
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateGalleryLanguage(currentLang);
    });
</script>
@endpush
