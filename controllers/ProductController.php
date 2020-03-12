<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 05.03.2019
 * Time: 13:02
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;


class ProductController extends AppController
{
    public function actionView($id) {
//        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product))
            throw new \yii\web\HttpException(404, 'Такой товара нет');

        $hits = Product::find()->where(['hit' => '1'])->limit(5)->all();
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }
}