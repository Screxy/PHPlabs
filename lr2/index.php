<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 2.PAGE1</title>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="reset.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <header class="header">
        <img src="img\mospolytech_logo_white.png" alt="Логотип МПУ" class="header_logo">
        <h1 class="header_text">4.1. Домашняя работа: Feedback Form</h1>
    </header>
    <main>
        <section class="main-content">
            <form class="feedback-form"  action="https://httpbin.org/post" method="post">
                <div class="input username">
                    <label for="username">Ваше имя:</label>
                    <input type="text" placeholder="Владислав" id="username" name="username" required>
                </div>
                <div class="input email">
                    <label for="email">Ваша электронная почта:</label>
                    <input type="email" placeholder="example@example.com" id="email" name="email" required>
                </div>
                <div class="input select">
                    <label for="message-type">Тип обращения:</label>
                    <select class="form-select" id="message-type" name="message-type" required>
                        <option value="complaint">Жалоба</option>
                        <option value="suggestion">Предложение</option>
                        <option value="praise">Благодарность</option>
                    </select>
                </div>
                <div class="input checkbox">
                    <div class="checkbox-block">
                        <label for="sms">СМС</label>
                        <input type="checkbox" id="sms" value="sms">
                    </div>
                    <div class="checkbox-block">
                        <label for="email-checkbox">Email</label>
                        <input type="checkbox" id="email-checkbox" value="email-checkbox" >
                    </div>
                </div>
                <button type="submit" class="feedback-form-btn">Отправить</button>
            </form>
            <a href="./page2.php" class="btn-to-page2"><img src="./img/arrow.png" alt="arrow" class="arrow"></a>
        </section>
    </main>
    <footer class="footer">
        <p class="footer_text"> Выполнил: Данцаранов Владислав</p>
    </footer>
</body>
</html>