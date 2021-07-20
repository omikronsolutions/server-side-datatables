
<style>
.green {color: green}
.red {color: red}
.personal_id_error {color: darkred; font-size: 12px;}
.email_error {color: darkred; font-size: 12px;}
.pwd_error {color: darkred; font-size: 12px;}
.login_error {color: darkred; font-size: 12px;position: absolute;}
.contenedor-modal {
  position: absolute;
  width: 100%;
  height: 100%;
  text-align: center;
}

.contenedor-modal button {
  position: relative;
  top: 40%;
}



.popup-bg {
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(0,0,0,.7);
  width: 100%;
  height: 800px;
  height: 100vh;
  z-index: 100;
  padding: 10%;
  box-sizing: border-box;
  display: flex;
  align-items: center;
  justify-content: space-around;
}

.popup-msg {
  width: 50%;
  min-width: 400px;
  margin: auto;
  position: relative;
  z-index: 200;
  background-color: rgba(255,255,255,.9);
  padding: 2em;
  text-align: center;
  transition: all .5s;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: center;
}

.close-x {
  position: absolute;
  top: 12px;
  right: 12px;
  font-size: 12px;
  cursor: pointer;
  background-color: rgba(0,0,0,.1);
  padding:.5em;
}

.popup-msg h2 {
  color: #58a2d3;
  margin: 1em 0 .3em;
}

a.give-button {
  padding: 12px 1em;
  background-color: #58a2d3;
  color: #fff;
  border-radius: 100px;
  margin: 1em auto;
  display: block;
  max-width: 200px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 1.6em;
}

.popup-bg {
  display: none;
}

.fadeup {
  transform: translateY(0px);
}

.btn-secondary {

background-color: purple!important;

}

.hidden {display: none}

a:hover {cursor:pointer}

.pagination {float:left;}
</style>

<div class="card col col-md-4 col-lg-3 mx-3 mx-md-auto p-0 regform <?php if(isset($_SESSION['is_logged_in'])) {echo 'hidden';} ?>">
	<div class="card-header">
		<h3 class="card-title text-center">რეგისტრაცია</h3>
	</div>
	<div class="card-body">
		<form method="post" action="/users/register" enctype="multipart/form-data" id="regform">

			      <div class="form-group">
			<div class="d-flex align-items-center small">
    <i class="fa fa-user fa-fw position-absolute pl-3 text-mute"></i>
    <input type="text" class="form-control" name="name" placeholder="სახელი" id="name"  style="padding-left: 38px;" required/>
  </div>
  <div class="name_error"></div>
  </div>

  			      <div class="form-group">
			<div class="d-flex align-items-center small">
    <i class="fa fa-user fa-fw position-absolute pl-3 text-mute"></i>
    <input type="text" class="form-control" name="lname" placeholder="გვარი" id="lname"  style="padding-left: 38px;" required/>
  </div>
  <div class="lname_error"></div>
  </div>


				
				<div class="form-group">
			<div class="d-flex align-items-center small">
    <i class="fa fa-id-card fa-fw position-absolute pl-3 text-mute"></i>
    <input type="text" class="form-control" name="personal_id" placeholder="პირადი ნომერი" id="personal_id"  style="padding-left: 38px;" required />

</div>
<div class="personal_id_error"></div>
</div>


      <div class="form-group">
			<div class="d-flex align-items-center small">
    <i class="fa fa-envelope fa-fw position-absolute pl-3 text-mute"></i>
    <input type="email" class="form-control" name="email" placeholder="ელ-ფოსტა" id="email"  style="padding-left: 38px;" required />
  </div>
  <div class="email_error"></div>
  </div>

<div class="row mt-5">
  <div class="col-sm-auto m-auto">
    <div class="card card-body">
      <h5 class="text-center mb-3">პროფილის სურათი</h5>

        <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="the_file" class="custom-file-input" id="inputGroupFile02">
              <label class="custom-file-label" for="inputGroupFile02" aria-describeby="inputGroupFileAddon02">აირჩიეთ</label>
            </div>
          </div>
        </div>

  
    </div>
  </div>
