-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 08:02 AM
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
-- Database: `blackdiamond`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(155) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `date`, `image`, `content`) VALUES
(2, 'happy daisha in ', '2024-07-18', 'blog-15720.jfif', '<p>this i sbloiaiosdufioas jdo flanmsdfkaos jdfoaj sd&nbsp;</p>'),
(4, 'The Timeless Beauty of the Taj Mahal', '2024-07-18', 'blog-53979.jfif', '<p>The Taj Mahal, a symbol of love and architectural marvel, stands majestically on the banks of the Yamuna River in Agra, India. Commissioned by Mughal Emperor Shah Jahan in memory of his beloved wife Mumtaz Mahal, this stunning white marble mausoleum is an epitome of elegance and grandeur.</p><p>Completed in 1653, the Taj Mahal is a harmonious blend of Islamic, Persian, Ottoman Turkish, and Indian architectural styles. The central dome, flanked by four slender minarets, rises gracefully to a height of 73 meters (240 feet), creating a breathtaking silhouette against the sky. Intricate marble inlays with semi-precious stones, delicate carvings, and stunning calligraphy adorn the monument, showcasing the extraordinary craftsmanship of the artisans.</p><p>The lush Charbagh gardens, symbolizing paradise, lead visitors to the main structure, enhancing the serene and ethereal atmosphere. The reflecting pool, with its perfectly symmetrical design, mirrors the beauty of the Taj Mahal, adding to its enchanting allure.</p><p>Beyond its architectural splendor, the Taj Mahal is a testament to eternal love and devotion. Shah Jahan’s profound affection for Mumtaz Mahal is immortalized in this monument, making it one of the most poignant love stories ever told.</p><p>Recognized as a UNESCO World Heritage Site, the Taj Mahal attracts millions of visitors from around the world, captivated by its timeless beauty and historical significance. It stands not only as an architectural masterpiece but also as a symbol of India’s rich cultural heritage and the enduring power of love.</p>'),
(5, 'Paro Taktsang: Bhutan’s Cliffside Monastery', '2024-07-18', 'blog-95802.jfif', '<p>Perched precariously on a cliffside 900 meters above the Paro Valley in Bhutan, Paro Taktsang, also known as the Tiger’s Nest Monastery, is a remarkable spiritual and architectural marvel. This iconic site, enveloped in myth and mystery, is one of Bhutan’s most revered pilgrimage destinations and a symbol of the country\'s rich Buddhist heritage.</p><p>Paro Taktsang’s origins date back to the 8th century when Guru Rinpoche, also known as Padmasambhava, is said to have flown to this site on the back of a tigress to subdue a local demon. After meditating in a cave for three years, three months, three weeks, and three days, he consecrated the site, and it later became a place for monastic retreat. The monastery complex was built in 1692 around the cave where Guru Rinpoche meditated, creating an aura of spiritual sanctity.</p><p>Reaching Paro Taktsang is an adventure in itself. The trek, which takes about two to three hours, winds through pine forests adorned with prayer flags, offering spectacular views of the Paro Valley. The path, though steep and challenging, rewards trekkers with breathtaking vistas and a sense of profound tranquility upon arrival.</p><p>The monastery’s architecture is a testament to Bhutanese craftsmanship, with its white-washed walls, golden roofs, and intricate woodwork blending seamlessly into the rugged landscape. Inside, sacred shrines and murals depict the life and teachings of Guru Rinpoche, providing a glimpse into Bhutan’s deep spiritual traditions.</p><p>Paro Taktsang is not only a site of religious significance but also a cultural emblem that captures the essence of Bhutanese identity. Its remote location, spiritual aura, and stunning beauty make it a must-visit destination for travelers seeking both adventure and enlightenment.</p>'),
(6, 'Rumtek Dharma Chakra Centre: A Spiritual Haven in Sikkim', '2024-07-18', 'blog-98265.jfif', '<p>Nestled in the serene hills of Sikkim, India, the Rumtek Dharma Chakra Centre stands as a beacon of Tibetan Buddhist culture and spirituality. This magnificent monastery, located about 24 kilometers from the capital city of Gangtok, is the seat of the Karma Kagyu lineage, one of the oldest and most revered schools of Tibetan Buddhism.</p><p>Originally built in the 16th century, the monastery was reconstructed in the 1960s under the guidance of the 16th Karmapa, Rangjung Rigpe Dorje, after he fled Tibet during the Chinese invasion. The new Rumtek Monastery, mirroring the design of the original Tsurphu Monastery in Tibet, is a splendid architectural masterpiece. Its vibrant colors, intricate murals, and ornate carvings reflect the rich heritage of Tibetan art and spirituality.</p><p>The Dharma Chakra Centre serves as both a monastery and a spiritual center for Buddhist learning. It houses a golden stupa containing relics of the 16th Karmapa, sacred scriptures, and invaluable religious artifacts. The monastery’s main shrine, adorned with a towering Buddha statue and exquisite thangkas, offers a serene environment for meditation and prayer.</p><p>Each year, Rumtek Monastery hosts various religious ceremonies and festivals, attracting pilgrims and tourists from around the world. The most notable of these is the annual Kagyu Monlam Chenmo, a grand prayer festival that brings together monks and devotees in a collective expression of faith and devotion.</p><p>Visiting Rumtek Dharma Chakra Centre is a journey into the heart of Tibetan Buddhism. Its tranquil setting, spiritual ambiance, and rich cultural heritage provide an enriching experience for all who seek peace, wisdom, and enlightenment in the lap of the Himalayas.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `clients_details`
--

CREATE TABLE `clients_details` (
  `id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients_details`
--

INSERT INTO `clients_details` (`id`, `f_name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Gobind Das', 'ktm@gmail.com', 2147483647, 'ktm123', '2024-12-17 10:52:36'),
(2, 'anish karki', 'karki@gmail.com', 98445, 'anish123', '2024-12-18 05:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `inquires`
--

CREATE TABLE `inquires` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(155) NOT NULL DEFAULT 'processing',
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquires`
--

INSERT INTO `inquires` (`id`, `name`, `phone`, `email`, `message`, `status`, `created_on`) VALUES
(8, 'anu pamwwww', '34343433434', 'gobind98077@gmail.com', 'fsfweryuytrewh,hgfe cv                              ffff', 'completed', '2024-07-11'),
(11, 'Gobind Das', '9808740455', 'gobind@test.com', 'asdfasd', 'completed', '2024-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `user_type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(3, 'birathnagar', 'admin@gmail.com', 'admin123', 'admin'),
(4, 'ktm', 'ktm@gmail.com', 'ktm123', ''),
(10, 'Gobind Das', 'gobind@test.com', 'gobind', 'Choose the role'),
(11, 'santosh', 'santosh@gmail.com', '123', 'editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_details`
--
ALTER TABLE `clients_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquires`
--
ALTER TABLE `inquires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients_details`
--
ALTER TABLE `clients_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquires`
--
ALTER TABLE `inquires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
