/**
 * Created by My Computer on 11/23/2017.
 */
var done=false;
var base_url="http://localhost/lelucon/index.php";
var unik_id=null;
var diam=true;
$(document).ready(function() {

   /* $(document).ajaxStart(function() { Pace.restart() });*/

$('#sherlock').hide();
    $('#spinner').hide();
    $('#btn').click(function () {
        $('#sherlock').show();
        $('#jawaban').text("");
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


            }
        });
    });

    $('#btn_unik_id').click(function () {
        if(diam==true){
            unik_id =$('#unik_id').val();
            diam=false;
            waitForTanya(unik_id);
            $('#btn_unik_id').text("stop");
            $('#spinner').show();
        }else{
            diam=true;
            $('#spinner').hide();
            $('#btn_unik_id').text("set dan tunggu jawaban");
        }

    });


    function waitForTanya() {


            setTimeout(function () {

                var tanya = "unik_id="+unik_id;
                console.log("sending request ");
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
                            if(diam==false){
                                waitForTanya();
                            }

                        }else{
                            if(diam==false){
                                waitForTanya();
                            }
                        }
                    }
                });
            },1500);




    }

    function getAnswer(data) {


            setTimeout(function () {
                var tanya = "unik_id="+data;
                console.log("sending request "+ tanya);
                $.ajax({
                    type: "POST",
                    url: base_url+"/main/requestjawab",
                    data: tanya,
                    async : false,
                    cache: false,
                    success: function(result){
                        if(result.indexOf("00x00")>= 0){
                            done=true;
                            var jawab = result.replace("00x00","");
                            $('#jawaban').text(jawab);
                            $('#sherlock').hide();
                        }else{

                            getAnswer(data);
                        }
                    }
                });
            },500)


    }
});