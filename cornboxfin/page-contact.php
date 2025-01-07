<?php 
	/* Template Name: Contact*/
	get_header();
?>
<br><br>
<div class="row justify-content-center"style="margin:0px 15px;margin-bottom:10%">
	<div class="col-md-7 text-dark" style=""> 
		<br> <br>
		<h3 style="text-align:center;">CONTACT US</h3>
		<br>
<form>

  <!-- Name input -->
  <div class="form-outline mb-4 text-center ">
 <div class="row">
 	<div class="col">
    	<input style="width:100%;"type="text" class="newsletter__email-input brdr text-dark" placeholder="First Name" >
    </div>
    <div class="col">
    	<input style="width:100%;"type="text" name="email_address" class="email newsletter__email-input brdr text-dark" placeholder="Last Name" id="newsletter-banner-email-input">
    </div>
</div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4 text-center">
    <input style="width:100%;"type="text" name="email_address" class="email newsletter__email-input brdr  text-dark" placeholder="Email" id="newsletter-banner-email-input">
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4 text-center">
    <textarea style="width:100%;"class="email newsletter__email-input brdr text-dark" id="form4Example3" rows="4" placeholder="Your Message Here"></textarea>
    <label class="form-label" for="form4Example3"></label>
  </div>

  <!-- Submit button -->
  <input style="" type="submit" value="SUBMIT" class="newsletter__submit-button text-center">
  <br><br>
</form>
</div>
</div>





<?php get_footer();?>