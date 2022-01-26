<?php
    include_once 'manage.php';  
    if(!empty($_POST["api"]))
    {
        session_start();
        if(isset($_SESSION["user"]))
        {
            echo json_encode($_SESSION["user"]);
        }  
    }

    if(!empty($_POST["getcity"]))
    {
        $userarray = "0";
        $result = Manager::get_ville_all();

        if(!empty($result))
        {
            $userarray = array();
            while($row = $result->fetch())
            {
                $userarray = array_merge($userarray, array_values(array_unique($row)));
            }
            $result->closeCursor();

        }
        echo json_encode($userarray);
    }
?>