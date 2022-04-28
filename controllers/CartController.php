<?php

namespace app\controllers;
use app\models\Cart;
use Yii;
use app\models\Good;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd($name){
        $good = new Good();
        $good = $good->getOneGood($name);
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($good);
        return $this->renderPartial('cart', compact('good', 'session'));
    }
}