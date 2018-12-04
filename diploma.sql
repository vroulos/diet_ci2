-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 05:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diploma`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('03miiann8frfg4kq13fpi8ms9a', '::1', 1540644958, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343935383b),
('0fhccgcrk5ki7cdvjdvb4k68sr', '::1', 1540815018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831353031383b),
('0idq1l1l8pcodfemg6o6hscokh', '::1', 1540820493, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303439333b),
('0tf91eu44asf41b2m96gtemhe7', '::1', 1540570971, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537303937313b),
('0ujjosjoke8jhl2qv1jk1539a3', '::1', 1543861056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534333836313035363b),
('11shcmq1peq340se02hrjl1271', '::1', 1540645398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634353339383b),
('13c02d4h7n5dmism73tsodclac', '::1', 1540644410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343431303b),
('1h2jv5p1ql75vglhf628fv7tnr', '::1', 1540814089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343038393b),
('1kggs7cu18d8tjv33f422clf56', '::1', 1540815307, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831353330373b),
('2lhlq5ahnjuauf0nsec2gout7n', '::1', 1540645637, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634353633373b),
('3a6t81e1cdsmt57k3q0fqmkdmm', '::1', 1540820372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303337323b),
('3f8odk8v661h6d8malgnpkos23', '::1', 1540644954, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343935343b),
('400djhvgdrefvnao13hm33efor', '::1', 1540820157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303135373b),
('4b92a9unar69gq1tolgkb89mh3', '::1', 1540819022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831393032323b),
('4bbifv8fu37mqp19o5boafc8lo', '::1', 1540553442, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333434323b),
('4htlq0mdoo4h1aaghmiurts63o', '::1', 1540488541, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438383534313b),
('4leiiga1mfs4f4bdee9il4r0ch', '::1', 1540644957, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343935373b),
('4ptosb1sfkvsvmo9h2oiaro4ln', '::1', 1540822351, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832323335313b),
('4pv7lon1ae2la8r9id2821a8u3', '::1', 1540568487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303536383438373b),
('5ihnuedrbrbpfgbjm8fjpv2oal', '::1', 1540486115, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363131353b),
('626m0d9fan6a92bbt5lkld8f3t', '::1', 1540486849, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363834383b),
('6col5d7p9g40g292qbmeu4kphv', '::1', 1540820217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303231373b),
('6d65rbgabn0572njo9haf4ll1e', '::1', 1540572615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537323631353b),
('6llnho3vccuqv0vgmv4gqbd0ih', '::1', 1540570625, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537303632353b),
('6vusdj9d1p7595uhpchjjlmus4', '::1', 1540570576, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537303537363b),
('741s510i25b1q0vnu52mii38jp', '::1', 1540816020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363032303b),
('765qsrosbv4lh4milhu2lf8emj', '::1', 1540814809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343830393b),
('7eh8lc295uolsg5cn4mqkajt8e', '::1', 1540820264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303236343b),
('7hubjl5aadjsjhcsm8447dkms5', '::1', 1540644068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343036383b),
('7kjttvgrhi9e51jhg0jje7ov9n', '::1', 1540814088, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343038383b),
('8f27kr7ju7nimmjr4rbqge8678', '::1', 1540570613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537303631333b),
('8l1reij2bi4vne9kq8jhebl657', '::1', 1540486853, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363835333b),
('8ohgltsnudi7rghsi8p524qnvh', '::1', 1540814868, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343836383b),
('8ro17advnosf821a8si2jse6sp', '::1', 1540644276, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343237363b),
('9ann08r2dis6rublgffk6fp6hb', '::1', 1540641115, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634313131353b),
('9lbiegjdjjp17rdcd3spo4t2mn', '::1', 1540486533, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363533333b),
('9mjt4kona4tfqq75drp3uabrq1', '::1', 1540814872, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343837323b),
('9sfb7l9eee5o3o46a1b3dt1f8r', '::1', 1540645078, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634353037383b),
('a7nojdush19h8c5qntntmu2vt0', '::1', 1540814735, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343733353b),
('a812lmh2qo3f6gvi4ocj74ovoo', '::1', 1540820347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303334373b),
('a9rv4ei511uplfhofmghfe6jij', '::1', 1540822217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832323231373b),
('acro1n85bi6npj535il1249kaf', '::1', 1540821336, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832313333363b),
('acualoshb835rd7v39mdf5ngja', '::1', 1540486541, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363534313b),
('adhcu0k6sc6eoman3uc4smqnf4', '::1', 1540486538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363533383b),
('amddv1olcn6d2fd2olu8g4t8c5', '::1', 1540553440, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333434303b),
('b23t0ad8btqb9h5kk7lmdkes0o', '::1', 1540571287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537313238373b),
('b6ldvdglljkaq6o8jf5ojk0138', '::1', 1540820444, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303434343b),
('b8fcaliqkrmio4sf9plja7a2bl', '::1', 1540641300, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634313330303b),
('bbqn7bh4k4fu1bl2n841a98ava', '::1', 1540821129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832313132393b),
('bq28tmgg3buia0segr7h1js3v4', '::1', 1542405917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323430353931363b),
('c4csiuqouhrijv53ai86ck9c46', '::1', 1540572345, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537323334353b),
('caq3i117a4nhcgmea3u90s0462', '::1', 1540821126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832313132363b),
('coe2nj8uak3d33ijutijo4v74k', '::1', 1540553441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333434313b),
('d5pg4qfdpr0udpa95p0pc5rehk', '::1', 1540553429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333432393b),
('dts5b9s7e60281fhagl7ho922s', '::1', 1540816296, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363239363b),
('e5dtfagod4k5p87p5movdbo5n7', '::1', 1540553431, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433313b),
('ef9bqpnur079b2op4s2snp8svq', '::1', 1540820188, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303138383b),
('f24oj8fqbq5pfn0duq894e567p', '::1', 1540553439, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433393b),
('fe5a5ifr168puro9k1hesavfnf', '::1', 1540820345, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303334353b),
('foaehf5stnbni68vtr1fgchhqa', '::1', 1540816311, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363331313b),
('g20pnsfcqfo8vcvg7sgeoepp1h', '::1', 1540818598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831383539383b),
('gi7fn2b4109atndbsdpm4qiafo', '::1', 1540553436, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433363b),
('goj4cotcshjhn0i95hm4t4elm5', '::1', 1540570492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537303439323b),
('hpp5icp1du4gd4ko2aqiooi69h', '::1', 1540814691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343639313b),
('ialln70qujf68n35clb1fftsdl', '::1', 1540644961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343936313b),
('ih3i0dojrr3g20dboqacenjhjv', '::1', 1540486140, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363134303b),
('it2mge783h4meur7nh5ek550f5', '::1', 1540553432, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433323b),
('ivfgndu1i1thbcse38vu4j09lg', '::1', 1540814813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343831333b),
('j4jht5t826l8ve20ptq05d2824', '::1', 1540816203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363230333b),
('ja6gbimcc8g5e4r01vskphlvip', '::1', 1540553421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333432313b),
('jdi04esstv2scsl6evjtd8eetf', '::1', 1540818706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831383730363b),
('jvs2gsdkcga43ea0b29haroroh', '::1', 1540553435, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433353b),
('k9olco1labhq7ejd533gj2sdpr', '::1', 1540822658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832323635383b),
('kbg0h136gsgio44ajomr2v64qg', '::1', 1540557457, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535373435373b),
('kk9f48kbqi7k6j5b6ivdj1stm3', '::1', 1540814615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343631353b),
('km4jtn6gnb8qrgelda9u4o1u2o', '::1', 1540644965, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343936353b),
('kmtj17fghi83h8a94l9c705igr', '::1', 1540642089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634323038393b),
('kpfpdapq1ghdi8rlmu8tirc9m2', '::1', 1540641086, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634313038363b),
('kq31101m1n74k6m83p6mm0gdji', '::1', 1540819000, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831393030303b),
('l0t9d3j3b4mmksa18etgorippf', '::1', 1540553437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433373b),
('la8b6bad8uuojq55bnp87ek7rr', '::1', 1540488539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438383533383b),
('lc79fhc09hlaqjcmoj9f8toh3r', '::1', 1540644380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343338303b),
('lg5ega8ernh39k8m1m05qvntor', '::1', 1540641634, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634313633343b),
('lhq6h0lul7pd8bvieaosegi43j', '::1', 1540820073, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832303037333b),
('litra2blltu82m42a79ahkjhpa', '::1', 1540634522, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303633343532323b),
('ml8njgpiu91ihfcvuvsb9q54dc', '::1', 1540645595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634353539353b),
('mtvd8sm0arblddc2b2emcu78i6', '::1', 1540645385, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634353338353b),
('mv0qjjmcnvchprj904hv8sqi70', '::1', 1540486148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363134383b),
('n1omj0r634u61cquog5kcmooeh', '::1', 1540553433, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433333b),
('n6pnhpdgsq98cd9hqtvdon8civ', '::1', 1540644977, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343937373b),
('noug54d9apupgg4094nplhui04', '::1', 1540814182, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343138323b),
('o3ucjur8iah3gb06649ggqd3q3', '::1', 1543411569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534333431313536393b),
('ofjaqrapns98eshmnv3p71mruq', '::1', 1540571218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537313231383b),
('olmbvpcujvcu1rbqgjtov1brrt', '::1', 1540644955, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343935353b),
('omb5skf6mqn8irtm93n5ctn0hi', '::1', 1540486865, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363836353b757365725f69647c693a313b757365726e616d657c733a343a2271776572223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a303b69735f61646d696e7c623a303b),
('onqm1bs132kavph33id4i4li92', '::1', 1540816101, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363130313b),
('p43blqp26cgc2d6ql3m0879uk8', '::1', 1540641304, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634313330343b),
('pbttraocki87h0sk8g4s0t3drj', '::1', 1540814733, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831343733333b),
('pcs3oginfl42bjos9bgugmsese', '::1', 1540486136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363133363b),
('pgmn3e6kr5q3c8coed2v7hfl0b', '::1', 1540571334, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537313333343b),
('pncjjrdd7mfbv8g57m16j6ad7v', '::1', 1540553428, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333432383b),
('qmtcrgrpuabh36o3giomps95q1', '::1', 1540572573, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537323537333b),
('qr72ns4ssnnbq1kb5smuegf0l4', '::1', 1540572610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537323631303b),
('r62tetmg9qug6jsqf2edl56cug', '::1', 1540644226, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634343232363b),
('r6u9sugv9edr2kna3cqvp4s1hs', '::1', 1540572642, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537323634323b),
('r8nqlfopi77j5ag9hc87urlq9d', '::1', 1540568002, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303536383030323b),
('rhg6hn22050vr44g3l4200vr87', '::1', 1540816019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363031393b),
('rmpubbt22u76i748nlpjf5j70q', '::1', 1540822249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832323234393b),
('taqi59asba3jlilnl0sqm5p242', '::1', 1540821209, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832313230393b),
('td6274bhf5g635hu5uiqcni372', '::1', 1540645546, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303634353534363b),
('tlf9gspi75cdobl1bdtnu9jlk6', '::1', 1540819002, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831393030323b),
('tpn2etkcf8gitobre164am8922', '::1', 1540488549, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438383534393b),
('ttul2s32f1chcqddqndt079app', '::1', 1540816039, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363033393b),
('uboi03fpq0c6065dvno99bfo5t', '::1', 1540821125, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832313132353b),
('udqse3j4446nio0q2lmcn9iteq', '::1', 1540554259, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535343235393b),
('upp4kcajdjop8t5i2467se1s57', '::1', 1540816013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303831363031333b),
('urhfi80ta4ddabfomktiejof0b', '::1', 1540821119, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303832313131393b),
('usd1481n7vkdd720ij71ib3mef', '::1', 1540572613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537323631333b),
('v1hqnta4geml5e0mnau243iflb', '::1', 1540571003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303537313030333b),
('vdi173jvb16c13v6s50rd70mcd', '::1', 1540486543, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303438363534333b),
('vqcnf15jnu8rg5nu7fi0a06j2h', '::1', 1540568499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303536383439393b);

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE `data1` (
  `id` int(43) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`id`, `time`, `name`) VALUES
(4, '2018-11-22 18:00:16', 'nipis');

-- --------------------------------------------------------

--
-- Table structure for table `dietitian`
--

CREATE TABLE `dietitian` (
  `dietitian_id` int(11) NOT NULL,
  `dietitian_name` varchar(50) NOT NULL,
  `dietitian_email` varchar(50) NOT NULL,
  `dietitian_password` varchar(50) NOT NULL,
  `dietitian_age` int(11) NOT NULL,
  `dietitian_mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dietitian`
--

INSERT INTO `dietitian` (`dietitian_id`, `dietitian_name`, `dietitian_email`, `dietitian_password`, `dietitian_age`, `dietitian_mobile`) VALUES
(1, 'solinas3', 'sol@gmail.com', '$2y$10$xO4zoTeUIeOx44Sh.mnTUOba8dQhRQ9eDg85CtCuLYP', 0, 0),
(2, 'solinas4', 'sol@gmail.com', '$2y$10$v3r76tC0Dj5BF6N.J1IwJeaFjyPuoQj26j/GgCkS0BI', 0, 0),
(3, 'solinas4', 'sol@gmail.com', '$2y$10$NZ0IZYJyJ4JNBlnysMeTFei1eRFWNX./5pBVZyHKTvZ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(255) NOT NULL,
  `foodname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `foodname`) VALUES
