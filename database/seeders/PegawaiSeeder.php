<?php

namespace Database\Seeders;

use App\Models\Master\Pegawai;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $kepala = Pegawai::create([
            'nama'  => 'Rudi Hermanto SST, M.Si.',
            'nip_lama'  => '340016438',
            'nip_baru'  => '197804192002121002',
            'nik'  => '1106121904780001',
            'golongan' => 'IV/b',
            'pangkat' => 'Pembina TK I',
            'jabatan' => 'Kepala',
            'email' => 'rhermanto@bps.go.id',
            'no_rek' => '7146667958',
            'nama_bank' => 'BSI',
            'an_rek' => 'Rudi Hermanto',
            'no_hp' => '08126967480',
        ]);

        $kasubbag = Pegawai::create([
            'nama'      => 'T. Ariansyah, SE',
            'nip_lama'  => '340054469',
            'nip_baru'  => '198304112011011014',
            'nik'       => '1105011104830004',
            'golongan'  => 'III/d',
            'pangkat'   => 'Penata TK I',
            'jabatan'   => 'Kasubbag Umum',
            'email'     => 'ariansyah@bps.go.id',
            'no_rek'    => '1035419736',
            'nama_bank' => 'BSI',
            'an_rek'    => 'T. Ariansyah',
            'no_hp'     => '081360505024',
        ]);

        $pegawai1 = Pegawai::create([
            'nama'      => 'Firmansyah, SE',
            'nip_lama'  => '340054431',
            'nip_baru'  => '198411172011011010',
            'nik'       => '1105011711840002',
            'golongan'  => 'IV/b',
            'pangkat'   => 'Penata TK I',
            'jabatan'   => 'Pranata Komputer Ahli Muda',
            'email'     => 'firmans@bps.go.id',
            'no_rek'    => '1031070712',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Firmansyah',
            'no_hp'     => '081397777500',
        ]);

        $pegawai2 = Pegawai::create([
            'nama'      => 'T. Hamdani, SE',
            'nip_lama'  => '340018792',
            'nip_baru'  => '197204092006041013',
            'nik'       => '1105020904720003',
            'golongan'  => 'III/b',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Statistisi Ahli Pertama',
            'email'     => 'thamdani@bps.go.id ',
            'no_rek'    => '1035419558',
            'nama_bank' => 'BSI',
            'an_rek'    => 'T. Hamdani',
            'no_hp'     => '081360096028',
        ]);

        $pegawai3 = Pegawai::create([
            'nama'      => 'Darwis',
            'nip_lama'  => '340016305',
            'nip_baru'  => '197208012001121003',
            'nik'       => '1105010108720004',
            'golongan'  => 'III/a',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Statistisi Pelaksana Lanjutan',
            'email'     => 'darwis@bps.go.id',
            'no_rek'    => '1035420661',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Darwis',
            'no_hp'     => '085297885440',
        ]);

        $pegawai4 = Pegawai::create([
            'nama'      => 'Riniwati',
            'nip_lama'  => '340018219',
            'nip_baru'  => '198611132006042002',
            'nik'       => '1105015311860001',
            'golongan'  => 'III/b',
            'pangkat'   => 'Penata Muda TK I',
            'jabatan'   => 'Statistisi Pelaksana Lanjutan',
            'email'     => 'riniwati@bps.go.id',
            'no_rek'    => '1035420998',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Riniwati',
            'no_hp'     => '085296099933',
        ]);

        $pegawai5 = Pegawai::create([
            'nama'      => 'M. Nazaruddin Z., SP',
            'nip_lama'  => '340054443',
            'nip_baru'  => '198211272011011011',
            'nik'       => '1105042711820001',
            'golongan'  => 'III/d',
            'pangkat'   => 'Penata TK I',
            'jabatan'   => 'Statistisi Ahli Muda',
            'email'     => 'nazaruddin@bps.go.id',
            'no_rek'    => '1035420707',
            'nama_bank' => 'BSI',
            'an_rek'    => 'M. Nazaruddin Z.',
            'no_hp'     => '082260222189',
        ]);

        $pegawai6 = Pegawai::create([
            'nama'      => 'Dhia Ulfakhirah, S.Tr.Stat',
            'nip_lama'  => '340059475',
            'nip_baru'  => '199707152019122002',
            'nik'       => '1106075507970002',
            'golongan'  => 'III/b',
            'pangkat'   => 'Penata Muda TK I',
            'jabatan'   => 'Statistisi Ahli Pertama',
            'email'     => 'dhia.ulfakhirah@bps.go.id',
            'no_rek'    => '1048255546',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Dhia Ulfakhirah',
            'no_hp'     => '082160501510',
        ]);

        $pegawai7 = Pegawai::create([
            'nama'      => 'Afriyani, S.Stat',
            'nip_lama'  => '340059060',
            'nip_baru'  => '199509102019032001',
            'nik'       => '1103035009950005',
            'golongan'  => 'III/b',
            'pangkat'   => 'Penata Muda TK I',
            'jabatan'   => 'Statistisi Ahli Pertama',
            'email'     => 'afriyani@bps.go.id',
            'no_rek'    => '1042879629',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Afriyani',
            'no_hp'     => '081313776652',
        ]);

        $pegawai8 = Pegawai::create([
            'nama'      => 'Safriadi, A.Md',
            'nip_lama'  => '340054461',
            'nip_baru'  => '198807152011011004',
            'nik'       => '1101151507880001',
            'golongan'  => 'III/a',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Statistisi Mahir',
            'email'     => 'safriadi@bps.go.id',
            'no_rek'    => '1035419647',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Safriadi',
            'no_hp'     => '085277635563',
        ]);

        $pegawai9 = Pegawai::create([
            'nama'      => 'Lisnadiani, SE',
            'nip_lama'  => '340019979',
            'nip_baru'  => '1104035011880008',
            'nik'       => '198811102008012001',
            'golongan'  => 'III/b',
            'pangkat'   => 'Penata Muda TK I',
            'jabatan'   => 'APK APBN Ahli Pertama',
            'email'     => 'lisnadiani@bps.go.id',
            'no_rek'    => '1046739977',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Lisnadiani',
            'no_hp'     => '085277442184',
        ]);

        $pegawai10 = Pegawai::create([
            'nama'      => 'Gharisa Nur Fitri, S.Tr.Stat',
            'nip_lama'  => '340060116',
            'nip_baru'  => '199711132021042001',
            'nik'       => '3273015311970001',
            'golongan'  => 'III/a',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Statistisi Ahli Pertama',
            'email'     => 'gharisa.nur@bps.go.id',
            'no_rek'    => '1061557567',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Gharisa Nur Fitri',
            'no_hp'     => '08986120214',
        ]);

        $pegawai11 = Pegawai::create([
            'nama'      => 'Salsabila Ainayafani, S.Tr.Stat',
            'nip_lama'  => '340060905',
            'nip_baru'  => '199902052022012003',
            'nik'       => '3323024502990001',
            'golongan'  => 'III/a',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Statistisi Ahli Pertama',
            'email'     => 'salsabila.ainaya@bps.go.id',
            'no_rek'    => '7192957359',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Salsabila Ainayafani',
            'no_hp'     => '081329414154',
        ]);

        $pegawai12 = Pegawai::create([
            'nama'      => 'Muhammad Khumaidi, A.Md',
            'nip_lama'  => '340061433',
            'nip_baru'  => '199411102022031003',
            'nik'       => '1107131011940004',
            'golongan'  => 'II/c',
            'pangkat'   => 'Pengatur',
            'jabatan'   => 'Statistisi Pelaksana',
            'email'     => 'muh.khumaidi@bps.go.id',
            'no_rek'    => '7197957168',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Muhammad Khumaidi',
            'no_hp'     => '085210006467',
        ]);

        $pegawai13 = Pegawai::create([
            'nama'      => 'Haris Yusuf, A.Md',
            'nip_lama'  => '340061324',
            'nip_baru'  => '199402182022031002',
            'nik'       => '1101081802940001',
            'golongan'  => 'II/c',
            'pangkat'   => 'Pengatur',
            'jabatan'   => 'Statistisi Pelaksana',
            'email'     => 'haris.yusuf@bps.go.id',
            'no_rek'    => '7150582398',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Haris Yusuf',
            'no_hp'     => '081394215004',
        ]);

        $pegawai14 = Pegawai::create([
            'nama'      => 'Ayu Aina Nurkhaliza, S.Tr.Stat',
            'nip_lama'  => '340061707',
            'nip_baru'  => '200010052023022001',
            'nik'       => '3273304510000006',
            'golongan'  => 'III/a',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Statistisi Ahli Pertama',
            'email'     => 'ayuainaa@bps.go.id',
            'no_rek'    => '7231014971',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Ayu Aina Nurkhaliza',
            'no_hp'     => '081410231905',
        ]);

        $pegawai15 = Pegawai::create([
            'nama'      => 'Zahlul Fuadi, S.Tr.Stat',
            'nip_lama'  => '340062111',
            'nip_baru'  => '200101292023021004',
            'nik'       => '1171042901010001',
            'golongan'  => 'III/a',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Pranata Komputer Ahli Pertama',
            'email'     => 'zahlul.fuadi@bps.go.id',
            'no_rek'    => '7579551540',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Zahlul Fuadi',
            'no_hp'     => '08979846945',
        ]);

        $pegawai16 = Pegawai::create([
            'nama'      => 'Muhammad Apriesya Wastu Nirbhaya, S.Tr.Stat',
            'nip_lama'  => '340062572',
            'nip_baru'  => '199904022023101001',
            'nik'       => '3604010204990382',
            'golongan'  => 'III/a',
            'pangkat'   => 'Penata Muda',
            'jabatan'   => 'Pranata Komputer Ahli Pertama',
            'email'     => 'apriesya.wastu@bps.go.id',
            'no_rek'    => '9063742300',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Muhammad Apriesya Wastu Nirbhaya',
            'no_hp'     => '081318146776',
        ]);

        $pegawai17 = Pegawai::create([
            'nama'      => 'Tika Widya Wardani, S.Si',
            'nip_lama'  => '340056545',
            'nip_baru'  => '198807112014032003',
            'nik'       => '',
            'golongan'  => 'III/c',
            'pangkat'   => 'Penata',
            'jabatan'   => 'Statistisi Ahli Muda',
            'email'     => 'tika.widya@bps.go.id',
            'no_rek'    => '7085364418',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Tika Widya Wardani',
            'no_hp'     => '081329641822',
        ]);

        $pegawai18 = Pegawai::create([
            'nama'      => 'Yulia Geubrina, SST',
            'nip_lama'  => '340056913',
            'nip_baru'  => '199107012014102001',
            'nik'       => '1106084107910109',
            'golongan'  => 'III/c',
            'pangkat'   => 'Penata',
            'jabatan'   => 'Statistisi Ahli Muda',
            'email'     => 'yuliageubrina@bps.go.id',
            'no_rek'    => '1042091657',
            'nama_bank' => 'BSI',
            'an_rek'    => 'Yulia Geubrina',
            'no_hp'     => '081269780880',
        ]);
    }
}
