<?php

use App\Constants\Roles;
use App\Models\Baker;
use App\Models\Event;
use App\Models\Series;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $series13 = Series::create(['slug' => 'gbbo-series-13', 'name' => 'Great British Bake Off 2021 (series 13)',
            'start_on' => new Carbon('2022-09-13'), 'status' => Series::STATUS_PENDING, 'image_path' => 'series/gbbo-series-13-640.jpg']);

        $abdul = Baker::create(['slug' => 'abdul-13', 'name' => 'Abdul', 'age' => 29, 'from' => 'London',
            'job' => 'Electronics Engineer', 'image_path' => 'bakers/2022/abdul.jpg', 'series_id' => $series13->id,
            'bio' => "Abdul is an electronics engineer from London and he was raised in Saudi Arabia by Pakistani parents. As one of three children, he was always getting into mischief, pulling apart electrical items at home. His passion has now become his job, but as well as engineering he also has a flare for salsa dancing and all things outer space. Abdul's passion for baking started when he and his graduate colleagues made cakes for each other, with matcha being his favourite flavour to work with."]);
        $carole = Baker::create(['slug' => 'carole-13', 'name' => 'Carole', 'age' => 59, 'from' => 'Dorset',
            'job' => 'Supermarket Cashier', 'image_path' => 'bakers/2022/carole.jpg', 'series_id' => $series13->id,
            'bio' => "Carole is a supermarket cashier from Dorset and she lives at home in the West Country with her husband Michael. She is known as Compost Carole to local residents as she has a gardening segment on a local radio show. Carole loves to create colourful bakes inspired by her passion for the great outdoors. One of her first baking challenges was making a first birthday cake for her granddaughter, Maisie."]);
        $dawn = Baker::create(['slug' => 'dawn-13', 'name' => 'Dawn', 'age' => 60, 'from' => 'Bedfordshire',
            'job' => 'IT Manager', 'image_path' => 'bakers/2022/dawn.jpg', 'series_id' => $series13->id,
            'bio' => "Dawn works as an IT manager in Bedfordshire and she lives with her partner, Trevor. The mother of three loves creating illusions when it comes to baking and she loves intricate designs. She has a keen eye for detail and a steady hand, so she should be a pro when it comes to creating stunning bakes."]);
        $james = Baker::create(['slug' => 'james-13', 'name' => 'James', 'age' => 25, 'from' => 'Cumbria',
            'job' => 'Nuclear Scientist', 'image_path' => 'bakers/2022/james.jpg', 'series_id' => $series13->id,
            'bio' => "James is a nuclear scientist from Cumbria and he grew up in Glasgow, moving to England for university. He loves all things music, horror films and board games, and reflects his passions in his bakes. Due to the nature of his job, he enjoys the technical elements of baking. He loves autumnal flavours including apples, caramel and mixed spices."]);
        $janusz = Baker::create(['slug' => 'janusz-13', 'name' => 'Janusz', 'age' => 34, 'from' => 'East Sussex',
            'job' => 'Headteachers PA', 'image_path' => 'bakers/2022/janusz.jpg', 'series_id' => $series13->id,
            'bio' => "Janusz is a headteacher's PA from East Sussex and he grew up in Poland, having moved to the UK 10 years ago. He lives with his boyfriend Simon and apart from baking, he loves watching drag acts and collecting movie props. His mother inspired him to bake and he loves creating colourful and camp works of art in the kitchen. Staying true to his roots, he loves incorporating Polish ingredients into his dishes."]);
        $kevin = Baker::create(['slug' => 'kevin-13', 'name' => 'Kevin', 'age' => 33, 'from' => 'East Lanarkshire'
            , 'job' => 'Music Teacher', 'image_path' => 'bakers/2022/kevin.jpg', 'series_id' => $series13->id,
            'bio' => "Kevin is a music teacher from Lanarkshire and he loves spending time with his family, including his wife Rachel and his sisters. The saxophonist began baking at the age of 17 and he believes in only using the best ingredients. Kevin loves testing out new flavour combinations with fruits, nuts and spices."]);
        $maisam = Baker::create(['slug' => 'maisam-13', 'name' => 'Maisam', 'age' => 18, 'from' => 'Manchester',
            'job' => 'Student', 'image_path' => 'bakers/2022/mainsam.jpg', 'series_id' => $series13->id,
            'bio' => "Maisam is the youngest in the tent and she is a student from Greater Manchester. She is originally from Libya but has lived in the UK since she was nine, and can speak five languages. When she is not baking, which she has done since she was 13, she enjoys photography. She loves Mediterranean flavours such as olives and dates."]);
        $maxy = Baker::create(['slug' => 'maxy-13', 'name' => 'Maxy', 'age' => 29, 'from' => 'London',
            'job' => 'Achitectural Assistant', 'image_path' => 'bakers/2022/maxy.jpg', 'series_id' => $series13->id,
            'bio' => "Maxy is an architectural assistant from London and she was born in Sweden. The mother of two studied fine art and is a DIY pro, so she should perform well in the showstopper challenges. She began baking when her first daughter was born and loves making celebration cakes."]);
        $rebs = Baker::create(['slug' => 'rebs-13', 'name' => 'Rebs', 'age' => 23, 'from' => 'County Antrim',
            'job' => 'Masters Student', 'image_path' => 'bakers/2022/rebs.jpg', 'series_id' => $series13->id,
            'bio' => "Rebs is a masters student from County Antrim and she grew up in Northern Ireland. Her earliest baking memory was from when she helped her mum out in the kitchen at three years old. She enjoys using Middle Eastern ingredients, paying homage to her boyfriend Jack's Turkish roots."]);
        $sandro = Baker::create(['slug' => 'sandro-13', 'name' => 'Sandro', 'age' => 30, 'from' => 'London',
            'job' => 'Nanny', 'image_path' => 'bakers/2022/sandro.jpg', 'series_id' => $series13->id,
            'bio' => "Sandro works as a nanny in London, having fled the Angolan war when he was two years old. He may be a boxer, but he also has a passion for ballet dancing and breakdancing. His father died when he was 21 and he turned to baking as a way of coping with the loss. He uses his Angolan roots in his cooking, offering virtual baking classes for children with autism."]);
        $syabira = Baker::create(['slug' => 'syabira-13', 'name' => 'Syabira', 'age' => 32, 'from' => 'London',
            'job' => 'Cardiovascular Research Associate', 'image_path' => 'bakers/2022/syabira.jpg', 'series_id' => $series13->id,
            'bio' => "Syabira is a cardiovascular research associate from London and she was born in Malaysia. She comes from a huge family and now lives with her boyfriend Bradley. She started baking in 2017 and loves adding Malaysian twists to British bakes."]);
        $will = Baker::create(['slug' => 'will-13', 'name' => 'Will', 'age' => 45, 'from' => 'London',
            'job' => 'Former Charity Director', 'image_path' => 'bakers/2022/will.jpg', 'series_id' => $series13->id,
            'bio' => "Will is a former charity director from London and he lives in London with his wife and three children. He has a passion for DIY and carpentry and utilises his hobbies in his baking. Loving the technical side of baking, he is a particular fan of using yeast."]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // TODO
    }
};
