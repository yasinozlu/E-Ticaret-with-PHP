<?php 

include 'header.php'; 


$duyurusor=$db->prepare("SELECT * FROM mainnotification where mainnotification_id=:mainnotification_id");
$duyurusor->execute(array(
  'mainnotification_id' => $_GET['mainnotification_id']
));

$duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC);
$resimsor=$db->prepare("SELECT * from productimages ");
$resimsor->execute(array());
$say=$resimsor->rowCount();
$resimcek=$resimsor->fetchAll(PDO::FETCH_ASSOC);


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Duyuru Düzenleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../sql/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

             

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Ad<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="mainnotification_id" value="<?php echo $duyurucek['mainnotification_name'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <!-- Ck Editör Başlangıç -->

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Açıklama <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">

                <input type="text" id="first-name" name="mainnotification_content" value="<?php echo $duyurucek['mainnotification_content'] ?>"  class="form-control col-md-7 col-xs-12">

              </div>
            </div>


            


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="mainnotification_status" required>

                <option value="1" <?php echo $duyurucek['mainnotification_status'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>

                <option value="0" <?php if ($duyurucek['mainnotification_status']==0) { echo 'selected=""'; } ?>>Pasif</option>

              </select>
            </div>
          </div>


          <input type="hidden" name="mainnotification_id" value="<?php echo $duyurucek['mainnotification_id'] ?>"> 


          <div class="ln_solid"></div>
          <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="duyuruduzenle" class="btn btn-success">Güncelle</button>
            </div>
          </div>

        </form>



      </div>
    </div>
  </div>
</div>

</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>