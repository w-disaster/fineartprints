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

INSERT INTO Picture
VALUES ('Edificio bianco e nero', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture1.webp', 50, 'landscape', 'Architecture', 'cippa.pino@prints.com'),

('Grattacielo su nebbia', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'architecture2.webp', 100, 'landscape', 'Architecture', 'cippa.pino@prints.com'),

('Edificio moderno a spirale', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture3.webp', 70, 'portrait', 'Architecture', 'cippa.pino@prints.com'),

('Edificio bianco', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture4.webp', 50, 'landscape', 'Architecture', 'cippa.pino@prints.com'),

('Campo di grano con volo di corvi', 'Non vi sono documenti storici che permettano di stabilire se Campo di grano con volo di corvi sia stato realmente l’ultimo dipinto di van Gogh. Infatti, grazie alla sua potente forza evocativa di uno stato d’animo tormentato, il dipinto è spesso indicato come il testamento spirituale dell’artista. I tre sentieri che fendono il grano, secondo gli studiosi, simboleggiano le alternative professionali e umane che hanno pesato drammaticamente nella vita di Vincent van Gogh. Inoltre, probabilmente, anche il contrasto tra il giallo dorato e il blu scuro del cielo rappresenta la lotta tra luce e oscurità, vita e morte.', 'Van Gogh', 'campo_di_grano_volo_di_corvi.jpeg', 100, 'landscape', 'Fine arts', 'cippa.pino@prints.com'),

('Il postino Joseph Roulin', 'Joseph Roulin era un uomo «con una grande barba, molto simile a Socrate» che lavorava come smistatore di posta presso la stazione ferroviaria di Arles, ridente cittadina provenzale dove van Gogh si era trasferito nel febbraio 1888. Tra Vincent e Joseph si instaurò subito un sincero affetto oltre che una vicendevole stima, apertamente espressa dal pittore in una lettera indirizzata al fratello Théo', 'Van Gogh', 'il_postino.webp', 90, 'portrait', 'Fine arts', 'cippa.pino@prints.com'),

('Impressione, levar del sole', 'Nel dipinto, viene raffigurato il porto di Le Havre all’alba, quando il Sole inizia a filtrare attraverso la nebbia mattutina. Sullo sfondo, intravediamo delle navi che appaiono solo come due ombre scure, mentre in primo piano, spicca una barca di pescatori che sta tornando dalla pesca notturna. Possiamo notare come il cerchio del Sole rimanda alcuni riflessi nell’acqua, mentre un insieme di gru e ciminiere fumose si intravedono in lontananza.', 'Claude Monet', 'impressione_levar_del_sole.jpeg', 120, 'landscape', 'Fine arts', 'cippa.pino@prints.com'),

('Golconda', 'Golconda è stato dipinto nel 1953 da René Magritte. Nel quadro sono raffigurati numerosi uomini in bombetta che cadono fra i palazzi di una città. Potrebbe essere un sobborgo di Bruxelles, dove il pittore ha vissuto. Il cielo è terso e gli uomini, diversi fra loro solo nel volto, perché indossano tutti gli stessi abiti: bombetta, cappotto nero, ombrello e scarpe nere, la divisa comune di banchieri e uomini d’affari,  a volte sono dipinti di fronte altre volte di lato e cadono in posizione retta e composta.', 'Renè Magritte', 'golconda-magritte.jpeg', 90, 'landscape', 'Fine arts', 'cippa.pino@prints.com'),

('La persistenza della memoria', 'La persistenza della memoria è un’opera di Salvador Dalì dipinta con uno stile estremamente realistico. Il senso di smarrimento, di fronte all’immagine surreale, nasce, così,  proprio dalla sua verosimiglianza. Oltre alla spiegazione data dall’artista, si può immaginare che gli orologi molli rappresentino la relatività della percezione temporale. Ognuno di noi, infatti, ha una propria sensazione temporale rispetto alle medesime situazioni. Ogni orologio, inoltre, segna ore diverse.', 'Salvador Dalì', 'la_persistenza_della_memoria.jpeg', 110, 'landscape', 'Fine arts', 'cippa.pino@prints.com'),

('Stampa astratta n.1', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract1.webp', 50, 'portrait', 'Abstract', 'cippa.pino@prints.com'),

('Stampa astratta n.2', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract2.webp', 80, 'portrait', 'Abstract', 'cippa.pino@prints.com'),

('Stampa astratta n.3', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract3.webp', 90, 'landscape', 'Abstract', 'cippa.pino@prints.com'),

('Stampa astratta n.4', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'abstract4.webp', 110, 'landscape', 'Abstract', 'cippa.pino@prints.com'),

('Stampa astratta n.5', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'abstract5.webp', 80, 'landscape', 'Abstract', 'cippa.pino@prints.com'),

('Stampa astratta n.6', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract6.webp', 80, 'portrait', 'Abstract', 'cippa.pino@prints.com');











