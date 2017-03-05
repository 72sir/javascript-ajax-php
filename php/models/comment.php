<?php
    require_once __DIR__ . '/../functions/SQL.php';

    function comment_viewAllRegion () {
        $res = Sql_query("SELECT * FROM `region` WHERE country_id = 3159");

        if ($res) {
            $res = comment_orderArr($res);
        }
        else {
            $res = array('type'=>'error');
        }
        print json_encode($res);
    };

    function comment_loadCitiesInRegion ($id) {
        $res = Sql_query("SELECT * FROM `city` WHERE region_id=$id");

        if ($res) {
            $res = comment_orderArr($res);
        }
        else {
            $res = array('type'=>'error');
        }
        print json_encode($res);
    };

    function comment_saveComment($query) {
        $res = Sql_query($query);
        print json_encode($res);
    };

    function comment_orderArr($SqlArr){
        $num = mysqli_num_rows($SqlArr);

        $id = [];
        $name = [];

        for ($i=0; $i<$num; $i++) {
            $row[$i] = mysqli_fetch_row($SqlArr);

            $id[$i] = $row[$i][0];
            $name[$i] = $row[$i][3];
        }

        $i=0;
        foreach($name as $r) {
            $arrName[] = array('id'=>$id[$i], 'name'=>$r);
            $i++;
        }

        $res = array('type'=>'success', 'arrName'=>$arrName);
        return $res;
    };
?>