<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">First Name</label>
							<input type="text" name="firstname" class="form-control form-control-sm" required value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Last Name</label>
							<input type="text" name="lastname" class="form-control form-control-sm" required value="<?php echo isset($lastname) ? $lastname : '' ?>">
						</div>
						<?php if($_SESSION['login_type'] == 1): ?>
						<div class="form-group">
							<label for="" class="control-label">User Role</label>
							<select name="type" id="type" class="custom-select custom-select-sm">
								<option value="3" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>Employee</option>
								<option value="2" <?php echo isset($type) && $type == 2 ? 'selected' : '' ?>>Project Manager</option>
								<option value="1" <?php echo isset($type) && $type == 1 ? 'selected' : '' ?>>Admin</option>
							</select>
						</div>
						<?php else: ?>
							<input type="hidden" name="type" value="3">
						<?php endif; ?>
						<div class="form-group">
							<label for="" class="control-label">Avatar</label>
							<div class="custom-file">
		                      <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
		                      <label class="custom-file-label" for="customFile">Choose file</label>
		                    </div>
						</div>
						<div class="form-group d-flex justify-content-center align-items-center">
						<img src="<?php echo isset($avatar) && file_exists('assets/uploads/'.$avatar) ? 'assets/uploads/'.$avatar : 'assets/uploads/upload.jpg'; ?>" alt="Avatar" id="cimg" class="img-fluid img-thumbnail">
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
							<label class="control-label">Email</label>
							<input type="email" class="form-control form-control-sm" name="email" required value="<?php echo isset($email) ? $email : '' ?>">
							<small id="#msg"></small>
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" class="form-control form-control-sm" name="password" <?php echo !isset($id) ? "required":'' ?>>
							<small><i><?php echo isset($id) ? "Leave this blank if you dont want to change your password" : '' ?></i></small>
						</div>
						<div class="form-group">
							<label class="label control-label">Confirm Password</label>
							<input type="password" class="form-control form-control-sm" name="cpass" <?php echo !isset($id) ? 'required' : '' ?>>
							<small id="pass_match" data-status=''></small>
						</div>
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=user_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' || pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})

	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	// Validate password to include at least 1 number or symbol
	$('#manage_user').submit(function(e){
    e.preventDefault();
    $('input').removeClass("border-danger");
    start_load();
    $('#msg').html('');

    var password = $('[name="password"]').val();
    var confirmPassword = $('[name="cpass"]').val();
    var passwordRegex = /[0-9!@#$%^&*(),.?":{}|<>]/;

    if(password != '' && confirmPassword != ''){
        if($('#pass_match').attr('data-status') != 1){
            if(password !== confirmPassword){
                $('[name="password"],[name="cpass"]').addClass("border-danger");
                end_load();
                return false;
            }
        }

        // Check if password contains at least 1 number or symbol
        if(!passwordRegex.test(password)){
            // Show the custom popup
            showPopup();
            $('[name="password"],[name="cpass"]').addClass("border-danger");
            end_load();
            return false;
        }
    }
    
    $.ajax({
        url: 'ajax.php?action=save_user',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(resp){
            if(resp == 1){
                alert_toast('Data successfully saved.',"success");
                setTimeout(function(){
                    location.replace('index.php?page=user_list');
                }, 750);
            } else if(resp == 2){
                $('#msg').html("<div class='alert alert-danger'>Email already exists.</div>");
                $('[name="email"]').addClass("border-danger");
                end_load();
            }
        }
    });
});

// Function to display the popup
function showPopup() {
    document.getElementById('popupModal').style.display = "block";
}

// Function to close the popup
function closePopup() {
    document.getElementById('popupModal').style.display = "none";
}

</script>

<!-- Popup Modal -->
<div id="popupModal" class="popup-modal">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <p>Password must contain at least one number or symbol.</p>
    </div>
</div>

<style>
    /* The Modal */
    .popup-modal {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); /* Black background with transparency */
    }

    /* Modal Content */
    .popup-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        text-align: center;
        border-radius: 5px;
    }

    /* Close Button */
    .popup-close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .popup-close:hover,
    .popup-close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
