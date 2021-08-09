const nav = document.querySelector('.nav')

window.addEventListener('scroll', fixNav)

function fixNav()
{
  if (window.scrollY > nav.offsetHeight)
  {

    nav.classList.add('active');
    document.getElementsByClassName("nav")[0].style.cssText = "opacity:0; pointer-events: none; transition: opacity 0.4s ease-in;";


  }
  else
  {
    nav.classList.remove('active');
    document.getElementsByClassName("nav")[0].style.cssText = "opacity:1; pointer-events: all; transition: opacity 0.4s ease-in;";

  }
}

function openNav()
{
  //document.getElementById("jsideNav").style.width = "200px";
  document.getElementsByClassName("sideNav")[0].style.cssText = "width:200px; transition:0.5s;";
  document.getElementsByClassName("openMenu")[0].style.cssText = "opacity:0; pointer-events: none; transition:0.5s";

}
function closeNav()
{ //set to 1 px cover the 1px border else it will show the border;
  document.getElementById("jsideNav").style.cssText = "width:-1px;transition:0.5s;";
  document.getElementsByClassName("openMenu")[0].style.cssText = "opacity:1; pointer-events: all;transition:0.5s;";
}

window.addEventListener("scroll", stickFunction)

function stickFunction()
{
  var header = document.querySelector(".filter");
  header.classList.toggle("sticky", window.scrollY > 0);

  var back = document.querySelector(".filter");
  back.classList.toggle("back", window.scrollY <= 90)
}
