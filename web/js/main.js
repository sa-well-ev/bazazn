//добавляем слушатель для меню

$('.menu-ajax').on('click', function()
{
    $('.menu-ajax').removeClass('ajax-selected');
    var id = $(this).data('id'),
    model = $('.ajax-selected').data('model');
    $(this).addClass('ajax-selected');
    getData(id, model);
});
//добавляем слушатель для 4-ёх ссылок
$('.href-ajax').on('click', function()
{
    $('.href-ajax').removeClass('ajax-selected');
    var model = $(this).data('model'),
        id = $('.ajax-selected').data('id');
    $(this).addClass('ajax-selected');
    getData(id, model);
});

function getData(id, model)
{
    $.ajax({
        url: '/base/view',
        type: 'GET',
        data: {id: id, model: model},
        success: function (result) {
            if (!result) alert('Ответ пустой');
            $('#doc-list').html(result);
        },
        error: function () {
            alert('Запрос завершился неизвестной ошибкой');
        }
    });
}