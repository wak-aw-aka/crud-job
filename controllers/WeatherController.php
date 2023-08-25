<?php

namespace app\controllers;

use app\models\Weather;
use yii\rest\ActiveController;
use linslin\yii2\curl;
use Yii;

/**
 * JobController implements the CRUD actions for Job model.
 */
class WeatherController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
                // Allow  methods
                'Access-Control-Request-Method' => ['POST', 'PUT', 'OPTIONS', 'GET'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Headers' => ['Content-Type'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                //'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['*'],
            ],
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\Job';

    public function actionSave()
    {
        $curl = new curl\Curl();

        $response = $curl->get('https://api.openweathermap.org/data/2.5/weather?lat=' .
            Yii::$app->params['latitude'] . '&lon=' .
            Yii::$app->params['lontitude'] . '&appid=' .
            Yii::$app->params['oneWeatherKey']
        );

        if (empty($response)){
            return ['ok' => false, 'data' => Yii::t('app','Возникла ошибка, не удалось получить данные о погоде')];
        }

        $weather = new Weather();
        $weather->date = date('Y-m-d H:i:s');
        $weather->data = $response;
        $weather->save();

        return ['ok' => true, 'data' => $weather];
    }

    public function actionList()
    {
        $weatherList = Weather::find()->orderBy(['id' => SORT_DESC])->all();

        if (empty($weatherList)) {
            return ['ok' => false, 'data' => 'Список не получен'];
        }

        return ['ok' => true, 'data' => $weatherList];
    }
}