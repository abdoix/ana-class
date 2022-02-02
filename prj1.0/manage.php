<?php
    include_once "database_con.php";
    include_once "classpanier.php";
    include_once "classprd.php";
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



        public static function user_test($handler,$pass)
        {
            
            $result = DBCONECT::pdo_select("select users.id,handler,email,pass,photo,city,gender,age,hobbies from users,userinfo where users.id = userinfo.id and users.handler = '$handler' and users.pass = '$pass'");
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





        //cat
        public static function get_cat($catid)
        {
            $result = DBCONECT::pdo_select("select * from cate where idcat = '$catid'");
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
        //cards
        public static function get_card_by_id($catid,$sordt,$limit)
        {
            if($sordt == "stars")
            {
                return DBCONECT::pdo_select("select * from card where idcat = '$catid' order by($sordt) desc LIMIT $limit,6;");
            }
            else
            {
                return DBCONECT::pdo_select("select * from card where idcat = '$catid' order by($sordt) LIMIT $limit,6;");
            }
        }
        public static  function get_count($catid)
        {
            $result = DBCONECT::pdo_select("select count(*) from card  where idcat = '$catid'");
            while($row = $result->fetch())
            {
                $count = $row[0];
            }
            $result->closeCursor();
            return ceil($count/6);
        }

        public static  function panier()
        {
            session_start();
            $id = $_SESSION["id"];
            $mypanier = $_SESSION["panier"];
            $myarray =  $mypanier->get_tab_prd();
            $myjson= array();
            foreach($myarray as $elm)
            {
                $getid = $elm->getId();
                $getname = $elm->getName();
                $getdsc = $elm->getDsc();
                $getphoto = $elm->getImg();
                $getprice = $elm->getPrice();
                // $oldprice = $getprice + rand(1,10);
                $getqnt = $elm->getQnt();
                // $gettotal = $elm->getTotal();
                $myjson[] = [$getid,$getname,$getdsc,$getphoto,$getprice,$getqnt];
                // echo json_encode($myjson);
            }
            $json = json_encode($myjson);

            DBCONECT::pdo_change("insert into panier values($id,'$json') ON DUPLICATE KEY update panierobj = '$json' ");
            session_destroy();

        }
        public static function setpanier()
        {
            // session_start();
            $id = $_SESSION["id"];
            $mypanier = $_SESSION["panier"];
            $cur = DBCONECT::pdo_select("select * from panier where iduser = '$id'");
            while($row = $cur->fetch())
            {
                $myarray = $row[1];
            }
            $cur->closeCursor();
            if(!empty($myarray)){
                $myarray = json_decode($myarray);
                foreach($myarray as $elm)
                {
                    $objt = new prd($elm[0],$elm[1],$elm[2],$elm[3],$elm[4]);
                    $objt->setQnt($elm[5]);
                    $mypanier->ajo_prd($objt);
                }
            
            }


        }


    }
        
?>
