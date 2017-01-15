<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script scr="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
  <base href="http://localhost:8080/codeigniter/index.php/">
</head>
<body>
<div class = 'container-float'>
		 	<div class="panel panel-default">
		  		<div class="panel-body"><strong>Welcome {user_name}</strong></div>
			</div>

			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="login/home"><strong style="color:#3399ff">Test Websight</strong></a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li><a href="login/home"><strong>End Test</strong></a></li>
			      <li><a href="#"><strong>Home</strong></a></li> 
			    </ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login/logout"><span class="glyphicon glyphicon-log-out" style="color: #ff9999">logout</span></a></li> 
			    </ul>
			  </div>
			</nav>
</div>

		<div id='question' class= 'panel panel-default container'>
			<!-- Question Here! -->
			<div class="row" style= "background-color:#fff2e6;">
			    <div class="col-sm-1" >{question_id}</div>
			    <div class="col-sm-11 row"  id='question_block'>
			    	<div class="col-sm-12" >{question_text}</div>
			    </div>
  			</div>
		</div> 

		<div id='options' class='panel panel-default container' style="background-color:#e6f3ff;">
			<div class="row">
			    <div class="col-sm-1"  id='A'><button type="button" class="btn btn-default option" id='a'  value='A' >A</button></div>
			    <div class="col-sm-11" > {option_a} </div>
  			</div>
  			<div class="row">
			    <div class="col-sm-1"  id='B'><button type="button" class="btn btn-default option" id='b' value='B' class="option">B</button></div>
			    <div class="col-sm-11"> {option_b}</div>
  			</div>
  			<div class="row">
			    <div class="col-sm-1"  id='C'><button type="button" class="btn btn-default option" id='c' value='C' class="option">C</button></div>
			    <div class="col-sm-11" > {option_c}</div>
  			</div>
  			<div class="row">
			    <div class="col-sm-1" id='D'><button type="button" class="btn btn-default option" id='d' value='D' class="option">D</button></div>
			    <div class="col-sm-11"> {option_d}</div>
  			</div> 
		</div>	
		<div class="row">
			<div class="col-sm-12 center-block text-center " id= "next_submit">
				<button type="button" class="btn btn-success right" id="submit">Submit</button>
			</div>
		</div>
</body>

<footer>

</footer>

<script type="text/javascript">

		$(document).ready(function(){
			start = new Date().getTime(); 
			response = "";
			$(".option").click(function() {
				response = $(this).val(); 
			});
				
$("#submit").click(function(){
			     	$(':checkbox:checked').each(function(i){
          					    response =  response + $(this).val()+"|";
          					    $("input[type='checkbox']").attr('disabled',true);   //  correct here 
        							});
					   
					    
			     	if(response == "")
			     		alert("Please chose a option");
			     	else
			     	{	
			     		$(".option").attr('disabled',true);


			     		display = false; 
			     		total = (new Date().getTime() - start ) / 1000;   // total is time spend one a perticular question in seconds 
			     		var postData = {
						  'response' : response,
						   'time':	total	};
						 $( "#next_submit" ).append( "<button type='button' class='btn btn-success right' id='next'>Next</button>" );

						$.ajax({
						     type: "POST",
						     url: "test/answer",
						     data: postData,
						     //assign the var here 
						     success: function(msg){
						     	alert(msg);
						     	if(msg==1)
						     	{
						     		$( "footer" ).append( "<div class='alert alert-success container'> <strong>Correct!</strong> Question explanation here !! </div>" );	
						     	}
						     	else
						     	{
						     		$( "footer" ).append( "<div class='alert alert-danger container'> <strong>Wrong! </strong> Question explanation here !!</div>" );
						     	}
						        
						     }
						});
							$( "#submit" ).toggle( display );
			     	//	alert(response);
			     	}
			   });
			     $(document).on("click", "#next", function(){
			     	window.location.replace("http://localhost:8080/codeigniter/index.php/test");
			     });

			     switch({question_type}) {
					    case 1:
					         $( "#question_block" ).append( "<audio controls width='320'>"+
                                                              "<source src={question_path}  type='audio/mp3'>"+
                                                              "<source src={question_path} type='audio/mpeg'>"+
                                                            "Your browser does not support the audio element."+
                                                            "</audio>" );
					        break;
					    case 2:
					    $( "#question_block" ).append( "<video width='320' height='240' controls>"+
                                              "<source src= {question_path}   type='video/mp4'>"+
                                              "<source src= {question_path}  type='video/ogg'>"+
                                              "Your browser does not support the video tag."+
                                            "</video>" );
					        break;
					    case 3:
					    	$(".option").remove();   
					    	$("#A").append("<input type='checkbox' name='vehicle' value='A'>A")
					    	$("#B").append("<input type='checkbox' name='vehicle' value='B'>B")
					    	$("#C").append("<input type='checkbox' name='vehicle' value='C'>C")
					    	$("#D").append("<input type='checkbox' name='vehicle' value='D'>D")
					    break;
					    	
					}

			
		});


</script>

</html>

