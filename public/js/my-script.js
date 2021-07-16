let myEnvironment = {
    data: {
        isOpen: false
    },
    init: function(){
        let self = this;

        // self.deleteFile();
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

    multipleImgPreview: function(input, preview) {
        let self = this;
        let input_produk = $(input)[0];
        let files = $(input)[0].files;
        let filesArr = [];

        if (files.length) {
            for(var i = 0; i < files.length; i++){
                filesArr.push(files[i]);
            }
        }

        if (!files.length) $(preview).find('img').remove();

        if (filesArr.length) {
            $(preview).find('img').remove();
            for( var i = 0; i < filesArr.length; i++ ) {
                !function (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(preview).append(`
                            <img src="${e.target.result}" alt="">
                        `);
                    }
                    reader.readAsDataURL(file); // convert to base64 string
                }(files[i])
            }
            // var reader = new FileReader();
            // reader.onload = function(e) {
            //     $(preview).append(`<img src="${e.target.result}" alt="" />`);
            // }
            // reader.readAsDataURL(input_produk.files[0]); // convert to base64 string
            $('.ion-md-cloud-upload').addClass('hide');
        }
        $('.selectpicker').selectpicker();
    },

    cbDeleteFile: function(cb) {
        setTimeout(function() {
            let dom = $('#delete_file');
            cb(dom);
        }, 5000);
    },
    deleteFile: function(e, fileId) {
        let files = $(fileId)[0].files;
        console.log('files ==> ', files);
        console.log('clicked ==> ', files);
    }
}

myEnvironment.init();