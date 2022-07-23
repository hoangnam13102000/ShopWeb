<?php
$path='data/Product.txt';
$list=docfile($path);
function docfile($path){
    $f=fopen($path,'r');
    $list=[];
    while(!feof($f))
    {
        $str=rtrim(fgets($f));
        $info=explode('|',$str);
        if(count($info)==8)
        {
            $list[$info[1]]=[
                'image'=>$info[0],
                'masp'=>$info[1],
                'style'=>$info[2],
                'tensp'=>$info[3],
                'hang'=>$info[4],
                'gia'=>(int)$info[5],
                'trangthai'=>$info[6],
                'noibat'=>$info[7]
            ];
        }
    }
    fclose($f);
    return $list;
}
function ghifile($path,&$list)
{
    $content='';
   foreach($list as $item)
   {
       $content .=implode('|',$item)."\n";
   }
   $f=fopen($path,'w');
   fwrite($f,$content);
   fclose($f);
   $list=docfile($path);
}