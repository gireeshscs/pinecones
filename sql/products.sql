-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 14 2013 г., 07:12
-- Версия сервера: 5.1.68-cll
-- Версия PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `thirdeye_third`
--

-- --------------------------------------------------------

--
-- Структура таблицы `uc_products`
--

DROP TABLE IF EXISTS `uc_products`;
CREATE TABLE IF NOT EXISTS `uc_products` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The node.vid of the product.',
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The node.nid of the product.',
  `model` varchar(255) NOT NULL DEFAULT '' COMMENT 'SKU or model number.',
  `list_price` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT 'Suggested retail price.',
  `cost` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT 'The amount the store pays to sell the product.',
  `sell_price` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT 'The amount the customer pays for the product.',
  `weight` float NOT NULL DEFAULT '0' COMMENT 'Physical weight.',
  `weight_units` varchar(255) NOT NULL DEFAULT 'lb' COMMENT 'Unit of measure for the weight field.',
  `length` float NOT NULL DEFAULT '0' COMMENT 'Physical length of the product or its packaging.',
  `width` float NOT NULL DEFAULT '0' COMMENT 'Physical width of the product or its packaging.',
  `height` float NOT NULL DEFAULT '0' COMMENT 'Physical height of the product or its packaging.',
  `length_units` varchar(255) NOT NULL DEFAULT 'in' COMMENT 'Unit of measure for the length, width, and height.',
  `pkg_qty` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'The number of this product that fit in one package.',
  `default_qty` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'The default value for the quantity field in the `Add to Cart` form.',
  `unique_hash` varchar(32) NOT NULL DEFAULT 'd41d8cd98f00b204e9800998ecf8427e' COMMENT 'A multi-site unique identifier for a product.',
  `ordering` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The sort criteria for products.',
  `shippable` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Boolean flag signifying that the product can be shipped.',
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Product information for nodes.';

--
-- Дамп данных таблицы `uc_products`
--

