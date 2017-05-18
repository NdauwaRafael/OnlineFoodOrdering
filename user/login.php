<div id="wrap">

  <div class="container" style="color: #2e7d32 !important;">
      <div class="row vertical-offset-100">
      	<div class="col-md-4 col-md-offset-4">
      		<div class="panel panel-default">
  			  	<div class="panel-heading">
  			    	<h3 class="panel-title">Please sign in</h3>
  			 	</div>
  			  	<div class="panel-body">
  			    	<form accept-charset="UTF-8" role="form" method="post">
                      <fieldset>
  			    	  	<div class="form-group">
  			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
  			    		</div>
  			    		<div class="form-group">
  			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
  			    		</div>
  			    		<div class="checkbox">
  			    	    	<label>
  			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
  			    	    	</label>
  			    	    </div>
  			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
  			    	</fieldset>
  			      	</form>
                <button type="button" class="btn btn-link">forgot your password?</button>

  			    </div>
            <div class="panel-footer">New here?? <button type="button" id="reglinks" class="btn btn-link">Join us</button></div>

  			</div>
  		</div>
  	</div>
  </div>
<script>
$("#reglinks").click(function(){
  $("#homearea").load('user/register.php');
});
</script>
</div>
