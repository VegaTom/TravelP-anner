'use strict';

angular.module('travelPlannerApp')
    .factory('sweetAlertService', ['SweetAlert', '$translate', function(SweetAlert, $translate) {

        function basic(message) {
            return SweetAlert.swal(message);
        }

        function complex(data, callback) {
            return SweetAlert.swal(data, callback);
        }

        return {
            basic: function(message) {
                return basic(message);
            },
            confirm: function(data, callback) {
                return complex({
                    title: data.title,
                    text: data.text,
                    //type: data.type || 'success',
                    imageUrl: 'images/icons/trash-b.png',
                    imageWidth: 400,
                    imageHeight: 200,
                    showCancelButton: data.showCancelButton || true,
                    confirmButtonColor: data.confirmButtonColor || '#DD6B55',
                    confirmButtonClass: 'btn custom-button-2',
                    confirmButtonText: data.confirmButtonText || $translate.instant('yes'),
                    cancelButtonText: data.cancelButtonText || $translate.instant('no'),
                    closeOnConfirm: data.closeOnConfirm || true,
                    closeOnCancel: data.closeOnCancel || true,
                    customClass: 'my-sweet-class',
                }, callback);
            },
            input: function(data, callback) {
                return complex({
                    title: data.title,
                    text: data.text,
                    type: 'input',
                    showCancelButton: data.showCancelButton || true,
                    confirmButtonColor: data.confirmButtonColor || 'blue',
                    confirmButtonText: data.confirmButtonText || 'Aceptar',
                    cancelButtonText: data.cancelButtonText || 'Cancelar',
                    closeOnCancel: data.closeOnCancel || true,
                    animation: 'slide-from-top',
                    customClass: 'text-black'
                }, callback);
            }
        };

    }]);
