<?php

class quanlyproduct extends quanly
{
    public $ma, $style, $hang, $gia, $noibat;
    function __construct($image, $ma, $style, $ten, $hang, $gia, $trangthai, $noibat)
    {
        parent::__construct($image, $ten, $trangthai);
        $this->ma = $ma;
        $this->style = $style;
        $this->hang = $hang;
        $this->gia = $gia;
        $this->noibat = $noibat;
    }
    function add()
    {
        if (isset($this->ma, $this->ten)) {
            include 'core/listProduct.php';
            if (!isset($list[$this->ma])) {
                //upload hinh
                // $image = '';
                // if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                //     $image = myupload($_FILES['image'], 'public/upload', $er, 4);
                // }
                $list[$this->ma] = [
                    'image' => $this->image,
                    'masp' => $this->ma,
                    'style' => $this->style,
                    'tensp' => $this->ten,
                    'hang' => $this->hang,
                    'gia' => (int)$this->gia,
                    'trangthai' => $this->trangthai,
                    'noibat' => $this->noibat,
                ];
                ghifile($path, $list);
                chuyentrang('index.php?view=productlist');
            } else {
                $mg = msg('Mã sản phẩm đã tồn tại.');
                return $mg;
            }
        }
    }
    function delete()
    {
        if (!islogin('trangthai1')) {
            chuyentrang('login.php');
        }
        if (!isset($this->ma) || !$this->ma) {
            chuyentrang('index.php?view=productlist');
        }
        include 'core/listProduct.php';
        $products = $list[$this->ma] ?? false;
        if (!$products) {
            chuyentrang('index.php?view=productlist');
        }
        unset($list[$this->ma]);
        ghifile($path, $list);
        chuyentrang('index.php?view=productlist');
    }
    function edit()
    {
        include 'core/listProduct.php';
        $products = $list[$this->ma] ?? null;
        if (!$products) {
            chuyentrang('product.php');
        }
        if (isset($this->ma)) {
            if ($this->ma) {
                // $image = $products['image'];
                // if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                //     $image = myupload($_FILES['image'], 'images', $er, 4);
                // }
                $list[$products['masp']]['image'] = $this->image;
                $list[$products['masp']]['style'] = $this->style;
                $list[$products['masp']]['tensp'] =$this->ten;
                $list[$products['masp']]['hang'] = $this->hang;
                $list[$products['masp']]['gia'] = $this->gia;
                $list[$products['masp']]['trangthai'] = $this->trangthai;
                $list[$products['masp']]['noibat'] = $this->noibat;
                ghifile($path, $list);
                $products = $list[$products['masp']];
                chuyentrang('index.php?view=productlist');
            } else {
                $mg = msg('Dữ liệu không hợp lệ.');
                return $mg;
            }
        }
    }
}
