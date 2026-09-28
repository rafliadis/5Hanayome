<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnAirController extends Controller
{
    /**
     * Menampilkan Halaman Jadwal Tayang & Layanan Streaming (On Air).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tvBroadcasts = [
            [
                'station'     => 'TBSテレビ (TBS Tokyo)',
                'description' => 'Saluran Utama Penayangan Perdana Terestrial (Wilayah Kanto)',
                'time_jst'    => '毎週木曜 25:28〜 JST',
                'time_wib'    => 'Kamis 23:28 WIB',
                'badge'       => 'Terestrial Kanto',
            ],
            [
                'station'     => 'サンテレビ (Sun TV)',
                'description' => 'Saluran Terestrial Regional Kawasan Kansai & Hyogo',
                'time_jst'    => '毎週金曜 24:00〜 JST',
                'time_wib'    => 'Jumat 22:00 WIB',
                'badge'       => 'Terestrial Kansai',
            ],
            [
                'station'     => 'BS11 (Nippon BS)',
                'description' => 'Siaran Televisi Satelit Nasional Seluruh Wilayah Jepang (Gratis)',
                'time_jst'    => '毎週日曜 23:30〜 JST',
                'time_wib'    => 'Minggu 21:30 WIB',
                'badge'       => 'BS Satelit',
            ],
        ];

        $streamingPlatforms = [
            ['name' => 'dアニメストア', 'badge' => 'Tercepat S1~S2', 'color' => 'text-pink-400'],
            ['name' => 'U-NEXT', 'badge' => 'Full HD / Movie', 'color' => 'text-emerald-400'],
            ['name' => 'ABEMA', 'badge' => 'Simulcast Live', 'color' => 'text-sky-400'],
            ['name' => 'Prime Video', 'badge' => 'Global VOD', 'color' => 'text-amber-400'],
            ['name' => 'Netflix', 'badge' => 'All Seasons', 'color' => 'text-red-400'],
            ['name' => 'Bilibili', 'badge' => 'Sub Indo / Eng', 'color' => 'text-indigo-400'],
        ];

        return view('on-air.index', compact('tvBroadcasts', 'streamingPlatforms'));
    }
}
