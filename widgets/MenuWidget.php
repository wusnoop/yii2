<?php

namespace app\widgets;

use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $data;
    public function run()
    {
        $this->data = new Category();
        $this->data = $this->data->getCategories();
        $this->data = $this->categoryToTemplates($this->data);
        return $this->data;
    }

    public function categoryToTemplates($data){
        ob_start();
        include __DIR__.'/template/menu.php';
        return ob_get_clean();
    }
}