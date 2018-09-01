<?php include('assets/snippets/header.php'); ?>
<?php include('assets/snippets/navbar.php'); ?>
<div class="row pt-5 mt-3">
<div class="col-md-3">
  <div class="card">
    <div class="card-body p-2">
      <h4 class="card-title">
        Refine
        <button type="reset" class="btn btn-default btn-link text-right" rel="tooltip" title="" data-original-title="Reset Filter">
          <i class="material-icons">cached</i>
        </button>
      </h4>
        <div class="card card-collapse">
          <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
              <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Price Range
                <i class="material-icons" id="row_down">keyboard_arrow_down</i>
                <i class="material-icons" id="row_up">keyboard_arrow_down</i>
              </a>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-body">
              <p>
                <label for="amount">Price range:</label>
                <input type="text" id="amount" style="border:0; color:#b3b3b3; font-weight:bold;" disabled>
              </p>
              <div id="slider"></div>
              <button type="button" id="btnReset" class="btn btn-sm btn-outline-info mt-3">Reset</button>
            </div>
          </div>
        </div>
        <div class="card card-collapse">
          <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Categories
                <i class="material-icons">keyboard_arrow_down</i>
              </a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-body">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" id="allCat" type="checkbox" value="" checked> All
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
              <?php
                require_once('assets/snippets/db.php');
                $sql = "SELECT * from category";
                $query = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_array($query))
                { ?>
                  <div class="form-check">
                    <label class="form-check-label text-capitalize">
                      <input class="form-check-input categories" type="checkbox" value="<?php echo $row['cat_id']; ?>"> <?php echo $row['name']; ?>
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <?php
                }
                ?>
            </div>
          </div>
        </div>
        <div class="card card-collapse">
          <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Size
                <i class="material-icons">keyboard_arrow_down</i>
              </a>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="card-body">
              <div class="form-check">
                <label class="form-check-label">
                  <input id="allSizes" class="form-check-input" type="checkbox" value="All" checked> All
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
              <?php
                require_once('assets/snippets/db.php');
                $sql = "SELECT * from size";
                $query = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_array($query))
                { ?>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input sizes" type="checkbox" value="<?php echo $row['size_id']; ?>"> <?php echo $row['name']; ?>
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div><?php
                }
                $connect->close();
                mysqli_close($connect);
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('assets/snippets/footer.php'); ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="assets/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="assets/js/validation.js" type="text/javascript"></script>
    <script src="assets/js/scrollbar.js" type="text/javascript"></script>

    <script>

      $(document).ready(function() {
        $( "#amount" ).val( "$40 - $120" );
        var resetBtn = document.getElementById('btnReset');
        $( "#slider" ).slider({
          animate: 300,
          range: true,
          min: 0,
          max: 300,
          values: [ 40, 120 ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            console.log(ui.values);
          }
        });
        resetBtn.addEventListener('click', function(){
        	$( "#slider" ).slider({ values: [ 40, 120 ] });
          $( "#amount" ).val( "$40 - $120" );
        });
      } );

      //sizes functions

      $('.sizes').change(function() {

        var selectAll = true;
        var zioDB = "";

        $('.sizes').each( function(){
          if( $(this).is(":checked") ) {
              selectAll = false;
              zioDB += $(this).val();
              zioDB += "-";
          }
        });

        $( "#allSizes").prop("checked", selectAll);

        ajax_size_update(zioDB);

      });

      $('#allSizes').change(function() {
        if( $(this).is(":checked") ) {
            $( ".sizes").prop("checked", false);
            ajax_size_update("");
        } else {
          $(this).prop("checked", true);
        }
      });


      function ajax_size_update(zioDB){

        console.log(zioDB);
        //ajax search

      }

      //categories function
      $('.categories').change(function() {

      var catAll = true;
      var zioDB1 = "";

      $('.categories').each( function(){
        if( $(this).is(":checked") ) {
          catAll = false;
            zioDB1 += $(this).val();
            zioDB1 += "-";
        }
      });

      $( "#allCat").prop("checked", catAll);

      ajax_cat_update(zioDB1);

      });

      $('#allCat').change(function() {
      if( $(this).is(":checked") ) {
          $( ".categories").prop("checked", false);
          ajax_cat_update("");
      } else {
        $(this).prop("checked", true);
      }
      });


      function ajax_cat_update(zioDB1){

      console.log(zioDB1);
      //ajax search

}


    </script>
  </body>
</html>
