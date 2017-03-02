/**
 * Created by Sirotkin on 02.03.2017.
 */

/*
* При полной загрузке документа
* мы начинаем определять события
*/
$(document).ready(function () {
    /*
     * На выборе селекта страны — вешаем событие,
     * функция будет брать значение этого селекта
     * и с помощью ajax запроса получать список
     * городов для вставки в следующий селект
     */
    $('#country_id').change(function () {
        /*
         * В переменную country_id положим значение селекта
         * (выбранная страна)
         */
        var country_id = $(this).val();
        /*
         * Если значение селекта равно 0,
         * т.е. не выбрана страна, то мы
         * не будем ничего делать
         */
        if (country_id == '0') {
            $('#region_id').html('<option>- выберите город -</option>');
            $('#region_id').attr('disabled', true);
            return(false);
        }
        /*
         * Очищаем второй селект с городами
         * и блокируем его через атрибут disabled
         * туда мы будем класть результат запроса
         */
        $('#region_id').attr('disabled', true);
        $('#region_id').html('<option>загрузка...</option>');
        /*
         * url запроса городов
         */
        var url = '/php/wrap/comment/request_cities_in_region.php';

        $.post(
            url,
            "country_id=" + country_id,
            function (result) {
                /*
                 * В случае неудачи мы получим результат с type равным error.
                 * Если все прошло успешно, то в type будет success,
                 * а также массив regions, содержащий данные по городам
                 * в формате 'id'=>'1', 'title'=>'название города'.
                 */
                if (result.type == 'error') {
                    /*
                     * ошибка в запросе
                     */
                    alert('error');
                    return(false);
                }
                else {
                    /*
                     * проходимся по пришедшему от бэк-энда массиву циклом
                     */
                    var options = '';
                    $(result.regions).each(function() {
                        /*
                         * и добавляем в селект по городу
                         */
                        options += '<option value="' + $(this).attr('id') + '">' + $(this).attr('title') + '</option>';
                    });
                    $('#region_id').html(options);
                    $('#region_id').attr('disabled', false);
                }
            },
            "json"
        );
    });
});