<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Helper
{
    /**
     * コメント表示する関数
     * 1. escape処理
     * 2. 改行コードを<br>に置換
     * 3. >>5 といったアンカーがある場合、リンクを付与
     * {!! Helper::comment_display($comment) !!}
     *
     * @param string $comment
     * @return string
     */
    static function comment_display($comment)
    {
        $comment = nl2br(e($comment), false);

        $current_path = request()->getRequestUri(); // /thread/13
        $replace = sprintf("<a href='%s#post$2'>$1</a>", $current_path);
        $comment = preg_replace('/(&gt;&gt;(\d+))/', $replace, $comment);

        // $current_path >>5 -> <a href="/thread/13#post5">&gt;&gt;1</a> に変換

        return $comment;
    }
    
  /**
   * X秒前、X分前、X時間前、X日前などといった表示に変換する。
   * 一分未満は秒、一時間未満は分、一日未満は時間、
   * 31日以内はX日前、それ以上はX月X日と返す。
   * X月X日表記の時、年が異なる場合はyyyy年m月d日と、年も表示する
   *
   * @param   <String> $time_db       strtotime()で変換できる時間文字列 (例：yyyy/mm/dd H:i:s)
   * @return  <String>                X日前,などといった文字列
   **/
  static function convert_to_fuzzy_time($time_db){
    $unix   = strtotime($time_db);
    $now    = time();
    $diff_sec   = $now - $unix;

    if($diff_sec < 60){
        $time   = $diff_sec;
        $unit   = "秒前";
    }
    elseif($diff_sec < 3600){
        $time   = $diff_sec/60;
        $unit   = "分前";
    }
    elseif($diff_sec < 86400){
        $time   = $diff_sec/3600;
        $unit   = "時間前";
    }
    elseif($diff_sec < 2764800){
        $time   = $diff_sec/86400;
        $unit   = "日前";
    }
    else{
      if(date("Y") != date("Y", $unix)){
          $time   = date("Y年n月j日", $unix);
      }
      else{
          $time   = date("n月j日", $unix);
      }

      return $time;
    }

    return (int)$time .$unit;
  }
}

?>
