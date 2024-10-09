<?php
$near_farms = get_query_var('near_farms');

foreach ($near_farms as $farm){
    $farm = (array) $farm;
    set_query_var('farm', $farm);
    get_template_part('template-parts/components/farm-card');
}
