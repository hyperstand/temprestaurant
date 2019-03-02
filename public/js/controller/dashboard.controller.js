ModuleDeclare.controller('DashboardController', ['$scope','$timeout','$q','$http','CSRF_TOKEN',DashboardController]);

function DashboardController($scope,$timeout,$q,$http,CSRF_TOKEN)
{   
    $scope.Info={
        Date_info:{display:"Choose Your Date",dateformat:null},
        Time_info:{display:"Choose Your Time",time:null},
        People_info:1,
        Desc_info:""
    }

    //https://stackoverflow.com/questions/24969245/why-this-ng-show-ng-hide-not-working
    
    $scope.panel={
        position:0,
        animate:true,
        open:false,
        load:false,
        bookedInfo:false,
        trigger:null,
        timeload:false
    };

    $scope.Title=[
        "Booking Request",
        "Select Date",
        "Select Time",
        "Aditional Info"
    ];

        var formated=(m)=>{
            if(m.toString().length == 1)
            return `0${m}`;
            else
            return m;
            };
    
        var ampm=(date)=>{
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return strTime;
        }

        function ti(from,until,restrict){
            var until = Date.parse("01/01/2000 " + until);
            var from = Date.parse("01/01/2000 " + from);
            var max = (Math.abs(until-from) / (60*60*1000))*2;
            var time = new Date(from);
            var hours = [];
            for(var i = 0; i <= max; i++){
                var jsonData = {};
                var hour = formated(time.getHours());
                var minute = formated(time.getMinutes());
                jsonData.format=hour+":"+minute+":00";
                jsonData.long=ampm(time);
                jsonData.booked=false;
                hours.push(jsonData);
                time.setMinutes(time.getMinutes()+30);
            }

            if(restrict.length>0)
            {   
                var picked=[];
                restrict.forEach(element => {       
                            hours.forEach((e)=>{
                                if(e.format==element.booking_time.replace('.000000',''))
                                {   
                                    picked.push(e.format);
                                    e.booked=true;
                                }else if(picked.indexOf(e.format) <-1)
                                {
                                    e.booked=false
                                }
                            });
                 });
           }




            return hours;
        };
        $scope.avatime;
    

    $scope.book_request=function(){


       if($scope.Info.Date_info.dateformat == null && $scope.Info.Time_info.time ==null)
       {
          
        $scope.panel.trigger = 'all';
                $timeout(()=>{
                    $scope.panel.trigger = null;
                },1000)
            
       }else if($scope.Info.Time_info.time ==null){
        $scope.panel.trigger = 'time';
        $timeout(()=>{
            $scope.panel.trigger = null;
        },1000)
       }else
       {
                    // $http.post('./booking',{'crfs':CSRF_TOKEN,'data':$scope.Info})
                    // .then(function successCallback(response) {
                    //     $scope.panel.bookedInfo=true;
                    //     $scope.togglemodal('i');
                    // });    
       }
    
    }







    //https://codereview.stackexchange.com/questions/128260/populating-an-array-with-times-with-half-hour-interval-between-them


  

    $scope.changepage=function(position){    

        if(position ==2)
        {   
            if($scope.Info.Date_info.dateformat!=null)
            {
                $scope.panel.position=position;
            }else{
                $scope.panel.trigger = 'date';
                $timeout(()=>{
                    $scope.panel.trigger = null;
                },1000)
            }
            
        }else{
            $scope.panel.position=position;
        }
            
    }

    $scope.togglepeople=function(event){
        switch(event)
        {
            case 'add':
            if($scope.Info.People_info != 20)
            $scope.Info.People_info++;
            break;
            case'delete':
            if($scope.Info.People_info != 1)
            $scope.Info.People_info--;
            break;
            default:
        }
    }

    if (!$scope.selecteddate) {
        $scope.selecteddate = new Date();
    }



    $scope.days = [
        { "long":"Sunday","short":"Sun" },
        { "long":"Monday","short":"Mon" },
        { "long":"Tuesday","short":"Tue" },
        { "long":"Wednesday","short":"Wed" },
        { "long":"Thursday","short":"Thu" },
        { "long":"Friday","short":"Fri" },
        { "long":"Saturday","short":"Sat" },
    ];
    if ($scope.mondayfirst == 'true') {
        var sunday = $scope.days[0];
        $scope.days.shift();
        $scope.days.push(sunday);
    }

    $scope.monthNames = [
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ];

    function getSelected() {
        if ($scope.currentViewDate.getMonth() == $scope.localdate.getMonth()) {
            if ($scope.currentViewDate.getFullYear() == $scope.localdate.getFullYear()) {
                for (var number in $scope.month) {
                    if ($scope.month[number].daydate == $scope.localdate.getDate()) {
                        
                        $scope.month[number].selected = true;

                        if ($scope.mondayfirst == 'true') {
                            if (parseInt(number) === 0) {
                                number = 6;
                            } else {
                                number = number - 1;
                            }
                        }
                        
                        $scope.selectedDay = $scope.days[$scope.month[number].dayname].long;
                    }
                }
            }
        }
    }

    function getDaysInMonth() {
        $scope.panel.load=true;
        var month = $scope.currentViewDate.getMonth();
        var date = new Date($scope.currentViewDate.getFullYear(), month, 1);
        var days = [];
        var today = new Date();
        var booking_list;

        
        $http.get(`./ver/date?date=${month+1}_${$scope.currentViewDate.getFullYear()}`)
        .then(function successCallback(response) {
            booking_list=response.data.result;
            while (date.getMonth() === month) {
                var showday = true;
                if (!$scope.pickpast && date < today) {
                    showday = false;
                }
                if (today.getDate() == date.getDate() &&
                    today.getFullYear() == date.getFullYear() &&
                    today.getMonth() == date.getMonth()) {
                    showday = true;
                }
                var day = new Date(date);
         
                var dayname = day.getDay();
                var daydate = day.getDate();
                var dayyear = day.getFullYear();
                var daymonth = day.getMonth();
                var booked=false;



                // console.log(booking_list.includes(`${dayyear}-${daymonth}-${daydate}`));
                console.log(booking_list[`${dayyear}-${daymonth}-${daydate}`]);

                console.log(booking_list[`${dayyear}-${formated(daymonth+1)}-${formated(daydate)}`]);
                if(booking_list[`${dayyear}-${formated(daymonth+1)}-${formated(daydate)}`] >=20)
                {
                    booked= true; 
                }
                days.push({ 'dayname': dayname, 
                            'daydate': daydate,
                            'dayyear':dayyear,
                            'timestamp':(day.getTime()/1000),
                            'daymonth': daymonth,
                            'showday': showday ,
                            'booked': booked});
                date.setDate(date.getDate() + 1);
            }
            $scope.month = days;
            $scope.panel.load=false;

          }, function errorCallback(response) {
            
          });
  

        



        // $scope.month = days;
        // $scope.panel.load=false;
    }

    function initializeDate() {
        $scope.currentViewDate = new Date($scope.localdate);
        $scope.currentMonthName = function () {
            return $scope.monthNames[$scope.currentViewDate.getMonth()];
        };
        getDaysInMonth();
        getSelected();
    }

    $scope.$watch('panel.position',function(){

        if($scope.panel.position == 2)
        {   
            $scope.panel.timeload=true;
            $scope.avatime=[];
            //https://stackoverflow.com/questions/1144783/how-to-replace-all-occurrences-of-a-string-in-javascript
            $http.get(`./ver/time?date=${$scope.Info.Date_info.dateformat}`)
            .then(function successCallback(response) {
                $scope.avatime=ti("08:00","20:00",response.data.result);
                $scope.panel.timeload=false;
            },function errorCallback(response){

            });
        }


    });

    $scope.$watch('panel.open', function() {
     
        if ($scope.selecteddate !== undefined && $scope.selecteddate !== null) {
            $scope.localdate = convertFromUTC($scope.selecteddate);
        } else {
            $scope.localdate = new Date();
            $scope.localdate.setMinutes(Math.round($scope.localdate.getMinutes() / 60) * 30);
        }
        initializeDate();
    });

    $scope.selectDate = function (day) {
   
        if (day.showday) {
            for (var number in $scope.month) {
                var item = $scope.month[number];
                if (item.selected === true) {
                    item.selected = false;
                }
            }
            day.selected = true;
            $scope.localdate = new Date($scope.currentViewDate.getFullYear(), $scope.currentViewDate.getMonth(), day.daydate);
            // initializeDate();
            $scope.Info.Date_info.display=`${$scope.days[day.dayname].long} , ${day.daydate} ${$scope.currentMonthName()} ${day.dayyear} `;
            $scope.Info.Date_info.dateformat=`${day.dayyear}_${formated(day.daymonth+1)}_${formated(day.daydate)}`;
            console.log(day);
        }
    };

    $scope.moveForward = function () {
        if($scope.panel.load == false){

            // $scope.panel.load==true;
        $scope.currentViewDate.setMonth($scope.currentViewDate.getMonth() + 1);
        if ($scope.currentViewDate.getMonth() == 12) {
            $scope.currentViewDate.setDate($scope.currentViewDate.getFullYear() + 1, 0, 1);
        }
        getDaysInMonth();
        getSelected();
        }
    };
            // Convert from UTC to account for different time zones
            function convertFromUTC(utcdate) {
                localdate = new Date(utcdate);
                return localdate;
            }



    $scope.moveBack = function () {
        if($scope.panel.load == false){
                $scope.currentViewDate.setMonth($scope.currentViewDate.getMonth() - 1);
                
                if ($scope.currentViewDate.getMonth() == -1) {
                    $scope.currentViewDate.setDate($scope.currentViewDate.getFullYear() - 1, 0, 1);
                }
            getDaysInMonth();
            getSelected();
        }
    };
    $scope.gettime=function(time)
    {   
        if(time.booked == false)
        {
            $scope.Info.Time_info.display=time.long;
            $scope.Info.Time_info.time=time.format;
            $scope.panel.position=0;
        }

    }

    $scope.calcOffset = function (day, index) {
        if (index === 0) {
            var offset = (day.dayname * 14.2857142) + '%';
            if ($scope.mondayfirst == 'true') {
                offset = ((day.dayname - 1) * 14.2857142) + '%';
            }
            return offset;
        }
    };
    $scope.togglemodal=function(o){
        // $('#exampleModal').modal('show');
        
        switch(o)
        {
            case 'i':
            $('#exampleModal').modal('toggle');
            break;
            case 'c':
            $('#confirmmodal').modal('toggle');
            break;
        }

        // $scope.panel.bookedInfo=true;
        // setTimeout(function () {
        //     $scope.$apply(function () {
        //     //    $scope.panel.animate=false;
        //     $scope.panel.bookedInfo=true;
        //     });
        // }, 0);
        console.log(($("#exampleModal").data('bs.modal') || {isShown: false}).isShown);
    }
 
}   