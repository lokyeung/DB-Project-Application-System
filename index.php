<html lang="en" ng-app="StarterApp">
  <head>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">
    <meta name="viewport" content="initial-scale=1" />
    <title>PolyU Staff Club</title>
  </head>
  <body layout="column" ng-controller="AppCtrl">
    <md-toolbar layout="row">
     
    </md-toolbar>
    <div layout="row" flex>
          
        <?php include "sidenav.html"; ?>

        <div layout="column" flex id="content">
            <md-content layout="column" flex class="md-padding">

            </md-content>
        </div>
    </div>
    <!-- Angular Material Dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.js"></script>
  </body>
</html>