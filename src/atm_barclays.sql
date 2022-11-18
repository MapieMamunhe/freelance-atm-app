CREATE SCHEMA IF NOT EXISTS `atm_barclays` ;
USE `atm_barclays` ;

CREATE TABLE IF NOT EXISTS `atm_barclays`.`conta` (
  `conta_numero` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `conta_senha` VARCHAR(128) NOT NULL,
  `conta_saldo` DOUBLE NOT NULL DEFAULT 1000)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `atm_barclays`.`movimento` (
  `movimento_id` INT NOT NULL AUTO_INCREMENT,
  `numero_conta` INT NOT NULL,
  `movimento` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`movimento_id`, `numero_conta`),
  CONSTRAINT `fk_movimentacoes_conta`
    FOREIGN KEY (`numero_conta`)
    REFERENCES `atm_barclays`.`conta` (`conta_numero`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;