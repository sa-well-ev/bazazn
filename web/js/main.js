//Переменные который хранят выбранный id и модель
var id = 1;
var model = 'letter';
//добавляем слушатель для меню
$('.menu-ajax').on('click', function()
{
    $('.menu-ajax').removeClass('ajax-selected');
    id = $(this).data('id');
    $(this).addClass('ajax-selected');
    getData(id, model);
});
//добавляем слушатель для 4-ёх ссылок
$('.href-ajax').on('click', function()
{
    $('.href-ajax').removeClass('ajax-selected');
    model = $(this).data('model');
    $(this).addClass('ajax-selected');
    getData(id, model);
});

function getData(id, model)
{
    var withChild = ($(':checkbox[name="withChild"]').prop('checked'));
    $.ajax({
        url: '/base/view',
        type: 'GET',
        data: {id: id, model: model, withChild: withChild},
        success: function (result) {
            if (!result) alert('Ответ пустой');
            $('#doc-list').html(result);
        },
        error: function () {
            alert('Запрос завершился неизвестной ошибкой');
        }
    });
}