<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Hide Scrollbar but still Scrollable</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">

.hidden-scrollbar {
    width: 25%;
    float: right;
    height: 160px;
    overflow-y:scroll;
   
}
.hidden-scrollbar::-webkit-scrollbar {
 display: none; 
} 
 .hidden-scrollbar{ 
   -ms-overflow-style: none; 
   overflow: -moz-scrollbars-none; 
   scrollbar-width: none; 
 }
	</style>
	
</head>
<body>
    <div class="hidden-scrollbar">
  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
 </div>
</body>
</html>
