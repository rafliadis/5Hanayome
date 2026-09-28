<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Menampilkan Halaman Lagu Tema & Musik (Music).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tracks = [
            'op1' => [
                'id'          => 'op1',
                'number'      => '01',
                'title'       => '五等分の気持ち',
                'romaji'      => 'Gotoubun no Kimochi',
                'artist'      => '中野家の五つ子 (花澤香菜、竹達彩奈、伊藤美来、佐倉綾音、水瀬いのり)',
                'badge'       => 'Season 1 OP',
                'category'    => 'op',
                'duration'    => '03:45',
                'color'       => 'bg-[#ff007a]',
                'theme_hex'   => '#ff007a',
                'badge_color' => 'bg-pink-500/20 text-pink-300 border-pink-500/30',
                'audio_url'   => 'audio/gotoubun-no-kimochi.mp3',
                'cover_image' => 'images/cover-op1.jpg',
            ],
            'op2' => [
                'id'          => 'op2',
                'number'      => '02',
                'title'       => '五等分のカタチ',
                'romaji'      => 'Gotoubun no Katachi',
                'artist'      => '中野家の五つ子 (Nakano-ke no Itsutsugo)',
                'badge'       => 'Season 2 OP',
                'category'    => 'op',
                'duration'    => '03:52',
                'color'       => 'bg-purple-600',
                'theme_hex'   => '#a855f7',
                'badge_color' => 'bg-purple-500/20 text-purple-300 border-purple-500/30',
                'audio_url'   => 'audio/gotoubun-no-katachi.mp3',
                'cover_image' => 'images/cover-op2.jpg',
            ],
            'movie' => [
                'id'          => 'movie',
                'number'      => '03',
                'title'       => '五等分の軌跡',
                'romaji'      => 'Gotoubun no Kiseki',
                'artist'      => '中野家の五つ子 (Nakano-ke no Itsutsugo)',
                'badge'       => 'Movie Theme',
                'category'    => 'movie',
                'duration'    => '04:18',
                'color'       => 'bg-sky-600',
                'theme_hex'   => '#0284c7',
                'badge_color' => 'bg-sky-500/20 text-sky-300 border-sky-500/30',
                'audio_url'   => 'audio/nakanoke-no-itsutsugo.mp3',
                'cover_image' => 'images/cover-movie.jpg',
            ],
            'ed1' => [
                'id'          => 'ed1',
                'number'      => '04',
                'title'       => 'Sign',
                'romaji'      => 'Sign',
                'artist'      => '内田 彩 (Aya Uchida)',
                'badge'       => 'Season 1 ED',
                'category'    => 'ed',
                'duration'    => '04:10',
                'color'       => 'bg-emerald-600',
                'theme_hex'   => '#22c55e',
                'badge_color' => 'bg-emerald-500/20 text-emerald-300 border-emerald-500/30',
                'audio_url'   => 'audio/sign.mp3',
                'cover_image' => 'images/sign.jpg',
            ],
            'ed2' => [
                'id'          => 'ed2',
                'number'      => '05',
                'title'       => 'はつこい',
                'romaji'      => 'Hatsukoi',
                'artist'      => '中野家の五つ子 (Nakano-ke no Itsutsugo)',
                'badge'       => 'Season 2 ED',
                'category'    => 'ed',
                'duration'    => '04:02',
                'color'       => 'bg-rose-600',
                'theme_hex'   => '#ef4444',
                'badge_color' => 'bg-rose-500/20 text-rose-300 border-rose-500/30',
                'audio_url'   => 'audio/hatsukoi.mp3',
                'cover_image' => 'images/hatsukoi.jpg',
            ],
            'ova_op' => [
                'id'          => 'ova_op',
                'number'      => '06',
                'title'       => '五等分の未来',
                'romaji'      => 'Gotoubun no Mirai',
                'artist'      => '中野家の五つ子 (花澤香菜、竹達彩奈、伊藤美来、佐倉綾音、水瀬いのり)',
                'badge'       => 'OVA/Special OP',
                'category'    => 'special',
                'duration'    => '03:55',
                'color'       => 'bg-cyan-600',
                'theme_hex'   => '#06b6d4',
                'badge_color' => 'bg-cyan-500/20 text-cyan-300 border-cyan-500/30',
                'audio_url'   => 'audio/gotoubun-no-mirai.mp3',
                'cover_image' => 'images/gotoubun no mirai.jpg',
            ],
            'ova_ed' => [
                'id'          => 'ova_ed',
                'number'      => '07',
                'title'       => 'たからもの',
                'romaji'      => 'Takaramono',
                'artist'      => '中野家の五つ子 (Nakano-ke no Itsutsugo)',
                'badge'       => 'OVA/Special ED',
                'category'    => 'special',
                'duration'    => '04:20',
                'color'       => 'bg-amber-600',
                'theme_hex'   => '#f59e0b',
                'badge_color' => 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                'audio_url'   => 'audio/takaramono.mp3',
                'cover_image' => 'images/takaramono.jpg',
            ],
            'special' => [
                'id'          => 'special',
                'number'      => '08',
                'title'       => '五等分の笑顔',
                'romaji'      => 'Gotoubun no Egao',
                'artist'      => '中野家の五つ子 (Nakano-ke no Itsutsugo)',
                'badge'       => 'Movie / Special',
                'category'    => 'special',
                'duration'    => '04:14',
                'color'       => 'bg-teal-600',
                'theme_hex'   => '#14b8a6',
                'badge_color' => 'bg-teal-500/20 text-teal-300 border-teal-500/30',
                'audio_url'   => 'audio/gotoubun-no-egao.mp3',
                'cover_image' => 'images/gotoubun no egao.jpg',
            ],
        ];

        return view('music.index', compact('tracks'));
    }
}
