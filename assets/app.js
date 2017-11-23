/**
 * Created by My Computer on 11/23/2017.
 */
var done=false;
$(document).ready(function() {

    $(document).ajaxStart(function() { Pace.restart() });



    $('#btn').click(function () {
       var tanya = "tanya="+$('#tanya').val();
        $.ajax({
            type: "POST",
            url: "http://localhost/progress_bar/index.php/main/addsoal",
            data: tanya,
            async : false,
            cache: false,
            success: function(data){
             
                getAnswer(data);
            }
        });
    });
    
    function getAnswer(data) {

        while (done==false){
            var tanya = "soalId="+data;
            console.log("sending request");
            $.ajax({
                type: "POST",
                url: "http://localhost/progress_bar/server.php?cmd=ask_jawab",
                data: tanya,
                async : false,
                cache: false,
                success: function(data){
                    if(data.indexOf("00x00")>= 0){
                        done=true;
                        alert("berhasil jawab");
                    }
                }
            });
        }
    }
});