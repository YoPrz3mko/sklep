-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Kwi 2025, 09:41
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bronie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `akcesoria`
--

CREATE TABLE `akcesoria` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `producent` varchar(100) NOT NULL,
  `kategoria` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) NOT NULL,
  `ilosc_na_stanie` int(11) DEFAULT 0,
  `opis` text DEFAULT NULL,
  `zdjecie` varchar(255) DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `akcesoria`
--

INSERT INTO `akcesoria` (`id`, `nazwa`, `producent`, `kategoria`, `cena`, `ilosc_na_stanie`, `opis`, `zdjecie`, `data_dodania`) VALUES
(1, 'Aimpoint Micro H-2', 'Aimpoint', 'Kolimatory', '699.99', 8, 'Jeden z najnowszych kolimatorów w ofercie Aimpoint, bardzo trwały i precyzyjny. Rok produkcji: 2021.', 'aimpoint_micro_h2.jpg', '2021-05-14 22:00:00'),
(2, 'EOTech XPS2-0', 'EOTech', 'Kolimatory', '549.99', 10, 'Kolimator holograficzny o kompaktowej konstrukcji, popularny w służbach wojskowych. Rok produkcji: 2020.', 'eotech_xps2.jpg', '2020-11-19 23:00:00'),
(3, 'Trijicon RMR Type 2', 'Trijicon', 'Kolimatory', '499.99', 7, 'Kolimator o wyjątkowej wytrzymałości, doskonały do używania w trudnych warunkach. Rok produkcji: 2020.', 'trijicon_rmr.jpg', '2020-09-09 22:00:00'),
(4, 'Holosun HS503C', 'Holosun', 'Kolimatory', '329.99', 12, 'Kolimator zasilany energią słoneczną, przeznaczony do szybkiej celności. Rok produkcji: 2021.', 'holosun_hs503c.jpg', '2021-03-21 23:00:00'),
(5, 'Vortex Crossfire Red Dot', 'Vortex', 'Kolimatory', '199.99', 15, 'Kolejny świetny wybór w kategorii kolimatorów, oferujący bardzo dobry stosunek jakości do ceny. Rok produkcji: 2020.', 'vortex_crossfire.jpg', '2020-07-29 22:00:00'),
(6, 'SureFire SF Ryder 22', 'SureFire', 'Supresory', '449.99', 5, 'Supresor o świetnej jakości, zaprojektowany do broni krótkiej i długiej. Rok produkcji: 2020.', 'surefire_ryder.jpg', '2020-08-14 22:00:00'),
(7, 'Dead Air Sandman-S', 'Dead Air', 'Supresory', '849.99', 3, 'Supresor do karabinów, znany ze swojej wytrzymałości i efektywności. Rok produkcji: 2020.', 'deadair_sandman.jpg', '2020-10-04 22:00:00'),
(8, 'SilencerCo Omega 36M', 'SilencerCo', 'Supresory', '999.99', 4, 'Wszechstronny tłumik o solidnej konstrukcji. Rok produkcji: 2021.', 'silencerco_omega.jpg', '2021-02-17 23:00:00'),
(9, 'AAC 762-SD', 'Advanced Armament Corporation', 'Supresory', '799.99', 3, 'Tłumik przeznaczony do karabinów, zapewniający dużą redukcję hałasu. Rok produkcji: 2020.', 'aac_762sd.jpg', '2020-06-21 22:00:00'),
(10, 'Thunder Beast Ultra 7', 'Thunder Beast', 'Supresory', '899.99', 2, 'Tłumik do karabinów, ceniony za cichą pracę. Rok produkcji: 2021.', 'thunderbeast_ultra7.jpg', '2021-04-09 22:00:00'),
(11, 'Streamlight Protac HL-X', 'Streamlight', 'Latarki', '129.99', 20, 'Latarka taktyczna z dużą mocą, idealna do zastosowań wojskowych. Rok produkcji: 2021.', 'streamlight_protac.jpg', '2021-01-14 23:00:00'),
(12, 'SureFire M600DF', 'SureFire', 'Latarki', '269.99', 15, 'Latarka z diodą LED, bardzo popularna wśród służb mundurowych. Rok produkcji: 2021.', 'surefire_m600df.jpg', '2021-03-07 23:00:00'),
(13, 'Fenix TK75', 'Fenix', 'Latarki', '189.99', 10, 'Latarka wielofunkcyjna o dużym zasięgu. Rok produkcji: 2020.', 'fenix_tk75.jpg', '2020-09-24 22:00:00'),
(14, 'Olight Warrior X Pro', 'Olight', 'Latarki', '149.99', 12, 'Latarka o wytrzymałej konstrukcji, charakteryzująca się dużą mocą świecenia. Rok produkcji: 2021.', 'olight_warrior.jpg', '2021-02-11 23:00:00'),
(15, 'MagLite ML300L', 'MagLite', 'Latarki', '79.99', 18, 'Latarka LED, idealna do długotrwałego użytku. Rok produkcji: 2020.', 'maglite_ml300l.jpg', '2020-11-04 23:00:00'),
(16, 'Federal Premium HST 9mm', 'Federal', 'Amunicja', '29.99', 50, 'Amunicja premium, ceniona za niezawodność. Opakowanie: 20 szt. Rok produkcji: 2020.', 'federal_hst.jpg', '2020-08-19 22:00:00'),
(17, 'Hornady Critical Defense', 'Hornady', 'Amunicja', '24.99', 60, 'Amunicja przeznaczona do obrony, idealna do pistoletów. Opakowanie: 25 szt. Rok produkcji: 2020.', 'hornady_critical.jpg', '0000-00-00 00:00:00'),
(18, 'Winchester Ranger T-Series', 'Winchester', 'Amunicja', '32.99', 45, 'Amunicja wojskowa, szeroko stosowana przez jednostki specjalne. Opakowanie: 20 szt. Rok produkcji: 2021.', 'winchester_ranger.jpg', '2021-01-24 23:00:00'),
(19, 'Remington Golden Saber', 'Remington', 'Amunicja', '27.99', 55, 'Amunicja o bardzo dobrych parametrach balistycznych. Opakowanie: 25 szt. Rok produkcji: 2020.', 'remington_saber.jpg', '2020-10-11 22:00:00'),
(20, 'Magtech 115gr FMJ', 'Magtech', 'Amunicja', '19.99', 100, 'Amunicja o wysokiej jakości, dedykowana do treningów i strzelectwa sportowego. Opakowanie: 50 szt. Rok produkcji: 2021.', 'magtech_fmj.jpg', '2021-04-04 22:00:00'),
(21, 'North American Rescue Individual First Aid Kit (IFAK)', 'North American Rescue', 'Apteczki polowe', '149.99', 10, 'Kompletna apteczka przeznaczona do szybkiej pomocy w sytuacjach kryzysowych. Rok produkcji: 2021.', 'nar_ifak.jpg', '2021-03-19 23:00:00'),
(22, 'Tactical Medical Solutions TCCC IFAK', 'Tactical Medical Solutions', 'Apteczki polowe', '179.99', 8, 'Apteczka pierwszej pomocy dla wojskowych, zawierająca podstawowe środki medyczne. Rok produkcji: 2021.', 'tms_tccc.jpg', '2021-02-27 23:00:00'),
(23, 'Z-Medica QuikClot Trauma Kit', 'Z-Medica', 'Apteczki polowe', '129.99', 12, 'Apteczka zawierająca środki do zatamowania krwawienia. Rok produkcji: 2021.', 'zmedica_quikclot.jpg', '2021-01-09 23:00:00'),
(24, 'Adventure Medical Kits Professional Trauma Pack', 'Adventure Medical Kits', 'Apteczki polowe', '199.99', 7, 'Apteczka ratunkowa, idealna do intensywnego użytkowania w terenie. Rok produkcji: 2020.', 'amk_trauma.jpg', '2020-12-14 23:00:00'),
(25, 'MyMedic MyFAK', 'MyMedic', 'Apteczki polowe', '159.99', 9, 'Apteczka zaprojektowana z myślą o ratownictwie medycznym. Rok produkcji: 2021.', 'mymedic_myfak.jpg', '2021-04-14 22:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `broń biała`
--

CREATE TABLE `broń biała` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `producent` varchar(100) NOT NULL,
  `typ` varchar(50) NOT NULL,
  `dlugosc` decimal(10,2) DEFAULT NULL,
  `cena` decimal(10,2) NOT NULL,
  `ilosc_na_stanie` int(11) DEFAULT 0,
  `opis` text DEFAULT NULL,
  `zdjecie` varchar(255) DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `broń biała`
--

INSERT INTO `broń biała` (`id`, `nazwa`, `producent`, `typ`, `dlugosc`, `cena`, `ilosc_na_stanie`, `opis`, `zdjecie`, `data_dodania`) VALUES
(1, 'Ka-Bar TDI Law Enforcement Knife', 'Ka-Bar', 'Nóż składany', '19.70', '60.00', 20, 'Nóż zaprojektowany z myślą o służbach mundurowych. Ma specjalnie zaprojektowany uchwyt, który umożliwia łatwe i szybkie wyciągnięcie w sytuacjach kryzysowych. Długość całkowita: 7.75 cala (197 mm). Długość ostrza: 3.5 cala (89 mm). Waga: 5.2 oz (147 g).', 'kabar_tdi.jpg', '2025-04-02 06:01:26'),
(2, 'Cold Steel Recon 1', 'Cold Steel', 'Nóż składany', '22.90', '75.00', 18, 'Nóż taktyczny, idealny do codziennego noszenia. Posiada blokadę Tri-Ad, która zapewnia dodatkowe bezpieczeństwo przy intensywnym użytkowaniu. Długość całkowita: 9 cali (229 mm). Długość ostrza: 4 cali (102 mm). Waga: 5.5 oz (156 g).', 'cold_steel_recon1.jpg', '2025-04-02 06:01:26'),
(3, 'Benchmade Griptilian 551', 'Benchmade', 'Nóż składany', '20.50', '135.00', 15, 'Nóż zaprojektowany z myślą o profesjonalnych użytkownikach, wyposażony w system blokady Axis, który zapewnia bezpieczeństwo i niezawodność. Długość całkowita: 8.07 cala (205 mm). Długość ostrza: 3.45 cala (88 mm). Waga: 3.8 oz (108 g).', 'benchmade_griptilian.jpg', '2025-04-02 06:01:26'),
(4, 'ESEE 4P', 'ESEE', 'Nóż stałoostrzałowy', '22.90', '115.00', 12, 'Nóż outdoorowy o bardzo solidnej budowie. Doskonały do użytkowania w trudnych warunkach terenowych. Posiada antypoślizgową rękojeść. Długość całkowita: 9 cali (229 mm). Długość ostrza: 4.5 cala (114 mm). Waga: 6.5 oz (184 g).', 'esee_4p.jpg', '2025-04-02 06:01:26'),
(5, 'Spyderco Paramilitary 2', 'Spyderco', 'Nóż składany', '21.00', '175.00', 10, 'Jeden z najbardziej cenionych noży wśród miłośników broni białej i survivalu. Jest ergonomiczny, wytrzymały i zapewnia wygodny chwyt. Długość całkowita: 8.28 cala (210 mm). Długość ostrza: 3.44 cala (87 mm). Waga: 3.75 oz (106 g).', 'spyderco_paramilitary2.jpg', '2025-04-02 06:01:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `broń długa`
--

CREATE TABLE `broń długa` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `producent` varchar(100) NOT NULL,
  `kaliber` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) NOT NULL,
  `ilosc_na_stanie` int(11) DEFAULT 0,
  `opis` text DEFAULT NULL,
  `zdjecie` varchar(255) DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `broń długa`
--

INSERT INTO `broń długa` (`id`, `nazwa`, `producent`, `kaliber`, `cena`, `ilosc_na_stanie`, `opis`, `zdjecie`, `data_dodania`) VALUES
(1, 'FN SCAR 16S', 'FN Herstal', '5.56x45mm NATO', '2750.00', 5, 'Karabin szturmowy o nowoczesnej konstrukcji. Jest uznawany za jeden z najlepszych karabinów szturmowych, ceniony przez wojsko i jednostki specjalne na całym świecie. Długość lufy: 16 cala (406 mm). Waga: 8.2 lbs (3.7 kg). Pojemność magazynka: 30 naboi.', 'fn_scar_16s.jpg', '2025-04-02 06:01:26'),
(2, 'Smith & Wesson M&P15 Sport II', 'Smith & Wesson', '5.56x45mm NATO / .223 Remington', '750.00', 9, 'Karabin AR-15, bardzo popularny na rynku cywilnym. M&P15 Sport II to solidna konstrukcja, która zapewnia niezawodność, precyzję i prostotę w obsłudze. Długość lufy: 16 cala (406 mm). Waga: 6.5 lbs (2.95 kg). Pojemność magazynka: 30 naboi.', 'mp15_sport2.jpg', '2025-04-02 06:01:26'),
(3, 'Heckler & Koch HK416', 'Heckler & Koch', '5.56x45mm NATO', '3500.00', 4, 'Karabin szturmowy, szeroko używany przez jednostki specjalne. Jest to konstrukcja bazująca na systemie gazowym AR-15, ale z wieloma usprawnieniami i modyfikacjami poprawiającymi niezawodność. Długość lufy: 14.5 cala (368 mm). Waga: 7.5 lbs (3.4 kg). Pojemność magazynka: 30 naboi.', 'hk416.jpg', '2025-04-02 06:01:26'),
(4, 'Steyr AUG A3 M1', 'Steyr', '5.56x45mm NATO', '2750.00', 6, 'Karabin bullpup, znany ze swojej kompaktowej konstrukcji. Dzięki nietypowej lokalizacji mechanizmów (za rękojeścią) pozwala na krótszy i bardziej zwrotny karabin o tej samej długości lufy. Długość lufy: 16 cala (406 mm). Waga: 7.9 lbs (3.6 kg). Pojemność magazynka: 30 naboi.', 'steyr_aug_a3.jpg', '2025-04-02 06:01:26'),
(5, 'CZ Bren 2 MS', 'CZ', '5.56x45mm NATO / 7.62x39mm', '2250.00', 7, 'Karabin szturmowy nowej generacji, bardzo ceniony przez jednostki specjalne. Posiada wiele usprawnień, takich jak zmniejszony odrzut, nowoczesny system regulacji gazu i możliwość łatwej konwersji między kalibrami. Długość lufy: 14.5 cala (368 mm). Waga: 8.2 lbs (3.7 kg). Pojemność magazynka: 30 naboi.', 'cz_bren_2.jpg', '2025-04-02 06:01:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `broń krótka`
--

CREATE TABLE `broń krótka` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `producent` varchar(100) NOT NULL,
  `kaliber` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) NOT NULL,
  `ilosc_na_stanie` int(11) DEFAULT 0,
  `opis` text DEFAULT NULL,
  `zdjecie` varchar(255) DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `broń krótka`
--

INSERT INTO `broń krótka` (`id`, `nazwa`, `producent`, `kaliber`, `cena`, `ilosc_na_stanie`, `opis`, `zdjecie`, `data_dodania`) VALUES
(1, 'Sig Sauer P320 M17', 'Sig Sauer', '9mm', '800.00', 10, 'Pistolet wojskowy, który zastąpił Berettę M9 w armii USA. Wyposażony w mechanizm strzału DAO (Double Action Only) oraz unikalny system wymiennych modułów (frame, grip, slide). Posiada możliwość wymiany lufy na dłuższą (match). Długość lufy: 4.7 cala (119 mm). Waga: 30.4 oz (860 g). Pojemność magazynka: 17 naboi.', 'sig_sauer_p320_m17.jpg', '2025-04-02 06:01:26'),
(2, 'Glock 19 Gen 5', 'Glock', '9mm', '550.00', 15, 'Pistolet o kompaktowych rozmiarach, uznawany za jeden z najlepszych w swojej klasie. Posiada nową, bezpieczną konstrukcję i usprawnioną mechanikę strzału. Glock 19 Gen 5 to pistolet na każdą okazję, od obrony osobistej po strzelectwo sportowe. Długość lufy: 4.02 cala (102 mm). Waga: 23.65 oz (670 g). Pojemność magazynka: 15 naboi.', 'glock_19_gen5.jpg', '2025-04-02 06:01:26'),
(3, 'Beretta 92X Performance', 'Beretta', '9mm', '1150.00', 8, 'Zmodernizowana wersja legendarnej Beretty 92, zaprojektowana z myślą o zawodach strzeleckich. Dzięki zaawansowanej technologii wykonania, 92X Performance oferuje wyjątkową precyzję oraz minimalizację odrzutu. Długość lufy: 5 cala (127 mm). Waga: 46.5 oz (1321 g). Pojemność magazynka: 15 naboi.', 'beretta_92x_performance.jpg', '2025-04-02 06:01:26'),
(4, 'Springfield Armory XD-M Elite 9mm', 'Springfield Armory', '9mm', '650.00', 12, 'Pistolet z nowoczesnym systemem wzmacniania odrzutu oraz szybkim magazynkiem. Jest idealny do strzelectwa sportowego i samoobrony, oferując wygodę oraz dużą pojemność. Długość lufy: 4.5 cala (114 mm). Waga: 27 oz (765 g). Pojemność magazynka: 20 naboi.', 'springfield_xdm_elite.jpg', '2025-04-02 06:01:26'),
(5, 'CZ P-10F', 'CZ', '9mm', '550.00', 14, 'Pistolet o świetnej ergonomii, znany z precyzji oraz niezawodności. Posiada system bezpiecznego spustu oraz doskonałą kontrolę odrzutu. Długość lufy: 4.5 cala (115 mm). Waga: 26.5 oz (752 g). Pojemność magazynka: 19 naboi.', 'cz_p10f.jpg', '2025-04-02 06:01:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `adres` text DEFAULT NULL,
  `miasto` varchar(100) DEFAULT NULL,
  `kod_pocztowy` varchar(10) DEFAULT NULL,
  `numer_pozwolenia` varchar(50) DEFAULT NULL,
  `data_rejestracji` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pozycje_zamowienia`
--

CREATE TABLE `pozycje_zamowienia` (
  `id` int(11) NOT NULL,
  `zamowienie_id` int(11) NOT NULL,
  `typ_produktu` enum('Broń krótka','Broń Długa','Broń Biała','Akcesoria') NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena_jednostkowa` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `data_zamowienia` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Nowe',
  `wartosc_calkowita` decimal(10,2) NOT NULL,
  `metoda_platnosci` varchar(50) DEFAULT NULL,
  `uwagi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `akcesoria`
--
ALTER TABLE `akcesoria`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `broń biała`
--
ALTER TABLE `broń biała`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `broń długa`
--
ALTER TABLE `broń długa`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `broń krótka`
--
ALTER TABLE `broń krótka`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `pozycje_zamowienia`
--
ALTER TABLE `pozycje_zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zamowienie_id` (`zamowienie_id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klient_id` (`klient_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `akcesoria`
--
ALTER TABLE `akcesoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `broń biała`
--
ALTER TABLE `broń biała`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `broń długa`
--
ALTER TABLE `broń długa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `broń krótka`
--
ALTER TABLE `broń krótka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pozycje_zamowienia`
--
ALTER TABLE `pozycje_zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pozycje_zamowienia`
--
ALTER TABLE `pozycje_zamowienia`
  ADD CONSTRAINT `pozycje_zamowienia_ibfk_1` FOREIGN KEY (`zamowienie_id`) REFERENCES `zamowienia` (`id`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