(4, 'μουσακάς'),
(7, 'τραχανάς'),
(8, 'γεμιστά'),
(9, 'μεζεδάκια'),
(10, 'ρεβύθια'),
(11, 'φακές'),
(12, 'γιαούρτι'),
(13, 'σπανακόρυζο'),
(14, 'μοσχάρι'),
(15, 'κεφτεδάκια'),
(16, 'μακαρόνια'),
(19, 'καφές'),
(20, 'καφές'),
(21, 'καφές'),
(22, 'κάστανα'),
(23, 'κάστανα'),
(24, 'πεϊνιρλί'),
(25, 'keftedakia'),
(26, 'keftedakia'),
(27, 'keftedakia'),
(28, 'fiali'),
(29, 'φρυγανιές'),
(30, 'πορτοκάλι'),
(31, 'fiali'),
(32, 'παστίτσιο'),
(33, 'τομάτα'),
(34, 'τομάτα'),
(35, 'τομάτα'),
(36, 'τομάτα'),
(37, 'τομάτα'),
(38, 'τομάτα'),
(39, 'τομάτα'),
(40, 'τομάτα'),
(41, 'κοτόπουλο'),
(42, 'κοκορα'),
(43, 'κοκορα'),
(44, 'κοκίρ'),
(45, 'κοκίρ'),
(46, 'κοκίρ'),
(47, 'κοκίρ'),
(48, 'πεπονέτο'),
(49, 'πεπονέτο'),
(50, 'πεπονέτο'),
(51, 'καφές'),
(52, 'καφές'),
(53, 'φακές');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `customer`, `message`) VALUES
(3, 'nipis', 'είσαι πολύ τυχερός . Συνέχισε'),
(5, 'nipis', 'Θα σε πιάσω από τα αυτιά'),
(6, 'nipis', 'δώσε πόνο δικέ μου'),
(9, '', 'το μεσημέρι έχει μουσακά'),
(10, '', 'το μεσημέρι έχει μουσακά'),
(11, '', 'Είσαι σε πολύ καλό δρόμο'),
(13, 'saliaris', 'fvdgfdgf'),
(14, 'saliaris', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj');

-- --------------------------------------------------------

--
-- Table structure for table `nutricion_program`
--

CREATE TABLE `nutricion_program` (
  `id` int(255) NOT NULL,
  `monday_break` varchar(255) NOT NULL,
  `monday_lau` varchar(255) NOT NULL,
  `monday_din` varchar(255) NOT NULL,
  `tuesday_break` varchar(255) NOT NULL,
  `tuesday_lau` varchar(255) NOT NULL,
  `tuesday_din` varchar(255) NOT NULL,
  `wendsday_break` varchar(255) NOT NULL,
  `wendsday_lau` varchar(255) NOT NULL,
  `wendsday_din` varchar(255) NOT NULL,
  `thursday_break` varchar(255) NOT NULL,
  `thursday_lau` varchar(255) NOT NULL,
  `thursday_din` varchar(255) NOT NULL,
  `friday_break` varchar(255) NOT NULL,
  `friday_lau` varchar(255) NOT NULL,
  `friday_din` varchar(255) NOT NULL,
  `saturday_break` varchar(255) NOT NULL,
  `saturday_lau` varchar(255) NOT NULL,
  `saturday_din` varchar(255) NOT NULL,
  `sunday_break` varchar(255) NOT NULL,
  `sunday_lau` varchar(255) NOT NULL,
  `sunday_din` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nutricion_program`
--

INSERT INTO `nutricion_program` (`id`, `monday_break`, `monday_lau`, `monday_din`, `tuesday_break`, `tuesday_lau`, `tuesday_din`, `wendsday_break`, `wendsday_lau`, `wendsday_din`, `thursday_break`, `thursday_lau`, `thursday_din`, `friday_break`, `friday_lau`, `friday_din`, `saturday_break`, `saturday_lau`, `saturday_din`, `sunday_break`, `sunday_lau`, `sunday_din`, `customer_name`) VALUES
(23, 'φακές', 'γάλατάκι', 'κολοκυθάκια', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'saliaris');

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `id` int(11) NOT NULL,
  `customer` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `weight` int(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`id`, `customer`, `date`, `weight`) VALUES
(26, 'saliaris', '2018-11-23 18:07:59', 67),
(27, 'saliaris', '2018-11-23 18:09:43', 67),
(28, 'saliaris', '2018-11-23 18:16:55', 0),
(29, 'saliaris', '2018-11-23 18:17:08', 67),
(30, 'saliaris', '2018-11-23 18:18:15', 67),
(31, 'saliaris', '2018-11-23 18:18:19', 67),
(32, 'saliaris', '2018-11-23 18:18:46', 67),
(33, 'saliaris', '2018-11-23 18:18:55', 645),
(34, 'saliaris', '2018-11-23 18:20:17', 677),
(35, 'saliaris', '2018-11-26 17:53:00', 80),
(36, 'saliaris', '2018-11-27 15:22:45', 91),
(37, 'saliaris', '2018-11-27 15:31:03', 91),
(38, 'saliaris', '2018-11-27 15:31:48', 91),
(39, 'saliaris', '2018-11-27 15:38:09', 67),
(40, 'saliaris', '2018-11-27 15:49:27', 80),
(41, 'saliaris', '2018-11-27 15:49:47', 89),
(42, 'saliaris', '2018-11-27 15:50:37', 80),
(43, 'saliaris', '2018-11-27 15:59:05', 101),
(44, 'saliaris', '2018-11-27 15:59:32', 110),
(45, 'saliaris', '2018-11-27 16:34:18', 68),
(46, 'saliaris', '2018-11-28 12:46:25', 89),
(47, 'saliaris', '2018-11-28 14:10:11', 89),
(48, 'saliaris', '2018-11-28 14:12:46', 89),
(49, 'saliaris', '2018-11-28 14:16:31', 80),
(50, 'saliaris', '2018-11-28 14:17:15', 80),
(51, 'saliaris', '2018-11-28 14:19:28', 121),
(52, 'saliaris', '2018-11-28 14:32:56', 121),
(53, 'saliaris', '2018-11-28 14:46:53', 121),
(54, 'saliaris', '2018-11-28 14:50:41', 121),
(55, 'saliaris', '2018-11-28 14:51:55', 121),
(56, 'saliaris', '2018-12-03 13:20:59', 88),
(57, 'saliaris', '2018-12-03 13:22:07', 90),
(58, 'saliaris', '2018-12-03 13:30:04', 34),
(59, 'saliaris', '2018-12-03 13:39:04', 34),
(60, 'saliaris', '2018-12-03 13:39:59', 34),
(61, 'saliaris', '2018-12-03 13:42:40', 34),
(62, 'saliaris', '2018-12-03 13:46:50', 34),
(63, 'saliaris', '2018-12-03 13:47:18', 65),
(64, 'saliaris', '2018-12-03 13:47:55', 55),
(65, 'saliaris', '2018-12-03 13:49:03', 90),
(66, 'saliaris', '2018-12-03 13:49:47', 88),
(67, 'saliaris', '2018-12-03 13:51:43', 98),
(68, 'saliaris', '2018-12-03 13:52:09', 88),
(69, 'saliaris', '2018-12-03 13:53:46', 77),
(70, 'saliaris', '2018-12-03 13:54:09', 87),
(71, 'saliaris', '2018-12-03 13:57:11', 87),
(72, 'saliaris', '2018-12-03 13:57:20', 77),
(73, 'saliaris', '2018-12-03 14:06:23', 78),
(74, 'saliaris', '2018-12-03 14:08:48', 90),
(75, 'saliaris', '2018-12-03 14:09:32', 76),
(76, 'saliaris', '2018-12-03 14:18:27', 67),
(77, 'saliaris', '2018-12-03 14:19:00', 68),
(78, 'saliaris', '2018-12-03 14:20:18', 68),
(79, 'saliaris', '2018-12-03 14:32:15', 78),
(80, 'saliaris', '2018-12-03 14:33:07', 80),
(81, 'saliaris', '2018-12-03 14:33:34', 78),
(82, 'saliaris', '2018-12-03 14:34:00', 78),
(83, 'saliaris', '2018-12-03 14:34:32', 80),
(84, 'saliaris', '2018-12-03 14:34:52', 78),
(85, 'saliaris', '2018-12-03 14:35:19', 78),
(86, 'saliaris', '2018-12-03 14:35:47', 78),
(87, 'saliaris', '2018-12-03 14:36:01', 78),
(88, 'saliaris', '2018-12-03 18:34:24', 77);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(1, 'qwer', 'vrfr@gmail.com', '$2y$10$WU7f5.4XArynOCkCxXIKCeyA9EPY/2UBdaA4oLpa2FOj97QiRFFR6', 'default.jpg', '2018-10-25 19:00:49', NULL, 0, 0, 0),
(2, 'nipis', 'olamesa@gmail.com', '$2y$10$xShFHp3gjYLdZr3g6ru41.x3euO1/Ni81Hy.xqK4Pz0hMBSPhK0Ta', 'default.jpg', '2018-10-29 17:27:15', NULL, 0, 0, 0),
(3, 'pipikas', 'fdsa@fd.com', '$2y$10$wUEB8W9q1yCZqeEUhJX9DeLE1Y78md/3m5dvdGAhlkl2NG/pqk19.', 'default.jpg', '2018-10-30 14:24:38', NULL, 0, 0, 0),
(4, 'saliaris', 'fsafsa@gmail.com', '$2y$10$WaQaAyLJiEbG.D.KiBsn6eLWHSDYuvEZchn0nm8p165pfHbrcac5O', 'default.jpg', '2018-11-05 16:09:42', NULL, 0, 0, 0),
(5, 'saliatakas', 'fsaf@gmail.com', '$2y$10$C3eaIJlMUg25ZRcN5Zn98eiWRi/JGOp5iJms..Met0O1jFp4EyJD2', 'default.jpg', '2018-11-09 19:07:02', NULL, 0, 0, 0),
(6, 'kakavias', 'fdsaf@fdsa.com', '$2y$10$icjWP4eJ6/Y6J4wrbGYMYelkvsN31pRrKYZZ.SsiUtuoCHENDwnDK', 'default.jpg', '2018-11-21 12:26:06', NULL, 0, 0, 0),
(7, 'krotalias', 'fdsaf@fds.com', '$2y$10$eaejAlFL/DEjDChNJqOu3u8qnrI8Tr7kBQNRt1Dajep71ir2t0/qm', 'default.jpg', '2018-11-21 12:26:37', NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `data1`
--
ALTER TABLE `data1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietitian`
--
ALTER TABLE `dietitian`
  ADD PRIMARY KEY (`dietitian_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutricion_program`
--
ALTER TABLE `nutricion_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data1`
--
ALTER TABLE `data1`
  MODIFY `id` int(43) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dietitian`
--
ALTER TABLE `dietitian`
  MODIFY `dietitian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nutricion_program`
--
ALTER TABLE `nutricion_program`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
