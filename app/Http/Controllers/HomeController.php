<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan Halaman Beranda Bergaya Situs Resmi TBS (Long Scrollable Page).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Spotlight data kembar lima & Fuutarou
        $spotlightCharacters = [
            'all' => [
                'slug'     => 'all',
                'title'    => '五等分の花嫁',
                'subtitle' => 'THE QUINTESSENTIAL QUINTUPLETS',
                'slogan'   => '🌸 かわいさ500%の五人五色ラブコメディ！',
                'desc'     => '貧乏な高校２年生・上杉風太郎のもとに、好条件の家庭教師アルバイトの話が舞い込む。教え子はなんと同級生の五つ子だった！？',
                'theme'    => '#ff007a',
                'cv'       => null,
            ],
            'ichika-nakano' => [
                'slug'     => 'ichika-nakano',
                'title'    => '中野 一花',
                'subtitle' => 'ICHIKA NAKANO • 1ST SISTER',
                'slogan'   => '💛 お姉さん × 駆け出し女優',
                'desc'     => '「お姉さんだからね。みんなの面倒はちゃんと見るよ」面倒見が良いが家ではズボラ。密かに女優を目指す長女。',
                'theme'    => '#f59e0b',
                'cv'       => 'CV: 花澤香菜 (Kana Hanazawa)',
            ],
            'nino-nakano' => [
                'slug'     => 'nino-nakano',
                'title'    => '中野 二乃',
                'subtitle' => 'NINO NAKANO • 2ND SISTER',
                'slogan'   => '💜 ツンデレ × 料理上手',
                'desc'     => '「あんたのことなんか全然認めてないんだからね！」家族思いで料理が得意。恋に落ちると情熱的な次女。',
                'theme'    => '#a855f7',
                'cv'       => 'CV: 竹達彩奈 (Ayana Taketatsu)',
            ],
            'miku-nakano' => [
                'slug'     => 'miku-nakano',
                'title'    => '中野 三玖',
                'subtitle' => 'MIKU NAKANO • 3RD SISTER',
                'slogan'   => '💙 クール × 戦国武将好き',
                'desc'     => '「責任取ってよね。私を好きにさせた責任」物静かだが熱い情熱を秘める。戦国武将好きの歴女な三女。',
                'theme'    => '#0284c7',
                'cv'       => 'CV: 伊藤美来 (Miku Itou)',
            ],
            'yotsuba-nakano' => [
                'slug'     => 'yotsuba-nakano',
                'title'    => '中野 四葉',
                'subtitle' => 'YOTSUBA NAKANO • 4TH SISTER',
                'slogan'   => '💚 天真爛漫 × スポーツ万能',
                'desc'     => '「上杉さん！私にできることなら何でも言ってください！」いつも明るく元気いっぱい。風太郎の最初の味方。',
                'theme'    => '#22c55e',
                'cv'       => 'CV: 佐倉綾音 (Ayane Sakura)',
            ],
            'itsuki-nakano' => [
                'slug'     => 'itsuki-nakano',
                'title'    => '中野 五月',
                'subtitle' => 'ITSUKI NAKANO • 5TH SISTER',
                'slogan'   => '❤️ 生真面目 × 食いしん坊',
                'desc'     => '「私だって…誰よりも頑張って母のような先生になりたいんです」生真面目な努力家。亡き母の教えを胸に教師を目指す五女。',
                'theme'    => '#ef4444',
                'cv'       => 'CV: 水瀬いのり (Inori Minase)',
            ],
        ];

        // Data dummy daftar Update/Berita terbaru bergaya portal TBS
        $updates = [
            [
                'id'       => 1,
                'date'     => '2026.09.20',
                'category' => 'EVENT',
                'badge_color' => 'bg-purple-600',
                'title'    => 'TVアニメ「五等分の花嫁＊」スペシャルイベント開催決定！メインキャスト6名登壇予定',
                'title_en' => 'TV Anime "The Quintessential Quintuplets*" Special Event Announced with 6 Main Cast Members!',
                'title_id' => 'Acara Spesial TV Anime 「5-toubun no Hanayome＊」 Resmi Diumumkan Bersama 6 Seiyuu Utama!',
                'url'      => route('news'),
            ],
            [
                'id'       => 2,
                'date'     => '2026.09.15',
                'category' => 'GOODS',
                'badge_color' => 'bg-pink-600',
                'title'    => '公式描き下ろしアクリルスタンド＆メモリアルタペストリーの受注受付を開始しました',
                'title_en' => 'Official Exclusive Acrylic Stand & Memorial Tapestry Pre-Orders Are Now Open',
                'title_id' => 'Pre-order Stand Akrilik Eksklusif & Tapestry Memorial Resmi Telah Dibuka',
                'url'      => route('goods'),
            ],
            [
                'id'       => 3,
                'date'     => '2026.09.05',
                'category' => 'BD & DVD',
                'badge_color' => 'bg-amber-600',
                'title'    => '映画「五等分の花嫁」SPECIAL Blu-ray & DVD 特装版の収録特典＆ジャケット写真を公開',
                'title_en' => 'Movie "The Quintessential Quintuplets" SPECIAL Blu-ray & DVD Deluxe Edition Details Revealed',
                'title_id' => 'Detail Bonus & Jaket Visual Blu-ray & DVD Edisi Spesial Film Resmi Dirilis',
                'url'      => route('news'),
            ],
            [
                'id'       => 4,
                'date'     => '2026.08.28',
                'category' => 'ON AIR',
                'badge_color' => 'bg-emerald-600',
                'title'    => 'TBS・BS11および各種配信プラットフォームにて第1期＆第2期の一挙配信がスタート！',
                'title_en' => 'Season 1 & Season 2 Full Marathon Streaming Starts on TBS, BS11 and Major Platforms!',
                'title_id' => 'Penayangan Maraton Season 1 & Season 2 Resmi Dimulai di TBS, BS11 & Layanan Streaming!',
                'url'      => route('onair'),
            ],
        ];

        return view('welcome', compact('spotlightCharacters', 'updates'));
    }
}
