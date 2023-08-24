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
<div id="redmodal" class="redmodal">
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
    <p class="close" onclick="closeredmodal()"><?php $examplePost = get_post(1);
                                                    echo apply_filters('the_title', $examplePost->post_title); // Do this instead 
                                                    ?></p>

    <input type="hidden" id="formid" name="formid" value="1005">
        </form>
    </div>
</div>
<div id="overlay" class="overlay" onclick="closeredmodal()"> </div>