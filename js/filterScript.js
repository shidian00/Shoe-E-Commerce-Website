function getWoman()
{
    var messages = document.querySelectorAll(".woman.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:relative; opacity:1; pointer-events: all; transition: all 1s;   ";
    }


    var messages = document.querySelectorAll(".man.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:absolute; opacity:0; pointer-events: none;";
    }


}

function getMan()
{
    var messages = document.querySelectorAll(".man.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:relative; opacity:1; pointer-events: all;transition: all 1s;";
    }

    var messages = document.querySelectorAll(".woman.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:absolute; opacity:0; pointer-events: none;";
    }

    var messages = document.querySelectorAll(".kid.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:absolute; opacity:0; pointer-events: none;";
    }
}



function getKid()
{
    var messages = document.querySelectorAll(".kid.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:relative; opacity:1; pointer-events: all;transition: all 1s;";
    }

    var messages = document.querySelectorAll(".woman.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:absolute; opacity:0; pointer-events: none;";
    }

    var messages = document.querySelectorAll(".man.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:absolute; opacity:0; pointer-events: none;";
    }
}

function showAll()
{
    var messages = document.querySelectorAll(".man.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:relative; opacity:1; pointer-events: all;transition: all 1s;";
    }

    var messages = document.querySelectorAll(".woman.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:relative; opacity:1; pointer-events: all; transition: all 1s;";
    }


    var messages = document.querySelectorAll(".kid.card");
    for (var i = 0; i < messages.length; i++)
    {
        messages[i].style.cssText = "position:absolute; opacity:0; pointer-events: none;";
    }
}