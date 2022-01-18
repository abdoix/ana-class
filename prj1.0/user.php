<?php
    include_once "manage.php";

    class user
    {
        private $tab_info=[];

        public function get_user()
        {
            return $this->tab_info;
        }

        public function set_user($tab_info)
        {
            $this->tab_info = $tab_info;
        }

        public function __construct($user)
        {

            $this->tab_info=$user;
        }


    }

?>