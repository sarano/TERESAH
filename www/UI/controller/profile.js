var Profile = portal.controller('ProfileCtrl', ['$scope', 'ui', 'Item', '$rootScope', function($scope, $ui, $item, $root) {
        $scope.ui = {
            profile: {
                placeholder : {
                },
                userdata: {
                },
                submit: function() {                    
                    input = {};
                    
                    error = false;
                    
                    if($scope.ui.profile.userdata.newpassword1 !== $scope.ui.profile.userdata.newpassword2) {
                        $scope.ui.profile.response = {Error : "Passwords don't match"};
                        return false;
                    } else if (typeof $scope.ui.profile.userdata.newpassword1.length === "undefined" || $scope.ui.profile.userdata.newpassword1.length === 0) {
                        //Nothing
                    } else {
                        input["password"] = $scope.ui.profile.userdata.newpassword1;
                        //$scope.ui.profile.response = {Success : false, Error : false};
                    }
                    if($scope.ui.profile.userdata.mail != "")   {
                        input["mail"] = $scope.ui.profile.userdata.mail;
                    }
                    if($scope.ui.profile.userdata.name != "")   {
                        input["name"] = $scope.ui.profile.userdata.name;
                    }
                    $item.resolver.user.profile.edit(input, function(data) {
                        $scope.ui.profile.response = data;
                        if(typeof data.user !== "undefined") {
                            $ui.user.data = data.user;
                            $ui.user.data.signedin = true;
                            $root.user = data.user;
                            $root.user.signedin = true;
                            $root.$broadcast("USER_UPDATE", $ui.user.data);
                        }
                        $scope.ui.profile.userdata.newpassword1 = "";
                        $scope.ui.profile.userdata.newpassword2 = "";
                    });                    
                },
                response: {
                    Success : false,
                    Error : false,
                }
            }
        };
        $ui.user.signedin(function(data) {
            $scope.ui.profile.placeholder = data;
            $scope.ui.profile.userdata.newpassword1 = "";
            $scope.ui.profile.userdata.newpassword2 = "";
        });
        $ui.title("Profile");
    }]);
