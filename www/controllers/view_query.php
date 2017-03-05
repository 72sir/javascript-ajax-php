<?php
    require_once __DIR__ . '/../functions/SQL.php';

    $query="SELECT u.id, u.lastName, u.firstName, u.middleName, u.phoneName, u.emailName, c.name, r.name, u.commentName
                FROM `users` as u
                    inner join `region` as r on u.country_id = r.region_id
                    inner join `city` as c on u.city_id = c.city_id";

    $regs = Sql_query($query);

    if ($regs) {
        $num = mysqli_num_rows($regs);

        $user = [];
        $id_user = [];
        $lastName = [];
        $firstname_user = [];
        $middleName = [];
        $phoneName = [];
        $emailName = [];
        $countryId = [];
        $city_id = [];
        $commentName = [];

        for ($i=0; $i<$num; $i++) {
            $user[$i] = mysqli_fetch_row($regs);

            $id_user[$i] = $user[$i][0];
            $lastName[$i] = $user[$i][1];
            $firstname_user[$i] = $user[$i][2];
            $middleName[$i] = $user[$i][3];
            $phoneName[$i] = $user[$i][4];
            $emailName[$i] = $user[$i][5];
            $countryId[$i] = $user[$i][6];
            $city_id[$i] = $user[$i][7];
            $commentName[$i] = $user[$i][8];
            $user[$i] = $user[$i][1];
        }

        $i=0;
        foreach ($user as $r) {
            $users[] = array(
                'id'=>$id_user[$i],
                'lastName'=>$lastName[$i],
                'firstName'=> $firstname_user[$i],
                'middleName'=> $middleName[$i],
                'phone'=> $phoneName[$i],
                'emailName'=> $emailName[$i],
                'countryId'=> $countryId[$i],
                'city_id'=> $city_id[$i],
                'commentName'=> $commentName[$i],
            );
            $i++;
        }
        $result = array('users'=>$users);
    }
    else {
        $result = array('type'=>'error');
    }
    print json_encode($result);