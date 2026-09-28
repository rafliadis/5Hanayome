@extends('layouts.app')

@section('title', '最新ニュース ＆ 公式X | TVアニメ「五等分の花嫁」公式ホームページ')
@section('meta_description', 'アニメ「五等分の花嫁」の最新ニュース、イベント情報、グッズ販売、公式X（Twitter）の最新ポスト。')

@section('content')
<!-- NEWS & TWITTER SECTION -->
<section class="py-10 px-4 md:px-8 bg-slate-50 flex-grow">
    <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left: Latest News List -->
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between border-b-2 border-pink-500 pb-2">
                <h2 class="text-xl font-extrabold text-slate-800 flex items-center gap-2">
                    <i data-lucide="newspaper" class="w-5 h-5 text-pink-500"></i>
                    <span id="news-sec-title">最新ニュース (NEWS)</span>
                </h2>
                <span class="text-xs font-bold text-pink-600 bg-pink-100 px-3 py-1 rounded-full" id="news-status-badge">公式発表</span>
            </div>

            <!-- News Items -->
            <div class="space-y-4">
                <article class="bg-white p-4 rounded-2xl border border-slate-200 hover:border-pink-300 shadow-sm transition hover:shadow-md flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                    <div class="bg-pink-100 text-pink-700 p-3 rounded-xl flex-shrink-0 text-center font-bold w-16">
                        <span class="block text-xs">2026</span>
                        <span class="block text-sm font-black">09/18</span>
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <span class="bg-pink-500 text-white text-[10px] px-2.5 py-0.5 rounded-full font-bold">BD & DVD</span>
                        <h3 class="text-xs md:text-sm font-extrabold text-slate-800 hover:text-pink-600 cursor-pointer" id="news-1-title">
                            映画「五等分の花嫁」SPECIAL Blu-ray & DVD 発売記念イベント開催決定！
                        </h3>
                        <p class="text-[11px] text-slate-500 leading-relaxed" id="news-1-desc">
                            松岡禎丞、花澤香菜、竹達彩奈、伊藤美来、佐倉綾音、水瀬いのり登壇！
                        </p>
                    </div>
                </article>

                <article class="bg-white p-4 rounded-2xl border border-slate-200 hover:border-pink-300 shadow-sm transition hover:shadow-md flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                    <div class="bg-purple-100 text-purple-700 p-3 rounded-xl flex-shrink-0 text-center font-bold w-16">
                        <span class="block text-xs">2026</span>
                        <span class="block text-sm font-black">08/28</span>
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <span class="bg-purple-600 text-white text-[10px] px-2.5 py-0.5 rounded-full font-bold">EVENT</span>
                        <h3 class="text-xs md:text-sm font-extrabold text-slate-800 hover:text-purple-600 cursor-pointer" id="news-2-title">
                            五等分の花嫁 POP UP STORE in 渋谷MODI コラボグッズ受注受付開始！
                        </h3>
                        <p class="text-[11px] text-slate-500 leading-relaxed" id="news-2-desc">
                            描き下ろしイラストを使用した限定アクリルスタンド等が登場。
                        </p>
                    </div>
                </article>

                <article class="bg-white p-4 rounded-2xl border border-slate-200 hover:border-pink-300 shadow-sm transition hover:shadow-md flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                    <div class="bg-amber-100 text-amber-700 p-3 rounded-xl flex-shrink-0 text-center font-bold w-16">
                        <span class="block text-xs">2026</span>
                        <span class="block text-sm font-black">07/15</span>
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <span class="bg-amber-500 text-white text-[10px] px-2.5 py-0.5 rounded-full font-bold">MUSIC</span>
                        <h3 class="text-xs md:text-sm font-extrabold text-slate-800 hover:text-amber-600 cursor-pointer" id="news-3-title">
                            中野家の五つ子キャラクターソング・ベストアルバム全世界配信開始！
                        </h3>
                        <p class="text-[11px] text-slate-500 leading-relaxed" id="news-3-desc">
                            歴代主題歌「五等分の気持ち」や各キャラクターソロ楽曲を収録。
                        </p>
                    </div>
                </article>
            </div>
        </div>

        <!-- Right: Twitter / Social Feed -->
        <div id="twitter" class="space-y-4">
            <div class="flex items-center justify-between border-b-2 border-sky-400 pb-2">
                <h2 class="text-xl font-extrabold text-slate-800 flex items-center gap-2">
                    <i data-lucide="twitter" class="w-5 h-5 text-sky-500"></i>
                    <span id="twitter-sec-title">公式 X (Twitter)</span>
                </h2>
                <span class="text-xs font-bold text-sky-600">@tbs_hanayome</span>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-3.5 space-y-3 shadow-inner">
                <div class="flex items-center justify-between bg-slate-50 p-2.5 rounded-xl border border-slate-200 text-xs">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-pink-500 text-white font-black text-xs flex items-center justify-center">5</div>
                        <div>
                            <div class="font-extrabold text-slate-800" id="tw-account-name">五等分の花嫁【公式】</div>
                            <div class="text-[10px] text-slate-400">@tbs_hanayome</div>
                        </div>
                    </div>
                    <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="bg-slate-900 hover:bg-slate-800 text-white text-[10px] px-3 py-1 rounded-full font-bold transition" id="tw-follow-btn">フォロー</a>
                </div>

                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-xs space-y-2">
                    <div class="flex justify-between text-[10px] text-slate-400">
                        <span class="font-bold text-slate-600" id="tw-tweet-author">五等分の花嫁 公式</span>
                        <span id="tw-tweet-time">2時間前</span>
                    </div>
                    <p class="text-slate-700 leading-relaxed" id="tw-tweet-body">
                        🌸【グッズ情報】🌸<br>
                        上杉風太郎＆中野家５つ子の描き下ろし記念ビジュアルタペストリーの予約受付中！
                    </p>
                    <div class="bg-pink-100/70 text-pink-700 p-2 rounded-lg text-center font-bold text-[10px]">
                        #五等分の花嫁 #上杉風太郎 #中野一花 #中野二乃 #中野三玖 #中野四葉 #中野五月
                    </div>
                </div>

                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-xs space-y-2">
                    <div class="flex justify-between text-[10px] text-slate-400">
                        <span class="font-bold text-slate-600" id="tw-tweet-author-2">五等分の花嫁 公式</span>
                        <span id="tw-tweet-time-2">1日前</span>
                    </div>
                    <p class="text-slate-700 leading-relaxed" id="tw-tweet-body-2">
                        🎉【イベント告知】🎉<br>
                        TBS公式ショップにて五姉妹の限定描き下ろしアクリルジオラマが新登場！お見逃しなく✨
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    const newsTranslations = {
        ja: {
            newsSecTitle: "最新ニュース (NEWS)",
            newsStatusBadge: "公式発表",
            news1Title: "映画「五等分の花嫁」SPECIAL Blu-ray & DVD 発売記念イベント開催決定！",
            news1Desc: "松岡禎丞、花澤香菜、竹達彩奈、伊藤美来、佐倉綾音、水瀬いのり登壇！",
            news2Title: "五等分の花嫁 POP UP STORE in 渋谷MODI コラボグッズ受注受付開始！",
            news2Desc: "描き下ろしイラストを使用した限定アクリルスタンド等が登場。",
            news3Title: "中野家の五つ子キャラクターソング・ベストアルバム全世界配信開始！",
            news3Desc: "歴代主題歌「五等分の気持ち」や各キャラクターソロ楽曲を収録。",
            twitterSecTitle: "公式 X (Twitter)",
            twAccountName: "五等分の花嫁【公式】",
            twFollowBtn: "フォロー",
            twTweetAuthor: "五等分の花嫁 公式",
            twTweetTime: "2時間前",
            twTweetBody: "🌸【グッズ情報】🌸<br>上杉風太郎＆中野家５つ子の描き下ろし記念ビジュアルタペストリーの予約受付中！",
            twTweetAuthor2: "五等分の花嫁 公式",
            twTweetTime2: "1日前",
            twTweetBody2: "🎉【イベント告知】🎉<br>TBS公式ショップにて五姉妹の限定描き下ろしアクリルジオラマが新登場！お見逃しなく✨"
        },
        id: {
            newsSecTitle: "Berita Terbaru (NEWS)",
            newsStatusBadge: "Pengumuman Resmi",
            news1Title: "Acara Perilisan Spesial Blu-ray & DVD Film 'The Quintessential Quintuplets' Resmi Digelar!",
            news1Desc: "Dihadiri langsung oleh para seiyuu ternama (Yoshitsugu Matsuoka, Kana Hanazawa, Ayana Taketatsu, Miku Ito, Ayane Sakura, Inori Minase)!",
            news2Title: "Pembukaan Pre-Order Merchandise Kolaborasi POP UP STORE Shibuya MODI!",
            news2Desc: "Merchandise eksklusif stand akrilik dengan ilustrasi pakaian santai terbaru.",
            news3Title: "Album Lagu Terbaik Kembar Nakano Resmi Dirilis di Seluruh Dunia!",
            news3Desc: "Menghadirkan lagu tema 'Gotoubun no Kimochi' dan lagu solo dari masing-masing saudari kembar.",
            twitterSecTitle: "Akun Resmi X (Twitter)",
            twAccountName: "The Quintessential Quintuplets [Official]",
            twFollowBtn: "Ikuti",
            twTweetAuthor: "Akun Resmi 5-Hanayome",
            twTweetTime: "2 jam yang lalu",
            twTweetBody: "🌸【Info Merchandise】🌸<br>Pre-order tapestry visual ilustrasi eksklusif Fuutarou & 5 kembar Nakano kini sudah dibuka!",
            twTweetAuthor2: "Akun Resmi 5-Hanayome",
            twTweetTime2: "1 hari yang lalu",
            twTweetBody2: "🎉【Info Event】🎉<br>Diorama akrilik eksklusif 5 kembar kini tersedia di TBS Official Shop! Jangan sampai kehabisan✨"
        },
        en: {
            newsSecTitle: "Latest News (NEWS)",
            newsStatusBadge: "Official Release",
            news1Title: "Movie 'The Quintessential Quintuplets' SPECIAL Blu-ray & DVD Release Event Announced!",
            news1Desc: "Featuring Yoshitsugu Matsuoka, Kana Hanazawa, Ayana Taketatsu, Miku Ito, Ayane Sakura, Inori Minase on stage!",
            news2Title: "POP UP STORE in Shibuya MODI Collaboration Goods Pre-Orders Now Live!",
            news2Desc: "Exclusive acrylic stands and tapestries featuring brand-new illustrations now available.",
            news3Title: "The Quintuplets Best Character Song Album Now Streaming Worldwide!",
            news3Desc: "Featuring the hit theme song 'Gotoubun no Kimochi' and all solo tracks.",
            twitterSecTitle: "Official X (Twitter)",
            twAccountName: "The Quintessential Quintuplets [Official]",
            twFollowBtn: "Follow",
            twTweetAuthor: "Official 5-Hanayome",
            twTweetTime: "2 hours ago",
            twTweetBody: "🌸【Merchandise Info】🌸<br>Pre-orders for the exclusive celebratory tapestries of Fuutarou and the 5 sisters are now open!",
            twTweetAuthor2: "Official 5-Hanayome",
            twTweetTime2: "1 day ago",
            twTweetBody2: "🎉【Event Info】🎉<br>Exclusive brand-new 5-sisters acrylic dioramas are now available at the TBS Official Shop! Don't miss out✨"
        }
    };

    function updateNewsLanguage(lang) {
        const t = newsTranslations[lang] || newsTranslations['ja'];
        const title = document.getElementById('news-sec-title');
        if (title) title.innerText = t.newsSecTitle;

        const badge = document.getElementById('news-status-badge');
        if (badge) badge.innerText = t.newsStatusBadge;

        const n1T = document.getElementById('news-1-title');
        if (n1T) n1T.innerText = t.news1Title;
        const n1D = document.getElementById('news-1-desc');
        if (n1D) n1D.innerText = t.news1Desc;

        const n2T = document.getElementById('news-2-title');
        if (n2T) n2T.innerText = t.news2Title;
        const n2D = document.getElementById('news-2-desc');
        if (n2D) n2D.innerText = t.news2Desc;

        const n3T = document.getElementById('news-3-title');
        if (n3T) n3T.innerText = t.news3Title;
        const n3D = document.getElementById('news-3-desc');
        if (n3D) n3D.innerText = t.news3Desc;

        const twT = document.getElementById('twitter-sec-title');
        if (twT) twT.innerText = t.twitterSecTitle;
        const twAcc = document.getElementById('tw-account-name');
        if (twAcc) twAcc.innerText = t.twAccountName;
        const twBtn = document.getElementById('tw-follow-btn');
        if (twBtn) twBtn.innerText = t.twFollowBtn;

        const twAut = document.getElementById('tw-tweet-author');
        if (twAut) twAut.innerText = t.twTweetAuthor;
        const twTime = document.getElementById('tw-tweet-time');
        if (twTime) twTime.innerText = t.twTweetTime;
        const twBody = document.getElementById('tw-tweet-body');
        if (twBody) twBody.innerHTML = t.twTweetBody;

        const twAut2 = document.getElementById('tw-tweet-author-2');
        if (twAut2) twAut2.innerText = t.twTweetAuthor2;
        const twTime2 = document.getElementById('tw-tweet-time-2');
        if (twTime2) twTime2.innerText = t.twTweetTime2;
        const twBody2 = document.getElementById('tw-tweet-body-2');
        if (twBody2) twBody2.innerHTML = t.twTweetBody2;
    }

    window.addEventListener('languageChanged', (e) => {
        updateNewsLanguage(e.detail.lang);
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateNewsLanguage(currentLang);
    });
</script>
@endpush
