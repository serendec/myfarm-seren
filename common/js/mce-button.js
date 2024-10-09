(function() {
    // ビジュアルエディタにプルダウンメニューの追加
    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
        editor.addButton( 'my_mce_button', {
            text: 'クイックタグ',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: '段落タグ',
                    onclick: function() {
                        var selected_text = editor.selection.getContent();
                        var return_text = '';
                        return_text = '<p class="">' + selected_text + '</p>';
                        editor.insertContent(return_text);
                    }
                },
                {
                    text: '改行タグ',
                    onclick: function() {
                        var selected_text = editor.selection.getContent();
                        var return_text = '';
                        editor.insertContent('<br class="">');
                    }
                },
            ]
        });
    });
})();
