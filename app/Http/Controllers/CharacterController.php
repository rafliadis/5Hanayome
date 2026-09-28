<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Data Master 6 Karakter (The Quintessential Quintuplets).
     * Disimpan dalam bentuk array asosiatif lengkap dengan warna tema & terjemahan 3 bahasa (ID, EN, JP).
     *
     * @return array
     */
    public function getCharacters(): array
    {
        return [
            'ichika-nakano' => [
                'slug'          => 'ichika-nakano',
                'order'         => 1,
                'name'          => 'Ichika Nakano',
                'japanese_name' => '中野 一花',
                'cv'            => 'Kana Hanazawa (花澤香菜)',
                'cv_name'       => '花澤香菜 (Kana Hanazawa)',
                'role'          => [
                    'id' => 'Anak Pertama (Kakak Sulung)',
                    'en' => '1st Sister (Eldest)',
                    'jp' => '長女 (First Sister)',
                ],
                'subject'       => [
                    'id' => 'Matematika',
                    'en' => 'Mathematics',
                    'jp' => '数学',
                ],
                'tagline'       => [
                    'id' => 'Kakak Sulung × Aktris Berbakat',
                    'en' => 'Eldest Sister × Aspiring Actress',
                    'jp' => 'お姉さん × 女優',
                ],
                'quote'         => [
                    'id' => '「お姉さんに任せなさい！」 (Serahkan saja pada kakak tertua ini!)',
                    'en' => '「お姉さんに任せなさい！」 (Leave it to your big sister!)',
                    'jp' => '「お姉さんに任せなさい！」',
                ],
                'description'   => [
                    'id' => 'Anak tertua dari kembar lima Nakano. Memiliki kepribadian dewasa, ceria, dan suka menggoda, namun menyimpan rasa tanggung jawab besar sebagai kakak sulung. Diam-diam mengejar impian menjadi aktris profesional demi menopang saudari-saudarinya.',
                    'en' => 'The eldest daughter of the Nakano quintuplets. She has a mature, easygoing, and teasing personality, but shoulders great responsibility as the big sister. She secretly pursues a career as an actress to support her family.',
                    'jp' => '中野家の長女。面倒見の良いお姉さんタイプだが、家ではだらしない。密かに女優を目指して活動しており、姉妹のために努力を惜しまない。',
                ],
                'stats'         => [
                    'study'     => 68,
                    'cooking'   => 70,
                    'athletics' => 65,
                    'fashion'   => 92,
                    'sincerity' => 88,
                ],
                'photo'         => 'images/ichika.jpg',
                'theme_color'   => '#f59e0b', // Amber/Emas
                'accent_bg'     => '#fef3c7',
                'badge_color'   => 'bg-amber-500 text-white',
                'border_color'  => 'border-amber-400',
                'profile_i18n'  => [
                    'id' => [
                        'Tanggal Lahir'         => '5 Mei',
                        'Tinggi Badan'          => '159 cm',
                        'Golongan Darah'        => 'A',
                        'Mata Pelajaran Unggul' => 'Matematika',
                        'Hobi'                  => 'Tidur siang, Akting film',
                        'Makanan Favorit'       => 'Frappuccino',
                    ],
                    'en' => [
                        'Birthday'         => 'May 5',
                        'Height'           => '159 cm',
                        'Blood Type'       => 'A',
                        'Best Subject'     => 'Mathematics',
                        'Hobbies'          => 'Taking naps, Acting in films',
                        'Favorite Food'    => 'Frappuccino',
                    ],
                    'jp' => [
                        '生年月日'     => '5月5日',
                        '身長'         => '159 cm',
                        '血液型'       => 'A型',
                        '得意科目'     => '数学',
                        '趣味'         => 'お昼寝、映画鑑賞',
                        '好きな食べ物' => 'フラペチーノ',
                    ],
                ],
                'gallery'       => [
                    'images/ichika.jpg',
                    'images/ichika-1.jpg',
                    'images/ichika-2.jpg',
                    'images/ichika-3.jpg',
                    'images/ichika-4.jpg',
                    'images/ichika-5.jpg',
                ],
            ],

            'nino-nakano' => [
                'slug'          => 'nino-nakano',
                'order'         => 2,
                'name'          => 'Nino Nakano',
                'japanese_name' => '中野 二乃',
                'cv'            => 'Ayana Taketatsu (竹達彩奈)',
                'cv_name'       => '竹達彩奈 (Ayana Taketatsu)',
                'role'          => [
                    'id' => 'Anak Kedua (Kakak Kedua)',
                    'en' => '2nd Sister',
                    'jp' => '次女 (Second Sister)',
                ],
                'subject'       => [
                    'id' => 'Bahasa Inggris',
                    'en' => 'English',
                    'jp' => '英語',
                ],
                'tagline'       => [
                    'id' => 'Tsundere × Master Chef Masakan',
                    'en' => 'Tsundere × Master Chef',
                    'jp' => 'ツンデレ × 料理上手',
                ],
                'quote'         => [
                    'id' => '「後悔のないように、全力で好きになる！」 (Agar tidak menyesal, aku akan mencintai sepenuh hati!)',
                    'en' => '「後悔のないように、全力で好きになる！」 (To have no regrets, I will love with all my heart!)',
                    'jp' => '「後悔のないように、全力で好きになる！」',
                ],
                'description'   => [
                    'id' => 'Anak kedua dari kembar lima Nakano. Gadis modis dan berlidah tajam yang sangat protektif terhadap saudarinya. Sangat ahli memasak kue dan makanan lezat, serta berjiwa tsundere penuh pesona saat jatuh cinta.',
                    'en' => 'The second daughter of the Nakano quintuplets. A fashionable and sharp-tongued girl who is deeply protective of her sisters. Highly skilled in cooking and baking, with a captivating tsundere charm.',
                    'jp' => '中野家の次女。強気で口が悪いが、姉妹想いで誰よりも繊細。料理が得意で女子力が高い。恋に落ちると一直線になるツンデレ気質。',
                ],
                'stats'         => [
                    'study'     => 62,
                    'cooking'   => 98,
                    'athletics' => 70,
                    'fashion'   => 99,
                    'sincerity' => 95,
                ],
                'photo'         => 'images/nino.jpg',
                'theme_color'   => '#a855f7', // Purple/Ungu
                'accent_bg'     => '#f3e8ff',
                'badge_color'   => 'bg-purple-600 text-white',
                'border_color'  => 'border-purple-400',
                'profile_i18n'  => [
                    'id' => [
                        'Tanggal Lahir'         => '5 Mei',
                        'Tinggi Badan'          => '159 cm',
                        'Golongan Darah'        => 'A',
                        'Mata Pelajaran Unggul' => 'Bahasa Inggris',
                        'Hobi'                  => 'Memasak kue, Manikur, Belanja busana',
                        'Makanan Favorit'       => 'Pancake manis',
                    ],
                    'en' => [
                        'Birthday'         => 'May 5',
                        'Height'           => '159 cm',
                        'Blood Type'       => 'A',
                        'Best Subject'     => 'English',
                        'Hobbies'          => 'Baking, Manicure, Fashion shopping',
                        'Favorite Food'    => 'Sweet Pancakes',
                    ],
                    'jp' => [
                        '生年月日'     => '5月5日',
                        '身長'         => '159 cm',
                        '血液型'       => 'A型',
                        '得意科目'     => '英語',
                        '趣味'         => 'お菓子作り、ネイル、買い物',
                        '好きな食べ物' => 'パンケーキ',
                    ],
                ],
                'gallery'       => [
                    'images/nino-1.jpg',
                    'images/nino-2.jpg',
                    'images/nino-3.jpg',
                    'images/nino-4.jpg',
                    'images/nino-5.jpg',
                
                    
                ],
            ],

            'miku-nakano' => [
                'slug'          => 'miku-nakano',
                'order'         => 3,
                'name'          => 'Miku Nakano',
                'japanese_name' => '中野 三玖',
                'cv'            => 'Miku Itou (伊藤美来)',
                'cv_name'       => '伊藤美来 (Miku Itou)',
                'role'          => [
                    'id' => 'Anak Ketiga',
                    'en' => '3rd Sister',
                    'jp' => '三女 (Third Sister)',
                ],
                'subject'       => [
                    'id' => 'Sejarah Jepang / IPS',
                    'en' => 'Japanese History',
                    'jp' => '日本史・社会',
                ],
                'tagline'       => [
                    'id' => 'Pendiam × Penggemar Panglima Sengoku',
                    'en' => 'Quiet & Shy × Sengoku History Buff',
                    'jp' => 'クール × 戦国武将好き',
                ],
                'quote'         => [
                    'id' => '「責任取ってよね」 (Kamu harus bertanggung jawab, ya.)',
                    'en' => '「責任取ってよね」 (You better take responsibility.)',
                    'jp' => '「責任取ってよね」',
                ],
                'description'   => [
                    'id' => 'Anak ketiga dari kembar lima Nakano. Gadis pendiam, pemalu, dan selalu mengenakan headphone biru di lehernya. Penggemar berat para jenderal periode Sengoku dan berusaha keras belajar memasak roti.',
                    'en' => 'The third daughter of the Nakano quintuplets. A quiet, reserved, and shy girl who always wears blue headphones. A passionate history buff of the Sengoku era who works hard to master baking.',
                    'jp' => '中野家の三女。物静かで控えめな性格。戦国武将マニアの歴女。風太郎のために料理やパン作りを一生懸命練習する健気な一面を持つ。',
                ],
                'stats'         => [
                    'study'     => 78,
                    'cooking'   => 76,
                    'athletics' => 50,
                    'fashion'   => 72,
                    'sincerity' => 98,
                ],
                'photo'         => 'images/miku.jpg',
                'theme_color'   => '#0284c7', // Sky Blue
                'accent_bg'     => '#e0f2fe',
                'badge_color'   => 'bg-sky-600 text-white',
                'border_color'  => 'border-sky-400',
                'profile_i18n'  => [
                    'id' => [
                        'Tanggal Lahir'         => '5 Mei',
                        'Tinggi Badan'          => '159 cm',
                        'Golongan Darah'        => 'A',
                        'Mata Pelajaran Unggul' => 'Sejarah Jepang / IPS',
                        'Hobi'                  => 'Mempelajari Sejarah Panglima Sengoku, Musik',
                        'Makanan Favorit'       => 'Matcha Soda & Roti Panggang',
                    ],
                    'en' => [
                        'Birthday'         => 'May 5',
                        'Height'           => '159 cm',
                        'Blood Type'       => 'A',
                        'Best Subject'     => 'Japanese History / Social Studies',
                        'Hobbies'          => 'Studying Sengoku Generals, Music',
                        'Favorite Food'    => 'Matcha Soda & Toasted Bread',
                    ],
                    'jp' => [
                        '生年月日'     => '5月5日',
                        '身長'         => '159 cm',
                        '血液型'       => 'A型',
                        '得意科目'     => '社会・日本史',
                        '趣味'         => '戦国武将調べ、音楽鑑賞',
                        '好きな食べ物' => '抹茶ソーダ',
                    ],
                ],
                'gallery'       => [
                    'images/miku-1.jpg',
                    'images/miku-2.jpg',
                    'images/miku-3.jpg',
                    'images/miku-4.jpg',
                    'images/miku-5.jpg',
                    
                ],
            ],

            'yotsuba-nakano' => [
                'slug'          => 'yotsuba-nakano',
                'order'         => 4,
                'name'          => 'Yotsuba Nakano',
                'japanese_name' => '中野 四葉',
                'cv'            => 'Ayane Sakura (佐倉綾音)',
                'cv_name'       => '佐倉綾音 (Ayane Sakura)',
                'role'          => [
                    'id' => 'Anak Keempat',
                    'en' => '4th Sister',
                    'jp' => '四女 (Fourth Sister)',
                ],
                'subject'       => [
                    'id' => 'Bahasa Jepang (Kokugo)',
                    'en' => 'Japanese (Kokugo)',
                    'jp' => '国語',
                ],
                'tagline'       => [
                    'id' => 'Ceria & Energik × Bintang Olahraga',
                    'en' => 'Cheerful & Energetic × Athletic Star',
                    'jp' => '天真爛漫 × スポーツ万能',
                ],
                'quote'         => [
                    'id' => '「上杉さん、私いつでも全力で応援します！」 (Uesugi-san, aku akan selalu mendukungmu sekuat tenaga!)',
                    'en' => '「上杉さん、私いつでも全力で応援します！」 (Uesugi-san, I will always cheer for you with all my might!)',
                    'jp' => '「上杉さん、私いつでも全力で応援します！」',
                ],
                'description'   => [
                    'id' => 'Anak keempat dari kembar lima Nakano. Selalu bersemangat dan ceria dengan pita hijau khas di kepalanya. Memiliki sifat tulus dan gemar menolong siapa saja tanpa pamrih.',
                    'en' => 'The fourth daughter of the Nakano quintuplets. Always energetic and cheerful with her trademark green ribbon. She has a pure, selfless heart and loves helping others unconditionally.',
                    'jp' => '中野家の四女。緑色のリボンがトレードマーク。常に明るく元気いっぱいで、頼まれると断れないお人好し。運動能力が抜群。',
                ],
                'stats'         => [
                    'study'     => 55,
                    'cooking'   => 60,
                    'athletics' => 100,
                    'fashion'   => 68,
                    'sincerity' => 100,
                ],
                'photo'         => 'images/yotsuba.jpg',
                'theme_color'   => '#22c55e', // Emerald/Hijau
                'accent_bg'     => '#dcfce7',
                'badge_color'   => 'bg-green-600 text-white',
                'border_color'  => 'border-green-400',
                'profile_i18n'  => [
                    'id' => [
                        'Tanggal Lahir'         => '5 Mei',
                        'Tinggi Badan'          => '159 cm',
                        'Golongan Darah'        => 'A',
                        'Mata Pelajaran Unggul' => 'Bahasa Jepang (Kokugo)',
                        'Hobi'                  => 'Olahraga atletik, Menyiram tanaman',
                        'Makanan Favorit'       => 'Jus Jeruk Mandarin',
                    ],
                    'en' => [
                        'Birthday'         => 'May 5',
                        'Height'           => '159 cm',
                        'Blood Type'       => 'A',
                        'Best Subject'     => 'Japanese (Kokugo)',
                        'Hobbies'          => 'Athletics, Watering plants',
                        'Favorite Food'    => 'Mandarin Orange Juice',
                    ],
                    'jp' => [
                        '生年月日'     => '5月5日',
                        '身長'         => '159 cm',
                        '血液型'       => 'A型',
                        '得意科目'     => '国語',
                        '趣味'         => '観葉植物の水やり、ランニング',
                        '好きな食べ物' => '温州みかん',
                    ],
                ],
                'gallery'       => [
                    'images/yotsuba-1.jpg',
                    'images/yotsuba-2.jpg',
                    'images/yotsuba-3.jpg',
                    'images/yotsuba-4.jpg',
                    'images/yotsuba-5.jpg',
                    
                ],
            ],

            'itsuki-nakano' => [
                'slug'          => 'itsuki-nakano',
                'order'         => 5,
                'name'          => 'Itsuki Nakano',
                'japanese_name' => '中野 五月',
                'cv'            => 'Inori Minase (水瀬いのり)',
                'cv_name'       => '水瀬いのり (Inori Minase)',
                'role'          => [
                    'id' => 'Anak Kelima (Bungsu)',
                    'en' => '5th Sister (Youngest)',
                    'jp' => '五女 (Fifth Sister)',
                ],
                'subject'       => [
                    'id' => 'Ilmu Pengetahuan Alam (IPA)',
                    'en' => 'Science',
                    'jp' => '理科',
                ],
                'tagline'       => [
                    'id' => 'Serius & Gigih × Penikmat Kuliner',
                    'en' => 'Earnest & Hardworking × Foodie Lover',
                    'jp' => '生真面目 × 食いしん坊',
                ],
                'quote'         => [
                    'id' => '「私は先生のような立派な教師になりたいんです！」 (Aku ingin menjadi guru hebat seperti ibuku!)',
                    'en' => '「私は先生のような立派な教師になりたいんです！」 (I want to become an admirable teacher like my mother!)',
                    'jp' => '「私は先生のような立派な教師になりたいんです！」',
                ],
                'description'   => [
                    'id' => 'Anak bungsu dari kembar lima Nakano. Gadis bersungguh-sungguh dengan jepit rambut berbentuk bintang. Memiliki nafsu makan besar dan bercita-cita mulia menjadi pengajar profesional.',
                    'en' => 'The youngest daughter of the Nakano quintuplets. An earnest and diligent girl with star hairpins. Possesses a huge appetite and aspires to become a great teacher.',
                    'jp' => '中野家の五女。星型のヘアピンが特徴。真面目で礼儀正しい努力家だが、要領が悪い一面も。大食い食いしん坊で、母親のような教師を目指す。',
                ],
                'stats'         => [
                    'study'     => 75,
                    'cooking'   => 80,
                    'athletics' => 60,
                    'fashion'   => 78,
                    'sincerity' => 96,
                ],
                'photo'         => 'images/itsuki.jpg',
                'theme_color'   => '#ef4444', // Red/Crimson
                'accent_bg'     => '#fee2e2',
                'badge_color'   => 'bg-red-600 text-white',
                'border_color'  => 'border-red-400',
                'profile_i18n'  => [
                    'id' => [
                        'Tanggal Lahir'         => '5 Mei',
                        'Tinggi Badan'          => '159 cm',
                        'Golongan Darah'        => 'A',
                        'Mata Pelajaran Unggul' => 'Ilmu Pengetahuan Alam (IPA)',
                        'Hobi'                  => 'Wisata Kuliner, Belajar Tambahan',
                        'Makanan Favorit'       => 'Daging Kari & Bakpao Daging',
                    ],
                    'en' => [
                        'Birthday'         => 'May 5',
                        'Height'           => '159 cm',
                        'Blood Type'       => 'A',
                        'Best Subject'     => 'Science',
                        'Hobbies'          => 'Gourmet Food Tour, Extra study',
                        'Favorite Food'    => 'Meat Curry & Steamed Meat Buns',
                    ],
                    'jp' => [
                        '生年月日'     => '5月5日',
                        '身長'         => '159 cm',
                        '血液型'       => 'A型',
                        '得意科目'     => '理科',
                        '趣味'         => '食べ歩き、ヨガ',
                        '好きな食べ物' => '肉まん、カレー',
                    ],
                ],
                'gallery'       => [
                    'images/itsuki-1.jpg',
                    'images/itsuki-2.jpg',
                    'images/itsuki-3.jpg',
                    'images/itsuki-4.jpg',
                    'images/itsuki-5.jpg',
                ],
            ],

            'fuutarou-uesugi' => [
                'slug'          => 'fuutarou-uesugi',
                'order'         => 0,
                'name'          => 'Fuutarou Uesugi',
                'japanese_name' => '上杉 風太郎',
                'cv'            => 'Yoshitsugu Matsuoka (松岡禎丞)',
                'cv_name'       => '松岡禎丞 (Yoshitsugu Matsuoka)',
                'role'          => [
                    'id' => 'Protagonis & Guru Privat',
                    'en' => 'Protagonist & Private Tutor',
                    'jp' => '主人公・家庭教師',
                ],
                'subject'       => [
                    'id' => 'Semua Pelajaran (Nilai Sempurna 100)',
                    'en' => 'All Subjects (Perfect 100)',
                    'jp' => '全教科（常に100点）',
                ],
                'tagline'       => [
                    'id' => 'Siswa Jenius Peringkat 1 × Guru Privat',
                    'en' => 'Top Student × Dedicated Private Tutor',
                    'jp' => '学年トップ秀才 × 家庭教師',
                ],
                'quote'         => [
                    'id' => '「俺がお前たちを絶対に全員卒業させてやる！」 (Aku pasti akan membimbing kalian berlima sampai lulus!)',
                    'en' => '「俺がお前たちを絶対に全員卒業させてやる！」 (I will definitely make sure all five of you graduate!)',
                    'jp' => '「俺がお前たちを絶対に全員卒業させてやる！」',
                ],
                'description'   => [
                    'id' => 'Protagonis utama serial. Siswa SMA jenius dan pekerja keras yang selalu meraih nilai sempurna 100. Mengambil pekerjaan sebagai guru privat kembar lima Nakano demi melunasi hutang keluarganya.',
                    'en' => 'The main protagonist. A genius and hardworking high school student who consistently scores perfect 100s. Takes on the private tutoring job for the Nakano quintuplets to pay off family debt.',
                    'jp' => '本作の主人公。学年トップの秀才だが、社交性に欠ける。家の借金返済のため、中野家五つ子の家庭教師アルバイトを引き受ける。',
                ],
                'stats'         => [
                    'study'     => 100,
                    'cooking'   => 45,
                    'athletics' => 52,
                    'fashion'   => 35,
                    'sincerity' => 94,
                ],
                'photo'         => 'images/fuutarou.jpg',
                'theme_color'   => '#4f46e5', // Indigo
                'accent_bg'     => '#e0e7ff',
                'badge_color'   => 'bg-indigo-600 text-white',
                'border_color'  => 'border-indigo-400',
                'profile_i18n'  => [
                    'id' => [
                        'Tanggal Lahir'         => '15 April',
                        'Tinggi Badan'          => '178 cm',
                        'Golongan Darah'        => 'A',
                        'Mata Pelajaran Unggul' => 'Semua Mata Pelajaran (Nilai 100)',
                        'Hobi'                  => 'Membaca Buku Tebal, Berhemat',
                        'Makanan Favorit'       => 'Yakiniku Teishoku (Tanpa Daging)',
                    ],
                    'en' => [
                        'Birthday'         => 'April 15',
                        'Height'           => '178 cm',
                        'Blood Type'       => 'A',
                        'Best Subject'     => 'All Subjects (Perfect 100)',
                        'Hobbies'          => 'Reading reference books, Saving money',
                        'Favorite Food'    => 'Yakiniku Set (No Meat)',
                    ],
                    'jp' => [
                        '生年月日'     => '4月15日',
                        '身長'         => '178 cm',
                        '血液型'       => 'A型',
                        '得意科目'     => '全教科（常に100点）',
                        '趣味'         => '参考書読書、節約',
                        '好きな食べ物' => '焼肉定食（肉抜き）',
                    ],
                ],
                'gallery'       => [
                    'images/fuutarou-1.jpg',
                    'images/fuutarou-2.jpg',
                    'images/fuutarou-3.jpg',
                    'images/fuutarou-4.jpg',
                    'images/fuutarou-5.jpg',
                ],
            ],
        ];
    }

    /**
     * Menampilkan Daftar Semua Karakter (/karakter).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $characters = $this->getCharacters();
        return view('character.index', compact('characters'));
    }

    /**
     * Menampilkan Halaman Detail Karakter berdasarkan slug.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show(string $slug)
    {
        $characters = $this->getCharacters();

        // Dukungan alias slug (contoh: ichika -> ichika-nakano)
        $aliases = [
            'ichika'   => 'ichika-nakano',
            'nino'     => 'nino-nakano',
            'miku'     => 'miku-nakano',
            'yotsuba'  => 'yotsuba-nakano',
            'itsuki'   => 'itsuki-nakano',
            'fuutarou' => 'fuutarou-uesugi',
        ];

        $targetSlug = strtolower($slug);
        if (isset($aliases[$targetSlug])) {
            $targetSlug = $aliases[$targetSlug];
        }

        // Jika slug tidak ditemukan, trigger HTTP 404
        if (!array_key_exists($targetSlug, $characters)) {
            abort(404);
        }

        $character = $characters[$targetSlug];
        $character['slug'] = $targetSlug;

        // Fallback default profil bahasa ID untuk render server awal
        $character['profile'] = $character['profile_i18n']['id'] ?? [];
        $character['description_text'] = is_array($character['description']) ? ($character['description']['id'] ?? '') : $character['description'];
        $character['quote_text'] = is_array($character['quote']) ? ($character['quote']['id'] ?? '') : $character['quote'];

        return view('character.show', compact('character', 'characters'));
    }
}
