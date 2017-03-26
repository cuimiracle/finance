<?php

namespace app\controllers;
use app\models;

class SiteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $site_banner_obj = new models\SiteBanner;
        $site_banners = $site_banner_obj->fetchAll();

        $site_detail_obj = new models\SiteDetail;
        $site_details = $site_detail_obj->fetchAll();

        $site_main_obj = new models\SiteMain;
        $site_main = $site_main_obj->fetchAll();

        $site_ideal_obj = new models\SiteIdealTrade;
        $site_ideal = $site_ideal_obj->fetchAll();

        $site_single_bottom_obj = new models\SiteSingleBottom;
        $site_single_bottom = $site_single_bottom_obj->fetchAll();

        $site_single_bottom_detail_obj = new models\SiteSingleBottomDetail;
        $site_single_bottom_detail = $site_single_bottom_detail_obj->fetchAll();

        $site_single_pic_obj = new models\SiteSinglePic;
        $site_single_pic = $site_single_pic_obj->fetchAll();

        return $this->render('index', [
            'site_banners' => $site_banners,
            'site_details' => $site_details,
            'site_main' => $site_main,
            'site_ideal' => $site_ideal,
            'site_single_bottom' => $site_single_bottom,
            'site_single_bottom_detail' => $site_single_bottom_detail,
            'site_single_pic' => $site_single_pic,
        ]);
    }

}
