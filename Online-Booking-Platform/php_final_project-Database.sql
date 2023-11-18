-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 04:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `username`, `email`, `password_hash`, `last_name`, `phone`) VALUES
(1, 'Ada Mata', 'addie@gmail.com', '$2y$10$ymnDBuoN3.Ik3RO9lAoLEuYY3FXnd2uLj4kV3ZxElGlWWApUhZ7za', NULL, NULL),
(2, '', '', '$2y$10$nuuUD/VwuCACQcXx9FmSCub1zIljMYf8n2.a4zrPFbr8F7IzF1jae', NULL, NULL),
(3, 'Yuri Oli', 'yurioli@gmail.com', '$2y$10$s3iX/ma6xc55nMxn5nxb/uZxZKWytpL1/aZODrlsHFF5gD0CJhhfG', NULL, NULL),
(4, 'yude-oli', 'yude@gmail.com', '$2y$10$cjO95H4.qCTi.1ZRF2UIH..CqOxGj8nvaffkfH8sEYr5FNHHVPDla', NULL, NULL),
(5, 'yude-oli', 'yudeoli@gmail.com', '$2y$10$lkxtW3MgknQy3kLMdwITJuJXBWkxmRHrYi/aIlKd9TDpUbGuTfziS', NULL, NULL),
(6, 'Joao', 'joaopedro@gmail.com', '$2y$10$F0b.ZuVGsxu7Ly49ImI2Ae74lMu33ioEP7Wt6tT8KdmBYDch6P1Ty', 'Pedro', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `title`, `content`) VALUES
(1, 'Leighton Amies: Who is the teenager convicted of murdering boy in knife attack?', 'Northumbria Police released the picture of Leighton Amies, 15, after he was convicted of killing 14-year-old Tomasz Oleszak.\r\n\r\nLeighton Amies claimed he was attacked while walking a friend home through Whitehills Nature Park, and said he did not know he had stabbed Oleszak in the chest.\r\n\r\nProsecutors said his claim of being attacked was a lie and a jury at Newcastle Crown Court found him guilty of murder on Monday 17 April.\r\n\r\n“There is a public interest in trying to deflect young people from the carrying of knives, when that happens, this kind of utterly tragic outcome can occur”, said Judge Justice Spencer.'),
(2, 'Modern Self Defense', 'I actually got a chance last week on the way home from work. It looked like a traffic accident between a bike and a car had just happened right at the entrance to my neighborhood. At first, I thought I’d help medically, but when I noticed that the driver and bike rider are having a screaming match I knew I wouldn’t need that skill.\r\n\r\nBoth men were yelling mostly absurd things and blocking the road. I thought I’d wait and see what happened. It didn’t cool down after a couple of minutes, so I asked the question of the rider, are you okay? Are you hurt?\r\n\r\nDon’t miss this, I did it from a position of advantage. I was in my car, armed, but more importantly, I had a way to escape in my car without being hurt. If you are going to practice de-escalation it is normally between individuals that are very emotionally charged and that could mean they are a danger to yourself or others. Don’t give up your personal safety to practice self-defense skills. \r\n\r\n“There is a public interest in trying to deflect young people from the carrying of knives, when that happens, this kind of utterly tragic outcome can occur”, said Judge Justice Spencer.'),
(3, 'Injuries in Brazilian Jujitsu Prompt Introspection in Growing Martial Art', 'Brazilian jujitsu, a self-defense form popularized by its use in mixed martial arts, is seeing new conflicts with less oversight than some other combat sports.\r\nWhen Erik Milosevich attended his first Brazilian jujitsu class, he hoped it would spark a mutual interest to share with his teenage daughter. Instead, he left the gym with a limp, after injuring his left knee while sparring with an instructor, and a distaste for one of the fastest-growing martial arts for self-defense and competition.\r\n\r\nBrazilian jujitsu offers an enticing proposition: that a smaller, weaker person can defeat a larger, stronger opponent in a fight. Jujitsu is nicknamed the “gentle art,” based on a loose translation of the Japanese phrase, and trades the punches and kicks of striking sports for grappling techniques, including chokes and joint manipulation, to help fighters subdue and submit opponents.\r\n\r\nThe sport’s popularity has surged in recent years, spurred by its effectiveness in professional mixed martial arts and frequent promotion by the likes of Joe Rogan, the podcaster and Ultimate Fighting Championship analyst. Mark Zuckerberg, the Meta chief executive, started Brazilian jujitsu as a hobby during the coronavirus pandemic and recently competed in his first tournament. (He has also jawed back and forth with Elon Musk about a “cage match” that appears to be more bluster than reality.)\r\n\r\nBrazilian jujitsu is often billed by those who practice it as accessible, effective for self-defense, technically challenging, physically rewarding and relatively safe compared with other combat sports. Some say it is closer to playing chess than to fighting.\r\n\r\nBut that marketing often does not match the realities on the mats. Trust in Brazilian jujitsu is everything because mere ounces of extra pressure applied during a submission can lead to a torn tendon or a broken bone. Yet student safety is left to the discretion of instructors and training partners. That has prompted debate throughout the sport about oversight and whether some dojos and gyms are hurting the reputation of the martial art.\r\n\r\nMilosevich, a retired police officer who once trained his colleagues in defensive tactics, said that when he was sparring at his class, the instructor placed him in a heel hook, a technique in which the foot is trapped and the knee is twisted. Many schools teach the move only to advanced students and it is banned in many levels of competition because of the injury risk. If fully applied, heel hooks can tear most of the major ligaments in the knee.'),
(5, 'Pinned Under the Bodies of Men', 'I thought being sexually bold was a game I was allowed to play. I had no idea of the punishment that awaited me — or the surprising healing to come.\r\nThere are few topics in sex research as compelling and confounding to researchers, clinicians, and the general public as that of transsexualism. Upending normative notions of gender, eroticism, and identity, it poses significant scientific and clinical challenges. The book addresses a fascinating and largely unexplored topic within the study of transsexualism: The feelings and desires of conventionally masculine men who are attracted to women yet want to become women themselves. Through a collection and discussion of vivid first-person narratives, the book provides an in-depth examination of these men\'s unusual propensity to be sexually aroused by the thought of themselves as women and how these men\'s sexual feelings influence their decisions to seek or undergo sex reassignment.\r\nThese narratives about autogynephilia by autogynephilic male-to-female (MtF) transsexuals provide the first comprehensive documentation of the erotic ideation that underlies the most common form of MtF transsexualism. The narratives provide empirical evidence for Blanchard\'s theory of MtF transsexual motivation, and thus are of interest to researchers and theorists studying the phenomenology of MtF transsexualism. The narratives are likely to be eye-opening to psychologists, psychiatrists, physicians, and other professionals who work with MtF transsexuals: Most clinicians probably do not fully appreciate the erotic underpinnings of their clients\' condition. A better understanding of their clients\' autogynephilic feelings and motivations would enable these professionals to provide more empathetic and effective clinical care.'),
(6, '‘You’re Not Helpless’: For London Women, Learning to Fight Builds Confidence', ' For 22 years, Richard Kim has owned and operated Krav Maga Regina. According to students, taking an introductory four-week course to Krav Maga has shown them what they have inside themselves when it comes to defending against an attack.\r\n\r\n“Well, I’m not the same person I am now than when I started,” said Tanya Smith, a new student to the course.\r\n\r\nHer sparring partner, Elizabeth Duclaux, said the course helps your reflexes and your mindset.\r\n\r\n\"It helps give you the confidence to know that you’re less likely to freeze,” she said.\r\n\r\nAccording to Kim, that’s the goal.\r\n\r\n“We don’t want our students freezing, we want them either getting out of there or fighting back, in order to run away,” he said.\r\n\r\nTeaching this version of martial arts allows Kim’s clients to get a sense of a self defense quickly.\r\n\r\n“It was a system designed to be learned quickly, it had to work for men and women, younger, older, athletic, non-athletic, and it was something for everyone and that was the biggest appeal to me,” said Kim.\r\n\r\nKim is a product of Tae Kwon-Do, which his father enrolled him in when he was 6-years-old.\r\n\r\nBut he believes that Krav Maga instills a confidence, especially in women, that they are strong enough to at least escape an aggressive attack.\r\n\r\n“Not being afraid to fight, not being afraid to fight back … standing up for yourself … I think that’s most important.”\r\n\r\nMany women who sign up for the course are looking for that.\r\n\r\n“Because I don’t want to be a victim and I don’t want to feel helpless … I wanted to at least know I could be aggressive if I needed to be,” Duclaux told CTV News after her fourth class.\r\n\r\n“Yeah I’m stronger than I thought I was,” added Jenni Stardeski. “I just wanted to take a self defence course just for the knowledge of what to do if somebody did attack me.”');

