<style>
a:hover {cursor:pointer}
.btn {color:white!important}
</style>
<div class="container col-10">
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
		<button class="btn btn-primary btn-share mt-0" id="addPost">განცხადების დამატება</button>
	<?php else : ?>
		<p>Please login first to add posts</p>
	<?php endif; ?>
    

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="card">
	<div class="card-header">
		<h3 class="card-title">განცხადების დამატება</h3>
	</div>
	<div class="card-body">
		<form id="addPostForm">
			<div class="form-group">
				<label for="title">სათაური</label>
				<input type="text" name="title" class="form-control" id="title" required />
			</div>
			<div class="form-group">
				<label for="body">აღწერა</label>
				<textarea name="body" class="form-control" id="body" required ></textarea>
			</div>
			<input name="submit" type="hidden" value="1" />
			<input class="btn btn-primary" type="submit" value="დამატება" />
			<a class="btn btn-danger" id="closeMymodal">გაუქმება</a>
		</form>
	</div>
</div>

      
    </div>

  </div>
</div>



<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="card">
	<div class="card-header">
		<h3 class="card-title">განცხადების რედაქტირება</h3>
	</div>
	<div class="card-body">
		<form id="updatePostForm" >
			<div class="form-group">
				<label for="title">სათაური</label>
				<input type="text" name="title" class="form-control" id="upd_title" value="" />
			</div>
			<div class="form-group">
				<label for="body">აღწერა</label>
				<textarea name="body" class="form-control" id="upd_body"></textarea>
			</div>
		     <input type="hidden" name="submit" value="1" />
			<input type="hidden" name="id" id="upd_id" value="" />
			<input class="btn btn-primary" type="submit" value="განახლება" />
			<a class="btn btn-danger" id="closeUpdatemodal">გაუქმება</a>
		</form>
	</div>
</div>


      
    </div>

  </div>
</div>



<script>
	
	

function updatePost(id) {
$('#updateModal').modal('show');
fetchPost(id);
}



$("#addPostForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: '/shares/add',
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           { 

               $("#myModal").modal('hide');
             
           }
         });

    
});


$("#updatePostForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: '/shares/edit',
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {  
               $("#updateModal").modal('hide');
               
           }
         });

    
});




function fetchPost(id) {
	
	       $.ajax({
          url:"/shares/fetchPost",
          data:{id:id},
          type:"post",
          success:function(data)
          {
		  var values = JSON.parse(data);
          $("#upd_title").val(values.title);
          $("#upd_body").val(values.body);
          $("#upd_id").val(values.id);
          
          }
        });
}	
	
function deleteItem(id) {
	
	       $.ajax({
          url:"/shares/delete",
          data:{id:id},
          type:"post",
          success:function(data)
          {
			   $("#"+id).hide();
            
          }
        });
}




setInterval(function(){
	
		       $.ajax({
          url:"/shares/fetchPosts",
          type:"post",
          success:function(data)
          {
		  var data = JSON.parse(data);
		  var card = '';
		   $.each(data, function(i, item) {                 
                  
             card += '<div class="card mb-4" id="'+item.id+'"><h3 class="card-header">'+item.title+'</h3><div class="card-body"><small class="card-subtitle">'+item.create_table+'</small><hr><p class="card-text">'+item.body+'</p><a class="card-link text-success" onclick="updatePost('+item.id+')">რედაქტირება</a><a class="card-link text-danger" onclick="deleteItem('+item.id+')">წაშლა</a></div></div>';           
                   
                        
                    });
            $('.page').html(card);              
          }
        });
	
	}, 3000);
	
  $("body").on("click", "#addPost", function(){
$('#myModal').modal('show');
});
 $("body").on("click", "#closeMymodal", function(){
$('#myModal').modal('hide');
});
 $("body").on("click", "#closeUpdatemodal", function(){
$('#updateModal').modal('hide');
});
</script>

<div class="page"> 
    <?php if (is_array($viewmodel) || is_object($viewmodel)) : ?>
	<?php foreach($viewmodel as $item) : ?>
		<div class="card mb-4" id="<?php echo $item['id']; ?>">
			<h3 class="card-header"><?php echo $item['title']; ?></h3>
			<div class="card-body">
				<small class="card-subtitle"><?php echo $item['create_table']; ?></small>
				<hr />
				<p class="card-text"><?php echo $item['body']; ?></p>
				<?php if(isset($_SESSION['is_logged_in'])) : ?>
					<a class="card-link text-success" onclick="updatePost(<?php echo $item['id']; ?>)">რედაქტირება</a>
					<a class="card-link text-danger" onclick="deleteItem(<?php echo $item['id']; ?>)">წაშლა</a>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
</div>
</div>



