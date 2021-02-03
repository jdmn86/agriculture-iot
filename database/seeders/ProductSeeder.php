<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
 
         Product::create([
            // 'id' => '1',
            'name' => 'Amifort 5-0-0',
	        'brand'=> 'Agroindustrial',
	        'is_biologic'=> false,
	        'is_liquid'=> true,  //or dry
	        'quantityL'=> '1', //litros
	        'quantityKg'=> '1.12', //kg  
	  		'granulometry'=> null,
	        'typeProduct_id'=> '1',  //fertilizer	        
	        'solubility' => null,	  
	        'composition_id'=> '1',
	        'activeIngredients'=> null,
	        'ph'=> null,

	        'description'=> 'liquid fertilizer for fruits, vegetable and field crops ',	        
	        'aplicationRates'=> 'foliar - 24 -48oz in 100 gallons of water, 1500 - 3500ppm
	        	irrigation - drip: 2-5pint per acre
	        				surface: 3 -7 pint per acre  ', //recommendation
	        'directionsForUse'=> 'to use in cotton, cereals, citrus and fruit trees, vegetables, grape and olive, corn and nursery ', //recommendation doses
	        'storage' => null,
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
	        
        ]);


         Product::create([
            // 'id' => '2',
            'name' => 'seasons 8-0-4',
	        'brand'=> 'hendrikus',
	        'is_biologic'=> false,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null, //litros
	        'quantityKg'=> '9.06', //kg 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '1',  //fertilizer	        
	        'solubility' => null,	  
	        'composition_id'=> '2',
	        'activeIngredients'=> null,
	        'ph'=> null,

	        'description'=> 'micro active with added beneficial microbes and mycorrhizae ',	        
	        'aplicationRates'=> 'turf 2lbs per sq ft  ', //recommendation
	        'directionsForUse'=> 'orchids 1 tbsp per plant  ', //recommendation doses
	        'storage' => 'in cold dry place',
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
        ]);

          Product::create([
            // 'id' => '3',
            'name' => 'liquid copper fungicide',
	        'brand'=> 'southern Ag',
	        'is_biologic'=> false,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null,
	        'quantityKg'=> null, 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '3',  //fungicides 
	        'solubility' => null,	  
	        'composition_id'=> '3',
	        'activeIngredients'=> 'copper ammonium complex',
	        'ph'=> null,

	        'description'=> 'Add 1/2 of the required amount of water to the spray tank and start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. After thoroughly mixing, let stand for at least 5 minutes. If the combination remains mixed or can be remixed readily, it is probably physically compatible. Once compatibility has been proven, use the same procedure for adding required ingredients to the spray tank.THE CROP SAFETY OF ALL POTENTIAL TANK MIXES INCLUDING ADDITIVES AND OTHER PESTICIDES ON ALL CROPS HAS NOT BEEN TESTED. BEFORE APPLYING ANY TANK MIXTURE NOT SPECIFICALLY RECOMMENDED ON THIS LABEL, THE SAFETY TO THE TARGET CROP SHOULD BE CONFIRMED.',	        
	        'aplicationRates'=> null, //recommendation
	        'directionsForUse'=> null, //recommendation doses
	        'storage' => null,
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
        ]);

            Product::create([
            // 'id' => '4',
            'name' => 'liquid copper fungdficide',
	        'brand'=> 'southern Ag',
	        'is_biologic'=> true,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null,
	        'quantityKg'=> '2.0', 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '3',  //fungicides 
	        'solubility' => null,	  
	        'composition_id'=> '3',
	        'activeIngredients'=> 'copper ammonium complex',
	        'ph'=> null,

	        'description'=> 'Add 1/2 of the required amount of water to the spray tank and start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. After thoroughly mixing, let stand for at least 5 minutes. If the combination remains mixed or can be remixed readily, it is probably physically compatible. Once compatibility has been proven, use the same procedure for adding required ingredients to the spray tank.THE CROP SAFETY OF ALL POTENTIAL TANK MIXES INCLUDING ADDITIVES AND OTHER PESTICIDES ON ALL CROPS HAS NOT BEEN TESTED. BEFORE APPLYING ANY TANK MIXTURE NOT SPECIFICALLY RECOMMENDED ON THIS LABEL, THE SAFETY TO THE TARGET CROP SHOULD BE CONFIRMED.',	        
	        'aplicationRates'=> null, //recommendation
	        'directionsForUse'=> null, //recommendation doses
	        'storage' => null,
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
        ]);

             Product::create([
            // 'id' => '5',
            'name' => 'liquiddfsbdfn copper fungdficide',
	        'brand'=> 'southern Ag',
	        'is_biologic'=> true,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null,
	        'quantityKg'=> '2.0', 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '3',  //fungicides 
	        'solubility' => null,	  
	        'composition_id'=> '3',
	        'activeIngredients'=> 'copper ammonium complex',
	        'ph'=> null,

	        'description'=> 'Add 1/2 of the required amount of water to the spray tank and start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. After thoroughly mixing, let stand for at least 5 minutes. If the combination remains mixed or can be remixed readily, it is probably physically compatible. Once compatibility has been proven, use the same procedure for adding required ingredients to the spray tank.THE CROP SAFETY OF ALL POTENTIAL TANK MIXES INCLUDING ADDITIVES AND OTHER PESTICIDES ON ALL CROPS HAS NOT BEEN TESTED. BEFORE APPLYING ANY TANK MIXTURE NOT SPECIFICALLY RECOMMENDED ON THIS LABEL, THE SAFETY TO THE TARGET CROP SHOULD BE CONFIRMED.',	        
	        'aplicationRates'=> null, //recommendation
	        'directionsForUse'=> null, //recommendation doses
	        'storage' => null,
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
        ]);

              Product::create([
            // 'id' => '6',
            'name' => ' test copper fungdficide',
	        'brand'=> 'southern Ag',
	        'is_biologic'=> false,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null,
	        'quantityKg'=> '2.0', 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '3',  //fungicides 
	        'solubility' => null,	  
	        'composition_id'=> '3',
	        'activeIngredients'=> 'copper ammonium complex',
	        'ph'=> null,

	        'description'=> 'Add 1/2 of the required amount of water to the spray tank and start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. After thoroughly mixing, let stand for at least 5 minutes. If the combination remains mixed or can be remixed readily, it is probably physically compatible. Once compatibility has been proven, use the same procedure for adding required ingredients to the spray tank.THE CROP SAFETY OF ALL POTENTIAL TANK MIXES INCLUDING ADDITIVES AND OTHER PESTICIDES ON ALL CROPS HAS NOT BEEN TESTED. BEFORE APPLYING ANY TANK MIXTURE NOT SPECIFICALLY RECOMMENDED ON THIS LABEL, THE SAFETY TO THE TARGET CROP SHOULD BE CONFIRMED.',	        
	        'aplicationRates'=> null, //recommendation
	        'directionsForUse'=> null, //recommendation doses
	        'storage' => null,
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
        ]);
  Product::create([
            // 'id' => '7',
            'name' => ' test copper 7',
	        'brand'=> 'southern Ag',
	        'is_biologic'=> false,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null,
	        'quantityKg'=> '2.0', 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '3',  //fungicides 
	        'solubility' => null,	  
	        'composition_id'=> '3',
	        'activeIngredients'=> 'copper ammonium complex',
	        'ph'=> null,

	        'description'=> 'Add 1/2 of the required amount of water to the spray tank and start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. After thoroughly mixing, let stand for at least 5 minutes. If the combination remains mixed or can be remixed readily, it is probably physically compatible. Once compatibility has been proven, use the same procedure for adding required ingredients to the spray tank.THE CROP SAFETY OF ALL POTENTIAL TANK MIXES INCLUDING ADDITIVES AND OTHER PESTICIDES ON ALL CROPS HAS NOT BEEN TESTED. BEFORE APPLYING ANY TANK MIXTURE NOT SPECIFICALLY RECOMMENDED ON THIS LABEL, THE SAFETY TO THE TARGET CROP SHOULD BE CONFIRMED.',	        
	        'aplicationRates'=> null, //recommendation
	        'directionsForUse'=> null, //recommendation doses
	        'storage' => null,
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
        ]);
        Product::create([
            // 'id' => '8',
            'name' => ' test copper 8',
	        'brand'=> 'southern Ag',
	        'is_biologic'=> false,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null,
	        'quantityKg'=> '2.0', 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '3',  //fungicides 
	        'solubility' => null,	  
	        'composition_id'=> '3',
	        'activeIngredients'=> 'copper ammonium complex',
	        'ph'=> null,

	        'description'=> 'Add 1/2 of the required amount of water to the spray tank and start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. After thoroughly mixing, let stand for at least 5 minutes. If the combination remains mixed or can be remixed readily, it is probably physically compatible. Once compatibility has been proven, use the same procedure for adding required ingredients to the spray tank.THE CROP SAFETY OF ALL POTENTIAL TANK MIXES INCLUDING ADDITIVES AND OTHER PESTICIDES ON ALL CROPS HAS NOT BEEN TESTED. BEFORE APPLYING ANY TANK MIXTURE NOT SPECIFICALLY RECOMMENDED ON THIS LABEL, THE SAFETY TO THE TARGET CROP SHOULD BE CONFIRMED.',	        
	        'aplicationRates'=> null, //recommendation
	        'directionsForUse'=> null, //recommendation doses
	        'storage' => null,
	        'compatibility'=> null,	        
	        'warnings'=> null,
	        'image' => '/img/products/prod1.jpeg',
        ]);
  Product::create([
            // 'id' => '9',
            'name' => ' test copper 9',
	        'brand'=> 'southern Ag',
	        'is_biologic'=> false,
	        'is_liquid'=> false,  //or dry
	        'quantityL'=> null,
	        'quantityKg'=> '2.0', 
	  		'granulometry'=> null,
	        'typeProduct_id'=> '3',  //fungicides 
	        'solubility' => null,	  
	        'composition_id'=> '3',
	        'activeIngredients'=> 'copper ammonium complex',
	        'ph'=> null,

	        'description'=> 'Add 1/2 of the required amount of water to the spray tank and start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. After thoroughly mixing, let stand for at least 5 minutes. If the combination remains mixed or can be remixed readily, it is probably physically compatible. Once compatibility has been proven, use the same procedure for adding required ingredients to the spray tank.THE CROP SAFETY OF ALL POTENTIAL TANK MIXES INCLUDING ADDITIVES AND OTHER PESTICIDES ON ALL CROPS HAS NOT BEEN TESTED. BEFORE APPLYING ANY TANK MIXTURE NOT SPECIFICALLY RECOMMENDED ON THIS LABEL, THE SAFETY TO THE TARGET CROP SHOULD BE CONFIRMED.',	        
	        'aplicationRates'=> ' start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifi', //recommendation
	        'directionsForUse'=> ' start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifi', //recommendation doses
	        'storage' => ' start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifi',
	        'compatibility'=> ' start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifi',	        
	        'warnings'=> ' start the agitator. In general, add tank mix partners in this order: products packaged in water-soluble packaging, wettable powders, and water-dispersible granular products first, next liquid flowables, then emulsifiable concentrates, such as Stratego Fungicide(R), and last, liquid soluble products. Always allow each tank mix partner to become fully dispersed before adding the next product. Continue to provide agitation while adding the remainder of the water. Maintain agitation until all of the mixture has been applied.Note: When using Stratego Fungicide(R) in tank mixtures, all products in water-soluble packaging should be added to the tank before any other tank mix partner, including Stratego Fungicide(R). Allow the water-soluble packaging to completely dissolve and the product(s) to completely disperse before adding any other tank mix partner to the tank.If using Stratego Fungicide(R) in a tank mixture, observe all directions for use, crop/sites, use rates, dilution ratios, precautions, and limitations which appear on the tank mix product label. No label dosage rate should be exceeded, and the most restrictive label precautions and limitations should be followed. This product must not be mixed with any product which prohibits such mixing. Tank mixtures, or other applications of products referenced on this label, are permitted only in those states in which the referenced products are labeled.Stratego Fungicide(R) is compatible with most insecticide, fungicide, and foliar nutrient products. However, the physical compatibility of Stratego(R) with tank mix partners should be tested before use. To determine the physical compatibility of Stratego Fungicide(R) with other products, use a jar test, as described below.Using a quart jar, add the proportionate amounts of the products to 1 qt. of water. Add wettable powders and water-dispersible granular products first, next liquid flowables, then emulsifi',
	        'image' => '/img/products/prod1.jpeg',
        ]);

      
       
    }
}
 