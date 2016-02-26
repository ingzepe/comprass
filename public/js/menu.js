//            home = angular.element( document.querySelectorAll( '.navigation > li' ) ).text();
navigation = document.querySelectorAll('.navigation > li');
angular.forEach(navigation, function (value, key) {
    if (key !== 0) {
        menu = angular.element(navigation[key].querySelector('li > span')).text();
        var newMenu = angular.element('<md-menu id="m-' + menu + '"> <button ng-click="$mdOpenMenu()">' + menu + '</button></md-menu>');
        menuBar = angular.element(document.querySelector('#menu-bar'));
        menuBar.append(newMenu);

        var newSubmenu = angular.element('<md-menu-content id=mc-' + menu + '></md-menu-content>');
        subMenu = angular.element(document.querySelector('#m-' + menu));
        subMenu.append(newSubmenu);
        
        menuItem = value.querySelectorAll('li');
        angular.forEach(menuItem, function (val, i) {
            subMenuItem = angular.element(menuItem[i].querySelector('a')).text();
            ItemUrl = angular.element(menuItem[i].querySelector('a')).attr('href');
            var newSubmenu = angular.element('<md-menu-item><md-button ng-click="ctrl.redirectAction(\''+ ItemUrl +'\')">' + subMenuItem + '</md-button ></md-menu-item>');
            subMenu = angular.element(document.querySelector('#mc-' + menu));
            subMenu.append(newSubmenu);
        });
    }
});
document.querySelector('.navigation').remove();
angular.module('ToolBar', ['ngMaterial'])
        .config(function ($mdIconProvider) {
//            $mdIconProvider
//                    .defaultIconSet('img/icons/sets/core-icons.svg', 24);
        })
//        .filter('keyboardShortcut', function ($window) {
//            return function (str) {
//                if (!str)
//                    return;
//                var keys = str.split('-');
//                var isOSX = /Mac OS X/.test($window.navigator.userAgent);
//                var seperator = (!isOSX || keys.length > 2) ? '+' : '';
//                var abbreviations = {
//                    M: isOSX ? '⌘' : 'Ctrl',
//                    A: isOSX ? 'Option' : 'Alt',
//                    S: 'Shift'
//                };
//                return keys.map(function (key, index) {
//                    var last = index == keys.length - 1;
//                    return last ? key : abbreviations[key];
//                }).join(seperator);
//            };
//        })
        .controller('MenuCtrl', function Ctrl() {
            this.redirectAction = function (name) {
//                alert(location.protocol + '//' + location.host + name);
                if (name === 'home') {
                    window.location = location.protocol + '//' + location.host + basePath;
                }else{
                    window.location = location.protocol + '//' + location.host + name;
                }
            };

        });