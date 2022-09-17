
-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
CREATE TABLE `Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Tipo` INT NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Vacina`
-- -----------------------------------------------------
CREATE TABLE `Vacina` (
  `idVacina` INT NOT NULL AUTO_INCREMENT,
  `DataReforco` DATE NOT NULL,
  `DataAplicacao` DATE NOT NULL,
  `Nomevacina` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idVacina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Raca`
-- -----------------------------------------------------
CREATE TABLE `Raca` (
  `idRaca` INT NOT NULL AUTO_INCREMENT,
  `Descricao` TEXT(50) NOT NULL,
  PRIMARY KEY (`idRaca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Animais`
-- -----------------------------------------------------
CREATE TABLE `Animais` (
  `idAnimais` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(50) NOT NULL,
  `Descricao` TEXT(255) NOT NULL,
  `Idade` DATE NOT NULL,
  `Status` VARCHAR(255) NOT NULL,
  `Porte` VARCHAR(45) NOT NULL,
  `Cor` VARCHAR(45) NOT NULL,
  `Tipo` INT NOT NULL,
  `Status_Cast` VARCHAR(255) NOT NULL,
  `Vacina_idVacina` INT NOT NULL,
  `Raca_idRaca` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idAnimais`),
  INDEX `fk_Animais_Vacina_idx` (`Vacina_idVacina` ASC),
  INDEX `fk_Animais_Raca1_idx` (`Raca_idRaca` ASC),
  INDEX `fk_Animais_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Animais_Vacina`
    FOREIGN KEY (`Vacina_idVacina`)
    REFERENCES `mydb`.`Vacina` (`idVacina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animais_Raca1`
    FOREIGN KEY (`Raca_idRaca`)
    REFERENCES `mydb`.`Raca` (`idRaca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animais_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Noticias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Noticias` (
  `idNoticias` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(70) CHARACTER SET 'dec8' COLLATE 'dec8_swedish_ci' NOT NULL,
  `Data` DATE NOT NULL,
  `Descricao` VARCHAR(300) NOT NULL,
  `Imagem` VARCHAR(255) CHARACTER SET 'big5' NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idNoticias`),
  INDEX `fk_Noticias_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Noticias_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
