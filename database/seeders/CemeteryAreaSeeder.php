<?php

namespace Database\Seeders;

use App\Models\CemeteryArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CemeteryAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
                'id'=>1,
                'code'=>'COLL',
                'name'=>'Collection',
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ],  
                 [
                'id'=>2,
                'code'=>'KILDARE',
                'name'=>'KILDARE',
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ],     
                 [
                'id'=>3,
                'code'=>'MEATH',
                'name'=>'CO. MEATH',
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ],    
                 [
                'id'=>4,
                'code'=>'NORTH',
                'name'=>'North Side',
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ],      
                 [
                'id'=>5,
                'code'=>'OUTSIDE',
                'name'=>'Outside Dublin',
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ],     
                 [
                'id'=>6,
                'code'=>'SOUTH',
                'name'=>'South Side',
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ],   
                 [
                'id'=>7,
                'code'=>'WICKLOW',
                'name'=>'WICKLOW',
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ],
        ];
        CemeteryArea::insert($data);
    }
}
