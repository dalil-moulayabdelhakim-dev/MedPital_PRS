const qrBox = document.getElementById('qrBox');
const qrImg = document.getElementById('qrImg');

function generateQRCode() {

    const DOMAIN = qrBox.getAttribute('data-url');
    console.log('URL:', DOMAIN);
    qrImg.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + DOMAIN;
}

window.addEventListener('load', generateQRCode);
