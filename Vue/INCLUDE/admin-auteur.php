
<div class="container" style="padding-top:1em;margin-top: 1em;">
    <p style="color: #841a8f;font-family: 'Gruppo', cursive;font-size: 28px;">Ajouter un nouvel auteur</p>
</div>
<form class="container"  style="border-top: 1px solid #727272;padding-top: 3em;padding-left: 2em;">
    <div class="row">
        <form name="formAut" action="" method="" class="form-row align-items-center">
            <label  style="font-family:Verdana;font-size:13px;color: #a8a1aa">Nom de l'auteur :</label>
            <div class="col-md-4">
                <input id="autname" class="form-control form-control-sm" type="text" style="background-color: transparent;color: #abafaf;border: none;border-bottom: 1px solid #979c97;outline: none;">
            </div>
    </div>
    <div class="row" style="margin-top: 2em;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 1em;">
            <input id="saveAut" class="btn btn-outline-primary" type="button" value="Enregistrer">
        </div>
    </div>
</form>
<div class="modal fade right" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="background-color:rgba(20,26,28,0.59);border-radius:5px;border: 0.5px solid #5d5768;color: #808080;font-family: Verdana;font-size: 13px;">
            <div class="modal-header" style="border:0;">
            </div>
            <div class="modal-body" style="text-align: center;padding: 0;">
                <img src="WebContent/IMAGE/alert.png" style="margin-bottom: 1em;"/>
                <p style="font-family: Verdana;font-size: 13px;color: #919191;">Aucun auteur défini !</p>
                <input type="button" data-dismiss="modal" class="btn btn-outline-primary" value="ok" style="margin-top: 1em;"/>
            </div>
            <div class="modal-footer" style="border:0;">
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 2em;">
<div id="nbauteur"></div>
<div class="table-responsive col-md-12"style="margin-bottom: 2em;padding-bottom: 2em;">
    <table id="myTable">
        <thead>
        <tr>
            <th style="color: #848081;" id="idautheur">id</th>
            <th style="color: #858a7f;width: 100%;" id="nomAuteur" >Nom auteur</th>

        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
</div>