<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        
        // 1. SERVICES (Pas 4 Data - Anti Double)
        $services = [
            ['title'=>'Residential Design','description'=>'Kami merancang hunian yang mencerminkan kepribadian Anda. Dari konsep hingga eksekusi, setiap detail diperhatikan.','icon'=>'home','sort_order'=>1,'features'=>json_encode(['Konsultasi desain gratis','3D Rendering','Pengawasan proyek','After-service 1 tahun'])],
            ['title'=>'Commercial Interior','description'=>'Ruang komersial yang profesional dan meningkatkan produktivitas tim Anda sekaligus impresi klien.','icon'=>'building','sort_order'=>2,'features'=>json_encode(['Office fit-out','Retail design','Restaurant & café','Brand consistency'])],
            ['title'=>'Hospitality Design','description'=>'Hotel, resort, dan villa dengan desain yang menciptakan pengalaman tak terlupakan bagi setiap tamu.','icon'=>'star','sort_order'=>3,'features'=>json_encode(['Lobby & lounge','Guest room','F&B space','Outdoor area'])],
            ['title'=>'Renovation & Remodel','description'=>'Transformasi ruang lama menjadi wajah baru yang segar tanpa harus membangun dari nol.','icon'=>'refresh','sort_order'=>4,'features'=>json_encode(['Space planning','Material upgrade','Lighting design','Furniture restyling'])],
        ];
        foreach($services as $s) {
            Service::updateOrCreate(
                ['title' => $s['title']], 
                ['description' => $s['description'], 'icon' => $s['icon'], 'sort_order' => $s['sort_order'], 'features' => json_decode($s['features'], true), 'image' => null]
            );
        }

        // 2. PROJECTS (Pas 6 Data - Mengarah ke foto asli di folder storage kamu)
        $projects = [
            ['title'=>'Villa Serenity Bali','slug'=>'villa-serenity-bali','description'=>'Villa mewah bergaya tropical modern dengan material lokal pilihan.','category'=>'residential','location'=>'Seminyak, Bali','year'=>2024,'area_sqm'=>480,'is_featured'=>true,'sort_order'=>1, 'thumbnail' => 'portofolio/Villa.png'],
            ['title'=>'The Commons Office','slug'=>'the-commons-office','description'=>'Kantor co-working modern dengan konsep biophilic design.','category'=>'commercial','location'=>'Jakarta Selatan','year'=>2022,'area_sqm'=>1200,'is_featured'=>true,'sort_order'=>2, 'thumbnail' => 'portofolio/office.png'],
            ['title'=>'Rumah Tropis BSD','slug'=>'rumah-tropis-bsd','description'=>'Hunian keluarga dengan sentuhan tropis kontemporer yang hangat.','category'=>'residential','location'=>'BSD City, Tangerang','year'=>2020,'area_sqm'=>320,'is_featured'=>true,'sort_order'=>3, 'thumbnail' => 'portofolio/rumah.png'],
            ['title'=>'Kafe Akar Bandung','slug'=>'kafe-akar-bandung','description'=>'Kafe industrial-natural dengan nuansa hangat dan instagramable.','category'=>'commercial','location'=>'Dago, Bandung','year'=>2023,'area_sqm'=>210,'is_featured'=>false,'sort_order'=>4, 'thumbnail' => 'portofolio/cafe.png'],
            ['title'=>'Hotel Puri Lombok','slug'=>'hotel-puri-lombok','description'=>'Boutique hotel dengan desain lokal Sasak yang autentik dan mewah.','category'=>'hospitality','location'=>'Senggigi, Lombok','year'=>2019,'area_sqm'=>2800,'is_featured'=>false,'sort_order'=>5, 'thumbnail' => 'portofolio/hotel.png'],
            ['title'=>'Apartemen Minimalis SCBD','slug'=>'apartemen-minimalis-scbd','description'=>'Unit apartemen premium dengan desain minimalis Jepang yang elegan.','category'=>'residential','location'=>'SCBD, Jakarta','year'=>2017,'area_sqm'=>95,'is_featured'=>false,'sort_order'=>6, 'thumbnail' => 'portofolio/apartemen.png'],
        ];
        foreach($projects as $p) {
            Project::updateOrCreate(
                ['slug' => $p['slug']], 
                [
                    'title' => $p['title'], 'description' => $p['description'], 'category' => $p['category'], 
                    'location' => $p['location'], 'year' => $p['year'], 'area_sqm' => $p['area_sqm'], 
                    'is_featured' => $p['is_featured'], 'sort_order' => $p['sort_order'], 'thumbnail' => $p['thumbnail'], 
                    'gallery' => json_encode([]), 'client_name' => 'Client'
                ]
            );
        }

        // 3. TESTIMONIALS
        $testimonials = [
            ['client_name'=>'Budi Santoso','client_position'=>'CEO','client_company'=>'Tech Startup','review'=>'Tim Luxe Interior benar-benar memahami visi kami. Hasilnya melampaui ekspektasi.','rating'=>5],
            ['client_name'=>'Sari Dewi','client_position'=>'Homeowner','client_company'=>'','review'=>'Proses dari konsultasi sampai finishing sangat profesional. Rumah impian kami terwujud!','rating'=>5],
        ];
        foreach($testimonials as $t) {
            Testimonial::updateOrCreate(
                ['client_name' => $t['client_name']], 
                ['client_position' => $t['client_position'], 'client_company' => $t['client_company'], 'review' => $t['review'], 'rating' => $t['rating'], 'client_photo' => null, 'is_active' => true]
            );
        }

        // 4. TEAM
$team = [
    [
        'name'=>'Marsha Daviena',
        'position'=>'Principal Designer',
        'bio'=>'10+ tahun pengalaman di bidang interior desain premium. Lulusan ITB Arsitektur.',
        'sort_order'=>1,
        'photo'=>'portofolio/caca.png'
    ],
];
        }
    }
