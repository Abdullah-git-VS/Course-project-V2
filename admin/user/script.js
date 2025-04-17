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
