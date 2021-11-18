<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Brain Children</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <?php require_once "php/data.php"; 
        require_once "php/interest.php";
        if(isset($_COOKIE['user_information']))
            $userData = $_COOKIE['user_information'];
        // else
            // header("Location: index.php");
    ?>
</head>

<body>
    <div class="panel-settings">
        <div class="form-panel-settings">
            <a onclick="closeSettingPanel()" href="#" class="close-btn">x</a>
            <form class="form-settings" action="cabinet.php" method="POST">
                <p>Ism</p><input name="firstname" type="text" value="<?php echo $userData['first_name']; ?>">
                <p>Familiya</p><input name="secondname" type="text" value="<?php echo $userData['second_name']; ?>">
                <p>Shahar, Viloyat</p><input name="city" type="text" value="<?php echo $userData['city']; ?>">
                <p>Yosh</p><input min="0" name="age" type="number" value="<?php echo $userData['age']; ?>"><br>
                <div class="column" style="display: flex; margin: 0 auto; justify-content: space-evenly;">
                    <div class="radio">
                        <input id="male-radio" type="radio" name="gender" value="Male" <?php if($userData['gender'] == '1') echo "checked"; ?>>
                        <label for="male-radio">Og'il bola</label>
                    </div>
                    <div class="radio">
                        <input id="female-radio" type="radio" name="gender" value="Female" <?php if($userData['gender'] == '0') echo "checked"; ?>>
                        <label for="female-radio">Qiz bola</label><br>   
                    </div>
                </div>   
                <input class="submitButton" name="submit" type="submit" value="Saqlash">
            </form>
        </div>
    </div>
    <div class="container-fluid overcover">
        <div class="container profile-box">
            <div class="top-cover">
                <div class="covwe-inn">
                    <div class="settingBtn" style="z-index: 10;">
                        <a class="whiteButton settingBtn" onclick="showSettings()"><b>✎</b></a>
                    </div>
                    <div class="row no-margin">
                        <div class="col-md-3 img-c">
                            <img src="images/ProfileIcon.png" alt="">
                        </div>
                        <div class="col-md-9 tit-det">
                            <h2><?php echo $userData['first_name'] . ' ' . $userData['second_name'];?></h2>
                            <p>Yosh: <?php echo $userData['age']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Asosiy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="medals-tab" data-toggle="tab" href="#medals" role="tab" aria-controls="medals" aria-selected="false">Yutuqlar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ko'rilgan videolar</a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link" id="Logout">Chiqish</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row no-margin home-det">
                      <div class="col-md-4 big-img">
                         
                         <h4 class="ltitle">Qiziqish</h4>
                        <ul class="hoby row no-margin" style="display: grid;">
                            <li style="margin: 0 auto; padding-bottom: 14px;">
                            <?php 
                                if($userData['has_interest'] == '1')
                                    echo "<img src=\"https://www.nicepng.com/png/detail/96-965527_computer-programming-png-banner-transparent-library-travel.png\"> <br>";
                            ?>
                            <span>
                                <?php echo $userData['interest']; ?>
                            </span></li>
                            <a class="blueButton restartBtn" href="determineInterest.php">
                            <?php 
                                if($userData['has_interest'] == '1')
                                    echo "Qaytadan aniqlash";
                                else
                                    echo "Aniqlash";
                            ?>
                            </a>
                        </ul>
                          <h4 class="ltitle">Ma'lumotlar</h4>

                        <div class="refer-cov">
                            <span>Ism: <?php echo $userData["first_name"] ?></span>
                        </div>
                        <div class="refer-cov">
                            <span>Familiya:  <?php echo $userData["second_name"] ?></span>
                        </div>
                        <div class="refer-cov">
                            <span>Telefon raqam:  <?php echo $userData["phone"] ?></span>
                        </div>
                        
                      </div>
                      <div class="col-md-8 home-dat">
                          <h2 class="rit-titl">Ko'nikmalar</h2>
                        <div class="profess-cover row no-margin">
                            <div class="col-md-6">
                                <div class=" prog-row row">
                                    <div class="col-sm-6">
                                        Eshitish
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="--value: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        Tushunish
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="--value: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        Bajarish
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" id="progress" role="progressbar" style="--value: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                          
                      <div class="Progresses">
                        <div class="circularBar"> <span>Umumiy natija</span>
                            <div role="circualprogressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="--value:50"></div>
                        </div>
                        <div class="circularBar"> <span>Joriy oydagi natijaviyligi</span>
                            <div role="circualprogressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="--value:75"></div>
                        </div>  
                    </div>

                      </div>
                  </div>
              </div>
              <div class="tab-pane fade exp-cover" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="data-box">
                           <div class="row exp-row">
                               <img width="25%" src="https://i1.wp.com/www.additudemag.com/wp-content/uploads/2016/11/Parent_Organize_ADHD-friendly-apps-for-kids_Article_11078_school-kids-tablets-classroom_ts_490361666-3-scaled.jpg?resize=1280%2C720px&ssl=1" alt="">
                               <div class="imgBox" style="display: block; gap: 20px;"> 
                                    <h5 style="text-align: center;">Matematika</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a urna posuere, aliquet elit in, fermentum ligula. Sed est augue, molestie sed tortor sed, posuere commodo lectus.</p>
                               </div>
                            </div>
                       </div>
              </div>
              <div class="tab-pane fade exp-cover" id="medals" role="tabpanel" aria-labelledby="medals-tab">
                  <div class="sec-title">
                                        <h2>Medallar</h2>
                                  </div>
                                   <div class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6>12.11.2021</h6>
                                          </div>
                                          <div class="col-sm-9 rgbf">
                                              <h5>Oltin medal</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      
              </div>
              <div class="tab-pane fade gallcoo" id="gallery" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="row no-margin gallery">
                                          <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_01.jpg" alt="">
                                          </div>
                                          <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_02.jpg" alt="">
                                          </div>
                                          <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_03.jpg" alt="">
                                          </div>
                                          <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_04.jpg" alt="">
                                          </div>
                                          <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_05.jpg" alt="">
                                          </div>
                                          <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_06.jpg" alt="">
                                          </div>
                                           <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_10.jpg" alt="">
                                          </div>
                                           <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_08.jpg" alt="">
                                          </div>
                                           <div class="col-sm-4">
                                              <img src="assets/images/gallery/gallery_09.jpg" alt="">
                                          </div>
                                          
                                      </div>
              </div>
              <div class="tab-pane fade contact-tab" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="row no-margin">
                                          <div class="col-md-6 no-padding">
                                               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3176144.0450019627!2d-107.79423426090409!3d38.97644533805396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x874014749b1856b7%3A0xc75483314990a7ff!2sColorado%2C+USA!5e0!3m2!1sen!2sin!4v1547222354537"  frameborder="0" style="border:0" allowfullscreen></iframe>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="row cont-row no-margin">
                                                  <div class="col-sm-6">
                                                      <input placeholder="Enter Full Name" type="text" class="form-control form-control-sm">
                                                  </div>
                                                   <div class="col-sm-6">
                                                      <input placeholder="Enter Email Address" type="text" class="form-control form-control-sm">
                                                  </div>
                                              </div>
                                              <div class="row cont-row no-margin">
                                                  <div class="col-sm-6">
                                                      <input placeholder="Enter Mobile Number" type="text" class="form-control form-control-sm">
                                                  </div>
                                                   
                                              </div>
                                              <div class="row cont-row no-margin">
                                                  <div class="col-sm-12">
                                                     <textarea placeholder="Enter your Message" class="form-control form-control-sm" rows="10"></textarea>
                                                  </div>
                                                  
                                              </div>
                                              <div class="row cont-row no-margin">
                                                  <div class="col-sm-6">
                                                      <button class="btn btn-sm btn-primary">Send Message</button>
                                                  </div>
                                                   
                                              </div>
                                          </div>
                                      </div>
              </div>
            </div>
        </div>
    </div>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>


</html>