<?php

namespace Modules\Song\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Song\Models\musicUrl;
use Modules\Song\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefix = "http://dl.erfanrasooli.ir/musics/";

        $data = [
            [
                "name_fa" => "پسرم",
                "name_en" => "Pesaram",
                "url" => $prefix . "Daniyal/Keder/" . rawurlencode("01 - Daniyal - Pesaram (FT. Taniya) .mp3"),
                "artists" => [1,7],
            ],
            [
                "name_fa" => "سهم قشر ما",
                "name_en" => "Sahme Gheshre Ma",
                "url" => $prefix . "Daniyal/Keder/" . rawurlencode("02 - Daniyal - Sahme Gheshre Ma.mp3"),
                "artists" => [1]
            ],
            [
                "name_fa" => "فصل زشتی",
                "name_en" => "Fasle Zeshti",
                "url" => $prefix . "Daniyal/Keder/" . rawurlencode("03 - Daniyal - Fasle Zeshti (FT. Pishro) .mp3"),
                "artists" => [1,8]
            ],
            [
                "name_fa" => "مهم نی برام",
                "name_en" => "Mohem Ni Baram",
                "url" => $prefix . "Daniyal/Keder/" . rawurlencode("04 - Daniyal - Mohem Ni Baram (FT. Mahyar) .mp3"),
                "artists" => [1,9]
            ],
            [
                "name_fa" => "کوچه های سه متری",
                "name_en" => "Kooche Haye 3 Metri",
                "url" => $prefix . "Daniyal/Keder/" . rawurlencode("05 - Daniyal - Kooche Haye 3Metri (FT. Shayea & Mahyar) .mp3"),
                "artists" => [1,4,9]
            ],
            [
                "name_fa" => "کدر",
                "name_en" => "Keder",
                "url" => $prefix . "Daniyal/Keder/" . rawurlencode("06 - Daniyal - Keder.mp3"),
                "artists" => [1]
            ],
            [
                "name_fa" => "16.6%",
                "name_en" => "16.6%",
                "url" => $prefix . "sorena/single/" . rawurlencode("Ali Sorena - 16.6.mp3"),
                "artists" => [2]
            ],
            [
                "name_fa" => "سکوت",
                "name_en" => "Sokoot",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("01 Sokot.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "دوراهی",
                "name_en" => "Dorahi",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("02 Do Rahi.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "آدم ها",
                "name_en" => "Adamha",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("03 Adam Ha.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "رگ خواب",
                "name_en" => "Rage Khab",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("04 Rage Khab.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "من تو رو کم دارم",
                "name_en" => "Man To Ro Kam Daram",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("05 Man Toro Kam Daram.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "ضربان معکوس",
                "name_en" => "Zarabane Makoos",
            "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("06 Zarabane Makos.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "نباشی",
                "name_en" => "Nabashi",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("07 Nabashi.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "عذاب",
                "name_en" => "Azzab",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("08 Azab.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "بمون",
                "name_en" => "Bemoon",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("09 Bemon.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "حافظه ی ضعیف",
                "name_en" => "Hafezeye Zaeif",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("10 Hafezeye Zaeef.mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "دوراهی (بیکلام)",
                "name_en" => "Dorahi (Bikalam)",
                "url" => $prefix . "Mohsen%20Yeganeh/Rage%20Khab/" . rawurlencode("11 Do Rahi ( BiKalam ).mp3"),
                "artists" => [3]
            ],
            [
                "name_fa" => "یه موقع هایی",
                "name_en" => "Ye Moghehaei",
                "url" => $prefix . "shayea/single/" . rawurlencode("Shayea Ft T-Dey - Ye Moghehaei.mp3"),
                "artists" => [4,12]
            ],
            [
                "name_fa" => "یه موقع هایی 2",
                "name_en" => "Ye Moghehaei 2",
                "url" => $prefix . "shayea/single/" . rawurlencode("shayea_ye_moghehaei 2.mp3"),
                "artists" => [4]
            ],
            [
                "name_fa" => "از اول",
                "name_en" => "Az Avval",
                "url" => $prefix . "shayea/single/" . rawurlencode("Shayea - Az Avval.mp3"),
                "artists" => [4]
            ],
            [
                "name_fa" => "صبر",
                "name_en" => "Sabr",
                "url" => $prefix . "shayea/single/" . rawurlencode("Shayea-Sabr.mp3"),
                "artists" => [4]
            ],
            [
                "name_fa" => "صبر 2",
                "name_en" => "Sabr 2",
                "url" => $prefix . "shayea/single/" . rawurlencode("Shayea-Sabr-2-(Ft-Justina).mp3"),
                "artists" => [4,11]
            ],
            [
                "name_fa" => "عصبانی",
                "name_en" => "Asabani",
                "url" => $prefix . "shayea/single/" . rawurlencode("shayea_asabani.mp3"),
                "artists" => [4]
            ],
            [
                "name_fa" => "احتیاج دارم",
                "name_en" => "Ehtiaj Daram",
                "url" => $prefix . "shayea/single/" . rawurlencode("04. Ehtiaj Daram.mp3"),
                "artists" => [4]
            ],
            [
                "name_fa" => "نمیدونی چقدر دلم میخواد",
                "name_en" => "Nemidooni Cheqad Delam Mikhad",
                "url" => $prefix . "shayea/single/" . rawurlencode("08 - Nemidooni Cheqad Delam Mikhad FT. Minoram.mp3"),
                "artists" => [4]
            ],
            [
                "name_fa" => "آسه آسه",
                "name_en" => "Asse Asse",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("01 Asse Asse.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "بی تقلب",
                "name_en" => "Bi Taghalob",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("02 Bi Taghalob.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "بی چتر",
                "name_en" => "Bi Chatr",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("03 Bi Chatr.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "حالا که اومدی",
                "name_en" => "Hala Ke Oomadi",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("04 Hala Ke Oomadi.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "نقاشی",
                "name_en" => "Naghashi",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("05 Naghashi.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "زمستون",
                "name_en" => "Zemestoon",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("06 Zemestoon.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "دوست دارم",
                "name_en" => "Dooset Daram",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("07 Dooset Daram.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "حق بده",
                "name_en" => "Hagh Bede",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("08 Hagh Bede.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "خواب بودم",
                "name_en" => "Khab Boodam",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("09 Khab Boodam.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "گردنم بنداز",
                "name_en" => "Gardanam Bendaz",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("10 Gardanam Bendaz.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "سادگیت",
                "name_en" => "Sadegiyat",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("11 Sadegiyat.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "ندیدم",
                "name_en" => "Nadidam",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("12 Nadidam.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "بیا",
                "name_en" => "Bia",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("13 Bia.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "فیلم",
                "name_en" => "Film",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("14 Film.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "دوره گرد",
                "name_en" => "Dore Gard",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("15 Dore Gard.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => "حیف",
                "name_en" => "Heyf",
                "url" => $prefix . "Macan%20Band/Naghashi/" . rawurlencode("16 Heyf.mp3"),
                "artists" => [5]
            ],
            [
                "name_fa" => null,
                "name_en" => "the 1",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("the 1 - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "cardigan",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("cardigan - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "exile",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("exile - Taylor Swift  Bon Iver (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "My Tears Ricochet",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("my tears ricochet - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "mirrorball",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("mirrorball - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "seven",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("seven - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "august",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("august - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "this is me trying",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("this is me trying - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "illicit affairs",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("illicit affairs - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "invisible string",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("invisible string - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "mad woman",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("mad woman - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "epiphany",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("epiphany - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "betty",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("betty - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "peace",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("peace - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => null,
                "name_en" => "hoax",
                "url" => $prefix . "Taylor%20Swift/folklore/" . rawurlencode("hoax - Taylor Swift (320).mp3"),
                "artists" => [6]
            ],
            [
                "name_fa" => "خوب",
                "name_en" => "Khoob",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("01.Khoob.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "ساز",
                "name_en" => "Saz",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("02.Saz.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "لمس",
                "name_en" => "Lams",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("03.Lams.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "نقش",
                "name_en" => "Naghsh",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("04.Naghsh.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "نگاه",
                "name_en" => "Negah",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("05.Negah.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "جنگ",
                "name_en" => "Jang",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("06.Jang.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "تکرار",
                "name_en" => "Tekrar",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("07.Tekrar.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "نیاز",
                "name_en" => "Niaz",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("08.Niaz.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "زخم",
                "name_en" => "Zakhm",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("09.Zakhm.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "ریشه",
                "name_en" => "Rishe",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("10.Rishe.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "ممکن",
                "name_en" => "Momken",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("11.Momken.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "مرداب",
                "name_en" => "Mordab",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("12.Mordab.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "سوز",
                "name_en" => "Sooz",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("13.Sooz.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "برش",
                "name_en" => "Boresh",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("14.Boresh.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "صلح",
                "name_en" => "Solh",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("15.Solh.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "اشتباه",
                "name_en" => "Eshtebah",
                "url" => $prefix . "Bahram/Eshtebahe%20Khoob/" . rawurlencode("16.Eshtebah.mp3"),
                "artists" => [10]
            ],
            [
                "name_fa" => "افعی",
                "name_en" => "Afe",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Afee.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "امیر تتلو",
                "name_en" => "Amir Tataloo",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Amir%20Tataloo.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "احترام",
                "name_en" => "Ehteram",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Ehteram.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "قسم",
                "name_en" => "Ghasam",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Ghasam.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "حرمسرا",
                "name_en" => "HaramSara",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20HaramSara.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "خانوم وزیری",
                "name_en" => "Khanoome Vaziri",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Khanoome%20Vaziri.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "خایه باقر",
                "name_en" => "Khayeye Bagher",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Khayeye%20Bagher.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "ممه های گلشیفته",
                "name_en" => "Mamehaye Golshifteh",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Mamehaye%20Golshifteh.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "اون دیگه نمیتونه",
                "name_en" => "Oon Dige Nemitoone",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Oon%20Dige%20Nemitoone.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "شب ۲",
                "name_en" => "Shab 2",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Shab%202.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "تازیانه",
                "name_en" => "Taziyaneh",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Amir%20Tataloo%20-%20Taziyaneh.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "بزنم نفت در بیاد",
                "name_en" => "Bezanam Naft Dar Biad",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Gardane%20Man%20Nandaz.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "در واقع",
                "name_en" => "Dar Vaghe",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Dar%20Vaghe.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "کی مثل من",
                "name_en" => "Ki Mesle Man",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Duzakh%20Ft%20Tataloo%20-%20Ki%20Mesle%20Man.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "گردن من نندار",
                "name_en" => "Gardane Man Nandaz",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Gardane%20Man%20Nandaz.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "جمعه ها",
                "name_en" => "Jomeha",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Jomeha.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "خلسه",
                "name_en" => "Khalse",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Khalse.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "کی مثل تو",
                "name_en" => "Ki Mesle To",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Ki%20Mesle%20To.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "مال من باش",
                "name_en" => "Male Man Bash",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Male%20Man%20Bash.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "من ۳",
                "name_en" => "Man 3",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Man%203.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "من به کم راضی نیستم",
                "name_en" => "Man Be Kam Razi Nistam",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Man%20Be%20Kam%20Razi%20Nistam.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "پریشب",
                "name_en" => "Parishab",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Parishab.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "گرگ ۲",
                "name_en" => "Gorg 2",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Sohrab%20MJ%20Ft.%20Amir%20Tataloo%20-%20Gorg%202.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "مستر لوده",
                "name_en" => "Mr.Lodeh",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Sohrab%20Mj%20Ft.%20Sepehr%20Khalse%20Ft.%20Amir%20Tataloo%20-%20Mr.Lodeh.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "ولش کن",
                "name_en" => "Velesh Kon",
                "url" => "https://dl.seesound.ir/Music/Hip-Hop/Tataloo/Album/12-78%20(2019.2020)/Velesh%20Kon.mp3",
                "artists" => [13]
            ],
            [
                "name_fa" => "اکلیل سرنج",
                "name_en" => "Aklil Soranj",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & 021kid & Sami Low - Aklil Soranj.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "آمبولانس",
                "name_en" => "Ambulance",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Arta & Sami Low - Ambulance.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "فرست کلاس",
                "name_en" => "First Class",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Arown & Sami Low & Benji - First Class.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "افتر",
                "name_en" => "After",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Behzad Leito & Catchybeatz & Arta & Sami Low - After.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "هیولا",
                "name_en" => "Hayula",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Sami Low & Raha - Hayula.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "اکستازی",
                "name_en" => "Extasy",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Sami Low & Sijal & Raha - Extasy.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "سویج رز",
                "name_en" => "Savage Rose",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Sami Low & Tamara - Savage Rose.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "نشو ازم دور",
                "name_en" => "Nasho Azam Door",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Sami Low - Nasho Azam Door.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "کوالا",
                "name_en" => "Koala",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Scott Storch & Sohrab Mj & Sepehr Khalse & Sami Low - Koala.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "تهران تا ال ای",
                "name_en" => "Tehran Ta LA",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & Sepehr Khalse & Pendar & Sami Low - Tehran Ta La.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => "بازیگر",
                "name_en" => "Bazigar",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh & The Don & Sami Low - Bazigar.mp3"),
                "artists" => [15]
            ],
            [
                "name_fa" => null,
                "name_en" => "Raw",
                "url" => $prefix . "korosh/420-vol2/" . rawurlencode("Koorosh - Raw (Outro).mp3"),
                "artists" => [15]
            ],
        ];

        foreach ($data as $item)
        {
            $music = Song::create([
                "name_en" => $item["name_en"],
                "name_fa" => $item["name_fa"],
            ]);

            musicUrl::create([
                "url" => $item["url"],
                "song_id" => $music->id
            ]);

            foreach ($item["artists"] as $id)
                DB::table("song-artist")->insert([
                    "song_id" => $music->id,
                    "artist_id" => $id,
                ]);
        }
    }
}
