SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `shop_orders`;
CREATE TABLE `shop_orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `lastname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `shop_orders` (`id`, `name`, `lastname`, `email`) VALUES
(NULL, 'Dūkštas', 'Pavardė', 'dukstas@email.lt'),
(NULL, 'Dusetos', 'Pavardė', 'dusetos@email.lt'),
(NULL, 'Eišiškės', 'Pavardė', 'eisiskes@email.lt'),
(NULL, 'Elektrėnai', 'Pavardė', 'elektrenai@email.lt'),
(NULL, 'Gargždai', 'Pavardė', 'gargzdai@email.lt'),
(NULL, 'Ignalina', 'Pavardė', 'Ignalina@email.lt'),
(NULL, 'Jonava', 'Pavardė', 'Jonava@email.lt'),
(NULL, 'Jurbarkas', 'Pavardė', 'Jurbarkas@email.lt'),
(NULL, 'Kalvarija', 'Pavardė', 'Kalvarija@email.lt'),
(NULL, 'Kaunas', 'Pavardė', 'Kaunas@email.lt');


ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `shop_orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

