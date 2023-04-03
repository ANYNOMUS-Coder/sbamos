<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

/* echo date_default_timezone_get();
echo '<br>'.date('d/m/Y H:s:i'); die;*/
//Defining Image Size
$imgInfoArr = array(
                'siteLogo' => array(
                    'thumb' => array(
                        'w'     => 174,
                        'h'     => 50
                    ),
                    'large' => array(
                        'w'     => 300,
                        'h'     => 86
                    ),
                    'normal' => array(
                        'w'     => false,
                        'h'     => false
                    )
                ),
                'userImage' => array(
                    'thumb' => array(
                        'w'     => 40,
                        'h'     => 40
                    ),
                    'large' => array(
                        'w'     => 100,
                        'h'     => 100
                    ),
                    'normal' => array(
                        'w'     => false,
                        'h'     => false
                    )
                ),
                'content' => array(
                    'thumb' => array(
                        'w'     => 100,
                        'h'     => 77
                    ),
                    'large' => array(
                        'w'     => 465,
                        'h'     => 359
                    ),
                    'normal' => array(
                        'w'     => false,
                        'h'     => false
                    )
                ),
                'pageheaderimg' => array(
                    'thumb' => array(
                        'w'     => 500,
                        'h'     => 80
                    ),
                    'large' => array(
                        'w'     => 1920,
                        'h'     => 320
                    ),
                    'normal' => array(
                        'w'     => false,
                        'h'     => false
                    )
                ),
                'profile' => array(
                    'thumb' => array(
                        'w'     => 60,
                        'h'     => 60
                    ),
                    'medium' => array(
                        'w'     => 200,
                        'h'     => 200
                    ),
                    'large' => array(
                        'w'     => 300,
                        'h'     => 300
                    ),
                    'normal' => array(
                        'w'     => false,
                        'h'     => false
                    )
                )
    		);
define( "IMG_INFO_ARR", $imgInfoArr);

$imgSprtArr     = array('thumb','medium','large','normal');
$imgTypeArr     = array('JPEG','jpeg','JPG','jpg','png','PNG','GIF','gif');
$audioTypeArr   = array('mp3','aac','wma','flac','alac','wav','aiff','pcm');
$docArr     	= array('doc','docx','pdf');
$videoTypeArr   = array('mp4');



$noFileUrl = 'https://via.placeholder.com/[w]x[h]/[bc]/[fc].png?text=[txt]';
define( "NO_FILE_URL", $noFileUrl);
define( "NO_FILE_TEXT", "NoFile");
define( "NORMAL_FILE_W", 100);
define( "NORMAL_FILE_H", 61);
define( "NO_FILE_BACK_COLOR", '999999');
define( "NO_FILE_FONT_COLOR", 'ffffff');
define( "FILE_BACK_COLOR", '000000');
define( "FILE_FONT_COLOR", 'ffffff');

//Defining Image Size

$countriesArray = array
(
	'AF' => 'Afghanistan',
	'AX' => 'Aland Islands',
	'AL' => 'Albania',
	'DZ' => 'Algeria',
	'AS' => 'American Samoa',
	'AD' => 'Andorra',
	'AO' => 'Angola',
	'AI' => 'Anguilla',
	'AQ' => 'Antarctica',
	'AG' => 'Antigua And Barbuda',
	'AR' => 'Argentina',
	'AM' => 'Armenia',
	'AW' => 'Aruba',
	'AU' => 'Australia',
	'AT' => 'Austria',
	'AZ' => 'Azerbaijan',
	'BS' => 'Bahamas',
	'BH' => 'Bahrain',
	'BD' => 'Bangladesh',
	'BB' => 'Barbados',
	'BY' => 'Belarus',
	'BE' => 'Belgium',
	'BZ' => 'Belize',
	'BJ' => 'Benin',
	'BM' => 'Bermuda',
	'BT' => 'Bhutan',
	'BO' => 'Bolivia',
	'BA' => 'Bosnia And Herzegovina',
	'BW' => 'Botswana',
	'BV' => 'Bouvet Island',
	'BR' => 'Brazil',
	'IO' => 'British Indian Ocean Territory',
	'BN' => 'Brunei Darussalam',
	'BG' => 'Bulgaria',
	'BF' => 'Burkina Faso',
	'BI' => 'Burundi',
	'KH' => 'Cambodia',
	'CM' => 'Cameroon',
	'CA' => 'Canada',
	'CV' => 'Cape Verde',
	'KY' => 'Cayman Islands',
	'CF' => 'Central African Republic',
	'TD' => 'Chad',
	'CL' => 'Chile',
	'CN' => 'China',
	'CX' => 'Christmas Island',
	'CC' => 'Cocos (Keeling) Islands',
	'CO' => 'Colombia',
	'KM' => 'Comoros',
	'CG' => 'Congo',
	'CD' => 'Congo, Democratic Republic',
	'CK' => 'Cook Islands',
	'CR' => 'Costa Rica',
	'CI' => 'Cote D\'Ivoire',
	'HR' => 'Croatia',
	'CU' => 'Cuba',
	'CY' => 'Cyprus',
	'CZ' => 'Czech Republic',
	'DK' => 'Denmark',
	'DJ' => 'Djibouti',
	'DM' => 'Dominica',
	'DO' => 'Dominican Republic',
	'EC' => 'Ecuador',
	'EG' => 'Egypt',
	'SV' => 'El Salvador',
	'GQ' => 'Equatorial Guinea',
	'ER' => 'Eritrea',
	'EE' => 'Estonia',
	'ET' => 'Ethiopia',
	'FK' => 'Falkland Islands (Malvinas)',
	'FO' => 'Faroe Islands',
	'FJ' => 'Fiji',
	'FI' => 'Finland',
	'FR' => 'France',
	'GF' => 'French Guiana',
	'PF' => 'French Polynesia',
	'TF' => 'French Southern Territories',
	'GA' => 'Gabon',
	'GM' => 'Gambia',
	'GE' => 'Georgia',
	'DE' => 'Germany',
	'GH' => 'Ghana',
	'GI' => 'Gibraltar',
	'GR' => 'Greece',
	'GL' => 'Greenland',
	'GD' => 'Grenada',
	'GP' => 'Guadeloupe',
	'GU' => 'Guam',
	'GT' => 'Guatemala',
	'GG' => 'Guernsey',
	'GN' => 'Guinea',
	'GW' => 'Guinea-Bissau',
	'GY' => 'Guyana',
	'HT' => 'Haiti',
	'HM' => 'Heard Island & Mcdonald Islands',
	'VA' => 'Holy See (Vatican City State)',
	'HN' => 'Honduras',
	'HK' => 'Hong Kong',
	'HU' => 'Hungary',
	'IS' => 'Iceland',
	'IN' => 'India',
	'ID' => 'Indonesia',
	'IR' => 'Iran, Islamic Republic Of',
	'IQ' => 'Iraq',
	'IE' => 'Ireland',
	'IM' => 'Isle Of Man',
	'IL' => 'Israel',
	'IT' => 'Italy',
	'JM' => 'Jamaica',
	'JP' => 'Japan',
	'JE' => 'Jersey',
	'JO' => 'Jordan',
	'KZ' => 'Kazakhstan',
	'KE' => 'Kenya',
	'KI' => 'Kiribati',
	'KR' => 'Korea',
	'KW' => 'Kuwait',
	'KG' => 'Kyrgyzstan',
	'LA' => 'Lao People\'s Democratic Republic',
	'LV' => 'Latvia',
	'LB' => 'Lebanon',
	'LS' => 'Lesotho',
	'LR' => 'Liberia',
	'LY' => 'Libyan Arab Jamahiriya',
	'LI' => 'Liechtenstein',
	'LT' => 'Lithuania',
	'LU' => 'Luxembourg',
	'MO' => 'Macao',
	'MK' => 'Macedonia',
	'MG' => 'Madagascar',
	'MW' => 'Malawi',
	'MY' => 'Malaysia',
	'MV' => 'Maldives',
	'ML' => 'Mali',
	'MT' => 'Malta',
	'MH' => 'Marshall Islands',
	'MQ' => 'Martinique',
	'MR' => 'Mauritania',
	'MU' => 'Mauritius',
	'YT' => 'Mayotte',
	'MX' => 'Mexico',
	'FM' => 'Micronesia, Federated States Of',
	'MD' => 'Moldova',
	'MC' => 'Monaco',
	'MN' => 'Mongolia',
	'ME' => 'Montenegro',
	'MS' => 'Montserrat',
	'MA' => 'Morocco',
	'MZ' => 'Mozambique',
	'MM' => 'Myanmar',
	'NA' => 'Namibia',
	'NR' => 'Nauru',
	'NP' => 'Nepal',
	'NL' => 'Netherlands',
	'AN' => 'Netherlands Antilles',
	'NC' => 'New Caledonia',
	'NZ' => 'New Zealand',
	'NI' => 'Nicaragua',
	'NE' => 'Niger',
	'NG' => 'Nigeria',
	'NU' => 'Niue',
	'NF' => 'Norfolk Island',
	'MP' => 'Northern Mariana Islands',
	'NO' => 'Norway',
	'OM' => 'Oman',
	'PK' => 'Pakistan',
	'PW' => 'Palau',
	'PS' => 'Palestinian Territory, Occupied',
	'PA' => 'Panama',
	'PG' => 'Papua New Guinea',
	'PY' => 'Paraguay',
	'PE' => 'Peru',
	'PH' => 'Philippines',
	'PN' => 'Pitcairn',
	'PL' => 'Poland',
	'PT' => 'Portugal',
	'PR' => 'Puerto Rico',
	'QA' => 'Qatar',
	'RE' => 'Reunion',
	'RO' => 'Romania',
	'RU' => 'Russian Federation',
	'RW' => 'Rwanda',
	'BL' => 'Saint Barthelemy',
	'SH' => 'Saint Helena',
	'KN' => 'Saint Kitts And Nevis',
	'LC' => 'Saint Lucia',
	'MF' => 'Saint Martin',
	'PM' => 'Saint Pierre And Miquelon',
	'VC' => 'Saint Vincent And Grenadines',
	'WS' => 'Samoa',
	'SM' => 'San Marino',
	'ST' => 'Sao Tome And Principe',
	'SA' => 'Saudi Arabia',
	'SN' => 'Senegal',
	'RS' => 'Serbia',
	'SC' => 'Seychelles',
	'SL' => 'Sierra Leone',
	'SG' => 'Singapore',
	'SK' => 'Slovakia',
	'SI' => 'Slovenia',
	'SB' => 'Solomon Islands',
	'SO' => 'Somalia',
	'ZA' => 'South Africa',
	'GS' => 'South Georgia And Sandwich Isl.',
	'ES' => 'Spain',
	'LK' => 'Sri Lanka',
	'SD' => 'Sudan',
	'SR' => 'Suriname',
	'SJ' => 'Svalbard And Jan Mayen',
	'SZ' => 'Swaziland',
	'SE' => 'Sweden',
	'CH' => 'Switzerland',
	'SY' => 'Syrian Arab Republic',
	'TW' => 'Taiwan',
	'TJ' => 'Tajikistan',
	'TZ' => 'Tanzania',
	'TH' => 'Thailand',
	'TL' => 'Timor-Leste',
	'TG' => 'Togo',
	'TK' => 'Tokelau',
	'TO' => 'Tonga',
	'TT' => 'Trinidad And Tobago',
	'TN' => 'Tunisia',
	'TR' => 'Turkey',
	'TM' => 'Turkmenistan',
	'TC' => 'Turks And Caicos Islands',
	'TV' => 'Tuvalu',
	'UG' => 'Uganda',
	'UA' => 'Ukraine',
	'AE' => 'United Arab Emirates',
	'GB' => 'United Kingdom',
	'US' => 'United States',
	'UM' => 'United States Outlying Islands',
	'UY' => 'Uruguay',
	'UZ' => 'Uzbekistan',
	'VU' => 'Vanuatu',
	'VE' => 'Venezuela',
	'VN' => 'Viet Nam',
	'VG' => 'Virgin Islands, British',
	'VI' => 'Virgin Islands, U.S.',
	'WF' => 'Wallis And Futuna',
	'EH' => 'Western Sahara',
	'YE' => 'Yemen',
	'ZM' => 'Zambia',
	'ZW' => 'Zimbabwe',
);

