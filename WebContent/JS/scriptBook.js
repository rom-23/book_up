$(function(){


    createTable2();

    function allBook(){
     var all_Book=[];
        var pp=1;
        $.ajax({
            type: "GET",
            url: "Ajax",
            dataType:"json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: "allbook="+pp,
            success: function (data) {
                $.each(data, function (key, val) {
                    all_Book.push(data[key]);
                });
            }
        });
    };
    function createTable2() {
         var allbook=1;
        var events = $('#events');
       $('#table_id').DataTable({
           "responsive":true,
            "ajax": {
                url: 'Ajax',
                type: 'Get',
                dataSrc:"",
                data: {allbook:allbook}
            },
            "columns": [
                { "data": 'bookName'},
                { "data": 'dateAcquis'},
                { "data": 'libelletype'},
                { "data": 'nbPage'},
                { "data": 'idbook'},
                { "data": 'nomstatut'},
                { "data": 'nomEdition'},
                { "data": 'nomLangue'},
                { "data": 'nomAuteur'},
                { "data": 'synopsis',
                "render":function (synopsis) {
                    return '<a class="synop" href="#" id="'+synopsis+'" title="'+synopsis+'"><i class="fas fa-scroll"></i></a>';
                }}
            ],
           "columnDefs":[
               {"targets": [4], visible: false},
               {"targets": [1,3,9], searchable: false}
           ],
           "order": [[ 0, 'asc' ]]

            });
    };

    $('#table_id').on( 'draw.dt', function () {
        $('.synop').each(function () {
            $(this).click(function () {
                var idSynopsis = $(this).attr("id");
                $.ajax({
                    type: "GET",
                    url: "Ajax",
                    dataType: "json",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: {
                        idSynopsis: idSynopsis
                    },
                    success: function (data) {
                        $('#exampleModal').modal();
                        $("#idbb").html(data);
                    }
                });
            })
        });
        }).dataTable();
    

});