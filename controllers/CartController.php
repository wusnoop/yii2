<?php

namespace app\controllers;
use app\models\Cart;
use app\models\Order;
use Yii;
use app\models\Good;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionOrder(){
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if ($order->load(Yii::$app->request->post())){
            $order->date = date('Y-m-d H:i:s');
            $order->sum  = $session['cart.totalPrice'];
            if ($order->save()){
                Yii::$app->mailer->compose()
                    ->setFrom(['aa@aa.ru' => 'test test'])
                    ->setTo('wusnoop@gmail.com')
                    ->setSubject('Ваш заказ принят в работу')
                    ->send();
                $session->remove('cart');
                $session->remove('cart.totalQuantity');
                $session->remove('cart.totalPrice');
                return $this->render('success', compact( 'session'));
            }
        }
        $this->layout = 'empty-layout';
        return $this->render('order', compact( 'session', 'order'));
    }

    public function actionDelete($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcCart($id);
        return $this->renderPartial('cart', compact( 'session'));

    }

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