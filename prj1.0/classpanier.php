<?php
include_once "classprd.php";
class panier
{
    private $tab_prd;

    public function ajo_prd(prd $prd){
        foreach($this->tab_prd as $elm){
            if($elm->getId() == $prd->getId())
            {
                $newqnt = $elm->getQnt() + 1;
                $elm->setQnt($newqnt);
                return;
            }
        }
        $this->tab_prd[] = $prd;
    }
    
    
    public function __construct()
    {
        $this->tab_prd = [];
    }

    public function get_tab_prd(){return $this->tab_prd;}
    public function set_tab_prd($tab_prd){$this->tab_prd=$tab_prd;}
    public function delete($indx){
        unset($this->tab_prd[$indx]);
        //reindex
        $this->tab_prd = array_values($this->tab_prd);
    }
    
    public function deleteselect($indx){
        unset($this->tab_prd[$indx]);
    }

    public function prix_total(){
        // this->$tab_prd[];
        $total=0;
        // if(!empty($_SESSION["prixtotal"])){
        //     $total += $_SESSION["prixtotal"]; 
        // }
        foreach($this->tab_prd as $elm)
        {
            $total += $elm->getTotal();
        }

        // $_SESSION["prixtotal"] = $total;
        return $total;
    }
}

?>