ModuleDeclare.factory('getfoodfactory',['$q','$http',foodservicefunction]);

function foodservicefunction($q,$http)
{
    

    function initmenu(pos,prov) {
        var URL=prov.scema_build("http://localhost/project/restaurant_level/public/API/menu",pos);
        var filter=[],menu=[],pages=0,deferred=$q.defer(),currentpage,dArr=[];

        
            // var deferred_test = $q.defer();
            $http.get(URL)
                 .then(function(res) {
                    pages=res.data.total_Page;
                    currentpage=res.data.Curent_Page;
                    filter=res.data.filter_list.map(function(result){
                         return result;
                     });
                    menu=res.data.food_data.map(function(res){
                        var d= $q.defer();
                        res.callback=d.resolve;
                        dArr.push(d.promise);
                        return res;
                    });

                    return deferred.resolve([filter,menu,pages,dArr,currentpage]);
                
                },function(error){
                    return deferred.reject(filter=error.data.filter_list);
                });
        return deferred.promise;
    }
    return {
      initalize_menu: initmenu,
      get_data:initmenu
    };
}