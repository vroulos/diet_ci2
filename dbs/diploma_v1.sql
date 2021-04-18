-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 04:47 PM
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
('41igukbfp55jd2vcnvmu4pc5f1', '::1', 1544467190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534343436373139303b),
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
('8n8hgv1hiiq83neaoe1or36goa', '::1', 1544696707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534343639363730373b),
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
('jnk1qfouueddndgcthdh33vrbf', '::1', 1545035798, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353033353739383b),
('jvs2gsdkcga43ea0b29haroroh', '::1', 1540553435, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303535333433353b),
('k0bbro7bu4sbdtucq8ejiv232v', '::1', 1544830999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534343833303939393b),
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
-- Table structure for table `dietitian`
--

CREATE TABLE `dietitian` (
  `dietitian_id` int(11) NOT NULL,
  `dietitian_name` varchar(50) NOT NULL,
  `dietitian_email` varchar(50) NOT NULL,
  `dietitian_password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dietitian_age` int(11) NOT NULL,
  `dietitian_mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dietitian`
--

INSERT INTO `dietitian` (`dietitian_id`, `dietitian_name`, `dietitian_email`, `dietitian_password`, `dietitian_age`, `dietitian_mobile`) VALUES
(1, 'aName', 'aNoName@gmail.com', '$2y$10$4qHBXorL2.iYs6N21rNVqeJZKiAyK6pZqMZfq6MuFTBT2ovo.mn4q', 45, 697789876);

-- --------------------------------------------------------

--
-- Table structure for table `fat_percentage`
--

CREATE TABLE `fat_percentage` (
  `id` int(155) NOT NULL,
  `fat_percent` int(23) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fat_percentage`
--

INSERT INTO `fat_percentage` (`id`, `fat_percent`, `user_id`, `date`) VALUES
(1, 56, 3, '2020-01-29 19:51:27'),
(2, 24, 3, '2020-01-30 19:13:03'),
(3, 43, 3, '2020-02-02 11:47:27'),
(4, 20, 5, '2020-02-04 18:21:30'),
(5, 42, 3, '2020-02-05 14:24:53'),
(6, 34, 3, '2020-02-06 18:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--
-- Error reading structure for table diploma.feedback: #1932 - Table 'diploma.feedback' doesn't exist in engine
-- Error reading data for table diploma.feedback: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `diploma`.`feedback`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `feedback1`
--

CREATE TABLE `feedback1` (
  `id` int(255) NOT NULL,
  `reaction` enum('like','dislike') NOT NULL,
  `text_reaction` varchar(255) NOT NULL,
  `meal_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback1`
--

INSERT INTO `feedback1` (`id`, `reaction`, `text_reaction`, `meal_id`) VALUES
(1, 'like', '', 4),
(2, 'like', '', 9),
(3, 'like', '', 13),
(4, 'like', '', 13),
(5, 'dislike', '', 13),
(6, 'like', '', 13),
(7, 'like', '', 5),
(8, 'like', '', 5),
(9, 'like', '', 6),
(10, 'dislike', '', 10),
(11, 'dislike', '', 14),
(12, 'like', 'πράσινο', 8),
(13, 'like', '', 58),
(14, 'dislike', '', 58),
(15, 'like', '', 59),
(16, 'like', 'πολλές θερμίδες', 61),
(17, 'like', '', 61),
(18, 'like', '', 61),
(19, 'like', '', 64),
(20, 'dislike', '', 68),
(21, 'like', 'καλο', 48),
(22, 'like', '', 2),
(23, 'like', 'ξδ', 49),
(24, 'dislike', '', 50),
(25, 'like', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `foodname` varchar(122) NOT NULL,
  `food_type` varchar(132) NOT NULL,
  `calories_per_100` int(50) NOT NULL,
  `dietitianId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `foodname`, `food_type`, `calories_per_100`, `dietitianId`) VALUES
(1, 'αρακάς', 'όσπρια', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `customer`, `message`, `date_sent`) VALUES
(1, 'trakas', 'Συνέχισε έτσι', '2020-01-30 19:06:34'),
(2, 'Nikos', 'Καλως ορίσατε στο diet_ci2.', '2020-02-04 17:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `nutricion_program_v2`
--

CREATE TABLE `nutricion_program_v2` (
  `id` int(255) NOT NULL,
  `week` int(255) NOT NULL,
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hour` enum('breakfast','brunch','lunch','dinner') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dietitian_id` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `food` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nutricion_program_v2`
--

INSERT INTO `nutricion_program_v2` (`id`, `week`, `day`, `hour`, `dietitian_id`, `user_id`, `food`, `date`) VALUES
(1, 1, 'monday', 'breakfast', 1, 3, 'γάλα και αμύγδαλα', '2020-01-29 23:02:58'),
(2, 2, 'monday', 'breakfast', 1, 3, 'μήλο', '2020-02-05 23:02:58'),
(3, 1, 'monday', 'breakfast', 1, 2, '', '2020-01-30 21:50:09'),
(4, 1, 'monday', 'brunch', 1, 3, 'τοστ', '2020-02-02 13:21:58'),
(5, 1, 'monday', 'lunch', 1, 3, 'φακές', '2020-02-02 13:22:12'),
(6, 1, 'monday', 'dinner', 1, 3, 'ψάρι με σαλάτα', '2020-02-02 13:22:19'),
(7, 1, 'tuesday', 'breakfast', 1, 3, 'κεράσια με γάλα', '2020-02-02 13:22:29'),
(8, 1, 'tuesday', 'brunch', 1, 3, 'μήλο', '2020-02-02 13:22:39'),
(9, 1, 'tuesday', 'lunch', 1, 3, 'κότσι χοιρινό', '2020-02-02 13:24:12'),
(10, 1, 'tuesday', 'dinner', 1, 3, 'αρακάς', '2020-02-02 13:24:23'),
(11, 1, 'wednesday', 'breakfast', 1, 3, 'μπανάνα με μέλι', '2020-02-02 13:24:38'),
(12, 1, 'wednesday', 'brunch', 1, 3, 'κρέπα', '2020-02-02 13:24:49'),
(13, 1, 'wednesday', 'lunch', 1, 3, 'μουσακάς', '2020-02-02 13:24:57'),
(14, 1, 'wednesday', 'dinner', 1, 3, 'καλαμαράκια τηγανιτά', '2020-02-02 13:25:10'),
(15, 1, 'thursday', 'breakfast', 1, 3, 'τυρόπιτα με αμυγδαλα', '2020-02-02 13:25:18'),
(16, 1, 'thursday', 'brunch', 1, 3, 'βάφλα με φρούτα', '2020-02-02 13:26:13'),
(17, 1, 'thursday', 'lunch', 1, 3, 'ψάρια με πατάτες', '2020-02-02 13:26:28'),
(18, 1, 'thursday', 'dinner', 1, 3, 'φάβα', '2020-02-02 13:26:47'),
(19, 1, 'friday', 'breakfast', 1, 3, 'Γάλα με αυγά', '2020-02-02 13:35:21'),
(20, 1, 'friday', 'brunch', 1, 3, 'τόστ με φράουλες', '2020-02-02 13:35:38'),
(21, 1, 'friday', 'lunch', 1, 3, 'σπανακόρυζο', '2020-02-02 13:36:39'),
(22, 1, 'friday', 'dinner', 1, 3, 'μοσχαράκι με πατάτες', '2020-02-02 13:36:46'),
(23, 1, 'saturday', 'breakfast', 1, 3, 'γάλα με δημητριακά', '2020-02-02 13:36:56'),
(24, 1, 'saturday', 'brunch', 1, 3, 'χυμό πορτοκάλι', '2020-02-02 13:37:16'),
(25, 1, 'saturday', 'lunch', 1, 3, 'παστίτσιο', '2020-02-02 13:37:41'),
(26, 1, 'saturday', 'dinner', 1, 3, 'σουβλάκια', '2020-02-02 13:37:52'),
(27, 1, 'sunday', 'breakfast', 1, 3, 'κρέπες με μέλι', '2020-02-02 13:37:59'),
(28, 1, 'sunday', 'brunch', 1, 3, 'μήλο', '2020-02-02 13:38:07'),
(29, 1, 'sunday', 'lunch', 1, 3, 'φασολάδα', '2020-02-02 13:38:35'),
(30, 1, 'sunday', 'dinner', 1, 3, 'σουτζουκάκια', '2020-02-02 13:38:47'),
(31, 1, 'monday', 'breakfast', 1, 4, 'μήλο', '2020-02-04 19:49:04'),
(32, 1, 'tuesday', 'dinner', 1, 4, 'χόρτα με σούπα', '2020-02-04 19:49:24'),
(33, 1, 'wednesday', 'breakfast', 1, 4, 'γιαούρτι με καρύδια', '2020-02-04 19:50:04'),
(34, 1, 'wednesday', 'brunch', 1, 4, 'ανανάς', '2020-02-05 21:09:33'),
(35, 1, 'wednesday', 'lunch', 1, 4, 'ψάρι με σαλάτα', '2020-02-05 21:09:45'),
(36, 1, 'wednesday', 'dinner', 1, 4, 'μουσακάς και σαλάτα', '2020-02-05 21:10:02'),
(37, 1, 'thursday', 'breakfast', 1, 4, 'κρουσάν με μέλι', '2020-02-05 21:10:19'),
(38, 0, 'monday', 'breakfast', 1, 5, '', '2020-02-05 21:11:47'),
(39, 1, 'wednesday', 'dinner', 1, 5, 'μουσακάς και σαλάτα', '2020-02-05 21:12:13'),
(40, 1, 'thursday', 'breakfast', 1, 5, 'τόστ με αβοκάντο', '2020-02-05 21:12:29'),
(41, 1, 'thursday', 'brunch', 1, 5, 'μήλο ', '2020-02-05 21:12:41'),
(42, 1, 'monday', 'breakfast', 1, 5, '', '2020-02-05 21:12:43'),
(43, 1, 'thursday', 'lunch', 1, 5, 'φακές με ψωμί', '2020-02-05 21:12:57'),
(44, 1, 'thursday', 'dinner', 1, 5, 'φασόλια με ρύζι', '2020-02-05 21:13:11'),
(45, 2, 'monday', 'brunch', 1, 3, 'αρακάς με τοστ', '2020-02-05 23:02:58'),
(47, 2, 'monday', 'lunch', 1, 3, 'μοσχαράκι με πατάτες', '2020-02-05 23:02:58'),
(48, 2, 'monday', 'dinner', 1, 3, 'παστίτσιο', '2020-02-05 23:02:58'),
(49, 2, 'tuesday', 'brunch', 1, 3, 'βάφλα με φρούτα', '2020-02-05 23:02:58'),
(50, 2, 'tuesday', 'breakfast', 1, 3, 'κεράσια με σταφύλια', '2020-02-05 23:02:58'),
(51, 2, 'tuesday', 'lunch', 1, 3, 'φακές με ψωμί', '2020-02-05 23:02:58'),
(52, 2, 'tuesday', 'dinner', 1, 3, 'χόρτα με σούπα', '2020-02-05 23:02:58'),
(53, 2, 'wednesday', 'brunch', 1, 3, 'ανανάς', '2020-02-05 23:02:58'),
(54, 2, 'wednesday', 'breakfast', 1, 3, 'γιαούρτι με καρύδια', '2020-02-05 23:02:58'),
(55, 2, 'wednesday', 'lunch', 1, 3, 'ψάρι με σαλάτα', '2020-02-05 23:02:58'),
(56, 2, 'wednesday', 'dinner', 1, 3, 'μουσακάς και σαλάτα', '2020-02-05 23:02:58'),
(57, 2, 'thursday', 'brunch', 1, 3, 'τοστ', '2020-02-05 23:02:58'),
(58, 2, 'thursday', 'breakfast', 1, 3, 'κρουσάν με μέλι', '2020-02-05 23:02:58'),
(59, 2, 'thursday', 'lunch', 1, 3, 'αρνάκι λαδορίγανη', '2020-02-05 23:02:58'),
(60, 2, 'thursday', 'dinner', 1, 3, 'λουκουμάδες', '2020-02-05 23:02:58'),
(61, 2, 'friday', 'brunch', 1, 3, 'κρουσάν με μέλι', '2020-02-05 23:02:58'),
(62, 2, 'friday', 'breakfast', 1, 3, 'μέλι με κάστανα', '2020-02-05 23:02:58'),
(63, 2, 'friday', 'lunch', 1, 3, 'σουτζουκάκια', '2020-02-05 23:02:58'),
(64, 2, 'friday', 'dinner', 1, 3, 'χορτόπιτα', '2020-02-05 23:02:58'),
(65, 2, 'saturday', 'brunch', 1, 3, 'τόστ με αβοκάντο', '2020-02-05 23:02:58'),
(66, 2, 'saturday', 'breakfast', 1, 3, 'δημητριακά', '2020-02-05 23:02:58'),
(67, 2, 'saturday', 'lunch', 1, 3, 'φακές με ψωμί', '2020-02-05 23:02:58'),
(68, 2, 'saturday', 'dinner', 1, 3, 'ρεβύθια με ρύζι', '2020-02-05 23:02:58'),
(69, 2, 'sunday', 'brunch', 1, 3, 'δημητριακά', '2020-02-05 23:02:58'),
(70, 2, 'sunday', 'breakfast', 1, 3, 'τοστ', '2020-02-05 23:02:58'),
(71, 2, 'sunday', 'lunch', 1, 3, 'ψάρια με πατάτες', '2020-02-05 23:02:58'),
(72, 2, 'sunday', 'dinner', 1, 3, 'μουσακάς και σαλάτα', '2020-02-05 23:02:58'),
(73, 1, 'monday', 'brunch', 1, 4, 'αρακάς με τοστ', '2020-02-05 21:10:19'),
(75, 1, 'monday', 'lunch', 1, 4, 'μοσχαράκι με πατάτες', '2020-02-05 21:10:19'),
(76, 1, 'monday', 'dinner', 1, 4, 'παστίτσιο', '2020-02-05 21:10:19'),
(77, 1, 'tuesday', 'brunch', 1, 4, 'βάφλα με φρούτα', '2020-02-05 21:10:19'),
(78, 1, 'tuesday', 'breakfast', 1, 4, 'κεράσια με σταφύλια', '2020-02-05 21:10:19'),
(79, 1, 'tuesday', 'lunch', 1, 4, 'φακές με ψωμί', '2020-02-05 21:10:19'),
(85, 1, 'thursday', 'brunch', 1, 4, 'τοστ', '2020-02-05 21:10:19'),
(87, 1, 'thursday', 'lunch', 1, 4, 'αρνάκι λαδορίγανη', '2020-02-05 21:10:19'),
(88, 1, 'thursday', 'dinner', 1, 4, 'λουκουμάδες', '2020-02-05 21:10:19'),
(89, 1, 'friday', 'brunch', 1, 4, 'κρουσάν με μέλι', '2020-02-05 21:10:19'),
(90, 1, 'friday', 'breakfast', 1, 4, 'μέλι με κάστανα', '2020-02-05 21:10:19'),
(91, 1, 'friday', 'lunch', 1, 4, 'σουτζουκάκια', '2020-02-05 21:10:19'),
(92, 1, 'friday', 'dinner', 1, 4, 'χορτόπιτα', '2020-02-05 21:10:19'),
(93, 1, 'saturday', 'brunch', 1, 4, 'τόστ με αβοκάντο', '2020-02-05 21:10:19'),
(94, 1, 'saturday', 'breakfast', 1, 4, 'δημητριακά', '2020-02-05 21:10:19'),
(95, 1, 'saturday', 'lunch', 1, 4, 'φακές με ψωμί', '2020-02-05 21:10:19'),
(96, 1, 'saturday', 'dinner', 1, 4, 'ρεβύθια με ρύζι', '2020-02-05 21:10:19'),
(97, 1, 'sunday', 'brunch', 1, 4, 'δημητριακά', '2020-02-05 21:10:19'),
(98, 1, 'sunday', 'breakfast', 1, 4, 'τοστ', '2020-02-05 21:10:19'),
(99, 1, 'sunday', 'lunch', 1, 4, 'ψάρια με πατάτες', '2020-02-05 21:10:19'),
(100, 1, 'sunday', 'dinner', 1, 4, 'μουσακάς και σαλάτα', '2020-02-05 21:10:19'),
(101, 2, 'monday', 'breakfast', 1, 4, 'μήλο', '2020-02-12 21:10:19'),
(102, 2, 'monday', 'brunch', 1, 4, 'αρακάς με τοστ', '2020-02-12 21:10:19'),
(104, 2, 'monday', 'lunch', 1, 4, 'μοσχαράκι με πατάτες', '2020-02-12 21:10:19'),
(105, 2, 'monday', 'dinner', 1, 4, 'παστίτσιο', '2020-02-12 21:10:19'),
(106, 2, 'tuesday', 'brunch', 1, 4, 'βάφλα με φρούτα', '2020-02-12 21:10:19'),
(107, 2, 'tuesday', 'breakfast', 1, 4, 'κεράσια με σταφύλια', '2020-02-12 21:10:19'),
(108, 2, 'tuesday', 'lunch', 1, 4, 'φακές με ψωμί', '2020-02-12 21:10:19'),
(109, 2, 'tuesday', 'dinner', 1, 4, 'χόρτα με σούπα', '2020-02-12 21:10:19'),
(110, 2, 'wednesday', 'brunch', 1, 4, 'ανανάς', '2020-02-12 21:10:19'),
(111, 2, 'wednesday', 'breakfast', 1, 4, 'γιαούρτι με καρύδια', '2020-02-12 21:10:19'),
(112, 2, 'wednesday', 'lunch', 1, 4, 'ψάρι με σαλάτα', '2020-02-12 21:10:19'),
(113, 2, 'wednesday', 'dinner', 1, 4, 'μουσακάς και σαλάτα', '2020-02-12 21:10:19'),
(114, 2, 'thursday', 'brunch', 1, 4, 'τοστ', '2020-02-12 21:10:19'),
(115, 2, 'thursday', 'breakfast', 1, 4, 'κρουσάν με μέλι', '2020-02-12 21:10:19'),
(116, 2, 'thursday', 'lunch', 1, 4, 'αρνάκι λαδορίγανη', '2020-02-12 21:10:19'),
(117, 2, 'thursday', 'dinner', 1, 4, 'λουκουμάδες', '2020-02-12 21:10:19'),
(118, 2, 'friday', 'brunch', 1, 4, 'κρουσάν με μέλι', '2020-02-12 21:10:19'),
(119, 2, 'friday', 'breakfast', 1, 4, 'μέλι με κάστανα', '2020-02-12 21:10:19'),
(120, 2, 'friday', 'lunch', 1, 4, 'σουτζουκάκια', '2020-02-12 21:10:19'),
(121, 2, 'friday', 'dinner', 1, 4, 'χορτόπιτα', '2020-02-12 21:10:19'),
(122, 2, 'saturday', 'brunch', 1, 4, 'τόστ με αβοκάντο', '2020-02-12 21:10:19'),
(123, 2, 'saturday', 'breakfast', 1, 4, 'δημητριακά', '2020-02-12 21:10:19'),
(124, 2, 'saturday', 'lunch', 1, 4, 'φακές με ψωμί', '2020-02-12 21:10:19'),
(125, 2, 'saturday', 'dinner', 1, 4, 'ρεβύθια με ρύζι', '2020-02-12 21:10:19'),
(126, 2, 'sunday', 'brunch', 1, 4, 'δημητριακά', '2020-02-12 21:10:19'),
(127, 2, 'sunday', 'breakfast', 1, 4, 'τοστ', '2020-02-12 21:10:19'),
(128, 2, 'sunday', 'lunch', 1, 4, 'ψάρια με πατάτες', '2020-02-12 21:10:19'),
(129, 2, 'sunday', 'dinner', 1, 4, 'μουσακάς και σαλάτα', '2020-02-12 21:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `id` int(11) NOT NULL,
  `customer` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `weight` int(23) NOT NULL,
  `userId` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`id`, `customer`, `date`, `weight`, `userId`) VALUES
(2, 'trakas', '2020-01-29 19:51:15', 80, 3),
(3, 'trakas', '2020-01-30 19:12:57', 83, 3),
(4, 'trakas', '2020-02-02 11:47:14', 80, 3),
(5, 'Lambros', '2020-02-04 18:21:27', 91, 5),
(6, 'trakas', '2020-02-05 14:24:40', 83, 3),
(7, 'trakas', '2020-02-06 18:09:14', 81, 3);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hour` enum('breakfast','brunch','lunch','dinner') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dietitian_id` int(10) NOT NULL,
  `food` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `template_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`day`, `hour`, `dietitian_id`, `food`, `template_name`) VALUES
('monday', 'breakfast', 1, 'μήλο', 'γυναίκες άνω των 18'),
('monday', 'brunch', 1, 'αρακάς με τοστ', 'γυναίκες άνω των 18'),
('monday', 'lunch', 1, 'μοσχαράκι με πατάτες', 'γυναίκες άνω των 18'),
('monday', 'dinner', 1, 'παστίτσιο', 'γυναίκες άνω των 18'),
('tuesday', 'breakfast', 1, 'κεράσια με σταφύλια', 'γυναίκες άνω των 18'),
('tuesday', 'brunch', 1, 'βάφλα με φρούτα', 'γυναίκες άνω των 18'),
('tuesday', 'lunch', 1, 'φακές με ψωμί', 'γυναίκες άνω των 18'),
('tuesday', 'dinner', 1, 'χόρτα με σούπα', 'γυναίκες άνω των 18'),
('wednesday', 'breakfast', 1, 'γιαούρτι με καρύδια', 'γυναίκες άνω των 18'),
('wednesday', 'brunch', 1, 'ανανάς', 'γυναίκες άνω των 18'),
('wednesday', 'lunch', 1, 'ψάρι με σαλάτα', 'γυναίκες άνω των 18'),
('wednesday', 'dinner', 1, 'μουσακάς και σαλάτα', 'γυναίκες άνω των 18'),
('thursday', 'breakfast', 1, 'κρουσάν με μέλι', 'γυναίκες άνω των 18'),
('thursday', 'brunch', 1, 'τοστ', 'γυναίκες άνω των 18'),
('thursday', 'lunch', 1, 'αρνάκι λαδορίγανη', 'γυναίκες άνω των 18'),
('thursday', 'dinner', 1, 'λουκουμάδες', 'γυναίκες άνω των 18'),
('friday', 'breakfast', 1, 'μέλι με κάστανα', 'γυναίκες άνω των 18'),
('friday', 'brunch', 1, 'κρουσάν με μέλι', 'γυναίκες άνω των 18'),
('friday', 'lunch', 1, 'σουτζουκάκια', 'γυναίκες άνω των 18'),
('friday', 'dinner', 1, 'χορτόπιτα', 'γυναίκες άνω των 18'),
('saturday', 'breakfast', 1, 'δημητριακά', 'γυναίκες άνω των 18'),
('saturday', 'brunch', 1, 'τόστ με αβοκάντο', 'γυναίκες άνω των 18'),
('saturday', 'lunch', 1, 'φακές με ψωμί', 'γυναίκες άνω των 18'),
('saturday', 'dinner', 1, 'ρεβύθια με ρύζι', 'γυναίκες άνω των 18'),
('sunday', 'breakfast', 1, 'τοστ', 'γυναίκες άνω των 18'),
('sunday', 'brunch', 1, 'δημητριακά', 'γυναίκες άνω των 18'),
('sunday', 'lunch', 1, 'ψάρια με πατάτες', 'γυναίκες άνω των 18'),
('sunday', 'dinner', 1, 'μουσακάς και σαλάτα', 'γυναίκες άνω των 18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deactivated` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `dietitianId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_confirmed`, `is_deleted`, `is_deactivated`, `dietitianId`) VALUES
(2, 'tredsa', 'pelatis@gmail.com', '$2y$10$3A7bF51XgRKy2o0DFiKJ1enPnwVWnbmOZq5DzIStf0eVqi73XWfkK', 'default.jpg', '2020-01-29 20:28:49', NULL, 0, 0, 0, 1),
(3, 'trakas', 'aname@email.gr', '$2y$10$3URwV6SNpTez1qQ9BFgpUeJd1pOcxeequK.DHQ/SVqvW8MCG6kISC', 'default.jpg', '2020-01-29 20:33:25', NULL, 0, 0, 0, 1),
(4, 'Nikos', 'iko@gmail.com', '$2y$10$a1qVb38PFiDhaR/lBtCil.4rBWjYf1F8O248cMBZea8UfK1h.HHKy', 'default.jpg', '2020-02-04 18:42:25', NULL, 0, 0, 0, 1),
(5, 'Lambros', 'lkefalas@gmail.com', '$2y$10$KgpZYFq3ggPLfLgBs6pmc.KScDjuELbuNjVvTVQ/Cgr7q5ZqFRHuC', 'default.jpg', '2020-02-04 19:14:30', NULL, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(255) NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `message_id` int(255) NOT NULL,
  `who_send_it` enum('user','dietitian') DEFAULT 'user',
  `answer_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `answer`, `message_id`, `who_send_it`, `answer_date`) VALUES
(1, 'Ευχαριστώ πολύ', 1, 'user', '2020-01-30 19:13:49'),
(2, '', 2, 'user', '2020-02-04 17:49:14'),
(3, 'Γεια σας', 2, 'user', '2020-02-04 17:49:28'),
(4, 'Όχι γεύματα κάτω από 1 κιλό.', 2, 'user', '2020-02-04 17:50:01'),
(5, 'Όχι γεύματα κάτω από 1 κιλό.', 2, 'user', '2020-02-04 17:50:35'),
(6, 'τώρα θα τρώτε με εγκράτεια . Φρούτα και λαχανικά ', 2, 'dietitian', '2020-02-04 17:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_notes`
--

CREATE TABLE `user_notes` (
  `id` int(255) UNSIGNED NOT NULL,
  `note` text NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `date_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_notes`
--

INSERT INTO `user_notes` (`id`, `note`, `user_id`, `date_inserted`) VALUES
(1, 'να τρώω λαχανικά', 3, '2020-01-30 19:13:34'),
(2, 'Όχι γεύματα κάτω από 1 κιλό', 4, '2020-02-04 17:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_secret_key`
--

CREATE TABLE `user_secret_key` (
  `id` int(255) NOT NULL,
  `password_id` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dietitian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='κωδικός για να εγγραφεί ο πελάτης';

--
-- Dumping data for table `user_secret_key`
--

INSERT INTO `user_secret_key` (`id`, `password_id`, `user_id`, `user_email`, `dietitian_id`) VALUES
(2, 'ir8w9fwj8f9', 0, 'nikPikermi@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `waistline`
--

CREATE TABLE `waistline` (
  `id` int(112) NOT NULL,
  `user_waistline` int(24) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waistline`
--

INSERT INTO `waistline` (`id`, `user_waistline`, `user_id`, `date`) VALUES
(1, 68, 3, '2020-01-29 19:51:36'),
(2, 45, 3, '2020-01-30 19:13:07'),
(3, 23, 3, '2020-02-02 11:47:33'),
(4, 99, 5, '2020-02-04 18:21:36'),
(5, 20, 3, '2020-02-05 14:25:01'),
(6, 31, 3, '2020-02-06 18:09:31');

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
-- Indexes for table `dietitian`
--
ALTER TABLE `dietitian`
  ADD PRIMARY KEY (`dietitian_id`),
  ADD KEY `dietitian_name` (`dietitian_name`);

--
-- Indexes for table `fat_percentage`
--
ALTER TABLE `fat_percentage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `feedback1`
--
ALTER TABLE `feedback1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodname` (`foodname`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutricion_program_v2`
--
ALTER TABLE `nutricion_program_v2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meal_per_customer` (`day`,`hour`,`user_id`,`week`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_userid` (`userId`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD UNIQUE KEY `unique_index` (`day`,`hour`,`template_name`) USING BTREE,
  ADD KEY `fk_toDietitian` (`dietitian_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `fk_to_dietitian` (`dietitianId`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_message` (`message_id`);

--
-- Indexes for table `user_notes`
--
ALTER TABLE `user_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note with user` (`user_id`);

--
-- Indexes for table `user_secret_key`
--
ALTER TABLE `user_secret_key`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `fk to dietitian` (`dietitian_id`);

--
-- Indexes for table `waistline`
--
ALTER TABLE `waistline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waistline_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dietitian`
--
ALTER TABLE `dietitian`
  MODIFY `dietitian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fat_percentage`
--
ALTER TABLE `fat_percentage`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback1`
--
ALTER TABLE `feedback1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nutricion_program_v2`
--
ALTER TABLE `nutricion_program_v2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_notes`
--
ALTER TABLE `user_notes`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_secret_key`
--
ALTER TABLE `user_secret_key`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waistline`
--
ALTER TABLE `waistline`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fat_percentage`
--
ALTER TABLE `fat_percentage`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD CONSTRAINT `fk_to_userid` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `fk_toDietitian` FOREIGN KEY (`dietitian_id`) REFERENCES `dietitian` (`dietitian_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_to_dietitian` FOREIGN KEY (`dietitianId`) REFERENCES `dietitian` (`dietitian_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `answer_message` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_notes`
--
ALTER TABLE `user_notes`
  ADD CONSTRAINT `note with user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_secret_key`
--
ALTER TABLE `user_secret_key`
  ADD CONSTRAINT `fk to dietitian` FOREIGN KEY (`dietitian_id`) REFERENCES `dietitian` (`dietitian_id`);

--
-- Constraints for table `waistline`
--
ALTER TABLE `waistline`
  ADD CONSTRAINT `waistline_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
