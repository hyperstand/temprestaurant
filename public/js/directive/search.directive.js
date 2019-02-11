//put main
ModuleDeclare.directive('foodShowcase',['$rootScope',foodshowcasedirective]);
ModuleDeclare.directive('filterBox',['$rootScope',filterboxdirective]);
function foodshowcasedirective($rootScope)
{   
    function link(scope,elem){

        scope.openmodal=($event)=>{
            $rootScope.$broadcast('openmodal', {pos:$event.target.attributes['data-position']['nodeValue']});
        };

        var img = elem.find('img');
        img.bind('load', function () {
            console.log('img is loaded');
        });
    }
    return{
        restrict: 'E',
        scope: {
            source: '='
        },
        template: '<div class="row"> <div class="single-dish col-lg-4" ng-repeat="isrc in source"> <div class="thumb" ><img class="img-fluid" ng-src="{{ isrc.img }}" imgsrc="isrc.img" onloadimg="isrc.callback(isrc)" imageonload data-position="{{$index}}" ng-click="openmodal($event)"alt=""></div> <h4 class="text-uppercase pt-20 pb-20" data-position="{{$index}}" ng-click="openmodal($event)">{{ isrc.name }}</h4> <p>{{ isrc.desc }}</p> </div> </div>',
        replace: true,
        link:link
    }
}

function filterboxdirective($rootScope)
{   

    var template='<div class="filter-menu container"> <div class="filter-content col-sm-12 col-md-4" ng-repeat="list in source"> <h4>{{ list.name }}</h4> <ul ng-repeat="content in list.data"> <li class="d-flex justify-content-between"> <p class="title-checkbox">{{ content.name }}</p> <div class="primary-checkbox"> <input type="checkbox" id="{{ content.value }}-checkbox" ng-click="updateModel($event)"> <label for="{{ content.value }}-checkbox"></label> </div> </li> </ul> </div> </div>';
    

    function link(scope,elem,ctrl){

        scope.updateModel = function(item) {
            if(item.target.checked)
            {
               $rootScope.$broadcast('check_stat', { status:'CHECKED',id:item.target.id.replace('-checkbox','')});
            }else
            {   
               $rootScope.$broadcast('check_stat', { status:'UNCHECKED',id:item.target.id.replace('-checkbox','')});
            }
        }
    }
    
    return{
        restrict: 'E',
        scope: {
            source: '='
        },
        template:template,
        replace: true,
        link:link
    }
}


