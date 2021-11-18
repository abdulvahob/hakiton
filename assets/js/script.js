


$( document ).ready(function() {
    var arr = ['bg_1.jpg','bg_2.jpg','bg_3.jpg'];
    
    var i = 0;
    setInterval(function(){
        if(i == arr.length - 1){
            i = 0;
        }else{
            i++;
        }
        var img = 'url(../assets/images/'+arr[i]+')';
        $(".full-bg").css('background-image',img); 
     
    }, 4000)

    var elems = document.getElementsByClassName("progress-bar");
    for(var i=0;i<elems.length;i++){
        var num = elems[i].style['cssText'].match(/\d/g).join("");
        if(num != "")
            {console.log(num);
                var nums = parseInt(num);
                if(nums < 20)
                    elems[i].classList.add("setRedBar");
                else if(nums < 50)
                    elems[i].classList.add("setYellowBar");
                else if(nums < 80)
                    elems[i].classList.add("setGreenBar");
                else
                    elems[i].classList.add("setBlueBar");
            }
        }
    
});

function _(className){
    return document.getElementsByClassName(className)[0];
}

var settingsPanel = _("panel-settings");
var container = _("container-fluid");
function showSettings(){
    container.classList.add("setBlur");
    settingsPanel.style.display = "inline-block";
    settingsPanel.classList.remove("fadeOutWithOpacity");
    settingsPanel.classList.add("fadeInWithOpacity");
}
function closeSettingPanel()
{
    settingsPanel.classList.remove("fadeInWithOpacity");
    settingsPanel.classList.add("fadeOutWithOpacity");
    setTimeout(function(){
        container.classList.remove("setBlur");
        settingsPanel.style.display = "none";
    }, 350);
}



