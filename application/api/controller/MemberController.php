<?php

namespace app\api\controller;

use app\api\model\Member;
use think\Controller;
use think\Request;

class MemberController extends BaseController
{
    /**
     * 会员登录接口
     * @param Request $request
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login(Request $request)
    {
        $username=$request->post("username");
        $password=$request->post("password");
     $result=Member::where("username",$username)->select();
     if ($result && password_verify($password,$result[0]['password'])){
          return $this->apiJson($result);
         }else{

         return $this->apiJson(null,-1,"账号或者密码错误");
     }

    }

    /**
     * 注册
     * @param Request $request
     * @return \think\response\Json
     */

    public function reg(Request $request)
    {
        $post=$request->post();
        $post['password']=password_hash($post['password'],1);
        $member=new Member();
        $re=$member->save($post);
//        halt($re);
        if ($re){
            return $this->apiJson($post);
        }else{
            return $this->apiJson(null,-1,"注册失败");
        }


    }

    /**修改密码
     * @param Request $request
     */


    public function edit(Request $request,$id)
    {
        $member=Member::find($id);

        if ($request->isPost()){
//            halt($member);
            $password=$request->post("password");
            $member['password']=password_hash($password,1);
//        halt($member);

            $result=$member->save($member['password']);
//        halt($result);
            if ($result){

                return $this->apiJson($member);
            }else{
                return $this->apiJson(null,-1,"修改密码失败");
            }

        }else{
            return $this->apiJson($member);

        }
//

    }

    /**会员删除
     * @param $id
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */

    public function del($id)
    {
        $member=Member::find($id);
        $re=$member->delete();
        if ($re){
            return $this->apiJson($re);
        }else{
            return $this->apiJson(null,-1,"删除失败");
        }

    }

    /**会员列表
     * @param Request $request
     * @return \think\response\Json
     * @throws \think\exception\DbException
     */

    public function index(Request $request)
    {
        $members=Member::all();
        return $this->apiJson($members);

    }





}