$indiacityArray = array(
	'Andaman and Nicobar' => array(
		'North and Middle Andaman', 'South Andaman', 'Nicobar','Other'
	),
	'Andhra Pradesh' => array(
		'Adilabad', 'Anantapur', 'Chittoor', 'East Godavari', 'Guntur', 'Hyderabad', 'Kadapa', 'Karimnagar', 'Khammam', 'Krishna', 'Kurnool', 'Mahbubnagar', 'Medak', 'Nalgonda', 'Nellore', 'Nizamabad', 'Prakasam', 'Rangareddi', 'Srikakulam', 'Vishakhapatnam', 'Vizianagaram', 'Warangal', 'West Godavari','Other'
	),
	'Arunachal Pradesh' => array(
		'Anjaw', 'Changlang', 'East Kameng', 'Lohit', 'Lower Subansiri', 'Papum Pare', 'Tirap', 'Dibang Valley', 'Upper Subansiri', 'West Kameng','Other'
	),
	'Assam' => array(
		'Barpeta', 'Bongaigaon', 'Cachar', 'Darrang', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Goalpara', 'Golaghat', 'Hailakandi', 'Jorhat', 'Karbi Anglong', 'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Marigaon', 'Nagaon', 'Nalbari', 'North Cachar Hills', 'Sibsagar', 'Sonitpur', 'Tinsukia','Other'
	),
	'Bihar' => array(
		'Araria', 'Aurangabad', 'Banka', 'Begusarai', 'Bhagalpur', 'Bhojpur', 'Buxar', 'Darbhanga', 'Purba Champaran', 'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad', 'Khagaria', 'Kishanganj', 'Kaimur', 'Katihar', 'Lakhisarai', 'Madhubani', 'Munger', 'Madhepura', 'Muzaffarpur', 'Nalanda', 'Nawada', 'Patna', 'Purnia', 'Rohtas', 'Saharsa', 'Samastipur', 'Sheohar', 'Sheikhpura', 'Saran', 'Sitamarhi', 'Supaul', 'Siwan', 'Vaishali', 'Pashchim Champaran','Other'
	),
	'Chandigarh' => array('Other'),
	'Chhattisgarh' => array(
		'Bastar', 'Bilaspur', 'Dantewada', 'Dhamtari', 'Durg', 'Jashpur', 'Janjgir-Champa', 'Korba', 'Koriya', 'Kanker', 'Kawardha', 'Mahasamund', 'Raigarh', 'Rajnandgaon', 'Raipur', 'Surguja','Other'
	),
	'Dadra and Nagar Haveli' => array('Other'),
	'Daman and Diu' => array(
		'Diu', 'Daman','Other'
	),
	'Delhi' => array(
		'Central Delhi', 'East Delhi', 'New Delhi', 'North Delhi', 'North East Delhi', 'North West Delhi', 'South Delhi', 'South West Delhi', 'West Delhi','Other'
	),
	'Goa' => array(
		'North Goa', 'South Goa','Other'
	),
	'Gujarat' => array(
		'Ahmedabad', 'Amreli District', 'Anand', 'Banaskantha', 'Bharuch', 'Bhavnagar', 'Dahod', 'The Dangs', 'Gandhinagar', 'Jamnagar', 'Junagadh', 'Kutch', 'Kheda', 'Mehsana', 'Narmada', 'Navsari', 'Patan', 'Panchmahal', 'Porbandar', 'Rajkot', 'Sabarkantha', 'Surendranagar', 'Surat', 'Vadodara', 'Valsad','Other'
	),
	'Haryana' => array(
		'Ambala', 'Bhiwani', 'Faridabad', 'Fatehabad', 'Gurgaon', 'Hissar', 'Jhajjar', 'Jind', 'Karnal', 'Kaithal', 'Kurukshetra', 'Mahendragarh', 'Mewat', 'Panchkula', 'Panipat', 'Rewari', 'Rohtak', 'Sirsa', 'Sonepat', 'Yamuna Nagar', 'Palwal','Other'
	),
	'Himachal Pradesh' => array(
		'Bilaspur', 'Chamba', 'Hamirpur', 'Kangra', 'Kinnaur', 'Kulu', 'Lahaul and Spiti', 'Mandi', 'Shimla', 'Sirmaur', 'Solan', 'Una','Other'
	),
	'Jammu and Kashmir' => array(
		'Anantnag', 'Badgam', 'Bandipore', 'Baramula', 'Doda', 'Jammu', 'Kargil', 'Kathua', 'Kupwara', 'Leh', 'Poonch', 'Pulwama', 'Rajauri', 'Srinagar', 'Samba', 'Udhampur','Other'
	),
	'Jharkhand' => array(
		'Bokaro', 'Chatra', 'Deoghar', 'Dhanbad', 'Dumka', 'Purba Singhbhum', 'Garhwa', 'Giridih', 'Godda', 'Gumla', 'Hazaribagh', 'Koderma', 'Lohardaga', 'Pakur', 'Palamu', 'Ranchi', 'Sahibganj', 'Seraikela and Kharsawan', 'Pashchim Singhbhum', 'Ramgarh','Other'
	),
	'Karnataka' => array(
		'Bidar', 'Belgaum', 'Bijapur', 'Bagalkot', 'Bellary', 'Bangalore Rural District', 'Bangalore Urban District', 'Chamarajnagar', 'Chikmagalur', 'Chitradurga', 'Davanagere', 'Dharwad', 'Dakshina Kannada', 'Gadag', 'Gulbarga', 'Hassan', 'Haveri District', 'Kodagu', 'Kolar', 'Koppal', 'Mandya', 'Mysore', 'Raichur', 'Shimoga', 'Tumkur', 'Udupi', 'Uttara Kannada', 'Ramanagara', 'Chikballapur', 'Yadagiri','Other'
	),
	'Kerala' => array(
		'Alappuzha', 'Ernakulam', 'Idukki', 'Kollam', 'Kannur', 'Kasaragod', 'Kottayam', 'Kozhikode', 'Malappuram', 'Palakkad', 'Pathanamthitta', 'Thrissur', 'Thiruvananthapuram', 'Wayanad','Other'
	),
	'Lakshadweep' => array(),
	'Madhya Pradesh' => array(
		'Alirajpur', 'Anuppur', 'Ashok Nagar', 'Balaghat', 'Barwani', 'Betul', 'Bhind', 'Bhopal', 'Burhanpur', 'Chhatarpur', 'Chhindwara', 'Damoh', 'Datia', 'Dewas', 'Dhar', 'Dindori', 'Guna', 'Gwalior', 'Harda', 'Hoshangabad', 'Indore', 'Jabalpur', 'Jhabua', 'Katni', 'Khandwa', 'Khargone', 'Mandla', 'Mandsaur', 'Morena', 'Narsinghpur', 'Neemuch', 'Panna', 'Rewa', 'Rajgarh', 'Ratlam', 'Raisen', 'Sagar', 'Satna', 'Sehore', 'Seoni', 'Shahdol', 'Shajapur', 'Sheopur', 'Shivpuri', 'Sidhi', 'Singrauli', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha','Other'
	),
	'Maharashtra' => array(
		'Ahmednagar', 'Akola', 'Amrawati', 'Aurangabad', 'Bhandara', 'Beed', 'Buldhana', 'Chandrapur', 'Dhule', 'Gadchiroli', 'Gondiya', 'Hingoli', 'Jalgaon', 'Jalna', 'Kolhapur', 'Latur', 'Mumbai City', 'Mumbai suburban', 'Nandurbar', 'Nanded', 'Nagpur', 'Nashik', 'Osmanabad', 'Parbhani', 'Pune', 'Raigad', 'Ratnagiri', 'Sindhudurg', 'Sangli', 'Solapur', 'Satara', 'Thane', 'Wardha', 'Washim', 'Yavatmal','Other'
	),
	'Manipur' => array(
		'Bishnupur', 'Churachandpur', 'Chandel', 'Imphal East', 'Senapati', 'Tamenglong', 'Thoubal', 'Ukhrul', 'Imphal West','Other'
	),
	'Meghalaya' => array(
		'East Garo Hills', 'East Khasi Hills', 'Jaintia Hills', 'Ri-Bhoi', 'South Garo Hills', 'West Garo Hills', 'West Khasi Hills','Other'
	),
	'Mizoram' => array(
		'Aizawl', 'Champhai', 'Kolasib', 'Lawngtlai', 'Lunglei', 'Mamit', 'Saiha', 'Serchhip','Other'
	),
	'Nagaland' => array(
		'Dimapur', 'Kohima', 'Mokokchung', 'Mon', 'Phek', 'Tuensang', 'Wokha', 'Zunheboto','Other'
	),
	'Orissa' => array(
		'Angul', 'Boudh', 'Bhadrak', 'Bolangir', 'Bargarh', 'Baleswar', 'Cuttack', 'Debagarh', 'Dhenkanal', 'Ganjam', 'Gajapati', 'Jharsuguda', 'Jajapur', 'Jagatsinghpur', 'Khordha', 'Kendujhar', 'Kalahandi', 'Kandhamal', 'Koraput', 'Kendrapara', 'Malkangiri', 'Mayurbhanj', 'Nabarangpur', 'Nuapada', 'Nayagarh', 'Puri', 'Rayagada', 'Sambalpur', 'Subarnapur', 'Sundargarh','Other'
	),
	'Puducherry' => array(
		'Karaikal', 'Mahe', 'Puducherry', 'Yanam','Other'
	),
	'Punjab' => array(
		'Amritsar', 'Bathinda', 'Firozpur', 'Faridkot', 'Fatehgarh Sahib', 'Gurdaspur', 'Hoshiarpur', 'Jalandhar', 'Kapurthala', 'Ludhiana', 'Mansa', 'Moga', 'Mukatsar', 'Nawan Shehar', 'Patiala', 'Rupnagar', 'Sangrur','Other'
	),
	'Rajasthan' => array(
		'Ajmer', 'Alwar', 'Bikaner', 'Barmer', 'Banswara', 'Bharatpur', 'Baran', 'Bundi', 'Bhilwara', 'Churu', 'Chittorgarh', 'Dausa', 'Dholpur', 'Dungapur', 'Ganganagar', 'Hanumangarh', 'Juhnjhunun', 'Jalore', 'Jodhpur', 'Jaipur', 'Jaisalmer', 'Jhalawar', 'Karauli', 'Kota', 'Nagaur', 'Pali', 'Pratapgarh', 'Rajsamand', 'Sikar', 'Sawai Madhopur', 'Sirohi', 'Tonk', 'Udaipur','Other'
	),
	'Sikkim' => array(
		'East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim','Other'
	),
	'Tamil Nadu' => array(
		'Ariyalur', 'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri', 'Dindigul', 'Erode', 'Kanchipuram', 'Kanyakumari', 'Karur', 'Madurai', 'Nagapattinam', 'The Nilgiris', 'Namakkal', 'Perambalur', 'Pudukkottai', 'Ramanathapuram', 'Salem', 'Sivagangai', 'Tiruppur', 'Tiruchirappalli', 'Theni', 'Tirunelveli', 'Thanjavur', 'Thoothukudi', 'Thiruvallur', 'Thiruvarur', 'Tiruvannamalai', 'Vellore', 'Villupuram','Other'
	),
	'Tripura' => array(
		'Dhalai', 'North Tripura', 'South Tripura', 'West Tripura','Other'
	),
	'Uttarakhand' => array(
		'Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Dehradun', 'Haridwar', 'Nainital', 'Pauri Garhwal', 'Pithoragharh', 'Rudraprayag', 'Tehri Garhwal', 'Udham Singh Nagar', 'Uttarkashi','Other'
	),
	'Uttar Pradesh' => array(
		'Agra', 'Allahabad', 'Aligarh', 'Ambedkar Nagar', 'Auraiya', 'Azamgarh', 'Barabanki', 'Badaun', 'Bagpat', 'Bahraich', 'Bijnor', 'Ballia', 'Banda', 'Balrampur', 'Bareilly', 'Basti', 'Bulandshahr', 'Chandauli', 'Chitrakoot', 'Deoria', 'Etah', 'Kanshiram Nagar', 'Etawah', 'Firozabad', 'Farrukhabad', 'Fatehpur', 'Faizabad', 'Gautam Buddha Nagar', 'Gonda', 'Ghazipur', 'Gorkakhpur', 'Ghaziabad', 'Hamirpur', 'Hardoi', 'Mahamaya Nagar', 'Jhansi', 'Jalaun', 'Jyotiba Phule Nagar', 'Jaunpur District', 'Kanpur Dehat', 'Kannauj', 'Kanpur Nagar', 'Kaushambi', 'Kushinagar', 'Lalitpur', 'Lakhimpur Kheri', 'Lucknow', 'Mau', 'Meerut', 'Maharajganj', 'Mahoba', 'Mirzapur', 'Moradabad', 'Mainpuri', 'Mathura', 'Muzaffarnagar', 'Pilibhit', 'Pratapgarh', 'Rampur', 'Rae Bareli', 'Saharanpur', 'Sitapur', 'Shahjahanpur', 'Sant Kabir Nagar', 'Siddharthnagar', 'Sonbhadra', 'Sant Ravidas Nagar', 'Sultanpur', 'Shravasti', 'Unnao', 'Varanasi','Other'
	),
	'West Bengal' => array(
		'Birbhum', 'Bankura', 'Bardhaman', 'Darjeeling', 'Dakshin Dinajpur', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Cooch Behar', 'Kolkata', 'Malda', 'Midnapore', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'South 24 Parganas', 'Purulia', 'Uttar Dinajpur','Other'
	),
    'Other' => array('Other')
);

