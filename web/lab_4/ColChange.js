let proc = document.querySelectorAll('.proc');
let body = document.querySelector('body');
let red = document.querySelector('.Red');
let green = document.querySelector('.Green');
let blue = document.querySelector('.Blue');
let btnb = document.querySelector('.back');
let btnt = document.querySelector('.txt');

for (let i of proc)
  {
    i.addEventListener('mouseup', function(event) {
      if(event.which === 1) {
        let color = window.getComputedStyle(i).backgroundColor.match(/\d+/g);
      r = parseInt(color[0]).toString(16);
      if (r=="0") r="00";
      g = parseInt(color[1]).toString(16);
      if (g=="0") g="00";
      b = parseInt(color[2]).toString(16);
      if (b=="0") b="00";
      hex = '#' + r + g + b;
      alert();
      body.style.color = hex;
      }
      if(event.which === 3) {
        event.preventDefault();
     let color = window.getComputedStyle(i).backgroundColor.match(/\d+/g);
      r = parseInt(color[0]).toString(16);
      if (r=="0") r="00";
      g = parseInt(color[1]).toString(16);
      if (g=="0") g="00";
      b = parseInt(color[2]).toString(16);
      if (b=="0") b="00";
      hex = '#' + r + g + b;
      alert(hex);
      body.style.background = hex;
      }
    })
   
btnb.onclick = function()
{
  let color = "#"+red.value + green.value + blue.value;
  body.style.background = color;
} 

btnt.onclick = function()
{
  let color = "#"+red.value + green.value + blue.value;
  body.style.color = color;
}
}