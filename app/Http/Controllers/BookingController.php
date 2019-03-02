<?php

namespace App\Http\Controllers;

use App;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\booking;
use App\User;


class BookingController extends Controller
{
    protected $auth;
    

    public function create(Request $request)
    {   
        //https://stackoverflow.com/questions/27877948/check-if-laravel-model-got-saved-or-query-got-executed
        if ($request->isMethod('post') && 
        $request->has(['data.Date_info', 'data.Time_info','data.People_info']) && 
        $request->filled(['data.Date_info', 'data.Time_info','data.People_info'])
        && Session::token() == $request->input('crfs',null)) {

            $data=$request->input('data');
            $booking_info=new booking();
            $booking_info->booking_time=$data['Time_info']['time'];
            $booking_info->booking_num_people=$data['People_info'];
            $booking_info->booking_date=str_replace('_','-',$data['Date_info']['dateformat']);
            $booking_info->booking_user_id=Auth::user()->id;
            $booking_info->canceled=false;

            if($booking_info->save())
            {
                return response()->json([
                    'status'=>true,
                    'code'=>'200'
                ], 200);

            }else {
                
                return response()->json([
                    'status'=>false,
                    'code'=>'500'
                ], 500);
            }


        }else{
            return response()->json([
                'status'=>false,
                'code'=>'505'
            ], 505);
        }
    }


    public function update(Request $request)
    {
        echo 'a';
    }
    public function delete(Request $request)
    {
        echo 'a';
    }



    public function check_available_date(Request $request)
    {   

        
        if(preg_match('~^(?:[1-9]|[1][0-2])_[\d]{4}~', $request->query('date')))
        {
        
        $max_place=20;
        $timestamp=explode("_",$request->query('date'));
        $all_day=[];
        $month=[
            1=>'January',
            2=>'February',
            3=>'March',
            4=>'April',
            5=>'May',
            6=>'June',
            7=>'July',
            8=>'August',
            9=>'September',
            10=>'October',
            11=>'November',
            12=>'December'
        ];
        $timestamp=$month[(int)$timestamp[0]].$timestamp[1];
        $first=(new Carbon('first day of '.$timestamp))->toDateString();
        $last = (new Carbon('last day of'.$timestamp))->toDateString();
        
        $from=date($first);
        $to=date($last);
        $result=Booking::select('booking_date')->
                whereBetween('booking_date', [$from, $to]);


        // $period = new CarbonPeriod($from, $to);

        // foreach ($period as $date) {
        //     $all_day[]=$date->format('Y-m-d');
        // }

        // $counts = array_count_values($all_day);
        // echo var_dump($counts);
        // $convert=Carbon::createFromTimestamp()->toDateTimeString();

        $date_list=$result->get();
        foreach ($date_list as $date) {
            $all_day[]=$date['booking_date'];
        };

        return response()->json([
            'status'=>true,
            'result'=>array_count_values($all_day)
        ], 200);


      }else {
        return response()->json([
            'status'=>false,
            'message'=>'connection refuse'
        ], 505);
      }
    }


    public function check_available_time(Request $request)
    {   

        if(preg_match('~^\d{4}\_(0[1-9]|1[012])\_(0[1-9]|[12][0-9]|3[01])$~', $request->query('date')))
        {
        
        
        $timestamp = str_replace('_','-',$request->query('date'));
        
        $result=Booking::select('booking_time')->where('booking_date','=',$timestamp)->get();
        $t=explode("_",$request->query('date'));
        $morning = Carbon::create($t[0], $t[1], $t[2], 8, 0, 0); //set time to 08:00
        $evening = Carbon::create($t[0], $t[1], $t[2], 20, 0, 0); //set time to 18:00

        $period = Carbon::now()->between($morning, $evening, false);
        

      
        return response()->json([
            'status'=>true,
            'result'=>$result
        ], 200);

        }else {
            return response()->json([
                'status'=>false,
                'message'=>'connection refuse'
            ], 505);
        }
        
    }





/**
 * 
 * Tools
 */
// private function create_time_range($start, $end, $interval = '30 mins')
// {
//     $startTime = strtotime($start); 
//     $endTime   = strtotime($end);
//     $returnTimeFormat = 'H:i:s';

//     $current   = time(); 
//     $addTime   = strtotime('+'.$interval, $current); 
//     $diff      = $addTime - $current;

//     $times = array(); 
//     while ($startTime < $endTime) { 
//         $times[] = array('booking_time'=>date($returnTimeFormat, $startTime)); 
//         $startTime += $diff; 
//     } 
//     $times[] =array('booking_time'=> date($returnTimeFormat, $startTime)); 
//     return $times;
// }





}
