<?php
$weatherEndpoint = 'http://api.wunderground.com/api/'. WUNDERGROUND_KEY .'/conditions/q/autoip.json';
// die($weatherEndpoint);

$data['weatherInfo'] = json_decode(file_get_contents("{$weatherEndpoint}"), true);
// dd($data);

// Array
// (
//     [weatherInfo] => stdClass Object
//         (
//             [response] => stdClass Object
//                 (
//                     [version] => 0.1
//                     [termsofService] => http://www.wunderground.com/weather/api/d/terms.html
//                     [features] => stdClass Object
//                         (
//                             [conditions] => 1
//                         )
//
//                 )
//
//             [current_observation] => stdClass Object
//                 (
//                     [image] => stdClass Object
//                         (
//                             [url] => http://icons.wxug.com/graphics/wu2/logo_130x80.png
//                             [title] => Weather Underground
//                             [link] => http://www.wunderground.com
//                         )
//
//                     [display_location] => stdClass Object
//                         (
//                             [full] => Highland, IN
//                             [city] => Highland
//                             [state] => IN
//                             [state_name] => Indiana
//                             [country] => US
//                             [country_iso3166] => US
//                             [zip] => 46322
//                             [magic] => 1
//                             [wmo] => 99999
//                             [latitude] => 41.54586029
//                             [longitude] => -87.45623779
//                             [elevation] => 188.00000000
//                         )
//
//                     [observation_location] => stdClass Object
//                         (
//                             [full] => West bank of Hart Ditch, Munster, Indiana
//                             [city] => West bank of Hart Ditch, Munster
//                             [state] => Indiana
//                             [country] => US
//                             [country_iso3166] => US
//                             [latitude] => 41.546242
//                             [longitude] => -87.486763
//                             [elevation] => 604 ft
//                         )
//
//                     [estimated] => stdClass Object
//                         (
//                         )
//
//                     [station_id] => KINMUNST1
//                     [observation_time] => Last Updated on May 1, 7:30 PM CDT
//                     [observation_time_rfc822] => Sun, 01 May 2016 19:30:37 -0500
//                     [observation_epoch] => 1462149037
//                     [local_time_rfc822] => Sun, 01 May 2016 19:30:41 -0500
//                     [local_epoch] => 1462149041
//                     [local_tz_short] => CDT
//                     [local_tz_long] => America/Chicago
//                     [local_tz_offset] => -0500
//                     [weather] => Overcast
//                     [temperature_string] => 47.0 F (8.3 C)
//                     [temp_f] => 47
//                     [temp_c] => 8.3
//                     [relative_humidity] => 96%
//                     [wind_string] => From the NNE at 6.0 MPH Gusting to 6.0 MPH
//                     [wind_dir] => NNE
//                     [wind_degrees] => 22
//                     [wind_mph] => 6
//                     [wind_gust_mph] => 6.0
//                     [wind_kph] => 9.7
//                     [wind_gust_kph] => 9.7
//                     [pressure_mb] => 1014
//                     [pressure_in] => 29.94
//                     [pressure_trend] => 0
//                     [dewpoint_string] => 46 F (8 C)
//                     [dewpoint_f] => 46
//                     [dewpoint_c] => 8
//                     [heat_index_string] => NA
//                     [heat_index_f] => NA
//                     [heat_index_c] => NA
//                     [windchill_string] => 44 F (7 C)
//                     [windchill_f] => 44
//                     [windchill_c] => 7
//                     [feelslike_string] => 44 F (7 C)
//                     [feelslike_f] => 44
//                     [feelslike_c] => 7
//                     [visibility_mi] => 2.5
//                     [visibility_km] => 4.0
//                     [solarradiation] => --
//                     [UV] => 0
//                     [precip_1hr_string] => 0.00 in ( 0 mm)
//                     [precip_1hr_in] => 0.00
//                     [precip_1hr_metric] =>  0
//                     [precip_today_string] =>  in ( mm)
//                     [precip_today_in] =>
//                     [precip_today_metric] => --
//                     [icon] => cloudy
//                     [icon_url] => http://icons.wxug.com/i/c/k/cloudy.gif
//                     [forecast_url] => http://www.wunderground.com/US/IN/Highland.html
//                     [history_url] => http://www.wunderground.com/weatherstation/WXDailyHistory.asp?ID=KINMUNST1
//                     [ob_url] => http://www.wunderground.com/cgi-bin/findweather/getForecast?query=41.546242,-87.486763
//                     [nowcast] =>
//                 )
//
//         )
//
// )


$htmlPageTitle = 'Home Page';

renderView('pages/home');
?>
