<?php

/**
 * 检测关键字
 * @param $content 需要检测的内容
 */
function checkKeyWords(String $content)
{
    $file_path = "keywords"; // 文件的绝对路径
    // 检测文件是否存在
    if (file_exists($file_path)) {
        $fp = fopen($file_path, "r"); // 以只读的方式打开
        $str = "";
        while (!feof($fp)) {
            $str .= fgets($fp); //逐行读取。如果fgets不写length参数，默认是读取1k。
        }
        fclose($fp); // 关闭文件
        if (false !== strstr($str, $content)) {
            echo "存在敏感词";
            die;
        }
    } else {
        echo "文件不存在";
        die;
    }
}

// 调用
$txt = "敏感词内容";
checkKeyWords($txt);
