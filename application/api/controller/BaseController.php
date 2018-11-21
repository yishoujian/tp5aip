<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;


class BaseController extends Controller
{
    public $uid;
    public function __construct(Request $request )
    {
        parent::__construct($request);
        header('Access-Control-Allow-Origin:*');
        $allow=[
          "user/login",
            "user/add"
        ];

        $url=strtolower($request->controller()."/".$request->action());
//        halt(in_array($url,$allow));
        if (in_array($url,$allow)===false){
            //得到token
            $token=input("token")??$request->header("token");
            $signer1=config("signer");
            $token = (new Parser())->parse((string) $token); // Parses from a string

            //验证
            $data = new ValidationData(); // It will use the current time to validate (iat, nbf and exp)
            $data->setIssuer(config("api_url"));
            $signer = new Sha256();
            if ($token->verify($signer,$signer1)===false){
                $data=[
                    "status"=>-2,
                    "msg"=>"数字前面错误",
                    "data"=>null,
                ];

                exit(json_encode($data)) ;
                }

            if ($token->validate($data)===false){
                $data=[
                    "status"=>-2,
                    "msg"=>"令牌错误",
                    "data"=>null,
                ];

                exit(json_encode($data)) ;

            }else{
                $this->uid=$token->getClaim('uid'); // will print "1"
            }
        }
//        exit(111);




    }
    public function apiJson($data,$status=1,$msg="success")
    {
        $data=[
          "status"=>$status,
          "msg"=>$msg,
          "data"=>$data,
        ];

        return json($data);
        }












}
