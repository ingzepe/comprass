

Comprass = angular.module('ComprassApp', ['ngMaterial', 'ngMessages'])
        .controller('loginCtrl', ['$scope', '$http', function ($scope, $http) {
                $scope.error = [];
                $scope.error['pass'] = 'Contraseña';
                $scope.error['user'] = 'Usuario';
                $scope.error['auth'] = 'Error';
                $scope.submit = function () {
                    $scope.errors = '';
                    $http({
                        method: 'POST',
                        url: 'auth/index/login',
                        data: {'user': $scope.user, 'pass': $scope.pass}
                    }).then(function (r) {
                        if (r.data.code == 1) {
                            $scope.errors = baseUrl = location.protocol + '//' + location.host + basePath;
                            window.location = baseUrl;
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