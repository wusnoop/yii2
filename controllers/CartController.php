<?php

namespace app\controllers;
use app\models\Cart;
use Yii;
use app\models\Good;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalPrice');
        return $this->renderPartial('cart', compact( 'session'));
    }

    public function actionOpen(){
        $session = Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart', compact( 'session'));
    }

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