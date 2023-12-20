<?php

namespace Database\Seeders;

use App\Models\City;
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
    }
}
