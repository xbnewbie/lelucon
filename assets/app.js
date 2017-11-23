/**
 * Created by My Computer on 11/23/2017.
 */
var done=false;
var base_url="http://localhost/lelucon/index.php";
var unik_id=null;
$(document).ready(function() {

   /* $(document).ajaxStart(function() { Pace.restart() });*/



    $('#btn').click(function () {

       var tanya = "tanya="+$('#tanya').val();
        $.ajax({
            type: "POST",
            url: base_url+"/main/addsoal",
            data: tanya,
            async : false,
            cache: false,
            success: function(data){
               getAnswer(data);
            }
        });
    });

    $('#btn_parjo').click(function () {
        var tanya = "jawab="+$('#jawaban').val()+"&unik_id="+ unik_id;
        $.ajax({
            type: "POST",
            url: base_url+"/main/setJawab",
            data: tanya,
            async : false,
            cache: false,
            success: function(data){
                // getAnswer(data);

            }
        });
    });

    $('#btn_unik_id').click(function () {
       unik_id =$('#unik_id').val();
        waitForTanya(unik_id);
    });


    function waitForTanya() {
     var selesai=false;
        while (selesai==false){
            var tanya = "unik_id="+unik_id;
            console.log("sending request "+base_url+"/main/requestSoal");
            $.ajax({
                type: "POST",
                url: base_url+"/main/requestSoal",
                data: tanya,
                async : false,
                cache: false,
                success: function(data){
                    if(data.indexOf("00x00")>= 0){
                        var soal = data.replace("00x00","");
                        $('#soal').text("Soal : "+soal);
                        selesai=true;
                    }
                }
            });
        }


    }

    function getAnswer(data) {

        while (done==false){
            var tanya = "unik_id="+data;
            console.log("sending request");
            $.ajax({
                type: "POST",
                url: base_url+"/main/requestjawab",
                data: tanya,
                async : false,
                cache: false,
                success: function(data){
                    if(data.indexOf("00x00")>= 0){
                        done=true;
                        var jawab = data.replace("00x00","");
                        $('#jawaban').text(jawab);
                    }
                }
            });
        }
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
});