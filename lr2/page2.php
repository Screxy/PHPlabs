<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="reset.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <title>PAGE 2</title>
</head>
<body>
    <header class="header">
        <img src="img\mospolytech_logo_white.png" alt="Логотип МПУ" class="header_logo">
        <h1 class="header_text">4.1. Домашняя работа: Feedback Form</h1>
    </header>
    <main>
        <section class="main-content">
            <h1 class="page2-text">Результат работы функции get_headers</h1>
            <textarea rows="10" cols="50">
                <?php
                print_r(get_headers("https://fit.mospolytech.ru"));
                ?>
            </textarea>
        </section>
    </main>
    <footer class="footer">
        <p class="footer_text"> Выполнил: Данцаранов Владислав</p>
    </footer> 
</body>
</html>