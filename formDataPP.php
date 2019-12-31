
<div class="col-sm-7 col-md-6 col-lg-7 col-xs-12"><br/><br/>
  <form>
   
    
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat Email</label>
        <div class="col-sm-8">
          <input type="text" name="EMAIL_PP" class="form-control" id="EMAIL_PP" value="<?php if(isset($_POST['idesub'])) {echo $dataPP[0]->EMAIL; } ?>">
        </div>
    </div>  
   
     
    <div class="form-group row">
        <div class="col-sm-12">
          <button data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Data" class="btn btn-primary btn_nextPP btn pull-right" onClick="simpanDataPP(this)" type="button" >Selanjutnya</button>
        </div>
    </div> 
  </form>
</div>
<script>

function simpanDataPP(click)
{
  var curStep = $(click).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']");
       
  nextStepWizard.removeAttr('disabled').trigger('click');
  nextStepWizard.addClass('stepwizard-stepActive');
    
}
</script>