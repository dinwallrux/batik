let myEnvironment = {
    data: {
        isOpen: false
    },
    init: function(){
        let self = this;
        
        // self.motifInputFile();
    },
    imgPreview: function(input, preview) {
        let input_motif = $(input)[0];

        console.log('Gambar ==> ', input_motif.files);
        if(input_motif.files.length < 1){
            $('.ion-md-cloud-upload').removeClass('hide');
            $(preview).attr('src', '');
        }
        if (input_motif.files && input_motif.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(preview).attr('src', e.target.result);
            }
            reader.readAsDataURL(input_motif.files[0]); // convert to base64 string
            $('.ion-md-cloud-upload').addClass('hide');
        }
    },
    motifInputFile: function(){
        let self = this;

        jQuery(document).ready(function($){
            $('#input_motif').on('change', function(e){
                console.log(this);
                self.imgPreview(this, '#motif_preview');
            })
        })
    }
}

myEnvironment.init();