<?php
global $post;
get_header();

$template_filename = $post->post_name;
if ( locate_template('template-parts/page/'.$template_filename.'.php') != '' ) {
    get_template_part('template-parts/page/'.$template_filename);
} else {
    get_template_part('template-parts/page/content');
}

get_footer();
