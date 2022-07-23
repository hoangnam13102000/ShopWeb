<?php
ob_start();
session_start();
function xemmang($mang)
{
    echo '<pre>', print_r($mang), '</pre>';
}
function showimg($path)
{
    if (file_exists($path))
        return $path;
    return 'public/upload/noimage.gif';
}
function myupload($file, $folder,&$error = '', $maxsize = 2, $types = ['.png', '.jpg'], $name = 'file_')
{
    //kiem tra tinh hop le cua file trc
    if ($file['error'] == 0 && $file['name']) {
        //kiểm tra dung lượng file
        $size = $maxsize * 1024 * 1024;
        if ($file['size'] > 0  && $file['size'] <= $size) {
            //kiem tra loai file
            //lay đuôi file
            $ext  = strtolower(substr($file['name'],strrpos($file['name'],'.')));
            if(in_array($ext,$types))
            {
                //tien hanh chuyen đổi tmp thanh gốc
                $fullpath = $folder.'/'.$name.microtime(true).$ext;
                if(move_uploaded_file($file['tmp_name'],$fullpath))
                {
                    return $fullpath;
                }else{
                    $error = 'Quá trình upload xảy ra lỗi.';
                    return false;
                }
            }else{
                $error = 'Loại file được phép upload: '. implode('; ',$types);
                return false;
            }
        } else {
            $error = 'Dung lượng tối đa: '. $maxsize .' MB';
            return false;
        }
    } else {
        $error = 'Dữ liệu không hợp lệ';
        return false;
    }
}
function chuyentrang($url)
{
    header('location: '.$url);
    exit;
}
function islogin($status)
{
    if (isset($_SESSION[$status]) && $_SESSION[$status]) {
        return true;
    }
    return false;
}

function msg($msg,$type='danger')
{
    return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <strong>'.$msg.'</strong> 
</div>

<script>
    $(".alert").alert();
</script>';
}