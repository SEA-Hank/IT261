<?php
include "./includes/config.php";

$weatherArray = array("hot", "cold", "warm", "rainy", "sunny");
$weather = "";
if (isset($_GET["w"])) {
    $weather = $_GET["w"];
}
if (!in_array($weather, $weatherArray, true)) {
    $weather = "hot";
}
$cityTitle = "";
$cityImage  = "";
$cityDes = "";
switch ($weather) {
    case "hot":
        $cityTitle = "Las Vegas, Nevada";
        $cityImage = "pic_1.jpeg";
        $cityDes = "Las Vegas is a popular tourist destination in the southwestern United States, but visitors may want to plan to visit areas with air conditioning during the summer months.The city averages over 70 days a year with temperatures in the triple digits and has reached its all-time record high of 117 on several occasions.";
        break;
    case "cold":
        $cityTitle = "Fairbanks, Alaska";
        $cityImage = "pic_2.jpeg";
        $cityDes = "It should be no surprise that the coldest city in the US with 10,000 or more residents is located in America’s most northern state, Alaska. Fairbanks, which calls itself “the Golden Heart of Alaska,” is the US city with the coldest recorded temperature, a chilly -66 degrees Fahrenheit (-54 Celsius). The minimum average temperature of Fairbanks in the coldest month is -16.9 degrees Fahrenheit (-27 Celsius). Fairbanks is located in the central interior of Alaska, and has a population of approximately 32,000, making it the state’s second-largest city.";
        break;
    case "warm":
        $cityTitle = "Miami, Florida";
        $cityImage = "pic_3.jpeg";
        $cityDes = "Miami, Florida holds the title for the warmest city in the USA during the winter. It also offers some of the hottest weather in the US! Daily average highs in the winter reach 70°F (21°C) and nightly lows only drop to around 62°F (17°C). Miami is a popular destination for international travelers and snowbirds looking to escape the cold winters of Canada. Forget about snow, you’ll be tanning on the beach!";
        break;
    case "rainy":
        $cityTitle = "Seattle, Washington";
        $cityImage = "pic_4.jpeg";
        $cityDes = "Seattle, a city on Puget Sound in the Pacific Northwest, is surrounded by water, mountains and evergreen forests, and contains thousands of acres of parkland. Washington State’s largest city, it’s home to a large tech industry, with Microsoft and Amazon headquartered in its metropolitan area. The futuristic Space Needle, a 1962 World’s Fair legacy, is its most iconic landmark.";
        break;
    case "sunny":
        $cityTitle = "Hawaii";
        $cityImage = "pic_5.jpeg";
        $cityDes = "Hawaii is a U.S. state located in the Pacific Ocean approximately 2,000 mi from the U.S. mainland. It is the only state outside North America, the only island state, and the only state in the tropics. Hawaii is also one of a few U.S. states to have once been an independent nation. ";
        break;
}

include "./includes/header.php";
?>
<div id="switch-wrapper">
    <div>
        <ul>
            <li><a class="hot" href="./switch.php?w=hot">Hot City</a></li>
            <li><a class="cold" href="./switch.php?w=cold">Cold City</a></li>
            <li><a class="warm" href="./switch.php?w=warm">Warm City</a></li>
            <li><a class="rainy" href="./switch.php?w=rainy">Rainy City</a></li>
            <li><a class="sunny" href="./switch.php?w=sunny">Sunny City</a></li>
        </ul>
    </div>
    <div class="<?= $weather ?>">
        <p class="city-title"><?= $cityTitle ?></p>
        <img class="city-image" src="./images/switch/<?= $cityImage ?>" alt="<?= $cityTitle ?>">
        <p class="city-des"><?= $cityDes ?></p>
    </div>
</div>
<?php include "./includes/footer.php" ?>