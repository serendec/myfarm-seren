<?php
get_header();
$post_type = get_post_type();
$template_name = "template-parts/single/{$post_type}.php";

if ( locate_template($template_name) != '' ) {
    get_template_part('template-parts/single/'.$post_type);
} else {
    get_template_part('template-parts/single/content');
}

get_footer();