$currency_base = array('USD');

$language_codes = array(
        'en' => 'English' , 
        'aa' => 'Afar' , 
        'ab' => 'Abkhazian' , 
        'af' => 'Afrikaans' , 
        'am' => 'Amharic' , 
        'ar' => 'Arabic' , 
        'as' => 'Assamese' , 
        'ay' => 'Aymara' , 
        'az' => 'Azerbaijani' , 
        'ba' => 'Bashkir' , 
        'be' => 'Byelorussian' , 
        'bg' => 'Bulgarian' , 
        'bh' => 'Bihari' , 
        'bi' => 'Bislama' , 
        'bn' => 'Bengali/Bangla' , 
        'bo' => 'Tibetan' , 
        'br' => 'Breton' , 
        'ca' => 'Catalan' , 
        'co' => 'Corsican' , 
        'cs' => 'Czech' , 
        'cy' => 'Welsh' , 
        'da' => 'Danish' , 
        'de' => 'German' , 
        'dz' => 'Bhutani' , 
        'el' => 'Greek' , 
        'eo' => 'Esperanto' , 
        'es' => 'Spanish' , 
        'et' => 'Estonian' , 
        'eu' => 'Basque' , 
        'fa' => 'Persian' , 
        'fi' => 'Finnish' , 
        'fj' => 'Fiji' , 
        'fo' => 'Faeroese' , 
        'fr' => 'French' , 
        'fy' => 'Frisian' , 
        'ga' => 'Irish' , 
        'gd' => 'Scots/Gaelic' , 
        'gl' => 'Galician' , 
        'gn' => 'Guarani' , 
        'gu' => 'Gujarati' , 
        'ha' => 'Hausa' , 
        'hi' => 'Hindi' , 
        'hr' => 'Croatian' , 
        'hu' => 'Hungarian' , 
        'hy' => 'Armenian' , 
        'ia' => 'Interlingua' , 
        'ie' => 'Interlingue' , 
        'ik' => 'Inupiak' , 
        'in' => 'Indonesian' , 
        'is' => 'Icelandic' , 
        'it' => 'Italian' , 
        'iw' => 'Hebrew' , 
        'ja' => 'Japanese' , 
        'ji' => 'Yiddish' , 
        'jw' => 'Javanese' , 
        'ka' => 'Georgian' , 
        'kk' => 'Kazakh' , 
        'kl' => 'Greenlandic' , 
        'km' => 'Cambodian' , 
        'kn' => 'Kannada' , 
        'ko' => 'Korean' , 
        'ks' => 'Kashmiri' , 
        'ku' => 'Kurdish' , 
        'ky' => 'Kirghiz' , 
        'la' => 'Latin' , 
        'ln' => 'Lingala' , 
        'lo' => 'Laothian' , 
        'lt' => 'Lithuanian' , 
        'lv' => 'Latvian/Lettish' , 
        'mg' => 'Malagasy' , 
        'mi' => 'Maori' , 
        'mk' => 'Macedonian' , 
        'ml' => 'Malayalam' , 
        'mn' => 'Mongolian' , 
        'mo' => 'Moldavian' , 
        'mr' => 'Marathi' , 
        'ms' => 'Malay' , 
        'mt' => 'Maltese' , 
        'my' => 'Burmese' , 
        'na' => 'Nauru' , 
        'ne' => 'Nepali' , 
        'nl' => 'Dutch' , 
        'no' => 'Norwegian' , 
        'oc' => 'Occitan' , 
        'om' => '(Afan)/Oromoor/Oriya' , 
        'pa' => 'Punjabi' , 
        'pl' => 'Polish' , 
        'ps' => 'Pashto/Pushto' , 
        'pt' => 'Portuguese' , 
        'qu' => 'Quechua' , 
        'rm' => 'Rhaeto-Romance' , 
        'rn' => 'Kirundi' , 
        'ro' => 'Romanian' , 
        'ru' => 'Russian' , 
        'rw' => 'Kinyarwanda' , 
        'sa' => 'Sanskrit' , 
        'sd' => 'Sindhi' , 
        'sg' => 'Sangro' , 
        'sh' => 'Serbo-Croatian' , 
        'si' => 'Singhalese' , 
        'sk' => 'Slovak' , 
        'sl' => 'Slovenian' , 
        'sm' => 'Samoan' , 
        'sn' => 'Shona' , 
        'so' => 'Somali' , 
        'sq' => 'Albanian' , 
        'sr' => 'Serbian' , 
        'ss' => 'Siswati' , 
        'st' => 'Sesotho' , 
        'su' => 'Sundanese' , 
        'sv' => 'Swedish' , 
        'sw' => 'Swahili' , 
        'ta' => 'Tamil' , 
        'te' => 'Tegulu' , 
        'tg' => 'Tajik' , 
        'th' => 'Thai' , 
        'ti' => 'Tigrinya' , 
        'tk' => 'Turkmen' , 
        'tl' => 'Tagalog' , 
        'tn' => 'Setswana' , 
        'to' => 'Tonga' , 
        'tr' => 'Turkish' , 
        'ts' => 'Tsonga' , 
        'tt' => 'Tatar' , 
        'tw' => 'Twi' , 
        'uk' => 'Ukrainian' , 
        'ur' => 'Urdu' , 
        'uz' => 'Uzbek' , 
        'vi' => 'Vietnamese' , 
        'vo' => 'Volapuk' , 
        'wo' => 'Wolof' , 
        'xh' => 'Xhosa' , 
        'yo' => 'Yoruba' , 
        'zh' => 'Chinese' , 
        'zu' => 'Zulu' , 
);

