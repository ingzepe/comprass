

Comprass = angular.module('ComprassApp', ['ngMaterial', 'ngMessages'])
        .controller('loginCtrl', ['$scope', '$http', '$window', '$location', function ($scope, $http, $window, $location) {
                $scope.error = [];
                $scope.error['pass'] = 'Contraseña';
                $scope.error['user'] = 'Usuario';
                $scope.error['auth'] = 'Error';
                $scope.errors = '';
                $scope.submit = function () {
                    $http({
                        method: 'POST',
                        url: 'auth/index/login',
                        data: {'user': $scope.user, 'pass': $scope.pass}
                    }).then(function (r) {
                        if (r.data.code == 1) {
                            $location.path('/index');
                        } else {
                            angular.forEach(r.data.message, function (value, key) {
                                $scope.errors = $scope.error[key];
                                angular.forEach(value, function (value2, key2) {
                                    $scope.errors += ': ' + value2;
                                });
                            });
                        }
                    }, function (response) {
                        alert(response);
                    });
                };
            }]);