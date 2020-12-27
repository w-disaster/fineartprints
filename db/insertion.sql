/* categories, passpartout, frame, techniques */

INSERT INTO Category (Name, Image, Orientation) VALUES
("Film", "film1.webp", "portrait"),
("Street", "street1.webp", "portrait"),
("Space", "space1.webp", "portrait"),
("Nature", "nature1.webp", "portrait"),
("Architecture", "edificio1.webp", "landscape"),
("Fine arts", "il_postino.webp", "portrait"),
("Abstract", "abstract1.webp", "portrait"),
("Other", "edificio3.webp", "portrait");

INSERT INTO Frame (Frame_id, Image, Description, Price) VALUES
("7820", "frame01.webp", "Vienna Chateau 20 Silver", 47.00),
("7821", "frame02.webp", "Vienna Chateau 20 Gold", 59.00),
("7822", "frame03.webp", "Affresco Oro", 47.00),
("7823", "frame04.webp", "Veneziano Oro 20 Silver", 32.00),
("7824", "frame05.webp", "Fiorentina Oro Antico", 21.00),
("7825", "frame06.webp", "Vienna Chateau 50 Braun", 45.00),
("7826", "frame07.webp", "Palladio 70", 65.00),
("7827", "frame08.webp", "Hermitage Gold", 32.00),
("7828", "frame09.webp", "Hermitage Silver", 17.00);

INSERT INTO Print_technique (Technique_id, Image, Description, Price_per_cm2) VALUES
("01", "canvas.webp", "Print on Artist's Canvas", 12.00),
("02", "handmade.webp", "Hand painted oil painting on Canvas", 12.00),
("03", "varnished.webp", "Print on Varnished Canvas", 2.00),
("04", "craft.webp", "Print on Craft Paper", 6.00),
("05", "satin.webp", "Print on Satin Photographic Paper", 3.00),
("06", "watercolor.webp", "Print on Watercolor", 4.00),
("07", "wood.webp", "Print on natural wood", 9.00),
("08", "plexiglas.webp", "Print on Plexiglas", 5.00),
("09", "glass.webp", "Print on Glass", 5.00);

INSERT INTO Passpartout (Passpartout_id, Image, Specifications, Price_per_cm2) VALUES
("8001", "pass01.webp", "Bianco", 11.00),
("8002", "pass02.webp", "Bianco Naturale", 12.24),
("8003", "pass03.webp", "Nero", 12.24),
("8004", "pass04.webp", "Newport Blue", 15.23),
("8005", "pass05.webp", "Williams Green", 14.23),
("8006", "pass06.webp", "Chinese Red", 12.24);

