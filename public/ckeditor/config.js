/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.height = 300;
	config.fontSize_sizes = '13px/13px;14px/14px;16px/16px;';
	config.font_names ='Helvetica/Helvetica,Arial,sans-serif;';
	config.filebrowserBrowseUrl = 'http://localhost:8888/combineshop/ckfinder/ckfinder.html'; config.filebrowserImageBrowseUrl = 'http://localhost:8888/combineshop/ckfinder/ckfinder.html?type=Images'; config.filebrowserFlashBrowseUrl = 'http://localhost:8888/combineshop/ckfinder/ckfinder.html?type=Flash'; config.filebrowserUploadUrl = 'http://localhost:8888/combineshop/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; config.filebrowserImageUploadUrl = 'http://localhost:8888/combineshop/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'; config.filebrowserFlashUploadUrl = 'http://localhost:8888/combineshop/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
