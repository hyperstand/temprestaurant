ModuleDeclare.controller('MenuController', ['$scope','$timeout','$rootScope','$q','urlprovider','getfoodfactory',MenuController]);

function MenuController($scope,$timeout,$rootScope,$q,urlprovider,getfoodservice)
{
    $scope.modal={
        name:"",
        desc:"",
        img:"",
        fat:"",
        calories:""
    }
    $scope.FilterList=[];
    $scope.FoodData=[];
    $scope.stat = { 
        Load: true, 
        paginationSize:0,
        searchfield:"",
        pagelocation:0,
        notfound:false
    };

    var param_res=urlprovider.paramschecker(["fltr","page","search"]);
    $scope.stat.searchfield=param_res[2]['search'];

    
    getfoodservice.initalize_menu(param_res,urlprovider).then(function($response){

        $timeout(function() {

                $scope.stat.paginationSize+=$response[2];
                
                ($response[0]).map(instance =>{
                    $scope.FilterList.push(instance);
                });

                ($response[1]).map(instance =>{
                    $scope.FoodData.push(instance);
                });
                $scope.stat.pagelocation=$response[4]-1;

                $timeout(function() {

                jQuery.each(param_res[0]['fltr'], function( i, val ) {
                        $(`#${val}-checkbox`).prop('checked', true);
                        if($(`#${val}-checkbox`).prop('checked'))
                        {
                            console.log('chekced');
                        }
                        if($(`#${val}-checkbox`).is(':checked'))
                        {
                            console.log('asd');
                        }
                });
                    
                $q.all($response[3]).then(function(){
                    $('.Loading-content').toggleClass('hide');
                    $scope.stat.Load=false;
                });
                },100); 
        },0);

    },function(error){
        $timeout(function() {
            (error).map(instance =>{
                $scope.FilterList.push(instance);
            });

        },0);
        $scope.stat.Load=false;
        $scope.stat.notfound=true;
        $('.Loading-content').toggleClass('hide');
    });

    $scope.changepage=function(variable){
       
        if(!$scope.stat.Load)
        { 
        switch(variable){
            case 'next':
            console.log($scope.stat.pagelocation+1);

            if(($scope.stat.pagelocation-1) != -1)
            {
                $scope.stat.pagelocation=$scope.stat.pagelocation-1
            }else{
                $scope.stat.pagelocation = 0;
            }
            break;
            case'prev':
            if(($scope.stat.pagelocation+1) != $scope.stat.paginationSize)
            {
                $scope.stat.pagelocation=$scope.stat.pagelocation+1;
            }else{
                $scope.stat.pagelocation = $scope.stat.paginationSize;
            }
            
            break;
            default:
            $scope.stat.pagelocation =variable;
            break;
        }

        console.log($scope.stat.pagelocation);
   
            param_res.forEach(function(item) {
                if(typeof item['page'] == "object")
                {  
                    item['page']=$scope.stat.pagelocation;
                }else if(typeof item['page'] == "string"){
                    item['page']=$scope.stat.pagelocation;
                }  
            });
            request();
        }
    }



    $scope.ToggleFilter=()=>{ $('#hyde').toggleClass('hide');}

    $scope.SearchFood=function(){
        if(!$scope.stat.Load)
        {    
            param_res.forEach(function(item) {
                if(typeof item['search'] == "object")
                {  
                    item['search']=$scope.stat.searchfield;
                }else if(typeof item['search'] == "string"){
                    item['search']=$scope.stat.searchfield;
                }  
            });
            request();
        }
    }
  
    $rootScope.$on('check_stat', function(event, args) {   

                param_res.forEach(function(item) {
                   
                    if(item['fltr'])
                    {   
                        if(args.status == "CHECKED"){
                            item['fltr'].push(args.id);
                        }else if(args.status == "UNCHECKED"){
                               item['fltr'].forEach(function(i,id){
                                if(i == args.id)
                                {
                                    item['fltr'].splice(id,1);
                                }
                               }); 
                        } 
                    }

                });
        //console.log(param_res);
        request();

               
    });
   





    function request()
    {   
        $scope.stat.Load=true;
        $('.Loading-content').toggleClass('hide');
        $scope.FilterList = [];
        $scope.FoodData = [];
        $scope.stat.paginationSize*=0;
        $scope.stat.notfound=false;

        window.history.replaceState(null, null, urlprovider.scema_build(window.location.pathname,param_res));

        getfoodservice.get_data(param_res,urlprovider).then(function($response){
            $timeout(function() {

                    $scope.stat.paginationSize+=$response[2];
                    
                    ($response[0]).map(instance =>{
                        $scope.FilterList.push(instance);
                    });
    
                    ($response[1]).map(instance =>{
                        $scope.FoodData.push(instance);
                    });
                    
    
                    $timeout(function() {
                            jQuery.each(param_res[0]['fltr'], function( i, val ) {
                                // $(`#${val}-checkbox`).prop('checked', true);
                                $(`#${val}-checkbox`).data('clicked', true);

                                
                            });
                                
                            $q.all($response[3]).then(function(){
                                $('.Loading-content').toggleClass('hide');
                                $scope.stat.Load=false;
                            });
                    },0); 
            },0);
    
        },function(error){
            $timeout(function() {
                (error).map(instance =>{
                    $scope.FilterList.push(instance);
                });
                jQuery.each(param_res[0]['fltr'], function( i, val ) {
                    
                    $(`#${val}-checkbox`).prop('checked', true);
                    if($(`#${val}-checkbox`).prop('checked'))
                    {
                        console.log('chekced');
                    }
                    if($(`#${val}-checkbox`).is(':checked'))
                    {
                        console.log('asd');
                    }
                   
                });

            },0);
            $scope.stat.Load=false;
            $scope.stat.notfound=true;
            $('.Loading-content').toggleClass('hide');
        });
    }





    $rootScope.$on('openmodal', function(event, args) {
        var res=$scope.FoodData[parseInt(args.pos)];
        $scope.modal.name=res['name'];
        $scope.modal.desc=res['desc'];
        $scope.modal.img=res['img'];
        $scope.modal.fat=res['nutrition']['Totfat'];
        $scope.modal.calories=res['nutrition']['Calories'];
        $('#myModal').modal('show');
    });

    // $rootScope.$broadcast('click_check', { content: param_res[0]['fltr'] });
    $scope.checklistener=function(){

    }
}