SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `shop_orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `lastname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `shop_orders` (`id`, `name`, `lastname`, `email`) VALUES
(1, 'Dūkštas', 'Pavardė', 'dukstas@email.lt'),
(2, 'Dusetos', 'Pavardė', 'dusetos@email.lt'),
(3, 'Eišiškės', 'Pavardė', 'eisiskes@email.lt'),
(4, 'Elektrėnai', 'Pavardė', 'elektrenai@email.lt'),
(5, 'Gargždai', 'Pavardė', 'gargzdai@email.lt'),
(6, 'Ignalina', 'Pavardė', 'Ignalina@email.lt'),
(7, 'Jonava', 'Pavardė', 'Jonava@email.lt'),
(8, 'Jurbarkas', 'Pavardė', 'Jurbarkas@email.lt'),
(9, 'Kalvarija', 'Pavardė', 'Kalvarija@email.lt'),
(10, 'Kaunas', 'Pavardė', 'Kaunas@email.lt'),
(11, 'Obeliai', 'Pavardė', 'Obeliai@email.lt'),
(12, 'Palanga', 'Pavardė', 'Palanga@email.lt'),
(13, 'Panevezys', 'Pavardė', 'Panevezys@email.lt'),
(14, 'Pasvalys', 'Pavardė', 'Pasvalys@email.lt'),
(15, 'Prienai', 'Pavardė', 'Prienai@email.lt'),
(16, 'Raseiniai', 'Pavardė', 'Raseiniai@email.lt'),
(17, 'Salantai', 'Pavardė', 'Salantai@email.lt'),
(18, 'Skuodas', 'Pavardė', 'Skuodas@email.lt'),
(19, 'Tauragė', 'Pavardė', 'Taurage@email.lt'),
(20, 'Utena', 'Pavardė', 'Utena@email.lt'),
(21, 'Varniai', 'Pavardė', 'Varniai@email.lt'),
(22, 'Venta', 'Pavardė', 'Venta@email.lt'),
(23, 'Vievis', 'Pavardė', 'Vievis@email.lt'),
(24, 'Vilkija', 'Pavardė', 'Vilkija@email.lt'),
(25, 'Vilnius', 'Pavardė', 'Vilnius@email.lt'),
(26, 'Virbalis', 'Pavardė', 'Virbalis@email.lt'),
(27, 'Visaginas', 'Pavardė', 'Visaginas@email.lt'),
(28, 'Zarasai', 'Pavardė', 'Zarasai@email.lt'),
(29, 'Trakai', 'Pavardė', 'Trakai@email.lt'),
(30, 'Ukmergė', 'Pavardė', 'Ukmerge@email.lt'),
(31, 'Vabalninkas', 'Pavardė', 'Vabalninkas@email.lt'),
(32, 'Pakruojis', 'Pavardė', 'Pakruojis@email.lt'),
(33, 'Plungė', 'Pavardė', 'Plunge@email.lt'),
(34, 'Priekulė', 'Pavardė', 'Priekule@email.lt'),
(35, 'Radviliškis', 'Pavardė', 'Radviliskis@email.lt'),
(36, 'Ramygala', 'Pavardė', 'Ramygala@email.lt'),
(37, 'Rietavas', 'Pavardė', 'Rietavas@email.lt'),
(38, 'Skaudvilė', 'Pavardė', 'Skaudvile@email.lt'),
(39, 'Varėna', 'Pavardė', 'Varena@email.lt'),
(40, 'Veisiejai', 'Pavardė', 'Veisiejai@email.lt');


ALTER TABLE `shop_orders`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `shop_orders`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;SET FOREIGN_KEY_CHECKS=1;
COMMIT;
