<?php

namespace app\api\controller;

use app\api\model\User;
use think\Controller;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;
use think\Request;

class UserController extends BaseController
{
    /**
     * @api {post} /api/user/login login
     * @apiVersion 1.0.0
     * @apiName login
     * @apiGroup User
     *
     * @apiDescription 用户登录
     *
     * @apiParam  {String} name 用户名
     * @apiParam  {String} password 密码
     *
     */
    public function login()
    {
        $name=input("name");
        $password=input("password");
        $user=User::where("name",$name)->find();
//        halt($user);
        if ($user && password_verify($password,$user['password'])){
            //验证成功以后 添加令牌
            $signer = new Sha256();
            $token = (new Builder())->setIssuer(config("api_url")) // 发送放的地址
            ->setExpiration(time() + 3600) // 设置过期时间
            ->set('uid', $user['id']) // 返回用户的id
            ->sign($signer, 'testing') // 添加数字签名
            ->getToken(); // Retrieves the generated token
            $user['signer']="testing";
            $user['token']=(string)$token;
                return $this->apiJson($user,1,"登录成功");
                }else{
            return $this->apiJson(null,-1,"账号或者密码错误");
        }

    }

    /**
     * @api {get} user/index index
     * @apiVersion 1.0.0
     * @apiName index
     * @apiGroup User
     *
     * @apiDescription 用户详情
     *

     */
    public function index()
    {
        $id=$this->uid;
        $user=User::where("id",$id)->find();
        return $this->apiJson($user);


        }
        
        
        
        

    /**
     * @api {post} user/edit edit
     * @apiVersion 1.0.0
     * @apiName edit
     * @apiGroup User
     *
     * @apiDescription 修改密码
     *
     * @apiParam  {String} name 用户名
     * @apiParam  {String} password 密码
     * @apiHeader {String} token 令牌
     *
     */
    public function edit(Request $request)
    {
        $id=$this->uid;
        $user=User::where("id",$id)->find();
        if ($request->isPost()){
            $data['password']=$request->post("password");
            $data['password']=password_hash($data['password'],1);
            if ($user->save($data)){
                return $this->apiJson($data,1,"修改密码成功");
            }else{
                return $this->apiJson(null,-1,"编辑失败");
            }

        }else{
            return $this->apiJson($user);
        }

        }


    /**
     * @api {post} user/add add
     * @apiVersion 1.0.0
     * @apiName add
     * @apiGroup User
     *
     * @apiDescription 用户添加
     *
     * @apiParam  {String} name 用户名
     * @apiParam  {String} password 密码

     *
     */


    public function add(Request $request)
    {

        if ($request->isPost()){
            $data=$request->post();
            $data['password']=password_hash($data['password'],1);
            $user=new User();
            if ($user->save($data)){
                return $this->apiJson($data);
            }else{
                return $this->apiJson(null,-1,"添加失败");
            }

        }
        
        }
        

}
