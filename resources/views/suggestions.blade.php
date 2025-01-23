<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestions d'activités</title>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Suggestions d'activités basées sur la météo</h1>
    <div id="suggestions-list">
        <!-- Les suggestions d'activités seront affichées ici -->
    </div>
    <div id="map"></div>

    <script>
        function initMap() {
            const mapOptions = {
                center: { lat: 48.8566, lng: 2.3522 }, // Position de base (Paris)
                zoom: 12,
            };

            const map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Exemple d'activités suggérées
            const activities = [
                { name: "Musée du Louvre", lat: 48.8606, lng: 2.3376, description: "Un musée célèbre avec des œuvres d'art historiques", openingHours: "9:00 AM - 6:00 PM" },
                { name: "Parc des Buttes-Chaumont", lat: 48.8819, lng: 2.3842, description: "Un parc agréable pour les activités extérieures", openingHours: "Ouvert toute la journée" }
            ];

            activities.forEach(activity => {
                const marker = new google.maps.Marker({
                    position: { lat: activity.lat, lng: activity.lng },
                    map: map,
                    title: activity.name
                });

                const infoWindow = new google.maps.InfoWindow({
                    content: `<h3>${activity.name}</h3><p>${activity.description}</p><p>Heures d'ouverture: ${activity.openingHours}</p>`
                });

                marker.addListener("click", () => {
                    infoWindow.open(map, marker);
                });
            });
        }
    </script>
</body>
</html>
