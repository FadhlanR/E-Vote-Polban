<?php
if(empty($_SESSION['kosong'])){
header("location:admlogin.php");
}
?>
<div class="row">
    <div class="col-lg-9 main-chart">
        <div class="row mt">
          <div class="col-md-12 col-sm-4 mb">
            <blockquote>
              <i class="fa fa-quote-left fa-2x" aria-hidden="true"></i>
              &nbspToday, The Power is In Your Hand You Can Make a Difference &nbsp
              <i class="fa fa-quote-right fa-2x" aria-hidden="true"></i>
            </blockquote>
          </div>
        </div><!-- /row mt -->
        <div class="row mt">
          <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
            <a href="./index.php?page=calon">
              <div class="box1">
                <i  class="fa fa-user fa-5x"></i><br><br>
                <center>Calon</center>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
            <a href="./index.php?page=pilihcalon">
              <div class="box1">
                <i class="fa fa-users fa-5x"></i><br><br>
                <center>Mahasiswa</center>
              </div>
              </a>
          </div>

        </div>
    </div>
</div>