</div>
<br>
    
     <div class="form-group">
			<div class="d-flex align-items-center small">
    <i id="pwd2" class="fa fa-lock fa-fw position-absolute pl-3 text-mute"></i>
    <input type="password" class="form-control" name="password" placeholder="პაროლი" id="password"  style="padding-left: 38px;" required/>
  </div>
  </div>


			     <div class="form-group">
			<div class="d-flex align-items-center small">
    <i id="pwd2" class="fa fa-lock fa-fw position-absolute pl-3 text-mute"></i>
    <input type="password" class="form-control" name="password2" placeholder="გაიმეორეთ პაროლი" id="password2"  style="padding-left: 38px;" required/>
  </div>
  <div class="pwd_error"></div>
  </div>


    <label class='with-square-checkbox'>
      <input  id="tos" type='checkbox' value="1" onclick="terms_changed(this)">
      <span>ვეთანხმები წესებს </span>
    </label>

             <div class="form-group text-center">
      <input type="hidden" name="submit" value="1">
        <br>
			<input class="btn btn-secondary" name="" type="submit" id="btnSubmit" value="რეგისტრაცია"  disabled />
		</div>

 

		</form>
 	</div>
</div>


<div class="popup-bg">
  <div class="popup-msg">
    <div class="close-x">X</div>
    <h2>რეგისტრაცია გაიარეთ წარმატებით!</h2>
    <p></p>
    <a class="give-button" href="" onclick="">OK</a>
  </div>
</div>


<div class="card col col-md-4 col-lg-3 mx-3 mx-md-auto p-0 loginform <?php if(isset($_SESSION['is_logged_in'])) {echo 'hidden';} ?>" style="height:295px;" >
	<div class="card-header">
		<h3 class="card-title text-center">ავტორიზაცია</h3>
	</div>
	<div class="card-body">
		<form method="post" action="/users/login" id="loginform">
			<div class="form-group">
				<input type="email" name="email" placeholder="ელ-ფოსტა" class="form-control" id="email" required />
			</div>
			<div class="form-group">
			
				<input type="password" name="password" placeholder="პაროლი" class="form-control" id="password" required />
			</div>
       <div class="login_error"></div>
       <br>
			 <div class="form-group text-center">
        <input type="hidden" name="submit" value="1">
			<input class="btn btn-secondary" name="submit" type="submit" id="btnLogin"  value="შესვლა" />
		</div>

		</form>
	</div>
</div>

<div id="cabinet" class="container <?php if(!isset($_SESSION['is_logged_in'])) {echo 'hidden';} ?>"> 

<!--  here -->  <div class="col-md-4" style="margin-left:400px;"> <button id="generatePdf">Export PDF</button> <button onclick="submitform()" id="generateExcel">Export Spreadsheet</button></div> 

              <table id="datatable" class="table">
                <thead>
                  <th>ID</th>
                  <th>სახელი</th>
                  <th>გვარი</th>
                  <th>ელ-ფოსტა</th>
                  <th>პირადი ნომერი</th>
                  <th>რეგისტრაციის თარიღი</th>
                  <th>სურათი</th>
                  <th>მოქმედება</th>
                 
                </thead>
                <tbody>
                
                </tbody>
              </table>
   
    
    <form name="excelForm" method="POST" action="/users/exportExcel"><input type='hidden' id="excelID" name='excelData' value="" /></form>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript">
		
		
		function submitform()
{
		var excelArray = new Array();

		var count = 0;
		 $('#datatable').DataTable({
		'destroy' : true,
        'serverSide':true,
        'processing':true,
        'paging':false,
        'order':[],
        'ajax':{
          'url':'fetch_data.php',
          'type':'post',
        },
        'fnCreatedRow':function(nRow,aData,iDataIndex)
        {

	       var excelRow = '"' + aData[0] + '"' + "\t" + '"' + aData[1] + '"' + "\t" + '"' + aData[2] + '"' + "\t" + '"' + aData[3] + '"' + "\t" + '"' + aData[4] + '"' + "\t" + '"' + aData[5] + '"'+ "\n";  

		  excelArray.push(excelRow);
		 
          localStorage.setItem("excelRows", JSON.stringify(excelArray));
        },
        'columnDefs':[{
          'target':[0,5],
          'orderable':false,
        }]
        
       

      });
       
        var excelstuff = localStorage.getItem("excelRows");
  	    $('[name=excelData]').val(excelstuff);
        document.excelForm.submit();
}

		 function download(file, text) {
              
              
                var element = document.createElement('a');
                element.setAttribute('href', 
                'data:text/plain;charset=utf-8, '
                + encodeURIComponent(text));
                element.setAttribute('download', file);

                document.body.appendChild(element);

                element.click();
              
                document.body.removeChild(element);
            }
            
		
		
    
      $('#datatable').DataTable({
		 'destroy' : true,
        'serverSide':true,
        'processing':true,
        'paging':true,
        'order':[],
        'ajax':{
          'url':'fetch_data.php',
          'type':'post',
        },
        'fnCreatedRow':function(nRow,aData,iDataIndex)
        {
	
          $(nRow).attr('id',aData[0]);
        },
        'columnDefs':[{
          'target':[0,5],
          'orderable':false,
        }]

      });
      
    </script>

    <script type="text/javascript">

