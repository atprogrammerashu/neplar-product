<?php
include 'header.php';
?>
<style>
    .chosen-container-single .chosen-single {
    height: 100% !important;
    line-height: 33px !important;
}
.active-result.highlighted{
  background: rgb(38,189,154) !important;
  color:#fff !important;
}
.active-result{
    color:#000000 !important;
    font-size:16px !important;
}
.chosen-container-single .chosen-default {
    font-size: 16px !important;
    color: #999;
}
.chosen-single span{
    font-size: 16px !important;
    color: #999;
}
#update-info-btn{
    background: linear-gradient(45deg, #1de099, #1dc8cd);
    border: 0;
    border-radius: 20px;
    padding: 8px 30px;
    color: #fff;
}
.myfooter{
    position: relative !important;
}
</style>
    <div class="container-fluid">
        <h5 class="mt-2"><a href="<?=base_url('Dashboard')?>" style="text-decoration: none"><i class="fa fa-hand-o-left"></i>&nbsp;Back</a></h5>
    </div>
      <div class="container mt-5">
          <h2 class="text-center">Update Personal information</h2>
        <div class="row d-flex justify-content-center">
          <div class="col-md-10 card p-3">
            <div class="form">
              <form action="" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="email">Name :</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?=$user_data->user_name?>">
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                      <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?=$user_data->email?>" disabled>
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                     <label for="email">Mobile Number :</label> 
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Your mobile" value="<?=$user_data->phone?>">
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                     <label for="email">Date of Birth :</label> 
                    <input type="text" class="form-control" name="dob" id="dob" placeholder="Your Date of Birth" value="<?=$user_data->dob?>">
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <select data-placeholder="select state" placeholder="select state" class="form-control state-select" id="states">
                        <option class="option-states" value="" data-key="">Select state.*</option>
                         <? foreach($states as $row):?>
                         <option class="option-states" <?=(($row->state_name==$user_data->state)?'selected':'')?> value="<?=$row->state_name?>" data-key="<?=$row->id?>"><?=$row->state_name?></option>
                         <?endforeach?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <select data-placeholder="select city." <?=(($row->state_name==$user_data->state)?'selected':'')?> placeholder="select city" class="form-control city-select" id="cities">
                    </select>
                  </div>
                  
                  <div class="form-group col-lg-6">
                        <label for="email">Qualification :</label>
                    <input type="text" class="form-control" name="Qualification" id="qalification" placeholder="Qualification" value="<?=$user_data->qualification?>">
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="email">Profession :</label>  
                    <input type="text" class="form-control" name="profession" id="profession" placeholder="Profession" value="<?=$user_data->profession?>">
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-12">
                    <label>Gender : </label>  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="gender" value="male" <?=(($user_data->gender=='male')?'checked':'')?>>
                      <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="gender" value="female" <?=(($user_data->gender=='female')?'checked':'')?>>
                      <label class="form-check-label" for="female">Female</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <label for="email">Address :</label>    
                  <textarea class="form-control" name="message" rows="3" id="address" placeholder="Address"><?=$user_data->address?></textarea>
                  <div class="validate"></div>
                </div>
                <div class="text-center">
                    <span type="button" id="update-info-btn">Update </span>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>

<?php include('footer.php'); ?>
<link rel="stylesheet" href="https://harvesthq.github.io/chosen/chosen.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.13.3/sweetalert2.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.13.3/sweetalert2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".state-select").chosen();
        $(".city-select").chosen();
        if ( sessionStorage.getItem('updated') ) 
        {
           Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: 'Details updated successfully.!',
           showConfirmButton: false,
           timer: 2000
          }); 
          sessionStorage.removeItem('updated');
        }
        
    })
</script>

<script>
    $(document).on('focus','#dob',function(){
        $(this).attr('type','date');
    });
    $(document).on('focusout','#dob',function(){
        if($(this).val()=="")
        {
           $(this).attr('type','text'); 
        }
    })
</script>

<script>
    $(document).on("change","#states",function(){
        var stateid = $(this).find('option:selected').attr('data-key');
        $.post("<?=base_url('My_account/get_city')?>",
        {
            state_id:stateid
        },
          function(data, status){
            $("#cities").html(data);
            $("#cities").trigger("chosen:updated");
        });
    });
    
    $(document).ready(function(){
        var stateid = $(this).find('option:selected').attr('data-key');
        $.post("<?=base_url('My_account/get_city')?>",
        {
            state_id:stateid
        },
          function(data, status){
            $("#cities").html(data);
            $("#cities").trigger("chosen:updated");
            $("#cities").val('<?=$user_data->city?>').trigger("chosen:updated");
        });
    })
</script>

<script>
  $(document).on("click","#update-info-btn",function(){
      
    var name = $("#name").val();
    var mobile = $("#mobile").val();
    var dob = $("#dob").val();
    var state = $("#states").val();
    var city = $("#cities").val();
    var qualification = $("#qalification").val();
    var profession = $("#profession").val();
    var gender = $('input[name="gender"]:checked').val();
    var address = $("#address").val();
    var fd = new FormData();
    fd.append('user_name',name);
    fd.append('phone',mobile);
    fd.append('dob',dob);
    fd.append('state',state);
    fd.append('city',city);
    fd.append('qualification',qualification);
    fd.append('profession',profession);
    fd.append('gender',gender);
    fd.append('address',address);
    $.ajax({
      url: "<?=base_url().'My_account/update_account_info'?>",
      type: "POST",
      data: fd,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(jsonStr) {
        var res_data = JSON.stringify(jsonStr);
        var response = JSON.parse(res_data);
        var responseData = response['responseData'];
        if ((responseData != null) && (responseData == 'updated successfully'))
        {
            sessionStorage.setItem('updated',true);
            window.location.reload();
            
        }else {
            console.log(responseData);
        }
      }
  });
  }) 
</script>


























