<style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*/
.nav-pills-custom .nav-link {
    color: #aaa;
    background: #fff;
    position: relative;
}

.nav-pills-custom .nav-link.active {
    color: #45b649;
    background: #fff;
}
/* Add indicator arrow for the active tab */
@media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
        content: '';
        display: block;
        border-top: 10px solid transparent;
        border-right: 10px solid #64b4c8;
        border-bottom: 10px solid transparent;
        position: absolute;
        top: 50%;
        right: -15px;
        transform: translateY(-50%);
        opacity: 0;
    }
}

.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}
.nav-pills .nav-link.active,.nav-pills .show>.nav-link
{
    background-color:#fff !important;
}
.bg-color {
    background-color: #64b4c8 !important;
}
.gap-6{
    margin:15px;
}
.bg-muted {
    background-color: #6c757d7a!important;
}
body{
    font-family :'Open Sans', sans-serif !important;
    background-color: #004085bd !important;
    color:#fff !important;
}
</style><!-- Demo header-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
 include_once("config/config.php");
?>

<section class="py-5 header">
    <div class="container">
        <div class="text-center">
            <h3 class="mb-3">DelphianLogic in Action</h3>
            <h6 class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting</h6>
        </div>
        
        <div class="row">
            <div class="col-md-3 bg-white pt-4">
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php
                        $result = mysqli_query($con, "SELECT id,sub_name,icon FROM `subject` where status=1 ORDER BY id DESC");
                        $sr=1;
                        while($res = mysqli_fetch_array($result)) { 
                          if($sr==1){
                            $active="active";
                            $true="true";
                          }
                          else{
                          $active="";
                          $true='flase';
                          }
                          $sr++;
                          ?>  
                            <a class="nav-link mb-3 p-3 shadow  <?= $active; ?>" id="v-pills-<?= $res['id']; ?>-tab" data-toggle="pill" href="#v-pills-<?= $res['id']; ?>" role="tab" aria-controls="v-pills-<?= $res['id']; ?>" aria-selected="<?= $true; ?>">
                                <img src="images/<?= $res['icon']; ?>"  style="width:18%;">
                                <span class="font-weight-bold small gap-6" style="color:#696969;font-size: 16px;"><?= $res['sub_name']; ?></span>
                            </a>
                       <?php } ?>
                    </div>
                </div>
            

            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent" style="color: #fff;">
                <?php 
                       $result1 = mysqli_query($con, "SELECT id,tagline,descrption,image FROM `subject` where status=1 ORDER BY id DESC");
                       $sr1=1;
                        while($res1 = mysqli_fetch_array($result1)) {
                           if($sr1==1)
                           $active="active";
                           else
                           $active='';
                        
                           $sr1++;
                        ?>
                        <div class="tab-pane fade shadow rounded  text-center show <?= $active; ?>" id="v-pills-<?= $res1['id']; ?>" role="tabpanel" aria-labelledby="v-pills-<?= $res1['id']; ?>-tab">
                        <div class="row">
                            <div class="col-md-6 bg-color">
                               <p class="mt-5"></p>
                               <span class="pl-2 pr-2 bg-muted text-white"><?= $res1['tagline']; ?></span>
                                <h4 class="mt-3">
                                <?= $res1['descrption']; ?>
                                </h4>
                                <p class="text-white">Learn <i class="fa fa-arrow-right fa-1"></i></p>
                            </div>
                            <div class="col-md-6">
                               <img src="images/<?= $res1['image']; ?>" alt="Chicago" style="width:100%;margin-left: -30px">
                            </div>
                        </div>
                    </div>
                     
                    <?php } ?>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>