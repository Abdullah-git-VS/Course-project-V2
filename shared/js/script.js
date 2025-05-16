const openLogin = document.getElementById('openLogin');
const loginPopup = document.getElementById('loginPopup');
const closePopup = document.getElementById('closePopup');

openLogin.onclick = () => {
  loginPopup.style.display = 'block';
};

closePopup.onclick = () => {
  loginPopup.style.display = 'none';
};

window.onclick = (event) => {
  if (event.target == loginPopup) {
    loginPopup.style.display = 'none';
  }
};

function validate() {
  var a = document.getElementById("password").value;
  var b = document.getElementById("confirm_password").value;
  if (a != b) {
      alert("Passwords do not match. Please try again");
      return false;
  }
};
function dd(){
const loadImage = e => {
  const img = document.getElementById('preview');
  img.src = URL.createObjectURL(e.target.files[0]);
  img.style.display = 'block';
};
}








