<div class="container marketing" style="margin-top: 20px">	
<?php foreach($viewmodel['recipes'] as $value) {?>
      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading"><?php echo $value['name']?></h2>
          <p class="lead"><?php echo $value['description']?></p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="<?php echo ROOT_URL; ?>public/img/recipe/<?php echo $value['image']; ?>">
        </div>
      </div>
<?php }?>
</div>