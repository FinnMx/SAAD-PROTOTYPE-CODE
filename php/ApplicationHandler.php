<?php
//object to handle the application process. API calls to countries rules e.t.c. would go here.

class ApplicationHandler{

    private $VISAs;

    public function getVisaTypes(){
        return $this->VISAs;
    }

    public function createVisaList($countries, $VISATypes, $lengths){
        $list = array();
        foreach($countries as $i){
            foreach($VISATypes as $j){
                foreach($lengths as $l){
                    array_push($list,[$i,$j,$l]);
                }
            }
        }
        $this->VISAs = $list;
    }


}
?>