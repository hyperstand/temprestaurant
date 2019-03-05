ModuleDeclare.directive('recordValidator',  validator);
ModuleDeclare.directive('matchValidator',Matchdata);
ModuleDeclare.directive('passwordCharactersValidator',passwordCharactersValidator);
ModuleDeclare.directive('phonenumber',phonedirective);

Matchdata.$inject=['$rootScope'];
validator.$inject=['$timeout', '$q', '$http','CSRF_TOKEN'];
phonedirective.$inject=['$filter','CSRF_TOKEN'];
passwordCharactersValidator.$inject=['$rootScope'];


function phonedirective($filter,C)
{
  function link(scope, element, attributes,model) {

    var validation={
      patern:(bool)=>{
        model.$setValidity('pattern', !bool);
      },
      sucess:(bool)=>{
        model.$setValidity('sucess',!bool);
      },
      loading:(bool)=>{
        model.$setValidity('record-loading', !bool);
      },
      valid:(bool)=>{
        model.$setValidity('record-taken', !bool);
      },
      required:(bool)=>{
        model.$setValidity('required', !bool);
      }};



    // scope.inputValue is the value of input element used in template
    // scope.inputValue = scope.phonenumberModel;
    scope.$watch('model', function(value, oldValue) { 
      
      var elem={
        updateview:(value)=>{
          model.$viewValue = value;
          model.$render();
        },
        updateModel:(value)=>{
          model.$modelValue = value;
          scope.ngModel = value;
        }
      };

      value = String(value);
      var number = value.replace(/[^0-9]+/g, '');
      var data=$filter('phonenumber')(number,validation,C);
      var render;


      // data.then(
      //   (s)=>{
      //    console.log(s);
      //     render=s;
      //   },
      //   (e)=>{
      //     console.log(e)
      //     render=e;
      //   });
      elem.updateview(data);
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
    elm.bind('change', function (e) {

    var ptrntst=scope.pattern.test(model.$$rawModelValue);
    var validation={
        patern:(bool)=>{
          model.$setValidity('pattern', !bool);
        },
        sucess:(bool)=>{
          model.$setValidity('sucess',!bool);
        },
        loading:(bool)=>{
          model.$setValidity('record-loading', !bool);
        },
        valid:(bool)=>{
          model.$setValidity('record-taken', !bool);
        },
        required:(bool)=>{
          model.$setValidity('required', !bool);
        }};

      console.log(ptrntst);

    if(elm.val().length != 0 && ptrntst)
    {
      validation.valid(false);
      validation.loading(true);
      //this refers to outer function
      request("email",$h,C,model.$$rawModelValue).then(
        function() {
          validation.loading(false);
          validation.sucess(true);
        },
        function() {
          validation.loading(false);
          validation.sucess(false);
          
        }
      );
    }else if(elm.val().length == 0)   
      {
        validation.required(true);
        validation.sucess(false);
        validation.valid(false);
      }
    }); 
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


/** Tools*/



function request(type,$h,C,d)
{ 

    var URL,param;
    if(type=="email")
    {   URL='./ver/email';
        param={crsf:C,email:d};
    }else if(type=="telp"){
        URL='./ver/phonenumber';
        
        param={crsf:C,phnum:d};
    }
   return $h.post(URL,param);
}


/** Tools*/







/** filter */
ModuleDeclare.filter('phonenumber', function($q,$http) {
  function validate_phone(n)
  {
    var phone=['0858','0853'];
    var stat=false;
    phone.forEach((e)=>{
      if(n==e)
      {
        stat=true;
      }
    });

    return stat;
  }

  return function (number,v,C) {
    var deffered=$q.defer();
 
    // if (!number) { 
    //   $q.reject(null);
    // }
    // else{
    //   number = String(number);
    //   if(number.length > 4)
    //   { 
    //   }
    //   else{
    //     deffered.resolve(number);
    //   }
    // // }
    //   console.log(deffered);

    //  return deffered.promise;
    
    //test without promise
      number = String(number);
      var result;

      v.patern(false);
      v.loading(false);
      v.sucess(false);
      v.required(false);
      if(number.length > 11)
      {
        // request(attrs,$h,C)
                var code=number.slice(0,4),
                    middle=number.slice(4,8),
                    last =number.slice(8,number.length);
                if(validate_phone(code))
                {
                  v.patern(false);
                  v.loading(true);
                  request("telp",$http,C,number)
                  .then(
                    ()=>{
                      v.loading(false);
                      v.sucess(true);
                    },
                    ()=>{
                      v.loading(false);
                      v.valid(true);
                    });

                   
                }else{
                  v.patern(true);
                }
                result=`${code} ${middle} ${last}`;
      }else{
        v.patern(true);
        result=number;
      }

    return result;
  };

});

