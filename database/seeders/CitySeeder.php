<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $andhraPradeshStateId = 1; // Assuming the state_id for Andhra Pradesh is 1

        $citiesAndhraPradesh = [
            'Vijayawada', 'Visakhapatnam', 'Guntur', 'Nellore', 'Kurnool', 'Rajahmundry', 'Tirupati',
            'Kakinada', 'Kadapa', 'Anantapur', 'Vizianagaram', 'Tenali', 'Proddatur', 'Eluru', 'Chittoor',
            'Ongole', 'Nandyal', 'Machilipatnam', 'Adoni', 'Tenkasi', 'Srikakulam', 'Hindupur', 'Bhimavaram',
            'Madanapalle', 'Guntakal', 'Dharmavaram', 'Gudivada', 'Narasaraopet', 'Tadipatri', 'Tadepalligudem',
            'Chilakaluripet', 'Kavali', 'Srikalahasti', 'Ponnur', 'Palacole', 'Yemmiganur', 'Markapur', 'Adilabad',
            'Tuni', 'Chirala', 'Amalapuram', 'Jaggaiahpet', 'Tenali', 'Bapatla', 'Narasapuram', 'Repalle', 'Tanuku',
            'Kadiri', 'Rayachoti', 'Palakollu', 'Sangareddy', 'Parvathipuram', 'Bobbili', 'Mandapeta', 'Macherla',
            'Gudur', 'Venkatagiri', 'Pithapuram', 'Jammalamadugu', 'Kanigiri', 'Nagari', 'Vinukonda', 'Tadepalle',
            'Bellampalle', 'Kovvur', 'Sadasivpet', 'Gadwal', 'Jangaon', 'Koratla', 'Tandur', 'Kothagudem',
            'Kyathampalle', 'Palwancha', 'Ramagundam', 'Siddipet', 'Kagaznagar', 'Ramachandrapuram', 'Mandamarri',
            'Mandapeta', 'Nirmal', 'Bhainsa', 'Palwancha', 'Manuguru', 'Bellampalli', 'Bhadrachalam', 'Kothagudem',
            'Mangalagiri', 'Gannavaram', 'Chirala', 'Puttur', 'Narayanpet', 'Wanaparthy', 'Khammam', 'Bhongir',
            'Suryapet', 'Kodad', 'Jangaon', 'Miryalaguda', 'Bhadrachalam', 'Mancherial', 'Jagtial', 'Kyathampalle',
            'Kagaznagar', 'Ramachandrapuram', 'Mandamarri', 'Bhongir', 'Suryapet', 'Kodad', 'Jangaon', 'Miryalaguda',
            'Narayanpet', 'Wanaparthy', 'Kothagudem', 'Miryalaguda', 'Bhadrachalam', 'Mancherial', 'Jagtial',
            'Bhongir', 'Suryapet', 'Kodad', 'Jangaon', 'Miryalaguda', 'Bhadrachalam', 'Mancherial', 'Jagtial'
        ];

        foreach ($citiesAndhraPradesh as $cityName) {
            City::create([
                'state_id' => $andhraPradeshStateId,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Arunachal Pradesh
        $arunachalPradeshStateId = 2;

        $citiesArunachalPradesh = [
            'Itanagar', 'Naharlagun', 'Pasighat', 'Roing', 'Tezu', 'Ziro', 'Along', 'Bomdila', 'Daporijo', 'Seppa',
            'Tawang', 'Yingkiong', 'Changlang', 'Khonsa', 'Anini', 'Longding', 'Bordumsa', 'Mechuka', 'Nampong',
            'Namsai', 'Vijoynagar', 'Miao', 'Dambuk', 'Nacho', 'Rupa', 'Hawai', 'Dumporijo', 'Hayuliang', 'Jairampur',
            'Kalaktang', 'Kanubari', 'Kaying', 'Khirmu', 'Kibithoo', 'Manmao', 'Mariyang', 'Mechuka', 'Meka',
            'Menchuka', 'Mipi', 'Monigong', 'Nacho', 'Namtok', 'New Mohang', 'Nijong', 'Pasighat', 'Pongchau',
            'Raga', 'Rangfrah', 'Rebo Perging', 'Rego', 'Reying', 'Roing', 'Rupa', 'Sangram', 'Sarli', 'Shi Yomi',
            'Siang', 'Sibe', 'Sikarijo', 'Simen Chapori', 'Siom', 'Sootea', 'Sunpura', 'Tali', 'Taliha', 'Tato',
            'Tezu', 'Tenga', 'Tirap', 'Vijaynagar', 'Wakka', 'Walatang', 'Yachuli', 'Yingkiong', 'Yomcha', 'Zemithang',
        ];

        foreach ($citiesArunachalPradesh as $cityName) {
            City::create([
                'state_id' => $arunachalPradeshStateId,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }


        // Assam
        $assamStateId = 3;

        $citiesAssam = [
            'Guwahati', 'Silchar', 'Dibrugarh', 'Jorhat', 'Nagaon', 'Tezpur', 'Tinsukia', 'Barpeta', 'Bongaigaon',
            'Dhubri', 'Goalpara', 'Hailakandi', 'Karimganj', 'Kokrajhar', 'Sibsagar', 'Diphu', 'Nalbari', 'North Lakhimpur',
            'Morigaon', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Diphu', 'Goalpara', 'Golaghat', 'Hailakandi', 'Jorhat', 'Kamrup',
            'Karbi Anglong', 'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Morigaon', 'Nagaon', 'Nalbari', 'North Cachar Hills',
            'Sibsagar', 'Silchar', 'Sonitpur', 'Tinsukia', 'Udalguri'
        ];

        foreach ($citiesAssam as $cityName) {
            City::create([
                'state_id' => $assamStateId,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Bihar
        $biharStateId = 4;

        $citiesBihar = [
            'Patna', 'Gaya', 'Bhagalpur', 'Muzaffarpur', 'Darbhanga', 'Arrah', 'Bihar Sharif', 'Purnia', 'Sitamarhi',
            'Chhapra', 'Bettiah', 'Motihari', 'Saharsa', 'Begusarai', 'Katihar', 'Munger', 'Danapur', 'Sasaram',
            'Hajipur', 'Dehri', 'Siwan', 'Vaishali', 'Purnia', 'Buxar', 'Kishanganj', 'Jamalpur', 'Aurangabad',
            'Munger', 'Chapra', 'Danapur', 'Dehri', 'Dinapur Nizamat', 'Hajipur', 'Motihari', 'Muzaffarpur', 'Patna',
            'Purnia', 'Puruliya', 'Samastipur', 'Siwan', 'Chandpur', 'Dhaka', 'Faridpur', 'Hossainpur', 'Khulna',
            'Rangpur', 'Sylhet', 'Barisal', 'Bogra', 'Comilla', 'Jessore', 'Mymensingh', 'Narayanganj', 'Pabna',
            'Rajshahi', 'Tangail', 'Brahmanbaria', 'Jamalpur', 'Nawabganj', 'Saidpur', 'Sirajganj', 'Bhairab Bazar',
            'Shahzadpur', 'Netrakona', 'Baniachang', 'Bheramara', 'Kalia', 'Kishorganj', 'Lalmohan', 'Mirzapur',
            'Ramganj', 'Sarankhola', 'Shibganj', 'Teknaf', 'Alipurduar', 'Arambagh', 'Asansol', 'Ashoknagar Kalyangarh',
            'Baharampur', 'Baidyabati', 'Baj Baj', 'Bakreswar', 'Balurghat', 'Bankura', 'Bardhaman', 'Barrackpur',
            'Baruipur', 'Basirhat', 'Bhadreswar', 'Bhatpara', 'Bidhannagar', 'Chakdaha', 'Champdani', 'Chandannagar',
            'Contai', 'Cooch Behar', 'Dankuni', 'Dhulian', 'Dinhata', 'Durgapur', 'Gangarampur', 'Gobardanga',
            'Habra', 'Haldia', 'Haldibari', 'Halisahar', 'Howrah', 'Islampur', 'Jabalpur', 'Jadavpur', 'Jagadanandapur',
            'Jalpaiguri', 'Jamuria', 'Jangipur', 'Jhargram', 'Kakdwip', 'Kalyani', 'Kanchrapara', 'Kandi', 'Karsiyang',
            'Katwa', 'Kharagpur', 'Kolkata', 'Krishnanagar', 'Kulti', 'Mainaguri', 'Mal', 'Mathabhanga', 'Medinipur',
            'Memari', 'Monoharpur', 'Murshidabad', 'Nabadwip', 'Naihati', 'Panchla', 'Pandua', 'Panihati', 'Panskura',
            'Parulia', 'Paschim Punropara', 'Puruliya', 'Raghunathpur', 'Raiganj', 'Rampurhat', 'Ranaghat', 'Raniganj',
            'Rishra', 'Saltora', 'Santipur', 'Santoshpur', 'Serampore', 'Shyamnagar', 'Suri', 'Taki', 'Tamluk',
            'Tarakeswar', 'Titagarh', 'Tufanganj', 'Udaynarayanpur', 'Uluberia', 'Uttarpara', 'Belsand', 'Marhaura',
            'Narkatiaganj', 'Padrauna', 'Ramnagar', 'Raxaul', 'Revelganj', 'Sagauli', 'Siwan', 'Barauli', 'Bettiah',
            'Buxar', 'Chhapra', 'Danapur', 'Dighwara', 'Dinapur Nizamat', 'Gaya', 'Hajipur', 'Jahanabad', 'Jamalpur',
            'Katihar', 'Lakhisarai', 'Motihari', 'Munger', 'Muzaffarpur', 'Patna', 'Purnia', 'Rafiganj', 'Rajgir',
            'Ramnagar', 'Raxaul', 'Rosera', 'Sasaram', 'Sitamarhi', 'Siwan', 'Supaul', 'Teghra', 'Warisaliganj'
        ];

        foreach ($citiesBihar as $cityName) {
            City::create([
                'state_id' => $biharStateId,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        $chhattisgarhStateId = 5;

        $citiesChhattisgarh = [
            'Raipur', 'Bhilai', 'Durg', 'Bilaspur', 'Korba', 'Raigarh', 'Rajnandgaon', 'Jagdalpur', 'Ambikapur', 'Chirmiri',
            'Dhamtari', 'Janjgir', 'Kanker', 'Kawardha', 'Mahasamund', 'Mungeli', 'Naila Janjgir', 'Raigarh', 'Ramanuj Ganj',
            'Sakti', 'Champa', 'Pithora', 'Bhatapara', 'Baloda Bazar', 'Tilda', 'Birgaon', 'Kumhari', 'Arang', 'Basna',
            'Simga', 'Dhamtari', 'Kanker', 'Balod', 'Bemetera', 'Dondi Luhara', 'Gunderdehi', 'Kasdol', 'Nagari', 'Nawagarh',
            'Tilda', 'Chandrapur', 'Khairagarh', 'Dongargarh', 'Khujji', 'Rajnandgaon', 'Ambagarh Chowki', 'Chhura', 'Gharghoda',
            'Sarangarh', 'Baikunthpur', 'Manendragarh', 'Chirmiri', 'Akaltara', 'Bilaspur', 'Takhatpur', 'Baloda', 'Bemetara',
            'Berla', 'Bhatapara', 'Bilaigarh', 'Birgaon', 'Champa', 'Deori', 'Fingeshwar', 'Gaurela', 'Janjgir', 'Jashpurnagar',
            'Kasdol', 'Katghora', 'Kawardha', 'Khadganva', 'Korba', 'Kota', 'Lingiyadih', 'Mungeli', 'Naila Janjgir', 'Pamgarh',
            'Pendra', 'Raigarh', 'Raipur', 'Ramanuj Ganj', 'Ratanpur', 'Sarangarh', 'Simga', 'Sitapur', 'Takhatpur', 'Tilda',
            'Akaltara', 'Bhatapara', 'Bilaigarh', 'Birgaon', 'Champa', 'Janjgir', 'Kawardha', 'Korba', 'Pendra', 'Takhatpur',
            'Baloda', 'Bemetara', 'Bilaigarh', 'Birgaon', 'Champa', 'Deori', 'Gaurela', 'Katghora', 'Kawardha', 'Korba',
            'Pendra', 'Sarangarh', 'Takhatpur', 'Baloda', 'Bemetara', 'Berla', 'Bhatapara', 'Bilaigarh', 'Birgaon', 'Champa',
            'Deori', 'Fingeshwar', 'Gaurela', 'Janjgir', 'Jashpurnagar', 'Kasdol', 'Katghora', 'Kawardha', 'Khadganva', 'Korba',
            'Kota', 'Lingiyadih', 'Mungeli', 'Naila Janjgir', 'Pamgarh', 'Pendra', 'Raigarh', 'Raipur', 'Ramanuj Ganj', 'Ratanpur',
            'Sarangarh', 'Simga', 'Sitapur', 'Takhatpur', 'Tilda', 'Ambagarh Chowki', 'Chandrapur', 'Khairagarh', 'Dongargarh',
            'Khujji', 'Rajnandgaon'
        ];

        foreach ($citiesChhattisgarh as $cityName) {
            City::create([
                'state_id' => $chhattisgarhStateId,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Goa
        $goaStateId = State::where('name', 'Goa')->first()->id;

        $citiesGoa = [
            'Panaji', 'Margao', 'Vasco da Gama', 'Mapusa', 'Ponda', 'Bicholim', 'Curchorem', 'Sanquelim', 'Cuncolim',
            'Valpoi', 'Cortalim', 'Marmagao', 'Quepem', 'Sanguem', 'Calangute', 'Dabolim', 'Pernem', 'Bardez', 'Tiswadi',
            'Sattari', 'Salcete', 'Sanguem', 'Mormugao', 'Canacona', 'Bicholim', 'Curchorem', 'Sanquelim', 'Cuncolim',
            'Valpoi', 'Cortalim', 'Marmagao', 'Quepem', 'Sanguem', 'Calangute', 'Dabolim', 'Pernem', 'Bardez', 'Tiswadi',
            'Sattari', 'Salcete', 'Sanguem', 'Mormugao', 'Canacona'
        ];

        foreach ($citiesGoa as $cityName) {
            City::create([
                'state_id' => $goaStateId,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Gujarat
        $stateId = State::where('name', 'Gujarat')->first()->id;
        $citiesGujarat = [
            'Ahmedabad',
            'Surat',
            'Vadodara',
            'Rajkot',
            'Bhavnagar',
            'Jamnagar',
            'Junagadh',
            'Anand',
            'Nadiad',
            'Gandhinagar',
            'Bharuch',
            'Surendranagar',
            'Navsari',
            'Valsad',
            'Morbi',
            'Mehsana',
            'Porbandar',
            'Godhra',
            'Patan',
            'Veraval',
            'Botad',
            'Keshod',
            'Ankleshwar',
            'Palitana',
            'Dahod',
            'Amreli',
            'Bhuj',
            'Kalol',
            'Deesa',
            'Vapi',
            'Silvassa',
            'Navagadh',
            'Khambhat',
            'Lunavada',
        ];

        foreach ($citiesGujarat as $cityName) {
            City::create([
                'state_id' => $stateId,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        $stateIdHaryana = State::where('name', 'Haryana')->first()->id;

        $citiesHaryana = [
            'Ambala',
            'Bhiwani',
            'Charkhi Dadri',
            'Faridabad',
            'Fatehabad',
            'Gurugram',
            'Hisar',
            'Jhajjar',
            'Jind',
            'Kaithal',
            'Karnal',
            'Kurukshetra',
            'Mahendragarh',
            'Nuh',
            'Palwal',
            'Panchkula',
            'Panipat',
            'Rewari',
            'Rohtak',
            'Sirsa',
            'Sonipat',
            'Yamunanagar',
        ];

        foreach ($citiesHaryana as $cityName) {
            City::create([
                'state_id' => $stateIdHaryana,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        $stateIdHimachalPradesh = State::where('name', 'Himachal Pradesh')->first()->id;

        $citiesHimachalPradesh = [
            'Shimla',
            'Mandi',
            'Dharamshala',
            'Solan',
            'Palampur',
            'Kullu',
            'Chamba',
            'Bilaspur',
            'Hamirpur',
            'Una',
            'Sirmaur',
            'Nahan',
            'Paonta Sahib',
            'Kangra',
            'Nurpur',
            'Mcleodganj',
        ];

        foreach ($citiesHimachalPradesh as $cityName) {
            City::create([
                'state_id' => $stateIdHimachalPradesh,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        $stateIdJharkhand = State::where('name','Jharkhand')->first()->id;

        $citiesJharkhand = [
            'Ranchi',
            'Jamshedpur',
            'Dhanbad',
            'Bokaro',
            'Hazaribagh',
            'Deoghar',
            'Giridih',
            'Ramgarh',
            'Medininagar (Daltonganj)',
            'Chirkunda',
            'Phusro',
            'Jhumri Tilaiya',
            'Sahibganj',
            'Bokaro Steel City',
            'Chaibasa',
            'Gumia',
            'Gumla',
            'Jamtara',
            'Khunti',
            'Lohardaga',
            'Madhupur',
            'Pakaur',
            'Patratu',
            'Saunda',
            'Simdega',
            'Tenu dam-cum-Kathhara',
            'Chakradharpur',
            'Chatra',
            'Daltonganj',
            'Dumka',
            'Hussainabad',
            'Maithon',
            'Medininagar',
            'Mihijam',
            'Musabani',
        ];

        foreach ($citiesJharkhand as $cityName) {
            City::create([
                'state_id' => $stateIdJharkhand,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Karnataka
        $stateIdKarnataka = State::where('name', 'Karnataka')->first()->id;

        $citiesKarnataka = [
            'Bagalkot',
            'Ballari (Bellary)',
            'Belagavi (Belgaum)',
            'Bengaluru (Bangalore)',
            'Bidar',
            'Chamarajanagar',
            'Chikkaballapur',
            'Chikkamagaluru (Chikmagalur)',
            'Chitradurga',
            'Davanagere',
            'Dharwad',
            'Gadag',
            'Gulbarga (Kalaburagi)',
            'Hassan',
            'Haveri',
            'Kodagu (Coorg)',
            'Kolar',
            'Koppal',
            'Mandya',
            'Mysuru (Mysore)',
            'Raichur',
            'Ramanagara',
            'Shivamogga (Shimoga)',
            'Tumakuru (Tumkur)',
            'Udupi',
            'Uttara Kannada (Karwar)',
            'Vijayapura (Bijapur)',
            'Yadgir',
        ];

        foreach ($citiesKarnataka as $cityName) {
            City::create([
                'state_id' => $stateIdKarnataka,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Karnataka
        $stateIdKerala = State::where('name', 'Kerala')->first()->id;

        $citiesKerala = [
            'Thiruvananthapuram',
            'Kochi (Cochin)',
            'Kozhikode',
            'Kollam',
            'Thrissur',
            'Alappuzha',
            'Palakkad',
            'Kottayam',
            'Malappuram',
            'Kannur',
            'Pathanamthitta',
            'Idukki',
            'Kasaragod',
            'Ernakulam',
            'Aluva',
            'Mavelikara',
            'Adoor',
            'Changanassery',
            'Thodupuzha',
            'Pala',
            'Perinthalmanna',
            'Manjeri',
            'Nilambur',
            'Payyanur',
            'Kanhangad',
            'Palai',
            'Ponnani',
            'Koyilandy',
            'Vatakara',
            'Tirur',
            'Neyyattinkara',
            'Kottarakkara',
            'Nedumangad',
        ];


        foreach ($citiesKerala as $cityName) {
            City::create([
                'state_id' => $stateIdKerala,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Madhya Pradesh
        $stateIdMadhyaPradesh = State::where('name', 'Madhya Pradesh')->first()->id;

        $citiesMadhyaPradesh = [
            'Bhopal',
            'Indore',
            'Jabalpur',
            'Gwalior',
            'Ujjain',
            'Sagar',
            'Dewas',
            'Satna',
            'Ratlam',
            'Rewa',
            'Katni',
            'Singrauli',
            'Burhanpur',
            'Khandwa',
            'Morena',
            'Bhind',
            'Chhindwara',
            'Guna',
            'Shivpuri',
            'Vidisha',
            'Damoh',
            'Mandsaur',
            'Khargone',
            'Neemuch',
            'Pithampur',
            'Itarsi',
            'Sehore',
            'Betul',
            'Seoni',
            'Datia',
            'Nagda',
            'Harda',
            'Hoshangabad',
            'Balaghat',
            'Ashoknagar',
            'Shajapur',
            'Raisen',
            'Barwani',
            'Dhar',
            'Rajgarh',
            'Anuppur',
            'Chhatarpur',
            'Sidhi',
            'Jhabua',
            'Agar Malwa',
            'Dindori',
        ];

        foreach ($citiesMadhyaPradesh as $cityName) {
            City::create([
                'state_id' => $stateIdMadhyaPradesh,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Maharashtra
        $stateIdMaharashtra = State::where('name', 'Maharashtra')->first()->id;

        $citiesMaharashtra = [
            'Mumbai',
            'Pune',
            'Nagpur',
            'Thane',
            'Nashik',
            'Kalyan-Dombivli',
            'Vasai-Virar',
            'Aurangabad',
            'Navi Mumbai',
            'Solapur',
            'Mira-Bhayandar',
            'Amravati',
            'Nanded',
            'Kolhapur',
            'Akola',
            'Sangli',
            'Latur',
            'Jalgaon',
            'Malegaon',
            'Dhule',
            'Ahmednagar',
            'Ichalkaranji',
            'Chandrapur',
            'Parbhani',
            'Jalna',
            'Bhusawal',
            'Panvel',
            'Satara',
            'Beed',
            'Yavatmal',
            'Kamptee',
            'Gondia',
            'Barshi',
            'Achalpur',
            'Osmanabad',
            'Nandurbar',
            'Wardha',
            'Udgir',
            'Hinganghat',
            'Devgarh',
            'Amalner',
            'Anjangaon',
            'Mahad',
        ];

        foreach ($citiesMaharashtra as $cityName) {
            City::create([
                'state_id' => $stateIdMaharashtra,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Manipur
        $stateIdManipur = State::where('name', 'Manipur')->first()->id;

        $citiesManipur = [
            'Imphal',
            'Thoubal',
            'Bishnupur',
            'Churachandpur',
            'Senapati',
            'Ukhrul',
            'Tamenglong',
            'Kangpokpi',
            'Jiribam',
        ];

        foreach ($citiesManipur as $cityName) {
            City::create([
                'state_id' => $stateIdManipur,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Meghalaya
        $stateIdMeghalaya = State::where('name', 'Meghalaya')->first()->id;

        $citiesMeghalaya = [
            'Shillong',
            'Tura',
            'Jowai',
            'Nongstoin',
            'Baghmara',
            'Williamnagar',
            'Nongpoh',
            'Resubelpara',
            'Mawkyrwat',
            'Ampati',
            'Mairang',
            'Khliehriat',
            'Amlarem',
            'Mahendraganj',
            'Ranikor',
            'Cherrapunji',
        ];

        foreach ($citiesMeghalaya as $cityName) {
            City::create([
                'state_id' => $stateIdMeghalaya,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Mizoram
        $stateIdMizoram = State::where('name', 'Mizoram')->first()->id;

        $citiesMizoram = [
            'Aizawl',
            'Lunglei',
            'Saiha',
            'Champhai',
            'Serchhip',
            'Kolasib',
            'Lawngtlai',
            'Mamit',
            'Hnahthial',
            'Khawzawl',
            'Saitual',
            // Add more cities as needed
        ];

        foreach ($citiesMizoram as $cityName) {
            City::create([
                'state_id' => $stateIdMizoram,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Nagaland
        $stateIdNagaland = State::where('name', 'Nagaland')->first()->id;

        $citiesNagaland = [
            'Kohima',
            'Dimapur',
            'Mokokchung',
            'Tuensang',
            'Wokha',
            'Zunheboto',
            'Phek',
            'Mon',
            'Kiphire',
            'Longleng',
        ];

        foreach ($citiesNagaland as $cityName) {
            City::create([
                'state_id' => $stateIdNagaland,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Odisha
        $stateIdOdisha = State::where('name', 'Odisha')->first()->id;

        $citiesOdisha = [
            'Bhubaneswar',
            'Cuttack',
            'Rourkela',
            'Puri',
            'Sambalpur',
            'Berhampur',
            'Balasore',
            'Brahmapur',
            'Bhadrak',
            'Baripada',
            'Jharsuguda',
            'Jeypore',
            'Bargarh',
            'Rayagada',
            'Kendujhar',
            'Jatani',
            'Balangir',
            'Bhawanipatna',
            'Paradip',
            'Bhadrak',
            'Jajpur',
            'Dhenkanal',
            'Keonjhar',
            'Angul',
            'Koraput',
            'Byasanagar',
            'Boudh',
            'Sunabeda',
            'Belpahar',
            'Nabarangpur',
            'Barbil',
            'Titlagarh',
            'Jhumpura',
            'Debagarh',
            'Kantabanji',
            'Padampur',
            // Add more cities as needed
        ];

        foreach ($citiesOdisha as $cityName) {
            City::create([
                'state_id' => $stateIdOdisha,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Rajasthan
        $stateIdRajasthan = State::where('name', 'Rajasthan')->first()->id;

        $citiesRajasthan = [
            'Jaipur',
            'Jodhpur',
            'Udaipur',
            'Ajmer',
            'Kota',
            'Bikaner',
            'Alwar',
            'Sikar',
            'Pali',
            'Bhilwara',
            'Tonk',
            'Bharatpur',
            'Chittorgarh',
            'Sawai Madhopur',
            'Barmer',
            'Sirohi',
            'Ganganagar',
            'Jhunjhunu',
            'Dhaulpur',
            'Karauli',
            'Nagaur',
            'Hanumangarh',
            'Dausa',
            'Churu',
            'Banswara',
            'Dungarpur',
            'Sri Ganganagar',
            'Bundi',
            'Baran',
            'Sikar',
            'Sawai Madhopur',
            'Nagaur',
            'Jalore',
            'Jhalawar',
            'Bharatpur',
            'Bhilwara',
            'Tonk',
            'Rajsamand',
            'Pratapgarh',
            'Dholpur',
            'Barmer',
            'Banswara',
            'Dungarpur',
            'Sirohi',
            // Add more cities as needed
        ];

        foreach ($citiesRajasthan as $cityName) {
            City::create([
                'state_id' => $stateIdRajasthan,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }


        // Add cities for Sikkim
        $stateIdSikkim = State::where('name', 'Sikkim')->first()->id;

        $citiesSikkim = [
            'Gangtok',
            'Namchi',
            'Mangan',
            'Gyalshing',
            'Singtam',
            'Rangpo',
            'Soreng',
            'Jorethang',
            'Pakyong',
            'Ravangla',
            'Lachen',
            'Lachung',
            'Sakyong-Pentong',
            // Add more cities as needed
        ];

        foreach ($citiesSikkim as $cityName) {
            City::create([
                'state_id' => $stateIdSikkim,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Tamil Nadu
        $stateIdTamilNadu = State::where('name', 'Tamil Nadu')->first()->id;

        $citiesTamilNadu = [
            'Chennai',
            'Coimbatore',
            'Madurai',
            'Tiruchirappalli',
            'Salem',
            'Tirunelveli',
            'Tiruppur',
            'Erode',
            'Vellore',
            'Thoothukudi',
            'Dindigul',
            'Thanjavur',
            'Ranipet',
            'Sivakasi',
            'Karur',
            'Ooty',
            'Nagercoil',
            'Hosur',
            'Ambur',
            'Neyveli',
            'Kancheepuram',
            'Kumbakonam',
            'Rajapalayam',
            'Virudhunagar',
            'Pollachi',
            'Ramanathapuram',
            'Pudukkottai',
            'Nagapattinam',
            'Vaniyambadi',
            'Arakkonam',
            'Aruppukkottai',
            'Namakkal',
            'Thiruvallur',
            'Perambalur',
            'Thiruvarur',
            'Krishnagiri',
            'Sankarankovil',
            'Mayiladuthurai',
            'Sathyamangalam',
            'Karaikudi',
            // Add more cities as needed
        ];

        foreach ($citiesTamilNadu as $cityName) {
            City::create([
                'state_id' => $stateIdTamilNadu,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }


        // Add cities for Telangana
        $stateIdTelangana = State::where('name', 'Telangana')->first()->id;

        $citiesTelangana = [
            'Hyderabad',
            'Warangal',
            'Nizamabad',
            'Karimnagar',
            'Khammam',
            'Ramagundam',
            'Mahbubnagar',
            'Nalgonda',
            'Adilabad',
            'Suryapet',
            'Miryalaguda',
            'Jagtial',
            'Nirmal',
            'Kothagudem',
            'Siddipet',
            'Kamareddy',
            'Medak',
            'Sircilla',
            'Mancherial',
            'Wanaparthy',
            'Kollapur',
            'Vikarabad',
            'Bodhan',
            'Palwancha',
            'Jangaon',
            'Koratla',
            'Tandur',
            'Sangareddy',
            'Yadagirigutta',
            'Bhongir',
            'Kagaznagar',
            'Mahabubabad',
            'Kodad',
            'Khanapur',
            'Mandamarri',
            'Bellampalli',
            'Farooqnagar',
            'Bhupalpally',
            'Narayanpet',
            'Metpally',
            // Add more cities as needed
        ];

        foreach ($citiesTelangana as $cityName) {
            City::create([
                'state_id' => $stateIdTelangana,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Tripura
        $stateIdTripura = State::where('name', 'Tripura')->first()->id;

        $citiesTripura = [
            'Agartala',
            'Udaipur',
            'Dharmanagar',
            'Ambassa',
            'Kailasahar',
            'Belonia',
            'Sabroom',
            'Khowai',
            'Sonamura',
            'Teliamura',
            'Kamalpur',
            'Santirbazar',
            'Jogendranagar',
            'Amarpur',
            'Ranirbazar',
            'Mohanpur',
            'Kumarghat',
            'Melaghar',
            'Manu',
            'Kanchanpur',
            'Gakulnagar',
            'Sabual',
            'Longtharai Valley',
            // Add more cities as needed
        ];

        foreach ($citiesTripura as $cityName) {
            City::create([
                'state_id' => $stateIdTripura,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }



        // Add cities for Uttar Pradesh
        $stateIdUttarPradesh = State::where('name', 'Uttar Pradesh')->first()->id;

        $citiesUttarPradesh = [
            'Lucknow',
            'Kanpur',
            'Agra',
            'Varanasi',
            'Allahabad',
            'Meerut',
            'Ghaziabad',
            'Noida',
            'Gorakhpur',
            'Jhansi',
            'Prayagraj',
            'Aligarh',
            'Moradabad',
            'Saharanpur',
            'Faizabad',
            'Ayodhya',
            'Bareilly',
            'Mathura',
            'Firozabad',
            'Rampur',
            'Banda',
            'Etawah',
            'Muzaffarnagar',
            'Shahjahanpur',
            'Mirzapur',
            'Bulandshahr',
            'Hapur',
            'Sambhal',
            'Amroha',
            'Hardoi',
            'Farrukhabad',
            'Jaunpur',
            'Unnao',
            'Lakhimpur Kheri',
            'Sitapur',
            'Bahraich',
            'Barabanki',
            'Basti',
            'Deoria',
            'Ballia',
            'Gonda',
            'Mainpuri',
            'Etah',
            'Raebareli',
            'Orai',
            'Hathras',
            'Bijnor',
            'Ambedkar Nagar',
            'Pilibhit',
            'Shamli',
            'Haldwani',
            'Hardwar',
            'Sultanpur',
            'Azamgarh',
            'Amethi',
            'Mau',
            'Kannauj',
            'Budaun',
            'Rae Bareli',
            'Greater Noida',
            'Lalitpur',
            // Add more cities as needed
        ];

        foreach ($citiesUttarPradesh as $cityName) {
            City::create([
                'state_id' => $stateIdUttarPradesh,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Uttarakhand
        $stateIdUttarakhand = State::where('name', 'Uttarakhand')->first()->id;

        $citiesUttarakhand = [
            'Dehradun',
            'Haridwar',
            'Rishikesh',
            'Haldwani',
            'Rudrapur',
            'Kashipur',
            'Roorkee',
            'Ramnagar',
            'Kotdwara',
            'Mussoorie',
            'Nainital',
            'Pithoragarh',
            'Almora',
            'Bageshwar',
            'Champawat',
            'Tehri',
            'Pauri',
            'Srinagar',
            'Uttarkashi',
            'Joshimath',
            'Rudraprayag',
            'Gopeshwar',
            'Didihat',
            'Lansdowne',
            'Karanprayag',
            'Chakrata',
            'Kedarnath',
            'Badrinath',
            'Gairsain',
            // Add more cities as needed
        ];

        foreach ($citiesUttarakhand as $cityName) {
            City::create([
                'state_id' => $stateIdUttarakhand,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for West Bengal
        $stateIdWestBengal = State::where('name', 'West Bengal')->first()->id;

        $citiesWestBengal = [
            'Kolkata',
            'Howrah',
            'Durgapur',
            'Siliguri',
            'Asansol',
            'Haldia',
            'Darjeeling',
            'Kharagpur',
            'Malda',
            'Jalpaiguri',
            'Krishnanagar',
            'Bardhaman',
            'Baharampur',
            'Raiganj',
            'Medinipur',
            'Balurghat',
            'Bankura',
            'Cooch Behar',
            'Alipurduar',
            'Serampore',
            'Habra',
            'Santipur',
            'Bangaon',
            'Ranaghat',
            'Krishnagar',
            'Nabadwip',
            'Chakdaha',
            'Dankuni',
            'Contai',
            'Gangarampur',
            'Basirhat',
            'Katwa',
            'Itahar',
            'Kalyani',
            'Jangipur',
            'Taki',
            'Madhyamgram',
            'Memari',
            'Purulia',
            'Haldibari',
            'Kurseong',
            'Kalyani',
            'Baruipur',
            'Naihati',
            'Chinsurah',
            'Dum Dum',
            'Bansberia',
            'Bolpur',
            'Murshidabad',
            'Jangipur',
            'English Bazar',
            'Nalhati',
            'Mathabhanga',
            'Raghunathganj',
            'Suri',
            'Midnapore',
            'Kakdwip',
            'Jhargram',
            'Islampur',
            'Gobardanga',
            'Raiganj',
            'Rampurhat',
            // Add more cities as needed
        ];

        foreach ($citiesWestBengal as $cityName) {
            City::create([
                'state_id' => $stateIdWestBengal,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Andaman and Nicobar Islands
        $stateIdAndamanNicobar = State::where('name', 'Andaman and Nicobar Islands')->first()->id;

        $citiesAndamanNicobar = [
            'Port Blair',
            'Car Nicobar',
            'Mayabunder',
            'Rangat',
            'Diglipur',
            'North And Middle Andaman',
            'Little Andaman',
            'Campbell Bay',
            'Havelock Island',
            'Nancowry',
            'Wandoor',
            'Neil Island',
            'Great Nicobar',
            'Long Island',
            'Kalapathar',
            'Lakshmanpur',
            'Shaheed Dweep',
            'Katchal',
            'Viper Island',
            'Hut Bay',
            'Baratang Island',
            'Kadamtala',
            'Rutland Island',
            'Interview Island',
            'Dolyganj',
            'Chetamale',
            'Sippighat',
            // Add more cities as needed
        ];

        foreach ($citiesAndamanNicobar as $cityName) {
            City::create([
                'state_id' => $stateIdAndamanNicobar,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Chandigarh
        $stateIdChandigarh = State::where('name', 'Chandigarh')->first()->id;

        $citiesChandigarh = [
            'Chandigarh',
            // Add more cities as needed
        ];

        foreach ($citiesChandigarh as $cityName) {
            City::create([
                'state_id' => $stateIdChandigarh,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add cities for Dadra and Nagar Haveli
        $stateIdDadraNagarHaveli = State::where('name', 'Dadra and Nagar Haveli and Daman and Diu')->first()->id;

        $citiesDadraNagarHaveli = [
            'Silvassa',
            'Dadra',
            'Naroli',
            'Dahanu',
            'Dudhani',
            'Rakholi',
            'Dadra and Nagar Haveli',
            'Diu',
            'Khadoli',
            'Kilvani',
            'Mashat',
            'Saili',
            // Add more cities as needed
        ];

        foreach ($citiesDadraNagarHaveli as $cityName) {
            City::create([
                'state_id' => $stateIdDadraNagarHaveli,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add populated areas for Lakshadweep
        $stateIdLakshadweep = State::where('name', 'Lakshadweep')->first()->id;

        $areasLakshadweep = [
            'Kavaratti',
            'Agatti',
            'Amini',
            'Andrott',
            'Kalpeni',
            'Minicoy',
            'Kadamath',
            'Bitra',
            'Chetlat',
            'Kiltan',
            'Kadmat',
            'Bangaram',
            // Add more areas as needed
        ];

        foreach ($areasLakshadweep as $areaName) {
            City::create([
                'state_id' => $stateIdLakshadweep,
                'name' => $areaName,
                'is_active' => true,
            ]);
        }

        // Add districts/areas for Delhi
        $stateIdDelhi = State::where('name', 'Delhi')->first()->id;

        $areasDelhi = [
            'New Delhi',
            'North Delhi',
            'South Delhi',
            'East Delhi',
            'West Delhi',
            'North West Delhi',
            'North East Delhi',
            'Central Delhi',
            'Shahdara',
            'South West Delhi',
            'South East Delhi',
        ];

        foreach ($areasDelhi as $areaName) {
            City::create([
                'state_id' => $stateIdDelhi,
                'name' => $areaName,
                'is_active' => true,
            ]);
        }



        // Add cities for Punjab
        $stateIdPunjab = State::where('name', 'Punjab')->first()->id;

        $citiesPunjab = [
            'Amritsar',
            'Ludhiana',
            'Jalandhar',
            'Patiala',
            'Bathinda',
            'Hoshiarpur',
            'Pathankot',
            'Moga',
            'Batala',
            'Abohar',
            'Malerkotla',
            'Khanna',
            'Phagwara',
            'Muktasar',
            'Faridkot',
            'Firozpur',
            'Gurdaspur',
            'Sangrur',
            'Nabha',
            'Fatehgarh Sahib',
            'Ropar (Rupnagar)',
            'Gidderbaha',
            'Barnala',
            'Rampura Phul',
            'Mansa',
            'Maur',
            'Jagraon',
            'Hoshiar Nagar',
            'Fatehgarh Churian',
            'Zira',
            'Nakodar',
            'Raikot',
            'Begowal',
            'Bhawanigarh',
            'Kapurthala',
            'Jaitu',
            'Bhikhi',
            'Balachaur',
            'Samana',
            'Talwandi Sabo',
            'Phillaur',
            'Budhlada',
            // Add more cities as needed
        ];

        foreach ($citiesPunjab as $cityName) {
            City::create([
                'state_id' => $stateIdPunjab,
                'name' => $cityName,
                'is_active' => true,
            ]);
        }

        // Add regions for Puducherry
        $stateIdPuducherry = State::where('name', 'Puducherry')->first()->id;

        $regionsPuducherry = [
            'Puducherry',
            'Karaikal',
            'Yanam',
            'Mahe',
        ];

        foreach ($regionsPuducherry as $regionName) {
            City::create([
                'state_id' => $stateIdPuducherry,
                'name' => $regionName,
                'is_active' => true,
            ]);
        }

    }


}
