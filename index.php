<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");

session_start();
$user_id = $_SESSION['user_id'];


// Weather configuration
$apiKey = '2bc9e15d60bde53679ed44d999ad8353';

function getWeatherByCity($city, $apiKey)
{
    $city = urlencode($city);
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";
    $data = file_get_contents($url);
    return $data ? json_decode($data, true) : null;
}

function getWeatherByCoords($lat, $lon, $apiKey)
{
    $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric";
    $data = file_get_contents($url);
    return $data ? json_decode($data, true) : null;
}

if (isset($_GET['lat']) && isset($_GET['lon'])) {
    $lat = $_GET['lat'];
    $lon = $_GET['lon'];
    $weather = getWeatherByCoords($lat, $lon, $apiKey);
    header('Content-Type: application/json');
    echo json_encode($weather);
    exit;
}

$ksaCities = ['Riyadh', 'Jeddah', 'Mecca', 'Medina', 'Dammam', 'Tabuk', 'Abha'];
$searchResult = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {
    $searchCity = trim($_POST['search_city']);
    if ($searchCity) {
        $searchResult = getWeatherByCity($searchCity, $apiKey);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>KSA Weather App</title>
    <link rel="stylesheet" href="../shared/css/newStyle.css">

    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #1e1e50, #272757);
            color: #fff;
        }

        h1,
        h2 {
            text-align: center;
        }

        .weather-card {
            background: white;
            padding: 15px;
            margin: 10px;
            border-radius: 10px;
            width: 280px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: black;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .search-bar {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #aaa;
        }

        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: rgba(58, 29, 160, 0.75);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>


    <?php
    $title = "user page";
    include($_SERVER["DOCUMENT_ROOT"] . "\shared\list.php") ?>
    <h1>KSA Weather Info</h1>

    <h2>Your Current Location Weather</h2>
    <div id="user-weather" class="container">
        <div class="weather-card" id="loading">Loading current location weather...</div>
    </div>

    <script>
        navigator.geolocation.getCurrentPosition(success, error);

        function success(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            fetch(`?lat=${lat}&lon=${lon}`)
                .then(response => response.json())
                .then(data => {
                    const html = `
                <div class="weather-card">
                    <h3>${data.name}</h3>
                    <p>${data.weather[0].description}</p>
                    <p>Temperature: ${data.main.temp} °C</p>
                    <p>Humidity: ${data.main.humidity}%</p>
                </div>
            `;
                    document.getElementById("user-weather").innerHTML = html;
                })
                .catch(() => {
                    document.getElementById("user-weather").innerHTML = "<div class='weather-card'>Failed to fetch location weather.</div>";
                });
        }

        function error() {
            document.getElementById("user-weather").innerHTML = "<div class='weather-card'>Location access denied. Cannot get weather.</div>";
        }
    </script>

    <div class="search-bar">
        <form method="post">
            <input type="text" name="search_city" placeholder="Enter city name" required>
            <input type="submit" name="search" value="Search">
        </form>
    </div>

    <?php if ($searchResult): ?>
        <h2>Search Result</h2>
        <div class="container">
            <div class="weather-card">
                <h3><?= $searchResult['name'] ?></h3>
                <p><?= $searchResult['weather'][0]['description'] ?></p>
                <p>Temperature: <?= $searchResult['main']['temp'] ?> °C</p>
                <p>Humidity: <?= $searchResult['main']['humidity'] ?>%</p>
            </div>
        </div>
    <?php elseif (isset($_POST['search'])): ?>
        <p class="error">City not found or API limit reached.</p>
    <?php endif; ?>

    <h2>Weather in KSA Cities</h2>
    <div class="container">
        <?php foreach ($ksaCities as $city):
            $weather = getWeatherByCity($city, $apiKey);
            if ($weather): ?>
                <div class="weather-card">
                    <h3><?= $weather['name'] ?></h3>
                    <p><?= $weather['weather'][0]['description'] ?></p>
                    <p>Temp: <?= $weather['main']['temp'] ?> °C</p>
                    <p>Humidity: <?= $weather['main']['humidity'] ?>%</p>
                </div>
        <?php endif;
        endforeach; ?>
    </div>

</body>

</html>