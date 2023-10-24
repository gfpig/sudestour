const status = document.getElementById('status');
const output = document.getElementById('img_ponto');
if (window.FileList && window.File && window.FileReader) {
    document.getElementById('input').addEventListener('change', event => {
        output.src = '';
        const file = event.target.files[0];
        if (!file.type) {
        
        return;
        }
        if (!file.type.match('image.*')) {
        return;
        }
        const reader = new FileReader();
        reader.addEventListener('load', event => {
        output.src = event.target.result;
        });
        reader.readAsDataURL(file);
    }); 
}

/*document.getElementById('input').onchange = function (e) {
    readImage(e)
};*/

//const status = document.getElementById('status');
   /* const output = document.getElementById('output');
      if (window.FileList && window.File && window.FileReader) {
        document.getElementById('input').addEventListener('change', event => {
          output.src = '';
          //status.textContent = '';
          const file = event.target.files[0];
          if (!file.type) {
            //status.textContent = 'Error: The File.type property does not appear to be supported on this browser.';
            return;
          }
          if (!file.type.match('image.*')) {
           // status.textContent = 'Error: The selected file does not appear to be an image.'
            return;
          }
          const reader = new FileReader();
          reader.addEventListener('load', event => {
            output.src = event.target.result;
          });
          reader.readAsDataURL(file);
        }); 
    }*/

/*function readImage(file) {
    // Check if the file is an image.
    if (file.type && !file.type.startsWith('image/')) {
      console.log('File is not an image.', file.type, file);
      return;
    }
  
    const reader = new FileReader();
    reader.addEventListener('load', (event) => {
      img.src = event.target.result;
    });
    reader.readAsDataURL(file);
}
  

/*var elementoImg = document.getElementById('img_ponto');
var elementoInput = document.getElementById('input');

elementoInput.onchange = function (e) {
    var novaImg = elementoInput.get
}*/