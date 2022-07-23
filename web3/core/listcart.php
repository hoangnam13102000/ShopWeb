<?php
$path='data/dathang.txt';
$list=docfile($path);
function docfile($path){
    $f=fopen($path,'r');
    $list=[];
    while(!feof($f))
    {
        $str=rtrim(fgets($f));
        $info=explode('|',$str);
        if(count($info)==5)
        {
            $list[$info[0]]=[
                'name'=>$info[0],
                'address'=>$info[1],
                'tel'=>$info[2],
                'email'=>($info[3]),
                'tong'=>$info[4]
            ];
        }
    }
    fclose($f);
    return $list;
}
function ghifile($path, &$list)
{
    $content='';
    foreach ($list as $item) {
        $content .=implode('|', $item)."\n";
    }
    $f=fopen($path, 'w');
    fwrite($f, $content);
    fclose($f);
    $list=docfile($path);
}  
?>