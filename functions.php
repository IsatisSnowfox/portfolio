<?php

include(__DIR__ . '/core/Menus/Container.php');
include(__DIR__ . '/core/Menus/Item.php');

add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * This file will contain all our custom PHP functions
 * and Wordpress settings
 */

$pf = new \stdClass();


register_nav_menu('main', 'La navigation principale du site web.');


function pf_get_menu($location) {
    global $pf;
    if(!isset($pf->menus)) $pf->menus = [];
    if(!isset($pf->menus[$location])) $pf->menus[$location] = new Container($location);
    return $pf->menus[$location];
}



function pf_register_image_sizes() {
    add_image_size('pf-thumbnail', 480, 220, true);
    add_image_size('pf-big', 1024, 520, true);
}
add_action('after_setup_theme', 'pf_register_image_sizes');

function pf_get_post_thumbnail_src($postId, $size = 'pf-thumbnail') {
    if(!($thumb = get_post_thumbnail_id($postId))) return false;
    $img = wp_get_attachment_image_src($thumb, $size);
    if(is_array($img)) return $img[0];
}

function pf_get_acf_img_src($field, $size = 'pf-thumbnail') {
    if(!($acf = get_field($field))) return;
    if(isset($acf['sizes'][$size])) return $acf['sizes'][$size];
    return $acf['url'];
}


function pf_register_custom_post_types() {
    register_post_type('project', [
        'label' => 'Projets',
        'labels' => [
            'singular_name' => 'Projet',
            'add_new_item' => 'Ajouter un nouveau projet'
        ],
        'description' => 'Projets de Félix Gason',
        'public' => true,
        'menu_position' => 1,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title'],
        'rewrite' => ['slug' => 'projets']
    ]);
}

add_theme_support('post-thumbnails');
add_action('init', 'pf_register_custom_post_types');

/**
 * Misc. functions
 */

function pf_get_bem($base, $classes = []) {
    $string = $base;
    if(!is_array($classes)) $classes = [$classes];
    foreach ($classes as $modifier) {
        $string .= ' ' . $base . '--' . $modifier;
    }
    return $string;
}