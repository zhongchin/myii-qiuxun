<?php
namespace app\models\tools;


class ApiTool
{

      const   CODE_OK=0;
      const   CODE_PARAM_ERROR=1;
      const   CODE_PARAM_MISS=2;
      const   CODE_NO_DATA=3;
      const   CODE_ILLEGAL_REQUEST=4;
      const   CODE_SERVER_ERROR=5;
      const   CODE_VALIDATION_FAILURE=6;

      static $return_msg=array(
          "返回正确",
          "参数错误",
          "参数缺失",
          "没有数据",
          "请求错误",
          "服务器错误",
          "验证失败"
      );
    /**
     * api输出json
     * @param $code
     * @param null $content
     * @param string $message
     */
    public static function encodeMsg($code,$content=null,$message=""){
        header("content-type:application/json;charset=utf-8");
        if($code<=6&&$code>=0) {
            $message=$message?$message:self::$return_msg[$code];
        }
        echo json_encode([
            "code"=>$code,
            "content"=>$content,
            "message"=>$message
        ]);
        exit();

    }


}