<?php
get_header();

$template_filename = get_post_type();
if ( locate_template('template-parts/archive/'.$template_filename.'.php') != '' ) {
    get_template_part('template-parts/archive/'.$template_filename);
} else {
    get_template_part('template-parts/archive/content');
}

get_footer();
