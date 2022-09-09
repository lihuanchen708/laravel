<?php

namespace App\Http\Controllers;

use App\Models\EmpireUser;
use Illuminate\Http\Request;

class EmpireUserController extends Controller
{
    /*
     *
     * */
    public function login(string $vldKey = ""): \Illuminate\Http\JsonResponse
    {
        $data = [
            'data' => [
                'vldKey' => '',
                'deadline' => ''
            ],
            'msg' => '使用码错误，请加v：clh_zgb',
            'code' => '0',
        ];
        if (!empty($vldKey)){
           $user =  EmpireUser::query()->where(["vld_key"=>$vldKey])->first(["vld_key",'deadline']);
           if ($user){
               if (time() >= $user->vld_key){
                   $data["msg"] = "使用码已过期，请加v：clh_zgb ";
               }else{
                   $data["data"]["vldKey"] = $user->vld_key;
                   $data["data"]["deadline"] = $user->deadline;
                   $data["msg"] = "使用码到期时间为：" . date('Y-m-d H-i-s',$user->deadline);
                   $data["code"] = 1;
               }
           }
        }
        return response()->json($data);
    }
}
