<?php require_once "header.php"; ?>

<?php
// Страница регистрации нового пользователя
$link=mysqli_connect("localhost", "root", "", "hackaton");
function generateCode($length=6) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
  $code = "";
  $clen = strlen($chars) - 1;
  while (strlen($code) < $length) {
          $coded .= $chars[mt_rand(0,$clen)];
  }
  
  return $code;
}
if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id FROM users WHERE login='".trim($_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        $login = $_POST['login'];
        $phone = $_POST['phone'];

        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($link,"INSERT INTO users SET login='$login', password='$password', phone='$phone'");
        mysqli_query($link,"INSERT INTO user_information SET user_id=(select last_insert_id()), first_name='$login'");
        
        header("Location: login.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
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
          <h3>Ro'yhatdan o'tish</h3>
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
            <label for="raqam" class="lg-text">Telefon:</label>
            <input type="tel" id="raqam" name="phone" />
          </div>
          <a style="margin-right: 30px;" href="login.php">Kirish</a>
          <input type="submit" name="submit" value="Yuborish" class="btn primary-btn">
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