$phoneCountryCodeArray = array(
	'AD'=>array('name'=>'ANDORRA','code'=>'376'),
	'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'971'),
	'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),
	'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),
	'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),
	'AL'=>array('name'=>'ALBANIA','code'=>'355'),
	'AM'=>array('name'=>'ARMENIA','code'=>'374'),
	'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),
	'AO'=>array('name'=>'ANGOLA','code'=>'244'),
	'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),
	'AR'=>array('name'=>'ARGENTINA','code'=>'54'),
	'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),
	'AT'=>array('name'=>'AUSTRIA','code'=>'43'),
	'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),
	'AW'=>array('name'=>'ARUBA','code'=>'297'),
	'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),
	'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),
	'BB'=>array('name'=>'BARBADOS','code'=>'1246'),
	'BD'=>array('name'=>'BANGLADESH','code'=>'880'),
	'BE'=>array('name'=>'BELGIUM','code'=>'32'),
	'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),
	'BG'=>array('name'=>'BULGARIA','code'=>'359'),
	'BH'=>array('name'=>'BAHRAIN','code'=>'973'),
	'BI'=>array('name'=>'BURUNDI','code'=>'257'),
	'BJ'=>array('name'=>'BENIN','code'=>'229'),
	'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),
	'BM'=>array('name'=>'BERMUDA','code'=>'1441'),
	'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),
	'BO'=>array('name'=>'BOLIVIA','code'=>'591'),
	'BR'=>array('name'=>'BRAZIL','code'=>'55'),
	'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),
	'BT'=>array('name'=>'BHUTAN','code'=>'975'),
	'BW'=>array('name'=>'BOTSWANA','code'=>'267'),
	'BY'=>array('name'=>'BELARUS','code'=>'375'),
	'BZ'=>array('name'=>'BELIZE','code'=>'501'),
	'CA'=>array('name'=>'CANADA','code'=>'1'),
	'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),
	'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),
	'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),
	'CG'=>array('name'=>'CONGO','code'=>'242'),
	'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),
	'CI'=>array('name'=>'COTE D IVOIRE','code'=>'225'),
	'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),
	'CL'=>array('name'=>'CHILE','code'=>'56'),
	'CM'=>array('name'=>'CAMEROON','code'=>'237'),
	'CN'=>array('name'=>'CHINA','code'=>'86'),
	'CO'=>array('name'=>'COLOMBIA','code'=>'57'),
	'CR'=>array('name'=>'COSTA RICA','code'=>'506'),
	'CU'=>array('name'=>'CUBA','code'=>'53'),
	'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),
	'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),
	'CY'=>array('name'=>'CYPRUS','code'=>'357'),
	'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),
	'DE'=>array('name'=>'GERMANY','code'=>'49'),
	'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),
	'DK'=>array('name'=>'DENMARK','code'=>'45'),
	'DM'=>array('name'=>'DOMINICA','code'=>'1767'),
	'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),
	'DZ'=>array('name'=>'ALGERIA','code'=>'213'),
	'EC'=>array('name'=>'ECUADOR','code'=>'593'),
	'EE'=>array('name'=>'ESTONIA','code'=>'372'),
	'EG'=>array('name'=>'EGYPT','code'=>'20'),
	'ER'=>array('name'=>'ERITREA','code'=>'291'),
	'ES'=>array('name'=>'SPAIN','code'=>'34'),
	'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),
	'FI'=>array('name'=>'FINLAND','code'=>'358'),
	'FJ'=>array('name'=>'FIJI','code'=>'679'),
	'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),
	'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),
	'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),
	'FR'=>array('name'=>'FRANCE','code'=>'33'),
	'GA'=>array('name'=>'GABON','code'=>'241'),
	'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),
	'GD'=>array('name'=>'GRENADA','code'=>'1473'),
	'GE'=>array('name'=>'GEORGIA','code'=>'995'),
	'GH'=>array('name'=>'GHANA','code'=>'233'),
	'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),
	'GL'=>array('name'=>'GREENLAND','code'=>'299'),
	'GM'=>array('name'=>'GAMBIA','code'=>'220'),
	'GN'=>array('name'=>'GUINEA','code'=>'224'),
	'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),
	'GR'=>array('name'=>'GREECE','code'=>'30'),
	'GT'=>array('name'=>'GUATEMALA','code'=>'502'),
	'GU'=>array('name'=>'GUAM','code'=>'1671'),
	'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),
	'GY'=>array('name'=>'GUYANA','code'=>'592'),
	'HK'=>array('name'=>'HONG KONG','code'=>'852'),
	'HN'=>array('name'=>'HONDURAS','code'=>'504'),
	'HR'=>array('name'=>'CROATIA','code'=>'385'),
	'HT'=>array('name'=>'HAITI','code'=>'509'),
	'HU'=>array('name'=>'HUNGARY','code'=>'36'),
	'ID'=>array('name'=>'INDONESIA','code'=>'62'),
	'IE'=>array('name'=>'IRELAND','code'=>'353'),
	'IL'=>array('name'=>'ISRAEL','code'=>'972'),
	'IM'=>array('name'=>'ISLE OF MAN','code'=>'44'),
	'IN'=>array('name'=>'INDIA','code'=>'91'),
	'IQ'=>array('name'=>'IRAQ','code'=>'964'),
	'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),
	'IS'=>array('name'=>'ICELAND','code'=>'354'),
	'IT'=>array('name'=>'ITALY','code'=>'39'),
	'JM'=>array('name'=>'JAMAICA','code'=>'1876'),
	'JO'=>array('name'=>'JORDAN','code'=>'962'),
	'JP'=>array('name'=>'JAPAN','code'=>'81'),
	'KE'=>array('name'=>'KENYA','code'=>'254'),
	'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),
	'KH'=>array('name'=>'CAMBODIA','code'=>'855'),
	'KI'=>array('name'=>'KIRIBATI','code'=>'686'),
	'KM'=>array('name'=>'COMOROS','code'=>'269'),
	'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),
	'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),
	'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),
	'KW'=>array('name'=>'KUWAIT','code'=>'965'),
	'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),
	'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),
	'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),
	'LB'=>array('name'=>'LEBANON','code'=>'961'),
	'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),
	'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),
	'LK'=>array('name'=>'SRI LANKA','code'=>'94'),
	'LR'=>array('name'=>'LIBERIA','code'=>'231'),
	'LS'=>array('name'=>'LESOTHO','code'=>'266'),
	'LT'=>array('name'=>'LITHUANIA','code'=>'370'),
	'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),
	'LV'=>array('name'=>'LATVIA','code'=>'371'),
	'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),
	'MA'=>array('name'=>'MOROCCO','code'=>'212'),
	'MC'=>array('name'=>'MONACO','code'=>'377'),
	'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),
	'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),
	'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),
	'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),
	'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),
	'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),
	'ML'=>array('name'=>'MALI','code'=>'223'),
	'MM'=>array('name'=>'MYANMAR','code'=>'95'),
	'MN'=>array('name'=>'MONGOLIA','code'=>'976'),
	'MO'=>array('name'=>'MACAU','code'=>'853'),
	'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),
	'MR'=>array('name'=>'MAURITANIA','code'=>'222'),
	'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),
	'MT'=>array('name'=>'MALTA','code'=>'356'),
	'MU'=>array('name'=>'MAURITIUS','code'=>'230'),
	'MV'=>array('name'=>'MALDIVES','code'=>'960'),
	'MW'=>array('name'=>'MALAWI','code'=>'265'),
	'MX'=>array('name'=>'MEXICO','code'=>'52'),
	'MY'=>array('name'=>'MALAYSIA','code'=>'60'),
	'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),
	'NA'=>array('name'=>'NAMIBIA','code'=>'264'),
	'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),
	'NE'=>array('name'=>'NIGER','code'=>'227'),
	'NG'=>array('name'=>'NIGERIA','code'=>'234'),
	'NI'=>array('name'=>'NICARAGUA','code'=>'505'),
	'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),
	'NO'=>array('name'=>'NORWAY','code'=>'47'),
	'NP'=>array('name'=>'NEPAL','code'=>'977'),
	'NR'=>array('name'=>'NAURU','code'=>'674'),
	'NU'=>array('name'=>'NIUE','code'=>'683'),
	'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),
	'OM'=>array('name'=>'OMAN','code'=>'968'),
	'PA'=>array('name'=>'PANAMA','code'=>'507'),
	'PE'=>array('name'=>'PERU','code'=>'51'),
	'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),
	'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),
	'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),
	'PK'=>array('name'=>'PAKISTAN','code'=>'92'),
	'PL'=>array('name'=>'POLAND','code'=>'48'),
	'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),
	'PN'=>array('name'=>'PITCAIRN','code'=>'870'),
	'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),
	'PT'=>array('name'=>'PORTUGAL','code'=>'351'),
	'PW'=>array('name'=>'PALAU','code'=>'680'),
	'PY'=>array('name'=>'PARAGUAY','code'=>'595'),
	'QA'=>array('name'=>'QATAR','code'=>'974'),
	'RO'=>array('name'=>'ROMANIA','code'=>'40'),
	'RS'=>array('name'=>'SERBIA','code'=>'381'),
	'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),
	'RW'=>array('name'=>'RWANDA','code'=>'250'),
	'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),
	'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),
	'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),
	'SD'=>array('name'=>'SUDAN','code'=>'249'),
	'SE'=>array('name'=>'SWEDEN','code'=>'46'),
	'SG'=>array('name'=>'SINGAPORE','code'=>'65'),
	'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),
	'SI'=>array('name'=>'SLOVENIA','code'=>'386'),
	'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),
	'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),
	'SM'=>array('name'=>'SAN MARINO','code'=>'378'),
	'SN'=>array('name'=>'SENEGAL','code'=>'221'),
	'SO'=>array('name'=>'SOMALIA','code'=>'252'),
	'SR'=>array('name'=>'SURINAME','code'=>'597'),
	'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),
	'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),
	'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),
	'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),
	'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),
	'TD'=>array('name'=>'CHAD','code'=>'235'),
	'TG'=>array('name'=>'TOGO','code'=>'228'),
	'TH'=>array('name'=>'THAILAND','code'=>'66'),
	'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),
	'TK'=>array('name'=>'TOKELAU','code'=>'690'),
	'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),
	'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),
	'TN'=>array('name'=>'TUNISIA','code'=>'216'),
	'TO'=>array('name'=>'TONGA','code'=>'676'),
	'TR'=>array('name'=>'TURKEY','code'=>'90'),
	'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),
	'TV'=>array('name'=>'TUVALU','code'=>'688'),
	'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),
	'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),
	'UA'=>array('name'=>'UKRAINE','code'=>'380'),
	'UG'=>array('name'=>'UGANDA','code'=>'256'),
	'US'=>array('name'=>'UNITED STATES','code'=>'1'),
	'UY'=>array('name'=>'URUGUAY','code'=>'598'),
	'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),
	'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),
	'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),
	'VE'=>array('name'=>'VENEZUELA','code'=>'58'),
	'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),
	'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),
	'VN'=>array('name'=>'VIET NAM','code'=>'84'),
	'VU'=>array('name'=>'VANUATU','code'=>'678'),
	'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),
	'WS'=>array('name'=>'SAMOA','code'=>'685'),
	'XK'=>array('name'=>'KOSOVO','code'=>'381'),
	'YE'=>array('name'=>'YEMEN','code'=>'967'),
	'YT'=>array('name'=>'MAYOTTE','code'=>'262'),
	'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),
	'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),
	'ZW'=>array('name'=>'ZIMBABWE','code'=>'263')
);

