$(function(){

    var loc = function(){
        window.location.href ="Biblio";
    }


    $("#web").click(function() {
        var mm = $("#bna").val();
        var mo = mm.replace('.epub','');
        var mb = mo.replace('-','');
        var mr = mb.replace('.co','');
        var mt = mr.replace('_','');
        var ma = mt.replace('Gratuit','');
        var mi = ma.replace('Ebook','');
        var my = mi.replace('-','');
        window.open('https://www.ebook-gratuit.co/?s='+my,'_blank');

    });

    $("#annuler").click(function() {
        window.location.href ="Biblio";
    });

    $("#enregistrerBook").click(function(e){
        if ($("#titre").val()==''){
            $('#alert').modal();
            $("#titre").css("border","2px solid red");
            e.preventDefault();
            return false;
        }
    });
    $("#titre").click(function () {
        $(this).css("border","none");
    })
    //----------
});