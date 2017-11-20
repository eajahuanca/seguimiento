/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    config.toolbarGroups = [
        { name: 'clipboard', groups: ['clipboard', 'undo'] },
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
        { name: 'paragraph', groups: ['list'] },
        //{ name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
        //{ name: 'editing', groups: ['find'] },
        //{ name: 'links' },
        //{ name: 'insert' },
        //{ name: 'forms' },
        //{ name: 'document', groups: ['mode', 'document', 'doctools'] }, para html
        //{ name: 'others' },

        //{ name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'] },
        { name: 'styles' },
        { name: 'tools' },
        //{ name: 'colors' }
        //{ name: 'about' }
    ];

    // Remove some buttons, provided by the standard plugins, which we don't
    // need to have in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript,Image,StrikeThrough,Link,Unlink,RemoveFormat,Strike,About,PasteText,PasteFromWord';

    // Se the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Make dialogs simpler.
    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.height = 100;
};