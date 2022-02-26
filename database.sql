create database scandiweb;

use scandiweb;

CREATE TABLE `product_s` (
  `id` int(11) NOT NULL auto_increment,
  `sku` varchar(255) NOT NULL,
  `n_ame` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `size` varchar(255) ,
  `w_eight` varchar(255), 
  `dimension` varchar(255),
  PRIMARY KEY  (`id`)
);