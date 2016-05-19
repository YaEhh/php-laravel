document.onreadystatechange = function () {
  if(document.readyState === "complete"){
    link = document.getElementsByClassName('intro-link')[0];
    setTimeout(function() {
     link.style.display= "initial";
     setTimeout(function(){
       link.style.left="950px";
     },200)
  },1000)

  }
}




// document.getElementsByClassName('intro-link')[0].style.display="none";
