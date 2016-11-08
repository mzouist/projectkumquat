/**
 *Checks to see if passwords match up.
 *http://codepen.io/diegoleme/pen/surIK
 */

var password = document.getElementById("pw")
  , confirmpw = document.getElementById("confirmpw");

function validatePassword(){
  if(pw.value != confirmpw.value) {
    confirmpw.setCustomValidity("Passwords Don't Match");
  } else {
    confirmpw.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirmpw.onkeyup = validatePassword;