$allBankListArr = [
    "ABHYUDAYA CO-OP BANK LTD",
    "ABU DHABI COMMERCIAL BANK",
    "AKOLA DISTRICT CENTRAL CO-OPERATIVE BANK",
    "AKOLA JANATA COMMERCIAL COOPERATIVE BANK",
    "ALLAHABAD BANK",
    "ALMORA URBAN CO-OPERATIVE BANK LTD.",
    "ANDHRA BANK",
    "ANDHRA PRAGATHI GRAMEENA BANK",
    "APNA SAHAKARI BANK LTD",
    "AUSTRALIA AND NEW ZEALAND BANKING GROUP LIMITED.",
    "AXIS BANK",
    "BANK INTERNASIONAL INDONESIA",
    "BANK OF AMERICA",
    "BANK OF BAHRAIN AND KUWAIT",
    "BANK OF BARODA",
    "BANK OF CEYLON",
    "BANK OF INDIA",
    "BANK OF MAHARASHTRA",
    "BANK OF TOKYO-MITSUBISHI UFJ LTD.",
    "BARCLAYS BANK PLC",
    "BASSEIN CATHOLIC CO-OP BANK LTD",
    "BHARATIYA MAHILA BANK LIMITED",
    "BNP PARIBAS",
    "CALYON BANK",
    "CANARA BANK",
    "CAPITAL LOCAL AREA BANK LTD.",
    "CATHOLIC SYRIAN BANK LTD.",
    "CENTRAL BANK OF INDIA",
    "CHINATRUST COMMERCIAL BANK",
    "CITIBANK NA",
    "CITIZENCREDIT CO-OPERATIVE BANK LTD",
    "CITY UNION BANK LTD",
    "COMMONWEALTH BANK OF AUSTRALIA",
    "CORPORATION BANK",
    "CREDIT SUISSE AG",
    "DBS BANK LTD",
    "DENA BANK",
    "DEUTSCHE BANK",
    "DEUTSCHE SECURITIES INDIA PRIVATE LIMITED",
    "DEVELOPMENT CREDIT BANK LIMITED",
    "DHANLAXMI BANK LTD",
    "DICGC",
    "DOMBIVLI NAGARI SAHAKARI BANK LIMITED",
	"Equitas Small Finance Bank",
    "FIRSTRAND BANK LIMITED",
    "GOPINATH PATIL PARSIK JANATA SAHAKARI BANK LTD",
    "GURGAON GRAMIN BANK",
    "HDFC BANK LTD",
    "HSBC",
    "ICICI BANK LTD",
    "IDBI BANK LTD",
    "IDRBT",
    "INDIAN BANK",
    "INDIAN OVERSEAS BANK",
    "INDUSIND BANK LTD",
    "INDUSTRIAL AND COMMERCIAL BANK OF CHINA LIMITED",
    "ING VYSYA BANK LTD",
    "JALGAON JANATA SAHKARI BANK LTD",
    "JANAKALYAN SAHAKARI BANK LTD",
    "JANASEVA SAHAKARI BANK (BORIVLI) LTD",
    "JANASEVA SAHAKARI BANK LTD. PUNE",
    "JANATA SAHAKARI BANK LTD (PUNE)",
    "JPMORGAN CHASE BANK N.A",
    "KALLAPPANNA AWADE ICH JANATA S BANK",
    "KAPOL CO OP BANK",
    "KARNATAKA BANK LTD",
    "KARNATAKA VIKAS GRAMEENA BANK",
    "KARUR VYSYA BANK",
    "KOTAK MAHINDRA BANK",
    "KURMANCHAL NAGAR SAHKARI BANK LTD",
    "MAHANAGAR CO-OP BANK LTD",
    "MAHARASHTRA STATE CO OPERATIVE BANK",
    "MASHREQBANK PSC",
    "MIZUHO CORPORATE BANK LTD",
    "MUMBAI DISTRICT CENTRAL CO-OP. BANK LTD.",
    "NAGPUR NAGRIK SAHAKARI BANK LTD",
    "NATIONAL AUSTRALIA BANK",
    "NEW INDIA CO-OPERATIVE BANK LTD.",
    "NKGSB CO-OP BANK LTD",
    "NORTH MALABAR GRAMIN BANK",
    "NUTAN NAGARIK SAHAKARI BANK LTD",
    "OMAN INTERNATIONAL BANK SAOG",
    "ORIENTAL BANK OF COMMERCE",
    "PARSIK JANATA SAHAKARI BANK LTD",
    "PRATHAMA BANK",
    "PRIME CO OPERATIVE BANK LTD",
    "PUNJAB AND MAHARASHTRA CO-OP BANK LTD.",
    "PUNJAB AND SIND BANK",
    "PUNJAB NATIONAL BANK",
    "RABOBANK INTERNATIONAL (CCRB)",
    "RAJGURUNAGAR SAHAKARI BANK LTD.",
    "RAJKOT NAGARIK SAHAKARI BANK LTD",
    "RESERVE BANK OF INDIA",
    "SBERBANK",
    "SHINHAN BANK",
    "SHRI CHHATRAPATI RAJARSHI SHAHU URBAN CO-OP BANK LTD",
    "SOCIETE GENERALE",
    "SOLAPUR JANATA SAHKARI BANK LTD.SOLAPUR",
    "SOUTH INDIAN BANK",
    "STANDARD CHARTERED BANK",
    "STATE BANK OF BIKANER AND JAIPUR",
    "STATE BANK OF HYDERABAD",
    "STATE BANK OF INDIA",
    "STATE BANK OF MAURITIUS LTD",
    "STATE BANK OF MYSORE",
    "STATE BANK OF PATIALA",
    "STATE BANK OF TRAVANCORE",
    "SUMITOMO MITSUI BANKING CORPORATION",
    "SYNDICATE BANK",
    "TAMILNAD MERCANTILE BANK LTD",
    "THANE BHARAT SAHAKARI BANK LTD",
    "THE A.P. MAHESH CO-OP URBAN BANK LTD.",
    "THE AHMEDABAD MERCANTILE CO-OPERATIVE BANK LTD.",
    "THE ANDHRA PRADESH STATE COOP BANK LTD",
    "THE BANK OF NOVA SCOTIA",
    "THE BANK OF RAJASTHAN LTD",
    "THE BHARAT CO-OPERATIVE BANK (MUMBAI) LTD",
    "THE COSMOS CO-OPERATIVE BANK LTD.",
    "THE DELHI STATE COOPERATIVE BANK LTD.",
    "THE FEDERAL BANK LTD",
    "THE GADCHIROLI DISTRICT CENTRAL COOPERATIVE BANK LTD",
    "THE GREATER BOMBAY CO-OP. BANK LTD",
    "THE GUJARAT STATE CO-OPERATIVE BANK LTD",
    "THE JALGAON PEOPLES CO-OP BANK",
    "THE JAMMU AND KASHMIR BANK LTD",
    "THE KALUPUR COMMERCIAL CO. OP. BANK LTD.",
    "THE KALYAN JANATA SAHAKARI BANK LTD.",
    "THE KANGRA CENTRAL CO-OPERATIVE BANK LTD",
    "THE KANGRA COOPERATIVE BANK LTD",
    "THE KARAD URBAN CO-OP BANK LTD",
    "THE KARNATAKA STATE APEX COOP. BANK LTD.",
    "THE LAKSHMI VILAS BANK LTD",
    "THE MEHSANA URBAN COOPERATIVE BANK LTD",
    "THE MUNICIPAL CO OPERATIVE BANK LTD MUMBAI",
    "THE NAINITAL BANK LIMITED",
    "THE NASIK MERCHANTS CO-OP BANK LTD. NASHIK",
    "THE RAJASTHAN STATE COOPERATIVE BANK LTD.",
    "THE RATNAKAR BANK LTD",
    "THE ROYAL BANK OF SCOTLAND N.V",
    "THE SAHEBRAO DESHMUKH CO-OP. BANK LTD.",
    "THE SARASWAT CO-OPERATIVE BANK LTD",
    "THE SEVA VIKAS CO-OPERATIVE BANK LTD (SVB)",
    "THE SHAMRAO VITHAL CO-OPERATIVE BANK LTD",
    "THE SURAT DISTRICT CO OPERATIVE BANK LTD.",
    "THE SURAT PEOPLES CO-OP BANK LTD",
    "THE SUTEX CO.OP. BANK LTD.",
    "THE TAMILNADU STATE APEX COOPERATIVE BANK LIMITED",
    "THE THANE DISTRICT CENTRAL CO-OP BANK LTD",
    "THE THANE JANATA SAHAKARI BANK LTD",
    "THE VARACHHA CO-OP. BANK LTD.",
    "THE VISHWESHWAR SAHAKARI BANK LTD. PUNE",
    "THE WEST BENGAL STATE COOPERATIVE BANK LTD",
    "TJSB SAHAKARI BANK LTD.",
    "TUMKUR GRAIN MERCHANTS COOPERATIVE BANK LTD.",
    "UBS AG",
    "UCO BANK",
    "UNION BANK OF INDIA",
    "UNITED BANK OF INDIA",
    "UNITED OVERSEAS BANK",
    "VASAI VIKAS SAHAKARI BANK LTD.",
    "VIJAYA BANK",
    "WEST BENGAL STATE COOPERATIVE BANK",
    "WESTPAC BANKING CORPORATION",
    "WOORI BANK",
    "YES BANK LTD",
    "ZILA SAHKARI BANK LTD GHAZIABAD",
    "IDFC First Bank",
	"OTHER BANK"
];

