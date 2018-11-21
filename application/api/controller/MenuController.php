<?php

namespace app\api\controller;

use app\api\model\Menu;
use think\Controller;
use think\Request;

class MenuController extends BaseController
{

    /**
     * @api {get} menu/index index
     * @apiVersion 1.0.0
     * @apiName index
     * @apiGroup Menu
     *
     * @apiDescription 菜品列表
     *

     * @apiHeader {String} token 令牌
     *
     */
    public function index()
    {
        $id=$this->uid;
        $menus=Menu::where("user_id",$id)->select();
        return $this->apiJson($menus);

    }
}
