<?php $this->layout('layout-back', ['title' => 'Association']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-sm-2"></div>
		<div class="col-md-8 col-sm-8">
		<h1 class="profil-title">Association Film & Vin</h1>
		</div>
		<div class="col-md-2 col-sm-2"></div>
	</div>
	<div class="row">
        <div class="col-md-2 col-sm-2"></div>
        <div class="col-md-8 col-sm-8">
            <div class="">
                <div class="row profil-utilisateur">
                    <div class="col-lg-5 col-md-12">
                        <h2 class="col-md-12">Rechercher le film : </h2>			
                        <div class="col-lg-10 col-md-12">
                            <input id="film" name="film" class="col-lg-12" type="text" placeholder="Ex : Deadpool">
                            <input type="hidden" name="idFilm">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <h2 class="col-md-12">Rechercher le vin : </h2>			
                        <div class="col-lg-10 col-md-12">
                            <input id="vin" name="vin" class="col-lg-12" type="text" placeholder="Ex : Saint Julien">
                            <input type="hidden" name="idVin">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <h2 class="col-md-12">&nbsp;</h2>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Associer</button>
                    </div>
                    <?php 
                        if(!empty($err)) { 
                            echo '<div class="showErr">'.implode('<br/>', $err).'</div>';
                        }
                        if(isset($success) && $success){
                            echo 'Perfect Match enregistré avec succés !';
                        }
                    ?>
                </div>
	</div>

<!-- FIN RECHERCHE -->

<div class="modal fade" tabindex="-1" role="dialog" id="myModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Perfect match ?</h4>
      </div>
      <div class="modal-body">
          <h4>Film sélectionné</h4>
          <div id="contentFilm" class="clearfix"></div>

          <br>
          <h4>Vin sélectionné</h4>
          <div id="contentVin" class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <form method="post">
          <input type="hidden" name="idFilm" id="idFilm">
          <input type="hidden" name="idVin" id="idVin">
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Valider</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>
<script src="<?=$this->assetUrl('js/typeahead.bundle.min.js');?>"></script>
<script>
$(function(){
  defaultVisuel = 'https://placeholdit.imgix.net/~text?w=150&h=200&bg=111&txtsize=30&txt=Aucun+Visuel';
  // Films
  $('#film').typeahead({
    highlight: true,
  },
  {
    name: 'movies',
    display: 'searchTitle',
    source: function(search, syncResults, asyncResults) {
      $.get('ajax/movies/'+ encodeURI(search), function(data) {
        asyncResults(data);
      });
    }
  }).on('typeahead:select', function(event, select) {
    $('#idFilm').val(select.code); // input hidden
    // modal
    if(select.poster.href){
      visuel = select.poster.href;
    }
    else {
      visuel = defaultVisuel;
    }

    var html = '<div class="col-md-3">';
        html+= '<img src="' + visuel + '" class="img-responsive img-thumbnail">';
        html+= '</div><div class="col-md-9">';
        html+= '<p><strong>' + select.searchTitle + '</strong></p>';
        html+= '<p>Année de production : ' + select.productionYear + '</p>';
        html+= '</div>';

    $('#contentFilm').html(html);// content film modal
  });


  // Vins
  $('#vin').typeahead({
    highlight: true,
  },
  {
    name: 'wines',
    display: 'name',
    source: function(search, syncResults, asyncResults) {
      $.get('ajax/wines/'+ encodeURI(search), function(data) {
        asyncResults(data);
      });
    }
  }).on('typeahead:select', function(event, select) {
    $('#idVin').val(select.id);  // input hidden
    // modal
    if(select.image){
      visuel = select.image;
    }
    else {
      visuel = defaultVisuel;
    }
    var html = '<div class="col-md-3">';
        html+= '<img src="' + visuel +'" class="img-responsive img-thumbnail">';
        html+= '</div><div class="col-md-9">';
        html+= '<p><strong>' + select.name + '</strong></p>';
        html+= '<p>Appellation : ' + select.appellation + '</p>';
        html+= '</div>';

    $('#contentVin').html(html);// content vin modal
  });
});
</script>
<?php $this->stop('scripts') ?>
