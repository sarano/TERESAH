var Profile = portal.controller('ProfileCtrl', ['$scope', 'ui', 'Item', '$rootScope', '$window', function($scope, $ui, $item, $root, $window) {
        $scope.ui = {
                user : {
                        data : {
                                
                        }
                }
        }
        $ui.user.signedin(function (data) {
                $scope.ui.user.data = data;
        });
        $ui.title("Profile");

        //exec
    }]);