-- MySQL Script generated by MySQL Workbench
-- 12/04/18 17:20:30
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema u_codeigniter
-- -----------------------------------------------------
-- Curso de codeigniter de udemy - bd
DROP SCHEMA IF EXISTS `u_codeigniter` ;

-- -----------------------------------------------------
-- Schema u_codeigniter
--
-- Curso de codeigniter de udemy - bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `u_codeigniter` DEFAULT CHARACTER SET utf8mb4 ;
USE `u_codeigniter` ;

-- -----------------------------------------------------
-- Table `u_codeigniter`.`contacts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u_codeigniter`.`contacts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `birthdate` DATE NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
