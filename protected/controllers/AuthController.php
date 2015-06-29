<?php

class AuthController extends Controller {
        
        
        public $rememberMe;
        
        public function actionRegistration(){
            
            if(!yii::app()->user->isGuest){
                $this->redirect("/");
            }
            
            $user = new User();
            $user->serScenario('registration');
            
            if(isset($_POST['User'])){
                $user->attributes = $_POST['User'];
                
                if($user->validate() ){
                   
                    if(!$this->existUserEmail($user->email)){
                        $salt = $this->createSalt();
                        $user->password = $user->hashPassword($user->password).$salt;
                        if($user->save()){
                             
                            $this->saveSalt($user->id, $salt);
                            //$user->sendRegistrationEmail($storePassword);
                            // TODO : flash message o tom ze sa pouzivatel registroval
                            $this->redirect("/");
                        }
                    }else{
                        $user->addError('email', "Tento email bohužial existuje.");
                    }

                }		
            }
  
            $this->render('registration',array(
                    'user' => $user,
            ));
                
	}
        
        public function actionLogin() {
            
            if(!yii::app()->user->isGuest){
                $this->redirect("/");
            }
            
            $user = new User();
            $loginForm = new LoginForm();
            
            if(isset($_POST['LoginForm'])){
                $loginForm->attributes = $_POST['LoginForm'];
                
                if($loginForm->validate()){
                    $identity = new UserIdentity($loginForm->username, $loginForm->password);
                    if($identity->authenticate()){
                       yii::app()->user->login($identity);
                        // TODO : flashmessage
                        $this->redirect("/");  
                    }
                }
            }
            
            $this->render('login',array(
                'user' => $user,
                'loginForm' => $loginForm,
            ));
	}
        
        
        public function actionForgottenPassword() {
            
            if(!yii::app()->user->isGuest){
                $this->redirect("/");
            }
            
            $user = new User();
            $user->setScenario("forgottenPassword");
            if(isset($_POST['User'])){
                $user->attributes = $_POST['User'];
                if($user->validate()){
                   if($this->existUserEmail($user->email)){
                       $model = User::model()->findByAttributes(array("email" => $user->email));
                       $this->changePasswordByEmail($user->email);
                       //$this->postEmailAboutChangePassword($user->email);
                       
                   }
                }
            }
            
            $this->render('forgottenPassword',array(
                'user' => $user,
            ));
	}
        
        
         public function actionChangePassword() {
             
         }
        
        public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        
        public function changePasswordByEmail($email){
            $user = User::model()->findByAttributes(array('email' => $email));
            $modelSalt = Salt::model()->findByPk($user->salt->id);
            $salt = $this->createSalt();
            $modelSalt->salt = $salt;
            $user->password = $user->hashPassword($this->createPassword()).$salt;
            
            if($user->update(array('password'))){
                $modelSalt->update(array('salt'));
            }
        }
        
        
        public function postEmailAboutChangePassword($email){
            
        }
        
        public function createPassword() {
            
            $password = null;
            $desired_length = 8;
            $string = "0123456789abcdefghijklmnopqrstuvxyzABCDEFGHIJKLMNOPQRSTUVXYZ";
            
            for($length = 0; $length < $desired_length; $length++) {
                $randString = rand(1 , strlen($string)-1);
                $password .= $string[$randString];
            }
            var_dump($password);           
            return $password;
        }


       public function existUserEmail($email){
            $user = User::model()->findByAttributes(array('email' => $email));
            if($user){
                return true;
            }else{
                return false;
            }
        }


        public function createSalt(){
            
            $salt = uniqid(mt_rand(), true);
            return $salt;            
        }
        
        
        public function saveSalt($userId, $salt){
            $modelSalt = new Salt();
            $modelSalt->salt = $salt;
            if($modelSalt->save()){
                $userHasSalt = new UserHasSalt();
                $userHasSalt->userId = $userId;
                $userHasSalt->saltId = $modelSalt->id;
                $userHasSalt->save();
            }         
        }

        

        // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}