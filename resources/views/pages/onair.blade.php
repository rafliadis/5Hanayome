@extends('layouts.app')

@section('title', '放送・キャスト ＆ 配信情報 | TVアニメ「五等分の花嫁」公式ホームページ')
@section('meta_description', 'アニメ「五等分の花嫁」のメインキャスト（声優陣）および動画配信プラットフォーム（U-NEXT、dアニメストア、Netflix等）一覧。')

@section('content')
<!-- CAST & STREAMING INFO -->
<section class="py-12 px-4 md:px-8 bg-pink-50/60 border-t border-pink-200 flex-grow">
    <div class="max-w-5xl mx-auto space-y-8">
        <div class="text-center space-y-2">
            <span class="text-pink-600 font-bold text-xs uppercase tracking-widest bg-pink-100 px-3.5 py-1 rounded-full">ON AIR & CAST</span>
            <h2 class="text-2xl md:text-3xl font-black text-slate-800" id="cast-sec-title">キャスト ＆ 配信情報 (CAST & ON AIR)</h2>
            <p class="text-xs md:text-sm text-slate-500" id="cast-sec-subtitle">メイン声優陣の紹介および各種配信サービス一覧</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
            <!-- Left: Main Voice Cast Card -->
            <div class="bg-white p-6 rounded-3xl border border-pink-200 shadow-md space-y-4">
                <div class="flex items-center justify-between border-b pb-3">
                    <h3 class="font-black text-base text-pink-600 flex items-center gap-2">
                        <i data-lucide="mic" class="w-5 h-5"></i>
                        <span id="cast-box-title">メインキャスト (CV)</span>
                    </h3>
                    <span class="text-[10px] font-bold bg-pink-100 text-pink-700 px-2.5 py-0.5 rounded-full">主役 ＆ 5つ子</span>
                </div>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 font-medium text-slate-700">
                    @foreach($characters as $slug => $char)
                    <li>
                        <a href="{{ route('character.detail', ['slug' => $slug]) }}"
                           class="p-2.5 rounded-2xl bg-{{ $char['theme']['color'] }}-50 hover:bg-{{ $char['theme']['color'] }}-100 text-{{ $char['theme']['color'] }}-950 border border-{{ $char['theme']['color'] }}-200 font-bold flex items-center gap-2 transition transform hover:-translate-y-0.5 group">
                            <span class="w-2.5 h-2.5 rounded-full bg-{{ $char['theme']['color'] }}-500 flex-shrink-0"></span>
                            <div class="truncate">
                                <span class="text-[10px] text-{{ $char['theme']['color'] }}-700 block truncate" id="cast-role-{{ $slug }}">{{ $char['kanji'] }}</span>
                                <span class="text-xs text-slate-800 truncate" id="cast-name-{{ $slug }}">{{ $char['cv']['ja'] }}</span>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Right: Streaming Platforms Card -->
            <div class="bg-white p-6 rounded-3xl border border-pink-200 shadow-md space-y-4">
                <div class="flex items-center justify-between border-b pb-3">
                    <h3 class="font-black text-base text-pink-600 flex items-center gap-2">
                        <i data-lucide="tv-2" class="w-5 h-5"></i>
                        <span id="stream-box-title">配信プラットフォーム一覧</span>
                    </h3>
                    <span class="text-[10px] font-bold bg-green-100 text-green-700 px-2.5 py-0.5 rounded-full">配信中</span>
                </div>

                <p class="text-xs text-slate-500" id="stream-box-desc">以下の各配信サイトにてTVアニメ全シリーズおよび劇場版が見放題配信中！</p>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5 pt-1">
                    <div class="bg-slate-50 text-slate-800 p-3 rounded-2xl text-center font-bold border border-slate-200 hover:border-pink-400 hover:bg-pink-50 transition shadow-sm flex flex-col items-center justify-center">
                        <span class="text-xs">dアニメストア</span>
                    </div>
                    <div class="bg-slate-50 text-slate-800 p-3 rounded-2xl text-center font-bold border border-slate-200 hover:border-pink-400 hover:bg-pink-50 transition shadow-sm flex flex-col items-center justify-center">
                        <span class="text-xs">U-NEXT</span>
                    </div>
                    <div class="bg-slate-50 text-slate-800 p-3 rounded-2xl text-center font-bold border border-slate-200 hover:border-pink-400 hover:bg-pink-50 transition shadow-sm flex flex-col items-center justify-center">
                        <span class="text-xs">ABEMA</span>
                    </div>
                    <div class="bg-slate-50 text-slate-800 p-3 rounded-2xl text-center font-bold border border-slate-200 hover:border-pink-400 hover:bg-pink-50 transition shadow-sm flex flex-col items-center justify-center">
                        <span class="text-xs">Prime Video</span>
                    </div>
                    <div class="bg-slate-50 text-slate-800 p-3 rounded-2xl text-center font-bold border border-slate-200 hover:border-pink-400 hover:bg-pink-50 transition shadow-sm flex flex-col items-center justify-center">
                        <span class="text-xs">Netflix</span>
                    </div>
                    <div class="bg-slate-50 text-slate-800 p-3 rounded-2xl text-center font-bold border border-slate-200 hover:border-pink-400 hover:bg-pink-50 transition shadow-sm flex flex-col items-center justify-center">
                        <span class="text-xs">Hulu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    const castData = @json($characters);

    const onairTranslations = {
        ja: {
            title: "キャスト ＆ 配信情報 (CAST & ON AIR)",
            subtitle: "メイン声優陣の紹介および各種配信サービス一覧",
            castBoxTitle: "メインキャスト (CV)",
            streamBoxTitle: "配信プラットフォーム一覧",
            streamBoxDesc: "以下の各配信サイトにてTVアニメ全シリーズおよび劇場版が見放題配信中！"
        },
        id: {
            title: "Pengisi Suara & Platform Tayang (CAST & ON AIR)",
            subtitle: "Daftar Seiyuu utama dan layanan streaming resmi",
            castBoxTitle: "Pengisi Suara Utama (CV)",
            streamBoxTitle: "Daftar Platform Streaming",
            streamBoxDesc: "Streaming film dan seluruh episode anime TV kini dapat ditonton di platform berikut!"
        },
        en: {
            title: "Cast & Streaming Information (CAST & ON AIR)",
            subtitle: "Main voice actors (CV) and official streaming services list",
            castBoxTitle: "Main Voice Cast (CV)",
            streamBoxTitle: "Streaming Platforms",
            streamBoxDesc: "The full TV anime series and the movie are now available on the following platforms!"
        }
    };

    function updateOnairLanguage(lang) {
        const t = onairTranslations[lang] || onairTranslations['ja'];
        const title = document.getElementById('cast-sec-title');
        if (title) title.innerText = t.title;

        const sub = document.getElementById('cast-sec-subtitle');
        if (sub) sub.innerText = t.subtitle;

        const cBoxT = document.getElementById('cast-box-title');
        if (cBoxT) cBoxT.innerText = t.castBoxTitle;

        const sBoxT = document.getElementById('stream-box-title');
        if (sBoxT) sBoxT.innerText = t.streamBoxTitle;

        const sBoxD = document.getElementById('stream-box-desc');
        if (sBoxD) sBoxD.innerText = t.streamBoxDesc;

        Object.keys(castData).forEach(slug => {
            const char = castData[slug];
            const roleEl = document.getElementById(`cast-role-${slug}`);
            const nameEl = document.getElementById(`cast-name-${slug}`);

            if (roleEl) {
                roleEl.innerText = lang === 'ja' ? char.kanji : char.romaji;
            }
            if (nameEl) {
                nameEl.innerText = (char.cv && char.cv[lang]) || char.cv['ja'];
            }
        });
    }

    window.addEventListener('languageChanged', (e) => {
        updateOnairLanguage(e.detail.lang);
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateOnairLanguage(currentLang);
    });
</script>
@endpush
