// Global Counter
let counter = 0;

// Local Counters for Each Prize
let localCounter1 = 0;
let localCounter2 = 0;
let localCounter3 = 0;
let localCounter4 = 0;
let localCounter5 = 0;
let localCounter6 = 0;
let localCounter7 = 0;
let localCounter8 = 0;
let localCounter9 = 0;

// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// First Prize
function inc0() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter1++;
  }
  document.getElementById('counter0').innerHTML = localCounter1;
  document.getElementById('prizeOne').value = localCounter1;

  // These were used to show update on page
  // document.getElementById('mainCount').innerHTML = counter;
  // document.getElementById('p1local').innerHTML = localCounter1;

  // Update Tickets Left
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec0() {
  if(localCounter1 > 0 && localCounter1 <= 14) {
    counter--;
    localCounter1--;
  }
  document.getElementById('counter0').innerHTML = localCounter1;
  document.getElementById("prizeOne").value = localCounter1;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Second Prize
function inc1() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter2++;
  }
  document.getElementById('counter1').innerHTML = localCounter2;
  document.getElementById("prizeTwo").value = localCounter2;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec1() {
  if(localCounter2 > 0 && localCounter2 <= 14) {
    counter--;
    localCounter2--;
  }
  document.getElementById('counter1').innerHTML = localCounter2;
  document.getElementById("prizeTwo").value = localCounter2;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Third Prize
function inc2() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter3++;
  }
  document.getElementById('counter2').innerHTML = localCounter3;
  document.getElementById('prizeThree').value = localCounter3;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec2() {
  if(localCounter3 > 0 && localCounter3 <= 14) {
    counter--;
    localCounter3--;
  }
  document.getElementById('counter2').innerHTML = localCounter3;
  document.getElementById("prizeThree").value = localCounter3;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Fourth Prize
function inc3() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter4++;
  }
  document.getElementById('counter3').innerHTML = localCounter4;
  document.getElementById("prizeFour").value = localCounter4;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec3() {
  if(localCounter4 > 0 && localCounter4 <= 14) {
    counter--;
    localCounter4--;
  }
  document.getElementById('counter3').innerHTML = localCounter4;
  document.getElementById("prizeFour").value = localCounter4;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Fifth Prize
function inc4() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter5++;
  }
  document.getElementById('counter4').innerHTML = localCounter5;
  document.getElementById('prizeFive').value = localCounter5;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec4() {
  if(localCounter5 > 0 && localCounter5 <= 14) {
    counter--;
    localCounter5--;
  }
  document.getElementById('counter4').innerHTML = localCounter5;
  document.getElementById("prizeFive").value = localCounter5;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Sixth Prize
function inc5() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter6++;
  }
  document.getElementById('counter5').innerHTML = localCounter6;
  document.getElementById("prizeSix").value = localCounter6;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec5() {
  if(localCounter6 > 0 && localCounter6 <= 14) {
    counter--;
    localCounter6--;
  }
  document.getElementById('counter5').innerHTML = localCounter6;
  document.getElementById("prizeSix").value = localCounter6;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Seventh Prize
function inc6() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter7++;
  }
  document.getElementById('counter6').innerHTML = localCounter7;
  document.getElementById('prizeSeven').value = localCounter7;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec6() {
  if(localCounter7 > 0 && localCounter7 <= 14) {
    counter--;
    localCounter7--;
  }
  document.getElementById('counter6').innerHTML = localCounter7;
  document.getElementById("prizeSeven").value = localCounter7;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Eighth Prize
function inc7() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter8++;
  }
  document.getElementById('counter7').innerHTML = localCounter8;
  document.getElementById("prizeEight").value = localCounter8;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

function dec7() {
  if(localCounter8 > 0 && localCounter8 <= 14) {
    counter--;
    localCounter8--;
  }
  document.getElementById('counter7').innerHTML = localCounter8;
  document.getElementById("prizeEight").value = localCounter8;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

// Ninth Prize
function inc8() {
  if(counter >= 0 && counter < 14) {
    counter++;
    localCounter9++;
  }
  document.getElementById('counter8').innerHTML = localCounter9;
  document.getElementById('prizeNine').value = localCounter9;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}
function dec8() {
  if(localCounter9 > 0 && localCounter9 <= 14) {
    counter--;
    localCounter9--;
  }
  document.getElementById('counter8').innerHTML = localCounter9;
  document.getElementById("prizeNine").value = localCounter9;
  document.getElementById('ticketUpdate').innerHTML = 14 - counter;
}

function totalCheck() {
  if(counter < 14) {
    let text = "You have tickets left!\nAre you sure you want to submit?\nEither OK or Cancel.";
    if (confirm(text) == true) {
      // text = "You pressed OK!";
    } else {
      return false;
    }
    document.getElementById("submitText").innerHTML = text;
  }
}