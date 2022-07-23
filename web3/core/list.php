<?php
$path='data/User.txt';
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
                'username'=>$info[1],
                'password'=>$info[2],
                'name'=>$info[3],
                'address'=>$info[4],
                'email'=>$info[5],
                'status'=>$info[6],
                'role'=>$info[7],
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