function download(url) {
  const a = document.createElement('a')
  a.href = url
  a.download = url.split('/').pop()
  document.body.appendChild(a)
  a.click()
  document.body.removeChild(a)
}

    
$(document).ready(function(){
	
	
    $('#generatePdf').click(function(){
		
		var pdfArray = new Array();
		var excelArray = new Array();
		
		header = '<table id="datatable" class="table no-footer dataTable" role="grid" aria-describedby="datatable_info" style="width: 1009px;"><thead><tr role="row"><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 15px;">ID</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="სახელი: activate to sort column ascending" style="width: 59px;">სახელი</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="გვარი: activate to sort column ascending" style="width: 72px;">გვარი</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="ელ-ფოსტა: activate to sort column ascending" style="width: 158px;">ელ-ფოსტა</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="პირადი ნომერი: activate to sort column ascending" style="width: 80px;">პირადი ნომერი</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="რეგისტრაციის თარიღი: activate to sort column ascending" style="width: 113px;">რეგისტრაციის თარიღი</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="სურათი: activate to sort column ascending" style="width: 82px;">სურათი</th></tr></thead><tbody>';
		
		footer='</tbody></table>';
		
		
		
		
		var count = 0;
		 $('#datatable').DataTable({
		'destroy' : true,
        'serverSide':true,
        'processing':true,
        'paging':false,
        'order':[],
        'ajax':{
          'url':'fetch_data.php',
          'type':'post',
        },
        'fnCreatedRow':function(nRow,aData,iDataIndex)
        {
	
	      var row = '<tr class="odd"><td>'+aData[0]+'</td><td>'+aData[1]+'</td><td>'+aData[2]+'</td><td>'+aData[3]+'</td><td>'+aData[4]+'</td><td>'+aData[5]+'</td><td>'+aData[6]+'</td></tr>';
		
		  pdfArray.push(row);
	
		  
		  localStorage.setItem("rows", JSON.stringify(pdfArray));
    
        },
        'columnDefs':[{
          'target':[0,5],
          'orderable':false,
        }]
        
       

      });
       
   
       var storedRows = JSON.parse(localStorage.getItem("rows"));
      var total = header + storedRows + footer;

	          $.ajax({
          url:"/users/printPdf",
          data:{pdfData:total},
          type:"post",
          success:function(data)
          {
			   download('result.pdf');
            
          }
        });
        
        
        
        
        
    });
});





    $(document).on('click','.editBtn',function(event){
      var id = $(this).data('id');
      var trid = $(this).closest('tr').attr('id');
      $.ajax({
        url:"get_single_user.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
            var json=  JSON.parse(data); 
            $('#id').val(json.id);
            $('#trid').val(trid);
            $('#_inputName').val(json.name);
            $('#_inputEmail').val(json.email);
            $('#_inputLname').val(json.lname);
            $('#_inputPersonalId').val(json.personal_id);
            $('#_inputRegisterDate').val(json.register_date);
            $('#_inputImgPath').val(json.img_path);
            $('#editUserModal').modal('show');
        }
      });
    });

    $(document).on('submit','#updateUserForm',function(){
      var id = $('#id').val();
      var trid = $('#trid').val();
      var name = $('#_inputName').val();
      var email = $('#_inputEmail').val();
      var lname = $('#_inputLname').val();
      var personal_id = $('#_inputPersonalId').val();
      var register_date = $('#_inputRegisterDate').val();
      var img = $('#_inputImgPath').val();
      $.ajax({
        url:"update_user.php",
        data:{id:id,name:name,lname:lname,email:email,personal_id:personal_id},
        type:'post',
        success:function(data)
        {
		
           var json =JSON.parse(data);
          var status =json.status;
           if(status=='success')
           {
			 var imgsrc ="<img src='"+img+"' width='100'>";
             table = $('#datatable').DataTable();
             var button = '<a href="javascript:void();" class="btn btn-sm btn-info editBtn" data-id="' + id + '" >რედაქტირება</a> <a href="javascript:void();" class="btn btn-sm btn-danger btnDelete" data-id="' + id + '" >წაშლა</a>';
             var row = table.row("[id='" + trid +"']");
 
             row.row("[id='" + trid +"']").data([id,name,lname,email,personal_id,register_date,imgsrc,button]);
             $('#editUserModal').modal('hide');

           }
           else
           {
            alert('failed');
           }
        }
      });
    });

    $(document).on('click','.btnDelete',function(event){
    
      var id = $(this).data('id');
      if(confirm('Are you sure want to delete this user ?'))
      {
        $.ajax({
          url:"delete_user.php",
          data:{id:id},
          type:"post",
          success:function(data)
          {
            var json = JSON.parse(data);
            var status = json.status;
            if(status=='success')
            {
                $('#' + id).closest('tr').remove();
            }
            else
            {
              alert('failed');
            }
          }
        });
      }
    });
        </script>
   
    <!-- add user modal end -->
    <!-- add user modal -->
    <!-- Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="updateUserForm" action="javascript:void();" method="post">
          <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="trid" name="trid" value="">
              <div class="mb-3 row">
              <label for="_inputName" class="col-sm-2 col-form-label">სახელი</label>
              <div class="col-sm-10">
                <input type="text" name="_inputName" class="form-control" id="_inputName" value="">
              </div>
            </div>
                  <div class="mb-3 row">
              <label for="_inputLname" class="col-sm-2 col-form-label">გვარი</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="_inputLname" name="_inputLname"> 
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputEmail" class="col-sm-2 col-form-label">ელ-ფოსტა</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="_inputEmail" name="_inputEmail"> 
              </div>
            </div>
      
            <div class="mb-3 row">
              <label for="_inputPersonalId" class="col-sm-2 col-form-label">პირადი ნომერი</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="_inputPersonalId" name="_inputPersonalId"> 
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputRegisterDate" class="col-sm-2 col-form-label">თარიღი</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="_inputRegisterDate" name="_inputRegisterDate"> 
              </div>
            </div>
            <input type="hidden" name="img_path" value="" id="_inputImgPath">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">გაუქმება</button>
            <button type="submit" class="btn btn-primary">შენახვა</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- add user modal end -->