INSERT INTO `uc_products` (`vid`, `nid`, `model`, `list_price`, `cost`, `sell_price`, `weight`, `weight_units`, `length`, `width`, `height`, `length_units`, `pkg_qty`, `default_qty`, `unique_hash`, `ordering`, `shippable`) VALUES
(2, 2, '12345', '0.00000', '0.00000', '90.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, 'afb52305ff79b9ed49c7158b3291803e', 0, 1),
(96, 59, '', '0.00000', '0.00000', '90.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, 'f539236a2bd6bbf4986eb7293957e7fe', 0, 1),
(97, 60, '', '0.00000', '0.00000', '70.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, '9122e4ccda3973c06f7f622a930895b0', 0, 1),
(98, 61, '', '0.00000', '0.00000', '120.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, '678384e32b989ef9f6f5ff9cc6241be8', 0, 1),
(99, 62, '', '0.00000', '0.00000', '90.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, '7dfaedf74253b2510692d266527efbb3', 0, 1),
(73, 36, '', '0.00000', '0.00000', '150.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, '353806cdb07998712eac21aae6743568', 0, 1),
(74, 37, '', '0.00000', '0.00000', '75.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, 'e69f3e6fdd05a99b27d460067ca619f6', 0, 1),
(95, 58, '', '0.00000', '0.00000', '100.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, 'd8467e637fe4bcf6bc1ac1671bedf754', 0, 1),
(101, 64, '', '0.00000', '0.00000', '60.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, '766c62d5f911876586ff1b7af9722cc2', 0, 1),
(102, 65, '', '0.00000', '0.00000', '250.00000', 0, 'lb', 0, 0, 0, 'in', 1, 1, '6ca4c752176ab0da2df2ce8bf97e3b2f', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `uc_product_adjustments`
--

DROP TABLE IF EXISTS `uc_product_adjustments`;
CREATE TABLE IF NOT EXISTS `uc_product_adjustments` (
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The product node.nid.',
  `combination` varchar(255) NOT NULL DEFAULT '' COMMENT 'A serialized array whose keys are attribute IDs and values are option IDs.',
  `model` varchar(255) NOT NULL DEFAULT '' COMMENT 'The SKU representing the product with the combination of options.',
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Changes to a product’s SKU based on the possible...';

-- --------------------------------------------------------

--
-- Структура таблицы `uc_product_attributes`
--

DROP TABLE IF EXISTS `uc_product_attributes`;
CREATE TABLE IF NOT EXISTS `uc_product_attributes` (
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The product node.nid.',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The uc_attributes.aid.',
  `label` varchar(255) NOT NULL DEFAULT '' COMMENT 'Label to use when attribute is displayed',
  `ordering` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Determines the list position of attributes.',
  `default_option` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The default value of the attribute field on the add to cart form.',
  `required` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Flag that, if set, requires a user response for attributes (disables default options).',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Display type of the attribute options: 0 -- text fields, 1 -- select box (default), 2 -- radio buttons',
  PRIMARY KEY (`nid`,`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Attributes copied to a product.';

--
-- Дамп данных таблицы `uc_product_attributes`
--

INSERT INTO `uc_product_attributes` (`nid`, `aid`, `label`, `ordering`, `default_option`, `required`, `display`) VALUES
(2, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(61, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(59, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(60, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(36, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(37, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(58, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(62, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(64, 1, 'Choose Cord / Chain', 0, 1, 0, 2),
(65, 1, 'Choose Cord / Chain', 0, 1, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `uc_product_classes`
--

DROP TABLE IF EXISTS `uc_product_classes`;
CREATE TABLE IF NOT EXISTS `uc_product_classes` (
  `pcid` varchar(32) NOT NULL DEFAULT '' COMMENT 'The node type identifier.',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'The human-readable name.',
  `description` text COMMENT 'The description of the node type.',
  PRIMARY KEY (`pcid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='The list of product node types.';

-- --------------------------------------------------------

--
-- Структура таблицы `uc_product_features`
--

DROP TABLE IF EXISTS `uc_product_features`;
CREATE TABLE IF NOT EXISTS `uc_product_features` (
  `pfid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary key: the product feature id.',
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The node.nid of the product that has this feature.',
  `fid` varchar(32) NOT NULL DEFAULT '' COMMENT 'The type of feature.',
  `description` text COMMENT 'The description of the feature.',
  PRIMARY KEY (`pfid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Stores information of features added to products.' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `uc_product_kits`
--

DROP TABLE IF EXISTS `uc_product_kits`;
CREATE TABLE IF NOT EXISTS `uc_product_kits` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The node.vid of the product kit.',
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The node.nid of the product kit.',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The uc_products.nid of a product contained in the kit.',
  `mutable` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'A flag indicating whether the contents of the kit can be changed by the customer. 1 => Mutable. 0 => Immutable.',
  `qty` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'The number of this product contained in the kit.',
  `discount` float NOT NULL DEFAULT '0' COMMENT 'The adjustment to the uc_products.sell_price of the product.',
  `ordering` smallint(6) NOT NULL DEFAULT '0' COMMENT 'The weight of this product in relation to other products in the kit.',
  `synchronized` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'A flag indicating that changes to the sell price of this product will change the total price of the kit. 1 => Yes. 0 => No.',
  PRIMARY KEY (`vid`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores product kit information.';

-- --------------------------------------------------------

--
-- Структура таблицы `uc_product_options`
--

DROP TABLE IF EXISTS `uc_product_options`;
CREATE TABLE IF NOT EXISTS `uc_product_options` (
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The product node.nid.',
  `oid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The uc_attribute_options.oid.',
  `cost` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT 'The adjustment to a product’s cost with the chosen option.',
  `price` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT 'The adjustment to a product’s price with the chosen option.',
  `weight` float NOT NULL DEFAULT '0' COMMENT 'The adjustment to a product’s physical weight with the chosen option.',
  `ordering` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Affects the list position of the options.',
  PRIMARY KEY (`nid`,`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='The available choices for each attribute.';

--
-- Дамп данных таблицы `uc_product_options`
--

INSERT INTO `uc_product_options` (`nid`, `oid`, `cost`, `price`, `weight`, `ordering`) VALUES
(2, 1, '0.00000', '0.00000', -10, -10),
(2, 2, '10.00000', '10.00000', 0, 0),
(2, 3, '30.00000', '30.00000', 10, 10),
(60, 1, '0.00000', '0.00000', -10, -10),
(60, 2, '10.00000', '10.00000', 0, 0),
(60, 3, '30.00000', '30.00000', 10, 10),
(59, 3, '30.00000', '30.00000', 10, 10),
(59, 2, '10.00000', '10.00000', 0, 0),
(59, 1, '0.00000', '0.00000', -10, -10),
(61, 3, '30.00000', '30.00000', 10, 10),
(61, 2, '10.00000', '10.00000', 0, 0),
(61, 1, '0.00000', '0.00000', -10, -10),
(62, 3, '30.00000', '30.00000', 10, 10),
(62, 2, '10.00000', '10.00000', 0, 0),
(62, 1, '0.00000', '0.00000', -10, -10),
(36, 1, '0.00000', '0.00000', -10, -10),
(36, 2, '10.00000', '10.00000', 0, 0),
(36, 3, '30.00000', '30.00000', 10, 10),
(37, 1, '0.00000', '0.00000', -10, -10),
(37, 2, '10.00000', '10.00000', 0, 0),
(37, 3, '30.00000', '30.00000', 10, 10),
(58, 3, '30.00000', '30.00000', 10, 10),
(58, 2, '10.00000', '10.00000', 0, 0),
(58, 1, '0.00000', '0.00000', -10, -10),
(64, 3, '30.00000', '30.00000', 10, 10),
(64, 2, '10.00000', '10.00000', 0, 0),
(64, 1, '0.00000', '0.00000', -10, -10),
(65, 1, '0.00000', '0.00000', -10, -10),
(65, 2, '10.00000', '10.00000', 0, 0),
(65, 3, '30.00000', '30.00000', 10, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `uc_product_stock`
--

DROP TABLE IF EXISTS `uc_product_stock`;
CREATE TABLE IF NOT EXISTS `uc_product_stock` (
  `sku` varchar(255) NOT NULL DEFAULT '' COMMENT 'SKU (Stock Keeping Unit) of a product.',
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Node ID of a product.',
  `active` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Boolean flag indicating whether stock is being tracked for this product. 1 => Yes. 0 => No.',
  `stock` mediumint(9) NOT NULL DEFAULT '0' COMMENT 'Quantity in stock.',
  `threshold` mediumint(9) NOT NULL DEFAULT '0' COMMENT 'Minimum quantity threshold level.',
  PRIMARY KEY (`sku`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stock levels for Ubercart products.';

--
-- Дамп данных таблицы `uc_product_stock`
--

INSERT INTO `uc_product_stock` (`sku`, `nid`, `active`, `stock`, `threshold`) VALUES
('4081', 1, 0, 0, 0),
('product 25', 25, 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
