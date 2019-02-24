ModuleDeclare.directive('recordValidator',  validator);
ModuleDeclare.directive('matchValidator',Matchdata);
ModuleDeclare.directive('passwordCharactersValidator',passwordCharactersValidator);
ModuleDeclare.directive('phonenumber',phonedirective);

Matchdata.$inject=['$rootScope'];
validator.$inject=['$timeout', '$q', '$http','CSRF_TOKEN'];
phonedirective.$inject=['$filter'];
passwordCharactersValidator.$inject=['$rootScope'];


function phonedirective($filter)
{
  function link(scope, element, attributes,ngModelCtrl) {
    // scope.inputValue is the value of input element used in template
    // scope.inputValue = scope.phonenumberModel;
    scope.$watch('model', function(value, oldValue) { 
      var elem={
        updateview:(value)=>{
          ngModelCtrl.$viewValue = value;
          ngModelCtrl.$render();
        },
        updateModel:(value)=>{
          ngModelCtrl.$modelValue = value;
          scope.ngModel = value;
        }
      };
      value = String(value);
      var number = value.replace(/[^0-9]+/g, ''); 
      elem.updateview($filter('phonenumber')(number));
    });
  }
  return {
    link: link,
    restrict: 'A',
    require:'ngModel',
    scope: {
      model: '=ngModel'
    },
  };
}


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

    

    elm.bind('change', function (e) {
      
      if(attrs.recordValidator=="email")
      {   URL='./auth/ver/email';
          param={crsf:C};
      }else if(attrs.recordValidator=="telp"){
          URL="telp"
      }
      
    var ptrntst=scope.pattern.test(model.$$rawModelValue);
    if(elm.val().length != 0 && ptrntst)
    {
      loading(true);
      param.email=model.$$rawModelValue;
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
      
    }else if(!ptrntst)
    { 
      console.log("asdqw");
      patern(true);
      sucess(null);
      valid(null);
    }else if(elm.val().length == 0)   
      {
        required(true);
        sucess(false);
        valid(false);
      }

    }); 
      
    

          function patern(bool)
          {
            model.$setValidity('pattern', !bool);
          }
          function required(bool)
          {
            model.$setValidity('required', !bool);
          }
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
          pattern:'='
        },
        link:linkfunction 
    }
    
}




/** filter */
ModuleDeclare.filter('phonenumber', function() {
  /* 
  Format phonenumber as: c (xxx) xxx-xxxx
    or as close as possible if phonenumber length is not 10
    if c is not '1' (country code not USA), does not use country code
  */
  
  return function (number) {
    /* 
    @param {Number | String} number - Number that will be formatted as telephone number
    Returns formatted number: (###) ###-####
      if number.length < 4: ###
      else if number.length < 7: (###) ###

    Does not handle country codes that are not '1' (USA)
    */
      if (!number) { return null; }

      number = String(number);

      // Will return formattedNumber. 
      // If phonenumber isn't longer than an area code, just show number
      var formattedNumber = number;

  // if the first character is '1', strip it out and add it back
  // var c = (number[0] == '1') ? '1 ' : '';
  number = number[0] == '1' ? number.slice(1) : number;

  // # (###) ###-#### as c (area) front-end
  var area = number.substring(0,2);
  var front = number.substring(3, 6);
  var end = number.substring(6, 20);

  if (front) {
    formattedNumber = `(${area})`+front;	
  }
  if (end) {
    formattedNumber += ("-" + end);
  }
  return formattedNumber;
  };
});

