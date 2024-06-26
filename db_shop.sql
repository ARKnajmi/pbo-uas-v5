-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2024 pada 12.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Rafi', 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(0, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(17, 'Minuman'),
(18, 'Skincare'),
(19, 'Obat-Obatan'),
(20, 'Lainnya'),
(21, 'Makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(4, 'Ahmad', 'Tangerang, Banten', 'legok', 'Indonesia', '19520', '1391128749138', 'ahmad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Ahmad Rafi Kannajmi', 'Tangerang, Banten', 'legok', 'Indonesia', '15820', '09999999999', 'rafi@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(41, 5, 48, 'Chitato Lite Snack Potato Beef Barbeque 68G', 1, 13000.00, 'uploads/973e7440f6.jpeg', '2024-06-26 16:33:42', 0),
(42, 5, 48, 'Chitato Lite Snack Potato Beef Barbeque 68G', 1, 13000.00, 'uploads/973e7440f6.jpeg', '2024-06-26 16:57:23', 0),
(43, 5, 53, 'Emina Bright Stuff Face Wash 50Ml', 3, 600.00, 'uploads/b863432f90.jpeg', '2024-06-26 16:57:23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(41, 'Pop Mie Rasa Kari Ayam 75g', 21, 0, 'Pop Mie dengan cita rasa dan aroma kari yang nikmat. Terbuat dari tepung terigu berkualitas dengan paduan rempah-rempah pilihan terbaik, serta diproses dengan higienis menggunakan standar internasional dan teknologi berkualitas tinggi. Juga dilengkapi top', 5000, 'uploads/89585def20.jpg', 0),
(42, 'Milo Activ-Go Cokelat', 17, 0, 'Nestle Milo Activ-Go merupakan minuman serbuk cokelat paduan dan ekstrak malt (barli) yang unik dengan kombinasi Vitamin B2, B3, B6, B12, C dan D serta kalsium, fosfor dan zat besi untuk mendukung aktivitas sepanjang hari.', 7900, 'uploads/63b97b71c1.jpg', 0),
(43, 'Minuman Nata De Coco Lychee', 17, 0, 'Minuman dalam kemasan dari mogu mogu ini dibuat dengan rasa buah leci yang segar berpadu dengan nata de coco yang chewy.', 10000, 'uploads/b10c383c7b.jpeg', 1),
(44, 'Floridina Juice Pulp Orange 350mL', 17, 0, 'Floridina minuman rasa jeruk dengan bulir utuh jeruk asli yang mengandung vitamin C. Terbuat dari jeruk floridina berkualitas.', 3200, 'uploads/f96211890f.jpeg', 1),
(45, 'Buavita Juice Slim Korean White Peach 245mL', 17, 0, 'BUAVITA Jus Buah Asli Korean White Peach Minuman Colagen 1000mg Kaya Vitamin C.', 10500, 'uploads/14b255238b.jpeg', 1),
(46, 'Fruitamin Minuman Coco Bit Splash Coco 350Ml', 17, 0, 'Minuman dalam kemasan yang menyegarkan dengan potongan nata de coco didalamnya.', 7200, 'uploads/0fa34b5dfd.jpeg', 0),
(47, 'Cap Badak Larutan Penyegar Leci 320mL', 17, 0, 'Mengobati sariawan, panas dalam, sakit tenggorokan, susah buang air besar.', 7000, 'uploads/ac53f787b6.jpeg', 1),
(48, 'Chitato Lite Snack Potato Beef Barbeque 68G', 21, 0, 'Chitato Lite, terbuat dari kentang asli pilihan yang diiris lebih tipis dan dipadu dengan bumbu berkualitas. Jadikan semua momen lebih ringan dengan Chitato Lite.', 13000, 'uploads/973e7440f6.jpeg', 0),
(49, 'Roma Crackers Malkist Abon 105G', 21, 0, 'Roma malkist abon dapat menjadi pilihan kamu untuk menikmati waktu luang atau waktu kerja kamu jadi lebih asyik dan tidak membosankan bersama keluarga atau teman kerja. Selain itu, dapat juga kamu nikmati sebagai menu sarapan pagi dilengkapi dengan secang', 8000, 'uploads/86c9ea4d72.jpeg', 1),
(50, 'Abc Sardines Tomat 425G', 21, 0, 'ABC Sarden Tomat 425g adalah resep masakan bahan dasar ikan yang dihasilkan dari perpaduan ikan terbaik dan bumbu berkualitas. Sarden ABC ini hadir dalam kemasan kaleng dan siap dimasak kapan saja sehingga dapat Anda nikmati setiap hari.', 29500, 'uploads/853fa326f8.jpeg', 1),
(51, 'Super Bubur Instant Bergizi Ayam 45G', 21, 0, 'Bubur instan bergizi dengan bumbu lengkap, mudah dan praktis.', 3500, 'uploads/43af28cd3e.jpeg', 1),
(52, 'Cetaphil Moisturizing Cream 453G', 18, 0, 'Pelembap dengan kandungan yang memberikan kekuatan ekstra untuk melembutkan dan melembapkan kulit sensitif dan yang sangat kering. Dengan teknologi yang membantu menjaga kelembapan kulit sejak hari pertama. Teruji secara klinis dapat memberikan kelembapan dan perlindungan tahan lama. Kandungan Almond Oilmembantu melembapkan kulit . Cepat diserap dan memberikan rasa halus, lembut, dan terlindungi pada kulit.. Hypoallergenic. Baik digunakan untuk kulit sensitif dan yang sangat kering. Teruji secara dermatologi.', 605000, 'uploads/57c2f969aa.jpeg', 1),
(53, 'Emina Bright Stuff Face Wash 50Ml', 18, 0, 'Emina face wash, Hilangkan kotoran dan kusam pada wajah untuk mendapatkan kulit yang lebih cerah.', 16500, 'uploads/b863432f90.jpeg', 1),
(54, 'The Originote Hyalucera Moisturizer 50mL', 18, 0, 'Moisturizer yang diformulasikan dengan 2 jenis Hyaluron, Ceramide dan Chlorelina yang dapat membantu merawat skin barrier, serta menjaga keremajaan kulit. Mengunci hidrasi pada kulit sehingga membuat kulit terasa kencang dan kekencangan kulit terjaga, mencegah tanda-tanda penuaan dini dengan menjaga kelembapan kulit.', 47200, 'uploads/4e0fa88d5a.jpeg', 1),
(55, 'Wardah Acnederm Micellar Water Acne Care 100mL', 18, 0, 'Wardah Acnederm Acne Care Micellar Water yang cocok digunakan untuk kulit berminyak hingga mudah berjerawat. Dengan 3 Powerful Actions yang mampu membersihkan hingga ke pori-pori tapi lembut untuk melarutkan makeup dan kotoran, dengan tetap menjaga skin barrier.', 35100, 'uploads/66e33cc32b.jpeg', 1),
(56, 'Skintific Brightening Serum 10% Niacinamide 20mL', 18, 0, 'Serum pencerah yang mengandung 10% Niacinamide, yang sama dengan niacinamide pada SK-II, Arbutin, Ceramide, and Centella Asiatica. Dapat mencerahkan dengan cepat, menghilangkan bekas jerawat dan bekas terbakar sinar matahari dalam 7 hari. Niacinamide yang digunakan adalah Niacinamide paling terbaik di dunia, Royal DSM Niacinamide, yang dapat melindungi skin barrier dan mencerahkan secara mendalam.', 133500, 'uploads/732cf6f66e.jpeg', 1),
(57, 'Entrostop Obat Diare 10&#039;S', 19, 0, 'Attapulgite &amp; Pectin, dapat menyerap racun / bakteri penyebab diare dan mengurangi frekuensi buang air besar.', 10300, 'uploads/c36178638c.jpeg', 1),
(58, 'Termorex Plus Sirup Obat Flu Jeruk 60Ml', 19, 0, 'Sirup obat flu yang disertai batuk tanpa alkohol dengan rasa jeruk yang disukai anak-anak. Untuk meringankan gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin yang disertai batuk.', 20500, 'uploads/8560955f3e.jpeg', 1),
(59, 'Bodrex Extra Obat Sakit Kepala 4&#039;S', 19, 0, 'obat dengan kandungan Paracetamol, ibuprofen, caffeine. Obat ini dapat digunakan untuk meredakan sakit kepala.', 2600, 'uploads/e956266104.jpeg', 1),
(60, 'Antimo Obat Anti Mabuk 10&#039;S', 19, 0, 'Cocok dibawa berpergian setiap saat', 5800, 'uploads/c850a417bd.jpeg', 1),
(61, 'Sido Muncul Jamu Tolak Angin Cair + Madu 12x15mL', 19, 0, 'Obat herbal untuk masuk angin+madu, meradakan mual, kembung, sakit perut, melegakan tenggorokan dan memelihara daya tahan tubuh.', 49500, 'uploads/cef5fecdbd.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indeks untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indeks untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
