<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestoranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restorans')->insert(
            [
                ['ime' => 'Sweet & Salty', 'adresa' => 'Antifasisticke borbe 23d', 'slika' => 'https://restorani.rs/storage/images/restaurants/galleries/thumbs/1551190269314410179_gallery.jpg', 'grad' => 'Beograd',  'opis' => 'Jedan od retkih pravih porodičnih restorana, restoran Sweet & Salty, svoje goste dočekuje u srcu Novog Beograda. Ovo mesto nudi uživanje u svakom zalogaju, a zadovoljstvo gostiju je na prvom mestu. Svojom pozitivnom energijom i odičnom uslugom Sweet & Salty privlači veliki broj istinskih hedonista i pravih ljubitelja dobrog zalogaja.', 'ocena' => '8.50', 'kategorija_id' => 1],
                ['ime' => 'Frans', 'adresa' => 'Bulevar Oslbodjenja 18a', 'slika' => 'https://www.gdecemo.rs/images/company/large/frans%20slika%201-Cf9u.jpg', 'grad' => 'Beograd',  'opis' => 'Jedan od retkih pravih porodičnih restorana, restoran Sweet & Salty, svoje goste dočekuje u srcu Novog Beograda. Ovo mesto nudi uživanje u svakom zalogaju, a zadovoljstvo gostiju je na prvom mestu. Svojom pozitivnom energijom i odičnom uslugom Sweet & Salty privlači veliki broj istinskih hedonista i pravih ljubitelja dobrog zalogaja.', 'ocena' => '8.50', 'kategorija_id' => 1],
                ['ime' => 'Wok Republic', 'adresa' => 'Novi Beograd, kod opstine', 'slika' => 'https://media-cdn.tripadvisor.com/media/photo-s/10/17/f7/60/wok-republic.jpg', 'grad' => 'Beograd',  'opis' => 'Jedan od retkih pravih porodičnih restorana, restoran Sweet & Salty, svoje goste dočekuje u srcu Novog Beograda. Ovo mesto nudi uživanje u svakom zalogaju, a zadovoljstvo gostiju je na prvom mestu. Svojom pozitivnom energijom i odičnom uslugom Sweet & Salty privlači veliki broj istinskih hedonista i pravih ljubitelja dobrog zalogaja.', 'ocena' => '8.50', 'kategorija_id' => 1]

            ]
        );
    }
}