-- --------------------------------------------------------

--
-- Table structure for table `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp_column` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projetos`
--

INSERT INTO `projetos` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `timestamp_column`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '2023-09-28 20:32:57'),
(2, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'JK,wjeiudjknes', '2023-09-28 20:32:57'),
(3, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'I want to complain about how I have signed for the class and so far I got no feed back.', '2023-09-28 20:32:57'),
(4, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'I want to complain about how I have signed for the class and so far I got no feed back.', '2023-09-28 20:32:57'),
(5, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'I want my money back!!! I am very pissed', '2023-09-28 20:32:57'),
(6, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'I want to complain about how I have signed for the class and so far I got no feed back.', '2023-09-28 20:32:57'),
(7, 'Addie', 'Mata', 'addiemata@gmail.com', '912345674', 'Why I haven\'t received a reply yet?', '2023-09-28 20:32:57'),
(8, 'Addie', 'Mata', 'admydamata@gmail.com', '912345674', 'Everything I have said and you don\'t want to know my side of the stoty, very poor service of you', '2023-09-28 20:32:57'),
(9, 'Addie', 'Mata', 'addiemata@gmail.com', '912345674', 'I am so angry, and I want my money back!', '2023-09-28 20:32:57'),
(10, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'I want you to understand how frustrated I am', '2023-09-28 20:32:57'),
(11, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'I love evrything', '2023-09-28 20:32:57'),
(12, 'Addie', 'Mata', 'addiemata@gmail.com', '912345674', 'I dont want this', '2023-09-28 20:32:57'),
(13, 'Addie', 'Mata', 'zisamata@gmail.com', '912345674', 'I don\'t want this now', '2023-09-28 20:32:57'),
(14, NULL, NULL, 'joaopedro@gmail.com', NULL, '5ttrgfbrdf', '2023-09-28 20:32:57'),
(15, NULL, NULL, 'joaopedro@gmail.com', NULL, '5ttrgfbrdf', '2023-09-28 20:32:57'),
(16, NULL, NULL, 'alanmata@gmail.com', NULL, NULL, '2023-09-28 20:37:45'),
(17, 'Alan', 'Mata', 'alanmata@gmail.com', '912345678', 'I want to start this asap', '2023-09-28 20:42:26'),
(18, 'Alan', 'Mata', 'alanmata@gmail.com', '912345678', 'I want to start this asap', '2023-09-28 20:44:15'),
(19, 'Yuri', 'Oli', 'dfds@gmail.com', '912345678', 'Yes', '2023-10-14 13:03:48'),
(20, 'Yuri', 'Oli', 'dfds@gmail.com', '912345678', '3r4t56uj', '2023-10-14 13:07:20'),
(21, NULL, NULL, 'erefsd@gmnail.com', NULL, NULL, '2023-10-14 13:52:35'),
(22, 'Yuri', 'Pedro', 'alanmata@gmail.com', '91234567', 'rtrgyujykmu', '2023-10-14 14:00:01'),
(23, 'Yuri', 'Pedro', 'dfds@gmail.com', '912345674', 'ilukyjtr', '2023-10-14 14:03:43'),
(24, 'Alan', 'Oli', 'alanmata@gmail.com', '912345678', 'ewrtyujkjl', '2023-10-14 14:18:35'),
(25, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'edrfgtyuiyhtgrf', '2023-10-14 14:22:49'),
(26, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'efdgtytdyht', '2023-10-21 14:38:31'),
(27, 'Addie', 'Mata', 'addiemata@gmail.com', '912345674', 'wsdefwetr', '2023-10-21 14:39:57'),
(28, 'Addie', 'Mata', 'addiemata@gmail.com', '912345678', 'rdfcsrfdgxtbhrds', '2023-10-21 14:40:43'),
(29, 'Haiti', 'Mata', 'haitimata@gmail.com', '912345678', 'Hellooo', '2023-10-21 15:16:57'),
(30, 'Yery', 'Val', 'yeryval@gmail.com', '912345678', 'Yeryyy', '2023-10-21 15:24:40'),
(31, 'Yery', 'Val', 'yeryval@gmail.com', '912345674', 'efdrfrdh', '2023-10-21 15:25:45'),
(32, 'Yery', 'Val', 'yeryval@gmail.com', '912345678', 'rtgtyfdgh', '2023-10-21 15:27:17'),
(33, 'Addie', 'Pedro', 'addiemata@gmail.com', '912345678', 'yeeeeeee', '2023-11-04 18:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `selectedService` varchar(255) NOT NULL,
  `selectedMonths` int(11) NOT NULL,
  `finalPrice` varchar(255) NOT NULL,
  `available_classes` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `select_date` date DEFAULT NULL,
  `timestamp_column` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `first_name`, `last_name`, `phone`, `selectedService`, `selectedMonths`, `finalPrice`, `available_classes`, `email`, `select_date`, `timestamp_column`) VALUES
(74, 'Zisa', 'da Mata', '912345674', 'Standard', 3, '$1905', 'Situational Awareness and Mindset, Verbal De-Escalation', '', NULL, '2023-11-04 13:19:10'),
(87, 'Yuri', 'Oli', '912345674', 'Standard', 3, '$2305', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices', 'yurioli@gmail.com', NULL, '2023-11-04 13:19:10'),
(88, 'Yuri ', 'Oli', '912345674', 'Premium', 3, '$2075', 'Situational Awareness and Mindset, Personal Safety Devices', 'yurioli@gmail.com', NULL, '2023-11-04 13:19:10'),
(99, 'Zisa', 'da Mata', '912345678', 'Premium', 3, '$2475', 'Situational Awareness and Mindset, Verbal De-Escalation, Basic Physical Techniques', 'zisamata@gmail.com', NULL, '2023-11-04 13:19:10'),
(100, 'Zisa', 'da Mata', '912345674', 'Standard', 3, '$2305', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices', 'zisamata@gmail.com', NULL, '2023-11-04 13:19:10'),
(106, 'John', 'Peter', '912345679', 'Standard', 4, '$2240', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices', 'johnpeter@gmail.com', NULL, '2023-11-04 13:19:10'),
(116, 'Joao', 'Pedro', '912345678', 'Premium', 5, '$2000', 'Verbal De-Escalation, Personal Safety Devices', 'joaopedro@gmail.com', NULL, '2023-11-04 13:19:10'),
(118, 'Yuri', 'Oli', '912345678', 'Premium', 4, '$2000', 'Situational Awareness and Mindset, Verbal De-Escalation', 'erefsd@gmnail.com', NULL, '2023-11-04 13:19:10'),
(123, 'Haiti', 'Mata', '912345678', 'Premium', 4, '$2400', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices', 'haitimata@gmail.com', NULL, '2023-11-04 13:19:10'),
(125, 'Yery', 'Val', '912345678', 'Premium', 4, '$2400', 'Situational Awareness and Mindset, Personal Safety Devices, Self-Defense Against Multiple Attackers', 'yeryval@gmail.com', NULL, '2023-11-04 13:19:10'),
(128, 'Willie', 'Olins', '912345674', 'Premium', 5, '$2400', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices', 'willieolins@gmail.com', '2023-11-24', '2023-11-04 13:19:10'),
(129, 'Mat', 'Junior', '912345678', 'Premium', 5, '$2800', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices, Basic Physical Techniques', 'matjunior@gmail.com', '2023-11-05', '0000-00-00 00:00:00'),
(131, 'Addie', 'da Mata', '912345678', 'Premium', 5, '$2400', 'Personal Safety Devices, Basic Physical Techniques, Self-Defense Against Multiple Attackers', 'addiemata@gmail.com', NULL, '2023-11-04 13:19:10'),
(132, 'Addie', 'Mata', '912345678', 'Premium', 4, '$2800', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices, Self-Defense Against Multiple Attackers', 'addiemata@gmail.com', '2023-11-24', '2023-11-04 13:19:10'),
(133, 'John', 'Mata', '912345678', 'Premium', 5, '$3200', 'Situational Awareness and Mindset, Verbal De-Escalation, Personal Safety Devices, Basic Physical Techniques, Self-Defense Against Multiple Attackers', 'johnmata@gmail.com', '2023-11-16', '2023-11-04 13:19:10'),
(134, 'Zisa', 'da Mata', '912345678', 'Premium', 3, '$1675', 'Basic Physical Techniques', 'zisamata@gmail.com', '2023-11-15', '2023-11-04 13:19:10'),
(135, 'Yude', 'Oli', '912345674', 'Premium', 4, '$2400', 'Verbal De-Escalation, Personal Safety Devices, Basic Physical Techniques', 'yudioli@gmail.com', '2023-11-29', '2023-11-04 13:41:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
