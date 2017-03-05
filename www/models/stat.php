<?php
    function sort_the_data_on_request($result, $name_arr){
        if ($result) {
            $num = mysqli_num_rows($result);

            $nameRegion = [];
            $nameCity = [];
            $countComment = [];

            for ($i=0; $i<$num; $i++) {
                $row[$i] = mysqli_fetch_row($result);

                $nameRegion[$i] = $row[$i][0];
                $nameCity[$i] = $row[$i][1];
                $countComment[$i] = $row[$i][2];
            }

            $i=0;
            foreach ($countComment as $r) {
                $count[] = array(
                    'nameRegion'=>$nameRegion[$i],
                    'nameCity'=>$nameCity[$i],
                    'countComment'=> $countComment[$i],
                );
                $i++;
            }
            $result = array($name_arr=>$count);
            return $result;
        }
        else {
            $result = array('type'=>'error');
        }
    }