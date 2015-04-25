var app = angular.module('StaffClubApp', ['ngMaterial', 'ngRoute']);
app.config(function ($mdThemingProvider, $locationProvider, $routeProvider) {
    $mdThemingProvider.theme('default')
        .primaryPalette('blue')
        .accentPalette('brown');

    $locationProvider.html5Mode(true);
    //$locationProvider.hashPrefix('!');
    $locationProvider.html5Mode.requireBase = false;

})

app.controller('AppCtrl', function ($scope, $mdToast, $location, $http, $mdDialog) {
    $scope.staff_id = null;
    $http.get('user.php?act=info').
    success(function(data, status, headers, config) {
        $scope.user = angular.fromJson(data);
    });
    $scope.showMessageToast = function (message) {
        if (message == 'loginSuccess') {
            $mdToast.show(
                $mdToast.simple()
                .content('Login Success!')
                .position('top right')
                .action('OK')
                //).then($location.url('index.html?msg=loginSuccess'))
            ).then($scope.isLogin = true);
        } else if (message == 'loginError') {
            $mdToast.show(
                $mdToast.simple()
                .content('Login failed!')
                .position('top right')
                .action('OK')
            ).then($location.url('login.html?msg=loginError'));
        } else if (message == 'loginAlready') {
            var confirm = $mdDialog.alert()
            .title('Message')
            .content('You have already logged in.')
            .ariaLabel('Message - Login Already')
            .ok('Got it!');
            $mdDialog.show(confirm)
            //   .then(function() {
            //    $location.url('index.html');
            //}, function() {
            //    $location.url('index.html');
            //});
            ;
        } else if (message == 'notLogin') {
            var confirm = $mdDialog.confirm()
            .title('Message')
            .content('You have not logged in.')
            .ariaLabel('Message - Not Login')
            .ok('Login')
            .cancel('Got it!');
            $mdDialog.show(confirm)
            //   .then(function() {
            //    $location.url('index.html');
            //}, function() {
            //    $location.url('index.html');
            //});
            ;
        } else if (message == 'actNotExist') {
            var confirm = $mdDialog.alert()
            .title('Message')
            .content('The activity does not exist.')
            .ariaLabel('Message - Activity Not Exist')
            .ok('Got it!');
            $mdDialog.show(confirm)
            //   .then(function() {
            //    $location.url('index.html');
            //}, function() {
            //    $location.url('index.html');
            //});
            ;
        }
    };
    $scope.isLogin = false;
    $scope.message = $location.search()['msg'];
    if ($scope.message) {
        $scope.showMessageToast($scope.message);
    }
})
    .controller('LoginCtrl', function ($scope, $mdToast, $http, $mdToast, $mdDialog, $location) {
    $scope.submit = function() {
        $http.post('user.php?act=login', $scope.login).
        success(function(data, status, headers, config) {
            $scope.showMessageToast(data);
        });
    };
})
    .controller('CreateActCtrl', function ($scope, $http, $location) {
    $scope.act_type_id = $location.search()['type'];
    $scope.submit = function() {
        $http.post('create-activity.php', $scope.create).
        success(function(data, status, headers, config) {
            $scope.showMessageToast(data);
        });
    };
})
    .controller('ViewActListCtrl', function ($scope, $http) {
    $http.get('view-activity-list.php').
    success(function(data, status, headers, config) {
        $scope.actList = angular.fromJson(data);
    });
})

    .controller('EditActCtrl', function ($scope, $http, $location) {
    $scope.act_id = parseInt($location.search()['id']);
    $http.get('edit-activity.php?id=' + $scope.act_id).
    success(function(data, status, headers, config) {
        $scope.act = angular.fromJson(data);
        if ($scope.act.err === true) {
            $scope.act.name = 'Error';
            $scope.showMessageToast($scope.act.msg);
        }
    });
    $scope.submit = function() {
        $http.post('edit-activity.php?id=' + $scope.act_id, $scope.edit).
        success(function(data, status, headers, config) {
            $scope.showMessageToast(data);
        });
    };
})
    .controller('ViewActCtrl', function ($scope, $http, $location) {
    $scope.act_id = parseInt($location.search()['id']);
    $http.get('view-activity.php?id=' + $scope.act_id).
    success(function(data, status, headers, config) {
        $scope.act = angular.fromJson(data);
        if ($scope.act.err === true) {
            $scope.act.name = 'Error';
            $scope.showMessageToast($scope.act.msg);
        }
    });
})
    .controller('EnrolCtrl', function ($scope, $http, $location) {
    $scope.act_id = parseInt($location.search()['id']);
    $http.get('enroll-activity.php?id=' + $scope.act_id).
    success(function(data, status, headers, config) {
        $scope.act = angular.fromJson(data);
        if ($scope.act.err === true) {
            $scope.act.name = 'Error';
            $scope.showMessageToast($scope.act.msg);
        }
        $scope.enroll = {
            staff_id: $scope.act.staff_id,
            contact : {
                name: $scope.act.contact_name,
                mobile : $scope.act.contact_mobile
            }
        };
    });
})
    .controller('RegCtrl', function ($scope, $http) {
    $scope.submit = function() {
        $http.post('user.php?act=reg', $scope.reg).
        success(function(data, status, headers, config) {
            $scope.showMessageToast(data);
        });
    };
});