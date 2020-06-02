/* controller */


/* InitCtrl */

app.controller("InitCtrl", function ($scope, $http,searchProvider, menu,$mdDialog, $translate,$window,Toasts,$location,$mdSidenav) {


	vm.menu = menu;

	vm.currentLang = NEXO.lang;

	template = "<md-dialog aria-label=\"Mango (Fruit)\"  ng-cloak>\n\n        <md-dialog-content>\n            <div class=\"md-dialog-content\">\n               <p translate=\"GLOBAL.CAMBIANDO_IDIOMA\"></p>\n            </div>\n        </md-dialog-content>\n</md-dialog>";

	vm.changeLang = function (langKey) {
		$mdDialog.show({
			template: template,
			parent: angular.element(document.body),
			clickOutsideToClose: false
		});


		url = 'users/change-lang/'
		attr = {};
		attr.url = url;
		attr.method = 'POST';
		attr.params = {lang: langKey};
		searchProvider.query(attr,'',function (response) {
			return $window.location.reload();
		});

		/*Store.mapper('user').changeLang(langKey).then(function () {
			
		});*/
	};

	//$mdSidenav('left').open();

	vm.openLeftMenu = function() {
		//console.log('panel left side nav' );
    	//$mdSidenav('left').toggle();
    	jQuery('.open-menu').toggleClass('md-locked-open')
  	};	

	this.open = function openMenu(ev) {
		originatorEv = ev;
      	$mdMenu.open(ev);
	  };

	$scope.$mdOpenMenu = this.open;


	//console.log('vm.menu');
	//console.log(menu);
	//vm.logo = NEXO.team.logo;

	vm.logo = "/build/img/02533ec0742e995265c5a9f3438c3744.png";
	var user = NEXO.user;

	if(user.avatar){
		vm.logo = user.avatar;
	}

	vm.name = user.name;

	$scope.vm   = vm;
	
});
