<div class="pagination">
    <?php
        $query = get_query_var('custom_query') ? get_query_var('custom_query') : $wp_query;
        global $wp_rewrite, $paged;

        if (!$paged) {
            $paged = 1;
        }

        $paginate_base = get_pagenum_link(1);
        if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
            $paginate_base = add_query_arg('paged', '%#%');
        } else {
            $paginate_base = user_trailingslashit(trailingslashit(remove_query_arg('paged', $paginate_base)) . 'page/%#%/', 'paged');
        }

        $pagination_args = [
            'base'      => $paginate_base,
            'format'    => '',
            'total'     => $query->max_num_pages,
            'mid_size'  => 1,
            'end_size'  => 0,
            'current'   => max(1, get_query_var('paged')),
            'prev_next' => true,
            'prev_text' => esc_html__('&lt;', 'your-text-domain'),
            'next_text' => esc_html__('&gt;', 'your-text-domain'),
        ];

        // イベントアーカイブの場合
        if (is_post_type_archive('event')) {
            $event_area = isset($_GET['event_area']) ? sanitize_text_field($_GET['event_area']) : '';
            $event_category = isset($_GET['event_category']) ? sanitize_text_field($_GET['event_category']) : '';
            if ($event_area || $event_category) {
                $pagination_args['add_args'] = array();

                if ($event_area) {
                    $pagination_args['add_args']['event_area'] = $event_area;
                }

                if ($event_category) {
                    $pagination_args['add_args']['event_category'] = $event_category;
                }
            }
        }

        echo paginate_links($pagination_args);
    ?>
</div>
