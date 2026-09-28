<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Menampilkan Halaman Berita & Pembaruan Resmi (News).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $newsList = [
            [
                'id'       => 'item1',
                'category' => 'bddvd',
                'category_label' => 'BD & DVD',
                'category_color' => 'bg-[#ff007a]',
                'date'     => '2026.09.20',
                'year'     => '2026',
                'day'      => '09/20',
                'tag'      => 'TBS Animation Release',
                'title'    => '映画「五等分の花嫁」SPECIAL Blu-ray & DVD 発売記念イベント開催決定！',
                'desc'     => '松岡禎丞、花澤香菜、竹達彩奈、伊藤美来、佐倉綾音、水瀬いのり登壇予定！詳細な特典情報を公開。',
                'full_content' => '映画本編の感動を再び！豪華声優陣（松岡禎丞、花澤香菜、竹達彩奈、伊藤美来、佐倉綾音、水瀬いのり）が一堂に会するスペシャルステージが開催決定。特装版BDにはキャラクターデザイン描き下ろし三方背BOX、スペシャルブックレット、特典生フィルムが封入されます。',
            ],
            [
                'id'       => 'item2',
                'category' => 'event',
                'category_label' => 'EVENT',
                'category_color' => 'bg-purple-600',
                'date'     => '2026.08.15',
                'year'     => '2026',
                'day'      => '08/15',
                'tag'      => 'Shibuya MODI Official',
                'title'    => '五等分の花嫁 POP UP STORE in 渋谷MODI コラボグッズ受注受付開始！',
                'desc'     => '描き下ろしイラストを使用した限定アクリルスタンド・タペストリーが登場。',
                'full_content' => '渋谷MODIにて限定開催されるPOP UP STORE。中野家5姉妹の華やかな描き下ろしイラストを使用した等身大タペストリー、アクリルスタンド、缶バッジコレクションなどを展開。',
            ],
            [
                'id'       => 'item3',
                'category' => 'music',
                'category_label' => 'MUSIC',
                'category_color' => 'bg-amber-500',
                'date'     => '2026.07.07',
                'year'     => '2026',
                'day'      => '07/07',
                'tag'      => 'Global Digital Streaming',
                'title'    => '中野家の五つ子キャラクターソング・ベストアルバム全世界配信開始！',
                'desc'     => '歴代主題歌「五等分の気持ち」や各キャラクターソロ楽曲をハイレゾ音源で完全収録。',
                'full_content' => 'テレビアニメ第1期・第2期・劇場版の主題歌および、五姉妹それぞれのソロキャラクターソング全15曲を完全収録した記念ベスト盤。Spotify、Apple Music、LINE MUSICほか主要配信サイトにて配信中。',
            ],
            [
                'id'       => 'item4',
                'category' => 'goods',
                'category_label' => 'GOODS',
                'category_color' => 'bg-emerald-500',
                'date'     => '2026.06.01',
                'year'     => '2026',
                'day'      => '06/01',
                'tag'      => 'TBS e-shop Exclusive',
                'title'    => '公式オリジナル記念グッズ＆ウェディングタペストリー第3弾予約開始！',
                'desc'     => '花嫁姿の五つ子を描いたプレミアムタペストリーがTBSストア限定で予約受付中。',
                'full_content' => '春場ねぎ先生の原案をもとに新規描き下ろされた花嫁姿の記念タペストリー。B2サイズ＆ダブルスエード仕様で美麗な色彩を再現。',
            ],
        ];

        $twitterPosts = [
            [
                'author' => 'TVアニメ「五等分の花嫁」公式',
                'time'   => '2 jam lalu',
                'text'   => '🌸【グッズ情報】🌸 上杉風太郎＆中野家５つ子の描き下ろし記念タペストリー予約受付中！数量限定のためお見逃しなく！',
                'tag'    => '#五等分の花嫁 #中野家五つ子',
            ],
            [
                'author' => 'TBSテレビ アニメ部',
                'time'   => '1 hari lalu',
                'text'   => '🎬 映画「五等分の花嫁」Blu-ray 特装版パッケージデザインを初公開いたしました！詳細は公式サイトをご覧ください。',
                'tag'    => '#TBSアニメ #映画五等分の花嫁',
            ],
        ];

        return view('news.index', compact('newsList', 'twitterPosts'));
    }
}
