<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация контакта</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF токен -->
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Контактная форма</h2>

    <form id="contactForm" class="needs-validation" novalidate method="POST">
        @csrf <!-- Добавляем CSRF директиву -->
        <div class="mb-3">
            <label for="name" class="form-label">Имя:</label>
            <input type="text" class="form-control" name="name" id="name" required>
            <div class="invalid-feedback">
                Пожалуйста, введите имя.
            </div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон:</label>
            <input type="text" class="form-control" name="phone" id="phone" required>
            <div class="invalid-feedback">
                Пожалуйста, введите номер телефона.
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
            <div class="invalid-feedback">
                Пожалуйста, введите корректный email.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

    <div id="response" class="mt-3"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        var form = $(this)[0];
        if (form.checkValidity() === false) {
            e.stopPropagation();
        } else {
            $.ajax({
                url: '/contact',
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Добавляем CSRF токен в заголовок
                },
                success: function(response) {
                    $('#response').html('<div class="alert alert-success" role="alert">' + response.message + '</div>');
                },
                error: function(xhr) {
                    $('#response').html('<div class="alert alert-danger" role="alert">Ошибка при отправке данных</div>');
                }
            });
        }
        form.classList.add('was-validated');
    });
</script>

</body>
</html>
