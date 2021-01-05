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

INSERT INTO Picture (Title, Description, Author, Image, Base_price, Orientation, Category_name, Email) VALUES
("The Cardsharps", "The Cardsharps (painted around 1594) is a painting by the Italian Baroque artist Michelangelo Merisi da Caravaggio. The painting shows an expensively-dressed but unworldly boy playing cards with another boy. The second boy, a cardsharp, has extra cards tucked in his belt behind his back, out of sight of the mark but not the viewer, and a sinister older man is peering over the dupe's shoulder and signaling to his young accomplice. The second boy has a dagger handy at his side.", "Caravaggio", "the-cardsharps.jpg", 126.00, "landscape", "fine arts", "cippa.pino@prints.com"),
("After Lunch (The Trellis)", "The canvas was painted by Lega in 1868 at Piagentina, the place in the hills around Florence where he had gone to live in 1861 and where many of the other Macchiaioli painters used to gather, drawn by the landscape and the possibility of painting from life. It is one of the artist’s masterpieces, in which he turns an affectionate gaze on a bourgeois and feminine world, taking it as the cue for a splendid representation of the landscape carried out in accordance with the principles of the new theory of the macchia or “blot,” with results of the highest quality.
The myriad hues capturing the sunlight and the cool of the trellis impart a thoroughly natural feel to the stringent, almost Renaissance handling of perspective.", "Silvestro Lega", "after-lunch.jpg", 95.00, "landscape", "fine arts", "cippa.pino@prints.com"),
("Portrait of Lucina Brembati", "The Portrait of Lucina Brembati is a painting by the Italian High Renaissance painter Lorenzo Lotto, dating to c. 1521/23. It is housed in the Accademia Carrara of Bergamo, northern Italy.

The work is known since 1882, when the Accademia acquired it from a private collection. The subject was identified later, after the rebus included in it was recognized: the moon in the upper left background contains the inscription 'CI', which, in Italian, translates as 'CI in Luna', e.g. 'LuCIna'; the Brembati coat of arms is instead contained in ring of the woman's left forefinger.", "Lorenzo Lotto", "portrait-lucina-brembati.jpg", 78.00, "portrait", "fine arts", "cippa.pino@prints.com"),

("Lady with an Ermine", "The painting was purchased ca. 1800 in Italy, by Adam Jerzy, the son of Princess Izabela Czartoryska, and donated to the Museum in Puławy where it was exhibited in the ‘Gothic House’ from 1809–1830.

In Puławy, it was erroneously considered to be a portrait alluding to the beloved mistress of King Francis I of France, referred to as the ‘Belle Ferronière’. We now know that the subject of the portrait is Cecilia Gallerani (ca. 1473-1536), a reputed mistress of Lodovico Sforza, Duke of Milan, also known as ‘il Moro’ (the Moor).", "Leonardo da Vinci", "lady-with-ermine.jpg", 165.00, "portrait", "fine arts", "cippa.pino@prints.com"),

("Girl with a Pearl Earring", "Girl with a Pearl Earring is Vermeer’s most famous painting. It is not a portrait, but a ‘tronie’ – a painting of an imaginary figure. Tronies depict a certain type or character; in this case a girl in exotic dress, wearing an oriental turban and an improbably large pearl in her ear.

Johannes Vermeer was the master of light. This is shown here in the softness of the girl’s face and the glimmers of light on her moist lips. And of course, the shining pearl.", "Johannes Vermeer", "girl-perl-earring.jpg", 95.00, "portrait", "fine arts", "cippa.pino@prints.com");


("film1", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Davide Rossi", "film1.webp", 20.00, "portrait", "film", "cippa.pino@prints.com"),
("film2", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Luca Fabri", "film2.webp", 18.00, "landscape", "film", "cippa.pino@prints.com"),
("film3", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Riccardo Battistini", "film3.webp", 15.00, "landscape", "film", "cippa.pino@prints.com"),
("film4", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Luca Fabri", "film4.webp", 7.00, "portrait", "film", "cippa.pino@prints.com"),
("film5", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Riccardo Battistini", "film5.webp", 9.00, "portrait", "film", "cippa.pino@prints.com"),
("film6", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Davide Rossi", "film6.webp", 13.00, "portrait", "film", "cippa.pino@prints.com"),
("street1", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Davide Rossi", "street1.webp", 21.00, "portrait", "street", "cippa.pino@prints.com"),
("street2", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Riccardo Battistini", "street2.webp", 11.00, "portrait", "street", "cippa.pino@prints.com"),
("street3", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Davide Rossi", "street3.webp", 21.00, "portrait", "street", "cippa.pino@prints.com"),
("street4", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Luca Fabri", "street4.webp", 9.00, "portrait", "street", "cippa.pino@prints.com"),
("space1", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Luca Fabri", "space1.webp", 14.00, "portrait", "space", "cippa.pino@prints.com"),
("space2", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Riccardo Battistini", "space2.webp", 25.00, "landscape", "space", "cippa.pino@prints.com"),
("space3", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Davide Rossi", "space3.webp", 37.00, "landscape", "space", "cippa.pino@prints.com"),
("nature1", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Davide Rossi", "nature1.webp", 18.00, "portrait", "nature", "cippa.pino@prints.com"),
("nature2", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Riccardo Battistini", "nature2.webp", 23.00, "portrait", "nature", "cippa.pino@prints.com"),
("nature3", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Luca Fabri", "nature3.webp", 18.00, "portrait", "nature", "cippa.pino@prints.com"),
("nature4", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Davide Rossi", "nature4.webp", 21.00, "portrait", "nature", "cippa.pino@prints.com"),
("nature5", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Riccardo Battistini", "nature5.webp", 22.00, "landscape", "nature", "cippa.pino@prints.com"),
("nature6", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Luca Fabri", "nature6.webp", 23.00, "landscape", "nature", "cippa.pino@prints.com"),
("nature7", "Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.",
"Riccardo Battistini", "nature7.webp", 17.00, "portrait", "nature", "cippa.pino@prints.com");


