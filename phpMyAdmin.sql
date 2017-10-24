-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2017 at 08:59 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `reserved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `reserved`) VALUES
(1, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 0),
(2, 'Othello', 'William Shakespeare', 0),
(3, 'Pilgrim\'s Progress', 'John Bunyan', 0),
(4, 'War and Peace', 'Leo Tolstoy', 1),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 0),
(6, 'Alice\'s Adventures in Wonderland', 'Lewis Carroll', 0),
(7, 'The Trial', 'Franz Kafka', 1),
(8, 'The Republic', 'Plato', 0),
(9, 'Critique of Pure Reason', 'Immanuel Kant', 0),
(10, 'The Plague', 'Albert Camus', 0),
(11, 'The Rum Diary', 'Hunter S. Thompson', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment`) VALUES
(''),
('earhtejyrut'),
('efvjfhbkjnflvdmafslkbjvhkdlsaopkbjknadlpknbjladpanbkddapfjbdknlpad[fjdbkncjlad[fjbknjfdap[l'),
('efvjfhbkjnflvdmafslkbjvhkdlsaopkbjknadlpknbjladpanbkddapfjbdknlpad[fjdbkncjlad[fjbknjfdap[l'),
('efvjfhbkjnflvdmafslkbjvhkdlsaopkbjknadlpknbjladpanbkddapfjbdknlpad[fjdbkncjlad[fjbknjfdap[l'),
('hoho'),
('&lt;?php\r\n\r\n/* \r\n * To change this license header, choose License Headers in Project Properties.\r\n * To change this template file, choose Tools | Templates\r\n * and open the template in the editor.\r\n */\r\n\r\n\r\n\r\n#we can create a function to add comments\r\n#basically it inserts a comment in a database.\r\n\r\nfunction add_comment($comment){\r\n    \r\n    \r\n@ $db = new mysqli(\'localhost\', \'root\', \'root\', \'library\');\r\n\r\n\r\n#here we add the html entities and string escaping\r\n$comment= htmlentities ($comment);\r\n$comment = mysqli_real_escape_string($db, $comment);\r\n\r\n\r\n#&lt;iframe style=&quot;position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;&quot; border=&quot;0&quot; src=&quot;http://ju.se/&quot;  /&gt;\r\n#try the iframe after you add the &quot;htmlentities&quot;\r\n\r\n$query = (&quot;INSERT INTO comments(comment) VALUES (\'{$comment}\')&quot;);\r\n$stmt = $db-&gt;prepare($query);\r\n$stmt-&gt;execute();\r\n    \r\n}\r\n\r\n\r\n#then we create a function to pull out all comments\r\n#it goes in the database and pulls out all comments.\r\n\r\nfunction get_comment(){\r\n    \r\n@ $db = new mysqli(\'localhost\', \'root\', \'root\', \'library\');\r\n    \r\n$query = (&quot;SELECT comment FROM comments&quot;);\r\n$stmt = $db-&gt;prepare($query);\r\n$stmt-&gt;bind_result($result);\r\n$stmt-&gt;execute();\r\n\r\n\r\n    while ($stmt-&gt;fetch()) {\r\n        echo $result;\r\n        echo &quot;&lt;hr/&gt;&quot;;\r\n    \r\n    }\r\n\r\n}\r\n\r\n\r\n#here we test if the POST has been submited\r\n#if yes, we call the function \'add_comment\' which will add a new comment in the DB\r\nif (isset($_POST[\'comment\'])) {\r\n    add_comment($_POST[\'comment\']);\r\n}\r\n\r\n\r\n#here we call all comments to be shown by simply calling the get_comment function\r\nget_comment();\r\n\r\n#you can also store this in a variable and use later\r\n# $allcomment = get_comment();\r\n?&gt;\r\n\r\n\r\n\r\n&lt;!DOCTYPE&gt;\r\n&lt;html&gt;\r\n    &lt;head&gt;\r\n        &lt;meta http-equiv=&quot;Content_Type&quot; content=&quot;text/html; charset=utf-8&quot;&gt;\r\n    &lt;/head&gt;\r\n    &lt;body&gt;\r\n        &lt;div&gt;\r\n            &lt;hr/&gt;\r\n \r\n            &lt;form action=&quot;&quot; method =&quot;POST&quot;&gt;\r\n                &lt;p&gt;\r\n                    &lt;textarea name=&quot;comment&quot; rows=&quot;15&quot; cold=&quot;70&quot;&gt;&lt;/textarea&gt;\r\n                    &lt;input type =&quot;submit&quot; name=&quot;Comment&quot;&gt;\r\n                &lt;/p&gt;        \r\n            &lt;/form&gt;\r\n        \r\n    &lt;/body&gt;\r\n&lt;/html&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(2, 'bolt', '618dcdfb0cd9ae4481164961c4796dd8e3930c8d'),
(3, 'jacky', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;