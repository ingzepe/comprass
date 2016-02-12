Comprass = angular.module('ComprassApp', ['ngMaterial', 'ngMessages'])
        .controller('loginCtrl', ['$scope', '$http', function ($scope, $http) {
                $scope.submit = function () {
                    $http({
                        method: 'POST',
                        url: 'auth/index/login',
                        data: {'user' : $scope.user, 'pass' : $scope.pass}
                    }).then(function (r) {
                        alert(r.data.response);
                    }, function (response) {
                        alert(response);
                    });
                };
            }]);