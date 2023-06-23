<?php

namespace App\Helper;

class Helper
{
    public static $countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];
    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $max)];
        }

        return $randomString;
    }

    public static function generateSlug($sentence)
    {
        // Convert the sentence to lowercase
        $lowercase = strtolower($sentence);

        // Remove non-alphanumeric characters and replace them with dashes
        $slug = preg_replace('/[^a-z0-9]+/', '-', $lowercase);

        // Remove leading and trailing dashes
        $slug = trim($slug, '-');

        // Unique it using timestamps

        $slug = $slug . '-' . date('YmdHis', time());

        return $slug;
    }

    public static function generateExcerpt($text, $length = 150, $suffix = '...')
    {
        $text = strip_tags($text); // Remove HTML tags
        $text = trim($text); // Remove leading/trailing white spaces
        $text = preg_replace('/\s+/', ' ', $text); // Replace multiple white spaces with a single space
        $excerpt = substr($text, 0, $length); // Extract the specified length of characters

        // Check if the extracted excerpt ends with a complete word
        if (strlen($text) > $length) {
            $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
        }

        // Append the suffix if the excerpt was trimmed
        if (strlen($text) > strlen($excerpt)) {
            $excerpt .= $suffix;
        }

        return $excerpt;
    }

    public static function ifCredEmp($user)
    {
        if (!isset($user->nickname)) {
            $user->nickname = fake()->userName;
        }

        if (!isset($user->name)) {
            $user->nickname = fake()->name;
        }

        return $user;
    }

    public static function getCountry()
    {
        $countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];
        $num = mt_rand(0, count($countries) - 1);
        return $countries[$num];
    }

    public static function getHobby()
    {
        $hobbies = [
            'Photography',
            'Painting',
            'Gardening',
            'Cooking',
            'Playing a musical instrument',
            'Writing',
            'Reading',
            'Hiking',
            'Cycling',
            'Swimming',
            'Running',
            'Yoga',
            'Meditation',
            'Traveling',
            'Learning new languages',
            'Watching movies',
            'Playing video games',
            'Solving puzzles',
            'Collecting stamps',
            'Collecting coins',
            'Woodworking',
            'Knitting',
            'Embroidery',
            'Pottery',
            'Sculpting',
            'Dancing',
            'Singing',
            'Acting',
            'Volunteering',
            'Fishing',
            'Birdwatching',
            'Sailing',
            'Surfing',
            'Camping',
            'Rock climbing',
            'Photography',
            'DIY projects',
            'Archery',
            'Calligraphy',
            'Chess',
            'Baking',
            'Skydiving',
            'Scuba diving',
            'Model building',
            'Magic tricks',
            'Beekeeping',
            'Interior decorating',
            'Playing board games',
            'Skywatching',
            'Juggling',
            'Astronomy',
            'Golfing',
            'Canoeing',
            'Kayaking',
            'Motorcycling',
            'Stargazing',
            'Snorkeling'
        ];
        $num = mt_rand(0, count($hobbies) - 1);
        return $hobbies[$num];
    }
}
