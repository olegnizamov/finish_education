1 В качестве основы своего проекта возьмите то, что сделано нами на уроке. Прочтите внимательно код, еще раз повторите, как он работает. 

2 Улучшите класс Db.
- Во-первых сократите код в методе query(), отвечающий за преобразование данных в объекты нужного класса до одной строчки (читайте руководство по PDO, чтобы понять, как это сделать!)
> В файле App/Db.php исправлен метод query()
- Во-вторых добавьте в этот метод возможность передать подстановки в запрос.
> Выполнено на уроке
- И в-третьих, сейчас мы написали только метод query(), предназначенный для выполнения запросов, возвращающих данные. Напишите еще один метод execute($query, $params=[]), который будет выполнять запросы, не возвращающие данные (например INSERT, UPDATE) и возвращать лишь true/false в зависимости от того, удачно ли выполнился запрос. 
> В файле App/Db.php исправлен метод query() и добавлен метод execute()

3 Протестируйте работу нового метода, для чего заведите в проекте папку tests и в ней размещайте скрипты, которые наглядно докажут работоспособность вашего кода.
> Добавлена папка Tests c классом DbTest для проверки базы данных
> Добавлен файл tests.php для вызова данного тестов

4 В абстрактной модели добавьте метод public static function findById($id). Он должен вернуть ОДНУ запись из таблицы данной модели, с указанным первичным ключом. Или false, если таковой записи не нашлось.
> В файле App/Model.php добавлен метод findById

5 Сделайте таблицу новостей. Добавьте в нее 3-4 новости. На главной странице сайта (index.php) сделайте вывод 3 последних новостей. Используйте модель Article для получения данных (возможно, вам придется добавить какой-то еще метод в эту модель). Для передачи данных в шаблон - просто include файла с шаблоном.
> В файле App/Model.php добавлен метод getLastRecords и файл templates/news.php

6 Каждая новость на главной странице должна быть снабжена ссылкой на страницу /article.php?id=NNN, где NNN - номер этой новости. Разработайте полностью страницу article.php
> Добавлен файл article.php и файл templates/article.php