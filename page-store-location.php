<?php get_header(); ?>

<div class="bh-sl-container">
  <div id="map-container" class="bh-sl-map-container">
          <!-- Input Form Style -->
      <div class="bh-sl-form-container cevc">
        <form id="bh-sl-user-location" method="post" action="#">
          <label for="bh-sl-address"></label>
          <input type="text" id="bh-sl-address" name="bh-sl-address" placeholder="Suburb or Postcode" value="<?php echo $_GET["FindResult"]; ?>">
          <button id="bh-sl-submit" type="submit"><i class="fa fa-search"></i></button>
        </form>
       </div>

          <!-- Map Style -->
        <div id="bh-sl-map" class="bh-sl-map"></div>

  </div>
</div>
               <!-- Store List Style -->
<div class="bh-sl-loc-list">
  <ul class="list list-unstyled"></ul>
</div>

<script>
(function($){
  $(document).ready(function() {
  
  $(function() {
      $('.bh-sl-loc-list').hide();
      $('#map-container').storeLocator({
        'dataType': 'json',
        'dataLocation': '../wp-content/themes/subway-clone/data/locations.json'
      });
    });

  });
})(jQuery);
</script>

<?php get_footer(); ?>

