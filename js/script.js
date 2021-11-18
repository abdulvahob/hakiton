$(document).ready(() => {
    // navbar
    $(".navbar-show-btn").click(() => {
      $(".navbar-collapse").addClass("showNavbar");
    });
  
    $(".navbar-hide-btn").click(() => {
      $(".navbar-collapse").removeClass("showNavbar");
    });
  
    // slick slider
    $(".hero-slider").slick({
      infinite: true,
      slidesToShow: 1,
      dots: true,
      speed: 300,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 4000,
    });
  
    // stopping transition
    let resizeTimer;
    $(window).on("resize", () => {
      $(document.body).addClass("resize-transition-stopper");
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        $(document.body).removeClass("resize-transition-stopper");
      }, 400);
    });
  });
  $(".checkbox-dropdown").click(function () {
    $(this).toggleClass("is-active");
  });
  
  $(".checkbox-dropdown ul").click(function (e) {
    e.stopPropagation();
  });
  $(".checkbox-dropdown1").click(function () {
    $(this).toggleClass("is-active");
  });
  
  $(".checkbox-dropdown1 ul").click(function (e) {
    e.stopPropagation();
  });
  $(".checkbox-dropdown2").click(function () {
    $(this).toggleClass("is-active");
  });
  
  $(".checkbox-dropdown2 iframe").click(function (e) {
    e.stopPropagation();
  });

// New code
function _(className){
    return document.getElementsByClassName(className)[0];
}
function start(elem){
    elem.disabled = true;
    _("title").classList.toggle("hidden");
    setTimeout(function(){
    _("title").style.display = "none";
    _("images").style.display = "block";
        setTimeout(function(){
            _("images").classList.toggle("visible");
        },10);
    }, 1000);
}

function showResult(elem)
{
  elem.disabled = true;
    _("images").classList.remove("visible");
    _("images").classList.toggle("hidden");
    _("result").children[0].setAttribute("src", elem.children[0].getAttribute("src"));
    var data = JSON.parse(decodeURIComponent(getCookie("imageData")));
    var text ="";
    data.forEach(element => {
      if(element['image'] == elem.children[0].getAttribute("src"))
        text = element['description'];
    });
    var peaces = text.split("+");
    text = peaces.join(' ');
    _("result").children[1].children[1].innerText = text;
    setTimeout(function(){
      _("images").style.display = "none";
      _("result").style.display = "block";
      setTimeout(function(){
        _("result").classList.toggle("visible");
      },10);
      
    }, 1000);
    document.cookie = "interest='" + text + "'";
}
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) {
     var c = ca[i];
     while (c.charAt(0)==' ') c = c.substring(1);
     if(c.indexOf(name) == 0)
        return c.substring(name.length,c.length);
  }
  return "";
}