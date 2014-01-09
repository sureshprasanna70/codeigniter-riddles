
		
				<section>
				<div class="col-lg-12">
					<div class="empty-track"></div>
				</div>
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-2">&nbsp;</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="imagebox">
									<?


if(isset($img))
{
foreach($img as $pic)
{

     echo '<img  width="190" height="160" src ='.base_url().'assets/images/'.$pic.' class="image-block">';
}
 

  }?>

								</div>
								
							</div>
							<div class="row">
								<p class="question-display"></p>
							</div>
							<div class="row">
								<form class="form-horizontal col-lg-12" method="post" action="<?echo base_url()?>submit" name="answer-form">
									<input type="text" name="answer" placeholder="Write your Answer Here">
									<?if(!isset($succesnote)){echo form_hidden('level',$level);}?>
									<button type="submit" name="attempt-answer">Submit it</button>
								</form>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="arrow_box"><?if(isset($pageclue))echo $pageclue;else echo "No clue this time";?></div>
							<img src="<?echo base_url()?>assets/images/egyptmale.png" class="pull-right" egyptmale>
						</div>
					</div>
				</div>
			</section>
			<footer role="footer">
				
			</footer>
		</div>



 


</div>

	

</body>


	
	
	
	
		



