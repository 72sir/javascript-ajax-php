# Тестовое задание для гипермаркета Магнит.

Создать базу данных  в SQL-совместимой СУБД. Создать необходимые для выполнения задания таблицы и справочные данные (сделать это в виде sql скрипта).

Написать приложение заполнения формы обратной связи с сохранением результата в базу данных. Приложение должно реализовывать возможность просмотра и удаления добавленных записей.

Добавление комментариев. После запуска приложения при обращении по относительному пути /comment/ должна отображаться форма для заполнения. Форма состоит из следующих полей:
•	фамилия
•	имя
•	отчество
•	регион
•	город
•	контактный телефон
•	e-mail
•	комментарий.

Поля фамилия, имя и комментарий являются обязательными. Поле комментарий текстовое. Для полей телефон и email следует производить проверку ввода. Номер телефона в формате «(код города) номер». Поля с некорректным вводом и не заполненные обязательные поля должны визуально выделяться красным цветом. Поля регион и город являются выпадающими списками, при этом список выбора поля город зависит от выбранного поля регион. Данные для этих списков должны храниться в СУБД. Значение в поля город должно динамически подгружаться по технологии ajax в соответствии с выбранным полем регион.  Таблица соответствия для примера:

Регион - Краснодарский край.
Город - Краснодар, Кропоткин, Славянск

Регион - Ростовская область.
Город - Ростов, Шахты, Батайск

Регион - Ставропольский край.
Город - Ставрополь, Пятигорск, Кисловодск 

Просмотр/удаление комментариев. При обращении по относительному пути /view/ должна выводиться таблица со списком добавленных комментариев. В этом же представлении должна быть возможность удалить определенную запись.

Просмотр статистики.  При обращении по относительному пути /stat/ должна выводиться таблица со списком тех регионов у которых количество комментариев больше 5, выводить так же и количество комментариев по каждому региону. Каждая строчка должны быть ссылкой на список города этого региона в котором отображается количество комментариев по этому городу.


![comment](https://cloud.githubusercontent.com/assets/11897341/23590460/7e4b380e-01f1-11e7-8101-840fb3948cba.png)
![stat](https://cloud.githubusercontent.com/assets/11897341/23590461/82fad44a-01f1-11e7-83b1-d58a834da529.png)
![view](https://cloud.githubusercontent.com/assets/11897341/23590462/88927502-01f1-11e7-9703-3d7489b7631c.png)

Алгоритм работы был выбран самый простейший как в php так и в js скриптах. Js скрипты располагаются в папке www/views так как являются представлениями для общего алгоритма. Php отвечает за серверную часть по обработке данных из базы данных и преобразовании в json массив. После преобразвания данных в массив, происходит передача в скрипт по средствам ajax и далее вывод в html.
