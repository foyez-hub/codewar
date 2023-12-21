-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 04:01 PM
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
-- Database: `codewar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `contestid` int(100) NOT NULL,
  `startcontesttime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `endcontesttime` varchar(100) NOT NULL,
  `problemid` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `solvecount` int(11) NOT NULL,
  `Contestname` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`contestid`, `startcontesttime`, `endcontesttime`, `problemid`, `rank`, `solvecount`, `Contestname`, `status`) VALUES
(1, '2023-12-17 08:19:52', '2023-12-17 2:00:24', '1,3,5,7,9', '', 0, 'UIU Take Off Contest - Fall 2023', 'Running'),
(2, '2023-12-17 07:57:17', '2023-12-17 2:00:24', '1,3,5,7,10', '', 0, 'Coder Combat 4.0', 'Running'),
(3, '2023-12-16 07:57:33', '2023-12-16 3:00:24', '5,7,8,9', '', 0, 'UIU Coders Of The Month', 'Ended');

-- --------------------------------------------------------

--
-- Table structure for table `contestrank`
--

CREATE TABLE `contestrank` (
  `email` varchar(100) NOT NULL,
  `solveCount` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  `contestid` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contestrank`
--

INSERT INTO `contestrank` (`email`, `solveCount`, `penalty`, `contestid`, `rank`) VALUES
('b4tman@gmail.com', 3, 250, 1, 0),
('lmn@gmail.com', 3, 252, 1, 0),
('mln@gmail.com', 2, 198, 1, 0),
('zero@gmail.com', 2, 200, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contestsubs`
--

CREATE TABLE `contestsubs` (
  `conid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problemset`
--

CREATE TABLE `problemset` (
  `title` varchar(100) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `st` varchar(10000) NOT NULL,
  `example` varchar(10000) NOT NULL,
  `con` varchar(10000) NOT NULL,
  `problemid` int(11) NOT NULL,
  `testcase` varchar(100) NOT NULL,
  `output` varchar(10000) NOT NULL,
  `help` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `problemset`
--

INSERT INTO `problemset` (`title`, `difficulty`, `st`, `example`, `con`, `problemid`, `testcase`, `output`, `help`) VALUES
('Two Sum\r\n', 'Easy', 'Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.\n<br><br>\nYou may assume that each input would have exactly one solution, and you may not use the same element twice.\n<br><br>\nYou can return the answer in any order.', 'Input:  <br>             \nnums = [2,7,11,15], target = 9<br>\nOutput: <br>[0,1]<br>\nExplanation: <br>Because nums[0] + nums[1] == 9, we return [0, 1].', '2 <= nums.length <= 104 <br>\n-109 <= nums[i] <= 109<br>\n-109 <= target <= 109', 1, '1.txt', 'cheatcode', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Palindrome Number\r\n', 'Easy', 'Given an integer x, return true if x is a \npalindrome\n, and false otherwise.', 'Input: x = 121\nOutput: true\nExplanation: 121 reads as 121 from left to right and from right to left.', '-231 <= x <= 231 - 1', 2, '2.txt', '1-true|2-false|3-false|4-false|5-true|6-true|7-true|8-false|9-true|10-true| 11-true|12-false|13-true|14-true|15-true|16-true|17-false|18-false|19-true|20-true| 21-false|22-true|23-true|24-true|25-true|26-true|27-false|28-false|29-true|30-true| 31-true|32-false|33-false|34-false|35-true|36-true|37-true|38-true|39-false|40-true| 41-true|42-true|43-false|44-false|45-true|46-false|47-true|48-true|49-true|50-false|', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  1-true|2-false|3-false|4-false|5-true|<br>  Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Pow(x, n)\n', 'Easy', 'Implement pow(x, n), which calculates x raised to the power n (i.e., xn).\n\n', 'Input: <br>x = 2.00000,<br> n = 10<br>\nOutput:<br> 1024.00000', '-100.0 < x < 100.0<br>\n-2^31 <= n <= 2^31-1', 3, '3.txt', 'cheatcode', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Sqrt(x)\r\n', 'Easy', 'Given a non-negative integer x, return the square root of x rounded down to the nearest integer. The returned integer should be non-negative as well.\n\nYou must not use any built-in exponent function or operator.\n<br><br>\nFor example, do not use pow(x, 0.5) in c++ or x ** 0.5 in python.', 'Input:<br> x = 4<br>\nOutput:<br> 2<br>\nExplanation:<br> The square root of 4 is 2, so we return 2.', '0 <= x <= 2^31 - 1', 4, '4.txt', '0-0|1-1|2-1|3-1|8-2|16-4|25-5|36-6|49-7|64-8|81-9|100-10|121-11|144-12|169-13|196-14|225-15|256-16|289-17|324-18|361-19|400-20|441-21|484-22|529-23|576-24|625-25|676-26|729-27|784-28|841-29|900-30|961-31|1024-32|1089-33|1156-34|1225-35|1296-36|1369-37|1444-38|1521-39|1600-40|1681-41|1764-42|1849-43|1936-44|2025-45|2116-46|2209-47|2304-48', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Count Primes\r\n', 'Medium', 'Given an integer n, return the number of prime numbers that are strictly less than n.\r\n\r\n', 'Input:<br> n = 10<br>\nOutput: <br>4<br>\nExplanation: <br>There are 4 prime numbers less than 10, they are 2, 3, 5, 7.', '0 <= n <= 5 * 106', 5, '5.txt', 'cheatcode', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Integer Break\r\n', 'Medium', 'Given an integer n, break it into the sum of k positive integers, where k >= 2, and maximize the product of those integers.\n\nReturn the maximum product you can get.', 'Input: n = 2<br>\nOutput: 1<br>\nExplanation: <br>2 = 1 + 1, 1 * 1 = 1.', '2 <= n <= 58', 6, '', 'cheatcode', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Count Numbers with Unique Digits\r\n', 'Medium', 'Given an integer n, return the count of all numbers with unique digits, x, where 0 <= x < 10^n.\n\n', 'Input: <br>n = 2<br>\nOutput:<br> 91<br>\nExplanation: <br>The answer should be the total numbers in the range of 0 <= x < 100, excluding 11,22,33,44,55,66,77,88,99', '0 <= n <= 8\r\n', 7, '7.txt', 'cheatcode', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Basic Calculator\r\n', 'Hard', 'Given a string s representing a valid expression, implement a basic calculator to evaluate it, and return the result of the evaluation.\n<br><br>\nNote: You are not allowed to use any built-in function which evaluates strings as mathematical expressions, such as eval().', 'Input:<br> s = \"1 + 1\"\n<br>Output:<br> 2', '1 <= s.length <= 3 * 105<br>s consists of digits, \'+\', \'-\', \'(\', \')\', and \' \'.\ns represents a valid expression.<br>\n\'+\' is not used as a unary operation (i.e., \"+1\" and \"+(2 + 3)\" is invalid).\n<br>\'-\' could be used as a unary operation (i.e., \"-1\" and \"-(2 + 3)\" is valid).\n<br>There will be no two consecutive operators in the input.<br>\nEvery number and running calculation will fit in a signed 32-bit integer.', 8, '8.txt', '23', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Super Egg Drop\r\n', 'Hard', 'You are given k identical eggs and you have access to a building with n floors labeled from 1 to n.\n\nYou know that there exists a floor f where 0 <= f <= n such that any egg dropped at a floor higher than f will break, and any egg dropped at or below floor f will not break.\n<br><br>\nEach move, you may take an unbroken egg and drop it from any floor x (where 1 <= x <= n). If the egg breaks, you can no longer use it. However, if the egg does not break, you may reuse it in future moves.\n\nReturn the minimum number of moves that you need to determine with certainty what the value of f is.\n\n ', 'Input: <br>k = 1, n = 2<br>\nOutput:<br> 2<br>\nExplanation: <br>\nDrop the egg from floor 1. If it breaks, we know that f = 0.<br>\nOtherwise, drop the egg from floor 2. If it breaks, we know that f = 1.<br>\nIf it does not break, then we know f = 2.<br>\nHence, we need at minimum 2 moves to determine with certainty what the value of f is.', '1 <= k <= 100 <br>\n1 <= n <= 104', 9, '', 'cheatcode', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>'),
('Number of Digit One\r\n', 'Hard', 'Given an integer n, count the total number of digit 1 appearing in all non-negative integers less than or equal to n.\n\n', 'Input: <br>n = 13<br>\nOutput:<br> 6', '0 <= n <= 10^9', 10, '', 'cheatcode', ' 1.  Download: - Download the test case file. <br>  2. Code:   - Choose a language.- Write your solution<br>   3. Run Locally:   - Execute your code on your machine. <br>     4. Submit:    - Upload or paste your output.<br>   5. Verdict:  - Receive automated feedback on your solution.<br>  Input Format: -  Each line in the file represents a test case.<br> Each test case is formatted as follows: test case number - input.<br> Test cases are separated by the pipe character |.<br>  Output Format: -  0-0|1-1|2-1|3-1|8-2|16-4| Each line in the file represents the result of a corresponding test case.<br> The result is formatted as follows: test case number - actual output.<br>');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `code` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `language` varchar(100) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `code`, `email`, `status`, `time`, `language`, `pname`, `pid`) VALUES
(8, '1-true|2-false|3-false|4-false|5-true|6-true|7-true|8-false|9-true|10-true| 11-true|12-false|13-true|14-true|15-true|16-true|17-false|18-false|19-true|20-true| 21-false|22-true|23-true|24-true|25-true|26-true|27-false|28-false|29-true|30-true| 31-true|32-false|33-false|34-false|35-true|36-true|37-true|38-true|39-false|40-true| 41-true|42-true|43-false|44-false|45-true|46-false|47-true|48-true|49-true|50-false|', 'h@gmail.com', 'correct answer', '2023-12-17 08:31:15', 'C++', 'Palindrome Number', '2'),
(9, 'cheatcode', 'jami@gmail.com', 'correct answer', '2023-12-17 08:51:00', 'C++', 'Pow(x, n)', '3'),
(10, '0-0|1-1|2-1|3-1|8-2|16-4|25-5|36-6|49-7|64-8|81-9|100-10|121-11|144-12|169-13|196-14|225-15|256-16|289-17|324-18|361-19|400-20|441-21|484-22|529-23|576-24|625-25|676-26|729-27|784-28|841-29|900-30|961-31|1024-32|1089-33|1156-34|1225-35|1296-36|1369-37|1444-38|1521-39|1600-40|1681-41|1764-42|1849-43|1936-44|2025-45|2116-46|2209-47|2304-48', 'jami@gmail.com', 'correct answer', '2023-12-17 08:51:47', 'C++', 'Sqrt(x)', '4'),
(11, '1-true|2-false|3-false|4-false|5-true|6-true|7-true|8-false|9-true|10-true| 11-true|12-false|13-true|14-true|15-true|16-true|17-false|18-false|19-true|20-true| 21-false|22-true|23-true|24-true|25-true|26-true|27-false|28-false|29-true|30-true| 31-true|32-false|33-false|34-false|35-true|36-true|37-true|38-true|39-false|40-true| 41-true|42-true|43-false|44-false|45-true|46-false|47-true|48-true|49-true|50-false|', 'jami@gmail.com', 'correct answer', '2023-12-17 08:56:58', 'C++', 'Palindrome Number', '2'),
(12, 'cheatcode', 'e@gmail.com', 'correct answer', '2023-12-17 09:08:07', 'C++', 'Number of Digit One', '10'),
(13, 'cheatcode', 'e@gmail.com', 'wrong answer', '2023-12-17 09:08:16', 'C++', 'Basic Calculator', '8'),
(14, '26', 'e@gmail.com', 'wrong answer', '2023-12-17 09:08:23', 'C++', 'Basic Calculator', '8'),
(15, 'cheatcode', 'e@gmail.com', 'correct answer', '2023-12-17 09:08:32', 'C++', 'Count Numbers with Unique Digits', '7'),
(16, 'cheatcode', 'e@gmail.com', 'correct answer', '2023-12-17 09:08:43', 'C++', 'Integer Break', '6'),
(17, 'cheatcode', 'e@gmail.com', 'correct answer', '2023-12-17 09:09:00', 'C++', 'Count Primes', '5'),
(18, 'cheatcode', 'e@gmail.com', 'correct answer', '2023-12-17 09:09:45', 'C++', 'Two Sum', '1'),
(19, 'uiu', 'jami@gmail.com', 'wrong answer', '2023-12-17 09:42:57', 'C++', 'Two Sum', '1'),
(20, '1-true|2-false|3-false|4-false|5-true|6-true|7-true|8-false|9-true|10-true| 11-true|12-false|13-true|14-true|15-true|16-true|17-false|18-false|19-true|20-true| 21-false|22-true|23-true|24-true|25-true|26-true|27-false|28-false|29-true|30-true| 31-true|32-false|33-false|34-false|35-true|36-true|37-true|38-true|39-false|40-true| 41-true|42-true|43-false|44-false|45-true|46-false|47-true|48-true|49-true|50-false|\n\n\n\n', 'jami@gmail.com', 'wrong answer', '2023-12-17 10:08:15', 'C++', 'Palindrome Number', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(100) NOT NULL,
  `handle` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `solveCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `handle`, `email`, `password`, `rank`, `image`, `solveCount`) VALUES
('Emam Hasan ', 'F_O_Y_E_Z', 'e@gmail.com', '$2y$10$g7K5nAuo.IBOWQO5EgNR.uzuKrZ/WaXZJ2fd9BeeiD0cGOCZjFX2W', 'Grandmaster', 'profile.png', 6),
('Hazara Hira', 'hira123', 'ehasan201302@bscse.uiu.ac.bd1', '$2y$10$idQ25.uWYvl/2BHLy5RLPuwvACwnglhjrnfc/gdyTF0PEGSzgWw2S', 'Beginner', 'hira.jpg', 0),
('hira', 'hira_uiu', 'h@gmail.com', '$2y$10$CenYHSIUFyvb/ZRUXxC7XudcFpG5OUqjWnt/lxeXaYV3SjnhZsWnq', 'Beginner', 'hira.jpg', 2),
('Jami', 'BATMAN', 'jami@gmail.com', '$2y$10$c4ABtKYU1QFNsc.fIVzTKuH3lUmgqjq/38wY.G7PUV1v8gjrRF0ti', 'Expert', '406572963_3719202375030414_5270389203739283765_n.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`contestid`);

--
-- Indexes for table `contestrank`
--
ALTER TABLE `contestrank`
  ADD PRIMARY KEY (`email`,`contestid`);

--
-- Indexes for table `problemset`
--
ALTER TABLE `problemset`
  ADD PRIMARY KEY (`problemid`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `contestid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `problemset`
--
ALTER TABLE `problemset`
  MODIFY `problemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
