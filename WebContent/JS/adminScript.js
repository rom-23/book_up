
$(function(){

    list_Auteur();
    countAuteur();
    list_Edition();
    countEdition();

    function list_Edition(){
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {listEdit: "yes"},
            success: function (data) {
                var tab=[];
                $("#myTable2--nav").remove();
                $.each(data, function (key, val) {
                    var edit = "<button class='ee' name='"+val.idedition+"'><i style='color: rgba(255,42,42,0.61);' class=\"fa fa-trash-alt fa-md\"></i></button>";
                    tab.push({idedition: val.idedition,nomEdition: val.nomEdition,edition: edit});
                });
                $('#myTable2').smpSortableTable(tab, 10, 'symbols');
            }
        });
    }
    function list_Auteur(){
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {listAut: "yes"},
            success: function (data) {
                var tab=[];
                $("#myTable--nav").remove();
                $.each(data, function (key, val) {
                    var edit = "<button class='ee' name='"+val.idautheur+"'><i style='color: rgba(255,42,42,0.61);' class=\"fa fa-trash-alt fa-md\"></i></button>";
                    tab.push({idautheur: val.idautheur,nomAuteur: val.nomAuteur,edition: edit});
                });
                $('#myTable').smpSortableTable(tab, 10, 'symbols');
            }
        });
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


    $("#saveAut").click(function(e) {
        if($("#autname").val()==''){
            $('#alert').modal();
            e.preventDefault();
            return false;
        }else{
            return saveAuteur();
        };
    });
    $("#saveEdit").click(function(e) {
        if($("#editname").val()==''){
            $('#alert').modal();
            e.preventDefault();
            return false;
        }else{
            return saveEdition();
        };
    });


    function countAuteur(){
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {countAut: "yes"},
            success: function (data) {
                console.log(data);
                $("#nbauteur").append("<p style='color: #82837d;font-size: 13px;font-family: Verdana;'> "+data[0]+" auteurs présents :</p>");
            }
        });
    }
    function countEdition(){
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {countEdit: "yes"},
            success: function (data) {
                console.log(data);
                $("#nbedition").append("<p style='color: #82837d;font-size: 13px;font-family: Verdana;'> "+data[0]+" éditions présentes :</p>");
            }
        });
    }
    function saveAuteur(){
        var p = function(){
            window.location.href ="Admin-1";
        }
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {nomAuteur:$("#autname").val()},
            success: function (data) {
                if (data=="ok"){
                    notification("Auteur ajouté !");
                    setTimeout(p,1000);
                }else{
                    notification("Déjà présent dans la base !");
                    setTimeout(p,1000);
                }
            }
        });
    }
    function saveEdition(){
        var p = function(){
            window.location.href ="Admin-2";
        }
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {nomEdition:$("#editname").val()},
            success: function (data) {
                if (data=="ok"){
                    notification("Edition ajoutée !");
                    setTimeout(p,1000);
                }else{
                    notification("Déjà présente dans la base !");
                    setTimeout(p,1000);
                }
            }
        });
    }


});