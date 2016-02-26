var app = angular.module('Grid', ['ngMaterial', 'ui.grid']);
app.controller('MainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.gridOptions = {
            enableSorting: true,
            columnDefs: [
                {field: 'firstName'},
                {field: 'firstName'},
                {field: 'employed', enableSorting: false}
            ],
            onRegisterApi: function (gridApi) {
                $scope.grid1Api = gridApi;
            }
        };
        $http.get('/capacidades/consultar')
                .success(function (data) {
                    $scope.gridOptions.data = data;
                });
    }]);

angular.module('ComprassApp', ['ngMaterial', 'ToolBar', 'Grid'])
        .config(function ($mdThemingProvider) {
            $mdThemingProvider.theme('default')
                    .primaryPalette('indigo')
                    .accentPalette('teal')
                    .warnPalette('orange')
                    .backgroundPalette('grey');
        });
