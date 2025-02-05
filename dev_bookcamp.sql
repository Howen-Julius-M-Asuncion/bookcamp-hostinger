-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 01:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_bookcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttypes`
--

CREATE TABLE `accounttypes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttypes`
--

INSERT INTO `accounttypes` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Professor'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `pen_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(1024) NOT NULL,
  `last_name` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `genre_id` int(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `image`, `genre_id`, `genre`, `author_name`, `created_at`, `updated_at`) VALUES
(25, 'The Selfish Gene', '978-0199291151', '', 5, '', 'Richard Dawkins', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(26, 'A Brief History of Time', '978-0553380163', '', 5, '', 'Stephen Hawking', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(27, 'The Diary of a Young Girl', '978-0553296983', '', 4, '', 'Anne Frank', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(28, 'The Art of War', '978-1590302255', '', 6, '', 'Sun Tzu', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(29, 'The Origin of Species', '978-1503272516', '', 5, '', 'Charles Darwin', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(30, 'Silent Spring', '978-0618249060', '', 5, '', 'Rachel Carson', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(31, 'The Immortal Life of Henrietta Lacks', '978-1400052189', '', 5, '', 'Rebecca Skloot', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(32, 'Sapiens: A Brief History of Humankind', '978-0062316110', '', 9, '', 'Yuval Noah Harari', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(33, 'The Power of Habit', '978-0812981605', '', 2, '', 'Charles Duhigg', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(34, 'The Catcher in the Rye', '978-0316769488', '', 7, '', 'J.D. Salinger', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(35, 'The Lord of the Rings', '978-0544003415', '', 8, '', 'J.R.R. Tolkien', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(36, 'Thinking, Fast and Slow', '978-0374533557', '', 2, '', 'Daniel Kahneman', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(37, 'The History of Time', '978-0553380163', '', 5, '', 'Stephen Hawking', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(38, 'The Complete Works of William Shakespeare', '978-1840226475', '', 8, '', 'William Shakespeare', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(39, 'The Diary of a Wimpy Kid', '978-0810993136', '', 7, '', 'Jeff Kinney', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(40, 'The Hunger Games', '978-0439023528', '', 7, '', 'Suzanne Collins', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(41, 'The Divine Comedy', '978-0140448955', '', 8, '', 'Dante Alighieri', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(42, 'The History of the Decline and Fall of the Roman Empire', '978-0140437645', '', 4, '', 'Edward Gibbon', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(43, 'The Subtle Art of Not Giving a F*ck', '978-0062457714', '', 2, '', 'Mark Manson', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(44, 'Becoming', '978-1524763138', '', 4, '', 'Michelle Obama', '2025-02-05 01:52:07', '2025-02-05 01:52:07'),
(45, '1984', '978-0451524935', '', 1, '', 'George Orwell', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(46, 'To Kill a Mockingbird', '978-0060935467', '', 1, '', 'Harper Lee', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(47, 'Pride and Prejudice', '978-1503290563', '', 1, '', 'Jane Austen', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(48, 'The Great Gatsby', '978-0743273565', '', 1, '', 'F. Scott Fitzgerald', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(49, 'Moby-Dick', '978-1503280786', '', 1, '', 'Herman Melville', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(50, 'The Catcher in the Rye', '978-0316769488', '', 1, '', 'J.D. Salinger', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(51, 'The Hobbit', '978-0547928227', '', 8, '', 'J.R.R. Tolkien', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(52, 'The Road', '978-0307387899', '', 8, '', 'Cormac McCarthy', '2025-02-05 01:56:16', '2025-02-05 01:56:16'),
(53, 'The Brothers Karamazov', '978-0140449242', '', 8, '', 'Fyodor Dostoevsky', '2025-02-05 01:57:46', '2025-02-05 01:57:46'),
(54, 'The Book Thief', '978-0375842207', '', 8, '', 'Markus Zusak', '2025-02-05 01:57:46', '2025-02-05 01:57:46'),
(55, 'The Picture of Dorian Gray', '978-0141439570', '', 8, '', 'Oscar Wilde', '2025-02-05 01:57:46', '2025-02-05 01:57:46'),
(56, 'Educated', '978-0399590504', '', 4, '', 'Tara Westover', '2025-02-05 01:57:46', '2025-02-05 01:57:46'),
(57, 'The Silent Patient', '978-1250301697', '', 7, '', 'Alex Michaelides', '2025-02-05 01:57:46', '2025-02-05 01:57:46'),
(58, 'The Elements of Style', '978-0205309023', '', 1, '', 'William Strunk Jr.', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(59, 'Encyclopedia Britannica', '978-1593391616', '', 1, '', 'Various', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(60, 'Webster’s New World College Dictionary', '978-0544724575', '', 1, '', 'Various', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(61, 'The Chicago Manual of Style', '978-0226104201', '', 1, '', 'University of Chicago Press', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(62, 'The Oxford English Dictionary', '978-0198601255', '', 1, '', 'Various', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(63, 'The Penguin Dictionary of Science', '978-0140512175', '', 1, '', 'John Daintith', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(64, 'Fodor’s Travel Guides', '978-0804142904', '', 1, '', 'Fodor\'s Travel', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(65, 'The World Almanac and Book of Facts', '978-1600572006', '', 1, '', 'Various', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(66, 'National Geographic Atlas of the World', '978-1426210969', '', 1, '', 'National Geographic Society', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(67, 'The Internet Guide', '978-0789723601', '', 1, '', 'Peter Kent', '2025-02-05 02:01:15', '2025-02-05 02:01:15'),
(68, 'The Republic', '978-0486455925', '', 2, '', 'Plato', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(69, 'Meditations', '978-0140449334', '', 2, '', 'Marcus Aurelius', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(70, 'Being and Nothingness', '978-0671867801', '', 2, '', 'Jean-Paul Sartre', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(71, 'The Prince', '978-0486272745', '', 2, '', 'Niccolò Machiavelli', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(72, 'Beyond Good and Evil', '978-0140449235', '', 2, '', 'Friedrich Nietzsche', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(73, 'The Ethics of Ambiguity', '978-0807014235', '', 2, '', 'Simone de Beauvoir', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(74, 'The Tao of Pooh', '978-0140067477', '', 2, '', 'Benjamin Hoff', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(75, 'The Dhammapada', '978-0140447910', '', 2, '', 'Various', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(76, 'Confucianism: A Very Short Introduction', '978-0195397106', '', 2, '', 'Daniel K. Gardner', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(77, 'The History of the Church', '978-0870613300', '', 2, '', 'Eusebius of Caesarea', '2025-02-05 02:01:25', '2025-02-05 02:01:25'),
(78, 'The Bible', '978-0060652920', '', 3, '', 'Various', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(79, 'The Quran', '978-0140449136', '', 3, '', 'Various', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(80, 'The Bhagavad Gita', '978-0140447903', '', 3, '', 'Various', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(81, 'The Tao of Pooh', '978-0140067477', '', 3, '', 'Benjamin Hoff', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(82, 'The Dhammapada', '978-0140447910', '', 3, '', 'Various', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(83, 'Confucianism: A Very Short Introduction', '978-0195397106', '', 3, '', 'Daniel K. Gardner', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(84, 'The History of the Church', '978-0870613300', '', 3, '', 'Eusebius of Caesarea', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(85, 'The Tao Te Ching', '978-0394732831', '', 3, '', 'Lao Tzu', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(86, 'The Book of Mormon', '978-0875791475', '', 3, '', 'Joseph Smith Jr.', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(87, 'Christianity: The First Three Thousand Years', '978-0143118711', '', 3, '', 'Diarmaid MacCulloch', '2025-02-05 02:01:36', '2025-02-05 02:01:36'),
(88, 'A People\'s History of the United States', '978-0060838652', '', 10, '', 'Howard Zinn', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(89, 'The History of the Decline and Fall of the Roman Empire', '978-0140437645', '', 10, '', 'Edward Gibbon', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(90, 'The Second World War', '978-0395412594', '', 10, '', 'Winston Churchill', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(91, 'The Rise and Fall of the Third Reich', '978-1451651683', '', 10, '', 'William L. Shirer', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(92, 'The Origins of the First World War', '978-0582492546', '', 10, '', 'James Joll', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(93, 'Guns, Germs, and Steel', '978-0393354324', '', 10, '', 'Jared Diamond', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(94, 'The Holocaust', '978-1585671169', '', 10, '', 'Laurence Rees', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(95, 'The History of World War II', '978-0060551502', '', 10, '', 'Sir Basil Liddell Hart', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(96, 'The Cold War: A New History', '978-0143038276', '', 10, '', 'John Lewis Gaddis', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(97, 'The Civil War: A Narrative', '978-0394746235', '', 10, '', 'Shelby Foote', '2025-02-05 02:01:49', '2025-02-05 02:01:49'),
(98, 'A People\'s History of the United States', '978-0060838652', '', 10, '', 'Howard Zinn', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(99, 'The History of the Decline and Fall of the Roman Empire', '978-0140437645', '', 10, '', 'Edward Gibbon', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(100, 'The Second World War', '978-0395412594', '', 10, '', 'Winston Churchill', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(101, 'The Rise and Fall of the Third Reich', '978-1451651683', '', 10, '', 'William L. Shirer', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(102, 'The Origins of the First World War', '978-0582492546', '', 10, '', 'James Joll', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(103, 'Guns, Germs, and Steel', '978-0393354324', '', 10, '', 'Jared Diamond', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(104, 'The Holocaust', '978-1585671169', '', 10, '', 'Laurence Rees', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(105, 'The History of World War II', '978-0060551502', '', 10, '', 'Sir Basil Liddell Hart', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(106, 'The Cold War: A New History', '978-0143038276', '', 10, '', 'John Lewis Gaddis', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(107, 'The Civil War: A Narrative', '978-0394746235', '', 10, '', 'Shelby Foote', '2025-02-05 02:02:22', '2025-02-05 02:02:22'),
(108, 'The Tipping Point', '978-0316346627', '', 5, '', 'Malcolm Gladwell', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(109, 'Freakonomics', '978-0060731328', '', 5, '', 'Steven D. Levitt & Stephen J. Dubner', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(110, 'Outliers', '978-0316017930', '', 5, '', 'Malcolm Gladwell', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(111, 'The Social Animal', '978-1429244643', '', 5, '', 'Elliot Aronson', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(112, 'Sociology: A Global Perspective', '978-1305088269', '', 5, '', 'Joan Ferrante', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(113, 'Influence: The Psychology of Persuasion', '978-0061241895', '', 5, '', 'Robert B. Cialdini', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(114, 'The Spirit Level', '978-1608193141', '', 5, '', 'Richard Wilkinson & Kate Pickett', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(115, 'The Road to Serfdom', '978-0226320543', '', 5, '', 'Friedrich Hayek', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(116, 'The Wealth of Nations', '978-1420941062', '', 5, '', 'Adam Smith', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(117, 'The Theory of Moral Sentiments', '978-0198776146', '', 5, '', 'Adam Smith', '2025-02-05 02:02:33', '2025-02-05 02:02:33'),
(118, 'Anna Karenina', '978-0143035008', '', 8, '', 'Leo Tolstoy', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(119, 'War and Peace', '978-1400079988', '', 8, '', 'Leo Tolstoy', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(120, 'The Brothers Karamazov', '978-0374528379', '', 8, '', 'Fyodor Dostoevsky', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(121, 'The Picture of Dorian Gray', '978-0141439570', '', 8, '', 'Oscar Wilde', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(122, 'The Great Gatsby', '978-0743273565', '', 8, '', 'F. Scott Fitzgerald', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(123, 'Moby-Dick', '978-1503280786', '', 8, '', 'Herman Melville', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(124, 'Frankenstein', '978-0486282114', '', 8, '', 'Mary Shelley', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(125, 'The Catcher in the Rye', '978-0316769488', '', 8, '', 'J.D. Salinger', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(126, 'Don Quixote', '978-0060934347', '', 8, '', 'Miguel de Cervantes', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(127, 'Pride and Prejudice', '978-1503290563', '', 8, '', 'Jane Austen', '2025-02-05 02:04:28', '2025-02-05 02:04:28'),
(128, 'Les Misérables', '978-0451419439', '', 8, '', 'Victor Hugo', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(129, 'The Trial', '978-0805209990', '', 8, '', 'Franz Kafka', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(130, 'The Count of Monte Cristo', '978-0140449266', '', 8, '', 'Alexandre Dumas', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(131, 'The Scarlet Letter', '978-0486280486', '', 8, '', 'Nathaniel Hawthorne', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(132, 'The Odyssey', '978-0140268867', '', 8, '', 'Homer', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(133, 'Jane Eyre', '978-1503278195', '', 8, '', 'Charlotte Brontë', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(134, 'Wuthering Heights', '978-0141439556', '', 8, '', 'Emily Brontë', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(135, 'Dracula', '978-0141439846', '', 8, '', 'Bram Stoker', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(136, 'The Jungle', '978-0451531248', '', 8, '', 'Upton Sinclair', '2025-02-05 02:06:00', '2025-02-05 02:06:00'),
(137, 'Crime and Punishment', '978-0140449136', '', 8, '', 'Fyodor Dostoevsky', '2025-02-05 02:06:14', '2025-02-05 02:06:14'),
(140, 'Edited This Entry', '012345', '', 0, 'Edited This Genre', 'Who is This Author? IDK', '2025-02-05 02:37:49', '2025-02-05 02:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `class` int(8) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `class`, `genre`) VALUES
(1, 0, 'Computer science, information, and general works'),
(2, 100, 'Philosophy and psychology'),
(3, 200, 'Religion'),
(4, 300, 'Social sciences'),
(5, 400, 'Language'),
(6, 500, 'Science'),
(7, 600, 'Technology'),
(8, 700, 'Arts and recreation'),
(9, 800, 'Literature'),
(10, 900, 'History and geography');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrowed_at` datetime NOT NULL,
  `approved_at` datetime NOT NULL,
  `due_at` datetime NOT NULL,
  `status` enum('Approved','Rejected','Pending','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `status` enum('Verified','Unverified','Inactive','Archived') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `accountType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `first_name`, `last_name`, `status`, `created_at`, `updated_at`, `accountType_id`) VALUES
(43, 'adminUser', 'admin@example.com', '$2y$10$wKhy9tzsPE8HoWDfWF08de5sciRpAc4kUU/e/70PKSrwQJ2H8gTXm', 'default.png', 'John', 'Doe', 'Verified', '2025-02-05 02:27:21', '2025-02-05 02:27:21', 1),
(44, 'studentUser', 'student@example.com', '$2y$10$v/PtYJY6wyaFPHkjjQ4oTeBSAk.vkvwn0ahVzW2enTDyjY6KLeapO', 'default.png', 'Jane', 'Smith', 'Verified', '2025-02-05 02:27:21', '2025-02-05 02:27:21', 4),
(45, 'howen_asuncion', 'howen@example.com', 'password123', 'default.png', 'Howen', 'Julius Asuncion', 'Verified', '2025-02-05 02:27:34', '2025-02-05 02:27:34', 1),
(46, 'john_goco', 'john@example.com', 'password123', 'default.png', 'John', 'Michael Goco', 'Verified', '2025-02-05 02:27:34', '2025-02-05 02:27:34', 1),
(47, 'renz_salas', 'renz@example.com', 'password123', 'default.png', 'Renz', 'Gabriel Salas', 'Verified', '2025-02-05 02:27:34', '2025-02-05 02:27:34', 1),
(48, 'aero_pena', 'aero@example.com', 'password123', 'default.png', 'Aero', 'Dela Pena', 'Verified', '2025-02-05 02:39:21', '2025-02-05 02:39:21', 4),
(49, 'janzen_decano', 'janzen@example.com', 'password123', 'default.png', 'Janzen', 'Decano', 'Verified', '2025-02-05 02:39:21', '2025-02-05 02:39:21', 4),
(50, 'maricar_mangulabnan', 'maricar@example.com', 'password123', 'default.png', 'Maricar', 'Mangulabnan', 'Verified', '2025-02-05 02:39:21', '2025-02-05 02:39:21', 4),
(51, 'john_carlo_mariano', 'johncarlo@example.com', 'password123', 'default.png', 'John Carlo', 'Mariano', 'Verified', '2025-02-05 02:39:21', '2025-02-05 02:39:21', 4),
(52, 'kyle_reyes', 'kyle@example.com', 'password123', 'default.png', 'Kyle', 'Reyes', 'Verified', '2025-02-05 02:39:21', '2025-02-05 02:39:21', 4),
(53, 'riane_gamboa', 'riane@example.com', 'password123', 'default.png', 'Riane', 'Gamboa', 'Verified', '2025-02-05 02:39:21', '2025-02-05 02:39:21', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttypes`
--
ALTER TABLE `accounttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `accountType_id` (`accountType_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounttypes`
--
ALTER TABLE `accounttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`accountType_id`) REFERENCES `accounttypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
