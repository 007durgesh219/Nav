 <?php
 	$cities_data = DB::table('cities')->select('name')->distinct()->get();
 	$i = 0;
	foreach($cities_data as $city){
    		$city_data[$i] = $city->name;
   		 $i = $i+1;
  	}
 ?>
 
 @include('up')
    <title>Search</title>
<script>
  $(function() {
    var availableroute = <?php echo json_encode($city_data)?>;
    //alert(availableroute );
    $( "#search" ).autocomplete({
      source: availableroute
    });
  });
</script>
    <div id="nav" class="btn-group"></div>
    {{ Form::open(array('url'=>'list_trans','method' => 'POST')) }}
	<input type="hidden" name="search" value= "city" /> 
	<input type="hidden" name="source" value= <?php echo $source; 
	if($source == 'selection'){Session::put('trans',"");Session::put('city',"");}
	else{Session::put('editTrans',"");Session::put('editCity',"");}?> /> 
    <div id="section"> 	
    <h1> Select the city </h1>
    	</br><input type="text" id = "search"  name="input_string" style="height:60px;width:500px;font-size:18pt;padding:10px;"><br>
	
 	</br></br>{{ Form::submit('Done',['class' =>'btn btn-primary btn-block']) }}
    {{ Form::close() }}
   </div>
   

