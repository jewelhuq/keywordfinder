<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Your page title here :)</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
  <div class="row">

   <div class="eleven columns "><a href="">Keyword Suggestion</a>  # <a href="">Whois Domain Search</a> # <a href=""> Domain Search</a> # # <a href="http://www.google.com/trends/explore?hl=en-US#q=html5,jquery"> Google Trends</a></div>
	
<hr/>  
	
	  
  </div>


  
  
    <div class="row">
      <div class="full column" style="margin-top: 25%">
       <h2 align='center'>Keyword Suggestion Tools</h2>
	   <form method="post">
            <div align='center' id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text"  name="keyword" class="u-full-width"placeholder="Enter Keyword" />
                 <input class="button-primary" name="Search" type="submit" value="Search">
                </div>
            </div>
			</form>
      </div>
	  <?php
	  function REQUEST($name)
	  {
		  return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
	  }
	  
	  $button = REQUEST('Search');
	  $text   = REQUEST('keyword');
	  if($button == "Search" and strlen($text)>3)
	  {
		
		  print("<ul>");	
		  $result=(getKeywordSuggestionsFromGoogle($text));
		   $trend    = urlencode(implode(',',$result));
		  foreach($result as $val)
		  {
			  $val_text = urlencode($val);
			 
			  print("<li><a  target='_blank' class='button button-primary' href='http://www.google.com/?q=$val_text'>$val</a></li>");
		  }
		  print("</ul>");

		    print("<iframe width='800' height='500' frameborder=0 scrolling=no src='http://www.google.com/trends/fetchComponent?q=$trend&cid=TIMESERIES_GRAPH_0&export=5'></iframe>");
		
		  
		  
	  }
	  
	  ?>
	  
    </div>
	
	
	
	
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

<?php

function getKeywordSuggestionsFromGoogle($keyword) {
    $keywords = array();
    $data = file_get_contents('http://suggestqueries.google.com/complete/search?output=firefox&client=firefox&hl=en-US&q='.urlencode($keyword));
    if (($data = json_decode($data, true)) !== null) {
        $keywords = $data[1];
    }

    return $keywords;
}

?>