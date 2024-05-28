<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agen = [
            [
                'nama_agen' => 'Rumah Indah Realty',
                'deskripsi_agen' => 'Rumah Indah Realty adalah agen properti yang telah berpengalaman selama lebih dari 20 tahun. Kami berfokus pada penyediaan rumah berkualitas tinggi dengan harga yang terjangkau. Tim kami terdiri dari profesional yang berdedikasi untuk membantu Anda menemukan rumah impian Anda.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Mawar No. 1, Jakarta',
                'no_telp' => '081234567890',
                'email' => 'rumahindah@gmail.com',
                'rating' => 4.9,
                
            ],
            [
                'nama_agen' => 'Properti Sukses',
                'deskripsi_agen' => 'Properti Sukses menawarkan beragam properti dengan harga terbaik di pasaran. Kami memiliki jaringan luas dan pengetahuan mendalam tentang pasar properti, sehingga kami dapat membantu Anda menemukan properti yang sesuai dengan kebutuhan dan anggaran Anda.',
                'foto_agen'=> 'properti sukses.jpg',
                'alamat' => 'Jl. Melati No. 2, Bandung',
                'no_telp' => '081234567891',
                'email' => 'propertisukses@gmail.com',
                'rating' => 4.9,
                
            ],
            [
                'nama_agen' => 'Amanah Realty',
                'deskripsi_agen' => 'Amanah Realty adalah agen properti yang terpercaya dan amanah. Kami berkomitmen untuk memberikan layanan terbaik kepada klien kami, dengan fokus pada transparansi dan integritas dalam setiap transaksi. Kami menawarkan berbagai macam properti yang dapat memenuhi kebutuhan Anda.',
                'foto_agen'=> 'amanah reality.jpg',
                'alamat' => 'Jl. Kenanga No. 3, Yogyakarta',
                'no_telp' => '081234567892',
                'email' => 'amanahrealty@gmail.com',
                'rating' => 4.9,
                
            ],
            [
                'nama_agen' => 'Jaya Realty',
                'deskripsi_agen' => 'Jaya Realty adalah agen properti yang berpengalaman dan profesional di Jakarta. Kami memiliki berbagai pilihan properti terbaik yang dapat memenuhi kebutuhan Anda. Tim kami siap membantu Anda dalam setiap langkah pembelian atau penjualan properti dengan layanan yang cepat dan efisien.',
                'foto_agen'=> 'jaya reality.jpg',
                'alamat' => 'Jl. Anggrek No. 4, Jakarta',
                'no_telp' => '081234567893',
                'email' => 'jayarealty@gmail.com',
                'rating' => 4.8,
                
            ],
            [
                'nama_agen' => 'Bandung Pro',
                'deskripsi_agen' => 'Bandung Pro adalah agen properti yang menyediakan properti eksklusif di Bandung. Kami memiliki pengalaman luas dalam membantu klien kami menemukan rumah impian mereka. Kami juga menawarkan layanan konsultasi gratis untuk membantu Anda membuat keputusan terbaik dalam pembelian properti.',
                'foto_agen'=> 'bandung pro.jpg',
                'alamat' => 'Jl. Dahlia No. 5, Bandung',
                'no_telp' => '081234567894',
                'email' => 'bandungpro@gmail.com',
                'rating' => 4.7,
                
            ],
            [
                'nama_agen' => 'Jogja Maju',
                'deskripsi_agen' => 'Jogja Maju adalah agen properti andalan di Yogyakarta. Kami berkomitmen untuk membantu Anda menemukan properti yang sempurna dengan harga yang kompetitif. Dengan layanan pelanggan yang ramah dan profesional, kami akan memastikan Anda mendapatkan pengalaman yang memuaskan dalam transaksi properti.',
                'foto_agen'=> 'jogja maju.jpg',
                'alamat' => 'Jl. Sakura No. 6, Yogyakarta',
                'no_telp' => '081234567895',
                'email' => 'jogjamaju@gmail.com',
                'rating' => 4.6,
                
            ],
            [
                'nama_agen' => 'Jakarta Dream',
                'deskripsi_agen' => 'Jakarta Dream adalah agen properti yang siap membantu Anda mewujudkan rumah impian di Jakarta. Kami menawarkan berbagai pilihan properti yang dapat disesuaikan dengan kebutuhan dan keinginan Anda. Dengan tim yang berpengalaman, kami memastikan proses pembelian atau penjualan properti Anda berjalan lancar.',
                'foto_agen'=> 'jakarta dream.jpg',
                'alamat' => 'Jl. Mawar No. 7, Jakarta',
                'no_telp' => '081234567896',
                'email' => 'jakartadream@gmail.com',
                'rating' => 4.5,
                
            ],
            [
                'nama_agen' => 'Bandung Homes',
                'deskripsi_agen' => 'Bandung Homes menyediakan hunian nyaman di Bandung dengan berbagai pilihan properti yang bisa Anda pilih. Kami berfokus pada kepuasan pelanggan dan berkomitmen untuk memberikan layanan terbaik. Kami siap membantu Anda menemukan properti yang tepat sesuai kebutuhan Anda.',
                'foto_agen'=> 'bandung homes.jpg',
                'alamat' => 'Jl. Melati No. 8, Bandung',
                'no_telp' => '081234567897',
                'email' => 'bandunghomes@gmail.com',
                'rating' => 4.4,
                
            ],
            [
                'nama_agen' => 'Yogyakarta Residence',
                'deskripsi_agen' => 'Yogyakarta Residence membantu Anda menemukan rumah idaman di Yogyakarta. Kami menawarkan berbagai properti yang dapat memenuhi kebutuhan dan gaya hidup Anda. Dengan pengalaman bertahun-tahun di bidang properti, kami siap memberikan layanan terbaik untuk Anda.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Kenanga No. 9, Yogyakarta',
                'no_telp' => '081234567898',
                'email' => 'yogyakartaresidence@gmail.com',
                'rating' => 4.3,
                
            ],
            [
                'nama_agen' => 'Elite Jakarta',
                'deskripsi_agen' => 'Elite Jakarta adalah agen properti yang menyediakan properti elite di Jakarta. Kami memiliki jaringan luas dan pengetahuan mendalam tentang pasar properti, sehingga kami dapat membantu Anda menemukan properti yang sesuai dengan kebutuhan dan anggaran Anda. Kami berkomitmen untuk memberikan layanan terbaik kepada setiap pelanggan.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Anggrek No. 10, Jakarta',
                'no_telp' => '081234567899',
                'email' => 'elitejakarta@gmail.com',
                'rating' => 4.2,
                
            ],
            [
                'nama_agen' => 'Bandung Elite',
                'deskripsi_agen' => 'Bandung Elite menyediakan properti elite di Bandung. Kami memiliki berbagai pilihan properti eksklusif yang dapat memenuhi kebutuhan Anda. Dengan pengalaman dan pengetahuan yang luas, kami siap membantu Anda menemukan properti yang sempurna.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Dahlia No. 11, Bandung',
                'no_telp' => '081234567800',
                'email' => 'bandungelite@gmail.com',
                'rating' => 4.1,
                
            ],
            [
                'nama_agen' => 'Yogyakarta Elite',
                'deskripsi_agen' => 'Yogyakarta Elite menyediakan properti elite di Yogyakarta. Kami berkomitmen untuk memberikan layanan terbaik kepada klien kami dengan fokus pada kualitas dan kepuasan pelanggan. Kami siap membantu Anda menemukan properti yang tepat dengan harga yang kompetitif.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Sakura No. 12, Yogyakarta',
                'no_telp' => '081234567801',
                'email' => 'yogyakartaalite@gmail.com',
                'rating' => 4.0,
                
            ],
            [
                'nama_agen' => 'Jakarta Harmony',
                'deskripsi_agen' => 'Jakarta Harmony menyediakan hunian harmonis di Jakarta dengan berbagai pilihan properti yang dapat disesuaikan dengan kebutuhan Anda. Kami berfokus pada kepuasan pelanggan dan berkomitmen untuk memberikan layanan terbaik. Kami siap membantu Anda menemukan properti yang tepat sesuai kebutuhan Anda.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Mawar No. 13, Jakarta',
                'no_telp' => '081234567802',
                'email' => 'jakartaharmony@gmail.com',
                'rating' => 4.9,
                
            ],
            [
                'nama_agen' => 'Bandung Harmony',
                'deskripsi_agen' => 'Bandung Harmony menyediakan hunian harmonis di Bandung dengan berbagai pilihan properti yang dapat disesuaikan dengan kebutuhan Anda. Kami berfokus pada kepuasan pelanggan dan berkomitmen untuk memberikan layanan terbaik. Kami siap membantu Anda menemukan properti yang tepat sesuai kebutuhan Anda.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Melati No. 14, Bandung',
                'no_telp' => '081234567803',
                'email' => 'bandungharmony@gmail.com',
                'rating' => 4.8,
                
            ],
            [
                'nama_agen' => 'Yogyakarta Harmony',
                'deskripsi_agen' => 'Yogyakarta Harmony menyediakan hunian harmonis di Yogyakarta dengan berbagai pilihan properti yang dapat disesuaikan dengan kebutuhan Anda. Kami berfokus pada kepuasan pelanggan dan berkomitmen untuk memberikan layanan terbaik. Kami siap membantu Anda menemukan properti yang tepat sesuai kebutuhan Anda.',
                'foto_agen'=> 'rumah indah.jpg',
                'alamat' => 'Jl. Kenanga No. 15, Yogyakarta',
                'no_telp' => '081234567804',
                'email' => 'yogyakartaharmony@gmail.com',
                'rating' => 4.7,
                
            ],
        ];

        DB::table('agen')->insert($agen);
    }
}
