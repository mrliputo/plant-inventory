-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2018 at 10:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siunjaac_siit`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Rebecca Senger', 'gussie.crooks@example.org', 'I think.\' And she opened it, and fortunately was just beginning to feel very queer to ME.\' \'You!\' said the Cat, and vanished. Alice was very glad that it was a most extraordinary noise going on.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(2, 'Keanu Morissette', 'bgulgowski@example.net', 'Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King turned pale, and shut his eyes.--\'Tell her about the same as the March Hare moved into the wood. \'It\'s the thing yourself, some.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(3, 'Rachel Borer', 'jaycee.tremblay@example.net', 'Mock Turtle in a natural way. \'I thought you did,\' said the Dodo solemnly, rising to its children, \'Come away, my dears! It\'s high time to begin with; and being so many different sizes in a.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(4, 'Ines Langworth', 'simone.runolfsdottir@example.com', 'The Hatter shook his head off outside,\' the Queen never left off writing on his slate with one of the baby, it was her turn or not. \'Oh, PLEASE mind what you\'re at!\" You know the way out of its.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(5, 'Mr. Stuart Flatley DDS', 'vesta73@example.org', 'Dormouse shook itself, and was delighted to find that she tipped over the verses on his spectacles and looked at Alice, as the soldiers had to leave the court; but on the floor, and a large crowd.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(6, 'Pietro Williamson', 'lisandro82@example.net', 'I\'ve often seen them so shiny?\' Alice looked down at them, and the choking of the jury asked. \'That I can\'t remember,\' said the Mock Turtle. \'Certainly not!\' said Alice indignantly. \'Ah! then yours.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(7, 'Granville Schneider', 'etha.halvorson@example.net', 'Mock Turtle sighed deeply, and drew the back of one flapper across his eyes. He looked at the end of the same thing,\' said the Mouse, getting up and saying, \'Thank you, it\'s a French mouse, come.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(8, 'Earlene Haley I', 'trycia28@example.net', 'Queen put on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an immense length of neck, which seemed to quiver all over crumbs.\' \'You\'re wrong.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(9, 'Tyson Romaguera', 'qjenkins@example.net', 'The Hatter shook his head mournfully. \'Not I!\' said the Dormouse, without considering at all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was too slippery; and when she had made.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(10, 'Robyn Dibbert', 'okey.marquardt@example.org', 'Cat; and this was her turn or not. So she began again. \'I wonder what you\'re at!\" You know the song, she kept tossing the baby violently up and rubbed its eyes: then it watched the Queen said to.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(11, 'Glen Walter DVM', 'dhintz@example.com', 'The table was a little shriek and a pair of gloves and a Long Tale They were just beginning to write out a box of comfits, (luckily the salt water had not a regular rule: you invented it just now.\'.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(12, 'Ila Herzog MD', 'hstrosin@example.org', 'Dormouse began in a low, hurried tone. He looked at Two. Two began in a melancholy way, being quite unable to move. She soon got it out into the sea, though you mayn\'t believe it--\' \'I never went to.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(13, 'Maximillia Raynor DVM', 'macejkovic.alfredo@example.net', 'I give it up,\' Alice replied: \'what\'s the answer?\' \'I haven\'t the least notice of them can explain it,\' said Alice in a sulky tone, as it can\'t possibly make me grow larger, I can listen all day to.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(14, 'Eli Gleichner', 'warren.dubuque@example.com', 'Bill had left off sneezing by this time, sat down and began whistling. \'Oh, there\'s no use now,\' thought poor Alice, \'it would have appeared to them she heard one of the doors of the other bit. Her.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(15, 'Carter Hayes DDS', 'kiley90@example.com', 'French mouse, come over with fright. \'Oh, I know!\' exclaimed Alice, who always took a minute or two she walked off, leaving Alice alone with the time,\' she said to Alice, \'Have you seen the Mock.', '2018-06-21 05:59:10', '2018-06-21 05:59:10'),
(16, 'Moises Will', 'auer.abbey@example.net', 'Tears \'Curiouser and curiouser!\' cried Alice hastily, afraid that she wasn\'t a really good school,\' said the Gryphon, \'that they WOULD go with Edgar Atheling to meet William and offer him the crown..', '2018-06-21 05:59:11', '2018-06-21 05:59:11'),
(17, 'Norwood Carroll', 'xsenger@example.net', 'I\'ll be jury,\" Said cunning old Fury: \"I\'ll try the patience of an oyster!\' \'I wish I hadn\'t gone down that rabbit-hole--and yet--and yet--it\'s rather curious, you know, and he went on, turning to.', '2018-06-21 05:59:11', '2018-06-21 05:59:11'),
(18, 'Ronaldo Padberg', 'jleuschke@example.com', 'French lesson-book. The Mouse did not look at all a proper way of expressing yourself.\' The baby grunted again, and went on so long since she had this fit) An obstacle that came between Him, and.', '2018-06-21 05:59:11', '2018-06-21 05:59:11'),
(19, 'Jasper Barrows MD', 'melyssa.padberg@example.org', 'Alice whispered, \'that it\'s done by everybody minding their own business,\' the Duchess to play croquet.\' The Frog-Footman repeated, in the sun. (IF you don\'t know the way of nursing it, (which was.', '2018-06-21 05:59:11', '2018-06-21 05:59:11'),
(20, 'Mr. Coy Pouros', 'cecelia33@example.net', 'WOULD put their heads down! I am in the pool of tears which she had known them all her knowledge of history, Alice had got burnt, and eaten up by wild beasts and other unpleasant things, all because.', '2018-06-21 05:59:11', '2018-06-21 05:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_05_01_063355_create_species_table', 1),
(8, '2018_05_01_072356_create_messages_table', 1),
(9, '2018_08_31_160324_create_trees_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(11) NOT NULL,
  `nama_lokal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesies` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `famili` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kingdom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `botani` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_tumbuh` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `manfaat` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `nama_lokal`, `spesies`, `genus`, `famili`, `ordo`, `kelas`, `divisi`, `kingdom`, `botani`, `syarat_tumbuh`, `manfaat`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mahoni', 'Swietenia macrophylla', 'Swietenia', 'Meliaceae', 'Sapindales', 'Magoliopsida', 'Magnoliophyta', 'Plantae', 'a:4:{i:0;s:98:\"Memiliki tinggi 5-25m, memiliki akar tunggang, berbatang bulat, banyak cabang dan kayunya bergetah\";i:1;s:55:\"Daun pohon mahoni termasuk daun majemuk menyirip genap.\";i:2;s:145:\"Helaian daun berbentuk bulat telur, ujung dan pangkalnya runcing, tepi daun rata, bentuk tulang daun menyirip yang dapat mencapai panjang 3-15cm.\";i:3;s:78:\"Daun yang masih muda akan berwarna merah dan lama-kelamaan akan berwarna hijau\";}', 'a:4:{i:0;s:116:\"Dapat tumbuh dengan subur di pasir payau dekat dengan pantai dan menyukai tempat yang cukup sinar matahari langsung.\";i:1;s:76:\"Termasuk jenis tanaman yang mampu bertahan hidup di tanah gersang sekalipun.\";i:2;s:87:\"Walaupun tidak disirami selama berbulan-bulan, mahoni masih mampu untuk bertahan hidup.\";i:3;s:154:\"Syarat lokasi untuk budidaya mahoni diantaranya adalah ketinggian lahan maksimum 1.500 meter dpl, curah hujan 1.524-5.085 mm/tahun, dan suhu udara 11-36C.\";}', 'a:2:{i:0;s:140:\"Tanaman ini dapat juga bermanfaat untuk kehidupan diantaranya dapat mengurangi polusi udara dan juga akan membantu mengikat air dengan baik.\";i:1;s:233:\"Tanaman ini juga merupakan salah satu tanaman herbal yang dapat mengatasi dan mengobati berbagai penyakit diantaranya : melancarkan peredaran darah, menurunkan atau mengurangi kolesterol, meningkatkan kekebalan tubuh dan juga lainnya\";}', 'MAHONI_1532480837_1532662261.png', '2018-07-27 10:31:01', '2018-08-14 08:59:53'),
(2, 'Pulai', 'Alstonia scholaris', 'Alstonia', 'Apocynaceae', 'Gentianales', 'Magnoliopsida', 'Tracheophyta', 'Plantae', 'a:13:{i:0;s:101:\"Pulai termasuk ke dalam habitus pohon dengan tinggi 6-10 m dengan diameter batang mencapai 60-100 cm.\";i:1;s:85:\"Pulai berakar tunggang, dengan adanya lentisel berpori pada bagian permukaan akarnya.\";i:2;s:104:\"Kulit batang berwarna coklat terang dan terdapat getah berwarna putih susu pada bagian dalam kulit kayu.\";i:3;s:56:\"Batang yang sudah tua sangat rapuh dan mudah terkelupas.\";i:4;s:53:\"Daun pulai tergolong dalam tipe duduk daun berkarang.\";i:5;s:68:\"Bentuk daun bulat telur seperti spatula dengan ujung daun meruncing.\";i:6;s:61:\"Urat daun sangat jelas menonjol di bagian permukaan bawahnya.\";i:7;s:57:\"Tiap buku-buku batang atau tangkai terdapat 4 – 9 daun.\";i:8;s:38:\"Bunga pulai tergolong bunga biseksual.\";i:9;s:39:\"Bunga akan mengelompok pada pucuk daun.\";i:10;s:87:\"Perhiasan bunga berwarna putih kehijauan dengan bagian tepi melengkung ke bagian dalam.\";i:11;s:43:\"Buah pulai berbentuk memanjang dan ramping.\";i:12;s:66:\"Buah terdiri dari 2 folikel dan buah pulai akan pecah saat kering.\";}', 'a:1:{i:0;s:165:\"Secara ekologis A. scholaris tumbuh pada ketinggian 1 m – 1.230 m di atas permukaan laut, yaitu pada tanah berpasir dan tanah liat yang tidak pernah digenangi air.\";}', 'a:4:{i:0;s:60:\"Pulai memiliki manfaat yang dapat digunakan untuk kesehatan.\";i:1;s:104:\"Kulit kayu pulai dapat digunakan untuk mengobati malaria, asma, penyakit kulit, epilepsi dan hipertensi.\";i:2;s:77:\"Getah dari batang pulai dapat digunakan untuk mengobati sariawan dan keseleo.\";i:3;s:103:\"Kayu pulai dimanfaatkan sebagai bahan dasar pembuatan batang pensil, topeng dan kerajinan kayu lainnya.\";}', 'Pulai_1532481815_1532662651.JPG', '2018-07-27 10:37:31', '2018-08-16 13:42:25'),
(3, 'Karet', 'Hevea brasiliensis', 'Hevea', 'Euphorbiales', 'Euphorbiales', 'Dycotyledonae', 'Spermatophyta', 'Plantae', 'a:5:{i:0;s:74:\"Perakaran tanaman ini tunggang, berserabut, dengan kedalam mencapai 1,5 m.\";i:1;s:124:\"Batang tanaman ini besar dengan mencapai ketinggian 15-25 m, dan batang ini biasanya tumbuh luru diserta dengan percabangan.\";i:2;s:132:\"Daun tanaman karet ini berselang seling, dengan tangkai daun panjang dan juga memiliki anakan daun yang sangat licin serta berkilat.\";i:3;s:68:\"Bunga tanaman mejemuk yang terdapat pada ujung rantung yang berdaun.\";i:4;s:70:\"Bagian dalam buah berwarna putih dan memiliki lapisan luar yang keras.\";}', 'a:2:{i:0;s:93:\"Tanaman karet tumbuh optimal pada dataran rendah dengan ketinggian 200 m dari permukaan laut.\";i:1;s:83:\"Tanaman karet memerlukan curah hujan optimal antara 2.500 mm sampai 4.000 mm/tahun.\";}', 'a:3:{i:0;s:30:\"Bahan untuk Industri Sintetis.\";i:1;s:58:\"Kayu Banyak Digunakan dalam Industri Mebel atau Furniture.\";i:2;s:18:\"Bahan Obat-obatan.\";}', 'karet_1532589115_1532662887.jpg', '2018-07-27 10:41:27', '2018-07-27 10:41:27'),
(4, 'Jengkol', 'Archidendron pauciflorum', 'Archidendron', 'Fabaceae', 'Fabales', 'Magnoliopsida', 'Magnoliophyta', 'Plantae', 'a:2:{i:0;s:93:\"Buahnya berupa polong dan bentuknya gepeng berbelit membentuk spiral, berwarna lembayung tua.\";i:1;s:58:\"Biji buah berkulit ari tipis dengan warna coklat mengilap.\";}', 'a:2:{i:0;s:145:\"Pohon jengkol merupakan salah satu tanaman asli daerah tropis, tapi tanaman jengkol dapat tumbuh diberbagai tempat asal dekat dengan sumber air. \";i:1;s:56:\"Sebaiknya tanaman jengkol di tanam pada dataran rendah .\";}', 'a:2:{i:0;s:92:\"Dari segi nutrisi, jengkol memiliki vitamin, asam jengkolat, mineral, dan serat yang tinggi.\";i:1;s:48:\"Biji jengkol dapat dimakan segar ataupun diolah.\";}', 'jengkol_1532680225.jpg', '2018-07-27 15:30:25', '2018-07-31 09:44:06'),
(5, 'Nibung', 'Oncosperma tigillarium', 'Oncosperma', 'Arecaceae', 'Arecales', 'Liliopsida', 'Magnoliophyta', 'Plantae', 'a:5:{i:0;s:26:\"Batangnya tidak bercabang.\";i:1;s:42:\"Dapat memunculkan anakan hingga 50 batang.\";i:2;s:37:\"Tinggi pohon dapat mencapai 25 meter.\";i:3;s:70:\"Batang dan daunnya terlindungi oleh duri keras panjang berwarna hitam.\";i:4;s:77:\"Daunnya tersusun majemuk menyirip tunggal (pinnatus) yang berkesan dekoratif.\";}', 'a:2:{i:0;s:70:\"Nibung tumbuh liar di hutan-hutan paya berair payau di tepi-tepi laut.\";i:1;s:86:\"Nibung banyak tumbuh di rawa-rawa Asia Tenggara mulai dari Indocina hingga Kalimantan.\";}', 'a:2:{i:0;s:118:\"Kayu nibung sangat tahan lapuk sehingga dipakai untuk penyangga rumah-rumah di tepi sungai di Sumatera dan Kalimantan.\";i:1;s:41:\"Daun nibung digunakan sebagai atap rumah.\";}', 'nibung_1533006745.jpg', '2018-07-31 10:12:25', '2018-08-16 13:41:27'),
(6, 'Bayam Badak', 'Strombosia javanica', 'Strombosia;', 'Erythropalaceae', 'Santalales', 'Magnoliopsida', 'Magnoliophyta', 'Plantae', 'a:1:{i:0;s:48:\"Tinggi pohon dapat mencapai lebih dari 30 meter.\";}', 'a:1:{i:0;s:71:\"Dapat tumbuh di hutan hujan dengan ketinggian dataran hingga 600 meter.\";}', 'a:1:{i:0;s:43:\"Digunakan sebagai bahan bangunan dan mebel.\";}', 'bayam badak_1533101247.jpg', '2018-08-01 12:27:27', '2018-08-16 13:40:58'),
(7, 'Jati', 'Tectona grandis', 'Tectona', 'Verbenaceae', 'Lamiales', 'Magnoliopsida', 'Magnoliophyta', 'Plantae', 'a:5:{i:0;s:42:\"Pohon besar dengan batang yang bulat lurus\";i:1;s:27:\" tinggi total mencapai 40 m\";i:2;s:22:\"diameter 1,8-2,4 meter\";i:3;s:57:\"Batang bebas cabang (clear bole) dapat mencapai 18–20 m\";i:4;s:38:\"Kulit batang coklat kuning keabu-abuan\";}', 'a:3:{i:0;s:71:\"Jati dapat tumbuh di daerah dengan curah hujan 1 500 – 2 000 mm/tahun\";i:1;s:64:\" suhu 27 – 36 °C baik di dataran rendah maupun dataran tinggi\";i:2;s:80:\" Tempat yang paling baik untuk pertumbuhan jati adalah tanah dengan pH 4.5 – 7\";}', 'a:2:{i:0;s:48:\"Dipakai untuk membangun rumah dan alat pertanian\";i:1;s:73:\" Jati diolah menjadi venir (veneer) untuk melapisi wajah kayu lapis mahal\";}', 'JATI_1534209492.jpg', '2018-08-14 08:18:12', '2018-08-14 08:18:12'),
(8, 'Durian', 'Durio zibethinus', 'Durio', 'Bombacaceae', 'Malvales', 'Magnoliopsida', 'Tracheophyta', 'Plantae', 'a:3:{i:0;s:49:\"Tumbuh tinggi dapat mencapai ketinggian 25–50 m\";i:1;s:38:\"Kulit batang berwarna coklat kemerahan\";i:2;s:125:\"Buah durian bertipe kapsul berbentuk bulat, bulat telur hingga lonjong, dengan panjang hingga 25 cm dan diameter hingga 20 cm\";}', 'a:3:{i:0;s:90:\"Curah hujan yang disukai sekurang-kurangnya 1500 mm, yang tersebar merata sepanjang tahun \";i:1;s:107:\"Tanaman ini memerlukan tanah yang dalam, ringan dan berdrainase baik. Derajat keasaman optimal adalah 6-6,5\";i:2;s:111:\"Muka air tanah tidak boleh kurang dari 150 cm karena air tanah yang terlalu rendah berakibat buah kurang manis.\";}', 'a:2:{i:0;s:117:\"Durian terutama dipelihara orang untuk buahnya, yang umumnya dimakan (arilus atau salut bijinya) dalam keadaan segar.\";i:1;s:309:\"Pada musim raya durian, buah ini dapat dihasilkan dengan berlimpah, terutama di sentra-sentra produksinya di daerah. Secara tradisional, daging buah yang berlebih-lebihan ini biasa diawetkan dengan memasaknya bersama gula menjadi dodol durian (biasa disebut lempok), atau memfermentasikannya menjadi tempoyak.\";}', 'durian_1534211711.jpg', '2018-08-14 08:55:11', '2018-08-25 13:55:04'),
(9, 'Belimbing', 'Averrhoa carambola', 'Averrhoa', 'Oxalidaceae', 'Oxalidales', 'Magnoliopsida', 'Magnoliophyta', 'Plantae', 'a:3:{i:0;s:68:\"Pohon ini memiliki daun majemuk yang panjangnya dapat mencapai 50 cm\";i:1;s:61:\" bunga berwarna merah muda yang umumnya muncul di ujung dahan\";i:2;s:64:\" Pohon ini bercabang banyak dan dapat tumbuh hingga mencapai 5 m\";}', 'a:3:{i:0;s:91:\"Tidak seperi tanaman tropis lainnya, pohon belimbing tidak memerlukan banyak sinar matahari\";i:1;s:89:\"Angin yang ada tidak terlalu kencang, karena dapat menyebabkan gugurnya bunga atau buah. \";i:2;s:138:\"Curah hujan sedang, di daerah yang curah hujannya tinggi seringkali menyebabkan gugurnya bunga dan buah, sehingga produksinya akan rendah.\";}', 'a:1:{i:0;s:99:\"Buah ini renyah saat dimakan, rasanya manis dan sedikit asam. Buah ini mengandung banyak vitamin C.\";}', 'belimbing_1534213117.jpg', '2018-08-14 09:18:37', '2018-08-14 09:18:37'),
(10, 'lokal bagus', 'ilmiah bagus', 'lkj', 'lkj', 'l', 'jkl', 'j', 'Plantae', 'a:2:{i:0;s:3:\"one\";i:1;s:3:\"two\";}', 'a:1:{i:0;s:2:\"lj\";}', 'a:1:{i:0;s:2:\"lk\";}', 'striving_1535870394.png', '2018-09-03 01:08:25', '2018-09-03 01:39:55'),
(11, 'foo', 'new species', 'foo', 'foo', 'foo', 'foo', 'foo', 'Plantae', 'a:1:{i:0;s:3:\"foo\";}', 'a:1:{i:0;s:3:\"foo\";}', 'a:1:{i:0;s:3:\"foo\";}', 'IMG-20180803-WA0004_1535868996.jpg', '2018-09-03 01:16:36', '2018-09-03 01:16:36'),
(12, 'fsdjf', 'another', 'jlkj', 'lk', 'jlk', 'jlk', 'jl', 'Plantae', 'a:1:{i:0;s:3:\"lkj\";}', 'a:1:{i:0;s:2:\"lj\";}', 'a:1:{i:0;s:3:\"llk\";}', 'Untitled-6_1535869213.jpg', '2018-09-03 01:20:13', '2018-09-03 01:20:13'),
(13, 'last', 'last', 'jl', 'jl', 'jlk', 'j', 'lkj', 'Plantae', 'a:1:{i:0;s:2:\"lj\";}', 'a:1:{i:0;s:2:\"lj\";}', 'a:1:{i:0;s:2:\"lk\";}', 'OVALuckyStarcosplayinMiku_1535869440.jpg', '2018-09-03 01:24:00', '2018-09-03 01:24:00'),
(14, 'Miku Chan', 'Hatsune Miku Kawaii', 'MIku', 'Miku', 'Miku', 'Miku', 'Miku', 'Plantae', 'a:1:{i:0;s:6:\"B Miku\";}', 'a:1:{i:0;s:8:\"B Tumbuh\";}', 'a:1:{i:0;s:9:\"B Manfaat\";}', 'Untitled-4_1535874411.jpg', '2018-09-03 02:46:52', '2018-09-03 02:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `trees`
--

CREATE TABLE `trees` (
  `id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `tgl_tanam` date DEFAULT NULL,
  `species_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trees`
--

INSERT INTO `trees` (`id`, `latitude`, `longitude`, `tgl_tanam`, `species_id`, `created_at`, `updated_at`) VALUES
('PLANT_1', NULL, NULL, NULL, 1, '2018-08-30 12:00:00', '2018-08-30 12:00:00'),
('PLANT_10', '-1.65248300', '103.58509500', NULL, 2, NULL, NULL),
('PLANT_2', '-1.65308300', '103.58328200', '2018-08-28', 8, '2018-08-09 12:00:00', '2018-09-03 00:16:36'),
('PLANT_3', NULL, NULL, '1980-07-08', 3, NULL, NULL),
('PLANT_39', NULL, NULL, NULL, 14, '2018-09-03 03:05:06', '2018-09-03 03:05:06'),
('PLANT_4', NULL, NULL, NULL, 4, NULL, NULL),
('PLANT_5', NULL, NULL, NULL, 5, NULL, NULL),
('PLANT_8', '-1.65389300', '103.58509500', '1990-08-20', 8, NULL, NULL),
('PLANT_9', '-1.65343800', '103.58510800', NULL, 9, NULL, NULL),
('PLANT_MIKU', '10.00000000', '39.00000000', '2007-08-31', 14, '2018-09-03 02:51:11', '2018-09-03 02:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$wECpFrjXtdINsjtpCBrccOOb.CP5E1FXK2QDxZsg5kPjyn7JOrL.e', 'xo37MlGuEJRNspNALOyaXvm1aVQ3jnmWDv45k0ZNAOHnacWFcDXNQ4RiyZct', '2018-06-21 05:59:55', '2018-06-21 05:59:55'),
(2, 'Norman', 'norman', '$2y$10$yn9hxPcAt6SaRyywK5vBBuWiksLoWzdMqcOuxCcx1H5g/UDSXtAue', NULL, '2018-06-21 06:00:25', '2018-06-21 06:00:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trees`
--
ALTER TABLE `trees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
