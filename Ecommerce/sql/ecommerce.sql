-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2019 at 02:44 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `categories` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pCode`, `pName`, `categories`, `image`, `price`, `info`) VALUES
('p01women', 'Esprit Ruffle Shirt', 'women', 'product-01.jpg', 16.64, 'Nunc ultricies velit quis velit ultrices tempus.\r\nPhasellus lobortis enim sed iaculis tincidunt.\r\nCras eget ipsum ut nisi egestas imperdiet vel eget turpis.'),
('p02women', 'Herschel supply', 'women', 'product-02.jpg', 35.31, 'Aenean convallis arcu at leo ornare, id tristique enim iaculis.\r\nMorbi tristique quam eu cursus pharetra.'),
('p03men', 'Only Check Trouser', 'men', 'product-03.jpg', 25.56, 'Duis semper elit non risus faucibus malesuada.\r\nCurabitur ac lectus interdum, condimentum nibh vel, semper nisi.'),
('p04women', 'Classic Trench Coat', 'women', 'product-04.jpg', 75.89, 'Quisque ornare metus eget diam auctor maximus.\r\nMaecenas luctus ipsum quis eros lobortis, vehicula gravida nunc congue.'),
('p05women', 'Front Pocket Jumper', 'women', 'product-05.jpg', 34.75, 'Quisque in diam nec ex ornare egestas.\r\nVestibulum ultrices purus sit amet est interdum tincidunt.'),
('p06watches', 'Vintage Inspired Classic', 'watches', 'product-06.jpg', 95.23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nDuis et risus gravida, porta nulla ac, fringilla purus.\r\nDonec finibus ipsum vel massa hendrerit feugiat.\r\nQuisque ultricies risus a neque semper blandit.'),
('p07women', 'Shirt in Stretch Cotton', 'women', 'product-07.jpg', 52.66, 'Duis et libero in sem posuere luctus et sollicitudin tellus.\r\nPraesent rhoncus nisi a magna molestie, nec consectetur ex tincidunt.\r\nQuisque convallis tellus euismod orci molestie accumsan.'),
('p08women', 'Pieces Metallic Printed', 'women', 'product-08.jpg', 18.96, 'Donec imperdiet massa sit amet velit accumsan elementum.\r\nDuis fringilla ligula ut blandit convallis.\r\nSed et est ac odio aliquam ultricies.'),
('p09shoes', 'Converse All Star Hi Plimsolls', 'shoes', 'product-09.jpg', 75.88, 'Etiam at lacus eget ipsum laoreet congue.\r\nPraesent varius dolor ut rhoncus viverra.\r\nNulla porta sapien eu massa ultrices, ac ultricies orci suscipit.'),
('p10women', 'Femme T-Shirt In Stripe', 'women', 'product-10.jpg', 25.85, 'Cras non mi ullamcorper, porttitor nisi id, luctus diam.\r\nSed pulvinar nunc at vestibulum congue.\r\nMaecenas vel felis quis tellus imperdiet imperdiet at sed augue.'),
('p11men', 'Herschel supply', 'men', 'product-11.jpg', 63.16, 'Vestibulum nec libero vitae mi faucibus aliquam.\r\nCras venenatis quam sed iaculis ultricies.\r\nUt mollis mauris ut nisl vestibulum imperdiet.'),
('p12men', 'Herschel supply', 'men', 'product-12.jpg', 63.67, 'Ut tempor ipsum a sem blandit tempor.\r\nMorbi pulvinar augue accumsan euismod venenatis.\r\nUt fringilla eros a dolor dapibus congue.\r\nVestibulum consequat est nec eros ultricies accumsan.'),
('p13women', 'T-Shirt with Sleeve', 'women', 'product-13.jpg', 18.49, 'Nam eget velit accumsan orci rutrum interdum.\r\nSed egestas eros sed diam hendrerit tristique.\r\nFusce sit amet tellus a sem aliquet auctor cursus eu odio.'),
('p14women', 'Pretty Little Thing', 'women', 'product-14.jpg', 54.79, 'Proin suscipit leo sed arcu tempus bibendum.\r\nDonec facilisis metus nec nisl varius fermentum.\r\nSed non eros lobortis, ornare ipsum a, blandit eros.\r\nMauris nec tortor eget ipsum vestibulum congue at eu metus.'),
('p15watches', 'Mini Silver Mesh Watch', 'watches', 'product-15.jpg', 86.97, 'Vestibulum porta lectus nec neque pulvinar iaculis.\r\nPhasellus eget risus a felis vulputate lobortis eleifend porttitor eros.'),
('p16women', 'Square Neck Back', 'women', 'product-16.jpg', 29.64, 'Morbi pulvinar justo eget enim scelerisque sollicitudin.\r\nSed bibendum arcu in enim euismod tempus.\r\nVestibulum at augue ac odio scelerisque egestas.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
