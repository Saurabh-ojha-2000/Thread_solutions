-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 09:27 AM
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
-- Database: `thread_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(256) NOT NULL,
  `category_description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is a computer programming language often used to build websites and software, automate tasks, and conduct data analysis. Python is a general-purpose language, meaning it can be used to create a variety of different programs and isn\'t specialized for any specific problems.', '2023-06-09 12:28:48'),
(2, 'Java Script', 'JavaScript (JS) is a lightweight, interpreted, or just-in-time compiled programming language with first-class functions. While it is most well-known as the scripting language for Web pages, many non-browser environments also use it, such as Node.js, Apache', '2023-06-09 12:30:04'),
(3, 'C++', 'C++ is an object-oriented programming (OOP) language that is viewed by many as the best language for creating large-scale applications. C++ is a superset of the C language. A related programming language, Java, is based on C++ but optimized for the distrib', '2023-06-09 18:49:25'),
(4, 'HTML', 'HTML stands for Hyper Text Markup Language. HTML is the standard markup language for creating Web pages. HTML describes the structure of a Web page. HTML consists of a series of elements. HTML elements tell the browser how to display the content.', '2023-06-10 17:42:07'),
(5, 'Swift', 'Swift is a robust and intuitive programming language created by Apple for building apps for iOS, Mac, Apple TV, and Apple Watch. It\'s designed to give developers more freedom than ever. Swift is easy to use and open source, so anyone with an idea can creat', '2023-06-10 17:42:07'),
(6, 'CSS\r\n', 'CSS is the language for describing the presentation of Web pages, including colors, layout, and fonts. It allows one to adapt the presentation to different types of devices, such as large screens, small screens, or printers. CSS is independent of HTML and ', '2023-06-10 17:45:01'),
(7, 'SQL', 'Structured query language (SQL) is a programming language for storing and processing information in a relational database. A relational database stores information in tabular form, with rows and columns representing different data attributes and the variou', '2023-06-10 17:45:01'),
(8, 'php', 'PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites. It is integrated with a number of popular databases, including MySQL, PostgreSQL, Oracle.', '2023-06-10 17:46:50'),
(9, 'React.js', 'React is a JavaScript-based UI development library. Facebook and an open-source developer community run it. Although React is a library rather than a language, it is widely used in web development. The library first appeared in May 2013 and is now one of the most commonly used frontend libraries for web development.', '2023-06-13 13:23:29'),
(10, 'Angular', 'Angular is a development platform, built on TypeScript. As a platform, Angular includes: A component-based framework for building scalable web applications. A collection of well-integrated libraries that cover a wide variety of features, including routing, forms management, client-server communication, and more.', '2023-06-13 14:49:40'),
(11, 'java', 'Java is a multi-platform, object-oriented, and network-centric language that can be used as a platform in itself. It is a fast, secure, reliable programming language for coding everything from mobile apps and enterprise software to big data applications and server-side technologies.', '2023-07-07 16:17:01'),
(12, 'Kotlin', ' Kotlin native allows programmers to compile Kotlin code to native binaries, which are executables created to run natively in a specific operating system and that can run without the JVM. Kotlin\'s native binaries can run on macOS, iOS, tvOS, watchOS, Linux, Windows and Android NDK.', '2023-07-07 16:17:01'),
(13, 'Scala', 'Scala is a modern multi-paradigm programming language designed to express common programming patterns in a concise, elegant, and type-safe way. It seamlessly integrates features of object-oriented and functional languages.', '2023-07-07 16:27:06'),
(14, 'Ruby', 'A ruby is a pinkish red to blood-red colored gemstone, a variety of the mineral corundum (aluminium oxide). Ruby is one of the most popular traditional jewelry gems and is very durable. Other varieties of gem-quality corundum are called sapphires.\r\n', '2023-07-07 16:27:06'),
(15, 'Perl', 'Perl, a cross-platform open-source computer programming language used widely in the commercial and private computing sectors. Perl was a favourite in the late 20th and early 21st centuries among Web developers for its flexible, continually evolving text-processing and problem-solving capabilities.', '2023-07-07 16:28:13'),
(16, 'Matlab', 'MATLAB is a programming platform designed specifically for engineers and scientists to analyze and design systems and products that transform our world. The heart of MATLAB is the MATLAB language, a matrix-based language allowing the most natural expression of computational mathematics', '2023-07-07 16:28:13'),
(17, 'Dart', 'Dart is a client-optimized language for developing fast apps on any platform. Its goal is to offer the most productive programming language for multi-platform development, paired with a flexible execution runtime platform for app frameworks.', '0000-00-00 00:00:00'),
(18, 'Node.js', 'Node. js (Node) is an open source, cross-platform runtime environment for executing JavaScript code. Node is used extensively for server-side programming, making it possible for developers to use JavaScript for client-side and server-side code without needing to learn an additional language.', '2023-07-07 16:29:52'),
(19, 'Django', 'The Django web framework is a free, open source framework that can speed up development of a web application being built in the Python programming language. Django—pronounced “Jango,” named after the famous jazz guitarist Django Reinhardt—is a free, open source framework that was first publicly released in 2005.', '2023-07-07 16:46:16'),
(20, 'Bootstrap', 'Bootstrap is a free, open source front-end development framework for the creation of websites and web apps. Designed to enable responsive development of mobile-first websites, Bootstrap provides a collection of syntax for template designs.', '2023-07-07 16:46:16'),
(21, 'Laravel', 'Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony.\r\n', '2023-07-07 16:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'i have a solution for that.', 1, 1, '2023-06-15 00:00:00'),
(2, 'The Python setup may fail if you don\'t have Windows Service Pack 1 (SP1) installed on your computer. It is a requirement for installing Python..., If it states an unspecified error, try downloading KB2999226. It is an update for Windows 7,For other issues, check the log file.\n', 1, 12, '2023-06-15 00:00:00'),
(3, 'Make sure you are not accidentally opening the Python installation executable. Check again that the Python path is installed properly and try running the command \"py\" or \"python\" in the Command Prompt to see if it starts. If it doesn\'t start and Python is installed on your computer, manually add Python\'s install location to your PATH.', 1, 13, '2023-06-15 00:00:00'),
(5, 'use backgroung:url(\"image.jpg\")', 66, 16, '2023-06-15 00:00:00'),
(6, 'please anyone can tell me how to decrease opacity\r\n', 67, 17, '2023-06-15 00:00:00'),
(7, 'INSERT INTO TABLE_NAME (column1, column2, column3,...columnN) VALUES (value1, value2, value3,...valueN);\r\n', 68, 18, '2023-06-15 00:00:00'),
(8, 'To fix this problem, always put your script element before the closing body tag; that is, below every other DOM element in the body of the document.', 63, 19, '2023-06-15 19:00:02'),
(9, 'this@test.com ', 70, 20, '2023-06-19 16:47:38'),
(10, 'Step 1- Create a HTML PHP Login Form. To create a login form, follow the steps mentioned below: ...\r\nStep 2: Create a CSS Code for Website Design. ...\r\nStep 3: Create a Database Table Using MySQL. ...\r\nStep 4: Open a Connection to a MySQL Database. ...\r\nStep 5 - Create a Logout Session. ...\r\nStep 6 - Create a Code for the Home Page.', 73, 21, '2023-06-19 16:50:27'),
(11, 'Open the WebController. java class. ...\r\nDeclare a variable LOGOUT to capture the status of the user. ...\r\nThe method processRequest() is already created in the ListAll feature. ...\r\nIf the input value is LOGOUT , invoke the method to handle the logout of user.', 74, 22, '2023-06-19 16:52:10'),
(12, 'echo \"Created date is \" . date(\"Y-m-d h:i:sa\", $d);', 75, 23, '2023-06-19 16:53:55'),
(42, ' React uses the order in which Hooks are called to keep track of their underlying states and preserve them between renders. If you mess with that order, React will, internally, not know which state matches with the Hook anymore. This causes major issues for React and can even result in bugs.\r\n\r\nHow to address this\r\nReact Hooks must be always called at the top level of components — and unconditionally. In practice, this often boils down to reserving the first section of a component for React Hook initializations.', 97, 23, '2023-06-20 13:10:38'),
(43, 'The source maps generated by the CLI are very useful when debugging. Navigate up the call stack until you find a template expression where the value displayed in the error has changed.\r\n\r\nEnsure that there are no changes to the bindings in the template after change detection is run. This often means refactoring to use the correct component lifecycle hook for your use case. If the issue exists within ngAfterViewInit, the recommended solution is to use a constructor or ngOnInit to set initial values, or use ngAfterContentInit for other value bindings.\r\n\r\nIf you are binding to methods in the view, ensure that the invocation does not update any of the other bindings in the template.', 98, 19, '2023-06-20 13:14:34'),
(47, 'Use the call stack to determine where the cyclical dependency exists.', 102, 19, '2023-06-20 14:12:45'),
(48, 'Break this loop (or circle) of dependency to resolve this error. This most commonly means removing or refactoring the dependencies to not be reliant on one another.', 102, 14, '2023-06-20 14:21:20'),
(56, 'Work backwards from the object where the error states that a provider is missing: No provider for ${this}!. This is commonly thrown in services, which require non-existing providers.', 106, 14, '2023-06-20 14:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `usernumber` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mn` varchar(13) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cdt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`usernumber`, `username`, `mn`, `email`, `cdt`) VALUES
(1, 'vedobi.in@gmail.com', '7894561230', 'ravi.mishra@vedobi.com', '2023-06-22 17:52:54'),
(2, 'admin', '6498741681465', 'ravimishra528@gmail.com', '2023-06-22 17:53:40'),
(3, 'ansh', '8800230191', 'sourabhojha12@gmail.com', '2023-06-22 17:53:49'),
(4, 'admin', '7894561230', 'nitindhiman25292@dsfgh', '2023-06-22 17:55:09'),
(6, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-06-22 18:13:28'),
(7, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-06-22 18:14:08'),
(8, 'gaurav', '98521476532', 'nitindhiman25292@dsfgh', '2023-06-22 18:14:17'),
(9, 'gaurav', '98521476532', 'nitindhiman25292@dsfgh', '2023-06-22 18:15:17'),
(10, 'admin', '6575756756756', 'ravimishra528@gmail.com', '2023-06-22 18:15:24'),
(11, 'admin', '6575756756756', 'ravimishra528@gmail.com', '2023-06-22 18:15:37'),
(12, 'admin', '6575756756756', 'ravimishra528@gmail.com', '2023-06-22 18:15:41'),
(16, 'saurabh ojha', '7053890228', 'sourabhojha9210@gmail.com', '2023-07-19 16:08:49'),
(24, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-07-19 16:56:38'),
(50, 'ansh', '6575756756756', 'nitindhiman25292@dsfgh', '2023-07-24 11:57:10'),
(52, 'vedobi.in@gmail.com', '7894561230', 'vedobi.in@gmail.com', '2023-07-24 12:02:22'),
(54, 'vansh', '789546123', 'vansh32@gmail.com', '2023-07-24 12:04:01'),
(56, 'vinod`', '2569874169', 'vinod@gmail.com', '2023-07-24 12:06:16'),
(57, 'lalit', '789456123', 'lalit45@gmail.com', '2023-07-24 12:06:59'),
(66, 'yjewi5', '6347245', 'gfb@fhjs', '2023-08-23 13:17:38'),
(67, 'admin', '7894561230', 'ravi.mishra@vedobi.com', '2023-08-23 13:18:15'),
(68, 'gaurav', '7894561230', 'ravimishra528@gmail.com', '2023-08-23 13:18:55'),
(69, 'ansh', '8800230191', 'ravimishra528@gmail.com', '2023-08-23 13:19:48'),
(70, 'q34gy4q', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:32:09'),
(71, 'dd', '6498741681465', 'sourabhojha12@gmail.com', '2023-08-23 14:32:50'),
(72, 'vedobi.in@gmail.com', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:34:39'),
(73, 'gaurav', '7894561230', 'sourabhojha12@gmail.com', '2023-08-23 14:35:09'),
(74, 'vedobi.in@gmail.com', '6498741681465', 'nitindhiman25292@dsfgh', '2023-08-23 14:35:58'),
(75, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:37:21'),
(76, 'ansh', '8795462113', 'ansh@123', '2023-08-23 14:38:27'),
(77, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:38:54'),
(78, 'roshan', '8800230191', 'roshanjha23@gmail.com', '2023-08-23 14:39:27'),
(79, 'kiran', '98764531', 'kiran@123', '2023-08-23 14:43:31'),
(80, 'admin', '7894561230', 'ravi.mishra@vedobi.com', '2023-08-23 14:48:06'),
(81, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:51:22'),
(82, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:54:40'),
(83, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:55:06'),
(84, 'vedobi.in@gmail.com', '6575756756756', 'vedobi.in@gmail.com', '2023-08-23 14:55:13'),
(85, 'adminrrrrrrrrrrrrrrrrrrrrr', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 14:57:18'),
(86, 'ajay', '852014719357', 'ajay@23', '2023-08-23 15:11:37'),
(87, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 15:11:53'),
(88, 'admin', '98521476532', 'vedobi.in@gmail.com', '2023-08-23 15:23:05'),
(89, 'vedobi.in@gmail.com', '6575756756756', 'ravi.mishra@vedobi.com', '2023-08-23 15:24:10'),
(90, 'vedobi.in@gmail.com', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 15:28:28'),
(91, 'admin', '6575756756756', 'vedobi.in@gmail.com', '2023-08-23 15:32:48'),
(92, 'minda', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 15:33:51'),
(93, 'admin', '6575756756756', 'vedobi.in@gmail.com', '2023-08-23 15:38:48'),
(94, 'admin', '7894561230', 'vedobi.in@gmail.com', '2023-08-23 15:39:24'),
(95, 'ansh', '6575756756756', 'vedobi.in@gmail.com', '2023-08-23 15:39:47'),
(96, 'roshan', '98521476532', 'roshan@jha', '2023-08-23 15:40:08'),
(97, 'gaurav', '8795462113', 'gewrg@ds', '2023-08-23 15:42:10'),
(98, 'admin', '6575756756756', 'ravi.mishra@vedobi.com', '2023-08-23 15:42:22'),
(99, 'saurabh ojha', '6575756756756', 'sourabh92103750@gmail.com', '2023-08-23 15:43:22'),
(100, 'ajay', '6575756756756', 'ajay@23', '2023-08-23 15:43:47'),
(101, 'krish', '7894561230', 'kiran@123', '2023-08-23 15:44:21'),
(102, 'teena', '7894561230', 'tghjmdf@ew', '2023-08-23 15:45:09'),
(103, 'swati pandey', '7202468968', 'swati2321@GMAIL.COM', '2023-09-11 10:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(2) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install python', 'my python software didnot work properly,it can\'t be installed in my pc and show error of file missing.', 1, 1, '2023-06-13 18:18:51'),
(5, 'KeyErrors', 'Raised when a key is not found in a dictionary.\r\n', 1, 12, '2023-06-14 14:37:28'),
(6, 'MemoryError', 'Raised when an operation runs out of memory.\r\n', 1, 13, '2023-06-14 14:38:36'),
(7, 'NameError', 'Raised when a variable is not found in the local or global scope.\r\n', 1, 14, '2023-06-14 14:39:40'),
(9, 'ValueError', 'Raised when a function gets an argument of correct type but improper value.\r\n', 1, 16, '2023-06-15 11:29:58'),
(63, 'Uncaught TypeError: Cannot read property', ' Cannot read property can occur for many reasons, but a common one is improper initialization of state while rendering the UI components. Let’s look at an example of how this can occur in a real-world app. We’ll pick React, but the same principles of improper initialization also apply to Angular, Vue or any other framework.', 2, 17, '2023-06-15 14:46:10'),
(64, 'TypeError: null is not an object (evaluating)', 'the way this error might occur in a real world example is if you try using a DOM element in your JavaScript before the element is loaded.', 2, 18, '2023-06-15 15:00:50'),
(66, 'background image', 'how to set background image in div.', 6, 19, '2023-06-15 18:17:10'),
(67, 'opacity', 'how to decrease the opacity of image.\r\n', 6, 20, '2023-06-15 18:20:55'),
(68, 'insert query', 'how to insert a new query.', 7, 21, '2023-06-15 18:23:40'),
(69, 'error 405', '4  HTTP error 405 means you are trying to use a method in your REST request that is not valid on the specific endpoint.  If you check the documentation of the Spotify Web API, it clearly states that the valid HTTP verbs to be used for the /me/tracks endpoint are: DELETE, GET and PUT. POST is not allowed, hence the error.  Just change request.httpMethod = \"post\" to request.httpMethod = \"put\" and the error should be solved.', 5, 22, '2023-06-15 18:35:36'),
(70, 'ZeroDivisionError	', 'Raised when the second operand of a division or module operation is zero.\r\n', 1, 23, '2023-06-19 15:15:24'),
(97, 'React Hook useXXX', 'React Hook useXXX is called conditionally. React Hooks must be called in the exact same order in every component render', 9, 23, '2023-06-20 13:09:14'),
(98, 'NG0100: Expression has changed after it was checked', 'Angular throws an ExpressionChangedAfterItHasBeenCheckedError when an expression value has been changed after change detection has completed. Angular only throws this error in development mode.', 10, 23, '2023-06-20 13:13:54'),
(169, 'Using Enumerations as Errors', 'IntParsingError enumeration that captures two different kinds of errors that can occur when parsing an integer from a string: overflow, where the value represented by the string is too large for the integer data type, and invalid input, where nonnumeric characters are found within the input.', 5, 19, '2023-07-28 15:20:09'),
(193, 'page is not refereshing', 'how to get referesh my page', 1, 19, '2023-09-11 11:06:14'),
(208, 'dhgndehg', 'hgndhgmndg', 21, 19, '2023-09-11 13:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'saurabhojha12@gmail.com', '32', '2023-06-17 11:37:07'),
(12, 'skumar@12', '12', '2023-06-17 16:40:07'),
(13, 'VARUN@12', '3', '2023-06-17 16:52:42'),
(14, 'ajay@123', '842', '2023-06-17 17:01:06'),
(16, 'sd@12', '85', '2023-06-17 17:07:43'),
(17, 'hd@ojha', 'ojha', '2023-06-17 17:32:04'),
(18, 'sumit@123', '123', '2023-06-17 18:01:38'),
(19, 'sa@345', '8', '2023-06-19 12:23:31'),
(20, 'dsa@123', 'dsa', '2023-06-19 12:35:41'),
(21, 'lalit@45', '78', '2023-06-19 15:05:06'),
(22, 'harari@vedobi.com', 'vijay', '2023-06-19 15:05:34'),
(23, 'faizal@gmail.com', 'don', '2023-06-19 15:13:11'),
(24, 'preeti@vedobi.com', '1111', '2023-06-19 17:17:01'),
(25, 'jyoti@vedobi.com', '666', '2023-06-19 17:17:19'),
(26, 'mashood@vedobi.com', '963', '2023-06-19 17:17:58'),
(27, 'anand', '89', '2023-06-20 16:11:30'),
(30, 'susheel', '12354', '2023-07-14 12:52:10'),
(34, 'vinod', '5', '2023-07-19 11:56:46'),
(35, 'shyam', '3', '2023-07-20 17:22:52'),
(36, 'vansh', '9', '2023-07-24 10:44:39'),
(38, 'avinash', '1', '2023-07-28 11:49:58'),
(43, 'sda', '12', '2023-09-11 15:49:20'),
(44, 'sfjhsfg', '1', '2023-09-11 15:50:11'),
(47, 'manan ', '32', '2023-09-11 16:00:53'),
(48, 'gungun', '33', '2023-09-11 17:01:10'),
(49, '', '', '2023-09-11 17:07:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`usernumber`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_2` (`thread_title`,`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_3` (`thread_title`,`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_4` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `usernumber` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