<!-- .............................................................................................. -->




  </div>


<script>

</script>
<script>
checkAuth();
$("#personal_id").change( function() {
  $.ajax({
    url:'/users/checkID',
    type: "POST",
    data: 'personal_id='+$('input[name=personal_id]').val(),
    success:function(result) {
       var value = JSON.parse(result);
       if(value == false) {
       
       $("#regform").find(".fa-id-card").removeClass('red').addClass('green');	
       $(".personal_id_error").text("");
       }
       else
       {
        $("#regform").find(".fa-id-card").removeClass('green').addClass('red');
         $(".personal_id_error").text("*პირადობა უკვე რეგისტრირებულია");
       }
    }
});
});

$("#email").change( function() {
    $.ajax({
    url:'/users/checkEmail',
    type: "POST",
    data: 'email='+$('input[name=email]').val(),
    success:function(result) {
         var value = JSON.parse(result);
       if(value == false) {
       	$("#regform").find(".fa-envelope").removeClass('red').addClass('green');
       	$(".email_error").text("");	
       }
       else
       {
       	$("#regform").find(".fa-envelope").removeClass('green').addClass('red');
       	$(".email_error").text("*ელ-ფოსტა უკვე რეგისტრირებულია");	
       }
    }
});
});

document.getElementById('tos').onclick = function() {
 if (this.checked) {$("#tos").attr("disabled", true); $("#btnSubmit").attr("disabled", false);} else { }
 };



