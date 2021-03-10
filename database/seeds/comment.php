<?php

use Illuminate\Database\Seeder;

class comment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->delete();
        DB::table('comment')->insert([
            ['id'=>1,'name'=>'Lương Xuân Trường','email'=>'truonglx@gmail.com','content' =>'Đây là sản phẩm đẹp ','state'=>'1','product_id'=>1],
            ['id'=>2,'name'=>'Nguyễn Quang Hải','email'=>'haicon19@gmail.com','content' =>'Đây là sản phẩm đẹp ','state'=>'0','product_id'=>2],
            ['id'=>3,'name'=>'Nguyễn Phong Hồng Duy','email'=>'duypinky@gmail.com','content' =>'Đây là sản phẩm đẹp ','state'=>'0','product_id'=>2],
            ['id'=>4,'name'=>'Nguyễn Quốc Hiếu','email'=>'hieumux392002@gmail.com','content' =>'Đây là sản phẩm đẹp ','state'=>'1','product_id'=>3],
            ['id'=>5,'name'=>'Phan Thị Oanh','email'=>'bep2001@gmail.com','content' =>'Đây là sản phẩm đẹp ','state'=>'1','product_id'=>3],
            ['id'=>6,'name'=>'Đinh Văn Nam','email'=>'namdinh@gmail.com','content' =>'Đây là sản phẩm đẹp ','state'=>'1','product_id'=>3],
            ]);
    }
}
