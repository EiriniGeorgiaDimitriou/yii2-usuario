<?php 
namespace Da\User\Controller;

class Controller extends \yii\web\Controller{
  
  
  
   public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest) return parent::beforeAction($action);
        $session = Yii::$app->session;
        //change the language based on user selection
        !$session->isActive ? $session->open() : $session->close();
        Yii::$app->language = $session->get('language');


        return parent::beforeAction($action); // or false to not run the action
    }
}
