<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 4</title>
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
        <h1 class="header_text">1.2. Домашняя работа: Solve the equation.</h1>
    </header>
    <main>
        <section class="main-content">
            <div class="solving">
                <form action="index.php" method="post">
                    <label for="equation">Введите уравнение:</label>
                    <input type="text" name="equation" id="equation" placeholder="a/x=b" pattern="^[0-9x+\-*=/]+$" title="Только цифры, арифметические знаки и x">
                    <button type="submit">Решить!</button>
                </form>
            </div>
            <p class="solve">Ваш ответ: 
            <!-- <textarea name="solve" id="solve" class="answer"> -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $inputText = $_POST['equation'];
                    if (strpos($inputText, '=') !== false) {
                        // Разделяем уравнение на левую и правую части по знаку равно
                        $parts = explode("=", $inputText);
                        $leftSide = $parts[0]; 
                        $rightSide = $parts[1];
                        // Получаем число,знак и переменную из левой части уравнения
                        $pattern = '/(\d+)([\+\-\*\/])([x])/i';
                        $leftParts = preg_split($pattern, $leftSide, -1, PREG_SPLIT_DELIM_CAPTURE);
                        $leftNumber = intval($leftParts[1]); 
                        $operator = $leftParts[2];
                        // Получаем число из правой части уравнения
                        $rightNumber = intval($rightSide);
                        // Решаем уравнение
                        if ($operator == "+"){
                            $x = $rightNumber - $leftNumber;
                        }
                        elseif ($operator == "-"){
                            $x = $leftNumber - $rightNumber;
                        }
                        elseif ($operator == "/"){
                            $x = $leftNumber / $rightNumber;
                        }
                        elseif ($operator == "*"){
                            $x = $rightNumber/$leftNumber;
                        }
                        echo "x = " . $x; // x = 12
                    }
                }
            ?>
            </p>
        </section>
    </main>
    <footer class="footer">
        <p class="footer_text"> Выполнил: Данцаранов Владислав</p>
    </footer>
</body>
</html>