let myEnvironment = {
    data: {
        isOpen: false
    },
    init: function () {
        let self = this;

        // self.deleteFile();
    },
    currencyFormat: function(num) {
        return 'Rp.' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    },
    imgPreview: function (input, preview) {
        let input_produk = $(input)[0];

        if (input_produk.files.length < 1) {
            $('.ion-md-cloud-upload').removeClass('hide');
            $(preview).attr('src', '');
        }
        if (input_produk.files && input_produk.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(preview).attr('src', e.target.result);
            }
            reader.readAsDataURL(input_produk.files[0]); // convert to base64 string
            $('.ion-md-cloud-upload').addClass('hide');
        }
        $('.selectpicker').selectpicker();
    },

    multipleImgPreview: function (input, preview) {
        let self = this;
        let input_produk = $(input)[0];
        let files = $(input)[0].files;
        let filesArr = [];

        if (files.length) {
            for (var i = 0; i < files.length; i++) {
                filesArr.push(files[i]);
            }
        }

        if (!files.length) $(preview).find('img').remove();

        if (filesArr.length) {
            $(preview).find('img').remove();
            for (var i = 0; i < filesArr.length; i++) {
                ! function (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
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

    cbDeleteFile: function (cb) {
        setTimeout(function () {
            let dom = $('#delete_file');
            cb(dom);
        }, 5000);
    },
    deleteFile: function (e, fileId) {
        let files = $(fileId)[0].files;
        console.log('files ==> ', files);
        console.log('clicked ==> ', files);
    },
    setCity: function (selector) {
        // kita buat variable provincedid untk menampung data id select province
        let provinceid = document.getElementById(selector).value;
        //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
        if (provinceid != null && provinceid != "") {
            // jika di temukan id nya kita buat eksekusi ajax GET
            jQuery.ajax({
                // url yg di root yang kita buat tadi
                url: "/city/" + provinceid,
                // aksion GET, karena kita mau mengambil data
                type: 'GET',
                // type data json
                dataType: 'json',
                // jika data berhasil di dapat maka kita mau apain nih
                success:function(data){
                    // jika tidak ada select dr provinsi maka select kota kososng / empty
                    $('select[name="kota_tujuan"]').empty();
                    // jika ada kita looping dengan each
                    $.each(data, function(key, value){
                        // perhatikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_tujuan
                        $('select[name="kota_tujuan"]').append(`<option value="${value.city_id}" data-nama-kota="${value.type} ${value.city_name}">${value.type} ${value.city_name}</option>`);
                    });
                }
            });
        } else {
            $('select[name="kota_tujuan"]').empty();
        }
    },
    setService: function(kota_asal, kota_tujuan, kurir) {
        let self = this;
        // Ubah ke curreny IDR
        let rupiahIDLocale = Intl.NumberFormat('id-ID');
        // kita buat variable untuk menampung data data dari  inputan
        // name city_origin di dapat dari input text name city_origin
        let origin = document.getElementById(kota_asal).value;
        // name kota_id di dapat dari select text name kota_id
        let destination = document.getElementById(kota_tujuan).value;
        // name kurir di dapat dari select text name kurir
        let courier = document.getElementById(kurir).value;
        // name weight di dapat dari select text name weight
        let weight = 500;
        
        if (courier) {
            jQuery.ajax({
                url: "/origin=" + origin + "&destination=" + destination + "&weight=" + weight + "&courier=" + courier,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('select[name="layanan"]').empty();
                    $('select[name="layanan"]').append(`<option value="">Pilih layanan</option>`);
                    // ini untuk looping data result nya
                    $.each(data, function (key, value) {
                        // ini looping data layanan misal jne reg, jne oke, jne yes
                        $.each(value.costs, function (key1, value1) {
                            // ini untuk looping cost nya masing masing
                            // silahkan pelajari cara menampilkan data json agar lebi paham
                            $.each(value1.cost, function (key2, value2) {
                                $('select[name="layanan"]').append(`<option data-harga-ongkir="${value2.value}" value="${value1.service} - ${value1.description} - ${self.currencyFormat(value2.value)} (${value2.etd} hari)">${value1.service} - ${value1.description} - ${self.currencyFormat(value2.value)} (${value2.etd} hari)</option>`);
                            });
                        });
                    });
                }
            });
        } else {
            $('select[name="layanan"]').empty();
        }
    },
    setOngkirPrice: function(selector) {
        // Ubah ke curreny IDR
        // let rupiahIDLocale = Intl.NumberFormat('id-ID');
        let total = parseInt( $('input[name="total"]').val() );
        let hargaOngkir = $(`select[name="${selector}"]`).find('option:selected').data('harga-ongkir');
        let total_price_with_ongkir = hargaOngkir ? total + hargaOngkir : 0;

        // Display ongkir
        $('#ongkir-price').find('strong').text(this.currencyFormat(hargaOngkir));
        // Display ongkir in input[name="ongkir"]
        $('input[name="ongkir"]').val(hargaOngkir);
        // Display total price + ongkir
        $('#total_price strong').text(this.currencyFormat(total_price_with_ongkir));
        // Display provinsi & kota in input element
        let provinsiTujuan = $('select[name="provinsi_tujuan"]').find('option:selected').data('nama-provinsi');
        let kotaTujuan = $provinsiTujuan = $('select[name="kota_tujuan"]').find('option:selected').data('nama-kota');
        $('input[name="shipping_state"]').val(provinsiTujuan);
        $('input[name="shipping_city"]').val(kotaTujuan);
    }
}

myEnvironment.init();
