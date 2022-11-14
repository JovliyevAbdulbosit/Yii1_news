<?php

class UserIdentity extends CUserIdentity {

    protected $_id;

    public function authenticate() {
        $user = User::model()->find('LOWER(email)=?', array(strtolower($this->username)));

        if (($user === null) || $this->password != $user->password) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            
            
        } else {
            if ($user->status == 1) {
                $this->_id = $user->id;
                $this->username = $user->name;
                $user->authorization_time = date("Y-m-d H:i:s");
                $user->saveAttributes(array('authorization_time'));
                $this->errorCode = self::ERROR_NONE;
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}