$emailReplacePhrase = array(
    '[USER_NAME]', '[USER_NAME2]', '[EMAIL_CONFIRMATION_OTP]', '[EMAIL_CONFIRMATION_LINK]', '[MT5_LOGIN]', '[MAIN_PASS]', '[INVESTOR_PASS]', '[PHONE_PASS]', '[MT5_PASS]', '[MT5_PASS_TYPE]', '[ST_CURR_AMOUNT]', '[SITE_NAME]', '[SITE_ADDRESS]', '[SITE_PHONE]', '[EMAIL_LINK1]', '[EMAIL_LINK2]', '[EMAIL_LINK3]', '[EMAIL_LINK4]', '[EMAIL_LINK5]', '[EMAIL_LINK6]', '[EMAIL_LINK7]', '[EMAIL_LINK8]'
);

$statusArr = array(
    'P' => 'Pending',
    'R' => 'Declined',
    'C' => 'Success'
);

$excludePageTypeArr = array();
$excludeDtlsArr = array();

//Defining Tables
//Core Table
define( "TBL_CONTENT",                      "tbl_content" );
define( "TBL_LOGIN_LOG",                    "tbl_login_log" );
define( "TBL_MODULE",                       "tbl_module" );
define( "TBL_PAGE",                         "tbl_page" );
define( "TBL_SITE",                         "tbl_site" );
define( "TBL_USER",                         "tbl_user" );
define( "TBL_IMAGE",						"tbl_link_image" );

