-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 05:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_nhac_cu`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_don_ban`
--

CREATE TABLE `chi_tiet_hoa_don_ban` (
  `SoHD` int(11) NOT NULL,
  `MaNC` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNC` int(11) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang_san_xuat`
--

CREATE TABLE `hang_san_xuat` (
  `MaHSX` int(11) NOT NULL,
  `TenHSX` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hang_san_xuat`
--

INSERT INTO `hang_san_xuat` (`MaHSX`, `TenHSX`, `DiaChi`, `SDT`) VALUES
(1, 'CÔNG TY TNHH SẢN XUẤT – THƯƠNG MẠI VÀ DỊCH VỤ QUEEN’S GUITARS', 'Số 100 Đường Nguyễn Thiện Thuật, Phường 02, Quận 3, Thành phố Hồ Chí Minh', '0313550560'),
(2, 'CÔNG TY TNHH SÁO TRÚC MÃO MÈO', 'Số 8, ngõ 2, đường Cao Lỗ, Phường Lê Mao, Thành phố Vinh, Tỉnh Nghệ An', '0316186575'),
(3, 'CÔNG TY TNHH NHẠC CỤ GUITAR HAT', 'Tổ 8 - Phường Phú Lương - Quận Hà Đông - Hà Nội', '0316346344'),
(4, 'CÔNG TY CỔ PHẦN XUẤT NHẬP KHẨU VÀ CHẾ TÁC NHẠC CỤ BWG', 'Số 10 ngõ 9 phố Huỳnh Thúc Kháng - Phường Láng Hạ - Quận Đống đa - Hà Nội', '04674557455'),
(5, 'CÔNG TY TNHH NGHỆ THUẬT VÀ TRUYỀN THÔNG NHÂN QUÝ', '29/16 Đường số 5 - Phường Tăng Nhơn Phú B - Quận 9 - TP Hồ Chí Minh', '0313234555'),
(6, 'CÔNG TY TNHH SẢN XUẤT VÀ XUẤT NHẬP KHẨU GUITAR GỖ', '5/7, Tổ 6, Suối Cát 1 - Xã Suối Cát - Huyện Xuân Lộc - Đồng Nai', '08967464224'),
(7, 'CÔNG TY TNHH MỘT THÀNH VIÊN LÂM MINH NGUYỆT', 'Số 9, Ngách 82/23 Phố Nguyễn Phúc Lai - Phường ô Chợ Dừa - Quận Đống đa - Hà Nội', '01345656564'),
(10, 'CÔNG TY ABC XYZ', 'Số 7 Nguyễn Trung Trực Ninh Hòa Khánh Hòa', '0134569852'),
(11, '46', '56', '213123'),
(12, '3', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_ban`
--

CREATE TABLE `hoa_don_ban` (
  `SoHD` int(11) NOT NULL,
  `NgayDH` datetime NOT NULL,
  `NgayGH` datetime DEFAULT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) DEFAULT NULL,
  `TinhTrangDuyet` tinyint(1) NOT NULL,
  `TinhTrangDonHang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` int(11) NOT NULL,
  `HoTenKH` varchar(100) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `TaiKhoan` varchar(30) NOT NULL,
  `MatKhau` varchar(500) NOT NULL,
  `HinhKH` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `HoTenKH`, `SDT`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `HinhKH`) VALUES
(1, 'Nguyễn Văn An', '246', 'nguyenvanan@gmail.com', 'Khánh Hòa', '2', '202cb962ac59075b964b07152d234b70', 0xffd8ffe000104a46494600010100000100010000ffdb008400090607141312151313131616151618181b181818181a1b201617171a17171a181b1a1a1d28201a1d251d181d213121262a2b2e2e2e171f3338332d37282d2e2b010a0a0a0e0d0e1b10101b2d2520262d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2dffc000110800a9012b03012200021101031101ffc4001b00000203010101000000000000000000000405020306010700ffc40047100001030203040705060306040701000001020311002104123105415161061322718191a1324252b1c114236272d1f03392e1154382a2b2c20724d2f11634546373839353ffc4001a010003010101010000000000000000000002030401050006ffc4003c110001030203030b0301070403000000000100021103210412314151a105132261718191b1d1e1f01432c1423352627292c2d21582b2f1232453ffda000c03010002110311003f00c8e2b0895b59d29208de0c8f11bab57b3b18a2d61df9ba32b6b8fafef7d79cb58b2998820ee3fb9ad9743b6e36a41c338bbb83b20a6c17ba14388e3c2be819565d054dca587a18aa3ce33a0f609dd3b1dbb65f69b6896f48a138b71247655da116b2bfad2953324c6ee35afe9d6c80b6da79021483d5aef22371b5f5f9d6152f94122dc2f42fa8260aa68baa7360571716246d207a41ef535375514d5c1d0473a8b96e07ba80844694dc2a08ae55e5dece5dd33f4aa09a130128d372fab73d16c2a70b87562dd1da527b038275f357cab23b2307d7bedb5f12afc922ea3e429ff4ff00694ad0c26c940920713648f01f3a653162e5cbc735d5aa370cdd0dddfca3677a45b471ca7dc2e2cdceee0380e554a37d0b98d5ad397a26b8e6babc530d100595c457d55ad660557d6530900a200a281ab52680eb6bbd6d35956116528f06a69552f4bc6ac0e1aae95624d916528f0aafb35005da8f5a6a8e7a17b2147e7aad4aa08ba78d565d3c6a4af5acb39b28f2aaeb46e20c11a1e0771a5a5c3c6ac6566fbea2ce095e6d1975d6b3a56a0e8631204175bcabff00e446bfbe543a4869bbe5cc3b40eb9a774eff009506c627fe442957eaf1675e0b6a4fa9af94a0e2728331747d53497b805472361e693f29e934b9a2770363e506fa75a116e49249b9bd7330a171d86cb053394e9cb955185654e2d2da6ea510078efee1af852b3c952d5c33a9b887988d7cfc96d3602831877712753d84778bff00aa0ff80d22c3e2f22828112349837e37a9f491d953785665486845b55391727b8493cd4aacfc1dd5b51d96db94386c3670ea8ed5fb3f8764f7279f6804c95093adebbf6847c42942d998ca15a5c98d77c72ab10c399720b24992389dd317349359a3554fd2c8905344e25b9ba855aac531f124f85274eca5ef8145e1f604c4ac09d341cb79a0fab6e912bc705fc451df6dc36fc9e46ba9c5e0f7a41ff0d1981e8836ab294a989b11c62282da8d6130cbc85b2b58d44e83504936b8a4ff00a834986b67b07ac2d7727e476473dc0c4c4dd10ced4c02625b240331907d698b7b6b0aa00a59565ddd94eeb71aa362a1f7bb4d6110846b98a65447119a001ccf84e94c1edaaea5452a30a1623a84988e6489f21dc34ac772954cd932b4751227bc3418ef4a1c9b48dc3de7bede2627ba636af3d15d6dd292140c10641e045ea2d3a5242924822e08dc6adc662d4eab32c82ae3004f7c0b9aa41b4cdd5179822df362f45d9bb583cda5c3742c65753a655f19171c456671797ed2b6dc4dc5bb579e0411074df4b7a3db57a85c2aed2ecb1c382c7314ff00a4db33ad40526ee3699047f78ceb6e253af7556e22ad3cc351aa9b058ca9c9f5f987f4a9ba089be9617ea163d5077acdbd80397326f788f973aa938920c2f75af516768ac009994833fb3ad32538dbfd6295a84889379e5264f9d4cd711a2efb2953a9fb0741fdd3b6c67a90ce2c2929e2045b7dcdf8cd0c6aec46ce5a0820cc89e103c7e954a5e06c779a639f98df548734b0e578ca7ad69bfe1fb3388717f034a8ef5148fa525dace759887553ed2c8f00728f4029ef41acb7e0db220f80589f9d66b19fc458e0b50f534e272d30b9b49bff00b9549d61a3ba25422a4d883554d4d0afdf3a6d2ac0912ac2d57e5b11c0cd0ee0bd1dd5993dd4391a7955951ad84a60549028dc26c875c198272a37ad672a7f98ebe147061bc3005c4871f224367d96c6e539c55f8681c7631c78e671455c06e1dc3414ac8c4a151f53f67a7ef1fc0b4f69b76a25381c323dbc4159e0d2647f32ac7caa6b77063dcc41e799b14a8375dcb5e0f6b02d341c757bbba07904cc8c1ab45bcd9fc494a87a5ea188d8eaca56d292f206a5064a7f327514b3aba3308e29b505a1452a1bc1f9f1ee34ba75f312bdcdd4176be7a9d7e3123e5904aaa6b498f692eb7d7a5212a9caea46998dc2c0dc1506dc452729a4626a14e63f309f80a1020d5c89157815d4264c0124e8389e15273a762634c14d95831fd9e88b75b895abb821beacf84d26658524c8d453ce9139d5a9bc3a4d986c255cdd3da5fa98f0a569c5a46bad139f98c4c42560e39be71b62e25de26dc211f872973b3a13700f1dfe069c61b63270cd9c4803ac71252ca4eef8957fdc0e74a76561d2e667564a5a6aeb3c7784a799f4f2a8e2ba58a75c529c4809021b4fc00580b52c87b6fe0aea988a58d3f4f5ad1771f26f7edea8de97a51124efd79ceb35621a048006b5dc4a0919d060ea3b8f7d2858527da9fdeb4a6b09b38a56228ba8ba08ec3b0a60714906aa56d31b8502eb57b191c622a0a6c8d681d4180ef49ce514769af90eea2364ed2c8e85ad4a294cd81de4102c4c6fa56a147617669290b70f5683a123b4bfc89d4f7e95e2c681a2ccf056b307d2a6c5836e2965204009034008cc4f1df150da58f610b538eb2953e62c4921060659b6e005c83dc666b34e62d293f729c9bb3a8e651eef86795fbb4ae61ec415b529d6f3206a6fa91df52734d6f49b3e3b3abe1ea847526ad42f79b9038002fe1a0ef566336a3ce76895000c802401cf9f79a230189516c69bfe66abdabb4d6e882006e480a006ed01d2fca055bb39c1d5a7c7e6698c6b48988f9e6b1c52b6708b5825092a09d637786b5454872a965ab0b8424c195169a52ac94951d60026de15a2e8d6d8cb0cba6003f76b3ee1f80f2f9567d0a20c8b1e22d5f2afad1b2af3673049af41b59b95da6cde13ce946c5c84bada613efa47b84fbc3f01f4359f8ad46c1dba2cd3e6d10959bc0d32b9c53bbf76a76f6c12dcb8d8946a53ae41c471473ddbf8d32a35ae19d9a6d1b9230f59ec77335b5d87611f3e6d2af0b8f5273037911dc3eb44ab0edb82530984df99fad2e02bb148ccbb6cc4ba325519875ebe3aa7dd1accc625295fb2b496cf2eb458ff0030154f4830812faf766ed78930a1e0a0a1e1426171e44055c483ced5adda3844e3f0e1f6a3ad47f100f8cda237050008e60f1a736a7472953be9345615295dae1041d41d97dbbbb8ac5ab0e4098b4c4f3efafb2d5c870a6506e37f78df517809b72ac711120f72641ba2da760a4f110698ec66424baf2802194e648dc57ee0f3bf8528f701e069becc329c4363de4254071cb33fea07c0d5ecac4d8fcb28eb0e8107aa7b26fc0c24ef82a51528ca892493bc9df552934426a04898e549acdb4aa8b61511521512b1512ed48265610adae87050c5c356619a2e2b20ba8e839d3a935f36425d024a6b8274063113a1ea878e791e8154b54f0ab71ce25094b293394952d43de7222dc922c3bcd2fcd5439cd16252a9124176f33c00e313de885bdc298ec95754938a5e8890ca4fbefea0fe546a79c50db2b6617415ac94b48f69405c9f811c547d37d7db41c53aa1d908420656db17c89e1cc9d49a43cd31d2010549ad349ba7ea3fdbda76ee1ade12e79d52892a24924924ef26e4d15b2766a9e51f7509bb8e1d103ea4ee14d765f4714e0eb1c21a653ed38bdff8523de572a2768e299c81a403d526e9483198ef52f7a89f4a9f3b05c94f7b2a1395b63b49d9dda93d50779d12ec763f3436d02965b9c8917cc77a97ccfef955fd94a509cb9677931037db53440da694c4009e3005e8277699249137e345cf178802cb594e8d26e56c9e13bc93a93bd1ed3086c09513038d8cf2a13198c6e67282795018924de49154a112400249dc37d24b1d304a6bb12e73326cf9bd10ac6982900006a2db0a5e9a0de4c01de4d5c9c3a53755cfc2936f157d079d43ace500dc01a0eeaf021b653893a224043490a4e55ae7558909de0a5075d3557950aac52965456731379357e21b10058280dd70a9363ca0588f950b8800119445ae39f2e54a3d2d423020a3f029437db5098f0ee8b1aa719b494b232129beeb13e354e19524249396448024c7215cc5b484986d5986e3041f1040834ac83349bf9225162672188de09304a6634d0f0a698040eac78fccd2658244c78f1a73b387dda7c7e669884e8964558528cb39959fe18b47199fa5555f510280dd49b891331be0c1f0306bae449898dd3af8c5440a936893120733a56c9d17ac2ebe4a86520a4127454991f434df62ede533085cadbe1bd1f94fd29445e0e93a8fa571c89b5c73b5136a3986425d4a14eab72b84fcd46e3d8b4b8fd888793d761540f148b0f2f70f2d3bab3ae36524a540823506c455d87c729b505b7d8206e26fde0ebdda5371b5d9c4009c42322f40e205bcb51ea39530e4a9a58f0486bab5010ee9377fea1ddb7bae9134d951006a6b4bd1bda0a6005370750a49d1609d0f203d696e2f62388fbc68f5a8d429113e9f4ae621ccad40b188eee3e7a7857b296eabb1c9cfa555b51d62dcb7f9b130da1b352f0388c3dc1bad075493c471e7a1efb1cead70483babb82c62db39d0a2950de3e446f1c8d3256318c40fbe4f54e7c681d9279a6e53ebe14c2d6bf4b1dcb980d4a2035d2e1bf523b46a7b45f7842e1dd050a1bc41abf0f8b28536b1a8f51a107888b4558dec4584a94821c4ee520836e6069403f2137041074d2aea2d0d6e67ee58daaca848699f74cdc690f125a3957bdb2753f84eff009fce96bf865215da0a1df55026c7ba8a6f14ec405abb8dfd0d7aa54a445d35a1e2cd33dbaf043757520c13ec827b851e31ae0cb31fca9fd2b45b13a3b8cc4dc92db76398f66dc85a94fc4615acccf3946f364439d2632f1f65976367287b6423bee7c122f525385272320a4930547da55fd9fc2390af57d99b1b0583ed13d73bf11bdf96ea874a3a36d628079a391c1065205e371ae3d4e5fa248a6c690dd03c8b13f36a68c2977dc67abda6fdebcfb6a743710d00ea9a3d5a939a53da89dc40bd5784d889400bc47641f65b27b6be123dc1ccdebd3360ed8ebcf52a0a43ad5b2afde403adad044f9560ba6db3528c495970210a04c4152a4120e548f0de229785c5d4ab579aa8d01d0488d2df2411aa655a6d653cc498e26748b1e027710966331e1640f6929b21b40ca948e0902e49e3a9abcb88606676c7732dd8f22ea8fb2396bdd49c6d109052c028fc6482b571be89ee4f9d0691ce66ba41807dc64f0521a9508cace837abee3df723c49ec4663f6db8e9ed0000b2522c10390fad02e62277544a8fad452924c0173b8501025135a1a20289356204daf7d2a4ac394ebc6e37fe82a697483d9ec70235b5c5f5fa50e65b7d8a68c31008590394dc73e5ddaf2a9a710507b2902fa448583b95f10fddab8a208cc60924e64c68759ee3fad45699d040006971c3e75a4e76c2c88b95662598485a07dd9311a96d7f0a8ebdc778e743939af1a0bf771abf0cbc9729cc0f6549360e2446f1bc71e37a8e299c9956927ab5c942e3c0a5516cc378ee3bea62e3395daecf9f25385ee15285441249bf1f59dc689eb02a082029379f8afbb9f11e5436504123c47d472f9543ac200fa6e35b1990e8a6506eab0503240dd3a11cabae62b32b32803c88f0dda1a2196d2e14a54aead4265464c81c071e23cb850ee329830a3986e8d78c5646c76ab7b145c7133ec08e049f9eb4d700a1d58f6b7fccd256dcbeb112477d38d9bfc31deaff0051a3cd684b31aa593cbc6be0a8ab15827750824714f6879a66873ac1b77eeaf1076a1041d15855502aa883c6f51cd5e01129955702bf62a35ca210bd2acce01d245e26df23f5aee1f10a428292608fddea58970aa2d1952136fc3bebec2b4b52825b4a8ab824126f4c3d1758a0896c153c2629c6ce66d453262c75ef1bfc6b51b636da1494a5f652bfc48191503c7769bb7d47657fc3ec52a16e6465220f6d578ee15a173a13872a4f5b8ad372536f5a91fca987a562f9ee2ef20ab6619aea4f310e310458f88bac81d9787727ab7948e0974409fcc2deb43ffe197fdd0958e285857f5af413d04c38054d3a4aa0fb424788af3fc6b8e30eada0a8520c128b4ef0445c5a3ce9b439430b89fd9ea3b470487e1aa53b97db6489e2329f353d9fb39e6d60e5711ba60a7d69aa318b295070b6b0373802bd009aef46118cc52e13882108172b39b5980071b7a5471b897d979c6dd4b672ef2da7b40e8418b822f5750aec71e6daeb8d476a96bb07defa41dd731fdb3c551f6dc3a932596c91b9b0a47a926aa56d1c2ffe997ffeeaff00a688e8d85e29e0d0c3b396656bea4425239e809d077d6e3fb030a74c3a5204c2c0489d041277926408d054788c652a2e0d2492770d070f0d55345b55d25ac8ff00713eab19b2f6ee1900e463b62e9eb5656078c5a8d7fa4b8e7876506349424a84721a0f2ad1e27610290861252ace029c39414260a8a9412008805200bc91a50983e8bb4550b7f12e952b280579048d4db909eed6a6e7f039b9d74b8e9713f920752aa2b3ba05a075871f404f5dd63b18d6257fc5780e4a723fc8993e94d7a3bd20185197ac5ba91af672a527824a8c9eeb0eead7ecce8de19b513943a53abae04ab2ce62201b08005ee4923c315ff11724b0509482a0e939404ca42c2504816dcabf7d1bb1787c538d0c920ed3f81a8434e89a32fcddc0478ea78adfec9da6d3d0fb4418b1317048f6543506fa1a25e6d202150939cfb4b121260cf8cdbc6bc4b67639e657d634a2956874850e0a06ca1df5e93d1ae9521e86d4aea9c1aa67b0e7e4528100fe1579d726bf273e9039492dd9bc46cf0f2553312d744d8f0476dce8fb388195494870c00b00254927436b2933af8d79038c9d40b719b48b403bebdbb1b8b6db28eb4ae759020a41e02441bee1c75ac7f4e3603680a79b0010e842f2fb2a2a4150504e895088205ae0da9fc9d8ac839a7199fb7b774f5a5e229e6e90b6f58838694e6998306371d624eb515a8c18848e03f7268ec0bd9561319b31cb9409255bac35bd313d11c48273b684820d9c7508337dc553e75d4a9580124c7e54829de12830539920920419de38db87ca855b438f77e947e23676230c429c429026cab290774664929322d134ff0067747d86d94bcfe65f5c9ccdb20e5ca83a15ab5ee8dd1533aab698927b22e9a185d60b28c3a41044122d045942220d7cea20033650310776f0477eeeead7f57862403846c03f0a9ccd1bf292bd7bed59ddb1b38b0ea926eda8052142d99264256277da08dc4114546bb5e48b84352939b72842e081133cc589ae318a290a0a12dafda4702345278287f4a19648d678ff005ae383cff77aa1eccfaea94d3955b886d4da85c1044a5434524eff00a11bb4aa5426e0778e1fd2ae6b120a436b1d993046a927de1f5143ba9caa89d38500041bea8bc9712adf3450733932a2081d9848b91a7713c6859b1037ebe1510688c1b9420c2bf1ab072c2424c5e0c8278f23c4531d9dfc34f8fccd26d69e6cd3f769f1f99a1b6c585028c5dae86e7884e52794a22af4ed23690638672af45850a160109b440837d4c933ea3caa01af4a01616b2d2d07500f7221c710bdd94f10947fb7283577d999205c8240f886a26632abe7428401adbf5a9180019adce77f92cc8372286ca412407876666524e9accc556765f075a3cb344f81aa9a4833240fac903ebe9446cec3758f36dcc05388478296949f1824d7b9c20493f3c57b2ee3e5e89bec1e88adf871c50433f10214547e1481f3fd8758adae3083aac161ce977120a893cd4254a3dd1de69fed560b8cad864841c852d8d04f66533b8948299e75e58e605c42ca56852142c4292526d3e7a6b5cdc3b8639e5d53edd8d9e277aa2a34d110dd77fa23f11b5f16acdd6177b4088caa4ef06440049b46fd693ac2b52147be69cec5d978971c6d486dc290b4c982001324926045a9eec4e8a64ed625deb0a6e5b6d472a63ffeaf1b01c85fbf4abdd88a544653023402252853a8f323f2b43d14c396708da739714e0949dc33dc2137981bcf7d2fdabd0f69e79c7d6f2c02a4821094dd41294e5493a9b0ddbe8867a4cc92e0ce12b8010b2950484e8528012488b5cc15700052ec4f4c18465095b8a2ce89080805437e65289b9939b2cdf415c563314daae7b0105c6f6dfc345697532d0d71d13ad8bd1b670ef12d75925202c2945494cc9b81198d8eb6116d6f0e95ecd4bec7581494a992a20c5d6d84994ccda5644731ce86c3e31c284b8b0db01d01591c71d71453b8e4425062e08cca3aeea43d2e389406f394f513282d486d67892492571b96646eab300daa6be62fe90d6f3b60f6ee48c4160a4401629f7433065ac28f68fda1d528c03084261064e809093ae9229f23192a2e0eacb40008521c4e44aa41891798b18137e75e5ee6c7c5384754cbcb41be8aca79c9ecd3dd9db3f1cc3650d2994ab329ceaca9b5aec81250005428653bc51e330839c738bc4971b751f1d1650ac720006c4eb687489a6bae43af10ace7386d057052026093027b274f134c71f8b43694ba52b01a63ac536920f64901292624a959866bc0beb58ac2ec16fa943cfbebfbe054108405120a8c952d6ab92470df5a6c1e3db2a65210e029c8df5a5c851498402a0900709eea454a749a2197dfddb939ae79b9576c879d71971c75b6d0b704b52082122eb7940d928488bc09bf29c46da53b8a7f3619a756d04a5b68a5b51ec37d99240b4aa5573ef533c76d0c4e2250b84652a2b4266e513216a512a5c11a131ca9b25c270c84256afb83d52c02403202d0605b42533f829e2a0a079c0049b40360367cb25c17f449f159467a278a529092ce42b300ad4980424a88565260c024037347603a2880b4073188073007236b58b902ea5650079d3cd958c5e1d6168837ba4e8a0371fa1dd556d34254e15360842ee07c33aa7c294ec7d62eb5bb3dd3861dba147fdde094a614975f4a4d92e9414a7f20c84a7f9a2adda58e5968a406945950b96d242997656cbc949195322526ded20d736823ed0c21d3fc46fb0e73cba2bc44555b3c26139d44644ad16139da5f6b21bd8a1c1981fc44521d97ee3aea8dad803aac54364a92a2e3f03ed4db4a0820012824490008cc9169e0ae54bb0ec17960154124ca8c9d013a6a4da2398a3b0ad142c291b8da778de0f222de357b982015991394dc711cbbc1f952cd7009bfb2665fdd4b5285b7052a0a43899d250e20ee5255a8dc41122fbe8ddaac8710d38d8848425b2999c85000cb26f11104ee34c1e6814e5c80092a993aabda81a004de06f26bace1b2836949171f250e63f5a51ac3322ca752b31b55b7d38550c3e74ac3999ceae7329bca00b8b909503207c535875625d7963329c755a004a96a8e09d4f80af5dc03ed92722e1483044c1491c46a3eb45b382690a2e250d059d5612904ceb26a9a7ca4ca20b5cce96fd3dd21f86350e669b2f142a33955222d04411c88dd558041ada7fc41d98dff00e610a19a4257f8f7020fbca1a1e51c2b26d042841242b71ddcebb985aa2bb03c6d5cfacde689050ce57c95c883e1cbfa54b10de5544cc6ff00d395544536a35034d97c85106418af9498a9a00de7bbbeb996620198bf7f850116bad5c489a71b3bf869f1f99a56ac2ae2722bc8d36d9a83d5a6c77eee66b362f3811aa054b1038e9e1bbc4deab2748aebc440005e6667770e679f7556922d3cfc6d4a025195342ee6d35d75c0026d7d4f0dfe9551720102d3ad7d88327ba2b436ebc4d94e404a4cc9333cb48fdf2a9b4e149491992a90a066220c823ca68770d879fa98a9a099e34410caf4f4633acc334faca3ac589594b884205c81982d432af881bcd06f74ad2d767ed2a5103d964759fe7514a7c89af38cbddff7a9b662fcaa06f26d39b9e0150712e85eb1b3a719870fa56f281565c8548cd68cc72cc58198998d291e17a56c80425dc4b404dbab411a81a25c1c683e806d1c8eab0aa5c07802da81f631004a083ba44a4f8511d2ad941e4398a6d212f207fccb606b047df246ed3b43c7be6e618caeea4f1d86dc7d7788462a38b3304df05b656f909c3e333accc36b4a9b52a04c273029518dc15476cb616f2b362da6ba9402a5175a46631a65b66d62fa6ebd797b0e84a90a4920f57729370a9541e46c2b5db01654d633b454a52f0e4a89925250bb49dc0fce9b8ac1734d25a6c23b44f588e286957e708046b3c13bc76df421c5a99405158852dded4a75ca13a2472e42877312de270e70efb412d66cd2c8c852a8202e345403a1a04676da7dc6d20ba86b337290a821c6c28849104e52453e7b040ac94a728580a8888cc0188ddad22996b1c1c2dbafb87c84e78046554f4a9b5254819ca925a6ee09830902409b03134a40525485a2ca49041e62e2b558fc1e66189f75053e0098f4a059c0d95ca0fcc1fa79d2dd583416a260b051dbc842c325b484a325923dd254494f812452fc260b35b71079729a788c11291c04db8575bc38ca981a4ffa95537d4e5bfcba66481094639791c2e6590a016b836950525c046f19d04d2dd8588fbf5a730521f0532068e22568ff00727c4519d3b6d4db497048c8aff2bb093e4a03f9cd6006316daf324c1042877a4e615d6c361f9da26fa8ff00ae214752a647af47384b89b09bf76ffdf2a255b3e0c6f145e0f1cd38d21ccc005a42a3530470159fda9d231877db39b3b4b1948d4a14930151ac281129fc3239f2698ab525a05c7e362b0b9ad871d1683048c84c8ecac42be87e9e3525e06263c283736838b90db2483be0fd62adeab12b4e524208dd274ef115ada559eddc46fdcb1d558d3dab9b39d4971c6d5652208923b485094a84011a111c5356ab12da4fb40a77c5f2f39d2946d1d8ab4adb7bac5128b2826d99b51322dac1ed534383c3a75927999aa2b6041878300ecdc7befd896cc44cb7685c731cd3852009237c6a35e71a55bb49c79b032a041d098f09bdbcabade29a09b45ada5078ada8163db2522f0604779340fc19e8868047599f28442acc9d1657a57b15f2a1884021600072482471911a69a694f761eca75281d6b8a593ae620c1e02a78ae90241bc5bc6aac4f49130140183b86e3c34ae89a39a9b58f371b604c77dd4e5d95f980d5347f068ca4af281a4a8922bcff6d6c26d0ef61d4e555c017ca781e5c299ed3dbe87000acd9933024419dd3fad0fb3f1e952827a976e7714df908335d2c0e1a852b97ebb0950e2711589814cf7424c9c0b407697f21eb57b0c61922544470cf3f4add2ba3ed3ad2825003a91234cc794837f3ac53b886947de49060ca778b1e35d3cad6de07150d0c473c0d9d22d1171e08575ec383d909f22af5a6db3f18da402419ddd98b7888aa704de154abada31b9400f5523eb5a3c2ec769c1d84a4a7f0393e9da4fca808a8efb0355586c560e8bb3625ce1b819f2849f6a6da4841b1efca3e7a50984c72548061779f99a974af622d80149199b260f68d8ee0444788a0f05ec0fb91bfde3c4f3a43ead669cae55d6661b1479da2e91bfa5e9e690255caaccc222387ce7c2aa49af8d468655a8dd2240d3bcdea2b3324ea4d452bae1af2f4af89f9454e74a828d7d34416132babdd5d6cfcaa15340d7babc10957605d2975b22c42d041e0428191dd5ea184c7f5a1bc63712b90e262d9d3d95a48e0ad7c6bca936527bc56a7a05b4fab754cabd874ca79389d3f99323c0541ca148bd85e350386d1f954e1de1a60e855db47a2918c47549ff0097789298f73e26cf0826dc8f2af4377a30d61d0a2d8ed3896c2bff00ac18f99ab5b4000293a5943bfe9c297ed9e94a13896db5181d592678820477ebe55c6762f11891959a0171bc89f6548a4ca6e93dcb8cb05b398483a4817beea67b3119c92a93dffd6913fb7c2c14a1b51e1637f150007ad2ce83bf892c86db0210482a2a33a93a4713c6bd470d548e71d62081077144facc9ca372dba5bb94ee264790fd0d0b885a113da1306d22635fa502bc23a152ebc003b841f9c9f5a8ab65201ed66bfc67288fc9a914d760c8735ce70ee1ea942bc8200568db8d016324806d1bfc6816f6ba94b210d2d529241cb692a36b90645bceaed9eca1bb2508c89b69e40549eda89499d34e000a751c1d3682db906785d69aaf7006c85dad80c462185a5690905245f749041005e640af376f666f715972eedff5af49c4edf252a4e9c08af3adb50310bb9cae7684fe2bfce6bb3c9dcdb0648036ebf851e25ae3795aee840c3e4521433941913a42bfacd38c7865c840421233022dbd2647d4579b6c1c6943c35850283e3a7ad367f12ab83689bf752f10d2daf34e77fcb13e28a996964396cf11b74802e2dc286676e665c15fb5cceb58d4be54409b9a14e2140db507527434b6615f3394f8a69aa2202d83fb521441954728ab71d8e6d484a531993da31a14abe66dbab2db41d5ac2579a01d775fc6a586c4293048cd9664abb09c8ad4152a2635b574a8e0da356f88f72a57d6260cdc27b8d712108285485ca4ee2958b8b708df59dfed2505149b89208e234356e29f45bef02b9252551ddbbcceeaa434335dbcc4ef52a207e545fd6ac38393d1b7620a78b8a7d3ebf342627116091272da4f0dc39c0a9e1d4e84ab32425040fe21ca09e40dcdb8034d14cfc272a783709f51daf5aefd963b4a096d3f12cc4f8aae6b7fd31836a43b1f037256d6010772cf9a127c4f68f90a71b3b057848006f4b40a41fcc7da5789a15fdacc24d8974f2eca7f98893e029663b6fbae7664211f0a2c0f79d4f9d17334a96876c29dff00518816103aede02de4b538fe9237844143652b7a2001ecb7de46a790ac03ab24926e4924f79b9f5ab711967b361c28fc2ec475c4e6c8108deb59ca9f5b9f0149aac7d479688b6e4ea187a5846971373124da7a8757504a9044de629d6c1d92e3abced294da126ee4e4b781b9a2f6760b0e93001c4af959b1e3aaab42cb0a5105c2207b2da2c84f86fa3a385fd4e214f8cc7c321835da47934ebde005a3c13687d050e76d244127dee758fc5744d4dad4842e5209cb3ac1b89f3ad96cf540cc7b2902b3f8cdbe95ad4a42c14936d775be94cc431a4cb970b936a621955eca376ea475faeabccebe8afaa55c85f64a315f57c05762bcb1708a92057424d7423cebcbcb853536d35d4eb1bf851cc6ca7142e328fc5af96b44d05c6c85cf6b6ee308150e1456cac3175e42124e62a06da88324f8451a9c0b4dddc39b9683f5adb744de6bab2b69b92aec800007b3a9e26f6a0aece6d84b8c1d9b78266147d438866c5aad927fbb56b1227783af91a51b4b622462db7ce90a49e73713e5eb5253eea1d6e614a014a81ee81aa49d092274e15a55b2879026e8541fdf0af91ab9b03880e20e570f3d5744f4db94ea1292a446442732be148bff004a9e136696fb4a525a4937098924f13100f74d77686d8630c9296f28e3c2799f78f8d6336b6dd5ac95175a098eca8ac6a62c1234b55941d89c45a8372b37a4d434d906a1bad5e3b6ab4d1096a12a3ef1ba8f393a7ef4acbe336866752951202940133c4c4c9a4cd294a5a497126e0cf695fedaeed7ed284295cb2b648bf3315f434792e0e6224f5dca88e2f60b04f3696d553654809196daf11691df4a7178c8caa2242871a5d8b4389804bc47e64a47ccc7954d58b3942549b01695cdc7e58ae99c3c1ec53b2bc3678ef5f6236892404a63993342e310a524409524da06a937f9cd4c62173ab691c02737aa89aadc2a2002e384709ca3c850f3549a645cf820388f97549c02c1b5811aa884c1f122ac7d69273171b93ae551519ff0cd759d9a9509ea8a8f1827d6a7f6708d4b4df7a923d2669a5c4e8238fa257d4c180787fd9e0866dc48502038a239048f533e9535be6643681f9c951f48aeaf10ca757737ff001a49f5394550bda8d08cad38ae6e2a01f048fad28be3570eef856e7a8ed013db3ec8a4e21677c03f00cb7ef17f5a935845954f5655ccc9f5a5876e39ee06d1f95209f3549a1978a71d30b71c54ee249bee8159f52dd24a2146b1bd87ceaf55a4294a273bad2388904f9224d06bda6ca4d92e3879c207d4fca826363bea121b501c55091e6a8ab0ece488eb710ca637364b84ff002889f1a235aaec11dbef6e09192907439f2770f693c575cdbcee88086c7e017fe6549f2a5aea94b32a254a3bc99269937f6607b2d3ef1fc45284f926feb4730b7f4690d303f0a467fe632684b5cffb9d3d97f409ad7b294e46475986f9cbb825586d88fac66eaca53f12c644f9aa3d2ae4ecf611fc47cacfc0c099ff001aad4c06c72bed3ae2dcef268cc3e1529b25205132801b3c7d3dd2df8d27f57f4faba7fe2107854287fe5f0e96ff00f71d19d5e1b87951dfd979e14f3aa755c09ec8f0d28fc2e096bd01ab712e61f0f779d13f022e6a814c017d3c02e7d4c502fe87ddd52e778993e4a185c368109f2a66a2d30333eb4a7809ed1f0ac96d1e9b2a0a70cd86c7c4a82bfe95967df52d5996a2a51de4cd29f8ba6cb36fe48a9f2757ae66af4078b8fe079ad2749fa54b7c96d1d8685a06aaef3c283d9dfc34f8fccd2628b4c8e11bfca9c6cefe1a7c7e66a0ab50bccb976e8d0a74199298809465afb2d494d98936ef23e5ad7c0da949eb915684c0fdef1c289c06cd71ef613d9dea3648f1de790935a26f62b4ca73bca0a037abb289fc291757af753a9527d4b816de54d5f134e91ca4c9dc3559bc2609c77f86891f1683ccda9c35d1f4a44bab98d7218039159fa54f1fb75392191267de1000e294febe5499f53ae5dc2a2374d923b8683c28bff153fe23c12d831588fb4651e27d936563d96acd013f87fea373e14039b41d733418b6ed4dc6f3ad0ea6d0822f9f884c81e756b78b85a72c26549b24ee9df582b3de60587559543014e98cd50c91de7d38a2366ec175f71281014ad49b948f888d6b73b5369b3b390186866294892a9198ee98d64df2f9d73a14accbc7388202fac5252bd48ecd8f9d66b69bcf27eef1787fb4253a38890aef91f5a61c334093aefdcb9ede51cd5cb182cd8b4f489205ef123640bf5a4bff00889ffb427125654e033daf64036290916098b56bd8e9e20b410ace912672c409f745c123f5ac796308afef1f68f05a12af9106a4ac03045b16df8a569fd6935702cad02ac102e2e3e78ab7eaa097749a48fdd77a15a3c4ed361c33d77f3a088f42287563b0f33d7227f2abfe9a407028d3ed6c1f15fe95d4ec847fea99378f7f53a0d2ad63f9a00318387a95096d22731a8ef03fe2b4ac6d0602490f24c6bd9569a7c3ce82c46d763e25f0b20fc8a852b6700d6523ed6df82167f4a88c261f7e2547b993f55530d7a91b38201469cce677f49ff145b9b659220f5caf048fa9a0d5b5db1a344fe773f448abf6761308b5e5ccf9b1d43691613ceab4a1892138779467de723fd291487179bc8f3f54d653a798b435e4f5dbccb7f2aa56de57bad349ff000a95fea54556adb6f681613f95294fc84d376b096ec609a2445959d76e72a8a9b6a790a3f76ca2f6c88408f426b79ba9fa9de00fb266468305807f3387e33248d61f10e5e1f58ff1ae886fa3af1b9414278ae13f33472d8c42cfde62171c12b35f3bb3418cce2943813342da4dfd527b6deab4629acb02d1ba013e590208ecf47b2ac53000e04acff947d6be8c2801bcceb9f950103cd649f4a64dec54129096c927c79518ad8ca6cc754127c28f246800f1287ea5ef6e63988de001dd30e8f19eb4a505b03eef06851dca716b5fa58532c21c444761b1c1b09447f289f5a306cd740f60fad5ac6ca78dc215e223e74e6323e05262314d6ddec1fee93e39841498ecc0b54bae2d439927e746ab02c240c809e33463b8242012ebeda2376704f90a09edb7836f42eba7f08091e668fa0db981da92dc654a8dcb4c13fca3d2c8dc284c5884ff008454d38271c558288e310290627a6247f0596d1cd6331a538ddbd887410b7551c12aca3c8503b17480817ec4dfa7c5548e8868eb249f013e6bd0de6da653f7d88681e02147c852177a56c20fdcb4a715f1390079561e6be9a95d8d71b00acff4f6388351c4c6c981c04f15acda1d23c53a0824252772094ff5a44cbc819838993bbbff007bf973a042cf1ae1a53b104fbabdcca41b969372f640f2127bd3469b42bfba8b122fac6ee541621b836045412f286848af8bca3a99a17bd8f1a414e7bdae6f5f601c429b051ef03e14ef041bc82277fccd202abc8b7d29eecec41ead37e3f33421c222078210f196081e094e1f3121294e651361126790ad66cbe8b19ccff6d712513d940e2f2bfda2b13b33f883c68fc47f0dea1a751ad12e13dea1c453a8f1958ecbdd7f311dcb59b4b6ea1b843090eaf40b886d1ad9091afa0efacf63d0e2885bee4a8ee9920776891c85226bd9155bded1af55c43aa6ba6e4cc3616861db3965dbc9f6f2e29e3ab484c2507776d5be380aa5fc548ba8a8fa0a5aee828714acc372b1f5dc640b03b0587ced4c96f988dd54a45095ddde3441f0906eb49d18e902b06e1206642aca4f18de39d6ff000db5b0f8912db894a8ea85d8faeb5e37507775534718e65a242e5e2f92a9621fce8395fbc687b47a42f60c5ec626e5b4ab9c03eb4a9dd8adef64794566305ecd75da61c634fe8e3ec954f015596e73811fdc9f1d8cd1feec556365369366ee3e959da81a1faa67ee0f9dc9ff004b57ff00a1e3eab5985d9cd8feec7951c8d9ad84a8e54c9d0456145493ad1b716d1fa38fb2cfa277ea793e3eab6cde18a6e5000e405ebaf37206544770d6b14ed5cd6945f5f68cbc7d96bb06ed03bc44fe56bd585735405c1e00f9543fb29d57baaf1feb599a1719a1a138d9d5bc7d92be86a6c78fe93fe4b6cf6c620052d6da05a49707d2a186c3617300bc5362f7ca09af3cc47b1432294ec66e6f155d3e4b0d20bde48dd113df72bd93138ec132996dc75440b04da7c7750aced751fbd461d24ee2eaa6774c45792b1471dd42dc593622cbaad6e14ba4b1d9468d0f204efb05e81b4fa758c12dc21b9f8137f5a54ced8589ebfad513c734795631dd6af734a536bbc190aa6e2698a9ce736091a4c1e313df64f369b8d2a3ab4c4eba8ab303b09b5a012bed1e116ac99aa87b5582a8cd99c2782218ea4ea85f52903d5a01e0169b6bec34b46ca99e55560b63b8e02509cd1c6932b4156b1a50e705da5b77ba5f39873533737037077e483e49b62364ad22ec14c6f07fef4bc317be95c5e8682af39d74ba8ea520b5b03b47e1a3c93b1b3d83fdf2877a0fd0d538ad9c948943a15ca22942ab9586a4ec42fad4488e6803bc39de4494cb0d822b5048893c6981e8bbff000cf8d67d3ba8d4e944c20ebf382da6ec3e5e9b093d4e8fed28e73623e90429937df1311cc532c06cb74363b277fccd286fd9a6f81f6078fccd325bb8f8fb29eb168774040eb33e51e4bfffd9),
(4, 'Nguyễn Văn B', '01234567867', 'nguyenvanb@gmail.com', 'Khánh Hòa', 'vanb1234', '202cb962ac59075b964b07152d234b70', ''),
(7, 'Trần Ngọc Duy Long', '0123121', 'long.tnd.61cntt@ntu.edu.vn', '34 Vĩnh Thái Nha Trang', 'duylongpro', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `loai_nhac_cu`
--

CREATE TABLE `loai_nhac_cu` (
  `MaLoaiNC` int(11) NOT NULL,
  `TenLoaiNC` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_nhac_cu`
--

INSERT INTO `loai_nhac_cu` (`MaLoaiNC`, `TenLoaiNC`) VALUES
(1, 'Âm thanh chuyên dụng                                                                                                                                                                  '),
(2, 'Amplifiers & Monitors'),
(3, 'B-Stock'),
(4, 'Cases & Gig Bags'),
(5, 'Keyboards & Pianos'),
(6, 'Pedals & Pedalboards'),
(7, 'Phần mềm & Thu âm'),
(8, 'Trống & Bộ gõ'),
(13, 'Đàn tì bà'),
(15, 'Piano');

-- --------------------------------------------------------

--
-- Table structure for table `nhac_cu`
--

CREATE TABLE `nhac_cu` (
  `MaNC` int(11) NOT NULL,
  `TenNC` varchar(100) NOT NULL,
  `MoTa` varchar(5000) NOT NULL,
  `HinhNC` varchar(100) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MaLoaiNC` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `MaHSX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhac_cu`
--

INSERT INTO `nhac_cu` (`MaNC`, `TenNC`, `MoTa`, `HinhNC`, `DonGia`, `MaLoaiNC`, `MaNCC`, `MaHSX`) VALUES
(1, 'Fender Passport Event Series 2 375W Portable PA System, 230V UK — F03-694-3004-900', 'Với điều chỉnh linh hoạt, kết nối tuyệt vời và tiện dụng khắp mọi nơi, dàn mixer di động Fender Passport® Event Series 2 hoàn hảo để khuyếch đại voice, đàn và nhạc nền ở bất cứ đâu, bất cứ lúc nào. Loa full dải tần, nhiều tính năng linh hoạt, bản điều chỉnh dễ dàng và công suất 375W mang đến âm thanh Fender vững chắc, mạnh mẽ và rành mạch, lý tưởng để dạy học, trong các sự kiện thể thao và nơi tôn giáo; cuộc họp, hội thảo và thuyết trình; và trình diễn nhạc tại các buổi tiệc, club nhỏ, quán cafe. Passport Event Series 2 có kết hợp giắc XLR/¼” để tăng kết nối.\r\nDễ setup và di chuyển, Passport Event Series 2 cũng có kết nối Bluetooth® để phát âm thanh không dây từ thiết bị di động.', 'anh1_ATCD.jpg', 21780000, 1, 1, 2),
(2, 'Fender Passport Venue Series 2 600W Portable PA System, 230V UK — F03-694-4004-900', 'Tối đa hóa độ chắc âm thanh của mọi màn trình diễn lớn bằng dàn mixer Fender Passport Venue Series 2. Kết nối Bluetooth® và giắc kết hợp XLR ¼” để tăng kết nối. Passport® Venue Series 2 có loa full dải tần, nhiều tính năng linh hoạt, bản điều chỉnh dễ dàng và công suất 600W mang đến âm thanh Fender vững chắc, mạnh mẽ và rành mạch, lý tưởng cho những dịp và không gian lớn—như show diễn band nhạc và DJ; dạy học, sự kiện thể thao và tôn giáo; cuộc họp, hội thảo và thuyết trình,...', 'anh2_ATCD.jpg', 27280000, 1, 2, 1),
(3, 'Behringer Pro Mixer DX2000USB 7-channel DJ Mixer — B03-000-96801', 'Ngày nay một DJ thực hiện nhiều thao tác hơn là chỉ dùng mic và một vài turntable! Trong bất kỳ buổi biểu diễn nào bạn đều cần làm quen với các phương thức trình diễn đa phương tiện, các nền tảng âm thanh đa dạng (vinyl, CD, MP3) và nhiều mic. Đó là lý do vì sao chúng tôi tự hào giới thiệu PRO MIXER DX2000USB 7 kênh với Crossfader vô cực không tiếp xúc có thể điều chỉnh hoàn toàn và có giao diện USB/audio tích hợp. Giờ đây DJ đa năng đã sẵn sàng để làm bùng nổ sân khấu!', 'anh3_ATCD.jpg', 7300000, 1, 9, 3),
(4, 'Fender Passport Conference Series 2 175W Portable PA System, 230V EU — F03-694-2006-900', 'Với các tính năng dễ sử dụng và tính di động cao, dàn âm Fender Passport® Conference Series 2 lý tưởng cho những nơi vừa và nhỏ. Với kết nối Bluetooth®, loa full dãi tần, nhiều tính năng linh hoạt, điều chỉnh ở mặt trước và công suất 175W thể hiện âm thanh Fender rành mạch và chất lượng, lý tưởng trong nhiều ứng dụng—dạy học, sự kiện thể thao và nơi tôn giáo; cuộc họp, hội thảo và thuyết trình; và trình diễn nhạc tại các buổi tiệc, club nhỏ, quán cafe,... Độc lập, dễ setup và di chuyển, Passport Conference Series 2 có đủ mọi thứ bạn cần để tạo nên âm thanh ở bất cứ đâu và bất cứ khi nào.', 'anh4_ATCD.jpg', 11800000, 1, 11, 5),
(5, 'Turbosound iQ15 2500W 15 inch Powered Speaker — T12-000-APM01', 'iQ15 là một loudspeaker power 2 chiều 2,500W hoàn hảo để lắp đặt cố định hoặc di động và cho các ứng dụng tăng cường âm thanh, âm nhạc và giọng nói. Driver bổ sung gồm driver 15” tần số thấp với voice coil low mass để cải thiện đáp ứng quá độ nhất thời, một driver compression 1” nhiệt độ cao với voice coil bằng nhôm bọc đồng để tái tạo tần số cao mở rộng.', 'anh5_ATCD.jpg', 21600000, 1, 3, 4),
(6, 'EVH 5150 III 50W Guitar Amplifier Head, Black — E08-225-3006-010-BSTK', 'EVH 5150III 50-Watt Head là phiên bản thu nhỏ của 5150 III 100-Watt head hùng mạnh với nhiều đặc tính tuyệt vời tương đồng. Kích cỡ nhỏ hơn và mang tính di động hơn đã đưa EVH 5150III 50-Watt Head trở thành bộ amp hoàn hảo dành cho người chơi muốn sở hữu cả một vũ đài với tất cả âm lượng, âm sắc và hiệu suất mà chỉ trong dáng hình nhỏ gọn. Là bộ amp có ba kênh với trở kháng được tuỳ chọn (4, 8 hoặc 16 ohms), các dắt output cho loa kép tương đồng, mạch hiệu ứng, dắt headphone và phần cứng màu đen, tuyến ngoài.', 'anh1_Ampli.jpg', 27232000, 2, 6, 5),
(7, 'Ibanez IFS2L Dual Footswitch Latching — I01-IFS2L-BSTK', 'Dành để sử dụng với IL15 Iron Label Tube Combo Amplifier, IFS2L cho phép bạn dễ dàng chuyển đổi giữa các amps hai kênh.', 'anh2_Ampli.jpg', 2722000, 2, 4, 3),
(8, 'Fender Mustang LT50 Guitar Combo Amplifier, 230V UK — F03-231-1204-000', 'Mustang LT50 kết hợp những gì chúng tôi đã tích luỹ qua hàng thập kỷ tạo dựng amp guitar đỉnh nhất thế giới. Lý tưởng để luyện tập hoặc trình diễn, với công suất 50W, loa 12\" chất lượng cao, giao diện người dùng cực kỳ đơn giản, màn hình màu, và nhiều preset đa dạng các thể loại nhạc — \"hit tuyệt nhất\" của âm guitar electric. Chuỗi tín hiệu linh hoạt với model hiệu ứng và amp chất lượng tạo ra âm thanh tuyệt vời, giúp amp 50W có nguồn cảm hứng bậc nhất trong cùng hạng mục. Và tải Fender TONE 3.0 miễn phí, sử dụng máy tính Mac hoặc PC để edit, lưu trữ và quản lý preset dễ dàng. Mustang LT50 là amp modelling vui tươi, linh hoạt và dễ sử dụng dành cho mọi guitarist. Amp chỉ có công suất 50W và nhiều tính năng.', 'anh3_Ampli.jpg', 6600000, 2, 5, 7),
(9, 'HeadRush FRFR-112 2000watt 1x12Inch Guitar Cabinet, EU Plug — H32-FRFR-112', 'HeadRush Pedalboard làm mưa làm gió thị trường nhạc cụ với sự đổi mới mang tính đột phá trong modelling FX và Amp. Giờ đây bạn đã có thể nâng tầm thiết bị của mình lên những tiêu chuẩn sáng tạo mới của những thiết bị modeller ngày nay, đừng phụ thuộc vào đáp ứng tần số bị giới hạn của những hệ thống PA hay amp truyền thống. Bạn cần FRFR-112.', 'anh4_Ampli.jpg', 9600000, 2, 7, 1),
(10, 'Fender Mustang GTX50 Guitar Combo Amplifier, 230V UK — F03-231-0604-000', 'Mustang GTX amp guitar mạnh dạng hơn, tốt hơn với đặc tính chưa từng có và hiệu suất không thể đánh bại. Nhiều lựa chọn model amp chính xác và linh hoạt, nhiều hiệu ứng và 200 preset, cho bạn âm thanh guitar mà bạn cần trong hầu hết các thể loại nhạc. Đường truyền tín hiệu module linh hoạt giúp bạn di chuyển hiệu ứng mọi vị trí trong chuỗi, và màn hình màu hiển thị sắc nét cho biết các chế độ đang sử dụng. Kết nối Bluetooth để trải nghiệm Fender TONE 3.0 (dành cho iOS và Android) hoàn toàn mới, ứng dụng miễn phí mang đến giao diện và cảm giác chân thực khi bạn xoay nút chỉnh hiệu ứng và amp nổi tiếng nhất mọi thời đại. Bạn có thể edit, duyệt preset từ tất cả Fender Tone, dự phòng preset và khôi phục, và nhiều chức năng khác. Có thể truyền âm thanh qua Bluetooth để chơi cùng track bạn yêu thích. Chức năng WIFI của amp (độc quyền Fender) giúp bạn kết nối để cập nhật sản phẩm, amp của bạn luôn được nâng cấp không ngừng.', 'anh5_Ampli.jpg', 10000000, 2, 9, 4),
(11, 'Epiphone Thunderbird Pro-IV Bass Guitar, Natural Oil (B-Stock)', 'Guitar bass Thunderbird kinh điển đã trở thành một hình tượng trong dòng nhạc pop. Epiphone Thunderbird™ PRO thuộc Professional Series và là một cây rock and roll bass đỉnh cao với hình dáng đặc biệt, nổi tiếng thế giới. Được trình làng lần đầu tiên vào năm 1963, Thunderbird PRO kết hợp các yếu tố thiết kế truyền thống với công nghệ hiện đại, có mức giá phải chăng mà mọi tay bass có thể sở hữu.', 'anh1_Bstock.jpg', 12000000, 3, 8, 5),
(12, 'Ibanez AE205-BS Acoustic Guitar, Brown Sunburst High Gloss (B-Stock)', 'Sinh ra từ dòng dõi đàn dây lâu đời, acoustic guitar mang đậm nét lịch sử và truyền thống. Nhưng âm nhạc không ngừng phát triển, và người nghệ sỹ luôn yêu cầu các công cụ mới mang niềm cảm hứng để tạo ra âm thanh đặc trưng của riêng họ. Với tinh thần đó, Ibanez ra mắt Ibanez AE, series guitar acoustic và acoustic-electric chủ đạo mới. Thể hiện âm thanh và tính năng chơi xuất sắc, Ibanez AE là bước tiến tiếp theo trong truyền thống tuyệt vời. Với một loạt các AE models để lựa chọn, tất cả đều mang kết hợp tonewoods và đa dạng màu sắc, và được chế tác theo đúng chất lượng bạn mong đợi từ Ibanez, chắc chắn sẽ có một cây guitar hợp với phong cách và sở thích của mọi người chơi.', 'anh2_Bstock.jpg', 11100000, 3, 10, 4),
(13, 'Epiphone PR-5E Acoustic/Electric Guitar, Natural (B-Stock)', 'Được Epiphone thiết kế năm 1990, dáng đàn được lấy từ phong cách đặc trưng của ES-335 cổ điển theo hai dòng Sheraton và Casino. Nhưng thay vì cutaway ở cả hai bên thân thì PR-5E lại mang dáng vẻ cutaway một bên thân sắc nét. Phần thân dưới to nhằm cho ra chất âm trầm đặc sắc và dễ dàng di chuyển tay ở những nốt cao trên cần đàn.', 'anh3_Bstock.jpg', 8300000, 3, 11, 3),
(14, 'Ibanez AP7 Analog Phaser Guitar Effects Pedal (B-Stock)', 'Tone-Lok Series AP7 Analog Phaser Pedal từ Ibanez sở hữu mạch analog thuần tuý tạo ra được chất âm phase cổ điển trầm, ấm. Điều chỉnh Speed, Depth, Feedback cho phép bạn nhập được nhiều sắc âm. Mạch phase 3 cách chỉnh giúp bạn có thể chọn phase 4-, 6-, hoặc 8 đoạn. Khi chuyển sang pha 4 đoạn, pedal hiệu ứng tái tạo âm thanh phase cổ điển. Khi chuyển sang phase 8 đoạn, guitar pedal tạo ra các đặc tính phase trầm và mạnh mẽ.', 'anh4_Bstock.jpg', 2116000, 3, 2, 2),
(15, 'Ibanez SH7 7TH Heaven Guitar Effects Pedal (B-Stock)', 'Tạo ra cổ máy tàn phá âm thanh đầy tinh tuý chỉ với một hộp distortion được tạc tác dành riêng cho ghita 7 dây đã quá nổi tiếng của Ibanez. Được thiết kế cùng sự kết hợp với một số người chơi đàn 7 dây đình đám nhất hiện nay, 7th Heaven pedal cho phép bạn nêu bật đường low-end của dây Xi thấp trong khi vẫn giữ được tối đa độ rõ nhất có thể.', 'anh5_Bstock.jpg', 1472000, 3, 4, 1),
(16, 'koda essential Dreadnought Acoustic Guitar Bag TWO', 'Dreadnought Acoustic Guitar Bag TWO vừa vặn với guitar dreadnought tiêu chuẩn. Dây thắt bên trong có băng dán giữ cần đàn cố định khi di chuyển, tay cầm giúp cân bằng trọng lượng đàn nên có thể xách bao đàn bằng một tay. Đi kèm dây đeo kiểu ba lô để thuận tiện cho những chuyến đi dài.', 'anh1_Case.jpg', 229000, 4, 3, 1),
(17, 'MONO Vertigo Ultra Electric Guitar Case, Black', 'Sản phẩm bảo vệ tốt nhất đã được nâng cấp. Vertigo Ultra Electric hoàn toàn mới với một loạt những cải tiến về độ bền, công thái học và cấu tạo để khiến những chuyến đi dài trở nên dễ chịu hơn. Sở hữu mọi khả năng và sẵn sàng cho mọi điều - một sản phẩm mà mọi nhạc sĩ nhất định phải sở hữu khi lưu diễn.', 'anh2_Case.jpg', 6700000, 4, 9, 3),
(18, 'Ibanez IUBS301-BK Gig Bag For Soprano Ukulele, Black', 'Bao đàn Ibanez 301 Ukulele hoàn hảo dành cho người chơi ukulele thường phải di chuyển để luyện tập hoặc đến điểm diễn. Dây strap chắc chắn giúp dễ dàng đeo trên vai mà không cần tay phải cầm nắm. Logo Ibanez cổ điển và khoá kéo lớn với màu cam sành điệu trên nền đen.', 'anh3_Case.jpg', 290000, 4, 7, 5),
(19, 'Fender FA405 Dreadnought Acoustic Guitar Gig Bag', 'Bao đàn F405 Series của Fender có kiểu dáng đẹp và giá thành tốt, giúp giữ cho acoustic dreadnought an toàn khi di chuyển. Mặt ngoài bền chắc kết cấu từ polyester dày 400 Denier, bảo vệ đàn tránh va đập và chống xước, rách. Mặt trong được lót đệm dày 5mm bằng nhung mềm mịn, giữ cho đàn ngay ngắn và an toàn, tránh hư hại lớp phủ đàn. Bao đàn F405 có tay cầm và dây strap kiểu ba lô tiện dụng, bạn có thể mang đàn một cách nhẹ nhàng. Hơn nữa, còn có ngăn túi trượt phía trước dành cho các phụ kiện nhỏ.', 'anh4_Case.jpg', 890000, 4, 5, 7),
(20, 'SKB 1SKB-5820W ATA 88 Note Keyboard Case w/Wheels', 'Hộp đựng bàn phím 88 nốt 1SKB-4214W có thiết kế khóa ở góc đã được cấp bằng sáng chế, giúp giữ bàn phím của bạn cố định trên bề mặt móc và dây buộc vòng không thể phá hủy. Lớp bọt ở trên cùng của nắp giúp hỗ trợ thêm và bảo vệ bàn phím khi đang vận chuyển. Các tấm cản bên ngoài bảo vệ phần diềm và phần cứng khỏi bị hư hại do va đập. Các chốt được làm bằng nylon gia cố bằng sợi thủy tinh không thể phá hủy và bao gồm hệ thống chốt nhả kích hoạt được TSA công nhận và chấp nhận cho phép bạn khóa hộp đựng của mình và vẫn được kiểm tra tại an ninh sân bay.', 'anh5_Case.jpg', 16200000, 4, 2, 4),
(21, 'Alesis Prestige Artist 88-Key Digital Piano with Graded Hammer Action Keys', 'Mang trải nghiệm chơi piano chân thực về tổ ấm với Alesis Prestige Artist, một cây piano kỹ thuật số đầy đủ tính năng với các phím dạng búa tiêu chuẩn và 30 âm thanh tích hợp cực kỳ chân thực. Đây là sự thay thế hoàn hảo cho việc sở hữu một cây đàn piano acoustic kích thước đầy đủ, với nhiều voice đa mẫu cao cấp, 256 âm phức điệu và hệ thống speaker micro-array 50W tùy chỉnh cho âm thanh dày dặn và rực rỡ bất kể bạn đặt piano ở vị trí nào trong phòng.', 'anh1_Piano.jpg', 14300000, 5, 8, 7),
(22, 'Alesis Virtue 88-Key Digital Piano with Wood Stand and Bench', 'Đây là bộ trang thiết bị toàn diện sẽ làm bạn ngạc nhiên! Bao gồm chân đế piano bằng gỗ màu đen, một giá nhạc và 3 pedal (sustain, soft, sostenuto) và ghế ngồi tuỳ chỉnh, Virtue có đủ trang thiết bị mà người mới tập chơi piano cần để bắt đầu, Virtue digital piano có 88 phím full-size, hai loa 30W (15W x 2) và phức điệu tối đa 128 nốt, mang đến trải nghiệm âm thanh chân thực và lôi cuốn.', 'anh2_Piano.jpg', 12400000, 5, 1, 5),
(23, 'Alesis Recital Pro 88-key Hammer Action Digital Piano', 'Bạn có thể tùy chỉnh tiếng bằng cách kết hợp hai trong một ở chế độ Layer Mode để tạo ra chất âm dày, đầy đặn với việc sử dụng các điều chỉnh phía trên và màn hình hiển thị. Tiếng có thể được chỉ định ở tay trái hoặc phải theo chế độ Split Mode. Bạn còn có thể bổ sung Modulation, Reverb và Chorus tuỳ chỉnh để tạo nét âm thanh riêng cho mình. Với 20 loa 20W mạnh mẽ và đa âm tối đa 128 nốt, Recital Pro mang đến âm thanh cực kỳ chân thực với trải nghiệm chơi nhạc thuần chất.', 'anh3_Piano.jpg', 11500000, 5, 4, 6),
(24, 'Novation Impulse 49 USB MIDI Controller KB 4 Octave, Touch Sensitive Controls, LED Light Rings', 'Impulse là keyboard siêu nhạy và biểu cảm với vô số điều khiển tuỳ chuyển. Được tạo ra dành cho mọi người yêu thích chơi keyboard, Impulse sẵn sàng hoạt động và kết hợp với Ableton Live, Logic Pro, Pro Tools và các phần mềm âm nhạc chính yếu khác.', 'anh4_Piano.jpg', 8200000, 5, 3, 3),
(25, 'Nord Piano 5 73-key Stage Piano', 'Phiên bản mới nhất của dòng Piano từng đoạt giải thưởng của chúng tôi được trang bị động cơ piano kép, synth mẫu kép và bộ nhớ gấp đôi thế hệ trước. Với sự kết hợp của phím bấm Cảm biến ba cao cấp và Công nghệ hành động búa ảo độc quyền của chúng tôi, Nord Piano 5 di động mang đến trải nghiệm chơi đặc biệt.', 'anh5_Piano.jpg', 80100000, 5, 2, 1),
(26, 'Hotone MP-300 Ampero II Stomp Multieffects Pedal', 'Ampero II Stomp giới thiệu chuỗi hiệu ứng kép có thể tùy chỉnh cao hỗ trợ nhiều định tuyến tín hiệu nối tiếp / song song, có thể sử dụng đồng thời 12 mô-đun hiệu ứng. Hãy thử nó khi bạn thấy phù hợp.', 'anh1_Pedal.jpg', 13400000, 6, 10, 2),
(27, 'Strymon Zuma Power Supply', 'Zuma là con chiến mã mạnh bậc nhất, có bộ nguồn pedal hiệu ứng được phát triển công nghệ tối tân nhất. Zuma cung ứng 9 output độ ồn cực thấp, được tách riêng lẻ và có dòng điện mạnh, mỗi ouput đều có có bộ điều chỉnh riêng và máy biến áp tùy chỉnh. Được thiết kế nhằm đáp ứng nhu cầu của dân chơi ngày nay, mỗi output cung cấp dòng điện 500mA đến kinh ngạc.', 'anh2_Pedal.jpg', 7100000, 6, 11, 3),
(28, 'TC Electronic Hall of Fame 2 Reverb Guitar Effects Pedal', 'HALL OF FAME REVERB nguyên bản truyền tải nhiều reverb mang tính biểu tượng nhất mọi thời đại, nhưng HALL OF FAME 2 REVERB duy trì lâu hơn nữa những di sản của cải tiến đó. Công nghệ MASH đáng kinh ngạc của HALL OF FAME 2 REVERB thêm pedal expression vào stompbos reverb của thế giới, một reverb không chỉ là phản hồi với cái chạm của bạn mà còn tiết kiệm nhiều không gian hơn trên pedalboard trước đó. Hãy thêm effect Shimmer đầy tinh tế và bạn đã có được một pedal reverb không giống bất kì reverb nào.', 'anh3_Pedal.jpg', 3850000, 6, 4, 4),
(29, 'Strymon Iridium Amp & IR Cab Guitar Effects Pedal', 'Không gì biểu lộ được bản chất thật sự của cây guitar và lối chơi của bạn như tube amp đẳng cấp thế giới hoàn toàn phù hợp với speaker cabinet trong một không gian âm thanh tuyệt vời. Giờ đây đã có một pedal có thể thực sự truyền tải được âm thanh và cảm nhận đó, hơn nữa, loa cabinet này sử dụng cực kỳ dễ dàng. Bạn hãy thử khám phá độ phản hồi tuyệt vời của tube amp, tính chân thực chưa từng có trước đây của speaker cabinet trong đáp ứng xung (impulse response), và không gian âm thanh tự nhiên trong phòng có thể kiểm soát được.', 'anh4_Pedal.jpg', 10300000, 6, 7, 5),
(30, 'Strymon Zelzah Multidimensional Phaser', 'Bước lên Zelzah, chơi một hợp âm và bạn ngay lập tức được đưa trở lại thế giới của các âm phaser cổ điển vì chúng luôn được dùng để phát ra âm thanh, được lồng tiếng hoàn hảo, với nhiều rung cảm. Giai đoạn 4 giai đoạn và 6 giai đoạn cổ điển với các nút điều khiển cho phép chuyển đổi liền mạch sang giai điệu rung, bích tuyệt đẹp và điệp khúc, và những âm thanh mới chưa từng nghe thấy trước đây — tất cả đều ngay lập tức âm nhạc với giai điệu tuyệt vời trên mọi mặt số.', 'anh5_Pedal.jpg', 9000000, 6, 6, 6),
(31, 'Focusrite Scarlett Solo (3rd Generation)', 'Nếu bạn muốn bắt đầu tạo ra các bản thu chất lượng studio cùng với guitar thì 3rd Generation Scarlett Solo mang đến phương thức dễ dàng để thực hiện điều đó.Bắt trọn âm nhạc của bạn ở bất cứ đâu bằng cách cắm guitar trực tiếp hoặc mic up, và kiểm âm trực tiếp để foldback không bị trễ. Scarlett Solo mang đến cho nhạc sỹ khắp thế giới âm thanh chuyên nghiệp mọi lúc, mọi nơi.', 'anh1_Phanmem.jpg', 2750000, 7, 11, 1),
(32, 'TC Helicon GO XLR Audio Interface, EU', 'Hãy điểm lại những gì bạn từng biết về phát thanh và quên toàn bộ những điều đó đi. Những gì đã từng tốn của bạn hàng tá thiết bị phần cứng và phần mềm giờ đây đã được thay thế bằng một giải pháp trực quan và đẹp mắt. Mix nhạc theo thời gian thực, thay đổi giọng nói, sử dụng phần cứng và phần mềm chuyên dụng và thu hút người nghe của bạn hơn bao giờ hết.', 'anh2_Phanmem.jpg', 12400000, 7, 2, 2),
(33, 'Novation Launchkey Mini MK3 Keyboard Controller', 'LaunchKey Mini là một keyboard controller 24 phím mini nhỏ gọn và di động. Nó cho bạn mọi thứ bạn cần để bắt đầu sáng tạo với Ableton Live - và nó vừa vặn trong túi của bạn. Bạn có thể sáng tác các đoạn nhạc ở mọi nơi với điều khiển Ableton siêu nhạy của LaunchKey Mini, sáng tác hợp âm, chế độ Fixed Chord, MIDI out, và rất nhiều âm thanh khác nhau.', 'anh3_Phanmem.jpg', 2900000, 7, 8, 3),
(34, 'Arturia Spark LE Hybrid Creative Drum Machine', 'Được xây dựng dựa trên Spark nguyên bản, LE Hybrid Creative Drum Machine của ARTURIA là một chiếc máy trống năng động, mạnh mẽ, cung cấp giao diện dễ dàng và kích thước nhỏ hơn, di động hơn cho những nhạc sĩ đánh giá cao hiệu quả.', 'anh4_Phanmem.jpg', 7750000, 7, 3, 4),
(35, 'M-Audio BX8 D3 - 8 Inch Active Studio Monitor Speaker, Each', 'Loa kiểm âm studio không phải là bộ loa thông thường. Monitor thật sự phải luôn chuẩn xác, cùng phản hồi âm thanh trung thực và distortion cực thấp. Trong loa kiểm âm đẳng cấp phòng thu, không có chỗ cho danh sách những giới hạn hay màu mè có trong nhiều loa thông thường. Trường âm thanh vô địch, THD cao, nasal midrange, mid-bass nổi bật, và không liên kết pha không có chức năng gì khác ngoài việc tăng sự tự tin cần thiết khi phối âm tốt hơn.', 'anh5_Phanmem.jpg', 5500000, 7, 5, 5),
(36, 'Alesis Nitro Mesh Electronic Drum Kit', 'Alesis Nitro Mesh là bộ trống điện 8 món hoàn chỉnh tập trung vào công nghệ mặt trống Alesis Mesh thế hệ mới. Mặt trống lưới là sở thích của số đông các tay trống khi họ sử dụng trống điện vì cảm giác tự nhiên và phản ánh âm thanh cực kỳ êm. Alesis Nitro Mesh có trống snare mặt lưới kép 8\" và 3 trống tom mặt lưới 8\". Đủ mọi thứ bạn cần để làm nên bộ trống hoàn chỉnh; 3 cymbal 10\", hi-hat pedal Alesis thiết kế riêng và pedal trống bass, và dàn rack bằng nhôm 4 trụ chắc bền. Tất cả kết nối với module trống điện Nitro mạnh mẽ cùng hàng trăm âm thanh bộ gõ, 40 bộ khác nhau và 60 track chơi kèm.', 'anh1_Trong.jpg', 13400000, 8, 7, 1),
(37, 'Evans EQPB1 EQ Black Nylon Single Patch', 'Thành viên của đại gia đình Addario, đơn vị dẫn đầu trong lĩnh vực phụ kiện âm nhạc trên toàn cầu, thương hiệu Evans đi đôi với chất lượng và sự vững chắc. Cách đây hàng thập kỷ, Evans là cá nhân đi tiên phong trong thiết kế và sản xuất mặt trống, và ở hiện tại họ là nhà cách tân. Miếng patch trống bass Evans được dùng trực tiếp trên trống bass và mang thiết kế nhằm bảo vệ mặt trống tránh sức đập pedal và kéo dài tuổi thọ. Patch bằng chất liệu nylon màu đen làm dịu attack và cũng cố mặt trống mà không gây ảnh hưởng đến độ ngân hoặc low-end, và có cả phiên bản pedal đơn và pedal đôi.', 'anh2_Trong.jpg', 160000, 8, 4, 2),
(38, 'Evans B14EC2S 14inch EC2 Frosted - Snare/Tom/Timbale', 'Thành viên của đại gia đình Addario, đơn vị dẫn đầu trong lĩnh vực phụ kiện âm nhạc trên toàn cầu, thương hiệu Evans đi đôi với chất lượng và sự vững chắc. Cách đây hàng thập kỷ, Evans là cá nhân đi tiên phong trong thiết kế và sản xuất mặt trống, và ở hiện tại họ là nhà cách tân. Được thiết kế, gia công và sản xuất tại Hoa Kỳ, mặt trống được làm từ hai lớp màn 7mil, tạo độ chắc bền giúp tăng thời gian sử dụng.', 'anh3_Trong.jpg', 560000, 8, 3, 3),
(39, 'MEINL Percussion SUB18 18inch Bahia Surdo, Aluminium', 'Bahia Surdos được làm ra để kỷ niệm Samba-Reggae. Mỗi nhạc cụ được cắt ngắn hơn so với Rio và thường được đeo thấp hơn nhiều, ở trên thắt lưng.', 'anh4_Trong.jpg', 7000000, 8, 3, 4),
(40, 'Latin Percussion LP1424 Americana Series Kevin Ricard Signature Cajon', 'Được thiết kế cùng với Kevin Ricard, cajon này có cơ chế điều chỉnh hàng đầu đã được cấp bằng sáng chế của chúng tôi được trang bị bốn dây đàn guitar D’Addario được điều chỉnh độc lập. Được làm bằng cây trồng 11 lớp được chọn lọc thủ công, thân Baltic Birch và thùng đàn Heartwood tuyệt đẹp, cajon đi kèm với các góc cạnh để tăng thêm sự thoải mái khi chơi.', 'anh5_Trong.jpg', 12000000, 8, 9, 5),
(50, 'trong', 'hay', '1.png', 1000000, 4, 5, 4),
(54, 'Focusrite Scarlett Solo (3rd Generation)1111', 'abcxyz112hghjghjghjghj', 'DHNT.jpg', 10000000, 3, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `MaNV` int(11) NOT NULL,
  `HoTenNV` varchar(100) NOT NULL,
  `TenDN` varchar(30) NOT NULL,
  `MatKhau` varchar(500) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `NVQuanLy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`MaNV`, `HoTenNV`, `TenDN`, `MatKhau`, `SDT`, `Email`, `DiaChi`, `NVQuanLy`) VALUES
(1, 'Nguyễn Hữu An', 'huuan61cntt2', '202cb962ac59075b964b07152d234b70', '0367841249', 'an.nh.61cntt@ntu.edu.vn', 'Ninh Hòa - Khánh Hòa', 1),
(32, 'Nguyễn Thành Hưng', 'abc123', '202cb962ac59075b964b07152d234b70', '0123456789', 'abcdef@gamil.com', 'ádsafdsfsdfsdfsd', 0),
(33, 'Nguyễn Duy Long', 'DuyLong123', '202cb962ac59075b964b07152d234b70', '01234561', 'duylong@gamil.com', 'abcxuy1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(100) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `Email`) VALUES
(1, 'NHẠC VIỆT – CÔNG TY TNHH THƯƠNG MẠI NHẠC VIỆT', '02838341500', '319 Điện Biên Phủ, P. 4, Q. 3, Tp. Hồ Chí Minh (TPHCM)', 'musicland@hcm.vnn.vn'),
(2, 'CÔNG TY TNHH HUY QUANG PIANO VÀ NHẠC CỤ', '02435123144', '23 & 108 Hào nam, Đống Đa, Hà Nội', 'huyquangpiano@yahoo.com.vn'),
(3, 'CƠ SỞ THẾ GIA SẢN XUẤT TRỐNG', '02838233175', '18B1S/5 Nguyễn Thị Minh Khai, P. Đa Kao, Q. 1, Tp. Hồ Chí Minh (TPHCM)', 'trongthegia18bis@gmail.com'),
(4, 'CÔNG TY CP TM & DV KT THÀNH ĐẠT – TRUNG TÂM ÂM NHẠC NHẠC CỤ TIẾN ĐẠT', '02466639953', 'Số 71 Đường Bờ Sông Quan Hoa, P. Quan Hoa, Q. Cầu Giấy, Hà Nội', 'info@nhaccutiendat.vn'),
(5, 'HOÀNG HUY MUSIC', '0964741522', '46 Hào Nam, Đống Đa, Hà Nội', 'quangdai1091@gmail.com'),
(6, 'CÔNG TY TNHH THƯƠNG MẠI TRÙNG DƯƠNG', '02822400736', '362 Điện Biên Phủ, P. 11, Q. 10, Tp. Hồ Chí Minh (TPHCM)', 'trungduongpiano@yahoo.com'),
(7, 'CÔNG TY TNHH THƯƠNG MẠI HÓA QUANG', '02838207436', '112 Điện Biên Phủ, P. Đa Kao, Q. 1, Tp. Hồ Chí Minh (TPHCM)', 'hoaquang@gmail.com'),
(8, 'CÔNG TY TNHH ÂM THANH NHẠC CỤ MINH PHỤNG', '0969768606', 'Số 347 Điện Biên Phủ, P. 4, Q. 3, Tp. Hồ Chí Minh (TPHCM)', 'cskh.minhphung@gmail.com'),
(9, 'CÔNG TY TNHH GIÁO DỤC VĂN HÓA NGHỆ THUẬT HIẾU NHẠC', '02353888666', '220 Huỳnh Thúc Kháng, Tp. Tam Kỳ, Quảng Nam', 'hieunhac@gmail.com'),
(10, 'CÔNG TY TNHH THƯƠNG MẠI MINH THANH P.I.A.N.O', '02512227603', '369 Điện Biên Phủ, P4, Q3, Tp. Hồ Chí Minh (TPHCM)', 'info@pianominhthanh.com'),
(11, 'CÔNG TY TNHH VĂN HÓA NGHỆ THUẬT ĐỨC THƯƠNG', '0316160560', 'Số 12, Đ. 30 Tháng 4, P. Trung Dũng, Tp. Biên Hòa, Đồng Nai', 'ducthuong8888@gmail.com'),
(13, 'CÔNG TY TNHH 696', '0123456789', 'Hành tinh B89 -Số 972 hệ hành tinh Germa tinh hà Green Pea', 'tcoe65@gmail.com'),
(14, '1', '0123456', '789', 'asspo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_hoa_don_ban`
--
ALTER TABLE `chi_tiet_hoa_don_ban`
  ADD PRIMARY KEY (`SoHD`,`MaNC`),
  ADD KEY `MaNC` (`MaNC`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNC` (`MaNC`);

--
-- Indexes for table `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  ADD PRIMARY KEY (`MaHSX`);

--
-- Indexes for table `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  ADD PRIMARY KEY (`SoHD`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `loai_nhac_cu`
--
ALTER TABLE `loai_nhac_cu`
  ADD PRIMARY KEY (`MaLoaiNC`);

--
-- Indexes for table `nhac_cu`
--
ALTER TABLE `nhac_cu`
  ADD PRIMARY KEY (`MaNC`),
  ADD KEY `MaLoaiNC` (`MaLoaiNC`),
  ADD KEY `MaNCC` (`MaNCC`),
  ADD KEY `MaHSX` (`MaHSX`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  MODIFY `MaHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  MODIFY `SoHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loai_nhac_cu`
--
ALTER TABLE `loai_nhac_cu`
  MODIFY `MaLoaiNC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nhac_cu`
--
ALTER TABLE `nhac_cu`
  MODIFY `MaNC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_hoa_don_ban`
--
ALTER TABLE `chi_tiet_hoa_don_ban`
  ADD CONSTRAINT `chi_tiet_hoa_don_ban_ibfk_2` FOREIGN KEY (`MaNC`) REFERENCES `nhac_cu` (`MaNC`),
  ADD CONSTRAINT `chi_tiet_hoa_don_ban_ibfk_3` FOREIGN KEY (`SoHD`) REFERENCES `hoa_don_ban` (`SoHD`);

--
-- Constraints for table `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  ADD CONSTRAINT `hoa_don_ban_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`),
  ADD CONSTRAINT `hoa_don_ban_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhan_vien` (`MaNV`);

--
-- Constraints for table `nhac_cu`
--
ALTER TABLE `nhac_cu`
  ADD CONSTRAINT `nhac_cu_ibfk_1` FOREIGN KEY (`MaLoaiNC`) REFERENCES `loai_nhac_cu` (`MaLoaiNC`),
  ADD CONSTRAINT `nhac_cu_ibfk_2` FOREIGN KEY (`MaNCC`) REFERENCES `nha_cung_cap` (`MaNCC`),
  ADD CONSTRAINT `nhac_cu_ibfk_3` FOREIGN KEY (`MaHSX`) REFERENCES `hang_san_xuat` (`MaHSX`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
