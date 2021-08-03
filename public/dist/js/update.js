$(document).ready(function () {
     

     
        
        
     $(".editmodal").click(function () {
            var idnegara = $(this).data("idnegara");
            var idpelabuhan = $(this).data("idpelabuhan");
            var namanegara = $(this).data("namanegara");  $(document).ready(function () {
                $('select[name="negaraasal"]').on("change", function () {
                    var idNegara = $(this).val();
                    if (idNegara) {
                        $.ajax({
                            url: "/getPelabuhan/" + idNegara,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="pelabuhanasal"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="pelabuhanasal"]').append(
                                        '<option value="' +
                                            key +
                                            '">' +
                                            value +
                                            "</option>"
                                    );
                                });
                            },
                        });
                    } else {
                        $('select[name="pelabuhanasal"]').empty();
                    }
                });
            });
            var namapelabuhan = $(this).data("namapelabuhan");
            var namakapal = $(this).data("namakapal");
            var nomorkapal = $(this).data("nomorkapal");
            var panjang = $(this).data("panjang");
            var lebar = $(this).data("lebar");
            var kapasitas = $(this).data("kapasitas");
            var kapasitastersedia = $(this).data("kapasitastersedia");
            var kapasitasberat = $(this).data("kapasitasberat");
            var kapasitastersediak = $(this).data("kapasitastersediak");
            var namakontainer = $(this).data("namakontainer");
            var idkapal = $(this).data("idkapal");
            var ukuran = $(this).data("ukuran");
            var idkontainer = $(this).data("idkontainer");
            var kapasitaskontainer = $(this).data("kapasitaskontainer");
            var namabarang = $(this).data("namabarang");
            var beratbarang = $(this).data("beratbarang");
            var pelabuhanasal = $(this).data("pelabuhanasal");
            var pelabuhantujuan = $(this).data("pelabuhantujuan");
            var idkontainer = $(this).data("idkontainer");
            var namakontainer = $(this).data("namakontainer");
            var statuspengiriman = $(this).data("statuspengiriman");
            var idpengiriman = $(this).data("idpengiriman");
            var iduser = $(this).data("iduser");
            var username = $(this).data("username");
            var idk = $(this).data("idk");
            
            
            
           
         
            $("#valnegara").val(namanegara);
            $("#valpelabuhan").val(namapelabuhan);
            $("#idnegara").val(idnegara);
            $("#negarapelabuhan").text(namanegara);
            $("#namakapal").text(namakapal);
            $("#namakapal").val(idkapal);
            $("#idlama").val(idkapal);
            $("#namakapalc").val(namakapal);
            $("#idkapal").text(idkapal);
            $("#negarapelabuhan").val(idnegara);
            $("#idpelabuhan").val(idpelabuhan);
            $("#idpelabuhan").text(namapelabuhan);
            $("#nomorkapal").val(nomorkapal);
            $("#panjang").val(panjang);
            $("#lebar").val(lebar);
            $("#kapasitas").val(kapasitas);
            $("#kapasitaskontainer").val(kapasitaskontainer);
            $("#kapasitassekarang").val(kapasitas);
            $("#kapasitastersedia").val(kapasitastersedia);
            $("#kapasitastersediak").val(kapasitastersediak);
            $("#kapasitasberat").val(kapasitasberat);
            $("#kapasitass").val(kapasitasberat);
            $("#idkapal").val(idkapal);
            $("#namakontainer").val(namakontainer);
            $("#ukuran").val(ukuran);
            $("#idkontainer").val(idkontainer);
            $("#namabarang").val(namabarang);
            $("#beratbarang").val(beratbarang);
            $("#pelabuhanasal").val(pelabuhanasal);
            $("#pelabuhanasal").text(pelabuhanasal);
            $("#pelabuhantujuan").val(pelabuhantujuan);
            $("#idkontainer").val(idkontainer);
            $("#idkontainer").text(namakontainer);
            $("#pelabuhantujuan").text(pelabuhantujuan);
            $("#statuspengiriman").text(statuspengiriman);
            $("#statuspengiriman").val(statuspengiriman);
            $("#beratsekarang").val(beratbarang);
            $("#idpengiriman").val(idpengiriman);
            $("#iduser").val(iduser);
            $("#username").val(username);
            $("#idk").val(idk);
        });
 });


 
    

