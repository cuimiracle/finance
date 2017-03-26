<?php

namespace app\controllers;
use app\models;

class CompanyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $company_dynamics_obj = new models\CompanyDynamics;
        $company_dynamics = $company_dynamics_obj->fetchAll();

        $company_news_obj = new models\CompanyNews;
        $company_news = $company_news_obj->fetchAll();

        $industry_dynamics_obj = new models\IndustryDynamics;
        $industry_dynamics = $industry_dynamics_obj->fetchAll();

        return $this->render('index', [
            'company_dynamics' => $company_dynamics,
            'company_news' => $company_news,
            'industry_dynamics' => $industry_dynamics,
        ]);
    }

}
