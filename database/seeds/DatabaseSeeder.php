<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name='Admin';
        $user->email='camera_menee@hotmail.com';
        $user->password=bcrypt('1234');
        $user->address='15 หมู่ 10 ต.เตราะบอน ถ.เพชรเกษม อ.สายบุรี จ.ปัตตานี 94110';
        $user->gender=1;
        $user->dateofbirth="14/12/2540";
        $user->telephone='0937542273';
        $user->type=0;
        $user->academy='-';
        $user->lineid='menee24';
        $user->role=1;
        $user->status=1;
        $user->save();

        

        $top = new \App\TopicHomepage();
        $top->topic = 'หัวข้อที่ 1';
        $top->detail= 'รายละเอียดหัวข้อที่ 1';
        $top->save();
        $top = new \App\TopicHomepage();
        $top->topic = 'หัวข้อที่ 2';
        $top->detail= 'รายละเอียดหัวข้อที่ 2';
        $top->save();
        $top = new \App\TopicHomepage();
        $top->topic = 'หัวข้อที่ 3';
        $top->detail= 'รายละเอียดหัวข้อที่ 3';
        $top->save();

        $work = new \App\Workings();
        $work->name = 'นาย A';
        $work->academy= 'โรงเรียน A';
        $work->detail = 'รายละเอียด';
        $work->save();
        $work = new \App\Workings();
        $work->name = 'นาย B';
        $work->academy= 'โรงเรียน B';
        $work->detail = 'รายละเอียด';
        $work->save();
        $work = new \App\Workings();
        $work->name = 'นาย C';
        $work->academy= 'โรงเรียน C';
        $work->detail = 'รายละเอียด';
        $work->save();
        $work = new \App\Workings();
        $work->name = 'นาย D';
        $work->academy= 'โรงเรียน D';
        $work->detail = 'รายละเอียด';
        $work->save();
        $work = new \App\Workings();
        $work->name = 'นาย E';
        $work->academy= 'โรงเรียน E';
        $work->detail = 'รายละเอียด';
        $work->save();
        $work = new \App\Workings();
        $work->name = 'นาย F';
        $work->academy= 'โรงเรียน F';
        $work->detail = 'รายละเอียด';
        $work->save();

        
        $store = new \App\store();
        $store->store_name = 'ร้าน ABC';
        $store->detail = 'รายละเอียดร้านค้า';
        $store->manager_name = 'นาย A';
        $store->Admin_name = 'นาย B';
        $store->address = 'ที่อยู่หน้าร้าน';
        $store->telephone = '0123456789';
        $store->line_id = 'line';
        $store->facebook_page = 'facebook page';
        $store->topic_homepage = 'ยินดีต้อนรับ';
        $store->topic_workings = 'ผลงาน';
        $store->payment_show = 'กรุณาอ่านรายละเอียด "คำอธิบายการชำระเงิน" และตรวจสอบรายละเอียดคำสั่งซื้อให้ถูกต้องก่อนดำเนินการชำระเงินค่ะ';
        $store->payment_topic = 'คำอธิบายการชำระเงิน';
        $store->payment_detail = 'ลูกค้าต้องชำระเงินยอดมัดจำอย่างน้อย 25 % ของยอดคำสั่งซื้อเพื่อเป็นการยืนยันคำสั่งซื้อ';
        $store->save();
        
    }
}
