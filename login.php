<?php require_once "header.php"; ?>

<?php
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "", "hackaton");

if(isset($_POST['submit']))
{
    $query = mysqli_query($link,"SELECT id, password FROM users WHERE login='".trim($_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        if(!empty($_POST["remember_me"])){
            //Создаём токен
            $password_cookie_token = md5($data["id"].$_POST['password'].time());
            //Добавляем созданный токен в базу данных
            $update_password_cookie_token = mysqli_query($link,"UPDATE users SET password_cookie_token='".$password_cookie_token."' WHERE id='".$data['id']."'");
            if(!$update_password_cookie_token){
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: register.php");
                exit();
            }
            //Устанавливаем куку с токеном
            setcookie("password_cookie_token", $password_cookie_token, time() + (1000 * 60 * 60 * 24 * 30), "/");
        }else{
            //Если галочка "запомнить меня" небыла поставлена, то мы удаляем куки
            if(isset($_COOKIE["password_cookie_token"])){
                //Очищаем поле password_cookie_token из базы данных
                $update_password_cookie_token = mysqli_query($link,"UPDATE users SET password_cookie_token = '' WHERE id = '".$data['id']."'");
                //Удаляем куку password_cookie_token
                setcookie("password_cookie_token", "", time() - 3600, "/");
            }
            // Записываем в БД новый хеш авторизации
            mysqli_query($link, "UPDATE users SET hash='".$hash."' WHERE id='".$data['id']."'");
        }
        // Ставим куки
        setcookie("id", $data['id']);
        setcookie("hash", $hash);
        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>

<div class="hero-content">
      </div>
    </header>
    <style>
        header{
            min-height: 0;
        }
    </style>
    <!-- end of header -->
    <section class="welcome">
      <div class="container">
        <div class="title title-md">
          <h3>Kirish</h3>
          <div class="line"></div>
        </div>
        <div class="forma">
      <div class="container">
        <form action="" method="POST">
          <div class="qator">
            <label for="login" class="lg-text">Login:</label>
            <input type="text" id="login" name="login"  />
          </div>
          <div class="qator">
            <label for="parol" class="lg-text">Parol:</label>
            <input type="password" id="parol" name="password" />
          </div>
          <div class="qator">
            <label for="remember_me" class="lg">Eslab qolish:</label>
            <input type="checkbox" id="remember_me" name="remember_me" />
          </div>
          <a style="margin-right: 30px;" href="register.php">Ro'yhatdan o'tish</a>
          <input type="submit" name="submit" value="Kirish" class="btn primary-btn">
        </form>
        
      </div>
    </section>
    
      </div>
    </div>

    <footer>
      <div class="row container">
        <div>
          <img src="images/logo.png" alt="" />
          <p class="text">
            "Brain children" <br> loyihasi ijtimoiy tarmoqlari
          </p>
          <ul class="footer-social-links">
            <li class="flex">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="flex">
              <a href="#"><i class="fab fa-telegram-plane"></i></a>
            </li>
            <li class="flex">
              <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li class="flex">
              <a href="#"><i class="fas fa-envelope"></i></a>
            </li>
          </ul>
        </div>

        <div>
          <!-- <h3 class="lg-text">Information</h3> -->
          <div class="footer-links">
            <a href="#">Ro'yhatdan o'tish</a>
            <a href="#">Shaxsiy kabinet</a>
            <a href="#">Darsliklar</a>
            <a href="#">Video</a>
            <a href="#">Imtihon</a>
            <a href="#">Sayt haqida</a>
          </div>
        </div>

        <!-- <div>
          <h3 class="lg-text">Information</h3>
          <div class="footer-links">
            <a href="#">Business Administration</a>
            <a href="#">Arts & Humanities</a>
            <a href="#">Science & Technology</a>
            <a href="#">Economics & Finance</a>
          </div>
        </div> -->

        <div>
          <h3 class="lg-text">Bog'lanish uchun</h3>
          <div class="footer-contact-info">
            <div>
              <span><i class="fas fa-globe"></i></span>
              <span><a href="#">www.brainchildren.uz</a></span>
            </div>
            <div>
              <span><i class="fas fa-phone"></i></span>
              <span><a href="tel:998996931243">+998996931243</a></span>
            </div>
            <div>
              <span><i class="fas fa-envelope-square"></i></span>
              <span><a href="mailto:brainchildren@gmail.com" style="border:none">brainchildren@gmail.com</a></span>
            </div>
          </div>
        </div>
      </div>

      <p class="footer-text">
        (B, B, B, B) Biz Bilan Birga Bo'ling
      </p>
    </footer>
    <!-- end of footer -->

    <!-- jquery cdn -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- slick js -->
    <script src="slick-1.8.1/slick/slick.js"></script>
    <!-- custom js -->
    <script src="js/script.js"></script>
  </body>
</html>
