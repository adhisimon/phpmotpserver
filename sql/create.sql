-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2011 at 09:27 PM
-- Server version: 5.0.77
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `motp`
--

-- --------------------------------------------------------

--
-- Table structure for table `used_tokens`
--

CREATE TABLE IF NOT EXISTS `used_tokens` (
  `token` varchar(6) NOT NULL,
  `created` datetime NOT NULL,
  KEY `created` (`created`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `secret` varchar(32) NOT NULL,
  `pin` char(4) NOT NULL default '1111',
  `offset` int(11) NOT NULL default '0',
  `password` varchar(255) default NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
