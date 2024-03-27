<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalyseSeeder extends Seeder
{
    private $analyse = [

        [
            'name' => 'CT scan',
            'description'=> 'A CT (computed tomography) scan is a type of x-ray that creates 3-dimensional images of your body, including bones, organs, tissues and tumours. The machine moves in a circular motion around you and takes x-rays of very thin slices of your body to create a cross-sectional image.',
        ],
        [
            'name' => 'Electrocardiogram (ECG)',
            'description'=>'An ECG is a graph of your heart\'s electrical activity. It is a safe test. There is no risk of being electrocuted.',
        ],
        [
            'name' => 'Magnetic Resonance Imaging (MRI) Scan',
            'description'=>'A magnetic resonance imaging (MRI) scan takes detailed pictures of the inside of the body. It can show up problems in the soft tissues without the need for surgery. It is also useful for planning some treatments of the same areas.',
        ],
        [
            'name' => 'X-Rays',
            'description'=>'An x-ray uses radiation to create a picture of the inside of the body. The x-ray beam is absorbed differently by various structures in the body, such as bones and soft tissues, and this is used to create the image. X-ray is also known as radiography.',
        ],
        [
            'name' => 'Ultrasound',
            'description'=>'An ultrasound scan creates a real-time picture of the inside of the body using sound waves. Ultrasound is generally painless and non-invasive. Ultrasound works differently to x-ray in that it does not use radiation.',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analyses')->insert($this->analyse);
    }
}
