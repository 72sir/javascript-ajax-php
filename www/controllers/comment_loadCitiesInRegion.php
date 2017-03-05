<?php
    require __DIR__ . '/../models/comment.php';
    $country_id = @intval($_POST['country_id']);

    if (isset($country_id)) {
        return comment_loadCitiesInRegion($country_id);
    }

?>