<div style="height: 385px;">
    <form action="../edit-menu-func.php" method="post" class="reg-form">
        <div>
            <h4>Основы программирования</h4>
            <label>Позиция:</label>
            <input type="number" min="1" max="4" name="position1">
            <label>Виден:</label>
            <input type="radio" name="isVisible1" value="true">Да
            <input type="radio" name="isVisible1" value="false">Нет
        </div>
        <div>
            <h4>Основы ООП</h4>
            <label>Позиция:</label>
            <input type="number" min="1" max="4" name="position2">
            <label>Виден:</label>
            <input type="radio" name="isVisible2" value="true">Да
            <input type="radio" name="isVisible2" value="false">Нет
        </div>
        <div>
            <h4>Основы функционального программирования</h4>
            <label>Позиция:</label>
            <input type="number" min="1" max="4" name="position3">
            <label>Виден:</label>
            <input type="radio" name="isVisible3" value="true">Да
            <input type="radio" name="isVisible3" value="false">Нет
        </div>
        <div>
            <h4>База примеров "Hello, world!" на разных ЯП</h4>
            <label>Позиция:</label>
            <input type="number" min="1" max="4" name="position4">
            <label>Виден:</label>
            <input type="radio" name="isVisible4" value="true">Да
            <input type="radio" name="isVisible4" value="false">Нет
        </div>
        <br />
        <br />
        <input type="submit" value="Сохранить">
    </form>
</div>