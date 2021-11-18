<?php require_once "header.php"; 
if(!isset($_COOKIE['password_cookie_token']) and (!isset($_COOKIE['hash']) or empty($_COOKIE['hash'])))
header("Location: register.php"); ?>
    <div class="hero-content">
    </div>
    </header>
    <style>
        header{
            min-height: 0;
        }
    </style>
    <!-- end of header -->

    <?php 
        $conn = mysqli_connect("localhost", "root", "", "hackaton");
        $query = mysqli_query($conn, "SELECT * FROM image_description");
        $data = [];
        while ($row = $query->fetch_assoc()) {
            array_push($data, $row);
        }
        setcookie("imageData", json_encode($data));
    ?>
    <div class="exam">
       <div class="container">
           
        <div class="title title-md">
          <h3>Brain Children</h3>
          <div class="line"></div>
          <p>Farzandingizni qiziqishini aniqalab beruvchi test</p>
          <button onclick="start(this)" class="checkbox-dropdown">Testni boshlash</button>
        </div>
        
         <div class="images">
             <h2>Rasmlardan birini tanlang</h2>
           <div class="img">
             <button onclick="showResult(this)">
               <img src="images/01.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/02.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/03.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/04.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/05.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/07.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/08.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/11.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/12.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/15.jpg" alt="photo" />
             </button>
             <button onclick="showResult(this)">
               <img src="images/16.jpg" alt="photo" />
             </button>
            </div>
          </div>

          <div class="result">
                <img src="images/01.jpg" alt="">
                <div class="imgtexts">
                    <h2>Qiziqish</h2>
                    <p>Matnlarni ulardagi xatolarni topib, tuzatish orqali tahrirlash</p>
                    <a href="check.php" class="apply">Shaxsiy kabinet</a>
                </div>
          </div>

        </div>
      </div>
    </div>

<?php require_once "footer.php"; ?>