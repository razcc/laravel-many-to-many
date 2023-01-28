<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'bovino',
            'maialo',
            'pesce',
            'vegetariano',
            'vegano'
        ];

        foreach($tags as $tag){
            $new_record = new Tag();
            $new_record->name = $tag;
            $new_record->save();
        }
    }
}
