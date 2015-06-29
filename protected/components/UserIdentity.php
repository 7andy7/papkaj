<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    
    const ERROR_USERNAME_OR_PASS_INVALID = 10;
    const ERROR_USER_BLOCKED = 1;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
            $user = User::model()->find('email = :email', array('email' => $this->username));
            if ($user) {
                if($user->active == false){
                        $this->errorCode = self::ERROR_USER_BLOCKED;
                }elseif ($user->hashPassword($this->password).$user->salt->salt == $user->password) {
                        $this->errorCode = self::ERROR_NONE;
                        //$this->username = $user->email;
                        $user->lastLogin = date('Y-m-d H:i:s');
                        $user->save(false);
                        } else {
                                $this->errorCode = self::ERROR_USERNAME_OR_PASS_INVALID;
                        }

                } else {
                        $this->errorCode = self::ERROR_USERNAME_OR_PASS_INVALID;
                }
                
                return !$this->errorCode;
            
	}
        
        
}