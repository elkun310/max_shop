<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>bcrypt('123456'),'full'=>'administrator','address'=>'Thường tín','phone'=>'0356653301','level'=>1],
            ['id'=>2,'email'=>'zimpro@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn thế vũ','address'=>'Bắc giang','phone'=>'0356654487','level'=>2],
            ['id'=>3,'email'=>'phucnguyenthe0809@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn thế phúc','address'=>'Huế','phone'=>'0352264487','level'=>1],
            ['id'=>4,'email'=>'zimpro9x@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Văn Công','address'=>'Nghệ An','phone'=>'0357846659','level'=>2],
            ['id'=>5,'email'=>'hadz@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Quốc Hà','address'=>'Hà Nội','phone'=>'01689938822','level'=>1],
            ['id'=>6,'email'=>'nguyenha9772@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Quốc Hà','address'=>'Hà Nội','phone'=>'0389938822','level'=>1],
        ]);
    }
}
