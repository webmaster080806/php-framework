SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `framework`
--
CREATE DATABASE IF NOT EXISTS `framework` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `framework`;

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_first` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_last` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `locked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`id`, `username`, `password`, `salt`, `email`, `name_first`, `name_last`, `active`, `locked`) VALUES
(1, 'david', 'kitten', 'salt', 'david@functionalchaos.net', 'David', 'Cramblett', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `post`, `create_user`, `create_date`) VALUES
(1, 'Hello World', 'My first post!', 'jdoe', '2016-05-14'),
(2, 'Yet another post', 'My Second post.\r\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'jdoe', '2016-05-17'),
(3, 'Test 123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam efficitur eu turpis tempor lobortis. Morbi sit amet libero leo. Donec ultrices mollis tortor. In ultrices dui est, quis posuere est luctus quis. Nullam egestas ex sed enim sagittis accumsan. Aenean nibh mauris, dictum pharetra aliquam quis, feugiat sit amet ipsum. Cras vitae felis neque. Fusce lectus est, vestibulum a aliquet non, congue quis urna. Nullam sagittis sit amet massa ac dictum. Fusce diam est, consequat id dui varius, condimentum interdum ligula. Donec eget urna purus. Sed varius libero non massa porta fringilla. Ut ut sodales enim.\r\n\r\nPhasellus id tristique metus. Duis justo sem, ullamcorper vel ante a, vestibulum vehicula odio. Nam tincidunt orci et orci tincidunt, ac congue magna hendrerit. Vivamus congue nunc eu ligula elementum, eget dictum nisl iaculis. Aliquam nec quam pellentesque, vehicula mauris a, accumsan ipsum. Praesent imperdiet leo quis lacus eleifend pellentesque. Nulla eget arcu tellus. Nulla facilisi. Vivamus vitae elementum elit. Donec malesuada blandit nisl, in efficitur sapien cursus at. Vivamus convallis nunc in libero dignissim, sit amet aliquet lectus lobortis. Quisque ullamcorper pretium ex, eget sodales velit ultrices cursus. Nullam rhoncus, ligula sit amet placerat convallis, massa magna facilisis urna, et mattis lacus nisl vel justo. Sed ultricies feugiat massa, a commodo tellus dignissim ut. Proin nunc dolor, tincidunt eu eros in, facilisis feugiat purus.\r\n\r\nPraesent eget nisl elit. Suspendisse potenti. Donec a velit non tortor dapibus maximus. Sed non purus diam. Aenean bibendum lobortis augue, eu consectetur massa. Quisque velit lectus, semper vitae consequat eu, consequat in felis. Maecenas nisl orci, pharetra eget efficitur eu, vehicula eu arcu.', 'jdoe', '2016-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Fruit', 'Tasty fruit'),
(2, 'Vegetable', 'Yummy Vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty_on_hand` int(11) NOT NULL,
  `qty_on_order` int(11) NOT NULL,
  `cost` decimal(6,2) NOT NULL,
  `retail` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `qty_on_hand`, `qty_on_order`, `cost`, `retail`) VALUES
(1, 'Apple', 'Red Apple', 10, 0, '1.00', '1.25'),
(2, 'Pear', 'Green Pear', 7, 2, '0.85', '1.05'),
(3, 'Banana', 'Yellow Banana', 12, 25, '1.45', '1.85'),
(4, 'Orange', 'Orange Orange', 12, 6, '1.85', '2.10');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
