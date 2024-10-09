<?php
$post_type = get_post_type();
$post_type = get_post_type();
if (!$post_type){
    $post_type = get_query_var('post_type');
}

$template_filename = 'template-parts/searchforms/' . $post_type;
if ($post_type && locate_template($template_filename . '.php') != '') {
    get_template_part($template_filename);
} else {
    get_template_part('template-parts/searchforms/content');
}
