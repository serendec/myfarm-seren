$('.search_icon').on('click', function(){
    addPrefToForm();
    $('#form-search').submit();
});
$('.area_button').on('click', function(){
    $('input[name="s"]').val('');
    $('input[name="pref"]').remove();
    const prefValue = $(this).data('pref');
    $('<input>').attr({
        type: 'hidden',
        name: 'pref',
        value: prefValue
    }).appendTo('#form-search');
    $('#form-search').submit();
});
function addPrefToForm() {
    // .area_button.onが存在するか確認
    const selectedButton = $('.area_button.on');
    if (selectedButton.length) {
        $('input[name="pref"]').remove();
        const prefValue = selectedButton.data('pref');
        $('<input>').attr({
            type: 'hidden',
            name: 'pref',
            value: prefValue
        }).appendTo('#form-search');
    }
}

