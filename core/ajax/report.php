<?php 
include "../init.php";
if(isset($_POST['profileId']) && !empty($_POST['profileId'])){
	$user_id = $_SESSION['user_id'];
	$profileId = $_POST['profileId'];
	$user = $userClass->userData($profileId);
	?> 
	<div class="report">
		<span>&times;</span>
		<form method="post" id="report-form">
			<div class="report-select">
				<select name="reportMsg" class="reportMsg">
					<option value="">Select Report</option>
					<option value="This Profile is dangerous">This Profile is dangerous</option>
					<option value="Post Sexually Explitted Materials">Post Sexually Explitted Materials</option>
					<option value="Can harms others peoples">Can harms others peoples</option>
					<option value="Threaten you">Threaten you</option>
					<option value="Post Disturbing images and Videos">Post Disturbing images and Videos</option>
					<option value="Is a fake Profile">Is a fake Profile</option>
				</select>
				<input type="hidden" class="profileId" value="<?php echo $profileId ?>">
			</div>
			<div class="report-submit">
				<input type="submit" name="submit" class="submit-report" Value="Report">
				<div class="message-flash">Report User to PakConnect</div>
			</div>
		</div>
		<?php 
	} 
	?>
	<script>
		$(document).ready(function(){
			$('.report span').click(function(){
				$(".reportProfile").hide();
			});

			$('.submit-report').click(function(){
				if($('.reportMsg').val() == ''){
					$('.message-flash').text("Please Select an Option");
					$('.message-flash').addClass('failed-flash');
				}else {
					$('.message-flash').text("Report Submitted Successfully");
					$('.message-flash').addClass('success-flash');
					$('.message-flash').removeClass('failed-flash');
				}
			});

			$('#report-form').on('submit', function(e){
				var message = $('#report-form .report-select select').val();
				var profileId = $('.profileId').val();
				e.preventDefault();
				$.ajax({
					type: 'post',
					url: BASE_URL+'core/ajax/reportSubmit.php',
					data: {ajax: 1, message, profileId},
					success: function(responce){
					}
				});
			});   	
		});
	</script>