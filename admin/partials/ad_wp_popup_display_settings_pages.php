<img class="center-image" src="https://cdn.discordapp.com/attachments/838359232985694238/1143886389650399253/image.psd_1.png" alt="Wordpress Design Development Essential Cheatsheets Free Ebook">

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

<?php

// do_action('media_buttons', 'INSEREZ UN ID');
?>
<form action="" class="js-popin-name">
    <p>Votre nom de pop-in :</p>
    <input class="js-popin-name-input" name="popin-id" type="text" style="margin-right: 2rem" required>
    <button type="submit" class="js-show-form">Enregistrer</button>
</form>
<?php
if (!empty($_POST)) {
    var_dump($_POST);
}
?>
<form class="js-form form-hidden" action="" method="post" style="margin: 2rem 0" id="jean-louis">
    <input class="js-popin-id" name="popin-id-name" type="hidden" value="">
    <label style="display: block" for="description">Votre description :</label>
    <input style="display: block" type="text" name="description" placeholder="Votre description">
    <label style="display: block" for="image">Choisissez votre image:</label>
    <?php do_action('media_buttons', 'INSEREZ UN ID'); ?>
    <input style="display: block" type="text" name="image" placeholder="Votre image">
    <label style="display: block" for="bouton">Le texte de votre bouton :</label>
    <input style="display: block" type="text" name="bouton" placeholder="Le texte de votre bouton">
    <button type="submit">Enregistrer</button>
</form>