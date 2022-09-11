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
        $series12 = Series::create(['slug' => 'gbbo-series-12', 'name' => 'Great British Bake Off 2021 (series 12)',
            'start_on' => new Carbon('2021-09-21'), 'status' => Series::STATUS_COMPLETE, 'image_path' => 'series/gbbo-series-12-640.jpg']);

        $amanda = Baker::create(['slug' => 'amanda-21', 'name' => 'Amanda', 'age' => 56, 'from' => 'London',
            'job' => 'Met Police Detective', 'image_path' => 'bakers/2021/amanda.jpg', 'series_id' => $series12->id,
            'bio' => 'Raised in London with Greek-Cypriot heritage, Amanda studied graphic design at college and worked in advertising before moving to the Metropolitan Police to train as a detective. As a child she baked with her mum, and she learned specifically about Greek baking from her paternal auntie. Her style is generous and creative with Greek and Middle Eastern influences. She loves painting directly on to her cakes, often giving them a pretty, feminine aesthetic that’s inspired by her two daughters. Whatever the season, Amanda loves to start her day with an outdoor swim– the colder, the better!']);
        $chigs = Baker::create(['slug' => 'chigs-21', 'name' => 'Chigs', 'age' => 40, 'from' => 'Leicestershire',
            'job' => 'Sales Manager', 'image_path' => 'bakers/2021/chigs.jpg', 'series_id' => $series12->id,
            'bio' => 'Despite a lifelong love of food, Chigs is relatively new to baking, only seriously embarking on his baking journey at the start of lockdown in 2020. Through the careful study of online videos, he managed to teach himself how to produce complex bakes and really intricate chocolate work. When it comes to baking, he loves a challenge and has no fear of being thrown in at the deep end – which is a pretty accurate reflection of his life! A thrill-seeker, he relishes high-octane activities such as bouldering, skydiving and trekking. He has already smashed the Three Peaks Challenge in Yorkshire and now has his sights set on conquering Kilimanjaro. When he’s not baking or climbing, you’ll find him spending time with his nephews who he adores.']);
        $crystelle = Baker::create(['slug' => 'crystelle-21', 'name' => 'Crystelle', 'age' => 26, 'from' => 'London',
            'job' => 'Client Relationship Manager', 'image_path' => 'bakers/2021/crystelle.jpg', 'series_id' => $series12->id,
            'bio' => 'Quadrilingual Crystelle is a baker who brings her wonderfully diverse heritage – born in northwest London to Kenyan born, Portuguese-Goan parents – to the flavours in her baking. The youngest of three daughters, she was also the chief-taster as she helped her mother prepare their family meals. When she travels with friends, it’s her job to make a list of the best restaurants and bakeries in the cities they visit. She began baking seriously only three years ago and loves fusing spices from the places she’s visited into her bakes – a fougasse infused with turmeric, curry powder and spring onion is a firm favourite. Crystelle is also an enthusiastic singer, having kept herself busy over lockdown with her online choir.']);
        $freya = Baker::create(['slug' => 'freya-21', 'name' => 'Freya', 'age' => 19, 'from' => 'North Yorkshire',
            'job' => 'Student', 'image_path' => 'bakers/2021/freya.jpg', 'series_id' => $series12->id,
            'bio' => 'Freya has been dreaming of entering Bake Off since the first series, when she was nine and saw the tent in Bakewell. Studying for a psychology degree, Freya lives at home with her parents so that she can continue to care for her horse, Winnie, while she’s at university. Her passion for horses and baking are the result of spending lots of time with her grandma as she was growing up. A year ago, Freya began making plant-based versions of classic bakes for her dad – now it’s her goal to bake so that no one can tell the results are vegan. She likes to be ‘unexpected’ with her baking, and enjoys creating intricate designs… and usually makes a lot of mess in the process!']);
        $george = Baker::create(['slug' => 'george-21', 'name' => 'George', 'age' => 34, 'from' => 'London',
            'job' => 'Shared Lives Co-ordinator', 'image_path' => 'bakers/2021/george.jpg', 'series_id' => $series12->id,
            'bio' => 'Londoner George grew up in a close-knit Greek-Cypriot family where food was always a big part of family life. Now married to his childhood sweetheart, he has three children and a house full of animals, including a dancing Japanese Spitz, called Eli. His mum taught him to bake (a legacy he’s now passing on to his own children), and he loves all the Greek classics. His flavours often include home-grown herbs and he likes to give his bakes a touch of class with a shabby-chic, vintage vibe. He has a keen eye for detail, looking for perfection in the finished presentation. When George isn’t baking, gardening or looking after his miniature zoo, he willbe in the great outdoors with his family, on bike rides and walks.']);
        $giuseppe = Baker::create(['slug' => 'giuseppe-21', 'name' => 'Giuseppe', 'age' => 45, 'from' => 'Bristol',
            'job' => 'Chief Engineer', 'image_path' => 'bakers/2021/giuseppe.jpg', 'series_id' => $series12->id,
            'bio' => 'Originally from Italy, Giuseppe now lives in Bristol with his wife and their three young (and noisy!) sons. His love for baking comes from his father, a professional chef who did all the cooking at home as Giuseppe was growing up, including making a cake every Sunday. Inspired by this Italian heritage, Giuseppe loves using Italian flavours in his bakes, while he also brings his engineer’s precision to the results. A self-confessed food snob, he is determined to feed his children homemade confectionary, rather than anything that’s been mass-produced. When he’s not baking, Giuseppe loves indulging his passion for design and architecture, and with his wife has renovated their family home. He also loves gardening.']);
        $jairzeno = Baker::create(['slug' => 'jairzeno-21', 'name' => 'Jairzeno', 'age' => 51, 'from' => 'London',
            'job' => 'Head of Finance', 'image_path' => 'bakers/2021/jairzeno.jpg', 'series_id' => $series12->id,
            'bio' => 'For Trinidadian-born Jairzeno, ‘baking is like breathing’! He started baking in 2014, after becoming disillusioned with delicious-looking bakes that just didn’t deliver on flavour – and now, in his own baking, he obsesses over flavour combinations (guava and chocolate is a firm favourite), using lots of Caribbean spices, and aiming for the perfect pâtissérie finish. Jairzeno moved to the UK from Trinidad & Tobago 15 years ago and now lives in London. He has completed multiple half marathons across Europe, and ran the London Marathon in 2012. When he’s not baking or running, he and his partner can be found cooking up a storm in their kitchen, or on walks, looking for shapes in nature to inspire Jairzeno’s next bake.']);
        $jurgen = Baker::create(['slug' => 'jurgen-21', 'name' => 'Jurgen', 'age' => 56, 'from' => 'Sussex',
            'job' => 'IT Professional', 'image_path' => 'bakers/2021/jurgen.jpg', 'series_id' => $series12->id,
            'bio' => 'Originally from the Black Forest in Germany, Jürgen moved to the UK in 2003 and now lives with his wife and son overlooking the sea. Unable to find traditional German bread in his adopted home, Jürgen decided to bake his own – and his passion for baking has grown ever since. He is particularly well-known for his Jewish challah bread, and for the celebration cakes that he loves to bake for friends and family. He approaches baking like the physicist he is – making calculations that help to ensure the utmost precision and perfect results. Jürgen is also an accomplished trombonist – a talent that he is proud to have passed on to his son.']);
        $lizzie = Baker::create(['slug' => 'lizzie-21', 'name' => 'Lizzie', 'age' => 28, 'from' => 'Liverpool',
            'job' => 'Car Production Operative', 'image_path' => 'bakers/2021/lizzie.jpg', 'series_id' => $series12->id,
            'bio' => 'Lizzie and her partner live with their dog, Prudence, in an annex in her parents garden . A baker who prefers simple presentation and believes in flavour and quantity over precision, Lizzie may look like she’s frantic and messy on the outside, but she is usually calm and collected within. Her baking comfort zone is cake, but she loves experimenting with flavour and is generally prepared to give anything a go… as long as it doesn’t involve putting cheese in bread, which she thinks can only spell disaster. When she’s not baking, Lizzie can be found on the dance floor, doing the samba in a suitably jazzy costume, or investigating the lives of serial killers – a fascination she developed during her study for her criminology degree.']);
        $maggie = Baker::create(['slug' => 'maggie-21', 'name' => 'Maggie', 'age' => 70, 'from' => 'Dorset',
            'job' => 'Retired Nurse and Midwife', 'image_path' => 'bakers/2021/maggie.jpg', 'series_id' => $series12->id,
            'bio' => 'Having grown up surrounded by family who constantly cooked and baked, Maggie finds that baking comes naturally to her. She has an impressive collection of classic recipe books and loves recreating traditional bakes while at the same time experimenting with exciting flavours. Her favourite thing to bake is bread – it never occurs to her to buy a loaf (or a cake!). A retired midwife, Maggie believes the excitement of delivering a baby can only be excellent preparation for taking part in Bake Off! She loves canoeing, kayaking and sailing (a passion inherited from her father), and regularly takes off in her campervan, heading for adventure. When she’s not baking or thrill-seeking, Maggie loves spending time with her great nieces and great nephews.']);
        $rochica = Baker::create(['slug' => 'rochica-21', 'name' => 'Rochica', 'age' => 27, 'from' => 'Birmingham',
            'job' => 'Junior HR Business Partner', 'image_path' => 'bakers/2021/rochica.jpg', 'series_id' => $series12->id,
            'bio' => 'With a big Jamaican family on both sides, Rochica bakes in a way that reflects her Caribbean heritage: with flavour, passion and love. She always is especially proud when her nan and aunties tell her she has baked a cake that reminds them of the treats they grew up with. A dancer from the age of two, Rochica’s interest in baking developed when she was left unable to dance due to an injury. Although she has started dancing again, she still finds plenty of time and reasons to bake – her nephew expects biscuits when she collects him from nursery and she particularly loved the challenge of baking a birthday cake to live up to her niece’s vivid imagination.']);
        $tom = Baker::create(['slug' => 'tom-21', 'name' => 'Tom', 'age' => 28, 'from' => 'Kent',
            'job' => 'Software Developer', 'image_path' => 'bakers/2021/tom.jpg', 'series_id' => $series12->id,
            'bio' => 'Although he proudly remembers his place as the only boy in his primary school baking club, Tom discovered his true passion for baking a mere four years ago, when he made his dad a sticky toffee pudding cake. Now he bakes several times a week, rustling up everything from pies and quiches to bread. His mum describes him as the ‘midnight baker - - beforehe moved out of the family home, she would often wake up to a sweet treat… and a pile of washing up! Tom likes to take the foundations of a recipe and make it his own, creating bakes that are fun and often follow a theme. Away from his stand mixer, Tom works for the family software company and loves amateur dramatics and singing. He is also a keen runner.']);

        $s21_wk1 = Week::create(['series_id' => $series12->id, 'week_num' => 1,
            'theme' => 'Cake', 'signature' => 'Mini Swiss Roll', 'technical' => 'Malt Loaf', 'showstopper' => 'Anti-Gravity Illusion Cake',
            'star_baker' => $jurgen->id, 'eliminated' => $tom->id]);
        $s21_wk2 = Week::create(['series_id' => $series12->id, 'week_num' => 2,
            'theme' => 'Biscuits', 'signature' => '24 Brandy Snaps', 'technical' => 'Sandwiched Jammy Biscuit', 'showstopper' => '3-D Childhood Toy',
            'star_baker' => $jurgen->id, 'eliminated' => $jairzeno->id]);
        $s21_wk3 = Week::create(['series_id' => $series12->id, 'week_num' => 3,
            'theme' => 'Bread', 'signature' => 'Focaccia', 'technical' => '15 Cheese and Onion Ciabatta Breadsticks', 'showstopper' => 'Themed Milk Bread Display',
            'star_baker' => $giuseppe->id, 'eliminated' => $rochica->id]);
        $s21_wk4 = Week::create(['series_id' => $series12->id, 'week_num' => 4,
            'theme' => 'Desserts', 'signature' => 'Pavlova', 'technical' => '4 Sticky Toffee Pudding', 'showstopper' => 'Joconde Imprime Dessert',
            'star_baker' => $chigs->id, 'eliminated' => $maggie->id]);
        $s21_wk5 = Week::create(['series_id' => $series12->id, 'week_num' => 5,
            'theme' => 'German', 'signature' => '24 German Biscuits', 'technical' => 'Prinzregententorte', 'showstopper' => 'Yeast Leavened Cake',
            'star_baker' => $giuseppe->id, 'eliminated' => $freya->id]);
        $s21_wk6 = Week::create(['series_id' => $series12->id, 'week_num' => 6,
            'theme' => 'Pastry', 'signature' => 'Chouxnuts', 'technical' => 'Large Baklava', 'showstopper' => 'Terrine pie',
            'star_baker' => $crystelle->id, 'eliminated' => $amanda->id]);
        $s21_wk7 = Week::create(['series_id' => $series12->id, 'week_num' => 7,
            'theme' => 'Caramel', 'signature' => 'Caramel Tart', 'technical' => '10 Caramel Biscuit Bars', 'showstopper' => 'Domed or Sphered Caramel Dessert',
            'star_baker' => $jurgen->id, 'eliminated' => $george->id]);
        $s21_wk8 = Week::create(['series_id' => $series12->id, 'week_num' => 8,
            'theme' => 'Free-from', 'signature' => '8 Dairy-free Iced Cream Sandwiches', 'technical' => '8 Vegan Sausage Rolls', 'showstopper' => 'Gluten-free Celebration Cake',
            'star_baker' => $chigs->id, 'eliminated' => $lizzie->id]);
        $s21_wk9 = Week::create(['series_id' => $series12->id, 'week_num' => 9,
            'theme' => 'Pâtisserie', 'signature' => '8 Pâtisserie-style Layered Slices', 'technical' => 'Sablé Breton Tart', 'showstopper' => 'Themed Banquet Display',
            'star_baker' => $crystelle->id, 'eliminated' => $jurgen->id]);
        $s21_wk10 = Week::create(['series_id' => $series12->id, 'week_num' => 10,
            'theme' => 'Final', 'signature' => 'Carrot cake', 'technical' => '12 Belgian Buns', 'showstopper' => 'Mads Hatter Tea Party Display',
            'star_baker' => $giuseppe->id, 'eliminated' => null]);

        Event::create(['week_id' => $s21_wk1->id, 'baker_id' => $jurgen->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk1->id, 'baker_id' => $maggie->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk1->id, 'baker_id' => $freya->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk1->id, 'baker_id' => $george->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk1->id, 'baker_id' => $amanda->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk1->id, 'baker_id' => $tom->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk2->id, 'baker_id' => $jurgen->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk2->id, 'baker_id' => $jurgen->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk2->id, 'baker_id' => $giuseppe->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk2->id, 'baker_id' => $freya->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk2->id, 'baker_id' => $rochica->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk2->id, 'baker_id' => $jairzeno->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk3->id, 'baker_id' => $giuseppe->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk3->id, 'baker_id' => $giuseppe->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk3->id, 'baker_id' => $lizzie->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk3->id, 'baker_id' => $amanda->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk3->id, 'baker_id' => $rochica->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk3->id, 'baker_id' => $rochica->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk4->id, 'baker_id' => $chigs->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk4->id, 'baker_id' => $jurgen->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk4->id, 'baker_id' => $lizzie->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk4->id, 'baker_id' => $chigs->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk4->id, 'baker_id' => $maggie->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk4->id, 'baker_id' => $maggie->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk5->id, 'baker_id' => $giuseppe->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk5->id, 'baker_id' => $giuseppe->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk5->id, 'baker_id' => $chigs->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk5->id, 'baker_id' => $lizzie->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk5->id, 'baker_id' => $amanda->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk5->id, 'baker_id' => $freya->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk6->id, 'baker_id' => $crystelle->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk6->id, 'baker_id' => $jurgen->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk6->id, 'baker_id' => $crystelle->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk6->id, 'baker_id' => $chigs->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk6->id, 'baker_id' => $lizzie->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk6->id, 'baker_id' => $amanda->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk7->id, 'baker_id' => $jurgen->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk7->id, 'baker_id' => $giuseppe->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk7->id, 'baker_id' => $jurgen->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk7->id, 'baker_id' => $chigs->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk7->id, 'baker_id' => $george->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk7->id, 'baker_id' => $george->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk8->id, 'baker_id' => $chigs->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk8->id, 'baker_id' => $chigs->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk8->id, 'baker_id' => $giuseppe->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk8->id, 'baker_id' => $lizzie->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk8->id, 'baker_id' => $crystelle->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk8->id, 'baker_id' => $lizzie->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $crystelle->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $jurgen->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $giuseppe->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $crystelle->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $chigs->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $jurgen->id, 'type' => 'eliminated']);

        Event::create(['week_id' => $s21_wk10->id, 'baker_id' => $giuseppe->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s21_wk10->id, 'baker_id' => $giuseppe->id, 'type' => 'winner']);
        Event::create(['week_id' => $s21_wk10->id, 'baker_id' => $crystelle->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s21_wk10->id, 'baker_id' => $chigs->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s21_wk10->id, 'baker_id' => $giuseppe->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s21_wk10->id, 'baker_id' => $chigs->id, 'type' => 'runner-up']);
        Event::create(['week_id' => $s21_wk10->id, 'baker_id' => $crystelle->id, 'type' => 'runner-up']);

        // taken from https://hollywoodhandshakes.com/
        Event::create(['week_id' => $s21_wk3->id, 'baker_id' => $giuseppe->id, 'type' => 'handshake']);
        Event::create(['week_id' => $s21_wk4->id, 'baker_id' => $chigs->id, 'type' => 'handshake']);
        Event::create(['week_id' => $s21_wk5->id, 'baker_id' => $jurgen->id, 'type' => 'handshake']);
        Event::create(['week_id' => $s21_wk6->id, 'baker_id' => $crystelle->id, 'type' => 'handshake']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $chigs->id, 'type' => 'handshake']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $crystelle->id, 'type' => 'handshake']);
        Event::create(['week_id' => $s21_wk9->id, 'baker_id' => $giuseppe->id, 'type' => 'handshake']);
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
