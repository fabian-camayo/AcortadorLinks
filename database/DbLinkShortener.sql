CREATE SCHEMA `DbLinkShortener` DEFAULT CHARACTER SET latin1 ;

CREATE TABLE `DbLinkShortener`.`LK_shortener` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(7) NOT NULL,
  `url` LONGTEXT NOT NULL,
  `clics` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`));

  CREATE TABLE `DbLinkShortener`.`LK_constants` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `value` LONGTEXT NULL,
  `description` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));

  ALTER TABLE `DbLinkShortener`.`LK_shortener` 
  ADD UNIQUE INDEX `code_UNIQUE` (`code` ASC);
  ;
  
  INSERT INTO `DbLinkShortener`.`LK_constants` (`name`, `value`, `description`) VALUES ('domain', 'http://acortadorlinks.test', 'Dominio web de la plataforma');
