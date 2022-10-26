<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Mukim;
use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            [
                'name' => 'Brunei-Muara',
                'mukim' => [
                    [
                        'name' => 'Mukim Gadong A',
                        'village' => [
                            ['name' => 'Kampong Katok'],
                            ['name' => 'Kampong Rimba'],
                            ['name' => 'Kampong Tungku'],
                            ['name' => 'RPN Kampong Rimba'],
                            ['name' => 'STKRJ Kampong Katok A'],
                            ['name' => 'STKRJ Kampong Rimba'],
                            ['name' => 'STKRJ Kampong Tungku Area 1'],
                            ['name' => 'STKRJ Kampong Tungku Area 2'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Gadong B',
                        'village' => [
                            ['name' => 'Kampong Beribi'],
                            ['name' => 'Kampong Kiarong'],
                            ['name' => 'Kampong Kiulap'],
                            ['name' => 'Kampong Mata-Mata'],
                            ['name' => 'Kampong Menglait'],
                            ['name' => 'Kampong Pengkalan Gadong'],
                            ['name' => 'Kampong Perpindahan Mata-mata'],
                            ['name' => 'STKRJ Katok B'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Berakas A',
                        'village' => [
                            ['name' => 'Kampong Anggerek Desa'],
                            ['name' => 'Kampong Burong Pingai Berakas'],
                            ['name' => 'Kampong Jaya Bakti'],
                            ['name' => 'Kampong Jaya Setia'],
                            ['name' => 'Kampong Lambak'],
                            ['name' => 'Kampong Lambak Kiri'],
                            ['name' => 'Kampong Orang Kaya Besar Imas'],
                            ['name' => 'Kampong Pancha Delima'],
                            ['name' => 'Kampong Pengiran Siraja Muda Delima Satu'],
                            ['name' => 'Kampong Pulaie'],
                            ['name' => 'Kampong Serusop'],
                            ['name' => 'Kampong Terunjing'],
                            ['name' => 'Kawasan Jabatan-Jabatan dan Perumahan Kerajaan'],
                            ['name' => 'Perkhemahan Berakas'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Berakas B',
                        'village' => [
                            ['name' => 'Kampong Lambak Kanan'],
                            ['name' => 'Kampong Madang'],
                            ['name' => 'Kampong Manggis'],
                            ['name' => 'Kampong Salambigar'],
                            ['name' => 'Kampong Sungai Akar'],
                            ['name' => 'Kampong Sungai Hanching'],
                            ['name' => 'Kampong Sungai Orok'],
                            ['name' => 'Kampong Sungai Tilong'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Burong Pingai Ayer',
                        'village' => [
                            ['name' => 'Kampong Burong Pingai Ayer'],
                            ['name' => 'Kampong Lurong Dalam'],
                            ['name' => 'Kampong Pandai Besi A'],
                            ['name' => 'Kampong Pandai Besi B'],
                            ['name' => 'Kampong Pekan Lama'],
                            ['name' => 'Kampong Pengiran Setia Negara'],
                            ['name' => 'Kampong Sungai Pandan A'],
                            ['name' => 'Kampong Sungai Pandan B'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kianggeh',
                        'village' => [
                            ['name' => 'Diplomatic Enclave Area'],
                            ['name' => 'Kampong Berangan'],
                            ['name' => 'Kampong Kianggeh'],
                            ['name' => 'Kampong Kumbang Pasang'],
                            ['name' => 'Kampong Melabau'],
                            ['name' => 'Kampong Parit'],
                            ['name' => 'Kampong Pusar Ulak'],
                            ['name' => 'Kampong Tasek Lama'],
                            ['name' => 'Kampong Tumasek'],
                            ['name' => 'Kampong Tungkadeh'],
                            ['name' => 'Pusat Bandar'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kilanas',
                        'village' => [
                            ['name' => 'Kampong Bengkurong'],
                            ['name' => 'Kampong Bunut'],
                            ['name' => 'Kampong Bunut Perpindahan'],
                            ['name' => 'Kampong Burong Lepas'],
                            ['name' => 'Kampong Kilanas'],
                            ['name' => 'Kampong Jangsak'],
                            ['name' => 'Kampong Madewa'],
                            ['name' => 'Kampong Sinarubai'],
                            ['name' => 'Kampong Tanjong Bunut'],
                            ['name' => 'Kampong Tasek Meradun'],
                            ['name' => 'Kampong Telanai'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kota Batu',
                        'village' => [
                            ['name' => 'Kampong Belimbing'],
                            ['name' => 'Kampong Buang Tawar'],
                            ['name' => 'Kampong Dato Gandi'],
                            ['name' => 'Kampong Kota Batu'],
                            ['name' => 'Kampong Menunggol'],
                            ['name' => 'Kampong Pelambayan'],
                            ['name' => 'Kampong Pintu Malim'],
                            ['name' => 'Kampong Pudak'],
                            ['name' => 'Kampong Riong'],
                            ['name' => 'Kampong Serdang'],
                            ['name' => 'Kampong Subok'],
                            ['name' => 'Kampong Sungai Belukut'],
                            ['name' => 'Kampong Sungai Besar'],
                            ['name' => 'Kampong Sungai Lampai'],
                            ['name' => 'Kampong Sungai Matan'],
                            ['name' => 'Kampong Sungai Bunga'],
                            ['name' => 'Pulau Sibungor'],
                            ['name' => 'Pulau Baru-Baru'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Lumapas',
                        'village' => [
                            ['name' => 'Kampong Baong'],
                            ['name' => 'Kampong Buang Sakar'],
                            ['name' => 'Kampong Buang Tekurok'],
                            ['name' => 'Kampong Kasat'],
                            ['name' => 'Kampong Kilugus'],
                            ['name' => 'Kampong Lumapas'],
                            ['name' => 'Kampong Lupak Luas'],
                            ['name' => 'Kampong Tarap Bau'],
                            ['name' => 'Kampong Sungai Asam'],
                            ['name' => 'Kampong Panchor'],
                            ['name' => 'Kampong Putat'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Mentiri',
                        'village' => [
                            ['name' => 'Kampong Batu Marang'],
                            ['name' => 'Kampong Mentiri'],
                            ['name' => 'Kampong Pengkalan Sibabau'],
                            ['name' => 'Kampong Salar'],
                            ['name' => 'Kampong Sungai Buloh'],
                            ['name' => 'Kampong Tanah Jambu'],
                            ['name' => 'RPN Mentiri Area A'],
                            ['name' => 'RPN Mentiri Area B'],
                            ['name' => 'RPN Panchor Mengkubau'],
                            ['name' => 'Kampong Panchor'],
                            ['name' => 'Kampong Putat'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Pengkalan Batu',
                        'village' => [
                            ['name' => 'Kampong Batang Perhentian'],
                            ['name' => 'Kampong Batong'],
                            ['name' => 'Kampong Batu Ampar'],
                            ['name' => 'Kampong Bebatik'],
                            ['name' => 'Kampong Bebuloh'],
                            ['name' => 'Kampong Imang'],
                            ['name' => 'Kampong Junjongan'],
                            ['name' => 'Kampong Kuala Lurah'],
                            ['name' => 'Kampong Limau Manis'],
                            ['name' => 'Kampong Masin'],
                            ['name' => 'Kampong Panchor Murai'],
                            ['name' => 'Kampong Parit'],
                            ['name' => 'Kampong Pengkalan Batu'],
                            ['name' => 'Kampong Wasan'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Peramu',
                        'village' => [
                            ['name' => 'Kampong Bakut Berumput'],
                            ['name' => 'Kampong Bakut Pengiran Siraja Muda A'],
                            ['name' => 'Kampong Bakut Pengiran Siraja Muda B'],
                            ['name' => 'Kampong Lurong Sikuna'],
                            ['name' => 'Kampong Pekilong Muara'],
                            ['name' => 'Kampong Peramu'],
                            ['name' => 'Kampong Setia Pahlawan'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Saba',
                        'village' => [
                            ['name' => 'Kampong Saba Darat A'],
                            ['name' => 'Kampong Saba Darat B'],
                            ['name' => 'Kampong Saba Laut'],
                            ['name' => 'Kampong Saba Tengah'],
                            ['name' => 'Kampong Saba Ujong'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sengkurong',
                        'village' => [
                            ['name' => 'Kampong Jerudong'],
                            ['name' => 'Kampong Katimahar'],
                            ['name' => 'Kampong Kulapis'],
                            ['name' => 'Kampong Lugu'],
                            ['name' => 'Kampong Mulaut'],
                            ['name' => 'Kampong Pasai'],
                            ['name' => 'Kampong Peninjau'],
                            ['name' => 'Kampong Selayun'],
                            ['name' => 'Kampong Sengkurong A'],
                            ['name' => 'Kampong Sengkurong B'],
                            ['name' => 'Kampong Tagap'],
                            ['name' => 'Kampong Tanjong Nangka'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Serasa',
                        'village' => [
                            ['name' => 'Muara Town'],
                            ['name' => 'Kampong Kapok'],
                            ['name' => 'Kampong Meragang'],
                            ['name' => 'RPN Meragang'],
                            ['name' => 'Kampong Sabun'],
                            ['name' => 'Kampong Serasa'],
                            ['name' => 'Perpindahan Serasa'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sungai Kebun',
                        'village' => [
                            ['name' => 'Kampong Bolkiah A'],
                            ['name' => 'Kampong Bolkiah B'],
                            ['name' => 'Kampong Setia A'],
                            ['name' => 'Kampong Setia B'],
                            ['name' => 'Kampong Sungai Siamas'],
                            ['name' => 'Kampong Ujong Kelinik'],
                            ['name' => 'Kampong Sungai Kebun'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sungai Kedayan',
                        'village' => [
                            ['name' => 'Kampong Ujong Tanjong'],
                            ['name' => 'Kampong Bukit Salat'],
                            ['name' => 'Kampong Kuala Peminyak'],
                            ['name' => 'Kampong Pemancha Lama'],
                            ['name' => 'Kampong Sumbiling Lama'],
                            ['name' => 'Kampong Sungai Kedayan A'],
                            ['name' => 'Kampong Sungai Kedayan B'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Tamoi',
                        'village' => [
                            ['name' => 'Kampong Limbongan'],
                            ['name' => 'Kampong Pengiran Bendahara Lama'],
                            ['name' => 'Kampong Pengiran Kerma Indera Lama'],
                            ['name' => 'Kampong Pengiran Tajuddin Hitam'],
                            ['name' => 'Kampong Tamoi Tengah'],
                            ['name' => 'Kampong Tamoi Ujong'],
                            ['name' => 'Kampong Ujong Bukit'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Tutong',
                'mukim' => [
                    [
                        'name' => 'Mukim Keriam',
                        'village' => [
                            ['name' => 'Kampong Bukit Panggal'],
                            ['name' => 'Kampong Ikas'],
                            ['name' => 'Kampong Keriam'],
                            ['name' => 'Kampong Kupang'],
                            ['name' => 'Kampong Luagan Dudok'],
                            ['name' => 'Kampong Maraburong'],
                            ['name' => 'Kampong Sinaut'],
                            ['name' => 'Kampong Sungai Kelugos'],
                            ['name' => 'Padang Tembak Binturan'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kiudang',
                        'village' => [
                            ['name' => 'Kampong Bakiau'],
                            ['name' => 'Kampong Batang Mitus'],
                            ['name' => 'Kampong Birau'],
                            ['name' => 'Kampong Kebia'],
                            ['name' => 'Kampong Kiudang'],
                            ['name' => 'Kampong Luagan Timbaran'],
                            ['name' => 'Kampong Mungkom'],
                            ['name' => 'Kampong Pad Nunok'],
                            ['name' => 'Kampong Pangkalan Mau'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Lamunin ',
                        'village' => [
                            ['name' => 'Kampong Bintudoh'],
                            ['name' => 'Kampong Biong'],
                            ['name' => 'Kampong Bukit Bang Dalam'],
                            ['name' => 'Kampong Bukit Barun'],
                            ['name' => 'Kampong Bukit Sulang'],
                            ['name' => 'Kampong Kuala Abang'],
                            ['name' => 'Kampong Lamunin'],
                            ['name' => 'Kampong Layong'],
                            ['name' => 'Kampong Menengah'],
                            ['name' => 'Kampong Panchong'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Pekan Tutong',
                        'village' => [
                            ['name' => 'Bukit Bendera'],
                            ['name' => 'Kampong Kandang'],
                            ['name' => 'Kampong Kuala Tutong'],
                            ['name' => 'Kampong Panchor Dulit'],
                            ['name' => 'Kampong Panchor Papan'],
                            ['name' => 'Kampong Penabai'],
                            ['name' => 'Kampong Penanjong'],
                            ['name' => 'Kampong Petani'],
                            ['name' => 'Kampong Sengkarai'],
                            ['name' => 'Kampong Serambangun'],
                            ['name' => 'Kampong Tanah Burok'],
                            ['name' => 'Tutong Kem'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Rambai',
                        'village' => [
                            ['name' => 'Bukit Ladan Forest Reserve'],
                            ['name' => 'Kampong Bedawan'],
                            ['name' => 'Kampong Belabau'],
                            ['name' => 'Kampong Benutan'],
                            ['name' => 'Kampong Kuala Ungar'],
                            ['name' => 'Kampong Lalipo'],
                            ['name' => 'Kampong Merimbun'],
                            ['name' => 'Kampong Rambai'],
                            ['name' => 'Kampong Supon Besar'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Tanjong Maya',
                        'village' => [
                            ['name' => 'Kampong Bangunggos'],
                            ['name' => 'Kampong Bukit Sibut'],
                            ['name' => 'Kampong Bukit Udal'],
                            ['name' => 'Kampong Liulon'],
                            ['name' => 'Kampong Lubok Pulau'],
                            ['name' => 'Kampong Pemadang'],
                            ['name' => 'Kampong Penapar'],
                            ['name' => 'Kampong Sebakit'],
                            ['name' => 'Kampong Tanjong Maya'],
                            ['name' => 'Kampong Tanjong Panjang'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Telisai',
                        'village' => [
                            ['name' => 'Kampong Bukit Beruang'],
                            ['name' => 'Kampong Bukit Pasir'],
                            ['name' => 'Kampong Danau'],
                            ['name' => 'Kampong Keramut'],
                            ['name' => 'Kampong Panapar-Danau'],
                            ['name' => 'Kampong Pangkalan Dalai'],
                            ['name' => 'Kampong Penyatang'],
                            ['name' => 'Kampong Sungai Paku'],
                            ['name' => 'Kampong Telamba'],
                            ['name' => 'Kampong Telisai'],
                            ['name' => 'Kampong Tumpuan Ugas'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Ukong',
                        'village' => [
                            ['name' => 'Kampong Bukit'],
                            ['name' => 'Kampong Long Mayan'],
                            ['name' => 'Kampong Pak Bidang'],
                            ['name' => 'Kampong Pengkalan Raan'],
                            ['name' => 'Kampong Sungai Damit Pemadang'],
                            ['name' => 'Kampong Ukong'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Belait',
                'mukim' => [
                    [
                        'name' => 'Mukim Bukit Sawat',
                        'village' => [
                            ['name' => 'Kampong Bisut'],
                            ['name' => 'Kampong Bukit Kandol'],
                            ['name' => 'Kampong Bukit Sawat'],
                            ['name' => 'Kampong Melayan'],
                            ['name' => 'Kampong Merangking'],
                            ['name' => 'Kampong Merangking Hilir'],
                            ['name' => 'Kampong Merangking Ulu'],
                            ['name' => 'Kampong Sungai Mau'],
                            ['name' => 'Kampong Pulau Apil'],
                            ['name' => 'Kampong Tarap'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kuala Balai',
                        'village' => [
                            ['name' => 'Kampong Kajitan'],
                            ['name' => 'Kampong Kuala Balai'],
                            ['name' => 'Kampong Lubuk Lanyap'],
                            ['name' => 'Kampong Lubuk Tapang'],
                            ['name' => 'Kampong Pengalayan'],
                            ['name' => 'Kampong Penyarap'],
                            ['name' => 'Kampong Sungai Damit'],
                            ['name' => 'Kampong Sungai Lutong'],
                            ['name' => 'Kampong Tanjung Ranggas'],
                            ['name' => 'Kampong Tanjung Sudai'],
                            ['name' => 'Kampong Tugong'],
                            ['name' => 'Kampong Sungai Mendaram'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kuala Belait',
                        'village' => [
                            ['name' => 'Kampong Mumong A'],
                            ['name' => 'Kampong Mumong B'],
                            ['name' => 'Kampong Pandan A'],
                            ['name' => 'Kampong Pandan B'],
                            ['name' => 'Kampong Pandan C'],
                            ['name' => 'Kampong Sungai Teraban'],
                            ['name' => 'Kuala Belait'],
                            ['name' => 'Kampong Sungai Duhon'],
                            ['name' => 'Kampong Melayu Asli'],
                            ['name' => 'Kampong China'],
                            ['name' => 'Kampong Sungai Melilit'],
                            ['name' => 'Kampong Rasau'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Labi',
                        'village' => [
                            ['name' => 'Kampong Bukit Puan'],
                            ['name' => 'Kampong Gatas'],
                            ['name' => 'Kampong Kenapol'],
                            ['name' => 'Kampong Labi'],
                            ['name' => 'Kampong Labi Lama'],
                            ['name' => 'Kampong Mendaram Kecil'],
                            ['name' => 'Kampong Rampayoh'],
                            ['name' => 'Kampong Ratan'],
                            ['name' => 'Kampong Sungai Petai'],
                            ['name' => 'Kampong Tanajor'],
                            ['name' => 'Kampong Tapang Lupak'],
                            ['name' => 'Kampong Teraja'],
                            ['name' => 'Kampong Terawan'],
                            ['name' => 'Kampong Terunan'],
                            ['name' => 'Kampong Labi I'],
                            ['name' => 'Kampong Labi II'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Liang',
                        'village' => [
                            ['name' => 'Kampong Agis-Agis'],
                            ['name' => 'Kampong Keluyoh'],
                            ['name' => 'Kampong Lilas'],
                            ['name' => 'Kampong Lumut'],
                            ['name' => 'Kampong Lumut Tersusun'],
                            ['name' => 'Kampong Perumpong'],
                            ['name' => 'Kampong Sungai Bakong'],
                            ['name' => 'Kampong Sungai Gana'],
                            ['name' => 'Kampong Sungai Kang'],
                            ['name' => 'Kampong Sungai Kuru'],
                            ['name' => 'Kampong Sungai Lalit'],
                            ['name' => 'Kampong Sungai Liang'],
                            ['name' => 'Kampong Sungai Tali'],
                            ['name' => 'Kampong Sungai Taring'],
                            ['name' => 'Kampong Tunggulian'],
                            ['name' => 'Perkhemahan Lumut'],
                            ['name' => 'RPN Lumut Area 1'],
                            ['name' => 'RPN Lumut Area 2'],
                            ['name' => 'Kampong Lumut I'],
                            ['name' => 'Kampong Lumut II'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Melilas',
                        'village' => [
                            ['name' => 'Kampong Melilas'],
                            ['name' => 'Kampong Bukit Tuding'],
                            ['name' => 'Kampong Bang Garang'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Seria',
                        'village' => [
                            ['name' => 'Kampong Lorong Tiga Selatan'],
                            ['name' => 'Kampong Sungai Bera'],
                            ['name' => 'Kampong Panaga'],
                            ['name' => 'RPN Lorong Tengah'],
                            ['name' => 'Seria Town Area 1'],
                            ['name' => 'Seria Town Area 2'],
                            ['name' => 'Kampong Perakong'],
                            ['name' => 'Kampong Jabang'],
                            ['name' => 'Kampong Badas'],
                            ['name' => 'Kampong Anduki'],
                            ['name' => 'Ibu Pejabat Shell'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sukang',
                        'village' => [
                            ['name' => 'Kampong Apak-Apak'],
                            ['name' => 'Kampong Dungun'],
                            ['name' => 'Kampong Kukub'],
                            ['name' => 'Kampong Sukang'],
                            ['name' => 'Kampong Sungai Hilir'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Temburong',
                'mukim' => [
                    [
                        'name' => 'Mukim Amo',
                        'village' => [
                            ['name' => 'Kampong Amo A'],
                            ['name' => 'Kampong Amo B'],
                            ['name' => 'Kampong Amo C'],
                            ['name' => 'Kampong Batang Duri'],
                            ['name' => 'Kampong Belaban'],
                            ['name' => 'Kampong Biang'],
                            ['name' => 'Kampong Parit'],
                            ['name' => 'Kampong Selangan'],
                            ['name' => 'Kampong Sibulu'],
                            ['name' => 'Kampong Sibut'],
                            ['name' => 'Kampong Sumbiling Baru'],
                            ['name' => 'Kampong Sumbiling Lama'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Bangar',
                        'village' => [
                            ['name' => 'Pekan Bangar'],
                            ['name' => 'Kampong Bang Bulan'],
                            ['name' => 'Kampong Batang Tuau'],
                            ['name' => 'Kampong Batu Bejarah'],
                            ['name' => 'Kampong Belingos'],
                            ['name' => 'Kampong Gadong'],
                            ['name' => 'Kampong Kinalog'],
                            ['name' => 'Kampong Lagau'],
                            ['name' => 'Kampong Menengah'],
                            ['name' => 'Kampong Parit Belayang'],
                            ['name' => 'Kampong Piungan'],
                            ['name' => 'Kampong Puni'],
                            ['name' => 'Kampong Semamang'],
                            ['name' => 'Kampong Subok'],
                            ['name' => 'Kampong Seri Tanjong Belayang'],
                            ['name' => 'Kampong Sungai Tanam'],
                            ['name' => 'Kampong Sungai Tanit'],
                            ['name' => 'Kampong Sungai Sulok'],
                            ['name' => 'Kampong Ujong Jalan'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Batu Apoi',
                        'village' => [
                            ['name' => 'Kampong Batu Apoi'],
                            ['name' => 'Kampong Gadong Baru'],
                            ['name' => 'Kampong Lakiun'],
                            ['name' => 'Kampong Lamaling'],
                            ['name' => 'Kampong Luagan'],
                            ['name' => 'Kampong Negalang Ering'],
                            ['name' => 'Kampong Negalang Unat'],
                            ['name' => 'Kampong Peliunan'],
                            ['name' => 'Kampong Rebada'],
                            ['name' => 'Kampong Selapon'],
                            ['name' => 'Kampong Selilit'],
                            ['name' => 'Kampong Sekurop'],
                            ['name' => 'Kampong Simbatang'],
                            ['name' => 'Kampong Sungai Radang'],
                            ['name' => 'Kampong Tanjong Bungar'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Bokok',
                        'village' => [
                            ['name' => 'Kampong Bakarat'],
                            ['name' => 'Kampong Belais Besar'],
                            ['name' => 'Kampong Belais Kecil'],
                            ['name' => 'Kampong Bokok'],
                            ['name' => 'Kampong Buda-Buda'],
                            ['name' => 'Kampong Kenua'],
                            ['name' => 'Kampong Lepong Baru'],
                            ['name' => 'Kampong Maniup'],
                            ['name' => 'Kampong Paya Bagangan'],
                            ['name' => 'Kampong Rataie'],
                            ['name' => 'Kampong Semabat'],
                            ['name' => 'Kampong Simbatang'],
                            ['name' => 'Kampong Temada'],
                            ['name' => 'Kampong Perpindahan Rataie'],
                            ['name' => 'Kampong Rakyat Jati'],
                        ],
                    ],
                    [
                        'name' => 'Mukim Labu',
                        'village' => [
                            ['name' => 'Kampong Labu Estate'],
                            ['name' => 'Kampong Piasau-Piasau'],
                            ['name' => 'Kampong Senukoh'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($districts as $district) {
            $district_row = District::create([
                'name' => $district['name'], // 1st iteration Brunei-muara

            ]);
            foreach ($district['mukim'] as $mukim) {
                $mukim_row = Mukim::create([
                    'name' => $mukim['name'],
                    'district_id' => $district_row->id,
                ]);
                foreach ($mukim['village'] as $village) {
                    $village_row = Village::create([
                        'name' => $village['name'],
                        'mukim_id' => $mukim_row->id,
                    ]);
                }
            }
        }

        // DB::table('district')->insert([
        //             [

        //                 'name' => 'Brunei-Muara',
        //             ],
        //             [

        //                 'name' =>'Tutong',
        //             ],
        //             [

        //                 'name' => 'Belait',
        //             ],
        //             [

        //                 'name' => 'Temburong',
        //             ],
        //         ]);
        //         DB::table('mukim')->insert([
        //             [

        //                 'name' => 'Berakas "A"',
        //             ],
        //             [

        //                 'name' =>'Berakas"B"',
        //             ],
        //             [

        //                 'name' => 'Burong Pingai Ayer',
        //             ],
        //             [

        //                 'name' => 'Gadong "A"',
        //             ],
        //             [

        //                 'name' => 'Gadong "B"',
        //             ],
        //             [

        //                 'name' =>'Kianggeh',
        //             ],
        //             [

        //                 'name' => 'Kilanas',
        //             ],
        //             [

        //                 'name' => 'Kota Batu',
        //             ],
        //             [

        //                 'name' => 'Lumapas',
        //             ],
        //             [

        //                 'name' =>'Mentiri',
        //             ],
        //             [

        //                 'name' => 'Pangkalan Batu',
        //             ],
        //             [

        //                 'name' => 'Peramu',
        //             ],
        //             [

        //                 'name' => 'Saba',
        //             ],
        //             [

        //                 'name' =>'Sengkurong',
        //             ],
        //             [

        //                 'name' => 'Serasa',
        //             ],
        //             [

        //                 'name' => 'Sungai Kebun',
        //             ],
        //             [

        //                 'name' => 'Sungai Kedayan',
        //             ],
        //             [

        //                 'name' =>'Tamoi',
        //             ],
        //             [

        //                 'name' => 'Bukit Sawat',
        //             ],
        //             [

        //                 'name' => 'Kuala Balai',
        //             ],
        //             [

        //                 'name' => 'Kuala Belait',
        //             ],
        //             [

        //                 'name' =>'Labi',
        //             ],
        //             [

        //                 'name' => 'Liang',
        //             ],
        //             [

        //                 'name' => 'Melilas',
        //             ],
        //             [

        //                 'name' => 'Seria',
        //             ],
        //             [

        //                 'name' =>'Sukang',
        //             ],
        //             [

        //                 'name' => 'Keriam',
        //             ],
        //             [

        //                 'name' => 'Kiudang',
        //             ],
        //             [

        //                 'name' => 'Lamunin',
        //             ],
        //             [

        //                 'name' =>'Pekan Tutong',
        //             ],
        //             [

        //                 'name' => 'Rambai',
        //             ],
        //             [

        //                 'name' => 'Tanjong Maya',
        //             ],
        //             [

        //                 'name' => 'Telisai',
        //             ],
        //             [

        //                 'name' =>'Ukong',
        //             ],
        //             [

        //                 'name' => 'Amo',
        //             ],
        //             [

        //                 'name' => 'Bangar',
        //             ],
        //             [

        //                 'name' => 'Batu Apoi',
        //             ],
        //             [

        //                 'name' =>'Bokok',
        //             ],
        //             [

        //                 'name' => 'Labu',
        //             ],
        //         ]);
        //         DB::table('village')->insert([
        //             [
        //                 'name' => 'Kampong Anggerek Desa',
        //             ],
        //             [
        //                 'name' =>'Kampong Burong Pingai Berakas',
        //             ],
        //             [
        //                 'name' => 'Kampong Jaya Bakti',
        //             ],
        //             [
        //                 'name' => 'Kampong Jaya Setia',
        //             ],
        //             [
        //                 'name' => 'Kampong Lambak',
        //             ],
        //             [
        //                 'name' =>'Kampong Lambak Kiri',
        //             ],
        //             [
        //                 'name' => 'Kampong Orang Kaya Besar Imas',
        //             ],
        //             [
        //                 'name' => 'Kampong Pancha Delima',
        //             ],
        //             [
        //                 'name' => 'Kampong Pengiran Siraja Muda Delima Satu',
        //             ],
        //             [
        //                 'name' =>'Kampong Pulaie',
        //             ],
        //             [
        //                 'name' => 'Kampong Serusop',
        //             ],
        //             [
        //                 'name' => 'Kampong Terunjing',
        //             ],
        //             [
        //                 'name' => 'Kawasan Jabatan-Jabatan dan Perumahan Kerajaan',
        //             ],
        //             [
        //                 'name' =>'Perkhemahan Berakas',
        //             ],
        //             [
        //                 'name' => 'Kampong Lambak Kanan',
        //             ],
        //             [
        //                 'name' => 'Kampong Madang',
        //             ],
        //             [
        //                 'name' => 'Kampong Manggis',
        //             ],
        //             [
        //                 'name' =>'Kampong Salambigar',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Akar',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Hanching',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Orok',
        //             ],
        //             [
        //                 'name' =>'Kampong Sungai Tilong',
        //             ],
        //             [
        //                 'name' => 'Kampong Burong Pingai Ayer',
        //             ],
        //             [
        //                 'name' => 'Kampong Lurong Dalam',
        //             ],
        //             [
        //                 'name' => 'Kampong Pandai Besi "A"',
        //             ],
        //             [
        //                 'name' =>'Kampong Pandai Besi "B"',
        //             ],
        //             [
        //                 'name' => 'Kampong Pekan Lama',
        //             ],
        //             [
        //                 'name' => 'Kampong Pengiran Setia Negara',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Pandan "A"',
        //             ],
        //             [
        //                 'name' =>'Kampong Sungai Pandan "B"',
        //             ],
        //             [
        //                 'name' => 'Kampong Katok',
        //             ],
        //             [
        //                 'name' => 'Kampong Rimba',
        //             ],
        //             [
        //                 'name' => 'Kampong Tungku',
        //             ],
        //             [
        //                 'name' =>'RPN Kampong Rimba',
        //             ],
        //             [
        //                 'name' => 'STKRJ Kampong Katok "A"',
        //             ],
        //             [
        //                 'name' => 'STKRJ Kampong Rimba',
        //             ],
        //             [
        //                 'name' => 'STKRJ Kampong Tungku Area 1',
        //             ],
        //             [
        //                 'name' =>'STKRJ Kampong Tungku Area 2',
        //             ],
        //             [
        //                 'name' => 'Kampong Beribi',
        //             ],
        //             [
        //                 'name' => 'Kampong Kiarong',
        //             ],
        //             [
        //                 'name' =>'Kampong Kiulap',
        //             ],
        //             [
        //                 'name' => 'Kampong Mata-mata',
        //             ],
        //             [
        //                 'name' => 'Kampong Menglait',
        //             ],
        //             [
        //                 'name' => 'Kampong Pengkalan Gadong',
        //             ],
        //             [
        //                 'name' =>'Kampong Perpindahan Mata-Mata',
        //             ],
        //             [
        //                 'name' => 'STKRJ Katok "B"',
        //             ],
        //             [
        //                 'name' => 'Diplomatic Enclave Area',
        //             ],
        //             [
        //                 'name' => 'Kampong Berangan',
        //             ],
        //             [
        //                 'name' =>'Kampong Kianggeh',
        //             ],
        //             [
        //                 'name' => 'Kampong Kumbang Pasang',
        //             ],
        //             [
        //                 'name' => 'Kampong Melabau',
        //             ],
        //             [
        //                 'name' => 'Kampong Parit',
        //             ],
        //             [
        //                 'name' =>'Kampong Pusar Ulak',
        //             ],
        //             [
        //                 'name' => 'Kampong Tasek Lama',
        //             ],
        //             [
        //                 'name' => 'Kampong Tumasek',
        //             ],
        //             [
        //                 'name' => 'Kampong Tungkadeh',
        //             ],
        //             [
        //                 'name' =>'Pusat Bandar',
        //             ],
        //             [
        //                 'name' => 'Kampong Bengkurong',
        //             ],
        //             [
        //                 'name' => 'Kampong Bunut',
        //             ],
        //             [
        //                 'name' => 'Kampong Bunut Perpindahan',
        //             ],
        //             [
        //                 'name' =>'Kampong Burong Lepas',
        //             ],
        //             [
        //                 'name' => 'Kampong Kilanas',
        //             ],
        //             [
        //                 'name' => 'Kampong Jangsak',
        //             ],
        //             [
        //                 'name' => 'Kampong Madewa',
        //             ],
        //             [
        //                 'name' =>'Kampong Sinarubai',
        //             ],
        //             [
        //                 'name' => 'Kampong Tanjong Bunut',
        //             ],
        //             [
        //                 'name' => 'Kampong Tasek Meradun',
        //             ],
        //             [
        //                 'name' => 'Kampong Telanai',
        //             ],
        //             [
        //                 'name' =>'Kampong Belimbing',
        //             ],
        //             [
        //                 'name' => 'Kampong Buang Tawar',
        //             ],
        //             [
        //                 'name' => 'Kampong Dato Gandi',
        //             ],
        //             [
        //                 'name' => 'Kampong Kota Batu',
        //             ],
        //             [
        //                 'name' =>'Kampong Menunggol',
        //             ],
        //             [
        //                 'name' => 'Kampong Pelambayan',
        //             ],
        //             [
        //                 'name' => 'Kampong Pintu Malim',
        //             ],
        //             [
        //                 'name' => 'Kampong Pudak',
        //             ],
        //             [
        //                 'name' =>'Kampong Riong',
        //             ],
        //             [
        //                 'name' => 'Kampong Serdang',
        //             ],
        //             [
        //                 'name' => 'Kampong Subok',
        //             ],
        //             [
        //                 'name' =>'Kampong Sungai Belukut',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Besar',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Lampai',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Matan',
        //             ],
        //             [
        //                 'name' =>'Kampong Sungai Bunga',
        //             ],
        //             [
        //                 'name' => 'Pulau Sibungor',
        //             ],
        //             [
        //                 'name' => 'Pulau Baru-Baru',
        //             ],
        //             [
        //                 'name' => 'Kampong Baong',
        //             ],
        //             [
        //                 'name' =>'Kampong Buang Sakar',
        //             ],
        //             [
        //                 'name' => 'Kampong Buang Tekurok',
        //             ],
        //             [
        //                 'name' => 'Kampong Kasat',
        //             ],
        //             [
        //                 'name' => 'Kampong Kilugus',
        //             ],
        //             [
        //                 'name' =>'Kampong Lumapas',
        //             ],
        //             [
        //                 'name' => 'Kampong Lupak Luas',
        //             ],
        //             [
        //                 'name' => 'Kampong Tarap Bau',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Asam',
        //             ],
        //             [
        //                 'name' =>'Kampong Panchor',
        //             ],
        //             [
        //                 'name' => 'Kampong Putat',
        //             ],
        //             [
        //                 'name' => 'Kampong Batu Marang',
        //             ],
        //             [
        //                 'name' => 'Kampong Mentiri',
        //             ],
        //             [
        //                 'name' =>'Kampong Pengkalan Sibabau',
        //             ],
        //             [
        //                 'name' => 'Kampong Salar',
        //             ],
        //             [
        //                 'name' => 'Kampong Sungai Buloh',
        //             ],
        //             [
        //                 'name' => 'Kampong Tanah Jambu',
        //             ],
        //             [
        //                 'name' =>'RPN Mentiri Area "A"',
        //             ],
        //             [
        //                 'name' => 'RPN Mentiri Area "B"',
        //             ],
        //             [
        //                 'name' => 'RPN Panchor Mengkubau',
        //             ],
        //             [
        //                 'name' => 'Kampong Batang Perhentian',
        //             ],
        //             [
        //                 'name' =>'Kampong Batong',
        //             ],
        //             [
        //                 'name' => 'Kampong Batu Ampar',
        //             ],
        //             [
        //                 'name' => 'Kampong Bebatik',
        //             ],
        //             [
        //                 'name' => 'Kampong Bebuloh',
        //             ],
        //             [
        //                 'name' =>'Kampong Imang',
        //             ],
        //             [
        //                 'name' => 'Kampong Junjongan',
        //             ],
        //             [
        //                 'name' => 'Kampong Kuala Lurah',
        //             ],
        //             [
        //                 'name' => 'Kampong Limau Manis',
        //             ],
        //             [
        //                 'name' =>'Kampong Masin',
        //             ],
        //             [
        //                 'name' => 'Kampong Panchor Murai',
        //             ],
        //             [
        //                 'name' =>'Kampong Parit',
        //             ],
        //             [
        //                 'name' => 'Kampong Pengkalan Batu',
        //             ],
        //             [
        //                 'name' => 'Kampong Wasan',
        //             ],
        //             [
        //                 'name' => 'Kampong Bakut Berumput',
        //             ],
        //             [
        //                 'name' =>'Kampong Bakut Pengiran Siraja Muda "A"',
        //             ],
        //             [
        //                 'name' => 'Kampong Bakut Pengiran Siraja Muda "B"',
        //             ],
        //             [
        //                 'name' => 'Kampong Lurong Sikuna',
        //             ],
        //             [
        //                 'name' => 'Kampong Pekilong Muara',
        //             ],
        //             [
        //                 'name' =>'Kampong Peramu',
        //             ],
        //             [
        //                 'name' => 'Kampong Setia Pahlawan',
        //             ],
        //             [
        //                 'name' => 'Kampong Saba Darat "A"',
        //             ],
        //             [
        //                 'name' => 'Kampong Saba Darat "B"',
        //             ],
        //             [
        //                 'name' =>'Kampong Saba Laut',
        //             ],
        //             [
        //                 'name' => 'Kampong Saba Tengah',
        //             ],
        //             [
        //                 'name' => 'Kampong Saba Ujong',
        //             ],
        //             [
        //                 'name' => 'Kampong Jerudong',
        //             ],
        //             [
        //                 'name' =>'Kampong Katimahar',
        //             ],
        //             [
        //                 'name' => 'Kampong Kulapis',
        //             ],
        //             [
        //                 'name' =>'Kampong Lugu',
        //             ],
        //             [
        //                 'name' => 'Kampong Mulaut',
        //             ],
        //             [
        //                 'name' => 'Kampong Pasai',
        //             ],
        //             [
        //                 'name' => 'Kampong Peninjau',
        //             ],
        //             [
        //                 'name' =>'Kampong Selayun',
        //             ],
        //             [
        //                 'name' => 'Kampong Sengkurong "A"',
        //             ],
        //             [

        //                 'name' => 'Kampong Sengkurong "B"',
        //             ],
        //             [

        //                 'name' => 'Kampong Tagap',
        //             ],
        //             [

        //                 'name' =>'Kampong Tanjong Nangka',
        //             ],
        //             [

        //                 'name' => 'Muara Town',
        //             ],
        //             [

        //                 'name' => 'Kampong Kapok',
        //             ],
        //             [

        //                 'name' => 'Kampong Meragang',
        //             ],
        //             [

        //                 'name' =>'RPN Meragang',
        //             ],
        //             [

        //                 'name' => 'Kampong Sabun',
        //             ],
        //             [

        //                 'name' => 'Kampong Serasa',
        //             ],
        //             [

        //                 'name' => 'Perpindahan Serasa',
        //             ],
        //             [

        //                 'name' =>'Kampong Bolkiah "A"',
        //             ],
        //             [

        //                 'name' => 'Kampong Bolkiah "B"',
        //             ],
        //             [

        //                 'name' =>'Kampong Setia "A"',
        //             ],
        //             [

        //                 'name' => 'Kampong Setia "B"',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Siamas',
        //             ],
        //             [

        //                 'name' => 'Kampong Ujong Kelinik',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Kebun',
        //             ],
        //             [

        //                 'name' => 'Kampong Sumbiling Lama',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Salat',
        //             ],
        //             [

        //                 'name' => 'Kampong Ujong Tanjong',
        //             ],
        //             [

        //                 'name' =>'Kampong Kuala Peminyak',
        //             ],
        //             [

        //                 'name' => 'Kampong Pemancha Lama',
        //             ],
        //             [

        //                 'name' => 'Kampong Sumbiling Lama',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Kedayan "A"',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Kedayan "B"',
        //             ],
        //             [

        //                 'name' => 'Kampong Limbongan',
        //             ],
        //             [

        //                 'name' => 'Kampong Pengiran Bendahara Lama',
        //             ],
        //             [

        //                 'name' => 'Kampong Pengiran Kerma Indera Lama',
        //             ],
        //             [

        //                 'name' =>'Kampong Pengiran Tajuddin Hitam',
        //             ],
        //             [

        //                 'name' => 'Kampong Tamoi Tengah',
        //             ],
        //             [

        //                 'name' =>'Kampong Tamoi Ujong',
        //             ],
        //             [

        //                 'name' => 'Kampong Ujong Bukit',
        //             ],
        //             [

        //                 'name' => 'Kampong Amo',
        //             ],
        //             [

        //                 'name' => 'Kampong Batang Duri',
        //             ],
        //             [

        //                 'name' =>'Kampong Belaban',
        //             ],
        //             [

        //                 'name' => 'Kampong Biang',
        //             ],
        //             [

        //                 'name' => 'Kampong Parit',
        //             ],
        //             [

        //                 'name' => 'Kampong Selangan',
        //             ],
        //             [

        //                 'name' =>'Kampong Sibulu',
        //             ],
        //             [

        //                 'name' => 'Kampong Sibut',
        //             ],
        //             [

        //                 'name' => 'Kampong Sumbiling Baru',
        //             ],
        //             [

        //                 'name' => 'Kampong Sumbiling Lama',
        //             ],
        //             [

        //                 'name' =>'Pekan Bangar',
        //             ],
        //             [

        //                 'name' => 'Kampong Bang Bulan',
        //             ],
        //             [

        //                 'name' => 'Kampong Batang Tuau',
        //             ],
        //             [

        //                 'name' => 'Kampong Batu Bejarah',
        //             ],
        //             [

        //                 'name' =>'Kampong Belingos',
        //             ],
        //             [

        //                 'name' => 'Kampong Gadong',
        //             ],
        //             [

        //                 'name' =>'Kampong Kinalog',
        //             ],
        //             [

        //                 'name' => 'Kampong Lagau',
        //             ],
        //             [

        //                 'name' => 'Kampong Menengah',
        //             ],
        //             [

        //                 'name' => 'Kampong Parit Belayang',
        //             ],
        //             [

        //                 'name' =>'Kampong Piungan',
        //             ],
        //             [

        //                 'name' => 'Kampong Puni',
        //             ],
        //             [

        //                 'name' => 'Kampong Semamang',
        //             ],
        //             [

        //                 'name' => 'Kampong Seri Tanjong Belayang',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Tanam',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Tanit',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Sulok',
        //             ],
        //             [

        //                 'name' => 'Kampong Ujong Jalan',
        //             ],
        //             [

        //                 'name' =>'Kampong Batu Apoi',
        //             ],
        //             [

        //                 'name' => 'Kampong Gadong Baru',
        //             ],
        //             [

        //                 'name' => 'Kampong Lakiun',
        //             ],
        //             [

        //                 'name' => 'Kampong Lamaling',
        //             ],
        //             [

        //                 'name' =>'Kampong Luagan',
        //             ],
        //             [

        //                 'name' => 'Kampong Negalang Ering',
        //             ],
        //             [

        //                 'name' => 'Kampong Negalang Unat',
        //             ],
        //             [

        //                 'name' =>'Kampong Peliunan',
        //             ],
        //             [

        //                 'name' => 'Kampong Rebada',
        //             ],
        //             [

        //                 'name' => 'Kampong Selapon',
        //             ],
        //             [

        //                 'name' => 'Kampong Selilit',
        //             ],
        //             [

        //                 'name' =>'Kampong Simbatang',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Radang',
        //             ],
        //             [

        //                 'name' => 'Kampong Tanjong Bungar',
        //             ],
        //             [

        //                 'name' => 'Kampong Bakarut',
        //             ],
        //             [

        //                 'name' =>'Kampong Belais Besar',
        //             ],
        //             [

        //                 'name' => 'Kampong Belais Kecil',
        //             ],
        //             [

        //                 'name' => 'Kampong Bokok',
        //             ],
        //             [

        //                 'name' => 'Kampong Buda-Buda',
        //             ],
        //             [

        //                 'name' =>'Kampong Kenua',
        //             ],
        //             [

        //                 'name' => 'Kampong Lepong',
        //             ],
        //             [

        //                 'name' => 'Kampong Meniup',
        //             ],
        //             [

        //                 'name' => 'Kampong Paya Bangangan',
        //             ],
        //             [

        //                 'name' =>'Kampong Rataie',
        //             ],
        //             [

        //                 'name' => 'Kampong Semabat',
        //             ],
        //             [

        //                 'name' => 'Kampong Simabatang',
        //             ],
        //             [

        //                 'name' => 'Kampong Temada',
        //             ],
        //             [

        //                 'name' =>'Kampong Labu Estate',
        //             ],
        //             [

        //                 'name' => 'Kampong Piasau-Piasau',
        //             ],
        //             [

        //                 'name' => 'Kampong Senukoh',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Panggal',
        //             ],
        //             [

        //                 'name' =>'Kampong Ikas',
        //             ],
        //             [

        //                 'name' => 'Kampong Keriam',
        //             ],
        //             [

        //                 'name' => 'Kampong Kupang',
        //             ],
        //             [

        //                 'name' => 'Kampong Luagan Dudok"',
        //             ],
        //             [

        //                 'name' =>'Kampong Maraburong',
        //             ],
        //             [

        //                 'name' => 'Kampong Sinaut',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Kelugos',
        //             ],
        //             [

        //                 'name' => 'Padang Tembak Binturan',
        //             ],
        //             [

        //                 'name' =>'Kampong Bakiau',
        //             ],
        //             [

        //                 'name' => 'Kampong Batang Mitus',
        //             ],
        //             [

        //                 'name' => 'Kampong Birau',
        //             ],
        //             [

        //                 'name' => 'Kampong Kebia',
        //             ],
        //             [

        //                 'name' =>'Kampong Kiudang',
        //             ],
        //             [

        //                 'name' => 'Kampong Luagan Timbaran',
        //             ],
        //             [

        //                 'name' => 'Kampong Mungkom',
        //             ],
        //             [

        //                 'name' =>'Kampong Pad Nunok',
        //             ],
        //             [

        //                 'name' => 'Kampong Pangkalan Mau',
        //             ],
        //             [

        //                 'name' => 'Kampong Bintudoh',
        //             ],
        //             [

        //                 'name' => 'Kampong Biong',
        //             ],
        //             [

        //                 'name' =>'Kampong Bukit Bang Dalam',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Barun',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Sulang',
        //             ],
        //             [

        //                 'name' => 'Kampong Kuala Abang',
        //             ],
        //             [

        //                 'name' =>'Kampong Lamunin',
        //             ],
        //             [

        //                 'name' => 'Kampong Layong',
        //             ],
        //             [

        //                 'name' => 'Kampong Menengah',
        //             ],
        //             [

        //                 'name' => 'Kampong Panchong',
        //             ],
        //             [

        //                 'name' =>'Bukit Bendera',
        //             ],
        //             [

        //                 'name' => 'Kampong Kandang',
        //             ],
        //             [

        //                 'name' => 'Kampong Kuala Tutong',
        //             ],
        //             [

        //                 'name' => 'Kampong Panchor Dulit',
        //             ],
        //             [

        //                 'name' =>'Kampong Panchor Papan',
        //             ],
        //             [

        //                 'name' => 'Kampong Penabai',
        //             ],
        //             [

        //                 'name' => 'Kampong Penanjong',
        //             ],
        //             [

        //                 'name' => 'Kampong Petani',
        //             ],
        //             [

        //                 'name' =>'Kampong Sengkarai',
        //             ],
        //             [

        //                 'name' => 'Kampong Serambangun',
        //             ],
        //             [

        //                 'name' => 'Kampong Tanah Burok',
        //             ],
        //             [

        //                 'name' => 'Tutong kem',
        //             ],
        //             [

        //                 'name' =>'Bukit Ladan Forest Reserve',
        //             ],
        //             [

        //                 'name' => 'Kampong Bedawan',
        //             ],
        //             [

        //                 'name' => 'Kampong Belabau',
        //             ],
        //             [

        //                 'name' => 'Kampong Benutan',
        //             ],
        //             [

        //                 'name' =>'Kampong KUala Ungar',
        //             ],
        //             [

        //                 'name' => 'Kampong Lalipo',
        //             ],
        //             [

        //                 'name' => 'Kampong Merimbun',
        //             ],
        //             [

        //                 'name' => 'Kampong Rambai',
        //             ],
        //             [

        //                 'name' =>'Kampong Supon Besar',
        //             ],
        //             [

        //                 'name' => 'Kampong Bangunggos',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Sibut',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Udal',
        //             ],
        //             [

        //                 'name' =>'Kampong Liulon',
        //             ],
        //             [

        //                 'name' => 'Kampong Lubok Pulau',
        //             ],
        //             [

        //                 'name' => 'Kampong Pemadang', //here
        //             ],
        //             [

        //                 'name' =>'Kampong Penapar',
        //             ],
        //             [

        //                 'name' => 'Kampong Sebakit',
        //             ],
        //             [

        //                 'name' => 'Kampong Tanjong Maya',
        //             ],
        //             [

        //                 'name' => 'Kampong Tanjong Panjang',
        //             ],
        //             [

        //                 'name' =>'Kampong Bukit Beruang',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Pasir',
        //             ],
        //             [

        //                 'name' => 'Kampong Danau',
        //             ],
        //             [

        //                 'name' => 'Kampong Keramut',
        //             ],
        //             [

        //                 'name' =>'Kampong Penapar-Danau',
        //             ],
        //             [

        //                 'name' => 'Kampong Pangkalan Dalai',
        //             ],
        //             [

        //                 'name' => 'Kampong Penyatang',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Paku',
        //             ],
        //             [

        //                 'name' =>'Kampong Telamba',
        //             ],
        //             [

        //                 'name' => 'Kampong Telisai',
        //             ],
        //             [

        //                 'name' => 'Kampong Tumpuan Ugas',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit',
        //             ],
        //             [

        //                 'name' =>'Kampong Long Mayan',
        //             ],
        //             [

        //                 'name' => 'Kampong Pak Bidang',
        //             ],
        //             [

        //                 'name' => 'Kampong Pengkalan Raan ',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Damit Pemadang',
        //             ],
        //             [

        //                 'name' =>'Kampong Ukong',
        //             ],
        //             [

        //                 'name' => 'Kampong Bisut',
        //             ],
        //             [

        //                 'name' =>'Kampong Bukit Kandol',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Sawat',
        //             ],
        //             [

        //                 'name' => 'Kampong Melayan',
        //             ],
        //             [

        //                 'name' => 'Kampong Merangking',
        //             ],
        //             [

        //                 'name' =>'Kampong Merangking Hilir',
        //             ],
        //             [

        //                 'name' => 'Kampong Merangking Ulu',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Mau',
        //             ],
        //             [

        //                 'name' => 'Kampong Pulau Apil',
        //             ],
        //             [

        //                 'name' =>'Kampong Tarap',
        //             ],
        //             [

        //                 'name' => 'Kampong Tanjong Ranggas',
        //             ],
        //             [

        //                 'name' => 'Kampong Kajitan',
        //             ],
        //             [

        //                 'name' => 'Kampong Kuala Balai',
        //             ],
        //             [

        //                 'name' =>'Kampong Lubuk Lanyap',
        //             ],
        //             [

        //                 'name' => 'Kampong Lubuk Tapang',
        //             ],
        //             [

        //                 'name' => 'Kampong Pengalayan',
        //             ],
        //             [

        //                 'name' => 'Kampong Penyarap',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Damit',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Lutong',
        //             ],
        //             [

        //                 'name' => 'Kampong Tanjong Sudai',
        //             ],
        //             [

        //                 'name' => 'Kampong Tugong',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Mendaram',
        //             ],
        //             [

        //                 'name' => 'Kampong Mumong "A"',
        //             ],
        //             [

        //                 'name' => 'Kampong Mumong "B"',
        //             ],
        //             [

        //                 'name' => 'Kampong Pandan "A"',
        //             ],
        //             [

        //                 'name' =>'Kampong Pandan "B"',
        //             ],
        //             [

        //                 'name' => 'Kampong Pandan "C"',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Teraban',
        //             ],
        //             [

        //                 'name' => 'Kuala Belait',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Duhon',
        //             ],
        //             [

        //                 'name' => 'Kampong Melayu Asli',
        //             ],
        //             [

        //                 'name' => 'Kampong China',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Melilit/Rasau',
        //             ],
        //             [

        //                 'name' =>'Kampong Bukit Puan',
        //             ],
        //             [

        //                 'name' => 'Kampong Gatas',
        //             ],
        //             [

        //                 'name' => 'Kampong Kenapol',
        //             ],
        //             [

        //                 'name' => 'Kampong Labi',
        //             ],
        //             [

        //                 'name' =>'Kampong Labi Lama',
        //             ],
        //             [

        //                 'name' => 'Kampong Mendaram Kecil',
        //             ],
        //             [

        //                 'name' => 'Kampong Rampayoh',
        //             ],
        //             [

        //                 'name' =>'Kampong Ratan',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Petai',
        //             ],
        //             [

        //                 'name' => 'Kampong Tanajor',
        //             ],
        //             [

        //                 'name' => 'Kampong Tapang Lupak',
        //             ],
        //             [

        //                 'name' =>'Kampong Teraja',
        //             ],
        //             [

        //                 'name' => 'Kampong Terawan',
        //             ],
        //             [

        //                 'name' => 'Kampong Terunan',
        //             ],
        //             [

        //                 'name' => 'Kampong Labi I',
        //             ],
        //             [

        //                 'name' =>'Kampong Labi II',
        //             ],
        //             [

        //                 'name' => 'Kampong Agis-Agis',
        //             ],
        //             [

        //                 'name' => 'Kampong Keluyoh',
        //             ],
        //             [

        //                 'name' => 'Kampong Lilas',
        //             ],
        //             [

        //                 'name' =>'Kampong Lumut',
        //             ],
        //             [

        //                 'name' => 'Kampong Lumut Tersusun',
        //             ],
        //             [

        //                 'name' => 'Kampong Perumpong',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Bakong',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Gana',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Kang',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Kuru',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Lalit',
        //             ],
        //             [

        //                 'name' =>'Kampong Sungai Liang',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Tali',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Taring',
        //             ],
        //             [

        //                 'name' => 'Kampong Tunggulian',
        //             ],
        //             [

        //                 'name' =>'Perkhemahan Lumut',
        //             ],
        //             [

        //                 'name' => 'RPN Lumut Area 1',
        //             ],
        //             [

        //                 'name' => 'RPN Lumut Area 2',
        //             ],
        //             [

        //                 'name' => 'Kampong Melilas',
        //             ],
        //             [

        //                 'name' =>'Kampong Bang Garang',
        //             ],
        //             [

        //                 'name' => 'Kampong Bukit Tuding',
        //             ],
        //             [

        //                 'name' => 'Kampong Lorong Tiga Selatan',
        //             ],
        //             [

        //                 'name' => 'Kampong Sungai Bera',
        //             ],
        //             [

        //                 'name' =>'Kampong Panaga',
        //             ],
        //             [

        //                 'name' => 'RPN Lorong Tengah',
        //             ],
        //             [

        //                 'name' => 'Seria Town Area 1',
        //             ],
        //             [

        //                 'name' => 'Seria Town Area 2',
        //             ],
        //             [

        //                 'name' =>'Kampong Perakong',
        //             ],
        //             [

        //                 'name' => 'Kampong Jabang',
        //             ],
        //             [

        //                 'name' => 'Kampong Badas',
        //             ],
        //             [

        //                 'name' =>'Kampong Anduki',
        //             ],
        //             [

        //                 'name' => 'Kampong Apak-Apak',
        //             ],
        //             [

        //                 'name' => 'Kampong Dungun',
        //             ],
        //             [

        //                 'name' => 'Kampong Kukub',
        //             ],
        //             [

        //                 'name' =>'Kampong Sukang',
        //             ],
        //         ]);
    }
}
