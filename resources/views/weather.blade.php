<!DOCTYPE html>
<html>
<head>
    <title>Weather</title>
</head>
<body>
    <h1>Weather in {{ $weather['location']['name'] }}</h1>
    <p>Temperature: {{ $weather['current']['temp_c'] }}°C</p>
    <p>Weather: {{ $weather['current']['condition']['text'] }}</p>
    <p>Max Temperature: {{ $weather['forecast']['forecastday'][0]['day']['maxtemp_c'] }}°C</p>
    <p>Min Temperature: {{ $weather['forecast']['forecastday'][0]['day']['mintemp_c'] }}°C</p>
</body>
</html>
