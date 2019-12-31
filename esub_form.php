<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>
<style>


.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-step:before {
    top: 12px;
    bottom: 0;
    left : 0;
    position: absolute;
    content: " ";
    height:7px;
    width: 100%;
    background-color: #D3D3D3;
    z-index: -1;
}
.stepwizard-stepActive:before {
  top: 12px;
    bottom: 0;
    left : 0;
    position: absolute;
    content: " ";
    height:7px;
    width: 100%;
    background-color: #337ab7;
    z-index: -1;
}
.stepwizard-step {
    display: table-cell;
    width: 200px;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 16px;
    line-height: 1;
    border-radius: 15px;
}
table.table-bordered{
    border:1px solid #708090;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid #708090;
    background-color: #D3D3D3;
}
table.table-bordered > tbody > tr > td{
    border:1px solid #708090;
    background-color: #fff;
}
@media screen and (max-width: 479px) {
    .stepwizard {
        display: block;
    }
    .stepwizard-step {
        display:inline-block;
    }
    
}

.spanner{
  position:absolute;
  top: 50%;
  left: 0;
  width: 100%;
  text-align:center;
  height: 300px;
  color: #000;
  transform: translateY(-50%);
  z-index: 1000;
  visibility: hidden;
}

.overlay{
  position: fixed;
	width: 100%;
	height: 100%;
  background: rgba(0,0,0,0.5);
  visibility: hidden;
}

.loader,
.loader:before,
.loader:after {
  border-radius: 50%;
  width: 2.5em;
  height: 2.5em;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation: load7 1.8s infinite ease-in-out;
  animation: load7 1.8s infinite ease-in-out;
}
.loader {
  color: #111FF9;
  font-size: 10px;
  margin: 80px auto;
  position: relative;
  text-indent: -9999em;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}
.loader:before,
.loader:after {
  content: '';
  position: absolute;
  top: 0;
}
.loader:before {
  left: -3.5em;
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.loader:after {
  left: 3.5em;
}
@-webkit-keyframes load7 {
  0%,
  80%,
  100% {
    box-shadow: 0 2.5em 0 -1.3em;
  }
  40% {
    box-shadow: 0 2.5em 0 0;
  }
}
@keyframes load7 {
  0%,
  80%,
  100% {
    box-shadow: 0 2.5em 0 -1.3em;
  }
  40% {
    box-shadow: 0 2.5em 0 0;
  }
}

.show{
  visibility: visible;
}
.hidden{
  visibility: hidden;
}

.spanner, .overlay{
	opacity: 0;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}

.spanner.show, .overlay.show {
	opacity: 1
}
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

<script>
$(document).ready(function () {


    

  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn'),
          nextBtnPP=$('.nextBtnPP'),
          allPrevBtn=  $('.prevBtn');


  allWells.hide();

  navListItems.click(function (e) { 
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);
    var source = $('#source').val();
      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');         
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
        //  alert(source);
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']");
          nextStepWizard.removeAttr('disabled').trigger('click');
          nextStepWizard.addClass('stepwizard-stepActive')
  });

  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
         $('div.setup-panel div a[href="#' + curStepBtn + '"]').removeClass('btn-primary').addClass('btn-default');
          $('#source').val('1');
        prevStepWizard.trigger('click');
  });
  

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>


<div class="container">
  
<div class="stepwizard col-md-12">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step stepwizard-stepActive">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <input type="hidden" id="source" value="0">
        <p>Data Pemegang Polis</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled>2</a>
        <p>Data Tertanggung</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled>3</a>
        <p>Penerima Manfaat</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled>4</a>
        <p>Asuransi yang Dimohonkan</p>
      </div>
     
    </div>
  </div>
  
<?php


//var_dump($dataProvinsi);
?>
    <div class="row setup-content" id="step-1">
        <?php include 'formDataPP.php'; ?>
    </div>
    <div class="row setup-content" id="step-2">
        <?php include 'formDataPP.php'; ?>
    </div>
    <div class="row setup-content" id="step-3">
        <?php include 'formDataPP.php'; ?>
    </div>
    <div class="row setup-content" id="step-4">
        <?php include 'formDataPP.php'; ?>
    </div>
  
</div>
