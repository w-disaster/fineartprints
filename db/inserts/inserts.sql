ALTER TABLE `fineartprints`.`User` 
CHANGE COLUMN `Phone` `Phone` CHAR(140) NOT NULL ,
CHANGE COLUMN `Role` `Role` CHAR(20) NOT NULL ;

INSERT INTO User
VALUES ('gino.lippa@prints.com', '1996-10-17', 'pass2020', 'Gino', 'Lippa', '0714529816', 'Senigallia', 60019, 'AN', 'Viale dei pini 11', 'customer'),
	('cippa.pino@prints.com', '1990-01-20', 'pass2020', 'Cippa', 'Pino', '0714512309', 'Cesena', 47521, 'FC', 'Via Giuseppe Ungaretti', 'seller');


ALTER TABLE `fineartprints`.`Credit_Card` 
CHANGE COLUMN `Expire_date` `Expire_date` CHAR(10) NOT NULL ;

INSERT INTO Credit_Card
VALUES ('12/40', 'Gino Lippa', '1234567890123456');

INSERT INTO Payment_Info
VALUES ('1234567890123456', 'gino.lippa@prints.com');

ALTER TABLE `fineartprints`.`Shipper` 
CHANGE COLUMN `Phone` `Phone` CHAR(15) NOT NULL ;

INSERT INTO Shipper
VALUES ('DHL Express', '0719427618', 0.00),
		('SDA Carrier Express', '0714212345', 7.5),
        ('Bartolini', '0712345678', 5.0),
        ('UPS', '0714562718', 15.5);
