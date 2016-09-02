<?php 
class EWebUser extends CWebUser{
 
    protected $_model;
    function isOperatorDinas(){
        $user = $this->loadUser();
        if ($user)
           return $user->level==LevelLookUp::OPERATOR_DINAS;
        return false;
    }
	function accountUser()
	{
		$user = $this->loadUser();
       
        return $user;
	}
	function isAdminBappeda(){
        $user = $this->loadUser();
        if ($user)
           return $user->level==LevelLookUp::ADMIN_BAPPEDA;
        return false;
    }
	
	function id_user()
	{
		if ( $this->_model === null ) {
                $this->_model = User::model()->findByPk( $this->id );
        }
        return $this->_model->id;
	}
    // Load user model.
    protected function loadUser()
    {
        if ( $this->_model === null ) {
                $this->_model = User::model()->findByPk( $this->id );
        }
        return $this->_model;
    }
}
?>