<?php

namespace Database\Seeders;

use App\Models\Baker;
use App\Models\Series;
use App\Models\Sweepscake;
use App\Models\SweepscakeUser;
use App\Models\SweepscakeUserBaker;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminName = env('SEEDER_ADMIN_NAME', 'Admin');
        $adminEmail = env('SEEDER_ADMIN_EMAIL', 'admin@example.org');
        $adminPassword = env('SEEDER_ADMIN_PASSWORD', Str::uuid());
        $admin = User::factory()->create([
            'name' => $adminName,
            'email' => $adminEmail,
            'password' => bcrypt($adminPassword)
        ]);
        $this->command->info("Created admin user with email: $admin->name and password $adminPassword");

        $series21 = Series::create(['slug' => 'gbbo-series-12', 'name' => 'Great British Bake Off 2021 (series 12)',
            'start_on' => new Carbon('2021-09-21')]);

        $amanda = Baker::create(['slug' => 'amanda-21', 'name' => 'Amanda', 'age' => 56, 'from' => 'London',
            'job' => 'Met Police Detective', 'image_path' => '2021/amanda.jpg', 'series_id' => $series21->id,
            'bio' => 'Raised in London with Greek-Cypriot heritage, Amanda studied graphic design at college and worked in advertising before moving to the Metropolitan Police to train as a detective. As a child she baked with her mum, and she learned specifically about Greek baking from her paternal auntie. Her style is generous and creative with Greek and Middle Eastern influences. She loves painting directly on to her cakes, often giving them a pretty, feminine aesthetic that’s inspired by her two daughters. Whatever the season, Amanda loves to start her day with an outdoor swim– the colder, the better!']);
        $chigs = Baker::create(['slug' => 'chigs-21', 'name' => 'Chigs', 'age' => 40, 'from' => 'Leicestershire',
            'job' => 'Sales Manager', 'image_path' => '2021/chigs.jpg', 'series_id' => $series21->id,
            'bio' => 'Despite a lifelong love of food, Chigs is relatively new to baking, only seriously embarking on his baking journey at the start of lockdown in 2020. Through the careful study of online videos, he managed to teach himself how to produce complex bakes and really intricate chocolate work. When it comes to baking, he loves a challenge and has no fear of being thrown in at the deep end – which is a pretty accurate reflection of his life! A thrill-seeker, he relishes high-octane activities such as bouldering, skydiving and trekking. He has already smashed the Three Peaks Challenge in Yorkshire and now has his sights set on conquering Kilimanjaro. When he’s not baking or climbing, you’ll find him spending time with his nephews who he adores.']);
        $crystelle = Baker::create(['slug' => 'crystelle-21', 'name' => 'Crystelle', 'age' => 26, 'from' => 'London',
            'job' => 'Client Relationship Manager', 'image_path' => '2021/crystelle.jpg', 'series_id' => $series21->id,
            'bio' => 'Quadrilingual Crystelle is a baker who brings her wonderfully diverse heritage – born in northwest London to Kenyan born, Portuguese-Goan parents – to the flavours in her baking. The youngest of three daughters, she was also the chief-taster as she helped her mother prepare their family meals. When she travels with friends, it’s her job to make a list of the best restaurants and bakeries in the cities they visit. She began baking seriously only three years ago and loves fusing spices from the places she’s visited into her bakes – a fougasse infused with turmeric, curry powder and spring onion is a firm favourite. Crystelle is also an enthusiastic singer, having kept herself busy over lockdown with her online choir.']);
        $freya = Baker::create(['slug' => 'freya-21', 'name' => 'Freya', 'age' => 19, 'from' => 'North Yorkshire',
            'job' => 'Student', 'image_path' => '2021/freya.jpg', 'series_id' => $series21->id,
            'bio' => 'Freya has been dreaming of entering Bake Off since the first series, when she was nine and saw the tent in Bakewell. Studying for a psychology degree, Freya lives at home with her parents so that she can continue to care for her horse, Winnie, while she’s at university. Her passion for horses and baking are the result of spending lots of time with her grandma as she was growing up. A year ago, Freya began making plant-based versions of classic bakes for her dad – now it’s her goal to bake so that no one can tell the results are vegan. She likes to be ‘unexpected’ with her baking, and enjoys creating intricate designs… and usually makes a lot of mess in the process!']);
        $george = Baker::create(['slug' => 'george-21', 'name' => 'George', 'age' => 34, 'from' => 'London',
            'job' => 'Shared Lives Co-ordinator', 'image_path' => '2021/george.jpg', 'series_id' => $series21->id,
            'bio' => 'Londoner George grew up in a close-knit Greek-Cypriot family where food was always a big part of family life. Now married to his childhood sweetheart, he has three children and a house full of animals, including a dancing Japanese Spitz, called Eli. His mum taught him to bake (a legacy he’s now passing on to his own children), and he loves all the Greek classics. His flavours often include home-grown herbs and he likes to give his bakes a touch of class with a shabby-chic, vintage vibe. He has a keen eye for detail, looking for perfection in the finished presentation. When George isn’t baking, gardening or looking after his miniature zoo, he willbe in the great outdoors with his family, on bike rides and walks.']);
        $giuseppe = Baker::create(['slug' => 'giuseppe-21', 'name' => 'Giuseppe', 'age' => 45, 'from' => 'Bristol',
            'job' => 'Chief Engineer', 'image_path' => '2021/giuseppe.jpg', 'series_id' => $series21->id,
            'bio' => 'Originally from Italy, Giuseppe now lives in Bristol with his wife and their three young (and noisy!) sons. His love for baking comes from his father, a professional chef who did all the cooking at home as Giuseppe was growing up, including making a cake every Sunday. Inspired by this Italian heritage, Giuseppe loves using Italian flavours in his bakes, while he also brings his engineer’s precision to the results. A self-confessed food snob, he is determined to feed his children homemade confectionary, rather than anything that’s been mass-produced. When he’s not baking, Giuseppe loves indulging his passion for design and architecture, and with his wife has renovated their family home. He also loves gardening.']);
        $jairzeno = Baker::create(['slug' => 'jairzeno-21', 'name' => 'Jairzeno', 'age' => 51, 'from' => 'London',
            'job' => 'Head of Finance', 'image_path' => '2021/jairzeno.jpg', 'series_id' => $series21->id,
            'bio' => 'For Trinidadian-born Jairzeno, ‘baking is like breathing’! He started baking in 2014, after becoming disillusioned with delicious-looking bakes that just didn’t deliver on flavour – and now, in his own baking, he obsesses over flavour combinations (guava and chocolate is a firm favourite), using lots of Caribbean spices, and aiming for the perfect pâtissérie finish. Jairzeno moved to the UK from Trinidad & Tobago 15 years ago and now lives in London. He has completed multiple half marathons across Europe, and ran the London Marathon in 2012. When he’s not baking or running, he and his partner can be found cooking up a storm in their kitchen, or on walks, looking for shapes in nature to inspire Jairzeno’s next bake.']);
        $jurgen = Baker::create(['slug' => 'jurgen-21', 'name' => 'Jurgen', 'age' => 56, 'from' => 'Sussex',
            'job' => 'IT Professional', 'image_path' => '2021/jurgen.jpg', 'series_id' => $series21->id,
            'bio' => 'Originally from the Black Forest in Germany, Jürgen moved to the UK in 2003 and now lives with his wife and son overlooking the sea. Unable to find traditional German bread in his adopted home, Jürgen decided to bake his own – and his passion for baking has grown ever since. He is particularly well-known for his Jewish challah bread, and for the celebration cakes that he loves to bake for friends and family. He approaches baking like the physicist he is – making calculations that help to ensure the utmost precision and perfect results. Jürgen is also an accomplished trombonist – a talent that he is proud to have passed on to his son.']);
        $lizzie = Baker::create(['slug' => 'lizzie-21', 'name' => 'Lizzie', 'age' => 28, 'from' => 'Liverpool',
            'job' => 'Car Production Operative', 'image_path' => '2021/lizzie.jpg', 'series_id' => $series21->id,
            'bio' => 'Lizzie and her partner live with their dog, Prudence, in an annex in her parents garden . A baker who prefers simple presentation and believes in flavour and quantity over precision, Lizzie may look like she’s frantic and messy on the outside, but she is usually calm and collected within. Her baking comfort zone is cake, but she loves experimenting with flavour and is generally prepared to give anything a go… as long as it doesn’t involve putting cheese in bread, which she thinks can only spell disaster. When she’s not baking, Lizzie can be found on the dance floor, doing the samba in a suitably jazzy costume, or investigating the lives of serial killers – a fascination she developed during her study for her criminology degree.']);
        $maggie = Baker::create(['slug' => 'maggie-21', 'name' => 'Maggie', 'age' => 70, 'from' => 'Dorset',
            'job' => 'Retired Nurse and Midwife', 'image_path' => '2021/maggie.jpg', 'series_id' => $series21->id,
            'bio' => 'Having grown up surrounded by family who constantly cooked and baked, Maggie finds that baking comes naturally to her. She has an impressive collection of classic recipe books and loves recreating traditional bakes while at the same time experimenting with exciting flavours. Her favourite thing to bake is bread – it never occurs to her to buy a loaf (or a cake!). A retired midwife, Maggie believes the excitement of delivering a baby can only be excellent preparation for taking part in Bake Off! She loves canoeing, kayaking and sailing (a passion inherited from her father), and regularly takes off in her campervan, heading for adventure. When she’s not baking or thrill-seeking, Maggie loves spending time with her great nieces and great nephews.']);
        $rochica = Baker::create(['slug' => 'rochica-21', 'name' => 'Rochica', 'age' => 27, 'from' => 'Birmingham',
            'job' => 'Junior HR Business Partner', 'image_path' => '2021/rochica.jpg', 'series_id' => $series21->id,
            'bio' => 'With a big Jamaican family on both sides, Rochica bakes in a way that reflects her Caribbean heritage: with flavour, passion and love. She always is especially proud when her nan and aunties tell her she has baked a cake that reminds them of the treats they grew up with. A dancer from the age of two, Rochica’s interest in baking developed when she was left unable to dance due to an injury. Although she has started dancing again, she still finds plenty of time and reasons to bake – her nephew expects biscuits when she collects him from nursery and she particularly loved the challenge of baking a birthday cake to live up to her niece’s vivid imagination.']);
        $tom = Baker::create(['slug' => 'tom-21', 'name' => 'Tom', 'age' => 28, 'from' => 'Kent',
            'job' => 'Software Developer', 'image_path' => '2021/tom.jpg', 'series_id' => $series21->id,
            'bio' => 'Although he proudly remembers his place as the only boy in his primary school baking club, Tom discovered his true passion for baking a mere four years ago, when he made his dad a sticky toffee pudding cake. Now he bakes several times a week, rustling up everything from pies and quiches to bread. His mum describes him as the ‘midnight baker - - beforehe moved out of the family home, she would often wake up to a sweet treat… and a pile of washing up! Tom likes to take the foundations of a recipe and make it his own, creating bakes that are fun and often follow a theme. Away from his stand mixer, Tom works for the family software company and loves amateur dramatics and singing. He is also a keen runner.']);

        $series22 = Series::create(['slug' => 'gbbo-series-13', 'name' => 'Great British Bake Off 2021 (series 13)',
            'start_on' => new Carbon('2022-09-13')]);

        $abdul = Baker::create(['slug' => 'abdul-22', 'name' => 'Abdul', 'age' => 29, 'from' => 'London', 'job' => 'Electronics Engineer', 'image_path' => '2022/abdul.jpg', 'series_id' => $series22->id, 'bio' => "Abdul is an electronics engineer from London and he was raised in Saudi Arabia by Pakistani parents. As one of three children, he was always getting into mischief, pulling apart electrical items at home. His passion has now become his job, but as well as engineering he also has a flare for salsa dancing and all things outer space. Abdul's passion for baking started when he and his graduate colleagues made cakes for each other, with matcha being his favourite flavour to work with."]);
        $carole = Baker::create(['slug' => 'carole-22', 'name' => 'Carole', 'age' => 59, 'from' => 'Dorset', 'job' => 'Supermarket Cashier', 'image_path' => '2022/carole.jpg', 'series_id' => $series22->id, 'bio' => "Carole is a supermarket cashier from Dorset and she lives at home in the West Country with her husband Michael. She is known as Compost Carole to local residents as she has a gardening segment on a local radio show. Carole loves to create colourful bakes inspired by her passion for the great outdoors. One of her first baking challenges was making a first birthday cake for her granddaughter, Maisie."]);
        $dawn = Baker::create(['slug' => 'dawn-22', 'name' => 'Dawn', 'age' => 60, 'from' => 'Bedfordshire', 'job' => 'IT Manager', 'image_path' => '2022/dawn.jpg', 'series_id' => $series22->id, 'bio' => "Dawn works as an IT manager in Bedfordshire and she lives with her partner, Trevor. The mother of three loves creating illusions when it comes to baking and she loves intricate designs. She has a keen eye for detail and a steady hand, so she should be a pro when it comes to creating stunning bakes."]);
        $james = Baker::create(['slug' => 'james-22', 'name' => 'James', 'age' => 25, 'from' => 'Cumbria', 'job' => 'Nuclear Scientist', 'image_path' => '2022/james.jpg', 'series_id' => $series22->id, 'bio' => "James is a nuclear scientist from Cumbria and he grew up in Glasgow, moving to England for university. He loves all things music, horror films and board games, and reflects his passions in his bakes. Due to the nature of his job, he enjoys the technical elements of baking. He loves autumnal flavours including apples, caramel and mixed spices."]);
        $janusz = Baker::create(['slug' => 'janusz-22', 'name' => 'Janusz', 'age' => 34, 'from' => 'East Sussex', 'job' => 'Headteachers PA', 'image_path' => '2022/janusz.jpg', 'series_id' => $series22->id, 'bio' => "Janusz is a headteacher's PA from East Sussex and he grew up in Poland, having moved to the UK 10 years ago. He lives with his boyfriend Simon and apart from baking, he loves watching drag acts and collecting movie props. His mother inspired him to bake and he loves creating colourful and camp works of art in the kitchen. Staying true to his roots, he loves incorporating Polish ingredients into his dishes."]);
        $kevin = Baker::create(['slug' => 'kevin-22', 'name' => 'Kevin', 'age' => 33, 'from' => 'East Lanarkshire', 'job' => 'Music Teacher', 'image_path' => '2022/kevin.jpg', 'series_id' => $series22->id, 'bio' => "Kevin is a music teacher from Lanarkshire and he loves spending time with his family, including his wife Rachel and his sisters. The saxophonist began baking at the age of 17 and he believes in only using the best ingredients. Kevin loves testing out new flavour combinations with fruits, nuts and spices."]);
        $maisam = Baker::create(['slug' => 'maisam-22', 'name' => 'Maisam', 'age' => 18, 'from' => 'Manchester', 'job' => 'Student', 'image_path' => '2022/mainsam.jpg', 'series_id' => $series22->id, 'bio' => "Maisam is the youngest in the tent and she is a student from Greater Manchester. She is originally from Libya but has lived in the UK since she was nine, and can speak five languages. When she is not baking, which she has done since she was 13, she enjoys photography. She loves Mediterranean flavours such as olives and dates."]);
        $maxy = Baker::create(['slug' => 'maxy-22', 'name' => 'Maxy', 'age' => 29, 'from' => 'London', 'job' => 'Achitectural Assistant', 'image_path' => '2022/maxy.jpg', 'series_id' => $series22->id, 'bio' => "Maxy is an architectural assistant from London and she was born in Sweden. The mother of two studied fine art and is a DIY pro, so she should perform well in the showstopper challenges. She began baking when her first daughter was born and loves making celebration cakes."]);
        $rebs = Baker::create(['slug' => 'rebs-22', 'name' => 'Rebs', 'age' => 23, 'from' => 'County Antrim', 'job' => 'Masters Student', 'image_path' => '2022/rebs.jpg', 'series_id' => $series22->id, 'bio' => "Rebs is a masters student from County Antrim and she grew up in Northern Ireland. Her earliest baking memory was from when she helped her mum out in the kitchen at three years old. She enjoys using Middle Eastern ingredients, paying homage to her boyfriend Jack's Turkish roots."]);
        $sandro = Baker::create(['slug' => 'sandro-22', 'name' => 'Sandro', 'age' => 30, 'from' => 'London', 'job' => 'Nanny', 'image_path' => '2022/sandro.jpg', 'series_id' => $series22->id, 'bio' => "Sandro works as a nanny in London, having fled the Angolan war when he was two years old. He may be a boxer, but he also has a passion for ballet dancing and breakdancing. His father died when he was 21 and he turned to baking as a way of coping with the loss. He uses his Angolan roots in his cooking, offering virtual baking classes for children with autism."]);
        $syabira = Baker::create(['slug' => 'syabira-22', 'name' => 'Syabira', 'age' => 32, 'from' => 'London', 'job' => 'Cardiovascular Research Associate', 'image_path' => '2022/syabira.jpg', 'series_id' => $series22->id, 'bio' => "Syabira is a cardiovascular research associate from London and she was born in Malaysia. She comes from a huge family and now lives with her boyfriend Bradley. She started baking in 2017 and loves adding Malaysian twists to British bakes."]);
        $will = Baker::create(['slug' => 'will-22', 'name' => 'Will', 'age' => 45, 'from' => 'London', 'job' => 'Former Charity Director', 'image_path' => '2022/will.jpg', 'series_id' => $series22->id, 'bio' => "Will is a former charity director from London and he lives in London with his wife and three children. He has a passion for DIY and carpentry and utilises his hobbies in his baking. Loving the technical side of baking, he is a particular fan of using yeast."]);

        $emailDomain = env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org');
        $userBakerMappings21 = env('SEEDER_USERS_2021', 'tom,dick,harry');
        $users21 = self::createUsersFromUsernames($userBakerMappings21, $emailDomain);

        $this->command->info("");
        $this->command->info("Users for 2021");
        $this->command->info("--------------");
        foreach ($users21 as $user) {
            $this->command->info("$user->name, $user->username, $user->email");
        }

        $sweepscake21 = Sweepscake::create(['slug' => 'sweepscake-21', 'name' => 'Sweepscake 2021', 'series_id' => $series21->id]);

        $sweepscake22 = Sweepscake::create(['slug' => 'sweepscake-22', 'name' => 'Sweepscake 2022', 'series_id' => $series22->id]);


        $this->command->info("");
        $this->command->info("Bakers for $series21->name");
        $this->command->info("----------------");
        foreach ($series21->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Bakers for $series22->name");
        $this->command->info("----------------");
        foreach ($series22->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Bakers for $sweepscake21->name");
        $this->command->info("----------------");
        $bakers = Baker::findAllForSweepscake($sweepscake21->id);
        foreach ($bakers as $baker) {
            $this->command->info($baker->name);
        }
        $this->command->info("");
        $this->command->info("Bakers for $sweepscake21->name");
        $this->command->info("---------------");
        $bakers = $sweepscake21->findAllBakersForSeries();
        foreach ($bakers as $baker) {
            $this->command->info($baker->name);
        }

        $mappings = explode(",", $userBakerMappings21);
        foreach ($mappings as $mapping) {
            $pair = explode(':', $mapping);
            $username = trim($pair[0]);
            $slug = Str::slug(trim(str_replace('.', '-', $username)));
            $bakerSlug = trim($pair[1]);
            $user = User::findByUsername($slug);
            if (!$user) {
                $this->command->error("Unable to find user $slug to add baker $bakerSlug to");
                continue;
            }
            $baker = Baker::findBySlug($bakerSlug);
            if (!$baker) {
                $this->command->error("Unable to find bakers $bakerSlug to add to user $slug");
                continue;
            }

            /*
             * These three ways of creating the relationship between the tables all work - I guess use the one that
             * makes the most sense.
             */
            // SweepscakeUserBaker::create(['sweepscake_id' => $sweepscake21->id, 'user_id' => $user->id, 'baker_id' => $baker->id]);
            // $baker->sweepscakes()->attach($sweepscake21->id, ['user_id' => $user->id]);
            $user->sweepscakes()->attach($sweepscake21->id, ['baker_id' => $baker->id]);
        }

        $this->command->info("");
        $this->command->info("Sweepscake 2021 User/Baker");
        $this->command->info("---------------");
        foreach ($sweepscake21->sweepscakeUserBaker as $sub) {
            $this->command->info($sub->user->name . ' => ' . $sub->baker->name);
        }

        $paul = User::findByUsername('paul');
        $sql = SweepscakeUserBaker::where('user_id', '=', $paul->id)->distinct('sweepscake_id')->toSql();
        var_dump($sql);
        $sweepscakes = SweepscakeUserBaker::where('user_id', '=', $paul->id)->distinct('sweepscake_id')->get();
        foreach ($sweepscakes as $sweepscake) {
            $this->command->info("$paul->name => $sweepscake->name");
        }

        $paul = User::findByUsername('paul');
        $sql = $paul->sweepscakes()->toSql();
        var_dump($sql);
        $sweepscakes = $paul->sweepscakes;
        foreach ($sweepscakes as $sweepscake) {
            $this->command->info("$paul->name => $sweepscake->name");
        }

        $sql = $sweepscake21->users()->toSql();
        var_dump($sql);
        $users = $sweepscake21->users;
        foreach ($users as $user) {
            $this->command->info("$sweepscake21->name => $user->name");
        }

        $sql = $sweepscake21->bakers()->toSql();
        var_dump($sql);
        $bakers = $sweepscake21->bakers;
        foreach ($bakers as $baker) {
            $this->command->info("$sweepscake21->name => $baker->name");
        }

        $this->command->info("Baker $amanda->name has Sweepscakes");
        foreach ($amanda->sweepscakes as $sweepscake) {
            $this->command->info("$sweepscake21->name");
        }
    }


    private static function createUsersFromUsernames(string $mappingStr, string $emailDomain): array
    {
        $users = [];
        $mappings = explode(",", $mappingStr);
        foreach ($mappings as $mapping) {
            $pair = explode(':', $mapping);
            $username = trim($pair[0]);
            $name = ucwords(str_replace('.', ' ', $username));
            $slug = Str::slug(str_replace('.', '-', $username));
            $email = $username . '@' . $emailDomain;
            $password = Str::uuid();
            $user = User::create(['name' => $name, 'username' => $slug, 'email' => $email, 'password' => bcrypt($password)]);
            $users[] = $user;
        }

        return $users;
    }
}
