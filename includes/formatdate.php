<?php 

    function formatsimpledate($string, $language,$seprator){
      $stringEx=explode('-',$string);
      if($language=='fr'){
        $year=array('01'=>"Janvier",'02'=>'fevrier','03'=>'mars','04'=>'avril','05'=>'mai','06'=>'juin','07'=>'juillet','08'=>'aout','09'=>'septembre','10'=>'octobre','11'=>'novembre','12'=>'decembre');
      }elseif($language=='es'){
        $year=array('01'=>"enero",'02'=>'febrero','03'=>'marso','04'=>'april','05'=>'mayo','06'=>'juno','07'=>'julio','08'=>'augosto','09'=>'septiembre','10'=>'octubre','11'=>'noviembre','12'=>'deciembre');
      }else{
        $year=array('01'=>"Janary",'02'=>'febuary','03'=>'march','04'=>'april','05'=>'may','06'=>'june','07'=>'july','08'=>'august','09'=>'september','10'=>'october','11'=>'november','12'=>'december');
      }
      return $stringEx[2].$seprator.$year[$stringEx[1]].$seprator.$stringEx[0];
    }


?>