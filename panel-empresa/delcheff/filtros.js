 var miAp = angular.module('miAp', [])
  miAp.controller('ControladorFiltros', ['$scope', function($scope) {
  $scope.empleados =
    [
      {
        id:'1', nombre:'Ana', paterno: 'Guzman', materno: 'Guzman', primerDia: new Date(),
        salario: 12000, telefono:'5587687687', bono: 1.456789, stado: 2
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'1', nombre:'Ana', paterno: 'Guzman', materno: 'Guzman', primerDia: new Date(),
        salario: 12000, telefono:'5587687687', bono: 1.456789, stado: 2
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'1', nombre:'Ana', paterno: 'Guzman', materno: 'Guzman', primerDia: new Date(),
        salario: 12000, telefono:'5587687687', bono: 1.456789, stado: 2
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'2', nombre:'Adrian', paterno: 'Romero', materno: 'Paez', primerDia:  new Date(),
        salario: 12000, telefono:'5512345678', bono: 9.654321, stado: 1
      },
      {
        id:'3', nombre:'Alejandro', paterno: 'Mena', materno: 'Morales', primerDia:  new Date(),
        salario: 5000, telefono:'5512312312', bono: 12.989898, stado: 1
      }
    ];
  $scope.selection=[];

 $scope.toggleSelection = function toggleSelection(employeeName) {
     var idx = $scope.selection.indexOf(employeeName);
     // is currently selected
     if (idx > -1) {
       $scope.selection.splice(idx, 1);
     }
     // is newly selected
     else {
       $scope.selection.push(employeeName);
     }
   };


  $scope.ordenarPor = function(orden) {
    $scope.ordenSeleccionado = orden;
  };


}]);