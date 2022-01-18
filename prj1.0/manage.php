<?php
    include_once "database_con.php";
    class Manager{
        public static function create_user($user,$email,$pass,$age,$ville,$sexe,$loa,$img)
        {
            $resultmessage='err';
            $resultmod = DBCONECT::pdo_change("insert into users values(null,'$user','$email','$pass')");
            
            // if(!empty($resultmod))
            // {
            //     $resultmessage = 'succesfuly';
            // }
            return $resultmod;
        }
        public static  function get_all()
        {
            return DBCONECT::pdo_select("select users.id,handler,email,photo,city,gender,age,hobbies from users,userinfo ");
        }


        public static  function get_all_h()
        {
            $result = DBCONECT::pdo_select("select handler from users");
            $userarray = [];
            if(!empty($result))
            {
                while($row = $result->fetch())
                {
                    $userarray[] = $row[0];
                }
                $result->closeCursor();
                $userarray = array_values(array_unique($userarray));
            }
            return $userarray;
            // return "hell";
        }



        public static  function get_all_p()
        {
            $result = DBCONECT::pdo_select("select pass from users");
            $userarray = [];
            if(!empty($result))
            {
                while($row = $result->fetch())
                {
                    $userarray[] = $row[0];
                }
                $result->closeCursor();
                $userarray = array_values(array_unique($userarray));
            }
            return $userarray;
        }


        public static  function get_ville_all()
        {
            return DBCONECT::pdo_select("select DISTINCT(city) from userinfo");
        }
        public static function get_ville($ville)
        {
            return DBCONECT::pdo_select("select users.id,handler,email,photo,city,gender,age,hobbies from users,userinfo where users.id = userinfo.id and userinfo.city = '$ville'");
        }
        public static function user_test($handler)
        {
            
            $result = DBCONECT::pdo_select("select users.id,handler,email,pass,photo,city,gender,age,hobbies from users,userinfo where users.id = userinfo.id and users.handler = '$handler'");
            $userarray = "";
            if(!empty($result))
            {
                while($row = $result->fetch())
                {
                    $userarray = array_values(array_unique($row));
                }
                $result->closeCursor();
            }
            return $userarray;
        }
        public static  function user_changeinfo($id,$user,$email,$pass,$image,$city,$gender,$age,$hob)
        {
            DBCONECT::pdo_change("update userinfo u,users s set handler ='$user',email ='$email',pass='$pass',photo='$image',city='$city',gender='$gender',age='$age',hobbies='$hob' where u.id= '$id' and u.id= s.id");
        }

    }
        
?>
