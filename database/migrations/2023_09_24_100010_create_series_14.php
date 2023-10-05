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
        $series14 = Series::create([
            'slug' => 'gbbo-series-14', 'name' => 'Great British Bake Off 2023 (series 14)',
            'start_on' => new Carbon('2023-09-26'), 'status' => Series::STATUS_ACTIVE, 'image_path' => 'series/gbbo-series-14.avif'
        ]);

        $abbi = Baker::create([
            'slug' => 'abbi-14', 'name' => 'Abbi', 'age' => 27, 'from' => 'Cumbria',
            'job' => 'Delivery driver', 'image_path' => 'bakers/2023/abbi.avif', 'series_id' => $series14->id,
            'bio' => "Yorkshire-born Abbi first learned to bake alongside her mum, honing those early skills during her teens, when she became enthralled by the Victorian era and especially the traditional bakes of the time – steamed puddings, fruit cakes and more. Now she takes her inspiration from her environment and the beautiful English countryside around her home. A lover of the great outdoors, she forages for seasonal ingredients – the bigger and bolder, the better – and puts her homegrown veg to good use. Abbi’s bakes aim to combine comfort and familiarity with a strong nod towards nature, and a feeling of creating something magical – bakes with a touch of fairytale!"
        ]);


        $amos = Baker::create([
            'slug' => 'amos-14', 'name' => 'Amos', 'age' => 59, 'from' => 'London',
            'job' => 'Deli and grocery manager', 'image_path' => 'bakers/2023/amos.avif', 'series_id' => $series14->id,
            'bio' => "Film and theatre enthusiast, theme-park lover and hospitality professional, Amos grew up in Nottingham with his mum and sister, but now lives and works in North London. As a child, Amos was always amazed by his mum’s ability to whip up delicious bakes at a moment’s notice – making her both the inspiration and the role model for his own commitment to some serious baking. Amos describes his bakes as a labour of love – his style is colourful and chic with keen attention to detail, and he loves exploring different flavour profiles. He compares his baking style to the converted church that he now lives in, calling both his style and home 'traditional with a modern twist'."
        ]);

        $cristy = Baker::create([
            'slug' => 'cristy-14', 'name' => 'Cristy', 'age' => 33, 'from' => 'London',
            'job' => 'Personal assistant', 'image_path' => 'bakers/2023/cristy.avif', 'series_id' => $series14->id,
            'bio' => "Life with four children means that, for Cristy, there always seems to be a birthday to bake for and an exciting party to plan. She describes her baking style as enchanted and pretty – bakes that conjure up a sense of childhood. Cakes are her speciality, and she draws flavour inspiration from her own Israeli heritage and from her husband’s Jamaican roots. She is a dab hand with decoration and gets a thrill out of making sure the results look perfect. When she’s not organising a celebration, you can find her having an outdoor adventure, letting her hair down with her friends, or solving a Rubik’s cube – in under 4 minutes!"
        ]);

        $dan = Baker::create([
            'slug' => 'dan-14', 'name' => 'Dan', 'age' => 42, 'from' => 'Cheshire',
            'job' => 'Resource planner', 'image_path' => 'bakers/2023/dan.avif', 'series_id' => $series14->id,
            'bio' => "Dan’s interest in cooking began when he went travelling in South America in 2007. His particular loves are pies and puddings: before he and his wife bought their first home, they lived with his in-laws, during which time his mother-in-law taught him how to make perfect shortcrust pastry. Subsequently, his passion for pies has evolved into a penchant for patisserie! Perfectionist Dan loves a baking challenge and will often find the hardest bake in one of his many (more than 300!) cookbooks and start there, throwing everything he’s got at creating a masterpiece. When he’s not baking, he loves to play football with his two young sons, work out in the gym, or forage for edible treats in the countryside around his home."
        ]);

        $dana = Baker::create([
            'slug' => 'dana-14', 'name' => 'Dana', 'age' => 25, 'from' => 'Essex',
            'job' => 'Database administrator', 'image_path' => 'bakers/2023/dana.avif', 'series_id' => $series14->id,
            'bio' => "Dana’s passion for baking started at the age of 16 when she identified a gap in her family’s traditionally Indian culinary repertoire. As a self-professed untidy baker, Dana would avoid stepping on her mum’s toes in the kitchen by catching the bus to her dad’s house to indulge her need to experiment with her bakes. Now she has a kitchen of her own (and a cockapoo, Gracie, to clean up after her), Dana has become the family’s go-to celebration cake-maker. Her style is rustic and homely, but always pleasing to the eye. She loves a semi-naked cake with neat lines, pretty piping and minimalist decoration; and although she likes to keep her flavours safe, Dana will often incorporate a twist or two, adding in familiar spices associated with her Indian heritage."
        ]);

        $josh = Baker::create([
            'slug' => 'josh-14', 'name' => 'Josh', 'age' => 27, 'from' => 'Leicestershire',
            'job' => 'Research associate', 'image_path' => 'bakers/2023/josh.avif', 'series_id' => $series14->id,
            'bio' => "Josh is a chemist by trade and brings his scientist’s precision and keenness to experiment into the kitchen, taking careful notes on each part of the baking process and perfecting all his techniques for gorgeous results. He likes to take his inspiration from old baking books, reinventing classics to give them a modern twist, often by introducing alternative flavours and including the seasonal fruit and vegetables from his kitchen garden. Josh has been playing rugby for his local team for more than 15 years, and once a month he bakes lots of treats to reward his teammates after a rigorous training session. He dreams of having his own artisan bakery one day."
        ]);

        $keith = Baker::create([
            'slug' => 'keith-14', 'name' => 'Keith', 'age' => 60, 'from' => 'Hampshire',
            'job' => 'Chartered accountant', 'image_path' => 'bakers/2023/keith.avif', 'series_id' => $series14->id,
            'bio' => "Apple pies and fairy cakes – which he learned to bake with his mum – form the baking backdrop to Keith’s childhood, along with his mum’s love for traditional dishes from her home in Malta. Since those formative years, Keith has never stopped baking. Recently, though, he has returned to the baking books of the early 1970s to attempt recipes that were once ‘beyond’ him. He loves the challenge of taking on more complex bakes and has grown in confidence with bread. His partner, Sue, has got very used to waking up to the smell of a freshly baked loaf! They live with their poodle, Maisie, just a few steps from the sea."
        ]);

        $matty = Baker::create([
            'slug' => 'matty-14', 'name' => 'Matty', 'age' => 28, 'from' => 'Cambridgeshire',
            'job' => 'Teacher', 'image_path' => 'bakers/2023/matty.avif', 'series_id' => $series14->id,
            'bio' => "Matty is the type of baker who swats up on online patisserie videos before bed. No matter how good he gets, though, he strives to equal the impressiveness of the bake that first caught his imagination: a teddy-bear cake that his late nan made him for his fourth birthday. Now the family’s designated baker, he always has a list of cake requests for upcoming celebrations. He describes his style as rustic but neat, and his flavour preferences as quite traditional – he particularly loves chocolate, citrus and nuts. Once his days in the tent are over, his next – and even bigger – challenge will be to make his own wedding cake, a special commission from his fiancée, Lara."
        ]);

        $nicky = Baker::create([
            'slug' => 'nicky-14', 'name' => 'Nicky', 'age' => 52, 'from' => 'West Midlands',
            'job' => 'Pet-therapy volunteer', 'image_path' => 'bakers/2023/nicky.avif', 'series_id' => $series14->id,
            'bio' => "Nicky describes her baking as ‘like a pair of comfy old slippers; little traditional bakes that evoke fond memories’. For Nicky herself, those memories are of her Gran’s kitchen table where, as a little girl, she would roll out pastries and decorate cakes – which she says was as much fun then as all her baking is to her now. Her favourite bakes are still pastries, but she also loves making breads, and fun birthday cakes for her niece and grandchildren. When she’s not baking, Nicky volunteers for a pet-therapy charity (along with her dog, Bracken) and loves to ski, which she has been doing since she was only three years old."
        ]);

        $rowan = Baker::create([
            'slug' => 'rowan-14', 'name' => 'Rowan', 'age' => 21, 'from' => 'West Yorkshire',
            'job' => 'English literature student', 'image_path' => 'bakers/2023/rowan.avif', 'series_id' => $series14->id,
            'bio' => "‘Go big, or go home’ is Rowan’s motto, and one that he has always applied to his bakes. His earliest baking memories are of scones, pork pies, shortbread and traditional jam tarts (which he claims as a Northern delicacy). A student of English literature, when he’s not writing up a storm, Rowan is also a keen host, applying his creative eye to his cooking – he aims for clean lines and interesting decoration in his finished bakes. Just like his much-admired, knock-out cocktail-making skills, Rowan expresses his grand, opulent side in his bakes, wowing his uni friends with his creations. He made his own 21st birthday cake – a three-tier, 12-layer extravaganza."
        ]);

        $saku = Baker::create([
            'slug' => 'saku-14', 'name' => 'Saku', 'age' => 50, 'from' => 'Herefordshire',
            'job' => 'Intelligence analyst', 'image_path' => 'bakers/2023/saku.avif', 'series_id' => $series14->id,
            'bio' => "Sri Lankan-born Saku places the traditional flavours of her heritage at the heart of her baking – particularly the curry spices, which she claims make for the best pie fillings, while liberal sprinklings of cinnamon, cardamom and nutmeg find their way into her sweeter bakes. At her family home in Sri Lanka, Saku didn’t have an oven until she was 18, so she turned to baking only when she moved with her husband to the UK, in 2003, and particularly when she became a mum – rustling up treats for her children’s lunchboxes by replicating the snacks she saw in the supermarket. Self-taught, she is now a dab hand with a whisk and relishes using her homegrown ingredients from her pride and joy – her vegetable patch."
        ]);

        $tasha = Baker::create([
            'slug' => 'tasha-14', 'name' => 'Tasha', 'age' => 27, 'from' => 'Bristol',
            'job' => 'Participation officer', 'image_path' => 'bakers/2023/tasha.avif', 'series_id' => $series14->id,
            'bio' => "The best thing Tasha remembers about baking as a child was licking the sugar icing from the tops of the fairy cakes she, her mum and her grandma used to make. At secondary school, she made cakes for her friends and was soon encouraged by her Food Technology teacher to develop her skills as a hobby. Much like her attitude to life, Tasha’s baking is fearless. She uses it as a way to express herself creatively, often embarking upon near-impossible designs – with impressive results! When she’s not baking, Tasha loves going to the theatre to see a West End show and she has a passion for travelling the world."
        ]);

        $s14_wk1 = Week::create([
            'series_id' => $series14->id,
            'week_num' => 1,
            'theme' => 'Cake', 'signature' => 'Vertical Layer Cake', 'technical' => 'The Great British Bake Off Cake', 'showstopper' => 'Animal Cake'
        ]);

        $s14_wk2 = Week::create([
            'series_id' => $series14->id,
            'week_num' => 2,
            'theme' => 'Biscuits', 'signature' => 'Marshmallow Biscuits', 'technical' => 'Custard Creams', 'showstopper' => 'Illusion Biscuit Display'
        ]);



        Event::create(['week_id' => $s14_wk1->id, 'baker_id' => $dan->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s14_wk1->id, 'baker_id' => $dan->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s14_wk1->id, 'baker_id' => $amos->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s14_wk1->id, 'baker_id' => $abbi->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s14_wk1->id, 'baker_id' => $dana->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s14_wk1->id, 'baker_id' => $amos->id, 'type' => EVENT::TYPE_ELIMINATED]);

        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $tasha->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $abbi->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $dan->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $rowan->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $keith->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $keith->id, 'type' => EVENT::TYPE_ELIMINATED]);
        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $tasha->id, 'type' => EVENT::TYPE_HANDSHAKE]);
        Event::create(['week_id' => $s14_wk2->id, 'baker_id' => $josh->id, 'type' => EVENT::TYPE_HANDSHAKE]);
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
