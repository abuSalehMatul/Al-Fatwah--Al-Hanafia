<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
        	[
        		'name_en' => 'Hadeeth & its Sciences',
        		'name_bn' => 'হাদীছ ও এর বিজ্ঞানসমূহ',
        		'name_ar' => ' الحديث وعلومه ',
        	],
        	[
        		'name_en' => 'The Quraan and its Sciences',
        		'name_bn' => 'কুরআন এবং এর বিজ্ঞান',
        		'name_ar' => ' القرآن وعلومه ',
        	],
        	[
        		'name_en' => 'Fiqh of the family',
        		'name_bn' => 'পরিবারের ফিকহ',
        		'name_ar' => ' فقه الأسرة ',
        	],
        ];

        foreach ($categories as $key => $category) {
        	Category::create($category);
        }
    }
}
