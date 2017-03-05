<?php
    require __DIR__ . '/../models/comment.php';
    $country_id = @intval($_POST['country_id']);
    $country_id = 4312;

    if (isset($country_id)) {
        return comment_loadCitiesInRegion($country_id);
    }

?>