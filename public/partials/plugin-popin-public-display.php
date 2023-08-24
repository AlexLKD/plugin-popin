<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://acf.fr
 * @since      1.0.0
 *
 * @package    Plugin_Popin
 * @subpackage Plugin_Popin/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<?php 

// get the option who contains plugin_popin and 

$alloptions = wp_load_alloptions();

$model = 'plugin_popin_';
$filteredOptions = array();

foreach ($alloptions as $key => $value) {
    if (strpos($key, $model) === 0) {
        $filteredOptions[$key] = $value;
    }
}
// var_dump($filteredOptions);


$groupedOptions = array();

foreach ($filteredOptions as $key => $value) {

    $parts = explode('_', $key);
    $groupName = $parts[2];

    if (!isset($groupedOptions[$groupName])) {
        $groupedOptions[$groupName] = array();
    }

    $groupedOptions[$groupName][$key] = $value;
}
$popinActivated = $groupedOptions["test-front"];
// var_dump($popinActivated);

function find_key($array, $substring) {
    $matching_key = [];
    foreach ($array as $key => $value) {
        if (strpos($key, $substring) !== false) {
            $matching_key[] = $key;
            $matching_key[$key] = $value;
        }
    }
    return $matching_key;
}

$backgroundColor = find_key($popinActivated, "color-bg");
$buttonColor = find_key($popinActivated, "color-btn");
$description = find_key($popinActivated, "description");
$image = find_key($popinActivated, "image");
$button = find_key($popinActivated, "button");
// var_dump($image[0]);
// var_dump($popinActivated[$image[0]]);


?>





<!-- <template id="template-popin">

</template> -->
<div id="redmodal" class="redmodal" style="background-color: <?=$popinActivated[$backgroundColor[0]]?>; display: none">
    <div class="redmodal-header">
        <div class="redmodal-title"> </div>
        <button class="close-button js-close-button"> &times; </button>
    </div>
    <div class="redmodal-body">
        <form id="leadGeneration">
            <img class="center-image" src="<?=$popinActivated[$image[0]]?>" alt="Wordpress Design Development Essential Cheatsheets Free Ebook">
            <div id="description">
                <p id="description"><?=$popinActivated[$description[0]]?></p>
            </div>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input id="mybtn" class="red-pop" type="submit" style="background-color: <?=$popinActivated[$buttonColor[0]]?>" value="<?=$popinActivated[$button[0]]?>">
            <!-- <button id="mybtn" class="red-pop" type="submit" style="background-color: <?=$popinActivated[$buttonColor[0]]?>"><?=$popinActivated[$button[0]]?></button> -->

    <input type="hidden" id="formid" name="formid" value="1005">
        </form>
    </div>
</div>
<div id="overlay" class="overlay js-overlay" style="display: none"> </div>