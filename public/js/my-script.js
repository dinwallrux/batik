let myEnvironment = {
    data: {
        isOpen: false
    },
    init: function(){
        let self = this;

        // self.motifInputFile();
    },
    imgPreview: function(input, preview) {
        let input_produk = $(input)[0];

        if(input_produk.files.length < 1){
            $('.ion-md-cloud-upload').removeClass('hide');
            $(preview).attr('src', '');
        }
        if (input_produk.files && input_produk.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(preview).attr('src', e.target.result);
            }
            reader.readAsDataURL(input_produk.files[0]); // convert to base64 string
            $('.ion-md-cloud-upload').addClass('hide');
        }
        $('.selectpicker').selectpicker();
    },
}

myEnvironment.init();