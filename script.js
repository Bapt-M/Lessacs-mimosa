$(document).ready(function(){
    $(window).scroll(function(){
      if(this.scrollY > 50) 
        $(".navbar").addClass("sticky");
      else
        $(".navbar").removeClass("sticky");
    });
});

function activate(x){
  x?.classList.toggle("active")
  document.querySelector(".menu-list").classList.toggle("active")
}

function showCommandBox(x){
  document.querySelector(".command-box").classList.toggle("show")
}