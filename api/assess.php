<?php
include 'db.include.php';
$conn = getDatabaseConnection();

if(isset($_POST['redAssessReturn']) || isset($_POST['whiteAssessReturn']) ){
    //var_dump($_POST);
    // For assessment table
    $date = date("Y-m-d H:i:s", time());
    //echo "DATE: " . $date;
    $phpdate = strtotime($date);
    //echo "DATE 2: " . $phpdate;
    $producer = "pro";
    //$vin = 3333;
    $vin = 1234;
    $sql = "INSERT INTO assessment (date, producer, wine_name, vintage) VALUES (FROM_UNIXTIME($phpdate), '$producer', 'Nm', '$vin');";
    //$sql = "INSERT INTO assessment VALUES $date, $wine_producer, $wine_name, $wine_vintage";
    $statement = $conn->prepare($sql);
    $statement->execute();
    if(isset($_POST['redAssessReturn'])){
        //echo 'Red';
        //var_dump($_POST);
        // For Red Assessment
        $primary_color = (int)$_POST['primary_color'];
        //echo "Primary: " . $primary_color . "<br>";
        $secondary_color =  (int)$_POST['secondary_color'];
        //echo "Secondary: " . $secondary_color . "<br>";

         //Red  Fruit Aromas
        $red_fruits_level = (int)$_POST['red_fruits_level'];
        //echo "Fruit Level" . $red_fruits_level . "<br>";
        $red_aroma = $_POST['red_aromas'];
        //echo "Red Aroma: " . $red_aroma . "<br>";
        $red_cherry = 0;
        //echo "Red Cherry: " . $red_cherry . "<br>";
        $pomegranate = 0;
        //echo "Pomegranate " . $pomegranate . "<br>";
        $cranberry = 0;
        //echo "Cranberry " . $cranberry . "<br>";
        $raspberry = 0;
        //echo "Raspberry " . $raspberry . "<br>";
        $red_currant = 0;
        //echo "Red Currant " . $red_currant . "<br>";
        $red_fruit_other = "";
        //echo "Red Fruit Other " . $red_fruit_other. "<br>";

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
        //echo "black_fruit_level " . $black_fruit_level . "<br>";
        $black_aroma = $_POST['black_aromas'];
        //echo "black_aroma" . $black_aroma . "<br>";
        $black_berry = 0;
        //echo "black_berry " . $black_berry . "<br>";
        $black_currant = 0;
        //echo "black currant " . $black_currant . "<br>";
        $raisin = 0;
        //echo "raisin  " . $primary_color . "<br>";

        $date = 0;
        $fig = 0;
        $black_fruit_other = "";

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
        //echo "blue_fruit_level " . $blue_fruit_level . "<br>";
        $blue_aroma = $_POST['blue_aromas'];
        //echo "blue aroma " . $blue_aroma . "<br>";
        $blueberry = 0;
        $dried_blueberry = 0;
        $plum = 0;
        $plum_skin = 0;
        $blue_fruit_other = "";

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
        //echo "fruit_type " . $fruit_type . "<br>";

        // Flower Aromas
        $flowers_level = (int)$_POST['flowers_level'];
        //echo "flower_level " . $flowers_level. "<br>";
        $flower_aroma = $_POST['flowers_aromas'];
        //echo "flower_aroma " . $flower_aroma. "<br>";
        $rose = 0;
        $violet = 0;
        $lavender = 0;
        $dried_flowers = 0;
        $potpourri = 0;
        $flowers_other = "";

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
        //echo "herbs_level " . $herbs_level . "<br>";
        $herb_aroma = $_POST['herbs_aromas'];
        //echo "herb aroma " . $herb_aroma . "<br>";
        $fresh_herbs = 0;
        $dried_herbs = 0;
        $tomatoe_leaf = 0;
        $basil = 0;
        $oregeno = 0;
        $fennel = 0;
        $herbs_other = "";

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
        //echo "vegetal_level" . $vegetal_level . "<br>";
        $vegetal_aroma = $_POST['vegetal_aromas'];
        //echo "veg_aroma " . $vegetal_aroma . "<br>";
        $green_bell_pepper_capsicum = 0;
        $vegetal_fresh_herbs = 0;
        $vegetal_dried_herbs = 0;
        $stem_whole_cluster = 0;
        $vegetal_other = "";

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
           // echo "mint_eucalyptus_level " . $mint_eucalyptus_level . "<br>";
        $mint_eucalyptus_aroma = $_POST['mint_eucalyptus_aromas'];
        //echo "mint_eucalyptus_aroma" . $mint_eucalyptus_aroma . "<br>";
        $mint = 0;
        $eucalyptus = 0;
        $menthol = 0;
        $mint_eucalyptus_other = "";

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
           // echo "pepper_spice_level " . $pepper_spice_level . "<br>";
        $pepper_spice_aroma = $_POST['pepper_spice_aromas'];
        //echo "pepper_spice_aroma" . $pepper_spice_aroma . "<br>";
        $black_peppercorn = 0;
        $green_peppercorn = 0;
        $cinnamon = 0;
        $baking_spice = 0;
        $hard_spice = 0;
        $anise_licorice = 0;
        $pepper_spice_other = "";

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
            //echo "cocoa_coffee_level" . $cocoa_coffee_level . "<br>";
        $cocoa_coffee_aroma = $_POST['cocoa_coffee_aromas'];
            //echo "cocoa_coffee_aroma " . $cocoa_coffee_aroma . "<br>";
        $milk_chocolate = 0;
        $dark_chocolate = 0;
        $cocoa_powder = 0;
        $mocha = 0;
        $espresso = 0;
        $coffee_grounds = 0;
        $cocoa_coffee_other = "";

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
            //echo "meat_leather_level " . $meat_leather_level . "<br>";
        $meat_leather_aroma = $_POST['meat_leather_aromas'];
            //echo "meat_leather_aromas " . $meat_leather_aroma . "<br>";
        $meat = 0;
        $grilled_meat = 0;
        $beef_jerkey = 0;
        $wet_leather = 0;
        $dried_leather = 0;
        $meat_leather_other = "";

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
           // echo "tobacco_tar_level " . $tobacco_tar_level . "<br>";
        $tobacco_tar_aroma = $_POST['tobacco_tar_aromas'];
            //echo "tobacco_tar_aroma " . $tobacco_tar_aroma . "<br>";
        $wet_tobacco = 0;
        $dried_tobacco = 0;
        $tar = 0;
        $ashtray = 0;
        $tobacco_tar_other = "";

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
            //echo "earth_leaves_mushrooms_level " . $earth_leaves_mushrooms_level . "<br>";
        $earth_leaves_mushrooms_aroma = $_POST['earth_leaves_mushrooms_aromas'];
            //echo "earth_leaves_mushrooms_aroma " . $earth_leaves_mushrooms_aroma . "<br>";
        $forest_floor = 0;
        $compost = 0;
        $mushrooms = 0;
        $potting_soil = 0;
        $barnyard = 0;
        $wet_leaves = 0;
        $dried_leaves = 0;
        $earth_leaves_mushrooms_other = "";

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
            //echo "mineral_stone_sulfur_level " . $mineral_stone_sulfur_level . "<br>";
        $mineral_stone_sulfur_aroma = $_POST['mineral_stone_sulfur_aromas'];
            //echo "mineral_stone_sulfur_aroma " . $mineral_stone_sulfur_aroma . "<br>";
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
            //echo "oak_vanilla_smoke_coconut_level " . $oak_vanilla_smoke_coconut_level . "<br>";
        $oak_vanilla_smoke_coconut_aroma = $_POST['oak_vanilla_smoke_coconut_aromas'];
            //echo "oak_vanilla_smoke_coconut_aroma " . $oak_vanilla_smoke_coconut_aroma . "<br>";
        $vanilla = 0;
        $maple = 0;
        $light_toast = 0;
        $heavy_toast = 0;
        $sawdust = 0;
        $sandalwood = 0;
        $pencil_shavings = 0;
        $oak_vanilla_smoke_coconut_other = "";

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
        //echo "sweetness " . $sweetness . "<br>";
        $alcohol = (int)$_POST['alcohol'];
        //echo "alcohol " . $alcohol . "<br>";
        $tannin = (int)$_POST['tannin'];
         //echo "tannin " . $tannin . "<br>";
        $bitter = (int)$_POST['bitter'];
         //echo "bitter " . $bitter. "<br>";
        $balanced = (int)$_POST['balanced'];
         //echo "balanced " . $balanced. "<br>";
        $length = (int)$_POST['length'];
         //echo "length " . $length . "<br>";
        $complexity = (int)$_POST['complexity'];
         //echo " complexity" . $complexity . "<br>";

        // Rating
        $quality_for_price = (int)$_POST['quality_for_price'];
        //echo "quality_for_price" . $quality_for_price . "<br>";
        $quality_for_price_rate = (int)$_POST['quality_for_price_rate'];
        //echo "quality_for_price_rate " . $quality_for_price_rate . "<br>";

        $sql = "INSERT INTO red_taste_assessment
                (taste_id, primary_color, secondary_color, red_fruits_level, red_cherry, pomegranate,
                cranberry, raspberry, red_currant, red_fruit_other, black_fruit_level, black_berry,
                black_currant, raisin,date, fig, black_fruit_other, blue_fruit_level, blueberry,
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
                (NOW(), '$primary_color', '$secondary_color', '$red_fruits_level',
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
    }else{
        // White wine assessment
        $primary_color = (int)$_POST['primary_color'];
        //echo "Primary: " . $primary_color . "<br>";
        $secondary_color = (int)$_POST['secondary_color'];
        //echo "Secondary: " . $secondary_color . "<br>";

        // Apple Pear
        $apple_pear_level = (int)$_POST['apple_pear_level'];
        //echo "Fruit Level" . $apple_pear_level . "<br>";
        $apple_pear_aroma = $_POST['apple_pear_aromas'];
        //echo "Fruit Level" . $apple_pear_aroma . "<br>";
        $green_apple = 0;
        $yellow_apple = 0;
        $red_apple = 0;
        $baked_apple = 0;
        $apple_pear_other = "";

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
        //echo "Citrus Level" . $citrus_level . "<br>";
        $citrus_aroma = $_POST['citrus_aromas'];
        //echo "Cit Aroma" . $citrus_aroma . "<br>";
        $lemon = 0;
        $myer_lemon = 0;
        $lime = 0;
        $orange = 0;
        $dried_orange_peel = 0;
        $grapefruit = 0;
        $cirtus_other = "";

        switch($citrus_aroma){
            case "Lemon": $lemon = 1;
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
        //echo "Stone Level" . $stone_level . "<br>";
        $stone_aroma = $_POST['stone_aromas'];
        //echo "Fruit Level" . $stone_aroma . "<br>";
        $white_peach = 0;
        $yellow_peach = 0;
        $apricot = 0;
        $apricot_kernal = 0;
        $nectarine = 0;
        $stone_other = "";

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
        //echo "Trop Level" . $tropical_melon_level . "<br>";
        $tropical_melon_aroma = $_POST['tropical_melon_aromas'];
        //echo "Fruit Level" . $tropical_melon_aroma . "<br>";
        $passion_fruit = 0;
        $pineapple = 0;
        $kiwi = 0;
        $lychee = 0;
        $mango = 0;
        $banana = 0;
        $tropical_melon_other = "";

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
        //echo "Fruit type" . $fruit_type . "<br>";

        // Flower
        $flower_level = (int)$_POST['flower_level'];
        //echo "Flower Level" . $flower_level . "<br>";
        $flower_aroma = $_POST['flowers_aromas'];
        //echo "Fruit Level" . $flower_aroma . "<br>";
        $white_flowers = 0;
        $yellow_flowers = 0;
        $dried_flowers = 0;
        $honeysuckle = 0;
        $orange_blossom = 0;
        $flower_other = "";

        switch($flower_aroma){
            case "White Flower": $white_flowers = 1;
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
        //echo "Herb Level" . $herb_level . "<br>";
        $herb_aroma = $_POST['herbs_aromas'];
        //echo "Fruit Level" . $herb_aroma . "<br>";
        $dried_herbs = 0;
        $fresh_herbs = 0;
        $herbs_other = "";

        switch($herb_aroma){
            case "Dried Herbs": $dried_herbs = 1;
                break;
            case "Fresh Herbs": $fresh_herbs = 1;               
                break;
        }

        // Vegetal
        $vegetal_level = (int)$_POST['vegetal_level'];
        //echo "Veg level" . $vegetal_level . "<br>";
        $radish = 0;
        $jalapeno = 0;
        $green_bell_pepper = 0;
        $vegetal_cut_grass = 0;
        $vegetal_other = "";

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
        //echo "Ox Level" . $oxidative_level . "<br>";
        $oxidative_aroma = $_POST['oxidative_aromas'];
        //echo "Ox aroma" . $oxidative_aroma . "<br>";
        $baked_fruit = 0;
        $brown_fruit = 0;
        $leather = 0;
        $ashtray = 0;
        $oxidative_other = "";

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
        //echo "Ox Level" . $yeast_bread_dough_level . "<br>";
        $yeast_bread_dough_aroma = $_POST['yeast_bread_dough_aromas'];
        //echo "Ox Level" . $yeast_bread_dough_aroma . "<br>";
        $brioche = 0;
        $almond = 0;
        $fresh_dough = 0;
        $hazelnut = 0;
        $yeast = 0;
        $yeast_bread_dough_other = "";

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
        //echo "ml_butter_cream_level Level" . $ml_butter_cream_level . "<br>";

        // Earth Leaves
        $earth_leaves_mushrooms_level = (int)$_POST['earth_leaves_mushrooms_level'];
        $earth_leaves_mushrooms_aromas = $_POST['earth_leaves_mushrooms_aromas'];
        //echo "Ox Level" . $earth_leaves_mushrooms_level . "<br>"; 
        $straw_hay = 0;
        $earth_leaves_mushrooms_cut_grass = 0;
        $earth_leaves_mushrooms_other = "";

        switch($earth_leaves_mushrooms_aromas){
            case "Straw Hay": $straw_hay = 1;
                break;
        }
        // Stone
        $mineral_stone_sulfur_level = (int)$_POST['mineral_stone_sulfur_level'];
        //echo "Min Level" . $mineral_stone_sulfur_level . "<br>"; 
        $mineral_stone_sulfur_aroma = $_POST['mineral_stone_sulfur_aromas'];
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
        //echo "Oak Level" . $oak_vanilla_toast_level . "<br>"; 
        $oak_vanilla_toast_aroma = $_POST['oak_vanilla_smoke_coconut_aromas'];
        $vanilla = 0; 
        $maple = 0;
        $light_toast = 0;
        $heavy_toast = 0;
        $sawdust = 0;
        $oak_vanilla_toast_other = "";

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
        //echo "sweet" . $sweetness . "<br>";
        $acid = (int)$_POST['acid'];
        //echo "sweet" . $acid . "<br>";
        $alcohol = (int)$_POST['alcohol'];
        //echo "sweet" . $alcohol . "<br>";
        $bitter = (int)$_POST['bitter'];
        //echo "sweet" . $bitter . "<br>";
        $balanced = (int)$_POST['balanced'];
        //echo "sweet" . $balanced . "<br>";
        $length = (int)$_POST['length'];
        //echo "sweet" . $length . "<br>";
        $complexity = (int)$_POST['complexity'];
        //echo "sweet" . $complexity . "<br>";

        $quality_for_price = 0;
        $quality_for_price_rate = 0;

        $quality_for_price = (int)$_POST['quality_for_price'];
        //echo "sweet" . $quality_for_price . "<br>";
        $quality_for_price_rate = (int)$_POST['quality_for_price_rate'];
        //echo "sweet" . $quality_for_price_rate . "<br>";

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
            (NOW(), '$primary_color', '$secondary_color', '$apple_pear_level',
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
    }
}// end of check
?>
