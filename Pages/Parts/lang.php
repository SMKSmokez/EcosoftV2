<?php
// Set default language
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

$lang = $_SESSION['lang'];

// Language content
$text = [
    'en' => [
        'hero_title'       => 'Water is the most important substance in our life',
        'hero_subtext'     => 'It impacts our health, economy, environment, and where we live with our loved ones',
        'about_text'       => 'At Ecosoft, with our <strong class="titillium-web-semibold">31</strong> years of experience, we<br/>
                               elevate water purification to a meticulous process<br/>
                               through the implementation of state-of-the-art reverse osmosis<br/>
                               technology throughout <strong class="titillium-web-semibold">65</strong> countries.',
        'products'         => 'Products',
        'about'            => 'About Us',
        'contact'          => 'Contact Us',
        'filter_text'      => 'Our company is committed to delivering exceptional performance through a sophisticated filtration system, ensuring the removal of contaminants and guaranteeing the production of high-quality, clean water for a diverse range of applications—from households to industrial use.',
        'filter_subtext'   => 'But not all water filtration needs are the same. The right system depends on your water quality, household size, and specific needs.',
        'quiz_prompt'      => 'Take our short quiz to find the perfect water filter for your home or business.',
        'quiz_button'      => 'Get Your Ideal Water Filter',


        'about_title' => 'About Us',
        'about_p1' => 'Ecosoft takes care every day to ensure that every family has the opportunity to enjoy clean and fresh water for drinking, cooking, and washing fruits and vegetables, directly from the kitchen faucet— without the need for bins or extra effort. We believe in the power of water, and are dedicated to preserving and improving it as it comes from nature. We provide access to high-quality water for all economic strata, without distinction.',
        'about_p2' => 'Ecosoft offers the most professional, internationally certified water treatment systems across 6 continents. Our team, the most qualified and experienced in Montenegro, is certified for water treatment and includes technocrats, engineers, managers, and customer care experts. Passionate about what they do, our team strives every day to provide the most innovative, safe, and healthy water treatment solutions.',
        'about_p3' => 'We provide clean, fresh, controlled, and healthy water as nature intended. Our solutions save you money and effort every day while also protecting the environment from plastic waste. Whether for families, hotels, restaurants, cafes, or businesses in any industry, including pharmaceuticals and organic products, Ecosoft offers the most efficient, certified treatment systems supported by a qualified team.',


        'survey_title' => 'Ecosoft Water Filter Survey',
        'survey_description' => 'By filling out the provided survey below our team at Ecosoft can help aid you in choosing an appropriate water filtration system for your home or business.',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'phone_number' => 'Phone Number',
        'address' => 'Address',
        'bathrooms' => 'Number of Bathrooms',
        'occupancy' => 'Occupancy Count',
        'occupancy_tooltip' => 'Number of people working or living at this location',
        'water_source' => 'Water Source',
        'electricity' => 'Is there electricity next to your water meter?',
        'submit_button' => 'Submit',
        'well' => 'Well Water',
        'municipal' => 'Municipal Water',
        'yes' => 'Yes',
        'no' => 'No',
        'dont_know' => 'Don’t Know',

        'error_first_name' => 'First name is required.',
        'error_last_name' => 'Last name is required.',
        'error_phone_number' => 'Phone number is required.',
        'error_address' => 'Address is required.',
        'error_bathrooms' => 'Please specify the number of bathrooms.',
        'error_occupancy' => 'Occupancy count is required.',
        'error_water_source' => 'Please select a water source.',
        'error_electricity' => 'Please indicate if electricity is available near your water meter.',

        'survey_success' => 'Your survey has been submitted successfully!',
        'order_id' => 'Order ID:',
        'order_id_hint' => 'Click to copy',
        'please_copy' => 'Please write it down or copy it for your reference.',

        'filter'           => 'Filter',
        'clear'            => 'Clear',
        'no_products_found' => 'No products found matching your search or filter criteria.',
        'quiz_button_products'      => 'Get Your Filter',
    ],

    'al' => [
        'hero_title'       => 'Uji është substanca më e rëndësishme në jetën tonë',
        'hero_subtext'     => 'Ndikon në shëndetin tonë, ekonominë, mjedisin dhe vendin ku jetojmë me të dashurit tanë',
        'about_text'       => 'Në Ecosoft, me <strong class="titillium-web-semibold">31</strong> vite përvojë,<br/>
                               e ngremë pastrimin e ujit në një proces të përpiktë<br/>
                               përmes përdorimit të teknologjisë së osmozës së kundërt të nivelit të lartë<br/>
                               në <strong class="titillium-web-semibold">65</strong> vende.',
        'products'         => 'Produkte',
        'about'            => 'Rreth Nesh',
        'contact'          => 'Kontaktoni',
        'filter_text'      => 'Kompania jonë është e përkushtuar për të ofruar performancë të jashtëzakonshme përmes një sistemi të sofistikuar të filtrimit, duke siguruar heqjen e ndotësve dhe garantuar ujë të pastër dhe me cilësi të lartë për një gamë të gjerë përdorimesh – nga shtëpitë deri tek përdorimi industrial.',
        'filter_subtext'   => 'Por jo të gjitha nevojat për filtrimin e ujit janë të njëjta. Sistemi i duhur varet nga cilësia e ujit, madhësia e familjes dhe nevojat specifike.',
        'quiz_prompt'      => 'Bëni një kuiz të shkurtër për të gjetur filtrin ideal të ujit për shtëpinë ose biznesin tuaj.',
        'quiz_button'      => 'Gjej Filtrin Ideal',


        'about_title' => 'Rreth Nesh',
        'about_p1' => 'Ecosoft kujdeset çdo ditë për të siguruar që çdo familje të ketë mundësinë të shijojë ujë të pastër dhe të freskët për pirje, gatim dhe larjen e frutave dhe perimeve, direkt nga rubineti i kuzhinës— pa nevojën për bidonë apo përpjekje shtesë. Ne besojmë në fuqinë e ujit dhe jemi të përkushtuar për ta ruajtur dhe përmirësuar atë ashtu siç vjen nga natyra.',
        'about_p2' => 'Ecosoft ofron sistemet më profesionale dhe të certifikuara ndërkombëtarisht për trajtimin e ujit në 6 kontinente. Ekipi ynë, më i kualifikuari në Mal të Zi, përfshin inxhinierë, teknokratë, menaxherë dhe ekspertë të kujdesit ndaj klientëve.',
        'about_p3' => 'Ne ofrojmë ujë të pastër, të freskët dhe të shëndetshëm siç e ka parashikuar natyra. Zgjidhjet tona ju kursejnë para dhe përpjekje çdo ditë, duke mbrojtur njëkohësisht mjedisin nga mbetjet plastike.',


        'survey_title' => 'Anketa për Filtrimin e Ujit Ecosoft',
        'survey_description' => 'Duke plotësuar anketën e siguruar më poshtë, ekipi ynë në Ecosoft mund t\'ju ndihmojë në zgjedhjen e një sistemi të përshtatshëm për filtrimin e ujit për shtëpinë ose biznesin tuaj.',
        'first_name' => 'Emri',
        'last_name' => 'Mbiemri',
        'phone_number' => 'Numri i Telefonit',
        'address' => 'Adresa',
        'bathrooms' => 'Numri i Banjove',
        'occupancy' => 'Numri i Pjesëmarrësve',
        'occupancy_tooltip' => 'Numri i personave që jetojnë ose punojnë në këtë vend',
        'water_source' => 'Burimi i Ujit',
        'electricity' => 'A ka energji elektrike pranë matësit tuaj të ujit?',
        'submit_button' => 'Dërgo',
        'well' => 'Ujë nga Pusi',
        'municipal' => 'Ujë nga Ujësjellësi',
        'yes' => 'Po',
        'no' => 'Jo',
        'dont_know' => 'Nuk E Di',

        'error_first_name' => 'Ju lutem shkruani emrin.',
        'error_last_name' => 'Ju lutem shkruani mbiemrin.',
        'error_phone_number' => 'Ju lutem shkruani numrin e telefonit.',
        'error_address' => 'Ju lutem shkruani adresën.',
        'error_bathrooms' => 'Ju lutem shkruani numrin e banjove.',
        'error_occupancy' => 'Ju lutem shkruani numrin e pjesëmarrësve.',
        'error_water_source' => 'Ju lutem zgjidhni një burim uji.',
        'error_electricity' => 'Ju lutem tregoni nëse ka energji elektrike pranë matësit të ujit.',

        'survey_success' => 'Pyetësori juaj është dorëzuar me sukses!',
        'order_id' => 'ID e Porosisë:',
        'order_id_hint' => 'Kliko për të kopjuar',
        'please_copy' => 'Ju lutemi shkruajeni ose kopjoni për referencë.',

        'filter'           => 'Filtro',
        'clear'            => 'Pastro',
        'no_products_found' => 'Nuk u gjetën produkte që përputhen me kriteret tuaja të kërkimit ose filtrimit.',
        'quiz_button_products'      => 'Gjej Filtrin',
    ],

    'me' => [
        'hero_title'       => 'Voda je najvažnija supstanca u našem životu',
        'hero_subtext'     => 'Ona utiče na naše zdravlje, ekonomiju, životnu sredinu i mjesto gdje živimo sa našim voljenima',
        'about_text'       => 'U Ecosoft-u, sa <strong class="titillium-web-semibold">31</strong> godinom iskustva,<br/>
                               podižemo prečišćavanje vode na nivo preciznog procesa<br/>
                               koristeći najsavremeniju tehnologiju reverzne osmoze<br/>
                               u više od <strong class="titillium-web-semibold">65</strong> zemalja.',
        'products'         => 'Proizvodi',
        'about'            => 'O Nama',
        'contact'          => 'Kontakt',
        'filter_text'      => 'Naša kompanija je posvećena pružanju izuzetnih performansi kroz sofisticirani sistem filtracije, osiguravajući uklanjanje zagađivača i garantujući proizvodnju visokokvalitetne, čiste vode za razne namjene — od domaćinstava do industrijske upotrebe.',
        'filter_subtext'   => 'Ali nisu sve potrebe za filtracijom vode iste. Pravi sistem zavisi od kvaliteta vode, veličine domaćinstva i specifičnih potreba.',
        'quiz_prompt'      => 'Popunite naš kratak upitnik da biste pronašli idealan filter za vašu kuću ili posao.',
        'quiz_button'      => 'Pronađi Idealni Filter',


        'about_title' => 'O Nama',
        'about_p1' => 'Ecosoft se svakodnevno brine da svaka porodica ima priliku da uživa u čistoj i svežoj vodi za piće, kuvanje i pranje voća i povrća, direktno sa česme — bez potrebe za bocama ili dodatnim naporom.',
        'about_p2' => 'Ecosoft nudi najprofesionalnije sisteme za prečišćavanje vode sa međunarodnim sertifikatima širom 6 kontinenata. Naš tim je najkvalifikovaniji u Crnoj Gori i uključuje inženjere, tehničare, menadžere i stručnjake za korisničku podršku.',
        'about_p3' => 'Pružamo čistu, svežu i zdravu vodu kao što priroda nalaže. Naša rešenja vam svakodnevno štede novac i trud, dok istovremeno štite životnu sredinu od plastičnog otpada.',



        'survey_title' => 'Ecosoft Anketa o Filtrima Vode',
        'survey_description' => 'Popunjavanjem ankete ispod, naš tim u Ecosoft-u može vam pomoći u izboru odgovarajućeg sistema za filtraciju vode za vaš dom ili posao.',
        'first_name' => 'Ime',
        'last_name' => 'Prezime',
        'phone_number' => 'Broj Telefona',
        'address' => 'Adresa',
        'bathrooms' => 'Broj Kupaonica',
        'occupancy' => 'Broj Osoba',
        'occupancy_tooltip' => 'Broj osoba koje žive ili rade na ovoj lokaciji',
        'water_source' => 'Izvor Vode',
        'electricity' => 'Da li postoji električna energija pored vašeg vodomera?',
        'submit_button' => 'Pošaljite',
        'well' => 'Voda iz Bunara',
        'municipal' => 'Voda iz Mreže',
        'yes' => 'Da',
        'no' => 'Ne',
        'dont_know' => 'Ne Znam',

        'error_first_name' => 'Unesite ime.',
        'error_last_name' => 'Unesite prezime.',
        'error_phone_number' => 'Unesite broj telefona.',
        'error_address' => 'Unesite adresu.',
        'error_bathrooms' => 'Unesite broj kupaonica.',
        'error_occupancy' => 'Unesite broj osoba.',
        'error_water_source' => 'Izaberite izvor vode.',
        'error_electricity' => 'Naznačite da li postoji električna energija pored vašeg vodomera.',

        'survey_success' => 'Vaša anketa je uspješno poslata!',
        'order_id' => 'ID narudžbe:',
        'order_id_hint' => 'Kliknite da kopirate',
        'please_copy' => 'Molimo vas da ga zapišete ili kopirate za svoju evidenciju.',

        'filter'           => 'Filter',
        'clear'            => 'Obriši',
        'no_products_found' => 'Nijedan proizvod nije pronađen prema vašim kriterijumima pretrage ili filtriranja.',
        'quiz_button_products'      => 'Pronađi Filter',
    ]
];