ModuleDeclare.controller('DashboardController', ['$scope','$timeout','$rootScope','$q',DashboardController]);

function DashboardController($scope,$timeout,$rootScope,$q)
{   
    $scope.Info={
        Date_info:"Choose Your Date",
        Time_info:"Choose Your Time",
        People_info:1,
        Desc_info:""
    }
    $scope.position=0;

    $scope.changepage=function(position){
        $scope.position=position;
    }
    $scope.togglepeople=function(event){
        switch(event)
        {
            case 'add':
            $scope.Info.People_info++;
            break;
            case'delete':
            if($scope.Info.People_info != 1)
            $scope.Info.People_info--;
            break;
            default:
        }
    }

    if ($scope.selecteddate !== undefined && $scope.selecteddate !== null) {
        $scope.localdate = convertFromUTC($scope.selecteddate);
    } else {
        $scope.localdate = new Date();
        $scope.localdate.setMinutes(Math.round($scope.localdate.getMinutes() / 60) * 30);
        console.log($scope.selecteddate);
    }
    initializeDate();


    //Date
    $scope.days = [
        { "long":"Sunday","short":"Sun" },
        { "long":"Monday","short":"Mon" },
        { "long":"Tuesday","short":"Tue" },
        { "long":"Wednesday","short":"Wed" },
        { "long":"Thursday","short":"Thu" },
        { "long":"Friday","short":"Fri" },
        { "long":"Saturday","short":"Sat" },
    ];

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
        var month = $scope.currentViewDate.getMonth();
        var date = new Date($scope.currentViewDate.getFullYear(), month, 1);
        var days = [];
        var today = new Date();
        while (date.getMonth() === month) {
            var showday = true;
            if (!$scope.pickpast && date < today) {
                showday = false;
            }
            if (today.getDate() == date.getDate() &&
                today.getYear() == date.getYear() &&
                today.getMonth() == date.getMonth()) {
                showday = true;
            }
            var day = new Date(date);
            var dayname = day.getDay();
            var daydate = day.getDate();
            days.push({ 'dayname': dayname, 'daydate': daydate, 'showday': showday });
            date.setDate(date.getDate() + 1);
        }
        $scope.month = days;
    }


    // Convert from UTC to account for different time zones
    function convertFromUTC(utcdate) {
                    localdate = new Date(utcdate);
                    return localdate;
    }

    function initializeDate() {
        $scope.currentViewDate = new Date($scope.localdate);
        $scope.currentMonthName = function () {
            return $scope.monthNames[$scope.currentViewDate.getMonth()];
        };
        getDaysInMonth();
        getSelected();
    }

    $scope.selectDate = function (day) {

        if ($scope.pickdate == "true" && day.showday) {
            for (var number in $scope.month) {
                var item = $scope.month[number];
                if (item.selected === true) {
                    item.selected = false;
                }
            }
            day.selected = true;
            $scope.selectedDay = $scope.days[day.dayname].long;
            $scope.localdate = new Date($scope.currentViewDate.getFullYear(), $scope.currentViewDate.getMonth(), day.daydate);
            initializeDate($scope.localdate);
            $scope.updateDate();
        }
    };

    $scope.updateDate = function () {
        if ($scope.localdate) {
            var newdate = getDateAndTime($scope.localdate);
            $scope.updatefn({newdate:newdate});
        }
    };

    $scope.moveForward = function () {
        $scope.currentViewDate.setMonth($scope.currentViewDate.getMonth() + 1);
        if ($scope.currentViewDate.getMonth() == 12) {
            $scope.currentViewDate.setDate($scope.currentViewDate.getFullYear() + 1, 0, 1);
        }
        getDaysInMonth();
        getSelected();
    };

    $scope.moveBack = function () {
        $scope.currentViewDate.setMonth($scope.currentViewDate.getMonth() - 1);
        if ($scope.currentViewDate.getMonth() == -1) {
            $scope.currentViewDate.setDate($scope.currentViewDate.getFullYear() - 1, 0, 1);
        }
        getDaysInMonth();
        getSelected();
    };

    $scope.calcOffset = function (day, index) {
        if (index === 0) {
            var offset = (day.dayname * 14.2857142) + '%';
            if ($scope.mondayfirst == 'true') {
                offset = ((day.dayname - 1) * 14.2857142) + '%';
            }
            return offset;
        }
    };
    ////

}