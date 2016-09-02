<?php 
class LevelLookUp{
      const OPERATOR_DINAS = "operator dinas";
      const ADMIN_BAPPEDA  = "admin bappeda";
	 
      // For CGridView, CListView Purposes
      public static function getLabel( $level ){
          if($level == self::OPERATOR_DINAS)
             return 'operator dinas';
          if($level == self::ADMIN_BAPPEDA)
             return 'admin bappeda';
		  
          return false;
      }
      // for dropdown lists purposes
      public static function getLevelList(){
          return array(
                 self::OPERATOR_DINAS=>'operator dinas',
                 self::ADMIN_BAPPEDA=>'admin bappeda',
				 
				 );
    }
}