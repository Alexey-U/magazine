<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
DB::table('categories')->insert([
          	[
    		'name' => 'Рубашки',
            'sort_order' => 1,
            'status' => 1,
    		],
    		[
    		'name' => 'Платья',
            'sort_order' => 5,
            'status' => 1,
    		],
    	    	[
    		'name' => 'Футболки',
            'sort_order' => 3,
            'status' => 1,
    			],
    	    	[
    		'name' => 'Майки',
            'sort_order' => 4,
            'status' => 1,
    	],
    	    	[
    		'name' => 'Сумки',
            'sort_order' => 2,
            'status' => 1,
    	],
    	    	[
    		'name' => 'Чемоданы',
            'sort_order' => 6,
            'status' => 1,
    	],
    	    	[
    		'name' => 'Брюки',
            'sort_order' => 7,
            'status' => 1,
    	],
        [
    		'name' => 'Пиджаки',
            'sort_order' => 8,
            'status' => 1,
    	],
    	    	[
    		'name' => 'Галстуки',
            'sort_order' => 9,
            'status' => 1,
    	]]);
    }
}
