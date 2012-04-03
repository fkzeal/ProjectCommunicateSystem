<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {

        
       /* $users = array(
            // username => password
            'demo' => 'demo',
            'admin' => 'admin',
        );
         * 
         */
        
//        if(){
//  echo "<script>alert('登录失败!');history.back();</script>";
//  
//  }
        $hostname = "software.nju.edu.cn";
        $username = strtolower($this->username);
        $userpwd = $this->password;
        $users = User::model()->findByAttributes(array('UserName'=>$this->username));
//        if ($users === NULL)
//            $this->errorCode = self::ERROR_USERNAME_INVALID;
//        else 
            if (
                    !$mbox=@imap_open("{".$hostname.":110/pop3}",$username,$userpwd)
//                    $users->UserPassword !== md5 ($this->password)
                            )
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
        {
            if(empty ($users)){
                $users = new User;
                $users->NickName = $this->username;
                $users->UserName = $this->username;
                $users->insert();
            }
            $this->setState('id', $users->ID);  
//            $this->setState('username', $users->UserName);  
            $this->setState('nick',$users->NickName);
            $this->setState('authority', $users->Authority);
            $this->errorCode = self::ERROR_NONE;
        }
        return!$this->errorCode;
    }

}