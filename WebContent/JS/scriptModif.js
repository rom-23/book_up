$(function(){

    var loc = function(){
        window.location.href ="Biblio";
    }

    function loadingOut(loading) {
        setTimeout(() => loading.out(), 2000);
    }
    function notification(message){
        $.jnoty(message, {
            pool:               0,
            header:             'success',
            group:              '',
            icon:               'fa fa-info-circle',
            sticky:             true,
            position:           'top-right',
            appendTo:           'body',
            glue:               'after',
            theme:              'jnoty-success',
            themeState:         'highlight',
            corners:            '10px',
            check:              250,
            life:               2000,
            closeDuration:      'normal',
            openDuration:       'normal',
            easing:             'swing',
            closer: false,
            closeTemplate: '',
            closerTemplate: '<div>[ close all ]</div>',
            animateOpen:        {
                opacity:        'show'
            },
            animateClose:       {
                opacity:        'hide'
            }
        });
    }

    function update(libelle,update_id,idb){
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {libelle:libelle,update_id:update_id,idb:idb},
            success: function (data) {
                console.log("okh");
            }
        });
    }
    function update_suite(libelle,update_id_suite,idb){
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {libelle:libelle,update_id_suite:update_id_suite,idb:idb},
            success: function (data) {
                console.log("okh");
            }
        });
    }
    function updateBook(nomB,nbP,syno,idb){
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {nomB:nomB,nbP:nbP,syno:syno,idb:idb},
            success: function (data) {
                console.log("update Book ok");
            }
        });
    }

    $("#synopSearch").click(function() {
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
    $("#saveupdate").click(function() {
        updateBook($("#nomL").val(),$("#nb").val(),$("#synopsy").val(),$("#idbb").val());
        notification("Modifications réussies !");
        setTimeout(loc,1000);
        });
    $("#ferme").click(function() {
        window.location.href ="Biblio";
    });

    $("#autN").click(function() {
        $("#listAute").fadeTo( "fast" , 1, function() {
            $("#autN").css("opacity","0.3");
        });
    });
    $("#listAute").change(function () {
        $("#autN").css("opacity","1");
        $('#autN').hide("slide", {direction: "left"}, 1000);
        var libelle = "autheur";
    update(libelle,$("#listAute").val(),$("#idbb").val());
        $("#autN").val($("#listAute").val());
    });

    $("#genr").click(function() {
        $("#listG").fadeTo( "fast" , 1, function() {
            $("#genr").css("opacity","0.3");
        });
    });
    $("#listG").change(function () {
        $("#genr").css("opacity","1");
        $('#genr').hide("slide", {direction: "left"}, 1000);
        var libelle = "type";
   update(libelle,$("#listG").val(),$("#idbb").val());
        $("#genr").val($("#listG").val());
    });

    $("#lang").click(function() {
        $("#listlang").fadeTo( "fast" , 1, function() {
            $("#lang").css("opacity","0.3");
        });
    });
    $("#listlang").change(function () {
        $("#lang").css("opacity","1");
        $('#lang').hide("slide", {direction: "left"}, 1000);
        var libelle = "langue";
   update(libelle,$("#listlang").val(),$("#idbb").val());
        $("#lang").val($("#listlang").val());
    });

    $("#statb").click(function() {
        $("#liststa").fadeTo( "fast" , 1, function() {
            $("#statb").css("opacity","0.3");
        });
    });
    $("#liststa").change(function () {
        $("#statb").css("opacity","1");
        $('#statb').hide("slide", {direction: "left"}, 1000);
        var libelle = 'statut';
        update_suite(libelle,$("#liststa").val(),$("#idbb").val())

        $("#statb").val($("#liststa").val());
    });

    $("#edi").click(function() {
        $("#listedi").fadeTo( "fast" , 1, function() {
            $("#edi").css("opacity","0.3");
        });
    });
    $("#listedi").change(function () {
        $("#edi").css("opacity","1");
        $('#edi').hide("slide", {direction: "left"}, 1000);
        var libelle = 'edition';
        update_suite(libelle,$("#listedi").val(),$("#idbb").val())

        $("#edi").val($("#listedi").val());
    });


 //----------
});