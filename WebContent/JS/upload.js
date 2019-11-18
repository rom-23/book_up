$(function(){

list_book();

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

    var callback = function(e){
        var p = function(){
            window.location.href ="Upload";
        }
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "Ajax",
            contentType: false,
            data: new FormData(this),
            cache: false,
            processData: false,
            beforeSend: function (response) {

            },
            success: function (response) {
                var array = JSON.parse(response);
                console.log(array);
                var tabrep = [];
                $.each(array, function (key, val) {
                    tabrep.push(val.reponse + "<br>");
                });
                console.log(tabrep);
                setTimeout(p, 1500);
                notification(tabrep);
            },
            error: function (array) {
                notification("Erreur");
                setTimeout(p, 1500);
            }
        })
    };

    function list_book(){
    $.ajax({
        type: "GET",
        url: "Ajax",
        dataType:"json",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        data: {listbook: "yes"},
        success: function (data) {
            var tab=[];
            $("#myTable--nav").remove();
            $.each(data, function (key, val) {
                var edit = "<a href='NewBook-"+val.idbook+"'><i class=\"fa fa-edit fa-md\"style='color: #712176'></i></a>";
                tab.push({idbook: val.idbook,bookName: val.bookName,dateAcquis: val.dateAcquis,edition:edit});

            });
            $('#myTable').smpSortableTable(tab, 10, 'symbols');
        }
    });
}

    $("#btnSendForm").click(function() {
        if($("#fichier").val()==''){
            $('#alert').modal();
            return false;
        }else{
            $("#formuP").on("submit",callback);
        };
    });


});