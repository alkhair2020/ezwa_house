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
            'home',
			'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'property-list',
            'property-create',
            'property-edit',
            'property-delete',
            
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            'client-print',
            'client-renew',
            'client-closed',

            'receipt-list',
            'receipt-create',
            'receipt-edit',
            'receipt-delete',
            'receipt-print',

            'expense-list',
            'expense-create',
            'expense-edit',
            'expense-delete',
            'expense-print',
            
            'lost-list',
            'lost-create',
            'lost-edit',
            'lost-delete',
            'lost-print',

            'maintenance-list',
            'maintenance-create',
            'maintenance-edit',
            'maintenance-delete',
            'maintenance-print',
            
            'cleans-list',
            'cleans-create',
            'cleans-edit',
            'cleans-delete',
            'cleans-print',

            'reports',
		];
		foreach ($permissions as $permission) {
			Permission::firstOrCreate(['name' => $permission]);
		}
	}
}