<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffCastController extends Controller
{
    /**
     * Menampilkan Halaman Staf & Pemeran Suara (Staff & Cast).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $castList = [
            [
                'character' => '上杉 風太郎',
                'character_en' => 'Fuutarou Uesugi',
                'kanji'     => '風',
                'actor'     => '松岡 禎丞 (Yoshitsugu Matsuoka)',
                'color'     => '#4f46e5',
                'bg_color'  => 'bg-indigo-600',
                'border'    => 'border-indigo-500/30',
                'text_color'=> 'text-indigo-300',
            ],
            [
                'character' => '中野 一花',
                'character_en' => 'Ichika Nakano',
                'kanji'     => '一',
                'actor'     => '花澤 香菜 (Kana Hanazawa)',
                'color'     => '#f59e0b',
                'bg_color'  => 'bg-amber-500',
                'border'    => 'border-amber-500/30',
                'text_color'=> 'text-amber-300',
            ],
            [
                'character' => '中野 二乃',
                'character_en' => 'Nino Nakano',
                'kanji'     => '二',
                'actor'     => '竹達 彩奈 (Ayana Taketatsu)',
                'color'     => '#a855f7',
                'bg_color'  => 'bg-purple-600',
                'border'    => 'border-purple-500/30',
                'text_color'=> 'text-purple-300',
            ],
            [
                'character' => '中野 三玖',
                'character_en' => 'Miku Nakano',
                'kanji'     => '三',
                'actor'     => '伊藤 美来 (Miku Itou)',
                'color'     => '#0284c7',
                'bg_color'  => 'bg-sky-600',
                'border'    => 'border-sky-500/30',
                'text_color'=> 'text-sky-300',
            ],
            [
                'character' => '中野 四葉',
                'character_en' => 'Yotsuba Nakano',
                'kanji'     => '四',
                'actor'     => '佐倉 綾音 (Ayane Sakura)',
                'color'     => '#22c55e',
                'bg_color'  => 'bg-emerald-600',
                'border'    => 'border-emerald-500/30',
                'text_color'=> 'text-emerald-300',
            ],
            [
                'character' => '中野 五月',
                'character_en' => 'Itsuki Nakano',
                'kanji'     => '五',
                'actor'     => '水瀬 いのり (Inori Minase)',
                'color'     => '#ef4444',
                'bg_color'  => 'bg-rose-600',
                'border'    => 'border-rose-500/30',
                'text_color'=> 'text-rose-300',
            ],
        ];

        $staffList = [
            ['role' => '原作 (Original Author)', 'name' => '春場ねぎ（講談社「週刊少年マガジン」連載）', 'role_id' => 'Karya Asli'],
            ['role' => '監督 (Director)', 'name' => '桑原 智（第1期） / かおり（第2期） / 神保 昌登（映画）', 'role_id' => 'Sutradara'],
            ['role' => 'シリーズ構成 (Series Composition)', 'name' => '大知 慶一郎', 'role_id' => 'Komposisi Seri'],
            ['role' => 'キャラクターデザイン (Character Design)', 'name' => '中村 路之将 / 勝又 聖人', 'role_id' => 'Desain Karakter'],
            ['role' => '音楽 (Music)', 'name' => '田渕 夏海 / 中村 巴奈重 / 櫻井 美希', 'role_id' => 'Musik & Tata Suara'],
            ['role' => 'アニメーション制作 (Animation Studio)', 'name' => '手塚プロダクション / バイブリーアニメーションスタジオ / シャフト', 'role_id' => 'Studio Animasi'],
            ['role' => '製作 (Production)', 'name' => '「五等分の花嫁」製作委員会・TBSテレビ', 'role_id' => 'Komite Produksi'],
        ];

        return view('staff-cast.index', compact('castList', 'staffList'));
    }
}
