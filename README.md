# Информационная система рейтинга
## v 2.2.2
* Добавлена авторизация по сертификату, для этого следует изменить следующие настройки в файле conf/extra/httpd.conf:
` SSLProtocol -all +TLSv1.2
А также добавить следующие директивы виртуальному серверу, на котором будет установлена система, пути заменить свои:
	
	SSLCACertificateFile "C:\Server\data\htdocs\rating\oauth\ca.crt"
	<Directory "C:\Server\data\htdocs\rating\oauth">
	SSLVerifyClient require
	SSLOptions +StdEnvVars +ExportCertData
	SSLCipherSuite ALL
	</Directory>
 	
## v 2.2.1
* На странице оценок при добавлении дробей запятая заменяется точкой
## v 2.2
* Исправлена страница результатов
* Добавлены проценты в таблицу итогов
* Добавлена функция копирования имен экспертов в разные темы
* Добавлена функция копирования критериев в разные темы
## v 2.0
* Добавлены пользователи и регистрация пользователей
* Добавлены категории оценки
* Вход экспертов по PIN коду
* Добавлена возможность добавления тем
## v 1.1
* Добавлена прокрутка таблицы в результатах
* Добавлена возможность скачать таблицу результатов
