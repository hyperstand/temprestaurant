<?php

namespace App\Http\Controllers;
use App;
use DB;
use Illuminate\Http\Request;
use App\tag_title;
use App\tags;
use App\food;


class MenuController extends Controller
{   
    private $stat_code;
    private $list_filter;
    private $pageNum=6;








    public function test_filter_data(Request $request){
        
        $result=$this->check_param([]);
        // echo $Food::all()->paginate(15);;
        // foreach($result as $r)
        // {
        //     $r['name'];
        // }

   
        $posts = food::select('name','desc','Tags','img');
        foreach($result as $r)
        {   
            if($r['name']=='search')
            {
                $posts->where('name','like', '%' . $r['result'] . '%');
            }
            else if($r['name']=='filter')
            {   
                foreach(explode(',', $r['result']) as $t)
                {
                    $posts->where('Tags','like', '%' .$t. '%');
                }
            } 
        }

        return response()->json($this->condition($posts->paginate($this->pageNum),$this->buildtag([])),$this->stat_code);
    }
    private function condition($result,$data_all)
    {   
        if(count($result->items())>0)
        {   
            $resd=[];
            foreach($result as $r){
                array_push($resd,array('name' => $r->name,'img'=>$r->img,'desc'=>$r->desc,'nutrition'=>array('Calories' => $r->Calories,'Totfat'=>$r->Totfat)));
            };
                  $response = [
                'Stat'=>true,
                'Curent_Page'=>$result->currentPage(),
                'total_Page'=>(ceil($result->total()/6)),
                'filter_list'=>$data_all,
                'food_data' => $resd
            ];
            $this->stat_code=200;
        }else{
            $response = [
                'Stat'=>false,
                'filter_list'=>$data_all
            ];
            $this->stat_code=500;
        }
 
        return $response ;
    }
    private function buildtag($result)
    {   


        $title_tag_one=tag_title::with('tags')->get();
        // $this->list_filter
        // $this->stat_code=0;



        foreach($title_tag_one as $user){
           $data_array=[];
           foreach($user->tags as $tags)
           {    
                array_push($data_array,array('name' => $tags->name,'value'=>$tags->value));
           } 
           //{"name":"Other Type","data":[{"name":"cheese","value":"cheese"},{"name":"tofu","value":"tfu"}]}
           array_push($result,array('name'=>$user->name,'data'=>$data_array));
        }
        return $result;
    }
    
    private function check_param($result)
    {   
        if(isset($_GET['search']) && strlen($_GET['search'])>0 && $_GET['search'])
        {
            array_push($result,array('name'=>"search",'result'=>$_GET['search']));
        }
        if(isset($_GET['fltr']) && strlen($_GET['fltr'])>0 && $_GET['fltr'])
        { 
        //   $this->list_filter=explode(",",$_GET['fltr']);
        //   foreach($this->list_filter as $fltr)
        //   {
        //       echo $fltr;
        //   }
          array_push($result,array('name'=>"filter",'result'=>$_GET['fltr']));
        }
        if(isset($_GET['page']) && strlen($_GET['page'])>0 && $_GET['page'] &&is_numeric($_GET['page']))
        {
            array_push($result,array('name'=>"page",'result'=>$_GET['page']));
        }
        return $result;
    }
}