define( "TBL_EMAIL_TEMPLATES",              "tbl_email_templates");
define( "TBL_SMTP",                         "tbl_email_smtp_configuration");
define( "TBL_EMAILERROR",                   "tbl_email_error");
define( "TBL_EMAILTOBESENT",                "tbl_email_tobesent");

//Defining Tables

//Defining Site Variable
define( "PEGINATION",                       "20" );
define( "ADMINPEGINATION",                  "20" );
define( "SHOWPEGINATION",                   "5" );
$monthArr = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");

$generalObj   = new general;
$siteData     = $generalObj -> getSiteData();

define( "SITE_NAME",                        $siteData['siteName'] );    
define( "SITE_INFO",                        $siteData['siteDescribtion'] );    
define( "SITE_LOGO",                        $MEDIA_FILES_SRC.'/content/thumb/'.$siteData['siteLogo'] );    
define( "SITE_LOGO_LARGE",                  $MEDIA_FILES_SRC.'/content/large/'.$siteData['siteLogo'] );    
define( "SITE_EMAIL",                       $siteData['siteEmail'] );    
define( "SITE_EMAIL2",                      $siteData['siteEmail2'] );    
define( "SITE_PHONE",                       $siteData['sitePhone'] );    
define( "SITE_PHONE2",                      $siteData['sitePhone2'] );    
define( "SITE_ADDRESS",                     $siteData['siteAddress'] );    
define( "SITE_ADDRESS2",                    $siteData['siteAddress2'] );    
define( "WORKING_HOURS",                    $siteData['workingHours'] );    
define( "SITE_FB",                          $siteData['fb'] );    
define( "SITE_GP",                          $siteData['gp'] );    
define( "SITE_TW",                          $siteData['tw'] );    
define( "SITE_LI",                          $siteData['li'] );    
define( "SITE_YT",                          $siteData['yt'] );    
define( "SITE_PT",                          $siteData['pt'] ); 
define( "SITE_RW",                          $siteData['riskWarning'] ); 
define( "SITE_LD",                          $siteData['legalDeclaration'] ); 
define( "SITE_CNT1",                        $siteData['activeTraders'] ); 
define( "SITE_CNT2",                        $siteData['expertAdvisors'] ); 
define( "SITE_CNT3",                        $siteData['awardsWinning'] ); 
define( "SITE_CNT4",                        $siteData['yearsOfExcellence'] ); 
define( "SITE_HOME_SECTION_ARR",            $siteData['bottomContent'] );
define( "WDTH_ASSIST_AMNT",             	$siteData['wdthAssistAmnt'] );
define( "WDTH_ASSIST_MOOD",             	$siteData['wdthAssistMood'] );
define( "DPST_ASSIST_AMNT",             	$siteData['dpstAssistAmnt'] );
define( "DPST_ASSIST_MOOD",             	$siteData['dpstAssistMood'] );
define( "NO_IMAGE",							$STYLE_FILES_SRC.'/images/no-pictures.png');

