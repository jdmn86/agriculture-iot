<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plague;
use DB;

class PlagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('plagues')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //cebola 
          Plague::create([
            'id' => '1',
            'nome_comum' => 'Black mold',
            'nome_cientifico' => 'Aspergillus niger',
            'plagueType_id' => '1',
            'symptoms' => 'Post-harvest black discoloration at neck; lesions on outer scales; black streaks under outer dry scales; entire surface of bulb turning black and shriveling',
            'cause' => 'Fungus',
            'comments' => 'Wash hands thoroughly after coming into contact with fungus',
            'management' => 'Treat seeds with appropriate fungicide prior to planting to reduce rot in mature bulbs; avoid bruising bulbs during and after harvest; storing at temeperatures below 15°C (59°F) prevents mold from spreading but it will resume once temperature increases',            
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);
//produtos para combate

           Plague::create([
            'id' => '2',
            'nome_comum' => 'Botrytis leaf blight ',
            'nome_cientifico' => 'Botrytis squamosa',
            'plagueType_id' => '1',
            'symptoms' => 'Small white lesions with light green halos which may expand slightly as they age; in prolonged periods of moisture fungus may develop rapidly and cause leaf blighting',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favors high humidity and warm temperatures; fungus survives on piles of crop debris or in soil; older leaves more susceptible to blighting than younger leaves',
            'management' => 'Plant onions in single rows allowing at least 30 cm between plants to promote good air circulation and quick drying of foliage after rain; time irrigation to allow plants time to dry out sufficiently; apply appropriate fungicide sprays when plants have at least five true leaves and early symptoms of disease',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

             Plague::create([
            'id' => '3',
            'nome_comum' => 'Downy mildew ',
            'nome_cientifico' => 'Peronospora destructor',
            'plagueType_id' => '1',
            'symptoms' => 'Pale spots or elongated patches on leaves; gray-purple fuzzy growth on leaf surface; leaves turning pale then yellow; leaf tips collapsing',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favored by cool temperatures and leaf wetness',
            'management' => 'Avoid planting infected sets; rotate crops to non-allium species for 3-4 years; plant in well-draining areas and do not overcrowd plants; destroy all infected crop debris; apply appropriate foliar fungicides taking care to apply thoroughly to waxy leaves',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);
        
        Plague::create([
            'id' => '4',
            'nome_comum' => 'Fusarium basal plate rot',
            'nome_cientifico' => 'Fusarium oxysporum',
            'plagueType_id' => '1',
            'symptoms' => 'Curving, yellow or necrotic leaves; necrosis begins at leaf tips and moves downward; wilting plants; infected bulbs may be brown and watery with rot spreading from stem plate to basal leaves; stem plates may have brown discoloration',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favors moderate to high temperatures',
            'management' => 'Rotate with non-susceptible crops for at least 4 years, plant resistant onion varieties',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '5',
            'nome_comum' => 'Fusarium damping-off',
            'nome_cientifico' => 'Fusarium damping-off',
            'plagueType_id' => '1',
            'symptoms' => 'Rotting seeds that are covered in mold; discolored root tips which may be pink, tan, yellow, red or black; slowly growing seedlings which wilt and die',
            'cause' => 'Fungus',
            'comments' => 'Fungus survives in soil and disease emergence is favored by moist to wet soil',
            'management' => 'Plant only disease-free seed; treat seed with fungicide; rotate crops with cereals or grasses to reduce levels of pathogen in soil; steam treatment or fumigation of soil can help reduce levels of Fusarium in the soil',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '6',
            'nome_comum' => 'Pink root',
            'nome_cientifico' => 'Phoma terrestris',
            'plagueType_id' => '1',
            'symptoms' => 'Light pink roots which darken and turn purple; roots become transparent and water soaked; plant may look like it has a nutrient deficiency; infected seedling may die; stunted plants with undersized, shriveled bulbs',
            'cause' => 'Fungus',
            'comments' => 'Fungus colonizes plant through root tips; fungus can survive in soil down to a depth of 45 cm (17.7 in)',
            'management' => 'Disease is most severe when onions are planted continuously or in a 1-year rotation, a rotation of 3-6 years is preferred; plant more resistant varieties; solarization and/or fumigation can help reduce the levels of pathogen in the soil',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '7',
            'nome_comum' => 'Purple blotch',
            'nome_cientifico' => 'Alternaria porri',
            'plagueType_id' => '1',
            'symptoms' => 'Small water-soaked lesions lesions on leaves or stalk with white centers; which enlarge to become zonate and brown to purple in color with red or purple margin surrounded by yellow zone; large lesions may coalesce and girdle leaf, killing any tissue between the lesions and the leaf tip; severely infected foliage may die',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favored by wet foliage, with sporulation occuring during the night during periods of high humidity',
            'management' => 'Cultural controls include long rotations with non-hosts and the reduction of leaf wetness by planting in well-draining soil and timing irrigation to allow plants to dry adequately during the day; some fungicides are effective at controlling the disease but should be rotated for optimal control',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '8',
            'nome_comum' => 'Rust',
            'nome_cientifico' => 'Puccinia porri',
            'plagueType_id' => '1',
            'symptoms' => 'Small white flecks on leaves and stems which develop into circular or elongated orange pustules; severe infestations can cause leaves to yellow and die',
            'cause' => 'Fungus',
            'comments' => 'Favors high humidity but low rainfall; spores can be transported over long distances by wind',
            'management' => 'No resistance known; use only disease-free seed and plant in well-draining soil; control weeds around crop; apply appropriate protective fungicide',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '9',
            'nome_comum' => 'Smut',
            'nome_cientifico' => 'Urocystis colchici',
            'plagueType_id' => '1',
            'symptoms' => 'Dark, thickened lareas on cotyledons (seed leaves) which may become large and cause leaves to bend downwards; raised blisters may be present on the base of scales in older plants; lesion mature and become covered in black powdery fungal masses; plant growth stunted; death of plant occurs within 3-4 weeks',
            'cause' => 'Fungus',
            'comments' => 'Smut can persist in soil for many years and is mainly introduced through infected sets and transplants; spores can be spread by wind, on equipment or in irrigation water',
            'management' => 'No resistance to disease known in onion; plant onions during periods which promote rapid growth; plant only health sets and transplants - if smut is present in the soil they will not become infected',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '10',
            'nome_comum' => 'White rot',
            'nome_cientifico' => 'Sclerotium cepivorum',
            'plagueType_id' => '1',
            'symptoms' => 'Older leaves yellowing; stunted growth; death of all leaves; fluffy white growth on base of bulb which spreads up bulb to storage leaves',
            'cause' => 'Fungus',
            'comments' => 'Fungus can survive in soil for 20 years and is one of the most damaging diseases of Allium crops worldwide, causing major crop losses',
            'management' => 'Fungicide treatment may not be effective at controlling white rot under conditions which are favorable to the fungi\'s development and control may have to rely on cultural methods: avoid transferring soil or plant material between sites; treat seeds with hot water prior to planting; use a long term rotation with non-allium crops; apply appropriate fungicides if available',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '11',
            'nome_comum' => 'Leaf streak and bulb rot',
            'nome_cientifico' => 'Pseudomonas viridiflava',
            'plagueType_id' => '2',
            'symptoms' => 'Water-soaked, dark green oval lesions or streaks on leaves; tipburn of leaves; dark spots on wrapper scales of bulbs; reddish-brown discoloration of inner scales; rot developing in ring-like pattern',
            'cause' => 'Bacterium',
            'comments' => 'Little is known about the pathogen; greatest damage occurs during winter; rapid spread of disease on infected plants is promoted by rainfall',
            'management' => 'Avoid fertilizing plants during winter apply appropriate bacteriacidial sprays',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '12',
            'nome_comum' => 'Onion yellow dwarf',
            'nome_cientifico' => 'Onion yellow dwarf virus (OYDV)',
            'plagueType_id' => '3',
            'symptoms' => 'Yellow streaks on bases of of first leaves; all leaves which emerge after infection have yellow streak or are completely yellow; leaves may be flattened or crinkled; bulbs are undersized; flower stalks yellow and twisted; flower clusters small and seed is of poor quality',
            'cause' => 'Virus',
            'comments' => 'Transmitted by several species of aphid, including the peach aphid; virus is not spread via seed or pollen',
            'management' => 'Controlling aphids by applying insecticides is not effective due to the short amount of time aphid needs to transmit virus; other control methods include: planting sets or transplants which were produced in areas free of virus; growing plants from seed; removing any infected plants and planting more tolerant varieties',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '13',
            'nome_comum' => 'Pythium seed rot (Damping-off)',
            'nome_cientifico' => 'Pythium irregulare',
            'plagueType_id' => '7',
            'symptoms' => 'Seeds water-soaked, mushy and decomposing; infected roots are gray and water-soaked; seedlings that have already emerged prior to infection collapse and die; older plants that become infected become severely stunted',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favors high soil moisture and cool temperatures',
            'management' => 'Control of disease is dependent on minimizing soil moisture: break up compacted soil; plant in well-draining areas or raised beds; treat seeds with appropriate fungicides prior to planting',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '14',
            'nome_comum' => 'Bulb mites',
            'nome_cientifico' => 'Rhizoglyphus spp or Tyrophagus spp',
            'plagueType_id' => '7',
            'symptoms' => 'Stunted plant growth; reduced stand; bulbs rotting in ground or in storage; pest is a cream-white, bulbous mite <1 mm in length, which resembles a pearl with legs',
            'cause' => 'Arachnid',
            'comments' => 'Damage to plants by bulb mites allows secondary invasion by other pathogens and can cause bulb rots',
            'management' => 'Do not plant successive crops of onion or garlic in same location; allow field to fallow to ensure that any residual organic matter decomposes completely - crop residues can harbor mite populations; treating garlic seed cloves with hot water prior to planting may help reduce mite populations',  
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '15',
            'nome_comum' => 'Leafminers',
            'nome_cientifico' => 'Lyriomyza spp',
            'plagueType_id' => '5',
            'symptoms' => 'Thin, white, winding trails on leaves; heavy mining can result in white blotches on leaves and leaves dropping from the plant prematurely; early infestation can cause yield to be reduced; adult leafminer is a small black and yellow fly which lays its eggs in the leaf; larave hatch and feed on leaf interior',
            'cause' => 'Insects',
            'comments' => 'Mature larvae drop from leaves into soil to pupate; entire lifecycle can take as little as 2 weeks in warm weather; insect may go through 7 to 10 generations per year',
            'management' => 'Check transplants for signs of leafminer damage prior to planting; remove plants from soil immediately after harvest; only use insecticides when leafminer damage has been identified as unnecessary spraying will also reduce populations of their natural enemies',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '16',
            'nome_comum' => 'Onion maggot',
            'nome_cientifico' => 'Delia antiqua',
            'plagueType_id' => '5',
            'symptoms' => 'Stunted or wilting seedlings; plant will commonly break at soil line if an attempt is made to pull it up; if infestation occurs when plants are bulbing, bulbs will be deformed and susceptible to storage rots after harvest; adult insect is a greyish fly which lays white, elongate eggs around the base of the plant; the larvae that emerge from the eggs are tiny and white and bore into the onion plant; mature larvae are about 1 cm (0.4 in) long with feeding hooks',
            'cause' => 'Insect',
            'comments' => 'Females can lay several hundred eggs during their 2-4 week lifespan; insect overwinters as pupae in the soil',
            'management' => 'Management of onion maggots is heavily reliant on good sanitation; all onion bulbs should be removed at the end of the season as maggots will die without a food source; commercial onion growers must often rely on the application of appropriate granular insecticides and, in some cases, insecticide sprays are also required; home gardeners should try to remove any volunteer wild onion and chive plants as these can act as an infection source; floating row covers may provide protection by preventing females from laying eggs around the plants',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '17',
            'nome_comum' => 'Thrips (Onion thrips, Western flower thrips)',
            'nome_cientifico' => 'Thrips tabaci Frankliniella occidentalis',
            'plagueType_id' => '5',
            'symptoms' => 'Discolored, distorted tissue; scarring of leaves; severly infected plants may have a silvery appearance',
            'cause' => 'Insect',
            'comments' => 'Thrips are most damaging when they feed on onions at the early bulbing stage of development; both onion thrips and western flower thrips have an extensive host range and can be introduced to onion from other plants',
            'management' => 'Natural enemies include some species of predatory mite, pirate bugs and lacewings; avoid planting onion in close proximity to grain fields as thrips populations build up on these plant in the spring; overhead irrigation of plants may help reduce thrips numbers; apply appropriate insecticides at first sign of thrips damage',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

   //alho frances
        Plague::create([
            'id' => '18',
            'nome_comum' => 'Botrytis leaf blight',
            'nome_cientifico' => 'Botrytis squamosa',
            'plagueType_id' => '1',
            'symptoms' => 'Small white lesions with light green halos which may expand slightly as they age; in prolonged periods of moisture fungus may develop rapidly and cause leaf blighting',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favors high humidity and warm temperatures; fungus survives on piles of crop debris or in soil; older leaves more susceptible to blighting than younger leaves',
            'management' => 'Plant leeks in single rows allowing at least 30 cm between plants to promote good air circulation and quick drying of foliage after rain; time irrigation to allow plants time to dry out sufficiently; apply appropriate fungicide sprays when plants have at least five true leaves and early symptoms of disease',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '19',
            'nome_comum' => 'Damping-off',
            'nome_cientifico' => 'Fusarium spp',
            'plagueType_id' => '1',
            'symptoms' => 'Rotting seeds that are covered in mold; discolored root tips which may be pink, tan, yellow, red or black; slowly growing seedlings which wilt and die',
            'cause' => 'Fungi',
            'comments' => 'Fungus survives in soil and disease emergence is favored by moist to wet soil',
            'management' => 'Plant only disease-free seed; treat seed with fungicide; rotate crops with cereals or grasses to reduce levels of pathogen in soil; steam treatment or fumigation of soil can help reduce levels of Fusarium in the soil',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '20',
            'nome_comum' => 'Downy mildew',
            'nome_cientifico' => 'Peronospora parasitica',
            'plagueType_id' => '1',
            'symptoms' => 'Pale spots or elongated patches on leaves; gray-purple fuzzy growth on leaf surface; leaves turning pale then yellow; leaf tips collapsing',
            'cause' => 'Fungi',
            'comments' => 'Disease favors cool, humid weather',
            'management' => 'Avoid planting infected sets; rotate crops to non-allium species for 3-4 years; plant in well-draining areas and do not overcrowd plants; destroy all infected crop debris; apply appropriate foliar fungicides taking care to apply thoroughly to waxy leaves',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '21',
            'nome_comum' => 'Pink root',
            'nome_cientifico' => 'Phoma terrestris',
            'plagueType_id' => '1',
            'symptoms' => 'Light pink roots which darken and turn purple; roots become transparent and water soaked; plant may look like it has a nutrient deficiency; infected seedling may die; stunted plants with undersized, shriveled bulbs',
            'cause' => 'Fungus',
            'comments' => 'Fungus colonizes plant through root tips; fungus can survive in soil down to a depth of 45 cm (17.7 in)',
            'management' => 'Disease is most severe when alliums are planted continuously or in a 1-year rotation, a rotation of 3-6 years is preferred; plant more resistant varieties; solarization and/or fumigation can help reduce the levels of pathogen in the soil',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '22',
            'nome_comum' => 'Purple blotch',
            'nome_cientifico' => 'Alternaria porri',
            'plagueType_id' => '1',
            'symptoms' => 'Small water-soaked lesions lesions on leaves or stalk with white centers; which enlarge to become zonate and brown to purple in color with red or purple margin surrounded by yellow zone; large lesions may coalesce and girdle leaf, killing any tissue between the lesions and the leaf tip; severely infected foliage may die',
            'cause' => 'Fungi',
            'comments' => 'Disease emergence favored by wet foliage, with sporulation occurring during the night during periods of high humidity',
            'management' => 'Cultural controls include long rotations with non-hosts and the reduction of leaf wetness by planting in well-draining soil and timing irrigation to allow plants to dry adequately during the day; some fungicides are effective at controlling the disease but should be rotated for optimal control',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '23',
            'nome_comum' => 'White rot',
            'nome_cientifico' => 'Sclerotinia cepivorum',
            'plagueType_id' => '1',
            'symptoms' => 'Older leaves yellowing; stunted growth; death of all leaves; fluffy white growth on base of bulb which spreads up bulb to storage leaves',
            'cause' => 'Fungus',
            'comments' => 'Fungus can survive in soil for 20 years and is one of the most damaging diseases of Allium crops worldwide, causing major crop losses',
            'management' => 'Fungicide treatment may not be effective at controlling white rot under conditions which are favorable to the fungi\'s development and control may have to rely on cultural methods: avoid transferring soil or plant material between sites; treat seeds with hot water prior to planting; use a long term rotation with non-allium crops; apply appropriate fungicides if available',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '24',
            'nome_comum' => 'Leafminers',
            'nome_cientifico' => 'Lyriomyza spp',
            'plagueType_id' => '5',
            'symptoms' => 'Thin, white, winding trails on leaves; heavy mining can result in white blotches on leaves and leaves dropping from the plant prematurely; early infestation can cause fruit yield to be reduced; adult leafminer is a small black and yellow fly which lays its eggs in the leaf; larave hatch and feed on leaf interior',
            'cause' => 'Insects',
            'comments' => 'Mature larvae drop from leaves into soil to pupate; entire lifecycle can take as little as 2 weeks in warm weather; insect may go through 7 to 10 generations per year',
            'management' => 'Check transplants for signs of leafminer damage prior to planting; remove plants from soil immediately after harvest; only use insecticides when leafminer damage has been identified as unnecessary spraying will also reduce populations of their natural enemies',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '25',
            'nome_comum' => 'Onion maggot',
            'nome_cientifico' => 'Delia antiqua',
            'plagueType_id' => '5',
            'symptoms' => 'Stunted or wilting seedlings; plant will commonly break at soil line if an attempt is made to pull it up; if infestation occurs when plants are bulbing, bulbs will be deformed and susceptible to storage rots after harvest; adult insect is a greyish fly which lays white, elongate eggs around the base of the plant; the larvae that emerge from the eggs are tiny and white and bore into the onion plant; mature larvae are about 1 cm (0.4 in) long with feeding hooks',
            'cause' => 'Insect',
            'comments' => 'Females can lay several hundred eggs during their 2-4 week lifespan; insect overwinters as pupae in the soil',
            'management' => 'Management of onion maggots is heavily reliant on good sanitation; all bulbs should be removed at the end of the season as maggots will die without a food source; commercial onion growers must often rely on the application of appropriate granular insecticides and, in some cases, insecticide sprays are also required; home gardeners should try to remove any volunteer wild onion and chive plants as these can act as an infection source; floating row covers may provide protection by preventing females from laying eggs around the plants',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '26',
            'nome_comum' => 'Thrips',
            'nome_cientifico' => 'Thrips tabaci',
            'plagueType_id' => '5',
            'symptoms' => 'Leaves turning silver to gray in color; leaves twisted and dying',
            'cause' => 'Insect',
            'comments' => 'Insect favors hot, arid conditions; builds up immunity to insecticides quickly',
            'management' => null,
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '27',
            'nome_comum' => 'Thrips (Onion thrips, Western flower thrips)',
            'nome_cientifico' => 'Thrips tabaci or Frankliniella occidentalis',
            'plagueType_id' => '5',
            'symptoms' => 'Discolored, distorted tissue; scarring of leaves; severly infected plants may have a silvery appearance',
            'cause' => 'Insect',
            'comments' => 'Thrips are most damaging when they feed at the early bulbing stage of development; both onion thrips and western flower thrips have an extensive host range and can be introduced from other plants',
            'management' => 'Natural enemies include some species of predatory mite, pirate bugs and lacewings; avoid planting onion in close proximity to grain fields as thrips populations build up on these plant in the spring; overhead irrigation of plants may help reduce thrips numbers; apply appropriate insecticides at first sign of thrips damage',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

//cenouras
        Plague::create([
            'id' => '28',
            'nome_comum' => 'Alternaria leaf blight',
            'nome_cientifico' => 'Alternaria dauci',
            'plagueType_id' => '1',
            'symptoms' => 'Green-brown water-soaked lesions on leaves which enlarge and turn dark brown or black; lesions may coalesce causing leaves to yellow and die; lesions may be present on petioles',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favored by wet foliage and warm weather; rain and fog enhance the development of the disease; fungus survives in soil on crop debris but is killed when the debris decomposes',
            'management' => 'Disease can be difficult to control in wet, warm conditions; apply appropriate fungicides when first symptoms appear or as a protective measure in humid areas; treat seeds with fungicide or hot water prior to planting; apply gibberellic acid to carrot foliage to promote upright growth and promote air circulation through canopy',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '29',
            'nome_comum' => 'Black rot ',
            'nome_cientifico' => 'Alternaria radicina',
            'plagueType_id' => '1',
            'symptoms' => 'Damping-off of seedlings; root and crown necrosis; blighted foliage; lower portion of petioles black and necrotic; black ring around petiole attachment black, sunken lesions on taproot',
            'cause' => 'Fungi',
            'comments' => 'Disease is spread through infected seed and can survive in soil for up to 8 years',
            'management' => 'Black rot is difficult to control and can survive in the soil for long periods of time: practice long crop rotations ; plow crop residue into soil immediately after harvest; plant resistant varieties; plant only pathogen-free seed; treat seeds with hot water prior to planting',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '30',
            'nome_comum' => 'Cercospora leaf blight',
            'nome_cientifico' => 'Cercospora carotae',
            'plagueType_id' => '1',
            'symptoms' => 'Small, necrotic flecks on leaves which develop a chlorotic halo and expand into tan brown necrotic spots; lesions coalesce and cause leaves to wither, curl and die',
            'cause' => 'Fungus',
            'comments' => 'Disease can be introduced through infested seed and spread by wind or water splash; symptoms usually occur on younger foliage first',
            'management' => 'Plant only pathogen-free seed; rotate crops; plow crop debris into soil ofter harvest; apply appropriate fungicide sprays',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '31',
            'nome_comum' => 'Cottony rot (Sclerotinia rot)',
            'nome_cientifico' => 'Sclerotinia sclerotiorum',
            'plagueType_id' => '1',
            'symptoms' => 'Small, water-soaked, soft lesions on crown and roots; white fluffy fungal growth all over affected tissues; soft and decaying tissue developing',
            'cause' => 'Fungus',
            'comments' => 'Fungus can survive in soil for up to 10 years; disease emergence is favored by soils that are held close to saturation for periods in excess of 2 weeks',
            'management' => 'Cultural practices play an important role in the control of cottony rot as there are no resistand carrot varieties: in carrot fields, the use of drip irrigation 5-8 cm below the soil surface can provide good control; deep plowing of soil and trimming back carrot foliage to promote air circulation can also be useful; fungicides may be warranted in periods of extended cool, damp weather',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '32',
            'nome_comum' => 'Downy mildew',
            'nome_cientifico' => 'Peronospora umbellifarum',
            'plagueType_id' => '1',
            'symptoms' => 'Yellow spots on upper surface of leaves; white fluffy growth on underside of leaves; lesions become darker as the mature',
            'cause' => 'Fungus',
            'comments' => 'Disease affects young, tender leaves; disease emergence and spread is favored by prolonged leaf wetness',
            'management' => 'Plant pathogen-free seed; do not overcrowd plants; rotate crops with non-umbelliferous varieties',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '33',
            'nome_comum' => 'Powdery mildew ',
            'nome_cientifico' => 'Erisyphe heraclei',
            'plagueType_id' => '1',
            'symptoms' => 'Powdery growth on leaves, petioles flowers stalks and bracts; leaves becoming chlorotic; severe infections can cause flowers to become distorted',
            'cause' => 'Fungus',
            'comments' => 'Fungus can spread long distances in air; disease emergence is favored by high humidity and moderate temperatures; infection is most severe in shaded areas',
            'management' => 'Plant tolerant varieties; avoid excess fertilization; protective fungicide applications provide adequate protection; sulfur application can be used in infection occurs early in season',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '34',
            'nome_comum' => 'Bacterial leaf blight',
            'nome_cientifico' => 'Xanthomonas campestris',
            'plagueType_id' => '2',
            'symptoms' => 'Small, angular, yellow spots on leaves which expand into irregularly shaped, brown, water-soaked lesions with a yellow halo; centers of lesions dry out, become brittle; leaves may become curled or distorted; flower stalks may develop elongated lesions that exude a bacterial ooze; infected umbels may be blighted',
            'cause' => 'Bacterium',
            'comments' => 'Bacteria can be spread by splashing irrigation water or rain or on contaminated equipment',
            'management' => 'Plant pathogen-free seed; avoid using sprinkler irrigation; apply appropriate bactericides if available', 
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '35',
            'nome_comum' => 'Soft rot',
            'nome_cientifico' => 'Erwinia carotovora or Erwinia chrysanthemi or Pseudomonas marginalis',
            'plagueType_id' => '2',
            'symptoms' => 'Sunken dull orange lesions on taproot which causes tissue to collapse and become soft',
            'cause' => 'Bacteria',
            'comments' => 'Bacteria thrive in oxygen depleted plant tissue; disease emergence requires long periods of water saturated soil; bacteria enter plants through wounds',
            'management' => 'Control relies on the avoidance of conditions conducive to bacterial infection: plant carrots in well-draining soils; allow plants to dry before irrigating again; avoid wounding plants during harvest to prevent pst harvest development of disease; disinfect all equipment regularly',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '36',
            'nome_comum' => 'Cavity spot ',
            'nome_cientifico' => 'Pythium spp',
            'plagueType_id' => '7',
            'symptoms' => 'Sunken, elliptical, gray lesions across the root; outer layer of root ruptures and develops dark, elongated lesions; small vertical cracks may form on the cavities',
            'cause' => 'Fungi',
            'comments' => 'Fungi can persist in soil for several years and disease outbreaks are associated with wet soils; flooded soil increases the number of cavities formed',
            'management' => 'Some cultural practices can control the disease: avoid planting in fields/areas known to previously had carrot spot; do not over-fertilize plants; application(s) of appropriate fungicide can provide adequate control',   
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '37',
            'nome_comum' => 'Damping-off',
            'nome_cientifico' => 'Pythium spp or Rhizoctonia solani',
            'plagueType_id' => '7',
            'symptoms' => 'Soft, rotting seeds which fail to germinate; rapid death of seedling prior to emergence from soil; collpase of seedlings after they have emerged from the soil caused by water-soaked reddish lesions girdling the stem at the soil line',
            'cause' => 'Fungi',
            'comments' => 'Damping-off diseases favor conditions which slow seed germination; fungi can be spread in water, contaminated soil or on equipment',
            'management' => 'Avoid planting carrots in poorly draining, cool, wet soil; planting in raised beds will help with soil drainage; plant high quality seed that germinates quickly; treat seeds with fungicide prior to planting to eliminate fungal pathogens',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        
        Plague::create([
            'id' => '38',
            'nome_comum' => 'Aphids (Willow-carrot aphid)',
            'nome_cientifico' => 'Cavariella aegopodii',
            'plagueType_id' => '5',
            'symptoms' => 'Small soft bodied insects on underside of leaves and/or stems of plant; usually green or yellow in color; if aphid infestation is heavy it may cause leaves to yellow and/or distorted, necrotic spots on leaves and/or stunted shoots; aphids secrete a sticky, sugary substance called honeydew which encourages the growth of sooty mold on the plants',
            'cause' => 'Insect',
            'comments' => 'Distinguishing features include the presence of cornicles (tubular structures) which project backwards from the body of the aphid; will generally not move very quickly when disturbed; willow-carrot aphid will also attack parnip, parsley and celery',
            'management' => 'If aphid population is limited to just a few leaves or shoots then the infestation can be pruned out to provide control; check transplants for aphids before planting; use tolerant varieties if available; reflective mulches such as silver colored plastic can deter aphids from feeding on plants; sturdy plants can be sprayed with a strong jet of water to knock aphids from leaves; insecticides are generally only required to treat aphids if the infestation is very high - plants generally tolerate low and medium level infestation; insecticidal soaps or oils such as neem or canola oil are usually the best method of control; always check the labels of the products for specific usage guidelines prior to use',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

         Plague::create([
            'id' => '39',
            'nome_comum' => 'Carrot rust fly',
            'nome_cientifico' => 'Psila rosae',
            'plagueType_id' => '5',
            'symptoms' => 'Surface scarring of taproot caused by tunnels; tunnels are filled with a rust colored mush; adult insect is a small, dark colored fly; larvae are white maggots approximately 1 cm (0.3 in) long',
            'cause' => 'Insect',
            'comments' => 'Carrot rust fly also attacks parsnip, celery and other Umbelliferous crops which will also need to be protected if carrot rust fly is a problem',
            'management' => 'Use of row covers will help to protect plants from damage but they must be installed before adult fly lays eggs on plants; harvest carrots in blocks; do not leave any carrots in the ground over winter to reduce overwintering sites',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


          Plague::create([
            'id' => '40',
            'nome_comum' => 'Carrot weevil',
            'nome_cientifico' => 'Listronotus oregonensis',
            'plagueType_id' => '5',
            'symptoms' => 'Irregular dark grooves in zig-zag pattern on roots; leaves of plant may yellow; adult insect is a dark colored beetle; larvae are white to pinkish white C-shaped grubs with a yellow-brown head',
            'cause' => 'Insect',
            'comments' => 'dult weevils overwinter in crop debris remaining in the ground; larvae feed for approximately 2 weeks before pupating in the soil; insect undergoes several generations each year',
            'management' => 'Remove all debris from Umbelliferous crops (e.g. parsley, dill, celerey etc.) to reduce sites where weevil can survive and persist; try to rotate Umbelliferous crops to different areas of the home garden each year to reduce survival of larvae in soil',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


         Plague::create([
            'id' => '41',
            'nome_comum' => 'Flea beetle ',
            'nome_cientifico' => 'Systena blanda',
            'plagueType_id' => '5',
            'symptoms' => 'Small holes or pits in leaves that give the foliage a characteristic “shothole” appearance; young plants and seedlings are particularly susceptible; plant growth may be reduced; if damage is severe the plant may be killed; the pest responsible for the damage is a small (1.5–3.0 mm) dark colored beetle which jumps when disturbed; the beetles are often shiny in appearance',
            'cause' => 'Insect',
            'comments' => 'Younger plants are more susceptible to flea beetle damage than older ones; older plants can tolerate infestation; flea beetles may overwinter on nearby weed species, in plant debris or in the soil; insects may go through a second or third generation in one year',
            'management' => 'In areas where flea beetles are a problem, floating row covers may have to be used prior to the emergence of the beetles to provide a physical barrier to protect young plants; plant seeds early to allow establishment before the beetles become a problem - mature plants are less susceptible to damage; trap crops may provide a measure of control - cruciferous plants are best; application of a thick layer of mulch may help prevent beetles reaching surface; application on diamotecoeus earth or oils such as neem oil are effective control methods for organic growers; application of insecticides containing carbaryl, spinosad, bifenthrin and permethrin can provide adequate control of beetles for up to a week but will need reapplied',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

            Plague::create([
            'id' => '42',
            'nome_comum' => 'Root-knot nematodes (Stubby root nematodes, Needle nematodes)',
            'nome_cientifico' => 'Meloidogyne spp or Paratrichodorus spp or Longidorus africanus',
            'plagueType_id' => '4',
            'symptoms' => 'Forked, distorted or stunted taproots; reduced stand; reduced yield',
            'cause' => 'Nematodes',
            'comments' => 'Root-knot nematodes are most damaging to carrot; nematodes are microscopic and not visible to the naked eye',
            'management' => 'leaving land to fallow when not planting can be effective at reducing nematode numbers; solarizing soil for 4-6 week period to a depth of 6 inches can temporarily reduce nematode populations; new carrot varieties are currently being developed that are resistant to nematodes',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

//couves
        Plague::create([
            'id' => '43',
            'nome_comum' => 'Alternaria leaf spot (Black spot, Gray spot)',
            'nome_cientifico' => 'Alternaria brassicae',
            'plagueType_id' => '1',
            'symptoms' => 'Small dark spots on leaves which turn brown to gray; lesions may be round or angular and may possess a purple-black margin; lesions may form concentric rings, become brittle and crack in center; dark brown elongated lesions may develop on stems and petioles.',
            'cause' => 'Fungus',
            'comments' => 'May become a problem on cabbage during cool, wet periods',
            'management' => 'Plant only pathogen-free seed; rotate crops; applications of appropriate fungicides control disease when present.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '44',
            'nome_comum' => 'Anthracnose',
            'nome_cientifico' => 'Colletotrichum higginsianum',
            'plagueType_id' => '1',
            'symptoms' => 'Small circular or irregularly shaped dry spots which are gray to straw in color on leaves; a high number of spots may cause the leaf to die; lesions may coalesce to form large necrotic patches causing leaves to turn yellow and wilt; lesions may split or crack in dry centers.',
            'cause' => 'Fungus',
            'comments' => 'Fungus overwinters on leaf debris and on related weeds; disease emergence is favored by moist, warm conditions.',
            'management' => 'Control of disease depends on sanitary practices; treat seeds with hot water prior to planting; rotate crops; plant in an area with good soil drainage; remove all cruciferous weeds which may act as a reservoir for the fungus.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '45',
            'nome_comum' => 'Black rot',
            'nome_cientifico' => 'Xanthomonas campestris',
            'plagueType_id' => '1',
            'symptoms' => 'Irregularly shaped dull yellow areas along leaf margins which expand to leaf midrib and create a characterstic "V-shaped" lesion; lesions may coalesce along the leaf margin to give plant a scorched appearance.',
            'cause' => 'Bacterium',
            'comments' => 'Pathogen is spread via infected seed or by splashing water and insect movement; disease emergence favored by warm and humid conditions.',
            'management' => 'Primary method of controlling black rot is through the use of good sanitation practices; rotate crops to non-cruciferous crops every 2 years; plant resistant varieties; control cruciferous weed species which may act as a reservoir for bacteria; plant pathogen-free seed.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '46',
            'nome_comum' => 'Clubroot',
            'nome_cientifico' => 'Plasmodiophora brassicae',
            'plagueType_id' => '1',
            'symptoms' => 'Slow growing, stunted plants; yellowish leaves which wilt during day and rejuvenate in part at night; swollen, distorted roots; extensive gall formation',
            'cause' => 'Fungus',
            'comments' => 'Can be difficult to distinguish from nematode damage; fungus can survive in soil for periods in excess of 10 years; can be spread by movement of contaminated soil and irrigation water to uninfected areas',
            'management' => 'Once the pathogen is present in the soil it can survive for many years, elimination of the pathogen is economically unfeasible; rotating crops generally does not provide effective control; plant only certified seed and avoid field grown transplants unless produced in a fumigated bed; applying lime to the soil can reduce fungus sporulation',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '47',
            'nome_comum' => 'Damping-off (Wirestem, Head rot)',
            'nome_cientifico' => 'Rhizoctonia solani',
            'plagueType_id' => '1',
            'symptoms' => 'Death of seedlings after germination; brown or black rot girdling stem; seedling may remain upright but stem is constricted and twisted (wirestem); in older cabbage plants sharply defined brown lesions appear on the underside of leaves; the lesions expand causing leaves to wilt and drop from plant',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence in seedlings favored by cool temperatures',
            'management' => 'Plant pathogen-free seed or transplants that have been produced in sterilized soil; apply fungicide to seed to kill off any fungi; shallow plant seeds or delay planting until soil warms',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '48',
            'nome_comum' => 'Powdery mildew',
            'nome_cientifico' => 'Erysiphe cruciferarum',
            'plagueType_id' => '1',
            'symptoms' => 'Small white patches on upper and lower leaf surfaces which may also show purple blotching; patches coalesce to form a dense powdery layer which coats the leaves; leaves become chlorotic and drop from plant',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favored by dry season, moderate temperatures, low humidity and low levels of rainfall',
            'management' => 'Plant resistant varieties; rotate crops; remove all crop debris after harvest; remove weeds; avoid excessive application of nitrogen fertilizer which encourages powdery mildew growth; powdery mildew can be controled by application of sulfur sprays, dusts or vapors',  
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '49',
            'nome_comum' => 'Sclerotinia stem rot (White mold)',
            'nome_cientifico' => 'Sclerotinia sclerotiorum',
            'plagueType_id' => '1',
            'symptoms' => 'Irregular, necrotic gray lesions on leaves; white-gray leions on stems; reduced pod set; shattering seed pods',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favors moderate to cool temperatures and high humidity',
            'management' => 'Rotate crop to non-hosts (e.g. cereals) for at least 3 years; control weeds; avoid dense growth by planting in adequately spaced rows; apply appropriate foliar fungicides',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '50',
            'nome_comum' => 'Watery soft rot (White rot, Cabbage drop)',
            'nome_cientifico' => 'Sclerotinia sclerotiorum',
            'plagueType_id' => '1',
            'symptoms' => 'Soft rotting area at base of stem which spreads upwards successively killing leaves by causing them to drop and infect the leaf below; when fungus reaches the head it causes a soft, slimy, watery rot',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence is favored by frequent rainfall that keep soil close to saturation',
            'management' => 'The number of sclerotia in the soil can be reduced by plowing crop debris deep into soil and rotating crops every 3 years with non-host crops; severe infestations may require control through application of appropriate fungicide',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '51',
            'nome_comum' => 'White rust ',
            'nome_cientifico' => 'Albugo candida',
            'plagueType_id' => '1',
            'symptoms' => 'White pustules on cotyledons, leaves, stems and/or flowers which coalesce to form large areas of infection; leaves may roll and thicken',
            'cause' => 'Fungus',
            'comments' => 'Fungus can survive for long periods of time in dry conditions; disease spread by wind',
            'management' => 'Rotate crops; plant only disease-free seed; apply appropriate fungicide if disease becomes a problem',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '52',
            'nome_comum' => 'Bacterial soft rot',
            'nome_cientifico' => 'Erwinia caratovora',
            'plagueType_id' => '2',
            'symptoms' => 'Water-soaked lesions on cabbage head which expand to form a large rotted mass of cream colored tissue which is liquid underneath; surface of lesions usually crack and exude slimy liquid which turns tan, dark brown or black on exposure to air.',
            'cause' => 'Bacterium',
            'comments' => 'Bacteria are easily spread on tools and by irrigation water; disease emergence favored by warm, moist conditions.',
            'management' => 'Chemical treatments are not available for bacterial soft rot, control relies on cultural practices; rotate crops; plant cabbage in well-draining soils or raised beds; only harvest heads when they are dry; avoid damaging heads during harvest.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '53',
            'nome_comum' => 'Blackleg',
            'nome_cientifico' => 'Leptosphaeria maculans',
            'plagueType_id' => '2',
            'symptoms' => 'Damping-off of seedlings; round or irregularly shaped gray necrotic lesions on leaves with dark margins; lesions may be covered in pink masses in favorable weather conditions.',
            'cause' => 'Fungus',
            'comments' => 'Favors warm, wet conditions; higher temperatures result in the development of more visible symptoms.',
            'management' => 'Cabbage does not have high levels of resistance to blackleg and fungicides use is uneconomical; use disease free seed or treat with hot water to remove fungus prior to planting; remove and destroy crop debris after harvest or plow deeply into soil.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '54',
            'nome_comum' => 'Downy mildew',
            'nome_cientifico' => 'Peronospora parasitica',
            'plagueType_id' => '7',
            'symptoms' => 'Irregular yellow patches on leaves which turn light brown in color; fluffy gray growth on the undersides of the leaves',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favored by cool, moist conditions',
            'management' => 'Remove all crop debris after harvest; rotate with non-brassicas; application of appropriate fungicides may be required if symptoms of disease are present',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '55',
            'nome_comum' => 'Ring spot',
            'nome_cientifico' => 'Mycosphaerella brassicicola',
            'plagueType_id' => '3',
            'symptoms' => 'Small, purple spots surrounded by a ring of water-soaked tissue on leaves which mature to brown spots with olive green borders 1-2 cm across; spots may develop numerous fruiting bodies which give them a black appearance or develop a concentric pattern; heavily infected leaves may dry up and curl inwards',
            'cause' => 'Fungus',
            'comments' => 'Ring spot requires cool, moist conditions to survive; disease symptoms typically develop in the fall and the peak of the infection occurs in winter',
            'management' => 'Refrain from planting in areas known to have had disease previously; rotate crop to non-brassicas; sanitize tools and equipment regularly; apply appropriate fungicide if disease is identified in crop',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '56',
            'nome_comum' => 'Slugs & snails ',
            'nome_cientifico' => 'Decoratus reticulatum or Limax maximus or Helix aspersa or Cornu aspersum',
            'plagueType_id' => '8',
            'symptoms' => 'Irregularly shaped holes in leaves and stems; flowers and fruit may also be damaged if present; if infestation is severe, leaves may be shredded; slime trails present on rocks, walkways, soil and plant foliage; several slug and snail species are common garden pests; slugs are dark gray to black in color and can range in size from 2.5 to 10 cm (1-4 in); garden snails are generally smaller and possess a rounded or spiral shell',
            'cause' => 'Mollusc',
            'comments' => 'Slugs and snails prefer moist, shaded habitats and will shelter in weeds or organic trash; adults may deposit eggs in the soil throughout the season; damage to plants can be extensive',
            'management' => 'Practice good garden sanitation by removing garden trash, weeds and plant debris to promote good air circulation and reduce moist habitat for slugs and snails; handpick slugs at night to decrease population; spread wood ashes or eggshells around plants; attract molluscs by leaving out organic matter such as lettuce or grapefruit skins, destroy any found feeding on lure; sink shallow dishes filled with beer into the soil to attract and drown the molluscs; chemical controls include ferrous phosphate for organic gardens and metaldehyde (e.g. Buggeta) and carbaryl (e.g Sevin bait) for non-organic growers',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '57',
            'nome_comum' => 'Beet armyworm',
            'nome_cientifico' => 'Spodoptera exigua',
            'plagueType_id' => '5',
            'symptoms' => 'Singular, or closely grouped circular to irregularly shaped holes in foliage; heavy feeding by young larvae leads to skeletonized leaves; shallow, dry wounds on fruit; egg clusters of 50-150 eggs may be present on the leaves; egg clusters are covered in a whitish scale which gives the cluster a cottony or fuzzy appearance; young larvae are pale green to yellow in color while older larvae are generally darker green with a dark and light line running along the side of their body and a pink or yellow underside.',
            'cause' => 'Insect',
            'comments' => 'Insect can go through 3–5 generations a year.',
            'management' => 'Organic methods of controlling the beet armyworm include biological control by natural enemies which parasitize the larvae and the application of Bacillus thuringiensis; there are chemicals available for commercial control but many that are available for the home garden do not provide ',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '58',
            'nome_comum' => 'Cabbage aphid',
            'nome_cientifico' => 'Brevicoryne brassicaea',
            'plagueType_id' => '5',
            'symptoms' => 'Large populations can cause stunted growth or even plant death; insects may be visible on the plant leaves and are small, grey-green in color and soft bodied and are covered with a white waxy coating; prefer to feed deep down in cabbage head and may be obscured by the leaves.',
            'cause' => 'Insect',
            'comments' => 'Cabbage aphids feed only on cruciferous plants but may survive on related weed species.',
            'management' => 'If aphid population is limited to just a few leaves or shoots then the infestation can be pruned out to provide control; check transplants for aphids before planting; use tolerant varieties if available; reflective mulches such as silver colored plastic can deter aphids from feeding on plants; sturdy plants can be sprayed with a strong jet of water to knock aphids from leaves; insecticides are generally only required to treat aphids if the infestation is very high - plants generally tolerate low and medium level infestation; insecticidal soaps or oils such as neem or canola oil are usually the best method of control; always check the labels of the products for specific usage guidelines prior to use.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '59',
            'nome_comum' => 'Cabbage looper',
            'nome_cientifico' => 'Trichoplusia ni',
            'plagueType_id' => '5',
            'symptoms' => 'Large or small holes in leaves; damage often extensive; caterpillars are pale green with a white lines running down either side of their body; caterpillars are easily distinguished by the way they arch their body when moving; eggs are laid singly, usually on the lower leaf surface close to the leaf margin, and are white or pale green in color',
            'cause' => 'Insect',
            'comments' => 'Insects overwinter as pupae in crop debris in soil; adult insect id a dark colored moth; caterpillars have a wide host range',
            'management' => 'Management may be needed after cabbage heading; biological controls such as spraying with Bacillus thuringiensis can be effective at controlling looper numbers; application of appropriate insecticide after heading also controls looper populations; selective insecticides help to protect populations of natural enemies on crop',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '60',
            'nome_comum' => 'Cutworms',
            'nome_cientifico' => 'Agrotis spp. or Peridroma saucia or Nephelodes minians',
            'plagueType_id' => '5',
            'symptoms' => 'Stems of young transplants or seedlings may be severed at soil line; if infection occurs later, irregular holes are eaten into the surface of fruits; larvae causing the damage are usually active at night and hide during the day in the soil at the base of the plants or in plant debris of toppled plant; larvae are 2.5–5.0 cm (1–2 in) in length; larvae may exhibit a variety of patterns and coloration but will usually curl up into a C-shape when disturbed',
            'cause' => 'Insect',
            'comments' => 'Cutworms have a wide host range and attack vegetables including asparagus, bean, cabbage and other crucifers, carrot, celery, corn, lettuce, pea, pepper, potato and tomato',
            'management' => 'Remove all plant residue from soil after harvest or at least two weeks before planting, this is especially important if the previous crop was another host such as alfalfa, beans or a leguminous cover crop; plastic or foil collars fitted around plant stems to cover the bottom 3 inches above the soil line and extending a couple of inches into the soil can prevent larvae severing plants; hand-pick larvae after dark; spread diatomaceous earth around the base of the plants (this creates a sharp barrier that will cut the insects if they try and crawl over it); apply appropriate insecticides to infested areas of garden or field if not growing organically',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '61',
            'nome_comum' => 'Diamondback moth',
            'nome_cientifico' => 'Plutella xylostella',
            'plagueType_id' => '5',
            'symptoms' => 'Young larvae feed between upper and lower leaf surface and may be visible when they emerge from small holes on the underside of the leaf; older larvae leave large, irregularly shaped shotholes on leaf undersides, leaving the upper surface intact; larvae may drop from the plant on silk threads if the leaf is disturbed; larvae are small (1 cm/0.3 in) and tapered at both ends; larvae have to prolegs at the rear end that are arranged in a distinctive V-shape',
            'cause' => 'Insect',
            'comments' => 'Larvae take between 10 and 14 days to mature and spin a loose, gauze-like cocoon on leaves or stems to pupate',
            'management' => 'Larvae can be controlled organically by applications of Bacillus thurengiensis or Entrust; application of appropriate chemical insecticide is only necessary if larvae are damaging the growing tips of the plants',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '62',
            'nome_comum' => 'Flea beetle',
            'nome_cientifico' => 'Phyllotreta spp.',
            'plagueType_id' => '5',
            'symptoms' => 'Small holes or pits in leaves that give the foliage a characteristic “shothole” appearance; young plants and seedlings are particularly susceptible; plant growth may be reduced; if damage is severe the plant may be killed; the pest responsible for the damage is a small (1.5–3.0 mm) dark colored beetle which jumps when disturbed; the beetles are often shiny in appearance',
            'cause' => 'Insect',
            'comments' => 'Younger plants are more susceptible to flea beetle damage than older ones; older plants can tolerate infestation; flea beetles may overwinter on nearby weed species, in plant debris or in the soil; insects may go through a second or third generation in one year',
            'management' => 'In areas where flea beetles are a problem, floating row covers may have to be used prior to the emergence of the beetles to provide a physical barrier to protect young plants; plant seeds early to allow establishment before the beetles become a problem - mature plants are less susceptible to damage; trap crops may provide a measure of control - cruciferous plants are best; application of a thick layer of mulch may help prevent beetles reaching surface; application on diamotecoeus earth or oils such as neem oil are effective control methods for organic growers; application of insecticides containing carbaryl, spinosad, bifenthrin and permethrin can provide adequate control of beetles for up to a week but will need reapplied',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '63',
            'nome_comum' => 'Large cabbage white (Cabbageworm)',
            'nome_cientifico' => 'Pieres rapae',
            'plagueType_id' => '5',
            'symptoms' => 'Large ragged holes in leaves or bored into head; green-brown frass (insect feces) on leaves; caterpillar is green in color and hairy, with a velvet-like appearance; may have faint yellow to orange stripes down back; slow-moving compared with other caterpillars',
            'cause' => 'Insect',
            'comments' => 'Butterfly larvae cause damage by feeding on plants; can be distinguished from other caterpillars by its sluggish movement; in large numbers larvae can cause extensive damage very quickly',
            'management' => 'Plant can tolerate quite a lot of damage from caterpillars between transplanting and heading; hand pick caterpillars from plants and destroy; scrape eggs from leaves prior to hatching; apply appropriate insecticide if infestation is very heavy',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

        Plague::create([
            'id' => '64',
            'nome_comum' => 'Thrips (Western flower thrips, Onion thrips, etc) ',
            'nome_cientifico' => 'Frankliniella occidentalis or Thrips tabaci',
            'plagueType_id' => '5',
            'symptoms' => 'If population is high leaves may be distorted; leaves are covered in coarse stippling and may appear silvery; leaves speckled with black feces; insect is small (1.5 mm) and slender and best viewed using a hand lens; adult thrips are pale yellow to light brown and the nymphs are smaller and lighter in color',
            'cause' => 'Insect',
            'comments' => 'Transmit several viruses including Tomato spotted wilt virus; once acquired, the insect retains the ability to transmit the virus for the remainder of its life',
            'management' => 'Avoid planting next to onions, garlic or cereals where very large numbers of thrips can build up; use reflective mulches early in growing season to deter thrips; apply appropriate insecticide if thrips become problematic',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '65',
            'nome_comum' => 'Root knot nematode',
            'nome_cientifico' => 'Meloidogyne spp.',
            'plagueType_id' => '4',
            'symptoms' => 'Galls on roots which can be up to 3.3 cm (1 in) in diameter but are usually smaller; reduction in plant vigor; yellowing plants which wilt in hot weather',
            'cause' => 'Nematode',
            'comments' => 'Galls can appear as quickly as a month prior to planting; nematodes prefer sandy soils and damage in areas of field or garden with this type of soil is most likely',
            'management' => 'Plant resistant varieties if nematodes are known to be present in the soil ;check roots of plants mid-season or sooner if symptoms indicate nematodes; solarizing soil can reduce nematode populations in the soil and levels of inoculum of many other pathogens',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

   //tomato
           Plague::create([
            'id' => '66',
            'nome_comum' => 'Anthracnose',
            'nome_cientifico' => 'Colletotrichum coccodes',
            'plagueType_id' => '1',
            'symptoms' => 'Fruit symptoms are the most common although stem, leaves and roots can also be infected; disease causes characteristic sunken circular lesions on the fruit; the indentations on may have visible concentric brown and yellow rings; lesion centers turn tan in color as they mature and become dotted with small black fungal fruiting bodies (microsclerotia); lesions can grow very large',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favors warm weather; appears early in the spring',
            'management' => 'Avoid sprinkler irrigation when fruit is ripening; rotate crops with other non-solanaceous plants',   
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '67',
            'nome_comum' => 'Black mold',
            'nome_cientifico' => 'Alternaria alternata',
            'plagueType_id' => '1',
            'symptoms' => 'Disease causes the appearance of black or brown lesions on the surface of ripe fruit; lesions may be tiny flecks or may be large patches of decaying tissue; during periods of humid weather, the lesions may become covered in black, velvety spore masses.',
            'cause' => 'Fungus',
            'comments' => 'Disease is found wherever tomatoes are grown; ripe fruit become increasingly susceptible to the fungus the longer they stay on the vine after ripening.',
            'management' => 'Cultural control methods such as avoiding wetting the foliage when watering and harvesting fruits as soon as they are ripe can help to reduce the incidence of the disease; in areas where disease is a persistent problem, chemical control may be necessary with an appropriate fungicide; fungicide is usually applied 4-6 weeks prior to the first anticipated fruit harvest.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '68',
            'nome_comum' => 'Early blight',
            'nome_cientifico' => 'Alternaria solani',
            'plagueType_id' => '1',
            'symptoms' => 'Early blight symptoms start as oval shaped lesions with a yellow chlorotic region across the lesion; concentric leaf lesions may be seen on infected leaves; leaf tissue between veins is destroyed; severe infections can cause leaves to completely collapse; as the disease progresses leaves become severely blighted leading to reduced yield; tomato stems may become infected with the fungus leading to Alternaria stem canker; initial symptoms of of stem canker are the development of dark brown regions on the stem; stem cankers may enlarge to girdle the whole stem resulting in the death of the whole plant; brown streaks can be found in the vascular tissue above and below the canker region; fruit symptoms include small black v-shaped lesions at the shoulders of the fruit (the disease is also known black shoulder); lesions may also appear on the fruit as dark flecks with concentric ring pattern; fruit lesions can seen in the field or may develop during fruit transit to the market; the lesions may have a velvety appearance caused by sporulation of the fungus',
            'cause' => 'Fungus',
            'comments' => 'Disease can spread rapidly after plants have set fruit; movement of air-borne spores and contact with infested soil are causes for the spread of the disease',
            'management' => 'Apply appropriate fungicide at first sign of disease; destroy any volunteer solanaceous plants (tomato, potato, nightshade etc); practice crop rotation',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '69',
            'nome_comum' => 'Fusarium wilt',
            'nome_cientifico' => 'Fusarium oxysporum',
            'plagueType_id' => '1',
            'symptoms' => 'Symptoms of Fusarium wilt may first appear as yellowing and wilting of leaves on one side of the leaf midrib or plant; one-sided symptoms are caused by a blockage in the vascular system supplying the symptomatic side of the plant; as the disease progresses, older leaves become necrotic and the plant begins to wilt; fruit on infected plants is smaller and yield is reduced; damage to leaves makes fruit susceptible to sunscald; stem symptoms may be mistaken for bacterial wilt but a bacterial ooze test will be negative; stem tissue becomes discolored brown',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence favors warm, moist soil Fusarium wilt is not a major issue in tomato production, however, the disease can still cause minor losses',
            'management' => 'Plant resistant varieties; sanitize all equipment regularly; control root knot nematodes; rotate crops away from tomato for several years',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '70',
            'nome_comum' => 'Gray mold (Botrytis blight)',
            'nome_cientifico' => 'Botrytis cinerea',
            'plagueType_id' => '1',
            'symptoms' => 'Disease appears on tomato seedlings at or just below the soil line as a fuzzy gray-brown lesion which often girdles the stem, if stem is girdled all parts of the plant above the lesion begin to wilt; infected flowers and calyxes become covered in gray spores; unripe fruit turns light brown or gray in color and rots; green fruit infected by airborne spores develop circular white rings called “ghost spots”.',
            'cause' => 'Fungus',
            'comments' => 'Gray mold is usually associated with wounds on plants; can develop in relatively cool conditions',
            'management' => 'Liming soil to increase calcium content can help to reduce plant susceptibility to gray mold; application of appropriate fungicide prior to formation of dense canopy.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '71',
            'nome_comum' => 'Leaf Mould',
            'nome_cientifico' => 'Passalora fulva',
            'plagueType_id' => '1',
            'symptoms' => 'The older leaves exhibit pale greenish to yellow spots (without distinguishable margins) on upper surface. Whereas the lower portion of this spots exhibit green to brown velvety fungal growth. As the disease progress the spots may coalesce and appear brown. The infected leaves become wither and die but stay attached to the plant. The fungus also infects flowers and fruits. The affected flowers become black and drop off. The affected fruit intially shows smooth black irregular area on the stem end but later it becomes sunken, leathery and dry.',
            'cause' => 'Fungus',
            'comments' => 'The disease is favored by high relative humidity. Also a common disease in green house tomato crop.',
            'management' => 'Grow available resistant varieties. Avoid leaf wetting and overhead application of water. Follow proper spacing to provide good air circulation around the plants. Remove the infected plant debris and burn them. If the disease is severe scary suitable fungicide.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '72',
            'nome_comum' => 'Septoria leaf spot',
            'nome_cientifico' => 'Septoria lycopersici',
            'plagueType_id' => '1',
            'symptoms' => 'Symptoms may occur at any stage of tomato development and begin as small, water-soaked spots or circular grayish-white spots on the underside of older leaves; spots have a grayish center and a dark margin and they may colasece; fungal fruiting bodies are visible as tiny black specks in the center of spot; spots may also appear on stems, fruit calyxes, and flowers.',
            'cause' => 'Fungus',
            'comments' => 'Spread by water splash; fungus overwinters in plant debris.',
            'management' => 'Ensure all tomato crop debris is removed and destroyed in Fall or plowed deep into soil; plant only disease-free material; avoid overhead irrigation; stake plants to increase air circulation through the foliage; apply appropriate fungicide if necessary.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '73',
            'nome_comum' => 'Target Spot',
            'nome_cientifico' => 'Corynespora cassiicola',
            'plagueType_id' => '1',
            'symptoms' => 'The fungus infects all parts of plant. Infected leaves shows small, pinpoint, water soaked spots initially. As the disease progress the spots enlarge to become necrotic lesions with conspicuous concentric circles, dark margins and light brown centers. Whereas the fruits exhibit brown, slightly sunken flecks in the beginning but later the lesions become large pitted appearance.',
            'cause' => 'Fungus',
            'comments' => 'The pathogen infects cucumber, pawpaw , ornamental plants, some weed species etc. The damaged fruits are susceptible for this disease.',
            'management' => 'Remove the plant debris and burn them. Avoid over application of nitrogen fertilizer. If the disease is severe spray suitable fungicides.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '74',
            'nome_comum' => 'Verticillium wilt',
            'nome_cientifico' => 'Verticillium albo-atrum or Verticillium dahliae',
            'plagueType_id' => '1',
            'symptoms' => 'Symptoms appear first on lower leaves and spread upwards; initial symptoms of the disease may be visible as yellow blotches on the lower leaves of the plant; a rapid yellowing of leaves follows as the disease progresses; leaf veins turn brown and brown dead spots appear on the leaves; leaves may wilt then die and drop from the plant; the disease progresses upwards through the stem causing the plant to be stunted; leaves at the top of the plant remain green; fruits develop yellow shoulders and yield is reduced; loss of leaves results in fruit being susceptible to sun scald.',
            'cause' => 'Fungi',
            'comments' => 'Fungi survive in crop debris in soil; disease emergence favors cool weather.',
            'management' => 'Plant resistant varieties; sanitize all equipment on a regular basis; rotate with non-susceptible crops.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '75',
            'nome_comum' => 'Bacterial canker',
            'nome_cientifico' => 'Clavibacter michiganensis',
            'plagueType_id' => '2',
            'symptoms' => 'Bacterial canker can affect tomato plants of any age, seedlings may be killed quickly once they become infected; initial symptoms of bacterial canker is the unilateral wilting of plants and formation of light colored streaks up and down the outside of the leaf midrib, petiole and stem; streaks on stems may break open to form cankers; mature leaves develop small necrotic spots on the upper leaf surfaces or small raised white spots on the leaves; white spots develop on fruit, usually while they are still green; spots on fruit develop a raised dark center and are known as "bird\'s eye spots"',
            'cause' => 'Bacterium',
            'comments' => 'Can cause serious crop losses',
            'management' => 'Plant only certified seed and transplants; hot water treatment of seed to remove bacteria; rotate crops with non-host plants; turn crops into soil after harvest to promote decomposition',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '76',
            'nome_comum' => 'Bacterial speck',
            'nome_cientifico' => 'Pseudomonas syringae',
            'plagueType_id' => '2',
            'symptoms' => 'Dark specks appear on the leaves, often associated with a yellow halo; foliar symptoms of bacterial speck are very difficult to distinguish from bacterial spot but can be differentiated by symptoms on the fruit; lesions on fruit are much smaller than those caused by bacterial spot; lesions on fruit are raised and scaly.',
            'cause' => 'Bacterium',
            'comments' => 'Disease emergence favors cool, moist weather.',
            'management' => 'Do not plant in same area in successive years; use only high quality, disease-free seed and transplants; protective sprays of copper can help to reduce incidence of the disease.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '77',
            'nome_comum' => 'Bacterial spot',
            'nome_cientifico' => 'Xanthomonas campestris pv. vesicatoria or Xanthomonas euvesicatoria or Xanthomonas perforans = [Xanthomonas axonopodis (syn. campestris) pv. vesicatoria], Xanthomonas vesicatoria or Xanthomonas gardneri',
            'plagueType_id' => '2',
            'symptoms' => 'Bacterial spot lesions starts out as small water-soaked spots; lesions become more numerous and coalesce to form necrotic areas on the leaves giving them a blighted appearance; of leaves drop from the plant severe defoliation can occur leaving the fruit susceptible to sunscald; mature spots have a greasy appearance and may appear transparent when held up to light; centers of lesions dry up and fall out of the leaf; blighted leaves often remain attached to the plant and give it a blighted appearance; fruit infections start as a slightly raised blister; lesions may have a faint halo which eventually disappears; lesions on fruit may have a raised margin and sunken center which gives the fruit a scabby appearance.',
            'cause' => 'Bacterium',
            'comments' => 'Bacteria survive on crop debris; disease emergence favored by warm temperatures and wet weather; symptoms are very similar to other tomato diseases but only bacterial spot will cause a cut leaf to ooze bacterial exudate; the disease is spread by infected seed, wind-driven rain, diseased transplants, or infested soil; bacteria enter the plant through any natural openings on the leaves or any openings caused by injury to the leaves.',
            'management' => 'Use only certified seed and healthy transplants; remove all crop debris from planting area; do not use sprinkler irrigation, instead water from base of plant; rotate crops.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '78',
            'nome_comum' => 'Bacterial wilt',
            'nome_cientifico' => 'Ralstonia solanacearum',
            'plagueType_id' => '2',
            'symptoms' => 'Initial symptoms of the disease is the wilting of a few of the youngest leaves; the disease progresses rapidly in hot weather and the entire plant wilts suddenly and dies; in cooler conditions, wilting is less rapid and plant may produce roots on the stems; vascular tissue shows a brown discoloration and decaying roots; stems cut under water will ooze bacterial exudate and will confirm the symptoms are not caused by Fusarium wilt.',
            'cause' => 'Bacterium',
            'comments' => 'Bacterial wilt can cause complete destruction of the crop under conditions suitable for the spread of the soil-borne bacterium; disease causes serious losses in tomatoes grown in tropical and subtropical regions.',
            'management' => 'Cultural practices may help to reduce incidence of the disease, rotate tomato with other, non-susceptible crops; avoid over-watering plants.',  
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '79',
            'nome_comum' => 'Blossom-end rot',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Blossom end-rot is caused by a low concentration of calcium in the tomato fruit; symptoms initially appear as light tan, water-soaked areas which can then enlarge and turn black and leathery in appearance; symptoms are most often seen at the blossom end of the fruit, but may also occur on the side of the fruit; blossom-end rot may also occur internally with no visible symptoms on outside of fruit.',
            'cause' => 'Physiological disorder.',
            'comments' => 'Low calcium may result from competition from other ions in soil e.g. potassium; can also be caused by drought stress; fluctuations in soil moisture or application of excessive amounts of nitrogen fertilizer which promotes rapid vegetative growth; calcium cannot be translocated from the leaves to the fruit; foliar applications of Ca materials have not proven to reduce BER, since very little Ca is taken up by the fruit; in greenhouse production not cycling the irrigation system at night can increase BER, since night is an important period of Ca uptake.',
            'management' => 'Maintain soil pH at 6.5; lime soil to increase the concentration of calcium in soil and decrease competition with other ions; use mulch to reduce drought stress; avoid ammonium fertilizers as they may increase competition with calcium by increasing ammonium ions in soil, use nitrate instead; avoid over fertilizing.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '80',
            'nome_comum' => 'Catface',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Catface usually occurs on the blossom end, tomato fruits are usually misshapen with large holes or corky brown scars close to the blossom end of the fruit; fruits are often flattened and may be kidney shaped; holes on the fruit extend deep inside the fruit.',
            'cause' => 'Physiological disorder',
            'comments' => 'The catface deformity is possibly caused by internal or external changes that occurs during the formation of the flower resulting in the abnormal development of the fruit; the exact cause is unknown, there may be several factors in fruit deformation; cold weather is known to be a factor along with extreme fluctuations in temperatures between day and night; hormone based herbicides may also cause catfacing; varieties that produce large tomatoes are more prone to catfacing.',
            'management' => 'Avoid pruning tomato plants excessively; avoid excessive fertilization with nitrogen which promotes rapid vegetative growth; if growing tomatoes in a glasshouse, provide the plants with heat to prevent temperatures dropping to damaging levels, particularly at night.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '81',
            'nome_comum' => 'Edema',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Swellings and/or blisters or calluses on leaves caused by rupturing epidermal and inner leaf cells ; deformed foliage which curls; leaf tissue may also tear as the leaf matures; symptoms are often mistaken for disease or insect damage',
            'cause' => 'Physiological disorder',
            'comments' => 'Edema occurs when water is absorbed from the soil faster than it can be transpired through the leaves and is caused by soil being warmer than the surrounding air',
            'management' => 'Tomato plants should always be planted in well draining soil or potting media; avoid overwatering tomato plants, particularly during periods of low light and cool temperatures; if growing tomatoes in a glasshouse then anything that can be done to increase drainage and air circulation will be helpful in preventing edema; reduce humidity in the glasshouse in the morning by venting the house (heat may need to be turned up during this period depending on outdoor temperatures)',     
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '82',
            'nome_comum' => 'Fertilizer burn ',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Symptoms may first appear as slowed growth and wilting; leaf tips and margins turn brown; plants have a scorched appearance.',
            'cause' => 'Excess nitrogen salts',
            'comments' => 'Fertilizer burn is usually caused by an excess of nitrogen salts in the soil which causes an osmotic stress on the plant tissues. The tissues dry out and die resulting in the characteristic scorched appearance of the leaves.',
            'management' => 'Apply appropriate dose of fertilizer for the particular soil in which the plants are growing - nutrient requirements can be ascertained with a soil test; if liquid fertilizer was used, symptoms may be reversed by watering the plants heavily to leach some of the salts from the soil.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '83',
            'nome_comum' => 'Little leaf',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Little leaf symptoms include interveinal chlorosis of young leaves, distortion and failure of leaves along the midrib to expand, radial cracks of fruits extending from the calyx to the blossom scar and failure of blooms to set; symptoms progress to increased leaflet distortion and more pronounced interveinal chlorosis.',
            'cause' => 'Physiological disorder',
            'comments' => 'Three conditions appear to pre-dispose plants to little leaf. 1) high soil temperatures 2) high soil moisture and 3) presence of predisposing population of bacterial/fungal microorganisms in the soil.',
            'management' => 'Little leaf is usually associated with water-logged areas of fields, subsequent drying out of affected areas usually resolves the problem and subsequent plant growth is normal; controlling the soil pH may also help the problem.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '84',
            'nome_comum' => 'Magnesium deficiency ',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Symptoms of magnesium deficiency appear on older leaves first; initial symptoms are interveinal chlorosis of the leaves and, occasionally, a purple tinge to the leaves; as the deficiency becomes more severe, leaves may appear white with green veins; severe deficiencies may lead to reduced fruit yield.',
            'cause' => 'Nutritional disorder',
            'comments' => 'Magnesium deficiency is rare in field grown tomatoes but occurs more frequently in soilless tomato culture.',
            'management' => 'Magnesium deficiency can be prevented in tomato by applying dolomite lime to the soil, if an increase in soil pH is required, or through applications of a fertilizer containing magnesium.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '85',
            'nome_comum' => 'Nitrogen deficiency',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Affected plants are smaller in size and grow less vigorously than healthy plants; symptoms appear on older leaves first; tomato leaves exhibit a general yellowing occasionally accompanied by purple leaf veins; plants possess thinner stems and fruit is smaller than healthy plants; fruits may be misshapen with a lighter red color than healthy plants.',
            'cause' => 'Nutritional disorder',
            'comments' => 'Nitrogen deficiency usually arises in tomato plantations through inadequate fertilizer application; heavy rain can leach nitrogen from sandy soils.',
            'management' => 'If detected early, symptoms of nitrogen deficiency can be treated by applying appropriate amounts of nitrogen fertilizer.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '86',
            'nome_comum' => 'Phosphorous deficiency ',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Growth of tomato seedlings is reduced compared with healthy plants; leaves appear darker green and may have a purple tinge; in older tomato plants, leaves grow upright and appear light green on the upper surface and purple on the lower surface; symptoms appear on older leaves first.',
            'cause' => 'Nutritional disorder',
            'comments' => 'Phosphorous deficiency is rare in soils that are already used for agricultural purposes; in field grown tomatoes phosphorous deficiency more commonly appears in newly cleared land which has never been used to grow crops; phosphorus deficiency may occur on soilless tomato cultures if applications of the nutrient are inadequate.',
            'management' => 'Soil levels of phosphorous should be measured prior to planting to determine the appropriate application for the particular site; phosphorous should be applied to the soil prior to planting if required as applications made after the onset of tomato growth are not usually successful in preventing symptoms.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '87',
            'nome_comum' => 'Potassium deficiency ',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Affected plants are smaller than healhty plants with smaller fruits and reduced yields; tomato leaves exhibit "bronzing", older plant leaves turn tan and then brown at the margins; if deficiency is prolonged, leaves become necrotic at the margins and turn yellow between leaf veins.',
            'cause' => 'Nutritional disorder',
            'comments' => 'Potassium deficiency is usually caused by an inadequate fertilization, it is more common in sandy soils where the nutrient is easily leached from the soil by heavy rainfall.',
            'management' => 'Potassium deficiency can be corrected through applications of the nutrient as a side dressing and/or through an irrigation system.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '88',
            'nome_comum' => 'Sunscald',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Symptoms of sunscald are most common on green fruit; white or yellow necrotic patches develop on the sides of the fruit that are facing the sun; blisters may be white with a yellow halo; damaged areas may become flattened in appearance and papery in texture; damaged areas are often invaded by secondary pathogens and turn black.',
            'cause' => 'Physiological disorder',
            'comments' => 'Sunscald is common on plants which have been moved suddenly from a shaded location to full sun.',
            'management' => 'Healthy plants with full foliage are less susceptible to sunscald as the leaves provide fruits with shading, ensure plants are watered regularly and fertilized adequately; use shade cloth to protect the fruits from the sun; control diseases that develop to prevent defoliation which can lead to sunscald.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '89',
            'nome_comum' => 'Water stress ',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Leaves are green but wilting; leaves roll downwards and eventually drop from the plant; fruits may develop symptoms of Blossom-end rot (See entry).',
            'cause' => 'Physiological stress',
            'comments' => 'It is important to distinguish between plants that are temporarily wilted on hot days and those that are stressed due to lack of moisture in the soil; on very hot days tomato plants will wilt as the rate of transpiration exceeds the rate at which water can be taken up from the soil by the roots and the plants will usually recover in the evening when temperatures are cooler.',
            'management' => 'Tomato plants should be watered deeply and evenly to avoid water stress; aim to keep the soil moist but not wet; allow the top of the soil to dry before watering again.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '90',
            'nome_comum' => 'Zippering',
            'nome_cientifico' => '',
            'plagueType_id' => '8',
            'symptoms' => 'Thin brown scars extending longutudinally from the petiole to the blossom-end of the fruit; each scar has smaller scars crossing it tranversely rendering it zipper-like in appearance; holes may open on along the scarred area.',
            'cause' => 'Physiological disorder',
            'comments' => 'Zipper scars on tomato fruit are most prevalent in cool weather.',
            'management' => 'The most effective method of preventing zippering is to grow tolerant varieties; when growing tomatoes in the glasshouse, appropriate temperatures should be maintained.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '91',
            'nome_comum' => 'Buckeye rot (Phytophthora root rot) ',
            'nome_cientifico' => 'Phytophthora spp.',
            'plagueType_id' => '7',
            'symptoms' => 'Buck eye rot of tomato initially appears as a brown spot on the fruit which enlarges over the fruit surface and forms concentric rings; the lesions may eventually cover up to half of the fruit and the flesh develops a soft rot underneath the skin; green or red fruits can be affected and disease often develops where fruit is in contact with the soil; white cottony growth may be visible in the centers of affected regions; spots enlarge and form large concentric ring shaped symptoms which are usually brown in color with sunken edges; the Phytophthora pathogen also causes root rot; young plants may exhibit a white cottony growth at crown of the plant and begin to wilt as the damage to the roots progresses; Phytophthora root rot can cause severe destruction of plant roots and cause the plants to wilt completely',
            'cause' => 'Fungi',
            'comments' => 'Prolonged period of warm wet conditions favor disease occurrence; heavy soil saturation also favors disease development in soils where pathogen is present; disease can be spread by splashing water',
            'management' => 'Cultural control methods such as mulching around the plants and practicing rotation away from tomato can help to reduce losses from the disease; fungicides applied for the control of late blight also help to control the development of buckeye rot; solarizing or fumigating soil can help to reduce levels of inoculum.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '92',
            'nome_comum' => 'Late blight',
            'nome_cientifico' => 'Phytophthora infestans',
            'plagueType_id' => '7',
            'symptoms' => 'Late blight affects all aerial parts of the tomato plant; initial symptoms of the disease appear as water-soaked green to black areas on leaves which rapidly change to brown lesions; fluffy white fungal growth may appear on infected areas and leaf undersides during wet weather; as the disease progresses, foliage becomes becomes shriveled and brown and the entire plant may die; fruit lesions start as irregularly shaped water soaked regions and change to greasy spots; entire fruit may become infected and a white fuzzy growth may appear during wet weather.',
            'cause' => 'Oomycete',
            'comments' => 'Can devastate tomato plantings.',
            'management' => 'Plant resistant varieties; if signs of disease are present or if rainy conditions are likely or if using overhead irrigation appropriate fungicides should be applied.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '93',
            'nome_comum' => 'Tomato mosaic virus',
            'nome_cientifico' => 'Tomato mosaic virus (ToMV)',
            'plagueType_id' => '3',
            'symptoms' => 'Symptoms can occur at any growth stage and any part of the plant can be affected; infected leaves generally exhibit a dark green mottling or mosaic; some strains of the virus can cause yellow mottling on the leaves; young leaves may be stunted or distorted; severely infected leaves may have raised green areas; fruit yields are reduced in infected plants; green fruit may have yellow blotches or necrotic spots; dark necrotic streaks may appear on the stems, petioles leaves and fruit.',
            'cause' => 'Virus',
            'comments' => 'ToMV is a closely related strain of Tobacco mosaic virus (TMV), it enters fields via infected weeds, peppers or potato plants; the virus may also be transmitted to tomato fields by grasshoppers, small mammals and birds.',
            'management' => 'Plant varieties that are resistant to the virus; heat treating seeds at 70°C (158°F) for 4 days or at 82–85°C (179.6–185°F) for 24 hours will help to eliminate any virus particles on the surface of the seeds; soaking seed for 15 min in 100 g/l of tri-sodium phosphate solution (TSP) can also eliminate virus particles - seeds should be rinsed thoroughly and laid out to dry after this treatment; if the virus is confirmed in the field, infected plants should be removed and destroyed to limit further spread; plant tomato on a 2-year rotation, avoiding susceptible crops such as peppers, eggplant, cucurbits and tobacco; disinfect all equipment when moving from infected areas of the field.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '94',
            'nome_comum' => 'Tomato spotted wilt',
            'nome_cientifico' => 'Tomato spotted wilt virus (TSWV)',
            'plagueType_id' => '3',
            'symptoms' => 'Infected plants exhibit bronzing or purpling of the upper sides of young leaves and develop necrotic spots; leaf spots may resemble those caused by bacterial spot, but a bacterial ooze test will be negative; leaves may cup downwards, shoot tips may begin to die back; symptoms on ripe fruit appear as chlorotic spots and blotches, often with concentric rings; ring spot symptoms vary with different tomato cultivars; irregular ripening caused by TSWV can also show up when fruit are treated with ethylene gas; green fruit may exhibit slightly raised areas with faint concentric zonation.',
            'cause' => 'Virus',
            'comments' => 'TSWV infects numerous ornamentals, vegetables, field crops and weeds; virus is vectored by at least eight species of thrips; thrips, acquires the virus during the larval stages,and transmit the virus when they are adults.',
            'management' => 'Control populations of western flower thrips and onion thrips',   
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '95',
            'nome_comum' => 'Tomato Yellow Leaf Curl disease',
            'nome_cientifico' => 'omato Yellow Leaf Curl Virus (TYLCV) family Geminiviridae, genus Begomovirus',
            'plagueType_id' => '3',
            'symptoms' => 'The infected leaves become reduced in size, curl upward, appear crumpled and show yellowing of veins and leaf margins. The internodes become shorter and whole plant appear stunted and bushy. The whole plant stand erect with only upright growth. The flowers may not develop and drop off.',
            'cause' => 'Virus',
            'comments' => 'The virus is transmitted by white flies and may cause 100 % yield loss if the plants infect at early stage of crop. The virus also infect other hosts like common bean, ornamental plants and several weed species.',
            'management' => 'Grow available resistant varieties. Transplant only disease and whiteflies free seedlings. Remove the infected plants and burn them. Keep the field free from weeds. Use yellow sticky traps to monitor and control whiteflies. If the insect infestation is severe spray suitable insecticides.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '96',
            'nome_comum' => 'Aphids (Peach aphid, Potato aphid)',
            'nome_cientifico' => 'Myzus persicae or Macrosiphon euphorbiae',
            'plagueType_id' => '5',
            'symptoms' => 'Small soft bodied insects on underside of leaves and/or stems of plant; usually green or yellow in color, but may be pink, brown, red or black depending on species and host plant; if aphid infestation is heavy it may cause leaves to yellow and/or be distorted, necrotic spots on leaves and/or stunted shoots; aphids secrete a sticky, sugary substance called honeydew which encourages the growth of sooty mold on the plants.',
            'cause' => 'Insect',
            'comments' => 'Distinguishing features of aphids include the presence of cornicles (tubular structures) which project backwards from the insect\'s body; aphids will generally not move very quickly when disturbed; aphids may also transmit plant viruses to the plant when they feed.',
            'management' => 'If aphid population is limited to just a few leaves or shoots then the infestation can be pruned out to provide control; check transplants for aphids before planting; use tolerant varieties if available; reflective mulches such as silver colored plastic can deter aphids from feeding on plants; sturdy plants can be sprayed with a strong jet of water to knock aphids from leaves; insecticides are generally only required to treat aphids if the infestation is very high - plants generally tolerate low and medium level infestation; insecticidal soaps or oils such as neem or canola oil are usually the best method of control; always check the labels of the products for specific usage guidelines prior to use.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '97',
            'nome_comum' => 'Beet armyworm',
            'nome_cientifico' => 'Spodoptera exigua',
            'plagueType_id' => '5',
            'symptoms' => 'Singular, or closely grouped circular to irregularly shaped holes in foliage; heavy feeding by young larvae leads to skeletonized leaves; shallow, dry wounds on fruit; egg clusters of 50-150 eggs may be present on the leaves; egg clusters are covered in a whitish scale which gives the cluster a cottony or fuzzy appearance; young larvae are pale green to yellow in color while older larvae are generally darker green with a dark and light line running along the side of their body and a pink or yellow underside.',
            'cause' => 'Insect',
            'comments' => 'Insect can go through 3-5 generations a year.',
            'management' => 'Organic methods of controlling the beet armyworm include biological control by natural enemies which parasitize the larvae and the application of Bacillus thuringiensis; there are chemicals available for commercial control but many that are available for the home garden do not provide adequate control of the larvae.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '98',
            'nome_comum' => 'Colorado potato beetle',
            'nome_cientifico' => 'Leptinotarsa decemlineata',
            'plagueType_id' => '5',
            'symptoms' => 'Feeding damage to foliage; if infestation is severe or if left untreated plants can be completely defoliated; adult insect is a black and yellow striped beetle; larvae are bright red with black heads when they first hatch and change color to pink; larvae have two rows of black spots.',
            'cause' => 'Insect',
            'comments' => 'Adult beetles emerge in spring; female beetles lay eggs in batches of up to two dozen; eggs are orange-yellow and are laid on undersides of leaves; a female can lay 500 or more eggs over a four to five week period.',
            'management' => 'Control of Colorado potato beetle can be challenging as they have developed high levels of insecticide resistance; adults and larvae should be hand picked from plants and destroyed in soapy water; applications of Bacillus thuringiensis can be effective at controlling larvae but should be applied frequently; some insecticides, including spinosad, are still effective against adult beetles.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '99',
            'nome_comum' => 'Cutworms',
            'nome_cientifico' => 'Various species: Agrotis spp., Peridroma saucia, Nephelodes minians ,etc.',
            'plagueType_id' => '5',
            'symptoms' => 'Stems of young transplants or seedlings may be severed at soil line; if infection occurs later, irregular holes are eaten into the surface of fruits; larvae causing the damage are usually active at night and hide during the day in the soil at the base of the plants or in plant debris of toppled plant; larvae are 2.5–5.0 cm (1–2 in) in length; larvae may exhibit a variety of patterns and coloration but are usually dirty gray or brown to black with dark spots or lines and will curl up into a characteristic C-shape when disturbed',
            'cause' => 'Insect',
            'comments' => 'Cutworms have a wide host range and attack vegetables including asparagus, bean, cabbage and other crucifers, carrot, celery, corn, lettuce, pea, pepper, potato and tomato',
            'management' => 'Remove all plant residue from soil after harvest or at least two weeks before planting, this is especially important if the previous crop was another host such as alfalfa, beans or a leguminous cover crop; plastic or foil collars fitted around plant stems to cover the bottom 3 inches above the soil line and extending a couple of inches into the soil can prevent larvae severing plants; hand-pick larvae after dark; spread diatomaceous earth around the base of the plants (this creates a sharp barrier that will cut the insects if they try and crawl over it); apply appropriate insecticides to infested areas of garden or field if not growing organically',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '100',
            'nome_comum' => 'Flea beetles',
            'nome_cientifico' => 'Epitrix spp.',
            'plagueType_id' => '5',
            'symptoms' => 'Small holes or pits in leaves that give the foliage a characteristic “shothole” appearance; young plants and seedlings are particularly susceptible; plant growth may be reduced; if damage is severe the plant may be killed; feeding damage may also occur on the fruit; the pest responsible for the damage is a small (1.5–3.0 mm) dark colored beetle which jumps when disturbed; the beetles are often shiny in appearance.',
            'cause' => 'Insects',
            'comments' => 'Flea beetles may overwinter on nearby weed species, in plant debris or in the soil; insects may go through a second or third generation in one year.',
            'management' => 'In areas where flea beetles are a problem, floating row covers may have to be used prior to the emergence of the beetles to provide a physical barrier to protect young plants; plant seeds early to allow establishment before the beetles become a problem - mature plants are less susceptible to damage; trap crops may provide a measure of control - cruciferous plants are best; application of a thick layer of mulch may help prevent beetles reaching surface; application on diamotecoeus earth or oils such as neem oil are effective control methods for organic growers; application of insecticides containing carbaryl, spinosad, bifenthrin and permethrin can provide adequate control of beetles for up to a week but will need reapplied.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '101',
            'nome_comum' => 'Hornworms (Tomato hornworm, Tobacco hornworm)',
            'nome_cientifico' => 'Manduca, quinquemaculata, Manduca sexta',
            'plagueType_id' => '5',
            'symptoms' => 'Feeding damage to leaves or leaves stripped from plant; heavy infestation may result in damage to fruit appearing as large open scars; large green caterpillars may be spotted on plant; caterpillars may reach in excess of 7.5 cm (3 in) in length and possess a spike at the end of their body; most common species have 7 diagonal stripes on sides or 8 v-shaped markings on each side; single eggs may be present on leaves and measure approx 1.3 mm in diameter; eggs are in initially light green in color and turn white prior to hatching.',
            'cause' => 'Insect',
            'comments' => 'Insect overwinters as pupa in soil; typically undergoes 2 generations per year; heavy infestations are more common in warm areas.',
            'management' => 'Hand pick larvae from plants leaving any parasitized larvae behind to promote populations of natural enemies (these larvae can be distinguished by the presence of white, oblong-shaped cocoons on their backs); sprays of Bacillus thuringiensis are organically acceptable and highly effective.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '102',
            'nome_comum' => 'Leafminers',
            'nome_cientifico' => 'Tuta absoluta, Lyriomyza spp.',
            'plagueType_id' => '5',
            'symptoms' => 'Thin, white, winding trails on leaves; heavy mining can result in white blotches on leaves and leaves dropping from the plant prematurely; early infestation can cause fruit yield to be reduced; adult leafminer is a small black and yellow moth which lays its eggs in the leaf; larvae hatch and feed on leaf interior.',
            'cause' => 'Insect',
            'comments' => 'Origin and distribution of Tuta absoluta: This species is originated in South American countries. Later the insect spread to Spain (2006), France, Italy, Greece, Malta, Morocco, Algeria, Libya and Turkey in following years. Further the insect has been identified in Syria, Lebanon, Jordan, Iraq, Iran, Saudi Arabia, Yemen, Oman and the rest of the Gulf states. In Africa it spreads from Egypt to Sudan, South Sudan, Ethiopia, Uganda, Kenya and Tanzania (in East) and to Senegal and Nigeria through the west. (It spread through infested fruits and packaging materials) Life cycle: Mature larvae drop from leaves into soil to pupate; entire lifecycle can take as little as 2 weeks in warm weather; insect may go through 7 to 12 generations per year. Yield loss: If unchecked, insect will cause 100% yield loss. The larvae feeds on apical buds, tender new leaflets, flowers, and green fruits which make it a serious pest in tomato. Host Range: This insect also attacks other solanaceous crops like potato, eggplant, pepino and tobacco. It is also reported on many solanaceous weeds',
            'management' => 'Leafminer natural enemies normally keep populations under control; check transplants for signs of leafminer damage prior to planting; remove plants from soil immediately after harvest if making new plantings in same place or close by; keep the field free from weeds especially Solanum, Datura, Nicotiana; use pheromone traps and white sticky traps to monitor and control insect;only use insecticides when leafminer damage has been identified as unnecessary spraying will also reduce populations of their natural enemies.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '103',
            'nome_comum' => 'Loopers (Cabbage looper , Alfalfa looper) ',
            'nome_cientifico' => 'Trichoplusia ni, Autographa californica',
            'plagueType_id' => '5',
            'symptoms' => 'Large or small holes in leaves; damage often extensive; caterpillars are pale green with a white lines running down either side of their body; caterpillars are easily distinguished by the way they arch their body when moving; eggs are laid singly, usually on the lower leaf surface close to the leaf margin, and are white or pale green in color.',
            'cause' => 'Insect',
            'comments' => 'Insects overwinter as pupae in crop debris in soil; adult insect id a dark colored moth; caterpillars have a wide host range.',
            'management' => 'Looper populations are usually held in check by natural enemies; if they do become problematic larvae can be hand picked from the plants; an organically acceptable control method is the application of Bacillus thuringiensis which effectively kills younger larvae; chemical sprays may also damage populations of natural enemies and should only be considered if sunburn of fruit is likely.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '104',
            'nome_comum' => 'Stinkbugs (Various)',
            'nome_cientifico' => 'Various',
            'plagueType_id' => '5',
            'symptoms' => 'Dark colored pinpricks on fruit surrounded by a lighter area that turns yellow or remains light green; stink bugs often carry pathogens in their mouthparts which can cause secondary infections and decay of fruit; adult insect is shield-shaped and brown or green in color; may have pink, red or yellow markings; eggs are drum shaped and laid in clusters on the leaves; larvae resemble the adults but are smaller.',
            'cause' => 'Insect',
            'comments' => 'Several types of stink bug can cause damage to tomatoes; adult insects overwinter under leaves, on legumes, blackberries or on certain weeds such as mustard or Russian thistle.',
            'management' => 'Remove weeds around crop which may act as overwintering sites for stink bugs and practice good weed management throughout the year; organically accepted control methods include the use of insecticidal soaps, kaolin clay and preservation of natural enemies; chemical treatments are not recommended for tomatoes that are to be processed for paste or canning unless secondary infections with other pathogens are a concern.',    
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '105',
            'nome_comum' => 'Thrips (Western flower thrips, Onion thrips, etc.)',
            'nome_cientifico' => 'Frankliniella occidentalis, Thrips tabaci',
            'plagueType_id' => '5',
            'symptoms' => 'If population is high leaves and buds may be distorted; leaves appear silvery and are speckled with black feces; most damage occurs through the transmission of Tomato spotted wilt virus (TSWV); insect is small (1.5 mm) and slender and best viewed using a hand lens; adult thrips are pale yellow to light brown and the nymphs are smaller and lighter in color.',
            'cause' => 'Insect',
            'comments' => 'Transmit Tomato spotted wilt virus (see disease entry); once acquired, the insect retains the ability to transmit the virus for the remainder of its life.',
            'management' => 'Avoid planting next to onions, garlic or cereals where very large numbers of thrips can build up; use reflective mulches early in growing season to deter thrips; apply appropriate insecticide if thrips become problematic.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '106',
            'nome_comum' => 'Tomato fruit worm (Corn earworm)',
            'nome_cientifico' => 'Helicoverpa zea',
            'plagueType_id' => '5',
            'symptoms' => 'Holes in tomato fruit, including entry holes near stem end; feeding turns inside of tomato into a watery cavity filled with cast skins and frass (insect feces); damaged fruit ripens prematurely; young caterpillars are cream-white in color with a black head and black hairs; older larvae may be yellow-green to almost black in color with fine white lines along their body and black spots at the base of hairs; eggs are laid singly on both upper and lower leaf surfaces and are initially creamy white but develop a brown-red ring after 24 hours and darken prior to hatching.',
            'cause' => 'Insect',
            'comments' => 'Adult insect is a pale green to tan, medium sized moth; can be one of the most damaging pests of tomato; insect overwinters as pupae in the soil; the insect is also a damaging pest of corn and is also referred to as the corn earworm.',
            'management' => 'Early treatment of tomato fruitworms is necessary as once they enter the fruit they are protected from sprays; monitor plants for eggs and young larvae and also natural enemies that could be damaged by chemicals; Bacillus thuringiensis or Entrust SC may be applied to control insects on organically grown plants; appropriate chemical treatment may be required for control in commercial plantations.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '107',
            'nome_comum' => 'Curly top',
            'nome_cientifico' => 'Beet curly top virus (BCTV)',
            'plagueType_id' => '8',
            'symptoms' => 'Young plants are usually killed by the virus; older plants are stunted and turn yellow to bronze in color with purple-tinged leaves; leave become thickened and roll upwards; leaf petioles roll downwards; green fruit turns red regardless of its age and becomes dull in color and wrinkled; plants do not recover form the disease and will not flower of produce fruit after infection.',
            'cause' => 'Virus',
            'comments' => 'Virus is transmitted by beet leafhoppers; insects transmit the disease between over 300 species of plant, including beets, tomato, squash, swiss chard, cucumber and melon.',
            'management' => 'There is no resistance to Beet curly top virus in tomato so control relies on the management of the leafhopper vector; dense stands of tomato may discourage leafhoppers from visiting the plants; chemical spraying programs to protect against beet leafhoppers have been implemented in some areas of the US state of California ; in areas where the virus is a chronic problem, n areas where curly top is chronic, dense plant spacing, shading, row covers, and intercropping have been reported to reduce levels of infection.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '108',
            'nome_comum' => 'Root knot nematode',
            'nome_cientifico' => 'Meloidogyne spp.',
            'plagueType_id' => '4',
            'symptoms' => 'The characteristic symptom of root knot nematodes is the presence of galls on roots which can be up to 3.3 cm (1 in) in diameter but are usually smaller; galls cause a reduction in plant vigor; if the galls on the roots are extensive then plants may yellow and wilt, particularly in hot weather.',
            'cause' => 'Nematode',
            'comments' => 'Galls can appear as quickly as a month prior to planting; nematodes prefer sandy soils and damage in areas of field or garden with this type of soil is most likely; disease can be a major problem if soils are infected with Meloidogyne sp. and resistant varieties are not used for production.',
            'management' => 'Plant resistant varieties if nematodes are known to be present in the soil ;check roots of plants mid-season or sooner if symptoms indicate nematodes; solarizing soil can reduce nematode populations in the soil and levels of inoculum of many other pathogens',            
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '109',
            'nome_comum' => 'Spider mites (Two-spotted spider mite)',
            'nome_cientifico' => 'Tetranychus urticae',
            'plagueType_id' => '8',
            'symptoms' => 'Leaves stippled with yellow; leaves may appear bronzed; webbing covering leaves; mites may be visible as tiny moving dots on the webs or underside of leaves, best viewed using a hand lens; usually not spotted until there are visible symptoms on the plant; leaves turn yellow and may drop from plant',
            'cause' => 'Arachnid',
            'comments' => 'Spider mites thrive in dusty conditions; water-stressed plants are more susceptible to attack.',
            'management' => 'In the home garden, spraying plants with a strong jet of water can help reduce buildup of spider mite populations; if mites become problematic apply insecticidal soap to plants; certain chemical insecticides may actually increase mite populations by killing off natural enemies and promoting mite reproduction.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           //MILHO
           Plague::create([
            'id' => '110',
            'nome_comum' => 'Anthracnose',
            'nome_cientifico' => 'Colletotrichum graminicola',
            'plagueType_id' => '1',
            'symptoms' => 'Anthracnose symptoms vary widely depending on numerous factors such as genotype, age of plant and environmental conditions; small oval or elongated water-soaked spots which enlarge up to 15 mm long appear on leaves; lesions develop a tan center and red-brown or orange border; lesions may coalesce to form large necrotic patches; severely infected leaves on susceptible hybrids may wither and die; fungal fruiting bodies develop on dead tissues and may produce pink or orange spore masses; the fungus may also cause top dieback and stalk rot.',
            'cause' => 'Fungus',
            'comments' => 'Fungus overwinters on crop debris; emergence of disease is favored by high temperatures and extended periods of wet and cloudy weather; seedlings and mature plants are most susceptible to the disease.',
            'management' => 'Plant hybrids resistant to anthracnose; rotating crops and plowing crop debris into soil may help reduce incidence of early season infections.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '111',
            'nome_comum' => 'Cercospora leaf spot (Gray leaf spot)',
            'nome_cientifico' => 'Cercospora zeae-maydis',
            'plagueType_id' => '1',
            'symptoms' => 'Small necrotic spots with chlorotic halos on leaves which expand to rectangular lesions 1-6 cm in length and 2-4 mm wide; as the lesions mature they turn tan in color and finally gray; lesions have sharp, parallel edges and are opaque; disease can develop quickly causing complete blighting of leaves and plant death.

1. Brown Spots with yellow rings throughout the leaf during the growing period of the Cassava
2. Lesions that are 0.15-0.2 cm in diameter
3. Serious cases can lead to holes throughout the lesions on the leaf',
            'cause' => 'Fungus',
            'comments' => 'Disease emergence is favored in areas where a corn crop is followed by more corn with no rotastion; severity and incidence of disease is likely die to continuous corn culture with minimum tillage and the use of susceptible hybrids in in the midwestern corn belt of the USA; prolonged periods of foggy or cloudy weather can cause severe Cercopora epidemics.',
            'management' => 'Plant corn hybrids with resistance to the disease; crop rotation and plowing debris into soil may reduce levels of inoculum in the soil but may not provide control in areas where the disease is prevalent; foliar fungicides may be economically viable for some high yeilding susceptible hybrids.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '112',
            'nome_comum' => 'Charcoal rot',
            'nome_cientifico' => 'Macrophomina phaseolina',
            'plagueType_id' => '1',
            'symptoms' => 'Symptoms are usually first apparent at the tasseling stage; plant stalks become shredded and pith is completely rotted with stringy strands of vascular tissue left intact; small, black fungal fruiting bodies are visible in the vascular strands and give the tissue a gray coloration; fungus grows into internodes of the stalk causing the plant to ripen early and causing the stalk to weaken; plant may break.',
            'cause' => 'Fungus',
            'comments' => 'Emergence of the disease is favored by warm soils with a low moisture content; fungus overwinters in the soil and can also survive on other host plants which include sorghum and soybean.',
            'management' => 'There are currently no available fungicides to treat the disease; avoid stressing plants by practicing good water management; rotating crops with small grains may help reduce disease incidence.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '113',
            'nome_comum' => 'Common rust',
            'nome_cientifico' => 'Puccinia sorghi',
            'plagueType_id' => '1',
            'symptoms' => 'Oval or elongated cinnamon brown pustules on upper and lower surfaces of leaves; pustules rupture and release powdery red spores; pustules turn dark brown-black as they mature and release dark brown powdery spores; if infection is severe, pustules may appear on tassels and ears and leaves may begin to yellow; in partially resistant corn hybrids, symptoms appear as chlorotic or necrotic flecks on the leaves which release little or no spore.',
            'cause' => 'Fungus',
            'comments' => 'Disease is spread by wind-borne spores; some of the most popularly grown sweet corn varieties have little or no resistance to the disease.',
            'management' => 'The most effective method of controlling the disease is to plant resistant hybrids; application of appropriate fungicides may provide some degree on control and reduce disease severity; fungicides are most effective when the amount of secondary inoculum is still low, generally when plants only have a few rust pustules per leaf.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '114',
            'nome_comum' => 'Common smut (Boil smut, Blister smut)',
            'nome_cientifico' => 'Ustilago zeae',
            'plagueType_id' => '1',
            'symptoms' => 'Tumor-like galls on plant tissues which are initially green-white or silvery white in color; interior of galls darken and turn into masses of powdery dark brown or black spores (with the exception of galls on leaves which remain greenish in color); galls may reach up to 15 cm in diameter and are common on ears, tassels, shoots or midrib of leaves; galls on leaves remain small and do not burst open.',
            'cause' => 'Fungus',
            'comments' => 'Fungus overwinters on crop debris or in the soil and can survive for several years; fungus usually enters the plant through wounds; application of nitrogen fertilizer increases incidence of disease, while application of phosphorous fertilizer decreases infection.',
            'management' => 'Although many practices may be recommended for the control of common smut, the only method that is completely effective is to grow resistant corn hybrids.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '115',
            'nome_comum' => 'Downy Mildew disease',
            'nome_cientifico' => 'Peronosclerospora sorghi (Sorghum downy mildew), P. maydis (Java downy mildew), P. philippinensis (Philippine downy mildew), P. sacchari (Sugarcane downy mildew), Scleropthora rayssiae var. zeae (Brown stripe downy mildew), Sclerospora graminicola (Graminicola downy mildew or green ear),Sclerophthora macrospora (crazy top)',
            'plagueType_id' => '1',
            'symptoms' => 'Symptoms of all maize downy mildew pathogens are similar although may vary depends on cultivar, age and climate. The disease appear as early from two weeks after sowing resulting in chlorosis and stunting. In older plants the leaves shows mottling, chlorotic streaking and lesions and white striped leaves. Usually the leaves are narrower and more erect when compare to healthy plants and are covered with a white, downy growth on both surfaces.',
            'cause' => 'Fungus',
            'comments' => 'The disease is both air and seed born. The pathogen have several alternative hosts.',
            'management' => 'Grow available resistant varieties and hybrids. Follow crop rotation with non host crops. Use suitable systemic fungicide for both seed treatment and foliar spray. Keep the fields free from weeds. Drying seeds before sowing reduces the disease incidence.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '116',
            'nome_comum' => 'Giberrella stalk and ear rot',
            'nome_cientifico' => 'Giberella zeae',
            'plagueType_id' => '1',
            'symptoms' => 'Plants wilting and leaves changing color from light to dull green; lower stalk turns straw yellow; internal stalk tissue breaks down; interior of stalk has a red discoloration; black fungal fruiting bodies may be visible on the stalk, often at internodes, and can be easily scraped off; if fungal infection affects the ears, it produces a red mold at the tips of the ear which spreads down; early infection may result in the ear being covered in pink mycelium which causes the corn husk to adhere to the ear.',
            'cause' => 'Fungus',
            'comments' => 'Fungus can enter through wounds to stalk or ear; ear rot is caused by the fungus infecting silks and moving down through the ear; fungus survives on corn debris in soil and on debris of other host plants such as wheat.',
            'management' => 'Stressed plants are more susceptible to Gibberella - providing adequate fertilization and irrigation can help reduce incidence of disease; control insects, especially stem and ear borers; hybrids differ in their susceptibility to the disease and further information is required in order to develop specific control measures.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '117',
            'nome_comum' => 'Northern Leaf Blight',
            'nome_cientifico' => 'Exserohilum turcicum',
            'plagueType_id' => '1',
            'symptoms' => 'In the beginning we will notice elliptical gray-green lesions on leaves. As the disease process this lesions become pale gray to tan color. Later stage the lesions looks dirty due to dark gray spores particularly under lower leaf surface. The disease can be easily identified in the field due to its long, narrow lesions which are unrestricted by veins.',
            'cause' => 'Fungus',
            'comments' => 'The disease mainly spread through rain splash and wind.',
            'management' => 'Follow proper tillage to reduce fungus inoculum from crop debris. Follow crop rotation with non host crop. Grow available resistant varieties. In severe case of disease incidence apply suitable fungicide.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '118',
            'nome_comum' => 'Southern corn leaf blight',
            'nome_cientifico' => 'Bipolaris maydis',
            'plagueType_id' => '1',
            'symptoms' => 'Foliar symptoms vary with hybrid and different fungal isolate; lesions on leaves may be tan and elongated and run between leaf veins; lesions may have a buff or brown colored margin; another race of the fungus causes tan, spindle shaped or elliptical lesions with a water-soaked margin that turns into a yellow halo',
            'cause' => 'Fungus',
            'comments' => 'Fungus overwinters in corn debris in soil; disease occurs worldwide but is emergence favors areas with a warm, damp climate.',
            'management' => 'The most effective method of controlling the disease is to plant resistant hybrids; cultural control methods include plowing crop debris into soil after harvest and rotating crops.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '119',
            'nome_comum' => 'Bacterial leaf blight/stripe ',
            'nome_cientifico' => 'Pseudomonas rubrilineans, syn. Pseudomonas avenae, Acidvorax avenae subsp. avenae',
            'plagueType_id' => '2',
            'symptoms' => 'Water-soaked linear lesions on leaves as they emerge; lesions turn brown and may subsequently turn gray or white; lesions may have a red border; after the leaves are mature, lesions do not tend to extend any further; no new lesions tend to appear after tasseling; if corn variety is susceptible, mature leaves may shred after maturity.',
            'cause' => 'Bacterium',
            'comments' => 'Bacteria can also cause disease in oats, barley, wheat, some millets and sorghum.',
            'management' => 'Resistant hybrids should be planted in areas where the disease is prevalent; plowing crop debris into soil and rotating crop may not be effective at controlling the disease due to its extensive host range.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '120',
            'nome_comum' => 'Bacterial Leaf Streak disease ',
            'nome_cientifico' => 'Xanthomonas vasicola pv. vasculorum (syn Xanthomonas campestris pv. zeae)',
            'plagueType_id' => '2',
            'symptoms' => 'The infected leaves initially shows narrow stripes between the veins. The initial symptoms are generally confused with gray leaf spot disease. But the lesions from bacteria appear brown, orange, and/or yellow when you infected leaves are back-lit. Also in Bacterial Leaf Streak disease the lesions show slightly wavy edges when compared to the smooth, linear lesion margins of gray leaf spot.',
            'cause' => 'Bacterium',
            'comments' => 'The bacteria causes gumming disease on sugarcane in several part of the world. First reported on corn in South Africa. Currently this disease is reported in Nebraska (Aug. 26, 2016), Colorado, Illinois, Iowa, and Kansas on corn.',
            'management' => 'Use healthy and disease free seeds. Remove the infected plant debris and burn them. Follow crop rotation.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '121',
            'nome_comum' => 'Bacterial stalk rot/soft rot',
            'nome_cientifico' => 'Erwinia chrysanthemi, Erwinia carotovora',
            'plagueType_id' => '2',
            'symptoms' => 'Plants suddenly beginning to lodge (bend to lie along the ground) midway through season; one or more internodes above soil line turning brown, water-soaked, soft and slimy; tissue has foul odor and mushy appearance',
            'cause' => 'Bacterium',
            'comments' => 'Disease is most commonly found in plantations which have overhead irrigation systems or in areas with high rainfall; disease emergence is favored by high temperatures and high humidity.',
            'management' => 'Plow all crop debris into soil in Fall; plant corn in well-draining soil to prevent waterlogged plants.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '122',
            'nome_comum' => 'Goss\'s bacterial blight',
            'nome_cientifico' => 'Clavibacter michiganensis',
            'plagueType_id' => '2',
            'symptoms' => 'Gray or yellow stripes with irregular margins on leaf surfaces; stripes follow leaf veins and contain characteristic dark green to black water-soaked spots; if infection occurs early then plant may become wilted or withered; it is common to find a crystalline residue on leaves caused by dried bacterial exudate',
            'cause' => 'Bacterium',
            'comments' => 'Disease overwinters in diseased crop debris on, or close to, the soil surface; temperatures below 12°C (53.6°F) and above 40°C (104°F) bacterium grows more slowly and may even be killed off.',
            'management' => 'Plant resistant sweetcorn hybrids; rotate crop; plow crop debris into soil immediately after harvest.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '123',
            'nome_comum' => 'Holcus spot',
            'nome_cientifico' => 'Pseudomonas syringae',
            'plagueType_id' => '2',
            'symptoms' => 'Circular or elliptical spots 2-10 mm across near the tips of lower leaves which are dark green and water soaked initially but become cream to tan before turning dry and brown; lesions may have red-brown margins; large lesions may have a yellow halo.',
            'cause' => 'Bacterium',
            'comments' => 'Disease can occur anywhere where corn is grown but is not usually very damaging.',
            'management' => 'Disease is usually not severe but if it does become a problem crops should be rotated and any debris should be plowed into the soil after harvest.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '124',
            'nome_comum' => 'Stewart’s wilt',
            'nome_cientifico' => 'Erwinia stewartii, syn Pantoea stewartii',
            'plagueType_id' => '2',
            'symptoms' => 'The main symptoms are appearance of water soaked lesions initially. As the disease progress the lesions become long and turn pale yellow with irregular margins running in the length. The pathogen may infect the stem and causes stunting, wilting and death of plant.',
            'cause' => 'Bacterium',
            'comments' => 'The pathogen is mainly transmitted by maize flea beetles and to lesser extent by infected seeds.',
            'management' => 'Grow available resistant varieties. Use certified healthy seeds. Remove the crop debris and burn them. Use suitable insecticide to control flea beetle.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '125',
            'nome_comum' => 'Maize dwarf mosaic ',
            'nome_cientifico' => 'Maize dwarf mosaic virus (MDMV)',
            'plagueType_id' => '3',
            'symptoms' => 'Chlorotic spots and streaks on leaves which develop into a mottled or mosaic pattern; susceptible plants may be stunted; ear formation and development cease; mosaic and mottling with no red discoloration are characteristic symptoms of the disease.',
            'cause' => 'Virus',
            'comments' => 'Virus is transmitted by more than 15 different species of aphid and is passed to the plant from the insect in seconds to minutes of feeding; sorghum is also a major host of the virus.',
            'management' => 'Many commercial corn hybrids are highly tolerant of the disease and no control is needed; control aphid populations on plants and remove any Johnson grass growing in the vicinity as it can act as a reservoir for the virus.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '126',
            'nome_comum' => 'Maize Lethal Necrosis Disease (MLND) or Corn Lethal Necrosis (CLN)',
            'nome_cientifico' => 'Maize Chlorotic Mottle Virus (MCMoV) + Sugarcane Mosaic Virus (SCMV)/ Wheat Streak Mosaic Virus (WSMV)/Maize Dwarf Mosaic Virus (MDMV)',
            'plagueType_id' => '3',
            'symptoms' => 'The disease occurs at all stages of crop. The main symptoms includes appearance of chlorotic mottling on leaves which starts from base and extends upwards. Also the leaves shows necrosis at margins which later extends to mid rib and results in drying of entire leaf. The necrosis of young leaves in the whorl causes dead heart symptom. Other symptoms are premature plant death, shortened male inflorescences with few spikes, and/or shortened, malformed, partially filled ears.',
            'cause' => 'Virus',
            'comments' => 'The virus mainly spread by vectors (maize thrips, aphids, rootworms and leaf beetles) and infected seeds. The first report of this disease in Africa continent was in Kenya (2011). And later the disease spreads to other countries like Tanzania, Uganda and South Sudan.',
            'management' => 'Use healthy, disease free certified seeds. Keep the fields free from weeds. Remove the infected plants and burn them. Control vectors by treating seed and/ foliar spray with suitable insecticide. Follow crop rotation with non cereals at least for two seasons. Plant maize only in main rainy season instead of short rainy season. Grow available resistant varieties.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '127',
            'nome_comum' => 'Pythium root rot ',
            'nome_cientifico' => 'Pythium spp.',
            'plagueType_id' => '8',
            'symptoms' => 'Above-ground, plants may be yellow and stunted; roots have obvious lesions and roots are discolored; root cortex will come away when pulled gently, exposing the white stele; can also cause damping-off of seedlings.',
            'cause' => 'Fungus',
            'comments' => 'Fungus overwinters in soil and crop debris; disease emergence is favored by high soil moisture and low temperatures leading to low soil oxygen levels.',
            'management' => 'Control of the disease relies on improving soil drainage or planting corn in areas where the soil is well-draining; systemic fungicides can be used to treat seed prior to planting to protect seedlings from disease.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '128',
            'nome_comum' => 'Slugs',
            'nome_cientifico' => 'Various',
            'plagueType_id' => '8',
            'symptoms' => 'Irregularly shaped holes in leaves and stems; leaves may be shredded; slime trails present on rocks, walkways, soil and plant foliage; several slug species are common garden and field pests; slugs are dark gray to black in color and can range in size from 2.5 to 10 cm (1-4 in).',
            'cause' => 'Mollusc',
            'comments' => 'Slugs prefer moist, shaded habitats and will shelter in weeds or organic trash; adults may deposit eggs in the soil throughout the season; damage to plants can be extensive.',
            'management' => 'Practice good garden sanitation by removing garden trash, weeds and plant debris to promote good air circulation and reduce moist habitat for slugs and snails; handpick slugs at night to decrease population; spread wood ashes or eggshells around plants; attract molluscs by leaving out organic matter such as lettuce or grapefruit skins, destroy any found feeding on lure; sink shallow dishes filled with beer into the soil to attract and drown the molluscs; chemical controls include ferrous phosphate for organic gardens and metaldehyde (e.g. Buggeta) and carbaryl (e.g Sevin bait) for non-organic growers.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '129',
            'nome_comum' => 'Aphids (Corn leaf aphid, Peach Aphid)',
            'nome_cientifico' => 'Rhopalosiphum maidis, Myzus persicae',
            'plagueType_id' => '5',
            'symptoms' => 'Heavy infestations can result in curled leaves and stunted plants; honeydew secretions promote growth of sooty mold; corn leaf aphids are blue-green in color, peach aphids are green-yellow in color; aphids may transmit viruses when feeding.',
            'cause' => 'Insects',
            'comments' => 'Grassy weeds also serve as hosts for corn-leaf aphids; peach aphids have a wide host range.',
            'management' => 'It is rare for aphids to reach levels that are damaging to the plant and no control is generally warranted as insecticide sprays will not prevent transmission of viruses.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '130',
            'nome_comum' => 'Corn earworm',
            'nome_cientifico' => 'Helicoverpa zea',
            'plagueType_id' => '5',
            'symptoms' => 'Feeding damage to leaves, tassel and leaf whorls; preferred feeding site is the ear and insect produces extensive excrement at the tip of the ear; younger larvae feed on silks, severing them from the plant; young caterpillars are cream-white in color with a black head and black hairs; older larvae may be yellow-green to almost black in color with fine white lines along their body and black spots at the base of hairs; eggs are laid singly on both upper and lower leaf surfaces and are initially creamy white but develop a brown-red ring after 24 hours and darken prior to hatching.',
            'cause' => 'Insect',
            'comments' => 'Adult insect is a pale green to tan, medium sized moth; can be a very damaging pests ofcorn; insect overwinters as pupae in the soil.',
            'management' => 'Corn earworms are most problematic on sweet corn varieties and treatment should be applied at egg hatch; monitor plants for eggs and young larvae and also natural enemies that could be damaged by chemicals; Bacillus thuringiensis or Entrust SC may be applied to control insects on organically grown plants; appropriate chemical treatment may be required for control in commercial plantations.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);

           Plague::create([
            'id' => '131',
            'nome_comum' => 'Cutworms (Black cutworm, Variegated cutworm)',
            'nome_cientifico' => 'Agrotis ipsilon, Peridroma saucia',
            'plagueType_id' => '5',
            'symptoms' => 'Stems of young transplants or seedlings may be severed at soil line; if infection occurs later, irregular holes are eaten into the surface of fruits; larvae causing the damage are usually active at night and hide during the day in the soil at the base of the plants or in plant debris of toppled plant; larvae are 2.5–5.0 cm (1–2 in) in length; larvae may exhibit a variety of patterns and coloration but will usually curl up into a C-shape when disturbed.',
            'cause' => 'Insects',
            'comments' => 'Cutworms have a wide host range and attack vegetables including asparagus, bean, cabbage and other crucifers, carrot, celery, corn, lettuce, pea, pepper, potato and tomato.',
            'management' => 'Remove all plant residue from soil after harvest or at least two weeks before planting, this is especially important if the previous crop was another host such as alfalfa, beans or a leguminous cover crop; plastic or foil collars fitted around plant stems to cover the bottom 3 inches above the soil line and extending a couple of inches into the soil can prevent larvae severing plants; hand-pick larvae after dark; spread diatomaceous earth around the base of the plants (this creates a sharp barrier that will cut the insects if they try and crawl over it); apply appropriate insecticides to infested areas of garden or field if not growing organically.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '132',
            'nome_comum' => 'Fall armyworm ',
            'nome_cientifico' => 'Spodoptera frugiperda',
            'plagueType_id' => '5',
            'symptoms' => 'Singular, or closely grouped circular to irregularly shaped holes in foliage; heavy feeding by young larvae leads to skeletonized leaves; shallow, dry wounds on fruit; egg clusters of 50-150 eggs may be present on the leaves; egg clusters are covered in a whitish scale which gives the cluster a cottony or fuzzy appearance; young larvae are pale green to yellow in color while older larvae are generally darker green with a dark and light line running along the side of their body and a pink or yellow underside.

1. Leaf damage is usually characterized by ragged feeding, and moist sawdust-like frass near the funnels and upper leaves of the plant.
2. Leaf damage is usually scattered in rows across the leaf
3. Younger larvae usually eat tissue from one side, leaving the other side in tact. This is what creates windows in the leaf
4. Deep feeding may may destroy maize tassels.
5. Caterpillars enter through the side of the ear and feed on developing kernels',
            'cause' => 'Insects',
            'comments' => 'Insect can go through 3–5 generations a year.',
            'management' => 'Organic methods of controlling the armyworm include biological control by natural enemies which parasitize the larvae and the application of Bacillus thuringiensis; there are chemicals available for commercial control but many that are available for the home garden do not provide adequate control of the larvae.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '133',
            'nome_comum' => 'Flea beetles',
            'nome_cientifico' => 'Chaetocnema pulicaria, Altica spp.',
            'plagueType_id' => '5',
            'symptoms' => 'Small holes or pits in leaves that give the foliage a characteristic “shothole” appearance; young plants and seedlings are particularly susceptible; plant growth may be reduced; if damage is severe the plant may be killed; the pest responsible for the damage is a small (1.5–3.0 mm) dark colored beetle which jumps when disturbed; the beetles are often shiny in appearance.',
            'cause' => 'Insects',
            'comments' => 'Flea beetles may overwinter on nearby weed species, in plant debris or in the soil; insects may go through a second or third generation in one year.',
            'management' => 'In areas where flea beetles are a problem, floating row covers may have to be used prior to the emergence of the beetles to provide a physical barrier to protect young plants; plant seeds early to allow establishment before the beetles become a problem - mature plants are less susceptible to damage; trap crops may provide a measure of control - cruciferous plants are best; application of a thick layer of mulch may help prevent beetles reaching surface; application on diamotecoeus earth or oils such as neem oil are effective control methods for organic growers; application of insecticides containing carbaryl, spinosad, bifenthrin and permethrin can provide adequate control of beetles for up to a week but will need reapplied.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '134',
            'nome_comum' => 'Thrips (Various spp.)',
            'nome_cientifico' => 'Various',
            'plagueType_id' => '5',
            'symptoms' => 'If population is high leaves and may be distorted and curl upwards; edges of leaves may dry up and are speckled with black feces; insects are small (1.5 mm) and slender and best viewed using a hand lens; adult thrips are pale yellow to light brown and the nymphs are smaller and lighter in color.',
            'cause' => 'Insects',
            'comments' => 'May be found on corn at any time during the growing season.',
            'management' => 'Avoid planting next to onions, garlic where very large numbers of thrips can build up; use reflective mulches early in growing season to deter thrips; apply appropriate insecticide if thrips become problematic; young plants will recover from damage and treatment is not often necessary as the thrips are beneficial for controlling mites.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '135',
            'nome_comum' => 'Root knot nematode',
            'nome_cientifico' => 'Meloidogyne incognita, M. arenaria, M. javanica',
            'plagueType_id' => '4',
            'symptoms' => 'Below ground we can see galls on the roots due to female nematode feeding. Above ground the plants are stunted, yellow and patchy in growth. Severely infested plant may die before harvest.',
            'cause' => 'Nematode',
            'comments' => 'The galls are formed by female nematode feeding resulting in formation of giant cells.',
            'management' => 'Deep summer ploughing helps in reducing nematode population. Follow crop rotation with nematode antagonistic plants. Grow resistant varieties. In severely infected field follow soil fumigation with suitable nematicide.',
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


           Plague::create([
            'id' => '136',
            'nome_comum' => 'Spider mites (Various spp.) ',
            'nome_cientifico' => 'Various',
            'plagueType_id' => '8',
            'symptoms' => 'Leaves stippled with yellow; leaves may appear bronzed; webbing on underside of leaves; small kernel size; mites may be visible as tiny moving dots on the webs or underside of leaves, best viewed using a hand lens; usually not spotted until there are visible symptoms on the plant; leaves turn yellow and may drop from plant;',
            'cause' => 'Arachnid',
            'comments' => 'Spider mites thrive in dusty conditions; water-stressed plants are more susceptible to attack.',
            'management' => 'In the home garden, spraying plants with a strong jet of water can help reduce buildup of spider mite populations; if mites become problematic apply insecticidal soap to plants; certain chemical insecticides may actually increase mite populations by killing off natural enemies and promoting mite reproduction.',
           
            'image' => '/img/pragas/onion/Black mold/Black mold.jpeg',
            'language' => 'ING',
            'user_id' => null,
        ]);


         

           //falta pragas doenças oliveira


           //e estas ver em que plantas são

            // Fusarium Wilt
            // Myrothecium leaf spot
            // Soreshin
            // Areolate Mildew
            // Rice Blast 
            // Leaf Scald 
            // Leaf Miner
            // Cercospora Leaf Spot and Rust
            // Cercospora Leaf Spot
            // Bacterial Blight
            // Blister Spot
            // Brown leaf spot
            // Pellicularia koleroga
            // Damping Off
            // Algae
            // Worm
            // Angular Leaf Spot
            // Black Mould
            // Gummosis
            // Seedling Blight
            // Alternaria brown spot
            // Citrus canker
            // Citrus variegated chlorosis
            // Felt
            // Sooty Mold
            // Leprosis
            // Halo Blight
            // Black Spot
            // Mosaic
            // Penicillium
            // Postbloom fruit drop of citrus
            // White-Thread Blight
            // Scab
            // Citrus Greasy Spot
            // Alternaria leaf spot
            // Cowpea Mild Mottle Virus
            // Common bacterial blight
            // Phytotoxicity
            // Hedylepta indicata
            // Target leaf spot
            // Bacterial spot
            // Web blight
            // Charcoal rot
            // Bean golden mosaic
            // Bacterial fruit blotch
            // Nematode
            // Bushy stunt
            // Tropical rust
            // Southern corn rust
            // Phaeosphaeria Leaf Spot
            // Diplodia leaf streak
            // Physoderma brown spot
            // Southern corn leaf blight
            // Copper Phytotoxicity
            // Soybean Mosaic Virus
            // Cercospora blight
            // Downy mildew
            // Rhizoctonia aerial blight
            // Phytophora rot
            // Brown Spot
            // Wheat blast
            // Tan spot
            // Bacterial canker
            // Isariopsis leaf spot
            // Grapevine fanleaf virus
    }
}
 