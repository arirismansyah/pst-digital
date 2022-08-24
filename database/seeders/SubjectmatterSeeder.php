<?php

namespace Database\Seeders;

use App\Models\Subjectmatter;
use Illuminate\Database\Seeder;

class SubjectmatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Subjectmatter::create([
            'nama_fungsi'=>'IPDS'
        ]);

        Subjectmatter::create([
            'nama_fungsi'=>'Nerwilis'
        ]);

        Subjectmatter::create([
            'nama_fungsi'=>'Sosial'
        ]);

        Subjectmatter::create([
            'nama_fungsi'=>'Produksi'
        ]);

        Subjectmatter::create([
            'nama_fungsi'=>'Distribusi'
        ]);
        
    }
}
