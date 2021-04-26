<?php

namespace app\modules\fs;

use Yii;
/**
 * dochub module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\fs\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {

		Yii::$app->formatter->locale = 'th_TH';
		Yii::$app->formatter->calendar = \IntlDateFormatter::TRADITIONAL;
        Yii::$app->formatter->nullDisplay = '-';
		/*
		 if (!isset(Yii::$app->i18n->translations['repair'])) {
            Yii::$app->i18n->translations['repair'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => 'backend\modules\dochub/dochub/messages'
            ];
        }
		*/
		parent::init();
        // $this->checkldapsession();
		// $this->layout = 'main';
		// $general = AppSystemParams::findOne(13);
		// $this->params['ModuleVers'] = $general->value['vers'];
        // $this->params['modulecookies'] = 'linenotifyck';
		 $this->params['title'] = 'ระบบลายนิ้วมือ';
		// $this->params['changelog'] = $general->value['changelog'];
        // custom initialization code goes here
    }

    // private function checkldapsession(){
    //     if(!Yii::$app->user->isGuest && !Yii::$app->session->get('ldapData')){
    //         Yii::$app->getUser()->logout();
    //     }
    // }
}
