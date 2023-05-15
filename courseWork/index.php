<?php 
include 'header.html';
?>
    <main>
        <div class="wrapper">
            <h2 class="form__title">Выберите область знаний которую хотите удалить</h2>
            <form class="form" method="post" action="index.php">
                <label class="form__label">Save<input class="form__input" type="checkbox" name="save" value="True"></label>
                <label class="form__label">Like<input class="form__input" type="checkbox" name="like" value="True"></label>
                <label class="form__label">Подтверждаю удаление<input class="form__input" type="checkbox" name="delete" value="Delete"></label>
                <label class="form__label">Область знаний
                    <select name="field" class="form__select">
                        <?php
                        require_once 'FieldControl.php';
                        $FieldControlObj = new FieldControl();
                        $FieldControlObj->getFieldNames();
                        ?>
                    </select>
                </label>
                <input class="submit" type="submit" value="Удалить Field">
                <?php
                $FieldControlObj->deleteField();
                ?>
                <h2 class="title">Все хештеги:</h2>
                <?php
                $FieldControlObj->getAllHashtagName();
                ?>
            </form>
        </div>
    </main>
    <footer class="footer">
        <p class="footer_text"> Выполнил: Данцаранов Владислав</p>
    </footer>
</body>

</html>