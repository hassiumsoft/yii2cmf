<?php
/**
 * author: yidashi
 * Date: 2015/12/24
 * Time: 16:13
 */

namespace frontend\controllers;


use common\models\Page;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public function actionIndex($id)
    {
        $page = Page::find()->where(['id' => $id])->one();
        if(empty($page)) {
            throw new NotFoundHttpException('页面不存在');
        }
        $this->layout = $page->use_layout ? 'main' : false;
        return $this->render('index', [
            'page' => $page
        ]);
    }
} 