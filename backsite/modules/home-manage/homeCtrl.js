/**
 * 主页内容管理
 */
MYSITE.value('froalaConfig', {
		language: 'zh_cn',
        toolbarInline: false,
        placeholderText: '请输入编辑内容',
        pasteAllowedStyleProps: ['font-family', 'font-size', 'color'],
        toolbarButtons: ['fullscreen', 'print', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'specialCharacters', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
	    pluginsEnabled: ['link'],
	    fontFamilySelection: true,
	    fontSizeSelection: true,
	    paragraphFormatSelection: true
    })
.controller('HomeCtrl', ['$scope', 'HomeService', function ($scope, HomeService) {
}]);