<!DOCTYPE html>
<html lang="id" class="min-h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TVアニメ「五等分の花嫁」公式ホームページ | TBSテレビ')</title>
    <meta name="description" content="@yield('meta_description', 'かわいさ500%の五人五色ラブコメディ！TVアニメ「五等分の花嫁」TBS公式ポータル。')">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Setup Tailwind CSS via CDN with Custom Design Tokens --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        hotpink: {
                            DEFAULT: '#ff007a',
                            hover: '#ff5c93',
                            light: '#ffe6f0',
                            dark: '#d80067'
                        },
                        ichika: {
                            DEFAULT: '#f59e0b',
                            light: '#fef3c7',
                            dark: '#b45309'
                        },
                        nino: {
                            DEFAULT: '#a855f7',
                            light: '#f3e8ff',
                            dark: '#7e22ce'
                        },
                        miku: {
                            DEFAULT: '#0284c7',
                            light: '#e0f2fe',
                            dark: '#0369a1'
                        },
                        yotsuba: {
                            DEFAULT: '#22c55e',
                            light: '#dcfce7',
                            dark: '#15803d'
                        },
                        itsuki: {
                            DEFAULT: '#ef4444',
                            light: '#fee2e2',
                            dark: '#b91c1c'
                        },
                        fuutarou: {
                            DEFAULT: '#4f46e5',
                            light: '#e0e7ff',
                            dark: '#3730a3'
                        }
                    },
                    fontFamily: {
                        sans: ['"M PLUS Rounded 1c"', '"Noto Sans JP"', '"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Cinzel"', '"Noto Serif JP"', 'serif'],
                    },
                    animation: {
                        'spin-slow': 'spin 12s linear infinite',
                        'pulse-glow': 'pulseGlow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'soundwave': 'soundwave 1.2s ease-in-out infinite alternate',
                        'bounce-slow': 'bounce 2s infinite',
                    },
                    keyframes: {
                        pulseGlow: {
                            '0%, 100%': { opacity: '1', transform: 'scale(1)' },
                            '50%': { opacity: '.75', transform: 'scale(1.03)' },
                        },
                        soundwave: {
                            '0%': { height: '4px' },
                            '100%': { height: '18px' },
                        }
                    }
                }
            }
        }
    </script>

    {{-- Typography Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=M+PLUS+Rounded+1c:wght@400;500;700;800;900&family=Noto+Sans+JP:wght@400;500;700;900&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS Variables & Global Utilities --}}
    <style>
        :root {
            --brand-pink: #ff007a;
            --theme-ichika: #f59e0b;
            --theme-nino: #a855f7;
            --theme-miku: #0284c7;
            --theme-yotsuba: #22c55e;
            --theme-itsuki: #ef4444;
            --theme-fuutarou: #4f46e5;
        }

        html, body {
            min-height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'M PLUS Rounded 1c', 'Noto Sans JP', 'Plus Jakarta Sans', sans-serif;
            -webkit-tap-highlight-color: transparent;
            scroll-behavior: smooth;
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        }

        /* Focus rings for accessibility */
        :focus-visible {
            outline: 2px solid #ff007a;
            outline-offset: 2px;
        }

        /* Firefox scrollbar */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #ff007a #090d16;
        }

        /* Chrome/Safari/Edge custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #090d16;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #ff007a, #ff5c93);
            border-radius: 9999px;
            border: 2px solid #090d16;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #ff5c93;
        }

        /* Reduced motion accessibility */
        @media (prefers-reduced-motion: reduce) {
            *, ::before, ::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-950 text-slate-800 antialiased min-h-screen w-full max-w-full overflow-x-hidden flex flex-col selection:bg-[#ff007a] selection:text-white">

    {{-- Accessibility Skip Link --}}
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-[99999] focus:bg-[#ff007a] focus:text-white focus:px-4 focus:py-2 focus:rounded-lg focus:font-bold">
        Skip to main content
    </a>

    {{-- 1. TBS Top Bar --}}
    <div class="flex-shrink-0 z-50 sticky top-0">
        @include('partials.topbar')
    </div>

    {{-- 2. Header Navigasi TBS & Switcher Bahasa (Melayang di Atas Hero) --}}
    <div class="flex-shrink-0 z-40">
        @include('partials.header')
    </div>

    {{-- 3. Area Konten Utama Halaman Panjang (Natural Scroll) --}}
    <!-- DIUBAH: Hapus overflow-hidden dan h-[calc(...)] agar halaman bisa di-scroll bebas -->
    <main id="main-content" class="w-full flex-1 relative flex flex-col bg-slate-950">
        @yield('content')
    </main>

    {{-- Kamus Navigasi & Bahasa Global --}}
    <script>
        window.appTranslations = {
            id: {
                nav: {
                    home: "Home",
                    news: "News",
                    character: "Character",
                    staff_cast: "Staff & Cast",
                    onair: "On Air",
                    music: "Music",
                    goods: "Goods"
                },
                topbar: {
                    portal: "Portal Resmi Anime TBS",
                    broadcast: "Tayang di TBS / BS11",
                    subtitle: "Portal Resmi TV Anime 「The Quintessential Quintuplets」",
                    badge: "Official Portal"
                },
                common: {
                    skip_to_content: "Loncat ke konten utama",
                    official_badge: "Official",
                    back: "Kembali",
                    close: "Tutup",
                    loading: "Memuat...",
                    copyright: "© Negi Haruba・Kodansha / Komite Produksi 「5-toubun no Hanayome」・TBS TV"
                },
                modal: {
                    promo_badge: "Proyek Anime Baru Dimulai!",
                    promo_title: "五等分の花嫁 (5-toubun no Hanayome)",
                    promo_sub: "【Empat Musim】 ＆ OVA Terbaru",
                    promo_status: "Resmi Diproduksi!",
                    promo_btn: "Simak Berita Terbaru"
                }
            },
            en: {
                nav: {
                    home: "Home",
                    news: "News",
                    character: "Character",
                    staff_cast: "Staff & Cast",
                    onair: "On Air",
                    music: "Music",
                    goods: "Goods"
                },
                topbar: {
                    portal: "TBS Anime Official Portal",
                    broadcast: "Broadcasting on TBS / BS11",
                    subtitle: "TV Anime 'The Quintessential Quintuplets' Official Portal",
                    badge: "Official Portal"
                },
                common: {
                    skip_to_content: "Skip to main content",
                    official_badge: "Official",
                    back: "Back",
                    close: "Close",
                    loading: "Loading...",
                    copyright: "© Negi Haruba, KODANSHA / The Quintessential Quintuplets Production Committee・TBS TV"
                },
                modal: {
                    promo_badge: "New Anime Project Launched!",
                    promo_title: "The Quintessential Quintuplets",
                    promo_sub: "【Four Seasons】 & Brand New OVA",
                    promo_status: "Production Confirmed!",
                    promo_btn: "Check Latest News"
                }
            },
            jp: {
                nav: {
                    home: "ホーム",
                    news: "最新情報",
                    character: "キャラクター",
                    staff_cast: "スタッフ＆キャスト",
                    onair: "放送情報",
                    music: "主題歌・音楽",
                    goods: "グッズ"
                },
                topbar: {
                    portal: "TBSテレビ アニメ公式ポータル",
                    broadcast: "TBS・BS11ほかにて放送中",
                    subtitle: "TVアニメ「五等分の花嫁」公式ポータル",
                    badge: "公式ポータル"
                },
                common: {
                    skip_to_content: "メインコンテンツへスキップ",
                    official_badge: "公式",
                    back: "戻る",
                    close: "閉じる",
                    loading: "読み込み中...",
                    copyright: "© 春場ねぎ・講談社／「五等分の花嫁」製作委員会・TBSテレビ"
                },
                modal: {
                    promo_badge: "新作アニメプロジェクト始動！",
                    promo_title: "五等分の花嫁",
                    promo_sub: "【春夏秋冬】 ＆ 新作OVA",
                    promo_status: "制作決定！",
                    promo_btn: "最新情報をチェック"
                }
            }
        };

        function getTranslationValue(dict, keyPath) {
            if (!dict || !keyPath) return null;
            return keyPath.split('.').reduce((obj, key) => (obj && obj[key] !== undefined) ? obj[key] : null, dict);
        }

        function setLanguage(lang) {
            const validLangs = ['id', 'en', 'jp'];
            if (!validLangs.includes(lang)) lang = 'id';

            window.currentLanguage = lang;
            const htmlTag = document.documentElement;
            htmlTag.setAttribute('lang', lang === 'jp' ? 'ja' : lang);

            const activeDict = Object.assign(
                {},
                window.appTranslations[lang] || {},
                (window.pageTranslations && window.pageTranslations[lang]) ? window.pageTranslations[lang] : {}
            );

            // Update text/html elements with data-i18n
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                const translated = getTranslationValue(activeDict, key);
                if (translated !== null && translated !== undefined) {
                    if (el.getAttribute('data-i18n-html') === 'true') {
                        el.innerHTML = translated;
                    } else {
                        el.textContent = translated;
                    }
                }
            });

            // Update placeholder attributes
            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                const translated = getTranslationValue(activeDict, key);
                if (translated !== null && translated !== undefined) {
                    el.setAttribute('placeholder', translated);
                }
            });

            // Update title attributes
            document.querySelectorAll('[data-i18n-title]').forEach(el => {
                const key = el.getAttribute('data-i18n-title');
                const translated = getTranslationValue(activeDict, key);
                if (translated !== null && translated !== undefined) {
                    el.setAttribute('title', translated);
                }
            });

            // Update button visual state
            ['id', 'en', 'jp'].forEach(l => {
                const deskBtn = document.getElementById(`lang-btn-${l}`);
                const mobBtn = document.getElementById(`mob-lang-btn-${l}`);

                const activeClass = "bg-[#ff007a] text-white shadow-md font-black scale-105";
                const inactiveClass = "text-white/80 hover:text-white hover:bg-white/20 font-bold";

                if (deskBtn) {
                    deskBtn.className = `lang-btn px-2.5 py-1 rounded-lg text-xs transition duration-200 ${l === lang ? activeClass : inactiveClass}`;
                }
                if (mobBtn) {
                    mobBtn.className = `mob-lang-btn px-2 py-0.5 rounded text-[11px] transition duration-200 ${l === lang ? activeClass : inactiveClass}`;
                }
            });

            if (typeof window.onLanguageChanged === 'function') {
                try {
                    window.onLanguageChanged(lang);
                } catch (e) {
                    console.error('onLanguageChanged handler error:', e);
                }
            }

            try {
                window.dispatchEvent(new CustomEvent('languageChanged', { detail: { lang } }));
            } catch (e) {
                // Ignore older browser issues
            }

            try {
                localStorage.setItem('5hanayome_lang', lang);
            } catch (e) {
                console.warn('localStorage access error:', e);
            }
        }

        window.setLanguage = setLanguage;

        document.addEventListener('DOMContentLoaded', () => {
            let savedLang = 'id';
            try {
                savedLang = localStorage.getItem('5hanayome_lang') || 'id';
            } catch (e) {
                savedLang = 'id';
            }
            setLanguage(savedLang);
        });
    </script>

    @stack('scripts')
</body>
</html>
