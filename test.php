<!DOCTYPE html>
<html lang="en" style="height: auto;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .map-responsive{
    overflow:hidden;
    padding-bottom:50%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:50%;
    width:50%;
    position:absolute;
}
</style>


<body>
    <!--Google map-->
    <div class="container-fluid">
        <div class="map-responsive">
            <?php $place='Swissôtel+Al+Maqam+Makkah'; // extract this from google maps url ?> 
            <iframe
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=<?=$place;?>"
                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

</body>

</html>