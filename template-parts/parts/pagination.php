<div class="ui container center aligned pagination">
    <?php
    echo paginate_links(array(
        'total'   => $query->max_num_pages,
        'current' => $paged,
        'show_all'           => false,
        'prev_next'          => true,
        'prev_text' => '&laquo; Anterior',
        'next_text' => 'Siguiente &raquo;',
        'aria_current'       => 'page',
        'end_size'           => 1,
		'mid_size'           => 2,
		'type'               => 'plain',
		'add_args'           => array(), // Array of query args to add.
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => '',
    ));
    // https://developer.wordpress.org/reference/functions/paginate_links/
    ?>
</div>