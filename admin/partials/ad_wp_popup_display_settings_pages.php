<?php
// if(!(empty($_POST))) {
//     var_dump($_POST);
// }
// if($_POST["form-action"] === "update-activate") return true;
// if(isset($_POST["form-action"] === "update-activate"))


// $test = get_option('plugin_popin_popin-plugin_description');
// var_dump($test);

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
// var_dump($groupedOptions);
?>
<?php
function ava_test_init()
{
    wp_enqueue_script('ava-test-js', plugins_url('.../js/plugin-popin-admin.js', __FILE__));
}

function testCSS()
{
    wp_enqueue_style("test-css", plugins_url('.../css/plugin-popin-admin.css', __FILE__));
}
?>
<!-- <div id="redmodal" class="redmodal">
    <div class="redmodal-header">
        <div class="redmodal-title"> </div>
        <button class="close-button"> &times; </button>
    </div>
    <div class="redmodal-body">
        <form id="leadGeneration">
            <img class="center-image" src="https://i.postimg.cc/g265XXpg/newsletter-signup-examples.webp" alt="Wordpress Design Development Essential Cheatsheets Free Ebook">
            <div id="description">
                <p id="description">Subscribe now for hand-picked holiday deals, inspiration and latest tips, straight to your inbox.</p>
            </div>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input id="mybtn" class="red-pop" type="submit" value="SUBSCRIBE"> -->
<!-- <p class="close" onclick="closeredmodal()"><?php $examplePost = get_post(1);
                                                echo apply_filters('the_title', $examplePost->post_title); // Do this instead 
                                                ?></p> -->

<!-- <input type="hidden" id="formid" name="formid" value="1005">
        </form>
    </div>
</div>
<div id="overlay" class="overlay" onclick="closeredmodal()"> </div> -->

<div class="container">
    <div class="display-list">
        <img class="center-image" src="https://cdn.discordapp.com/attachments/838359232985694238/1143886389650399253/image.psd_1.png" alt="Wordpress Design Development Essential Cheatsheets Free Ebook">

        <?php
        echo '<div class="scrollable-container">';
        echo '<div class="flex-list">';
        echo "<p>Popins disponibles :</p>";

        foreach ($groupedOptions as $key => $value) {
            if (!empty($value["plugin_popin_" . $key . "_description"])) {

                // form to update option activated
                echo '<form method="post" action="">
                <input name="form-action" type="hidden" value="update-activate">
                <input name="id-popin" type="hidden" value="' . $key . '">
                <input name="" type="hidden" value="1">';
                submit_button("Activer cette pop-in");
                echo '</form>';

                echo '<form method="post" action="">
                <input name="form-action" type="hidden" value="delete">
                <input name="id-popin" type="hidden" value="' . $key . '">
                <input name="" type="hidden" value="1">';
                submit_button("Supprimer cette pop-in");
                echo '</form>';
                
                echo '<div id="redmodal" class="redmodal modal-preview" style="background-color:' . $value["plugin_popin_" . $key . "_color-bg"] . ';">';
                echo '<form class="edit-form">';
                echo '<input name="edit" class="radio-button" type="checkbox" data-id-describe="' . $value["plugin_popin_" . $key . "_description"] . '" name:"radio-' . $key . '" value="' . $key . '" data-id-img="' . $value["plugin_popin_" . $key . "_image"] . '"  data-id-btn="' . $value["plugin_popin_" . $key . "_button"] . '" data-id="' . $key . '"/>
                    <label for="edit">Editer</label>
                </form>
                <div class="redmodal-header">
                <div class="redmodal-title"> </div>
            </div>
            <div class="redmodal-body">
                <div id="leadGeneration">
                    <img class="center-image" src="' . $value["plugin_popin_" . $key . "_image"] . '" data-id-img="' . $value["plugin_popin_" . $key . "_image"] . '">
                    <div id="description">
                    <p id="description" style="color:' . $value["plugin_popin_" . $key . "_color-txt"] . '">' . $value["plugin_popin_" . $key . "_description"] . ' </p>
                    </div>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input id="mybtn" class="red-pop" type="submit" value="' . $value["plugin_popin_" . $key . "_button"] . '" style="background-color:' . $value["plugin_popin_" . $key . "_color-btn"] . '" data-id-btn="' . $value["plugin_popin_" . $key . "_button"] . '">
                    <input type="hidden" id="formid" name="formid" value="1005">
                </div>
            </div>
        </div>';
            }
        }
        echo '</div>';
        echo '</div>';
        ?>
    </div>
    <form action="" class="js-popin-name">
        <p>Votre nom de pop-in :</p>
        <input class="js-popin-name-input input" name="popin-id" type="text" placeholder="suivre-ce-format" required>
        <?= submit_button("Enregistrer") ?>
    </form>
    <?php
    if (!empty($_POST)) {
        // var_dump($_POST);
    }
    ?>
    <div class="js-form form-hidden">
        <form class="" action="" method="post" id="">
            <input class="js-popin-id input" name="popin-id-name" type="hidden" value="">
            <input class="input" name="form-action" type="hidden" value="register-in-database">
            <input class="input" name="activated" type="hidden" value="0">
            <label class="label" for="description">Votre description :</label>
            <input class="textarea" type="textarea" name="description" placeholder="Votre description">
            <label class="label" for="image">Choisissez votre image:</label>
            <input class="input js-img-url" type="text" name="image" placeholder="Votre image" value="">
            <label class="label" for="bouton">Le texte de votre bouton :</label>
            <input class="input" type="text" name="btn" placeholder="Le texte de votre bouton">
            <div class="form-color">
                <div class="form-color-sub">
                    <label class="label" for="bouton"> Couleur de fond :</label>
                    <input class="input" type="color" name="color-bg" placeholder="" value="#ffffff">
                </div>
                <div class="form-color-sub">
                    <label class="label" for="bouton">Couleur du bouton :</label>
                    <input class="input" type="color" name="color-btn" placeholder="" value="#2e2e2e">
                </div>
                <div class="form-color-sub">
                    <label class="label" for="bouton">Couleur de la description :</label>
                    <input class="input" type="color" name="color-txt" placeholder="" value="#3c434a">
                </div>
            </div>
            <?= submit_button() ?>
        </form>
        <?= displayAttachments() ?>
    </div>
    <?php
    function displayAttachments()
    {

        $args = array(
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'posts_per_page' => -1, // Display all images
        );

        $attachments = get_posts($args);
        echo '<div class="gallery">';
        foreach ($attachments as $attachment) {
            $attachment_id = $attachment->ID;
            $image_attributes = wp_get_attachment_image_src($attachment_id, 'thumbnail', false);

            if ($image_attributes) {
                $image_url = $image_attributes[0]; // URL of the image

                // Output the image tag
                echo '<img class="js-img gallery-img" src="' . esc_url($image_url) . '" alt="Image">';
            }
        }
    }
    ?>


</div>



<template id="renameFormTemplate">
    <form action="" method="update" data-form-id="">
        <div id="redmodal" class="redmodal modal-preview">
            <div class="redmodal-header">
                <div class="redmodal-title"> </div>
            </div>
            <div class="redmodal-body">
                <div id="leadGeneration">
                    <img class="center-image" type="text" name="img" src="">
                    <div id="description">
                        <input type="text" name="choiceText" value="">

                    </div>
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="text" name="textBtn" value="">
                    <input type="hidden" id="formid" name="formid" value="1005">
                    <input type="submit" value="valider">
                </div>
            </div>
        </div>

    </form>
</template>







