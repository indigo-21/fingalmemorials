<?php

namespace Database\Seeders;

use App\Models\Cemetery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CemeterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'id'=>1,
                'code'=>'KILDAREATHY',
                'name'=>'ATHY',
                'address1'=>'Athy',
                'address2'=>'Co. Kildare',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'.',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>2,
                'code'=>'NORTHCLON',
                'name'=>'Clontarf Cemetery',
                'address1'=>'clontarf',
                'address2'=>'Dublin 3',
                'address3'=>'',
                'postcode'=>'D.3',
                'town'=>'',
                'county'=>'',
                'phone'=>'xxxxxx',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>3,
                'code'=>'NORTHGRE',
                'name'=>'GREENOGUE',
                'address1'=>'.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>4,
                'code'=>'NORTHHOLMPATRICK',
                'name'=>'Holmpatrick Cemetery',
                'address1'=>'Skerries',
                'address2'=>'County Dublin',
                'address3'=>'',
                'postcode'=>'??',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>5,
                'code'=>'NORTHNK',
                'name'=>'Not Known',
                'address1'=>'??',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'??',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>6,
                'code'=>'NORTHPAPPINS',
                'name'=>'St. Pappins Cemetery',
                'address1'=>'Santry',
                'address2'=>'Dublin 9.',
                'address3'=>'',
                'postcode'=>'9',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>7,
                'code'=>'NORTHPORT',
                'name'=>'portlaoise',
                'address1'=>'.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>8,
                'code'=>'NORTHROLE',
                'name'=>'Rolestown Cemetery',
                'address1'=>'swords',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'CO. DUBLI',
                'town'=>'',
                'county'=>'',
                'phone'=>'8460049',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>9,
                'code'=>'NORTHROLESTOWN',
                'name'=>'Rolestown',
                'address1'=>'tba',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'TBA',
                'town'=>'',
                'county'=>'',
                'phone'=>'tba',
                'email'=>'tba',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>10,
                'code'=>'NORTHSTPETERPAUL',
                'name'=>'St Peter and Pauls Cemetery',
                'address1'=>'??',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'??',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>11,
                'code'=>'OUTSIDEATH',
                'name'=>'athboy',
                'address1'=>'?',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'?',
                'town'=>'',
                'county'=>'',
                'phone'=>'?',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>12,
                'code'=>'OUTSIDECAL',
                'name'=>'Calary Cemetery',
                'address1'=>'Calary Churchyard Cemetery',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'CO.WICKLO',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>13,
                'code'=>'OUTSIDECAS',
                'name'=>'Cashel',
                'address1'=>'.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>14,
                'code'=>'OUTSIDECLON',
                'name'=>'Cloncurry',
                'address1'=>'.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>15,
                'code'=>'OUTSIDECROSSKEYS',
                'name'=>'St. Mathews Church',
                'address1'=>'Crosskeys Cemetery',
                'address2'=>'Cavan.',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'087 9143344',
                'email'=>'.',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>16,
                'code'=>'OUTSIDECUL',
                'name'=>'Cullis',
                'address1'=>'Co Cavan',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>17,
                'code'=>'OUTSIDEEADES',
                'name'=>'Eadestown Cemetery',
                'address1'=>'Eadestown',
                'address2'=>'Co. Kildare',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>18,
                'code'=>'OUTSIDEKILCOCK',
                'name'=>'KILCOCK',
                'address1'=>'087 6534134',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'01 6284308',
                'email'=>'thomasokeeffe727@gmail.com',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>19,
                'code'=>'OUTSIDEKILQUADE',
                'name'=>'Priest Newtown Cemetery',
                'address1'=>'Kilquade',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'CO WICKLO',
                'town'=>'',
                'county'=>'',
                'phone'=>'01-2819217',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>20,
                'code'=>'OUTSIDEKILSHANROE',
                'name'=>'Kilshanroe Cemetery',
                'address1'=>'Co. Kildare',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>21,
                'code'=>'OUTSIDELARAGHBRYAN',
                'name'=>'Laraghbryan Cemetery',
                'address1'=>'Maynooth',
                'address2'=>'Co. Kildare',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>22,
                'code'=>'OUTSIDELONGFORD',
                'name'=>'Longford Cemetery',
                'address1'=>'Longford Town',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>23,
                'code'=>'OUTSIDELONGWOOD',
                'name'=>'Longwood Cemetery',
                'address1'=>'Longwood',
                'address2'=>'Enfield',
                'address3'=>'Co. Meath',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>24,
                'code'=>'OUTSIDEMOYN',
                'name'=>'MOYNALVEY (CHURCHYARD)',
                'address1'=>'KILTALE PARISH',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'.',
                'email'=>'.',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>25,
                'code'=>'OUTSIDERADFORD',
                'name'=>'Radford',
                'address1'=>'Wicklow.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'871880411',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>26,
                'code'=>'OUTSIDERAT',
                'name'=>'Rathoath',
                'address1'=>'.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>27,
                'code'=>'OUTSIDEROSCOMMON',
                'name'=>'St. Comans Cemetery',
                'address1'=>'St. Comans Cemetery',
                'address2'=>'Roscommon',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>28,
                'code'=>'OUTSIDESTIBARS',
                'name'=>'St Ibars Cemetery',
                'address1'=>'Crosstown',
                'address2'=>'Wexford',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>29,
                'code'=>'OUTSIDESTRAFFAN',
                'name'=>'Straffan Cemetery',
                'address1'=>'.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>30,
                'code'=>'OUTSIDETALLENSTOWN',
                'name'=>'Tallenstown Cemetery',
                'address1'=>'Tallenstown',
                'address2'=>'Ardee',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>31,
                'code'=>'OUTSIDETEMP',
                'name'=>'Templekierean',
                'address1'=>'Navan',
                'address2'=>'Co. Meath',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>32,
                'code'=>'OUTSIDEWALSHISLAND',
                'name'=>'Walsh Island',
                'address1'=>'Walsh Island',
                'address2'=>'Co.Offaly',
                'address3'=>'',
                'postcode'=>'CO.OFFALY',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>33,
                'code'=>'SOUTHCONFEY',
                'name'=>'Confey Cemetery',
                'address1'=>'SOUTH DUBLIN COUNTY COUNCIL',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>34,
                'code'=>'SOUTHDEANSGRANGE',
                'name'=>'Deansgrange Cemetery',
                'address1'=>'Deansgrange',
                'address2'=>'Blackrock',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'01-2893416',
                'email'=>'',
                'cemetery_group_id'=>9,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>35,
                'code'=>'SOUTHKILMASHOGUE',
                'name'=>'Kilmashogue Cemetery',
                'address1'=>'Edmondstown Road',
                'address2'=>'Rathfarnham',
                'address3'=>'',
                'postcode'=>'DUBLIN 16',
                'town'=>'',
                'county'=>'',
                'phone'=>'087-2502692',
                'email'=>'',
                'cemetery_group_id'=>14,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>36,
                'code'=>'SOUTHMAELRUANS',
                'name'=>'St.Maelruans',
                'address1'=>'St.Maelruans',
                'address2'=>'Tallaght',
                'address3'=>'',
                'postcode'=>'DUBLIN 24',
                'town'=>'',
                'county'=>'',
                'phone'=>'4513608-Hazel',
                'email'=>'',
                'cemetery_group_id'=>15,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>37,
                'code'=>'SOUTHMOUNTJEROME',
                'name'=>'Mount Jerome Cemetery',
                'address1'=>'Mount Jerome',
                'address2'=>'Harolds Cross',
                'address3'=>'',
                'postcode'=>'DUBLIN 6',
                'town'=>'',
                'county'=>'',
                'phone'=>'01-4971269',
                'email'=>'',
                'cemetery_group_id'=>16,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>38,
                'code'=>'SOUTHROOSKE',
                'name'=>'ROOSKE',
                'address1'=>'DUNBOYNE',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>39,
                'code'=>'SOUTHROUNDTOWER',
                'name'=>'Round Tower',
                'address1'=>'Round Tower',
                'address2'=>'Church of Ireland',
                'address3'=>'Clondalkin',
                'postcode'=>'DUBLIN 22',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>40,
                'code'=>'WICKLOWRADFORD',
                'name'=>'Radford Cemetery',
                'address1'=>'Wicklow.',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'.',
                'email'=>'.',
                'cemetery_group_id'=>1,
                'cemetery_area_id'=>7,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>41,
                'code'=>'FINGAL',
                'name'=>'Fingal Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>42,
                'code'=>'BALGRIFFIN',
                'name'=>'Balgriffin Cemetery',
                'address1'=>'Carrs Lane',
                'address2'=>'Balgriffin',
                'address3'=>'Dublin 17',
                'postcode'=>'17',
                'town'=>'',
                'county'=>'',
                'phone'=>'864183787',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>43,
                'code'=>'ARDLA',
                'name'=>'Ardla Cemetery',
                'address1'=>'Skerries',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>44,
                'code'=>'DONABATE',
                'name'=>'Donabate Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>45,
                'code'=>'FLEMINGTON',
                'name'=>'Flemington Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>46,
                'code'=>'WHITESTOWN',
                'name'=>'Whitestown Cemetery',
                'address1'=>'Rush',
                'address2'=>'Co. Dublin',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>47,
                'code'=>'WARD',
                'name'=>'Ward Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>48,
                'code'=>'GARRISTOWN',
                'name'=>'Garristown Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>49,
                'code'=>'CHAPEL',
                'name'=>'Chapelmidway Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>50,
                'code'=>'GRALLAGH',
                'name'=>'The Grallagh Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>51,
                'code'=>'KENURE',
                'name'=>'Kenure Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>52,
                'code'=>'KILBARRACK',
                'name'=>'Kilbarrack Cemetery',
                'address1'=>'Howth Road,',
                'address2'=>'Sutton,',
                'address3'=>'Dublin 13.',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>53,
                'code'=>'TEMPLEOGUE',
                'name'=>'Templeogue Cemetery',
                'address1'=>'Willington Road',
                'address2'=>'Templeogue',
                'address3'=>'Dublin 6W',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>54,
                'code'=>'BOHERNABREENA',
                'name'=>'Bohernabreena Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>55,
                'code'=>'BALLYBOUGHAL',
                'name'=>'Ballyboughal Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>56,
                'code'=>'BALLYGLASS',
                'name'=>'Ballyglass Cemetery',
                'address1'=>'Mullingar',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>57,
                'code'=>'BALSCADDEN',
                'name'=>'Balscadden Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>58,
                'code'=>'MALAHIDE',
                'name'=>'Malahide Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>59,
                'code'=>'FINTAINS',
                'name'=>'St. Fintains Cemetery',
                'address1'=>'Sutton',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>60,
                'code'=>'OLD ABBEY',
                'name'=>'Old Abbey Cemetery',
                'address1'=>'Howth',
                'address2'=>'Co Dublin',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>61,
                'code'=>'ST MARYS',
                'name'=>'St Marys Church and Cemetery',
                'address1'=>'Howth',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>20,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>62,
                'code'=>'COLMCILLES',
                'name'=>'St. Colmcilles Cemetery',
                'address1'=>'Swords',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>20,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>63,
                'code'=>'NEWCASTLE',
                'name'=>'Newcastle Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>64,
                'code'=>'SAGGART',
                'name'=>'Saggart Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>65,
                'code'=>'GLENCULLENNORTHGRE',
                'name'=>'Glencullen Cemetery',
                'address1'=>'St Patricks Graveyard',
                'address2'=>'Glencullen',
                'address3'=>'Co. Wicklow',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'2955594 or 0868199104',
                'email'=>'',
                'cemetery_group_id'=>21,
                'cemetery_area_id'=>7,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>66,
                'code'=>'BARRETS',
                'name'=>'Barrettstown Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>67,
                'code'=>'GLAS',
                'name'=>'Glasnevin Cemetery',
                'address1'=>'Old Finglas Road',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>23,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>68,
                'code'=>'DAR',
                'name'=>'Dardistown Cemetery',
                'address1'=>'Collinstown Cross',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>23,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>69,
                'code'=>'PAL',
                'name'=>'Palmerstown Cemetery',
                'address1'=>'Palmerstown',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>23,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>70,
                'code'=>'NEWLANDS',
                'name'=>'Newlands Cross Cemetery',
                'address1'=>'Newlands Cross',
                'address2'=>'Tallaght',
                'address3'=>'Dublin 24.',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>23,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>71,
                'code'=>'DERR',
                'name'=>'Derrockstown Cemetery',
                'address1'=>'Dunshaughlin',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>22,
                'cemetery_area_id'=>3,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>72,
                'code'=>'SHAN',
                'name'=>'Shanganagh Cemetery',
                'address1'=>'Shanganagh',
                'address2'=>'Co Dublin',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>9,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>73,
                'code'=>'CORB',
                'name'=>'St Corbans Cemetery',
                'address1'=>'Naas',
                'address2'=>'Co Kildare',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>74,
                'code'=>'MARG',
                'name'=>'St Margarets Cemetery',
                'address1'=>'St Margarets',
                'address2'=>'Co. Dublin',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>75,
                'code'=>'CALVARY',
                'name'=>'Calvary Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>22,
                'cemetery_area_id'=>3,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>76,
                'code'=>'PORT',
                'name'=>'PORTMARNOCK CEMETERY',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>77,
                'code'=>'BODEN',
                'name'=>'BODENSTOWN CEMETERY',
                'address1'=>'BODENSTOWN',
                'address2'=>'CO KILDARE',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'860873744',
                'email'=>'',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>78,
                'code'=>'BROWN',
                'name'=>'BROWNSTOWN CEMETERY',
                'address1'=>'LOUGHSTOWN',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'.',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>79,
                'code'=>'CAS',
                'name'=>'Castleknock Cemetery',
                'address1'=>'Castleknock',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>3,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>80,
                'code'=>'ESKER',
                'name'=>'Esker Cemetery',
                'address1'=>'Lucan',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>81,
                'code'=>'DONA',
                'name'=>'Donacomper Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>82,
                'code'=>'DEANS',
                'name'=>'Deansgrange Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>9,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>83,
                'code'=>'CRUAGH',
                'name'=>'Cruagh Cemetery',
                'address1'=>'Cruagh Road',
                'address2'=>'Rathfarnham',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>18,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>84,
                'code'=>'DONAMORE',
                'name'=>'St Patricks Church',
                'address1'=>'Donamore',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>20,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>85,
                'code'=>'MOY',
                'name'=>'Moyglare Cemetery',
                'address1'=>'Maynooth',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>86,
                'code'=>'NAUL',
                'name'=>'Naul Cemetery',
                'address1'=>'Naul',
                'address2'=>'Co. Meath.',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>87,
                'code'=>'HOLY',
                'name'=>'HOLY TRINITY CHURCH',
                'address1'=>'DURROW',
                'address2'=>'co laois',
                'address3'=>'',
                'postcode'=>'R32CK11',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>20,
                'cemetery_area_id'=>5,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>88,
                'code'=>'BLUEBELL',
                'name'=>'BLUEBELL CEMETERY',
                'address1'=>'Old Naas Road',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>24,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>89,
                'code'=>'BALDUNGAN',
                'name'=>'BALDUNGAN CEMETERY',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>90,
                'code'=>'ALLEN',
                'name'=>'ALLEN CEMETERY',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>91,
                'code'=>'MAINHAM',
                'name'=>'MAINHAM CEMETERY',
                'address1'=>'CLANE',
                'address2'=>'CO. KILDARE.',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>92,
                'code'=>'NEWBRIDGE',
                'name'=>'NEWBRIDGE CEMETERY',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>13,
                'cemetery_area_id'=>2,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>93,
                'code'=>'MULHUDDART',
                'name'=>'MULHUDDART CEMETERY',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>10,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                
                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>94,
                'code'=>'MOUNT VENUS',
                'name'=>'MOUNT VENUS CEMETERY',
                'address1'=>'ROCKBROOK',
                'address2'=>'RATHFARNHAM',
                'address3'=>'DUBLIN 16',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>17,
                'cemetery_area_id'=>6,
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>95,
                'code'=>'HOLLYWOOD',
                'name'=>'Hollywood Cemetery',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>6,
                'cemetery_area_id'=>4,
                'created_by'=>1,
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
                
                
                            
                [
                'id'=>96,
                'code'=>'CLONSILLA',
                'name'=>'CLONSILLA CEMETERY',
                'address1'=>'',
                'address2'=>'',
                'address3'=>'',
                'postcode'=>'',
                'town'=>'',
                'county'=>'',
                'phone'=>'',
                'email'=>'',
                'cemetery_group_id'=>3,
                'cemetery_area_id'=>4,
                'created_by'=>1,                
                'created_at'=>Null,
                'updated_at'=>Null,
                'deleted_at'=>Null
                ] ,
        ];
        Cemetery::insert($data);
    }
}
