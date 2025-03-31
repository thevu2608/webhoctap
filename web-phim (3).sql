-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2024 lúc 05:25 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web-phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`) VALUES
(0, 'Lớp 5', 'Lớp 5', 1, 'Lớp 5'),
(1, 'Lớp 4', 'Lớp 4', 1, 'Lớp 4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Kết Nối Tri Thức Với Cuộc Sống', 'Kết Nối Tri Thức Với Cuộc Sống', 1, 'Kết Nối Tri Thức Với Cuộc Sống'),
(3, 'Chân Trời Sáng Tạo', 'Chân Trời Sáng Tạo', 1, 'Chân Trời Sáng Tạo'),
(4, 'Cánh Diều', 'Cánh Diều', 1, 'Cánh Diều');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` text NOT NULL,
  `episode` int(11) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Kết Nối Tri Thức Với Cuộc Sống', 'Kết Nối Tri Thức Với Cuộc Sống', 1, 'Kết Nối Tri Thức Với Cuộc Sống'),
(2, 'Chân Trời Sáng Tạo', 'Chân Trời Sáng Tạo', 1, 'Chân Trời Sáng Tạo'),
(4, 'Cánh Diều', 'Cánh Diều', 1, 'Cánh Diều');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `copyright` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `logo`, `copyright`) VALUES
(1, 'web thông tin chuyên đề', 'web thông tin chuyên đề', 'logo.jpg', 'web thông tin chuyên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `date_update` varchar(50) DEFAULT NULL,
  `image_sach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `slug`, `description`, `status`, `category_id`, `genre_id`, `country_id`, `image`, `date_created`, `date_update`, `image_sach`) VALUES
(53, 'Tiếng anh nâng cao lớp 4', 'Tiếng anh nâng cao lớp 4', 'ập trung vào từ vựng: Hãy dành thời gian hàng ngày để học từ vựng mới. Bạn có thể sử dụng flashcards hoặc ứng dụng di động để học từ vựng một cách hiệu quả.\r\nĐọc sách và truyện tiếng Anh: Chọn sách và truyện phù hợp với trình độ của bạn và đọc hàng ngày. Điều này giúp bạn cải thiện kỹ năng đọc và mở rộng vốn từ vựng của mình.\r\nLuyện nghe và nói: Lắng nghe các bài hát, video, hoạt hình hoặc podcast bằng tiếng Anh để cải thiện kỹ năng nghe của bạn. Thực hành nói Tiếng Anh bằng cách tham gia vào các hoạt động như hội thoại, kịch nói hoặc đọc to trước lớp.\r\nViết hàng ngày: Hãy thực hành viết tiếng Anh hàng ngày, bao gồm viết nhật ký, nhật ký hoặc viết về những gì bạn đã học trong ngày.\r\nThực hành ngữ pháp: Học và thực hành các quy tắc ngữ pháp cơ bản như cách sử dụng thì, danh từ, động từ và trạng từ.\r\nTham gia vào các hoạt động ngoại khóa: Tham gia vào các lớp học hoặc câu lạc bộ Tiếng Anh ngoại khóa để có cơ hội thực hành và giao tiếp với những người nói Tiếng Anh.\r\nTìm kiếm phản hồi và sự hỗ trợ: Hãy xin phản hồi từ giáo viên hoặc bạn bè về kỹ năng của bạn và hỏi về những điểm yếu cần cải thiện.', 1, 1, 4, 4, '8055078375455303.jpg', '2024-04-18 10:51:36', '2024-04-18 10:51:36', ''),
(54, 'Tiếng việt lớp 5', 'Tiếng việt lớp 5', 'Đọc và hiểu văn bản: Hãy đọc nhiều loại văn bản khác nhau như truyện ngắn, bài thơ, bài báo và sách giáo khoa. Tập trung vào việc hiểu ý nghĩa của văn bản, nhận biết ý chính, ý phụ và mục đích của tác giả.\r\nVăn phạm và ngữ pháp: Học và luyện tập các quy tắc văn phạm và ngữ pháp Tiếng Việt như cách sử dụng từ loại, cấu trúc câu, ngữ pháp động từ, tính từ và phó từ.\r\nViết văn bản: Thực hành viết văn bản khác nhau như bài tập văn nghị luận, bài văn tả, bài văn miêu tả, và bài thơ. Hãy chú ý đến cách sắp xếp ý, sử dụng từ vựng phong phú và cấu trúc câu hợp lý.\r\nNói và trình bày: Tham gia vào các hoạt động nói trước lớp như thuyết trình, báo cáo hoặc thảo luận. Hãy rèn kỹ năng trình bày ý tưởng một cách rõ ràng và logic.\r\nLuyện từ vựng: Mở rộng vốn từ vựng của mình bằng cách học từ mới từ sách, báo, và các nguồn tài liệu khác. Sử dụng từ vựng mới này trong việc viết và nói.\r\nTìm hiểu văn hóa và lịch sử: Đọc về văn hóa, lịch sử và truyền thống dân tộc Việt Nam để hiểu rõ hơn văn hoá của đất nước và cải thiện kỹ năng đọc hiểu.\r\nThực hành đề thi và bài tập: Làm các bài tập và đề thi mẫu để thực hành và chuẩn bị cho các bài kiểm tra và kỳ thi.', 1, 0, 2, 1, 'sach-giao-khoa-tieng-viet-lop-51277.jpg', '2024-04-18 10:53:30', '2024-04-18 10:53:30', ''),
(55, 'Thực hành tiếng việt và toán lớp 5 tập 2', 'Thực hành tiếng việt và toán lớp 5 tập 2', 'Thực hành Tiếng Việt:\r\nĐọc và hiểu văn bản: Chọn một đoạn văn bản từ sách giáo khoa Tiếng Việt lớp 5 tập 2 và đọc kỹ. Sau đó, hãy trả lời các câu hỏi liên quan để đảm bảo bạn đã hiểu rõ nội dung.\r\nViết bài văn: Viết một bài văn tả về một người bạn hoặc một nơi bạn thích. Hãy sử dụng từ vựng đa dạng và cấu trúc câu phong phú.\r\nLuyện ngữ pháp: Làm các bài tập về ngữ pháp từ sách giáo khoa hoặc từ các tài liệu tham khảo khác. Hãy tập trung vào các chủ đề như cấu trúc câu, từ loại và thì của động từ.\r\nThực hành viết thư: Viết một lá thư cho một người bạn hoặc người thân về những điều bạn đã làm hoặc cảm xúc của bạn gần đây.\r\nThực hành Toán:\r\nLuyện tập phép tính: Thực hiện các bài tập về cộng, trừ, nhân và chia từ sách giáo khoa hoặc các tài liệu tham khảo khác.\r\nGiải bài toán: Làm các bài toán liên quan đến các khái niệm về số học, phân số, tỉ lệ và đo lường. Hãy đảm bảo bạn hiểu và áp dụng các công thức và phương pháp giải quyết vấn đề.\r\nLuyện tập với bảng số: Sử dụng bảng số để giải các bài toán, tăng cường kỹ năng tính toán và hiểu biết về số học.\r\nThực hành đo lường và hình học: Làm các bài tập liên quan đến đo lường và hình học như tính diện tích, chu vi và phân loại các hình học.\r\nThực hiện các trò chơi và câu đố toán học: Sử dụng trò chơi và câu đố để thú vị hóa quá trình học toán và khuyến khích sự sáng tạo và tư duy logic.', 1, 0, 2, 1, '2021_06_03_15_24_54_1-390x510613.jpg', '2024-04-18 10:55:31', '2024-04-18 10:55:31', ''),
(57, 'Sách giáo khoa toán lớp 5', 'Sách giáo khoa toán lớp 5', 'Tổng Quan\r\nSách giáo khoa Toán lớp 5 là một tài liệu học tập cơ bản dành cho học sinh lớp 5 trong hệ thống giáo dục phổ thông. Sách được thiết kế nhằm phát triển tư duy logic, khả năng giải quyết vấn đề và kỹ năng toán học cần thiết cho học sinh ở giai đoạn cuối của bậc tiểu học.\r\n\r\nCấu Trúc\r\nSách thường được chia thành các phần chính như sau:\r\n\r\nPhần Số Học\r\n\r\nSố tự nhiên và các phép tính cơ bản: Bao gồm các bài học về phép cộng, trừ, nhân, chia các số tự nhiên.\r\nPhân số và số thập phân: Giới thiệu về phân số, các phép tính với phân số và số thập phân, chuyển đổi giữa phân số và số thập phân.\r\nCác bài toán về tỉ lệ và phần trăm: Học sinh học cách tính toán và ứng dụng tỉ lệ, phần trăm trong các bài toán thực tế.\r\nPhần Hình Học\r\n\r\nCác hình cơ bản: Học về các hình học cơ bản như tam giác, tứ giác, hình chữ nhật, hình vuông, hình tròn và các đặc điểm của chúng.\r\nĐo lường: Bao gồm các bài học về chu vi, diện tích, thể tích của các hình học cơ bản.\r\nHình học không gian: Giới thiệu các khái niệm cơ bản về hình học không gian như hình lập phương, hình hộp chữ nhật.\r\nPhần Đại Lượng và Đo Đại Lượng\r\n\r\nĐơn vị đo lường: Học về các đơn vị đo lường thông dụng như mét, kilogram, lít, và cách chuyển đổi giữa các đơn vị.\r\nThời gian: Bao gồm các bài học về cách tính giờ, phút, giây và ứng dụng trong các bài toán thực tế.\r\nPhần Giải Toán Có Lời Văn\r\n\r\nBài toán ứng dụng: Các bài toán liên quan đến cuộc sống hàng ngày, giúp học sinh hiểu và ứng dụng toán học vào thực tế.\r\nPhương pháp giải toán: Hướng dẫn các phương pháp và bước giải các bài toán có lời văn, bao gồm việc lập kế hoạch giải, kiểm tra và đánh giá kết quả.\r\nĐặc Điểm\r\nHình ảnh và minh họa: Sách sử dụng nhiều hình ảnh và minh họa để giúp học sinh dễ dàng hiểu các khái niệm toán học.\r\nBài tập thực hành: Sau mỗi phần lý thuyết, sách thường có các bài tập thực hành để học sinh luyện tập và củng cố kiến thức.\r\nBài kiểm tra và đánh giá: Sách cũng bao gồm các bài kiểm tra và đánh giá ở cuối mỗi chương để giúp học sinh tự đánh giá mức độ hiểu biết và tiến bộ của mình.\r\nMục Tiêu\r\nPhát triển kỹ năng toán học: Giúp học sinh nắm vững các khái niệm toán học cơ bản và phát triển kỹ năng giải quyết vấn đề.\r\nỨng dụng thực tế: Khuyến khích học sinh áp dụng kiến thức toán học vào các tình huống thực tế.\r\nChuẩn bị cho bậc trung học: Đặt nền tảng vững chắc cho học sinh để họ có thể tiếp tục học tập hiệu quả ở bậc trung học.', 1, 0, 1, 3, 'sach-giao-khoa-toan-lop-55243.jpg', '2024-05-27 22:11:52', '2024-05-27 22:11:52', 'Sach-Giao-Khoa-Toan-Lop-5-Trang-348344.png'),
(58, 'Nâng cao và phát triển toán 4', 'Nâng cao và phát triển toán 4', 'Luyện tập cơ bản: Hãy đảm bảo rằng bạn hiểu và luyện tập vững các phép tính cơ bản như cộng, trừ, nhân và chia. Bạn có thể thực hiện các bài tập tính toán hàng ngày hoặc sử dụng các trò chơi trực tuyến để luyện tập.\r\nXây dựng cơ sở kiến thức: Đảm bảo rằng bạn hiểu vững các khái niệm cơ bản như số học, phân số, tỉ lệ, và đo lường. Hãy sử dụng các bài tập và ví dụ cụ thể để làm quen và hiểu sâu hơn về chúng.\r\nGiải các bài toán: Hãy thực hành giải các bài toán. Điều này sẽ giúp bạn áp dụng kiến thức toán học vào thực tế và phát triển kỹ năng tư duy logic.\r\nThực hành với trò chơi và hoạt động sáng tạo: Sử dụng các trò chơi và hoạt động sáng tạo để tăng cường kỹ năng toán học. Các trò chơi như Sudoku, Tangram, và các trò chơi boardgame có thể giúp bạn phát triển kỹ năng tư duy logic và toán học một cách thú vị.\r\nHọc cách sử dụng công cụ toán học: Hãy làm quen với các công cụ toán học như thước đo, thước kẻ, cân đong và máy tính để tăng cường kỹ năng làm việc với số liệu và đo lường.\r\nHợp tác và thảo luận: Hãy tham gia vào các hoạt động nhóm và thảo luận với bạn bè về các vấn đề toán học. Điều này có thể giúp bạn hiểu sâu hơn thông qua việc trao đổi ý kiến và cách tiếp cận khác nhau đối với các bài toán.', 1, 1, 1, 3, '13385.jpg', '2024-05-27 22:13:44', '2024-05-27 22:13:44', '21628.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(25, 53, 4),
(26, 54, 2),
(27, 55, 1),
(28, 55, 2),
(30, 57, 1),
(31, 58, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thevu268', 'nguyenthev26801@gmail.com', NULL, '$2y$10$tZE6VXMf5omW.dvwOEbtIuo5AJCriyNr9K/oMazcefisn5MfVmcQ.', '3Fv4FIZUJDeFqIhw4iT8IiCLUluiHKzHCSC9bRxMJCgRfTxafIZ2cWbZNr99', '2023-09-13 00:43:36', '2023-09-13 00:43:36'),
(2, 'nguyen the vu', 'thevu2682001@gmail.com', NULL, '$2y$10$4vnJixH/TPGdSbJjOYIthukuFQaxbuj2NZoQkJWdQ8cZY1GvEnUIS', NULL, '2023-09-14 00:27:40', '2023-09-14 00:27:40'),
(3, 'Nguyễn Quốc Đạt', 'nguyenquocdat@gmail.com', NULL, '123456', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
