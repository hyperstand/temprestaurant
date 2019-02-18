ModuleDeclare.directive('recordValidator',  validator);
ModuleDeclare.directive('matchValidator',['$rootScope',Matchdata]);
ModuleDeclare.directive('passwordCharactersValidator',passwordCharactersValidator);
validator.$inject=['$timeout', '$q', '$http','CSRF_TOKEN'];
// Matchdata.$inject=['$rootScope'];
passwordCharactersValidator.$inject=['$rootScope'];

function Matchdata($rootScope)
{   function linkfunction(scope, element, attrs, ngModel)
    {
        ngModel.$parsers.push(function(value) {
            ngModel.$setValidity('match', value == scope.$eval(attrs.matchValidator));
            return value;
          });

          $rootScope.on('changed',function(val){
            ngModel.$setValidity('match', val==ngModel.val());
          })
    }
    return {
        require: 'ngModel',
        link : linkfunction
      }
}

function passwordCharactersValidator($rootScope)
{
    var PASSWORD_FORMATS = [
        /[^\w\s]+/, 
        /[A-Z]+/, 
        /\w+/, 
        /\d+/ 
      ];
      function linkfunction(scope, elm, attr, model)
      {     

            model.$parsers.push(function(value) {
            var status = true;

            angular.forEach(PASSWORD_FORMATS, function(regex) {
              status = status && regex.test(value);
            });
            model.$setValidity('password-characters', status);
            $rootScope.$broadcast('changed',value);
            return value;
            });
      }
      return {
        require: 'ngModel',
        link : linkfunction
      }
}



function validator($t, $q, $h,C)
{   

    function linkfunction(scope, elm, attrs, model)
    {    

    var URL,param;



    elm.bind('blur change', function (e) {
    
      if(attrs.recordValidator=="email")
      {   URL='./auth/email';
          param={crsf:C,email:model.$$rawModelValue};
      }else if(attrs.recordValidator=="telp"){
          URL="telp"
      }
    
      

    if(typeof scope.form.required == 'undefined' && typeof scope.form.pattern == 'undefined')
    {
      loading(true);
      $h.post(URL,param).then(
        function(s) {
          loading(false);
          sucess(true);
        },
        function(e) {
          loading(false);
          valid(true);
          
        }
      );
    }else if(typeof scope.form.pattern != 'undefined')
    { 
      loading(false);
      sucess(true);
      valid(true);
    }else if(elm.val().length == 0)   
      {
        
      }

    }); 
      
    
 
        

          function valid(bool) {
            model.$setValidity('record-taken', !bool);
          }
          function sucess(bool) {
            model.$setValidity('sucess',!bool);
          }
  
          function loading(bool) {
            model.$setValidity('record-loading', !bool);
          }


    }
    return {
        restrict: 'AE',
        require: 'ngModel',
        scope: {
          form: '=',
        },
        link:linkfunction 
    }
}

