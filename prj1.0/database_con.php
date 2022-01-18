<?php
    class DBCONECT{
        public static function  pdo_conect($host,$database,$user,$pass)
        {
            try
            {
                $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user,$pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo 'good conctetion<br/>';
                return $db;
            }
            catch(Exception $err)
            {
                $errmessage = $err->getMessage();
                // echo 'good conctetion';
                // echo '&nbsp';
                echo "err: $errmessage";
            }
            
        }

        //modifier
        public static function  pdo_change($req)
        {
            try
            {
                $db = self::pdo_conect("localhost","mydata","rootIX","");
                $result = $db->exec($req);
                return $result;
            }
            catch(Exception $err)
            {
                $errmessage = $err->getMessage();
                echo "err: $errmessage";
            }
            $db = null; 
            
        }

        //select
        public static function  pdo_select($req)
        {
            try
            {
                $db = self::pdo_conect("localhost","mydata","rootIX","");
                $result = $db->query($req);
                return $result;
            }
            catch(Exception $err)
            {
                $errmessage = $err->getMessage();
                echo "err: $errmessage";
            }
            $db = null; 

        }
    }



?>