<?php
/**
 * Created by PhpStorm.
 * User: Mr.You
 * Date: 2015-11-25
 * Time: 16:10
 */

namespace bigm\log;

use Yii;
use bigm\log\models\Log as Dlog;
class Log
{
    public function info($data,$level = "0"){
        return $this->log($data,'INFO',$level);
    }
    public function error($data,$level = "0"){
        return $this->log($data,'ERROR',$level);
    }
    public function debug($data,$level = "0"){
        return $this->log($data,'DEBUG',$level);
    }
    public function waring($data,$level = "0"){
        return $this->log($data,'WARING',$level);
    }
    public function log($data,$tag = 'INFO', $level = "0"){
        try{
            $data = serialize($data);
        } catch (\Exception $e){
            throw new \ErrorException("Can't serialize {$data}");
        }
        try{
            $ip = Yii::$app->request->getUserIP();
            $ip = ip2long($ip);
        } catch (\Exception $e){
            $ip = 0;
        }
        $log = new DLog();
        $log->level = $level;
        $log->tag   = $tag;
        $log->data  = $data;
        $log->ip    = $ip;
        return $log->save();
    }
}