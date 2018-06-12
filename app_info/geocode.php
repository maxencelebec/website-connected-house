<script src="http://unpkg.com/axios/dist/axios.min.js"></script>

<head>
    <style>

        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<script>
    var lat = [];
    var lng = [];
</script>

<?php
try
{
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('SELECT adresse, ville, pays,nom FROM habitation');
$req->execute();


while ($donnees = $req->fetch()) {

    $addr[] = $donnees['adresse'];
    $ville[] = $donnees['ville'];
    $pays[] = $donnees['pays'];
    $nom[] = $donnees['nom'];

?>

    <script>

    geocode();

    function geocode(){

        var location = "<?php echo end($addr); ?>,<?php echo end($ville); ?>" ;
        axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
        params :{
            address : location,
            key : 'AIzaSyCa-Sli2mjzQiI2BAuuECgWg_f_-MzGQhU'
        }
    })
    .then(function(reponse){
            console.log(reponse);

            lat.push(reponse.data.results[0].geometry.location.lat);
            lng.push(reponse.data.results[0].geometry.location.lng);

        })
        .catch(function(erreur){
            console.log(erreur);
        })
    }

    </script>

    <?php
    /*

    */
    }

    ?>

    <script>

    function initMap() {
        var locations = [];
        var place = {lat: lat[0], lng: lng[0]};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {lat: 40, lng: 0},
        })

        var marker, i;

        for (i = 0; i <= lat.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat[i], lng[i]),
                map: map,
            })
        }

    }

    </script>

<body>

<div id="coord"></div>


<div id="map"></div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa-Sli2mjzQiI2BAuuECgWg_f_-MzGQhU&callback=initMap">
</script>


</body>
