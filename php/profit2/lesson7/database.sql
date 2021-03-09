CREATE TABLE `authors` (
`id` SERIAL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Низамов1'),
(2, 'Низамов2'),
(3, 'Низамов3'),
(4, 'Низамов4');

CREATE TABLE `news` (
`id` SERIAL,
`title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`contents` text COLLATE utf8mb4_unicode_ci,
`author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `news` (`id`, `title`, `contents`, `author_id`) VALUES
(1, 'Новость1', 'Текст новости', 1),
(2, 'Новость2', 'Текст статьи', 4),
(3, 'Новость3', 'Текст новости', 1),
(4, 'Новость4', 'Текст новости', 2),
(5, 'Новость5', 'Текст новости', 4),
(6, 'Новость6', 'Текст новости', 2);
