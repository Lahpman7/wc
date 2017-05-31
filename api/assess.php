<?php
session_start();
include 'db.include.php';
$conn = getDatabaseConnection();
// For assessment table + Assessments
// Generates unique id
$time = time();
$randomNum = rand();
$uniqueAssessmnetId = md5($time . $randomNum);

// Timestamp
$date = date("Y-m-d H:i:s", time());
$phpdate = strtotime($date);

if(isset($_POST['redAssessReturn']) || isset($_POST['whiteAssessReturn']) ){
    if(isset($_POST['redAssessReturn'])){
        // For Red Assessment
        $primary_color = (int)$_POST['primary_color'];
        $primary_color = $conn->quote($primary_color);
        $secondary_color =  (int)$_POST['secondary_color'];
        $secondary_color = $conn->quote($secondary_color);
         //Red  Fruit Aromas
        $red_fruits_level = (int)$_POST['red_fruits_level'];
        $red_fruits_level = $conn->quote($red_fruits_level);
        $red_aroma = $_POST['red_aromas'];
        $red_aroma = $conn->quote($red_aroma);
        $red_cherry = 0;
        $pomegranate = 0;
        $cranberry = 0;
        $raspberry = 0;
        $red_currant = 0;
        $red_fruit_other = "";

        $red_aroma = trim($red_aroma);
        switch($red_aroma){
            case "Red Cherry": $red_cherry = 1;
                break;
            case "Pomegranate": $pomegranate = 1;
                break;
            case "Cranberry": $cranberry = 1;
                break;
            case "Raspberry": $raspberry = 1;
                break;
            case "Red Currant": $red_currant = 1;
                break;
        }

        // Black Fruit Aromas
        $black_fruit_level = (int)$_POST['black_fruit_level'];
        $black_fruit_level = $conn->quote($black_fruit_level);
        $black_aroma = $_POST['black_aromas'];
        $black_aroma = $conn->quote($black_aroma);
        $black_berry = 0;
        $black_currant = 0;
        $raisin = 0;

        $date = 0;
        $fig = 0;
        $black_fruit_other = "";

        $black_aroma = trim($black_aroma);
        switch($black_aroma){
            case "Black Cherry": $black_berry = 1;
                break;
            case "Black Currant": $black_currant = 1;
                break;
            case "Raisin": $raisin = 1;
                break;
            case "Date": $date = 1;
                break;
            case "Fig": $fig = 1;
                break;
        }

        // Blue Fruit Aromas
        $blue_fruit_level = (int)$_POST['blue_fruit_level'];
        $blue_fruit_level = $conn->quote($blue_fruit_level);

        $blue_aroma = $_POST['blue_aromas'];
        $blue_aroma = $conn->quote($blue_aroma);

        $blueberry = 0;
        $dried_blueberry = 0;
        $plum = 0;
        $plum_skin = 0;
        $blue_fruit_other = "";

        $blue_aroma = trim($blue_aroma);
        switch($blue_aroma){
            case "Blueberry": $blueberry= 1;
                break;
            case "Dried Blueberry": $dried_blueberry = 1;
                break;
            case "Plum": $plum = 1;
                break;
            case "Plum Skin": $plum_skin = 1;
                break;
        }

        $fruit_type = (int)$_POST['fruit_type'];
        $fruit_type = $conn->quote($fruit_type);

        // Flower Aromas
        $flowers_level = (int)$_POST['flowers_level'];
        $flowers_level = $conn->quote($flowers_level);

        $flower_aroma = $_POST['flowers_aromas'];
        $flower_aroma = $conn->quote($flower_aroma);

        $rose = 0;
        $violet = 0;
        $lavender = 0;
        $dried_flowers = 0;
        $potpourri = 0;
        $flowers_other = "";

        $flower_aroma = trim($flower_aroma);
        switch($flower_aroma){
            case "Rose": $rose = 1;
                break;
            case "Violet": $violet = 1;
                break;
            case "Lavendar": $lavender = 1;
                break;
            case "Dried Flowers": $dried_flowers = 1;
                break;
            case "Potpourri": $potpourri = 1;
                break;
        }

        // Herb Aromas
        $herbs_level = (int)$_POST['herbs_level'];
        $herbs_level = $conn->quote($herbs_level);

        $herb_aroma = $_POST['herbs_aromas'];
        $herb_aroma = $conn->quote($herb_aroma);
        $fresh_herbs = 0;
        $dried_herbs = 0;
        $tomatoe_leaf = 0;
        $basil = 0;
        $oregeno = 0;
        $fennel = 0;
        $herbs_other = "";

        $herb_aroma = trim($herb_aroma);
        switch($herb_aroma){
            case "Fresh Herbs": $fresh_herbs = 1;
                break;
            case "Tomato Leaf": $tomatoe_leaf = 1;
                break;
            case "Basil": $basil = 1;
                break;
            case "Oregano": $oregeno = 1;
                break;
            case "Fennel": $fennel = 1;
                break;
        }

        // Vegetal Aromas
        $vegetal_level = (int)$_POST['vegetal_level'];
        $vegetal_level = $conn->quote($vegetal_level);
        $vegetal_aroma = $_POST['vegetal_aromas'];
        $vegetal_aroma = $conn->quote($vegetal_aroma);
        $green_bell_pepper_capsicum = 0;
        $vegetal_fresh_herbs = 0;
        $vegetal_dried_herbs = 0;
        $stem_whole_cluster = 0;
        $vegetal_other = "";

        $vegetal_aroma = trim($vegetal_aroma);
        switch($vegetal_aroma){
            case "Green Bell Pepper Capsicum": $green_bell_pepper_capsicum = 1;
                break;
            case "Fresh Herbs": $fresh_herbs = 1;
                break;
            case "Dried Herbs": $dried_herbs = 1;
                break;
            case "Stem Whole Cluster": $stem_whole_cluster = 1;
                break;
        }

        // Mint Aromas
        $mint_eucalyptus_level = (int)$_POST['mint_eucalyptus_level'];
        $mint_eucalyptus_level = $conn->quote($mint_eucalyptus_level);

        $mint_eucalyptus_aroma = $_POST['mint_eucalyptus_aromas'];
        $mint_eucalyptus_aroma = $conn->quote($mint_eucalyptus_aroma);

        $mint = 0;
        $eucalyptus = 0;
        $menthol = 0;
        $mint_eucalyptus_other = "";

        $mint_eucalyptus_aroma = trim($mint_eucalyptus_aroma);
        switch($mint_eucalyptus_aroma){
            case "Mint": $mint = 1;
                break;
            case "Eucalyptus": $eucalyptus = 1;
                break;
            case "Menthol": $menthol = 1;
                break;
        }

        // Spice Pepper Aromas
        $pepper_spice_level = (int)$_POST['pepper_spice_level'];
        $pepper_spice_level = $conn->quote($pepper_spice_level);

        $pepper_spice_aroma = $_POST['pepper_spice_aromas'];
        $pepper_spice_aroma = $conn->quote($pepper_spice_aroma);

        $black_peppercorn = 0;
        $green_peppercorn = 0;
        $cinnamon = 0;
        $baking_spice = 0;
        $hard_spice = 0;
        $anise_licorice = 0;
        $pepper_spice_other = "";

        $pepper_spice_aroma = trim($pepper_spice_aroma);
        switch($pepper_spice_aroma){
            case "Black Peppercorn": $black_peppercorn = 1;
                break;
            case "Green Peppercorn": $green_peppercorn = 1;
                break;
            case "Cinnamon": $cinnamon = 1;
                break;
            case "Baking Spice": $baking_spice = 1;
                break;
            case "Hard Spice": $hard_spice = 1;
                break;
            case "Anise Licorice": $anise_licorice = 1;
                break;
        }

        // Cocoa Coffee Aromas
        $cocoa_coffee_level = (int)$_POST['cocoa_coffee_level'];
        $cocoa_coffee_level = $conn->quote($cocoa_coffee_level);

        $cocoa_coffee_aroma = $_POST['cocoa_coffee_aromas'];
        $cocoa_coffee_aroma = $conn->quote($cocoa_coffee_aroma);

        $milk_chocolate = 0;
        $dark_chocolate = 0;
        $cocoa_powder = 0;
        $mocha = 0;
        $espresso = 0;
        $coffee_grounds = 0;
        $cocoa_coffee_other = "";

        $cocoa_coffee_aroma = trim($cocoa_coffee_aroma);
        switch($cocoa_coffee_aroma){
            case "Milk Chocolate": $milk_chocolate = 1;
                break;
            case "Dark Chocolate": $dark_chocolate = 1;
                break;
            case "Cocoa Powder": $cocoa_powder = 1;
                break;
            case "Mocha": $mocha = 1;
                break;
            case "Espresso": $espresso = 1;
                break;
            case "Coffee Grounds": $coffee_grounds = 1;
                break;
        }

        // Meat Leather Aromas
        $meat_leather_level = (int)$_POST['meat_leather_level'];
        $meat_leather_level = $conn->quote($meat_leather_level);

        $meat_leather_aroma = $_POST['meat_leather_aromas'];
        $meat_leather_aroma = $conn->quote($meat_leather_aroma);

        $meat = 0;
        $grilled_meat = 0;
        $beef_jerkey = 0;
        $wet_leather = 0;
        $dried_leather = 0;
        $meat_leather_other = "";

        $meat_leather_aroma = trim($meat_leather_aroma);
        switch($meat_leather_aroma){
            case "Meat": $meat = 1;
                break;
            case "Grilled Meat": $grilled_meat = 1;
                break;
            case "Beef Jerkey": $beef_jerkey = 1;
                break;
            case "Wet Leather": $wet_leather = 1;
                break;
            case "Dried Leather": $dried_leather = 1;
                break;
        }

        // Tobacco Tar Aromas
        $tobacco_tar_level = (int)$_POST['tobacco_tar_level'];
        $tobacco_tar_level = $conn->quote($tobacco_tar_level);

        $tobacco_tar_aroma = $_POST['tobacco_tar_aromas'];
        $tobacco_tar_aroma = $conn->quote($tobacco_tar_aroma);

        $wet_tobacco = 0;
        $dried_tobacco = 0;
        $tar = 0;
        $ashtray = 0;
        $tobacco_tar_other = "";

        $tobacco_tar_aroma = trim($tobacco_tar_aroma);
        switch($tobacco_tar_aroma){
            case "Wet Tabacco": $wet_tobacco = 1;
                break;
            case "Dried Tabacco": $dried_tobacco = 1;
                break;
            case "Tar": $tar = 1;
                break;
            case "Ashtray": $ashtray = 1;
                break;
        }

        // Earth Aromas
        $earth_leaves_mushrooms_level = (int)$_POST['earth_leaves_mushrooms_level'];
        $earth_leaves_mushrooms_level = $conn->quote($earth_leaves_mushrooms_level);

        $earth_leaves_mushrooms_aroma = $_POST['earth_leaves_mushrooms_aromas'];
        $earth_leaves_mushrooms_aroma = $conn->quote($earth_leaves_mushrooms_aroma);

        $forest_floor = 0;
        $compost = 0;
        $mushrooms = 0;
        $potting_soil = 0;
        $barnyard = 0;
        $wet_leaves = 0;
        $dried_leaves = 0;
        $earth_leaves_mushrooms_other = "";

        $earth_leaves_mushrooms_aroma = trim($earth_leaves_mushrooms_aroma);
        switch($earth_leaves_mushrooms_aroma){
            case "Forest Floor": $forest_floor = 1;
                break;
            case "Compost": $compost = 1;
                break;
            case "Mushrooms": $mushrooms = 1;
                break;
            case "Potting Soil": $potting_soil = 1;
                break;
            case "Barnyard": $barnyard = 1;
                break;
            case "Wet Leaves": $wet_leaves = 1;
                break;
            case "Dried Leaves": $dried_leaves = 1;
                break;
        }

        // Mineral Aromas
        $mineral_stone_sulfur_level = (int)$_POST['mineral_stone_sulfur_level'];
        $mineral_stone_sulfur_level = $conn->quote($mineral_stone_sulfur_level);

        $mineral_stone_sulfur_aroma = $_POST['mineral_stone_sulfur_aromas'];
        $mineral_stone_sulfur_aroma = $conn->quote($mineral_stone_sulfur_aroma);

        $sulfur = 0;
        $slate_petrol = 0;
        $metallic = 0;
        $flit = 0;
        $dust = 0;
        $chalk = 0;
        $limestone = 0;
        $volcanic = 0;
        $smokey = 0;
        $pencil_lead = 0;
        $mineral_stone_sulfur_other = "";

        $mineral_stone_sulfur_aroma = trim($mineral_stone_sulfur_aroma);
        switch($mineral_stone_sulfur_aroma){
            case "Sulfur": $sulfur = 1;
                break;
            case "Slate Petrol": $slate_petrol = 1;
                break;
            case "Metallic": $metallic = 1;
                break;
            case "Flit": $flit = 1;
                break;
            case "Dust": $dust = 1;
                break;
            case "Chalk": $chalk = 1;
                break;
            case "Limestone": $limestone = 1;
                break;
            case "Volcanic": $volcanic= 1;
                break;
            case "Smokey": $smokey = 1;
                break;
            case "Pencil Lead": $pencil_lead = 1;
                break;
        }

        // Oak Vanilla Aromas
        $oak_vanilla_smoke_coconut_level = (int)$_POST['oak_vanilla_smoke_coconut_level'];
        $oak_vanilla_smoke_coconut_level = $conn->quote($oak_vanilla_smoke_coconut_level);

        $oak_vanilla_smoke_coconut_aroma = $_POST['oak_vanilla_smoke_coconut_aromas'];
        $oak_vanilla_smoke_coconut_aroma = $conn->quote($oak_vanilla_smoke_coconut_aroma);

        $vanilla = 0;
        $maple = 0;
        $light_toast = 0;
        $heavy_toast = 0;
        $sawdust = 0;
        $sandalwood = 0;
        $pencil_shavings = 0;
        $oak_vanilla_smoke_coconut_other = "";

        $oak_vanilla_smoke_coconut_aroma = trim($oak_vanilla_smoke_coconut_aroma);
        switch($oak_vanilla_smoke_coconut_aroma){
            case "Vanilla": $vanilla = 1;
                break;
            case "Maple": $maple = 1;
                break;
            case "Light Toast": $light_toast = 1;
                break;
            case "Heavy Toast": $heavy_toast = 1;
                break;
            case "Sawdust": $sawdust = 1;
                break;
            case "Sandlewood": $sandalwood = 1;
                break;
            case "Pencil Shavings": $pencil_shavings = 1;
                break;
        }

        // Structure
        $sweetness = (int)$_POST['sweetness'];
        $sweetness = $conn->quote($sweetness);

        $alcohol = (int)$_POST['alcohol'];
        $alcohol = $conn->quote($alcohol);

        $tannin = (int)$_POST['tannin'];
        $tannin = $conn->quote($tannin);

        $bitter = (int)$_POST['bitter'];
        $bitter = $conn->quote($bitter);

        $balanced = (int)$_POST['balanced'];
        $balanced = $conn->quote($balanced);

        $length = (int)$_POST['length'];
        $length = $conn->quote($length);

        $complexity = (int)$_POST['complexity'];
        $complexity = $conn->quote($complexity);

        // Rating
        $quality_for_price = (int)$_POST['quality_for_price'];
        $quality_for_price = $conn->quote($quality_for_price);

        $quality_for_price_rate = (int)$_POST['quality_for_price_rate'];
        $quality_for_price_rate = $conn->quote($quality_for_price_rate);

        $sql = "INSERT INTO red_taste_assessment
                (taste_id, primary_color, secondary_color, red_fruits_level, red_cherry, pomegranate,
                cranberry, raspberry, red_currant, red_fruit_other, black_fruit_level, black_berry,
                black_currant, raisin, date, fig, black_fruit_other, blue_fruit_level, blueberry,
                dried_blueberry, plum, plum_skin, blue_fruit_other, fruit_type, flowers_level, rose,
                violet, lavender, dried_flowers, potpourri, flowers_other, herbs_level, fresh_herbs,
                dried_herbs, tomatoe_leaf, basil, oregeno, fennel, herbs_other, vegetal_level,
                green_bell_pepper_capsicum, vegetal_fresh_herbs, vegetal_dried_herbs, stem_whole_cluster,
                vegetal_other, mint_eucalyptus_level, mint, eucalyptus, menthol, mint_eucalyptus_other,
                pepper_spice_level, black_peppercorn, green_peppercorn, cinnamon, baking_spice, hard_spice,
                anise_licorice, pepper_spice_other, cocoa_coffee_level, milk_chocolate, dark_chocolate,
                cocoa_powder, mocha, espresso, coffee_grounds, cocoa_coffee_other, meat_leather_level,
                meat, grilled_meat, beef_jerkey, wet_leather, dried_leather, meat_leather_other,
                tobacco_tar_level, wet_tobacco, dried_tobacco, tar, ashtray, tobacco_tar_other,
                earth_leaves_mushrooms_level, forest_floor, compost, mushrooms, potting_soil, barnyard,
                wet_leaves, dried_leaves, earth_leaves_mushrooms_other, mineral_stone_sulfur_level, sulfur,
                slate_petrol, metallic, flit, dust, chalk, limestone, volcanic, smokey, pencil_lead,
                mineral_stone_sulfur_other, oak_vanilla_smoke_coconut_level, vanilla, maple, light_toast,
                heavy_toast, sawdust, sandalwood, pencil_shavings, oak_vanilla_smoke_coconut_other,
                sweetness, alcohol, tannin, bitter, balanced, length, complexity,
                quality_for_price, quality_for_price_rate)
            VALUES
                ('$uniqueAssessmnetId', '$primary_color', '$secondary_color', '$red_fruits_level',
                '$red_cherry', '$pomegranate','$cranberry', '$raspberry', '$red_currant',
                '$red_fruit_other',

                '$black_fruit_level', '$black_berry', '$black_currant', '$raisin',
                '$date', '$fig', '$black_fruit_other',

                '$blue_fruit_level', '$blueberry', '$dried_blueberry', '$plum',
                '$plum_skin','$blue_fruit_other','$fruit_type',

                '$flowers_level', '$rose', '$violet', '$lavender', '$dried_flowers',
                'potpourri', '$flowers_other',

                '$herbs_level', '$fresh_herbs', '$dried_herbs', '$tomatoe_leaf', '$basil',
                '$oregeno', '$fennel', '$herbs_other',

                '$vegetal_level', '$green_bell_pepper_capsicum', '$vegetal_fresh_herbs',
                '$vegetal_dried_herbs', '$stem_whole_cluster', '$vegetal_other',

                '$mint_eucalyptus_level', '$mint', '$eucalyptus', '$menthol',
                '$mint_eucalyptus_other',

                '$pepper_spice_level', '$black_peppercorn', '$green_peppercorn', '$cinnamon',
                '$baking_spice', '$hard_spice', '$anise_licorice', '$pepper_spice_other',

                '$cocoa_coffee_level', '$milk_chocolate', '$dark_chocolate', '$cocoa_powder',
                '$mocha', '$espresso', '$coffee_grounds', '$cocoa_coffee_other',

                '$meat_leather_level', '$meat', '$grilled_meat', '$beef_jerkey',
                '$wet_leather', '$dried_leather', '$meat_leather_other',

                '$tobacco_tar_level','$wet_tobacco', '$dried_tobacco', '$tar', '$ashtray',
                '$tobacco_tar_other',

                '$earth_leaves_mushrooms_level', '$forest_floor', '$compost', '$mushrooms',
                '$potting_soil', '$barnyard', '$wet_leaves', '$dried_leaves',
                '$earth_leaves_mushrooms_other',

                '$mineral_stone_sulfur_level', '$sulfur', '$slate_petrol', '$metallic',
                '$flit', '$dust', '$chalk', '$limestone',
                '$volcanic', '$smokey', '$pencil_lead', '$mineral_stone_sulfur_other',

                '$oak_vanilla_smoke_coconut_level', '$vanilla', '$maple', '$light_toast',
                '$heavy_toast', '$sawdust', '$sandalwood', '$pencil_shavings',

                '$oak_vanilla_smoke_coconut_other', '$sweetness', '$alcohol', '$tannin',
                '$bitter', '$balanced', '$length', '$complexity',

                '$quality_for_price','$quality_for_price_rate');";

            $statement = $conn->prepare($sql);
            $statement->execute();
            $log = "(Red assessment) Date: " . $date . " Assessment Id: " . $uniqueAssessmnetId;
            error_log($log);
    }else{
        // White wine assessment
        $primary_color = (int)$_POST['primary_color'];
        $primary_color = $conn->quote($primary_color);

        $secondary_color = (int)$_POST['secondary_color'];
        $secondary_color = $conn->quote($secondary_color);

        // Apple Pear
        $apple_pear_level = (int)$_POST['apple_pear_level'];
        $apple_pear_level = $conn->quote($apple_pear_level);

        $apple_pear_aroma = $_POST['apple_pear_aromas'];
        $apple_pear_aroma = $conn->quote($apple_pear_aroma);

        $green_apple = 0;
        $yellow_apple = 0;
        $red_apple = 0;
        $baked_apple = 0;
        $apple_pear_other = "";

        $apple_pear_aroma= trim($apple_pear_aroma);
        switch($apple_pear_aroma){
            case "Green Apple": $green_apple = 1;
                break;
            case "Yellow Apple": $yellow_apple = 1;
                break;
            case "Red Apple": $red_apple = 1;
                break;
            case "Baked Apple": $baked_apple = 1;
                break;
        }

        // Citrus
        $citrus_level = (int)$_POST['citrus_level'];
        $citrus_level = $conn->quote($citrus_level);

        $citrus_aroma = $_POST['citrus_aromas'];
        $citrus_aroma = $conn->quote($citrus_aroma);

        $lemon = 0;
        $myer_lemon = 0;
        $lime = 0;
        $orange = 0;
        $dried_orange_peel = 0;
        $grapefruit = 0;
        $cirtus_other = "";

        $citrus_aroma = trim($citrus_aroma);
        switch($citrus_aroma){
            case "Lemon" : $lemon = 1;
                break;
            case "Myer Lemon": $myer_lemon = 1;
                break;
            case "Lime": $lime = 1;
                break;
            case "Orange": $orange = 1;
                break;
            case "Dried Orange Peel": $dried_orange_peel = 1;
                break;
            case "Grapefruit": $grapefruit = 1;
                break;
        }

        // Stone
        $stone_level = (int)$_POST['stone_level'];
        $stone_level = $conn->quote($stone_level);

        $stone_aroma = $_POST['stone_aromas'];
        $stone_aroma = $conn->quote($stone_aroma);

        $white_peach = 0;
        $yellow_peach = 0;
        $apricot = 0;
        $apricot_kernal = 0;
        $nectarine = 0;
        $stone_other = "";

        $stone_aroma = trim($stone_aroma);
        switch($stone_aroma){
            case "White Peach": $white_peach = 1;
                break;
            case "Yellow Peach": $yellow_peach = 1;
                break;
            case "Apricot": $apricot = 1;
                break;
            case "Apricot Kernal": $apricot_kernal = 1;
                break;
            case "Nectarine": $nectarine = 1;
                break;
        }

        // Tropical
        $tropical_melon_level = (int)$_POST['tropical_melon_level'];
        $tropical_melon_level = $conn->quote($tropical_melon_level);

        $tropical_melon_aroma = $_POST['tropical_melon_aromas'];
        $tropical_melon_aroma = $conn->quote($tropical_melon_aroma);

        $passion_fruit = 0;
        $pineapple = 0;
        $kiwi = 0;
        $lychee = 0;
        $mango = 0;
        $banana = 0;
        $tropical_melon_other = "";

        $tropical_melon_aroma = trim($tropical_melon_aroma);
        switch($tropical_melon_aroma){
            case "Passion Fruit": $passion_fruit = 1;
                break;
            case "Pineapple": $pineapple = 1;
                break;
            case "kiwi": $kiwi = 1;
                break;
            case "Lychee": $lychee = 1;
                break;
            case "Mango": $mango = 1;
                break;
            case "Banana": $banana = 1;
                break;
        }

        // Fruit type
        $fruit_type = (int)$_POST['fruit_type'];
        $fruit_type = $conn->quote($fruit_type);

        // Flower
        $flower_level = (int)$_POST['flower_level'];
        $flower_level = $conn->quote($flower_level);

        $flower_aroma = $_POST['flowers_aromas'];
        $flower_aroma = $conn->quote($flower_aroma);

        $white_flowers = 0;
        $yellow_flowers = 0;
        $dried_flowers = 0;
        $honeysuckle = 0;
        $orange_blossom = 0;
        $flower_other = "";

        $flower_aroma = trim($flower_aroma);
        switch($flower_aroma){
            case "White Flowers": $white_flowers = 1;
                break;
            case "Yellow Flowers": $yellow_flowers = 1;
                break;
            case "Dried Flowers": $dried_flowers = 1;
                break;
            case "Honeysuckle": $honeysuckle = 1;
                break;
            case "Orange Blossom": $orange_blossom = 1;
                break;
        }

        // Herb
        $herb_level = (int)$_POST['herbs_level'];
        $herb_level = $conn->quote($herb_level);

        $herb_aroma = $_POST['herbs_aromas'];
        $herb_aroma = $conn->quote($herb_aroma);

        $dried_herbs = 0;
        $fresh_herbs = 0;
        $herbs_other = "";

        $herb_aroma = trim($herb_aroma);
        switch($herb_aroma){
            case "Dried Herbs": $dried_herbs = 1;
                break;
            case "Fresh Herbs": $fresh_herbs = 1;
                break;
        }

        // Vegetal
        $vegetal_level = (int)$_POST['vegetal_level'];
        $vegetal_level = $conn->quote($vegetal_level);

        $vegetal_aroma = $_POST['vegetal_aromas'];
        $vegetal_aroma = $conn->quote($vegetal_aroma);

        $radish = 0;
        $jalapeno = 0;
        $green_bell_pepper = 0;
        $vegetal_cut_grass = 0;
        $vegetal_other = "";

         $vegetal_aroma = trim($vegetal_aroma);
         switch($vegetal_aroma){
            case "Radish": $radish = 1;
                break;
            case "Jalapeno": $jalapeno = 1;
                break;
            case "Green Bell Pepper": $green_bell_pepper = 1;
                break;
            case "Vegetal Cut Grass": $vegetal_cut_grass = 1;
                break;
        }

        // Oxidative
        $oxidative_level = (int)$_POST['oxidative_level'];
        $oxidative_level = $conn->quote($oxidative_level);

        $oxidative_aroma = $_POST['oxidative_aromas'];
        $oxidative_aroma = $conn->quote($oxidative_aroma);

        $baked_fruit = 0;
        $brown_fruit = 0;
        $leather = 0;
        $ashtray = 0;
        $oxidative_other = "";

        $oxidative_aroma = trim($oxidative_aroma);
        switch($oxidative_aroma){
            case "Baked Fruit": $baked_fruit = 1;
                break;
            case "Brown Fruit": $brown_fruit = 1;
                break;
            case "Leather": $leather = 1;
                break;
            case "Ashtray": $ashtray = 1;
                break;
        }

        // Yeast Bread Dough
        $yeast_bread_dough_level = (int)$_POST['yeast_bread_dough_level'];
        $yeast_bread_dough_level = $conn->quote($yeast_bread_dough_level);

        $yeast_bread_dough_aroma = $_POST['yeast_bread_dough_aromas'];
        $yeast_bread_dough_aroma = $conn->quote($yeast_bread_dough_aroma);

        $brioche = 0;
        $almond = 0;
        $fresh_dough = 0;
        $hazelnut = 0;
        $yeast = 0;
        $yeast_bread_dough_other = "";

        $yeast_bread_dough_aroma = trim($yeast_bread_dough_aroma);
        switch($yeast_bread_dough_aroma){
            case "Brioche": $brioche= 1;
                break;
            case "Almond": $almond = 1;
                break;
            case "Fresh Dough": $fresh_dough = 1;
                break;
            case "Hazelnut": $hazelnut = 1;
                break;
            case "Yeast": $yeast = 1;
                break;
        }

        // Butter Cream
        $ml_butter_cream_level = (int)$_POST['ml_butter_cream_level'];
        $ml_butter_cream_level = $conn->quote($ml_butter_cream_level);

        // Earth Leaves
        $earth_leaves_mushrooms_level = (int)$_POST['earth_leaves_mushrooms_level'];
        $earth_leaves_mushrooms_level = $conn->quote($earth_leaves_mushrooms_level);

        $earth_leaves_mushrooms_aroma = $_POST['earth_leaves_mushrooms_aromas'];
        $earth_leaves_mushrooms_aroma = $conn->quote($earth_leaves_mushrooms_aroma);

        $straw_hay = 0;
        $earth_leaves_mushrooms_cut_grass = 0;
        $earth_leaves_mushrooms_other = "";

        $earth_leaves_mushrooms_aroma = trim($earth_leaves_mushrooms_aroma);
        switch($earth_leaves_mushrooms_aroma){
            case "Straw Hay": $straw_hay = 1;
                break;
            case "Cut Grass": $earth_leaves_mushrooms_cut_grass = 1;
                break;
        }
        // Stone
        $mineral_stone_sulfur_level = (int)$_POST['mineral_stone_sulfur_level'];
        $mineral_stone_sulfur_level = $conn->quote($mineral_stone_sulfur_level);

        $mineral_stone_sulfur_aroma = $_POST['mineral_stone_sulfur_aromas'];
        $mineral_stone_sulfur_aroma = $conn->quote($mineral_stone_sulfur_aroma);

        $sulfur = 0;
        $state_petrol = 0;
        $metallic = 0;
        $flit = 0;
        $dust = 0;
        $chalk = 0;
        $limestone = 0;
        $volcanic = 0;
        $smokey = 0;
        $mineral_stone_sulfur_other = "";

        $mineral_stone_sulfur_aroma = trim($mineral_stone_sulfur_aroma);
        switch($mineral_stone_sulfur_aroma){
            case "Sulfur": $sulfur = 1;
                break;
            case "State Petrol": $state_petrol = 1;
                break;
            case "Metallic": $metallic = 1;
                break;
            case "Flit": $flit = 1;
                break;
            case "Dust": $dust = 1;
                break;
            case "Chalk": $chalk = 1;
                break;
            case "Limestone": $limestone = 1;
                break;
            case "Volcanic": $volcanic = 1;
                break;
            case "Smokey": $smokey = 1;
                break;
        }

        // Oak Vanilla Toast
        $oak_vanilla_toast_level = (int)$_POST['oak_vanilla_toast_level'];
        $oak_vanilla_toast_level = $conn->quote($oak_vanilla_toast_level);

        $oak_vanilla_toast_aroma = $_POST['oak_vanilla_smoke_coconut_aromas'];
        $oak_vanilla_toast_aroma = $conn->quote($oak_vanilla_toast_aroma);

        $vanilla = 0;
        $maple = 0;
        $light_toast = 0;
        $heavy_toast = 0;
        $sawdust = 0;
        $oak_vanilla_toast_other = "";

        $oak_vanilla_toast_aroma = trim($oak_vanilla_toast_aroma);
        switch($oak_vanilla_toast_aroma){
            case "Vanilla": $vanilla = 1;
                break;
            case "Maple": $maple = 1;
                break;
            case "Light Toast": $light_toast = 1;
                break;
            case "Heavy Toast": $heavy_toast = 1;
                break;
            case "Sawdust": $sawdust = 1;
                break;
        }

        // Structure
        $sweetness = (int)$_POST['sweetness'];
        $sweetness = $conn->quote($sweetness);

        $acid = (int)$_POST['acid'];
        $acid = $conn->quote($acid);

        $alcohol = (int)$_POST['alcohol'];
        $alcohol = $conn->quote($alcohol);

        $bitter = (int)$_POST['bitter'];
        $bitter = $conn->quote($bitter);

        $balanced = (int)$_POST['balanced'];
        $balanced = $conn->quote($balanced);

        $length = (int)$_POST['length'];
        $length = $conn->quote($length);

        $complexity = (int)$_POST['complexity'];
        $complexity = $conn->quote($complexity);

        $quality_for_price = 0;
        $quality_for_price_rate = 0;

        $quality_for_price = (int)$_POST['quality_for_price'];
        $quality_for_price = $conn->quote($quality_for_price);

        $quality_for_price_rate = (int)$_POST['quality_for_price_rate'];
        $quality_for_price_rate = $conn->quote($quality_for_price_rate);

        $sql = "INSERT INTO white_taste_assessment
            (taste_id, primary_color, secondary_color, apple_pear_level,
            green_apple, yellow_apple, red_apple, baked_apple,
            apple_pear_other, citrus_level, lemon, myer_lemon,
            lime, orange, dried_orange_peel, grapefruit,
            cirtus_other, stone_level, white_peach, yellow_peach,
            apricot, apricot_kernal, nectarine, stone_other,
            tropical_melon_level, passion_fruit, pineapple,
            kiwi, lychee, mango, banana, tropical_melon_other,
            fruit_type, flower_level, white_flowers, yellow_flowers,
            dried_flowers, honeysuckle, orange_blossom, flower_other,
            herb_level, dried_herbs, fresh_herbs, herbs_other,
            vegetal_level, radish, jalapeno, green_bell_pepper,
            vegetal_cut_grass, vegetal_other, oxidative_level, baked_fruit,
            brown_fruit, leather, ashtray, oxidative_other,
            yeast_bread_dough_level, brioche, almond, fresh_dough,
            hazelnut, yeast, yeast_bread_dough_other, ml_butter_cream_level,
            earth_leaves_mushrooms_level, straw_hay,
            earth_leaves_mushrooms_cut_grass,earth_leaves_mushrooms_other,
            mineral_stone_sulfur_level, sulfur, state_petrol, metallic,
            flit, dust, chalk, limestone, volcanic,  smokey,
            mineral_stone_sulfur_other, oak_vanilla_toast_level, vanilla, maple,
            light_toast, heavy_toast, sawdust, oak_vanilla_toast_other, sweetness, acid, alcohol, bitter,
            balanced, length, complexity, quality_for_price, quality_for_price_rate)
           VALUES
            ('$uniqueAssessmnetId', '$primary_color', '$secondary_color', '$apple_pear_level',
            '$green_apple', '$yellow_apple', '$red_apple', '$baked_apple',
            '$apple_pear_other',

            '$citrus_level','$lemon','$myer_lemon',
            '$lime', '$orange', '$dried_orange_peel', '$grapefruit',
            '$cirtus_other',

            '$stone_level', '$white_peach', '$yellow_peach',
            '$apricot', '$apricot_kernal', '$nectarine', '$stone_other',

            '$tropical_melon_level', '$passion_fruit', '$pineapple',
            '$kiwi', '$lychee', '$mango', '$banana', '$tropical_melon_other',

            '$fruit_type', '$flower_level', '$white_flowers', '$yellow_flowers',
            '$dried_flowers', '$honeysuckle', '$orange_blossom', '$flower_other',

            '$herb_level', '$dried_herbs', '$fresh_herbs', '$herbs_other',

            '$vegetal_level', '$radish', '$jalapeno', '$green_bell_pepper',
            '$vegetal_cut_grass', '$vegetal_other',

            '$oxidative_level', '$baked_fruit',
            '$brown_fruit', '$leather', '$ashtray', '$oxidative_other',

            '$yeast_bread_dough_level', '$brioche', '$almond', '$fresh_dough',
            '$hazelnut', '$yeast', '$yeast_bread_dough_other', '$ml_butter_cream_level',
            '$earth_leaves_mushrooms_level', '$straw_hay',
            '$earth_leaves_mushrooms_cut_grass','$earth_leaves_mushrooms_other',

            '$mineral_stone_sulfur_level', '$sulfur', '$state_petrol', '$metallic',
            '$flit', '$dust', '$chalk', '$limestone', '$volcanic',  '$smokey',
            '$mineral_stone_sulfur_other',

            '$oak_vanilla_toast_level', '$vanilla','$maple',
            '$light_toast', '$heavy_toast', '$sawdust', '$oak_vanilla_toast_other',
            '$sweetness', '$acid', '$alcohol', '$bitter', '$balanced', '$length',
            '$complexity','$quality_for_price', '$quality_for_price_rate');";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $log = "(White assessment) Date: " . $date . " Assessment Id: " . $uniqueAssessmnetId;
        error_log($log);
    }

    // Gets data from wine that was searched for/ entered
    // $conn->quote($string)
    $producer = $_POST['wine_producer'];
    $producer = $conn->quote($producer);
    //
    $wine_name = $_POST['wine_name'];
    $wine_name = $conn->quote($wine_name);
    //
    $vintage = $_POST['wine_vintage'];
    $vintage = $conn->quote($vintage);
    //
    $wine_style = $_POST['wine_style']; // red or white
    $wine_style = $conn->quote($wine_style);
    //
    $username = $_SESSION['username'];
    $username = $conn->quote($username);
    //
    $fullname = $_SESSION['fullname'];// Add to DB
    $fullname = $conn->quote($fullname);
    //
    $profileImg = $_SESSION['imageUrl']; // Add to DB
    $profileImg = $conn->quote($profileImg);
    //

    $sql = "INSERT INTO assessment (assessment_id, date, producer, wine_name, wine_style, vintage, username, fullname, img_url, quality_for_price, quality_for_price_rate) VALUES
    ('$uniqueAssessmnetId', FROM_UNIXTIME($phpdate), '$producer', '$wine_name', '$wine_style','$vintage', '$username', '$fullname','$profileImg', '$quality_for_price', '$quality_for_price_rate');";

    $statement = $conn->prepare($sql);
    $statement->execute();

    $log = "(Assess.php) Date: " . $date  . " Assessment Id: " . $uniqueAssessmnetId . " Producer: " . $producer . " Wine Name: " . $wine_name . " Wine Style: " . $wine_style . " Vintage: " . $vintage  . " Username: " . $username . " Fullname" . $fullname . " Profile Image: " . $profileImg . " Quality For Price" .
        $quality_for_price." Quality For Price Rate: " . $quality_for_price_rate;
    error_log($log);
}// end of check
header("Location: ../index.php");
?>
