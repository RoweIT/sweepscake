<?php

use App\Models\Baker;
use App\Models\Event;
use App\Models\Series;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $series15 = Series::create([
            'slug' => 'gbbo-series-15', 'name' => 'Great British Bake Off 2024 (series 15)',
            'start_on' => new Carbon('2024-10-24'), 'status' => Series::STATUS_ACTIVE, 'image_path' => 'series/gbbo-series-15.avif'
        ]);

        $andy = Baker::create([
            'slug' => 'andy-15', 'name' => 'Andy', 'age' => 44, 'from' => 'Essex',
            'job' => 'Car mechanic', 'image_path' => 'bakers/2024/andy.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $christiaan = Baker::create([
            'slug' => 'christiaan-15', 'name' => 'Christiaan', 'age' => 33, 'from' => 'London (originally from the Netherlands)',
            'job' => 'Menswear designer', 'image_path' => 'bakers/2024/christiaan.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $dylan = Baker::create([
            'slug' => 'dylan-15', 'name' => 'Dylan ', 'age' => 20, 'from' => 'Buckinghamshire',
            'job' => 'Retail assistant', 'image_path' => 'bakers/2024/dylan.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $georgie = Baker::create([
            'slug' => 'georgie-15', 'name' => 'Georgie', 'age' => 34, 'from' => 'Carmarthenshire',
            'job' => 'Paediatric nurse', 'image_path' => 'bakers/2024/georgie.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $gill = Baker::create([
            'slug' => 'gill-15', 'name' => 'Gill', 'age' => 53, 'from' => 'Lancashire',
            'job' => 'Senior category manager', 'image_path' => 'bakers/2024/gill.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $hazel = Baker::create([
            'slug' => 'hazel-15', 'name' => 'Hazel', 'age' => 71, 'from' => 'Kent',
            'job' => 'Retired nail technician', 'image_path' => 'bakers/2024/hazel.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $illiyin = Baker::create([
            'slug' => 'illiyin-15', 'name' => 'Illiyin', 'age' => 31, 'from' => 'Norfolk',
            'job' => 'Birth trauma specialist midwife', 'image_path' => 'bakers/2024/illiyin.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);


        $jeff = Baker::create([
            'slug' => 'jeff-15', 'name' => 'Jeff', 'age' => 67, 'from' => 'West Yorkshire (originally The Bronx)',
            'job' => 'Retired University Lecturer', 'image_path' => 'bakers/2024/jeff.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $john = Baker::create([
            'slug' => 'john-15', 'name' => 'John', 'age' => 37, 'from' => 'Willenhall',
            'job' => 'Directorate support manager', 'image_path' => 'bakers/2024/john.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $mike = Baker::create([
            'slug' => 'mike-15', 'name' => 'Mike', 'age' => 29, 'from' => 'Wiltshire',
            'job' => 'Farm manager', 'image_path' => 'bakers/2024/mike.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $nelly = Baker::create([
            'slug' => 'nelly-15', 'name' => 'Nelly', 'age' => 44, 'from' => 'Dorset (originally from Slovakia)',
            'job' => 'Palliative care assistant', 'image_path' => 'bakers/2024/nelly.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $sumayah = Baker::create([
            'slug' => 'sumayah-15', 'name' => 'Sumayah', 'age' => 18, 'from' => 'Lancashire',
            'job' => 'Dentistry student', 'image_path' => 'bakers/2024/sumayah.avif', 'series_id' => $series15->id,
            'bio' => ""
        ]);

        $s15_wk1 = Week::create([
            'series_id' => $series15->id,
            'week_num' => 1,
            'theme' => 'Cake', 'signature' => 'Loaf cake', 'technical' => '8 mini Battenburgs', 'showstopper' => 'Hyperrealistic Illusion Cake'
        ]);

        $s15_wk2 = Week::create([
            'series_id' => $series15->id,
            'week_num' => 2,
            'theme' => 'Biscuits', 'signature' => 'Viennese Whirls', 'technical' => 'Mint Cream Biscuites', 'showstopper' => 'Biscujit Puppet Theatre'
        ]);

        $s15_wk3 = Week::create([
            'series_id' => $series15->id,
            'week_num' => 3,
            'theme' => 'Bread', 'signature' => 'Savoury Buns Loaf', 'technical' => 'Plaited Loaf', 'showstopper' => 'Bread Cornucopia Display'
        ]);

        $s15_wk4 = Week::create([
            'series_id' => $series15->id,
            'week_num' => 4,
            'theme' => 'Caramel', 'signature' => '12 Caramel Biscuits', 'technical' => 'Pear Tarte Tatin', 'showstopper' => 'Caramel Mousse Cake'
        ]);

        $s15_wk5 = Week::create([
            'series_id' => $series15->id,
            'week_num' => 5,
            'theme' => 'Pastry', 'signature' => '12 Frangipane Tarts', 'technical' => 'Spanakopita', 'showstopper' => 'Paris-Brest'
        ]);


        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $john->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $georgie->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $christiaan->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $john->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $mike->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $illiyin->id, 'type' => EVENT::TYPE_HANDSHAKE]);

        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $sumayah->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $mike->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $john->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $sumayah->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $dylan->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s15_wk2->id, 'baker_id' => $hazel->id, 'type' => EVENT::TYPE_ELIMINATED]);
        Event::create(['week_id' => $s15_wk2->id, 'baker_id' => $jeff->id, 'type' => EVENT::TYPE_ELIMINATED]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $christiaan->id, 'type' => EVENT::TYPE_HANDSHAKE]);

        Event::create(['week_id' => $s15_wk3->id, 'baker_id' => $dylan->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s15_wk3->id, 'baker_id' => $nelly->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s15_wk3->id, 'baker_id' => $sumayah->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s15_wk3->id, 'baker_id' => $andy->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s15_wk3->id, 'baker_id' => $dylan->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s15_wk3->id, 'baker_id' => $john->id, 'type' => EVENT::TYPE_ELIMINATED]);
        Event::create(['week_id' => $s15_wk1->id, 'baker_id' => $dylan->id, 'type' => EVENT::TYPE_HANDSHAKE]);

        Event::create(['week_id' => $s15_wk4->id, 'baker_id' => $georgie->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s15_wk4->id, 'baker_id' => $georgie->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s15_wk4->id, 'baker_id' => $christiaan->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s15_wk4->id, 'baker_id' => $sumayah->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s15_wk4->id, 'baker_id' => $andy->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s15_wk4->id, 'baker_id' => $mike->id, 'type' => EVENT::TYPE_ELIMINATED]);

        Event::create(['week_id' => $s15_wk5->id, 'baker_id' => $gill->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s15_wk5->id, 'baker_id' => $dylan->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s15_wk5->id, 'baker_id' => $christiaan->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s15_wk5->id, 'baker_id' => $nelly->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s15_wk5->id, 'baker_id' => $gill->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s15_wk5->id, 'baker_id' => $andy->id, 'type' => EVENT::TYPE_ELIMINATED]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
