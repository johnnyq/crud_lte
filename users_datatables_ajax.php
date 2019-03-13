<?php

  include "config.php";

    $draw = $_GET["draw"];//counter used by DataTables to ensure that the Ajax returns from server-side processing requests are drawn in sequence by DataTables
    $orderByColumnIndex  = $_GET['order'][0]['column'];// index of the sorting column (0 index based - i.e. 0 is the first record)
    $orderBy = $_GET['columns'][$orderByColumnIndex]['data'];//Get name of the sorting column from its index
    //if ($orderBy == 0) {$orderBy  = 1;}
    $orderType = $_GET['order'][0]['dir']; // ASC or DESC
    $start  = $_GET["start"];//Paging first record indicator.
    $length = $_GET['length'];//Number of records that the table can display in the current draw
    /* END of POST variables */

$sql = "SELECT * FROM ( SELECT user_id, first_name, last_name, CONCAT(first_name, ' ', last_name) AS fullname, phone, email, user_created FROM users ) a";

    function getData($sql){ 
        $query = mysqli_query($mysqli,$sql);
        $data = array();

        while($row = mysqli_fetch_array($query)){
                  //$data[] = "customername: ". $row['customername'] ;
                $id = $row['user_id'];
                $last_name = ucwords($row['last_name']); 
                $first_name = ucwords($row['first_name']);
                $fullname = $row['fullname'];
                $phone = $row['phone']; 
                if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
                $email = $row['email'];
                $user_created = date($config_date_format,$row['user_created']);
                $data[]  = array(
                    "fullname"=>$fullname, 
                    "phone"=>$phone, 
                    "email"=>$email,  
                    "date_created"=>$date_created
                );

        }          
        return $data;
    }

    function getRecordsTotal($sql){ 
        $result = mysqli_query($mysqli,$sql);
        $recordsTotal = mysqli_num_rows($result);
        return $recordsTotal;
    }    

$recordsTotal = getRecordsTotal($sql);

 /* SEARCH CASE : Filtered data */
    if(!empty($_GET['search']['value'])){

        /* WHERE Clause for searching */
        for($i=0 ; $i<count($_GET['columns']);$i++){
            if ($_GET['columns'][$i]['searchable'] == 'true'){    
                $column = $_GET['columns'][$i]['data'];//we get the name of each column using its index from POST request
                $where[]="$column like '%".$_GET['search']['value']."%'";
            }    
        }
        
            $where = "AND ".implode(" OR " , $where);// id like '%searchValue%' or name like '%searchValue%' ....
            $constantWhere = " WHERE 1=1 ";
            /* End WHERE */

            $sql = sprintf("%s %s %s", $sql ,$constantWhere, $where);//Search query without limit clause (No pagination)
            //echo "1- ".$sql;

            $recordsFiltered = getRecordsTotal($sql);//Count of search result

            /* SQL Query for search with limit and orderBy clauses*/
            $sql = sprintf("%s %s ORDER BY %s %s limit %d , %d ", $sql , $where ,$orderBy, $orderType ,$start, $length);
            //echo "2- ".$sql;
            $data = getData($sql);
         
    }
    /* END SEARCH */
    else {
        $sql = sprintf("%s %s ORDER BY %s %s limit %d , %d ", $sql ,$constantWhere, $orderBy,$orderType, $start , $length);
        //echo "3- ".$sql;
        $data = getData($sql);

        $recordsFiltered = $recordsTotal;
    }

    /* Response to client before JSON encoding */
    $response = array(
        "draw" => intval($draw),
        "recordsTotal" => $recordsTotal,
        "recordsFiltered" => $recordsFiltered,
        "data" => $data
    );

    echo json_encode($response);

?>