$(document).ready(function(){
    $('#password').focusout(function(){
        var pass = $('#password').val();
        var pass2 = $('#password2').val();

        if(pass.length > 0) {  
        $("#regform").find(".fa-lock").removeClass('text-mute').addClass('green');
        }
        else
        {
        	$("#regform").find(".fa-lock").removeClass('green');
        	$("#regform").find(".fa-lock").removeClass('red');
        }
        if(pass2.length > 0) {  
        if(pass != pass2)
        {
            $("#regform").find(".fa-lock").removeClass('green').addClass('red');
            $(".pwd_error").text("*პაროლის ველები არ ემთხვევა");	
        }
        else
        {
        	$("#regform").find(".fa-lock").removeClass('red').addClass('green');
        	$(".pwd_error").text("");	
        }
        }
        else
        {
        		$("#regform").find(".fa-lock").removeClass('green');
        	$("#regform").find(".fa-lock").removeClass('red');
        }

    });
     $('#password2').focusout(function(){
        var pass = $('#password').val();
        var pass2 = $('#password2').val();
        if(pass2.length > 0) {  
        if(pass != pass2)
        {
           $("#regform").find(".fa-lock").removeClass('green').addClass('red');
           $(".pwd_error").text("*პაროლის ველები არ ემთხვევა");	
        }	 
        else
        {
            $("#regform").find(".fa-lock").removeClass('red').addClass('green');
            $(".pwd_error").text("");	
        }
        }
        else
        {
        	$("#regform").find(".fa-lock").removeClass('green');
        	$("#regform").find(".fa-lock").removeClass('red');
        }

    });
});

$('#inputGroupFile02').on('change', function(){
	files = $(this)[0].files; 
	name = ''; 
	for(var i = 0; i < files.length; i++)
		{
		 name += '\"' + files[i].name + '\"' + (i != files.length-1 ? ", " : "");
		  } 
		  $(".custom-file-label").text(name);

		   });


//register
$(document).ready(function () {

	fetchData();
    $("#btnSubmit").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#regform')[0];

        // Create an FormData object 
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/users/register",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
			
             var value = JSON.stringify(data);
             if(data === "userExists")
             {
				 setTimeout(function(){ $("#btnSubmit").removeAttr('disabled'); }, 3000);
		    
		     }
		     else
		     {
             popup();
	     	 }
	     	 
             $(':input','#regform')
  .not(':button, :submit, :reset, :hidden')
  .val('')
  .prop('checked', true)
  .prop('selected', false);

                $("#btnSubmit").prop("disabled", true);

            },
            error: function (e) {
              console.log("ERROR : ", e);
            }
        });
    });



//login
       $("#btnLogin").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#loginform')[0];

        // Create an FormData object 
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/users/login",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                 var value = JSON.parse(data);
                 if(value == true) 
                 {
                  $("#cabinet").show();
                  $(".regform").hide();
                  $(".loginform").hide();
                   fetchData();
                   checkAuth();
                   refreshPage();

                 
                  //redirect to dashboard

                 }
                 if(value == false) 
                 {
                  console.log('false')
                  $(".login_error").text("* პაროლი არასწორია");
                  //display incorrect pwd msg

                 }
                 if(value == "not found") 
                 {
                   $(".login_error").text("* მომხმარებელი ვერ მოიძებნა..");
                  console.log('not found')
                  //display user not found msg

                 }

            },
            error: function (e) {
              console.log("ERROR : ", e);
            }
        });

    });
});


function fetchData() {

         $.ajax({
            type: "POST",
            url: "/users/fetch",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
      
      var data = JSON.parse(data);
      for(var i = 0; i < data.length; i++) {
      //define json variables
      var obj = data[i];
      var id = obj.user_id;
      var name = obj.name;
      var lname = obj.lname;
      var personal_id = obj.personal_id;
      var email = obj.email;
      var img_path = obj.img_path;
      var register_date = obj.register_date;

      tr = '<tr><td>'+id+'</td><td>'+name+'</td><td>'+lname+'</td><td>'+personal_id+'</td><td>'+email+'</td><td><img src="'+img_path+'" width="100"></td><td>'+register_date+'</td></tr>';
      //append to table body
      $("#example tbody").append(tr);
     }
       //initialize table
       $('#example').DataTable();
            },
            error: function (e) {
              console.log("ERROR : ", e);
            }
        });

}


function checkAuth() {
	
	         $.ajax({
            type: "POST",
            url: "/users/checkAuth",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
             if(data == "true") {
				 $("#navLogin").hide();
				 $("#navRegister").hide();
				 $("#navLogout").show();
			 }
			 else
			 {
				 $("#navLogout").hide();
			 }
            },
            error: function (e) {
              console.log("ERROR : ", e);
            }
        });
}

function refreshPage() {
	window.location.reload(); 
}

//popup
function popup() {
  $(".popup-bg").delay(200).fadeIn(600);
  $(".popup-bg").on('click', function() {
    $(this).fadeOut(800);
  });
    $(".close-x").on('click', function() {
    $(".popup-bg").fadeOut(800);
  });

}
</script>
