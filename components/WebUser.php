<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {


    private $_model;

    function getEmail(){

        $user = $this->_model;
        return $user->email;
    }

    // Load user model.
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}