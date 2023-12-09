<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [
        'المستخدمين',
        'قائمة المستخدمين',
        'صلاحيات المستخدمين',

        'اضافة مستخدم',
        'تعديل مستخدم',
        'حذف مستخدم',

        'عرض صلاحية',
        'اضافة صلاحية',
        'تعديل صلاحية',
        'حذف صلاحية',   
        
        'الخدمات',
        'عرض خدمة',
        'إضافة خدمة',
        'تعديل خدمة',
        'حذف خدمة',
        'تعديل حالة الخدمة',
        'اضافة وتعديل العمال',
        'اضافة وتعديل المشرفين',
        'تقييم الخدمة',
        'تقرير1',
        'تقييم العمال'
];



foreach ($permissions as $permission) {
    
Permission::create(['name' => $permission]);
}


}
}