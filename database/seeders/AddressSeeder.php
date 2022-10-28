<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Mukim;
use App\Models\PostalCode;
use App\Models\Village;
use Illuminate\Database\Seeder;

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
                        'name' => 'Daerah Brunei dan Muara',
                        'village' => [
                            [
                                'name' => 'Peti Surat 01 hingga 500',
                                'postal_code' => [
                                    'name' => 'BS8670',
                                ], //postal code
                            ],
                            [
                                'name' => 'Peti Surat 501 hingga 1000',
                                'postal_code' => [
                                    'name' => 'BS8671',
                                ],
                            ],
                            [
                                'name' => 'Peti Surat 1001 hingga 1500',
                                'postal_code' => [
                                    'name' => 'BS8672',
                                ],
                            ],
                            [
                                'name' => 'Peti Surat 1501 hingga 2000',
                                'postal_code' => [
                                    'name' => 'BS8673',
                                ],
                            ],
                            [
                                'name' => 'Peti Surat 2001 hingga 2500',
                                'postal_code' => [
                                    'name' => 'BS8674',
                                ],
                            ],
                            [
                                'name' => 'Peti Surat 2501',
                                'postal_code' => [
                                    'name' => 'BS8675',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Jabatan Perdana Menteri',
                        'village' => [
                            [
                                'name' => 'Jabatan Audit',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Biro Kawalan Narkotik',
                                'postal_code' => [
                                    'name' => 'BE2110',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Biro Mencegah Rasuah',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Keselamatan Dalam Negeri',
                                'postal_code' => [
                                    'name' => 'BA1910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Penerangan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perkhidmatan Awam',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perkhidmatan Pengurusan',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Majlis-Majlis Mesyuarat Negara',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'Mufti Kerajaan Brunei ',
                                'postal_code' => [
                                    'name' => 'BS8510',
                                ],
                            ],
                            [
                                'name' => 'Polis Di Raja Brunei',
                                'postal_code' => [
                                    'name' => 'BE1710',
                                ],
                            ],
                            [
                                'name' => 'Pusat Tahanan',
                                'postal_code' => [
                                    'name' => 'BS8670',
                                ],
                            ],
                            [
                                'name' => 'Radio Televisyen Brunei',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'Suruhanjaya Perkhidmatan Awam',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ], ],
                            [
                                'name' => 'Unit Petroleum',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Hal Ehwal Dalam Negeri',
                        'village' => [
                            [
                                'name' => 'Jabatan Daerah Brunei Muara',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Pertahanan',
                        'village' => [
                            [
                                'name' => 'Kementerian Pertahanan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Gadong A',
                        'village' => [
                            [
                                'name' => 'Kampong Katok',
                                'postal_code' => [
                                    'name' => 'BE2319',
                                ],
                            ],
                            [
                                'name' => 'Kampong Rimba',
                                'postal_code' => [
                                    'name' => 'BE3119',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tungku',
                                'postal_code' => [
                                    'name' => 'BE2119',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Rimba Kawasan 1',
                                'postal_code' => [
                                    'name' => 'BE3319',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Rimba Kawasan 2',
                                'postal_code' => [
                                    'name' => 'BE3419',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Rimba Kawasan 3',
                                'postal_code' => [
                                    'name' => 'BE3519',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Rimba Kawasan 4',
                                'postal_code' => [
                                    'name' => 'BE3619',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Rimba Kawasan 5',
                                'postal_code' => [
                                    'name' => 'BE3819',
                                ],
                            ],
                            [
                                'name' => 'STKRJ Kampong Rimba',
                                'postal_code' => [
                                    'name' => 'BE3119',
                                ],
                            ],
                            [
                                'name' => 'STKRJ Kampong Tungku Area 1',
                                'postal_code' => [
                                    'name' => 'BE2519',
                                ],
                            ],
                            [
                                'name' => 'STKRJ Kampong Tungku Area 2',
                                'postal_code' => [
                                    'name' => 'BE2719',
                                ],
                            ],
                            [
                                'name' => 'STKRJ Kampong Tungku Area 3',
                                'postal_code' => [
                                    'name' => 'BE3819',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Gadong B',
                        'village' => [
                            [
                                'name' => 'Kampong Beribi',
                                'postal_code' => [
                                    'name' => 'BE1118',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kiarong',
                                'postal_code' => [
                                    'name' => 'BE1318',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kiulap',
                                'postal_code' => [
                                    'name' => 'BE1518',
                                ],
                            ],
                            [
                                'name' => 'Kampong Mata-Mata',
                                'postal_code' => [
                                    'name' => 'BE1718',
                                ],
                            ],
                            [
                                'name' => 'Kampong Menglait',
                                'postal_code' => [
                                    'name' => 'BE3919',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengkalan Gadong',
                                'postal_code' => [
                                    'name' => 'BE3719',
                                ],
                            ],
                            [
                                'name' => 'Kampong Perpindahan Mata-mata',
                                'postal_code' => [
                                    'name' => 'BE1918',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Berakas A',
                        'village' => [
                            [
                                'name' => 'Kampong Anggerek Desa',
                                'postal_code' => [
                                    'name' => 'BB3713',
                                ],
                            ],
                            [
                                'name' => 'Kampong Burong Pingai Berakas',
                                'postal_code' => [
                                    'name' => 'BB3313',
                                ],
                            ],
                            [
                                'name' => 'Kampong Jaya Bakti',
                                'postal_code' => [
                                    'name' => 'BB3113',
                                ],
                            ],
                            [
                                'name' => 'Kampong Jaya Setia',
                                'postal_code' => [
                                    'name' => 'BB2713',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lambak A',
                                'postal_code' => [
                                    'name' => 'BB1314',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lambak B',
                                'postal_code' => [
                                    'name' => 'BB1714',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lambak Kiri',
                                'postal_code' => [
                                    'name' => 'BB1214',
                                ],
                            ],
                            [
                                'name' => 'Kampong Orang Kaya Besar Imas',
                                'postal_code' => [
                                    'name' => 'BB4113',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pancha Delima',
                                'postal_code' => [
                                    'name' => 'BB4513',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengiran Siraja Muda Delima Satu',
                                'postal_code' => [
                                    'name' => 'BB5113',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pulaie',
                                'postal_code' => [
                                    'name' => 'BB4313',
                                ],
                            ],
                            [
                                'name' => 'Kampong Serusop',
                                'postal_code' => [
                                    'name' => 'BB2313',
                                ],
                            ],
                            [
                                'name' => 'Kampong Terunjing',
                                'postal_code' => [
                                    'name' => 'BB1514',
                                ],
                            ],
                            [
                                'name' => 'Kawasan Jabatan-Jabatan dan Perumahan Kerajaan',
                                'postal_code' => [
                                    'name' => 'BB3513',
                                ],
                            ],
                            [
                                'name' => 'Perkhemahan Berakas',
                                'postal_code' => [
                                    'name' => 'BB1414',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Berakas B',
                        'village' => [
                            [
                                'name' => 'Perumahan Negara Lambak Kanan Kawasan 1',
                                'postal_code' => [
                                    'name' => 'BC2315',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Lambak Kanan Kawasan 2',
                                'postal_code' => [
                                    'name' => 'BC2515',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Lambak Kanan Kawasan 3',
                                'postal_code' => [
                                    'name' => 'BC2715',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Lambak Kanan Kawasan 4',
                                'postal_code' => [
                                    'name' => 'BC2915',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Lambak Kanan Kawasan 5',
                                'postal_code' => [
                                    'name' => 'BC3115',
                                ],
                            ],
                            [
                                'name' => 'Kampong Madang',
                                'postal_code' => [
                                    'name' => 'BC3715',
                                ],
                            ],
                            [
                                'name' => 'Kampong Manggis',
                                'postal_code' => [
                                    'name' => 'BC3615',
                                ],
                            ],
                            [
                                'name' => 'Kampong Salambigar',
                                'postal_code' => [
                                    'name' => 'BC1515',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Akar',
                                'postal_code' => [
                                    'name' => 'BC4115',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Hanching',
                                'postal_code' => [
                                    'name' => 'BC2115',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Orok',
                                'postal_code' => [
                                    'name' => 'BC1715',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Tilong',
                                'postal_code' => [
                                    'name' => 'BC3315',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Burong Pingai Ayer',
                        'village' => [
                            [
                                'name' => 'Kampong Burong Pingai Ayer',
                                'postal_code' => [
                                    'name' => 'BM1126',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lurong Dalam',
                                'postal_code' => [
                                    'name' => 'BM1326',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pandai Besi A',
                                'postal_code' => [
                                    'name' => 'BM1526',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pandai Besi B',
                                'postal_code' => [
                                    'name' => 'BM1726',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pekan Lama',
                                'postal_code' => [
                                    'name' => 'BM2526',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengiran Setia Negara',
                                'postal_code' => [
                                    'name' => 'BM2326',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Pandan A',
                                'postal_code' => [
                                    'name' => 'BM1926',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Pandan B',
                                'postal_code' => [
                                    'name' => 'BM2126',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kianggeh',
                        'village' => [
                            [
                                'name' => 'Diplomatic Enclave Area',
                                'postal_code' => [
                                    'name' => 'BA2313',
                                ],
                            ],
                            [
                                'name' => 'Kampong Berangan',
                                'postal_code' => [
                                    'name' => 'BA1111',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kianggeh',
                                'postal_code' => [
                                    'name' => 'BA1211',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kumbang Pasang',
                                'postal_code' => [
                                    'name' => 'BA1511',
                                ],
                            ],
                            [
                                'name' => 'Kampong Melabau',
                                'postal_code' => [
                                    'name' => 'BA2511',
                                ],
                            ],
                            [
                                'name' => 'Kampong Parit',
                                'postal_code' => [
                                    'name' => 'BA1912',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pusar Ulak',
                                'postal_code' => [
                                    'name' => 'BA1411',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tasek Lama,',
                                'postal_code' => [
                                    'name' => 'BA1611',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tumasek',
                                'postal_code' => [
                                    'name' => 'BA2112',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tungkadeh',
                                'postal_code' => [
                                    'name' => 'BA1311',
                                ],
                            ],
                            [
                                'name' => 'Pusat Bandar',
                                'postal_code' => [
                                    'name' => 'BS8411',
                                ],
                                [
                                    'name' => 'BS8511',
                                ],
                                [
                                    'name' => 'BS8611',
                                ],
                                [
                                    'name' => 'BS8711',
                                ],
                                [
                                    'name' => 'BS8811',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kilanas',
                        'village' => [
                            [
                                'name' => 'Kampong Bengkurong',
                                'postal_code' => [
                                    'name' => 'BF1920',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bunut',
                                'postal_code' => [
                                    'name' => 'BF1320',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bunut Perpindahan',
                                'postal_code' => [
                                    'name' => 'BF1320',
                                ],
                            ],
                            [
                                'name' => 'Kampong Burong Lepas',
                                'postal_code' => [
                                    'name' => 'BF1720',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kilanas',
                                'postal_code' => [
                                    'name' => 'BF2520',
                                ],
                            ],
                            [
                                'name' => 'Kampong Jangsak',
                                'postal_code' => [
                                    'name' => 'BF2720',
                                ],
                            ],
                            [
                                'name' => 'Kampong Madewa',
                                'postal_code' => [
                                    'name' => 'BF1120',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sinarubai',
                                'postal_code' => [
                                    'name' => 'BF2120',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjong Bunut',
                                'postal_code' => [
                                    'name' => 'BF2920',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tasek Meradun',
                                'postal_code' => [
                                    'name' => 'BF1520',
                                ],
                            ],
                            [
                                'name' => 'Kampong Telanai',
                                'postal_code' => [
                                    'name' => 'BA2312',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kota Batu',
                        'village' => [
                            [
                                'name' => 'Kampong Belimbing',
                                'postal_code' => [
                                    'name' => 'BD2917',
                                ],
                            ],
                            [
                                'name' => 'Kampong Buang Tawar',
                                'postal_code' => [
                                    'name' => 'BD3917',
                                ],
                            ],
                            [
                                'name' => 'Kampong Dato Gandi',
                                'postal_code' => [
                                    'name' => 'BD1717',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kota Batu',
                                'postal_code' => [
                                    'name' => 'BD1517',
                                ],
                            ],
                            [
                                'name' => 'Kampong Menunggol',
                                'postal_code' => [
                                    'name' => 'BD4317',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pelambayan',
                                'postal_code' => [
                                    'name' => 'BD2317',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pintu Malim',
                                'postal_code' => [
                                    'name' => 'BD1317',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pudak',
                                'postal_code' => [
                                    'name' => 'BD3517',
                                ],
                            ],
                            [
                                'name' => 'Kampong Riong',
                                'postal_code' => [
                                    'name' => 'BD4117',
                                ],
                            ],
                            [
                                'name' => 'Kampong Serdang',
                                'postal_code' => [
                                    'name' => 'BD2117',
                                ],
                            ],
                            [
                                'name' => 'Kampong Subok',
                                'postal_code' => [
                                    'name' => 'BD2717',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Belukut',
                                'postal_code' => [
                                    'name' => 'BD2117',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Besar',
                                'postal_code' => [
                                    'name' => 'BD2517',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Lampai',
                                'postal_code' => [
                                    'name' => 'BD1117',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Matan',
                                'postal_code' => [
                                    'name' => 'BD1917',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Bunga',
                                'postal_code' => [
                                    'name' => 'BD3317',
                                ],
                            ],
                            [
                                'name' => 'Pulau Sibungor',
                                'postal_code' => [
                                    'name' => 'BD4917',
                                ],
                            ],
                            [
                                'name' => 'Pulau Baru-Baru',
                                'postal_code' => [
                                    'name' => 'BD4517',
                                ],
                            ],
                            [
                                'name' => 'Kampong Gadong Batu',
                                'postal_code' => [
                                    'name' => 'BD1817',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjong Kindana',
                                'postal_code' => [
                                    'name' => 'BD3117',
                                ],
                            ],
                            [
                                'name' => 'Kampong Berambang',
                                'postal_code' => [
                                    'name' => 'BD3717',
                                ],
                            ],
                            [
                                'name' => 'Kampong Buang Kepayang',
                                'postal_code' => [
                                    'name' => 'BD3917',
                                ],
                            ],
                            [
                                'name' => 'Pulau Berbunut',
                                'postal_code' => [
                                    'name' => 'BD4517',
                                ],
                            ],
                            [
                                'name' => 'Mengkubau',
                                'postal_code' => [
                                    'name' => 'BD4717',
                                ],
                            ],
                            [
                                'name' => 'Pulau Chermin',
                                'postal_code' => [
                                    'name' => 'BD4817',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Lumapas',
                        'village' => [
                            [
                                'name' => 'Kampong Baong',
                                'postal_code' => [
                                    'name' => 'BJ1424',
                                ],
                            ],
                            [
                                'name' => 'Kampong Buang Sakar',
                                'postal_code' => [
                                    'name' => 'BJ1924',
                                ],
                            ],
                            [
                                'name' => 'Kampong Buang Tekurok',
                                'postal_code' => [
                                    'name' => 'BJ2924',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kasat',
                                'postal_code' => [
                                    'name' => 'BJ1724',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kilugus',
                                'postal_code' => [
                                    'name' => 'BJ3324',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lumapas',
                                'postal_code' => [
                                    'name' => 'BJ3324',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lupak Luas',
                                'postal_code' => [
                                    'name' => 'BJ2524',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tarap Bau',
                                'postal_code' => [
                                    'name' => 'BJ2124',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Asam',
                                'postal_code' => [
                                    'name' => 'BJ2724',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panchor',
                                'postal_code' => [
                                    'name' => 'BJ3324',
                                ],
                            ],
                            [
                                'name' => 'Kampong Putat',
                                'postal_code' => [
                                    'name' => 'BJ1324',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Mentiri',
                        'village' => [
                            [
                                'name' => 'Kampong Batu Marang',
                                'postal_code' => [
                                    'name' => 'BU1529',
                                ],
                            ],
                            [
                                'name' => 'Kampong Mentiri',
                                'postal_code' => [
                                    'name' => 'BU1929',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengkalan Sibabau',
                                'postal_code' => [
                                    'name' => 'BU2529',
                                ],
                            ],
                            [
                                'name' => 'Kampong Salar',
                                'postal_code' => [
                                    'name' => 'BU1429',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Buloh',
                                'postal_code' => [
                                    'name' => 'BU1229',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Buloh II',
                                'postal_code' => [
                                    'name' => 'BU1329',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanah Jambu',
                                'postal_code' => [
                                    'name' => 'BU1129',
                                ],
                            ],
                            [
                                'name' => 'RPN Mentiri Area A',
                                'postal_code' => [
                                    'name' => 'BU2129',
                                ],
                            ],
                            [
                                'name' => 'RPN Mentiri Area B',
                                'postal_code' => [
                                    'name' => 'BU2229',
                                ],
                            ],
                            [
                                'name' => 'RPN Panchor Mengkubau',
                                'postal_code' => [
                                    'name' => 'BU3129',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Tanah Jambu',
                                'postal_code' => [
                                    'name' => 'BU2929',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panchor',
                                'postal_code' => [
                                    'name' => 'BU1729',
                                ],
                            ],
                            [
                                'name' => 'Kampong Paring',
                                'postal_code' => [
                                    'name' => 'BU2329',
                                ],
                            ],
                            [
                                'name' => 'STKRJ Tanah Jambu',
                                'postal_code' => [
                                    'name' => 'BU2729',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Pengkalan Batu',
                        'village' => [
                            [
                                'name' => 'Kampong Batang Perhentian',
                                'postal_code' => [
                                    'name' => 'BH1523',
                                ],
                            ],
                            [
                                'name' => 'Kampong Batong',
                                'postal_code' => [
                                    'name' => 'BH2923',
                                ],
                            ],
                            [
                                'name' => 'Kampong Batu Ampar',
                                'postal_code' => [
                                    'name' => 'BH1323',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bebatik',
                                'postal_code' => [
                                    'name' => 'BH3223',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bebuloh',
                                'postal_code' => [
                                    'name' => 'BH3323',
                                ],
                            ],
                            [
                                'name' => 'Kampong Imang',
                                'postal_code' => [
                                    'name' => 'BH2623',
                                ],
                            ],
                            [
                                'name' => 'Kampong Junjongan',
                                'postal_code' => [
                                    'name' => 'BH2123',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kuala Lurah',
                                'postal_code' => [
                                    'name' => 'BH1923',
                                ],
                            ],
                            [
                                'name' => 'Kampong Limau Manis',
                                'postal_code' => [
                                    'name' => 'BH2323',
                                ],
                            ],
                            [
                                'name' => 'Kampong Masin',
                                'postal_code' => [
                                    'name' => 'BH2723',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panchor Murai',
                                'postal_code' => [
                                    'name' => 'BH3123',
                                ],
                            ],
                            [
                                'name' => 'Kampong Parit',
                                'postal_code' => [
                                    'name' => 'BH1023',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengkalan Batu',
                                'postal_code' => [
                                    'name' => 'BH1123',
                                ],
                            ],
                            [
                                'name' => 'Kampong Wasan',
                                'postal_code' => [
                                    'name' => 'BH2523',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Belimbing',
                                'postal_code' => [
                                    'name' => 'BH1723',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Peramu',
                        'village' => [
                            [
                                'name' => 'Kampong Bakut Berumput',
                                'postal_code' => [
                                    'name' => 'BP2326',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bakut Pengiran Siraja Muda A',
                                'postal_code' => [
                                    'name' => 'BP1726',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bakut Pengiran Siraja Muda B',
                                'postal_code' => [
                                    'name' => 'BP1926',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lurong Sikuna',
                                'postal_code' => [
                                    'name' => 'BP2126',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pekilong Muara',
                                'postal_code' => [
                                    'name' => 'BP1326',
                                ],
                            ],
                            [
                                'name' => 'Kampong Peramu',
                                'postal_code' => [
                                    'name' => 'BP1126',
                                ],
                            ],
                            [
                                'name' => 'Kampong Setia Pahlawan',
                                'postal_code' => [
                                    'name' => 'BP1526',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Saba',
                        'village' => [
                            [
                                'name' => 'Kampong Saba Darat A',
                                'postal_code' => [
                                    'name' => 'BR1326',
                                ],
                            ],
                            [
                                'name' => 'Kampong Saba Darat B',
                                'postal_code' => [
                                    'name' => 'BR1526',
                                ],
                            ],
                            [
                                'name' => 'Kampong Saba Laut',
                                'postal_code' => [
                                    'name' => 'BR1126',
                                ],
                            ],
                            [
                                'name' => 'Kampong Saba Tengah',
                                'postal_code' => [
                                    'name' => 'BR1926',
                                ],
                            ],
                            [
                                'name' => 'Kampong Saba Ujong',
                                'postal_code' => [
                                    'name' => 'BR1726',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sengkurong',
                        'village' => [
                            [
                                'name' => 'Kampong Jerudong',
                                'postal_code' => [
                                    'name' => 'BG3522',
                                ],
                            ],
                            [
                                'name' => 'Kampong Katimahar',
                                'postal_code' => [
                                    'name' => 'BG2721',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kulapis',
                                'postal_code' => [
                                    'name' => 'BG2521',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lugu',
                                'postal_code' => [
                                    'name' => 'BG2921',
                                ],
                            ],
                            [
                                'name' => 'Kampong Mulaut',
                                'postal_code' => [
                                    'name' => 'BG2121',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pasai',
                                'postal_code' => [
                                    'name' => 'BG1221',
                                ],
                            ],
                            [
                                'name' => 'Kampong Peninjau',
                                'postal_code' => [
                                    'name' => 'BG3522',
                                ],
                            ],
                            [
                                'name' => 'Kampong Selayun',
                                'postal_code' => [
                                    'name' => 'BG1721',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sengkurong A',
                                'postal_code' => [
                                    'name' => 'BG1121',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sengkurong B',
                                'postal_code' => [
                                    'name' => 'BG1321',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tagap',
                                'postal_code' => [
                                    'name' => 'BG1521',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjong Nangka',
                                'postal_code' => [
                                    'name' => 'BG2321',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Tampoi',
                                'postal_code' => [
                                    'name' => 'BG1921',
                                ],
                            ],
                            [
                                'name' => 'STKRJ Lugu',
                                'postal_code' => [
                                    'name' => 'BG3021',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Serasa',
                        'village' => [
                            [
                                'name' => 'Muara Town',
                                'postal_code' => [
                                    'name' => 'BT128',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kapok',
                                'postal_code' => [
                                    'name' => 'BT2328',
                                ],
                            ],
                            [
                                'name' => 'Kampong Meragang',
                                'postal_code' => [
                                    'name' => 'BT2728',
                                ],
                            ],
                            [
                                'name' => 'RPN Meragang',
                                'postal_code' => [
                                    'name' => 'BT2928',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sabun',
                                'postal_code' => [
                                    'name' => 'BT2128',
                                ],
                            ],
                            [
                                'name' => 'Kampong Serasa',
                                'postal_code' => [
                                    'name' => 'BT1728',
                                ],
                            ],
                            [
                                'name' => 'Perpindahan Serasa',
                                'postal_code' => [
                                    'name' => 'BT1728',
                                ],
                            ],
                            [
                                'name' => 'Pulau Pelumpong',
                                'postal_code' => [
                                    'name' => 'BT1328',
                                ],
                            ],
                            [
                                'name' => 'Tanjong Pelumpong',
                                'postal_code' => [
                                    'name' => 'BT1328',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjung Batu',
                                'postal_code' => [
                                    'name' => 'BT1528',
                                ],
                            ],
                            [
                                'name' => 'Pulau Salar',
                                'postal_code' => [
                                    'name' => 'BT1528',
                                ],
                            ],
                            [
                                'name' => 'Pulau Pasir Tengah',
                                'postal_code' => [
                                    'name' => 'BT1628',
                                ],
                            ], [
                                'name' => 'Pulau Muara Besar',
                                'postal_code' => [
                                    'name' => 'BT3328',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sungai Kebun',
                        'village' => [
                            [
                                'name' => 'Kampong Bolkiah A',
                                'postal_code' => [
                                    'name' => 'BK1125',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bolkiah B',
                                'postal_code' => [
                                    'name' => 'BK1325',
                                ],
                            ],
                            [
                                'name' => 'Kampong Setia A',
                                'postal_code' => [
                                    'name' => 'BK1525',
                                ],
                            ],
                            [
                                'name' => 'Kampong Setia B',
                                'postal_code' => [
                                    'name' => 'BK1725',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Siamas',
                                'postal_code' => [
                                    'name' => 'BK1925',
                                ],
                            ],
                            [
                                'name' => 'Kampong Ujong Kelinik',
                                'postal_code' => [
                                    'name' => 'BK2125',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Kebun',
                                'postal_code' => [
                                    'name' => 'BK2325',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sungai Kedayan',
                        'village' => [
                            [
                                'name' => 'Kampong Ujong Tanjong',
                                'postal_code' => [
                                    'name' => 'BN1911',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Salat',
                                'postal_code' => [
                                    'name' => 'BN1311',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kuala Peminyak',
                                'postal_code' => [
                                    'name' => 'BN2111',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pemancha Lama',
                                'postal_code' => [
                                    'name' => 'BN2311',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sumbiling Lama',
                                'postal_code' => [
                                    'name' => 'BN1111',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Kedayan A',
                                'postal_code' => [
                                    'name' => 'BN1711',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Kedayan B',
                                'postal_code' => [
                                    'name' => 'BN1511',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Tamoi',
                        'village' => [
                            [
                                'name' => 'Kampong Limbongan',
                                'postal_code' => [
                                    'name' => 'BL1312',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengiran Bendahara Lama',
                                'postal_code' => [
                                    'name' => 'BL1512',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengiran Kerma Indera Lama',
                                'postal_code' => [
                                    'name' => 'BL1712',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengiran Tajuddin Hitam',
                                'postal_code' => [
                                    'name' => 'BL1912',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tamoi Tengah',
                                'postal_code' => [
                                    'name' => 'BL2112',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tamoi Ujong',
                                'postal_code' => [
                                    'name' => 'BL2312',
                                ],
                            ],
                            [
                                'name' => 'Kampong Ujong Bukit',
                                'postal_code' => [
                                    'name' => 'BL1112',
                                ],
                            ],
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
                            [
                                'name' => 'Kampong Bukit Panggal',
                                'postal_code' => [
                                    'name' => 'TB1341',
                                ],
                            ],
                            [
                                'name' => 'Kampong Ikas',
                                'postal_code' => [
                                    'name' => 'TB3341',
                                ],
                            ],
                            [
                                'name' => 'Kampong Keriam',
                                'postal_code' => [
                                    'name' => 'TB1141',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kupang',
                                'postal_code' => [
                                    'name' => 'TB2941',
                                ],
                            ],
                            [
                                'name' => 'Kampong Luagan Dudok',
                                'postal_code' => [
                                    'name' => 'TB1541',
                                ],
                            ],
                            [
                                'name' => 'Kampong Maraburong',
                                'postal_code' => [
                                    'name' => 'TB3141',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sinaut',
                                'postal_code' => [
                                    'name' => 'TB1741',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Kelugos',
                                'postal_code' => [
                                    'name' => 'TB2741',
                                ],
                            ],
                            [
                                'name' => 'Padang Tembak Binturan',
                                'postal_code' => [
                                    'name' => 'TB3541',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kiudang',
                        'village' => [
                            [
                                'name' => 'Kampong Bakiau',
                                'postal_code' => [
                                    'name' => 'TE1143',
                                ],
                            ],
                            [
                                'name' => 'Kampong Batang Mitus',
                                'postal_code' => [
                                    'name' => 'TE2543',
                                ],
                            ],
                            [
                                'name' => 'Kampong Birau',
                                'postal_code' => [
                                    'name' => 'TE2143',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kebia',
                                'postal_code' => [
                                    'name' => 'TE2743',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kiudang',
                                'postal_code' => [
                                    'name' => 'TE1543',
                                ],
                            ],
                            [
                                'name' => 'Kampong Luagan Timbaran',
                                'postal_code' => [
                                    'name' => 'TE2343',
                                ],
                            ],
                            [
                                'name' => 'Kampong Mungkom',
                                'postal_code' => [
                                    'name' => 'TE1743',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pad Nunok',
                                'postal_code' => [
                                    'name' => 'TE1943',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pangkalan Mau',
                                'postal_code' => [
                                    'name' => 'TE1343',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Lamunin ',
                        'village' => [
                            [
                                'name' => 'Kampong Bintudoh',
                                'postal_code' => [
                                    'name' => 'TG2943',
                                ],
                            ],
                            [
                                'name' => 'Kampong Biong',
                                'postal_code' => [
                                    'name' => 'TG3343',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Bang Dalam',
                                'postal_code' => [
                                    'name' => 'TG3543',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Barun',
                                'postal_code' => [
                                    'name' => 'TG2443',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Sulang',
                                'postal_code' => [
                                    'name' => 'TG2743',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kuala Abang',
                                'postal_code' => [
                                    'name' => 'TG1343',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lamunin',
                                'postal_code' => [
                                    'name' => 'TG2343',
                                ],
                            ],
                            [
                                'name' => 'Kampong Layong',
                                'postal_code' => [
                                    'name' => 'TG1143',
                                ],
                            ],
                            [
                                'name' => 'Kampong Menengah',
                                'postal_code' => [
                                    'name' => 'TG2843',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panchong',
                                'postal_code' => [
                                    'name' => 'TG3143',
                                ],
                            ],
                            [
                                'name' => 'Hutan Simpang Bukit Ladan',
                                'postal_code' => [
                                    'name' => 'TG3943',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Pekan Tutong',
                        'village' => [
                            [
                                'name' => 'Bukit Bendera',
                                'postal_code' => [
                                    'name' => 'TA1141',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kandang',
                                'postal_code' => [
                                    'name' => 'TA3741',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kuala Tutong',
                                'postal_code' => [
                                    'name' => 'TA3341',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panchor Dulit',
                                'postal_code' => [
                                    'name' => 'TA2141',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panchor Papan',
                                'postal_code' => [
                                    'name' => 'TA1941',
                                ],
                            ],
                            [
                                'name' => 'Kampong Penabai',
                                'postal_code' => [
                                    'name' => 'TA3541',
                                ],
                            ],
                            [
                                'name' => 'Kampong Penanjong',
                                'postal_code' => [
                                    'name' => 'TA2741',
                                ],
                            ],
                            [
                                'name' => 'Kampong Petani',
                                'postal_code' => [
                                    'name' => 'TA1741',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sengkarai',
                                'postal_code' => [
                                    'name' => 'TA2341',
                                ],
                            ],
                            [
                                'name' => 'Kampong Serambangun',
                                'postal_code' => [
                                    'name' => 'TA2541',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanah Burok',
                                'postal_code' => [
                                    'name' => 'TA2941',
                                ],
                            ],
                            [
                                'name' => 'Tutong Kem',
                                'postal_code' => [
                                    'name' => 'TA3141',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Rambai',
                        'village' => [
                            [
                                'name' => 'Bukit Ladan Forest Reserve',
                                'postal_code' => [
                                    'name' => 'TH4349',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bedawan',
                                'postal_code' => [
                                    'name' => 'TH3949',
                                ],
                            ],
                            [
                                'name' => 'Kampong Belabau',
                                'postal_code' => [
                                    'name' => 'TH4149',
                                ],
                            ],
                            [
                                'name' => 'Kampong Benutan',
                                'postal_code' => [
                                    'name' => 'TH1749',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kuala Ungar',
                                'postal_code' => [
                                    'name' => 'TH1549',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lalipo',
                                'postal_code' => [
                                    'name' => 'TH3749',
                                ],
                            ],
                            [
                                'name' => 'Kampong Merimbun',
                                'postal_code' => [
                                    'name' => 'TH1349',
                                ],
                            ],
                            [
                                'name' => 'Kampong Rambai',
                                'postal_code' => [
                                    'name' => 'TH1149',
                                ],
                            ],
                            [
                                'name' => 'Kampong Supon Besar',
                                'postal_code' => [
                                    'name' => 'TH3149',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Tanjong Maya',
                        'village' => [
                            [
                                'name' => 'Kampong Bangunggos',
                                'postal_code' => [
                                    'name' => 'TD1541',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Sibut',
                                'postal_code' => [
                                    'name' => 'TD2741',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Udal',
                                'postal_code' => [
                                    'name' => 'TD2341',
                                ],
                            ],
                            [
                                'name' => 'Kampong Liulon',
                                'postal_code' => [
                                    'name' => 'TD2941',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lubok Pulau',
                                'postal_code' => [
                                    'name' => 'TD2541',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pemadang',
                                'postal_code' => [
                                    'name' => 'TD1941',
                                ],
                            ],
                            [
                                'name' => 'Kampong Penapar',
                                'postal_code' => [
                                    'name' => 'TD1741',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sebakit',
                                'postal_code' => [
                                    'name' => 'TD1341',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjong Maya',
                                'postal_code' => [
                                    'name' => 'TD1141',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjong Panjang',
                                'postal_code' => [
                                    'name' => 'TD3341',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Telisai',
                        'village' => [
                            [
                                'name' => 'Kampong Bukit Beruang',
                                'postal_code' => [
                                    'name' => 'TC3145',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Pasir',
                                'postal_code' => [
                                    'name' => 'TC4145',
                                ],
                            ],
                            [
                                'name' => 'Kampong Danau',
                                'postal_code' => [
                                    'name' => 'TC2345',
                                ],
                            ],
                            [
                                'name' => 'Kampong Keramut',
                                'postal_code' => [
                                    'name' => 'TC2745',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panapar-Danau',
                                'postal_code' => [
                                    'name' => 'TC2545',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pangkalan Dalai',
                                'postal_code' => [
                                    'name' => 'TC3745',
                                ],
                            ],
                            [
                                'name' => 'Kampong Penyatang',
                                'postal_code' => [
                                    'name' => 'TC3945',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Paku',
                                'postal_code' => [
                                    'name' => 'TC2145',
                                ],
                            ],
                            [
                                'name' => 'Kampong Telamba',
                                'postal_code' => [
                                    'name' => 'TC1545',
                                ],
                            ],
                            [
                                'name' => 'Kampong Telisai',
                                'postal_code' => [
                                    'name' => 'TC1145',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tumpuan Ugas',
                                'postal_code' => [
                                    'name' => 'TC2945',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Bukit Beruang',
                                'postal_code' => [
                                    'name' => 'TC3345',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Ukong',
                        'village' => [
                            [
                                'name' => 'Kampong Bukit',
                                'postal_code' => [
                                    'name' => 'TF3147',
                                ],
                            ],
                            [
                                'name' => 'Kampong Long Mayan',
                                'postal_code' => [
                                    'name' => 'TF4747',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pak Bidang',
                                'postal_code' => [
                                    'name' => 'TF2947',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengkalan Raan',
                                'postal_code' => [
                                    'name' => 'TF1347',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Damit Pemadang',
                                'postal_code' => [
                                    'name' => 'TF2147',
                                ],
                            ],
                            [
                                'name' => 'Kampong Ukong',
                                'postal_code' => [
                                    'name' => 'TF1147',
                                ],
                            ],
                            [
                                'name' => 'Hutan Simpanan Andulau',
                                'postal_code' => [
                                    'name' => 'TF4947',
                                ],
                            ],
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
                            [
                                'name' => 'Kampong Bisut',
                                'postal_code' => [
                                    'name' => 'KF1338',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Kandol',
                                'postal_code' => [
                                    'name' => 'KF2138',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Sawat',
                                'postal_code' => [
                                    'name' => 'KF1738',
                                ],
                            ],
                            [
                                'name' => 'Kampong Merangking',
                                'postal_code' => [
                                    'name' => 'KF1238',
                                ],
                            ],
                            [
                                'name' => 'Kampong Merangking Hilir',
                                'postal_code' => [
                                    'name' => 'KF3338',
                                ],
                            ],
                            [
                                'name' => 'Kampong Merangking Ulu',
                                'postal_code' => [
                                    'name' => 'KF3138',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Mau',
                                'postal_code' => [
                                    'name' => 'KF1138',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pulau Apil',
                                'postal_code' => [
                                    'name' => 'KF4538',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tarap',
                                'postal_code' => [
                                    'name' => 'KF3738',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengkalan Siong',
                                'postal_code' => [
                                    'name' => 'KF3938',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kuala Balai',
                        'village' => [
                            [
                                'name' => 'Kampong Kajitan',
                                'postal_code' => [
                                    'name' => 'KD2332',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kuala Balai',
                                'postal_code' => [
                                    'name' => 'KD1132',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lubuk Lanyap',
                                'postal_code' => [
                                    'name' => 'KD3132',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lubuk Tapang',
                                'postal_code' => [
                                    'name' => 'KD2932',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pengalayan',
                                'postal_code' => [
                                    'name' => 'KD2132',
                                ],
                            ],
                            [
                                'name' => 'Kampong Penyarap',
                                'postal_code' => [
                                    'name' => 'KD2732',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Damit',
                                'postal_code' => [
                                    'name' => 'KD1532',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Lutong',
                                'postal_code' => [
                                    'name' => 'KD3532',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjung Ranggas',
                                'postal_code' => [
                                    'name' => 'KD1732',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjung Sudai',
                                'postal_code' => [
                                    'name' => 'KD3332',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tugong',
                                'postal_code' => [
                                    'name' => 'KD1932',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Mendaram',
                                'postal_code' => [
                                    'name' => 'KD2532',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Kuala Belait',
                        'village' => [
                            [
                                'name' => 'Kampong Mumong A',
                                'postal_code' => [
                                    'name' => 'KA1531',
                                ],
                            ],
                            [
                                'name' => 'Kampong Mumong B',
                                'postal_code' => [
                                    'name' => 'KA1731',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pandan A',
                                'postal_code' => [
                                    'name' => 'KA1931',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pandan B',
                                'postal_code' => [
                                    'name' => 'KA2031',
                                ],
                            ],
                            [
                                'name' => 'Kampong Pandan C',
                                'postal_code' => [
                                    'name' => 'KA2131',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Teraban',
                                'postal_code' => [
                                    'name' => 'KA3331',
                                ],
                            ],
                            [
                                'name' => 'Kuala Belait',
                                'postal_code' => [
                                    'name' => 'KA1131',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Duhon',
                                'postal_code' => [
                                    'name' => 'KA3131',
                                ],
                            ],
                            [
                                'name' => 'Kampong Melayu Asli',
                                'postal_code' => [
                                    'name' => 'KA1331',
                                ],
                            ],
                            [
                                'name' => 'Kampong China',
                                'postal_code' => [
                                    'name' => 'KA2331',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Melilit',
                                'postal_code' => [
                                    'name' => 'KA2731',
                                ],
                            ],
                            [
                                'name' => 'Kampong Rasau',
                                'postal_code' => [
                                    'name' => 'KA2731',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Labi',
                        'village' => [
                            [
                                'name' => 'Kampong Bukit Puan',
                                'postal_code' => [
                                    'name' => 'KE1137',
                                ],
                            ],
                            [
                                'name' => 'Kampong Gatas',
                                'postal_code' => [
                                    'name' => 'KE02537',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kenapol',
                                'postal_code' => [
                                    'name' => 'KE2737',
                                ],
                            ],
                            [
                                'name' => 'Kampong Labi',
                                'postal_code' => [
                                    'name' => 'KE2637',
                                ],
                            ],
                            [
                                'name' => 'Kampong Labi Lama',
                                'postal_code' => [
                                    'name' => 'KE2437',
                                ],
                            ],
                            [
                                'name' => 'Kampong Mendaram Kecil',
                                'postal_code' => [
                                    'name' => 'KE3537',
                                ],
                            ],
                            [
                                'name' => 'Kampong Rampayoh',
                                'postal_code' => [
                                    'name' => 'KE3337',
                                ],
                            ],
                            [
                                'name' => 'Kampong Ratan',
                                'postal_code' => [
                                    'name' => 'KE2137',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Petai',
                                'postal_code' => [
                                    'name' => 'KE1337',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanajor',
                                'postal_code' => [
                                    'name' => 'KE1937',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tapang Lupak',
                                'postal_code' => [
                                    'name' => 'KE1737',
                                ],
                            ],
                            [
                                'name' => 'Kampong Teraja',
                                'postal_code' => [
                                    'name' => 'KE3937',
                                ],
                            ],
                            [
                                'name' => 'Kampong Terawan',
                                'postal_code' => [
                                    'name' => 'KE3137',
                                ],
                            ],
                            [
                                'name' => 'Kampong Terunan',
                                'postal_code' => [
                                    'name' => 'KE2337',
                                ],
                            ],
                            [
                                'name' => 'Kampong Labi I',
                                'postal_code' => [
                                    'name' => 'KE2637',
                                ],
                            ],
                            [
                                'name' => 'Kampong Labi II',
                                'postal_code' => [
                                    'name' => 'KE2637',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Liang',
                        'village' => [
                            [
                                'name' => 'Kampong Agis-Agis',
                                'postal_code' => [
                                    'name' => 'KC3335',
                                ],
                            ],
                            [
                                'name' => 'Kampong Keluyoh',
                                'postal_code' => [
                                    'name' => 'KC1735',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lilas',
                                'postal_code' => [
                                    'name' => 'KC2535',
                                ],

                            ],
                            [
                                'name' => 'Kampong Lumut',
                                'postal_code' => [
                                    'name' => 'KC2935',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lumut Tersusun',
                                'postal_code' => [
                                    'name' => 'KC4135',
                                ],
                            ],
                            [
                                'name' => 'Kampong Perumpong',
                                'postal_code' => [
                                    'name' => 'KC1935',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Bakong',
                                'postal_code' => [
                                    'name' => 'KC4535',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Gana',
                                'postal_code' => [
                                    'name' => 'KC1335',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Kang',
                                'postal_code' => [
                                    'name' => 'KC3735',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Kuru',
                                'postal_code' => [
                                    'name' => 'KC3935',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Lalit',
                                'postal_code' => [
                                    'name' => 'KC3535',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Liang',
                                'postal_code' => [
                                    'name' => 'KC1135',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Tali',
                                'postal_code' => [
                                    'name' => 'KC4935',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Taring',
                                'postal_code' => [
                                    'name' => 'KC4735',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tunggulian',
                                'postal_code' => [
                                    'name' => 'KC2735',
                                ],
                            ],
                            [
                                'name' => 'Perkhemahan Lumut',
                                'postal_code' => [
                                    'name' => 'KC735',
                                ],
                            ],
                            [
                                'name' => 'RPN Lumut Area 1',
                                'postal_code' => [
                                    'name' => 'KC5135',
                                ],
                            ],
                            [
                                'name' => 'RPN Lumut Area 2',
                                'postal_code' => [
                                    'name' => 'KC5335',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lumut I',
                                'postal_code' => [
                                    'name' => 'KC2935',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lumut II',
                                'postal_code' => [
                                    'name' => 'KC3135',
                                ],
                            ],
                            [
                                'name' => 'STKRJ Lumut',
                                'postal_code' => [
                                    'name' => 'KC5535',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Melilas',
                        'village' => [
                            [
                                'name' => 'Kampong Melilas',
                                'postal_code' => [
                                    'name' => 'KH1339',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bukit Tuding',
                                'postal_code' => [
                                    'name' => 'KH1939',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bang Garang',
                                'postal_code' => [
                                    'name' => 'KH1739',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tempinak',
                                'postal_code' => [
                                    'name' => 'KH1139',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bengerang II',
                                'postal_code' => [
                                    'name' => 'KH1539',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Seria',
                        'village' => [
                            [
                                'name' => 'Kampong Lorong Tiga Selatan',
                                'postal_code' => [
                                    'name' => 'KB1533',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Bera',
                                'postal_code' => [
                                    'name' => 'KB1933',
                                ],
                            ],
                            [
                                'name' => 'Kampong Panaga',
                                'postal_code' => [
                                    'name' => 'KB4533',
                                ],
                            ],
                            [
                                'name' => 'Perumahan Negara Panaga',
                                'postal_code' => [
                                    'name' => 'KB4733',
                                ],
                            ],
                            [
                                'name' => 'RPN Lorong Tengah',
                                'postal_code' => [
                                    'name' => 'KB1633',
                                ],
                            ],
                            [
                                'name' => 'Seria Town Area 1',
                                'postal_code' => [
                                    'name' => 'KB1133',
                                ],
                            ],
                            [
                                'name' => 'Seria Town Area 2',
                                'postal_code' => [
                                    'name' => 'KB1233',
                                ],
                            ],
                            [
                                'name' => 'Kampong Perakong',
                                'postal_code' => [
                                    'name' => 'KB1733',
                                ],
                            ],
                            [
                                'name' => 'Kampong Jabang',
                                'postal_code' => [
                                    'name' => 'KB3933',
                                ],
                            ],
                            [
                                'name' => 'Kampong Badas',
                                'postal_code' => [
                                    'name' => 'KB2133',
                                ],
                            ],
                            [
                                'name' => 'Kampong Anduki',
                                'postal_code' => [
                                    'name' => 'KB2333',
                                ],
                            ],
                            [
                                'name' => 'Ibu Pejabat Shell',
                                'postal_code' => [
                                    'name' => 'KB2833',
                                ],
                            ],
                            [
                                'name' => 'Kawasan Simpanan Gurkha Kem',
                                'postal_code' => [
                                    'name' => 'KB3733',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Sukang',
                        'village' => [
                            [
                                'name' => 'Kampong Apak-Apak',
                                'postal_code' => [
                                    'name' => 'KG1139',
                                ],
                            ],
                            [
                                'name' => 'Kampong Dungun',
                                'postal_code' => [
                                    'name' => 'KG2139',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kukub',
                                'postal_code' => [
                                    'name' => 'KG1739',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sukang',
                                'postal_code' => [
                                    'name' => 'KG1939',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Hilir',
                                'postal_code' => [
                                    'name' => 'KG1239',
                                ],
                            ],
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
                            [
                                'name' => 'Kampong Amo',
                                'postal_code' => [
                                    'name' => 'PD1151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Amo A',
                                'postal_code' => [
                                    'name' => 'PD1151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Amo B',
                                'postal_code' => [
                                    'name' => 'PD1351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Amo C',
                                'postal_code' => [
                                    'name' => 'PD1551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Batang Duri',
                                'postal_code' => [
                                    'name' => 'PD1951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Belaban',
                                'postal_code' => [
                                    'name' => 'PD3151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Biang',
                                'postal_code' => [
                                    'name' => 'PD2551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Parit',
                                'postal_code' => [
                                    'name' => 'PD2351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Selangan',
                                'postal_code' => [
                                    'name' => 'PD2751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sibulu',
                                'postal_code' => [
                                    'name' => 'PD2951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sibut',
                                'postal_code' => [
                                    'name' => 'PD2151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sumbiling Baru',
                                'postal_code' => [
                                    'name' => 'PD1851',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sumbiling Lama',
                                'postal_code' => [
                                    'name' => 'PD1751',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Bangar',
                        'village' => [
                            [
                                'name' => 'Pekan Bangar',
                                'postal_code' => [
                                    'name' => 'PA1151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bang Bulan',
                                'postal_code' => [
                                    'name' => 'PA2951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Batang Tuau',
                                'postal_code' => [
                                    'name' => 'PA3351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Batu Bejarah',
                                'postal_code' => [
                                    'name' => 'PA4751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Belingos',
                                'postal_code' => [
                                    'name' => 'PA3151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Gadong',
                                'postal_code' => [
                                    'name' => 'PA1351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kinalog',
                                'postal_code' => [
                                    'name' => 'PA4151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lagau',
                                'postal_code' => [
                                    'name' => 'PA4351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Menengah',
                                'postal_code' => [
                                    'name' => 'PA1751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Parit Belayang',
                                'postal_code' => [
                                    'name' => 'PA2551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Piungan',
                                'postal_code' => [
                                    'name' => 'PA4551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Puni',
                                'postal_code' => [
                                    'name' => 'PA3751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Semamang',
                                'postal_code' => [
                                    'name' => 'PA2751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Subok',
                                'postal_code' => [
                                    'name' => 'PA4951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Seri Tanjong Belayang',
                                'postal_code' => [
                                    'name' => 'PA3551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Tanam',
                                'postal_code' => [
                                    'name' => 'PA2351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Tanit',
                                'postal_code' => [
                                    'name' => 'PA2151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Sulok',
                                'postal_code' => [
                                    'name' => 'PA1951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Ujong Jalan',
                                'postal_code' => [
                                    'name' => 'PA3951',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Batu Apoi',
                        'village' => [
                            [
                                'name' => 'Kampong Batu Apoi',
                                'postal_code' => [
                                    'name' => 'PC1151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Gadong Baru',
                                'postal_code' => [
                                    'name' => 'PC1951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lakiun',
                                'postal_code' => [
                                    'name' => 'PC2751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lamaling',
                                'postal_code' => [
                                    'name' => 'PC3151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Luagan',
                                'postal_code' => [
                                    'name' => 'PC2151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Negalang Ering',
                                'postal_code' => [
                                    'name' => 'PC2351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Negalang Unat',
                                'postal_code' => [
                                    'name' => 'PC2551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Peliunan',
                                'postal_code' => [
                                    'name' => 'PC1551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Rebada',
                                'postal_code' => [
                                    'name' => 'PC3751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Selapon',
                                'postal_code' => [
                                    'name' => 'PC3351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Selilit',
                                'postal_code' => [
                                    'name' => 'PC1751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sekurop',
                                'postal_code' => [
                                    'name' => 'PC3551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Simbatang',
                                'postal_code' => [
                                    'name' => 'PC3951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Sungai Radang',
                                'postal_code' => [
                                    'name' => 'PC1351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Tanjong Bungar',
                                'postal_code' => [
                                    'name' => 'PC2951',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Bokok',
                        'village' => [
                            [
                                'name' => 'Kampong Bakarut',
                                'postal_code' => [
                                    'name' => 'PE2351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Belais Besar',
                                'postal_code' => [
                                    'name' => 'PE1351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Belais Kecil',
                                'postal_code' => [
                                    'name' => 'PE1551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Bokok',
                                'postal_code' => [
                                    'name' => 'PE1951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Buda-Buda',
                                'postal_code' => [
                                    'name' => 'PE1151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Kenua',
                                'postal_code' => [
                                    'name' => 'PE3351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lepong Baru',
                                'postal_code' => [
                                    'name' => 'PE3551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lepong',
                                'postal_code' => [
                                    'name' => 'PE3751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Lepong Lama',
                                'postal_code' => [
                                    'name' => 'PE3751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Maniup',
                                'postal_code' => [
                                    'name' => 'PE2151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Paya Bagangan',
                                'postal_code' => [
                                    'name' => 'PE1751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Rataie',
                                'postal_code' => [
                                    'name' => 'PE2751',
                                ],
                            ],
                            [
                                'name' => 'Kampong Semabat',
                                'postal_code' => [
                                    'name' => 'PE4151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Simbatang',
                                'postal_code' => [
                                    'name' => 'PE2551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Temada',
                                'postal_code' => [
                                    'name' => 'PE4351',
                                ],
                            ],
                            [
                                'name' => 'Kampong Perpindahan Rataie',
                                'postal_code' => [
                                    'name' => 'PE2951',
                                ],
                            ],
                            [
                                'name' => 'Kampong Rakyat Jati',
                                'postal_code' => [
                                    'name' => 'PE3151',
                                ],
                            ],
                            [
                                'name' => 'Hutan Simpanan Batu Apoi',
                                'postal_code' => [
                                    'name' => 'PE4551',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mukim Labu',
                        'village' => [
                            [
                                'name' => 'Kampong Labu Estate',
                                'postal_code' => [
                                    'name' => 'PB1151',
                                ],
                            ],
                            [
                                'name' => 'Kampong Piasau-Piasau',
                                'postal_code' => [
                                    'name' => 'PB1551',
                                ],
                            ],
                            [
                                'name' => 'Kampong Senukoh',
                                'postal_code' => [
                                    'name' => 'PB1351',
                                ],
                            ],
                        ],
                    ],
                ], //array of mukims
            ], //array of districts
            [
                'name' => 'Government Departments',
                'mukim' => [
                    [
                        'name' => 'Jabatan Perdana Menteri',
                        'village' => [
                            [
                                'name' => 'Adat Istiadat Negara',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'JPM (Bangunan Setiausaha Kerajaan)',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'JPM (Istana Nurul Iman)',
                                'postal_code' => [
                                    'name' => 'BA1000',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Hal Ehwal Dalam Negeri',
                        'village' => [
                            [
                                'name' => 'Jabatan Bandaran (Bandar Seri Begawan)',
                                'postal_code' => [
                                    'name' => 'BS8810',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Buruh',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Daerah Temburong',
                                'postal_code' => [
                                    'name' => 'PA1351',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Daerah Tutong',
                                'postal_code' => [
                                    'name' => 'TA1141',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Imigresen dan Pendaftaran',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Penjara',
                                'postal_code' => [
                                    'name' => 'BG3122',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perkhidmatan Bomba',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Hal Ehwal Dalam Negeri',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Hal Ehwal Luar Negeri',
                        'village' => [
                            [
                                'name' => 'Kementerian Hal Ehwal Luar Negeri',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'Pusat Persidangan Antarabangsa',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Hal Ehwal Ugama',
                        'village' => [
                            [
                                'name' => 'Institut Pengajian Islam Brunei Darussalam',
                                'postal_code' => [
                                    'name' => 'BA1712',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Hal Ehwal Masjid',
                                'postal_code' => [
                                    'name' => 'BA2110',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Hal Ehwal Syariah',
                                'postal_code' => [
                                    'name' => 'BS8510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Urusan Haji',
                                'postal_code' => [
                                    'name' => 'BA2110',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Hal Ehwal Ugama',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Pejabat Kadi Besar',
                                'postal_code' => [
                                    'name' => 'BS8510',
                                ],
                            ],
                            [
                                'name' => 'Pejabat Pengajian Islam',
                                'postal_code' => [
                                    'name' => 'BD1310',
                                ],
                            ],
                            [
                                'name' => 'Pusat Dakwah Islamiah',
                                'postal_code' => [
                                    'name' => 'BB4310',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Kesihatan',
                        'village' => [
                            [
                                'name' => 'Hospital RIPAS',
                                'postal_code' => [
                                    'name' => 'BA1710',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perubatan dan Kesihatan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Kesihatan',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Kewangan',
                        'village' => [
                            [
                                'name' => 'Agensi Pelaburan Brunei',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perbendaharaan',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Teknologi Maklumat dan Stor Negara',
                                'postal_code' => [
                                    'name' => 'BE2220',
                                ],
                            ],
                            [
                                'name' => 'Kastam dan Eksais Diraja',
                                'postal_code' => [
                                    'name' => 'BS8810',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Kewangan',
                                'postal_code' => [
                                    'name' => 'BS8710',
                                ],
                            ],
                            [
                                'name' => 'Lembaga Mata Wang',
                                'postal_code' => [
                                    'name' => 'BS8610',
                                ],
                            ],
                            [
                                'name' => 'Perancangan dan Kemajuan Ekonomi',
                                'postal_code' => [
                                    'name' => 'BS8710',
                                ],
                            ],
                            [
                                'name' => 'Tabung Amanah Pekerja',
                                'postal_code' => [
                                    'name' => 'BS8710',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Pembangunan',
                        'village' => [
                            [
                                'name' => 'Jabatan Kemajuan Perumahan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Kerja Raya',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perancangan Bandar dan Desa',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perkhidmatan Eletrik',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Pembangunan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Pejabat Tanah',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Pejabat Ukur',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Pendidikan',
                        'village' => [
                            ['name' => 'Jabatan Kenaziran Sekolah-Sekolah',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Kurikulum',
                                'postal_code' => [
                                    'name' => 'BE1310',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Pendidikan Teknik',
                                'postal_code' => [
                                    'name' => 'BE1310',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Pentadbiran dan Perkhidmatan-Perkhidmatan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Peperiksaan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perancangan dan Pemeliharaan Bangunan dan Kawasan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perkembangan Kurikulum',
                                'postal_code' => [
                                    'name' => 'BS8410',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Sekolah-Sekolah',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Pendidikan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Universiti Brunei Darussalam',
                                'postal_code' => [
                                    'name' => 'BE1410',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Perhubungan',
                        'village' => [
                            [
                                'name' => 'Jabatan Laut',
                                'postal_code' => [
                                    'name' => 'BT1728',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Pelabuhan-Pelabuhan',
                                'postal_code' => [
                                    'name' => 'BT1728',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Penerbangan Awam',
                                'postal_code' => [
                                    'name' => 'BB2513',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Pengangkutan Darat',
                                'postal_code' => [
                                    'name' => 'BE1110',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perkhidmatan Pos',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Telekom',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Perhubungan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Perindustrian dan Sumber-Sumber Utama',
                        'village' => [
                            [
                                'name' => 'Badan Kemajuan Industri Brunei (BINA)',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perhutanan',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Perikanan',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Pertanian',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Perindustrian dan Sumber-Sumber Utama',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                            [
                                'name' => 'Semaun Holdings',
                                'postal_code' => [
                                    'name' => 'BB3910',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Pertahanan',
                        'village' => [
                            [
                                'name' => 'Angkatan Bersenjata Diraja Brunei',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Unit Gurka Simpanan',
                                'postal_code' => [
                                    'name' => 'BD2917',
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kementerian Undang-Undang',
                        'village' => [
                            [
                                'name' => 'Jabatan Kehakiman',
                                'postal_code' => [
                                    'name' => 'BA1910',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Percetakan',
                                'postal_code' => [
                                    'name' => 'BB3510',
                                ],
                            ],
                            [
                                'name' => 'Jabatan Undang-Undang',
                                'postal_code' => [
                                    'name' => 'BA1910',
                                ],
                            ],
                            [
                                'name' => 'Kementerian Undang-Undang',
                                'postal_code' => [
                                    'name' => 'BA1910',
                                ],
                            ],
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

                    $postcode_row = PostalCode::create([
                        'name' => $village['postal_code']['name'],
                        'village_id' => $village_row->id,
                    ]);
                }
            }
        }
    }
}
