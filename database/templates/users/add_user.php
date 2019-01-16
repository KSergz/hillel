<?php
echo "
    <h1>Добавить нового пользователя</h1>
    <form action='' method='post'>
        <input type='hidden' name='action' value='add'>
        <label>Логин</label><br>
        <input type='text' name='login' value='{$data['login']}'><br>
";

if (array_key_exists('error', $data) && array_key_exists('login', $data['error'])) {
    echo  "<p style=\"color: red\"> {$data['error']['login']}</p>";
}

echo   "
        <label>Пароль</label><br>
        <input type='password' name='password' value='{$data['password']}'><br>";

if (array_key_exists('error', $data) && array_key_exists('password', $data['error'])) {
    echo  "<p style=\"color: red\"> {$data['error']['password']}</p>";
}

echo "        
        <input type='submit' value='Добавить'>
    </form>
";