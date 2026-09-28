<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * Menampilkan Halaman Merchandise & Barang Koleksi Resmi (Goods).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $goodsCategories = [
            'all'    => 'All Items',
            'figure' => 'Scale Figure',
            'bddvd'  => 'Blu-ray & DVD',
            'diorama'=> 'Acrylic Stand',
            'book'   => 'Book & Artbook',
        ];

        $goodsList = [
            [
                'id'       => 1,
                'name'     => '映画「五等分の花嫁」SPECIAL Blu-ray BOX',
                'name_en'  => 'The Quintessential Quintuplets Movie Special Blu-ray Box',
                'category' => 'bddvd',
                'shop'     => 'TBS e-shop',
                'price'    => '¥10,780',
                'tag_color'=> 'bg-pink-500/20 text-pink-300 border-pink-500/30',
                'desc'     => 'Edisi terbatas dengan box visual kembar lima, buklet eksklusif 64 halaman, dan bonus strip film asli.',
                'image'    => 'images/goods/goods-1.jpg',
                'icon'     => 'disc',
            ],
            [
                'id'       => 2,
                'name'     => '中野一花 / 二乃 / 三玖 / 四葉 / 五月 1/7スケールフィギュア',
                'name_en'  => 'Nakano Sisters 1/7 Scale Complete Figure Series',
                'category' => 'figure',
                'shop'     => 'Good Smile Company',
                'price'    => '¥19,800',
                'tag_color'=> 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                'desc'     => 'Figur premium dengan detail busana pengantin dan ekspresi wajah yang sangat hidup sesuai desain anime.',
                'image'    => 'images/goods/goods-2.jpg',
                'icon'     => 'figure',
            ],
            [
                'id'       => 3,
                'name'     => '渋谷MODI コラボ アクリルスタンドジオラマ (全6種)',
                'name_en'  => 'Shibuya MODI Limited Acrylic Stand Diorama Set',
                'category' => 'diorama',
                'shop'     => 'Shibuya MODI Official',
                'price'    => '¥2,200',
                'tag_color'=> 'bg-purple-500/20 text-purple-300 border-purple-500/30',
                'desc'     => 'Stand akrilik ukuran 15cm dengan ilustrasi busana santai musim panas eksklusif pop-up store.',
                'image'    => 'images/goods/goods-3.jpg',
                'icon'     => 'diorama',
            ],
            [
                'id'       => 4,
                'name'     => 'TVアニメ「五等分の花嫁」公式設定資料集・原画集',
                'name_en'  => 'Official Animation Material & Key Artworks Book',
                'category' => 'book',
                'shop'     => '講談社 (Kodansha)',
                'price'    => '¥3,850',
                'tag_color'=> 'bg-emerald-500/20 text-emerald-300 border-emerald-500/30',
                'desc'     => 'Buku kompilasi 200+ halaman berisi desain karakter, sketsa storyboard, dan wawancara eksklusif tim sutradara.',
                'image'    => 'images/goods/goods-4.jpg',
                'icon'     => 'book',
            ],
            [
                'id'       => 5,
                'name'     => '中野家五つ子 等身大ビッグタペストリー (ウェディングver.)',
                'name_en'  => 'Life-Size Wedding Tapestry Collection',
                'category' => 'diorama',
                'shop'     => 'TBS Store',
                'price'    => '¥8,800',
                'tag_color'=> 'bg-sky-500/20 text-sky-300 border-sky-500/30',
                'desc'     => 'Tapestry ukuran nyata 1:1 bahan double-suede dengan ketajaman warna maksimal untuk kolektor.',
                'image'    => 'images/goods/goods-5.jpg',
                'icon'     => 'diorama',
            ],
            [
                'id'       => 6,
                'name'     => 'オリジナルサウンドトラック＆キャラソン 完全限定盤CD',
                'name_en'  => 'Original Soundtrack & Character Song Best Box (3CD)',
                'category' => 'bddvd',
                'shop'     => 'Pony Canyon',
                'price'    => '¥4,950',
                'tag_color'=> 'bg-rose-500/20 text-rose-300 border-rose-500/30',
                'desc'     => 'Koleksi 3 disc berisi seluruh background music (BGM) dan lagu tema anime musim 1, 2, serta film.',
                'image'    => 'images/goods/goods-6.jpg',
                'icon'     => 'disc',
            ],
        ];

        return view('goods.index', compact('goodsCategories', 'goodsList'));
    }
}
