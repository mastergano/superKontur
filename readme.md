TestovoeOddone Project

Описание проекта

Этот проект представляет собой контактную форму с возможностью отправки данных на почту, использующую SMTP-сервер Mailtrap для тестирования. 

Установка

1. Склонируйте репозиторий:
git clone https://your-repository-url.git](https://github.com/mastergano/superKontur.git)

2. Настройте базу данных и почтовые параметры в .env. Убедитесь, что ваши почтовые настройки для Mailtrap корректны:
Вот пример Mailtrap:
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=5532bfe2082b29
MAIL_PASSWORD=b7a63a9717cb8e
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"


3. Для локальной разработки запустите сервер Laravel:
   php artisan serve
4. Чтобы использовать контактную форму, перейдите по следующему URL: http://testovoeoddone:8080/contact