define( "SITE_CURRENCY_SYMBOL",             '&#8364;' );
define( "WALLET_CURRENCY",                  'EUR' );

define( "COPYRIGHT",                        'Copyright © '.date('Y').' by <a href="#">'.SITE_NAME.'</a>.' );


$smtpConfig = $generalObj -> getSMTPconfiguration();
define( "SMTP_HOST",             $smtpConfig['smtpHost'] );
define( "SMTP_PORT",             $smtpConfig['smtpPort'] );
define( "SMTP_SECURE",           $smtpConfig['smtpSecure'] );
define( "SMTP_USER",             $smtpConfig['smtpUsername'] );
define( "SMTP_PASSWORD",         $smtpConfig['smtpPassword'] );
define( "SMTP_FROMNAME",         $smtpConfig['smtpFromName'] );
define( "SMTP_FROMEMAIL",        $smtpConfig['smtpFromEmail'] );
define( "SMTP_REPLYNAME",        $smtpConfig['smtpReplyName'] );
define( "SMTP_REPLYEMAIL",       $smtpConfig['smtpReplyEmail'] );
//Defining Site Variable

$currency_symbols = array(
	'AED' => '&#1583;.&#1573;', // ?
	'AFN' => '&#65;&#102;',
	'ALL' => '&#76;&#101;&#107;',
	'AMD' => '',
	'ANG' => '&#402;',
	'AOA' => '&#75;&#122;', // ?
	'ARS' => '&#36;',
	'AUD' => '&#36;',
	'AWG' => '&#402;',
	'AZN' => '&#1084;&#1072;&#1085;',
	'BAM' => '&#75;&#77;',
	'BBD' => '&#36;',
	'BDT' => '&#2547;', // ?
	'BGN' => '&#1083;&#1074;',
	'BHD' => '.&#1583;.&#1576;', // ?
	'BIF' => '&#70;&#66;&#117;', // ?
	'BMD' => '&#36;',
	'BND' => '&#36;',
	'BOB' => '&#36;&#98;',
	'BRL' => '&#82;&#36;',
	'BSD' => '&#36;',
	'BTN' => '&#78;&#117;&#46;', // ?
	'BWP' => '&#80;',
	'BYR' => '&#112;&#46;',
	'BZD' => '&#66;&#90;&#36;',
	'CAD' => '&#36;',
	'CDF' => '&#70;&#67;',
	'CHF' => '&#67;&#72;&#70;',
	'CLF' => '', // ?
	'CLP' => '&#36;',
	'CNY' => '&#165;',
	'COP' => '&#36;',
	'CRC' => '&#8353;',
	'CUP' => '&#8396;',
	'CVE' => '&#36;', // ?
	'CZK' => '&#75;&#269;',
	'DJF' => '&#70;&#100;&#106;', // ?
	'DKK' => '&#107;&#114;',
	'DOP' => '&#82;&#68;&#36;',
	'DZD' => '&#1583;&#1580;', // ?
	'EGP' => '&#163;',
	'ETB' => '&#66;&#114;',
	'EUR' => '&#8364;',
	'FJD' => '&#36;',
	'FKP' => '&#163;',
	'GBP' => '&#163;',
	'GEL' => '&#4314;', // ?
	'GHS' => '&#162;',
	'GIP' => '&#163;',
	'GMD' => '&#68;', // ?
	'GNF' => '&#70;&#71;', // ?
	'GTQ' => '&#81;',
	'GYD' => '&#36;',
	'HKD' => '&#36;',
	'HNL' => '&#76;',
	'HRK' => '&#107;&#110;',
	'HTG' => '&#71;', // ?
	'HUF' => '&#70;&#116;',
	'IDR' => '&#82;&#112;',
	'ILS' => '&#8362;',
	'INR' => '&#8377;',
	'IQD' => '&#1593;.&#1583;', // ?
	'IRR' => '&#65020;',
	'ISK' => '&#107;&#114;',
	'JEP' => '&#163;',
	'JMD' => '&#74;&#36;',
	'JOD' => '&#74;&#68;', // ?
	'JPY' => '&#165;',
	'KES' => '&#75;&#83;&#104;', // ?
	'KGS' => '&#1083;&#1074;',
	'KHR' => '&#6107;',
	'KMF' => '&#67;&#70;', // ?
	'KPW' => '&#8361;',
	'KRW' => '&#8361;',
	'KWD' => '&#1583;.&#1603;', // ?
	'KYD' => '&#36;',
	'KZT' => '&#1083;&#1074;',
	'LAK' => '&#8365;',
	'LBP' => '&#163;',
	'LKR' => '&#8360;',
	'LRD' => '&#36;',
	'LSL' => '&#76;', // ?
	'LTL' => '&#76;&#116;',
	'LVL' => '&#76;&#115;',
	'LYD' => '&#1604;.&#1583;', // ?
	'MAD' => '&#1583;.&#1605;.', //?
	'MDL' => '&#76;',
	'MGA' => '&#65;&#114;', // ?
	'MKD' => '&#1076;&#1077;&#1085;',
	'MMK' => '&#75;',
	'MNT' => '&#8366;',
	'MOP' => '&#77;&#79;&#80;&#36;', // ?
	'MRO' => '&#85;&#77;', // ?
	'MUR' => '&#8360;', // ?
	'MVR' => '.&#1923;', // ?
	'MWK' => '&#77;&#75;',
	'MXN' => '&#36;',
	'MYR' => '&#82;&#77;',
	'MZN' => '&#77;&#84;',
	'NAD' => '&#36;',
	'NGN' => '&#8358;',
	'NIO' => '&#67;&#36;',
	'NOK' => '&#107;&#114;',
	'NPR' => '&#8360;',
	'NZD' => '&#36;',
	'OMR' => '&#65020;',
	'PAB' => '&#66;&#47;&#46;',
	'PEN' => '&#83;&#47;&#46;',
	'PGK' => '&#75;', // ?
	'PHP' => '&#8369;',
	'PKR' => '&#8360;',
	'PLN' => '&#122;&#322;',
	'PYG' => '&#71;&#115;',
	'QAR' => '&#65020;',
	'RON' => '&#108;&#101;&#105;',
	'RSD' => '&#1044;&#1080;&#1085;&#46;',
	'RUB' => '&#1088;&#1091;&#1073;',
	'RWF' => '&#1585;.&#1587;',
	'SAR' => '&#65020;',
	'SBD' => '&#36;',
	'SCR' => '&#8360;',
	'SDG' => '&#163;', // ?
	'SEK' => '&#107;&#114;',
	'SGD' => '&#36;',
	'SHP' => '&#163;',
	'SLL' => '&#76;&#101;', // ?
	'SOS' => '&#83;',
	'SRD' => '&#36;',
	'STD' => '&#68;&#98;', // ?
	'SVC' => '&#36;',
	'SYP' => '&#163;',
	'SZL' => '&#76;', // ?
	'THB' => '&#3647;',
	'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
	'TMT' => '&#109;',
	'TND' => '&#1583;.&#1578;',
	'TOP' => '&#84;&#36;',
	'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
	'TTD' => '&#36;',
	'TWD' => '&#78;&#84;&#36;',
	'TZS' => '',
	'UAH' => '&#8372;',
	'UGX' => '&#85;&#83;&#104;',
	'USD' => '$',  //&#36;
	'UYU' => '&#36;&#85;',
	'UZS' => '&#1083;&#1074;',
	'VEF' => '&#66;&#115;',
	'VND' => '&#8363;',
	'VUV' => '&#86;&#84;',
	'WST' => '&#87;&#83;&#36;',
	'XAF' => '&#70;&#67;&#70;&#65;',
	'XCD' => '&#36;',
	'XDR' => '',
	'XOF' => '',
	'XPF' => '&#70;',
	'YER' => '&#65020;',
	'ZAR' => '&#82;',
	'ZMK' => '&#90;&#75;', // ?
	'ZWL' => '&#90;&#36;',
);
define('CURRENCY_SYMBOLS',$currency_symbols);