'use strict';

angular.module('comunidadDigitalApp')
    .config(function($provide) {

        $provide.decorator('taOptions', ['taRegisterTool', 'taTranslations', '$delegate', '$uibModal', function(taRegisterTool, taTranslations, taOptions, $uibModal) {

            taOptions.toolbar = [
                ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'pre', 'quote'],
                ['bold', 'italics', 'underline', 'strikeThrough', 'ul', 'ol', 'redo', 'undo', 'clear'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'indent', 'outdent'],
                ['backgroundColor', 'fontColor'],
                ['html', 'insertLink', 'insertImage', 'uploadImage', 'insertVideo', 'wordcount', 'charcount']
            ];

            taRegisterTool('uploadImage', {
                tooltiptext: taTranslations.uploadImage.tooltip,
                buttontext: 'Upload Image',
                iconclass: "fa fa-image",
                action: function(deferred, restoreSelection) {
                    $uibModal.open({
                        controller: 'UploadImageModalCtrl',
                        templateUrl: 'views/dialogs/upload-image-modal.html'
                    }).result.then(
                        function(result) {
                            restoreSelection();
                            document.execCommand('insertImage', true, result);
                            deferred.resolve();
                        },
                        function() {
                            deferred.resolve();
                        }
                    );
                    return false;
                }
            });

            taRegisterTool('backgroundColor', {
                tooltiptext: taTranslations.backgroundColor.tooltip,
                display: "<div spectrum-colorpicker style='padding-top: 1px; padding-bottom: 1px;' ng-model='color' on-change='!!color && action(color)' format='\"hex\"' options='options'></div>",
                action: function(color) {
                    var me = this;
                    if (!this.$editor().wrapSelection) {
                        setTimeout(function() {
                            me.action(color);
                        }, 100);
                    } else {
                        return this.$editor().wrapSelection('backColor', color);
                    }
                },
                options: {
                    replacerClassName: 'fa fa-paint-brush',
                    showButtons: false
                },
                color: "#fff"
            });

            taRegisterTool('fontColor', {
                tooltiptext: taTranslations.fontColor.tooltip,
                display: "<div spectrum-colorpicker style='padding-top: 1px; padding-bottom: 1px;' ng-model='color' on-change='!!color && action(color)' format='\"hex\"' options='options'></div>",
                action: function(color) {
                    var me = this;
                    if (!this.$editor().wrapSelection) {
                        setTimeout(function() {
                            me.action(color);
                        }, 100);
                    } else {
                        return this.$editor().wrapSelection('foreColor', color);
                    }
                },
                options: {
                    replacerClassName: 'fa fa-font',
                    showButtons: false
                },
                color: "#000"
            });

            return taOptions;
        }]);

        $provide.decorator('taTranslations', ['$delegate', function(taTranslations) {

            taTranslations = textAngular_es;

            return taTranslations;
        }]);



    })
    .factory('youtubeParser', function youtubeParserFactory($log) {
        return function youtubeParser(url) {
            var match = url && url.match((/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/));
            return match && match[2].length === 11 ? match[2] : false;
        };
    })
    .factory('taReverseCustomRenderers', function($log, youtubeParser, taCustomRenderers, taDOM) {
        return function(val) {
            var element = angular.element('<div></div>');
            element[0].innerHTML = val;
            var elements = element.find('iframe');

            angular.forEach(elements, function($element) {
                var embedSlug = youtubeParser($element.src);
                var _element = angular.element($element);

                var embedHtml = '<img class="ta-insert-video" src="https://img.youtube.com/vi/' + embedSlug + '/hqdefault.jpg" ta-insert-video="' + $element.src + '" contenteditable="false" allowfullscreen="true" frameborder="0"';
                if ($element.width ||
                    $element.height
                ) {
                    if ($element.width) {
                        embedHtml += ' width="' + $element.width + '"';
                    }
                    if ($element.height) {
                        embedHtml += ' height="' + $element.height + '"';
                    }
                } else if ($element.style) {
                    var style = '';

                    if (angular.isObject($element.style)) {
                        style = $element.style.cssText;
                    } else if (angular.isString($element.style)) {
                        style = $element.style;
                    }

                    embedHtml += ' style="' + style + '"';
                }
                embedHtml += ' />';
                _element.replaceWith(embedHtml);
            });

            return element[0].innerHTML;
        };
    });