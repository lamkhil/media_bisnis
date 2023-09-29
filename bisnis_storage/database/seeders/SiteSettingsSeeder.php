<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_infos')->insert([
            [
                'id' => 1,
                'logo' => 'logo/smartdirectory_logo.png',
                'fav' => 'fav/smartdirectory_fav.png',
                'mobile_no_1' => '+6282377823390',
                'mobile_no_2' => '+6287788092165',
                'email_1' => 'support@mediabisnis.co.id',
                'email_2' => '401xdssh@gmail.com',
                'web' => 'https://mediabisnis.co.id',
                'address' => 'Jl. Stadion Pancasila, Sungaipenuh, Jambi, Indonesia',
                'title' => 'Mediabisnis.co.id - Media Direktori Bisnis Indonesia',
                'meta' => 'Media bisnis, Media direktori, Direktori bisnis, Bisnis indonesia, Web direktori, Portal bisnis',
                'description' => 'Media direktori bisnis Indonesia terlengkap dengan basis platform terbesar, memberi akses ke data profil, produk, dan layanan dari berbagai perusahaan di indonesia. Mediabisnis.co.id berbagi info terkait: profil perusahaan, produk, layanan, website, sosial media, dan rating perusahaan. Misi kami menjadikan industri bisnis lebih transparan.',
                'fb' => 'https://facebook.com/mycodingxd',
                'tw' => 'http://twitter.com/mycodingxd',
                'li' => 'https://linkedin.com/company/mycodingxd',
                'ins'=> 'http://instagram.com/mycodingxd',
                'yt' => 'https://youtube.com/c/mycodingxd',
                'pin'=> 'http://pinterest.com/mycodingxd',
            ],
        ]);
    }
}
