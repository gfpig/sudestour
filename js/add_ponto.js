var img = document.getElementById('img_ponto');
document.getElementById('input').addEventListener('change', function(e) {
    if (e.target.files[0]) {
        function trocarImagem() {
            const files = document.getElementById("input").files;
            if (!files || files.length==0) {
                 return;
            }
            const file = files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                img.innerHTML = `<img src=${reader.result} id="img_ponto">`
                  //img.src = reader.result;      
            };
        }
    }
});